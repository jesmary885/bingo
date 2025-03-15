<div class="bg-white dark:bg-gray-900 ">


    <div class=" flex justify-center mt-2 ">

        <button type="button" wire:click="verificar" wire:loading.attr="disabled" class="text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Verificar cartones en sorteos aperturados
        </button>


    </div>
   
    <div class="px-6 py-2 mx-auto">

        <div class=" space-y-8 xl:mt-12">

            @forelse ($sorteos as $sorteo)

                <button wire:click="sorteo_select({{$sorteo->id}})" class=" w-full btn btn-default btn-block p-4 border">
                    <div class="flex items-center justify-between ">
                        <div class="flex items-center">
                   
                            <div class="flex flex-col items-center mx-5 space-y-1">
                                <h2 class="text-lg font-medium text-blue-500 dark:text-gray-200">SORTEO NRO. {{$sorteo->id}}  <span class="text-md font-semibold text-red-600"> ({{$this->cartones_vendidos($sorteo->id)}} cartons vendidos - {{$this->cartones_no_vendidos($sorteo->id)}} cartones por vender)</span></h2>
                            </div>
                        </div>
                        <h2 class="text-xs font-bold text-gray-500  dark:text-gray-300">Fecha de ejecución: {{$sorteo->fecha_ejecucion}} </h2>
                    </div>
                </button>

            @endforeach

        </div>
    </div>
</div>
