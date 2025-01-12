<?php

namespace App\Http\Livewire\Admin\Sorteo;

use App\Models\Carton;
use App\Models\CartonSorteo;
use App\Models\Sorteo;
use Livewire\Component;

class CrearSorteo extends Component
{

    public $porcentaje_ganancia, $porcentaje_ganancia_2, $porcentaje_ganancia_3, $premios = 'null',$sorteo,$type_1, $type_2, $type_3, $fecha_inicio,$tipo, $tipo_sorteo, $estado = 'Aperturado', $precio_carton_dolar ;

    public $isopen = false;

    protected $listeners = ['render'];

    public function mount(){
        if($this->tipo == 'editar'){

            $sorteo_editar = Sorteo::where('id',$this->sorteo)->first();

            $this->fecha_inicio = $sorteo_editar->fecha_ejecucion;

            $sorte_2= Sorteo::where('id',$this->sorteo)->first()->type_2;
            $sorte_3= Sorteo::where('id',$this->sorteo)->first()->type_3;
    
            if($sorte_3 == null && $sorte_2 == null) $this->premios = 'Un premio';
            if($sorte_3 == null && $sorte_2 != null) $this->premios = 'Dos premios';
            if($sorte_3 != null && $sorte_2 != null)  $this->premios = 'Tres premios';

            $this->type_1 = $sorteo_editar->type_1;
            $this->porcentaje_ganancia = $sorteo_editar->porcentaje_ganancia;

            if($this->premios == "Dos premios"){
                $this->type_2 = $sorteo_editar->type_2;
                $this->porcentaje_ganancia_2 = $sorteo_editar->porcentaje_ganancia_2do_lugar;
            }

            if($this->premios == "Tres premios"){
                $this->type_2 = $sorteo_editar->type_2;
                $this->porcentaje_ganancia_2 = $sorteo_editar->porcentaje_ganancia_2do_lugar;

                $this->type_3 = $sorteo_editar->type_3;
                $this->porcentaje_ganancia_3 = $sorteo_editar->porcentaje_ganancia_3er_lugar;
            }

            $this->estado = $sorteo_editar->status;

            $this->precio_carton_dolar = $sorteo_editar->precio_carton_dolar;
        }
    }

    

    protected $rules_un_premio = [
        'fecha_inicio' => 'required',
        'premios' => 'required',
        'type_1' => 'required',
        'porcentaje_ganancia' => 'required',
        'precio_carton_dolar' => 'required',
        'estado' => 'required',
    ];

    protected $rules_dos_premios = [
        'fecha_inicio' => 'required',
        'premios' => 'required',
        'type_1' => 'required',
        'porcentaje_ganancia' => 'required',
        'type_2' => 'required',
        'porcentaje_ganancia_2' => 'required',
        'precio_carton_dolar' => 'required',
        'estado' => 'required',
    ];

    protected $rules_tres_premios = [
        'fecha_inicio' => 'required',
        'premios' => 'required',
        'type_1' => 'required',
        'porcentaje_ganancia' => 'required',
        'type_2' => 'required',
        'porcentaje_ganancia_2' => 'required',
        'precio_carton_dolar' => 'required',
        'type_3' => 'required',
        'porcentaje_ganancia_3' => 'required',
        'estado' => 'required',
    ];

    public function open()
    {
        $this->isopen = true;  
    }
    public function close()
    {
        $this->isopen = false;  
    }

    public function render()
    {
        return view('livewire.admin.sorteo.crear-sorteo');
    }

    public function procesar(){

        if($this->premios == "Dos premios"){

            $rules = $this->rules_dos_premios;
            $this->validate($rules);
        }
        elseif($this->premios == "Tres premios"){

            $rules = $this->rules_tres_premios;
            $this->validate($rules);
        }
        else{

            $rules = $this->rules_un_premio;
            $this->validate($rules);
        }

        if($this->tipo == 'agregar'){

            if($this->premios == "Un premio"){

                $sorteo_creado = Sorteo::create([
                    'fecha_ejecucion' => $this->fecha_inicio,
                    'type_1' => $this->type_1,
                    'porcentaje_ganancia' => $this->porcentaje_ganancia,
                    'precio_carton_dolar' => $this->precio_carton_dolar,
                    'status' => 'Aperturado']);

                    $this->reset(['fecha_inicio','type_1','porcentaje_ganancia','precio_carton_dolar']);

            }

            elseif($this->premios == "Dos premios"){
                $sorteo_creado = Sorteo::create([
                    'fecha_ejecucion' => $this->fecha_inicio,
                    'type_1' => $this->type_1,
                    'type_2' => $this->type_2,
                    'porcentaje_ganancia' => $this->porcentaje_ganancia,
                    'porcentaje_ganancia_2do_lugar' => $this->porcentaje_ganancia_2,
                    'precio_carton_dolar' => $this->precio_carton_dolar,
                    'status' => 'Aperturado']);

                    $this->reset(['fecha_inicio','type_1','type_2','porcentaje_ganancia','porcentaje_ganancia_2','precio_carton_dolar']);

            }else{

                $sorteo_creado = Sorteo::create([
                    'fecha_ejecucion' => $this->fecha_inicio,
                    'type_1' => $this->type_1,
                    'type_2' => $this->type_2,
                    'type_3' => $this->type_3,
                    'porcentaje_ganancia' => $this->porcentaje_ganancia,
                    'porcentaje_ganancia_2do_lugar' => $this->porcentaje_ganancia_2,
                    'porcentaje_ganancia_3er_lugar' => $this->porcentaje_ganancia_3,
                    'precio_carton_dolar' => $this->precio_carton_dolar,
                    'status' => 'Aperturado']);

                    $this->reset(['fecha_inicio','type_1','type_2','type_3','porcentaje_ganancia','porcentaje_ganancia_2','porcentaje_ganancia_3','precio_carton_dolar']);
            }

            $cartones_salvados=Carton::all();

            foreach($cartones_salvados as $cs){
                CartonSorteo::create([
                    'sorteo_id' => $sorteo_creado->id,
                    'carton_id' => $cs->id,
                    'status_carton' => 'Disponible',
                    'status_juego' => 'Sin estado'
                ]);
            }

            $this->emit('alert','Datos registrados correctamente');
            $this->emitTo('admin.sorteo.crear-index','render');
            $this->isopen = false;  

        }
        else{

         

            $sorteo_modf = Sorteo::where('id',$this->sorteo)->first();

            if($this->estado == 'Iniciado'){
                $sorteos_iniciados = Sorteo::where('status','Iniciado')->first();

                if($sorteos_iniciados){

                    $sorteo_iniciado = 1;

                    $this->emit('alert','Hay otro sorteo iniciado, debes finalizarlo para iniciar este');

                }
                else $sorteo_iniciado = 0;
            }

            else $sorteo_iniciado = 0;

            if($sorteo_iniciado == 0){

                if($this->premios == "Un premio"){

                    $sorteo_modf->update([
                        'fecha_ejecucion' => $this->fecha_inicio,
                        'type_1' => $this->type_1,
                        'porcentaje_ganancia' => $this->porcentaje_ganancia,
                        'precio_carton_dolar' => $this->precio_carton_dolar,
                        'type_2' => null,
                        'type_3' => null,
                        'porcentaje_ganancia_2do_lugar' => null,
                        'porcentaje_ganancia_3er_lugar' => null,
                        'status' => $this->estado]);
                }
    
                elseif($this->premios == "Dos premios"){
    
                    $sorteo_modf->update([
                        'fecha_ejecucion' => $this->fecha_inicio,
                        'type_1' => $this->type_1,
                        'type_2' => $this->type_2,
                        'type_3' => null,
                        'porcentaje_ganancia' => $this->porcentaje_ganancia,
                        'porcentaje_ganancia_2do_lugar' => $this->porcentaje_ganancia_2,
                        'porcentaje_ganancia_3er_lugar' => null,
                        'status' => $this->estado,
                        'precio_carton_dolar' => $this->precio_carton_dolar]);
                }else{
    
                    $sorteo_modf->update([
                        'fecha_ejecucion' => $this->fecha_inicio,
                        'type_1' => $this->type_1,
                        'type_2' => $this->type_2,
                        'type_3' => $this->type_3,
                        'porcentaje_ganancia' => $this->porcentaje_ganancia,
                        'porcentaje_ganancia_2do_lugar' => $this->porcentaje_ganancia_2,
                        'porcentaje_ganancia_3er_lugar' => $this->porcentaje_ganancia_3,
                        'precio_carton_dolar' => $this->precio_carton_dolar,
                        'status' => $this->estado]);
                    
                }

                $this->emit('alert','Datos modificados correctamente');
                $this->emitTo('admin.sorteo.crear-index','render');
                $this->isopen = false;  

            }

            
        }
        
    }
}
