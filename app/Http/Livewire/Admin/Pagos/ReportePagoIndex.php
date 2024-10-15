<?php

namespace App\Http\Livewire\Admin\Pagos;

use App\Models\CuentasUser;
use App\Models\Pago;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class ReportePagoIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $fecha_inicio,$fecha_fin,$vista_registros = 0,$search,$buscador = 0, $registro_select;

    protected $listeners = ['render' => 'render','echo:new_pago,NewPago' => 'render'];

    public function updatingSearch(){
        $this->resetPage();
    }

    public function pendientes_verificar(){
        return Pago::where('status','Pendiente')
            ->where('tipo','Retiro')
            ->count();
    }

    public function render()
    {
        $dolar_hoy = valor_dolar_hoy();

        if($this->vista_registros == 0){

            if($this->buscador == 0){
                $registros = Pago::whereHas('user',function(Builder $query){
                    $query->where('name','LIKE', '%' . $this->search . '%');
                })
                ->where('status','Pendiente')
                ->where('tipo','Retiro')
                ->latest('id')
                ->paginate(15);

                $total_registros = Pago::whereHas('user',function(Builder $query){
                    $query->where('name','LIKE', '%' . $this->search . '%');
                })
                ->where('status','Pendiente')
                ->where('tipo','Retiro')
                ->latest('id')
                ->count();

            }

        }

        if($this->vista_registros == 1){

            if($this->buscador == 0){
                $registros = Pago::whereHas('user',function(Builder $query){
                    $query->where('name','LIKE', '%' . $this->search . '%');
                })
                ->where('status','Pago recibido')
                ->where('tipo','Retiro')
                ->latest('id')
                ->paginate(15);

                $total_registros = Pago::whereHas('user',function(Builder $query){
                    $query->where('name','LIKE', '%' . $this->search . '%');
                })
                ->where('status','Pago recibido')
                ->where('tipo','Retiro')
                ->latest('id')
                ->count();

            }

        }


        return view('livewire.admin.pagos.reporte-pago-index',compact('dolar_hoy','total_registros','registros'));
    }



    public function download($value){
        $url = storage_path('app/public/'.str_replace('-', '/', $value));
        return response()->download($url);
    }
}
