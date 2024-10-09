<?php

namespace App\Http\Livewire\Admin\Pagos;

use App\Models\CartonSorteo;
use App\Models\Pago;
use Livewire\Component;
Use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $fecha_inicio,$fecha_fin,$vista_registros = 0,$search,$buscador = 0, $registro_select;

    protected $listeners = ['render' => 'render','confirm_pago_recibido'=>'confirm_pago_recibido','confirm_pago_no_recibido','confirm_pago_no_recibido','echo:new_pago,NewPago' => 'render'];

    public function updatingSearch(){
        $this->resetPage();
    }

    public function pendientes_verificar(){
        return Pago::where('status','Pendiente')->count();
    }

    public function render()
    {

        if($this->vista_registros == 0){

            if($this->buscador == 0){
                $registros = Pago::whereHas('user',function(Builder $query){
                    $query->where('name','LIKE', '%' . $this->search . '%');
                })
                ->where('status','Pendiente')
                ->latest('id')
                ->paginate(15);

                $total_registros = Pago::whereHas('user',function(Builder $query){
                    $query->where('name','LIKE', '%' . $this->search . '%');
                })
                ->where('status','Pendiente')
                ->latest('id')
                ->count();

            }

            else{
                $registros = Pago::where('referencia', 'LIKE', '%' . $this->search . '%')
                    ->where('status','Pendiente')
                    ->latest('id')
                    ->paginate(15);

                $total_registros = Pago::where('referencia', 'LIKE', '%' . $this->search . '%')
                ->where('status','Pendiente')
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
                ->where('tipo','!=','Retiro')
                ->latest('id')
                ->paginate(15);

                $total_registros = Pago::whereHas('user',function(Builder $query){
                    $query->where('name','LIKE', '%' . $this->search . '%');
                })
                ->where('status','Pago recibido')
                ->where('tipo','!=','Retiro')
                ->latest('id')
                ->count();

            }

            else{
                $registros = Pago::where('referencia', 'LIKE', '%' . $this->search . '%')
                    ->where('status','Pago recibido')
                    ->where('tipo','!=','Retiro')
                    ->latest('id')
                    ->paginate(15);

                $total_registros = Pago::where('referencia', 'LIKE', '%' . $this->search . '%')
                ->where('status','Pago recibido')
                ->where('tipo','!=','Retiro')
                ->latest('id')
                ->count();
                
            }

           
        }

        if($this->vista_registros == 2){

            if($this->buscador == 0){
                $registros = Pago::whereHas('user',function(Builder $query){
                    $query->where('name','LIKE', '%' . $this->search . '%');
                })
                ->where('status','Pago no recibido')
                ->where('tipo','!=','Retiro')
                ->latest('id')
                ->paginate(15);

                $total_registros = Pago::whereHas('user',function(Builder $query){
                    $query->where('name','LIKE', '%' . $this->search . '%');
                })
                ->where('status','Pago no recibido')
                ->where('tipo','!=','Retiro')
                ->latest('id')
                ->count();

            }

            else{
                $registros = Pago::where('referencia', 'LIKE', '%' . $this->search . '%')
                    ->where('status','Pago no recibido')
                    ->where('tipo','!=','Retiro')
                    ->latest('id')
                    ->paginate(15);

                $total_registros = Pago::where('referencia', 'LIKE', '%' . $this->search . '%')
                ->where('status','Pago no recibido')
                ->where('tipo','!=','Retiro')
                ->latest('id')
                ->count();
                
            }

           
        }
        return view('livewire.admin.pagos.index',compact('total_registros','registros'));
    }

    public function download($value){
        $url = storage_path('app/public/'.str_replace('-', '/', $value));
        return response()->download($url);
    }

    public function Pago_recibido($registro){

        $this->registro_select = $registro;

        $this->emit('confirm', '¿Esta seguro que recibio el pago?, confirme','admin.pagos.index','confirm_pago_recibido','Pago registrado exitosamente');

    }

    public function confirm_pago_recibido(){

        Pago::where('id',$this->registro_select)
            ->first()
            ->update([
                'status' => 'Pago recibido'
            ]);

        $pagos_carton = CartonSorteo::where('pago_id',$this->registro_select)
            ->get();

        foreach($pagos_carton as $carton_modif){

            CartonSorteo::where('id',$carton_modif->id)
                ->update([
                    'status_carton' => 'No disponible',
                    'status_pago' => 'Pago recibido',
                ]);
        }

    }

    public function Pago_no_recibido($registro){

        $this->registro_select = $registro;

        $this->emit('confirm', '¿Esta seguro que no recibio el pago?, confirme','admin.pagos.index','confirm_pago_no_recibido','Proceso registrado exitosamente');

    }

    public function confirm_pago_no_recibido(){

        Pago::where('id',$this->registro_select)
            ->first()
            ->update([
                'status' => 'Pago no recibido'
            ]);

        $pagos_carton = CartonSorteo::where('pago_id',$this->registro_select)
            ->get();

        foreach($pagos_carton as $carton_modif){

            CartonSorteo::where('id',$carton_modif->id)
                ->update([
                    'status_carton' => 'Disponible',
                    'status_pago' => '',
                    'pago_id' => null,
                    'user_id' => null
                ]);
        }

    }
}
