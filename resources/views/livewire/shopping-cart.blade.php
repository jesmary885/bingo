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


<div class=" bg-gray-100 pt-4">

    @if (Cart::count())

        <div class=" justify-center px-2 md:flex md:space-x-2 ">
            <div class="rounded-lg border bg-white p-6 shadow-md flex-1  md:w-2/3">

           
                    <header class="border-b border-gray-200 px-5 py-4">
                        <div class="font-bold text-gray-800 text-md md:text-lg">Carro de compras</div>
                    </header>

                    <div class="overflow-x-auto p-3">
                        <table class="w-full table-auto">
                            <thead class="bg-gray-200 text-xs font-semibold uppercase text-gray-800">
                                <tr>
                                
                                    <th class="p-2">
                                        <div class="text-center font-semibold">CARTÓN</div>
                                    </th>
                                    <th class="p-2">
                                        <div class="text-center font-semibold">SERIAL</div>
                                    </th>

                                    <th class="p-2">
                                        <div class="text-center font-semibold">SORTEO</div>
                                    </th>
                
                                    <th class="p-2">
                                        <div class="text-center font-semibold">ELIMINAR</div>
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 text-sm">
                                @forelse (Cart::content() as $item)
                                <!-- record 1 -->
                                    <tr>
                                        <td class="p-2">

                                            @livewire('cartonview',['carton'=> $item->options['carton'],key($item->id)])
                                            
                                        </td>
                                        <td class="p-2 text-center ">
                                            <div class="font-medium text-gray-800">{{$item->options['serial']}}</div>
                                        </td>

                                        <td class="p-2 text-center ">
                                            <div class="font-medium text-gray-800">{{$item->options['sorteo']}}</div>
                                        </td>
    
                                        <td class="p-2">
                                            <div class="flex justify-center">
                                                <button wire:click="delete('{{$item->rowId}}','{{$item->options['carton']}}','{{$item->options['sorteo']}}')"
                                                    wire:loading.class="text-red-600 opacity-25">
                                                    <svg class="h-8 w-8 rounded-full p-1 hover:bg-gray-100 hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                


                
            </div>
        <!-- Sub total -->
            <div class="mt-2 h-full rounded-lg border bg-white p-1 shadow-md md:mt-0 md:w-1/3">
 

                <div class="bg-white dark:bg-gray-900">
                    <div class=" px-6 py-2 mx-auto">
                        <p class="text-xl text-center text-gray-500 dark:text-gray-300">
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
                                    
                                    <h2 class="text-2xl font-bold text-gray-500  dark:text-gray-300">$ {{floatval(Cart::subTotal())}}</h2>
    
                                
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
                                    
                                    <h2 class="text-2xl font-bold text-gray-500  dark:text-gray-300">Bs. {{(floatval(Cart::subTotal()) * $dolar_valor)}}</h2>
    
                                
                                </div>

                                <div class="px-4 text-xs mt-1 text-blue-500 bg-gray-100 rounded-full text-center  dark:bg-gray-700 ">
                                    (0134) (4.909.173) (04148264029)
                                </div>

                            </button>

                        </div>

                        @if($adjunta == 1)

                        <div class="mt-6 mb-2" >

                            <p class="text-xl text-center text-gray-500 dark:text-gray-300">
                                Adjunta la constancia de pago
                            </p>
            
    
    
                            <div class="mt-2 flex-auto  ">
                                 
                                    <div class="flex ">
                                        <label class="custom-file-upload flex w-full  bg-white rounded-md py-8 text-md font-medium text-gray-700 dark:text-gray-200 ">
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

                        </div>

        


                      
                      

                        @endif
                    </div>
                </div>

                @if($constancia)
                <button wire:click="procesar()" class="mt-4 px-2 w-full rounded-md bg-blue-500 py-1.5 font-medium text-blue-50 hover:bg-blue-600">PROCESAR PAGO</button>
                @endif
            </div>
        </div>

    @else
        <div class="flex flex-col items-center">
            <x-cart />
            <p class="text-lg text-gray-700 mt-4">TU CARRO DE COMPRAS ESTÁ VACÍO</p>

            <x-button-enlace href="/home" class="mt-4 px-16">
                Ir al inicio
            </x-button-enlace>
        </div>
    @endif


    
</div>


</div>


{{-- <div class=" py-2">
    <section class="bg-white rounded-lg shadow-lg p-6 text-gray-700">
    <h1 class="text-lg font-semibold  mb-6">CARRO DE COMPRAS</h1>

        @if (Cart::count())
        
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th></th>
                        <th>Precio</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach (Cart::content() as $item)
                        
                        <tr>
                            <td>

                                @livewire('cartonview',['carton'=> $item->options['carton'],key($item->id)])
                                
                            </td>

                            <td class="text-center">
                                <span>USD {{ $item->price }}</span>

                                <a class="ml-6 cursor-pointer hover:text-red-600"
                                    wire:click="delete('{{$item->rowId}}')"
                                    wire:loading.class="text-red-600 opacity-25"
                                    wire:target="delete('{{$item->rowId}}')">
                                    <i class="fas fa-trash"></i>  
                                </a>
                            </td>

                        </tr>

                    @endforeach

                </tbody>
            </table>

            <a class="text-sm cursor-pointer hover:underline mt-3 inline-block" 
                wire:click="destroy">
                <i class="fas fa-trash"></i>
                Borrar carrito de compras
            </a>

        @else
            <div class="flex flex-col items-center">
                <x-cart />
                <p class="text-lg text-gray-700 mt-4">TU CARRO DE COMPRAS ESTÁ VACÍO</p>

                <x-button-enlace href="/" class="mt-4 px-16">
                    Ir al inicio
                </x-button-enlace>
            </div>
        @endif

    </section>

    @if (Cart::count())
        
        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mt-4">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-gray-700">
                        <span class="font-bold text-lg">Total:</span>
                        USD {{Cart::subTotal()}}
                    </p>
                </div>

                <div>
                    
                </div>
            </div>
        </div>

    @endif
</div> --}}
