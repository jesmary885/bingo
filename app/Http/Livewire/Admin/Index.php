<?php

namespace App\Http\Livewire\Admin;

use App\Models\EmpresaGanancias;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Index extends Component
{
    public $fecha_inicio, $fecha_fin,$ganancias_mes_rango, $carga_total = 0, $dolar_hoy;

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

    public function buscar(){

        if($this->fecha_inicio && $this->fecha_fin){

            $this->dolar_hoy = valor_dolar_hoy();

        

            $fecha_inicio = date("Y-m-d H:i", strtotime($this->fecha_inicio));
            $fecha_fin = date("Y-m-d H:i", strtotime($this->fecha_fin));

            $this->ganancias_mes_rango = EmpresaGanancias::whereBetween('created_at',[$fecha_inicio,$fecha_fin])
                ->sum('ganancia');

            $this->carga_total = 1;


           /* $ganancias_mes_rango_p = DB::select('SELECT sum(e.ganancia) as ganancia from empresa_ganancias e
            where e.created_at BETWEEN :fecha_inicioo AND :fecha_finn '
            ,array('fecha_inicioo' =>$fecha_inicio, 'fecha_finn' => $fecha_fin));

            foreach( $ganancias_mes_rango_p as $e){
                $this->ganancias_mes_rango = $e->monto;
            }*/
        }


    }
}
