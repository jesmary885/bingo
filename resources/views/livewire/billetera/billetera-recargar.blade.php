<div>

    <style>
      
        .icon::after{
        content: '';
        display: block;
        position: absolute;
        border-top: 17px solid transparent;
        border-bottom: 15px solid transparent;
        border-left: 14px solid rgb(37 99 235 / var(--tw-bg-opacity));
        left: 100%;
        top: 0;
      }
      
      input[type="file"] {
              display: none;
          }
      
          .custom-file-upload {
          border: 1px solid #ccc;
         
          padding: 6px 12px;
          cursor: pointer;
          }
      
    </style>


    <button type="button" wire:click="$set('open',true)" type="button" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">

        RECARGAR
    </button>

    <x-dialog-modal wire:model="open">

        <x-slot name="title">
            <div class=" flex justify-between ">

                <p>RECARGAR BILLETERA</p>

                <button type="button" wire:click="close" wire:loading.attr="disabled"  class="py-2.5 px-3 me-2 mb-2 text-sm font-bold text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    X
                </button>





            </div>
            
        </x-slot>

        <x-slot name="content">

            <div class="mt-2 w-full h-full rounded-lg border bg-white p-1 shadow-md md:mt-0 ">
 

                <div class="bg-white dark:bg-gray-900">
                    <div class=" px-6 py-2 mx-auto">
                        <p class="text-xl text-center text-gray-700 dark:text-gray-300">
                            Selecciona el método de pago
                        </p>
        
                        <div class="mt-2 space-y-2 ">
                           

                            <button wire:click="metodo('binance')" class=" w-full px-4 py-4 mx-auto border @if($metodo_select == 1) border-blue-600 @endif cursor-pointer rounded-xl">
                                <div class="flex items-center justify-between ">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 @if($metodo_select == 1) text-blue-600 @else text-gray-400 @endif sm:h-9 sm:w-9" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                        </svg>
            
                                        <div class="flex flex-col items-center mx-5 space-y-1">
                                            <h2 class="text-sm font-medium text-gray-700 dark:text-gray-200">USDT BINANCE</h2>
                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="px-4 text-xs mt-1 text-blue-500 bg-gray-100 rounded-full text-center  ">
                                    queryset2023@gmail.com
                                </div>

                            </button>
                            
                            <button wire:click="metodo('pago_movil')" class=" w-full px-4 py-4 mx-auto border @if($metodo_select == 2) border-blue-600 @endif cursor-pointer rounded-xl dark:border-gray-700">
                                <div class="flex items-center justify-between ">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5  @if($metodo_select == 2) text-blue-600 @else text-gray-400 @endif sm:h-9 sm:w-9" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                        </svg>
            
                                        <div class="flex flex-col items-center mx-5 space-y-1">
                                            <h2 class="text-sm font-medium text-gray-700 dark:text-gray-200">PAGO MÓVIL</h2>
                                            
                                        </div>
                                    </div>

                                </div>

                                <div class="px-4 text-xs mt-1 text-blue-500 bg-gray-100 rounded-full text-center  dark:bg-gray-700 ">
                                    (0134) (4.909.173) (04148264029)
                                </div>

                            </button>

                           

                        </div>

                        @if($adjunta == 1)

                        <div class="mt-6 mb-2" >

                            <p class="text-xl text-center text-gray-700 dark:text-gray-300">
                                Adjunta la constancia de pago
                            </p>
            
    
    
                            <div class="mt-2 flex-auto  ">
                                 
                                    <div class="flex w-full justify-center ">
                                        <label class="custom-file-upload flex w-1/2  bg-white rounded-md py-8 text-md font-medium text-gray-700 dark:text-gray-200 ">
                                            <input type="file"  name="constancia" wire:model="constancia" class="image"/>
                                            <svg class=" w-5 h-5 text-gray-400 mr-2 " viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="m512 144v288c0 26.5-21.5 48-48 48h-416c-26.5 0-48-21.5-48-48v-288c0-26.5 21.5-48 48-48h88l12.3-32.9c7-18.7 24.9-31.1 44.9-31.1h125.5c20 0 37.9 12.4 44.9 31.1l12.4 32.9h88c26.5 0 48 21.5 48 48zm-136 144c0-66.2-53.8-120-120-120s-120 53.8-120 120 53.8 120 120 120 120-53.8 120-120zm-32 0c0 48.5-39.5 88-88 88s-88-39.5-88-88 39.5-88 88-88 88 39.5 88 88z"/></svg>
                                              Selecciona un archivo
                                        </label>
                      
                                        @if($constancia) 
                                            <svg xmlns="http://www.w3.org/2000/svg" class=" w-8 h-8 mt-1 ml-1" viewBox="0 0 64 64">
                                                <path fill="#4bd37b" d="M56 2L18.8 42.9 8 34.7H2L18.8 62 62 2z"/>
                                            </svg>
                                            
                                        @endif
                                    </div>
                            </div>

                  

                            <div class="mt-6 mb-2" >

                                <p class="text-xl text-center text-gray-700 dark:text-gray-300">
                                    Ingrese el monto en dólares
                                </p>

                                <div class="relative mb-2 mt-2 w-full flex justify-center ">

                                    <input wire:model="monto" type="number" min="1" max="500" class="inputNumber text-center w-1/2 text-sm appearance-none block text-gray-700 border border-gray-600 rounded px-1 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                
                                </div>

                            </div>



                        </div>

        


                      
                      

                        @endif
                    </div>
                </div>
            </div>


     

        </x-slot>

        <x-slot name="footer">

            @if($constancia)

            <button type="button" wire:click="save" wire:loading.attr="disabled" class="text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Guardar
            </button>

            @endif

            <button type="button" wire:click="close" wire:loading.attr="disabled" class="text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Cerrar
            </button>



      

        </x-slot>

    </x-dialog-modal>
  

</div>