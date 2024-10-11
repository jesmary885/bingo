<?php

namespace App\Http\Livewire\Admin\Sorteo;

use App\Models\Sorteo;
use Livewire\Component;

class CrearSorteo extends Component
{

    public $porcentaje_ganancia, $porcentaje_ganancia_2, $premios = 'null',$sorteo,$type_1, $type_2,$fecha_inicio,$tipo, $tipo_sorteo, $estado, $precio_carton_dolar ;

    public $isopen = false;

    protected $listeners = ['render'];

    public function mount(){
        if($this->tipo == 'editar'){

            $sorteo_editar = Sorteo::where('id',$this->sorteo)->first();

            $this->fecha_inicio = $sorteo_editar->fecha_ejecucion;

            if($sorteo_editar->type_2 == null) $this->premios = "Un premio";
            else $this->premios = "Dos premios";

            $this->type_1 = $sorteo_editar->type_1;
            $this->porcentaje_ganancia = $sorteo_editar->porcentaje_ganancia;

            if($this->premios == "Dos premios"){
                $this->type_2 = $sorteo_editar->type_2;
                $this->porcentaje_ganancia_2 = $sorteo_editar->porcentaje_ganancia_2do_lugar;

            }
            $this->precio_carton_dolar = $sorteo_editar->precio_carton_dolar;
        }
    }

    

    protected $rules_un_premio = [
        'fecha_inicio' => 'required',
        'premios' => 'required',
        'type_1' => 'required',
        'porcentaje_ganancia' => 'required',
        'precio_carton_dolar' => 'required'
    ];

    protected $rules_dos_premios = [
        'fecha_inicio' => 'required',
        'premios' => 'required',
        'type_1' => 'required',
        'porcentaje_ganancia' => 'required',
        'type_2' => 'required',
        'porcentaje_ganancia_2' => 'required',
        'precio_carton_dolar' => 'required'
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
        else{

            $rules = $this->rules_un_premio;
            $this->validate($rules);
        }

        if($this->tipo == 'agregar'){

            if($this->premios == "Dos premios"){
                Sorteo::create([
                    'fecha_ejecucion' => $this->fecha_inicio,
                    'type_1' => $this->type_1,
                    'type_2' => $this->type_2,
                    'porcentaje_ganancia' => $this->porcentaje_ganancia,
                    'porcentaje_ganancia_2do_lugar' => $this->porcentaje_ganancia_2,
                    'precio_carton_dolar' => $this->precio_carton_dolar,
                    'status' => 'Aperturado']);

                    $this->reset(['fecha_inicio','type_1','type_2','porcentaje_ganancia','porcentaje_ganancia_2','precio_carton_dolar']);

            }else{
                Sorteo::create([
                    'fecha_ejecucion' => $this->fecha_inicio,
                    'type_1' => $this->type_1,
                    'porcentaje_ganancia' => $this->porcentaje_ganancia,
                    'precio_carton_dolar' => $this->precio_carton_dolar,
                    'status' => 'Aperturado']);

                    $this->reset(['fecha_inicio','type_1','porcentaje_ganancia','precio_carton_dolar']);
            }
        }
        else{

            $sorteo_modf = Sorteo::where('id',$this->sorteo)->first();

            if($this->premios == "Dos premios"){

                $sorteo_modf->update([
                    'fecha_ejecucion' => $this->fecha_inicio,
                    'type_1' => $this->type_1,
                    'type_2' => $this->type_2,
                    'porcentaje_ganancia' => $this->porcentaje_ganancia,
                    'porcentaje_ganancia_2do_lugar' => $this->porcentaje_ganancia_2,
                    'precio_carton_dolar' => $this->precio_carton_dolar,
                    'status' => 'Aperturado']);
            }else{
                $sorteo_modf->update([
                    'fecha_ejecucion' => $this->fecha_inicio,
                    'type_1' => $this->type_1,
                    'porcentaje_ganancia' => $this->porcentaje_ganancia,
                    'precio_carton_dolar' => $this->precio_carton_dolar,
                    'status' => 'Aperturado']);
            }
        }
        $this->emit('alert','Datos registrados correctamente');
        $this->emitTo('admin.sorteo.crear-index','render');
        $this->isopen = false;  
    }
}
