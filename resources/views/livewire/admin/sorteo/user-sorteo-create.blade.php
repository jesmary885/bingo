<div  x-data>

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



                    <div class="flex justify-between" >


                        <div class="w-1/2 mt-4 ml-2">
                            <x-label value="Sorteo" />
    
                            <select wire:model="sorteo_id" title="Rol de usuario" class="block w-full text-gray-400 py-2 px-2 pr-8 leading-tight rounded focus:outline-none focus:border-gray-500">
                                <option value="" selected>Sorteo</option>
                                    @foreach ($sorteos as $sorteo)
                                <option value="{{$sorteo->id}}">{{$sorteo->id}}</option>
                                @endforeach
                            </select>
                            <x-input-error for="sorteo_id" />
                        </div>

                        

                        <div class="w-1/2 mt-4 ml-2">
                            <x-label value="Cartón" />
    
                            <select wire:model="carton_id" title="Rol de usuario" class="block w-full text-gray-400 py-2 px-2 pr-8 leading-tight rounded focus:outline-none focus:border-gray-500">
                                <option value="" selected>Carton</option>
                                    @foreach ($cartones as $carton)
                                <option value="{{$carton->id}}">{{$carton->id}}</option>
                                @endforeach
                            </select>
                            <x-input-error for="carton_id" />
                        </div>

                        <div class="w-1/2 mt-4 ml-2">
                            <x-label value="Usuario" />
    
                            <select wire:model="user_id" title="Rol de usuario" class="block w-full text-gray-400 py-2 px-2 pr-8 leading-tight rounded focus:outline-none focus:border-gray-500">
                                <option value="" selected>Cartón</option>
                                    @foreach ($usuarios as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                            <x-input-error for="user_id" />
                        </div>

                    </div>


                    <div class="form-group mt-2">
                        <label for="formGroupExampleInput2">Si realizas una modificación, escribe aquí el motivo</label>
                        <textarea wire:model="comentario" id="formGroupExampleInput" class="form-control resize-none rounded" cols="80" rows="5"> </textarea>
                        <x-input-error for="comentario" />
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
