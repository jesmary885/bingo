<div>

    <button type="button" wire:click="open" type="button" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">

      PROCESAR 
    </button>


    @if ($isopen)

    <div class="modal d-block" tabindex="-1" role="dialog" style="overflow-y: auto; display: block;">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content container mx-4">
                <div class="modal-header w-full">
                    <div class=" flex justify-between w-full">

                        <p class="font-bold text-gray-600 w-full mt-2 " >PROCESAR PREMIO</p>

                        <div class=" flex-1 w-full">
                            <button type="button" wire:click="close" wire:loading.attr="disabled"  class="py-2.5 px-3 me-2 mb-2 text-sm font-bold text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                X
                            </button>

                        </div>


                        

                    </div>
                </div>

                <div class="container">

                    <div class="flex justify-between " >

                        <div class="w-full flex mr-2">
                            <select wire:model.lazy="sorteo_id" class="block w-full bg-gray-50 border border-gray-200 text-gray-800 py-1 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                <option value="" selected>Seleccione el sorteo</option>
                                @foreach ($sorteos as $sorteo)
                                    <option value="{{$sorteo->id}}">{{$sorteo->id}}</option>
                                @endforeach
                            </select>
                            <x-input-error for="sorteo_id" />
                    </div>

                    <div class="w-full flex mr-2">
                            <select wire:model="carton_id" class="block w-full bg-gray-50 border border-gray-200 text-gray-800 py-1 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                <option value="" selected>Seleccione el carton</option>
                                @foreach ($cartones as $carton)
                                    <option value="{{$carton->carton->id}}">{{$carton->carton->id}}</option>
                                @endforeach
                            </select>
                            <x-input-error for="carton_id" />
                    </div>

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


  
</div>