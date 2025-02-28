<div class=" font-Arima " >

    @if($tipo == 'agregar')


    <button type="button" wire:click="$set('open',true)" type="button" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">

      AGREGAR CUENTA
    </button>

    @elseif($tipo == 'editar')

    <button type="button" wire:click="$set('open',true)" class="py-1 px-3 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
        EDITAR
    </button>

    @else

    <button type="button" wire:click="$set('open',true)" type="button" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-1 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        REGISTRA TU CUENTA
    </button>






    @endif

    <x-dialog-modal wire:model="open">

        <x-slot name="title">
            <div class=" flex justify-between ">

                <p>CUENTA DE RETIRO</p>

                <button type="button" wire:click="close" wire:loading.attr="disabled"  class="py-2.5 px-3 me-2 mb-2 text-sm font-bold text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    X
                </button>





            </div>
            
        </x-slot>

        <x-slot name="content">

    

            <div class=" w-full mt-2">

                @if($tipo == 'agregar' || $tipo == 'agregar_carrito')

                    <div class="w-1/2">
                        <x-label value="Tipo de cuenta" />

                        <select wire:model="metodo" id="metodo" class=" mt-2 block w-full bg-gray-50 border border-gray-200 text-gray-700 py-1 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value="" selected>Seleccione una opción</option>
                            <option value="PAGO MOVIL">Pago móvil</option>
                            <option value="BINANCE(USDT)">Binance (USDT)</option>
                        </select>
                        <x-input-error for="metodo" />
                    </div>

                @endif

                @if($metodo == 'PAGO MOVIL')

                    <div class="w-full mt-4">

                            <x-label value="Banco" />
        
                            <select wire:model="banco" id="banco" class=" mt-2 block w-full bg-gray-50 border border-gray-200 text-gray-700 py-1 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                <option value="" selected>Seleccione una opción</option>
                                <option value="BANCO DE VENEZUELA - 0102">BANCO DE VENEZUELA </option>
                                <option value="100%BANCO - 0156">100%BANCO</option>
                                <option value="BANCAMIGA BANCO MICROFINANCIERO, C.A. - 0172">BANCAMIGA BANCO MICROFINANCIERO, C.A.</option>
                                <option value="BANCARIB - 0114">BANCARIBE</option>
                                <option value="BANCO ACTIVO BANCO COMERCIAL, C.A. - 0171">BANCO ACTIVO BANCO COMERCIAL, C.A.</option> 
                                <option value="BANCO AGRICOLA - 0166">BANCO AGRICOLA</option>
                                <option value="BANCO BICENTENARIO DEL PUEBLO - 0175">BANCO BICENTENARIO DEL PUEBLO</option>
                                <option value="BANCO CARONI, C.A. BANCO UNIVERSAL - 0128">BANCO CARONI, C.A. BANCO UNIVERSAL</option>
                                <option value="BANCO DEL TESORO - 0163">BANCO DEL TESORO</option>
                                <option value="BANCO EXTERIOR C.A. - 0115">BANCO EXTERIOR C.A.</option>
                                <option value="BANCO FONDO COMUN - 0151">BANCO FONDO COMUN</option>
                                <option value="BANCO INTERNACIONAL DE DESARROLLO, C.A. - 0173">BANCO INTERNACIONAL DE DESARROLLO, C.A.</option>
                                <option value="BANCO INDUSTRIAL DE VENEZUELA. - 0003">BANCO INDUSTRIAL DE VENEZUELA.</option>
                                <option value="BANCO MERCANTIL C.A. - 0105">BANCO MERCANTIL C.A.</option>
                                <option value="0191">BANCO NACIONAL DE CREDITO</option>
                                <option value="BANCO NACIONAL DE CREDITO - 0138">BANCO PLAZA</option>
                                <option value="BANCO SOFITASA - 0137">BANCO SOFITASA</option>
                                <option value="BANCO VENEZOLANO DE CREDITO S.A. - 0104">BANCO VENEZOLANO DE CREDITO S.A.</option>
                                <option value="BANESCO BANCO UNIVERSAL - 0134">BANESCO BANCO UNIVERSAL</option>  
                                <option value="BANFANB - 0177">BANFANB</option>
                                <option value="BANGENTE - 0146">BANGENTE</option>
                                <option value="BANPLUS BANCO COMERCIAL C.A - 0174">BANPLUS BANCO COMERCIAL C.A</optio
                                <option value="BANCO PROVINCIAL BBVA - 0108">BANCO PROVINCIAL BBVA</option>
                                <option value="DELSUR BANCO UNIVERSAL - 0157">DELSUR BANCO UNIVERSAL</option>
                                <option value="MI BANCO - 0169">MI BANCO</option>
                                <option value="N58 BANCO DIGITAL BANCO MICROFINANCIERO S.A - 0178">N58 BANCO DIGITAL BANCO MICROFINANCIERO S.A</option>

                            </select>
                            <x-input-error for="banco" />

                    </div>

                    <div class="w-full flex justify-between mt-4 ">

                        <div class="w-1/2 mr-2">

                            <x-label value="Teléfono" />
                            <input type="number" wire:model="telefono" id="telefono" class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                            <x-input-error for="telefono" />
                        </div>

                        <div class="w-1/2">

                            <x-label value="Cedula" />
                            <input type="number" wire:model="cedula" id="cedula" class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                            <x-input-error for="cedula" />
                        </div>

                    </div>



                @elseif($metodo == 'BINANCE(USDT)')

                <div class="w-1/2 mt-4">

                    <x-label value="Correo o Id de Binance" />

                    <input type="number" wire:model="correo_codigo" id="correo_codigo" class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />

                </div>

                @endif
               
            </div>

    

            


        </x-slot>

        <x-slot name="footer">

            <button type="button" wire:click="procesar" wire:loading.attr="disabled" class="text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Guardar
            </button>

            <button type="button" wire:click="close" wire:loading.attr="disabled" class="text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Cerrar
            </button>



      

        </x-slot>

    </x-dialog-modal>
  

</div>