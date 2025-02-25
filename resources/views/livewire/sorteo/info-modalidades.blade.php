<div class=" font-Arima " >

    @if($tipo == 'Cartones')

    <button type="button" wire:click="$set('open',true)" type="button" class=" ml-0 md:ml-2 mt-1 md:mt-0 middle none focus:outline-none  center font-Arima  mr-1 rounded-lg bg-red-500 py-1 px-2 text-xs font-bold uppercase text-white shadow-md shadow-red-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
        INFORMACIÓN DE MODALIDADES
    </button>

    @else

    <button type="button" wire:click="$set('open',true)" type="button" class=" ml-0 md:ml-2 mt-1 md:mt-0 middle none focus:outline-none  center font-Arima  mr-1 rounded-lg bg-red-500 px-2 text-md lg:text-lg font-bold uppercase text-white shadow-md shadow-red-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
        Ver
    </button>

    @endif



  

    <x-dialog-modal wire:model="open">

        <x-slot name="title">
            <div class=" flex justify-between ">

                <p>INFORMACIÓN DE MODALIDADES</p>

                <button type="button" wire:click="close"  wire:loading.attr="disabled"  class="py-2.5 px-3 me-2 mb-2 text-sm font-bold text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    X
                </button>

            </div>
            
        </x-slot>

        <x-slot name="content">
            <div class="flex"  >

                <p class="text-sm text-gray-500 mt-2 mr-1 font-bold" >Modalidades del sorteo:</p>

                <div class="mt-2">

                    @if($sorteo->type_2 == null && $sorteo->type_3 == null)
                        <h3 class="text-sm text-blue-500 font-bold">

                            Sorteo {{$sorteo->type_1}}
                        
                        </h3>
                    @elseif($sorteo->type_2 != null && $sorteo->type_3 == null)

                        <h3 class="text-sm text-blue-500 font-bold">

                            1er lugar (Sorteo {{$sorteo->type_1}})
                        
                        </h3>

                        <h3 class="text-sm text-red-500 font-bold">

                            2do lugar (Sorteo  {{$sorteo->type_2}})
                        
                        </h3>

                    @elseif($sorteo->type_2 != null && $sorteo->type_3 != null)
                        <h3 class="text-sm text-blue-500 font-bold">

                            1er lugar (Sorteo {{$sorteo->type_1}})
                        
                        </h3>

                        <h3 class="text-sm text-red-500 font-bold">

                            2do lugar (Sorteo  {{$sorteo->type_2}})
                        
                        </h3>

                        <h3 class="text-sm text-green-500 font-bold ">

                            3er lugar (Sorteo  {{$sorteo->type_3}})
                        
                        </h3>
                    @endif

                </div>

            </div>


                <div>

                    <p class="text-sm text-gray-500 mt-2 mr-1 font-bold " >Presentación de modalidades:</p>

                    @if($tradicional == 1)
             
                    <div class=" card w-full container p-8 bg-white text-center  border border-gray-100 rounded-lg shadow-lg  md:mr-2">
                        <h4 class="text-blue-500 leading-relaxed font-bold text-sm">TRADICIONAL</h4>

                        <p class="mt-1 text-gray-500 text-center font-Arima text-sm">
                            Jugaremos con 7 patrones (Línea horizontal, Línea vertical, Cuatro esquinas, Diagonal de derecha a izquierda y Diagonal de izquierda a derecha)
                        </p>

                        <div class=" grid grid-cols-2 md:grid-cols-3 " >

                            <div class="bg-white shadow-md border border-gray-200 rounded-lg  dark:bg-gray-800 dark:border-gray-700">
                         
                                <img class="  object-fill rounded-t-lg " src="{{Storage::url('img/Linea_horizontal.png') }}"alt="">
                             
                               
                                <div class="p-5">
                                  
                                        <h5 class="text-green-500 font-bold text-md tracking-tight mb-2 dark:text-white">LÍNEA HORIZONTAL </h5>
    
                                        <p class="font-normal text-gray-700 text-sm dark:text-gray-400">Aplica para todas las filas</p>
                                    
                                </div>
                            </div>
                            

                            <div class="bg-white shadow-md border border-gray-200 rounded-lg  dark:bg-gray-800 dark:border-gray-700">
                         
                                <img class="  object-fill rounded-t-lg " src="{{Storage::url('img/Linea_vertical.png') }}"alt="">
                             
                               
                                <div class="p-5">
                                  
                                        <h5 class="text-green-500 font-bold text-md tracking-tight mb-2 dark:text-white">LÍNEA VERTICAL</h5>
    
                                        <p class="font-normal text-gray-700 text-sm dark:text-gray-400">Aplica para todas las columnas</p>
                                    
                                </div>
                            </div>

                            <div class="bg-white shadow-md border border-gray-200 rounded-lg  dark:bg-gray-800 dark:border-gray-700">
                         
                                <img class="  object-fill rounded-t-lg " src="{{Storage::url('img/cuatro_esuinas.png') }}"alt="">
                             
                               
                                <div class="p-5">
                                  
                                        <h5 class="text-green-500 font-bold text-md tracking-tight mb-2 dark:text-white">CUATRO ESQUINAS </h5>
    
                                        <p class="font-normal text-gray-700 text-sm dark:text-gray-400">Deben marcarse las 4 esquinas</p>
                                    
                                </div>
                            </div>

                            <div class="bg-white shadow-md border border-gray-200 rounded-lg  dark:bg-gray-800 dark:border-gray-700">
                         
                                <img class="  object-fill rounded-t-lg " src="{{Storage::url('img/diagonal_di.png') }}"alt="">
                             
                               
                                <div class="p-5">
                                  
                                        <h5 class="text-green-500 font-bold text-md tracking-tight mb-2 dark:text-white">DIAGONAL - DERECHA A IZQUIERDA </h5>
    
                                        <p class="font-normal text-gray-700 text-sm dark:text-gray-400">Diagonal de la esquina derecha a la esquina izquierda</p>
                                    
                                </div>
                            </div>

                            <div class="bg-white shadow-md border border-gray-200 rounded-lg  dark:bg-gray-800 dark:border-gray-700">
                         
                                <img class="  object-fill rounded-t-lg " src="{{Storage::url('img/Diagonal_id.jpg') }}"alt="">
                             
                               
                                <div class="p-5">
                                  
                                        <h5 class="text-green-500 font-bold text-md tracking-tight mb-2 dark:text-white">DIAGONAL - IZQUIERDA A DERECHA</h5>
    
                                        <p class="font-normal text-gray-700 text-sm dark:text-gray-400">Diagonal de la esquina izquierda a la esquina derecha</p>
                                    
                                </div>
                            </div>

                            <div class="bg-white shadow-md border border-gray-200 rounded-lg  dark:bg-gray-800 dark:border-gray-700">
                         
                                <img class="  object-fill rounded-t-lg " src="{{Storage::url('img/cruz_grande.jpg') }}"alt="">
                             
                               
                                <div class="p-5">
                                  
                                        <h5 class="text-green-500 font-bold text-md tracking-tight mb-2 dark:text-white">CRUZ GRANDE</h5>
    
                                        <p class="font-normal text-gray-700 text-sm dark:text-gray-400">Deben estar marcadas los extremos de la coumna N y los dos extremos de la fila 3</p>
                                    
                                </div>
                            </div>

                            <div class="bg-white shadow-md border border-gray-200 rounded-lg  dark:bg-gray-800 dark:border-gray-700">
                         
                                <img class="  object-fill rounded-t-lg " src="{{Storage::url('img/cruz_pequeña.jpg') }}"alt="">
                             
                               
                                <div class="p-5">
                                  
                                        <h5 class="text-green-500 font-bold text-md tracking-tight mb-2 dark:text-white">CRUZ PEQUEÑA</h5>
    
                                        <p class="font-normal text-gray-700 text-sm dark:text-gray-400">En contraposición de la cruz grande, debe estar marcada la casilla central y las 4 alrededor de ella </p>
                                    
                                </div>
                            </div>

                        </div>

                        

                        

                            
                       
                
                    </div>

                    @endif

                    @if($carton_lleno == 1)

                    <div class=" card w-full container p-8 bg-white text-center  border border-gray-100 rounded-lg shadow-lg  md:mr-2">
                        <h4 class="text-blue-500 leading-relaxed font-bold">CARTÓN LLENO</h4>
                      

                        <p class="mt-1 text-gray-500 text-center  font-Arima   ">
                            El cartón debe estar marcado completamente para ganar en esta modalidad
                        </p>

                        <div class="flex justify-center"  >

                            <div class="bg-white shadow-md border border-gray-200 rounded-lg  dark:bg-gray-800 dark:border-gray-700">
                         
                                <img class=" object-fill rounded-t-lg  " src="{{Storage::url('img/carton_lleno.png') }}"alt="">
                               
                                
                            </div>

                           

                            
                           

                        </div>


                    </div>
        
                 

                    @endif

                   
                </div>
 
            
        </x-slot>

        <x-slot name="footer">

            <button type="button" wire:click="close" wire:loading.attr="disabled" class="text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Cerrar
            </button>

        </x-slot>

       

    </x-dialog-modal>


    
  

</div>