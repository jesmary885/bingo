<div >

    @if($iniciar == 0)

        <div class="m-20 bg-gray-50 " >

            <button wire:click="iniciar_sorteo()" type="button" class="btn btn-primary btn-lg btn-block">Haz click aquí para iniciar el sorteo</button>
        </div>

    @endif

    @if($iniciar == 1)

        <div class="w-full bg-white flex justify-center  ">

            <div class=" w-1/2 ">

                @if($finalizo == 1)
                    <x-button-enlace wire:click="finalizar()" class="mt-2 mb-2 font-Allerta">
                        FINALIZAR SORTEO
                    </x-button-enlace>
                @endif


                <h2 class="font-extrabold text-blue-600 text-center p-4 text-2xl  ">SELECCIONE LA FICHA </h2>

                <div class=" mb-2"></div>

                <div class="relative  px-8">
                    <table class="w-full rounded-lg  text-sm  text-gray-500 dark:text-gray-400 overflow-x-auto shadow-md ">
                        <thead class="text-lg uppercase bg-blue-600 dark:bg-gray-800 text-white shadow-lg">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-center transform hover:scale-105 transition-transform duration-200 active:translate-y-1 border-b-4 border-blue-400 text-xl dark:border-gray-600 font-extrabold">
                                    B
                                </th>
                                <th scope="col" class="px-6 py-3 text-center transform hover:scale-105 transition-transform duration-200 active:translate-y-1 border-b-4 border-blue-400 text-xl dark:border-gray-600 font-extrabold">
                                    I
                                </th>
                                <th scope="col" class="px-6 py-3 text-center transform hover:scale-105 transition-transform duration-200 active:translate-y-1 border-b-4 border-blue-400 text-xl dark:border-gray-600 font-extrabold">
                                    N
                                </th>
                                <th scope="col" class="px-6 py-3 text-center transform hover:scale-105 transition-transform duration-200 active:translate-y-1 border-b-4 border-blue-400 text-xl dark:border-gray-600 font-extrabold">
                                    G
                                </th>
                                <th scope="col" class="px-6 py-3 text-center transform hover:scale-105 transition-transform duration-200 active:translate-y-1 border-b-4 border-blue-400 text-xl dark:border-gray-600 font-extrabold">
                                    O
                                </th>
                            </tr>
                        </thead>
                        <tbody>

    
                            @for($i = 1; $i < 16; $i++)
                            <tr class="border-r dark:bg-gray-800  bg-yellow-100 dark:border-gray-700 border-gray-200">
                                <!-- Columna B (1-15) -->
                                <td class="px-6 border-l border-r text-center">
                                    <button 
                                        wire:click="selectNumber('{{ $i }}')"
                                        type="button" 
                                        class="btn text-3xl font-extrabold m-2 {{ in_array($i, $numeros_seleccionados) ? 'bg-red-700 text-white border-red-700' : 'btn-outline-primary' }}"
                                        {{ in_array($i, $numeros_seleccionados) ? 'disabled' : '' }}
                                    >
                                        {{ $i }}
                                    </button>
                                </td>
                                
                                <!-- Columna I (16-30) -->
                                <td class="px-6 border-l border-r text-center">
                                    <button 
                                        wire:click="selectNumber('{{ $i+15 }}')"
                                        type="button" 
                                        class="btn text-3xl font-extrabold m-2 {{ in_array($i+15, $numeros_seleccionados) ? 'bg-red-700 text-white border-red-700' : 'btn-outline-primary' }}"
                                        {{ in_array($i+15, $numeros_seleccionados) ? 'disabled' : '' }}
                                    >
                                        {{ $i+15 }}
                                    </button>
                                </td>
                                
                                <!-- Columna N (31-45) -->
                                <td class="px-6 border-l border-r text-center">
                                    <button 
                                        wire:click="selectNumber('{{ $i+30 }}')"
                                        type="button" 
                                        class="btn text-3xl font-extrabold m-2 {{ in_array($i+30, $numeros_seleccionados) ? 'bg-red-700 text-white border-red-700  ' : 'btn-outline-primary' }}"
                                        {{ in_array($i+30, $numeros_seleccionados) ? 'disabled' : '' }}
                                    >
                                        {{ $i+30 }}
                                    </button>
                                </td>
                                <!-- Columna G (46-60) -->
                                <td class="px-6 border-l border-r text-center">
                                    <button 
                                        wire:click="selectNumber('{{ $i+45 }}')"
                                        type="button" 
                                        class="btn text-3xl font-extrabold m-2 {{ in_array($i+45, $numeros_seleccionados) ? 'bg-red-700 text-white border-red-700' : 'btn-outline-primary' }}"
                                        {{ in_array($i+45, $numeros_seleccionados) ? 'disabled' : '' }}
                                    >
                                        {{ $i+45 }}
                                    </button>
                                </td>
                                
                                <!-- Columna O (61-75) -->
                                <td class="px-6 border-l border-r text-center">
                                    <button 
                                        wire:click="selectNumber('{{ $i+60 }}')"
                                        type="button" 
                                        class="btn text-3xl font-extrabold m-2 {{ in_array($i+60, $numeros_seleccionados) ? 'bg-red-700 text-white border-red-700' : 'btn-outline-primary' }}"
                                        {{ in_array($i+60, $numeros_seleccionados) ? 'disabled' : '' }}
                                    >
                                        {{ $i+60 }}
                                    </button>
                                </td>
                            </tr>
                        @endfor
    
                        </tbody>
                    </table>
                </div>


                <div class="border-t border-gray-200 mb-6"></div>


            </div>

            {{-- <div class=" card card-primary card-outline w-2/3 ml-1 ">
                <h2 class="font-extrabold text-blue-600 text-center p-4 text-2xl  ">FICHAS </h2>

                <div class="border-t border-gray-200 mb-6"></div>

            <div> --}}

            {{-- <div class="relative overflow-x-auto shadow-md  px-8">
                <table class="w-full rounded-lg  text-sm  text-gray-500 dark:text-gray-400">
                    <thead class="text-lg uppercase bg-blue-600 dark:bg-gray-800 text-white shadow-lg">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-center transform hover:scale-105 transition-transform duration-200 active:translate-y-1 border-b-4 border-blue-400 text-xl dark:border-gray-600 font-extrabold">
                                B
                            </th>
                            <th scope="col" class="px-6 py-3 text-center transform hover:scale-105 transition-transform duration-200 active:translate-y-1 border-b-4 border-blue-400 text-xl dark:border-gray-600 font-extrabold">
                                I
                            </th>
                            <th scope="col" class="px-6 py-3 text-center transform hover:scale-105 transition-transform duration-200 active:translate-y-1 border-b-4 border-blue-400 text-xl dark:border-gray-600 font-extrabold">
                                N
                            </th>
                            <th scope="col" class="px-6 py-3 text-center transform hover:scale-105 transition-transform duration-200 active:translate-y-1 border-b-4 border-blue-400 text-xl dark:border-gray-600 font-extrabold">
                                G
                            </th>
                            <th scope="col" class="px-6 py-3 text-center transform hover:scale-105 transition-transform duration-200 active:translate-y-1 border-b-4 border-blue-400 text-xl dark:border-gray-600 font-extrabold">
                                O
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @for($i = 0; $i < 15; $i++)
                        <tr class="bg-yellow-200 border-r dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                            <!-- Columna B (1-15) -->
                            <td class="px-6 border-l border-r text-center">
                                <div class="w-12 h-12 rounded-full border-r-black  flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700
                                    {{ in_array($i+1, $numeros_seleccionados) ? 'bg-blue-500 text-white' : 'bg-yellow-200' }}">
                                    {{ $i+1 }}
                                </div>
                            </td>
                            
                            <!-- Columna I (16-30) -->
                            <td class="px-6 border-r text-center">
                                <div class="w-12 h-12 rounded-full border-r-black  flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700
                                    {{ in_array($i+16, $numeros_seleccionados) ? 'bg-blue-500 text-white' : 'bg-yellow-200' }}">
                                    {{ $i+16 }}
                                </div>
                            </td>
                            
                            <!-- Columna N (31-45) -->
                            <td class="px-6 border-r text-center">
                                <div class="w-12 h-12 rounded-full border-r-black  flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700
                                    {{ in_array($i+31, $numeros_seleccionados) ? 'bg-blue-500 text-white' : 'bg-yellow-200' }}">
                                    {{ $i+31 }}
                                </div>
                            </td>
                            
                            <!-- Columna G (46-60) -->
                            <td class="px-6 border-r text-center">
                                <div class="w-12 h-12 rounded-full border-r-black  flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700
                                    {{ in_array($i+46, $numeros_seleccionados) ? 'bg-blue-500 text-white' : 'bg-yellow-200' }}">
                                    {{ $i+46 }}
                                </div>
                            </td>
                            
                            <!-- Columna O (61-75) -->
                            <td class="px-6 text-center">
                                <div class="w-12 h-12 rounded-full border-r-black  flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700
                                    {{ in_array($i+61, $numeros_seleccionados) ? 'bg-blue-500 text-white' : 'bg-yellow-200' }}">
                                    {{ $i+61 }}
                                </div>
                            </td>
                        </tr>
                    @endfor

                    </tbody>
                </table>
            </div> --}}


        </div>


    @endif
</div>
