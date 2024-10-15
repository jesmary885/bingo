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
