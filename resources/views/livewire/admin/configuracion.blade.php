<div>
    <div class="card">
        <div class="card-header">
            <h2 class="text-gray-500 font-bold  text-lg flex justify-center ">
                CONFIGURACIÓN DEL SISTEMA
            </h2>
        </div>

        <div class="card-body">

            <div class="w-full flex justify-between mt-4 ">

                <div class="flex justify-end">
                    <div class="custom-control custom-switch"> 
                        <input value="1" wire:model.defer="estado" type="checkbox" class="custom-control-input" id="customSwitch1">
                        <label class="custom-control-label" for="customSwitch1">Activar opción de referir</label>
                    </div>
                </div>       

                <div>

                    <x-label value="Cantidad de referidos para ganar un cartón" />
                    <input type="number" wire:model.defer="cant_ref" id="cant_ref" class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-2.5 py-1 ml-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />

                    <x-input-error for="cant_ref" />
                </div>


            </div>

        </div>

        <div class="card-footer">

            <button type="button" class="btn btn-primary " wire:click="update">Actualizar</button>

        </div>

</div>
