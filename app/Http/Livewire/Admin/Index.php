<?php

namespace App\Http\Livewire\Admin;

use App\Models\CartonSorteo;
use App\Models\EmpresaGanancias;
use App\Models\Sorteo;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;
    protected $paginationTheme = "bootstrap";

    protected $listeners = ['render' => 'render'];

    public $fecha_inicio, $fecha_fin,$ganancias_mes_rango, $carga_total = 0, $dolar_hoy, $sorteo_fecha;

    public function render()
    {
        $mes= date('m');
        $ano= date('Y');
        $dia= date('d');

        $registros_dias = User::whereMonth('created_at', $mes)
            ->whereDay('created_at', $dia)
            ->whereYear('created_at', $ano)
            ->count();

        $ganancias_dia = EmpresaGanancias::whereMonth('created_at', $mes)
            ->whereDay('created_at', $dia)
            ->whereYear('created_at', $ano)
            ->sum('ganancia');

        $ganancias_mes= EmpresaGanancias::whereMonth('created_at', $mes)
            ->whereYear('created_at', $ano)
            ->sum('ganancia');

   



    

        return view('livewire.admin.index',compact('registros_dias','ganancias_dia','ganancias_mes'));
    }

    public function cartones_vendidos($sorteo_id){

        return CartonSorteo::where('sorteo_id',$sorteo_id)
            ->where('status_pago','Pago recibido')
            ->count();

    }

    public function ganancia_bing($sorteo_id){

        return EmpresaGanancias::where('sorteo_id',$sorteo_id)->first()->ganancia;


    }
    public function buscar(){

        if($this->fecha_inicio && $this->fecha_fin){

            $this->dolar_hoy = valor_dolar_hoy();

        

            $fecha_inicio = date("Y-m-d H:i", strtotime($this->fecha_inicio));
            $fecha_fin = date("Y-m-d H:i", strtotime($this->fecha_fin));

            $this->ganancias_mes_rango = EmpresaGanancias::whereBetween('created_at',[$fecha_inicio,$fecha_fin])
                ->sum('ganancia');

            $this->carga_total = 1;

            $this->sorteo_fecha = Sorteo::whereBetween('fecha_ejecucion',[$fecha_inicio,$fecha_fin])
                ->Where('status','Finalizado')
                ->get();

        }


    }
}
