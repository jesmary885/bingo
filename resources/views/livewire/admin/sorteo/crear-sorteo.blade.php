<div>

    @if($tipo == 'agregar')

    <button type="button" wire:click="open" type="button" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">

      CREAR SORTEO
    </button>

    @else

    <button type="button" wire:click="open" class="py-1 px-3 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
        EDITAR
    </button>

    @endif

    @if ($isopen)

    <div class="modal d-block" tabindex="-1" role="dialog" style="overflow-y: auto; display: block;">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content container mx-4">
                <div class="modal-header w-full">
                    <div class=" flex justify-between w-full">

                        <p class="font-bold text-gray-600 w-full mt-2 " >SORTEOS</p>

                        <div class=" flex-1 w-full">
                            <button type="button" wire:click="close" wire:loading.attr="disabled"  class="py-2.5 px-3 me-2 mb-2 text-sm font-bold text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                X
                            </button>

                        </div>


                        

                    </div>
                </div>

                <div class="container">

                    <div class=" w-full mt-2">

                        <div class="w-1/2">
                            <x-label value="Fecha de ejecución" />

                            <div wire:ignore x-data="datepicker()">
                                <div class="flex flex-col">
                                    <div class="flex items-center gap-2">
                                        <input 
                                            type="text" 
                                            class="px-4 outline-none cursor-pointer rounded" 
                                            x-ref="myDatepicker" 
                                            wire:model="fecha_inicio" 
                                            placeholder="Fecha inicio">
                                            <span class="cursor-pointer underline" x-on:click="reset()">
                                                <svg class="h-6 w-5 text-gray-400 " fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6 2C5.44772 2 5 2.44772 5 3V4H4C2.89543 4 2 4.89543 2 6V16C2 17.1046 2.89543 18 4 18H16C17.1046 18 18 17.1046 18 16V6C18 4.89543 17.1046 4 16 4H15V3C15 2.44772 14.5523 2 14 2C13.4477 2 13 2.44772 13 3V4H7V3C7 2.44772 6.55228 2 6 2ZM6 7C5.44772 7 5 7.44772 5 8C5 8.55228 5.44772 9 6 9H14C14.5523 9 15 8.55228 15 8C15 7.44772 14.5523 7 14 7H6Z"/>
                                                </svg>
                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-1/2 mt-4">
                        <x-label value="Cantidad de premios" />

                        <select wire:model="premios" id="premios" class=" mt-2 block w-full bg-gray-50 border border-gray-200 text-gray-700 py-1 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value="" selected>Seleccione una opción</option>
                            <option value="Un premio">Un premio</option>
                            <option value="Dos premios">Dos premios</option>
                        </select>
                        <x-input-error for="premios" />
                    </div>

                    

                    @if($premios == 'Un premio')

                        <div class="w-full flex justify-between mt-4 ">

                            <div class="w-1/2">
                                <x-label value="Tipo de sorteo" />

                                <select wire:model="type_1" id="type_1" class=" mt-2 block w-full bg-gray-50 border border-gray-200 text-gray-700 py-0.5 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                    <option value="" selected>Seleccione una opción</option>
                                    <option value="Tradicional">Tradicional</option>
                                    <option value="Carton lleno">Carton lleno</option>
                                </select>
                                <x-input-error for="type_1" />
                            </div>

                            <div class="w-1/2">

                                <x-label value="Porcentaje de ganancia del ganador" />
                                <input type="number" wire:model="porcentaje_ganancia" id="porcentaje_ganancia" class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-2.5 py-1 ml-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />

                                <x-input-error for="porcentaje_ganancia" />
                            </div>

                        </div>

                    @elseif($premios == 'Dos premios')

                        <div class="w-full flex justify-between mt-4 ">

                            <div class="w-1/2">
                                <x-label value="Tipo de sorteo del primer lugar" />

                                <select wire:model="type_1" id="type_1" class=" mt-2 block w-full bg-gray-50 border border-gray-200 text-gray-700 py-0.5 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                    <option value="" selected>Seleccione una opción</option>
                                    <option value="Tradicional">Tradicional</option>
                                    <option value="Carton lleno">Carton lleno</option>
                                </select>
                                <x-input-error for="type_1" />
                            </div>

                            <div class="w-1/2">

                                <x-label value="Porcentaje de ganancia del 1er lugar" />
                                <input type="number" wire:model="porcentaje_ganancia" id="porcentaje_ganancia" class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-2.5 py-1 ml-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />

                                <x-input-error for="porcentaje_ganancia" />
                            </div>

                        </div>

                        <div class="w-full flex justify-between mt-4 ">

                            <div class="w-1/2">
                                <x-label value="Tipo de sorteo del 2do lugar" />

                                <select wire:model="type_2" id="type_2" class=" mt-2 block w-full bg-gray-50 border border-gray-200 text-gray-700 py-0.5 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                    <option value="" selected>Seleccione una opción</option>
                                    <option value="Tradicional">Tradicional</option>
                                    <option value="Carton lleno">Carton lleno</option>
                                </select>
                                <x-input-error for="type_2" />
                            </div>

                            <div class="w-1/2">

                                <x-label value="Porcentaje de ganancia del 2do lugar" />
                                <input type="number" wire:model="porcentaje_ganancia_2" id="porcentaje_ganancia_2" class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-2.5 py-1 ml-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />

                                <x-input-error for="porcentaje_ganancia_2" />
                            </div>

                        </div>

                    @endif


                    <div class="w-1/2 mr-2 mt-4">

                        <x-label value="Precio por carton (en dólares)" />
                        <input type="number" wire:model="precio_carton_dolar" id="precio_carton_dolar" class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />

                    </div>

                </div>
            

                <div class="modal-footer mt-2">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="close">Cerrar</button>
                    <button type="button" class="btn btn-primary" wire:click="procesar">Guardar</button>

                </div>
            </div>
        </div>
    </div>

    @endif


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