<div>

    <div class="row">
        <div class="col-12 col-sm-4">
            <div class="info-box bg-light">
                <div class="info-box-content">
                    <span class="info-box-text text-center text-muted">Afiliados del día</span>
                    <span class="info-box-number text-center text-muted mb-0">{{$registros_dias}}</span>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-4">
            <div class="info-box bg-light">
                <div class="info-box-content">
                    <span class="info-box-text text-center text-muted">Ganancias del día</span>
                    <span class="info-box-number text-center text-muted mb-0">{{$ganancias_dia}}</span>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-4">
            <div class="info-box bg-light">
                <div class="info-box-content">
                    <span class="info-box-text text-center text-muted">Ganancias del mes</span>
                    <span class="info-box-number text-center text-muted mb-0">{{$ganancias_mes}}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h2 class="text-gray-500 font-bold  text-lg flex justify-center ">
                GANANCIAS POR FECHA
            </h2>
        </div>

        <div class="card-body">

            <p class="text-gray-500 font-semibold  text-md mb-4 flex justify-center ">
                Ingrese el rango de fechas en que desee consultar las ganancias
            </p>


            <div class="flex mb-4 justify-center ">
                <div class="lg:flex justify-items-stretch ">
                    <div>
                                                    <div wire:ignore x-data="datepicker()">
                                                        <div class="flex flex-col">
                                                            <div class="flex items-center gap-2">
                                                                <input 
                                                                    type="text" 
                                                                    class="px-4 form-control   " 
                                                                    x-ref="myDatepicker" 
                                                                    wire:model="fecha_inicio" 
                                                                    placeholder="Fecha inicio">
                                                                    <span class="cursor-pointer underline" x-on:click="reset()">
                                                                        <svg class="h-6 w-5 text-gray-500 " fill="currentColor" viewBox="0 0 20 20">
                                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6 2C5.44772 2 5 2.44772 5 3V4H4C2.89543 4 2 4.89543 2 6V16C2 17.1046 2.89543 18 4 18H16C17.1046 18 18 17.1046 18 16V6C18 4.89543 17.1046 4 16 4H15V3C15 2.44772 14.5523 2 14 2C13.4477 2 13 2.44772 13 3V4H7V3C7 2.44772 6.55228 2 6 2ZM6 7C5.44772 7 5 7.44772 5 8C5 8.55228 5.44772 9 6 9H14C14.5523 9 15 8.55228 15 8C15 7.44772 14.5523 7 14 7H6Z"/>
                                                                        </svg>
                                                                    </span>
                                                            </div>
                                                        </div>
                                                    </div>
                    </div>
            
                    <p class="ml-2 mr-2 text-gray-700 font-semibold">-</p>
                    <div>
                                                    <div wire:ignore x-data="datepicker()" class=" ">
                                                        <div class="flex flex-col">
                                                            <div class="flex items-center gap-2">
                                                                <input 
                                                                    type="text" 
                                                                    class="px-4 form-control" 
                                                                    x-ref="myDatepicker" 
                                                                    wire:model="fecha_fin" 
                                                                    placeholder="Fecha fin">
                                                                <span class="cursor-pointer underline" x-on:click="reset()">
                                                                    <svg class="h-6 w-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6 2C5.44772 2 5 2.44772 5 3V4H4C2.89543 4 2 4.89543 2 6V16C2 17.1046 2.89543 18 4 18H16C17.1046 18 18 17.1046 18 16V6C18 4.89543 17.1046 4 16 4H15V3C15 2.44772 14.5523 2 14 2C13.4477 2 13 2.44772 13 3V4H7V3C7 2.44772 6.55228 2 6 2ZM6 7C5.44772 7 5 7.44772 5 8C5 8.55228 5.44772 9 6 9H14C14.5523 9 15 8.55228 15 8C15 7.44772 14.5523 7 14 7H6Z"/>
                                                                    </svg>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                    </div>
                </div>
            
                
            </div>
        
            @if($carga_total == 1)
        
            <div class="flex justify-center">
                <div class="col-12 col-sm-4">
                    <div class="info-box bg-light">
                        <div class="info-box-content">
                            <span class="info-box-text text-center text-gray-500 font-semibold  text-md">Ganancia</span>
                            <span class="info-box-number text-center text-muted mb-0">{{$ganancias_mes_rango}} $ - (Bs. {{$ganancias_mes_rango * $dolar_hoy}})</span>
                        </div>
                    </div>
                </div>
            </div>

            @if ($sorteo_fecha->count())
     
            <div class="overflow-x-auto relative shadow-md sm:rounded-lg container mt-2">
                <table class="table text-sm table-bordered table-responsive-lg table-responsive-md table-responsive-sm">
                    <thead class="text-xs uppercase bg-gray-700 text-gray-400">
                        <tr>
                            <th class="text-center py-3">Fecha</th>
                            <th class="text-center py-3">Sorteo Nro</th>
                            <th class="text-center">Cant de cartones vendidos</th>
                            <th class="text-center">Precio cartón</th>
                            <th class="text-center">Ganancia BING+</th>
                            <th class="text-center">Abogada</th>
                            <th class="text-center">Ángel</th>
                            <th class="text-center">Cristián</th>
                            <th class="text-center">Erik</th>
                            <th class="text-center">Jesmary</th>
                            <th class="text-center">Jesús</th>
                            <th class="text-center">Miguel</th>
                            <th class="text-center">Norberto</th>



                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sorteo_fecha as $sorteo)
                                <tr class=" border-gray-700 hover:bg-gray-300">

                                    <td class="text-center">{{\Carbon\Carbon::parse($sorteo->updated_at)->format('d-m-Y h:i')}}</td>
                                    <th class="py-3 text-center font-medium whitespace-nowrap ">{{$sorteo->id}}</th>
                                    <td class="text-center">{{$this->cartones_vendidos($sorteo->id)}}</td>
                                    <td class="text-center">{{$sorteo->precio_carton_dolar}} $</td>
                                      <td class="text-center">{{$this->ganancia_dolar_bing($sorteo->id)}} $ - (Bs. {{$this->ganancia_dolar_bing_bs($sorteo->id)}})</td>
                                    <td class="text-center">{{$this->ganancia_dolar_admin('abogada',$sorteo->id)}} $ - (Bs. {{$this->ganancia_dolar_admin_bs('abogada',$sorteo->id)}}) </td>
                                    <td class="text-center">{{$this->ganancia_dolar_admin('angel',$sorteo->id)}} $ - (Bs. {{$this->ganancia_dolar_admin_bs('angel',$sorteo->id)}}) </td>
                                    <td class="text-center">{{$this->ganancia_dolar_admin('cristian',$sorteo->id)}} $ - (Bs. {{$this->ganancia_dolar_admin_bs('cristian',$sorteo->id)}}) </td>
                                    <td class="text-center">{{$this->ganancia_dolar_admin('erik',$sorteo->id)}} $ - (Bs. {{$this->ganancia_dolar_admin_bs('erik',$sorteo->id)}}) </td>
                                    <td class="text-center">{{$this->ganancia_dolar_admin('jesmary',$sorteo->id)}} $ - (Bs. {{$this->ganancia_dolar_admin_bs('jesmary',$sorteo->id)}}) </td>
                                    <td class="text-center">{{$this->ganancia_dolar_admin('jesus',$sorteo->id)}} $ - (Bs. {{$this->ganancia_dolar_admin_bs('jesus',$sorteo->id)}}) </td>
                                    <td class="text-center">{{$this->ganancia_dolar_admin('miguel',$sorteo->id)}} $ - (Bs. {{$this->ganancia_dolar_admin_bs('miguel',$sorteo->id)}}) </td>
                                    <td class="text-center">{{$this->ganancia_dolar_admin('norberto',$sorteo->id)}} $ - (Bs. {{$this->ganancia_dolar_admin_bs('norberto',$sorteo->id)}}) </td>
    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
             
            
            @else
                 <div class="card-body">
                    <strong>No hay registros</strong>
                </div>
            @endif







        
            @endif

        </div>

        <div class="card-footer">

            <button type="button" class="btn btn-primary " wire:click="buscar">Buscar</button>

        </div>



    </div>

    @push('js')

        <script>
            document.addEventListener('alpine:init',()=>{
                Alpine.data('datepicker',()=>({
            
                    init(){
                        flatpickr(this.$refs.myDatepicker, {dateFormat:'Y-m-d H:i', altInput:true,enableTime:true, altFormat: 'F j, Y h:i K',})
                    },
                }))
            })
        
        </script>

    @endpush
    


</div>
