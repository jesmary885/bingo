<div  x-data>

   

    <button type="button" wire:click="open" class="py-1 px-3 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
        EDITAR
    </button>


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


                        <div class="w-1/2 mt-4">
                            <div class="flex justify-start ml-4 mb-2 " >

                                <p class="font-bold justify-start ">Usuario</p>

                            </div>
          
    
                            <select wire:model="user_id" title="Rol de usuario" class="block font-semibold w-full bg-gray-200 text-gray-700 py-2 px-2 pr-8 leading-tight rounded focus:outline-none focus:border-gray-500">
                                <option value="" selected>Usuario</option>
                                    @foreach ($usuarios as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                            <x-input-error for="user_id" />
                        </div>

                    </div>


                    <div class="form-group mt-4">

                        <div class="flex justify-start ml-4 mb-2 " >

                            <p class="font-bold justify-start ">Si realizas una modificación, escribe aquí el motivo</p>

                        </div>


                        <textarea wire:model="comentario" id="formGroupExampleInput" class="form-control resize-none rounded" cols="80" rows="5"> </textarea>
                        <x-input-error for="comentario" />
                    </div>

                    





                </div>
            

                <div class="modal-footer mt-2">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="close">Cerrar</button>
                    <button type="button" class="btn btn-primary" wire:click="save">Guardar</button>

                </div>
            </div>
        </div>
    </div>

    @endif


  
</div>
