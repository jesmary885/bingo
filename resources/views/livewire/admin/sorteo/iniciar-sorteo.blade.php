<div class="bg-white dark:bg-gray-900 ">
    <div class="px-6 py-8 mx-auto">
        <p class="text-xl text-center text-gray-500 dark:text-gray-300">
            Seleccione el sorteo
        </p>
    
        
        <div class="mt-6 space-y-8 xl:mt-12">

            @forelse ($sorteos as $sorteo)

                <button wire:click="sorteo_select({{$sorteo->id}})" class=" w-full btn btn-default btn-block p-4 border">
                    <div class="flex items-center justify-between ">
                        <div class="flex items-center">
                   
                            <div class="flex flex-col items-center mx-5 space-y-1">
                                <h2 class="text-2xl font-medium text-blue-500 dark:text-gray-200">SORTEO NRO {{$sorteo->id}}</h2>
                            </div>
                        </div>
                        <h2 class="text-md font-bold text-gray-500  dark:text-gray-300">Fecha de ejecución: {{$sorteo->fecha_ejecucion}} </h2>
                    </div>
                </button>

            @endforeach

        </div>
    </div>
</div>
