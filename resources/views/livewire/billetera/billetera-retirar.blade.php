<div>


    <button type="button" wire:click="$set('open',true)" type="button" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">

      RETIRAR
    </button>

    <x-dialog-modal wire:model="open">

        <x-slot name="title">
            <div class=" flex justify-between ">

                <p>RETIRAR GANANCIAS</p>

                <button type="button" wire:click="close" wire:loading.attr="disabled"  class="py-2.5 px-3 me-2 mb-2 text-sm font-bold text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    X
                </button>





            </div>
            
        </x-slot>

        <x-slot name="content">

            <div class="flex justify-end ">
                <input value="1" wire:model.lazy="tipo_monto" type="checkbox" class="relative w-6 h-6 mr-2 aspect-square !appearance-none !bg-none checked:!bg-gradient-to-tr checked:!from-sky-400 checked:!to-white bg-white border border-gray-300 shadow-sm rounded !outline-none !ring-0 !text-transparent !ring-offset-0 checked:!border-sky-400 hover:!border-sky-400 cursor-pointer transition-all duration-300 ease-in-out focus-visible:!outline-offset-2 focus-visible:!outline-2 focus-visible:!outline-sky-400/30 focus-visible:border-sky-400 after:w-[35%] after:h-[53%] after:absolute after:opacity-0 after:top-[40%] after:left-[50%] after:-translate-x-2/4 after:-translate-y-2/4 after:rotate-[25deg] after:drop-shadow-[1px_0.5px_1px_rgba(56,149,248,0.5)] after:border-r-[0.25em] after:border-r-white after:border-b-[0.25em] after:border-b-white after:transition-all after:duration-200 after:ease-linear checked:after:opacity-100 checked:after:rotate-45">
                <x-label class=" text-gray-800 " >Retirar todo lo disponible en billetera</x-label>
            </div>

            <div class=" w-full mt-4 ">

                <div class="w-1/2">
                    <x-label value="Cuenta" />

                    <select wire:model.defer="cuenta_id" id="cuenta_id" class=" mt-4 block w-full bg-gray-50 border border-gray-200 text-gray-700 py-1 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        <option value="" selected>{{__('Seleccione una opción')}}</option>
                            @foreach ($cuentas as $cuenta)
                                <option value="{{$cuenta->id}}">{{$cuenta->identificativo}}</option>
                            @endforeach
                    </select>
                    <x-input-error for="cuenta_id" />

                </div>
               
            </div>

            <div class="w-1/2 mt-4">

                @if($tipo_monto == 0)
                    <x-label  value="Monto" />

                    <div class="flex justify-start mt-4">
                        <div>
                            <div class="flex justify-center  ">
                           
                                <button type="button" class="mr-1 text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                    disabled
                                    x-bind:disabled="$wire.monto <= 1"
                                    wire:loading.attr="disabled"
                                    wire:target="decrement"
                                    wire:click="decrement">
                                    -
                                </button>
                                    <input wire:model="monto" readonly autofocus type="number" min="1" max="{{auth()->user()->saldo}}" class="inputNumber mr-1 text-center text-sm appearance-none block text-gray-700 border border-gray-200 rounded px-1 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="{{$monto}}">
                                    <button type="button" class="text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" 
                                        x-bind:disabled="$wire.monto >= $wire.saldo_actual"
                                        wire:loading.attr="disabled"
                                        wire:target="increment"
                                        wire:click="increment">
                                        +
                                </button>
                            </div>
                        </div>
                    </div>

                @endif
            </div>

            


        </x-slot>

        <x-slot name="footer">

            <button type="button" wire:click="save" wire:loading.attr="disabled" class="text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Guardar
            </button>

            <button type="button" wire:click="close" wire:loading.attr="disabled" class="text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Cerrar
            </button>



      

        </x-slot>

    </x-dialog-modal>
  

</div>