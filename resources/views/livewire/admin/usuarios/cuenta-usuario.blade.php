<div>

    <button type="button" wire:click="open" type="button" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
      VER
    </button>

    @if ($isopen)

        <div class="modal d-block" tabindex="-1" role="dialog" style="overflow-y: auto; display: block;">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content container mx-4">
                    <div class="modal-header w-full">
                        <div class=" flex justify-between w-full">
                            <p class="font-bold text-gray-600 w-full mt-2 " >CUENTA DE USUARIO</p>

                            <div class=" flex-1 w-full">
                                <button type="button" wire:click="close" wire:loading.attr="disabled"  class="py-2.5 px-3 me-2 mb-2 text-sm font-bold text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                    X
                                </button>

                            </div>
                        </div>
                    </div>

                    <div class="container">

                        @foreach($cuentas_usuario as $cuenta)
                            @if($cuenta->metodo_pago == 'usdt')
                    
                                <div class="callout callout-danger">
                                    <h5 class="mb-2">USDT</h5>
                                    <p>ID o correo: {{$cuenta->correo_id}} </p>
                                </div>
                            @else
                    
                                <div class="callout callout-danger">
                                    <h5 class="mb-2">PAGO MOVIL</h5>
                                    <p>Banco: {{$cuenta->banco}} </p>
                                    <p>Cédula: {{$cuenta->cedula}} </p>
                                    <p>Teléfono: {{$cuenta->telefono}} </p>
                                </div>
                    
                            @endif
                        @endforeach

                    </div>
                

                    <div class="modal-footer mt-2">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="close">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        
    @endif
</div>
