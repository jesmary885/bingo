<div class=" font-Arima " >

    <button type="button" wire:click="$set('open',true)" type="button" class="middle none font-Arima focus:outline-none center rounded-lg bg-yellow-500 py-1 px-2 text-xs font-bold uppercase text-white shadow-md shadow-yellow-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
        INFORMACIÓN DEL SORTEO

   
    </button>

    <x-dialog-modal wire:model="open">

        <x-slot name="title">
            <div class=" flex justify-between ">

                <p>INFORMACIÓN DE SORTEO</p>

                <button type="button" wire:click="close" wire:loading.attr="disabled"  class="py-2.5 px-3 me-2 mb-2 text-sm font-bold text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    X
                </button>

            </div>
            
        </x-slot>

        <x-slot name="content">

            <div class="mt-2 w-full h-full rounded-lg border bg-white p-1 shadow-md md:mt-0 ">

                <div class="items-center w-full pb-4 ">

                    <div class="mb-3">
                        @if($sorteo->type_2 == null && $sorteo->type_3 == null)
                        <p class="text-md font-bold text-center ">SORTEO (PREMIO ÚNICO)</p>
                        @elseif($sorteo->type_2 != null && $sorteo->type_3 == null)
                        <p class="text-md font-bold text-center"> SORTEO (1ER Y 2DO LUGAR)</p>
                        @elseif($sorteo->type_2 != null && $sorteo->type_3 != null)
                        <p class="text-md font-bold text-center"> SORTEO (1ER, 2DO Y 3ER LUGAR)</p>
                        @endif
                    </div>

                

                <p class="text-sm text-gray-500">Lanzamiento: {{\Carbon\Carbon::parse($sorteo->fecha_ejecucion)->format('d-m-Y h:i')}}</p>

                <div class=" flex ">

                    <p class="text-sm text-gray-500 mt-2">Ganancia actual: </p>

                    <div class="mt-2 ml-1" >
                        @livewire('ganancia-sorteo', ['sorteo' => $sorteo->id])
                    </div>

                </div>
                
               

                </div>

                

     
            </div>

        </x-slot>

        <x-slot name="footer">

            <button type="button" wire:click="close" wire:loading.attr="disabled" class="text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Cerrar
            </button>

        </x-slot>

    </x-dialog-modal>
  

</div>