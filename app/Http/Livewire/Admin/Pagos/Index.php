<?php

namespace App\Http\Livewire\Admin\Pagos;

use App\Models\Cart;
use App\Models\CartonSorteo;
use App\Models\Pago;
use App\Models\PagoSorteo;
use App\Models\referidos;
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
        return Pago::where('status','Pendiente')
            ->where('tipo','!=','Retiro')
            ->count();
    }


    public function render()
    {

        if($this->vista_registros == 0){

            if($this->buscador == 0){
                $registros = Pago::whereHas('user',function(Builder $query){
                    $query->where('name','LIKE', '%' . $this->search . '%');
                })
                ->where('status','Pendiente')
                ->where('tipo','!=','Retiro')
                ->latest('id')
                ->paginate(15);

                $total_registros = Pago::whereHas('user',function(Builder $query){
                    $query->where('name','LIKE', '%' . $this->search . '%');
                })
                ->where('status','Pendiente')
                ->where('tipo','!=','Retiro')
                ->latest('id')
                ->count();

            }

            else{
                $registros = Pago::where('referencia', 'LIKE', '%' . $this->search . '%')
                    ->where('status','Pendiente')
                    ->where('tipo','!=','Retiro')
                    ->latest('id')
                    ->paginate(15);

                $total_registros = Pago::where('referencia', 'LIKE', '%' . $this->search . '%')
                ->where('status','Pendiente')
                ->where('tipo','!=','Retiro')
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

        $registro_pago_user = Pago::where('id',$this->registro_select)->first()->user_id;

        $busqueda_refer = referidos::where('user_id',$registro_pago_user)
            ->where('compra','No')
            ->first();

        if($busqueda_refer){
            $busqueda_refer->update([
                'compra' => 'Si'
            ]);
        }

        $pagos_carton = CartonSorteo::where('pago_id',$this->registro_select)
            ->get();

        foreach($pagos_carton as $carton_modif){

            $carton_sorteo_update = CartonSorteo::where('id',$carton_modif->id)->first();
            
            $carton_sorteo_update->update([
                'status_carton' => 'No disponible',
                'status_pago' => 'Pago recibido',
            ]);

            PagoSorteo::where('sorteo_id',$carton_modif->sorteo_id)
                ->where('pago_id',$carton_modif->pago_id)
                ->first()
                ->update([
                    'status' => 'Pago recibido'
                ]);
        }


        $busqueda_carro = Cart::where('pago_id',$this->registro_select)
            ->get();

        foreach($busqueda_carro as $busq){
            $busq->update([
                'status' => 'pagado'
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

        $pago_usuario = PagoSorteo::where('pago_id',$this->registro_select)
        ->get();

        foreach($pago_usuario as $pu){

            PagoSorteo::where('id',$pu->id)->first()
                ->update([
                    'status' => 'Pago no recibido'
                ]);

        }

        foreach($pagos_carton as $carton_modif){

            CartonSorteo::where('id',$carton_modif->id)
                ->update([
                    'status_carton' => 'Disponible',
                    'status_pago' => '',
                    'pago_id' => null,
                    'user_id' => null
                ]);

            
        }

        $busqueda_carro = Cart::where('pago_id',$this->registro_select)
            ->get();

        foreach($busqueda_carro as $busq){
            $busq->update([
                'status' => 'cancelado'
            ]);
        }

    }
}
