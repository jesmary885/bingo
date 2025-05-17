<div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">

    <style>

.mi-div {
            width: 100%;
            height: 100%;
            background-image: url('/img/banderin.svg');
            background-size: cover; /* Ajusta el SVG al tamaño del div */
            background-position: center; /* Centra el SVG */
            background-repeat: no-repeat; /* Evita que se repita */
        }

        .mi-estrellas {
            width: 100%;
            height: 100%;
            background-image: url('/img/estrellas.svg');
            background-size: cover; /* Ajusta el SVG al tamaño del div */
            background-position: center; /* Centra el SVG */
            background-repeat: no-repeat; /* Evita que se repita */
        }

                                         /* Pantallas grandes (lg o más): elimina background-position: center */
                @media (min-width: 1024px) {
                    .mi-div {
                        background-position: initial; /* O usa "left", "top", etc. según necesites */
                    }
                }

        @keyframes bounce {
      0%, 100% {
        transform: translateY(0);
      }
      50% {
        transform: translateY(calc(100% - 5px)); /* Rebote en la parte inferior */
      }
    }

    .animate-bounce {
      animation: bounce 2s infinite ease-in-out;
    }


      </style>



            <div class="relative block p-4  overflow-hidden bg-white  mb-2 mt-1 font-Arima ">
        
                    @if($ganador_1 == 0 || $ganador_2 == 0 || $ganador_3 == 0)
    
                        <button 
                            id="audioToggle" 
                            class="fixed  right-4 p-3 bg-green-500 hover:bg-green-600 rounded-full text-white transition-all animate-fade-right shadow-2xl shadow-green-700 border-2"
                            aria-label="Silenciar música"
                            >
                            <svg id="audioIcon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <!-- Icono de altavoz (estado activo) -->
                                <path id="soundOn" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M15.536 8.464a5 5 0 010 7.072M12 6.253v11.5m0-11.5L7.757 9.757M12 6.253l-4.95 4.95a5 5 0 000 7.071"/>
                                <!-- Icono de silencio (estado oculto por defecto) -->
                                <path id="soundOff" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h2l4-4v16l-4-4zm11.828-8.414a5 5 0 010 7.072M15.535 8.464L19.07 5M12 6.253v3.495m0 3.747v3.495"/>
                            </svg>
                        </button>

                        @if($boton_pulsado == 0)


                            <div class="h-screen" >
                                <div class="py-6 w-full h-full mi-div mx-auto my-auto " >
                                    <div class="container mx-auto  ">
                                        <dh-component>
                                            <div aria-label="action panel" tabindex="0" class="focus:outline-none w-11/12 mx-auto mb-4 my-6 md:w-5/12 shadow sm:px-10 sm:py-6 py-4 px-4 bg-white dark:bg-gray-800 rounded-md">
                                                <p tabindex="0" class="focus:outline-none text-lg text-gray-800 dark:text-gray-100 font-semibold pb-3 text-center">El sorteo ya está efectuándose</p>
                                                <p tabindex="0" class="focus:outline-none text-sm text-gray-600 dark:text-gray-400 pb-3 font-normal">Le invitamos a ingresar a la sala de juego, haciendo clic en el botón INICIAR</p>
                                                
                                                <!-- Botón con loading MEJORADO -->
                                                <div class="flex justify-center">
                                                    <button 
                                                        wire:click="activar_sonido_pulsar"
                                                        wire:loading.attr="disabled"
                                                        wire:loading.class="opacity-50 cursor-not-allowed"
                                                        class="relative flex items-center justify-center gap-2 bg-blue-500 hover:bg-blue-600 py-3 px-6 text-xs rounded-full font-bold uppercase text-white focus:outline-none transition-all duration-200"
                                                        x-data="{ isLoading: false }"
                                                        x-on:click="isLoading = true"
                                                        x-bind:disabled="isLoading"
                                                    >
                                                        <!-- Texto normal -->
                                                        <span wire:loading.remove x-show="!isLoading">INICIAR</span>
                                                        
                                                        <!-- Spinner - Versión MEJORADA -->
                                                        <span wire:loading.delay x-show="isLoading">
                                                            <div class="flex space-x-2">
                                                                <div class="w-3 h-3 bg-white rounded-full animate-bounce" style="animation-delay: 0s"></div>
                                                                <div class="w-3 h-3 bg-white rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                                                                <div class="w-3 h-3 bg-white rounded-full animate-bounce" style="animation-delay: 0.4s"></div>
                                                              </div>
                                                        </span>
                                                    </button>
                                                </div>
                                            </div>
                                        </dh-component>
                                    </div>
                                </div>

                            </div>



                        @else


                            <div class="flex items-center rounded-t-lg  bg-blue-500 text-gray-800 border p-2 border-gray-200 shadow">

                                
                                <div class="p-4 w-full">
                                    
                                    <div class="grid grid-cols-4 gap-4">
                                        <div class="col-span-4 md:col-span-2 lg:col-span-1 ">
                                            <div class="flex flex-row bg-white shadow-sm rounded p-1">
                                                <div class="flex items-center justify-center flex-shrink-0 h-20 w-20 rounded-xl text-blue-500">
                                                
                                                    <svg class=" h-20 w-20" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                            viewBox="0 0 4975 4975" style="enable-background:new 0 0 4975 4975;" xml:space="preserve">
                                                        <g>
                                                            
                                                                <radialGradient id="SVGID_1_" cx="3283.9048" cy="17763.5566" r="533.6722" gradientTransform="matrix(1 0 0 0.2224 0 -1877.4764)" gradientUnits="userSpaceOnUse">
                                                                <stop  offset="0" style="stop-color:#6D6E71"/>
                                                                <stop  offset="0.0082" style="stop-color:#6F7073"/>
                                                                <stop  offset="0.196" style="stop-color:#97999B"/>
                                                                <stop  offset="0.38" style="stop-color:#BABCBE"/>
                                                                <stop  offset="0.5561" style="stop-color:#D7D8D9"/>
                                                                <stop  offset="0.7222" style="stop-color:#EBECED"/>
                                                                <stop  offset="0.8745" style="stop-color:#F8F8F8"/>
                                                                <stop  offset="1" style="stop-color:#FFFFFF"/>
                                                            </radialGradient>
                                                            <ellipse style="fill:url(#SVGID_1_);" cx="3283.905" cy="2073.139" rx="610.023" ry="139.703"/>
                                                            
                                                                <radialGradient id="SVGID_00000110460466023931310590000007772401572421380797_" cx="3029.2668" cy="1236.5796" r="1230.2183" gradientUnits="userSpaceOnUse">
                                                                <stop  offset="0.0056" style="stop-color:#949392"/>
                                                                <stop  offset="0.315" style="stop-color:#4D4C4C"/>
                                                                <stop  offset="0.6236" style="stop-color:#0E0D0D"/>
                                                            </radialGradient>
                                                            <path style="fill:url(#SVGID_00000110460466023931310590000007772401572421380797_);" d="M3261.714,1074.457
                                                                c-280.046,0-507.043,227.016-507.043,507.099c0,280.047,226.997,507.096,507.043,507.096
                                                                c280.116,0,507.136-227.048,507.136-507.096C3768.85,1301.473,3541.83,1074.457,3261.714,1074.457z"/>
                                                            
                                                                <radialGradient id="SVGID_00000107561243549865007290000001398486149026741682_" cx="3034.5754" cy="1175.6407" r="986.5323" gradientUnits="userSpaceOnUse">
                                                                <stop  offset="0.0056" style="stop-color:#D1D3D4"/>
                                                                <stop  offset="0.2782" style="stop-color:#686464"/>
                                                                <stop  offset="0.6236" style="stop-color:#0E0D0D"/>
                                                            </radialGradient>
                                                            <path style="fill:url(#SVGID_00000107561243549865007290000001398486149026741682_);" d="M3288.17,1707.436
                                                                c182.115,0,348.962-65.301,478.408-173.751c-24.112-257.619-240.9-459.228-504.864-459.228
                                                                c-249.033,0-456.124,179.542-498.92,416.262C2897.532,1624.665,3083.179,1707.436,3288.17,1707.436z"/>
                                                            
                                                                <radialGradient id="SVGID_00000123411431283679489090000008276724406825632422_" cx="3261.7544" cy="1581.5552" r="193.7903" gradientUnits="userSpaceOnUse">
                                                                <stop  offset="0.4663" style="stop-color:#FFFFFF"/>
                                                                <stop  offset="0.6767" style="stop-color:#F9F8F8"/>
                                                                <stop  offset="0.8625" style="stop-color:#EDECEB"/>
                                                                <stop  offset="0.927" style="stop-color:#E8E6E6"/>
                                                            </radialGradient>
                                                            <path style="fill:url(#SVGID_00000123411431283679489090000008276724406825632422_);" d="M3067.969,1581.567
                                                                c0,107.024,86.745,193.783,193.792,193.783c107.024,0,193.779-86.759,193.779-193.783c0-107.052-86.755-193.807-193.779-193.807
                                                                C3154.714,1387.76,3067.969,1474.515,3067.969,1581.567z"/>
                                                            <g>
                                                                <path style="fill:#010101;" d="M3228.324,1573.642c-20.722-8.797-31.072-23.822-31.072-45.104
                                                                    c0-17.615,6.016-31.382,17.984-41.315c11.992-9.936,27.877-14.918,47.585-14.918c17.319,0,32.563,4.551,45.675,13.659
                                                                    c13.135,9.125,19.685,23.321,19.685,42.574c0,21.281-10.013,36.307-30.104,45.104c24.709,9.877,37.074,27.75,37.074,53.597
                                                                    c0,20.853-6.561,37.39-19.616,49.646c-13.109,12.229-30.033,18.361-50.872,18.361c-19.135,0-36.105-5.408-50.836-16.217
                                                                    c-14.744-10.792-22.108-27.522-22.108-50.167C3191.718,1602.388,3203.921,1583.985,3228.324,1573.642z M3232.858,1625.12
                                                                    c0,24.335,10.372,36.494,31.141,36.494c20.013,0,30.021-12.037,30.021-36.063c0-22.659-10.268-33.985-30.71-33.985
                                                                    c-9.463,0-16.922,3.17-22.353,9.583C3235.563,1607.527,3232.858,1615.511,3232.858,1625.12z M3237.019,1531.574
                                                                    c0,17.569,8.602,26.339,25.873,26.339c17.226,0,25.802-8.863,25.802-26.566c0-17.115-8.447-25.681-25.383-25.681
                                                                    C3245.77,1505.667,3237.019,1514.296,3237.019,1531.574z"/>
                                                            </g>
                                                            <defs>
                                                                <filter id="Adobe_OpacityMaskFilter" filterUnits="userSpaceOnUse" x="2893.894" y="1181.227" width="297.877" height="352.994">
                                                                    <feFlood  style="flood-color:white;flood-opacity:1" result="back"/>
                                                                    <feBlend  in="SourceGraphic" in2="back" mode="normal"/>
                                                                </filter>
                                                            </defs>
                                                            
                                                                <mask maskUnits="userSpaceOnUse" x="2893.894" y="1181.227" width="297.877" height="352.994" id="SVGID_00000139975556321035613140000009459957151145749148_">
                                                                <g style="filter:url(#Adobe_OpacityMaskFilter);">
                                                                    <defs>
                                                                        
                                                                            <filter id="Adobe_OpacityMaskFilter_00000126286839426417771860000003141178340786387846_" filterUnits="userSpaceOnUse" x="2893.894" y="1181.227" width="297.877" height="352.994">
                                                                            <feFlood  style="flood-color:white;flood-opacity:1" result="back"/>
                                                                            <feBlend  in="SourceGraphic" in2="back" mode="normal"/>
                                                                        </filter>
                                                                    </defs>
                                                                    
                                                                        <mask maskUnits="userSpaceOnUse" x="2893.894" y="1181.227" width="297.877" height="352.994" id="SVGID_00000139975556321035613140000009459957151145749148_">
                                                                        <g style="filter:url(#Adobe_OpacityMaskFilter_00000126286839426417771860000003141178340786387846_);">
                                                                        </g>
                                                                    </mask>
                                                                    
                                                                        <linearGradient id="SVGID_00000062889147098095052700000017263067192449285265_" gradientUnits="userSpaceOnUse" x1="1013.4517" y1="2339.0884" x2="1346.5797" y2="2339.0884" gradientTransform="matrix(-0.555 0.8319 0.8319 0.555 1723.171 -927.0355)">
                                                                        <stop  offset="0" style="stop-color:#999999"/>
                                                                        <stop  offset="1" style="stop-color:#FFFFFF"/>
                                                                    </linearGradient>
                                                                    
                                                                        <path style="mask:url(#SVGID_00000139975556321035613140000009459957151145749148_);fill:url(#SVGID_00000062889147098095052700000017263067192449285265_);" d="
                                                                        M3186.863,1294.288c-32.954,30.972-123.404,122.443-161.106,226.048c-2.075,5.677-11.725,16.174-21.37,13.438
                                                                        c-24.212-6.873-71.391-25.072-104.383-68.052c-2.756-3.586-7.284-16.479-5.828-25.443
                                                                        c7.524-46.368,36.065-194.154,101.728-252.03c4.982-4.382,21.111-9.455,30.337-5.729
                                                                        c34.328,13.872,119.756,50.627,161.292,88.524C3191.932,1275.061,3194.579,1287.044,3186.863,1294.288z"/>
                                                                </g>
                                                            </mask>
                                                            
                                                                <linearGradient id="SVGID_00000123437656218010173110000014629883991071683732_" gradientUnits="userSpaceOnUse" x1="1013.4517" y1="2339.0884" x2="1346.5797" y2="2339.0884" gradientTransform="matrix(-0.555 0.8319 0.8319 0.555 1723.171 -927.0355)">
                                                                <stop  offset="0" style="stop-color:#8DC63F"/>
                                                                <stop  offset="1" style="stop-color:#009444"/>
                                                            </linearGradient>
                                                            <path style="opacity:0.44;fill:url(#SVGID_00000123437656218010173110000014629883991071683732_);" d="M3186.863,1294.288
                                                                c-32.954,30.972-123.404,122.443-161.106,226.048c-2.075,5.677-11.725,16.174-21.37,13.438
                                                                c-24.212-6.873-71.391-25.072-104.383-68.052c-2.756-3.586-7.284-16.479-5.828-25.443c7.524-46.368,36.065-194.154,101.728-252.03
                                                                c4.982-4.382,21.111-9.455,30.337-5.729c34.328,13.872,119.756,50.627,161.292,88.524
                                                                C3191.932,1275.061,3194.579,1287.044,3186.863,1294.288z"/>
                                                        </g>
                                                        <g>
                                                            
                                                                <radialGradient id="SVGID_00000147181933564961755450000005908484398433768588_" cx="1652.344" cy="17726.2559" r="565.3607" gradientTransform="matrix(1 0 0 0.2224 0 -1877.4764)" gradientUnits="userSpaceOnUse">
                                                                <stop  offset="0" style="stop-color:#6D6E71"/>
                                                                <stop  offset="0.0082" style="stop-color:#6F7073"/>
                                                                <stop  offset="0.196" style="stop-color:#97999B"/>
                                                                <stop  offset="0.38" style="stop-color:#BABCBE"/>
                                                                <stop  offset="0.5561" style="stop-color:#D7D8D9"/>
                                                                <stop  offset="0.7222" style="stop-color:#EBECED"/>
                                                                <stop  offset="0.8745" style="stop-color:#F8F8F8"/>
                                                                <stop  offset="1" style="stop-color:#FFFFFF"/>
                                                            </radialGradient>
                                                            <path style="fill:url(#SVGID_00000147181933564961755450000005908484398433768588_);" d="M2298.586,2064.847
                                                                c0,81.734-289.34,147.994-646.242,147.994c-356.9,0-646.242-66.26-646.242-147.994c0-81.74,289.341-148.003,646.242-148.003
                                                                C2009.246,1916.844,2298.586,1983.107,2298.586,2064.847z"/>
                                                            
                                                                <radialGradient id="SVGID_00000038391982380821379750000015096424241797121715_" cx="1417.83" cy="1353.4679" r="1295.2871" gradientUnits="userSpaceOnUse">
                                                                <stop  offset="0.1517" style="stop-color:#B85637"/>
                                                                <stop  offset="0.206" style="stop-color:#A64E33"/>
                                                                <stop  offset="0.3211" style="stop-color:#863E2A"/>
                                                                <stop  offset="0.441" style="stop-color:#6E3122"/>
                                                                <stop  offset="0.5649" style="stop-color:#5C281A"/>
                                                                <stop  offset="0.6946" style="stop-color:#512015"/>
                                                                <stop  offset="0.834" style="stop-color:#4A1C11"/>
                                                                <stop  offset="1" style="stop-color:#471A0F"/>
                                                            </radialGradient>
                                                            <path style="fill:url(#SVGID_00000038391982380821379750000015096424241797121715_);" d="M1661.934,1030.381
                                                                c-275.632,0-499.075,223.459-499.075,499.075c0,275.635,223.443,499.081,499.075,499.081
                                                                c275.608,0,499.097-223.445,499.097-499.081C2161.031,1253.84,1937.542,1030.381,1661.934,1030.381z"/>
                                                            
                                                                <radialGradient id="SVGID_00000114753123763407797490000010708780112972635028_" cx="1416.828" cy="1223.1388" r="1079.6738" gradientUnits="userSpaceOnUse">
                                                                <stop  offset="0.1517" style="stop-color:#B85637"/>
                                                                <stop  offset="0.206" style="stop-color:#A64E33"/>
                                                                <stop  offset="0.3211" style="stop-color:#863E2A"/>
                                                                <stop  offset="0.441" style="stop-color:#6E3122"/>
                                                                <stop  offset="0.5649" style="stop-color:#5C281A"/>
                                                                <stop  offset="0.6946" style="stop-color:#512015"/>
                                                                <stop  offset="0.834" style="stop-color:#4A1C11"/>
                                                                <stop  offset="1" style="stop-color:#471A0F"/>
                                                            </radialGradient>
                                                            <path style="fill:url(#SVGID_00000114753123763407797490000010708780112972635028_);" d="M1165.148,1481.673
                                                                c129.627,90.859,287.461,144.22,457.782,144.22c202.187,0,386.806-75.198,527.507-199.104
                                                                c-47.356-226.368-248.089-396.409-488.502-396.409C1402.426,1030.381,1189.207,1228.474,1165.148,1481.673z"/>
                                                            
                                                                <radialGradient id="SVGID_00000145019627442890481050000018113046652174060970_" cx="1661.9358" cy="1529.4746" r="191.1781" gradientUnits="userSpaceOnUse">
                                                                <stop  offset="0.4663" style="stop-color:#FFFFFF"/>
                                                                <stop  offset="0.6767" style="stop-color:#F9F8F8"/>
                                                                <stop  offset="0.8625" style="stop-color:#EDECEB"/>
                                                                <stop  offset="0.927" style="stop-color:#E8E6E6"/>
                                                            </radialGradient>
                                                            <path style="fill:url(#SVGID_00000145019627442890481050000018113046652174060970_);" d="M1470.765,1529.488
                                                                c0,105.589,85.612,191.172,191.202,191.172c105.572,0,191.14-85.583,191.14-191.172c0-105.6-85.568-191.199-191.14-191.199
                                                                C1556.377,1338.289,1470.765,1423.888,1470.765,1529.488z"/>
                                                            <g>
                                                                <path style="fill:#010101;" d="M1597.258,1481.042v-34.881h129.006v27.26c-20.425,20.186-36.595,46.338-48.482,78.457
                                                                    c-11.844,32.12-17.772,61.626-17.772,88.521h-36.382c2.017-57.785,21.846-110.906,59.419-159.357H1597.258z"/>
                                                            </g>
                                                            <defs>
                                                                
                                                                    <filter id="Adobe_OpacityMaskFilter_00000023282806116203071590000017518924157433532318_" filterUnits="userSpaceOnUse" x="1291.186" y="1133.765" width="272.115" height="322.469">
                                                                    <feFlood  style="flood-color:white;flood-opacity:1" result="back"/>
                                                                    <feBlend  in="SourceGraphic" in2="back" mode="normal"/>
                                                                </filter>
                                                            </defs>
                                                            
                                                                <mask maskUnits="userSpaceOnUse" x="1291.186" y="1133.765" width="272.115" height="322.469" id="SVGID_00000042009726335963448950000008561284145804866722_">
                                                                <g style="filter:url(#Adobe_OpacityMaskFilter_00000023282806116203071590000017518924157433532318_);">
                                                                    <defs>
                                                                        
                                                                            <filter id="Adobe_OpacityMaskFilter_00000021080956315867981850000009681317351551451523_" filterUnits="userSpaceOnUse" x="1291.186" y="1133.765" width="272.115" height="322.469">
                                                                            <feFlood  style="flood-color:white;flood-opacity:1" result="back"/>
                                                                            <feBlend  in="SourceGraphic" in2="back" mode="normal"/>
                                                                        </filter>
                                                                    </defs>
                                                                    
                                                                        <mask maskUnits="userSpaceOnUse" x="1291.186" y="1133.765" width="272.115" height="322.469" id="SVGID_00000042009726335963448950000008561284145804866722_">
                                                                        <g style="filter:url(#Adobe_OpacityMaskFilter_00000021080956315867981850000009681317351551451523_);">
                                                                        </g>
                                                                    </mask>
                                                                    
                                                                        <linearGradient id="SVGID_00000160903228954141260290000016795554895287482527_" gradientUnits="userSpaceOnUse" x1="1871.2341" y1="962.6801" x2="2175.5537" y2="962.6801" gradientTransform="matrix(-0.555 0.8319 0.8319 0.555 1723.171 -927.0355)">
                                                                        <stop  offset="0" style="stop-color:#999999"/>
                                                                        <stop  offset="1" style="stop-color:#FFFFFF"/>
                                                                    </linearGradient>
                                                                    
                                                                        <path style="mask:url(#SVGID_00000042009726335963448950000008561284145804866722_);fill:url(#SVGID_00000160903228954141260290000016795554895287482527_);" d="
                                                                        M1558.817,1237.05c-30.103,28.293-112.731,111.854-147.177,206.5c-1.892,5.185-10.705,14.775-19.518,12.276
                                                                        c-22.122-6.279-65.213-22.904-95.354-62.166c-2.521-3.277-6.657-15.055-5.324-23.244c6.87-42.358,32.943-177.364,92.928-230.235
                                                                        c4.551-4.004,19.286-8.638,27.713-5.233c31.359,12.672,109.4,46.249,147.347,80.87
                                                                        C1563.449,1219.485,1565.866,1230.433,1558.817,1237.05z"/>
                                                                </g>
                                                            </mask>
                                                            
                                                                <linearGradient id="SVGID_00000064313758485533971860000010615369361675045768_" gradientUnits="userSpaceOnUse" x1="1871.2341" y1="962.6801" x2="2175.5537" y2="962.6801" gradientTransform="matrix(-0.555 0.8319 0.8319 0.555 1723.171 -927.0355)">
                                                                <stop  offset="0" style="stop-color:#8DC63F"/>
                                                                <stop  offset="1" style="stop-color:#009444"/>
                                                            </linearGradient>
                                                            <path style="opacity:0.44;fill:url(#SVGID_00000064313758485533971860000010615369361675045768_);" d="M1558.817,1237.05
                                                                c-30.103,28.293-112.731,111.854-147.177,206.5c-1.892,5.185-10.705,14.775-19.518,12.276
                                                                c-22.122-6.279-65.213-22.904-95.354-62.166c-2.521-3.277-6.657-15.055-5.324-23.244c6.87-42.358,32.943-177.364,92.928-230.235
                                                                c4.551-4.004,19.286-8.638,27.713-5.233c31.359,12.672,109.4,46.249,147.347,80.87
                                                                C1563.449,1219.485,1565.866,1230.433,1558.817,1237.05z"/>
                                                        </g>
                                                        <g>
                                                            
                                                                <radialGradient id="SVGID_00000170259587709335306840000006088350842338255033_" cx="2453.123" cy="12290.3809" r="264.5529" gradientTransform="matrix(1 0 0 0.2224 0 -1877.4764)" gradientUnits="userSpaceOnUse">
                                                                <stop  offset="0" style="stop-color:#6D6E71"/>
                                                                <stop  offset="0.0082" style="stop-color:#6F7073"/>
                                                                <stop  offset="0.196" style="stop-color:#97999B"/>
                                                                <stop  offset="0.38" style="stop-color:#BABCBE"/>
                                                                <stop  offset="0.5561" style="stop-color:#D7D8D9"/>
                                                                <stop  offset="0.7222" style="stop-color:#EBECED"/>
                                                                <stop  offset="0.8745" style="stop-color:#F8F8F8"/>
                                                                <stop  offset="1" style="stop-color:#FFFFFF"/>
                                                            </radialGradient>
                                                            <path style="fill:url(#SVGID_00000170259587709335306840000006088350842338255033_);" d="M2755.523,855.907
                                                                c0,38.246-135.393,69.252-302.401,69.252c-167.007,0-302.399-31.005-302.399-69.252c0-38.249,135.393-69.256,302.399-69.256
                                                                C2620.131,786.65,2755.523,817.657,2755.523,855.907z"/>
                                                            
                                                                <radialGradient id="SVGID_00000037657859769086335290000016630579968434520240_" cx="2331.7322" cy="541.6695" r="606.1119" gradientUnits="userSpaceOnUse">
                                                                <stop  offset="0.1517" style="stop-color:#27AAE1"/>
                                                                <stop  offset="0.1613" style="stop-color:#27A8E0"/>
                                                                <stop  offset="0.3082" style="stop-color:#2195D3"/>
                                                                <stop  offset="0.4614" style="stop-color:#1F87C8"/>
                                                                <stop  offset="0.622" style="stop-color:#1D7DC1"/>
                                                                <stop  offset="0.7945" style="stop-color:#1C77BD"/>
                                                                <stop  offset="1" style="stop-color:#1C75BC"/>
                                                            </radialGradient>
                                                            <path style="fill:url(#SVGID_00000037657859769086335290000016630579968434520240_);" d="M2445.958,390.485
                                                                c-128.979,0-233.537,104.564-233.537,233.535c0,128.98,104.558,233.538,233.537,233.538c128.966,0,233.544-104.558,233.544-233.538
                                                                C2679.503,495.05,2574.925,390.485,2445.958,390.485z"/>
                                                            
                                                                <radialGradient id="SVGID_00000155838807788753615070000018347090306175157425_" cx="2331.2639" cy="480.6839" r="505.2185" gradientUnits="userSpaceOnUse">
                                                                <stop  offset="0.1517" style="stop-color:#27AAE1"/>
                                                                <stop  offset="0.1613" style="stop-color:#27A8E0"/>
                                                                <stop  offset="0.3082" style="stop-color:#2195D3"/>
                                                                <stop  offset="0.4614" style="stop-color:#1F87C8"/>
                                                                <stop  offset="0.622" style="stop-color:#1D7DC1"/>
                                                                <stop  offset="0.7945" style="stop-color:#1C77BD"/>
                                                                <stop  offset="1" style="stop-color:#1C75BC"/>
                                                            </radialGradient>
                                                            <path style="fill:url(#SVGID_00000155838807788753615070000018347090306175157425_);" d="M2213.494,601.662
                                                                c60.657,42.516,134.513,67.486,214.212,67.486c94.611,0,181.002-35.188,246.84-93.168
                                                                c-22.159-105.926-116.09-185.494-228.587-185.494C2324.524,390.485,2224.751,483.18,2213.494,601.662z"/>
                                                            
                                                                <radialGradient id="SVGID_00000106134773510871830640000005261197523695714213_" cx="2445.9595" cy="624.0293" r="89.4595" gradientUnits="userSpaceOnUse">
                                                                <stop  offset="0.4663" style="stop-color:#FFFFFF"/>
                                                                <stop  offset="0.6767" style="stop-color:#F9F8F8"/>
                                                                <stop  offset="0.8625" style="stop-color:#EDECEB"/>
                                                                <stop  offset="0.927" style="stop-color:#E8E6E6"/>
                                                            </radialGradient>
                                                            <path style="fill:url(#SVGID_00000106134773510871830640000005261197523695714213_);" d="M2356.503,624.036
                                                                c0,49.409,40.062,89.456,89.47,89.456c49.402,0,89.443-40.047,89.443-89.456c0-49.414-40.041-89.469-89.443-89.469
                                                                C2396.564,534.567,2356.503,574.622,2356.503,624.036z"/>
                                                            <g>
                                                                <path d="M2418.887,653.456l12.268-1.134c1.039,5.768,3.024,9.952,5.956,12.55c2.931,2.6,6.688,3.9,11.274,3.9
                                                                    c3.923,0,7.362-0.897,10.317-2.695c2.953-1.796,5.376-4.194,7.268-7.197c1.89-3.002,3.475-7.056,4.75-12.161
                                                                    c1.277-5.106,1.915-10.305,1.915-15.599c0-0.567-0.024-1.419-0.07-2.553c-2.553,4.066-6.039,7.363-10.46,9.892
                                                                    c-4.42,2.529-9.206,3.793-14.358,3.793c-8.603,0-15.882-3.12-21.839-9.36c-5.957-6.24-8.934-14.465-8.934-24.676
                                                                    c0-10.54,3.108-19.026,9.324-25.456c6.216-6.428,14.005-9.644,23.364-9.644c6.76,0,12.94,1.821,18.542,5.46
                                                                    c5.603,3.641,9.857,8.828,12.764,15.565c2.907,6.736,4.361,16.486,4.361,29.25c0,13.284-1.441,23.86-4.325,31.731
                                                                    c-2.884,7.871-7.174,13.863-12.87,17.975c-5.697,4.113-12.374,6.169-20.032,6.169c-8.13,0-14.772-2.257-19.925-6.772
                                                                    C2423.022,667.982,2419.927,661.636,2418.887,653.456z M2471.147,607.58c0-7.327-1.952-13.142-5.851-17.443
                                                                    c-3.9-4.301-8.592-6.454-14.075-6.454c-5.673,0-10.614,2.317-14.82,6.949c-4.208,4.633-6.311,10.636-6.311,18.011
                                                                    c0,6.619,1.996,11.996,5.992,16.132c3.994,4.137,8.922,6.205,14.784,6.205c5.91,0,10.766-2.067,14.571-6.205
                                                                    C2469.242,620.638,2471.147,614.907,2471.147,607.58z"/>
                                                            </g>
                                                            <defs>
                                                                
                                                                    <filter id="Adobe_OpacityMaskFilter_00000052086890136286950470000003284182818270810764_" filterUnits="userSpaceOnUse" x="2272.471" y="438.863" width="127.333" height="150.895">
                                                                    <feFlood  style="flood-color:white;flood-opacity:1" result="back"/>
                                                                    <feBlend  in="SourceGraphic" in2="back" mode="normal"/>
                                                                </filter>
                                                            </defs>
                                                            
                                                                <mask maskUnits="userSpaceOnUse" x="2272.471" y="438.863" width="127.333" height="150.895" id="SVGID_00000170963744724065862450000012089431702529666965_">
                                                                <g style="filter:url(#Adobe_OpacityMaskFilter_00000052086890136286950470000003284182818270810764_);">
                                                                    <defs>
                                                                        
                                                                            <filter id="Adobe_OpacityMaskFilter_00000137095759650814110800000001689326261288631962_" filterUnits="userSpaceOnUse" x="2272.471" y="438.863" width="127.333" height="150.895">
                                                                            <feFlood  style="flood-color:white;flood-opacity:1" result="back"/>
                                                                            <feBlend  in="SourceGraphic" in2="back" mode="normal"/>
                                                                        </filter>
                                                                    </defs>
                                                                    
                                                                        <mask maskUnits="userSpaceOnUse" x="2272.471" y="438.863" width="127.333" height="150.895" id="SVGID_00000170963744724065862450000012089431702529666965_">
                                                                        <g style="filter:url(#Adobe_OpacityMaskFilter_00000137095759650814110800000001689326261288631962_);">
                                                                        </g>
                                                                    </mask>
                                                                    
                                                                        <linearGradient id="SVGID_00000176756438171602155470000000804918670081888445_" gradientUnits="userSpaceOnUse" x1="792.645" y1="1298.4014" x2="935.0475" y2="1298.4014" gradientTransform="matrix(-0.555 0.8319 0.8319 0.555 1723.171 -927.0355)">
                                                                        <stop  offset="0" style="stop-color:#999999"/>
                                                                        <stop  offset="1" style="stop-color:#FFFFFF"/>
                                                                    </linearGradient>
                                                                    
                                                                        <path style="mask:url(#SVGID_00000170963744724065862450000012089431702529666965_);fill:url(#SVGID_00000176756438171602155470000000804918670081888445_);" d="
                                                                        M2397.706,487.193c-14.087,13.239-52.751,52.341-68.869,96.629c-0.886,2.426-5.01,6.913-9.134,5.744
                                                                        c-10.351-2.939-30.515-10.717-44.62-29.09c-1.179-1.533-3.115-7.045-2.491-10.877c3.214-19.821,15.417-82.995,43.484-107.736
                                                                        c2.131-1.873,9.025-4.041,12.969-2.448c14.675,5.93,51.191,21.642,68.949,37.841
                                                                        C2399.873,478.974,2401.003,484.097,2397.706,487.193z"/>
                                                                </g>
                                                            </mask>
                                                            
                                                                <linearGradient id="SVGID_00000015342587325417298840000014420857050970473358_" gradientUnits="userSpaceOnUse" x1="792.645" y1="1298.4014" x2="935.0475" y2="1298.4014" gradientTransform="matrix(-0.555 0.8319 0.8319 0.555 1723.171 -927.0355)">
                                                                <stop  offset="0" style="stop-color:#8DC63F"/>
                                                                <stop  offset="1" style="stop-color:#009444"/>
                                                            </linearGradient>
                                                            <path style="opacity:0.44;fill:url(#SVGID_00000015342587325417298840000014420857050970473358_);" d="M2397.706,487.193
                                                                c-14.087,13.239-52.751,52.341-68.869,96.629c-0.886,2.426-5.01,6.913-9.134,5.744c-10.351-2.939-30.515-10.717-44.62-29.09
                                                                c-1.179-1.533-3.115-7.045-2.491-10.877c3.214-19.821,15.417-82.995,43.484-107.736c2.131-1.873,9.025-4.041,12.969-2.448
                                                                c14.675,5.93,51.191,21.642,68.949,37.841C2399.873,478.974,2401.003,484.097,2397.706,487.193z"/>
                                                        </g>
                                                        <g>
                                                            
                                                                <radialGradient id="SVGID_00000065792626235617755340000001660710667223932819_" cx="847.3823" cy="11378.5889" r="190.0676" gradientTransform="matrix(1 0 0 0.2224 0 -1877.4764)" gradientUnits="userSpaceOnUse">
                                                                <stop  offset="0" style="stop-color:#6D6E71"/>
                                                                <stop  offset="0.0082" style="stop-color:#6F7073"/>
                                                                <stop  offset="0.196" style="stop-color:#97999B"/>
                                                                <stop  offset="0.38" style="stop-color:#BABCBE"/>
                                                                <stop  offset="0.5561" style="stop-color:#D7D8D9"/>
                                                                <stop  offset="0.7222" style="stop-color:#EBECED"/>
                                                                <stop  offset="0.8745" style="stop-color:#F8F8F8"/>
                                                                <stop  offset="1" style="stop-color:#FFFFFF"/>
                                                            </radialGradient>
                                                            <path style="fill:url(#SVGID_00000065792626235617755340000001660710667223932819_);" d="M1064.641,653.123
                                                                c0,27.478-97.272,49.754-217.259,49.754c-119.985,0-217.258-22.276-217.258-49.754c0-27.48,97.273-49.757,217.258-49.757
                                                                C967.369,603.366,1064.641,625.643,1064.641,653.123z"/>
                                                            
                                                                <radialGradient id="SVGID_00000026151934176048170000000011529678569133578668_" cx="765.4488" cy="423.2444" r="435.4601" gradientUnits="userSpaceOnUse">
                                                                <stop  offset="0.1517" style="stop-color:#D7DF23"/>
                                                                <stop  offset="0.1912" style="stop-color:#C9DA2B"/>
                                                                <stop  offset="0.3085" style="stop-color:#A4CE39"/>
                                                                <stop  offset="0.4305" style="stop-color:#85C441"/>
                                                                <stop  offset="0.5567" style="stop-color:#69BD45"/>
                                                                <stop  offset="0.6889" style="stop-color:#52B848"/>
                                                                <stop  offset="0.8309" style="stop-color:#40B549"/>
                                                                <stop  offset="1" style="stop-color:#39B54A"/>
                                                            </radialGradient>
                                                            <path style="fill:url(#SVGID_00000026151934176048170000000011529678569133578668_);" d="M847.514,314.626
                                                                c-92.665,0-167.783,75.124-167.783,167.783c0,92.665,75.118,167.785,167.783,167.785c92.656,0,167.791-75.12,167.791-167.785
                                                                C1015.304,389.75,940.17,314.626,847.514,314.626z"/>
                                                            
                                                                <radialGradient id="SVGID_00000022547106319694799340000001078985628437015170_" cx="765.1123" cy="379.4294" r="362.9733" gradientUnits="userSpaceOnUse">
                                                                <stop  offset="0.1517" style="stop-color:#D7DF23"/>
                                                                <stop  offset="0.1912" style="stop-color:#C9DA2B"/>
                                                                <stop  offset="0.3085" style="stop-color:#A4CE39"/>
                                                                <stop  offset="0.4305" style="stop-color:#85C441"/>
                                                                <stop  offset="0.5567" style="stop-color:#69BD45"/>
                                                                <stop  offset="0.6889" style="stop-color:#52B848"/>
                                                                <stop  offset="0.8309" style="stop-color:#40B549"/>
                                                                <stop  offset="1" style="stop-color:#39B54A"/>
                                                            </radialGradient>
                                                            <path style="fill:url(#SVGID_00000022547106319694799340000001078985628437015170_);" d="M680.5,466.346
                                                                c43.579,30.545,96.641,48.485,153.901,48.485c67.972,0,130.039-25.281,177.341-66.937
                                                                c-15.921-76.102-83.405-133.268-164.229-133.268C760.271,314.626,688.588,381.223,680.5,466.346z"/>
                                                            
                                                                <radialGradient id="SVGID_00000098911590265084062360000003329186378239605409_" cx="847.5141" cy="482.4153" r="64.2716" gradientUnits="userSpaceOnUse">
                                                                <stop  offset="0.4663" style="stop-color:#FFFFFF"/>
                                                                <stop  offset="0.6767" style="stop-color:#F9F8F8"/>
                                                                <stop  offset="0.8625" style="stop-color:#EDECEB"/>
                                                                <stop  offset="0.927" style="stop-color:#E8E6E6"/>
                                                            </radialGradient>
                                                            <path style="fill:url(#SVGID_00000098911590265084062360000003329186378239605409_);" d="M783.245,482.42
                                                                c0,35.498,28.782,64.269,64.279,64.269c35.493,0,64.259-28.771,64.259-64.269c0-35.501-28.766-64.279-64.259-64.279
                                                                C812.027,418.141,783.245,446.919,783.245,482.42z"/>
                                                            <defs>
                                                                
                                                                    <filter id="Adobe_OpacityMaskFilter_00000006695257638698959010000003258839707090994309_" filterUnits="userSpaceOnUse" x="722.872" y="349.383" width="91.482" height="108.41">
                                                                    <feFlood  style="flood-color:white;flood-opacity:1" result="back"/>
                                                                    <feBlend  in="SourceGraphic" in2="back" mode="normal"/>
                                                                </filter>
                                                            </defs>
                                                            
                                                                <mask maskUnits="userSpaceOnUse" x="722.872" y="349.383" width="91.482" height="108.41" id="SVGID_00000030472497094362224670000011216862726491615144_">
                                                                <g style="filter:url(#Adobe_OpacityMaskFilter_00000006695257638698959010000003258839707090994309_);">
                                                                    <defs>
                                                                        
                                                                            <filter id="Adobe_OpacityMaskFilter_00000132775332601921783900000000175615037811654797_" filterUnits="userSpaceOnUse" x="722.872" y="349.383" width="91.482" height="108.41">
                                                                            <feFlood  style="flood-color:white;flood-opacity:1" result="back"/>
                                                                            <feBlend  in="SourceGraphic" in2="back" mode="normal"/>
                                                                        </filter>
                                                                    </defs>
                                                                    
                                                                        <mask maskUnits="userSpaceOnUse" x="722.872" y="349.383" width="91.482" height="108.41" id="SVGID_00000030472497094362224670000011216862726491615144_">
                                                                        <g style="filter:url(#Adobe_OpacityMaskFilter_00000132775332601921783900000000175615037811654797_);">
                                                                        </g>
                                                                    </mask>
                                                                    
                                                                        <linearGradient id="SVGID_00000102506729052910669570000003705040478790856596_" gradientUnits="userSpaceOnUse" x1="1589.0693" y1="-63.7604" x2="1691.3783" y2="-63.7604" gradientTransform="matrix(-0.555 0.8319 0.8319 0.555 1723.171 -927.0355)">
                                                                        <stop  offset="0" style="stop-color:#999999"/>
                                                                        <stop  offset="1" style="stop-color:#FFFFFF"/>
                                                                    </linearGradient>
                                                                    
                                                                        <path style="mask:url(#SVGID_00000030472497094362224670000011216862726491615144_);fill:url(#SVGID_00000102506729052910669570000003705040478790856596_);" d="
                                                                        M812.847,384.106c-10.121,9.512-37.898,37.604-49.479,69.423c-0.636,1.744-3.599,4.967-6.562,4.126
                                                                        c-7.437-2.111-21.924-7.7-32.057-20.899c-0.848-1.102-2.238-5.061-1.791-7.815c2.31-14.24,11.077-59.627,31.241-77.402
                                                                        c1.531-1.346,6.484-2.903,9.317-1.759c10.543,4.261,36.78,15.549,49.538,27.188C814.404,378.201,815.216,381.881,812.847,384.106
                                                                        z"/>
                                                                </g>
                                                            </mask>
                                                            
                                                                <linearGradient id="SVGID_00000093177948208537327920000003383774518134716317_" gradientUnits="userSpaceOnUse" x1="1589.0693" y1="-63.7604" x2="1691.3783" y2="-63.7604" gradientTransform="matrix(-0.555 0.8319 0.8319 0.555 1723.171 -927.0355)">
                                                                <stop  offset="0" style="stop-color:#8DC63F"/>
                                                                <stop  offset="1" style="stop-color:#009444"/>
                                                            </linearGradient>
                                                            <path style="opacity:0.44;fill:url(#SVGID_00000093177948208537327920000003383774518134716317_);" d="M812.847,384.106
                                                                c-10.121,9.512-37.898,37.604-49.479,69.423c-0.636,1.744-3.599,4.967-6.562,4.126c-7.437-2.111-21.924-7.7-32.057-20.899
                                                                c-0.848-1.102-2.238-5.061-1.791-7.815c2.31-14.24,11.077-59.627,31.241-77.402c1.531-1.346,6.484-2.903,9.317-1.759
                                                                c10.543,4.261,36.78,15.549,49.538,27.188C814.404,378.201,815.216,381.881,812.847,384.106z"/>
                                                            <g>
                                                                <path d="M833.759,509.835h-6.385v-40.688c-1.537,1.466-3.553,2.933-6.048,4.398c-2.495,1.467-4.735,2.566-6.722,3.299v-6.172
                                                                    c3.571-1.678,6.693-3.712,9.365-6.101c2.672-2.389,4.564-4.706,5.676-6.953h4.115V509.835z"/>
                                                                <path d="M850.113,484.188c0-6.149,0.633-11.097,1.898-14.846c1.264-3.748,3.145-6.639,5.64-8.673
                                                                    c2.495-2.034,5.635-3.05,9.418-3.05c2.79,0,5.239,0.561,7.343,1.684c2.104,1.124,3.843,2.744,5.215,4.86
                                                                    c1.371,2.116,2.448,4.695,3.229,7.733c0.78,3.04,1.17,7.137,1.17,12.292c0,6.102-0.627,11.027-1.88,14.775
                                                                    c-1.254,3.749-3.128,6.646-5.623,8.691c-2.495,2.046-5.646,3.069-9.454,3.069c-5.014,0-8.952-1.797-11.813-5.392
                                                                    C851.828,501.003,850.113,493.956,850.113,484.188z M856.676,484.188c0,8.538,0.998,14.22,2.997,17.046
                                                                    c1.999,2.826,4.464,4.239,7.396,4.239c2.933,0,5.398-1.418,7.396-4.257c1.999-2.838,2.998-8.514,2.998-17.028
                                                                    c0-8.56-1-14.249-2.998-17.063c-1.998-2.815-4.487-4.222-7.467-4.222c-2.932,0-5.274,1.241-7.023,3.725
                                                                    C857.775,469.797,856.676,475.651,856.676,484.188z"/>
                                                            </g>
                                                        </g>
                                                        <g>
                                                            
                                                                <radialGradient id="SVGID_00000027588025867984560840000010025619307876932228_" cx="4211.584" cy="19251.2207" r="655.4519" gradientTransform="matrix(1 0 0 0.2224 0 -1877.4764)" gradientUnits="userSpaceOnUse">
                                                                <stop  offset="0" style="stop-color:#6D6E71"/>
                                                                <stop  offset="0.0082" style="stop-color:#6F7073"/>
                                                                <stop  offset="0.196" style="stop-color:#97999B"/>
                                                                <stop  offset="0.38" style="stop-color:#BABCBE"/>
                                                                <stop  offset="0.5561" style="stop-color:#D7D8D9"/>
                                                                <stop  offset="0.7222" style="stop-color:#EBECED"/>
                                                                <stop  offset="0.8745" style="stop-color:#F8F8F8"/>
                                                                <stop  offset="1" style="stop-color:#FFFFFF"/>
                                                            </radialGradient>
                                                            <path style="fill:url(#SVGID_00000027588025867984560840000010025619307876932228_);" d="M4960.811,2403.998
                                                                c0,94.76-335.447,171.583-749.227,171.583c-413.778,0-749.227-76.823-749.227-171.583c0-94.766,335.448-171.589,749.227-171.589
                                                                C4625.363,2232.409,4960.811,2309.232,4960.811,2403.998z"/>
                                                            
                                                                <radialGradient id="SVGID_00000121263502129475640820000016302167260526151342_" cx="3932.0603" cy="1599.6942" r="1501.6841" gradientUnits="userSpaceOnUse">
                                                                <stop  offset="0.1236" style="stop-color:#3CAA49"/>
                                                                <stop  offset="0.1865" style="stop-color:#3A9642"/>
                                                                <stop  offset="0.3581" style="stop-color:#306B32"/>
                                                                <stop  offset="0.4865" style="stop-color:#285227"/>
                                                                <stop  offset="0.5562" style="stop-color:#254922"/>
                                                            </radialGradient>
                                                            <path style="fill:url(#SVGID_00000121263502129475640820000016302167260526151342_);" d="M4215.027,1225.113
                                                                c-319.539,0-578.56,259.036-578.56,578.589c0,319.553,259.021,578.651,578.56,578.651c319.549,0,578.639-259.099,578.639-578.651
                                                                C4793.666,1484.148,4534.576,1225.113,4215.027,1225.113z"/>
                                                            
                                                                <radialGradient id="SVGID_00000045608792636361118130000014078917129621881507_" cx="3932.1125" cy="1460.3051" r="1275.2502" gradientUnits="userSpaceOnUse">
                                                                <stop  offset="0.1236" style="stop-color:#3CAA49"/>
                                                                <stop  offset="0.1865" style="stop-color:#3A9642"/>
                                                                <stop  offset="0.3581" style="stop-color:#306B32"/>
                                                                <stop  offset="0.4865" style="stop-color:#285227"/>
                                                                <stop  offset="0.5562" style="stop-color:#254922"/>
                                                            </radialGradient>
                                                            <path style="fill:url(#SVGID_00000045608792636361118130000014078917129621881507_);" d="M3637.864,1763.795
                                                                c155.34,117.909,349.004,187.926,559.055,187.926c225.558,0,432.269-80.724,592.882-214.812
                                                                c-33.13-288.085-277.811-511.796-574.773-511.796C3908.91,1225.113,3658.363,1462.864,3637.864,1763.795z"/>
                                                            
                                                                <radialGradient id="SVGID_00000168798325716497750290000004758273921919979925_" cx="4215.0566" cy="1803.7188" r="232.8439" gradientUnits="userSpaceOnUse">
                                                                <stop  offset="0.4663" style="stop-color:#FFFFFF"/>
                                                                <stop  offset="0.6767" style="stop-color:#F9F8F8"/>
                                                                <stop  offset="0.8625" style="stop-color:#EDECEB"/>
                                                                <stop  offset="0.927" style="stop-color:#E8E6E6"/>
                                                            </radialGradient>
                                                            <path style="fill:url(#SVGID_00000168798325716497750290000004758273921919979925_);" d="M3982.219,1803.702
                                                                c0,128.606,104.245,232.867,232.828,232.867c128.602,0,232.848-104.26,232.848-232.867c0-128.583-104.246-232.833-232.848-232.833
                                                                C4086.464,1570.869,3982.219,1675.119,3982.219,1803.702z"/>
                                                            <g>
                                                                <path style="fill:#010101;" d="M4295.693,1738.442l-48.379,5.503c-2.352-19.591-11.872-29.407-28.613-29.407
                                                                    c-23.954,0-37.461,24.489-40.543,73.437c12.418-14.677,27.829-21.993,46.418-21.993c22.576,0,40.885,8.242,55.007,24.777
                                                                    c14.091,16.502,21.161,36.816,21.161,60.881c0,23.156-6.889,43.733-20.635,61.708c-13.757,17.964-34.947,26.935-63.569,26.935
                                                                    c-60.317,0-90.481-43.8-90.481-131.517c0-90.422,31.915-135.622,95.617-135.622
                                                                    C4263.789,1673.144,4288.393,1694.902,4295.693,1738.442z M4182.158,1847.813c0,13.788,3.396,25.755,10.13,35.726
                                                                    c6.765,10.006,15.785,14.996,27.063,14.996c21.535,0,32.277-15.407,32.277-46.381c0-32.724-11.615-49.098-34.984-49.098
                                                                    C4193.685,1803.056,4182.158,1817.966,4182.158,1847.813z"/>
                                                            </g>
                                                            <defs>
                                                                
                                                                    <filter id="Adobe_OpacityMaskFilter_00000020391246197976044710000008480445136772214415_" filterUnits="userSpaceOnUse" x="3776.831" y="1369.062" width="317.495" height="376.245">
                                                                    <feFlood  style="flood-color:white;flood-opacity:1" result="back"/>
                                                                    <feBlend  in="SourceGraphic" in2="back" mode="normal"/>
                                                                </filter>
                                                            </defs>
                                                            
                                                                <mask maskUnits="userSpaceOnUse" x="3776.831" y="1369.062" width="317.495" height="376.245" id="SVGID_00000118367634089750751290000008018033710597200310_">
                                                                <g style="filter:url(#Adobe_OpacityMaskFilter_00000020391246197976044710000008480445136772214415_);">
                                                                    <defs>
                                                                        
                                                                            <filter id="Adobe_OpacityMaskFilter_00000112627629232223177450000005793509718719770780_" filterUnits="userSpaceOnUse" x="3776.831" y="1369.062" width="317.495" height="376.245">
                                                                            <feFlood  style="flood-color:white;flood-opacity:1" result="back"/>
                                                                            <feBlend  in="SourceGraphic" in2="back" mode="normal"/>
                                                                        </filter>
                                                                    </defs>
                                                                    
                                                                        <mask maskUnits="userSpaceOnUse" x="3776.831" y="1369.062" width="317.495" height="376.245" id="SVGID_00000118367634089750751290000008018033710597200310_">
                                                                        <g style="filter:url(#Adobe_OpacityMaskFilter_00000112627629232223177450000005793509718719770780_);">
                                                                        </g>
                                                                    </mask>
                                                                    
                                                                        <linearGradient id="SVGID_00000029753118205696404300000005256324152481187503_" gradientUnits="userSpaceOnUse" x1="673.7451" y1="3190.6416" x2="1028.8152" y2="3190.6416" gradientTransform="matrix(-0.555 0.8319 0.8319 0.555 1723.171 -927.0355)">
                                                                        <stop  offset="0" style="stop-color:#999999"/>
                                                                        <stop  offset="1" style="stop-color:#FFFFFF"/>
                                                                    </linearGradient>
                                                                    
                                                                        <path style="mask:url(#SVGID_00000118367634089750751290000008018033710597200310_);fill:url(#SVGID_00000029753118205696404300000005256324152481187503_);" d="
                                                                        M4089.096,1489.573c-35.13,33.012-131.541,130.506-171.729,240.936c-2.199,6.046-12.483,17.239-22.771,14.321
                                                                        c-25.806-7.328-76.087-26.722-111.254-72.533c-2.941-3.826-7.763-17.564-6.208-27.121
                                                                        c8.017-49.42,38.433-206.944,108.426-268.631c5.305-4.673,22.5-10.076,32.329-6.103c36.588,14.785,127.646,53.959,171.921,94.354
                                                                        C4094.5,1469.076,4097.317,1481.848,4089.096,1489.573z"/>
                                                                </g>
                                                            </mask>
                                                            
                                                                <linearGradient id="SVGID_00000045616382035080769460000006665705730776630179_" gradientUnits="userSpaceOnUse" x1="673.7451" y1="3190.6416" x2="1028.8152" y2="3190.6416" gradientTransform="matrix(-0.555 0.8319 0.8319 0.555 1723.171 -927.0355)">
                                                                <stop  offset="0" style="stop-color:#8DC63F"/>
                                                                <stop  offset="1" style="stop-color:#009444"/>
                                                            </linearGradient>
                                                            <path style="opacity:0.44;fill:url(#SVGID_00000045616382035080769460000006665705730776630179_);" d="M4089.096,1489.573
                                                                c-35.13,33.012-131.541,130.506-171.729,240.936c-2.199,6.046-12.483,17.239-22.771,14.321
                                                                c-25.806-7.328-76.087-26.722-111.254-72.533c-2.941-3.826-7.763-17.564-6.208-27.121c8.017-49.42,38.433-206.944,108.426-268.631
                                                                c5.305-4.673,22.5-10.076,32.329-6.103c36.588,14.785,127.646,53.959,171.921,94.354
                                                                C4094.5,1469.076,4097.317,1481.848,4089.096,1489.573z"/>
                                                        </g>
                                                        <g>
                                                            
                                                                <radialGradient id="SVGID_00000158718241378784937040000013049827957331892360_" cx="2505.0803" cy="19251.2246" r="655.45" gradientTransform="matrix(1 0 0 0.2224 0 -1877.4764)" gradientUnits="userSpaceOnUse">
                                                                <stop  offset="0" style="stop-color:#6D6E71"/>
                                                                <stop  offset="0.0082" style="stop-color:#6F7073"/>
                                                                <stop  offset="0.196" style="stop-color:#97999B"/>
                                                                <stop  offset="0.38" style="stop-color:#BABCBE"/>
                                                                <stop  offset="0.5561" style="stop-color:#D7D8D9"/>
                                                                <stop  offset="0.7222" style="stop-color:#EBECED"/>
                                                                <stop  offset="0.8745" style="stop-color:#F8F8F8"/>
                                                                <stop  offset="1" style="stop-color:#FFFFFF"/>
                                                            </radialGradient>
                                                            <path style="fill:url(#SVGID_00000158718241378784937040000013049827957331892360_);" d="M3254.306,2403.997
                                                                c0,94.764-335.429,171.584-749.217,171.584c-413.777,0-749.234-76.82-749.234-171.584c0-94.766,335.457-171.586,749.234-171.586
                                                                C2918.877,2232.411,3254.306,2309.231,3254.306,2403.997z"/>
                                                            
                                                                <radialGradient id="SVGID_00000115485793190590079700000002184059984614094241_" cx="2195.4158" cy="1631.7938" r="1501.7146" gradientUnits="userSpaceOnUse">
                                                                <stop  offset="0.073" style="stop-color:#F48D2E"/>
                                                                <stop  offset="0.1175" style="stop-color:#E8862D"/>
                                                                <stop  offset="0.3433" style="stop-color:#C46B29"/>
                                                                <stop  offset="0.4663" style="stop-color:#B76228"/>
                                                            </radialGradient>
                                                            <path style="fill:url(#SVGID_00000115485793190590079700000002184059984614094241_);" d="M2478.438,1257.212
                                                                c-319.537,0-578.611,259.079-578.611,578.642c0,319.544,259.074,578.599,578.611,578.599
                                                                c319.576,0,578.607-259.055,578.607-578.599C3057.045,1516.292,2798.014,1257.212,2478.438,1257.212z"/>
                                                            
                                                                <radialGradient id="SVGID_00000025417577637633817190000013630841980906599554_" cx="2201.8259" cy="1483.6223" r="1258.1261" gradientUnits="userSpaceOnUse">
                                                                <stop  offset="0.073" style="stop-color:#F48D2E"/>
                                                                <stop  offset="0.1175" style="stop-color:#E8862D"/>
                                                                <stop  offset="0.3433" style="stop-color:#C46B29"/>
                                                                <stop  offset="0.4663" style="stop-color:#B76228"/>
                                                            </radialGradient>
                                                            <path style="fill:url(#SVGID_00000025417577637633817190000013630841980906599554_);" d="M2514.618,1956.688
                                                                c201.536,0,387.996-64.431,539.998-173.771c-26.739-294.745-274.462-525.706-576.179-525.706
                                                                c-283.854,0-519.974,204.458-569.169,474.135C2071.58,1871.746,2283.186,1956.688,2514.618,1956.688z"/>
                                                            
                                                                <radialGradient id="SVGID_00000180339340965212431330000009892208655868282794_" cx="2478.4229" cy="1835.8237" r="223.8923" gradientUnits="userSpaceOnUse">
                                                                <stop  offset="0.4663" style="stop-color:#FFFFFF"/>
                                                                <stop  offset="0.6767" style="stop-color:#F9F8F8"/>
                                                                <stop  offset="0.8625" style="stop-color:#EDECEB"/>
                                                                <stop  offset="0.927" style="stop-color:#E8E6E6"/>
                                                            </radialGradient>
                                                            <path style="fill:url(#SVGID_00000180339340965212431330000009892208655868282794_);" d="M2254.534,1835.845
                                                                c0,123.633,100.276,223.875,223.903,223.875c123.627,0,223.874-100.242,223.874-223.875c0-123.651-100.247-223.917-223.874-223.917
                                                                C2354.81,1611.928,2254.534,1712.194,2254.534,1835.845z"/>
                                                            <g>
                                                                <path style="fill:#010101;" d="M2401.235,1892.024l48.139-5c3.693,23.54,15.564,35.307,35.549,35.307
                                                                    c24.079,0,36.065-16.313,36.065-48.938c0-30.751-12.455-46.105-37.328-46.105c-13.88,0-26.317,6.092-37.347,18.293l-38.994-5.783
                                                                    l24.768-131.015h127.77v45.292h-91.102l-7.721,42.657c10.715-5.329,21.64-7.979,32.91-7.979c22.643,0,41.06,7.979,55.36,23.931
                                                                    c14.32,15.928,21.447,35.919,21.447,59.905c0,20.711-6.992,40.638-21.046,59.833c-14.044,19.19-35.788,28.784-65.301,28.784
                                                                    C2435.99,1961.207,2408.219,1938.146,2401.235,1892.024z"/>
                                                            </g>
                                                            
                                                                <radialGradient id="SVGID_00000036966827214531129860000016760244020432747178_" cx="2478.4229" cy="1835.8237" r="223.8923" gradientUnits="userSpaceOnUse">
                                                                <stop  offset="0.4663" style="stop-color:#FFFFFF"/>
                                                                <stop  offset="0.6767" style="stop-color:#F9F8F8"/>
                                                                <stop  offset="0.8625" style="stop-color:#EDECEB"/>
                                                                <stop  offset="0.927" style="stop-color:#E8E6E6"/>
                                                            </radialGradient>
                                                            <path style="fill:url(#SVGID_00000036966827214531129860000016760244020432747178_);" d="M2254.534,1835.845
                                                                c0,123.633,100.276,223.875,223.903,223.875c123.627,0,223.874-100.242,223.874-223.875c0-123.651-100.247-223.917-223.874-223.917
                                                                C2354.81,1611.928,2254.534,1712.194,2254.534,1835.845z"/>
                                                            <g>
                                                                <path style="fill:#010101;" d="M2401.235,1892.024l48.139-5c3.693,23.54,15.564,35.307,35.549,35.307
                                                                    c24.079,0,36.065-16.313,36.065-48.938c0-30.751-12.455-46.105-37.328-46.105c-13.88,0-26.317,6.092-37.347,18.293l-38.994-5.783
                                                                    l24.768-131.015h127.77v45.292h-91.102l-7.721,42.657c10.715-5.329,21.64-7.979,32.91-7.979c22.643,0,41.06,7.979,55.36,23.931
                                                                    c14.32,15.928,21.447,35.919,21.447,59.905c0,20.711-6.992,40.638-21.046,59.833c-14.044,19.19-35.788,28.784-65.301,28.784
                                                                    C2435.99,1961.207,2408.219,1938.146,2401.235,1892.024z"/>
                                                            </g>
                                                            <defs>
                                                                
                                                                    <filter id="Adobe_OpacityMaskFilter_00000070097206912566439180000010824370095105224859_" filterUnits="userSpaceOnUse" x="2033.133" y="1402.309" width="317.495" height="376.245">
                                                                    <feFlood  style="flood-color:white;flood-opacity:1" result="back"/>
                                                                    <feBlend  in="SourceGraphic" in2="back" mode="normal"/>
                                                                </filter>
                                                            </defs>
                                                            
                                                                <mask maskUnits="userSpaceOnUse" x="2033.133" y="1402.309" width="317.495" height="376.245" id="SVGID_00000052806341798170384980000010728273940511944622_">
                                                                <g style="filter:url(#Adobe_OpacityMaskFilter_00000070097206912566439180000010824370095105224859_);">
                                                                    <defs>
                                                                        
                                                                            <filter id="Adobe_OpacityMaskFilter_00000129180655631221266920000003033453675750895011_" filterUnits="userSpaceOnUse" x="2033.133" y="1402.309" width="317.495" height="376.245">
                                                                            <feFlood  style="flood-color:white;flood-opacity:1" result="back"/>
                                                                            <feBlend  in="SourceGraphic" in2="back" mode="normal"/>
                                                                        </filter>
                                                                    </defs>
                                                                    
                                                                        <mask maskUnits="userSpaceOnUse" x="2033.133" y="1402.309" width="317.495" height="376.245" id="SVGID_00000052806341798170384980000010728273940511944622_">
                                                                        <g style="filter:url(#Adobe_OpacityMaskFilter_00000129180655631221266920000003033453675750895011_);">
                                                                        </g>
                                                                    </mask>
                                                                    
                                                                        <linearGradient id="SVGID_00000163794958132866084440000005879077719037570978_" gradientUnits="userSpaceOnUse" x1="1669.0748" y1="1758.6296" x2="2024.1448" y2="1758.6296" gradientTransform="matrix(-0.555 0.8319 0.8319 0.555 1723.171 -927.0355)">
                                                                        <stop  offset="0" style="stop-color:#999999"/>
                                                                        <stop  offset="1" style="stop-color:#FFFFFF"/>
                                                                    </linearGradient>
                                                                    
                                                                        <path style="mask:url(#SVGID_00000052806341798170384980000010728273940511944622_);fill:url(#SVGID_00000163794958132866084440000005879077719037570978_);" d="
                                                                        M2345.396,1522.82c-35.129,33.012-131.539,130.506-171.729,240.937c-2.2,6.046-12.483,17.239-22.772,14.321
                                                                        c-25.806-7.328-76.086-26.721-111.253-72.533c-2.942-3.827-7.763-17.564-6.208-27.121
                                                                        c8.017-49.42,38.433-206.944,108.426-268.631c5.305-4.673,22.5-10.076,32.33-6.104c36.586,14.785,127.645,53.96,171.918,94.354
                                                                        C2350.801,1502.325,2353.619,1515.095,2345.396,1522.82z"/>
                                                                </g>
                                                            </mask>
                                                            
                                                                <linearGradient id="SVGID_00000136406213308231129820000007287778561898217905_" gradientUnits="userSpaceOnUse" x1="1669.0748" y1="1758.6296" x2="2024.1448" y2="1758.6296" gradientTransform="matrix(-0.555 0.8319 0.8319 0.555 1723.171 -927.0355)">
                                                                <stop  offset="0" style="stop-color:#8DC63F"/>
                                                                <stop  offset="1" style="stop-color:#009444"/>
                                                            </linearGradient>
                                                            <path style="opacity:0.44;fill:url(#SVGID_00000136406213308231129820000007287778561898217905_);" d="M2345.396,1522.82
                                                                c-35.129,33.012-131.539,130.506-171.729,240.937c-2.2,6.046-12.483,17.239-22.772,14.321
                                                                c-25.806-7.328-76.086-26.721-111.253-72.533c-2.942-3.827-7.763-17.564-6.208-27.121c8.017-49.42,38.433-206.944,108.426-268.631
                                                                c5.305-4.673,22.5-10.076,32.33-6.104c36.586,14.785,127.645,53.96,171.918,94.354
                                                                C2350.801,1502.325,2353.619,1515.095,2345.396,1522.82z"/>
                                                        </g>
                                                        <g>
                                                            
                                                                <radialGradient id="SVGID_00000160892740758384105550000003171653131708973703_" cx="766.9927" cy="19251.2266" r="655.4512" gradientTransform="matrix(1 0 0 0.2224 0 -1877.4764)" gradientUnits="userSpaceOnUse">
                                                                <stop  offset="0" style="stop-color:#6D6E71"/>
                                                                <stop  offset="0.0082" style="stop-color:#6F7073"/>
                                                                <stop  offset="0.196" style="stop-color:#97999B"/>
                                                                <stop  offset="0.38" style="stop-color:#BABCBE"/>
                                                                <stop  offset="0.5561" style="stop-color:#D7D8D9"/>
                                                                <stop  offset="0.7222" style="stop-color:#EBECED"/>
                                                                <stop  offset="0.8745" style="stop-color:#F8F8F8"/>
                                                                <stop  offset="1" style="stop-color:#FFFFFF"/>
                                                            </radialGradient>
                                                            
                                                                <ellipse style="fill:url(#SVGID_00000160892740758384105550000003171653131708973703_);" cx="766.991" cy="2403.996" rx="749.226" ry="171.585"/>
                                                            
                                                                <radialGradient id="SVGID_00000019663296783207014200000011353630534530010005_" cx="451.8784" cy="1634.1597" r="1501.6602" gradientUnits="userSpaceOnUse">
                                                                <stop  offset="0.1236" style="stop-color:#806AAF"/>
                                                                <stop  offset="0.1916" style="stop-color:#715C9D"/>
                                                                <stop  offset="0.3706" style="stop-color:#503E7E"/>
                                                                <stop  offset="0.5093" style="stop-color:#3C2E6E"/>
                                                                <stop  offset="0.5899" style="stop-color:#342869"/>
                                                            </radialGradient>
                                                            <path style="fill:url(#SVGID_00000019663296783207014200000011353630534530010005_);" d="M734.877,1259.583
                                                                c-319.561,0-578.597,259.074-578.597,578.649c0,319.527,259.036,578.58,578.597,578.58c319.541,0,578.597-259.053,578.597-578.58
                                                                C1313.474,1518.657,1054.418,1259.583,734.877,1259.583z"/>
                                                            
                                                                <radialGradient id="SVGID_00000023996351394334051020000017520314039352446391_" cx="457.7794" cy="1480.1328" r="1247.2557" gradientUnits="userSpaceOnUse">
                                                                <stop  offset="0.1236" style="stop-color:#806AAF"/>
                                                                <stop  offset="0.1916" style="stop-color:#715C9D"/>
                                                                <stop  offset="0.3706" style="stop-color:#503E7E"/>
                                                                <stop  offset="0.5093" style="stop-color:#3C2E6E"/>
                                                                <stop  offset="0.5899" style="stop-color:#342869"/>
                                                            </radialGradient>
                                                            <path style="fill:url(#SVGID_00000023996351394334051020000017520314039352446391_);" d="M752.965,1940.957
                                                                c208.078,0,400.117-68.661,554.721-184.554c-39.758-280.822-281.048-496.82-572.809-496.82
                                                                c-283.007,0-518.507,203.206-568.686,471.663C325.909,1862.287,530.24,1940.957,752.965,1940.957z"/>
                                                            
                                                                <radialGradient id="SVGID_00000071527969844026871310000015674745238624907698_" cx="734.8674" cy="1838.2085" r="221.6622" gradientUnits="userSpaceOnUse">
                                                                <stop  offset="0.4663" style="stop-color:#FFFFFF"/>
                                                                <stop  offset="0.6767" style="stop-color:#F9F8F8"/>
                                                                <stop  offset="0.8625" style="stop-color:#EDECEB"/>
                                                                <stop  offset="0.927" style="stop-color:#E8E6E6"/>
                                                            </radialGradient>
                                                            <path style="fill:url(#SVGID_00000071527969844026871310000015674745238624907698_);" d="M513.186,1838.232
                                                                c0,122.417,99.274,221.619,221.691,221.619c122.379,0,221.672-99.203,221.672-221.619c0-122.434-99.293-221.667-221.672-221.667
                                                                C612.46,1616.565,513.186,1715.799,513.186,1838.232z"/>
                                                            <g>
                                                                <path style="fill:#010101;" d="M731.62,1946.676v-50.208H629.602v-41.722l108.735-158.588h40.06V1854.5H809.5v41.968h-31.103
                                                                    v50.208H731.62z M731.62,1854.5v-85.309l-57.622,85.309H731.62z"/>
                                                            </g>
                                                            <defs>
                                                                
                                                                    <filter id="Adobe_OpacityMaskFilter_00000160908141411164515340000014870705407582690988_" filterUnits="userSpaceOnUse" x="299.228" y="1381.4" width="317.496" height="376.245">
                                                                    <feFlood  style="flood-color:white;flood-opacity:1" result="back"/>
                                                                    <feBlend  in="SourceGraphic" in2="back" mode="normal"/>
                                                                </filter>
                                                            </defs>
                                                            
                                                                <mask maskUnits="userSpaceOnUse" x="299.228" y="1381.4" width="317.496" height="376.245" id="SVGID_00000144311636529258776200000015170358841895041165_">
                                                                <g style="filter:url(#Adobe_OpacityMaskFilter_00000160908141411164515340000014870705407582690988_);">
                                                                    <defs>
                                                                        
                                                                            <filter id="Adobe_OpacityMaskFilter_00000122716195070172129840000018296949329094023841_" filterUnits="userSpaceOnUse" x="299.228" y="1381.4" width="317.496" height="376.245">
                                                                            <feFlood  style="flood-color:white;flood-opacity:1" result="back"/>
                                                                            <feBlend  in="SourceGraphic" in2="back" mode="normal"/>
                                                                        </filter>
                                                                    </defs>
                                                                    
                                                                        <mask maskUnits="userSpaceOnUse" x="299.228" y="1381.4" width="317.496" height="376.245" id="SVGID_00000144311636529258776200000015170358841895041165_">
                                                                        <g style="filter:url(#Adobe_OpacityMaskFilter_00000122716195070172129840000018296949329094023841_);">
                                                                        </g>
                                                                    </mask>
                                                                    
                                                                        <linearGradient id="SVGID_00000183249162694891443530000004596717841633040257_" gradientUnits="userSpaceOnUse" x1="2613.9182" y1="304.7108" x2="2968.9888" y2="304.7108" gradientTransform="matrix(-0.555 0.8319 0.8319 0.555 1723.171 -927.0355)">
                                                                        <stop  offset="0" style="stop-color:#999999"/>
                                                                        <stop  offset="1" style="stop-color:#FFFFFF"/>
                                                                    </linearGradient>
                                                                    
                                                                        <path style="mask:url(#SVGID_00000144311636529258776200000015170358841895041165_);fill:url(#SVGID_00000183249162694891443530000004596717841633040257_);" d="
                                                                        M611.493,1501.911c-35.128,33.011-131.539,130.506-171.73,240.937c-2.197,6.045-12.482,17.238-22.77,14.32
                                                                        c-25.806-7.328-76.089-26.721-111.253-72.533c-2.942-3.827-7.764-17.564-6.211-27.121
                                                                        c8.019-49.421,38.436-206.944,108.428-268.631c5.305-4.673,22.501-10.076,32.33-6.104
                                                                        c36.587,14.785,127.645,53.96,171.919,94.354C616.899,1481.415,619.715,1494.186,611.493,1501.911z"/>
                                                                </g>
                                                            </mask>
                                                            
                                                                <linearGradient id="SVGID_00000114782007981285777690000013693249898225437089_" gradientUnits="userSpaceOnUse" x1="2613.9182" y1="304.7108" x2="2968.9888" y2="304.7108" gradientTransform="matrix(-0.555 0.8319 0.8319 0.555 1723.171 -927.0355)">
                                                                <stop  offset="0" style="stop-color:#8DC63F"/>
                                                                <stop  offset="1" style="stop-color:#009444"/>
                                                            </linearGradient>
                                                            <path style="opacity:0.44;fill:url(#SVGID_00000114782007981285777690000013693249898225437089_);" d="M611.493,1501.911
                                                                c-35.128,33.011-131.539,130.506-171.73,240.937c-2.197,6.045-12.482,17.238-22.77,14.32
                                                                c-25.806-7.328-76.089-26.721-111.253-72.533c-2.942-3.827-7.764-17.564-6.211-27.121c8.019-49.421,38.436-206.944,108.428-268.631
                                                                c5.305-4.673,22.501-10.076,32.33-6.104c36.587,14.785,127.645,53.96,171.919,94.354
                                                                C616.899,1481.415,619.715,1494.186,611.493,1501.911z"/>
                                                        </g>
                                                        <g>
                                                            
                                                                <radialGradient id="SVGID_00000049223516478296044060000002702447772138995123_" cx="3631.085" cy="22344.5352" r="827.7313" gradientTransform="matrix(1 0 0 0.2224 0 -1877.4764)" gradientUnits="userSpaceOnUse">
                                                                <stop  offset="0" style="stop-color:#6D6E71"/>
                                                                <stop  offset="0.0082" style="stop-color:#6F7073"/>
                                                                <stop  offset="0.196" style="stop-color:#97999B"/>
                                                                <stop  offset="0.38" style="stop-color:#BABCBE"/>
                                                                <stop  offset="0.5561" style="stop-color:#D7D8D9"/>
                                                                <stop  offset="0.7222" style="stop-color:#EBECED"/>
                                                                <stop  offset="0.8745" style="stop-color:#F8F8F8"/>
                                                                <stop  offset="1" style="stop-color:#FFFFFF"/>
                                                            </radialGradient>
                                                            <path style="fill:url(#SVGID_00000049223516478296044060000002702447772138995123_);" d="M4577.237,3091.953
                                                                c0,119.667-423.612,216.68-946.162,216.68c-522.53,0-946.143-97.013-946.143-216.68c0-119.678,423.612-216.689,946.143-216.689
                                                                C4153.625,2875.264,4577.237,2972.275,4577.237,3091.953z"/>
                                                            
                                                                <radialGradient id="SVGID_00000011734914376963556370000017761971420450740904_" cx="3270.2874" cy="2103.0728" r="1896.4126" gradientUnits="userSpaceOnUse">
                                                                <stop  offset="0.1011" style="stop-color:#F15E5E"/>
                                                                <stop  offset="0.1191" style="stop-color:#E75959"/>
                                                                <stop  offset="0.2751" style="stop-color:#B73634"/>
                                                                <stop  offset="0.3917" style="stop-color:#9D2122"/>
                                                                <stop  offset="0.4551" style="stop-color:#931A1D"/>
                                                            </radialGradient>
                                                            <path style="fill:url(#SVGID_00000011734914376963556370000017761971420450740904_);" d="M3627.747,1630.043
                                                                c-403.601,0-730.736,327.121-730.736,730.697c0,403.527,327.136,730.695,730.736,730.695c403.55,0,730.658-327.168,730.658-730.695
                                                                C4358.405,1957.164,4031.297,1630.043,3627.747,1630.043z"/>
                                                            
                                                                <radialGradient id="SVGID_00000071525416436526509280000018055463149194236548_" cx="3268.6113" cy="1915.9556" r="1587.9866" gradientUnits="userSpaceOnUse">
                                                                <stop  offset="0.1011" style="stop-color:#F15E5E"/>
                                                                <stop  offset="0.1191" style="stop-color:#E75959"/>
                                                                <stop  offset="0.2751" style="stop-color:#B73634"/>
                                                                <stop  offset="0.3917" style="stop-color:#9D2122"/>
                                                                <stop  offset="0.4551" style="stop-color:#931A1D"/>
                                                            </radialGradient>
                                                            <path style="fill:url(#SVGID_00000071525416436526509280000018055463149194236548_);" d="M2899.413,2301.514
                                                                c189.971,133.448,421.441,211.836,671.251,211.836c296.952,0,567.979-110.775,774.176-293.184
                                                                c-65.531-336.3-361.622-590.122-717.093-590.122C3244.093,1630.043,2929.558,1925.643,2899.413,2301.514z"/>
                                                            
                                                                <radialGradient id="SVGID_00000118398122770599876640000004439098060990908570_" cx="3627.6934" cy="2360.7397" r="279.2542" gradientUnits="userSpaceOnUse">
                                                                <stop  offset="0.4663" style="stop-color:#FFFFFF"/>
                                                                <stop  offset="0.6767" style="stop-color:#F9F8F8"/>
                                                                <stop  offset="0.8625" style="stop-color:#EDECEB"/>
                                                                <stop  offset="0.927" style="stop-color:#E8E6E6"/>
                                                            </radialGradient>
                                                            <path style="fill:url(#SVGID_00000118398122770599876640000004439098060990908570_);" d="M3348.435,2360.764
                                                                c0,154.211,125.053,279.226,279.313,279.226c154.173,0,279.205-125.015,279.205-279.226c0-154.24-125.032-279.273-279.205-279.273
                                                                C3473.487,2081.49,3348.435,2206.523,3348.435,2360.764z"/>
                                                            <g>
                                                                <path style="fill:#010101;" d="M3518.688,2434.454l58.843-6.912c3.731,30.44,18.474,45.637,44.217,45.637
                                                                    c14.102,0,24.845-5.254,32.335-15.837c7.442-10.559,11.212-22.577,11.212-36.074c0-12.636-3.511-23.945-10.495-34
                                                                    c-6.965-9.98-17.392-14.996-31.358-14.996c-7.596,0-16.809,1.456-27.437,4.419l6.39-49.332c33.417,0,50.082-13.365,50.082-40.184
                                                                    c0-23.105-11.424-34.681-34.269-34.681c-23.017,0-36.171,14.049-39.413,42.06l-55.716-9.543
                                                                    c10.963-54.787,43.212-82.176,96.735-82.176c27.572,0,49.929,8.172,67.244,24.5c17.258,16.279,25.887,35.056,25.887,56.308
                                                                    c0,27.571-15.125,49.568-45.373,65.985c39.585,9.389,59.358,34.195,59.358,74.379c0,28.828-10.159,52.553-30.546,71.263
                                                                    c-20.433,18.666-45.287,27.968-74.56,27.968c-28.557,0-52.108-8.043-70.726-24.167
                                                                    C3532.512,2482.968,3521.73,2461.433,3518.688,2434.454z"/>
                                                            </g>
                                                            <defs>
                                                                
                                                                    <filter id="Adobe_OpacityMaskFilter_00000079468651889092856650000011251379514208587909_" filterUnits="userSpaceOnUse" x="3119.181" y="1772.068" width="417.007" height="494.171">
                                                                    <feFlood  style="flood-color:white;flood-opacity:1" result="back"/>
                                                                    <feBlend  in="SourceGraphic" in2="back" mode="normal"/>
                                                                </filter>
                                                            </defs>
                                                            
                                                                <mask maskUnits="userSpaceOnUse" x="3119.181" y="1772.068" width="417.007" height="494.171" id="SVGID_00000158029232881856324400000005072901841990907778_">
                                                                <g style="filter:url(#Adobe_OpacityMaskFilter_00000079468651889092856650000011251379514208587909_);">
                                                                    <defs>
                                                                        
                                                                            <filter id="Adobe_OpacityMaskFilter_00000108299738949418656620000008479234016400966282_" filterUnits="userSpaceOnUse" x="3119.181" y="1772.068" width="417.007" height="494.171">
                                                                            <feFlood  style="flood-color:white;flood-opacity:1" result="back"/>
                                                                            <feBlend  in="SourceGraphic" in2="back" mode="normal"/>
                                                                        </filter>
                                                                    </defs>
                                                                    
                                                                        <mask maskUnits="userSpaceOnUse" x="3119.181" y="1772.068" width="417.007" height="494.171" id="SVGID_00000158029232881856324400000005072901841990907778_">
                                                                        <g style="filter:url(#Adobe_OpacityMaskFilter_00000108299738949418656620000008479234016400966282_);">
                                                                        </g>
                                                                    </mask>
                                                                    
                                                                        <linearGradient id="SVGID_00000175316605904361878250000017764942964175216818_" gradientUnits="userSpaceOnUse" x1="1343.6882" y1="2932.468" x2="1810.0479" y2="2932.468" gradientTransform="matrix(-0.555 0.8319 0.8319 0.555 1723.171 -927.0355)">
                                                                        <stop  offset="0" style="stop-color:#999999"/>
                                                                        <stop  offset="1" style="stop-color:#FFFFFF"/>
                                                                    </linearGradient>
                                                                    
                                                                        <path style="mask:url(#SVGID_00000158029232881856324400000005072901841990907778_);fill:url(#SVGID_00000175316605904361878250000017764942964175216818_);" d="
                                                                        M3529.317,1930.354c-46.14,43.355-172.767,171.407-225.554,316.451c-2.889,7.938-16.393,22.642-29.909,18.808
                                                                        c-33.895-9.626-99.937-35.098-146.124-95.265c-3.86-5.027-10.193-23.072-8.155-35.621
                                                                        c10.533-64.908,50.482-271.807,142.411-352.828c6.969-6.139,29.557-13.235,42.467-8.019
                                                                        c48.051,19.42,167.65,70.873,225.802,123.929C3536.415,1903.432,3540.117,1920.204,3529.317,1930.354z"/>
                                                                </g>
                                                            </mask>
                                                            
                                                                <linearGradient id="SVGID_00000016053187467515789980000008534669794411059594_" gradientUnits="userSpaceOnUse" x1="1343.6882" y1="2932.468" x2="1810.0479" y2="2932.468" gradientTransform="matrix(-0.555 0.8319 0.8319 0.555 1723.171 -927.0355)">
                                                                <stop  offset="0" style="stop-color:#8DC63F"/>
                                                                <stop  offset="1" style="stop-color:#009444"/>
                                                            </linearGradient>
                                                            <path style="opacity:0.44;fill:url(#SVGID_00000016053187467515789980000008534669794411059594_);" d="M3529.317,1930.354
                                                                c-46.14,43.355-172.767,171.407-225.554,316.451c-2.889,7.938-16.393,22.642-29.909,18.808
                                                                c-33.895-9.626-99.937-35.098-146.124-95.265c-3.86-5.027-10.193-23.072-8.155-35.621
                                                                c10.533-64.908,50.482-271.807,142.411-352.828c6.969-6.139,29.557-13.235,42.467-8.019
                                                                c48.051,19.42,167.65,70.873,225.802,123.929C3536.415,1903.432,3540.117,1920.204,3529.317,1930.354z"/>
                                                        </g>
                                                        <g>
                                                            
                                                                <radialGradient id="SVGID_00000016762752816475118600000004513377365338394016_" cx="1423.4138" cy="22344.543" r="827.729" gradientTransform="matrix(1 0 0 0.2224 0 -1877.4764)" gradientUnits="userSpaceOnUse">
                                                                <stop  offset="0" style="stop-color:#6D6E71"/>
                                                                <stop  offset="0.0082" style="stop-color:#6F7073"/>
                                                                <stop  offset="0.196" style="stop-color:#97999B"/>
                                                                <stop  offset="0.38" style="stop-color:#BABCBE"/>
                                                                <stop  offset="0.5561" style="stop-color:#D7D8D9"/>
                                                                <stop  offset="0.7222" style="stop-color:#EBECED"/>
                                                                <stop  offset="0.8745" style="stop-color:#F8F8F8"/>
                                                                <stop  offset="1" style="stop-color:#FFFFFF"/>
                                                            </radialGradient>
                                                            <path style="fill:url(#SVGID_00000016762752816475118600000004513377365338394016_);" d="M2369.567,3091.952
                                                                c0,119.671-423.615,216.681-946.16,216.681c-522.532,0-946.147-97.01-946.147-216.681s423.615-216.686,946.147-216.686
                                                                C1945.952,2875.267,2369.567,2972.281,2369.567,3091.952z"/>
                                                            
                                                                <radialGradient id="SVGID_00000057862719506760279060000011716913973716363684_" cx="1165.5704" cy="2013.1643" r="2294.9602" gradientUnits="userSpaceOnUse">
                                                                <stop  offset="0.0955" style="stop-color:#4A66B0"/>
                                                                <stop  offset="0.2726" style="stop-color:#374995"/>
                                                                <stop  offset="0.427" style="stop-color:#2B3385"/>
                                                            </radialGradient>
                                                            <path style="fill:url(#SVGID_00000057862719506760279060000011716913973716363684_);" d="M1392.303,1640.804
                                                                c-403.504,0-730.625,327.127-730.625,730.674c0,403.561,327.121,730.715,730.625,730.715
                                                                c403.581,0,730.675-327.154,730.675-730.715C2122.978,1967.931,1795.883,1640.804,1392.303,1640.804z"/>
                                                            
                                                                <radialGradient id="SVGID_00000147911223785131489200000014679854469096368022_" cx="1168.7861" cy="1867.657" r="1839.3761" gradientUnits="userSpaceOnUse">
                                                                <stop  offset="0.0955" style="stop-color:#4A66B0"/>
                                                                <stop  offset="0.2726" style="stop-color:#374995"/>
                                                                <stop  offset="0.427" style="stop-color:#2B3385"/>
                                                            </radialGradient>
                                                            <path style="fill:url(#SVGID_00000147911223785131489200000014679854469096368022_);" d="M1392.303,1640.804
                                                                c-374.867,0-683.754,282.361-725.717,646.016c230.44,154.278,507.52,244.307,805.642,244.307
                                                                c233.996,0,454.993-55.488,650.683-153.904c0.012-1.917,0.067-3.821,0.067-5.744
                                                                C2122.978,1967.931,1795.883,1640.804,1392.303,1640.804z"/>
                                                            
                                                                <radialGradient id="SVGID_00000026868441411284808300000005733155476611131301_" cx="1392.3696" cy="2371.4824" r="278.5991" gradientUnits="userSpaceOnUse">
                                                                <stop  offset="0.4663" style="stop-color:#FFFFFF"/>
                                                                <stop  offset="0.6767" style="stop-color:#F9F8F8"/>
                                                                <stop  offset="0.8625" style="stop-color:#EDECEB"/>
                                                                <stop  offset="0.927" style="stop-color:#E8E6E6"/>
                                                            </radialGradient>
                                                            <path style="fill:url(#SVGID_00000026868441411284808300000005733155476611131301_);" d="M1113.785,2371.478
                                                                c0,153.872,124.682,278.618,278.542,278.618c153.929,0,278.628-124.746,278.628-278.618c0-153.865-124.699-278.609-278.628-278.609
                                                                C1238.467,2092.869,1113.785,2217.613,1113.785,2371.478z"/>
                                                            <g>
                                                                <path style="fill:#010101;" d="M1500.461,2466.655v55.525h-210.632c1.768-16.968,7.489-34.805,17.161-53.503
                                                                    c9.681-18.668,32.832-44.856,69.409-78.416c42.46-39.099,63.731-69.539,63.731-91.42c0-27.713-13.563-41.597-40.622-41.597
                                                                    c-26.355,0-40.516,16.392-42.463,49.162l-59.997-6.251c6.561-61.896,41.27-92.845,104.16-92.845
                                                                    c29.513,0,53.347,7.809,71.73,23.402c18.331,15.621,27.522,36.85,27.522,63.731c0,37.543-22.845,76.867-68.477,117.936
                                                                    c-28.365,25.675-45.226,43.762-50.678,54.275H1500.461z"/>
                                                            </g>
                                                            <defs>
                                                                
                                                                    <filter id="Adobe_OpacityMaskFilter_00000052069626168131513220000005240433664992916648_" filterUnits="userSpaceOnUse" x="847.311" y="1811.735" width="417.006" height="494.171">
                                                                    <feFlood  style="flood-color:white;flood-opacity:1" result="back"/>
                                                                    <feBlend  in="SourceGraphic" in2="back" mode="normal"/>
                                                                </filter>
                                                            </defs>
                                                            
                                                                <mask maskUnits="userSpaceOnUse" x="847.311" y="1811.735" width="417.006" height="494.171" id="SVGID_00000147195870756423571890000011309176917061915552_">
                                                                <g style="filter:url(#Adobe_OpacityMaskFilter_00000052069626168131513220000005240433664992916648_);">
                                                                    <defs>
                                                                        
                                                                            <filter id="Adobe_OpacityMaskFilter_00000145051258691777471090000011425973315602843784_" filterUnits="userSpaceOnUse" x="847.311" y="1811.735" width="417.006" height="494.171">
                                                                            <feFlood  style="flood-color:white;flood-opacity:1" result="back"/>
                                                                            <feBlend  in="SourceGraphic" in2="back" mode="normal"/>
                                                                        </filter>
                                                                    </defs>
                                                                    
                                                                        <mask maskUnits="userSpaceOnUse" x="847.311" y="1811.735" width="417.006" height="494.171" id="SVGID_00000147195870756423571890000011309176917061915552_">
                                                                        <g style="filter:url(#Adobe_OpacityMaskFilter_00000145051258691777471090000011425973315602843784_);">
                                                                        </g>
                                                                    </mask>
                                                                    
                                                                        <linearGradient id="SVGID_00000054226321794649441080000015534185533397317013_" gradientUnits="userSpaceOnUse" x1="2637.4683" y1="1064.6686" x2="3103.8284" y2="1064.6686" gradientTransform="matrix(-0.555 0.8319 0.8319 0.555 1723.171 -927.0355)">
                                                                        <stop  offset="0" style="stop-color:#999999"/>
                                                                        <stop  offset="1" style="stop-color:#FFFFFF"/>
                                                                    </linearGradient>
                                                                    
                                                                        <path style="mask:url(#SVGID_00000147195870756423571890000011309176917061915552_);fill:url(#SVGID_00000054226321794649441080000015534185533397317013_);" d="
                                                                        M1257.447,1970.021c-46.139,43.355-172.766,171.407-225.554,316.452c-2.889,7.938-16.392,22.642-29.91,18.807
                                                                        c-33.894-9.625-99.936-35.096-146.123-95.265c-3.859-5.026-10.193-23.071-8.155-35.62
                                                                        c10.532-64.909,50.482-271.807,142.411-352.828c6.969-6.14,29.556-13.236,42.466-8.019
                                                                        c48.052,19.42,167.652,70.873,225.802,123.929C1264.545,1943.099,1268.247,1959.871,1257.447,1970.021z"/>
                                                                </g>
                                                            </mask>
                                                            
                                                                <linearGradient id="SVGID_00000041274129483899034010000017865657959481974435_" gradientUnits="userSpaceOnUse" x1="2637.4683" y1="1064.6686" x2="3103.8284" y2="1064.6686" gradientTransform="matrix(-0.555 0.8319 0.8319 0.555 1723.171 -927.0355)">
                                                                <stop  offset="0" style="stop-color:#8DC63F"/>
                                                                <stop  offset="1" style="stop-color:#009444"/>
                                                            </linearGradient>
                                                            <path style="opacity:0.44;fill:url(#SVGID_00000041274129483899034010000017865657959481974435_);" d="M1257.447,1970.021
                                                                c-46.139,43.355-172.766,171.407-225.554,316.452c-2.889,7.938-16.392,22.642-29.91,18.807
                                                                c-33.894-9.625-99.936-35.096-146.123-95.265c-3.859-5.026-10.193-23.071-8.155-35.62
                                                                c10.532-64.909,50.482-271.807,142.411-352.828c6.969-6.14,29.556-13.236,42.466-8.019
                                                                c48.052,19.42,167.652,70.873,225.802,123.929C1264.545,1943.099,1268.247,1959.871,1257.447,1970.021z"/>
                                                        </g>
                                                        <g>
                                                            
                                                                <radialGradient id="SVGID_00000036948079081126802770000014131734754575640480_" cx="2505.0879" cy="27364.457" r="1004.6551" gradientTransform="matrix(1 0 0 0.2224 0 -1877.4764)" gradientUnits="userSpaceOnUse">
                                                                <stop  offset="0" style="stop-color:#6D6E71"/>
                                                                <stop  offset="0.0082" style="stop-color:#6F7073"/>
                                                                <stop  offset="0.196" style="stop-color:#97999B"/>
                                                                <stop  offset="0.38" style="stop-color:#BABCBE"/>
                                                                <stop  offset="0.5561" style="stop-color:#D7D8D9"/>
                                                                <stop  offset="0.7222" style="stop-color:#EBECED"/>
                                                                <stop  offset="0.8745" style="stop-color:#F8F8F8"/>
                                                                <stop  offset="1" style="stop-color:#FFFFFF"/>
                                                            </radialGradient>
                                                            <path style="fill:url(#SVGID_00000036948079081126802770000014131734754575640480_);" d="M3653.477,4208.383
                                                                c0,145.24-514.159,263-1148.388,263c-634.235,0-1148.39-117.76-1148.39-263c0-145.259,514.155-263.008,1148.39-263.008
                                                                C3139.317,3945.375,3653.477,4063.124,3653.477,4208.383z"/>
                                                            <g>
                                                                
                                                                    <radialGradient id="SVGID_00000106130805404850111460000014036263539904422588_" cx="1972.142" cy="2831.5347" r="2741.0708" gradientUnits="userSpaceOnUse">
                                                                    <stop  offset="0.0787" style="stop-color:#EEC178"/>
                                                                    <stop  offset="0.1908" style="stop-color:#D7A355"/>
                                                                    <stop  offset="0.3363" style="stop-color:#C18834"/>
                                                                    <stop  offset="0.4101" style="stop-color:#BA7E2B"/>
                                                                </radialGradient>
                                                                <path style="fill:url(#SVGID_00000106130805404850111460000014036263539904422588_);" d="M2488.74,2147.808
                                                                    c-583.251,0-1056.149,472.885-1056.149,1056.138c0,583.272,472.898,1056.211,1056.149,1056.211
                                                                    c583.324,0,1056.109-472.938,1056.109-1056.211C3544.85,2620.692,3072.064,2147.808,2488.74,2147.808z"/>
                                                                
                                                                    <radialGradient id="SVGID_00000070826441046791443630000015221463117351315372_" cx="1980.9083" cy="2552.0242" r="2280.5845" gradientUnits="userSpaceOnUse">
                                                                    <stop  offset="0.0787" style="stop-color:#EEC178"/>
                                                                    <stop  offset="0.1908" style="stop-color:#D7A355"/>
                                                                    <stop  offset="0.3363" style="stop-color:#C18834"/>
                                                                    <stop  offset="0.4101" style="stop-color:#BA7E2B"/>
                                                                </radialGradient>
                                                                <path style="fill:url(#SVGID_00000070826441046791443630000015221463117351315372_);" d="M2509.299,3396.619
                                                                    c385.107,0,740.09-128.637,1024.559-345.148c-73.91-511.002-513.586-903.663-1045.117-903.663
                                                                    c-521.471,0-954.669,378.029-1040.604,874.954C1738.502,3256.57,2107.538,3396.619,2509.299,3396.619z"/>
                                                                
                                                                    <radialGradient id="SVGID_00000180332784220078971200000002958837013484588681_" cx="2488.7271" cy="3203.9844" r="396.1321" gradientUnits="userSpaceOnUse">
                                                                    <stop  offset="0.4663" style="stop-color:#FFFFFF"/>
                                                                    <stop  offset="0.6767" style="stop-color:#F9F8F8"/>
                                                                    <stop  offset="0.8625" style="stop-color:#EDECEB"/>
                                                                    <stop  offset="0.927" style="stop-color:#E8E6E6"/>
                                                                </radialGradient>
                                                                <path style="fill:url(#SVGID_00000180332784220078971200000002958837013484588681_);" d="M2092.596,3204.008
                                                                    c0,218.784,177.427,396.109,396.145,396.109c218.767,0,396.118-177.325,396.118-396.109
                                                                    c0-218.804-177.352-396.156-396.118-396.156C2270.022,2807.852,2092.596,2985.204,2092.596,3204.008z"/>
                                                                <g>
                                                                    <path style="fill:#010101;" d="M2550.109,3437.323h-85.256v-321.557c-31.282,29.221-68.027,50.787-110.253,64.774v-77.865
                                                                        c63.941-22.717,105.891-60.374,126.095-113.033h69.415V3437.323z"/>
                                                                </g>
                                                            </g>
                                                            <defs>
                                                                
                                                                    <filter id="Adobe_OpacityMaskFilter_00000021095400501754006250000017043007003673738645_" filterUnits="userSpaceOnUse" x="1649.787" y="2409.29" width="612.506" height="725.851">
                                                                    <feFlood  style="flood-color:white;flood-opacity:1" result="back"/>
                                                                    <feBlend  in="SourceGraphic" in2="back" mode="normal"/>
                                                                </filter>
                                                            </defs>
                                                            
                                                                <mask maskUnits="userSpaceOnUse" x="1649.787" y="2409.29" width="612.506" height="725.851" id="SVGID_00000028296810998389232380000012388468018727040916_">
                                                                <g style="filter:url(#Adobe_OpacityMaskFilter_00000021095400501754006250000017043007003673738645_);">
                                                                    <defs>
                                                                        
                                                                            <filter id="Adobe_OpacityMaskFilter_00000086657118787042198400000009497684899019578802_" filterUnits="userSpaceOnUse" x="1649.787" y="2409.29" width="612.506" height="725.851">
                                                                            <feFlood  style="flood-color:white;flood-opacity:1" result="back"/>
                                                                            <feBlend  in="SourceGraphic" in2="back" mode="normal"/>
                                                                        </filter>
                                                                    </defs>
                                                                    
                                                                        <mask maskUnits="userSpaceOnUse" x="1649.787" y="2409.29" width="612.506" height="725.851" id="SVGID_00000028296810998389232380000012388468018727040916_">
                                                                        <g style="filter:url(#Adobe_OpacityMaskFilter_00000086657118787042198400000009497684899019578802_);">
                                                                        </g>
                                                                    </mask>
                                                                    
                                                                        <linearGradient id="SVGID_00000073695964713303771810000015149188033901091492_" gradientUnits="userSpaceOnUse" x1="2629.7524" y1="2191.9578" x2="3314.7522" y2="2191.9578" gradientTransform="matrix(-0.555 0.8319 0.8319 0.555 1723.171 -927.0355)">
                                                                        <stop  offset="0" style="stop-color:#999999"/>
                                                                        <stop  offset="1" style="stop-color:#FFFFFF"/>
                                                                    </linearGradient>
                                                                    
                                                                        <path style="mask:url(#SVGID_00000028296810998389232380000012388468018727040916_);fill:url(#SVGID_00000073695964713303771810000015149188033901091492_);" d="
                                                                        M2252.204,2641.782c-67.773,63.684-253.765,251.766-331.303,464.811c-4.24,11.661-24.072,33.258-43.927,27.628
                                                                        c-49.789-14.144-146.788-51.555-214.628-139.929c-5.673-7.386-14.977-33.89-11.978-52.323
                                                                        c15.464-95.341,74.143-399.233,209.175-518.238c10.238-9.018,43.413-19.441,62.371-11.78
                                                                        c70.579,28.527,246.253,104.1,331.667,182.028C2262.627,2602.238,2268.065,2626.875,2252.204,2641.782z"/>
                                                                </g>
                                                            </mask>
                                                            
                                                                <linearGradient id="SVGID_00000088842015277776956880000002031530884749036474_" gradientUnits="userSpaceOnUse" x1="2629.7524" y1="2191.9578" x2="3314.7522" y2="2191.9578" gradientTransform="matrix(-0.555 0.8319 0.8319 0.555 1723.171 -927.0355)">
                                                                <stop  offset="0" style="stop-color:#8DC63F"/>
                                                                <stop  offset="1" style="stop-color:#009444"/>
                                                            </linearGradient>
                                                            <path style="opacity:0.44;fill:url(#SVGID_00000088842015277776956880000002031530884749036474_);" d="M2252.204,2641.782
                                                                c-67.773,63.684-253.765,251.766-331.303,464.811c-4.24,11.661-24.072,33.258-43.927,27.628
                                                                c-49.789-14.144-146.788-51.555-214.628-139.929c-5.673-7.386-14.977-33.89-11.978-52.323
                                                                c15.464-95.341,74.143-399.233,209.175-518.238c10.238-9.018,43.413-19.441,62.371-11.78
                                                                c70.579,28.527,246.253,104.1,331.667,182.028C2262.627,2602.238,2268.065,2626.875,2252.204,2641.782z"/>
                                                        </g>
                                                    </svg>
                                                </div>
                                                <div class="flex flex-col flex-grow ml-2">
                                    

                                                    <p class=" font-Allerta text-md md:text-lg lg:text-xl font-bold text-blue-500 mt-4 " >SORTEO NRO. <span class=" text-yellow-500 font-Allerta font-extrabold text-lg md:text-xl lg:text-2xl ">  {{$sorteo->id}} </span>  </p>
                                                    

                                            

                                                
                                                </div>
                                            </div>
                                        </div>



                                        <div class="col-span-4 md:col-span-2  lg:col-span-1 ">
                                            <div class="flex flex-row bg-white shadow-sm rounded p-1">
                                                <div class="flex items-center justify-center flex-shrink-0 h-20  w-20 rounded-xl text-blue-500">
                                                <svg class="h-24 w-24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 500" style="enable-background:new 0 0 500 500;" xml:space="preserve">
                                                    <g id="Background_Complete">
                                                    <g>
                                                    <rect y="382.398" style="fill:#EBEBEB;" width="500" height="0.25"/>
                                                    <rect x="416.779" y="398.494" style="fill:#EBEBEB;" width="33.122" height="0.25"/>
                                                    <rect x="322.527" y="401.208" style="fill:#EBEBEB;" width="8.693" height="0.25"/>
                                                    <rect x="396.586" y="389.208" style="fill:#EBEBEB;" width="19.192" height="0.25"/>
                                                    <rect x="52.459" y="390.888" style="fill:#EBEBEB;" width="43.193" height="0.25"/>
                                                    <rect x="104.556" y="390.888" style="fill:#EBEBEB;" width="6.333" height="0.25"/>
                                                    <rect x="131.471" y="395.111" style="fill:#EBEBEB;" width="93.676" height="0.25"/>
                                                    <path style="fill:#EBEBEB;" d="M237.014,337.8H43.915c-3.147,0-5.708-2.561-5.708-5.708V60.66c0-3.147,2.561-5.708,5.708-5.708
                                                        h193.099c3.146,0,5.707,2.561,5.707,5.708v271.432C242.721,335.239,240.16,337.8,237.014,337.8z M43.915,55.203
                                                        c-3.01,0-5.458,2.448-5.458,5.458v271.432c0,3.01,2.448,5.458,5.458,5.458h193.099c3.009,0,5.457-2.448,5.457-5.458V60.66
                                                        c0-3.009-2.448-5.458-5.457-5.458H43.915z"/>
                                                    <path style="fill:#EBEBEB;" d="M453.31,337.8H260.212c-3.147,0-5.707-2.561-5.707-5.708V60.66c0-3.147,2.561-5.708,5.707-5.708
                                                        H453.31c3.148,0,5.708,2.561,5.708,5.708v271.432C459.019,335.239,456.458,337.8,453.31,337.8z M260.212,55.203
                                                        c-3.009,0-5.457,2.448-5.457,5.458v271.432c0,3.01,2.448,5.458,5.457,5.458H453.31c3.01,0,5.458-2.448,5.458-5.458V60.66
                                                        c0-3.009-2.448-5.458-5.458-5.458H260.212z"/>
                                                    </g>
                                                    <g>
                                                    <polygon style="fill:#F5F5F5;" points="403.13,210.111 252.691,227.936 371.672,134.164 344.887,107.379 251.115,226.359 
                                                        268.94,75.921 231.061,75.921 248.886,226.36 155.113,107.379 128.329,134.164 247.309,227.936 96.87,210.111 96.87,247.99 
                                                        247.309,230.165 128.329,323.937 155.113,350.722 248.885,231.742 231.061,382.18 268.94,382.18 251.115,231.742 344.887,350.722 
                                                        371.672,323.937 252.691,230.165 403.13,247.99 		"/>
                                                    <g>
                                                        <polygon style="fill:#E0E0E0;" points="248.368,114.659 284.08,187.02 363.935,198.624 306.151,254.949 319.792,334.482 
                                                            248.368,296.931 176.943,334.482 190.584,254.949 132.8,198.624 212.656,187.02 			"/>
                                                        <polygon style="fill:#E0E0E0;" points="365.62,117.185 376.434,124.278 388.407,119.391 385.003,131.867 393.35,141.745 
                                                            380.433,142.362 373.618,153.354 369.039,141.259 356.48,138.175 366.568,130.082 			"/>
                                                        <polygon style="fill:#E0E0E0;" points="375.122,307.672 385.935,314.765 397.909,309.878 394.504,322.354 402.852,332.232 
                                                            389.934,332.849 383.12,343.841 378.541,331.746 365.982,328.662 376.069,320.569 			"/>
                                                        <polygon style="fill:#E0E0E0;" points="248.503,362.633 259.316,369.726 271.29,364.839 267.885,377.315 276.233,387.193 
                                                            263.315,387.81 256.501,398.802 251.922,386.707 239.363,383.623 249.45,375.53 			"/>
                                                        <polygon style="fill:#E0E0E0;" points="96.773,333.881 107.587,340.974 119.56,336.087 116.156,348.564 124.503,358.441 
                                                            111.586,359.059 104.771,370.05 100.192,357.955 87.633,354.871 97.72,346.779 			"/>
                                                        <polygon style="fill:#E0E0E0;" points="76.166,228.867 81.707,232.502 87.843,229.998 86.098,236.391 90.376,241.452 
                                                            83.757,241.769 80.265,247.401 77.918,241.204 71.482,239.623 76.651,235.476 			"/>
                                                        <polygon style="fill:#E0E0E0;" points="414.308,218.4 419.849,222.035 425.985,219.531 424.24,225.924 428.518,230.985 
                                                            421.898,231.302 418.406,236.934 416.06,230.736 409.624,229.156 414.793,225.009 			"/>
                                                        <polygon style="fill:#E0E0E0;" points="351.778,246.574 359.411,251.581 367.864,248.132 365.46,256.939 371.353,263.911 
                                                            362.234,264.347 357.424,272.106 354.192,263.568 345.326,261.391 352.447,255.678 			"/>
                                                        <polygon style="fill:#E0E0E0;" points="338.782,359.94 344.323,363.575 350.459,361.071 348.714,367.464 352.992,372.526 
                                                            346.372,372.842 342.88,378.474 340.534,372.277 334.098,370.696 339.267,366.549 			"/>
                                                        <polygon style="fill:#E0E0E0;" points="300.871,342.161 304.407,344.481 308.323,342.883 307.209,346.963 309.939,350.193 
                                                            305.715,350.395 303.486,353.989 301.989,350.034 297.882,349.025 301.18,346.379 			"/>
                                                        <polygon style="fill:#E0E0E0;" points="218.642,337.927 222.178,340.246 226.094,338.648 224.98,342.728 227.71,345.958 
                                                            223.486,346.16 221.257,349.755 219.76,345.8 215.653,344.791 218.952,342.145 			"/>
                                                        <polygon style="fill:#E0E0E0;" points="110.153,181.627 109.236,185.756 112.118,188.852 107.908,189.256 105.854,192.953 
                                                            104.169,189.074 100.018,188.264 103.186,185.462 102.675,181.264 106.318,183.411 			"/>
                                                        <polygon style="fill:#E0E0E0;" points="319.237,98.535 318.32,102.663 321.202,105.759 316.992,106.163 314.938,109.86 
                                                            313.253,105.982 309.102,105.171 312.27,102.369 311.758,98.171 315.402,100.318 			"/>
                                                        <polygon style="fill:#E0E0E0;" points="138.993,267.712 144.535,271.347 150.67,268.843 148.926,275.236 153.203,280.298 
                                                            146.584,280.614 143.092,286.246 140.745,280.049 134.31,278.468 139.479,274.321 			"/>
                                                        <polygon style="fill:#E0E0E0;" points="179.762,374.947 185.303,378.582 191.438,376.078 189.694,382.471 193.971,387.532 
                                                            187.352,387.849 183.86,393.481 181.514,387.283 175.078,385.703 180.247,381.556 			"/>
                                                        <polygon style="fill:#E0E0E0;" points="176.839,140.176 182.38,143.811 188.516,141.307 186.771,147.7 191.049,152.762 
                                                            184.429,153.078 180.937,158.711 178.591,152.513 172.155,150.932 177.324,146.786 			"/>
                                                        <polygon style="fill:#E0E0E0;" points="274.682,109.683 280.223,113.317 286.359,110.813 284.614,117.206 288.892,122.268 
                                                            282.273,122.585 278.781,128.217 276.434,122.019 269.998,120.439 275.168,116.292 			"/>
                                                        <polygon style="fill:#E0E0E0;" points="112.083,108.307 122.896,115.4 134.87,110.514 131.465,122.99 139.813,132.867 
                                                            126.895,133.485 120.081,144.476 115.502,132.382 102.943,129.297 113.03,121.205 			"/>
                                                        <polygon style="fill:#E0E0E0;" points="212.223,84.874 218.347,88.891 225.129,86.123 223.2,93.19 227.928,98.784 
                                                            220.612,99.134 216.753,105.359 214.159,98.509 207.046,96.762 212.759,92.179 			"/>
                                                    </g>
                                                    </g>
                                                    </g>
                                                    <g id="Background_Simple" style="display:none;">
                                                    <g style="display:inline;">
                                                    <path style="fill:#407BFF;" d="M276.479,181.322C212.278,225.125,72.35,140.624,67.368,281.956
                                                        c-3.535,100.268,143.569,162.56,194.105,76.099c30.588-52.332,23.77-46.046,78.647-65.676
                                                        c55.613-19.893,103.462-53.215,99.429-128.612c-2.087-39.018-44.796-90.075-88.514-91.198
                                                        C296.358,71.166,315.7,154.563,276.479,181.322z"/>
                                                    <path style="opacity:0.9;fill:#FFFFFF;" d="M276.479,181.322C212.278,225.125,72.35,140.624,67.368,281.956
                                                        c-3.535,100.268,143.569,162.56,194.105,76.099c30.588-52.332,23.77-46.046,78.647-65.676
                                                        c55.613-19.893,103.462-53.215,99.429-128.612c-2.087-39.018-44.796-90.075-88.514-91.198
                                                    C296.358,71.166,315.7,154.563,276.479,181.322z"/>
                                                    </g>
                                                    </g>
                                                    <g id="Shadow_1_">
                                                    <ellipse id="_x3C_Path_x3E__359_" style="fill:#F5F5F5;" cx="250" cy="416.238" rx="193.889" ry="11.323"/>
                                                    </g>
                                                    <g id="Bingo_2">
                                                    <g>
                                                    
                                                        <rect x="298.89" y="200.011" transform="matrix(0.9818 0.1898 -0.1898 0.9818 55.8987 -61.1797)" style="fill:#263238;" width="96.774" height="122.326"/>
                                                    <g>
                                                        
                                                            <rect x="335.92" y="265.446" transform="matrix(0.9818 0.1899 -0.1899 0.9818 58.3403 -60.4617)" style="fill:#FFFFFF;" width="17.65" height="17.65"/>
                                                        <path style="fill:#263238;" d="M352.288,275.729c-0.805,4.166-4.836,6.89-9.002,6.085c-4.166-0.805-6.89-4.836-6.085-9.002
                                                            c0.806-4.166,4.836-6.89,9.002-6.085C350.369,267.533,353.094,271.563,352.288,275.729z"/>
                                                        
                                                            <rect x="306.528" y="222.275" transform="matrix(0.9818 0.1898 -0.1898 0.9818 49.6084 -55.6656)" style="fill:#FFFFFF;" width="17.65" height="17.65"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M317.27,227.129l-1.57,8.117l-1.507-0.291l1.325-6.853l-1.716-0.332l0.245-1.265L317.27,227.129z
                                                                "/>
                                                        </g>
                                                        
                                                            <rect x="324.718" y="225.792" transform="matrix(0.9818 0.1898 -0.1898 0.9818 50.6069 -59.0549)" style="fill:#FFFFFF;" width="17.65" height="17.65"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M332.087,229.994l-1.569,8.117l-1.508-0.291l1.325-6.852l-1.716-0.332l0.245-1.265
                                                                L332.087,229.994z"/>
                                                            <path style="fill:#263238;" d="M338.361,237.102c-0.265,1.368-1.525,2.352-3.705,1.93c-1.148-0.222-2.228-0.791-2.868-1.529
                                                                l0.875-1.045c0.485,0.6,1.307,1.082,2.223,1.26c1.078,0.208,1.808-0.145,1.954-0.897c0.141-0.731-0.301-1.309-1.53-1.547
                                                                l-0.742-0.143l0.2-1.033l2.267-1.833l-3.687-0.714l0.244-1.265l5.531,1.07l-0.195,1.009l-2.424,1.96
                                                                C337.997,234.817,338.597,235.884,338.361,237.102z"/>
                                                        </g>
                                                        
                                                            <rect x="342.907" y="229.309" transform="matrix(0.9818 0.1899 -0.1899 0.9818 51.6071 -62.4459)" style="fill:#FFFFFF;" width="17.65" height="17.65"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M351.824,240.318l-1.438-0.277l-0.356,1.844l-1.461-0.283l0.356-1.844l-4.453-0.86l0.202-1.044
                                                                l5.012-4.456l1.611,0.311l-4.735,4.27l2.656,0.514l0.316-1.635l1.415,0.273l-0.316,1.635l1.438,0.277L351.824,240.318z"/>
                                                            <path style="fill:#263238;" d="M358.221,240.941c-0.265,1.368-1.525,2.352-3.706,1.93c-1.147-0.222-2.228-0.791-2.868-1.528
                                                                l0.876-1.046c0.486,0.6,1.306,1.082,2.222,1.26c1.078,0.208,1.809-0.143,1.954-0.896c0.141-0.732-0.3-1.31-1.529-1.547
                                                                l-0.742-0.144l0.199-1.032l2.267-1.834l-3.688-0.713l0.245-1.265l5.531,1.069l-0.195,1.009l-2.424,1.96
                                                                C357.856,238.657,358.456,239.724,358.221,240.941z"/>
                                                        </g>
                                                        
                                                            <rect x="361.097" y="232.827" transform="matrix(0.9818 0.1899 -0.1899 0.9818 52.6057 -65.8352)" style="fill:#FFFFFF;" width="17.65" height="17.65"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M369.206,243.065c-0.265,1.369-1.525,2.352-3.706,1.93c-1.148-0.222-2.228-0.791-2.868-1.528
                                                                l0.876-1.046c0.486,0.6,1.306,1.083,2.222,1.26c1.079,0.208,1.809-0.144,1.954-0.896c0.142-0.731-0.3-1.31-1.529-1.547
                                                                l-0.742-0.144l0.2-1.032l2.267-1.834l-3.688-0.713l0.245-1.265l5.531,1.069l-0.195,1.009l-2.424,1.961
                                                                C368.841,240.782,369.441,241.849,369.206,243.065z"/>
                                                            <path style="fill:#263238;" d="M375.987,244.317c-0.276,1.426-1.537,2.409-3.716,1.987c-1.148-0.222-2.24-0.794-2.868-1.529
                                                                l0.864-1.048c0.497,0.602,1.318,1.085,2.234,1.262c1.079,0.209,1.808-0.144,1.956-0.908c0.15-0.777-0.254-1.36-1.936-1.686
                                                                l-1.96-0.379l1.272-4.337l4.766,0.922l-0.244,1.265l-3.49-0.675l-0.537,1.844l0.777,0.15
                                                                C375.504,241.649,376.265,242.879,375.987,244.317z"/>
                                                        </g>
                                                        
                                                            <rect x="379.287" y="236.344" transform="matrix(0.9818 0.1898 -0.1898 0.9818 53.6025 -69.2228)" style="fill:#FFFFFF;" width="17.65" height="17.65"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M387.389,244.753c-0.538,2.783-2.458,4-4.812,3.545c-0.811-0.157-1.555-0.48-2.033-0.935
                                                                l0.776-1.028c0.385,0.375,0.898,0.582,1.466,0.692c1.531,0.296,2.677-0.47,3.034-2.313l0.002-0.01
                                                                c-0.597,0.474-1.428,0.602-2.332,0.427c-1.6-0.31-2.606-1.515-2.313-3.033c0.312-1.612,1.819-2.38,3.478-2.059
                                                                C386.87,240.467,387.893,242.145,387.389,244.753z M385.924,242.931c0.148-0.765-0.338-1.485-1.416-1.693
                                                                c-0.939-0.182-1.692,0.226-1.855,1.072c-0.164,0.847,0.371,1.503,1.356,1.694C384.983,244.191,385.77,243.731,385.924,242.931z"
                                                                />
                                                            <path style="fill:#263238;" d="M388.379,245.09c0.516-2.667,2.269-3.893,4.193-3.52c1.937,0.375,3.106,2.165,2.59,4.832
                                                                c-0.516,2.667-2.268,3.892-4.205,3.517C389.034,249.546,387.864,247.757,388.379,245.09z M393.644,246.107
                                                                c0.379-1.96-0.211-3.012-1.325-3.228c-1.102-0.213-2.042,0.544-2.42,2.504c-0.379,1.959,0.212,3.011,1.313,3.224
                                                                C392.325,248.823,393.265,248.066,393.644,246.107z"/>
                                                        </g>
                                                        
                                                            <rect x="303.034" y="240.343" transform="matrix(0.9818 0.1898 -0.1898 0.9818 52.9747 -54.6735)" style="fill:#FFFFFF;" width="17.65" height="17.65"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M312.4,250.765c-0.275,1.426-1.537,2.41-3.716,1.988c-1.148-0.222-2.24-0.795-2.868-1.53
                                                                l0.864-1.046c0.497,0.6,1.318,1.084,2.234,1.262c1.079,0.208,1.808-0.145,1.956-0.91c0.15-0.775-0.254-1.359-1.935-1.685
                                                                l-1.96-0.379l1.272-4.337l4.766,0.921l-0.245,1.265l-3.49-0.675l-0.537,1.845l0.777,0.149
                                                                C311.918,248.098,312.678,249.326,312.4,250.765z"/>
                                                            <path style="fill:#263238;" d="M317.161,245.852l-1.569,8.117l-1.508-0.292l1.325-6.853l-1.716-0.332l0.244-1.265
                                                                L317.161,245.852z"/>
                                                        </g>
                                                        
                                                            <rect x="321.224" y="243.861" transform="matrix(0.9818 0.1898 -0.1898 0.9818 53.9732 -58.0628)" style="fill:#FFFFFF;" width="17.65" height="17.65"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M330.849,254.5c-0.291,1.507-1.783,2.194-3.801,1.804c-2.018-0.39-3.123-1.579-2.832-3.086
                                                                c0.173-0.893,0.765-1.463,1.673-1.685c-0.58-0.484-0.827-1.134-0.679-1.899c0.269-1.393,1.655-2.026,3.452-1.68
                                                                c1.809,0.351,2.87,1.458,2.601,2.85c-0.148,0.766-0.631,1.273-1.361,1.506C330.674,252.855,331.022,253.607,330.849,254.5z
                                                                    M329.338,254.161c0.155-0.801-0.444-1.434-1.558-1.649c-1.113-0.215-1.882,0.153-2.037,0.954
                                                                c-0.159,0.822,0.419,1.439,1.532,1.654C328.39,255.336,329.18,254.983,329.338,254.161z M326.681,249.989
                                                                c-0.134,0.696,0.36,1.248,1.311,1.432c0.962,0.187,1.639-0.139,1.774-0.835c0.141-0.73-0.404-1.269-1.332-1.448
                                                                C327.506,248.959,326.822,249.259,326.681,249.989z"/>
                                                            <path style="fill:#263238;" d="M335.745,249.444l-1.569,8.117l-1.508-0.291l1.325-6.853l-1.716-0.332l0.244-1.265
                                                                L335.745,249.444z"/>
                                                        </g>
                                                        
                                                            <rect x="339.414" y="247.378" transform="matrix(0.9818 0.1899 -0.1899 0.9818 54.9735 -61.4536)" style="fill:#FFFFFF;" width="17.65" height="17.65"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M348.533,259.015l-0.247,1.275l-5.983-1.156l0.195-1.009l3.815-2.439
                                                                c0.935-0.601,1.165-1.051,1.253-1.502c0.144-0.742-0.284-1.27-1.281-1.463c-0.789-0.152-1.501-0.014-2.065,0.479l-0.898-1.015
                                                                c0.79-0.725,2.012-1.008,3.345-0.75c1.763,0.341,2.726,1.454,2.448,2.892c-0.152,0.789-0.512,1.465-1.841,2.303l-2.567,1.645
                                                                L348.533,259.015z"/>
                                                            <path style="fill:#263238;" d="M353.529,252.884l-1.57,8.117l-1.507-0.292l1.325-6.853l-1.716-0.332l0.245-1.265
                                                                L353.529,252.884z"/>
                                                        </g>
                                                        
                                                            <rect x="357.603" y="250.895" transform="matrix(0.9818 0.1898 -0.1898 0.9818 55.9703 -64.8413)" style="fill:#FFFFFF;" width="17.65" height="17.65"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M364.822,255.067l-1.57,8.117l-1.507-0.292l1.325-6.853l-1.716-0.332l0.245-1.265
                                                                L364.822,255.067z"/>
                                                            <path style="fill:#263238;" d="M372.555,256.563l-0.195,1.01l-4.529,6.497l-1.612-0.311l4.373-6.251l-3.189-0.616l-0.267,1.379
                                                                l-1.403-0.272l0.514-2.655L372.555,256.563z"/>
                                                        </g>
                                                        
                                                            <rect x="375.793" y="254.412" transform="matrix(0.9818 0.1898 -0.1898 0.9818 56.9688 -68.2305)" style="fill:#FFFFFF;" width="17.65" height="17.65"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M384.089,265.301l-1.438-0.278l-0.357,1.844l-1.461-0.282l0.356-1.844l-4.453-0.861l0.202-1.043
                                                                l5.012-4.457l1.611,0.311l-4.735,4.27l2.656,0.514l0.316-1.635l1.415,0.273l-0.316,1.635l1.438,0.278L384.089,265.301z"/>
                                                            <path style="fill:#263238;" d="M391.96,266.822l-1.438-0.277l-0.357,1.844l-1.461-0.283l0.356-1.844l-4.453-0.86l0.202-1.043
                                                                l5.012-4.457l1.612,0.311l-4.735,4.27l2.655,0.513l0.316-1.635l1.415,0.274l-0.316,1.635l1.438,0.277L391.96,266.822z"/>
                                                        </g>
                                                        
                                                            <rect x="299.541" y="258.412" transform="matrix(0.9818 0.1898 -0.1898 0.9818 56.3417 -53.6819)" style="fill:#FFFFFF;" width="17.65" height="17.65"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M307.989,268.824c-0.292,1.508-1.784,2.193-3.801,1.804c-2.018-0.391-3.123-1.579-2.832-3.087
                                                                c0.172-0.893,0.764-1.463,1.673-1.685c-0.58-0.484-0.828-1.134-0.68-1.899c0.269-1.392,1.655-2.026,3.453-1.679
                                                                c1.809,0.35,2.87,1.457,2.6,2.849c-0.147,0.766-0.631,1.274-1.361,1.505C307.814,267.18,308.161,267.932,307.989,268.824z
                                                                    M306.478,268.484c0.154-0.801-0.444-1.434-1.558-1.648c-1.113-0.216-1.882,0.152-2.037,0.953
                                                                c-0.159,0.823,0.419,1.439,1.533,1.655C305.529,269.659,306.319,269.308,306.478,268.484z M303.82,264.314
                                                                c-0.134,0.696,0.36,1.249,1.311,1.433c0.962,0.186,1.639-0.141,1.773-0.837c0.141-0.73-0.404-1.268-1.332-1.447
                                                                C304.646,263.282,303.962,263.583,303.82,264.314z"/>
                                                            <path style="fill:#263238;" d="M314.894,269.991c-0.276,1.426-1.537,2.409-3.716,1.988c-1.148-0.223-2.241-0.794-2.868-1.529
                                                                l0.864-1.048c0.498,0.602,1.318,1.085,2.234,1.262c1.079,0.209,1.808-0.143,1.956-0.909c0.15-0.776-0.254-1.36-1.936-1.686
                                                                l-1.96-0.379l1.272-4.337l4.766,0.922l-0.245,1.265l-3.49-0.675l-0.537,1.844l0.777,0.15
                                                                C314.411,267.323,315.172,268.554,314.894,269.991z"/>
                                                        </g>
                                                        
                                                            <rect x="317.73" y="261.929" transform="matrix(0.9818 0.1898 -0.1898 0.9818 57.3403 -57.0712)" style="fill:#FFFFFF;" width="17.65" height="17.65"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M329.305,272.777c-0.276,1.426-1.537,2.41-3.717,1.988c-1.148-0.222-2.24-0.794-2.868-1.529
                                                                l0.864-1.047c0.497,0.601,1.318,1.084,2.234,1.262c1.079,0.208,1.808-0.144,1.956-0.91c0.15-0.776-0.254-1.359-1.936-1.685
                                                                l-1.96-0.379l1.272-4.338l4.766,0.922l-0.245,1.265l-3.49-0.675l-0.537,1.844l0.777,0.15
                                                                C328.822,270.11,329.582,271.34,329.305,272.777z"/>
                                                        </g>
                                                        
                                                            <rect x="354.11" y="268.963" transform="matrix(0.9818 0.1898 -0.1898 0.9818 59.3369 -63.8494)" style="fill:#FFFFFF;" width="17.65" height="17.65"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M363.526,273.56l-0.195,1.01l-4.528,6.497l-1.612-0.312l4.373-6.251l-3.188-0.616l-0.267,1.38
                                                                l-1.403-0.271l0.514-2.656L363.526,273.56z"/>
                                                            <path style="fill:#263238;" d="M369.023,280.518c-0.265,1.368-1.525,2.352-3.705,1.931c-1.148-0.222-2.229-0.792-2.868-1.529
                                                                l0.875-1.045c0.486,0.599,1.307,1.082,2.223,1.259c1.079,0.209,1.808-0.143,1.954-0.897c0.141-0.73-0.301-1.309-1.53-1.546
                                                                l-0.742-0.144l0.2-1.032l2.268-1.835l-3.688-0.713l0.245-1.265l5.531,1.069l-0.195,1.01l-2.424,1.961
                                                                C368.659,278.234,369.258,279.3,369.023,280.518z"/>
                                                        </g>
                                                        
                                                            <rect x="372.299" y="272.481" transform="matrix(0.9818 0.1898 -0.1898 0.9818 60.3355 -67.2387)" style="fill:#FFFFFF;" width="17.65" height="17.65"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M379.743,283.794l-0.247,1.275l-5.983-1.157l0.195-1.009l3.815-2.438
                                                                c0.935-0.6,1.166-1.049,1.253-1.502c0.143-0.742-0.284-1.27-1.281-1.462c-0.789-0.152-1.501-0.014-2.065,0.478l-0.898-1.016
                                                                c0.79-0.726,2.011-1.007,3.344-0.749c1.763,0.341,2.726,1.454,2.448,2.892c-0.152,0.789-0.512,1.465-1.841,2.303l-2.567,1.645
                                                                L379.743,283.794z"/>
                                                            <path style="fill:#263238;" d="M381.114,281.172c0.516-2.666,2.268-3.893,4.193-3.521c1.937,0.375,3.106,2.166,2.59,4.832
                                                                c-0.516,2.668-2.268,3.893-4.205,3.518C381.768,285.629,380.598,283.84,381.114,281.172z M386.378,282.19
                                                                c0.379-1.96-0.211-3.012-1.325-3.228c-1.102-0.213-2.042,0.544-2.421,2.504c-0.379,1.96,0.211,3.012,1.313,3.225
                                                                C385.059,284.906,386,284.149,386.378,282.19z"/>
                                                        </g>
                                                        
                                                            <rect x="296.047" y="276.48" transform="matrix(0.9818 0.1898 -0.1898 0.9818 59.7084 -52.69)" style="fill:#FFFFFF;" width="17.65" height="17.65"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M307.879,287.548c-0.292,1.507-1.783,2.193-3.801,1.803c-2.018-0.39-3.123-1.578-2.832-3.085
                                                                c0.173-0.893,0.764-1.464,1.673-1.685c-0.58-0.485-0.827-1.135-0.679-1.899c0.269-1.393,1.655-2.026,3.452-1.679
                                                                c1.809,0.35,2.87,1.457,2.601,2.85c-0.148,0.765-0.631,1.272-1.361,1.504C307.705,285.902,308.052,286.655,307.879,287.548z
                                                                    M306.37,287.208c0.155-0.801-0.445-1.435-1.558-1.649c-1.113-0.215-1.882,0.153-2.037,0.954
                                                                c-0.159,0.822,0.419,1.44,1.533,1.655C305.42,288.383,306.21,288.03,306.37,287.208z M303.711,283.036
                                                                c-0.134,0.696,0.36,1.249,1.311,1.433c0.962,0.186,1.639-0.14,1.773-0.836c0.142-0.73-0.404-1.269-1.332-1.448
                                                                C304.537,282.005,303.853,282.306,303.711,283.036z"/>
                                                        </g>
                                                        
                                                            <rect x="314.236" y="279.997" transform="matrix(0.9818 0.1899 -0.1899 0.9818 60.7089 -56.0808)" style="fill:#FFFFFF;" width="17.65" height="17.65"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M322.771,284.424l-1.569,8.117l-1.508-0.292l1.325-6.852l-1.716-0.331l0.245-1.265
                                                                L322.771,284.424z"/>
                                                            <path style="fill:#263238;" d="M327.186,285.277l-1.569,8.117l-1.507-0.291l1.325-6.852l-1.716-0.332l0.245-1.265
                                                                L327.186,285.277z"/>
                                                        </g>
                                                        
                                                            <rect x="332.426" y="283.515" transform="matrix(0.9818 0.1899 -0.1899 0.9818 61.7074 -59.4701)" style="fill:#FFFFFF;" width="17.65" height="17.65"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M342.903,288.316l-0.195,1.01l-4.528,6.498l-1.612-0.311l4.372-6.252l-3.189-0.616l-0.267,1.38
                                                                l-1.403-0.272l0.514-2.656L342.903,288.316z"/>
                                                            <path style="fill:#263238;" d="M346.75,289.06l-1.569,8.117l-1.507-0.291l1.325-6.852l-1.716-0.332l0.245-1.265L346.75,289.06z"
                                                                />
                                                        </g>
                                                        
                                                            <rect x="350.616" y="287.032" transform="matrix(0.9818 0.1898 -0.1898 0.9818 62.704 -62.8579)" style="fill:#FFFFFF;" width="17.65" height="17.65"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M361.943,299.097l-0.247,1.274l-5.983-1.157l0.195-1.008l3.815-2.438
                                                                c0.935-0.602,1.166-1.051,1.253-1.502c0.143-0.742-0.284-1.271-1.281-1.463c-0.789-0.152-1.501-0.014-2.065,0.478l-0.898-1.016
                                                                c0.79-0.727,2.011-1.007,3.344-0.749c1.763,0.341,2.726,1.454,2.448,2.891c-0.153,0.789-0.512,1.466-1.841,2.304l-2.567,1.645
                                                                L361.943,299.097z"/>
                                                        </g>
                                                        
                                                            <rect x="368.806" y="290.549" transform="matrix(0.9818 0.1898 -0.1898 0.9818 63.7025 -66.2471)" style="fill:#FFFFFF;" width="17.65" height="17.65"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M376.023,294.721l-1.569,8.117l-1.507-0.291l1.325-6.853l-1.716-0.332l0.245-1.265
                                                                L376.023,294.721z"/>
                                                            <path style="fill:#263238;" d="M383.756,296.216l-0.195,1.01l-4.528,6.498l-1.612-0.311l4.373-6.251l-3.189-0.617l-0.267,1.38
                                                                l-1.403-0.271l0.514-2.656L383.756,296.216z"/>
                                                        </g>
                                                        
                                                            <rect x="292.553" y="294.549" transform="matrix(0.9818 0.1898 -0.1898 0.9818 63.0747 -51.6979)" style="fill:#FFFFFF;" width="17.65" height="17.65"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M303.03,299.351l-0.195,1.01l-4.528,6.497l-1.612-0.311l4.373-6.252l-3.189-0.616l-0.267,1.38
                                                                l-1.403-0.271l0.514-2.655L303.03,299.351z"/>
                                                            <path style="fill:#263238;" d="M306.877,300.095l-1.569,8.117l-1.507-0.292l1.325-6.852l-1.716-0.332l0.245-1.265
                                                                L306.877,300.095z"/>
                                                        </g>
                                                        
                                                            <rect x="310.743" y="298.066" transform="matrix(0.9818 0.1899 -0.1899 0.9818 64.0752 -55.0886)" style="fill:#FFFFFF;" width="17.65" height="17.65"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M318.544,308.244c-0.264,1.368-1.525,2.353-3.706,1.931c-1.147-0.222-2.228-0.792-2.868-1.529
                                                                l0.876-1.045c0.485,0.599,1.306,1.082,2.222,1.259c1.078,0.208,1.808-0.144,1.954-0.897c0.141-0.73-0.301-1.309-1.529-1.546
                                                                l-0.742-0.144l0.199-1.033l2.267-1.834l-3.688-0.713l0.245-1.265l5.531,1.069l-0.195,1.01l-2.424,1.96
                                                                C318.18,305.961,318.78,307.026,318.544,308.244z"/>
                                                            <path style="fill:#263238;" d="M326.119,307.881c-0.538,2.784-2.458,4-4.811,3.545c-0.812-0.157-1.555-0.48-2.033-0.935
                                                                l0.776-1.028c0.385,0.374,0.897,0.582,1.466,0.691c1.531,0.296,2.677-0.468,3.034-2.313l0.002-0.011
                                                                c-0.597,0.475-1.428,0.603-2.332,0.428c-1.601-0.31-2.606-1.516-2.313-3.034c0.311-1.611,1.819-2.379,3.478-2.059
                                                                C325.6,303.595,326.623,305.272,326.119,307.881z M324.655,306.058c0.148-0.765-0.338-1.484-1.417-1.693
                                                                c-0.939-0.182-1.691,0.227-1.855,1.072c-0.164,0.848,0.371,1.504,1.356,1.694C323.713,307.319,324.5,306.858,324.655,306.058z"
                                                                />
                                                        </g>
                                                        
                                                            <rect x="328.932" y="301.583" transform="matrix(0.9818 0.1898 -0.1898 0.9818 65.0717 -58.4764)" style="fill:#FFFFFF;" width="17.65" height="17.65"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M336.29,305.782l-1.57,8.117l-1.507-0.292l1.325-6.852l-1.716-0.332l0.245-1.265L336.29,305.782z
                                                                "/>
                                                            <path style="fill:#263238;" d="M342.715,312.858c-0.276,1.426-1.537,2.41-3.717,1.988c-1.147-0.222-2.24-0.795-2.868-1.53
                                                                l0.864-1.047c0.498,0.602,1.318,1.084,2.234,1.261c1.078,0.209,1.808-0.144,1.956-0.908c0.15-0.776-0.254-1.359-1.936-1.685
                                                                l-1.96-0.379l1.272-4.338l4.766,0.922l-0.245,1.265l-3.49-0.675l-0.537,1.844l0.777,0.15
                                                                C342.232,310.19,342.993,311.42,342.715,312.858z"/>
                                                        </g>
                                                        
                                                            <rect x="347.122" y="305.1" transform="matrix(0.9818 0.1898 -0.1898 0.9818 66.0707 -61.866)" style="fill:#FFFFFF;" width="17.65" height="17.65"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M355.214,315.335c-0.265,1.368-1.525,2.353-3.706,1.931c-1.148-0.222-2.229-0.792-2.868-1.53
                                                                l0.876-1.044c0.485,0.599,1.307,1.081,2.222,1.259c1.079,0.208,1.809-0.145,1.954-0.897c0.142-0.73-0.301-1.308-1.529-1.546
                                                                l-0.742-0.143l0.2-1.033l2.267-1.834l-3.688-0.713l0.245-1.265l5.531,1.07l-0.195,1.01l-2.424,1.959
                                                                C354.85,313.051,355.449,314.117,355.214,315.335z"/>
                                                            <path style="fill:#263238;" d="M361.794,317.81l-0.247,1.275l-5.983-1.156l0.195-1.009l3.816-2.439
                                                                c0.934-0.602,1.165-1.05,1.252-1.501c0.144-0.742-0.284-1.271-1.281-1.464c-0.789-0.152-1.501-0.014-2.065,0.479l-0.898-1.017
                                                                c0.79-0.726,2.011-1.007,3.344-0.749c1.763,0.341,2.726,1.454,2.448,2.892c-0.153,0.789-0.512,1.465-1.84,2.303l-2.567,1.645
                                                                L361.794,317.81z"/>
                                                        </g>
                                                        
                                                            <rect x="365.312" y="308.617" transform="matrix(0.9818 0.1898 -0.1898 0.9818 67.0692 -65.2553)" style="fill:#FFFFFF;" width="17.65" height="17.65"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M372.153,312.717l-1.569,8.117l-1.507-0.292l1.325-6.852l-1.716-0.332l0.244-1.265
                                                                L372.153,312.717z"/>
                                                            <path style="fill:#263238;" d="M372.979,317.087c0.516-2.668,2.269-3.893,4.193-3.521c1.936,0.374,3.106,2.165,2.59,4.832
                                                                c-0.516,2.667-2.269,3.892-4.205,3.518C373.633,321.544,372.463,319.753,372.979,317.087z M378.244,318.104
                                                                c0.379-1.96-0.212-3.013-1.325-3.227c-1.102-0.213-2.042,0.543-2.421,2.503c-0.379,1.96,0.212,3.012,1.314,3.225
                                                                C376.924,320.819,377.864,320.065,378.244,318.104z"/>
                                                        </g>
                                                        <polygon style="fill:#407BFF;" points="345.702,269.319 346.574,272.5 349.689,273.585 346.933,275.397 346.863,278.695 
                                                            344.288,276.634 341.13,277.586 342.295,274.5 340.413,271.791 343.707,271.945 			"/>
                                                    </g>
                                                    <g>
                                                        <path style="fill:#407BFF;" d="M390.908,213.468c-5.408-1.046-10.132,1.996-11.129,7.154c-0.997,5.158,2.252,9.742,7.66,10.787
                                                            c5.407,1.046,10.127-1.971,11.129-7.154C399.569,219.072,396.315,214.514,390.908,213.468z"/>
                                                        <polygon style="fill:#263238;" points="390.375,216.221 391.497,220.315 395.506,221.712 391.959,224.044 391.869,228.288 
                                                            388.555,225.635 384.491,226.861 385.99,222.89 383.567,219.403 387.808,219.601 			"/>
                                                        <path style="fill:#407BFF;" d="M329.423,215.022c-0.578,2.99-3.258,4.282-7.743,3.414l-8.672-1.677l3.373-17.443l8.173,1.581
                                                            c4.186,0.809,6.087,3.012,5.552,5.779c-0.347,1.794-1.5,2.941-2.985,3.404C328.875,211.038,329.861,212.754,329.423,215.022z
                                                                M319.129,202.484l-0.93,4.81l4.585,0.886c2.243,0.434,3.668-0.118,3.976-1.713c0.313-1.62-0.804-2.663-3.046-3.097
                                                            L319.129,202.484z M326.221,214.066c0.337-1.744-0.834-2.772-3.276-3.245l-5.233-1.012l-0.973,5.034l5.233,1.012
                                                            C324.414,216.328,325.884,215.811,326.221,214.066z"/>
                                                        <path style="fill:#407BFF;" d="M335.343,202.982l3.24,0.626l-3.373,17.443l-3.24-0.626L335.343,202.982z"/>
                                                        <path style="fill:#407BFF;" d="M358.791,207.516l-3.373,17.443l-2.666-0.516l-7.335-13.671l-2.284,11.812l-3.215-0.622
                                                            l3.373-17.443l2.666,0.516l7.335,13.672l2.284-11.812L358.791,207.516z"/>
                                                        <path style="fill:#407BFF;" d="M373.738,219.248l3.065,0.593l-1.344,6.952c-2.103,1.118-4.79,1.374-7.257,0.897
                                                            c-5.408-1.046-8.667-5.579-7.66-10.787c1.007-5.208,5.722-8.2,11.179-7.145c2.916,0.564,5.17,2.008,6.453,4.195l-2.429,1.599
                                                            c-1.106-1.636-2.555-2.562-4.424-2.924c-3.713-0.718-6.816,1.293-7.515,4.906c-0.684,3.538,1.431,6.636,5.119,7.349
                                                            c1.246,0.241,2.515,0.228,3.762-0.203L373.738,219.248z"/>
                                                    </g>
                                                    
                                                        <rect x="298.89" y="200.011" transform="matrix(0.9818 0.1898 -0.1898 0.9818 55.8987 -61.1797)" style="opacity:0.2;fill:#FFFFFF;" width="96.774" height="122.326"/>
                                                    <path style="opacity:0.2;" d="M376.787,203.942c0,0-37.484,82.585-88.629,108.097l23.223-120.102L376.787,203.942z"/>
                                                    </g>
                                                    </g>
                                                    <g id="Balls">
                                                    <g>
                                                    <g>
                                                        <path style="fill:#407BFF;" d="M420.98,288.82c0,1.19-0.09,2.35-0.27,3.48c-1.67,10.55-10.81,18.62-21.83,18.62
                                                            c-12.2,0-22.09-9.9-22.09-22.1c0-12.21,9.89-22.1,22.09-22.1c3.97,0,7.69,1.04,10.91,2.88c2.26,1.28,4.27,2.95,5.94,4.92
                                                            c2.44,2.87,4.16,6.37,4.87,10.22c0,0.01,0,0.02,0,0.02C420.85,286.08,420.98,287.43,420.98,288.82z"/>
                                                        <g style="opacity:0.8;">
                                                            <path style="fill:#FFFFFF;" d="M420.6,284.76c0.06,0.57,0.09,1.13,0.09,1.71c0,9.33-7.59,16.91-16.91,16.91
                                                                c-9.32,0-16.91-7.58-16.91-16.91c0-9.32,7.59-16.91,16.91-16.91c4.66,0,8.89,1.9,11.95,4.96c-1.67-1.97-3.68-3.64-5.94-4.92
                                                                c-1.88-0.67-3.9-1.04-6.01-1.04c-9.88,0-17.91,8.04-17.91,17.91c0,9.88,8.03,17.91,17.91,17.91c7.83,0,14.51-5.06,16.93-12.08
                                                                c0.18-1.13,0.27-2.29,0.27-3.48C420.98,287.43,420.85,286.08,420.6,284.76z"/>
                                                        </g>
                                                        <circle style="opacity:0.8;fill:#FFFFFF;" cx="404.78" cy="286.007" r="13.91"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M412.807,283.479c1.383,4.952-0.745,8.482-4.934,9.652c-1.444,0.403-2.914,0.48-4.057,0.132
                                                                l0.426-2.298c0.928,0.296,1.929,0.217,2.94-0.065c2.724-0.761,3.964-2.931,3.047-6.212l-0.005-0.021
                                                                c-0.584,1.253-1.829,2.135-3.438,2.584c-2.848,0.795-5.456-0.345-6.211-3.048c-0.801-2.868,1.023-5.335,3.974-6.158
                                                                C408.49,276.945,411.51,278.837,412.807,283.479z M408.953,281.709c-0.38-1.361-1.753-2.136-3.672-1.6
                                                                c-1.671,0.467-2.562,1.738-2.142,3.245c0.421,1.506,1.821,2.139,3.575,1.648C408.448,284.519,409.351,283.133,408.953,281.709z"
                                                                />
                                                        </g>
                                                        <path style="opacity:0.2;" d="M420.98,288.82c0,1.19-0.09,2.35-0.27,3.48c-1.67,10.55-10.81,18.62-21.83,18.62
                                                            c-11.31,0-20.63-8.51-21.93-19.47c3.66,7.11,11.08,11.98,19.63,11.98c11.02,0,20.16-8.07,21.83-18.62
                                                            c0.18-1.13,0.27-2.29,0.27-3.48c0-0.91-0.06-1.8-0.17-2.68c0.98,1.89,1.69,3.94,2.09,6.09c0,0.01,0,0.02,0,0.02
                                                            C420.85,286.08,420.98,287.43,420.98,288.82z"/>
                                                        <circle style="opacity:0.2;fill:#FFFFFF;" cx="392.021" cy="276.979" r="6.944"/>
                                                        <circle style="opacity:0.2;fill:#FFFFFF;" cx="382.771" cy="283.923" r="3.099"/>
                                                    </g>
                                                    <g>
                                                        <path style="fill:#407BFF;" d="M176.402,106.962c-0.646,1-1.2,2.023-1.661,3.07c-4.321,9.768-1.022,21.506,8.235,27.485
                                                            c10.248,6.619,23.927,3.669,30.546-6.579c6.625-10.257,3.683-23.93-6.565-30.55c-3.335-2.154-7.024-3.299-10.727-3.5
                                                            c-2.593-0.151-5.187,0.161-7.659,0.91c-3.607,1.087-6.951,3.094-9.636,5.943c-0.005,0.008-0.011,0.017-0.011,0.017
                                                            C177.997,104.731,177.156,105.794,176.402,106.962z"/>
                                                        <path style="opacity:0.4;" d="M176.402,106.962c-0.646,1-1.2,2.023-1.661,3.07c-4.321,9.768-1.022,21.506,8.235,27.485
                                                            c10.248,6.619,23.927,3.669,30.546-6.579c6.625-10.257,3.683-23.93-6.565-30.55c-3.335-2.154-7.024-3.299-10.727-3.5
                                                            c-2.593-0.151-5.187,0.161-7.659,0.91c-3.607,1.087-6.951,3.094-9.636,5.943c-0.005,0.008-0.011,0.017-0.011,0.017
                                                            C177.997,104.731,177.156,105.794,176.402,106.962z"/>
                                                        <g style="opacity:0.8;">
                                                            <path style="fill:#FFFFFF;" d="M176.402,106.962c-0.646,1-1.2,2.023-1.661,3.07c-1.776,7.21,1.09,15.085,7.667,19.333
                                                                c8.299,5.361,19.401,2.972,24.762-5.327c5.355-8.291,2.972-19.401-5.327-24.762c-1.773-1.145-3.67-1.93-5.613-2.387
                                                                c-2.593-0.151-5.187,0.161-7.659,0.91c4.231-0.91,8.815-0.211,12.729,2.317c7.829,5.057,10.087,15.55,5.03,23.379
                                                                c-5.062,7.837-15.55,10.087-23.379,5.03c-7.829-5.057-10.092-15.542-5.03-23.379c0.315-0.487,0.644-0.942,1.003-1.388
                                                                C177.997,104.731,177.156,105.794,176.402,106.962z"/>
                                                        </g>
                                                        <path style="opacity:0.8;fill:#FFFFFF;" d="M179.852,105.841c-4.168,6.453-2.316,15.063,4.137,19.231
                                                            c6.453,4.168,15.063,2.316,19.232-4.137c4.168-6.453,2.316-15.063-4.137-19.232C192.63,97.536,184.02,99.388,179.852,105.841z"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M198.662,111.668l-1.299,1.337l-13.331,5.355l-2.135-2.076l12.85-5.136l-4.225-4.106
                                                                l-1.777,1.827l-1.859-1.807l3.419-3.518L198.662,111.668z"/>
                                                        </g>
                                                        <path style="opacity:0.2;" d="M176.402,106.962c-0.646,1-1.2,2.023-1.661,3.07c-4.321,9.768-1.022,21.506,8.235,27.485
                                                            c9.5,6.136,21.947,4.044,28.985-4.457c-6.932,3.987-15.807,4.052-22.99-0.587c-9.257-5.979-12.556-17.717-8.235-27.485
                                                            c0.462-1.047,1.016-2.07,1.661-3.07c0.494-0.764,1.027-1.48,1.597-2.159c-1.849,1.056-3.557,2.393-5.06,3.982
                                                            c-0.005,0.008-0.011,0.017-0.011,0.017C177.997,104.731,177.156,105.794,176.402,106.962z"/>
                                                        <path style="opacity:0.2;fill:#FFFFFF;" d="M201.319,108.96c-2.081,3.221-1.156,7.52,2.065,9.6c3.221,2.081,7.52,1.156,9.6-2.065
                                                            c2.081-3.221,1.156-7.519-2.065-9.6C207.698,104.814,203.399,105.739,201.319,108.96z"/>
                                                        <path style="opacity:0.2;fill:#FFFFFF;" d="M208.551,121.898c-0.928,1.438-0.516,3.356,0.922,4.285
                                                            c1.438,0.929,3.356,0.516,4.285-0.922c0.929-1.438,0.516-3.356-0.922-4.285C211.398,120.047,209.48,120.46,208.551,121.898z"/>
                                                    </g>
                                                    <g>
                                                        <path style="fill:#263238;" d="M206.774,381.835c0,17.98-14.41,32.6-32.32,32.93c-0.21,0.01-0.41,0.01-0.62,0.01
                                                            c-2.39,0-4.71-0.25-6.95-0.73c-5.58-1.2-10.63-3.82-14.77-7.44c-1.91-1.69-3.64-3.6-5.12-5.68c-0.01-0.01-0.02-0.02-0.02-0.02
                                                            c-3.82-5.39-6.07-11.97-6.07-19.07c0-18.19,14.74-32.94,32.93-32.94C192.033,348.895,206.774,363.645,206.774,381.835z"/>
                                                        <g style="opacity:0.8;">
                                                            <path style="fill:#FFFFFF;" d="M169.724,364.745c-13.91,0-25.23,11.32-25.23,25.24c0,3.91,0.89,7.61,2.48,10.92
                                                                c0,0,0.01,0.01,0.02,0.02c1.48,2.08,3.21,3.99,5.12,5.68c-4.1-4.33-6.62-10.19-6.62-16.62c0-13.37,10.87-24.24,24.23-24.24
                                                                c13.37,0,24.24,10.87,24.24,24.24c0,13.36-10.87,24.23-24.24,24.23c-0.96,0-1.91-0.06-2.84-0.17c2.24,0.48,4.56,0.73,6.95,0.73
                                                                c0.21,0,0.41,0,0.62-0.01c11.67-2.22,20.51-12.49,20.51-24.78C194.964,376.065,183.643,364.745,169.724,364.745z"/>
                                                        </g>
                                                        <circle style="opacity:0.8;fill:#FFFFFF;" cx="168.726" cy="390.983" r="20.735"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M166.698,402.045c-0.122,0.969-0.244,1.937-0.366,2.906c-4.555-0.644-9.075-1.643-13.518-2.994
                                                                c0.096-0.761,0.191-1.523,0.287-2.284c2.684-1.586,5.392-3.281,8.117-5.086c2.001-1.342,2.457-2.382,2.585-3.406
                                                                c0.211-1.693-0.828-2.859-3.082-3.359c-1.781-0.398-3.342-0.184-4.521,0.85c-0.71-0.832-1.419-1.674-2.125-2.526
                                                                c1.632-1.49,4.293-1.894,7.308-1.235c3.988,0.866,6.337,3.208,5.924,6.496c-0.226,1.786-0.937,3.384-3.799,5.332
                                                                c-1.84,1.265-3.673,2.481-5.498,3.647C160.885,401.083,163.784,401.637,166.698,402.045z"/>
                                                            <path style="fill:#263238;" d="M184.637,387.137c-0.097,0.771-0.193,1.543-0.29,2.314c-3.094,5.548-6.193,10.98-9.29,16.295
                                                                c-1.234-0.051-2.469-0.128-3.702-0.231c2.987-5.01,5.979-10.128,8.971-15.355c-2.444,0.005-4.889-0.091-7.329-0.288
                                                                c-0.132,1.05-0.263,2.1-0.395,3.15c-1.072-0.088-2.145-0.196-3.216-0.323c0.253-2.018,0.507-4.036,0.76-6.054
                                                                C174.961,387.206,179.807,387.371,184.637,387.137z"/>
                                                        </g>
                                                        <path style="opacity:0.2;" d="M206.774,381.835c0,17.98-14.41,32.6-32.32,32.93c-0.21,0.01-0.41,0.01-0.62,0.01
                                                            c-2.39,0-4.71-0.25-6.95-0.73c-5.58-1.2-10.63-3.82-14.77-7.44c-1.91-1.69-3.64-3.6-5.12-5.68c-0.01-0.01-0.02-0.02-0.02-0.02
                                                            c-3.82-5.39-6.07-11.97-6.07-19.07c0-2.41,0.26-4.77,0.75-7.04c0.31,6.49,2.5,12.49,6.03,17.47c0,0,0.01,0.01,0.02,0.02
                                                            c1.48,2.08,3.21,3.99,5.12,5.68c4.14,3.62,9.19,6.24,14.77,7.44c2.24,0.48,4.56,0.73,6.95,0.73c0.21,0,0.41,0,0.62-0.01
                                                            c15.51-0.29,28.4-11.29,31.57-25.91C206.764,380.745,206.774,381.295,206.774,381.835z"/>
                                                        
                                                            <ellipse transform="matrix(0.7071 -0.7071 0.7071 0.7071 -205.9636 227.5021)" style="opacity:0.2;fill:#FFFFFF;" cx="171.638" cy="362.371" rx="9.594" ry="9.594"/>
                                                        <circle style="opacity:0.2;fill:#FFFFFF;" cx="186.888" cy="364.745" r="3.343"/>
                                                    </g>
                                                    <g>
                                                        <path style="fill:#407BFF;" d="M114.297,281.47c0.282,0.876,0.501,1.751,0.669,2.632c2.086,10.811-4.181,21.719-14.927,25.181
                                                            c-11.612,3.741-24.058-2.639-27.803-14.261c-3.741-11.612,2.639-24.059,14.251-27.8c2.922-0.941,5.904-1.24,8.786-0.971
                                                            c2.193,0.187,4.319,0.72,6.325,1.534c4.753,1.936,8.806,5.515,11.272,10.268l0.003,0.009
                                                            C113.441,279.14,113.914,280.28,114.297,281.47z"/>
                                                        <g style="opacity:0.8;">
                                                            <path style="fill:#FFFFFF;" d="M112.874,278.062c0.098,0.273,0.197,0.546,0.286,0.822c2.858,8.871-2.039,18.423-10.91,21.281
                                                                c-8.88,2.861-18.423-2.038-21.281-10.909c-2.858-8.871,2.029-18.42,10.909-21.281c3.274-1.055,6.636-1.056,9.72-0.19
                                                                c-2.006-0.814-4.132-1.348-6.325-1.534c-1.232,0.124-2.474,0.377-3.702,0.772c-9.404,3.03-14.584,13.136-11.555,22.54
                                                                c3.03,9.404,13.136,14.585,22.539,11.555c7.567-2.438,12.397-9.458,12.41-17.016c-0.168-0.881-0.387-1.756-0.669-2.632
                                                                C113.914,280.28,113.441,279.14,112.874,278.062z"/>
                                                        </g>
                                                        
                                                            <ellipse transform="matrix(0.4562 -0.8899 0.8899 0.4562 -199.215 241.5373)" style="opacity:0.8;fill:#FFFFFF;" cx="98.016" cy="283.764" rx="13.91" ry="13.91"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M102.462,284.391c0.953,2.472-0.244,5.418-3.891,7.095c-1.924,0.886-4.023,1.148-5.591,0.668
                                                                c0.142-0.858,0.267-1.71,0.376-2.556c1.3,0.395,2.95,0.269,4.487-0.436c1.804-0.83,2.614-2.169,2.109-3.498
                                                                c-0.516-1.348-1.731-1.782-4.551-0.485c-1.096,0.504-2.192,1.009-3.289,1.513c-0.879-2.602-1.986-5.097-3.306-7.455
                                                                c2.672-1.23,5.344-2.461,8.016-3.691c0.443,0.645,0.869,1.301,1.276,1.967c-1.956,0.9-3.911,1.8-5.867,2.7
                                                                c0.51,1.035,0.981,2.093,1.412,3.172c0.435-0.2,0.869-0.4,1.304-0.6C98.972,280.93,101.506,281.896,102.462,284.391z"/>
                                                            <path style="fill:#263238;" d="M103.81,272.329c2.833,4.148,4.945,8.76,6.241,13.639c-0.842,0.387-1.683,0.775-2.524,1.162
                                                                c-1.098-4.118-2.777-8.045-4.98-11.663c-0.962,0.442-1.923,0.885-2.885,1.327c-0.407-0.666-0.831-1.322-1.274-1.968
                                                                C100.195,273.993,102.003,273.161,103.81,272.329z"/>
                                                        </g>
                                                        <path style="opacity:0.2;" d="M115.14,285.128c1.514,10.47-4.697,20.803-15.1,24.155c-11.612,3.741-24.058-2.639-27.803-14.261
                                                            c-1.365-4.236-1.388-8.578-0.288-12.567c0.174,1.226,0.453,2.449,0.842,3.658c3.744,11.622,16.191,18.002,27.803,14.261
                                                            C107.98,297.993,113.254,292.091,115.14,285.128z"/>
                                                        <path style="opacity:0.2;fill:#FFFFFF;" d="M97.284,271.377c0.998,3.099-1.817,6.78-6.288,8.22
                                                            c-4.471,1.441-8.906,0.096-9.904-3.003c-0.999-3.099,1.817-6.78,6.288-8.22C91.851,266.933,96.285,268.278,97.284,271.377z"/>
                                                        <path style="opacity:0.2;fill:#FFFFFF;" d="M87.16,284.818c-0.11,1.344-1.772,2.305-3.711,2.145
                                                            c-1.939-0.159-3.422-1.378-3.312-2.722c0.11-1.344,1.772-2.305,3.711-2.145C85.787,282.255,87.27,283.474,87.16,284.818z"/>
                                                    </g>
                                                    <g>
                                                        
                                                            <ellipse transform="matrix(0.7071 -0.7071 0.7071 0.7071 -167.9263 354.6899)" style="fill:#407BFF;" cx="344.185" cy="380.05" rx="25.706" ry="25.706"/>
                                                        <path style="opacity:0.4;" d="M369.893,380.047c0,0.25,0,0.49-0.02,0.73c-0.38,13.86-11.74,24.98-25.69,24.98
                                                            c-14.19,0-25.7-11.51-25.7-25.71c0-14.19,11.51-25.7,25.7-25.7c5.39,0,10.4,1.66,14.53,4.5c2.83,1.94,5.25,4.43,7.1,7.32
                                                            c0.92,1.42,1.71,2.95,2.32,4.55C369.273,373.607,369.893,376.757,369.893,380.047z"/>
                                                        <g style="opacity:0.8;">
                                                            <path style="fill:#FFFFFF;" d="M368.133,370.717c0.71,1.99,1.09,4.12,1.09,6.35c0,10.58-8.6,19.18-19.18,19.18
                                                                c-10.58,0-19.18-8.6-19.18-19.18c0-10.58,8.6-19.18,19.18-19.18c6.53,0,12.31,3.28,15.77,8.28c-1.85-2.89-4.27-5.38-7.1-7.32
                                                                c-2.62-1.26-5.56-1.96-8.67-1.96c-11.13,0-20.18,9.05-20.18,20.18s9.05,20.18,20.18,20.18c9.86,0,18.09-7.11,19.83-16.47
                                                                c0.02-0.24,0.02-0.48,0.02-0.73C369.893,376.757,369.273,373.607,368.133,370.717z"/>
                                                        </g>
                                                        <circle style="opacity:0.8;fill:#FFFFFF;" cx="351.044" cy="376.779" r="16.182"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M361.168,377.42c0.825,2.953-0.628,6-5.143,7.261c-2.378,0.664-4.98,0.613-6.859-0.182
                                                                l0.644-2.794c1.507,0.667,3.513,0.805,5.41,0.274c2.233-0.623,3.28-1.976,2.837-3.561c-0.449-1.608-1.763-2.328-5.245-1.355
                                                                l-4.059,1.134l-1.69-9.393l9.869-2.756l0.731,2.618l-7.228,2.019l0.726,3.99l1.609-0.449
                                                                C357.74,372.837,360.337,374.442,361.168,377.42z"/>
                                                        </g>
                                                        
                                                            <ellipse transform="matrix(0.9239 -0.3827 0.3827 0.9239 -116.7695 154.9822)" style="opacity:0.2;fill:#FFFFFF;" cx="331.188" cy="371.01" rx="7.385" ry="7.385"/>
                                                        <path style="opacity:0.2;fill:#FFFFFF;" d="M337.275,381.802c0,1.332-1.08,2.412-2.412,2.412c-1.332,0-2.413-1.08-2.413-2.412
                                                            c0-1.332,1.08-2.413,2.413-2.413C336.195,379.389,337.275,380.469,337.275,381.802z"/>
                                                        <path style="opacity:0.2;" d="M369.893,380.047c0,0.25,0,0.49-0.02,0.73c-0.38,13.86-11.74,24.98-25.69,24.98
                                                            c-12.88,0-23.55-9.48-25.41-21.85c4.08,8.78,12.98,14.86,23.3,14.86c13.95,0,25.31-11.12,25.69-24.98
                                                            c0.02-0.24,0.02-0.48,0.02-0.73c0-1.31-0.1-2.59-0.29-3.85c0.23,0.49,0.45,1,0.64,1.51
                                                            C369.273,373.607,369.893,376.757,369.893,380.047z"/>
                                                    </g>
                                                    <g>
                                                        <path style="fill:#263238;" d="M395.471,170.074c0,12.2-9.89,22.1-22.1,22.1c-12.2,0-22.09-9.9-22.09-22.1
                                                            c0-2.06,0.28-4.05,0.81-5.94c0.51-1.86,1.26-3.61,2.23-5.23c3.09-5.28,8.32-9.16,14.5-10.46c1.47-0.31,2.99-0.47,4.55-0.47
                                                            c0.4,0,0.79,0.01,1.18,0.03C386.211,148.614,395.471,158.264,395.471,170.074z"/>
                                                        <g style="opacity:0.8;">
                                                            <path style="fill:#FFFFFF;" d="M374.551,148.004c-0.39-0.02-0.78-0.03-1.18-0.03c-1.56,0-3.08,0.16-4.55,0.47
                                                                c0.38-0.03,0.76-0.04,1.14-0.04c9.32,0,16.91,7.58,16.91,16.91c0,9.32-7.59,16.91-16.91,16.91c-9.33,0-16.91-7.59-16.91-16.91
                                                                c0-2.27,0.45-4.43,1.27-6.41c-0.97,1.62-1.72,3.37-2.23,5.23c-0.03,0.39-0.04,0.78-0.04,1.18c0,9.87,8.03,17.91,17.91,17.91
                                                                c9.87,0,17.91-8.04,17.91-17.91C387.871,157.024,382.211,150.034,374.551,148.004z"/>
                                                        </g>
                                                        <circle style="opacity:0.8;fill:#FFFFFF;" cx="368.985" cy="164.521" r="13.91"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M369.96,154.152c-3.983,4.215-7.032,8.974-8.924,13.903c-0.835-0.318-1.671-0.636-2.506-0.954
                                                                c1.609-4.161,4.042-8.197,7.164-11.886c-0.939-0.358-1.878-0.716-2.817-1.074c0.578-0.679,1.179-1.347,1.804-2.001
                                                                C366.441,152.811,368.2,153.482,369.96,154.152z"/>
                                                            <path style="fill:#263238;" d="M377.2,156.91c-3.951,4.235-6.963,9.006-8.814,13.942c-0.836-0.318-1.672-0.636-2.507-0.954
                                                                c1.574-4.166,3.975-8.212,7.069-11.916c-0.939-0.358-1.878-0.716-2.817-1.074c0.572-0.682,1.168-1.352,1.787-2.01
                                                                C373.679,155.568,375.439,156.239,377.2,156.91z"/>
                                                        </g>
                                                        <path style="opacity:0.2;" d="M395.471,170.074c0,12.2-9.89,22.1-22.1,22.1c-11.23,0-20.51-8.39-21.91-19.25
                                                            c3.75,6.87,11.03,11.54,19.41,11.54c12.21,0,22.1-9.9,22.1-22.1c0-0.97-0.06-1.93-0.19-2.87
                                                            C394.501,162.634,395.471,166.234,395.471,170.074z"/>
                                                        <path style="opacity:0.2;fill:#FFFFFF;" d="M387.164,157.979c0,3.613-2.929,6.542-6.542,6.542s-6.542-2.929-6.542-6.542
                                                            c0-3.613,2.929-6.542,6.542-6.542S387.164,154.366,387.164,157.979z"/>
                                                        <path style="opacity:0.2;fill:#FFFFFF;" d="M389.935,167.291c0,1.53-1.24,2.771-2.771,2.771c-1.53,0-2.771-1.241-2.771-2.771
                                                            s1.24-2.771,2.771-2.771C388.694,164.521,389.935,165.761,389.935,167.291z"/>
                                                    </g>
                                                    </g>
                                                    </g>
                                                    <g id="Bingo_1">
                                                        <g>
                                                        
                                                            <rect x="108.552" y="128.036" transform="matrix(0.9815 -0.1917 0.1917 0.9815 -42.182 42.0768)" style="fill:#407BFF;" width="175.648" height="222.026"/>
                                                        <g>
                                                        
                                                            <rect x="185" y="246.794" transform="matrix(0.9815 -0.1917 0.1917 0.9815 -46.6512 43.4074)" style="fill:#FFFFFF;" width="32.035" height="32.035"/>
                                                        
                                                            <ellipse transform="matrix(0.5584 -0.8295 0.8295 0.5584 -129.253 282.7966)" style="fill:#407BFF;" cx="201.017" cy="262.811" rx="13.945" ry="13.945"/>
                                                        
                                                            <rect x="106.188" y="194.121" transform="matrix(0.9815 -0.1917 0.1917 0.9815 -38.0156 27.323)" style="fill:#FFFFFF;" width="32.035" height="32.035"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M122.492,215.087l0.452,2.313l-10.849,2.119l-0.357-1.829l4.761-6.693
                                                                c1.162-1.645,1.247-2.557,1.087-3.377c-0.263-1.346-1.34-1.942-3.148-1.589c-1.429,0.279-2.534,0.997-3.148,2.208l-2.201-1.098
                                                                c0.835-1.757,2.699-3.059,5.117-3.531c3.196-0.624,5.572,0.592,6.081,3.2c0.279,1.43,0.135,2.811-1.531,5.123l-3.201,4.511
                                                                L122.492,215.087z"/>
                                                            <path style="fill:#263238;" d="M134.732,212.696l0.452,2.313l-10.849,2.119l-0.357-1.829l4.761-6.693
                                                                c1.163-1.646,1.247-2.557,1.086-3.377c-0.263-1.346-1.34-1.942-3.148-1.589c-1.43,0.279-2.534,0.997-3.148,2.208l-2.201-1.098
                                                                c0.836-1.757,2.699-3.059,5.117-3.532c3.196-0.624,5.572,0.593,6.082,3.2c0.279,1.43,0.135,2.811-1.531,5.122l-3.201,4.511
                                                                L134.732,212.696z"/>
                                                        </g>
                                                        
                                                            <rect x="139.191" y="187.675" transform="matrix(0.9815 -0.1917 0.1917 0.9815 -36.1679 33.5297)" style="fill:#FFFFFF;" width="32.035" height="32.035"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M149.614,196.911l2.874,14.718l-2.733,0.534l-2.427-12.426l-3.112,0.607l-0.447-2.292
                                                                L149.614,196.911z"/>
                                                            <path style="fill:#263238;" d="M165.001,204.602c0.484,2.481-0.968,4.991-4.92,5.764c-2.082,0.406-4.286,0.182-5.862-0.623
                                                                l0.763-2.354c1.224,0.677,2.933,0.933,4.593,0.608c1.956-0.382,2.944-1.47,2.677-2.837c-0.259-1.324-1.394-1.998-3.623-1.563
                                                                l-1.346,0.263l-0.366-1.871l2.566-4.626l-6.686,1.306l-0.447-2.292l10.029-1.959l0.357,1.829l-2.745,4.945
                                                                C162.836,201.008,164.569,202.394,165.001,204.602z"/>
                                                        </g>
                                                        
                                                            <rect x="172.194" y="181.229" transform="matrix(0.9815 -0.1917 0.1917 0.9815 -34.3198 39.736)" style="fill:#FFFFFF;" width="32.035" height="32.035"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M188.119,199.977c0.505,2.586-0.948,5.096-4.901,5.869c-2.081,0.406-4.307,0.186-5.862-0.623
                                                                l0.742-2.35c1.245,0.673,2.954,0.929,4.615,0.604c1.955-0.382,2.943-1.47,2.672-2.857c-0.275-1.409-1.352-2.116-4.4-1.52
                                                                l-3.554,0.694l-0.808-8.158l8.642-1.688l0.447,2.292l-6.329,1.236l0.35,3.468l1.409-0.275
                                                                C185.495,195.818,187.61,197.37,188.119,199.977z"/>
                                                            <path style="fill:#263238;" d="M200.297,197.599c0.505,2.587-0.948,5.097-4.9,5.868c-2.082,0.407-4.308,0.186-5.863-0.623
                                                                l0.742-2.35c1.245,0.673,2.954,0.929,4.615,0.605c1.955-0.382,2.943-1.47,2.672-2.857c-0.275-1.409-1.352-2.116-4.4-1.52
                                                                l-3.553,0.694l-0.808-8.159l8.642-1.688l0.447,2.292l-6.329,1.236l0.35,3.468l1.409-0.275
                                                                C197.672,193.44,199.788,194.991,200.297,197.599z"/>
                                                        </g>
                                                        
                                                            <rect x="205.197" y="174.783" transform="matrix(0.9815 -0.1917 0.1917 0.9815 -32.4722 45.9428)" style="fill:#FFFFFF;" width="32.035" height="32.035"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M221.48,195.753l0.452,2.313l-10.849,2.119l-0.357-1.829l4.761-6.693
                                                                c1.162-1.646,1.246-2.557,1.086-3.378c-0.263-1.346-1.34-1.942-3.148-1.589c-1.429,0.279-2.534,0.997-3.148,2.208l-2.201-1.099
                                                                c0.835-1.757,2.698-3.059,5.116-3.531c3.196-0.624,5.573,0.593,6.082,3.2c0.279,1.43,0.134,2.811-1.531,5.123l-3.201,4.511
                                                                L221.48,195.753z"/>
                                                            <path style="fill:#263238;" d="M233.331,191.146c0.505,2.586-0.948,5.097-4.9,5.869c-2.082,0.407-4.308,0.186-5.863-0.623
                                                                l0.742-2.35c1.244,0.674,2.954,0.929,4.615,0.605c1.955-0.382,2.943-1.47,2.672-2.858c-0.275-1.409-1.352-2.115-4.4-1.52
                                                                l-3.553,0.694l-0.808-8.158l8.642-1.688l0.447,2.292l-6.329,1.236l0.35,3.468l1.409-0.275
                                                                C230.706,186.988,232.822,188.539,233.331,191.146z"/>
                                                        </g>
                                                        
                                                            <rect x="238.2" y="168.337" transform="matrix(0.9815 -0.1917 0.1917 0.9815 -30.6249 52.1504)" style="fill:#FFFFFF;" width="32.035" height="32.035"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M258.118,187.527l-2.607,0.509l0.653,3.343l-2.649,0.518l-0.653-3.343l-8.074,1.577l-0.37-1.893
                                                                l5.402-10.899l2.922-0.571l-5.064,10.397l4.815-0.94l-0.579-2.965l2.564-0.501l0.579,2.965l2.607-0.509L258.118,187.527z"/>
                                                            <path style="fill:#263238;" d="M261.62,175.035l2.875,14.718l-2.733,0.534l-2.427-12.426l-3.112,0.608l-0.447-2.292
                                                                L261.62,175.035z"/>
                                                        </g>
                                                        
                                                            <rect x="112.591" y="226.903" transform="matrix(0.9815 -0.1917 0.1917 0.9815 -44.1811 29.1583)" style="fill:#FFFFFF;" width="32.035" height="32.035"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M125.128,235.727l2.874,14.719l-2.732,0.533l-2.428-12.426l-3.112,0.607l-0.447-2.292
                                                                L125.128,235.727z"/>
                                                            <path style="fill:#263238;" d="M133.141,234.162l2.875,14.718l-2.733,0.534l-2.428-12.427l-3.111,0.608l-0.447-2.292
                                                                L133.141,234.162z"/>
                                                        </g>
                                                        
                                                            <rect x="145.594" y="220.458" transform="matrix(0.9815 -0.1917 0.1917 0.9815 -42.3334 35.3652)" style="fill:#FFFFFF;" width="32.035" height="32.035"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M163.242,240.092l-2.607,0.509l0.653,3.344l-2.649,0.517l-0.653-3.343l-8.074,1.577l-0.37-1.893
                                                                l5.402-10.899l2.922-0.571l-5.063,10.398l4.814-0.94l-0.579-2.965l2.565-0.501l0.579,2.965l2.607-0.509L163.242,240.092z"/>
                                                            <path style="fill:#263238;" d="M174.432,236.793c0.484,2.481-0.968,4.991-4.92,5.763c-2.082,0.407-4.286,0.183-5.862-0.623
                                                                l0.762-2.354c1.224,0.678,2.933,0.934,4.594,0.609c1.956-0.382,2.944-1.471,2.677-2.837c-0.259-1.325-1.395-1.998-3.623-1.563
                                                                l-1.346,0.263l-0.366-1.871l2.567-4.627l-6.686,1.306l-0.447-2.292l10.029-1.958l0.357,1.829l-2.745,4.944
                                                                C172.268,233.198,174.001,234.585,174.432,236.793z"/>
                                                        </g>
                                                        
                                                            <rect x="178.597" y="214.012" transform="matrix(0.9815 -0.1917 0.1917 0.9815 -40.4858 41.5721)" style="fill:#FFFFFF;" width="32.035" height="32.035"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M195.183,233.854l-2.607,0.509l0.653,3.344l-2.649,0.517l-0.653-3.343l-8.074,1.577l-0.37-1.893
                                                                l5.402-10.9l2.922-0.571l-5.063,10.397l4.815-0.94l-0.579-2.965l2.564-0.501l0.579,2.965l2.607-0.509L195.183,233.854z"/>
                                                            <path style="fill:#263238;" d="M195.559,229.611c-0.944-4.837,1.171-8.087,4.662-8.769c3.511-0.686,6.694,1.53,7.639,6.366
                                                                c0.945,4.836-1.171,8.087-4.682,8.773C199.686,236.663,196.503,234.446,195.559,229.611z M205.105,227.746
                                                                c-0.694-3.554-2.402-4.922-4.42-4.528c-1.998,0.39-3.065,2.301-2.371,5.854c0.694,3.553,2.402,4.922,4.4,4.533
                                                                C204.731,233.211,205.799,231.3,205.105,227.746z"/>
                                                        </g>
                                                        
                                                            <rect x="211.6" y="207.566" transform="matrix(0.9815 -0.1917 0.1917 0.9815 -38.638 47.7787)" style="fill:#FFFFFF;" width="32.035" height="32.035"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M221.549,216.895l2.875,14.718l-2.733,0.534l-2.427-12.426l-3.112,0.608l-0.447-2.292
                                                                L221.549,216.895z"/>
                                                            <path style="fill:#263238;" d="M237.194,221.216c0.986,5.046-1.415,8.397-5.684,9.231c-1.472,0.288-2.942,0.247-4.054-0.191
                                                                l0.607-2.257c0.902,0.37,1.906,0.37,2.936,0.168c2.775-0.542,4.185-2.606,3.531-5.95l-0.004-0.02
                                                                c-0.683,1.202-1.992,1.983-3.633,2.303c-2.901,0.566-5.412-0.777-5.95-3.531c-0.57-2.922,1.443-5.237,4.45-5.824
                                                                C233.411,214.359,236.27,216.485,237.194,221.216z M233.494,219.145c-0.27-1.387-1.578-2.267-3.533-1.885
                                                                c-1.703,0.333-2.691,1.53-2.392,3.065c0.3,1.535,1.645,2.276,3.433,1.927C232.768,221.906,233.777,220.596,233.494,219.145z"/>
                                                        </g>
                                                        
                                                            <rect x="244.602" y="201.12" transform="matrix(0.9815 -0.1917 0.1917 0.9815 -36.7899 53.9848)" style="fill:#FFFFFF;" width="32.035" height="32.035"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M260.13,219.902c0.571,2.923-1.444,5.237-4.451,5.825c-4.016,0.784-6.876-1.342-7.8-6.073
                                                                c-0.986-5.046,1.416-8.396,5.684-9.23c1.472-0.287,2.942-0.247,4.054,0.191l-0.607,2.258c-0.902-0.37-1.906-0.37-2.937-0.169
                                                                c-2.775,0.542-4.184,2.607-3.531,5.95l0.004,0.021c0.683-1.203,1.993-1.983,3.633-2.303
                                                                C257.081,215.804,259.592,217.148,260.13,219.902z M257.505,220.545c-0.3-1.534-1.646-2.276-3.432-1.927
                                                                c-1.767,0.345-2.776,1.656-2.493,3.106c0.271,1.388,1.578,2.268,3.533,1.886C256.816,223.278,257.805,222.081,257.505,220.545z"
                                                                />
                                                            <path style="fill:#263238;" d="M261.017,216.826c-0.944-4.836,1.171-8.087,4.661-8.769c3.512-0.686,6.695,1.53,7.639,6.366
                                                                c0.945,4.836-1.171,8.087-4.682,8.773C265.145,223.878,261.961,221.662,261.017,216.826z M270.563,214.961
                                                                c-0.694-3.554-2.402-4.922-4.42-4.528c-1.998,0.391-3.065,2.301-2.371,5.855c0.694,3.553,2.402,4.922,4.4,4.532
                                                                C270.19,220.426,271.257,218.515,270.563,214.961z"/>
                                                        </g>
                                                        
                                                            <rect x="118.994" y="259.686" transform="matrix(0.9815 -0.1917 0.1917 0.9815 -50.3464 30.9936)" style="fill:#FFFFFF;" width="32.035" height="32.035"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M133.211,268.181l0.357,1.83l-3.202,14.006l-2.922,0.57l3.107-13.485l-5.783,1.13l0.488,2.502
                                                                l-2.544,0.497l-0.94-4.815L133.211,268.181z"/>
                                                            <path style="fill:#263238;" d="M147.213,276.033c0.505,2.586-0.947,5.097-4.9,5.868c-2.082,0.407-4.308,0.186-5.863-0.623
                                                                l0.742-2.35c1.244,0.674,2.954,0.93,4.615,0.605c1.956-0.382,2.943-1.471,2.672-2.858c-0.275-1.408-1.352-2.115-4.4-1.52
                                                                l-3.554,0.694l-0.808-8.159l8.642-1.688l0.447,2.292l-6.329,1.236l0.35,3.468l1.408-0.275
                                                                C144.589,271.875,146.704,273.426,147.213,276.033z"/>
                                                        </g>
                                                        
                                                            <rect x="151.997" y="253.24" transform="matrix(0.9815 -0.1917 0.1917 0.9815 -48.4989 37.2005)" style="fill:#FFFFFF;" width="32.035" height="32.035"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M174.421,273.011l0.452,2.313l-10.849,2.119l-0.357-1.829l4.761-6.693
                                                                c1.163-1.646,1.247-2.557,1.087-3.377c-0.263-1.346-1.34-1.942-3.148-1.59c-1.43,0.279-2.534,0.997-3.148,2.208l-2.201-1.098
                                                                c0.835-1.757,2.699-3.06,5.117-3.532c3.196-0.624,5.573,0.593,6.082,3.2c0.279,1.43,0.134,2.812-1.531,5.123l-3.201,4.511
                                                                L174.421,273.011z"/>
                                                        </g>
                                                        
                                                            <rect x="218.003" y="240.348" transform="matrix(0.9815 -0.1917 0.1917 0.9815 -44.8036 49.6143)" style="fill:#FFFFFF;" width="32.035" height="32.035"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M234.487,258.943c0.571,2.923-1.444,5.237-4.451,5.824c-4.016,0.785-6.876-1.342-7.8-6.072
                                                                c-0.985-5.047,1.416-8.397,5.685-9.231c1.472-0.287,2.942-0.248,4.054,0.191l-0.607,2.258c-0.902-0.37-1.906-0.37-2.937-0.169
                                                                c-2.775,0.543-4.184,2.607-3.531,5.951l0.004,0.02c0.683-1.203,1.992-1.983,3.633-2.304
                                                                C231.439,254.846,233.949,256.19,234.487,258.943z M231.862,259.587c-0.3-1.534-1.646-2.276-3.432-1.927
                                                                c-1.767,0.345-2.776,1.655-2.493,3.105c0.271,1.389,1.578,2.269,3.533,1.887C231.173,262.32,232.162,261.122,231.862,259.587z"
                                                                />
                                                            <path style="fill:#263238;" d="M246.399,256.77c0.484,2.482-0.967,4.992-4.92,5.764c-2.082,0.406-4.286,0.182-5.862-0.623
                                                                l0.762-2.354c1.224,0.678,2.933,0.934,4.594,0.609c1.956-0.383,2.944-1.471,2.677-2.838c-0.259-1.324-1.395-1.998-3.623-1.563
                                                                l-1.346,0.264l-0.365-1.871l2.566-4.627l-6.686,1.306l-0.447-2.292l10.029-1.959l0.357,1.83l-2.745,4.944
                                                                C244.235,253.176,245.968,254.561,246.399,256.77z"/>
                                                        </g>
                                                        
                                                            <rect x="251.005" y="233.903" transform="matrix(0.9815 -0.1917 0.1917 0.9815 -42.9558 55.8209)" style="fill:#FFFFFF;" width="32.035" height="32.035"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M266.384,255.049l0.452,2.314l-10.85,2.119l-0.357-1.829l4.762-6.693
                                                                c1.162-1.645,1.246-2.557,1.086-3.377c-0.263-1.346-1.34-1.942-3.148-1.59c-1.429,0.279-2.533,0.997-3.147,2.209l-2.201-1.099
                                                                c0.835-1.757,2.698-3.059,5.116-3.531c3.196-0.625,5.573,0.592,6.082,3.199c0.279,1.43,0.134,2.812-1.531,5.123l-3.201,4.511
                                                                L266.384,255.049z"/>
                                                            <path style="fill:#263238;" d="M266.915,249.707c-0.944-4.837,1.172-8.088,4.662-8.77c3.512-0.686,6.694,1.53,7.639,6.367
                                                                c0.944,4.835-1.171,8.087-4.682,8.772C271.044,256.759,267.86,254.542,266.915,249.707z M276.462,247.843
                                                                c-0.694-3.554-2.402-4.923-4.421-4.528c-1.997,0.39-3.064,2.301-2.371,5.854c0.694,3.553,2.402,4.922,4.4,4.532
                                                                C276.088,253.307,277.156,251.395,276.462,247.843z"/>
                                                        </g>
                                                        
                                                            <rect x="125.397" y="292.469" transform="matrix(0.9815 -0.1917 0.1917 0.9815 -56.512 32.829)" style="fill:#FFFFFF;" width="32.035" height="32.035"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M147.994,310.219c0.534,2.734-1.509,4.901-5.168,5.616c-3.659,0.714-6.325-0.533-6.858-3.267
                                                                c-0.316-1.619,0.29-2.981,1.668-3.972c-1.305-0.422-2.162-1.346-2.433-2.733c-0.493-2.523,1.407-4.531,4.666-5.168
                                                                c3.28-0.641,5.817,0.501,6.31,3.024c0.271,1.388-0.196,2.57-1.267,3.456C146.582,307.57,147.678,308.601,147.994,310.219z
                                                                    M137.919,305.464c0.247,1.262,1.454,1.855,3.178,1.518c1.745-0.341,2.662-1.35,2.415-2.61c-0.259-1.325-1.542-1.86-3.225-1.532
                                                                C138.606,303.169,137.661,304.14,137.919,305.464z M145.224,310.674c-0.283-1.451-1.722-2.108-3.74-1.715
                                                                c-2.019,0.394-3.061,1.536-2.778,2.987c0.292,1.493,1.683,2.138,3.702,1.744C144.426,313.296,145.515,312.166,145.224,310.674z"
                                                                />
                                                        </g>
                                                        
                                                            <rect x="158.4" y="286.023" transform="matrix(0.9815 -0.1917 0.1917 0.9815 -54.6642 39.0358)" style="fill:#FFFFFF;" width="32.035" height="32.035"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M173.82,304.87c0.505,2.586-0.947,5.096-4.9,5.868c-2.081,0.406-4.308,0.185-5.862-0.623
                                                                l0.742-2.35c1.244,0.674,2.953,0.93,4.614,0.604c1.955-0.382,2.943-1.47,2.672-2.857c-0.275-1.408-1.352-2.115-4.4-1.52
                                                                l-3.553,0.693l-0.809-8.158l8.643-1.688l0.447,2.292l-6.329,1.235l0.35,3.468l1.408-0.274
                                                                C171.196,300.711,173.311,302.263,173.82,304.87z"/>
                                                            <path style="fill:#263238;" d="M186.13,299.256c0.985,5.047-1.416,8.397-5.685,9.231c-1.472,0.287-2.942,0.247-4.053-0.191
                                                                l0.606-2.257c0.901,0.369,1.905,0.369,2.936,0.168c2.775-0.542,4.184-2.606,3.531-5.95l-0.004-0.021
                                                                c-0.682,1.202-1.992,1.983-3.632,2.303c-2.902,0.567-5.412-0.776-5.95-3.531c-0.571-2.922,1.443-5.237,4.45-5.824
                                                                C182.346,292.399,185.206,294.525,186.13,299.256z M182.43,297.185c-0.271-1.387-1.579-2.267-3.534-1.885
                                                                c-1.703,0.332-2.691,1.529-2.392,3.064c0.3,1.535,1.645,2.276,3.433,1.928C181.702,299.946,182.713,298.636,182.43,297.185z"/>
                                                        </g>
                                                        
                                                            <rect x="191.403" y="279.577" transform="matrix(0.9815 -0.1917 0.1917 0.9815 -52.8167 45.2427)" style="fill:#FFFFFF;" width="32.035" height="32.035"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M207.461,287.713l0.357,1.829l-3.202,14.006l-2.923,0.571l3.107-13.485l-5.782,1.129l0.488,2.502
                                                                l-2.544,0.497l-0.94-4.815L207.461,287.713z"/>
                                                            <path style="fill:#263238;" d="M214.445,286.349l2.875,14.719l-2.733,0.533l-2.427-12.426l-3.112,0.607l-0.447-2.292
                                                                L214.445,286.349z"/>
                                                        </g>
                                                        
                                                            <rect x="224.406" y="273.131" transform="matrix(0.9815 -0.1917 0.1917 0.9815 -50.969 51.4496)" style="fill:#FFFFFF;" width="32.035" height="32.035"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M240.331,291.879c0.505,2.587-0.948,5.097-4.901,5.869c-2.081,0.406-4.307,0.186-5.862-0.623
                                                                l0.742-2.35c1.245,0.674,2.954,0.93,4.615,0.605c1.955-0.382,2.943-1.47,2.672-2.857c-0.275-1.409-1.352-2.116-4.4-1.52
                                                                l-3.554,0.694l-0.808-8.158l8.642-1.688l0.447,2.293l-6.329,1.235l0.35,3.468l1.409-0.275
                                                                C237.706,287.721,239.821,289.272,240.331,291.879z"/>
                                                            <path style="fill:#263238;" d="M252.508,289.501c0.505,2.587-0.948,5.097-4.9,5.868c-2.081,0.406-4.308,0.186-5.863-0.623
                                                                l0.742-2.35c1.245,0.674,2.954,0.93,4.615,0.605c1.955-0.383,2.943-1.471,2.672-2.858c-0.275-1.409-1.352-2.116-4.4-1.521
                                                                l-3.553,0.694l-0.808-8.159l8.642-1.688l0.447,2.292L243.773,283l0.35,3.467l1.409-0.274
                                                                C249.884,285.342,251.999,286.894,252.508,289.501z"/>
                                                        </g>
                                                        
                                                            <rect x="257.408" y="266.685" transform="matrix(0.9815 -0.1917 0.1917 0.9815 -49.1214 57.6565)" style="fill:#FFFFFF;" width="32.035" height="32.035"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M273.951,274.726l2.875,14.719l-2.733,0.533l-2.427-12.426l-3.112,0.607l-0.447-2.292
                                                                L273.951,274.726z"/>
                                                        </g>
                                                        
                                                            <rect x="131.8" y="325.252" transform="matrix(0.9815 -0.1917 0.1917 0.9815 -62.6766 34.6637)" style="fill:#FFFFFF;" width="32.035" height="32.035"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M142.202,334.492l2.874,14.718l-2.733,0.534l-2.427-12.427l-3.112,0.608l-0.447-2.292
                                                                L142.202,334.492z"/>
                                                            <path style="fill:#263238;" d="M157.82,342.028c0.505,2.586-0.947,5.096-4.9,5.868c-2.082,0.406-4.307,0.185-5.862-0.623
                                                                l0.742-2.35c1.245,0.674,2.954,0.93,4.615,0.604c1.956-0.382,2.943-1.47,2.672-2.857c-0.275-1.408-1.352-2.115-4.4-1.52
                                                                l-3.554,0.693l-0.808-8.158l8.642-1.688l0.447,2.292l-6.329,1.235l0.35,3.468l1.409-0.274
                                                                C155.196,337.869,157.311,339.421,157.82,342.028z"/>
                                                        </g>
                                                        
                                                            <rect x="164.803" y="318.806" transform="matrix(0.9815 -0.1917 0.1917 0.9815 -60.8298 40.8713)" style="fill:#FFFFFF;" width="32.035" height="32.035"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M180.57,337.694c0.484,2.482-0.968,4.991-4.921,5.763c-2.081,0.407-4.286,0.182-5.862-0.623
                                                                l0.763-2.354c1.224,0.678,2.933,0.934,4.594,0.609c1.956-0.382,2.944-1.471,2.677-2.837c-0.259-1.325-1.395-1.998-3.623-1.563
                                                                l-1.346,0.263l-0.366-1.871l2.567-4.627l-6.686,1.306l-0.447-2.292l10.029-1.959l0.357,1.83l-2.745,4.944
                                                                C178.405,334.1,180.138,335.486,180.57,337.694z"/>
                                                            <path style="fill:#263238;" d="M192.832,335.19c0.505,2.587-0.948,5.097-4.9,5.869c-2.081,0.406-4.308,0.186-5.863-0.623
                                                                l0.742-2.35c1.244,0.674,2.954,0.929,4.615,0.604c1.955-0.382,2.943-1.47,2.672-2.857c-0.275-1.409-1.352-2.115-4.4-1.521
                                                                l-3.553,0.694l-0.808-8.158l8.642-1.688l0.447,2.292l-6.329,1.236l0.35,3.468l1.409-0.275
                                                                C190.208,331.031,192.323,332.582,192.832,335.19z"/>
                                                        </g>
                                                        
                                                            <rect x="197.806" y="312.36" transform="matrix(0.9815 -0.1917 0.1917 0.9815 -58.9822 47.0781)" style="fill:#FFFFFF;" width="32.035" height="32.035"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M207.955,321.649l2.875,14.719l-2.734,0.533l-2.427-12.426l-3.111,0.607l-0.447-2.292
                                                                L207.955,321.649z"/>
                                                            <path style="fill:#263238;" d="M221.982,318.91l0.356,1.829l-3.201,14.006l-2.923,0.57l3.107-13.484l-5.782,1.129l0.488,2.502
                                                                l-2.544,0.497l-0.939-4.815L221.982,318.91z"/>
                                                        </g>
                                                        
                                                            <rect x="230.809" y="305.914" transform="matrix(0.9815 -0.1917 0.1917 0.9815 -57.1343 53.2848)" style="fill:#FFFFFF;" width="32.035" height="32.035"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M246.544,324.809c0.484,2.48-0.967,4.99-4.92,5.764c-2.082,0.406-4.286,0.182-5.862-0.623
                                                                l0.762-2.353c1.224,0.677,2.933,0.933,4.594,0.607c1.956-0.381,2.944-1.469,2.677-2.836c-0.259-1.324-1.395-1.998-3.623-1.563
                                                                l-1.346,0.262l-0.365-1.871l2.566-4.626l-6.686,1.306l-0.447-2.291l10.029-1.959l0.357,1.829l-2.745,4.944
                                                                C244.38,321.214,246.112,322.6,246.544,324.809z"/>
                                                            <path style="fill:#263238;" d="M259.3,324.5l0.452,2.313l-10.849,2.119l-0.357-1.83l4.761-6.692
                                                                c1.163-1.646,1.247-2.558,1.087-3.378c-0.263-1.346-1.34-1.941-3.148-1.588c-1.43,0.279-2.534,0.996-3.148,2.207l-2.201-1.098
                                                                c0.836-1.758,2.698-3.059,5.117-3.531c3.195-0.625,5.572,0.592,6.082,3.199c0.279,1.43,0.134,2.811-1.531,5.123l-3.201,4.511
                                                                L259.3,324.5z"/>
                                                        </g>
                                                        
                                                            <rect x="263.811" y="299.468" transform="matrix(0.9815 -0.1917 0.1917 0.9815 -55.2868 59.4918)" style="fill:#FFFFFF;" width="32.035" height="32.035"/>
                                                        <g>
                                                            <path style="fill:#263238;" d="M285.4,313.9c0.986,5.047-1.416,8.398-5.684,9.231c-1.472,0.287-2.942,0.247-4.054-0.191
                                                                l0.606-2.257c0.902,0.369,1.906,0.369,2.936,0.168c2.776-0.542,4.184-2.607,3.531-5.95l-0.004-0.021
                                                                c-0.682,1.202-1.992,1.982-3.632,2.303c-2.901,0.566-5.412-0.776-5.95-3.531c-0.571-2.922,1.443-5.237,4.45-5.824
                                                                C281.616,307.044,284.476,309.17,285.4,313.9z M281.699,311.829c-0.271-1.387-1.578-2.268-3.534-1.885
                                                                c-1.703,0.332-2.691,1.529-2.392,3.064c0.3,1.535,1.645,2.276,3.433,1.927C280.973,314.591,281.982,313.28,281.699,311.829z"/>
                                                        </g>
                                                        <polygon style="fill:#FFFFFF;" points="199.262,253.826 202.891,258.587 208.871,258.296 205.465,263.22 207.589,268.817 
                                                            201.854,267.098 197.187,270.848 197.05,264.863 192.041,261.584 197.691,259.603 			"/>
                                                    </g>
                                                    <g>
                                                        <path style="fill:#FFFFFF;" d="M237.373,129.105c-9.811,1.916-15.694,10.247-13.866,19.606
                                                            c1.828,9.359,10.413,14.863,20.224,12.947c9.811-1.916,15.702-10.201,13.866-19.605
                                                            C255.76,132.648,247.183,127.188,237.373,129.105z"/>
                                                        <polygon style="fill:#407BFF;" points="238.348,134.098 243.019,140.226 250.715,139.852 246.331,146.188 249.065,153.392 
                                                            241.684,151.18 235.678,156.006 235.5,148.303 229.054,144.082 236.326,141.533 			"/>
                                                        <path style="fill:#FFFFFF;" d="M134.955,173.515c1.06,5.425-2.572,9.42-10.71,11.01l-15.734,3.073l-6.181-31.649l14.83-2.896
                                                            c7.596-1.484,12.292,0.932,13.272,5.951c0.636,3.255-0.524,5.969-2.709,7.757C131.325,167.184,134.151,169.401,134.955,173.515z
                                                                M109.108,159.413l1.704,8.726l8.319-1.625c4.069-0.795,6.093-2.692,5.527-5.586c-0.574-2.939-3.163-3.935-7.232-3.141
                                                            L109.108,159.413z M128.917,174.084c-0.618-3.165-3.288-4.099-7.719-3.233l-9.494,1.854l1.784,9.133l9.494-1.854
                                                            C127.413,179.119,129.535,177.249,128.917,174.084z"/>
                                                        <path style="fill:#FFFFFF;" d="M136.733,149.23l5.878-1.148l6.181,31.649l-5.878,1.148L136.733,149.23z"/>
                                                        <path style="fill:#FFFFFF;" d="M179.277,140.921l6.181,31.649l-4.838,0.945l-21.637-18.022l4.186,21.431l-5.833,1.139
                                                            l-6.182-31.649l4.838-0.945l21.638,18.022l-4.186-21.431L179.277,140.921z"/>
                                                        <path style="fill:#FFFFFF;" d="M212.406,150.503l5.561-1.086l2.464,12.614c-2.779,3.312-7.126,5.569-11.602,6.443
                                                            c-9.811,1.916-18.378-3.497-20.224-12.947c-1.846-9.449,4.055-17.689,13.956-19.623c5.29-1.033,10.065-0.135,13.712,2.673
                                                            l-3.001,4.341c-2.972-2.001-6.042-2.575-9.433-1.913c-6.736,1.316-10.592,6.809-9.311,13.365
                                                            c1.254,6.42,6.919,10.195,13.611,8.888c2.26-0.441,4.388-1.326,6.193-2.899L212.406,150.503z"/>
                                                    </g>
                                                    <path style="opacity:0.1;" d="M261.291,113.259c0,0,4.415,187.772-114.712,248.626l157.272-30.717L261.291,113.259z"/>
                                                    </g>
                                                    </g>
                                
                                
                                                </svg>
                                        
                                            
                                            </div>
                                            <div class="flex flex-col flex-grow  mt-2">
                                            
            
                                                    @if($ganador_1 == 0 )
                                                        <div class="text-yellow-500 font-Allerta font-extrabold uppercase underline text-xs md:text-lg">PRIMERA RONDA</div>
                                                    @endif
                    
                                                    @if($ganador_2 == 0 && $ganador_1 == 1)
                                                        <div class="text-yellow-500 font-Allerta font-extrabold text-xs md:text-lg underline">SEGUNDA RONDA</div>
                                                    @endif
                    
                                                    @if($ganador_3 == 0 && $ganador_2 == 1)
                                                        <div class="text-yellow-500 font-Allerta font-extrabold text-xs md:text-lg underline">TERCERA RONDA</div>
                                                    @endif

                                                    @if($ganador_1 == 0)

                                                        <p class="font-Allerta text-xs md:text-lg   font-bold text-red-500">(3er lugar)</p>
                                                    @endif

                                                    @if($ganador_1 == 1 && $ganador_2 == 0 && $ganador_3 == 0)
                                                        <p class="font-Allerta text-xs md:text-lg   font-bold text-red-500">(2do lugar)</p>
                                                    @endif

                                                    @if($ganador_1 == 1 && $ganador_2 == 1 && $ganador_3 == 0)
                                                        <p class="font-Allerta text-xs md:text-lg  font-bold text-red-500">(1er lugar)</p>
                                                    @endif
            
                                                
                                            </div>
                                            </div>
                                        </div>

                                        <div class="col-span-4 md:col-span-2  lg:col-span-1 ">
                                            <div class="flex flex-row bg-white shadow-sm rounded p-1">
                                                <div class="flex items-center justify-center flex-shrink-0 h-20  w-32  rounded-xl text-blue-500">
                                                    <figure>

                                                            @if(${"type_{$i}"} == 'Lineal')

                                                                <img class="  object-fill h-24 w-32  py-2 pr-2 " src="{{Storage::url('img/LINEAL.jpg') }}"alt="">
                                                        
                                                            @elseif(${"type_{$i}"} == 'Diagonal')

                                                                <img class="  object-fill h-24 w-32  py-2 pr-2" src="{{Storage::url('img/DIAGONAL.jpg') }}"alt="">
                                                                    
                                                            @elseif(${"type_{$i}"} == 'Cruz_grande')

                                                                <img class="  object-fill h-24 w-24  py-2 pr-2" src="{{Storage::url('img/cruz_grande.jpg') }}"alt="">
                                                                
                                                            @elseif(${"type_{$i}"} == 'Cruz_pequena')

                                                                <img class="  object-fill h-24 w-24  py-2 pr-2 " src="{{Storage::url('img/cruz_pequeña.jpg') }}"alt="">
                                                                
                                                            @elseif(${"type_{$i}"} == 'Cuatro_esquinas')

                                                                <img class="  object-fill h-24 w-24  py-2 pr-2" src="{{Storage::url('img/CUATRO ESQUINAS.jpg') }}"alt="">
                                                                
                                                            @else

                                                                <img class="  object-fill h-24 w-24  py-2 pr-2" src="{{Storage::url('img/carton_lleno.png') }}"alt="">
                                                            
                                                            @endif

                                                    </figure>
                                            </div>
                                            <div class="flex flex-col flex-grow mt-2 ">
                                                <div class="font-Allerta text-xs md:text-md lg:text-lg font-bold text-blue-500 ">FORMACIÓN</div>

                                              
                                                        @if(${"type_{$i}"} == 'Lineal')

                                                            <div class="text-yellow-500 font-Allerta font-extrabold text-xs md:text-lg underline">LINEAL</div>
                                                    
                                                        @elseif(${"type_{$i}"} == 'Diagonal')

                                                            <div class="text-yellow-500 font-Allerta font-extrabold text-xs md:text-lg underline">DIAGONAL</div>
                                                                
                                                        @elseif(${"type_{$i}"} == 'Cruz_grande')

                                                            <div class="text-yellow-500 font-Allerta font-extrabold text-xs md:text-lg underline">CRUZ GRANDE</div>
                                                            
                                                        @elseif(${"type_{$i}"} == 'Cruz_pequena')

                                                            <div class="text-yellow-500 font-Allerta font-extrabold text-xs md:text-lg underline">CRUZ PEQUEÑA</div>
                                                            
                                                        @elseif(${"type_{$i}"} == 'Cuatro_esquinas')

                                                            <div class="text-yellow-500 font-Allerta font-extrabold text-xs md:text-lg underline">CUATRO ESQUINAS</div>
                                                            
                                                        @else

                                                            <div class="text-yellow-500 font-Allerta font-extrabold text-xs md:text-lg underline">CARTÓN LLENO</div>
                                                        
                                                        @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-span-4 md:col-span-2  lg:col-span-1 ">
                                            <div class="flex flex-row bg-white shadow-sm rounded p-1">
                                                <div class="flex items-center justify-center flex-shrink-0 h-20 w-20 rounded-xl text-blue-500">

                                                    <svg class=" h-20 w-20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 500" style="enable-background:new 0 0 500 500;" xml:space="preserve">
                                                        <g id="Background_Complete">
                                                            <g>
                                                                <g>
                                                                    <g>
                                                                        <g>
                                                                            <g>
                                                                                <g>
                                                                                    <path style="fill:#E0E0E0;" d="M388.736,339.068c6.964-4.281,19.12-6.593,32.878-6.134
                                                                                        c13.758,0.458,25.733,3.574,32.397,8.309l5.885,0.196l-0.295,8.846c-0.319,9.583-17.826,16.779-39.101,16.069
                                                                                        c-21.276-0.709-38.264-9.053-37.944-18.636l0.295-8.847L388.736,339.068z"/>
                                                                                </g>
                                                                                <g>
                                                                                    <path style="fill:#EBEBEB;" d="M420.775,358.133c21.275,0.709,38.781-6.477,39.1-16.052
                                                                                        c0.319-9.574-16.67-17.91-37.945-18.619c-21.276-0.709-38.781,6.478-39.1,16.052
                                                                                        C382.511,349.088,399.498,357.424,420.775,358.133z"/>
                                                                                </g>
                                                                                <g style="opacity:0.1;">
                                                                                    <path style="fill:#FFFFFF;" d="M439.923,336.819c-3.707,1.346-7.499,2.858-11.372,3.667
                                                                                        c-13.817,2.886-28.828-0.793-39.049-10.296c7.048-4.469,18.981-7.177,32.428-6.728c12.874,0.429,24.171,3.653,31.021,8.253
                                                                                        C448.66,333.543,444.304,335.228,439.923,336.819z"/>
                                                                                </g>
                                                                                <g>
                                                                                    <path style="fill:#E0E0E0;" d="M420.294,351.09c16.351,0.545,29.673-2.18,29.888-8.612
                                                                                        c0.227-6.827-12.76-14.134-29.112-14.679c-16.351-0.545-29.78,4.228-29.994,10.658c-0.052,1.577-0.11,3.295,2.499,6.176
                                                                                        C397.693,349.181,407.955,350.679,420.294,351.09z"/>
                                                                                </g>
                                                                                <g>
                                                                                    <path style="fill:#F5F5F5;" d="M420.92,353.771c15.957,0.532,29.066-4.251,29.28-10.682
                                                                                        c0.214-6.431-12.547-12.077-28.504-12.608c-15.957-0.532-29.066,4.252-29.28,10.683
                                                                                        C392.202,347.594,404.963,353.239,420.92,353.771z"/>
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                        <g>
                                                                            <g>
                                                                                <path style="fill:#E0E0E0;" d="M426.073,348.3c-4.902,0.077-6.174-2.489-7.165-4.843l-7.122,0.112
                                                                                    c0.167,0.834,1.319,1.245,1.956,2.091c0.224,0.298,0,1.338,0,1.338l-3.549,0.929c-1.251-1.133-2.052-2.723-2.217-4.299
                                                                                    l-3.913,0.06l-0.029-1.751l3.985-0.063c0.477-3.336,3.593-4.966,7.189-5.022c4.902-0.077,6.209,2.446,7.198,4.799l7.052-0.108
                                                                                    c-0.269-1.62-1.317-3.203-2.744-4.23v-1.338l3.546,0.322c1.605,1.087,2.763,3.098,3.006,5.187l3.916-0.061l0.029,1.751
                                                                                    l-3.95,0.061C432.75,346.594,429.67,348.244,426.073,348.3z M415.039,339.61c-1.554,0.024-2.813,0.685-3.178,2.205
                                                                                    l6.278-0.098C417.523,340.488,416.73,339.583,415.039,339.61z M429.417,343.294l-6.241,0.097
                                                                                    c0.62,1.272,1.444,2.198,3.172,2.17C427.864,345.538,429.054,344.857,429.417,343.294z"/>
                                                                            </g>
                                                                        </g>
                                                                        <g>
                                                                            <g>
                                                                                <path style="fill:#EBEBEB;" d="M426.073,346.962c-4.902,0.077-6.174-2.489-7.165-4.843l-7.122,0.112
                                                                                    c0.225,1.127,0.844,2.313,1.956,3.429l-3.549,0.929c-1.251-1.133-2.052-2.723-2.217-4.299l-3.913,0.06l-0.029-1.751
                                                                                    l3.985-0.063c0.477-3.336,3.593-4.966,7.189-5.022c4.902-0.077,6.209,2.446,7.198,4.799l7.052-0.108
                                                                                    c-0.269-1.619-1.317-3.203-2.744-4.23l3.546-1.016c1.605,1.087,2.763,3.098,3.006,5.187l3.916-0.061l0.029,1.751l-3.95,0.061
                                                                                    C432.75,345.256,429.67,346.906,426.073,346.962z M415.039,338.272c-1.554,0.024-2.813,0.684-3.178,2.205l6.278-0.098
                                                                                    C417.523,339.151,416.73,338.245,415.039,338.272z M429.417,341.957l-6.241,0.097c0.62,1.272,1.444,2.198,3.172,2.17
                                                                                    C427.864,344.2,429.054,343.519,429.417,341.957z"/>
                                                                            </g>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <g>
                                                                            <g>
                                                                                <g>
                                                                                    <path style="fill:#E0E0E0;" d="M388.736,325.857c6.964-4.281,19.12-6.593,32.878-6.134
                                                                                        c13.758,0.458,25.733,3.574,32.397,8.309l5.885,0.196l-0.295,8.846c-0.319,9.583-17.826,16.778-39.101,16.069
                                                                                        c-21.276-0.709-38.264-9.053-37.944-18.636l0.295-8.847L388.736,325.857z"/>
                                                                                </g>
                                                                                <g>
                                                                                    <path style="fill:#EBEBEB;" d="M420.775,344.922c21.275,0.709,38.781-6.477,39.1-16.052
                                                                                        c0.319-9.574-16.67-17.91-37.945-18.619c-21.276-0.709-38.781,6.478-39.1,16.052
                                                                                        C382.511,335.878,399.498,344.213,420.775,344.922z"/>
                                                                                </g>
                                                                                <g style="opacity:0.1;">
                                                                                    <path style="fill:#FFFFFF;" d="M439.923,323.608c-3.707,1.346-7.499,2.859-11.372,3.667
                                                                                        c-13.817,2.886-28.828-0.793-39.049-10.296c7.048-4.469,18.981-7.176,32.428-6.728c12.874,0.429,24.171,3.653,31.021,8.253
                                                                                        C448.66,320.333,444.304,322.017,439.923,323.608z"/>
                                                                                </g>
                                                                                <g>
                                                                                    <path style="fill:#E0E0E0;" d="M420.294,337.88c16.351,0.545,29.673-2.18,29.888-8.612
                                                                                        c0.227-6.827-12.76-14.134-29.112-14.679c-16.351-0.545-29.78,4.228-29.994,10.658c-0.052,1.577-0.11,3.295,2.499,6.176
                                                                                        C397.693,335.971,407.955,337.469,420.294,337.88z"/>
                                                                                </g>
                                                                                <g>
                                                                                    <path style="fill:#F5F5F5;" d="M420.92,340.56c15.957,0.532,29.066-4.251,29.28-10.682
                                                                                        c0.214-6.431-12.547-12.077-28.504-12.608c-15.957-0.532-29.066,4.252-29.28,10.683
                                                                                        C392.202,334.384,404.963,340.029,420.92,340.56z"/>
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                        <g>
                                                                            <g>
                                                                                <path style="fill:#E0E0E0;" d="M426.073,335.09c-4.902,0.077-6.174-2.489-7.165-4.843l-7.122,0.112
                                                                                    c0.167,0.834,1.319,1.245,1.956,2.091c0.224,0.298,0,1.338,0,1.338l-3.549,0.929c-1.251-1.133-2.052-2.723-2.217-4.299
                                                                                    l-3.913,0.059l-0.029-1.751l3.985-0.063c0.477-3.336,3.593-4.965,7.189-5.022c4.902-0.077,6.209,2.445,7.198,4.799
                                                                                    l7.052-0.108c-0.269-1.62-1.317-3.203-2.744-4.23v-1.338l3.546,0.322c1.605,1.087,2.763,3.098,3.006,5.187l3.916-0.061
                                                                                    l0.029,1.751l-3.95,0.061C432.75,333.384,429.67,335.034,426.073,335.09z M415.039,326.4
                                                                                    c-1.554,0.024-2.813,0.685-3.178,2.205l6.278-0.098C417.523,327.278,416.73,326.372,415.039,326.4z M429.417,330.084
                                                                                    l-6.241,0.097c0.62,1.272,1.444,2.198,3.172,2.17C427.864,332.328,429.054,331.647,429.417,330.084z"/>
                                                                            </g>
                                                                        </g>
                                                                        <g>
                                                                            <g>
                                                                                <path style="fill:#EBEBEB;" d="M426.073,333.752c-4.902,0.077-6.174-2.489-7.165-4.843l-7.122,0.112
                                                                                    c0.225,1.127,0.844,2.313,1.956,3.429l-3.549,0.929c-1.251-1.133-2.052-2.723-2.217-4.299l-3.913,0.06l-0.029-1.751
                                                                                    l3.985-0.063c0.477-3.336,3.593-4.966,7.189-5.022c4.902-0.077,6.209,2.446,7.198,4.799l7.052-0.108
                                                                                    c-0.269-1.62-1.317-3.203-2.744-4.23l3.546-1.016c1.605,1.087,2.763,3.098,3.006,5.187l3.916-0.061l0.029,1.751l-3.95,0.061
                                                                                    C432.75,332.046,429.67,333.696,426.073,333.752z M415.039,325.062c-1.554,0.024-2.813,0.684-3.178,2.205l6.278-0.098
                                                                                    C417.523,325.94,416.73,325.034,415.039,325.062z M429.417,328.746l-6.241,0.097c0.62,1.272,1.444,2.198,3.172,2.17
                                                                                    C427.864,330.99,429.054,330.309,429.417,328.746z"/>
                                                                            </g>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <g>
                                                                            <g>
                                                                                <g>
                                                                                    <path style="fill:#E0E0E0;" d="M392.683,316.172c6.964-4.281,19.12-6.593,32.879-6.134
                                                                                        c13.758,0.458,25.733,3.574,32.397,8.309l5.885,0.196l-0.295,8.846c-0.319,9.583-17.826,16.778-39.101,16.069
                                                                                        c-21.276-0.709-38.264-9.053-37.944-18.636l0.295-8.847L392.683,316.172z"/>
                                                                                </g>
                                                                                <g>
                                                                                    <path style="fill:#EBEBEB;" d="M424.722,335.237c21.275,0.709,38.781-6.478,39.1-16.052
                                                                                        c0.319-9.574-16.67-17.91-37.945-18.619c-21.276-0.709-38.781,6.478-39.1,16.052
                                                                                        C386.458,326.192,403.446,334.528,424.722,335.237z"/>
                                                                                </g>
                                                                                <g style="opacity:0.1;">
                                                                                    <path style="fill:#FFFFFF;" d="M443.87,313.923c-3.707,1.346-7.5,2.858-11.372,3.667
                                                                                        c-13.817,2.886-28.828-0.793-39.049-10.296c7.048-4.469,18.981-7.177,32.428-6.729c12.874,0.429,24.171,3.654,31.021,8.253
                                                                                        C452.607,310.647,448.251,312.332,443.87,313.923z"/>
                                                                                </g>
                                                                                <g>
                                                                                    <path style="fill:#E0E0E0;" d="M424.241,328.194c16.352,0.545,29.673-2.18,29.888-8.612
                                                                                        c0.227-6.827-12.76-14.134-29.112-14.679c-16.351-0.545-29.78,4.228-29.994,10.658c-0.052,1.577-0.11,3.295,2.499,6.176
                                                                                        C401.64,326.285,411.902,327.783,424.241,328.194z"/>
                                                                                </g>
                                                                                <g>
                                                                                    <path style="fill:#F5F5F5;" d="M424.867,330.875c15.957,0.532,29.066-4.251,29.28-10.682
                                                                                        c0.214-6.431-12.547-12.077-28.504-12.608c-15.957-0.532-29.066,4.252-29.28,10.683
                                                                                        C396.149,324.698,408.91,330.343,424.867,330.875z"/>
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                        <g>
                                                                            <g>
                                                                                <path style="fill:#E0E0E0;" d="M430.02,325.404c-4.902,0.077-6.174-2.489-7.165-4.843l-7.122,0.112
                                                                                    c0.167,0.834,1.319,1.245,1.956,2.091c0.224,0.298,0,1.338,0,1.338l-3.549,0.929c-1.251-1.133-2.052-2.723-2.217-4.299
                                                                                    l-3.913,0.06l-0.029-1.751l3.985-0.063c0.477-3.336,3.593-4.966,7.189-5.022c4.902-0.077,6.209,2.446,7.198,4.799l7.052-0.108
                                                                                    c-0.269-1.62-1.317-3.203-2.744-4.23v-1.338l3.546,0.322c1.605,1.087,2.763,3.098,3.006,5.186l3.916-0.061l0.029,1.751
                                                                                    l-3.95,0.061C436.697,323.698,433.617,325.348,430.02,325.404z M418.986,316.714c-1.554,0.024-2.813,0.685-3.178,2.205
                                                                                    l6.278-0.098C421.47,317.592,420.677,316.687,418.986,316.714z M433.364,320.398l-6.241,0.097
                                                                                    c0.62,1.272,1.444,2.198,3.172,2.17C431.811,322.642,433.001,321.961,433.364,320.398z"/>
                                                                            </g>
                                                                        </g>
                                                                        <g>
                                                                            <g>
                                                                                <path style="fill:#EBEBEB;" d="M430.02,324.066c-4.902,0.077-6.174-2.489-7.165-4.843l-7.122,0.112
                                                                                    c0.225,1.127,0.844,2.313,1.956,3.429l-3.549,0.929c-1.251-1.133-2.052-2.723-2.217-4.299l-3.913,0.06l-0.029-1.751
                                                                                    l3.985-0.063c0.477-3.336,3.593-4.966,7.189-5.022c4.902-0.077,6.209,2.446,7.198,4.799l7.052-0.108
                                                                                    c-0.269-1.62-1.317-3.203-2.744-4.23l3.546-1.016c1.605,1.087,2.763,3.098,3.006,5.186l3.916-0.061l0.029,1.751l-3.95,0.061
                                                                                    C436.697,322.36,433.617,324.01,430.02,324.066z M418.986,315.376c-1.554,0.024-2.813,0.684-3.178,2.205l6.278-0.098
                                                                                    C421.47,316.254,420.677,315.349,418.986,315.376z M433.364,319.06l-6.241,0.097c0.62,1.272,1.444,2.198,3.172,2.17
                                                                                    C431.811,321.304,433.001,320.623,433.364,319.06z"/>
                                                                            </g>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <g>
                                                                            <g>
                                                                                <g>
                                                                                    <path style="fill:#E0E0E0;" d="M388.841,304.794c6.964-4.281,19.12-6.593,32.879-6.134
                                                                                        c13.758,0.458,25.733,3.574,32.397,8.309l5.885,0.196l-0.295,8.846c-0.319,9.583-17.825,16.778-39.101,16.069
                                                                                        c-21.276-0.709-38.264-9.053-37.944-18.636l0.295-8.847L388.841,304.794z"/>
                                                                                </g>
                                                                                <g>
                                                                                    <path style="fill:#EBEBEB;" d="M420.88,323.858c21.275,0.709,38.781-6.477,39.1-16.052
                                                                                        c0.319-9.574-16.67-17.91-37.945-18.619c-21.277-0.709-38.781,6.478-39.1,16.052
                                                                                        C382.616,314.814,399.604,323.15,420.88,323.858z"/>
                                                                                </g>
                                                                                <g style="opacity:0.1;">
                                                                                    <path style="fill:#FFFFFF;" d="M440.028,302.545c-3.707,1.346-7.5,2.859-11.371,3.667
                                                                                        c-13.817,2.886-28.828-0.793-39.049-10.296c7.048-4.469,18.981-7.177,32.428-6.728c12.874,0.429,24.171,3.653,31.021,8.253
                                                                                        C448.765,299.269,444.409,300.954,440.028,302.545z"/>
                                                                                </g>
                                                                                <g>
                                                                                    <path style="fill:#E0E0E0;" d="M420.399,316.816c16.352,0.545,29.673-2.18,29.888-8.612
                                                                                        c0.227-6.827-12.76-14.134-29.112-14.679c-16.351-0.545-29.78,4.228-29.994,10.658c-0.052,1.577-0.11,3.295,2.499,6.176
                                                                                        C397.798,314.907,408.06,316.405,420.399,316.816z"/>
                                                                                </g>
                                                                                <g>
                                                                                    <path style="fill:#F5F5F5;" d="M421.025,319.497c15.957,0.531,29.066-4.251,29.28-10.682
                                                                                        c0.214-6.431-12.547-12.077-28.504-12.608c-15.957-0.532-29.066,4.252-29.28,10.683
                                                                                        C392.307,313.32,405.068,318.965,421.025,319.497z"/>
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                        <g>
                                                                            <g>
                                                                                <path style="fill:#E0E0E0;" d="M426.178,314.026c-4.902,0.077-6.174-2.489-7.165-4.843l-7.122,0.112
                                                                                    c0.167,0.834,1.319,1.245,1.956,2.091c0.224,0.298,0,1.338,0,1.338l-3.549,0.929c-1.251-1.133-2.052-2.723-2.217-4.299
                                                                                    l-3.913,0.06l-0.029-1.751l3.985-0.063c0.477-3.336,3.593-4.966,7.189-5.022c4.902-0.077,6.209,2.445,7.198,4.799l7.052-0.108
                                                                                    c-0.269-1.62-1.317-3.203-2.744-4.23v-1.338l3.546,0.322c1.605,1.087,2.763,3.098,3.006,5.187l3.916-0.061l0.029,1.751
                                                                                    l-3.95,0.061C432.855,312.32,429.775,313.97,426.178,314.026z M415.144,305.336c-1.554,0.024-2.813,0.685-3.178,2.205
                                                                                    l6.278-0.098C417.628,306.214,416.835,305.309,415.144,305.336z M429.522,309.02l-6.241,0.097
                                                                                    c0.62,1.272,1.444,2.198,3.172,2.17C427.969,311.264,429.159,310.583,429.522,309.02z"/>
                                                                            </g>
                                                                        </g>
                                                                        <g>
                                                                            <g>
                                                                                <path style="fill:#EBEBEB;" d="M426.178,312.688c-4.902,0.077-6.174-2.489-7.165-4.843l-7.122,0.112
                                                                                    c0.225,1.127,0.844,2.313,1.956,3.429l-3.549,0.929c-1.251-1.133-2.052-2.723-2.217-4.299l-3.913,0.06l-0.029-1.751
                                                                                    l3.985-0.063c0.477-3.336,3.593-4.966,7.189-5.022c4.902-0.077,6.209,2.445,7.198,4.799l7.052-0.108
                                                                                    c-0.269-1.62-1.317-3.203-2.744-4.23l3.546-1.016c1.605,1.087,2.763,3.098,3.006,5.187l3.916-0.061l0.029,1.751l-3.95,0.061
                                                                                    C432.855,310.982,429.775,312.632,426.178,312.688z M415.144,303.998c-1.554,0.024-2.813,0.684-3.178,2.205l6.278-0.098
                                                                                    C417.628,304.876,416.835,303.971,415.144,303.998z M429.522,307.682l-6.241,0.097c0.62,1.272,1.444,2.198,3.172,2.17
                                                                                    C427.969,309.926,429.159,309.245,429.522,307.682z"/>
                                                                            </g>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                            <g>
                                                                <g>
                                                                    <g>
                                                                        <g>
                                                                            <g>
                                                                                <g>
                                                                                    
                                                                                        <ellipse transform="matrix(0.4167 -0.909 0.909 0.4167 -136.9469 196.7897)" style="fill:#E0E0E0;" cx="84.877" cy="205.112" rx="25.523" ry="35.532"/>
                                                                                </g>
                                                                                <g>
                                                                                    
                                                                                        <ellipse transform="matrix(0.4167 -0.909 0.909 0.4167 -130.4016 195.8648)" style="fill:#EBEBEB;" cx="87.427" cy="199.548" rx="25.523" ry="35.532"/>
                                                                                </g>
                                                                                <g style="opacity:0.1;">
                                                                                    <path style="fill:#FFFFFF;" d="M84.743,174.823c0.017,1.204-0.866,3.499-1.689,4.563c-2.99,3.866-7.739,6.122-12.935,6.751
                                                                                        c-5.031,0.609-10.051-0.065-14.912-1.555c4.425-9.415,16.106-13.874,29.1-12.216
                                                                                        C84.57,173.156,84.731,173.968,84.743,174.823z"/>
                                                                                </g>
                                                                                <g>
                                                                                    <path style="fill:#E0E0E0;" d="M78.982,216.388c13.71,6.285,28.417,3.541,32.851-6.131
                                                                                        c4.434-9.671-3.086-22.606-16.796-28.891c-13.71-6.285-28.418-3.54-32.851,6.132
                                                                                        C57.752,197.169,65.272,210.103,78.982,216.388z"/>
                                                                                </g>
                                                                                <g>
                                                                                    <path style="fill:#F5F5F5;" d="M79.873,216.776c13.379,6.133,27.563,3.824,31.681-5.158
                                                                                        c4.117-8.981-3.39-21.234-16.769-27.368c-13.379-6.133-27.563-3.824-31.68,5.157
                                                                                        C58.987,198.39,66.494,210.643,79.873,216.776z"/>
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <g>
                                                                            <path style="fill:#FF725E;" d="M77.706,198.43L77.706,198.43L77.706,198.43L77.706,198.43z"/>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <path style="fill:#E0E0E0;" d="M87.653,208.292c-4.424-2.028-4.311-5.215-4.046-8.062l-6.43-2.948
                                                                            c-0.252,0.919,0.562,1.89,0.711,3.018c0.055,0.416-0.633,1.352-0.633,1.352l-3.629-0.567c-0.566-1.705-0.507-3.684,0.115-5.378
                                                                            l-3.534-1.62l0.832-1.812l3.597,1.648c2.059-3.232,5.642-3.568,8.888-2.08c4.424,2.028,4.364,5.184,4.098,8.033l6.366,2.918
                                                                            c0.548-1.782,0.385-3.864-0.392-5.531l0.633-1.352l3.037,1.83c0.906,1.807,0.962,4.374,0.158,6.629l3.533,1.62l-0.831,1.813
                                                                            l-3.565-1.634C94.461,209.406,90.899,209.781,87.653,208.292z M82.025,194.608c-1.4-0.642-2.85-0.504-3.921,0.906l5.666,2.597
                                                                            C83.816,196.58,83.552,195.308,82.025,194.608z M93.091,204.579l-5.633-2.583c-0.067,1.574,0.22,2.882,1.78,3.597
                                                                            C90.606,206.221,92.002,206.032,93.091,204.579z"/>
                                                                    </g>
                                                                    <g>
                                                                        <path style="fill:#EBEBEB;" d="M88.286,206.941c-4.424-2.028-4.312-5.215-4.046-8.062l-6.43-2.948
                                                                            c-0.345,1.258-0.372,2.745,0.077,4.369l-3.629-0.567c-0.566-1.705-0.507-3.684,0.115-5.378l-3.534-1.62l0.832-1.812l3.597,1.648
                                                                            c2.059-3.232,5.642-3.568,8.888-2.08c4.424,2.028,4.364,5.184,4.098,8.033l6.366,2.918c0.548-1.782,0.385-3.864-0.392-5.531
                                                                            l3.671,0.478c0.906,1.807,0.962,4.374,0.158,6.629l3.533,1.62l-0.831,1.813l-3.565-1.634
                                                                            C95.094,208.055,91.532,208.429,88.286,206.941z M82.658,193.256c-1.4-0.642-2.85-0.504-3.921,0.906l5.666,2.597
                                                                            C84.45,195.228,84.186,193.956,82.658,193.256z M93.724,203.227l-5.633-2.582c-0.067,1.574,0.22,2.883,1.78,3.597
                                                                            C91.24,204.87,92.635,204.681,93.724,203.227z"/>
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <path style="fill:#FFFFFF;" d="M102.557,179.36c-0.053,0.098-1.594-0.724-4.183-1.806c-2.586-1.085-6.26-2.354-10.455-3.186
                                                                            c-4.199-0.821-8.08-1.039-10.884-1.016c-2.806,0.019-4.543,0.196-4.555,0.085c-0.005-0.045,0.423-0.131,1.206-0.248
                                                                            c0.782-0.125,1.923-0.234,3.337-0.303c2.827-0.143,6.769,0.003,11.024,0.835c4.252,0.843,7.955,2.202,10.516,3.406
                                                                            c1.283,0.6,2.298,1.133,2.973,1.546C102.215,179.078,102.579,179.32,102.557,179.36z"/>
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <path style="fill:#FFFFFF;" d="M112.515,187.966c-0.13,0.128-1.437-0.986-2.919-2.489c-1.483-1.503-2.58-2.825-2.45-2.952
                                                                            c0.13-0.128,1.437,0.986,2.92,2.489C111.548,186.516,112.645,187.838,112.515,187.966z"/>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                            <g>
                                                                <g>
                                                                    <g>
                                                                        <g>
                                                                            <g>
                                                                                <g>
                                                                                    
                                                                                        <ellipse transform="matrix(0.8719 -0.4898 0.4898 0.8719 7.86 210.1777)" style="fill:#E0E0E0;" cx="405.584" cy="90.068" rx="35.532" ry="25.523"/>
                                                                                </g>
                                                                                <g>
                                                                                    
                                                                                        <ellipse transform="matrix(0.8719 -0.4897 0.4897 0.8719 10.0887 208.0239)" style="fill:#EBEBEB;" cx="402.586" cy="84.732" rx="35.532" ry="25.523"/>
                                                                                </g>
                                                                                <g style="opacity:0.1;">
                                                                                    <path style="fill:#FFFFFF;" d="M403.237,59.87c0.082,1.202,1.15,3.417,2.057,4.409c3.296,3.608,8.214,5.468,13.444,5.67
                                                                                        c5.064,0.195,10.012-0.888,14.735-2.771c-5.181-9.021-17.188-12.508-30.002-9.793
                                                                                        C403.274,58.194,403.179,59.017,403.237,59.87z"/>
                                                                                </g>
                                                                                <g>
                                                                                    <path style="fill:#E0E0E0;" d="M412.382,100.824c-13.149,7.386-28.032,5.855-33.243-3.421
                                                                                        c-5.211-9.276,1.225-22.783,14.374-30.17c13.149-7.386,28.033-5.854,33.243,3.422S425.531,93.438,412.382,100.824z"/>
                                                                                </g>
                                                                                <g>
                                                                                    <path style="fill:#F5F5F5;" d="M411.525,101.284c-12.832,7.208-27.157,6.068-31.997-2.547
                                                                                        c-4.839-8.614,1.641-21.441,14.473-28.649c12.832-7.208,27.157-6.068,31.996,2.546
                                                                                        C430.837,81.249,424.357,94.076,411.525,101.284z"/>
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <g>
                                                                            <path style="fill:#FF725E;" d="M395.64,83.5L395.64,83.5L395.64,83.5L395.64,83.5z"/>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <path style="fill:#E0E0E0;" d="M405.586,93.363c-4.424-2.028-4.312-5.215-4.046-8.062l-6.43-2.948
                                                                            c-0.252,0.919,0.562,1.89,0.711,3.018c0.055,0.416-0.633,1.352-0.633,1.352l-3.629-0.567c-0.566-1.705-0.507-3.684,0.115-5.378
                                                                            l-3.533-1.62l0.832-1.812l3.597,1.648c2.059-3.232,5.642-3.568,8.888-2.08c4.424,2.028,4.364,5.184,4.098,8.033l6.366,2.918
                                                                            c0.548-1.782,0.385-3.864-0.392-5.531l0.633-1.352l3.037,1.829c0.906,1.807,0.962,4.374,0.158,6.629l3.533,1.62l-0.831,1.813
                                                                            l-3.565-1.634C412.394,94.477,408.832,94.851,405.586,93.363z M399.958,79.678c-1.401-0.642-2.85-0.504-3.921,0.906l5.666,2.597
                                                                            C401.749,81.65,401.486,80.378,399.958,79.678z M411.024,89.649l-5.633-2.582c-0.067,1.574,0.22,2.882,1.78,3.597
                                                                            C408.539,91.291,409.935,91.102,411.024,89.649z"/>
                                                                    </g>
                                                                    <g>
                                                                        <path style="fill:#EBEBEB;" d="M406.22,92.011c-4.424-2.028-4.311-5.215-4.046-8.062l-6.43-2.948
                                                                            c-0.345,1.258-0.372,2.745,0.077,4.369l-3.629-0.567c-0.566-1.705-0.507-3.684,0.115-5.378l-3.534-1.62l0.832-1.812l3.597,1.648
                                                                            c2.059-3.232,5.642-3.568,8.888-2.08c4.424,2.028,4.364,5.184,4.098,8.033l6.366,2.918c0.548-1.782,0.385-3.864-0.392-5.531
                                                                            l3.671,0.478c0.906,1.807,0.962,4.374,0.158,6.629l3.533,1.62l-0.831,1.813l-3.565-1.634
                                                                            C413.028,93.125,409.466,93.499,406.22,92.011z M400.592,78.326c-1.401-0.642-2.85-0.504-3.921,0.906l5.666,2.597
                                                                            C402.383,80.299,402.119,79.027,400.592,78.326z M411.658,88.297l-5.633-2.582c-0.067,1.574,0.22,2.882,1.78,3.597
                                                                            C409.173,89.94,410.569,89.751,411.658,88.297z"/>
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <path style="fill:#FFFFFF;" d="M386.439,65.85c0.061,0.093,1.529-0.852,4.021-2.142c2.489-1.292,6.047-2.858,10.159-4.031
                                                                            c4.117-1.162,7.968-1.697,10.765-1.904c2.798-0.211,4.543-0.177,4.547-0.288c0.002-0.045-0.433-0.096-1.222-0.149
                                                                            c-0.789-0.061-1.936-0.076-3.351-0.029c-2.829,0.088-6.746,0.557-10.918,1.735c-4.168,1.188-7.748,2.845-10.202,4.255
                                                                            c-1.229,0.703-2.197,1.318-2.837,1.784C386.757,65.541,386.414,65.812,386.439,65.85z"/>
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <path style="fill:#FFFFFF;" d="M376.634,75.842c0.14,0.117,1.351-1.101,2.706-2.719c1.355-1.619,2.34-3.026,2.2-3.143
                                                                            c-0.14-0.117-1.351,1.101-2.706,2.72C377.479,74.318,376.494,75.725,376.634,75.842z"/>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                            <g>
                                                                <g>
                                                                    <g>
                                                                        <g>
                                                                            <g>
                                                                                <g>
                                                                                    <path style="fill:#E0E0E0;" d="M411.423,234.09c-12.978-3.391-21.524-13.697-19.088-23.019
                                                                                        c2.436-9.323,14.931-14.13,27.909-10.739c12.978,3.391,21.524,13.697,19.088,23.019
                                                                                        C436.896,232.673,424.401,237.482,411.423,234.09z"/>
                                                                                </g>
                                                                                <g>
                                                                                    
                                                                                        <ellipse transform="matrix(0.2528 -0.9675 0.9675 0.2528 105.2581 562.6222)" style="fill:#EBEBEB;" cx="416.891" cy="213.163" rx="17.446" ry="24.288"/>
                                                                                </g>
                                                                                <g style="opacity:0.1;">
                                                                                    <path style="fill:#FFFFFF;" d="M429.009,201.241c-0.53,0.63-1.056,2.226-1.081,3.145c-0.091,3.34,1.446,6.588,3.923,9.169
                                                                                        c2.399,2.499,5.347,4.314,8.564,5.629c1.732-6.897-2.52-14.31-10.113-19.055
                                                                                        C429.822,200.434,429.386,200.794,429.009,201.241z"/>
                                                                                </g>
                                                                                <g>
                                                                                    <path style="fill:#E0E0E0;" d="M414.073,225.729c-9.974-2.606-16.569-10.422-14.731-17.458
                                                                                        c1.839-7.036,11.414-10.627,21.389-8.021c9.974,2.606,16.569,10.423,14.731,17.459
                                                                                        C433.623,224.744,424.047,228.335,414.073,225.729z"/>
                                                                                </g>
                                                                                <g>
                                                                                    <path style="fill:#F5F5F5;" d="M413.434,225.548c-9.734-2.543-16.24-9.902-14.532-16.437
                                                                                        c1.707-6.534,10.982-9.77,20.715-7.226c9.734,2.543,16.24,9.902,14.533,16.436
                                                                                        C432.442,224.856,423.167,228.092,413.434,225.548z"/>
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <g>
                                                                            <path style="fill:#FF725E;" d="M414.058,209.261L414.058,209.261L414.058,209.261L414.058,209.261z"/>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <path style="fill:#E0E0E0;" d="M414.271,218.833c-1.214-3.098,0.354-4.612,1.835-5.886l-1.765-4.502
                                                                            c-0.56,0.333-0.621,1.197-1.082,1.822c-0.17,0.231-0.953,0.364-0.953,0.364l-1.516-2.001c0.531-1.107,1.499-2.053,2.608-2.591
                                                                            l-0.97-2.474l1.269-0.497l0.987,2.518c2.547-0.613,4.469,0.922,5.36,3.195c1.214,3.098-0.313,4.621-1.796,5.897l1.747,4.456
                                                                            c1.115-0.617,2.023-1.718,2.432-2.907l0.953-0.364l0.626,2.341c-0.412,1.319-1.602,2.608-3.068,3.336l0.97,2.474l-1.269,0.497
                                                                            l-0.978-2.496C417.092,222.611,415.162,221.105,414.271,218.833z M417.996,209.429c-0.384-0.98-1.163-1.601-2.359-1.415
                                                                            l1.555,3.967C417.942,211.25,418.415,210.499,417.996,209.429z M418.709,219.586l-1.546-3.944
                                                                            c-0.78,0.743-1.26,1.522-0.832,2.615C416.707,219.215,417.483,219.785,418.709,219.586z"/>
                                                                    </g>
                                                                    <g>
                                                                        <path style="fill:#EBEBEB;" d="M415.224,218.468c-1.214-3.097,0.354-4.611,1.835-5.886l-1.764-4.502
                                                                            c-0.767,0.455-1.486,1.174-2.036,2.186l-1.516-2.001c0.531-1.107,1.499-2.053,2.608-2.591l-0.97-2.474l1.269-0.497l0.987,2.518
                                                                            c2.547-0.613,4.469,0.922,5.36,3.195c1.214,3.097-0.313,4.621-1.797,5.897l1.747,4.457c1.115-0.617,2.023-1.719,2.432-2.907
                                                                            l1.579,1.977c-0.412,1.319-1.602,2.608-3.068,3.336l0.97,2.474l-1.269,0.497l-0.978-2.496
                                                                            C418.045,222.247,416.115,220.741,415.224,218.468z M418.949,209.065c-0.384-0.98-1.163-1.601-2.359-1.415l1.555,3.967
                                                                            C418.895,210.885,419.369,210.135,418.949,209.065z M419.662,219.222l-1.546-3.944c-0.78,0.743-1.26,1.522-0.831,2.615
                                                                            C417.66,218.851,418.436,219.42,419.662,219.222z"/>
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <path style="fill:#FFFFFF;" d="M417.907,196.211c-0.014,0.075,1.157,0.306,2.995,0.855c1.838,0.545,4.331,1.463,6.911,2.838
                                                                            c2.577,1.382,4.726,2.946,6.199,4.172c1.477,1.224,2.319,2.069,2.374,2.016c0.022-0.021-0.167-0.253-0.531-0.653
                                                                            c-0.359-0.404-0.916-0.956-1.635-1.604c-1.434-1.299-3.583-2.927-6.195-4.328c-2.614-1.394-5.162-2.277-7.038-2.748
                                                                            c-0.938-0.238-1.706-0.395-2.242-0.469C418.21,196.21,417.913,196.181,417.907,196.211z"/>
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <path style="fill:#FFFFFF;" d="M408.342,196.474c0.013,0.124,1.187,0.1,2.622-0.054c1.435-0.154,2.587-0.378,2.574-0.502
                                                                            c-0.013-0.124-1.187-0.1-2.622,0.054C409.481,196.125,408.329,196.35,408.342,196.474z"/>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                            <g>
                                                                <g>
                                                                    <g>
                                                                        <g>
                                                                            <g>
                                                                                <g>
                                                                                    
                                                                                        <ellipse transform="matrix(0.9273 -0.3744 0.3744 0.9273 -11.6284 63.8291)" style="fill:#E0E0E0;" cx="158.48" cy="61.846" rx="24.287" ry="17.446"/>
                                                                                </g>
                                                                                <g>
                                                                                    <path style="fill:#EBEBEB;" d="M163.445,74.144c-12.438,5.022-25.446,1.85-29.053-7.085
                                                                                        c-3.607-8.935,3.552-20.248,15.99-25.27c12.439-5.022,25.445-1.85,29.053,7.084
                                                                                        C183.042,57.808,175.883,69.121,163.445,74.144z"/>
                                                                                </g>
                                                                                <g style="opacity:0.1;">
                                                                                    <path style="fill:#FFFFFF;" d="M159.525,41.168c-0.049,0.822,0.481,2.417,1.009,3.169c1.92,2.734,5.091,4.424,8.62,5.018
                                                                                        c3.416,0.575,6.865,0.272,10.231-0.592c-2.725-6.568-10.56-9.981-19.485-9.258C159.696,40.035,159.56,40.585,159.525,41.168z
                                                                                        "/>
                                                                                </g>
                                                                                <g>
                                                                                    <path style="fill:#E0E0E0;" d="M162.149,69.731c-9.559,3.86-19.515,1.522-22.238-5.221
                                                                                        c-2.723-6.744,2.819-15.339,12.379-19.198c9.559-3.86,19.516-1.522,22.238,5.222
                                                                                        C177.251,57.277,171.708,65.872,162.149,69.731z"/>
                                                                                </g>
                                                                                <g>
                                                                                    <path style="fill:#F5F5F5;" d="M161.528,69.968c-9.329,3.766-18.941,1.743-21.469-4.521
                                                                                        c-2.529-6.263,2.984-14.392,12.313-18.159c9.329-3.766,18.941-1.743,21.469,4.52
                                                                                        C176.369,58.071,170.857,66.202,161.528,69.968z"/>
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <g>
                                                                            <path style="fill:#FF725E;" d="M152.311,56.525L152.311,56.525L152.311,56.525L152.311,56.525z"/>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <path style="fill:#E0E0E0;" d="M158.194,64.079c-2.822-1.761-2.468-3.912-2.039-5.819l-4.102-2.56
                                                                            c-0.251,0.601,0.216,1.331,0.218,2.108c0.001,0.287-0.548,0.861-0.548,0.861l-2.411-0.701c-0.235-1.206-0.022-2.542,0.547-3.636
                                                                            l-2.254-1.407l0.722-1.156l2.295,1.432c1.678-2.011,4.136-1.927,6.208-0.634c2.822,1.761,2.506,3.895,2.076,5.804l4.061,2.534
                                                                            c0.527-1.16,0.598-2.586,0.217-3.784l0.548-0.861l1.899,1.505c0.457,1.304,0.27,3.049-0.471,4.508l2.254,1.407l-0.722,1.157
                                                                            l-2.275-1.419C162.712,65.429,160.264,65.371,158.194,64.079z M155.573,54.31c-0.893-0.558-1.888-0.591-2.738,0.272l3.614,2.256
                                                                            C156.615,55.804,156.547,54.918,155.573,54.31z M162.204,62.036l-3.593-2.243c-0.183,1.061-0.103,1.973,0.893,2.594
                                                                            C160.376,62.933,161.339,62.926,162.204,62.036z"/>
                                                                    </g>
                                                                    <g>
                                                                        <path style="fill:#EBEBEB;" d="M158.741,63.218c-2.822-1.761-2.468-3.912-2.039-5.819l-4.102-2.56
                                                                            c-0.344,0.823-0.492,1.829-0.329,2.969l-2.411-0.701c-0.235-1.205-0.022-2.542,0.547-3.636l-2.254-1.407l0.722-1.156
                                                                            l2.295,1.432c1.678-2.011,4.136-1.927,6.208-0.634c2.822,1.761,2.506,3.895,2.076,5.804l4.061,2.534
                                                                            c0.527-1.16,0.598-2.586,0.217-3.784l2.447,0.645c0.457,1.304,0.27,3.049-0.471,4.508l2.254,1.407l-0.722,1.157l-2.275-1.419
                                                                            C163.259,64.568,160.812,64.511,158.741,63.218z M156.12,53.449c-0.893-0.557-1.888-0.591-2.738,0.272l3.614,2.256
                                                                            C157.162,54.943,157.095,54.057,156.12,53.449z M162.752,61.175l-3.593-2.243c-0.183,1.061-0.103,1.973,0.893,2.594
                                                                            C160.924,62.072,161.887,62.065,162.752,61.175z"/>
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <path style="fill:#FFFFFF;" d="M147.615,43.756c0.033,0.068,1.111-0.444,2.913-1.101c1.8-0.659,4.349-1.41,7.239-1.846
                                                                            c2.893-0.428,5.55-0.455,7.464-0.351c1.916,0.102,3.096,0.277,3.108,0.202c0.005-0.031-0.285-0.103-0.816-0.208
                                                                            c-0.53-0.11-1.306-0.22-2.269-0.312c-1.925-0.187-4.622-0.211-7.553,0.223c-2.929,0.441-5.501,1.252-7.288,1.994
                                                                            c-0.895,0.369-1.605,0.701-2.079,0.962C147.857,43.574,147.601,43.728,147.615,43.756z"/>
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <path style="fill:#FFFFFF;" d="M140.095,49.674c0.085,0.091,1.012-0.628,2.072-1.607c1.06-0.979,1.85-1.847,1.766-1.939
                                                                            c-0.084-0.091-1.012,0.628-2.072,1.608C140.801,48.714,140.011,49.582,140.095,49.674z"/>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                            <g>
                                                                <g>
                                                                    <g>
                                                                        <g>
                                                                            <g>
                                                                                <g>
                                                                                    <path style="fill:#E0E0E0;" d="M35.425,383.692c6.565-4.035,18.024-6.215,30.993-5.783
                                                                                        c12.969,0.432,24.257,3.369,30.539,7.832l5.548,0.185l-0.278,8.339c-0.301,9.033-16.803,15.816-36.858,15.148
                                                                                        c-20.056-0.668-36.069-8.534-35.768-17.568l0.278-8.339L35.425,383.692z"/>
                                                                                </g>
                                                                                <g>
                                                                                    <path style="fill:#EBEBEB;" d="M65.627,401.663c20.055,0.668,36.557-6.106,36.858-15.131
                                                                                        c0.301-9.025-15.714-16.883-35.769-17.551c-20.056-0.668-36.557,6.106-36.858,15.131
                                                                                        C29.557,393.137,45.571,400.995,65.627,401.663z"/>
                                                                                </g>
                                                                                <g style="opacity:0.1;">
                                                                                    <path style="fill:#FFFFFF;" d="M83.676,381.572c-3.494,1.269-7.069,2.694-10.719,3.457
                                                                                        c-13.024,2.721-27.174-0.747-36.809-9.706c6.644-4.212,17.893-6.765,30.568-6.343c12.136,0.404,22.785,3.444,29.242,7.779
                                                                                        C91.912,378.484,87.807,380.072,83.676,381.572z"/>
                                                                                </g>
                                                                                <g>
                                                                                    <path style="fill:#E0E0E0;" d="M65.174,395.025c15.414,0.513,27.971-2.055,28.173-8.118
                                                                                        c0.214-6.435-12.028-13.324-27.442-13.837c-15.414-0.514-28.072,3.986-28.274,10.047c-0.049,1.487-0.103,3.106,2.356,5.822
                                                                                        C43.869,393.225,53.542,394.637,65.174,395.025z"/>
                                                                                </g>
                                                                                <g>
                                                                                    <path style="fill:#F5F5F5;" d="M65.764,397.551c15.042,0.501,27.399-4.008,27.601-10.069
                                                                                        c0.202-6.062-11.827-11.384-26.869-11.885c-15.042-0.501-27.399,4.008-27.601,10.071
                                                                                        C38.693,391.729,50.722,397.05,65.764,397.551z"/>
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                        <g>
                                                                            <g>
                                                                                <path style="fill:#E0E0E0;" d="M70.621,392.395c-4.621,0.073-5.82-2.346-6.754-4.565l-6.713,0.106
                                                                                    c0.157,0.786,1.243,1.173,1.844,1.971c0.211,0.281,0,1.261,0,1.261l-3.346,0.876c-1.179-1.068-1.935-2.567-2.09-4.053
                                                                                    l-3.689,0.056l-0.027-1.65l3.756-0.059c0.45-3.145,3.387-4.681,6.777-4.734c4.621-0.073,5.853,2.305,6.785,4.524l6.648-0.102
                                                                                    c-0.254-1.527-1.241-3.019-2.587-3.987v-1.261l3.343,0.303c1.513,1.025,2.604,2.92,2.834,4.889l3.691-0.058l0.027,1.65
                                                                                    l-3.723,0.057C76.915,390.786,74.012,392.342,70.621,392.395z M60.22,384.203c-1.465,0.023-2.652,0.645-2.996,2.078
                                                                                    l5.918-0.092C62.562,385.031,61.814,384.177,60.22,384.203z M73.773,387.676l-5.883,0.091c0.584,1.199,1.361,2.072,2.99,2.046
                                                                                    C72.31,389.791,73.431,389.149,73.773,387.676z"/>
                                                                            </g>
                                                                        </g>
                                                                        <g>
                                                                            <g>
                                                                                <path style="fill:#EBEBEB;" d="M70.621,391.134c-4.621,0.073-5.82-2.346-6.754-4.566l-6.713,0.106
                                                                                    c0.212,1.062,0.796,2.18,1.844,3.232l-3.346,0.876c-1.179-1.068-1.935-2.567-2.09-4.053l-3.689,0.056l-0.027-1.65l3.756-0.059
                                                                                    c0.45-3.145,3.387-4.681,6.777-4.734c4.621-0.073,5.853,2.305,6.785,4.524l6.648-0.102c-0.254-1.527-1.241-3.019-2.587-3.987
                                                                                    l3.343-0.958c1.513,1.025,2.604,2.92,2.834,4.889l3.691-0.058l0.027,1.65l-3.723,0.057
                                                                                    C76.915,389.525,74.012,391.081,70.621,391.134z M60.22,382.942c-1.465,0.023-2.652,0.645-2.996,2.079l5.918-0.092
                                                                                    C62.562,383.77,61.814,382.916,60.22,382.942z M73.773,386.415l-5.883,0.091c0.584,1.199,1.361,2.072,2.99,2.046
                                                                                    C72.31,388.53,73.431,387.888,73.773,386.415z"/>
                                                                            </g>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <g>
                                                                            <g>
                                                                                <g>
                                                                                    <path style="fill:#E0E0E0;" d="M35.425,371.239c6.565-4.035,18.024-6.215,30.993-5.783
                                                                                        c12.969,0.432,24.257,3.369,30.539,7.832l5.548,0.185l-0.278,8.339c-0.301,9.033-16.803,15.816-36.858,15.148
                                                                                        c-20.056-0.668-36.069-8.534-35.768-17.568l0.278-8.339L35.425,371.239z"/>
                                                                                </g>
                                                                                <g>
                                                                                    <path style="fill:#EBEBEB;" d="M65.627,389.21c20.055,0.668,36.557-6.106,36.858-15.131
                                                                                        c0.301-9.025-15.714-16.883-35.769-17.551c-20.056-0.668-36.557,6.106-36.858,15.131
                                                                                        C29.557,380.684,45.571,388.542,65.627,389.21z"/>
                                                                                </g>
                                                                                <g style="opacity:0.1;">
                                                                                    <path style="fill:#FFFFFF;" d="M83.676,369.119c-3.494,1.269-7.069,2.695-10.719,3.457
                                                                                        c-13.024,2.721-27.174-0.747-36.809-9.705c6.644-4.212,17.893-6.765,30.568-6.343c12.136,0.404,22.785,3.444,29.242,7.779
                                                                                        C91.912,366.031,87.807,367.619,83.676,369.119z"/>
                                                                                </g>
                                                                                <g>
                                                                                    <path style="fill:#E0E0E0;" d="M65.174,382.572c15.414,0.513,27.971-2.055,28.173-8.118
                                                                                        c0.214-6.435-12.028-13.324-27.442-13.837c-15.414-0.514-28.072,3.986-28.274,10.047c-0.049,1.487-0.103,3.106,2.356,5.822
                                                                                        C43.869,380.772,53.542,382.184,65.174,382.572z"/>
                                                                                </g>
                                                                                <g>
                                                                                    <path style="fill:#F5F5F5;" d="M65.764,385.099c15.042,0.501,27.399-4.008,27.601-10.069
                                                                                        c0.202-6.062-11.827-11.384-26.869-11.885c-15.042-0.501-27.399,4.008-27.601,10.071
                                                                                        C38.693,379.276,50.722,384.597,65.764,385.099z"/>
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                        <g>
                                                                            <g>
                                                                                <path style="fill:#E0E0E0;" d="M70.621,379.942c-4.621,0.073-5.82-2.346-6.754-4.565l-6.713,0.106
                                                                                    c0.157,0.786,1.243,1.173,1.844,1.971c0.211,0.281,0,1.261,0,1.261l-3.346,0.876c-1.179-1.068-1.935-2.567-2.09-4.053
                                                                                    l-3.689,0.056l-0.027-1.65l3.756-0.059c0.45-3.145,3.387-4.681,6.777-4.734c4.621-0.073,5.853,2.305,6.785,4.524l6.648-0.102
                                                                                    c-0.254-1.527-1.241-3.019-2.587-3.987v-1.261l3.343,0.304c1.513,1.025,2.604,2.92,2.834,4.889l3.691-0.058l0.027,1.65
                                                                                    l-3.723,0.057C76.915,378.334,74.012,379.889,70.621,379.942z M60.22,371.75c-1.465,0.023-2.652,0.645-2.996,2.078
                                                                                    l5.918-0.092C62.562,372.578,61.814,371.724,60.22,371.75z M73.773,375.223l-5.883,0.091c0.584,1.199,1.361,2.072,2.99,2.046
                                                                                    C72.31,377.338,73.431,376.696,73.773,375.223z"/>
                                                                            </g>
                                                                        </g>
                                                                        <g>
                                                                            <g>
                                                                                <path style="fill:#EBEBEB;" d="M70.621,378.681c-4.621,0.073-5.82-2.346-6.754-4.565l-6.713,0.106
                                                                                    c0.212,1.062,0.796,2.18,1.844,3.232l-3.346,0.876c-1.179-1.068-1.935-2.567-2.09-4.053l-3.689,0.056l-0.027-1.65l3.756-0.059
                                                                                    c0.45-3.145,3.387-4.681,6.777-4.734c4.621-0.072,5.853,2.305,6.785,4.524l6.648-0.102c-0.254-1.527-1.241-3.019-2.587-3.987
                                                                                    l3.343-0.958c1.513,1.025,2.604,2.92,2.834,4.889l3.691-0.058l0.027,1.65l-3.723,0.057
                                                                                    C76.915,377.072,74.012,378.628,70.621,378.681z M60.22,370.489c-1.465,0.023-2.652,0.645-2.996,2.079l5.918-0.092
                                                                                    C62.562,371.317,61.814,370.463,60.22,370.489z M73.773,373.962l-5.883,0.091c0.584,1.199,1.361,2.072,2.99,2.046
                                                                                    C72.31,376.077,73.431,375.435,73.773,373.962z"/>
                                                                            </g>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <g>
                                                                            <g>
                                                                                <g>
                                                                                    <path style="fill:#E0E0E0;" d="M39.146,362.109c6.565-4.035,18.023-6.215,30.993-5.783
                                                                                        c12.968,0.432,24.257,3.369,30.539,7.833l5.547,0.185l-0.278,8.339c-0.301,9.033-16.803,15.816-36.858,15.148
                                                                                        c-20.056-0.668-36.069-8.534-35.768-17.568l0.278-8.339L39.146,362.109z"/>
                                                                                </g>
                                                                                <g>
                                                                                    <path style="fill:#EBEBEB;" d="M69.347,380.08c20.055,0.668,36.557-6.106,36.858-15.132
                                                                                        c0.301-9.025-15.714-16.883-35.769-17.551c-20.056-0.668-36.557,6.106-36.858,15.131
                                                                                        C33.278,371.554,49.292,379.412,69.347,380.08z"/>
                                                                                </g>
                                                                                <g style="opacity:0.1;">
                                                                                    <path style="fill:#FFFFFF;" d="M87.397,359.989c-3.494,1.269-7.069,2.694-10.719,3.457
                                                                                        c-13.024,2.721-27.174-0.748-36.809-9.706c6.644-4.212,17.893-6.765,30.568-6.342c12.136,0.404,22.785,3.444,29.242,7.779
                                                                                        C95.633,356.901,91.527,358.489,87.397,359.989z"/>
                                                                                </g>
                                                                                <g>
                                                                                    <path style="fill:#E0E0E0;" d="M68.894,373.442c15.414,0.513,27.971-2.055,28.173-8.118
                                                                                        c0.214-6.435-12.028-13.324-27.442-13.837c-15.414-0.514-28.072,3.986-28.274,10.047c-0.049,1.487-0.103,3.106,2.356,5.822
                                                                                        C47.59,371.642,57.263,373.054,68.894,373.442z"/>
                                                                                </g>
                                                                                <g>
                                                                                    <path style="fill:#F5F5F5;" d="M69.484,375.969c15.042,0.501,27.399-4.008,27.601-10.069
                                                                                        c0.202-6.062-11.827-11.384-26.869-11.885c-15.042-0.501-27.399,4.008-27.601,10.07
                                                                                        C42.413,370.146,54.443,375.467,69.484,375.969z"/>
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                        <g>
                                                                            <g>
                                                                                <path style="fill:#E0E0E0;" d="M74.342,370.812c-4.62,0.073-5.82-2.346-6.754-4.565l-6.713,0.106
                                                                                    c0.157,0.786,1.243,1.174,1.844,1.971c0.212,0.281,0,1.261,0,1.261l-3.346,0.876c-1.179-1.068-1.935-2.567-2.09-4.053
                                                                                    l-3.689,0.056l-0.027-1.65l3.756-0.059c0.45-3.145,3.387-4.681,6.777-4.734c4.621-0.073,5.853,2.305,6.785,4.524l6.648-0.102
                                                                                    c-0.253-1.527-1.241-3.019-2.587-3.987v-1.261l3.342,0.303c1.513,1.025,2.604,2.92,2.834,4.889l3.691-0.058l0.027,1.65
                                                                                    l-3.723,0.057C80.636,369.204,77.732,370.759,74.342,370.812z M63.94,362.62c-1.464,0.023-2.652,0.645-2.995,2.079
                                                                                    l5.918-0.092C66.283,363.448,65.535,362.594,63.94,362.62z M77.494,366.093l-5.883,0.091c0.584,1.199,1.361,2.072,2.99,2.046
                                                                                    C76.03,368.208,77.152,367.566,77.494,366.093z"/>
                                                                            </g>
                                                                        </g>
                                                                        <g>
                                                                            <g>
                                                                                <path style="fill:#EBEBEB;" d="M74.342,369.551c-4.62,0.073-5.82-2.346-6.754-4.565l-6.713,0.106
                                                                                    c0.213,1.062,0.796,2.18,1.844,3.232l-3.346,0.876c-1.179-1.068-1.935-2.567-2.09-4.053l-3.689,0.056l-0.027-1.65l3.756-0.059
                                                                                    c0.45-3.145,3.387-4.681,6.777-4.734c4.621-0.073,5.853,2.305,6.785,4.524l6.648-0.102c-0.253-1.527-1.241-3.019-2.587-3.987
                                                                                    l3.342-0.958c1.513,1.025,2.604,2.92,2.834,4.889l3.691-0.058l0.027,1.65l-3.723,0.057
                                                                                    C80.636,367.943,77.732,369.498,74.342,369.551z M63.94,361.359c-1.464,0.023-2.652,0.645-2.995,2.079l5.918-0.092
                                                                                    C66.283,362.187,65.535,361.333,63.94,361.359z M77.494,364.832l-5.883,0.091c0.584,1.199,1.361,2.072,2.99,2.046
                                                                                    C76.03,366.947,77.152,366.305,77.494,364.832z"/>
                                                                            </g>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <g>
                                                                            <g>
                                                                                <g>
                                                                                    <path style="fill:#E0E0E0;" d="M35.525,351.383c6.565-4.035,18.023-6.215,30.993-5.783
                                                                                        c12.968,0.432,24.257,3.369,30.539,7.832l5.548,0.185l-0.278,8.339c-0.301,9.033-16.803,15.816-36.858,15.148
                                                                                        c-20.056-0.668-36.069-8.534-35.768-17.568l0.278-8.339L35.525,351.383z"/>
                                                                                </g>
                                                                                <g>
                                                                                    <path style="fill:#EBEBEB;" d="M65.726,369.355c20.055,0.668,36.557-6.106,36.858-15.131
                                                                                        c0.301-9.025-15.714-16.883-35.769-17.551c-20.056-0.668-36.557,6.106-36.858,15.131
                                                                                        C29.656,360.829,45.67,368.687,65.726,369.355z"/>
                                                                                </g>
                                                                                <g style="opacity:0.1;">
                                                                                    <path style="fill:#FFFFFF;" d="M83.775,349.263c-3.494,1.269-7.069,2.695-10.719,3.457
                                                                                        c-13.024,2.721-27.174-0.747-36.809-9.705c6.644-4.212,17.893-6.765,30.568-6.343c12.136,0.404,22.785,3.444,29.242,7.779
                                                                                        C92.011,346.176,87.906,347.764,83.775,349.263z"/>
                                                                                </g>
                                                                                <g>
                                                                                    <path style="fill:#E0E0E0;" d="M65.273,362.716c15.414,0.513,27.971-2.055,28.173-8.118
                                                                                        c0.214-6.435-12.028-13.324-27.442-13.837c-15.414-0.514-28.072,3.986-28.274,10.047c-0.049,1.487-0.103,3.106,2.356,5.822
                                                                                        C43.968,360.917,53.641,362.328,65.273,362.716z"/>
                                                                                </g>
                                                                                <g>
                                                                                    <path style="fill:#F5F5F5;" d="M65.863,365.243c15.042,0.501,27.399-4.008,27.601-10.069
                                                                                        c0.202-6.062-11.827-11.384-26.869-11.885c-15.042-0.501-27.399,4.008-27.601,10.071
                                                                                        C38.792,359.421,50.821,364.742,65.863,365.243z"/>
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                        <g>
                                                                            <g>
                                                                                <path style="fill:#E0E0E0;" d="M70.72,360.086c-4.621,0.073-5.82-2.346-6.754-4.565l-6.713,0.106
                                                                                    c0.157,0.786,1.243,1.173,1.844,1.971c0.212,0.281,0,1.261,0,1.261l-3.346,0.876c-1.179-1.068-1.935-2.567-2.09-4.053
                                                                                    l-3.689,0.056l-0.027-1.65l3.756-0.059c0.45-3.145,3.387-4.681,6.777-4.734c4.621-0.073,5.853,2.305,6.785,4.524l6.648-0.102
                                                                                    c-0.254-1.527-1.241-3.019-2.587-3.987v-1.261l3.342,0.304c1.513,1.025,2.604,2.92,2.834,4.889l3.691-0.058l0.027,1.65
                                                                                    l-3.723,0.057C77.014,358.478,74.111,360.033,70.72,360.086z M60.319,351.895c-1.465,0.023-2.652,0.645-2.995,2.078
                                                                                    l5.918-0.092C62.661,352.722,61.913,351.869,60.319,351.895z M73.872,355.367l-5.883,0.091
                                                                                    c0.584,1.199,1.361,2.072,2.99,2.046C72.409,357.483,73.53,356.841,73.872,355.367z"/>
                                                                            </g>
                                                                        </g>
                                                                        <g>
                                                                            <g>
                                                                                <path style="fill:#EBEBEB;" d="M70.72,358.825c-4.621,0.073-5.82-2.346-6.754-4.565l-6.713,0.106
                                                                                    c0.212,1.062,0.796,2.18,1.844,3.232l-3.346,0.876c-1.179-1.068-1.935-2.567-2.09-4.053l-3.689,0.056l-0.027-1.65l3.756-0.059
                                                                                    c0.45-3.145,3.387-4.681,6.777-4.734c4.621-0.072,5.853,2.305,6.785,4.524l6.648-0.102c-0.254-1.527-1.241-3.019-2.587-3.987
                                                                                    l3.342-0.958c1.513,1.025,2.604,2.92,2.834,4.889l3.691-0.058l0.027,1.65l-3.723,0.057
                                                                                    C77.014,357.217,74.111,358.772,70.72,358.825z M60.319,350.633c-1.465,0.023-2.652,0.645-2.995,2.079l5.918-0.092
                                                                                    C62.661,351.461,61.913,350.608,60.319,350.633z M73.872,354.106l-5.883,0.091c0.584,1.199,1.361,2.072,2.99,2.046
                                                                                    C72.409,356.221,73.53,355.579,73.872,354.106z"/>
                                                                            </g>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                            <g>
                                                                <g>
                                                                    <g>
                                                                        <g>
                                                                            <g>
                                                                                <path style="fill:#E0E0E0;" d="M134.926,439.397c6.964-4.281,19.12-6.593,32.878-6.134
                                                                                    c13.758,0.458,25.733,3.574,32.397,8.309l5.885,0.196l-0.295,8.846c-0.319,9.583-17.826,16.778-39.101,16.069
                                                                                    c-21.276-0.709-38.264-9.053-37.944-18.636l0.295-8.847L134.926,439.397z"/>
                                                                            </g>
                                                                            <g>
                                                                                <path style="fill:#EBEBEB;" d="M166.964,458.462c21.275,0.709,38.781-6.477,39.1-16.052
                                                                                    c0.319-9.574-16.67-17.91-37.945-18.619c-21.277-0.709-38.781,6.478-39.1,16.052
                                                                                    C128.701,449.417,145.688,457.753,166.964,458.462z"/>
                                                                            </g>
                                                                            <g style="opacity:0.1;">
                                                                                <path style="fill:#FFFFFF;" d="M186.112,437.148c-3.706,1.346-7.499,2.859-11.371,3.667
                                                                                    c-13.817,2.886-28.828-0.793-39.049-10.296c7.048-4.469,18.981-7.177,32.428-6.729c12.874,0.429,24.171,3.654,31.021,8.253
                                                                                    C194.849,433.872,190.494,435.557,186.112,437.148z"/>
                                                                            </g>
                                                                            <g>
                                                                                <path style="fill:#E0E0E0;" d="M166.484,451.419c16.351,0.545,29.673-2.18,29.888-8.612
                                                                                    c0.227-6.827-12.76-14.134-29.112-14.679c-16.351-0.545-29.78,4.228-29.994,10.658c-0.052,1.577-0.11,3.295,2.499,6.176
                                                                                    C143.883,449.51,154.145,451.008,166.484,451.419z"/>
                                                                            </g>
                                                                            <g>
                                                                                <path style="fill:#F5F5F5;" d="M167.11,454.1c15.957,0.532,29.066-4.251,29.28-10.682
                                                                                    c0.214-6.431-12.547-12.077-28.504-12.608c-15.957-0.532-29.066,4.252-29.28,10.683
                                                                                    C138.391,447.923,151.153,453.568,167.11,454.1z"/>
                                                                            </g>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path style="fill:#E0E0E0;" d="M172.263,448.629c-4.902,0.077-6.174-2.489-7.165-4.843l-7.122,0.112
                                                                                c0.167,0.834,1.319,1.245,1.956,2.091c0.224,0.298,0,1.338,0,1.338l-3.549,0.929c-1.251-1.133-2.052-2.723-2.217-4.299
                                                                                l-3.913,0.06l-0.029-1.751l3.985-0.063c0.477-3.336,3.593-4.966,7.189-5.022c4.902-0.077,6.209,2.445,7.198,4.799l7.052-0.108
                                                                                c-0.269-1.62-1.317-3.203-2.744-4.23v-1.338l3.546,0.322c1.605,1.087,2.763,3.098,3.006,5.187l3.916-0.061l0.029,1.751
                                                                                l-3.95,0.061C178.94,446.923,175.86,448.573,172.263,448.629z M161.229,439.939c-1.554,0.024-2.813,0.685-3.178,2.205
                                                                                l6.278-0.098C163.713,440.818,162.92,439.912,161.229,439.939z M175.606,443.624l-6.241,0.097
                                                                                c0.62,1.272,1.444,2.198,3.172,2.17C174.054,445.867,175.244,445.186,175.606,443.624z"/>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path style="fill:#EBEBEB;" d="M172.263,447.292c-4.902,0.077-6.174-2.489-7.165-4.843l-7.122,0.112
                                                                                c0.225,1.127,0.844,2.313,1.956,3.429l-3.549,0.929c-1.251-1.133-2.052-2.723-2.217-4.299l-3.913,0.06l-0.029-1.751
                                                                                l3.985-0.063c0.477-3.336,3.593-4.966,7.189-5.022c4.902-0.077,6.209,2.445,7.198,4.799l7.052-0.108
                                                                                c-0.269-1.62-1.317-3.203-2.744-4.23l3.546-1.016c1.605,1.087,2.763,3.098,3.006,5.187l3.916-0.061l0.029,1.751l-3.95,0.061
                                                                                C178.94,445.586,175.86,447.235,172.263,447.292z M161.229,438.601c-1.554,0.024-2.813,0.684-3.178,2.205l6.278-0.098
                                                                                C163.713,439.48,162.92,438.574,161.229,438.601z M175.606,442.286l-6.241,0.097c0.62,1.272,1.444,2.198,3.172,2.17
                                                                                C174.054,444.529,175.244,443.848,175.606,442.286z"/>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                            <g>
                                                                <polygon style="fill:#E0E0E0;" points="113.106,100.024 115.638,104.654 120.267,107.185 115.638,109.717 113.106,114.346 
                                                                    110.575,109.717 105.945,107.185 110.575,104.654 		"/>
                                                            </g>
                                                            <g>
                                                                <polygon style="fill:#E0E0E0;" points="418.891,148.072 421.422,152.702 426.051,155.234 421.422,157.765 418.891,162.394 
                                                                    416.359,157.765 411.73,155.234 416.359,152.702 		"/>
                                                            </g>
                                                            <g>
                                                                <polygon style="fill:#E0E0E0;" points="347.852,45.225 350.384,49.854 355.013,52.386 350.384,54.917 347.852,59.546 
                                                                    345.321,54.917 340.691,52.386 345.321,49.854 		"/>
                                                            </g>
                                                            <g>
                                                                <polygon style="fill:#E0E0E0;" points="69.438,129.674 70.445,131.516 72.286,132.523 70.445,133.53 69.438,135.372 68.43,133.53 
                                                                    66.589,132.523 68.43,131.516 		"/>
                                                            </g>
                                                            <g>
                                                                <polygon style="fill:#E0E0E0;" points="303.548,32.331 304.556,34.172 306.397,35.18 304.556,36.187 303.548,38.028 
                                                                    302.541,36.187 300.7,35.18 302.541,34.172 		"/>
                                                            </g>
                                                            <g>
                                                                <polygon style="fill:#F5F5F5;" points="85.581,58.471 86.971,61.011 89.511,62.4 86.971,63.789 85.581,66.329 84.192,63.789 
                                                                    81.652,62.4 84.192,61.011 		"/>
                                                            </g>
                                                            <g>
                                                                <polygon style="fill:#EBEBEB;" points="133.458,155.704 134.847,158.244 137.387,159.633 134.847,161.022 133.458,163.562 
                                                                    132.069,161.022 129.529,159.633 132.069,158.244 		"/>
                                                            </g>
                                                            <g>
                                                                <polygon style="fill:#EBEBEB;" points="243.552,139.873 244.941,142.413 247.481,143.803 244.941,145.192 243.552,147.732 
                                                                    242.163,145.192 239.622,143.803 242.163,142.413 		"/>
                                                            </g>
                                                        </g>
                                                        <g id="Background_Simple" style="display:none;">
                                                            <path style="display:inline;fill:#F5F5F5;" d="M100.594,93.905l1.04-3.437c8.764-28.971,32.376-51.148,61.837-56.769
                                                                c3.787-0.722,7.627-1.172,11.49-1.33c27.808-1.135,55.868,12.9,71.937,35.983c9.451,13.576,15.457,30.459,29.131,39.648
                                                                c17.795,11.959,41.363,6.418,61.808,0.477c20.445-5.942,44.044-11.425,61.787,0.612c11.113,7.539,17.413,20.702,20.077,33.94
                                                                c7.052,35.046-9.091,72.155-35.779,95.398c-26.688,23.244-62.407,33.895-97.677,35.757c-49.409,2.609-100.767-11.91-137.946-45.171
                                                                C111.121,195.753,90.256,142.779,100.594,93.905z"/>
                                                        </g>
                                                        <g id="Table">
                                                            <g>
                                                                <path style="fill:#263238;" d="M481.819,272.557c0,0.144-104.245,0.26-232.808,0.26c-128.608,0-232.83-0.117-232.83-0.26
                                                                    c0-0.144,104.223-0.26,232.83-0.26C377.574,272.296,481.819,272.413,481.819,272.557z"/>
                                                            </g>
                                                        </g>
                                                        <g id="Bag">
                                                            <g>
                                                                <path style="fill:#FF725E;" d="M333.011,263.414l-1.583-6.333l-157.137-18.999l-1.979,11.083
                                                                    c-2.375,0.396-68.871,45.122-64.517,91.828v0c1.063,30.044,19.232,56.949,46.869,68.779c21.815,9.338,49.816,16.959,80.186,14.341
                                                                    l37.918-4.187c0,0,82.497,21.122,100.616-29.852C391.879,338.04,368.238,288.746,333.011,263.414z"/>
                                                                <g style="opacity:0.4;">
                                                                    <path d="M333.011,263.414l-1.583-6.333l-157.137-18.999l-1.979,11.083c-2.375,0.396-68.871,45.122-64.517,91.828v0
                                                                        c1.063,30.044,19.232,56.949,46.869,68.779c21.815,9.338,49.816,16.959,80.186,14.341l37.918-4.187
                                                                        c0,0,82.497,21.122,100.616-29.852C391.879,338.04,368.238,288.746,333.011,263.414z"/>
                                                                </g>
                                                                <g style="opacity:0.3;">
                                                                    <path d="M334.744,264.71c-5.49,10.9-16.793,16.985-30.147,21.371c10.927,5.739,18.512,12.823,23.489,21.98
                                                                        c1.708,8.072-0.107,16.962-5.497,23.256c-7.536,8.8-20.211,15.623-31.79,16.026c-11.579,0.403-32.908-2.863-34.406-3.258
                                                                        c12.406,8.808,25.008,17.804,34.266,29.877c0.066,0.086,0.132,0.172,0.197,0.259c11.224,14.788,5.193,36.366-11.981,43.418
                                                                        c-2.012,0.826-4.049,1.589-6.107,2.287c13.563,3.152,83.482,16.909,100.616-29.852
                                                                        C392.068,339.081,369.018,290.403,334.744,264.71z"/>
                                                                </g>
                                                                <g style="opacity:0.3;">
                                                                    <g>
                                                                        <path d="M168.964,254.227c20.594,12.915,42.654,23.471,65.618,31.445c11.496,3.992,23.299,7.59,35.259,9.9
                                                                            c6.284,1.214,12.735,2.008,19.143,1.608c6.061-0.379,12.048-1.8,17.781-3.764c12.408-4.251,23.77-11.131,33.55-19.841
                                                                            c3.57-3.179-1.688-8.406-5.241-5.241c-8.078,7.194-17.48,13.116-27.607,16.968c-5.069,1.928-10.448,3.571-15.846,4.234
                                                                            c-5.88,0.723-11.904,0.28-17.722-0.728c-11.7-2.027-23.257-5.525-34.496-9.309c-10.906-3.671-21.607-7.934-32.036-12.798
                                                                            c-11.933-5.565-23.507-11.88-34.661-18.875C168.652,245.285,164.928,251.696,168.964,254.227L168.964,254.227z"/>
                                                                    </g>
                                                                    <g>
                                                                        <path d="M293.833,295.712c-4.728,11.895-1.941,25.206,6.105,34.909c3.985,4.806,8.918,8.716,12.956,13.474
                                                                            c3.57,4.208,6.238,9.266,7.749,14.569c1.749,6.141,1.829,12.516-0.148,18.61c-1.476,4.548,5.679,6.496,7.147,1.97
                                                                            c3.734-11.509,1.183-24.296-5.122-34.421c-3.324-5.337-7.779-9.626-12.229-14.002c-4.149-4.08-8.092-8.401-9.949-14.033
                                                                            c-2.079-6.305-1.809-12.949,0.639-19.105c0.74-1.861-0.809-4.07-2.589-4.559C296.283,292.544,294.575,293.845,293.833,295.712
                                                                            L293.833,295.712z"/>
                                                                    </g>
                                                                    <g>
                                                                        <path d="M296.044,292.641c-0.459,10.784,7.053,19.846,15.62,25.461c9.18,6.016,20.413,8.874,28.707,16.246
                                                                            c4.068,3.616,7.109,7.971,7.933,13.434c0.299,1.981,2.794,3.074,4.559,2.589c2.119-0.582,2.888-2.572,2.588-4.559
                                                                            c-1.559-10.329-9.989-18.041-18.655-22.954c-9.305-5.275-20.302-8.446-27.727-16.516c-3.482-3.784-5.835-8.478-5.613-13.701
                                                                            C303.659,287.872,296.247,287.881,296.044,292.641L296.044,292.641z"/>
                                                                    </g>
                                                                </g>
                                                                <path style="fill:#FF725E;" d="M171.376,251.279c3.686-6.991,0.215-15.673-4.613-21.93c-4.828-6.257-11.103-11.642-14.003-18.993
                                                                    c-3.365-8.531-1.245-18.954,5.186-25.492c8.03-8.164,20.681-9.502,32.106-8.723c11.425,0.779,23.032,3.166,34.193,0.605
                                                                    c11.673-2.679,21.558-10.502,33.03-13.941c19.226-5.765,41.807,2.791,52.387,19.848c3.215,5.184,5.455,11.078,9.712,15.447
                                                                    c6.659,6.834,16.785,8.583,25.521,12.42c7.446,3.271,14.315,8.47,18.093,15.672c3.777,7.203,3.95,16.573-0.853,23.137
                                                                    c-8.938,12.216-30.513,10.925-37.035,24.584"/>
                                                                <g style="opacity:0.4;">
                                                                    <path d="M171.376,251.279c3.686-6.991,0.215-15.673-4.613-21.93c-4.828-6.257-11.103-11.642-14.003-18.993
                                                                        c-3.365-8.531-1.245-18.954,5.186-25.492c8.03-8.164,20.681-9.502,32.106-8.723c11.425,0.779,23.032,3.166,34.193,0.605
                                                                        c11.673-2.679,21.558-10.502,33.03-13.941c19.226-5.765,41.807,2.791,52.387,19.848c3.215,5.184,5.455,11.078,9.712,15.447
                                                                        c6.659,6.834,16.785,8.583,25.521,12.42c7.446,3.271,14.315,8.47,18.093,15.672c3.777,7.203,3.95,16.573-0.853,23.137
                                                                        c-8.938,12.216-30.513,10.925-37.035,24.584"/>
                                                                </g>
                                                                <g style="opacity:0.4;">
                                                                    <path d="M200.188,233.135c7.038,4.047,25.797,17.548,35.696,23.848c9.899,6.299,27.897,9.899,45.145,12.449
                                                                        c17.248,2.55,27.147-13.798,27.147-13.798c5.582-10.609,23.692-16.4,35.396-19.798c4.65-1.35,7.495-6.225,4.262-11.819
                                                                        c-3.232-5.595-9.438-7.238-15.811-9.778c-7.477-2.98-16.649-3.991-22.348-9.299c-3.644-3.394-4.727-10.714-7.479-14.741
                                                                        c-9.054-13.249-28.379-19.895-44.833-15.417c-9.818,2.672-18.277,8.748-28.267,10.829c-9.552,1.989-19.486,0.135-29.263-0.47
                                                                        c-9.777-0.605-20.605,0.434-27.477,6.775c-5.504,5.079-7.318,13.174-4.438,19.801c0.931,2.141,2.537,4.255,4.443,6.234
                                                                        c4.511,4.684,10.154,8.117,16.287,10.282C192.432,229.566,197.156,231.392,200.188,233.135z"/>
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <g>
                                                                            <path style="fill:#FF9A6C;" d="M169.863,250.136c20.594,12.915,42.654,23.471,65.618,31.445
                                                                                c11.496,3.992,23.299,7.59,35.259,9.9c6.284,1.214,12.735,2.008,19.143,1.608c6.061-0.379,12.048-1.8,17.781-3.764
                                                                                c12.408-4.251,23.77-11.131,33.55-19.841c3.57-3.179-1.688-8.406-5.241-5.241c-8.078,7.194-17.48,13.116-27.607,16.968
                                                                                c-5.069,1.928-10.448,3.571-15.846,4.234c-5.88,0.723-11.904,0.28-17.722-0.728c-11.701-2.027-23.257-5.525-34.496-9.309
                                                                                c-10.906-3.671-21.607-7.934-32.036-12.798c-11.933-5.565-23.507-11.88-34.661-18.875
                                                                                C169.552,241.194,165.827,247.605,169.863,250.136L169.863,250.136z"/>
                                                                        </g>
                                                                        <g>
                                                                            <path style="fill:#FF9A6C;" d="M294.733,291.621c-4.728,11.895-1.941,25.206,6.105,34.909
                                                                                c3.985,4.806,8.918,8.716,12.956,13.474c3.571,4.208,6.239,9.266,7.749,14.569c1.749,6.141,1.829,12.516-0.148,18.61
                                                                                c-1.475,4.548,5.679,6.496,7.147,1.97c3.734-11.509,1.183-24.296-5.122-34.421c-3.323-5.337-7.779-9.626-12.229-14.002
                                                                                c-4.149-4.08-8.092-8.401-9.949-14.034c-2.079-6.305-1.809-12.949,0.639-19.105c0.74-1.861-0.809-4.07-2.589-4.559
                                                                                C297.183,288.453,295.475,289.753,294.733,291.621L294.733,291.621z"/>
                                                                        </g>
                                                                        <g>
                                                                            <path style="fill:#FF9A6C;" d="M296.944,288.55c-0.459,10.784,7.052,19.846,15.62,25.461
                                                                                c9.18,6.016,20.413,8.874,28.707,16.246c4.068,3.616,7.109,7.971,7.933,13.434c0.299,1.981,2.794,3.074,4.559,2.589
                                                                                c2.119-0.582,2.888-2.572,2.589-4.559c-1.559-10.329-9.989-18.041-18.655-22.954c-9.305-5.275-20.302-8.446-27.727-16.516
                                                                                c-3.482-3.784-5.835-8.478-5.613-13.701C304.559,283.78,297.146,283.79,296.944,288.55L296.944,288.55z"/>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        
                                                                            <ellipse transform="matrix(0.735 -0.678 0.678 0.735 -116.153 279.8651)" style="fill:#FF9A6C;" cx="300.01" cy="288.55" rx="9.21" ry="9.21"/>
                                                                        <g>
                                                                            <path style="fill:#263238;" d="M309.22,288.55c-0.065,0.004-0.019-0.821-0.386-2.224c-0.363-1.376-1.291-3.395-3.363-4.951
                                                                                c-1.026-0.76-2.316-1.404-3.801-1.66c-1.475-0.247-3.137-0.195-4.716,0.41c-0.795,0.278-1.561,0.697-2.265,1.226
                                                                                c-0.712,0.518-1.358,1.161-1.891,1.906c-1.101,1.467-1.72,3.35-1.738,5.292c0.018,1.942,0.637,3.826,1.738,5.294
                                                                                c0.532,0.745,1.179,1.388,1.891,1.906c0.704,0.529,1.47,0.948,2.266,1.226c1.579,0.605,3.241,0.656,4.716,0.41
                                                                                c1.485-0.256,2.775-0.9,3.801-1.661c2.072-1.556,2.999-3.574,3.363-4.951C309.201,289.371,309.155,288.545,309.22,288.55
                                                                                c0,0,0.124,0.823-0.19,2.273c-0.311,1.42-1.21,3.535-3.336,5.194c-1.053,0.81-2.392,1.504-3.945,1.792
                                                                                c-1.542,0.278-3.289,0.241-4.959-0.383c-0.84-0.287-1.652-0.724-2.398-1.278c-0.754-0.543-1.44-1.219-2.006-2.004
                                                                                c-1.168-1.546-1.831-3.542-1.848-5.596c0.018-2.053,0.68-4.048,1.848-5.594c0.566-0.784,1.251-1.46,2.006-2.003
                                                                                c0.746-0.553,1.557-0.99,2.398-1.277c1.67-0.624,3.417-0.662,4.959-0.383c1.553,0.288,2.892,0.982,3.945,1.792
                                                                                c2.126,1.659,3.025,3.773,3.336,5.194C309.344,287.727,309.22,288.55,309.22,288.55z"/>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <path style="fill:#263238;" d="M317.364,284.922c-0.072,0.015-0.213-0.389-0.407-1.039c-0.199-0.647-0.45-1.545-0.917-2.43
                                                                            c-0.467-0.881-1.112-1.536-1.652-1.894c-0.539-0.367-0.949-0.477-0.932-0.558c0.006-0.06,0.467-0.08,1.117,0.239
                                                                            c0.647,0.309,1.416,1.002,1.927,1.967c0.507,0.962,0.708,1.917,0.817,2.593C317.421,284.482,317.433,284.908,317.364,284.922z"
                                                                            />
                                                                    </g>
                                                                    <g>
                                                                        <path style="fill:#263238;" d="M284.935,285.822c0.069,0.027-0.043,0.459-0.248,1.135c-0.199,0.677-0.496,1.603-0.595,2.643
                                                                            c-0.097,1.037,0.091,1.978,0.359,2.6c0.262,0.628,0.559,0.958,0.499,1.016c-0.037,0.047-0.448-0.202-0.829-0.851
                                                                            c-0.385-0.639-0.656-1.681-0.548-2.812c0.109-1.126,0.479-2.073,0.769-2.725C284.64,286.175,284.87,285.796,284.935,285.822z"/>
                                                                    </g>
                                                                    <g>
                                                                        <path style="fill:#263238;" d="M273.465,284.479c0.063,0.038-0.116,0.446-0.428,1.081c-0.306,0.636-0.749,1.502-1.015,2.512
                                                                            c-0.263,1.007-0.23,1.967-0.065,2.624c0.157,0.662,0.396,1.036,0.329,1.083c-0.044,0.04-0.409-0.271-0.68-0.974
                                                                            c-0.276-0.693-0.376-1.765-0.087-2.863c0.289-1.094,0.808-1.968,1.199-2.565C273.116,284.78,273.405,284.443,273.465,284.479z"
                                                                            />
                                                                    </g>
                                                                    <g>
                                                                        <path style="fill:#263238;" d="M262.74,282.292c0.063,0.038-0.116,0.446-0.428,1.081c-0.306,0.636-0.749,1.502-1.015,2.512
                                                                            c-0.263,1.007-0.23,1.967-0.065,2.624c0.157,0.662,0.396,1.036,0.329,1.083c-0.044,0.04-0.409-0.271-0.68-0.974
                                                                            c-0.276-0.693-0.376-1.765-0.087-2.863c0.289-1.094,0.808-1.968,1.199-2.565C262.391,282.593,262.68,282.256,262.74,282.292z"/>
                                                                    </g>
                                                                    <g>
                                                                        <path style="fill:#263238;" d="M251.588,279.061c0.063,0.038-0.116,0.446-0.428,1.081c-0.306,0.635-0.749,1.502-1.015,2.512
                                                                            c-0.263,1.007-0.23,1.967-0.066,2.624c0.157,0.662,0.397,1.036,0.329,1.083c-0.044,0.04-0.409-0.271-0.68-0.974
                                                                            c-0.276-0.693-0.376-1.764-0.087-2.863c0.289-1.094,0.808-1.968,1.199-2.565C251.24,279.362,251.528,279.025,251.588,279.061z"
                                                                            />
                                                                    </g>
                                                                    <g>
                                                                        <path style="fill:#263238;" d="M241.744,275.922c0.054,0.05-0.208,0.411-0.647,0.966c-0.434,0.556-1.05,1.31-1.523,2.241
                                                                            c-0.47,0.929-0.641,1.874-0.619,2.55c0.014,0.681,0.169,1.096,0.092,1.128c-0.052,0.03-0.343-0.352-0.459-1.096
                                                                            c-0.124-0.736,0.006-1.804,0.52-2.817c0.514-1.008,1.206-1.753,1.714-2.253C241.34,276.142,241.693,275.874,241.744,275.922z"/>
                                                                    </g>
                                                                    <g>
                                                                        <path style="fill:#263238;" d="M230.405,271.89c0.054,0.05-0.208,0.411-0.647,0.966c-0.434,0.556-1.049,1.31-1.523,2.241
                                                                            c-0.47,0.929-0.641,1.874-0.619,2.55c0.014,0.681,0.169,1.096,0.092,1.128c-0.052,0.03-0.343-0.352-0.459-1.096
                                                                            c-0.124-0.736,0.006-1.804,0.52-2.817c0.514-1.008,1.206-1.753,1.714-2.253C230.001,272.11,230.354,271.842,230.405,271.89z"/>
                                                                    </g>
                                                                    <g>
                                                                        <path style="fill:#263238;" d="M220.6,267.934c0.054,0.05-0.208,0.411-0.647,0.966c-0.434,0.556-1.049,1.31-1.523,2.241
                                                                            c-0.47,0.929-0.64,1.874-0.619,2.55c0.014,0.681,0.169,1.096,0.092,1.128c-0.052,0.03-0.343-0.352-0.459-1.096
                                                                            c-0.124-0.736,0.006-1.804,0.52-2.817c0.514-1.008,1.206-1.753,1.714-2.253C220.196,268.155,220.549,267.887,220.6,267.934z"/>
                                                                    </g>
                                                                    <g>
                                                                        <path style="fill:#263238;" d="M210.109,263.396c0.054,0.05-0.208,0.411-0.647,0.966c-0.434,0.556-1.049,1.31-1.523,2.241
                                                                            c-0.47,0.929-0.641,1.874-0.619,2.55c0.013,0.681,0.168,1.096,0.092,1.128c-0.052,0.03-0.343-0.352-0.459-1.096
                                                                            c-0.124-0.736,0.006-1.804,0.52-2.817c0.514-1.008,1.206-1.753,1.714-2.253C209.705,263.617,210.058,263.349,210.109,263.396z"
                                                                            />
                                                                    </g>
                                                                    <g>
                                                                        <path style="fill:#263238;" d="M198.319,257.596c0.054,0.05-0.208,0.411-0.647,0.966c-0.434,0.557-1.049,1.31-1.523,2.241
                                                                            c-0.47,0.929-0.641,1.874-0.619,2.55c0.014,0.681,0.169,1.096,0.092,1.128c-0.052,0.03-0.343-0.352-0.459-1.096
                                                                            c-0.124-0.736,0.006-1.804,0.52-2.817c0.514-1.008,1.206-1.753,1.714-2.253C197.915,257.817,198.268,257.548,198.319,257.596z"
                                                                            />
                                                                    </g>
                                                                    <g>
                                                                        <path style="fill:#263238;" d="M188.631,252.64c0.054,0.05-0.208,0.411-0.647,0.966c-0.434,0.557-1.049,1.31-1.523,2.241
                                                                            c-0.47,0.929-0.641,1.874-0.619,2.551c0.013,0.681,0.168,1.096,0.092,1.128c-0.052,0.03-0.343-0.352-0.459-1.096
                                                                            c-0.124-0.736,0.006-1.804,0.52-2.817c0.514-1.008,1.206-1.753,1.714-2.253C188.226,252.86,188.579,252.592,188.631,252.64z"/>
                                                                    </g>
                                                                    <g>
                                                                        <path style="fill:#263238;" d="M177.028,245.779c0.054,0.05-0.208,0.411-0.647,0.966c-0.434,0.556-1.049,1.31-1.523,2.241
                                                                            c-0.47,0.929-0.641,1.874-0.619,2.551c0.014,0.681,0.169,1.096,0.092,1.128c-0.052,0.03-0.343-0.352-0.459-1.096
                                                                            c-0.124-0.736,0.006-1.804,0.52-2.817c0.514-1.008,1.206-1.753,1.714-2.253C176.624,245.999,176.977,245.731,177.028,245.779z"
                                                                            />
                                                                    </g>
                                                                    <g>
                                                                        <path style="fill:#263238;" d="M325.029,281.268c-0.072,0.015-0.213-0.389-0.407-1.039c-0.199-0.647-0.45-1.545-0.917-2.43
                                                                            c-0.467-0.881-1.112-1.536-1.652-1.894c-0.539-0.367-0.949-0.477-0.932-0.558c0.006-0.06,0.467-0.08,1.117,0.239
                                                                            c0.647,0.309,1.416,1.001,1.927,1.967c0.507,0.962,0.708,1.917,0.817,2.593C325.085,280.828,325.097,281.254,325.029,281.268z"
                                                                            />
                                                                    </g>
                                                                    <g>
                                                                        <path style="fill:#263238;" d="M332.539,276.283c-0.072,0.015-0.213-0.389-0.407-1.039c-0.199-0.647-0.45-1.545-0.917-2.43
                                                                            c-0.467-0.881-1.112-1.536-1.652-1.894c-0.539-0.367-0.949-0.478-0.932-0.558c0.006-0.06,0.467-0.08,1.117,0.239
                                                                            c0.647,0.309,1.416,1.002,1.927,1.967c0.507,0.962,0.708,1.917,0.817,2.593C332.595,275.843,332.607,276.268,332.539,276.283z"
                                                                            />
                                                                    </g>
                                                                    <g>
                                                                        <path style="fill:#263238;" d="M339.689,271.325c-0.072,0.015-0.213-0.389-0.407-1.039c-0.198-0.647-0.45-1.545-0.917-2.43
                                                                            c-0.467-0.88-1.112-1.535-1.652-1.894c-0.539-0.367-0.949-0.477-0.932-0.558c0.006-0.06,0.467-0.08,1.117,0.239
                                                                            c0.647,0.309,1.416,1.002,1.927,1.967c0.507,0.962,0.707,1.917,0.817,2.593C339.745,270.885,339.757,271.311,339.689,271.325z"
                                                                            />
                                                                    </g>
                                                                    <g>
                                                                        <path style="fill:#263238;" d="M308.477,301.775c0.013,0.156-1.488,0.239-2.966,1.222c-1.498,0.954-2.182,2.292-2.319,2.217
                                                                            c-0.135-0.021,0.393-1.599,2.035-2.654C306.855,301.487,308.512,301.643,308.477,301.775z"/>
                                                                    </g>
                                                                    <g>
                                                                        <path style="fill:#263238;" d="M299.737,304.203c-0.083,0.135-1.53-0.888-3.618-1.039c-2.085-0.192-3.679,0.582-3.739,0.435
                                                                            c-0.03-0.055,0.326-0.331,1.001-0.588c0.671-0.258,1.674-0.455,2.78-0.366c1.106,0.093,2.063,0.451,2.683,0.814
                                                                            C299.469,303.823,299.775,304.153,299.737,304.203z"/>
                                                                    </g>
                                                                    <g>
                                                                        <path style="fill:#263238;" d="M314.734,307.423c0.081,0.134-1.231,0.936-2.323,2.421c-1.114,1.47-1.51,2.955-1.662,2.915
                                                                            c-0.132-0.006,0.053-1.648,1.244-3.227C313.169,307.942,314.691,307.297,314.734,307.423z"/>
                                                                    </g>
                                                                    <g>
                                                                        <path style="fill:#263238;" d="M323.077,311.609c0.092,0.129-1.232,1.053-2.238,2.702c-0.912,1.446-1.216,2.867-1.375,3.144
                                                                            l-0.094-0.019c0.026-0.04,0.047-0.056,0.063-0.052c0.016,0.004,0.026,0.028,0.03,0.076l0.035,0.452l-0.129-0.47
                                                                            c-0.082-0.301,0.055-1.858,1.028-3.406C321.48,312.27,323.029,311.486,323.077,311.609z"/>
                                                                    </g>
                                                                    <g>
                                                                        <path style="fill:#263238;" d="M332.544,316.291c0.097,0.123-1.162,1.143-2.214,2.791c-1.072,1.637-1.484,3.203-1.636,3.165
                                                                            c-0.132-0.01,0.068-1.714,1.199-3.448C331.008,317.056,332.48,316.175,332.544,316.291z"/>
                                                                    </g>
                                                                    <g>
                                                                        <path style="fill:#263238;" d="M341.708,321.84c0.085,0.126-1.086,1.032-2.334,2.341c-1.257,1.302-2.113,2.511-2.242,2.431
                                                                            c-0.119-0.066,0.564-1.44,1.866-2.791C340.293,322.464,341.638,321.724,341.708,321.84z"/>
                                                                    </g>
                                                                    <g>
                                                                        <path style="fill:#263238;" d="M349.347,328.636c0.051,0.147-1.344,0.673-2.751,1.797c-1.42,1.107-2.256,2.342-2.387,2.258
                                                                            c-0.121-0.054,0.558-1.488,2.065-2.667C347.771,328.832,349.323,328.505,349.347,328.636z"/>
                                                                    </g>
                                                                    <g>
                                                                        <path style="fill:#263238;" d="M355.339,338.777c-0.014,0.154-1.633,0.061-3.573,0.406c-1.944,0.328-3.435,0.961-3.501,0.821
                                                                            c-0.068-0.114,1.382-0.989,3.412-1.335C353.705,338.312,355.365,338.647,355.339,338.777z"/>
                                                                    </g>
                                                                    <g>
                                                                        <path style="fill:#263238;" d="M300.421,311.829c-0.048,0.142-1.519-0.346-3.339,0.042c-1.812,0.351-3.156,1.126-3.235,0.982
                                                                            c-0.077-0.095,1.194-1.112,3.138-1.494c0.964-0.186,1.874-0.13,2.495,0.033C300.106,311.553,300.445,311.771,300.421,311.829z"
                                                                            />
                                                                    </g>
                                                                    <g>
                                                                        <path style="fill:#263238;" d="M303.532,318.677c0.014,0.156-1.437,0.301-2.968,1.138c-1.544,0.814-2.467,1.943-2.589,1.845
                                                                            c-0.119-0.059,0.678-1.421,2.342-2.304C301.973,318.458,303.549,318.545,303.532,318.677z"/>
                                                                    </g>
                                                                    <g>
                                                                        <path style="fill:#263238;" d="M311,326.396c0.071,0.138-1.392,0.94-2.87,2.326c-1.491,1.373-2.397,2.773-2.53,2.692
                                                                            c-0.12-0.055,0.617-1.636,2.175-3.074C309.322,326.892,310.953,326.272,311,326.396z"/>
                                                                    </g>
                                                                    <g>
                                                                        <path style="fill:#263238;" d="M319.864,336.937c0.03,0.154-1.431,0.453-2.92,1.444c-1.504,0.969-2.362,2.189-2.491,2.1
                                                                            c-0.122-0.051,0.592-1.49,2.206-2.536C318.262,336.885,319.866,336.805,319.864,336.937z"/>
                                                                    </g>
                                                                    <g>
                                                                        <path style="fill:#263238;" d="M326.671,347.511c0.014,0.156-1.6,0.319-3.379,1.131c-1.79,0.792-2.983,1.89-3.09,1.776
                                                                            c-0.105-0.079,0.983-1.409,2.877-2.251C324.965,347.31,326.682,347.38,326.671,347.511z"/>
                                                                    </g>
                                                                    <g>
                                                                        <path style="fill:#263238;" d="M329.826,363.001c-0.059,0.145-1.496-0.417-3.353-0.469c-1.857-0.076-3.328,0.386-3.378,0.237
                                                                            c-0.063-0.116,1.417-0.834,3.395-0.758C328.469,362.071,329.897,362.889,329.826,363.001z"/>
                                                                    </g>
                                                                    <g>
                                                                        <path style="fill:#263238;" d="M304.918,281.748c0.036,0.003,0.038,0.262,0.011,0.731c-0.019,0.469-0.111,1.145-0.282,1.968
                                                                            c-0.334,1.646-1.105,3.879-2.475,6.066c-1.377,2.183-3.056,3.847-4.394,4.862c-0.668,0.51-1.236,0.886-1.651,1.107
                                                                            c-0.411,0.228-0.645,0.338-0.664,0.307c-0.047-0.076,0.828-0.625,2.082-1.699c1.254-1.069,2.843-2.727,4.185-4.853
                                                                            c1.334-2.131,2.138-4.281,2.557-5.875C304.714,282.766,304.828,281.739,304.918,281.748z"/>
                                                                    </g>
                                                                </g>
                                                                <g style="opacity:0.3;">
                                                                    <path d="M302.544,275.341c-10.147,4.775-22.525,5.025-33.15,1.103c-10.625-3.922-19.718-10.318-29.072-16.178
                                                                        c-15.608-9.778-32.313-18.248-49.804-25.253l-6.479,1.109c10.667,6.099,19.175,14.561,27.854,22.681
                                                                        c11.354,10.621,23.492,20.997,38.378,27.598c14.886,6.601,33.073,8.998,48.422,3.243c8.605-3.227,15.842-8.815,21.458-15.309
                                                                        c5.616-6.494,9.697-14.59,13.109-22.141C319.064,255.742,314.632,269.653,302.544,275.341z"/>
                                                                </g>
                                                                <g>
                                                                    <path style="fill:#FF725E;" d="M176.51,232.629c12.559,5.657,24.672,12.303,36.191,19.857
                                                                        c10.573,6.934,20.654,14.635,31.579,20.999c10.926,6.364,22.897,11.416,35.501,12.426c12.604,1.01,25.941-2.424,35.087-11.155
                                                                        c3.59-3.427,5.25-9.513,9.046-13.313c6.989-6.998,17.865-9.849,19.435-11.316"/>
                                                                    <g>
                                                                        <path style="fill:#263238;" d="M343.349,250.126c0,0-0.124,0.114-0.391,0.317c-0.284,0.172-0.715,0.415-1.301,0.69
                                                                            c-1.2,0.537-2.933,1.312-5.156,2.306c-2.219,1.031-4.919,2.358-7.796,4.306c-1.424,0.986-2.923,2.095-4.317,3.48
                                                                            c-1.442,1.33-2.608,3.068-3.703,4.954c-1.103,1.886-2.115,3.956-3.443,5.972c-0.665,1.003-1.424,1.994-2.347,2.859
                                                                            c-0.926,0.842-1.872,1.696-2.912,2.473c-4.108,3.165-9.171,5.671-14.809,7.147c-5.63,1.497-11.813,2.045-18.126,1.463
                                                                            c-6.315-0.572-12.729-2.206-18.986-4.622c-12.56-4.86-23.214-12.134-32.74-18.696c-4.768-3.304-9.271-6.478-13.563-9.329
                                                                            c-4.287-2.86-8.369-5.388-12.138-7.624c-7.549-4.455-13.865-7.697-18.258-9.872c-2.192-1.058-3.901-1.884-5.084-2.455
                                                                            c-0.567-0.271-1.007-0.481-1.325-0.633c-0.297-0.145-0.444-0.232-0.444-0.232s0.162,0.054,0.466,0.184
                                                                            c0.323,0.141,0.771,0.335,1.347,0.586c1.181,0.523,2.913,1.315,5.129,2.368c4.423,2.121,10.772,5.316,18.356,9.737
                                                                            c3.786,2.219,7.886,4.732,12.19,7.582c4.309,2.84,8.825,6.003,13.597,9.294c9.537,6.539,20.169,13.774,32.655,18.605
                                                                            c6.22,2.402,12.585,4.026,18.845,4.6c6.254,0.583,12.379,0.051,17.956-1.419c5.586-1.449,10.599-3.913,14.67-7.026
                                                                            c2.038-1.559,3.923-3.194,5.187-5.212c1.317-1.978,2.339-4.042,3.459-5.935c1.111-1.891,2.312-3.66,3.791-5.007
                                                                            c1.421-1.394,2.941-2.501,4.384-3.484c2.914-1.939,5.637-3.244,7.875-4.249c2.242-1.002,4.018-1.694,5.196-2.217
                                                                            c0.591-0.258,1.026-0.484,1.317-0.64C343.2,250.213,343.349,250.126,343.349,250.126z"/>
                                                                    </g>
                                                                </g>
                                                                <g style="opacity:0.4;">
                                                                    <path d="M176.51,232.629c12.559,5.657,24.672,12.303,36.191,19.857c10.573,6.934,20.654,14.635,31.579,20.999
                                                                        c10.926,6.364,22.897,11.416,35.501,12.426c12.604,1.01,25.941-2.424,35.087-11.155c3.59-3.427,5.25-9.513,9.046-13.313
                                                                        c6.989-6.998,17.865-9.849,19.435-11.316"/>
                                                                </g>
                                                                <g>
                                                                    <path style="fill:#263238;" d="M193.737,423.073c-0.007,0.017-0.234-0.068-0.661-0.244c-0.472-0.202-1.089-0.466-1.856-0.795
                                                                        c-0.807-0.343-1.787-0.781-2.896-1.347c-1.113-0.559-2.402-1.156-3.764-1.935c-1.379-0.748-2.883-1.578-4.447-2.559
                                                                        c-1.595-0.93-3.222-2.044-4.95-3.192c-3.404-2.371-7.029-5.153-10.612-8.333c-3.562-3.207-6.732-6.498-9.47-9.616
                                                                        c-1.335-1.589-2.624-3.081-3.726-4.562c-1.15-1.444-2.143-2.846-3.041-4.133c-0.927-1.266-1.664-2.48-2.344-3.523
                                                                        c-0.687-1.039-1.232-1.963-1.662-2.727c-0.412-0.725-0.743-1.308-0.997-1.755c-0.223-0.404-0.332-0.62-0.317-0.629
                                                                        c0.016-0.009,0.156,0.19,0.407,0.576c0.275,0.433,0.633,0.999,1.08,1.702c0.456,0.746,1.025,1.653,1.733,2.674
                                                                        c0.701,1.025,1.458,2.221,2.401,3.469c0.914,1.268,1.921,2.653,3.08,4.079c1.113,1.464,2.409,2.939,3.747,4.513
                                                                        c2.745,3.087,5.911,6.352,9.456,9.543c3.567,3.164,7.164,5.944,10.538,8.327c1.713,1.154,3.324,2.277,4.903,3.219
                                                                        c1.547,0.993,3.036,1.838,4.398,2.604c1.346,0.797,2.619,1.415,3.716,1.998c1.094,0.59,2.059,1.053,2.851,1.424
                                                                        c0.749,0.365,1.351,0.658,1.813,0.882C193.531,422.94,193.744,423.057,193.737,423.073z"/>
                                                                </g>
                                                                <g>
                                                                    <path style="fill:#263238;" d="M242.649,259.355c-0.016,0.008-0.159-0.227-0.417-0.683c-0.276-0.502-0.644-1.17-1.105-2.008
                                                                        c-0.933-1.758-2.248-4.32-3.819-7.512c-3.138-6.387-7.282-15.302-11.595-25.266c-4.288-9.978-7.91-19.126-10.208-25.865
                                                                        c-0.55-1.693-1.079-3.214-1.481-4.571c-0.39-1.36-0.745-2.525-0.994-3.49c-0.213-0.933-0.382-1.678-0.51-2.237
                                                                        c-0.111-0.512-0.16-0.783-0.143-0.786c0.018-0.004,0.102,0.259,0.245,0.763c0.151,0.551,0.351,1.286,0.603,2.206
                                                                        c0.301,0.965,0.661,2.122,1.076,3.456c0.427,1.344,0.98,2.855,1.55,4.537c2.383,6.696,6.054,15.811,10.339,25.781
                                                                        c4.31,9.956,8.398,18.89,11.448,25.312c1.527,3.21,2.791,5.795,3.668,7.58c0.425,0.856,0.764,1.539,1.018,2.051
                                                                        C242.552,259.095,242.664,259.347,242.649,259.355z"/>
                                                                </g>
                                                                <g>
                                                                    <path style="fill:#263238;" d="M255.378,231.487c-0.018,0.002-0.056-0.163-0.111-0.479c-0.059-0.377-0.131-0.835-0.218-1.387
                                                                        c-0.18-1.206-0.412-2.955-0.675-5.118c-0.527-4.327-1.148-10.32-1.644-16.954c-0.493-6.636-0.768-12.655-0.888-17.013
                                                                        c-0.061-2.179-0.091-3.943-0.091-5.162c0.004-0.559,0.007-1.023,0.01-1.404c0.008-0.321,0.021-0.49,0.039-0.49
                                                                        s0.04,0.167,0.066,0.488c0.024,0.38,0.053,0.843,0.087,1.401c0.065,1.298,0.151,3.039,0.257,5.153
                                                                        c0.214,4.351,0.546,10.359,1.039,16.988c0.495,6.627,1.058,12.617,1.491,16.952c0.21,2.107,0.382,3.841,0.51,5.135
                                                                        c0.048,0.557,0.088,1.019,0.121,1.399C255.393,231.315,255.396,231.485,255.378,231.487z"/>
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <g>
                                                                            <g>
                                                                                <g>
                                                                                    <g>
                                                                                        
                                                                                            <ellipse transform="matrix(0.1269 -0.9919 0.9919 0.1269 -1.6753 485.767)" style="fill:#FF725E;" cx="275.11" cy="243.835" rx="24.41" ry="33.983"/>
                                                                                    </g>
                                                                                    <g style="opacity:0.2;">
                                                                                        
                                                                                            <ellipse transform="matrix(0.1269 -0.9919 0.9919 0.1269 -1.6753 485.767)" cx="275.11" cy="243.835" rx="24.41" ry="33.983"/>
                                                                                    </g>
                                                                                    <g>
                                                                                        
                                                                                            <ellipse transform="matrix(0.1269 -0.9919 0.9919 0.1269 4.7322 481.4338)" style="fill:#FF725E;" cx="275.853" cy="238.029" rx="24.41" ry="33.983"/>
                                                                                    </g>
                                                                                    <g style="opacity:0.1;">
                                                                                        <path style="fill:#FFFFFF;" d="M290.535,219.315c-0.622,0.969-1.066,3.279-0.936,4.558c0.472,4.65,3.186,8.883,7.086,12.022
                                                                                            c3.776,3.039,8.192,5.03,12.892,6.279c1.169-9.881-6.059-19.407-17.445-24.633
                                                                                            C291.519,218.049,290.977,218.626,290.535,219.315z"/>
                                                                                    </g>
                                                                                    <g>
                                                                                        <path style="fill:#FF725E;" d="M274.192,255.97c-14.308-1.831-24.859-11.496-23.568-21.59
                                                                                            c1.292-10.093,13.937-16.791,28.245-14.96c14.308,1.831,24.859,11.497,23.568,21.59
                                                                                            C301.145,251.104,288.5,257.801,274.192,255.97z"/>
                                                                                    </g>
                                                                                    <g style="opacity:0.2;">
                                                                                        <path d="M274.192,255.97c-14.308-1.831-24.859-11.496-23.568-21.59c1.292-10.093,13.937-16.791,28.245-14.96
                                                                                            c14.308,1.831,24.859,11.497,23.568,21.59C301.145,251.104,288.5,257.801,274.192,255.97z"/>
                                                                                    </g>
                                                                                    <g>
                                                                                        <path style="fill:#FF725E;" d="M273.454,256.774c-13.963-1.787-24.267-11.16-23.016-20.936
                                                                                            c1.251-9.775,13.583-16.251,27.546-14.464c13.963,1.787,24.267,11.159,23.016,20.934
                                                                                            C299.749,252.085,287.417,258.561,273.454,256.774z"/>
                                                                                    </g>
                                                                                    <g style="opacity:0.2;">
                                                                                        <path style="fill:#FFFFFF;" d="M273.439,256.889c-13.963-1.787-24.267-11.16-23.016-20.936
                                                                                            c1.251-9.775,13.583-16.251,27.546-14.464c13.963,1.787,24.267,11.159,23.016,20.934
                                                                                            C299.735,252.2,287.402,258.676,273.439,256.889z"/>
                                                                                    </g>
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <g>
                                                                                <path style="fill:#FF725E;" d="M277.599,241.178l6.705,0.858c0,0.008-0.002,0.015-0.003,0.023
                                                                                    c-0.238,0.791-0.656,1.589-1.246,2.356c-0.605,0.626-1.201,1.024-1.201,1.024l0.199,0.088l2.322,1.027l0.534,0.236
                                                                                    l1.361-0.669l-0.208-0.432c0.864-0.924,1.588-2.01,1.834-3.193l3.688,0.472l1.027-0.679l-0.925-0.118l0.14-1.094l-3.754-0.48
                                                                                    c-0.038-3.662-2.776-5.747-6.164-6.181c-4.617-0.591-6.165,2.001-7.389,4.447l-6.644-0.85c0.457-1.723,1.642-3.33,3.115-4.29
                                                                                    l-3.222-1.467c-1.648,1.008-2.992,3.063-3.481,5.298l-2.784-0.356l0.093-0.903l-0.996,0.788l-0.242,1.891l3.721,0.476
                                                                                    c0.068,3.689,2.77,5.793,6.158,6.227C274.855,246.266,276.375,243.624,277.599,241.178z M278.539,239.376
                                                                                    c0.736-1.266,1.594-2.164,3.189-1.96c1.461,0.187,2.569,1.032,2.725,2.717L278.539,239.376z M284.31,242.037L284.31,242.037
                                                                                    L284.31,242.037C284.31,242.037,284.31,242.037,284.31,242.037z M267.7,239.911l5.88,0.752
                                                                                    c-0.742,1.312-1.636,2.229-3.263,2.021C268.888,242.502,267.85,241.642,267.7,239.911z"/>
                                                                            </g>
                                                                        </g>
                                                                        <g style="opacity:0.3;">
                                                                            <g>
                                                                                <path d="M277.599,241.178l6.705,0.858c0,0.008-0.002,0.015-0.003,0.023c-0.238,0.791-0.656,1.589-1.246,2.356
                                                                                    c-0.605,0.626-1.201,1.024-1.201,1.024l0.199,0.088l2.322,1.027l0.534,0.236l1.361-0.669l-0.208-0.432
                                                                                    c0.864-0.924,1.588-2.01,1.834-3.193l3.688,0.472l1.027-0.679l-0.925-0.118l0.14-1.094l-3.754-0.48
                                                                                    c-0.038-3.662-2.776-5.747-6.164-6.181c-4.617-0.591-6.165,2.001-7.389,4.447l-6.644-0.85c0.457-1.723,1.642-3.33,3.115-4.29
                                                                                    l-3.222-1.467c-1.648,1.008-2.992,3.063-3.481,5.298l-2.784-0.356l0.093-0.903l-0.996,0.788l-0.242,1.891l3.721,0.476
                                                                                    c0.068,3.689,2.77,5.793,6.158,6.227C274.855,246.266,276.375,243.624,277.599,241.178z M278.539,239.376
                                                                                    c0.736-1.266,1.594-2.164,3.189-1.96c1.461,0.187,2.569,1.032,2.725,2.717L278.539,239.376z M284.31,242.037L284.31,242.037
                                                                                    L284.31,242.037C284.31,242.037,284.31,242.037,284.31,242.037z M267.7,239.911l5.88,0.752
                                                                                    c-0.742,1.312-1.636,2.229-3.263,2.021C268.888,242.502,267.85,241.642,267.7,239.911z"/>
                                                                            </g>
                                                                        </g>
                                                                        <g>
                                                                            <path style="fill:#FF725E;" d="M265.09,238.783l-3.721-0.476l0.242-1.892l3.687,0.472c0.49-2.236,1.834-4.291,3.481-5.299
                                                                                l3.224,1.467c-1.474,0.96-2.659,2.567-3.116,4.291l6.644,0.85c1.226-2.446,2.772-5.038,7.389-4.448
                                                                                c3.389,0.435,6.128,2.52,6.165,6.182l3.754,0.48l-0.242,1.892l-3.688-0.472c-0.351,1.69-1.303,3.327-2.624,4.424l-3.236-1.376
                                                                                c1.188-1.09,1.917-2.31,2.272-3.507l-6.71-0.859c-1.225,2.446-2.745,5.089-7.362,4.498
                                                                                C267.861,244.577,265.159,242.472,265.09,238.783z M271.329,242.019c1.628,0.208,2.521-0.709,3.264-2.021l-5.881-0.752
                                                                                C268.862,240.977,269.9,241.836,271.329,242.019z M279.552,238.71l5.913,0.757c-0.156-1.685-1.264-2.53-2.724-2.717
                                                                                C281.145,236.546,280.287,237.445,279.552,238.71z"/>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path style="fill:#FFFFFF;" d="M273.78,213.99c0.002-0.035,0.419-0.039,1.175-0.016c0.756,0.015,1.848,0.102,3.191,0.269
                                                                                c2.684,0.329,6.371,1.104,10.243,2.568c3.87,1.474,7.143,3.34,9.369,4.875c1.115,0.766,1.99,1.425,2.565,1.916
                                                                                c0.581,0.485,0.89,0.765,0.868,0.792c-0.055,0.07-1.366-0.964-3.63-2.41c-2.26-1.448-5.523-3.243-9.352-4.701
                                                                                c-3.831-1.448-7.463-2.27-10.115-2.686C275.442,214.174,273.775,214.078,273.78,213.99z"/>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path style="fill:#FFFFFF;" d="M261.344,215.939c-0.032-0.135,1.533-0.626,3.496-1.096c1.964-0.47,3.582-0.741,3.614-0.606
                                                                                c0.032,0.135-1.533,0.626-3.497,1.096C262.994,215.803,261.376,216.074,261.344,215.939z"/>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path style="fill:#FFFFFF;" d="M279.828,234.814c-0.074-0.108,1.271-0.806,3.033-0.516c1.766,0.271,2.828,1.352,2.724,1.431
                                                                                c-0.089,0.122-1.193-0.693-2.803-0.934C281.177,234.525,279.874,234.957,279.828,234.814z"/>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                                <path style="opacity:0.3;" d="M252.78,264.319c0,0,14.504-8.081,17.86-13.561c0,0,19.677-3.744,27.561-9.445
                                                                    s8.751-11.062,8.751-11.062s-3.458-8.169-4.408-7.681c-0.95,0.488-27.063,11.888-27.063,11.888l-36.094,24.625L252.78,264.319"/>
                                                                <g>
                                                                    <g>
                                                                        <g>
                                                                            <g>
                                                                                <g>
                                                                                    <g>
                                                                                        <path style="fill:#FF725E;" d="M267.668,244.352c-18.616-2.382-32.321-15.154-30.61-28.527
                                                                                            c1.711-13.373,18.191-22.281,36.807-19.899c18.617,2.382,32.321,15.154,30.61,28.527
                                                                                            C302.763,237.826,286.285,246.735,267.668,244.352z"/>
                                                                                    </g>
                                                                                    <g style="opacity:0.3;">
                                                                                        <path d="M267.668,244.352c-18.616-2.382-32.321-15.154-30.61-28.527c1.711-13.373,18.191-22.281,36.807-19.899
                                                                                            c18.617,2.382,32.321,15.154,30.61,28.527C302.763,237.826,286.285,246.735,267.668,244.352z"/>
                                                                                    </g>
                                                                                    <g>
                                                                                        
                                                                                            <ellipse transform="matrix(0.1269 -0.9919 0.9919 0.1269 24.4441 456.4379)" style="fill:#FF725E;" cx="271.509" cy="214.333" rx="24.41" ry="33.983"/>
                                                                                    </g>
                                                                                    <g style="opacity:0.1;">
                                                                                        <path style="fill:#FFFFFF;" d="M286.192,195.619c-0.622,0.969-1.066,3.279-0.936,4.558c0.472,4.65,3.186,8.883,7.086,12.022
                                                                                            c3.776,3.039,8.192,5.03,12.892,6.279c1.169-9.881-6.059-19.407-17.445-24.633
                                                                                            C287.176,194.353,286.634,194.931,286.192,195.619z"/>
                                                                                    </g>
                                                                                    <g>
                                                                                        <path style="fill:#FF725E;" d="M269.849,232.274c-14.308-1.831-24.859-11.496-23.568-21.59
                                                                                            c1.292-10.093,13.937-16.791,28.245-14.96c14.308,1.831,24.859,11.497,23.568,21.591
                                                                                            C296.802,227.408,284.157,234.105,269.849,232.274z"/>
                                                                                    </g>
                                                                                    <g style="opacity:0.2;">
                                                                                        <path d="M269.849,232.274c-14.308-1.831-24.859-11.496-23.568-21.59c1.292-10.093,13.937-16.791,28.245-14.96
                                                                                            c14.308,1.831,24.859,11.497,23.568,21.591C296.802,227.408,284.157,234.105,269.849,232.274z"/>
                                                                                    </g>
                                                                                    <g>
                                                                                        <path style="fill:#FF725E;" d="M269.111,233.079c-13.963-1.787-24.267-11.16-23.016-20.936
                                                                                            c1.251-9.775,13.583-16.251,27.546-14.464c13.963,1.787,24.267,11.159,23.016,20.934
                                                                                            C295.406,228.39,283.073,234.865,269.111,233.079z"/>
                                                                                    </g>
                                                                                    <g style="opacity:0.2;">
                                                                                        <path style="fill:#FFFFFF;" d="M269.096,233.194c-13.963-1.787-24.267-11.16-23.016-20.936
                                                                                            c1.251-9.775,13.583-16.251,27.546-14.464c13.963,1.787,24.267,11.159,23.016,20.934
                                                                                            C295.391,228.505,283.059,234.98,269.096,233.194z"/>
                                                                                    </g>
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <g>
                                                                                <path style="fill:#FF725E;" d="M273.256,217.483l6.705,0.858c0,0.008-0.002,0.015-0.003,0.023
                                                                                    c-0.238,0.792-0.656,1.589-1.246,2.356c-0.605,0.626-1.201,1.024-1.201,1.024l0.199,0.088l2.322,1.027l0.534,0.236
                                                                                    l1.362-0.669l-0.208-0.433c0.864-0.924,1.588-2.01,1.834-3.193l3.688,0.472l1.027-0.679l-0.925-0.118l0.14-1.094l-3.754-0.48
                                                                                    c-0.038-3.662-2.776-5.747-6.164-6.181c-4.617-0.591-6.164,2.001-7.389,4.447l-6.644-0.85c0.457-1.723,1.642-3.33,3.115-4.29
                                                                                    l-3.222-1.467c-1.648,1.008-2.992,3.063-3.481,5.298l-2.784-0.356l0.093-0.903l-0.996,0.788l-0.242,1.891l3.721,0.476
                                                                                    c0.068,3.689,2.77,5.793,6.158,6.227C270.511,222.57,272.031,219.928,273.256,217.483z M274.195,215.68
                                                                                    c0.736-1.266,1.594-2.164,3.188-1.96c1.461,0.187,2.569,1.032,2.725,2.717L274.195,215.68z M279.966,218.341L279.966,218.341
                                                                                    L279.966,218.341C279.966,218.341,279.966,218.341,279.966,218.341z M263.356,216.216l5.88,0.752
                                                                                    c-0.742,1.312-1.636,2.229-3.264,2.02C264.544,218.806,263.507,217.946,263.356,216.216z"/>
                                                                            </g>
                                                                        </g>
                                                                        <g style="opacity:0.3;">
                                                                            <g>
                                                                                <path d="M273.256,217.483l6.705,0.858c0,0.008-0.002,0.015-0.003,0.023c-0.238,0.792-0.656,1.589-1.246,2.356
                                                                                    c-0.605,0.626-1.201,1.024-1.201,1.024l0.199,0.088l2.322,1.027l0.534,0.236l1.362-0.669l-0.208-0.433
                                                                                    c0.864-0.924,1.588-2.01,1.834-3.193l3.688,0.472l1.027-0.679l-0.925-0.118l0.14-1.094l-3.754-0.48
                                                                                    c-0.038-3.662-2.776-5.747-6.164-6.181c-4.617-0.591-6.164,2.001-7.389,4.447l-6.644-0.85c0.457-1.723,1.642-3.33,3.115-4.29
                                                                                    l-3.222-1.467c-1.648,1.008-2.992,3.063-3.481,5.298l-2.784-0.356l0.093-0.903l-0.996,0.788l-0.242,1.891l3.721,0.476
                                                                                    c0.068,3.689,2.77,5.793,6.158,6.227C270.511,222.57,272.031,219.928,273.256,217.483z M274.195,215.68
                                                                                    c0.736-1.266,1.594-2.164,3.188-1.96c1.461,0.187,2.569,1.032,2.725,2.717L274.195,215.68z M279.966,218.341L279.966,218.341
                                                                                    L279.966,218.341C279.966,218.341,279.966,218.341,279.966,218.341z M263.356,216.216l5.88,0.752
                                                                                    c-0.742,1.312-1.636,2.229-3.264,2.02C264.544,218.806,263.507,217.946,263.356,216.216z"/>
                                                                            </g>
                                                                        </g>
                                                                        <g>
                                                                            <path style="fill:#FF725E;" d="M260.747,215.087l-3.72-0.476l0.242-1.892l3.687,0.472c0.49-2.236,1.834-4.291,3.481-5.299
                                                                                l3.224,1.467c-1.474,0.961-2.659,2.567-3.116,4.291l6.644,0.85c1.226-2.446,2.772-5.038,7.39-4.448
                                                                                c3.389,0.434,6.128,2.52,6.165,6.182l3.754,0.48l-0.242,1.892l-3.688-0.472c-0.351,1.69-1.303,3.327-2.624,4.424l-3.236-1.376
                                                                                c1.188-1.09,1.917-2.31,2.272-3.507l-6.71-0.859c-1.225,2.446-2.745,5.089-7.362,4.498
                                                                                C263.518,220.882,260.816,218.777,260.747,215.087z M266.985,218.324c1.628,0.208,2.521-0.709,3.264-2.021l-5.881-0.752
                                                                                C264.519,217.281,265.556,218.141,266.985,218.324z M275.209,215.015l5.913,0.757c-0.155-1.685-1.264-2.53-2.724-2.717
                                                                                C276.802,212.851,275.944,213.749,275.209,215.015z"/>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path style="fill:#FFFFFF;" d="M269.437,190.294c0.002-0.035,0.419-0.039,1.175-0.016c0.756,0.014,1.848,0.102,3.191,0.269
                                                                                c2.684,0.328,6.371,1.104,10.243,2.568c3.87,1.474,7.143,3.34,9.369,4.875c1.115,0.766,1.99,1.425,2.566,1.916
                                                                                c0.581,0.484,0.89,0.765,0.868,0.792c-0.055,0.07-1.366-0.964-3.63-2.41c-2.26-1.448-5.523-3.243-9.352-4.701
                                                                                c-3.831-1.448-7.463-2.27-10.115-2.686C271.099,190.478,269.432,190.383,269.437,190.294z"/>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path style="fill:#FFFFFF;" d="M257,192.243c-0.032-0.135,1.533-0.626,3.496-1.096c1.964-0.47,3.582-0.741,3.614-0.606
                                                                                c0.032,0.135-1.533,0.626-3.497,1.096C258.651,192.107,257.033,192.379,257,192.243z"/>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path style="fill:#FFFFFF;" d="M275.484,211.118c-0.074-0.108,1.271-0.806,3.033-0.516c1.766,0.271,2.828,1.352,2.724,1.432
                                                                                c-0.089,0.122-1.193-0.693-2.803-0.934C276.834,210.83,275.531,211.262,275.484,211.118z"/>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                                <path style="opacity:0.3;" d="M283.143,192.029c0,0-2.053,9.344-3.035,12.837c0,0,6.379,10.994,4.344,22.479
                                                                    c-2.035,11.485-22.287,34.685-28.666,37.289c-7.826-1.18-14.198-3.315-18.872-6.566c0.779-0.026,35.547-55.585,35.228-55.993
                                                                    c-0.319-0.408,5.169-11.665,5.169-11.665L283.143,192.029z"/>
                                                                <g>
                                                                    <g>
                                                                        <g>
                                                                            <g>
                                                                                <g>
                                                                                    <g>
                                                                                        <g>
                                                                                            <path style="opacity:0.3;" d="M261.008,162.711c0,0,14.54,1.934,18.593,16.265c4.052,14.33-1.272,29.757-2.191,29.754
                                                                                                c-0.92-0.003-17.411-14.774-17.479-15.355C259.862,192.794,261.008,162.711,261.008,162.711z"/>
                                                                                            <g>
                                                                                                <path style="fill:#FF725E;" d="M278.075,198.889c-4.348,16.773-21.471,26.846-38.244,22.497
                                                                                                    c-16.774-4.349-26.846-21.471-22.497-38.244c4.349-16.774,21.47-26.846,38.244-22.497
                                                                                                    C272.351,164.993,282.423,182.115,278.075,198.889z"/>
                                                                                            </g>
                                                                                            <g style="opacity:0.1;">
                                                                                                <path style="fill:#FFFFFF;" d="M255.578,160.645c-16.774-4.349-33.896,5.723-38.244,22.497c0,0,21.094,6.487,28.456-0.776
                                                                                                    C253.151,175.102,255.578,160.645,255.578,160.645z"/>
                                                                                            </g>
                                                                                            <g>
                                                                                                <path style="fill:#FF725E;" d="M270.436,196.395c-3.306,12.752-16.322,20.408-29.073,17.103
                                                                                                    c-12.752-3.306-20.408-16.322-17.102-29.074c3.306-12.752,16.322-20.409,29.074-17.103
                                                                                                    C266.085,170.627,273.742,183.643,270.436,196.395z"/>
                                                                                            </g>
                                                                                            <g style="opacity:0.2;">
                                                                                                <path d="M270.436,196.395c-3.306,12.752-16.322,20.408-29.073,17.103c-12.752-3.306-20.408-16.322-17.102-29.074
                                                                                                    c3.306-12.752,16.322-20.409,29.074-17.103C266.085,170.627,273.742,183.643,270.436,196.395z"/>
                                                                                            </g>
                                                                                            <g>
                                                                                                <path style="fill:#FF725E;" d="M270.838,197.526c-3.261,12.58-16.103,20.134-28.683,16.873
                                                                                                    c-12.581-3.262-20.134-16.103-16.873-28.683c3.261-12.58,16.103-20.134,28.683-16.873
                                                                                                    C266.546,172.105,274.1,184.946,270.838,197.526z"/>
                                                                                            </g>
                                                                                            <g style="opacity:0.2;">
                                                                                                <path style="fill:#FFFFFF;" d="M270.838,197.526c-3.261,12.58-16.103,20.134-28.683,16.873
                                                                                                    c-12.581-3.262-20.134-16.103-16.873-28.683c3.261-12.58,16.103-20.134,28.683-16.873
                                                                                                    C266.546,172.105,274.1,184.946,270.838,197.526z"/>
                                                                                            </g>
                                                                                        </g>
                                                                                    </g>
                                                                                </g>
                                                                            </g>
                                                                            <g>
                                                                                <g>
                                                                                    <g>
                                                                                        <path style="fill:#FF725E;" d="M249.48,189.882l1.511-5.827c0.01,0.002,0.019,0.005,0.028,0.007
                                                                                            c0.982,0.38,1.96,0.921,2.888,1.61c0.75,0.673,1.214,1.291,1.214,1.291l0.124-0.16l1.443-1.865l0.332-0.429l-0.756-1.36
                                                                                            l-0.558,0.095c-1.108-0.968-2.43-1.844-3.905-2.313l0.831-3.205l-0.79-1.063l-0.208,0.804l-1.37-0.355l-0.846,3.263
                                                                                            c-4.617-0.735-7.419,1.281-8.183,4.226c-1.04,4.013,2.126,5.943,5.129,7.554l-1.497,5.775
                                                                                            c-2.142-0.771-4.09-2.17-5.206-3.691l-2.055,2.579c1.164,1.689,3.668,3.324,6.452,4.231l-0.627,2.42l-1.132-0.273
                                                                                            l0.929,1.057l2.368,0.614l0.838-3.234c4.653,0.713,7.477-1.266,8.24-4.211C255.714,193.408,252.482,191.492,249.48,189.882z
                                                                                            M247.269,188.661c-1.548-0.925-2.624-1.882-2.265-3.268c0.329-1.27,1.465-2.085,3.598-1.871L247.269,188.661z
                                                                                            M250.992,184.049L250.992,184.049L250.992,184.049C250.992,184.049,250.992,184.049,250.992,184.049z M247.249,198.486
                                                                                            l1.325-5.111c1.605,0.94,2.703,1.933,2.336,3.348C250.589,197.965,249.439,198.714,247.249,198.486z"/>
                                                                                    </g>
                                                                                </g>
                                                                                <g style="opacity:0.3;">
                                                                                    <g>
                                                                                        <path d="M249.48,189.882l1.511-5.827c0.01,0.002,0.019,0.005,0.028,0.007c0.982,0.38,1.96,0.921,2.888,1.61
                                                                                            c0.75,0.673,1.214,1.291,1.214,1.291l0.124-0.16l1.443-1.865l0.332-0.429l-0.756-1.36l-0.558,0.095
                                                                                            c-1.108-0.968-2.43-1.844-3.905-2.313l0.831-3.205l-0.79-1.063l-0.208,0.804l-1.37-0.355l-0.846,3.263
                                                                                            c-4.617-0.735-7.419,1.281-8.183,4.226c-1.04,4.013,2.126,5.943,5.129,7.554l-1.497,5.775
                                                                                            c-2.142-0.771-4.09-2.17-5.206-3.691l-2.055,2.579c1.164,1.689,3.668,3.324,6.452,4.231l-0.627,2.42l-1.132-0.273
                                                                                            l0.929,1.057l2.368,0.614l0.838-3.234c4.653,0.713,7.477-1.266,8.24-4.211C255.714,193.408,252.482,191.492,249.48,189.882z
                                                                                            M247.269,188.661c-1.548-0.925-2.624-1.882-2.265-3.268c0.329-1.27,1.465-2.085,3.598-1.871L247.269,188.661z
                                                                                            M250.992,184.049L250.992,184.049L250.992,184.049C250.992,184.049,250.992,184.049,250.992,184.049z M247.249,198.486
                                                                                            l1.325-5.111c1.605,0.94,2.703,1.933,2.336,3.348C250.589,197.965,249.439,198.714,247.249,198.486z"/>
                                                                                    </g>
                                                                                </g>
                                                                                <g>
                                                                                    <path style="fill:#FF725E;" d="M245.659,200.587l-0.838,3.235l-2.368-0.614l0.831-3.205
                                                                                        c-2.785-0.907-5.289-2.542-6.453-4.232l2.055-2.579c1.116,1.522,3.064,2.921,5.207,3.692l1.497-5.776
                                                                                        c-3.003-1.61-6.17-3.541-5.129-7.555c0.764-2.946,3.567-4.962,8.184-4.227l0.846-3.263l2.368,0.614l-0.831,3.205
                                                                                        c2.107,0.67,4.108,1.866,5.406,3.281l-1.94,2.609c-1.298-1.292-2.788-2.202-4.274-2.772l-1.512,5.833
                                                                                        c3.003,1.611,6.236,3.527,5.195,7.541C253.138,199.322,250.313,201.301,245.659,200.587z M246.495,187.614l1.333-5.14
                                                                                        c-2.132-0.214-3.268,0.601-3.598,1.872C243.871,185.732,244.948,186.689,246.495,187.614z M250.137,195.678
                                                                                        c0.367-1.415-0.732-2.408-2.337-3.349l-1.325,5.111C248.666,197.669,249.815,196.919,250.137,195.678z"/>
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                        <g>
                                                                            <g>
                                                                                <path style="fill:#263238;" d="M241.678,214.515c0.001-0.004,0.066,0.006,0.193,0.028c0.137,0.025,0.322,0.06,0.56,0.104
                                                                                    c0.249,0.048,0.552,0.107,0.907,0.176c0.359,0.068,0.769,0.168,1.244,0.195c0.473,0.046,0.997,0.096,1.57,0.152
                                                                                    c0.286,0.04,0.588,0.031,0.9,0.031c0.313-0.001,0.638-0.001,0.974-0.002c0.336-0.011,0.686,0.022,1.043-0.024
                                                                                    c0.358-0.036,0.726-0.073,1.106-0.111c0.378-0.046,0.772-0.059,1.168-0.134c0.395-0.079,0.8-0.16,1.215-0.242
                                                                                    c1.666-0.312,3.422-0.938,5.244-1.729c0.44-0.231,0.888-0.467,1.343-0.706c0.226-0.122,0.459-0.235,0.685-0.366
                                                                                    c0.219-0.143,0.439-0.287,0.66-0.432c0.439-0.296,0.903-0.57,1.34-0.895c0.426-0.34,0.857-0.685,1.293-1.034l0.329-0.262
                                                                                    c0.106-0.092,0.203-0.195,0.306-0.292c0.203-0.197,0.407-0.395,0.613-0.594c0.205-0.199,0.412-0.4,0.62-0.601
                                                                                    c0.214-0.195,0.383-0.436,0.578-0.653c0.373-0.45,0.772-0.888,1.135-1.361c0.34-0.491,0.683-0.986,1.028-1.486
                                                                                    c1.297-2.057,2.335-4.373,3.015-6.864c0.616-2.508,0.835-5.038,0.7-7.467c-0.059-0.605-0.118-1.205-0.177-1.799
                                                                                    c-0.087-0.59-0.224-1.167-0.331-1.742c-0.065-0.285-0.096-0.577-0.188-0.852c-0.084-0.277-0.167-0.553-0.25-0.827
                                                                                    c-0.083-0.274-0.165-0.546-0.247-0.817c-0.042-0.135-0.078-0.272-0.126-0.404l-0.16-0.389
                                                                                    c-0.212-0.517-0.422-1.028-0.628-1.532c-0.224-0.496-0.496-0.961-0.736-1.433c-0.123-0.234-0.246-0.467-0.367-0.698
                                                                                    c-0.134-0.224-0.282-0.436-0.421-0.653c-0.281-0.43-0.559-0.853-0.831-1.269c-1.209-1.577-2.439-2.978-3.744-4.059
                                                                                    c-0.323-0.274-0.637-0.541-0.944-0.802c-0.31-0.257-0.647-0.461-0.956-0.684c-0.313-0.217-0.617-0.429-0.913-0.634
                                                                                    c-0.29-0.213-0.611-0.355-0.9-0.527c-0.294-0.164-0.577-0.322-0.85-0.475c-0.273-0.153-0.532-0.307-0.802-0.411
                                                                                    c-0.528-0.23-1.011-0.44-1.446-0.63c-0.428-0.207-0.835-0.319-1.182-0.434c-0.344-0.113-0.637-0.208-0.878-0.287
                                                                                    c-0.229-0.077-0.408-0.137-0.539-0.181c-0.121-0.042-0.183-0.066-0.182-0.07c0.001-0.004,0.065,0.012,0.188,0.046
                                                                                    c0.133,0.039,0.314,0.092,0.546,0.159c0.244,0.073,0.54,0.162,0.887,0.266c0.35,0.108,0.761,0.214,1.193,0.415
                                                                                    c0.44,0.185,0.927,0.39,1.46,0.614c0.272,0.101,0.534,0.253,0.81,0.404c0.276,0.151,0.563,0.307,0.859,0.469
                                                                                    c0.292,0.171,0.616,0.311,0.91,0.523c0.299,0.204,0.606,0.414,0.923,0.63c0.312,0.223,0.654,0.425,0.967,0.682
                                                                                    c0.311,0.26,0.629,0.527,0.956,0.801c1.32,1.081,2.568,2.485,3.793,4.07c0.276,0.418,0.557,0.844,0.843,1.276
                                                                                    c0.141,0.217,0.291,0.432,0.427,0.657c0.123,0.232,0.248,0.467,0.373,0.702c0.244,0.475,0.52,0.944,0.747,1.443
                                                                                    c0.21,0.508,0.423,1.023,0.638,1.544l0.162,0.392c0.048,0.133,0.085,0.271,0.128,0.407c0.083,0.273,0.167,0.548,0.251,0.824
                                                                                    c0.084,0.276,0.169,0.554,0.254,0.834c0.094,0.277,0.125,0.572,0.192,0.859c0.11,0.58,0.248,1.162,0.337,1.758
                                                                                    c0.06,0.6,0.12,1.206,0.181,1.816c0.139,2.452-0.081,5.007-0.703,7.54c-0.687,2.515-1.737,4.855-3.049,6.929
                                                                                    c-0.35,0.504-0.697,1.004-1.041,1.499c-0.367,0.477-0.771,0.919-1.148,1.372c-0.198,0.219-0.368,0.461-0.585,0.658
                                                                                    c-0.21,0.203-0.419,0.405-0.627,0.605c-0.208,0.201-0.414,0.4-0.62,0.598c-0.104,0.098-0.203,0.201-0.31,0.294l-0.332,0.264
                                                                                    c-0.441,0.351-0.878,0.697-1.308,1.039c-0.441,0.326-0.91,0.602-1.354,0.899c-0.224,0.145-0.447,0.29-0.667,0.433
                                                                                    c-0.228,0.131-0.464,0.245-0.692,0.366c-0.46,0.239-0.912,0.475-1.357,0.706c-1.841,0.791-3.613,1.412-5.292,1.715
                                                                                    c-0.418,0.08-0.827,0.159-1.225,0.236c-0.399,0.072-0.795,0.083-1.176,0.126c-0.382,0.035-0.753,0.069-1.113,0.102
                                                                                    c-0.359,0.043-0.711,0.007-1.049,0.015c-0.338-0.003-0.665-0.005-0.979-0.008c-0.314-0.003-0.617,0.003-0.904-0.041
                                                                                    c-0.575-0.063-1.101-0.121-1.575-0.173c-0.476-0.034-0.886-0.141-1.245-0.217c-0.354-0.078-0.656-0.144-0.905-0.198
                                                                                    c-0.236-0.054-0.42-0.096-0.555-0.126C241.74,214.536,241.677,214.519,241.678,214.515z"/>
                                                                            </g>
                                                                        </g>
                                                                        <g>
                                                                            <g>
                                                                                <path style="fill:#FFFFFF;" d="M218.146,198.558c-0.008,0.002-0.035-0.092-0.081-0.271c-0.049-0.205-0.11-0.466-0.187-0.79
                                                                                    c-0.083-0.343-0.175-0.764-0.245-1.261c-0.075-0.495-0.185-1.056-0.232-1.686c-0.031-0.315-0.063-0.644-0.096-0.986
                                                                                    c-0.031-0.343-0.033-0.702-0.051-1.072c-0.047-0.742-0.017-1.535-0.002-2.369c0.081-1.667,0.286-3.496,0.686-5.382
                                                                                    c0.419-1.883,0.992-3.632,1.611-5.183c0.333-0.766,0.635-1.499,0.986-2.154c0.17-0.33,0.321-0.656,0.492-0.955
                                                                                    c0.172-0.298,0.338-0.583,0.497-0.857c0.304-0.553,0.638-1.018,0.911-1.437c0.27-0.422,0.528-0.768,0.746-1.045
                                                                                    c0.204-0.262,0.369-0.475,0.498-0.641c0.116-0.145,0.18-0.218,0.186-0.213c0.006,0.005-0.045,0.088-0.148,0.242
                                                                                    c-0.12,0.173-0.273,0.393-0.462,0.665c-0.206,0.285-0.453,0.637-0.711,1.064c-0.262,0.424-0.584,0.893-0.877,1.449
                                                                                    c-0.154,0.275-0.314,0.561-0.481,0.859c-0.166,0.3-0.311,0.626-0.477,0.955c-0.341,0.655-0.635,1.387-0.96,2.149
                                                                                    c-0.604,1.544-1.166,3.283-1.582,5.152c-0.397,1.872-0.608,3.687-0.7,5.342c-0.021,0.829-0.058,1.617-0.019,2.354
                                                                                    c0.014,0.368,0.011,0.725,0.037,1.067c0.028,0.341,0.055,0.668,0.081,0.982c0.036,0.627,0.135,1.187,0.197,1.682
                                                                                    c0.057,0.496,0.135,0.919,0.205,1.263c0.059,0.326,0.106,0.59,0.143,0.797C218.142,198.459,218.154,198.556,218.146,198.558z"
                                                                                    />
                                                                            </g>
                                                                        </g>
                                                                        <g>
                                                                            <g>
                                                                                <path style="fill:#FFFFFF;" d="M241.808,186.48c-0.018,0.015-0.28-0.267-0.498-0.84c-0.219-0.563-0.353-1.444-0.083-2.353
                                                                                    c0.271-0.909,0.866-1.573,1.357-1.925c0.496-0.36,0.87-0.454,0.876-0.431c0.017,0.036-0.326,0.183-0.774,0.561
                                                                                    c-0.445,0.37-0.981,1.012-1.235,1.862c-0.252,0.85-0.154,1.681,0.016,2.234C241.635,186.148,241.842,186.459,241.808,186.48z"
                                                                                    />
                                                                            </g>
                                                                        </g>
                                                                        <g>
                                                                            <g>
                                                                                <path style="fill:#FFFFFF;" d="M249.256,178.975c-0.063-0.016-0.003-0.454,0.133-0.979c0.136-0.524,0.297-0.936,0.359-0.92
                                                                                    c0.062,0.016,0.003,0.454-0.133,0.979S249.319,178.992,249.256,178.975z"/>
                                                                            </g>
                                                                        </g>
                                                                        <g>
                                                                            <g>
                                                                                <path style="fill:#FFFFFF;" d="M255.574,167.268c-0.006,0.015-0.268-0.065-0.734-0.222c-0.232-0.081-0.518-0.177-0.856-0.268
                                                                                    c-0.337-0.094-0.715-0.219-1.145-0.311c-0.427-0.105-0.895-0.218-1.404-0.304c-0.506-0.107-1.054-0.172-1.629-0.253
                                                                                    c-1.154-0.128-2.43-0.199-3.77-0.159c-1.339,0.053-2.608,0.212-3.75,0.42c-0.568,0.12-1.111,0.223-1.608,0.365
                                                                                    c-0.503,0.121-0.962,0.266-1.38,0.4c-0.423,0.122-0.791,0.273-1.12,0.39c-0.331,0.114-0.609,0.229-0.835,0.327
                                                                                    c-0.455,0.189-0.71,0.286-0.717,0.272c-0.007-0.015,0.235-0.14,0.681-0.355c0.222-0.11,0.496-0.238,0.824-0.365
                                                                                    c0.327-0.129,0.693-0.292,1.116-0.425c0.418-0.145,0.878-0.3,1.383-0.43c0.499-0.151,1.045-0.262,1.617-0.389
                                                                                    c1.15-0.221,2.431-0.389,3.783-0.442c1.352-0.041,2.641,0.038,3.804,0.179c0.579,0.087,1.131,0.16,1.64,0.276
                                                                                    c0.512,0.095,0.982,0.218,1.409,0.334c0.431,0.104,0.808,0.24,1.143,0.347c0.336,0.104,0.618,0.212,0.847,0.307
                                                                                    C255.33,167.145,255.58,167.254,255.574,167.268z"/>
                                                                            </g>
                                                                        </g>
                                                                        <g>
                                                                            <g>
                                                                                <path style="fill:#FFFFFF;" d="M243.937,220.774c-0.001,0.016-0.207,0.018-0.579,0.006c-0.373-0.007-0.912-0.05-1.574-0.131
                                                                                    c-1.324-0.159-3.143-0.535-5.056-1.244c-1.913-0.715-3.534-1.62-4.64-2.365c-0.554-0.372-0.989-0.692-1.276-0.93
                                                                                    c-0.289-0.235-0.444-0.371-0.434-0.384c0.01-0.013,0.184,0.099,0.489,0.311c0.302,0.215,0.75,0.513,1.311,0.864
                                                                                    c1.121,0.705,2.738,1.577,4.632,2.285c1.895,0.703,3.689,1.1,4.998,1.299c0.655,0.101,1.188,0.168,1.557,0.203
                                                                                    C243.733,220.729,243.938,220.758,243.937,220.774z"/>
                                                                            </g>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path style="fill:#263238;" d="M278.075,198.889c0,0,0.031-0.17,0.104-0.499c0.064-0.33,0.201-0.813,0.307-1.461
                                                                                c0.251-1.286,0.523-3.212,0.55-5.703c-0.009-1.244-0.052-2.631-0.26-4.132c-0.197-1.501-0.498-3.124-1.007-4.818
                                                                                c-0.997-3.385-2.72-7.103-5.473-10.605c-1.368-1.753-3.005-3.432-4.892-4.957c-1.887-1.524-4.021-2.908-6.396-4.002
                                                                                c-2.368-1.103-4.954-1.966-7.696-2.452c-1.367-0.269-2.776-0.401-4.204-0.484c-1.43-0.061-2.883-0.023-4.346,0.106
                                                                                c-5.842,0.55-11.852,2.846-16.806,6.907c-1.247,1.001-2.405,2.13-3.497,3.333c-1.094,1.202-2.095,2.507-2.985,3.896
                                                                                c-1.807,2.764-3.156,5.874-4.024,9.15c-0.833,3.286-1.167,6.661-0.931,9.956c0.043,0.825,0.154,1.64,0.255,2.453
                                                                                c0.138,0.807,0.268,1.614,0.461,2.404c0.37,1.582,0.833,3.132,1.437,4.613c2.357,5.959,6.495,10.887,11.335,14.206
                                                                                c1.217,0.823,2.468,1.563,3.748,2.204c1.289,0.621,2.585,1.191,3.91,1.62c2.634,0.907,5.313,1.409,7.919,1.595
                                                                                c2.608,0.198,5.146,0.024,7.535-0.391c2.391-0.417,4.637-1.089,6.685-1.957c4.108-1.725,7.42-4.137,9.935-6.611
                                                                                c1.268-1.233,2.32-2.506,3.221-3.722c0.912-1.211,1.623-2.402,2.235-3.485c1.186-2.19,1.883-4.005,2.289-5.251
                                                                                c0.222-0.618,0.336-1.106,0.441-1.426C278.02,199.053,278.075,198.889,278.075,198.889s-0.156,0.673-0.548,1.926
                                                                                c-0.392,1.252-1.077,3.076-2.254,5.28c-0.608,1.09-1.315,2.289-2.225,3.508c-0.899,1.224-1.95,2.506-3.219,3.749
                                                                                c-2.517,2.493-5.838,4.927-9.963,6.671c-2.056,0.877-4.313,1.558-6.717,1.982c-2.402,0.423-4.956,0.602-7.58,0.407
                                                                                c-2.622-0.183-5.319-0.685-7.971-1.594c-1.335-0.43-2.64-1.002-3.938-1.626c-1.29-0.644-2.55-1.387-3.776-2.215
                                                                                c-4.877-3.337-9.048-8.298-11.425-14.299c-0.609-1.491-1.076-3.053-1.45-4.646c-0.195-0.796-0.326-1.608-0.465-2.422
                                                                                c-0.102-0.819-0.213-1.641-0.257-2.472c-0.238-3.32,0.097-6.72,0.936-10.03c0.875-3.299,2.234-6.433,4.056-9.218
                                                                                c0.897-1.4,1.906-2.714,3.008-3.924c1.101-1.211,2.267-2.348,3.524-3.355c4.992-4.089,11.048-6.396,16.931-6.944
                                                                                c1.474-0.128,2.936-0.165,4.376-0.102c1.438,0.085,2.857,0.22,4.232,0.492c2.76,0.493,5.36,1.365,7.741,2.479
                                                                                c2.388,1.105,4.533,2.501,6.428,4.038c1.895,1.538,3.537,3.23,4.909,4.995c2.759,3.528,4.479,7.269,5.468,10.671
                                                                                c0.506,1.702,0.801,3.334,0.992,4.841c0.203,1.508,0.239,2.899,0.241,4.147c-0.042,2.498-0.329,4.425-0.595,5.711
                                                                                C278.266,198.225,278.075,198.889,278.075,198.889z"/>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                                <path style="opacity:0.3;" d="M231.006,204.039c0,0,10.266-14.447,24.349-14.096c14.082,0.351,22.173,10.872,22.173,10.872
                                                                    l-2.254,5.28l-38.012,8.788L231.006,204.039z"/>
                                                                <g>
                                                                    <g>
                                                                        <g>
                                                                            <g>
                                                                                <g>
                                                                                    <g>
                                                                                        
                                                                                            <ellipse transform="matrix(0.7373 -0.6756 0.6756 0.7373 -88.3318 230.4579)" style="fill:#FF725E;" cx="252.151" cy="228.804" rx="33.983" ry="24.41"/>
                                                                                    </g>
                                                                                    <g style="opacity:0.2;">
                                                                                        
                                                                                            <ellipse transform="matrix(0.7373 -0.6756 0.6756 0.7373 -88.3318 230.4579)" cx="252.151" cy="228.804" rx="33.983" ry="24.41"/>
                                                                                    </g>
                                                                                    <g>
                                                                                        
                                                                                            <ellipse transform="matrix(0.7373 -0.6756 0.6756 0.7373 -86.4549 226.6506)" style="fill:#FF725E;" cx="248.196" cy="224.488" rx="33.983" ry="24.41"/>
                                                                                    </g>
                                                                                    <g style="opacity:0.1;">
                                                                                        <path style="fill:#FFFFFF;" d="M243.383,201.193c0.338,1.101,1.815,2.931,2.876,3.658c3.856,2.642,8.841,3.302,13.756,2.349
                                                                                            c4.758-0.922,9.13-3.009,13.118-5.792c-6.791-7.272-18.732-7.901-30.074-2.579
                                                                                            C243.051,199.625,243.142,200.412,243.383,201.193z"/>
                                                                                    </g>
                                                                                    <g>
                                                                                        <path style="fill:#FF725E;" d="M260.826,237.338c-10.635,9.745-24.828,11.563-31.703,4.061
                                                                                            c-6.874-7.502-3.826-21.484,6.809-31.229c10.635-9.745,24.829-11.563,31.703-4.06
                                                                                            C274.51,213.613,271.461,227.593,260.826,237.338z"/>
                                                                                    </g>
                                                                                    <g style="opacity:0.2;">
                                                                                        <path d="M260.826,237.338c-10.635,9.745-24.828,11.563-31.703,4.061c-6.874-7.502-3.826-21.484,6.809-31.229
                                                                                            c10.635-9.745,24.829-11.563,31.703-4.06C274.51,213.613,271.461,227.593,260.826,237.338z"/>
                                                                                    </g>
                                                                                    <g>
                                                                                        <path style="fill:#FF725E;" d="M260.964,238.421c-10.379,9.51-24.189,11.328-30.847,4.062
                                                                                            c-6.658-7.266-3.642-20.865,6.737-30.374c10.379-9.51,24.188-11.329,30.846-4.063
                                                                                            C274.358,215.313,271.342,228.911,260.964,238.421z"/>
                                                                                    </g>
                                                                                    <g style="opacity:0.2;">
                                                                                        <path style="fill:#FFFFFF;" d="M261.042,238.507c-10.379,9.51-24.189,11.328-30.847,4.062
                                                                                            c-6.658-7.266-3.641-20.865,6.737-30.374c10.378-9.51,24.188-11.329,30.846-4.063
                                                                                            C274.436,215.398,271.42,228.997,261.042,238.507z"/>
                                                                                    </g>
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <g>
                                                                                <path style="fill:#FF725E;" d="M251.729,225.187l4.984-4.566c0.006,0.005,0.01,0.011,0.016,0.017
                                                                                    c0.451,0.693,0.79,1.527,0.995,2.472c0.087,0.866,0.007,1.579,0.007,1.579l0.196-0.095l2.284-1.11l0.525-0.255l0.368-1.472
                                                                                    l-0.464-0.121c-0.148-1.256-0.51-2.51-1.255-3.462l2.741-2.512l0.145-1.223l-0.688,0.63l-0.745-0.813l-2.79,2.557
                                                                                    c-2.821-2.335-6.181-1.59-8.7,0.717c-3.432,3.145-2.451,6-1.374,8.514l-4.938,4.525c-1.021-1.462-1.484-3.403-1.266-5.148
                                                                                    l-3.201,1.514c-0.294,1.91,0.408,4.263,1.799,6.079l-2.07,1.896l-0.63-0.654l-0.041,1.269l1.288,1.406l2.766-2.534
                                                                                    c2.861,2.33,6.213,1.625,8.731-0.683C253.843,230.568,252.806,227.701,251.729,225.187z M250.959,223.306
                                                                                    c-0.492-1.379-0.624-2.614,0.561-3.7c1.086-0.995,2.447-1.295,3.834-0.327L250.959,223.306z M256.717,220.617L256.717,220.617
                                                                                    L256.717,220.617C256.717,220.617,256.717,220.617,256.717,220.617z M244.371,231.93l4.37-4.005
                                                                                    c0.523,1.413,0.646,2.688-0.564,3.797C247.116,232.694,245.789,232.932,244.371,231.93z"/>
                                                                            </g>
                                                                        </g>
                                                                        <g style="opacity:0.3;">
                                                                            <g>
                                                                                <path d="M251.729,225.187l4.984-4.566c0.006,0.005,0.01,0.011,0.016,0.017c0.451,0.693,0.79,1.527,0.995,2.472
                                                                                    c0.087,0.866,0.007,1.579,0.007,1.579l0.196-0.095l2.284-1.11l0.525-0.255l0.368-1.472l-0.464-0.121
                                                                                    c-0.148-1.256-0.51-2.51-1.255-3.462l2.741-2.512l0.145-1.223l-0.688,0.63l-0.745-0.813l-2.79,2.557
                                                                                    c-2.821-2.335-6.181-1.59-8.7,0.717c-3.432,3.145-2.451,6-1.374,8.514l-4.938,4.525c-1.021-1.462-1.484-3.403-1.266-5.148
                                                                                    l-3.201,1.514c-0.294,1.91,0.408,4.263,1.799,6.079l-2.07,1.896l-0.63-0.654l-0.041,1.269l1.288,1.406l2.766-2.534
                                                                                    c2.861,2.33,6.213,1.625,8.731-0.683C253.843,230.568,252.806,227.701,251.729,225.187z M250.959,223.306
                                                                                    c-0.492-1.379-0.624-2.614,0.561-3.7c1.086-0.995,2.447-1.295,3.834-0.327L250.959,223.306z M256.717,220.617L256.717,220.617
                                                                                    L256.717,220.617C256.717,220.617,256.717,220.617,256.717,220.617z M244.371,231.93l4.37-4.005
                                                                                    c0.523,1.413,0.646,2.688-0.564,3.797C247.116,232.694,245.789,232.932,244.371,231.93z"/>
                                                                            </g>
                                                                        </g>
                                                                        <g>
                                                                            <path style="fill:#FF725E;" d="M241.824,233.194l-2.765,2.534l-1.289-1.406l2.741-2.511c-1.391-1.817-2.093-4.171-1.8-6.079
                                                                                l3.202-1.515c-0.218,1.746,0.244,3.688,1.266,5.15l4.938-4.525c-1.077-2.515-2.058-5.369,1.374-8.515
                                                                                c2.52-2.308,5.881-3.053,8.701-0.717l2.79-2.557l1.289,1.406l-2.742,2.512c1.064,1.359,1.7,3.143,1.685,4.86l-3.14,1.583
                                                                                c-0.066-1.611-0.527-2.955-1.212-3.999l-4.988,4.57c1.077,2.515,2.114,5.382-1.317,8.527
                                                                                C248.038,234.818,244.686,235.523,241.824,233.194z M248.323,230.519c1.21-1.108,1.086-2.383,0.564-3.797l-4.371,4.006
                                                                                C245.935,231.729,247.261,231.492,248.323,230.519z M251.105,222.103l4.395-4.027c-1.387-0.969-2.748-0.668-3.834,0.326
                                                                                C250.481,219.489,250.613,220.724,251.105,222.103z"/>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path style="fill:#FFFFFF;" d="M228.499,210.551c-0.025-0.024,0.241-0.345,0.746-0.908c0.499-0.568,1.271-1.346,2.265-2.263
                                                                                c1.984-1.838,4.956-4.152,8.573-6.165c3.624-2.004,7.162-3.299,9.771-4.008c1.305-0.357,2.373-0.6,3.12-0.722
                                                                                c0.745-0.131,1.159-0.186,1.165-0.152c0.018,0.087-1.618,0.42-4.184,1.216c-2.565,0.792-6.042,2.125-9.628,4.107
                                                                                c-3.579,1.991-6.551,4.234-8.581,5.99C229.713,209.401,228.564,210.613,228.499,210.551z"/>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path style="fill:#FFFFFF;" d="M221.96,221.308c-0.124-0.063,0.512-1.575,1.42-3.378c0.909-1.803,1.746-3.214,1.87-3.151
                                                                                c0.124,0.063-0.512,1.575-1.42,3.378C222.921,219.96,222.084,221.37,221.96,221.308z"/>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path style="fill:#FFFFFF;" d="M248.307,219.377c-0.131-0.013,0.205-1.491,1.564-2.649c1.347-1.174,2.858-1.287,2.851-1.156
                                                                                c0.036,0.146-1.299,0.464-2.522,1.538C248.958,218.16,248.447,219.434,248.307,219.377z"/>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                                <path style="opacity:0.3;" d="M290.34,201.909c0,0,0.176,8.644,4.821,17.446c2.459,4.66,14.43,23.572,31.066,20.482
                                                                    L290.34,201.909z"/>
                                                                <g>
                                                                    <g>
                                                                        <g>
                                                                            <g>
                                                                                <g>
                                                                                    <path style="fill:#FF725E;" d="M334.127,230.041c-0.389-6.826-4.611-16.276-11.5-25.502
                                                                                        c-6.889-9.225-14.75-15.957-21.185-18.269l-2.947-3.946l-5.932,4.43c-6.426,4.798-3,20.254,7.653,34.52
                                                                                        c10.653,14.267,24.499,21.941,30.925,17.143l5.932-4.43L334.127,230.041z"/>
                                                                                </g>
                                                                                <g style="opacity:0.2;">
                                                                                    <path d="M334.127,230.041c-0.389-6.826-4.611-16.276-11.5-25.502c-6.889-9.225-14.75-15.957-21.185-18.269l-2.947-3.946
                                                                                        l-5.932,4.43c-6.426,4.798-3,20.254,7.653,34.52c10.653,14.267,24.499,21.941,30.925,17.143l5.932-4.43L334.127,230.041z"/>
                                                                                </g>
                                                                                <g>
                                                                                    
                                                                                        <ellipse transform="matrix(0.8013 -0.5983 0.5983 0.8013 -61.6642 231.3102)" style="fill:#FF725E;" cx="317.354" cy="208.477" rx="14.507" ry="32.239"/>
                                                                                </g>
                                                                                <g style="opacity:0.1;">
                                                                                    <path style="fill:#FFFFFF;" d="M311.212,193.828c0.847,3.188,1.621,6.514,2.916,9.559
                                                                                        c4.621,10.864,14.319,19.411,25.727,21.886c-0.3-6.973-4.144-16.46-10.876-25.476c-6.447-8.633-14.058-14.847-20.488-17.352
                                                                                        C309.285,186.265,310.21,190.06,311.212,193.828z"/>
                                                                                </g>
                                                                                <g>
                                                                                    <path style="fill:#FF725E;" d="M310.794,214.122c-8.187-10.964-12.683-21.411-8.37-24.632
                                                                                        c4.578-3.418,15.8,2.006,23.987,12.97c8.187,10.964,11.328,22.464,7.016,25.683c-1.058,0.79-2.209,1.65-5.434,1.236
                                                                                        C322.904,228.725,316.973,222.396,310.794,214.122z"/>
                                                                                </g>
                                                                                <g style="opacity:0.3;">
                                                                                    <path d="M310.794,214.122c-8.187-10.964-12.683-21.411-8.37-24.632c4.578-3.418,15.8,2.006,23.987,12.97
                                                                                        c8.187,10.964,11.328,22.464,7.016,25.683c-1.058,0.79-2.209,1.65-5.434,1.236
                                                                                        C322.904,228.725,316.973,222.396,310.794,214.122z"/>
                                                                                </g>
                                                                                <g>
                                                                                    <path style="fill:#FF725E;" d="M308.655,214.973c-7.99-10.7-10.97-21.984-6.658-25.204
                                                                                        c4.313-3.22,14.286,2.842,22.276,13.542c7.99,10.7,10.97,21.985,6.658,25.205
                                                                                        C326.618,231.736,316.645,225.673,308.655,214.973z"/>
                                                                                </g>
                                                                                <g style="opacity:0.2;">
                                                                                    <path style="fill:#FFFFFF;" d="M308.655,214.973c-7.99-10.7-10.97-21.984-6.658-25.204
                                                                                        c4.313-3.22,14.286,2.842,22.276,13.542c7.99,10.7,10.97,21.985,6.658,25.205
                                                                                        C326.618,231.736,316.645,225.673,308.655,214.973z"/>
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                        <g>
                                                                            <g>
                                                                                <g>
                                                                                    <path style="fill:#FF725E;" d="M317.295,211.562l3.623,4.72c-0.004,0.004-0.009,0.007-0.014,0.011
                                                                                        c-0.569,0.286-1.251,0.462-2.021,0.512c-0.704-0.037-1.281-0.195-1.281-0.195l0.074,0.175l0.864,2.038l0.199,0.468
                                                                                        l1.188,0.493l0.105-0.37c1.021,0.037,2.044-0.105,2.828-0.602l1.993,2.596l0.989,0.275l-0.5-0.651l0.672-0.516l-2.029-2.643
                                                                                        c1.94-2.047,1.39-4.932-0.441-7.318c-2.495-3.251-4.827-2.799-6.884-2.224l-3.591-4.677c1.202-0.663,2.785-0.8,4.197-0.397
                                                                                        l-1.176-2.851c-1.544-0.487-3.464-0.203-4.96,0.722l-1.505-1.96l0.541-0.44l-1.029-0.196l-1.161,0.891l2.011,2.62
                                                                                        c-1.936,2.081-1.418,4.954,0.413,7.339C312.896,212.634,315.238,212.137,317.295,211.562z M318.833,211.162
                                                                                        c1.127-0.233,2.13-0.186,2.992,0.937c0.79,1.029,1.011,2.197,0.203,3.226L318.833,211.162z M320.921,216.286L320.921,216.286
                                                                                        L320.921,216.286C320.921,216.286,320.921,216.286,320.921,216.286z M311.944,204.593l3.178,4.14
                                                                                        c-1.155,0.255-2.191,0.195-3.071-0.951C311.28,206.776,311.108,205.644,311.944,204.593z"/>
                                                                                </g>
                                                                            </g>
                                                                            <g style="opacity:0.3;">
                                                                                <g>
                                                                                    <path d="M317.295,211.562l3.623,4.72c-0.004,0.004-0.009,0.007-0.014,0.011c-0.569,0.286-1.251,0.462-2.021,0.512
                                                                                        c-0.704-0.037-1.281-0.195-1.281-0.195l0.074,0.175l0.864,2.038l0.199,0.468l1.188,0.493l0.105-0.37
                                                                                        c1.021,0.037,2.044-0.105,2.828-0.602l1.993,2.596l0.989,0.275l-0.5-0.651l0.672-0.516l-2.029-2.643
                                                                                        c1.94-2.047,1.39-4.932-0.441-7.318c-2.495-3.251-4.827-2.799-6.884-2.224l-3.591-4.677c1.202-0.663,2.785-0.8,4.197-0.397
                                                                                        l-1.176-2.851c-1.544-0.487-3.464-0.203-4.96,0.722l-1.505-1.96l0.541-0.44l-1.029-0.196l-1.161,0.891l2.011,2.62
                                                                                        c-1.936,2.081-1.418,4.954,0.413,7.339C312.896,212.634,315.238,212.137,317.295,211.562z M318.833,211.162
                                                                                        c1.127-0.233,2.13-0.186,2.992,0.937c0.79,1.029,1.011,2.197,0.203,3.226L318.833,211.162z M320.921,216.286L320.921,216.286
                                                                                        L320.921,216.286C320.921,216.286,320.921,216.286,320.921,216.286z M311.944,204.593l3.178,4.14
                                                                                        c-1.155,0.255-2.191,0.195-3.071-0.951C311.28,206.776,311.108,205.644,311.944,204.593z"/>
                                                                                </g>
                                                                            </g>
                                                                            <g>
                                                                                <path style="fill:#FF725E;" d="M311.376,201.953l-1.845-2.74l1.214-0.818l1.829,2.715c1.55-0.83,3.484-0.994,4.995-0.413
                                                                                    l0.997,2.919c-1.384-0.49-2.972-0.452-4.214,0.135l3.294,4.893c2.088-0.446,4.444-0.752,6.733,2.648
                                                                                    c1.68,2.495,2.05,5.41-0.014,7.332l1.861,2.764l-1.214,0.818l-1.829-2.715c-1.162,0.639-2.635,0.849-4.011,0.532l-1.056-2.881
                                                                                    c1.295,0.23,2.405,0.088,3.289-0.293l-3.327-4.942c-2.088,0.447-4.457,0.798-6.746-2.603
                                                                                    C309.652,206.81,309.314,203.91,311.376,201.953z M313.08,207.809c0.807,1.198,1.837,1.322,3.006,1.14l-2.915-4.329
                                                                                    C312.271,205.617,312.372,206.757,313.08,207.809z M319.64,211.605l2.931,4.354c0.87-0.976,0.722-2.157-0.003-3.233
                                                                                    C321.777,211.552,320.778,211.442,319.64,211.605z"/>
                                                                            </g>
                                                                        </g>
                                                                        <g>
                                                                            <g>
                                                                                <path style="fill:#263238;" d="M325.286,229.176c-0.006,0.011-0.129-0.044-0.358-0.16c-0.262-0.137-0.591-0.309-0.994-0.519
                                                                                    c-0.434-0.223-0.954-0.513-1.546-0.873c-0.597-0.352-1.277-0.751-1.998-1.242c-2.917-1.893-6.761-4.918-10.091-9.097
                                                                                    c-3.355-4.154-5.641-8.443-7.129-11.585c-0.729-1.583-1.303-2.87-1.656-3.778c-0.167-0.423-0.304-0.767-0.413-1.042
                                                                                    c-0.091-0.24-0.133-0.368-0.122-0.372c0.011-0.005,0.076,0.114,0.188,0.345c0.125,0.268,0.282,0.603,0.474,1.015
                                                                                    c0.391,0.891,0.999,2.159,1.755,3.723c1.542,3.105,3.851,7.35,7.179,11.47c3.303,4.146,7.086,7.173,9.954,9.112
                                                                                    c0.708,0.502,1.377,0.915,1.961,1.281c0.579,0.375,1.089,0.682,1.511,0.923c0.39,0.234,0.707,0.424,0.96,0.577
                                                                                    C325.18,229.089,325.292,229.165,325.286,229.176z"/>
                                                                            </g>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path style="fill:#263238;" d="M301.505,210.848c-0.011,0.006-0.072-0.083-0.179-0.257c-0.106-0.175-0.261-0.433-0.449-0.772
                                                                                c-0.38-0.676-0.909-1.667-1.519-2.913c-1.208-2.493-2.783-6.017-3.831-10.14c-0.52-2.059-0.829-4.077-0.846-5.926
                                                                                c-0.022-1.846,0.257-3.527,0.8-4.824c0.524-1.308,1.255-2.214,1.82-2.747c0.271-0.283,0.523-0.455,0.686-0.579
                                                                                c0.165-0.122,0.254-0.181,0.262-0.171c0.027,0.033-0.327,0.283-0.849,0.847c-0.526,0.554-1.204,1.458-1.684,2.742
                                                                                c-0.498,1.273-0.745,2.915-0.706,4.728c0.035,1.816,0.349,3.805,0.864,5.845c1.038,4.083,2.567,7.606,3.713,10.119
                                                                                c0.579,1.256,1.072,2.262,1.414,2.957C301.342,210.448,301.527,210.835,301.505,210.848z"/>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path style="fill:#FFFFFF;" d="M314.699,187.024c-0.027,0.045-0.902-0.454-2.317-1.245c-1.417-0.779-3.389-1.868-5.74-2.589
                                                                                c-2.35-0.72-4.621-0.779-6.197-0.486c-1.587,0.277-2.479,0.781-2.507,0.715c-0.01-0.018,0.202-0.158,0.616-0.356
                                                                                c0.412-0.2,1.04-0.431,1.844-0.606c1.603-0.365,3.945-0.345,6.348,0.392c2.4,0.738,4.374,1.875,5.763,2.712
                                                                                c0.695,0.424,1.247,0.782,1.625,1.036C314.51,186.852,314.712,187.003,314.699,187.024z"/>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path style="fill:#FFFFFF;" d="M315.86,201.112c-0.028,0.1-0.821-0.058-1.803-0.06c-0.982-0.01-1.777,0.138-1.804,0.038
                                                                                c-0.03-0.088,0.766-0.404,1.806-0.394C315.098,200.699,315.891,201.024,315.86,201.112z"/>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path style="fill:#FFFFFF;" d="M290.932,192.519c-0.087,0.016-0.177-1.45,0.576-3.043c0.738-1.601,1.92-2.472,1.964-2.395
                                                                                c0.078,0.078-0.943,1.025-1.641,2.546C291.112,191.138,291.041,192.529,290.932,192.519z"/>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                                <path style="opacity:0.3;" d="M217.634,196.236l-0.746,48.151l12.471,7.748c0,0,11.9-9.886,15.156-18.932
                                                                    s-7.651-30.818-7.651-30.818s-3.756,2.29-6.061,5.229C228.499,210.551,217.634,196.236,217.634,196.236z"/>
                                                                <path style="opacity:0.3;" d="M193.617,189.943c0,0,7.247-2.988,18.76-0.208c11.513,2.78,23.248,14.029,24.779,23.201
                                                                    L193.617,189.943z"/>
                                                                <g>
                                                                    <path style="fill:#FF725E;" d="M218.417,201.236c-15.842-10.064-34.545-8.998-41.774,2.382
                                                                        c-2.995,4.714-3.518,10.46-2.015,16.288c4.477,4.577,10.037,7.945,16.077,10.077c3.783,1.336,8.508,3.162,11.539,4.905
                                                                        c4.098,2.356,12.168,7.917,20.151,13.395c4.909-1.385,9.014-4.123,11.617-8.221C241.241,228.683,234.259,211.3,218.417,201.236z"
                                                                        />
                                                                    <path style="opacity:0.4;" d="M218.417,201.236c-15.842-10.064-34.545-8.998-41.774,2.382c-2.995,4.714-3.518,10.46-2.015,16.288
                                                                        c4.477,4.577,10.037,7.945,16.077,10.077c3.783,1.336,8.508,3.162,11.539,4.905c4.098,2.356,12.168,7.917,20.151,13.395
                                                                        c4.909-1.385,9.014-4.123,11.617-8.221C241.241,228.683,234.259,211.3,218.417,201.236z"/>
                                                                    <path style="fill:#FF725E;" d="M221.729,196.293c-15.842-10.064-34.544-8.998-41.774,2.382
                                                                        c-5.051,7.951-3.146,18.828,3.854,28.096c2.253,1.268,4.619,2.345,7.069,3.21c3.783,1.335,8.508,3.162,11.539,4.905
                                                                        c3.118,1.793,8.541,5.444,14.471,9.501c8.732,0.243,16.386-2.891,20.436-9.267C244.553,223.74,237.572,206.358,221.729,196.293z"
                                                                        />
                                                                    <g>
                                                                        <g style="opacity:0.1;">
                                                                            <path style="fill:#FFFFFF;" d="M230.039,205.675c-0.975,0.613-2.358,2.515-2.784,3.729c-1.548,4.411-0.889,9.395,1.309,13.893
                                                                                c2.128,4.355,5.28,8.033,9.004,11.16c5.255-8.449,2.758-20.143-5.331-29.71C231.468,204.947,230.732,205.239,230.039,205.675z"
                                                                                />
                                                                        </g>
                                                                        <g>
                                                                            <path style="fill:#FF725E;" d="M199.675,231.918c-12.176-7.735-17.623-20.967-12.167-29.555
                                                                                c5.456-8.589,19.749-9.282,31.925-1.547c12.175,7.735,17.622,20.967,12.166,29.556
                                                                                C226.143,238.961,211.85,239.653,199.675,231.918z"/>
                                                                        </g>
                                                                        <g style="opacity:0.2;">
                                                                            <path d="M199.675,231.918c-12.176-7.735-17.623-20.967-12.167-29.555c5.456-8.589,19.749-9.282,31.925-1.547
                                                                                c12.175,7.735,17.622,20.967,12.166,29.556C226.143,238.961,211.85,239.653,199.675,231.918z"/>
                                                                        </g>
                                                                        <g>
                                                                            <path style="fill:#FF725E;" d="M198.665,232.333c-11.882-7.548-17.229-20.41-11.945-28.729
                                                                                c5.284-8.318,19.2-8.943,31.081-1.395c11.882,7.548,17.23,20.41,11.945,28.728
                                                                                C224.462,239.256,210.547,239.881,198.665,232.333z"/>
                                                                        </g>
                                                                        <g style="opacity:0.2;">
                                                                            <path style="fill:#FFFFFF;" d="M198.603,232.43c-11.882-7.548-17.23-20.41-11.945-28.729c5.284-8.318,19.2-8.943,31.081-1.394
                                                                                c11.882,7.548,17.23,20.41,11.945,28.728C224.4,239.354,210.485,239.979,198.603,232.43z"/>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <g>
                                                                                <path style="fill:#FF725E;" d="M209.419,220.605l5.705,3.625c-0.003,0.007-0.008,0.013-0.012,0.019
                                                                                    c-0.552,0.615-1.269,1.16-2.128,1.604c-0.813,0.31-1.523,0.417-1.523,0.417l0.143,0.165l1.666,1.916l0.383,0.44l1.517-0.027
                                                                                    l-0.004-0.48c1.174-0.469,2.291-1.145,3.016-2.112l3.138,1.993l1.218-0.178l-0.787-0.5l0.592-0.931l-3.195-2.029
                                                                                    c1.521-3.331-0.072-6.382-2.955-8.214c-3.929-2.496-6.431-0.807-8.578,0.887l-5.654-3.592c1.146-1.366,2.9-2.317,4.642-2.561
                                                                                    l-2.294-2.697c-1.921,0.212-4.01,1.503-5.402,3.318l-2.369-1.505l0.468-0.779l-1.236,0.29l-1.022,1.61l3.166,2.011
                                                                                    c-1.505,3.369,0.047,6.421,2.93,8.253C204.773,224.045,207.272,222.299,209.419,220.605z M211.035,219.373
                                                                                    c1.204-0.833,2.362-1.282,3.719-0.42c1.244,0.79,1.887,2.026,1.313,3.617L211.035,219.373z M215.129,224.233L215.129,224.233
                                                                                    L215.129,224.233C215.129,224.233,215.129,224.233,215.129,224.233z M200.995,215.253l5.004,3.179
                                                                                    c-1.229,0.872-2.427,1.323-3.813,0.443C200.97,218.103,200.396,216.884,200.995,215.253z"/>
                                                                            </g>
                                                                        </g>
                                                                        <g style="opacity:0.3;">
                                                                            <g>
                                                                                <path d="M209.419,220.605l5.705,3.625c-0.003,0.007-0.008,0.013-0.012,0.019c-0.552,0.615-1.269,1.16-2.128,1.604
                                                                                    c-0.813,0.31-1.523,0.417-1.523,0.417l0.143,0.165l1.666,1.916l0.383,0.44l1.517-0.027l-0.004-0.48
                                                                                    c1.174-0.469,2.291-1.145,3.016-2.112l3.138,1.993l1.218-0.178l-0.787-0.5l0.592-0.931l-3.195-2.029
                                                                                    c1.521-3.331-0.072-6.382-2.955-8.214c-3.929-2.496-6.431-0.807-8.578,0.887l-5.654-3.592c1.146-1.366,2.9-2.317,4.642-2.561
                                                                                    l-2.294-2.697c-1.921,0.212-4.01,1.503-5.402,3.318l-2.369-1.505l0.468-0.779l-1.236,0.29l-1.022,1.61l3.166,2.011
                                                                                    c-1.505,3.369,0.047,6.421,2.93,8.253C204.773,224.045,207.272,222.299,209.419,220.605z M211.035,219.373
                                                                                    c1.204-0.833,2.362-1.282,3.719-0.42c1.244,0.79,1.887,2.026,1.313,3.617L211.035,219.373z M215.129,224.233L215.129,224.233
                                                                                    L215.129,224.233C215.129,224.233,215.129,224.233,215.129,224.233z M200.995,215.253l5.004,3.179
                                                                                    c-1.229,0.872-2.427,1.323-3.813,0.443C200.97,218.103,200.396,216.884,200.995,215.253z"/>
                                                                            </g>
                                                                        </g>
                                                                        <g>
                                                                            <path style="fill:#FF725E;" d="M199.112,213.123l-3.166-2.011l1.023-1.61l3.138,1.993c1.393-1.816,3.483-3.106,5.402-3.319
                                                                                l2.295,2.698c-1.743,0.243-3.497,1.195-4.643,2.562l5.654,3.592c2.149-1.694,4.649-3.384,8.579-0.888
                                                                                c2.884,1.833,4.478,4.884,2.955,8.215l3.194,2.029l-1.023,1.61L219.382,226c-1.035,1.381-2.592,2.459-4.255,2.891l-2.345-2.62
                                                                                c1.538-0.483,2.716-1.277,3.547-2.21l-5.71-3.628c-2.148,1.694-4.647,3.441-8.576,0.946
                                                                                C199.159,219.546,197.607,216.493,199.112,213.123z M203.385,218.703c1.385,0.88,2.583,0.429,3.813-0.443l-5.005-3.179
                                                                                C201.595,216.712,202.169,217.931,203.385,218.703z M212.235,219.2l5.032,3.196c0.575-1.591-0.07-2.828-1.312-3.617
                                                                                C214.596,217.918,213.438,218.367,212.235,219.2z"/>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path style="fill:#FFFFFF;" d="M217.313,194.909c0.016-0.031,0.396,0.143,1.071,0.484c0.678,0.334,1.63,0.877,2.775,1.598
                                                                                c2.29,1.438,5.298,3.705,8.182,6.675c2.877,2.978,5.048,6.058,6.411,8.393c0.684,1.167,1.196,2.135,1.509,2.824
                                                                                c0.32,0.685,0.481,1.07,0.45,1.086c-0.079,0.04-0.827-1.453-2.263-3.724c-1.431-2.271-3.623-5.281-6.47-8.228
                                                                                c-2.853-2.938-5.792-5.225-8.016-6.728C218.739,195.782,217.27,194.987,217.313,194.909z"/>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                    <path style="fill:#263238;" d="M275.125,173.971c0.006-0.035,0.316-0.015,0.875,0.054c0.559,0.063,1.362,0.201,2.347,0.409
                                                                        c1.968,0.415,4.659,1.178,7.485,2.398c2.828,1.22,5.229,2.659,6.866,3.83c0.821,0.582,1.464,1.084,1.886,1.456
                                                                        c0.426,0.368,0.65,0.585,0.627,0.613c-0.052,0.066-1.041-0.684-2.719-1.763c-1.675-1.083-4.073-2.452-6.867-3.657
                                                                        c-2.793-1.205-5.433-2.014-7.364-2.518C276.329,174.289,275.112,174.053,275.125,173.971z"/>
                                                                </g>
                                                                <path style="opacity:0.3;" d="M329.179,233.96c-13.34,4.444-15.351,12.187-28.559,21.444c-13.208,9.257-31.93,8.469-45.042,2.573
                                                                    c-13.112-5.896-19.965-7.079-28.92-14.912c-8.955-7.833-20.102-12.817-30.712-16.343c-10.604-3.524-24.093-10.171-25.009-10.354
                                                                    c0.451,0.535,0.926,1.063,1.425,1.581c4.511,4.684,10.154,8.117,16.287,10.281c3.783,1.336,8.508,3.162,11.539,4.905
                                                                    c7.038,4.047,25.797,17.548,35.696,23.848c9.899,6.299,27.897,9.899,45.145,12.449c17.248,2.55,27.147-13.799,27.147-13.799
                                                                    c5.582-10.609,23.692-16.4,35.396-19.798c2.164-0.628,3.926-2.027,4.878-3.899c0.361-1,0.582-1.622,0.596-1.685c0,0,0,0,0,0
                                                                    C349.137,229.838,342.519,229.517,329.179,233.96z"/>
                                                                <g>
                                                                    <path style="fill:#263238;" d="M338.593,216.808c0,0,0.932,0.321,2.606,1.164c0.831,0.43,1.854,0.989,2.952,1.816
                                                                        c1.098,0.819,2.279,1.916,3.284,3.401c0.962,1.481,1.901,3.354,1.898,5.576c0.036,2.194-1.102,4.612-3.253,6.056
                                                                        c-1.05,0.753-2.358,1.148-3.639,1.509c-1.288,0.393-2.616,0.799-3.983,1.217c-2.727,0.855-5.587,1.831-8.542,2.979
                                                                        c-2.952,1.152-6.004,2.473-9.046,4.112c-3.029,1.645-6.083,3.607-8.729,6.204l-0.977,0.994c-0.331,0.329-0.592,0.721-0.894,1.08
                                                                        c-0.281,0.375-0.611,0.718-0.856,1.124l-0.746,1.217c-1,1.677-2.24,3.221-3.574,4.71c-2.67,2.977-5.957,5.585-9.752,7.468
                                                                        c-3.798,1.873-8.215,2.749-12.636,2.387l-1.663-0.14l-1.644-0.244c-1.098-0.169-2.201-0.339-3.31-0.509
                                                                        c-2.217-0.347-4.452-0.717-6.702-1.123c-8.981-1.641-18.312-3.64-27.303-7.388c-2.251-0.922-4.418-2.007-6.517-3.18
                                                                        c-2.085-1.212-4.057-2.538-6.021-3.851c-3.915-2.643-7.726-5.309-11.471-7.927c-3.745-2.618-7.421-5.193-11.057-7.658
                                                                        c-3.657-2.432-7.19-4.898-11.071-6.484c-1.918-0.837-3.848-1.586-5.765-2.29c-1.918-0.683-3.84-1.374-5.644-2.231
                                                                        c-3.63-1.678-6.915-3.817-9.758-6.269c-2.799-2.478-5.338-5.174-6.872-8.358c-1.465-3.203-1.808-6.689-1.301-9.851
                                                                        c0.503-3.175,1.848-6.02,3.607-8.301c1.784-2.278,3.993-3.956,6.201-5.192c4.479-2.45,8.889-3.174,12.395-3.6
                                                                        c3.542-0.362,6.311-0.321,8.178-0.262c1.87,0.063,2.848,0.172,2.848,0.172s-0.246,0.005-0.725-0.01
                                                                        c-0.479-0.016-1.191-0.049-2.125-0.057c-1.866-0.026-4.629-0.033-8.153,0.358c-3.488,0.454-7.866,1.208-12.276,3.653
                                                                        c-2.174,1.233-4.341,2.898-6.08,5.14c-1.717,2.247-3.024,5.044-3.505,8.156c-0.486,3.099-0.135,6.506,1.3,9.622
                                                                        c1.497,3.089,4.015,5.76,6.791,8.202c2.817,2.418,6.072,4.527,9.668,6.18c1.794,0.848,3.676,1.52,5.613,2.206
                                                                        c1.925,0.703,3.863,1.451,5.796,2.29c3.923,1.596,7.506,4.089,11.158,6.512c3.644,2.464,7.324,5.036,11.071,7.652
                                                                        c3.747,2.615,7.558,5.278,11.468,7.915c1.96,1.309,3.935,2.636,5.99,3.829c2.078,1.16,4.226,2.236,6.46,3.151
                                                                        c8.926,3.721,18.23,5.722,27.192,7.365c2.245,0.407,4.477,0.778,6.691,1.127c1.107,0.171,2.209,0.342,3.306,0.512l1.641,0.245
                                                                        l1.63,0.138c4.333,0.359,8.654-0.49,12.389-2.323c3.731-1.844,6.979-4.408,9.622-7.344c1.32-1.467,2.551-2.993,3.532-4.631
                                                                        l0.764-1.239c0.251-0.413,0.588-0.764,0.876-1.147c0.309-0.366,0.578-0.766,0.915-1.1l0.997-1.009
                                                                        c2.698-2.634,5.786-4.602,8.841-6.25c3.067-1.641,6.138-2.957,9.104-4.102c2.969-1.141,5.84-2.107,8.576-2.951
                                                                        c1.371-0.412,2.702-0.812,3.994-1.199c1.305-0.361,2.539-0.728,3.564-1.451c2.081-1.384,3.187-3.694,3.168-5.817
                                                                        c0.019-2.149-0.881-3.993-1.818-5.462c-1.995-2.946-4.511-4.35-6.116-5.236c-0.822-0.441-1.471-0.737-1.903-0.943
                                                                        C338.812,216.923,338.593,216.808,338.593,216.808z"/>
                                                                </g>
                                                                <g style="opacity:0.3;">
                                                                    <path d="M186.069,419.474c-14.246-4.614-27.113-13.401-36.594-24.992c-9.481-11.591-15.544-25.944-17.242-40.822
                                                                        c0,0,7.929,26.712,26.918,45.244C178.14,417.436,186.069,419.474,186.069,419.474z"/>
                                                                </g>
                                                                <g style="opacity:0.1;">
                                                                    <path style="fill:#FFFFFF;" d="M229.01,356.785c-2.315-15.469-6.504-31.817-15.353-44.617c0.219-0.532,0,0,0,0
                                                                        s-34.363-54.855-44.31-48.547c-15.941,10.111-37.703,31.252-46.675,47.861c-8.972,16.609-6.319,39.003,1.264,58.06
                                                                        c0,0,2.269-44.433,8.297-50.865c4.383-4.677,3.149,11.493,11.95,28.389c2.819,6.289,6.967,12.979,10.773,17.113
                                                                        c13.199,14.331,31.404,25.789,50.923,25.124c7.411-0.253,15.27-2.605,19.761-8.505
                                                                        C230.676,374.185,230.24,365.005,229.01,356.785z"/>
                                                                </g>
                                                                <g style="opacity:0.1;">
                                                                    <path style="fill:#FFFFFF;" d="M193.693,178.72c-7.465-0.634-15.032-0.05-22.311,1.72c-6.496,1.743-12.98,7.638-15.453,13.894
                                                                        c-2.473,6.255-1.939,13.516,0.784,19.666c2.722,6.151,9.66,10.682,15.563,13.906c0.585,0.32,1.371,0.602,1.861,0.15
                                                                        c0.677-0.625-0.044-1.709-0.722-2.334c-5.183-4.782-9.281-11.035-10.284-18.015c-1.003-6.98,1.52-14.663,7.261-18.756
                                                                        c3.845-2.742,8.652-3.674,13.295-4.539c3.404-0.634,6.807-1.268,10.211-1.902c1.167-0.217,2.624-0.763,2.617-1.95
                                                                        C196.506,179.32,194.927,178.825,193.693,178.72z"/>
                                                                </g>
                                                            </g>
                                                        </g>
                                                        <g id="Coins">
                                                            <g>
                                                                <g>
                                                                    <g>
                                                                        <g>
                                                                            <g>
                                                                                <g>
                                                                                    <g>
                                                                                        
                                                                                            <ellipse transform="matrix(0.5362 -0.8441 0.8441 0.5362 -170.314 484.4796)" style="fill:#FF725E;" cx="355.718" cy="397.225" rx="24.337" ry="33.881"/>
                                                                                    </g>
                                                                                    <g style="opacity:0.2;">
                                                                                        
                                                                                            <ellipse transform="matrix(0.5362 -0.8441 0.8441 0.5362 -170.314 484.4796)" cx="355.718" cy="397.225" rx="24.337" ry="33.881"/>
                                                                                    </g>
                                                                                    <g>
                                                                                        
                                                                                            <ellipse transform="matrix(0.5362 -0.8441 0.8441 0.5362 -164.7042 484.8384)" style="fill:#FF725E;" cx="358.848" cy="392.299" rx="24.337" ry="33.88"/>
                                                                                    </g>
                                                                                    <g style="opacity:0.1;">
                                                                                        <path style="fill:#FFFFFF;" d="M380.024,381.625c-0.972,0.611-2.351,2.508-2.775,3.717
                                                                                            c-1.543,4.397-0.886,9.367,1.305,13.851c2.121,4.342,5.264,8.009,8.977,11.126c5.239-8.423,2.749-20.082-5.315-29.62
                                                                                            C381.448,380.899,380.714,381.191,380.024,381.625z"/>
                                                                                    </g>
                                                                                    <g>
                                                                                        <path style="fill:#FF725E;" d="M349.751,407.789c-12.139-7.711-17.57-20.903-12.13-29.466
                                                                                            c5.44-8.563,19.69-9.254,31.828-1.542c12.139,7.711,17.569,20.904,12.129,29.467
                                                                                            C376.139,414.811,361.89,415.501,349.751,407.789z"/>
                                                                                    </g>
                                                                                    <g style="opacity:0.2;">
                                                                                        <path d="M349.751,407.789c-12.139-7.711-17.57-20.903-12.13-29.466c5.44-8.563,19.69-9.254,31.828-1.542
                                                                                            c12.139,7.711,17.569,20.904,12.129,29.467C376.139,414.811,361.89,415.501,349.751,407.789z"/>
                                                                                    </g>
                                                                                    <g>
                                                                                        <path style="fill:#FF725E;" d="M348.744,408.203c-11.846-7.525-17.177-20.349-11.909-28.642
                                                                                            c5.268-8.293,19.142-8.916,30.987-1.39c11.846,7.525,17.178,20.348,11.909,28.641
                                                                                            C374.464,415.105,360.59,415.728,348.744,408.203z"/>
                                                                                    </g>
                                                                                    <g style="opacity:0.2;">
                                                                                        <path style="fill:#FFFFFF;" d="M348.682,408.3c-11.846-7.525-17.178-20.349-11.909-28.642
                                                                                            c5.268-8.293,19.142-8.916,30.987-1.39c11.846,7.525,17.178,20.348,11.909,28.641
                                                                                            C374.402,415.203,360.528,415.826,348.682,408.3z"/>
                                                                                    </g>
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <g>
                                                                                <path style="fill:#FF725E;" d="M359.09,395.881l5.688,3.613c-0.003,0.007-0.008,0.013-0.012,0.019
                                                                                    c-0.55,0.613-1.265,1.156-2.122,1.599c-0.811,0.309-1.518,0.416-1.518,0.416l0.143,0.164l1.661,1.911l0.382,0.439l1.512-0.027
                                                                                    l-0.004-0.478c1.171-0.468,2.284-1.142,3.007-2.105l3.129,1.987l1.215-0.178l-0.785-0.499l0.59-0.928l-3.185-2.023
                                                                                    c1.517-3.321-0.072-6.363-2.946-8.189c-3.917-2.489-6.411-0.804-8.552,0.884l-5.636-3.581
                                                                                    c1.142-1.362,2.892-2.311,4.628-2.553l-2.287-2.689c-1.915,0.212-3.998,1.498-5.385,3.308l-2.362-1.5l0.466-0.776l-1.232,0.29
                                                                                    l-1.019,1.605l3.157,2.005c-1.501,3.359,0.047,6.402,2.922,8.228C354.459,399.311,356.949,397.57,359.09,395.881z
                                                                                    M360.701,394.652c1.2-0.831,2.355-1.278,3.708-0.419c1.24,0.788,1.882,2.02,1.309,3.606L360.701,394.652z M364.783,399.498
                                                                                    L364.783,399.498L364.783,399.498C364.783,399.498,364.783,399.498,364.783,399.498z M350.691,390.546l4.989,3.169
                                                                                    c-1.225,0.87-2.42,1.319-3.801,0.442C350.667,393.387,350.094,392.171,350.691,390.546z"/>
                                                                            </g>
                                                                        </g>
                                                                        <g style="opacity:0.3;">
                                                                            <g>
                                                                                <path d="M359.09,395.881l5.688,3.613c-0.003,0.007-0.008,0.013-0.012,0.019c-0.55,0.613-1.265,1.156-2.122,1.599
                                                                                    c-0.811,0.309-1.518,0.416-1.518,0.416l0.143,0.164l1.661,1.911l0.382,0.439l1.512-0.027l-0.004-0.478
                                                                                    c1.171-0.468,2.284-1.142,3.007-2.105l3.129,1.987l1.215-0.178l-0.785-0.499l0.59-0.928l-3.185-2.023
                                                                                    c1.517-3.321-0.072-6.363-2.946-8.189c-3.917-2.489-6.411-0.804-8.552,0.884l-5.636-3.581
                                                                                    c1.142-1.362,2.892-2.311,4.628-2.553l-2.287-2.689c-1.915,0.212-3.998,1.498-5.385,3.308l-2.362-1.5l0.466-0.776l-1.232,0.29
                                                                                    l-1.019,1.605l3.157,2.005c-1.501,3.359,0.047,6.402,2.922,8.228C354.459,399.311,356.949,397.57,359.09,395.881z
                                                                                    M360.701,394.652c1.2-0.831,2.355-1.278,3.708-0.419c1.24,0.788,1.882,2.02,1.309,3.606L360.701,394.652z M364.783,399.498
                                                                                    L364.783,399.498L364.783,399.498C364.783,399.498,364.783,399.498,364.783,399.498z M350.691,390.546l4.989,3.169
                                                                                    c-1.225,0.87-2.42,1.319-3.801,0.442C350.667,393.387,350.094,392.171,350.691,390.546z"/>
                                                                            </g>
                                                                        </g>
                                                                        <g>
                                                                            <path style="fill:#FF725E;" d="M348.814,388.422l-3.156-2.005l1.02-1.605l3.128,1.987c1.388-1.81,3.472-3.096,5.386-3.309
                                                                                l2.288,2.689c-1.737,0.243-3.487,1.191-4.629,2.554l5.637,3.581c2.142-1.689,4.635-3.374,8.553-0.885
                                                                                c2.875,1.827,4.464,4.869,2.946,8.191l3.185,2.023l-1.02,1.605l-3.129-1.988c-1.032,1.376-2.585,2.451-4.242,2.882
                                                                                l-2.338-2.612c1.534-0.481,2.708-1.273,3.536-2.203l-5.692-3.617c-2.141,1.689-4.633,3.431-8.55,0.943
                                                                                C348.861,394.826,347.314,391.781,348.814,388.422z M353.074,393.985c1.381,0.877,2.576,0.428,3.802-0.442l-4.99-3.17
                                                                                C351.29,392,351.862,393.215,353.074,393.985z M361.898,394.481l5.016,3.187c0.573-1.587-0.069-2.819-1.308-3.606
                                                                                C364.252,393.202,363.097,393.65,361.898,394.481z"/>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path style="fill:#FFFFFF;" d="M367.156,369.724c0.016-0.031,0.395,0.143,1.068,0.483c0.676,0.333,1.625,0.874,2.766,1.594
                                                                                c2.283,1.433,5.282,3.694,8.158,6.655c2.869,2.969,5.033,6.039,6.392,8.367c0.682,1.163,1.193,2.129,1.504,2.816
                                                                                c0.319,0.683,0.48,1.067,0.449,1.082c-0.079,0.04-0.824-1.449-2.256-3.712c-1.427-2.264-3.612-5.266-6.45-8.203
                                                                                c-2.845-2.93-5.775-5.209-7.992-6.708C368.578,370.594,367.114,369.802,367.156,369.724z"/>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path style="fill:#FFFFFF;" d="M355.106,366.217c0.028-0.136,1.649,0.084,3.62,0.491c1.972,0.407,3.547,0.848,3.518,0.984
                                                                                c-0.028,0.136-1.649-0.084-3.62-0.491C356.653,366.793,355.078,366.353,355.106,366.217z"/>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path style="fill:#FFFFFF;" d="M363.796,391.081c-0.021-0.129,1.488-0.189,2.956,0.819c1.479,0.992,1.98,2.418,1.852,2.445
                                                                                c-0.132,0.072-0.783-1.131-2.134-2.03C365.136,391.391,363.778,391.23,363.796,391.081z"/>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <g>
                                                                            <g>
                                                                                <g>
                                                                                    <path style="fill:#FF725E;" d="M272.701,444.848c6.964-4.281,19.12-6.593,32.879-6.134
                                                                                        c13.758,0.459,25.733,3.575,32.397,8.309l5.885,0.196l-0.295,8.846c-0.319,9.583-17.826,16.778-39.101,16.069
                                                                                        c-21.276-0.709-38.264-9.053-37.944-18.636l0.295-8.847L272.701,444.848z"/>
                                                                                </g>
                                                                                <g style="opacity:0.3;">
                                                                                    <path d="M272.701,444.848c6.964-4.281,19.12-6.593,32.879-6.134c13.758,0.459,25.733,3.575,32.397,8.309l5.885,0.196
                                                                                        l-0.295,8.846c-0.319,9.583-17.826,16.778-39.101,16.069c-21.276-0.709-38.264-9.053-37.944-18.636l0.295-8.847
                                                                                        L272.701,444.848z"/>
                                                                                </g>
                                                                                <g>
                                                                                    <path style="fill:#FF725E;" d="M304.74,463.913c21.275,0.709,38.781-6.477,39.1-16.052
                                                                                        c0.319-9.574-16.67-17.91-37.945-18.619c-21.276-0.709-38.781,6.478-39.1,16.052
                                                                                        C266.476,454.868,283.464,463.204,304.74,463.913z"/>
                                                                                </g>
                                                                                <g style="opacity:0.1;">
                                                                                    <path style="fill:#FFFFFF;" d="M323.888,442.599c-3.706,1.346-7.499,2.858-11.371,3.667
                                                                                        c-13.817,2.886-28.828-0.793-39.049-10.296c7.048-4.469,18.982-7.177,32.428-6.729c12.874,0.429,24.171,3.654,31.021,8.253
                                                                                        C332.625,439.323,328.27,441.008,323.888,442.599z"/>
                                                                                </g>
                                                                                <g>
                                                                                    <path style="fill:#FF725E;" d="M304.259,456.87c16.352,0.545,29.673-2.18,29.888-8.612
                                                                                        c0.227-6.827-12.76-14.134-29.112-14.679c-16.351-0.545-29.78,4.228-29.994,10.658c-0.053,1.578-0.11,3.295,2.499,6.176
                                                                                        C281.658,454.961,291.92,456.459,304.259,456.87z"/>
                                                                                </g>
                                                                                <g style="opacity:0.3;">
                                                                                    <path d="M304.259,456.87c16.352,0.545,29.673-2.18,29.888-8.612c0.227-6.827-12.76-14.134-29.112-14.679
                                                                                        c-16.351-0.545-29.78,4.228-29.994,10.658c-0.053,1.578-0.11,3.295,2.499,6.176
                                                                                        C281.658,454.961,291.92,456.459,304.259,456.87z"/>
                                                                                </g>
                                                                                <g>
                                                                                    <path style="fill:#FF725E;" d="M304.885,459.551c15.957,0.532,29.066-4.251,29.28-10.682
                                                                                        c0.214-6.431-12.547-12.077-28.504-12.608c-15.957-0.532-29.066,4.252-29.28,10.683
                                                                                        C276.167,453.374,288.928,459.019,304.885,459.551z"/>
                                                                                </g>
                                                                                <g style="opacity:0.2;">
                                                                                    <path style="fill:#FFFFFF;" d="M304.885,459.551c15.957,0.532,29.066-4.251,29.28-10.682
                                                                                        c0.214-6.431-12.547-12.077-28.504-12.608c-15.957-0.532-29.066,4.252-29.28,10.683
                                                                                        C276.167,453.374,288.928,459.019,304.885,459.551z"/>
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                        <g>
                                                                            <g>
                                                                                <g>
                                                                                    <path style="fill:#FF725E;" d="M309.178,454.02c3.591,0.168,6.765-1.287,7.484-4.608l3.944,0.184l0.082-1.748l-0.895-0.876
                                                                                        l-0.063,0.831l-2.951-0.138c-0.114-2.1-1.146-4.178-2.679-5.36l-3.601,0.793c1.359,1.111,2.306,2.757,2.477,4.389
                                                                                        l-7.042-0.329c-0.84-2.411-1.99-5.007-6.884-5.236c-3.592-0.167-6.799,1.264-7.482,4.566l-3.979-0.186l-0.047,1.011
                                                                                        l-0.981-0.046l0.946,0.783l3.909,0.182c0.047,1.109,0.607,2.21,1.341,3.186l-0.292,0.356l1.295,0.829l0.595-0.125l2.59-0.545
                                                                                        l0.222-0.047c0,0-0.549-0.458-1.066-1.123c-0.477-0.789-0.77-1.579-0.878-2.333c0.001-0.007,0-0.014,0.001-0.021l7.107,0.332
                                                                                        C303.171,451.154,304.283,453.791,309.178,454.02z M295.406,446.668c0.458-1.496,1.755-2.076,3.305-2.004
                                                                                        c1.69,0.079,2.422,1.032,2.963,2.296L295.406,446.668z M295.219,448.411L295.219,448.411L295.219,448.411L295.219,448.411z
                                                                                        M309.622,451.305c-1.726-0.081-2.491-1.056-3.03-2.364l6.232,0.291C312.364,450.771,311.136,451.376,309.622,451.305z"/>
                                                                                </g>
                                                                            </g>
                                                                            <g style="opacity:0.3;">
                                                                                <g>
                                                                                    <path d="M309.178,454.02c3.591,0.168,6.765-1.287,7.484-4.608l3.944,0.184l0.082-1.748l-0.895-0.876l-0.063,0.831
                                                                                        l-2.951-0.138c-0.114-2.1-1.146-4.178-2.679-5.36l-3.601,0.793c1.359,1.111,2.306,2.757,2.477,4.389l-7.042-0.329
                                                                                        c-0.84-2.411-1.99-5.007-6.884-5.236c-3.592-0.167-6.799,1.264-7.482,4.566l-3.979-0.186l-0.047,1.011l-0.981-0.046
                                                                                        l0.946,0.783l3.909,0.182c0.047,1.109,0.607,2.21,1.341,3.186l-0.292,0.356l1.295,0.829l0.595-0.125l2.59-0.545l0.222-0.047
                                                                                        c0,0-0.549-0.458-1.066-1.123c-0.477-0.789-0.77-1.579-0.878-2.333c0.001-0.007,0-0.014,0.001-0.021l7.107,0.332
                                                                                        C303.171,451.154,304.283,453.791,309.178,454.02z M295.406,446.668c0.458-1.496,1.755-2.076,3.305-2.004
                                                                                        c1.69,0.079,2.422,1.032,2.963,2.296L295.406,446.668z M295.219,448.411L295.219,448.411L295.219,448.411L295.219,448.411z
                                                                                        M309.622,451.305c-1.726-0.081-2.491-1.056-3.03-2.364l6.232,0.291C312.364,450.771,311.136,451.376,309.622,451.305z"/>
                                                                                </g>
                                                                            </g>
                                                                            <g>
                                                                                <path style="fill:#FF725E;" d="M308.615,453.055c-4.902,0.077-6.174-2.489-7.165-4.843l-7.122,0.112
                                                                                    c0.225,1.127,0.844,2.313,1.956,3.429l-3.549,0.929c-1.251-1.133-2.052-2.723-2.217-4.299l-3.913,0.059l-0.029-1.751
                                                                                    l3.985-0.063c0.477-3.336,3.593-4.966,7.189-5.022c4.902-0.077,6.209,2.446,7.198,4.799l7.052-0.108
                                                                                    c-0.269-1.62-1.317-3.203-2.744-4.23l3.546-1.016c1.605,1.087,2.763,3.098,3.006,5.187l3.916-0.061l0.029,1.751l-3.95,0.061
                                                                                    C315.292,451.349,312.212,452.999,308.615,453.055z M297.581,444.365c-1.554,0.024-2.813,0.685-3.178,2.205l6.278-0.098
                                                                                    C300.065,445.243,299.272,444.337,297.581,444.365z M311.958,448.049l-6.241,0.097c0.62,1.272,1.444,2.199,3.172,2.17
                                                                                    C310.406,450.293,311.596,449.612,311.958,448.049z"/>
                                                                            </g>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path style="fill:#FFFFFF;" d="M328.182,434.53c0.068-0.153,1.234,0.17,3.055,0.886c1.808,0.727,4.32,1.856,6.731,3.744
                                                                                c2.416,1.893,4.046,4.271,4.732,6.166c0.711,1.902,0.613,3.182,0.47,3.188c-0.197,0.03-0.416-1.16-1.278-2.83
                                                                                c-0.839-1.673-2.437-3.768-4.698-5.544c-2.266-1.777-4.633-3.001-6.329-3.923C329.158,435.304,328.11,434.691,328.182,434.53z"
                                                                                />
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path style="fill:#FFFFFF;" d="M313.566,443.013c0.204-0.27,1.222,0.173,1.975,1.245c0.757,1.07,0.833,2.177,0.51,2.279
                                                                                c-0.333,0.113-0.888-0.657-1.532-1.558C313.887,444.071,313.348,443.289,313.566,443.013z"/>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path style="fill:#FFFFFF;" d="M339.024,461.605c-0.209-0.292,0.929-1.415,1.868-3.065c0.967-1.634,1.377-3.179,1.734-3.143
                                                                                c0.332,0.004,0.463,1.862-0.653,3.77C340.871,461.082,339.193,461.892,339.024,461.605z"/>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <g>
                                                                            <g>
                                                                                <g>
                                                                                    <path style="fill:#FF725E;" d="M272.267,430.245c6.964-4.281,19.12-6.593,32.879-6.134
                                                                                        c13.758,0.458,25.733,3.574,32.397,8.309l5.885,0.196l-0.295,8.846c-0.319,9.583-17.826,16.778-39.101,16.069
                                                                                        c-21.276-0.709-38.264-9.053-37.944-18.636l0.295-8.847L272.267,430.245z"/>
                                                                                </g>
                                                                                <g style="opacity:0.3;">
                                                                                    <path d="M272.267,430.245c6.964-4.281,19.12-6.593,32.879-6.134c13.758,0.458,25.733,3.574,32.397,8.309l5.885,0.196
                                                                                        l-0.295,8.846c-0.319,9.583-17.826,16.778-39.101,16.069c-21.276-0.709-38.264-9.053-37.944-18.636l0.295-8.847
                                                                                        L272.267,430.245z"/>
                                                                                </g>
                                                                                <g>
                                                                                    <path style="fill:#FF725E;" d="M304.306,449.31c21.275,0.709,38.781-6.477,39.1-16.052
                                                                                        c0.319-9.574-16.67-17.91-37.945-18.619c-21.276-0.709-38.781,6.478-39.1,16.052
                                                                                        C266.042,440.265,283.029,448.601,304.306,449.31z"/>
                                                                                </g>
                                                                                <g style="opacity:0.1;">
                                                                                    <path style="fill:#FFFFFF;" d="M323.454,427.996c-3.707,1.346-7.5,2.859-11.372,3.667
                                                                                        c-13.817,2.886-28.828-0.793-39.049-10.296c7.048-4.469,18.981-7.177,32.428-6.729c12.874,0.429,24.171,3.654,31.021,8.253
                                                                                        C332.191,424.72,327.835,426.405,323.454,427.996z"/>
                                                                                </g>
                                                                                <g>
                                                                                    <path style="fill:#FF725E;" d="M303.825,442.267c16.352,0.545,29.673-2.18,29.888-8.612
                                                                                        c0.227-6.827-12.76-14.134-29.111-14.679c-16.352-0.545-29.78,4.228-29.994,10.658c-0.052,1.577-0.11,3.295,2.499,6.176
                                                                                        C281.224,440.358,291.486,441.856,303.825,442.267z"/>
                                                                                </g>
                                                                                <g style="opacity:0.3;">
                                                                                    <path d="M303.825,442.267c16.352,0.545,29.673-2.18,29.888-8.612c0.227-6.827-12.76-14.134-29.111-14.679
                                                                                        c-16.352-0.545-29.78,4.228-29.994,10.658c-0.052,1.577-0.11,3.295,2.499,6.176
                                                                                        C281.224,440.358,291.486,441.856,303.825,442.267z"/>
                                                                                </g>
                                                                                <g>
                                                                                    <path style="fill:#FF725E;" d="M304.451,444.948c15.957,0.531,29.066-4.251,29.28-10.682
                                                                                        c0.214-6.431-12.547-12.077-28.504-12.608c-15.957-0.532-29.066,4.252-29.28,10.683
                                                                                        C275.733,438.771,288.494,444.416,304.451,444.948z"/>
                                                                                </g>
                                                                                <g style="opacity:0.2;">
                                                                                    <path style="fill:#FFFFFF;" d="M304.451,444.948c15.957,0.531,29.066-4.251,29.28-10.682
                                                                                        c0.214-6.431-12.547-12.077-28.504-12.608c-15.957-0.532-29.066,4.252-29.28,10.683
                                                                                        C275.733,438.771,288.494,444.416,304.451,444.948z"/>
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                        <g>
                                                                            <g>
                                                                                <g>
                                                                                    <path style="fill:#FF725E;" d="M308.743,439.417c3.592,0.167,6.765-1.287,7.484-4.608l3.944,0.184l0.082-1.748l-0.895-0.876
                                                                                        l-0.063,0.831l-2.951-0.138c-0.114-2.1-1.146-4.178-2.679-5.36l-3.601,0.793c1.36,1.11,2.306,2.757,2.477,4.389l-7.042-0.329
                                                                                        c-0.84-2.411-1.99-5.007-6.884-5.236c-3.592-0.168-6.799,1.264-7.482,4.565l-3.979-0.186l-0.047,1.011l-0.981-0.046
                                                                                        l0.946,0.783l3.909,0.183c0.047,1.109,0.607,2.21,1.341,3.186l-0.292,0.356l1.295,0.829l0.595-0.125l2.59-0.545l0.222-0.047
                                                                                        c0,0-0.549-0.458-1.066-1.123c-0.477-0.79-0.77-1.579-0.878-2.333c0.001-0.007,0-0.014,0.001-0.021l7.107,0.332
                                                                                        C302.737,436.551,303.849,439.188,308.743,439.417z M294.971,432.065c0.458-1.496,1.755-2.076,3.305-2.004
                                                                                        c1.69,0.079,2.422,1.032,2.963,2.296L294.971,432.065z M294.784,433.808L294.784,433.808L294.784,433.808L294.784,433.808z
                                                                                        M309.188,436.703c-1.726-0.081-2.491-1.056-3.03-2.364l6.233,0.291C311.93,436.168,310.702,436.773,309.188,436.703z"/>
                                                                                </g>
                                                                            </g>
                                                                            <g style="opacity:0.3;">
                                                                                <g>
                                                                                    <path d="M308.743,439.417c3.592,0.167,6.765-1.287,7.484-4.608l3.944,0.184l0.082-1.748l-0.895-0.876l-0.063,0.831
                                                                                        l-2.951-0.138c-0.114-2.1-1.146-4.178-2.679-5.36l-3.601,0.793c1.36,1.11,2.306,2.757,2.477,4.389l-7.042-0.329
                                                                                        c-0.84-2.411-1.99-5.007-6.884-5.236c-3.592-0.168-6.799,1.264-7.482,4.565l-3.979-0.186l-0.047,1.011l-0.981-0.046
                                                                                        l0.946,0.783l3.909,0.183c0.047,1.109,0.607,2.21,1.341,3.186l-0.292,0.356l1.295,0.829l0.595-0.125l2.59-0.545l0.222-0.047
                                                                                        c0,0-0.549-0.458-1.066-1.123c-0.477-0.79-0.77-1.579-0.878-2.333c0.001-0.007,0-0.014,0.001-0.021l7.107,0.332
                                                                                        C302.737,436.551,303.849,439.188,308.743,439.417z M294.971,432.065c0.458-1.496,1.755-2.076,3.305-2.004
                                                                                        c1.69,0.079,2.422,1.032,2.963,2.296L294.971,432.065z M294.784,433.808L294.784,433.808L294.784,433.808L294.784,433.808z
                                                                                        M309.188,436.703c-1.726-0.081-2.491-1.056-3.03-2.364l6.233,0.291C311.93,436.168,310.702,436.773,309.188,436.703z"/>
                                                                                </g>
                                                                            </g>
                                                                            <g>
                                                                                <path style="fill:#FF725E;" d="M308.181,438.452c-4.902,0.077-6.174-2.489-7.165-4.843l-7.122,0.112
                                                                                    c0.225,1.127,0.844,2.313,1.956,3.429l-3.549,0.929c-1.251-1.133-2.052-2.723-2.217-4.299l-3.913,0.059l-0.029-1.751
                                                                                    l3.985-0.063c0.477-3.336,3.593-4.966,7.189-5.022c4.902-0.077,6.209,2.446,7.198,4.799l7.052-0.108
                                                                                    c-0.269-1.62-1.317-3.203-2.744-4.23l3.546-1.016c1.605,1.087,2.763,3.098,3.006,5.186l3.916-0.061l0.029,1.751l-3.95,0.061
                                                                                    C314.857,436.746,311.777,438.396,308.181,438.452z M297.146,429.762c-1.554,0.024-2.813,0.685-3.178,2.205l6.278-0.098
                                                                                    C299.631,430.64,298.838,429.735,297.146,429.762z M311.524,433.446l-6.241,0.097c0.62,1.272,1.443,2.198,3.172,2.17
                                                                                    C309.972,435.69,311.162,435.009,311.524,433.446z"/>
                                                                            </g>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path style="fill:#FFFFFF;" d="M327.748,419.927c0.068-0.153,1.234,0.17,3.055,0.886c1.807,0.727,4.32,1.856,6.731,3.744
                                                                                c2.416,1.893,4.046,4.271,4.732,6.166c0.711,1.902,0.613,3.182,0.47,3.188c-0.197,0.03-0.416-1.16-1.278-2.83
                                                                                c-0.839-1.674-2.437-3.768-4.698-5.544c-2.266-1.777-4.633-3.001-6.329-3.923C328.724,420.702,327.676,420.089,327.748,419.927
                                                                                z"/>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path style="fill:#FFFFFF;" d="M313.131,428.41c0.204-0.27,1.222,0.173,1.975,1.245c0.757,1.07,0.833,2.177,0.51,2.279
                                                                                c-0.333,0.113-0.888-0.657-1.532-1.558C313.452,429.468,312.913,428.686,313.131,428.41z"/>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path style="fill:#FFFFFF;" d="M338.59,447.002c-0.208-0.292,0.929-1.415,1.868-3.065c0.967-1.634,1.377-3.179,1.734-3.143
                                                                                c0.332,0.004,0.463,1.862-0.653,3.77C340.437,446.479,338.758,447.289,338.59,447.002z"/>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <g>
                                                                            <g>
                                                                                <g>
                                                                                    <path style="fill:#FF725E;" d="M273.092,416.881c6.964-4.281,19.12-6.593,32.878-6.134
                                                                                        c13.758,0.458,25.733,3.574,32.397,8.309l5.885,0.196l-0.295,8.846c-0.319,9.583-17.826,16.778-39.101,16.07
                                                                                        c-21.276-0.709-38.264-9.053-37.944-18.636l0.295-8.847L273.092,416.881z"/>
                                                                                </g>
                                                                                <g style="opacity:0.3;">
                                                                                    <path d="M273.092,416.881c6.964-4.281,19.12-6.593,32.878-6.134c13.758,0.458,25.733,3.574,32.397,8.309l5.885,0.196
                                                                                        l-0.295,8.846c-0.319,9.583-17.826,16.778-39.101,16.07c-21.276-0.709-38.264-9.053-37.944-18.636l0.295-8.847
                                                                                        L273.092,416.881z"/>
                                                                                </g>
                                                                                <g>
                                                                                    <path style="fill:#FF725E;" d="M305.131,435.946c21.275,0.709,38.781-6.478,39.1-16.052
                                                                                        c0.319-9.574-16.67-17.91-37.945-18.619c-21.276-0.709-38.781,6.478-39.1,16.052
                                                                                        C266.867,426.902,283.855,435.237,305.131,435.946z"/>
                                                                                </g>
                                                                                <g style="opacity:0.1;">
                                                                                    <path style="fill:#FFFFFF;" d="M324.279,414.633c-3.707,1.346-7.5,2.858-11.372,3.667
                                                                                        c-13.817,2.886-28.828-0.793-39.049-10.296c7.048-4.469,18.981-7.177,32.428-6.728c12.875,0.429,24.171,3.654,31.021,8.253
                                                                                        C333.016,411.357,328.661,413.042,324.279,414.633z"/>
                                                                                </g>
                                                                                <g>
                                                                                    <path style="fill:#FF725E;" d="M304.651,428.904c16.352,0.545,29.673-2.18,29.888-8.612
                                                                                        c0.227-6.827-12.76-14.134-29.111-14.679c-16.352-0.545-29.78,4.228-29.994,10.658c-0.052,1.577-0.11,3.295,2.499,6.176
                                                                                        C282.05,426.995,292.311,428.493,304.651,428.904z"/>
                                                                                </g>
                                                                                <g style="opacity:0.3;">
                                                                                    <path d="M304.651,428.904c16.352,0.545,29.673-2.18,29.888-8.612c0.227-6.827-12.76-14.134-29.111-14.679
                                                                                        c-16.352-0.545-29.78,4.228-29.994,10.658c-0.052,1.577-0.11,3.295,2.499,6.176
                                                                                        C282.05,426.995,292.311,428.493,304.651,428.904z"/>
                                                                                </g>
                                                                                <g>
                                                                                    <path style="fill:#FF725E;" d="M305.276,431.584c15.957,0.532,29.066-4.251,29.28-10.682
                                                                                        c0.214-6.431-12.547-12.077-28.504-12.608c-15.957-0.532-29.066,4.252-29.28,10.683
                                                                                        C276.558,425.408,289.32,431.053,305.276,431.584z"/>
                                                                                </g>
                                                                                <g style="opacity:0.2;">
                                                                                    <path style="fill:#FFFFFF;" d="M305.276,431.584c15.957,0.532,29.066-4.251,29.28-10.682
                                                                                        c0.214-6.431-12.547-12.077-28.504-12.608c-15.957-0.532-29.066,4.252-29.28,10.683
                                                                                        C276.558,425.408,289.32,431.053,305.276,431.584z"/>
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                        <g>
                                                                            <g>
                                                                                <g>
                                                                                    <path style="fill:#FF725E;" d="M309.569,426.053c3.592,0.168,6.765-1.287,7.484-4.608l3.944,0.184l0.082-1.749l-0.895-0.876
                                                                                        l-0.063,0.831l-2.951-0.138c-0.114-2.1-1.146-4.178-2.679-5.36l-3.601,0.793c1.36,1.111,2.306,2.757,2.477,4.389
                                                                                        l-7.042-0.329c-0.84-2.411-1.99-5.007-6.884-5.236c-3.592-0.168-6.799,1.264-7.482,4.566l-3.979-0.186l-0.047,1.011
                                                                                        l-0.981-0.046l0.946,0.783l3.909,0.182c0.047,1.109,0.607,2.21,1.341,3.186l-0.292,0.356l1.295,0.829l0.595-0.125l2.59-0.545
                                                                                        l0.222-0.047c0,0-0.549-0.458-1.066-1.123c-0.477-0.79-0.77-1.579-0.878-2.333c0.001-0.007,0-0.014,0.001-0.021l7.107,0.332
                                                                                        C303.562,423.188,304.674,425.825,309.569,426.053z M295.797,418.701c0.458-1.496,1.755-2.076,3.305-2.004
                                                                                        c1.69,0.079,2.422,1.032,2.963,2.297L295.797,418.701z M295.61,420.445L295.61,420.445L295.61,420.445L295.61,420.445z
                                                                                        M310.013,423.339c-1.726-0.08-2.491-1.056-3.03-2.364l6.232,0.291C312.755,422.805,311.527,423.41,310.013,423.339z"/>
                                                                                </g>
                                                                            </g>
                                                                            <g style="opacity:0.3;">
                                                                                <g>
                                                                                    <path d="M309.569,426.053c3.592,0.168,6.765-1.287,7.484-4.608l3.944,0.184l0.082-1.749l-0.895-0.876l-0.063,0.831
                                                                                        l-2.951-0.138c-0.114-2.1-1.146-4.178-2.679-5.36l-3.601,0.793c1.36,1.111,2.306,2.757,2.477,4.389l-7.042-0.329
                                                                                        c-0.84-2.411-1.99-5.007-6.884-5.236c-3.592-0.168-6.799,1.264-7.482,4.566l-3.979-0.186l-0.047,1.011l-0.981-0.046
                                                                                        l0.946,0.783l3.909,0.182c0.047,1.109,0.607,2.21,1.341,3.186l-0.292,0.356l1.295,0.829l0.595-0.125l2.59-0.545l0.222-0.047
                                                                                        c0,0-0.549-0.458-1.066-1.123c-0.477-0.79-0.77-1.579-0.878-2.333c0.001-0.007,0-0.014,0.001-0.021l7.107,0.332
                                                                                        C303.562,423.188,304.674,425.825,309.569,426.053z M295.797,418.701c0.458-1.496,1.755-2.076,3.305-2.004
                                                                                        c1.69,0.079,2.422,1.032,2.963,2.297L295.797,418.701z M295.61,420.445L295.61,420.445L295.61,420.445L295.61,420.445z
                                                                                        M310.013,423.339c-1.726-0.08-2.491-1.056-3.03-2.364l6.232,0.291C312.755,422.805,311.527,423.41,310.013,423.339z"/>
                                                                                </g>
                                                                            </g>
                                                                            <g>
                                                                                <path style="fill:#FF725E;" d="M309.006,425.089c-4.902,0.077-6.174-2.489-7.165-4.843l-7.122,0.112
                                                                                    c0.225,1.127,0.844,2.313,1.956,3.429l-3.55,0.929c-1.251-1.133-2.052-2.723-2.217-4.299l-3.913,0.06l-0.029-1.751
                                                                                    l3.985-0.063c0.477-3.336,3.593-4.966,7.189-5.022c4.902-0.077,6.209,2.445,7.198,4.799l7.052-0.108
                                                                                    c-0.269-1.62-1.317-3.203-2.744-4.23l3.546-1.016c1.605,1.087,2.763,3.098,3.006,5.187l3.916-0.061l0.029,1.751l-3.95,0.061
                                                                                    C315.683,423.383,312.603,425.032,309.006,425.089z M297.972,416.398c-1.554,0.024-2.813,0.684-3.178,2.205l6.278-0.098
                                                                                    C300.456,417.277,299.663,416.371,297.972,416.398z M312.35,420.083l-6.241,0.097c0.62,1.272,1.443,2.198,3.172,2.17
                                                                                    C310.797,422.326,311.987,421.645,312.35,420.083z"/>
                                                                            </g>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path style="fill:#FFFFFF;" d="M328.574,406.563c0.068-0.153,1.234,0.17,3.055,0.886c1.807,0.727,4.32,1.856,6.731,3.744
                                                                                c2.416,1.893,4.046,4.271,4.732,6.166c0.711,1.902,0.613,3.182,0.47,3.189c-0.197,0.03-0.416-1.16-1.278-2.83
                                                                                c-0.839-1.674-2.437-3.768-4.698-5.544c-2.266-1.777-4.633-3-6.329-3.923C329.55,407.338,328.501,406.725,328.574,406.563z"/>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path style="fill:#FFFFFF;" d="M313.957,415.047c0.204-0.27,1.222,0.173,1.975,1.245c0.757,1.07,0.833,2.177,0.51,2.279
                                                                                c-0.333,0.113-0.888-0.657-1.532-1.558C314.278,416.104,313.739,415.323,313.957,415.047z"/>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path style="fill:#FFFFFF;" d="M339.416,433.639c-0.208-0.292,0.929-1.415,1.868-3.065c0.967-1.634,1.377-3.179,1.734-3.143
                                                                                c0.332,0.004,0.463,1.862-0.653,3.77C341.262,433.116,339.584,433.925,339.416,433.639z"/>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <g>
                                                                            <g>
                                                                                <g>
                                                                                    <path style="fill:#FF725E;" d="M273.092,405.076c6.964-4.281,19.12-6.593,32.878-6.134
                                                                                        c13.758,0.458,25.733,3.574,32.397,8.309l5.885,0.196l-0.295,8.846c-0.319,9.583-17.826,16.778-39.101,16.069
                                                                                        c-21.276-0.709-38.264-9.053-37.944-18.636l0.295-8.847L273.092,405.076z"/>
                                                                                </g>
                                                                                <g style="opacity:0.3;">
                                                                                    <path d="M273.092,405.076c6.964-4.281,19.12-6.593,32.878-6.134c13.758,0.458,25.733,3.574,32.397,8.309l5.885,0.196
                                                                                        l-0.295,8.846c-0.319,9.583-17.826,16.778-39.101,16.069c-21.276-0.709-38.264-9.053-37.944-18.636l0.295-8.847
                                                                                        L273.092,405.076z"/>
                                                                                </g>
                                                                                <g>
                                                                                    <path style="fill:#FF725E;" d="M305.131,424.141c21.275,0.709,38.781-6.477,39.1-16.052
                                                                                        c0.319-9.574-16.67-17.91-37.945-18.619c-21.276-0.709-38.781,6.478-39.1,16.052
                                                                                        C266.867,415.096,283.855,423.432,305.131,424.141z"/>
                                                                                </g>
                                                                                <g style="opacity:0.1;">
                                                                                    <path style="fill:#FFFFFF;" d="M324.279,402.827c-3.707,1.346-7.5,2.858-11.372,3.667
                                                                                        c-13.817,2.886-28.828-0.793-39.049-10.296c7.048-4.469,18.981-7.177,32.428-6.728c12.875,0.429,24.171,3.653,31.021,8.253
                                                                                        C333.016,399.552,328.661,401.236,324.279,402.827z"/>
                                                                                </g>
                                                                                <g>
                                                                                    <path style="fill:#FF725E;" d="M304.651,417.099c16.352,0.545,29.673-2.18,29.888-8.612
                                                                                        c0.227-6.827-12.76-14.134-29.111-14.679c-16.352-0.545-29.78,4.228-29.994,10.658c-0.052,1.577-0.11,3.295,2.499,6.176
                                                                                        C282.05,415.19,292.311,416.687,304.651,417.099z"/>
                                                                                </g>
                                                                                <g style="opacity:0.3;">
                                                                                    <path d="M304.651,417.099c16.352,0.545,29.673-2.18,29.888-8.612c0.227-6.827-12.76-14.134-29.111-14.679
                                                                                        c-16.352-0.545-29.78,4.228-29.994,10.658c-0.052,1.577-0.11,3.295,2.499,6.176
                                                                                        C282.05,415.19,292.311,416.687,304.651,417.099z"/>
                                                                                </g>
                                                                                <g>
                                                                                    <path style="fill:#FF725E;" d="M305.276,419.779c15.957,0.531,29.066-4.251,29.28-10.682
                                                                                        c0.214-6.431-12.547-12.077-28.504-12.608c-15.957-0.532-29.066,4.252-29.28,10.683
                                                                                        C276.558,413.603,289.32,419.247,305.276,419.779z"/>
                                                                                </g>
                                                                                <g style="opacity:0.2;">
                                                                                    <path style="fill:#FFFFFF;" d="M305.276,419.779c15.957,0.531,29.066-4.251,29.28-10.682
                                                                                        c0.214-6.431-12.547-12.077-28.504-12.608c-15.957-0.532-29.066,4.252-29.28,10.683
                                                                                        C276.558,413.603,289.32,419.247,305.276,419.779z"/>
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                        <g>
                                                                            <g>
                                                                                <g>
                                                                                    <path style="fill:#FF725E;" d="M309.569,414.248c3.592,0.168,6.765-1.287,7.484-4.608l3.944,0.184l0.082-1.748l-0.895-0.876
                                                                                        l-0.063,0.831l-2.951-0.138c-0.114-2.1-1.146-4.178-2.679-5.36l-3.601,0.793c1.36,1.11,2.306,2.757,2.477,4.389l-7.042-0.329
                                                                                        c-0.84-2.411-1.99-5.007-6.884-5.236c-3.592-0.168-6.799,1.264-7.482,4.566l-3.979-0.186l-0.047,1.011l-0.981-0.046
                                                                                        l0.946,0.783l3.909,0.183c0.047,1.109,0.607,2.21,1.341,3.186l-0.292,0.356l1.295,0.829l0.595-0.125l2.59-0.545l0.222-0.047
                                                                                        c0,0-0.549-0.458-1.066-1.123c-0.477-0.79-0.77-1.579-0.878-2.333c0.001-0.007,0-0.014,0.001-0.021l7.107,0.332
                                                                                        C303.562,411.382,304.674,414.02,309.569,414.248z M295.797,406.896c0.458-1.496,1.755-2.076,3.305-2.004
                                                                                        c1.69,0.079,2.422,1.032,2.963,2.296L295.797,406.896z M295.61,408.64L295.61,408.64L295.61,408.64L295.61,408.64z
                                                                                        M310.013,411.534c-1.726-0.081-2.491-1.056-3.03-2.364l6.232,0.291C312.755,410.999,311.527,411.604,310.013,411.534z"/>
                                                                                </g>
                                                                            </g>
                                                                            <g style="opacity:0.3;">
                                                                                <g>
                                                                                    <path d="M309.569,414.248c3.592,0.168,6.765-1.287,7.484-4.608l3.944,0.184l0.082-1.748l-0.895-0.876l-0.063,0.831
                                                                                        l-2.951-0.138c-0.114-2.1-1.146-4.178-2.679-5.36l-3.601,0.793c1.36,1.11,2.306,2.757,2.477,4.389l-7.042-0.329
                                                                                        c-0.84-2.411-1.99-5.007-6.884-5.236c-3.592-0.168-6.799,1.264-7.482,4.566l-3.979-0.186l-0.047,1.011l-0.981-0.046
                                                                                        l0.946,0.783l3.909,0.183c0.047,1.109,0.607,2.21,1.341,3.186l-0.292,0.356l1.295,0.829l0.595-0.125l2.59-0.545l0.222-0.047
                                                                                        c0,0-0.549-0.458-1.066-1.123c-0.477-0.79-0.77-1.579-0.878-2.333c0.001-0.007,0-0.014,0.001-0.021l7.107,0.332
                                                                                        C303.562,411.382,304.674,414.02,309.569,414.248z M295.797,406.896c0.458-1.496,1.755-2.076,3.305-2.004
                                                                                        c1.69,0.079,2.422,1.032,2.963,2.296L295.797,406.896z M295.61,408.64L295.61,408.64L295.61,408.64L295.61,408.64z
                                                                                        M310.013,411.534c-1.726-0.081-2.491-1.056-3.03-2.364l6.232,0.291C312.755,410.999,311.527,411.604,310.013,411.534z"/>
                                                                                </g>
                                                                            </g>
                                                                            <g>
                                                                                <path style="fill:#FF725E;" d="M309.006,413.283c-4.902,0.077-6.174-2.489-7.165-4.843l-7.122,0.112
                                                                                    c0.225,1.127,0.844,2.313,1.956,3.429l-3.55,0.929c-1.251-1.133-2.052-2.723-2.217-4.299l-3.913,0.06l-0.029-1.751
                                                                                    l3.985-0.063c0.477-3.336,3.593-4.966,7.189-5.022c4.902-0.077,6.209,2.445,7.198,4.799l7.052-0.108
                                                                                    c-0.269-1.62-1.317-3.203-2.744-4.23l3.546-1.016c1.605,1.087,2.763,3.098,3.006,5.187l3.916-0.061l0.029,1.751l-3.95,0.061
                                                                                    C315.683,411.577,312.603,413.227,309.006,413.283z M297.972,404.593c-1.554,0.024-2.813,0.685-3.178,2.205l6.278-0.098
                                                                                    C300.456,405.471,299.663,404.566,297.972,404.593z M312.35,408.277l-6.241,0.097c0.62,1.272,1.443,2.198,3.172,2.17
                                                                                    C310.797,410.521,311.987,409.84,312.35,408.277z"/>
                                                                            </g>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path style="fill:#FFFFFF;" d="M328.574,394.758c0.068-0.153,1.234,0.17,3.055,0.886c1.807,0.727,4.32,1.856,6.731,3.744
                                                                                c2.416,1.893,4.046,4.271,4.732,6.166c0.711,1.902,0.613,3.182,0.47,3.189c-0.197,0.03-0.416-1.16-1.278-2.83
                                                                                c-0.839-1.674-2.437-3.768-4.698-5.544c-2.266-1.777-4.633-3.001-6.329-3.923C329.55,395.533,328.501,394.92,328.574,394.758z"
                                                                                />
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path style="fill:#FFFFFF;" d="M313.957,403.242c0.204-0.27,1.222,0.173,1.975,1.245c0.757,1.07,0.833,2.177,0.51,2.279
                                                                                c-0.333,0.113-0.888-0.657-1.532-1.558C314.278,404.299,313.739,403.517,313.957,403.242z"/>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path style="fill:#FFFFFF;" d="M339.416,421.833c-0.208-0.292,0.929-1.415,1.868-3.065c0.967-1.634,1.377-3.179,1.734-3.143
                                                                                c0.332,0.004,0.463,1.862-0.653,3.77C341.262,421.311,339.584,422.12,339.416,421.833z"/>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                            <g>
                                                                <g>
                                                                    <g>
                                                                        
                                                                            <ellipse transform="matrix(0.2378 -0.9713 0.9713 0.2378 14.8565 275.4987)" style="fill:#FF725E;" cx="182.97" cy="128.283" rx="27.032" ry="32.438"/>
                                                                    </g>
                                                                    <g style="opacity:0.2;">
                                                                        
                                                                            <ellipse transform="matrix(0.2378 -0.9713 0.9713 0.2378 14.8565 275.4987)" cx="182.97" cy="128.283" rx="27.032" ry="32.438"/>
                                                                    </g>
                                                                    <g>
                                                                        
                                                                            <ellipse transform="matrix(0.2378 -0.9713 0.9713 0.2378 8.966 278.168)" style="fill:#FF725E;" cx="181.724" cy="133.371" rx="27.032" ry="32.438"/>
                                                                    </g>
                                                                    <g style="opacity:0.1;">
                                                                        <path style="fill:#FFFFFF;" d="M155.964,115.197c-2.757,2.926-4.766,6.455-5.747,10.461c-3.55,14.501,7.678,29.709,25.079,33.97
                                                                            c7.112,1.741,14.153,1.382,20.237-0.64c-0.349-7.923-2.331-15.707-5.922-22.815c-3.553-7.033-8.752-12.684-16.15-15.688
                                                                            C168.356,118.41,161.943,115.352,155.964,115.197z"/>
                                                                    </g>
                                                                    <g>
                                                                        <path style="fill:#FF725E;" d="M185.882,113.859c13.374,3.274,22.043,14.8,19.363,25.745
                                                                            c-2.68,10.945-15.693,17.163-29.066,13.889c-13.374-3.274-22.043-14.801-19.363-25.746
                                                                            C159.495,116.803,172.508,110.585,185.882,113.859z"/>
                                                                    </g>
                                                                    <g style="opacity:0.2;">
                                                                        <path d="M185.882,113.859c13.374,3.274,22.043,14.8,19.363,25.745c-2.68,10.945-15.693,17.163-29.066,13.889
                                                                            c-13.374-3.274-22.043-14.801-19.363-25.746C159.495,116.803,172.508,110.585,185.882,113.859z"/>
                                                                    </g>
                                                                    <g>
                                                                        <path style="fill:#FF725E;" d="M186.701,113.044c13.051,3.195,21.527,14.378,18.932,24.979
                                                                            c-2.595,10.6-15.278,16.602-28.329,13.407c-13.051-3.195-21.527-14.378-18.932-24.978
                                                                            C160.966,115.852,173.649,109.848,186.701,113.044z"/>
                                                                    </g>
                                                                </g>
                                                                <g style="opacity:0.2;">
                                                                    <path style="fill:#FFFFFF;" d="M186.701,113.044c13.051,3.195,21.527,14.378,18.932,24.979
                                                                        c-2.595,10.6-15.278,16.602-28.329,13.407c-13.051-3.195-21.527-14.378-18.932-24.978
                                                                        C160.966,115.852,173.649,109.848,186.701,113.044z"/>
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <g>
                                                                            <path style="fill:#FF725E;" d="M179.452,130.552l-6.267-1.534c0.001-0.008,0.004-0.016,0.006-0.024
                                                                                c0.338-0.834,0.848-1.659,1.516-2.435c0.664-0.622,1.288-0.999,1.288-0.999l-0.178-0.113l-2.068-1.321l-0.475-0.304l-1.391,0.6
                                                                                l0.137,0.486c-0.952,0.921-1.794,2.03-2.194,3.288l-3.447-0.844l-1.074,0.641l0.865,0.212l-0.286,1.171l3.509,0.859
                                                                                c-0.477,3.964,1.839,6.467,5.007,7.242c4.316,1.057,6.153-1.607,7.662-4.141l6.21,1.52c-0.677,1.823-2.03,3.453-3.568,4.358
                                                                                l2.864,1.878c1.711-0.941,3.279-3.042,4.058-5.416l2.602,0.637l-0.215,0.969l1.059-0.762l0.495-2.024l-3.478-0.852
                                                                                c0.452-3.996-1.827-6.516-4.995-7.291C182.778,125.297,180.96,128.018,179.452,130.552z M178.304,132.416
                                                                                c-0.878,1.302-1.821,2.196-3.312,1.831c-1.366-0.334-2.303-1.349-2.215-3.185L178.304,132.416z M173.179,129.016
                                                                                L173.179,129.016L173.179,129.016C173.179,129.016,173.179,129.016,173.179,129.016z M188.705,132.817l-5.496-1.346
                                                                                c0.89-1.352,1.87-2.262,3.392-1.89C187.936,129.908,188.804,130.932,188.705,132.817z"/>
                                                                        </g>
                                                                    </g>
                                                                    <g style="opacity:0.3;">
                                                                        <g>
                                                                            <path d="M179.452,130.552l-6.267-1.534c0.001-0.008,0.004-0.016,0.006-0.024c0.338-0.834,0.848-1.659,1.516-2.435
                                                                                c0.664-0.622,1.288-0.999,1.288-0.999l-0.178-0.113l-2.068-1.321l-0.475-0.304l-1.391,0.6l0.137,0.486
                                                                                c-0.952,0.921-1.794,2.03-2.194,3.288l-3.447-0.844l-1.074,0.641l0.865,0.212l-0.286,1.171l3.509,0.859
                                                                                c-0.477,3.964,1.839,6.467,5.007,7.242c4.316,1.057,6.153-1.607,7.662-4.141l6.21,1.52c-0.677,1.823-2.03,3.453-3.568,4.358
                                                                                l2.864,1.878c1.711-0.941,3.279-3.042,4.058-5.416l2.602,0.637l-0.215,0.969l1.059-0.762l0.495-2.024l-3.478-0.852
                                                                                c0.452-3.996-1.827-6.516-4.995-7.291C182.778,125.297,180.96,128.018,179.452,130.552z M178.304,132.416
                                                                                c-0.878,1.302-1.821,2.196-3.312,1.831c-1.366-0.334-2.303-1.349-2.215-3.185L178.304,132.416z M173.179,129.016
                                                                                L173.179,129.016L173.179,129.016C173.179,129.016,173.179,129.016,173.179,129.016z M188.705,132.817l-5.496-1.346
                                                                                c0.89-1.352,1.87-2.262,3.392-1.89C187.936,129.908,188.804,130.932,188.705,132.817z"/>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <path style="fill:#FF725E;" d="M191.031,134.276l3.479,0.851l-0.496,2.023l-3.447-0.843c-0.779,2.373-2.346,4.475-4.058,5.415
                                                                            l-2.865-1.878c1.539-0.905,2.893-2.535,3.569-4.359l-6.21-1.521c-1.509,2.535-3.346,5.199-7.663,4.142
                                                                            c-3.167-0.775-5.484-3.278-5.007-7.243l-3.509-0.859l0.496-2.024l3.447,0.844c0.57-1.797,1.706-3.48,3.121-4.547l2.887,1.78
                                                                            c-1.282,1.072-2.149,2.325-2.655,3.588l6.272,1.535c1.509-2.534,3.327-5.255,7.643-4.199
                                                                            C189.204,127.759,191.484,130.28,191.031,134.276z M177.246,133.045l-5.527-1.352c-0.088,1.836,0.85,2.85,2.215,3.184
                                                                            C175.424,135.243,176.367,134.348,177.246,133.045z M185.542,130.211c-1.522-0.372-2.501,0.538-3.391,1.89l5.496,1.345
                                                                            C187.746,131.562,186.878,130.538,185.542,130.211z"/>
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <path style="fill:#263238;" d="M163.706,117.456c-0.011-0.014,0.145-0.144,0.453-0.379c0.317-0.22,0.747-0.605,1.384-0.975
                                                                            c1.223-0.818,3.13-1.814,5.63-2.657c2.497-0.85,5.629-1.42,9.125-1.416c1.745,0.036,3.581,0.181,5.446,0.565
                                                                            c1.862,0.389,3.754,0.973,5.605,1.78c3.669,1.64,6.969,3.732,9.423,6.242c2.5,2.468,4.03,5.353,4.724,7.903
                                                                            c0.712,2.564,0.645,4.739,0.548,6.199c-0.077,0.732-0.19,1.294-0.249,1.676c-0.066,0.381-0.109,0.579-0.127,0.576
                                                                            c-0.018-0.003-0.009-0.207,0.023-0.591c0.025-0.385,0.104-0.948,0.15-1.674c0.034-1.451,0.042-3.59-0.7-6.083
                                                                            c-0.725-2.481-2.245-5.268-4.71-7.666c-2.418-2.438-5.67-4.485-9.293-6.104c-1.816-0.791-3.669-1.367-5.496-1.756
                                                                            c-1.83-0.384-3.633-0.536-5.349-0.585c-3.438-0.03-6.529,0.492-9.007,1.287c-2.481,0.787-4.392,1.72-5.637,2.479
                                                                            C164.393,117.018,163.737,117.499,163.706,117.456z"/>
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <path style="fill:#FFFFFF;" d="M178.977,159.992c-0.005,0.036-0.349,0.015-0.971-0.053c-0.622-0.061-1.515-0.21-2.607-0.449
                                                                            c-2.184-0.472-5.156-1.416-8.199-2.981c-3.04-1.575-5.531-3.451-7.181-4.958c-0.827-0.752-1.466-1.393-1.876-1.865
                                                                            c-0.415-0.467-0.632-0.736-0.605-0.76c0.064-0.062,1.024,0.927,2.723,2.346c1.695,1.421,4.182,3.22,7.179,4.773
                                                                            c3,1.543,5.907,2.528,8.047,3.087C177.628,159.694,178.99,159.904,178.977,159.992z"/>
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <path style="fill:#FFFFFF;" d="M189.317,159.445c0.018,0.143-1.205,0.411-2.731,0.597c-1.526,0.187-2.777,0.223-2.794,0.079
                                                                            c-0.018-0.143,1.205-0.41,2.731-0.597C188.048,159.337,189.299,159.302,189.317,159.445z"/>
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <path style="fill:#FFFFFF;" d="M161.354,122.015c0.088,0.046-0.497,1.106-1.058,2.949c-0.289,0.918-0.524,2.042-0.684,3.301
                                                                            c-0.132,1.262-0.172,2.661-0.041,4.12c0.15,1.458,0.457,2.824,0.828,4.038c0.397,1.205,0.843,2.264,1.302,3.11
                                                                            c0.903,1.702,1.68,2.63,1.602,2.692c-0.028,0.023-0.237-0.194-0.594-0.61c-0.366-0.408-0.829-1.058-1.33-1.903
                                                                            c-0.51-0.841-1.004-1.91-1.437-3.139c-0.407-1.237-0.737-2.639-0.891-4.137c-0.135-1.5-0.079-2.938,0.084-4.23
                                                                            c0.19-1.289,0.47-2.432,0.81-3.356c0.331-0.924,0.66-1.651,0.942-2.122C161.159,122.251,161.323,121.998,161.354,122.015z"/>
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <path style="fill:#FFFFFF;" d="M173.495,136.691c0.013,0.063-0.237,0.191-0.682,0.209c-0.441,0.021-1.068-0.11-1.645-0.478
                                                                            c-0.575-0.37-0.956-0.886-1.121-1.295c-0.169-0.412-0.157-0.692-0.095-0.707c0.142-0.044,0.48,0.933,1.497,1.562
                                                                            C172.447,136.645,173.476,136.544,173.495,136.691z"/>
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <path style="fill:#FFFFFF;" d="M186.812,140.104c0.059,0.035,0.076,0.149-0.018,0.285c-0.09,0.135-0.3,0.257-0.542,0.257
                                                                            c-0.242,0.002-0.453-0.117-0.546-0.25c-0.096-0.135-0.08-0.249-0.021-0.285c0.134-0.062,0.324,0.025,0.564,0.013
                                                                            C186.488,140.133,186.677,140.043,186.812,140.104z"/>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                            <g>
                                                                <g>
                                                                    <g>
                                                                        <g>
                                                                            <g>
                                                                                <g>
                                                                                    
                                                                                        <ellipse transform="matrix(0.8654 -0.5011 0.5011 0.8654 -15.5844 155.3287)" style="fill:#FF725E;" cx="281.326" cy="106.672" rx="35.532" ry="25.523"/>
                                                                                </g>
                                                                                <g style="opacity:0.2;">
                                                                                    
                                                                                        <ellipse transform="matrix(0.8654 -0.5011 0.5011 0.8654 -15.5844 155.3287)" cx="281.326" cy="106.672" rx="35.532" ry="25.523"/>
                                                                                </g>
                                                                                <g>
                                                                                    
                                                                                        <ellipse transform="matrix(0.8654 -0.5011 0.5011 0.8654 -13.3429 153.0797)" style="fill:#FF725E;" cx="278.259" cy="101.375" rx="35.532" ry="25.523"/>
                                                                                </g>
                                                                                <g style="opacity:0.1;">
                                                                                    <path style="fill:#FFFFFF;" d="M256.528,89.279c0.993,0.682,2.355,2.729,2.748,4.015c1.428,4.674,0.525,9.854-1.964,14.458
                                                                                        c-2.41,4.458-5.861,8.165-9.886,11.272c-5.127-9.052-2.016-21.161,6.845-30.809
                                                                                        C255.068,88.457,255.824,88.794,256.528,89.279z"/>
                                                                                </g>
                                                                                <g>
                                                                                    <path style="fill:#FF725E;" d="M287.123,117.999c13.052-7.557,19.311-21.147,13.979-30.354s-20.233-10.545-33.285-2.987
                                                                                        c-13.052,7.557-19.31,21.147-13.979,30.355C259.169,124.22,274.071,125.556,287.123,117.999z"/>
                                                                                </g>
                                                                                <g style="opacity:0.2;">
                                                                                    <path d="M287.123,117.999c13.052-7.557,19.311-21.147,13.979-30.354s-20.233-10.545-33.285-2.987
                                                                                        c-13.052,7.557-19.31,21.147-13.979,30.355C259.169,124.22,274.071,125.556,287.123,117.999z"/>
                                                                                </g>
                                                                                <g>
                                                                                    <path style="fill:#FF725E;" d="M288.16,118.475c12.737-7.375,18.876-20.582,13.712-29.5
                                                                                        c-5.163-8.917-19.673-10.167-32.41-2.792c-12.737,7.375-18.876,20.582-13.713,29.499
                                                                                        C260.913,124.6,275.423,125.851,288.16,118.475z"/>
                                                                                </g>
                                                                                <g style="opacity:0.2;">
                                                                                    <path style="fill:#FFFFFF;" d="M288.221,118.58c12.737-7.375,18.876-20.582,13.712-29.5
                                                                                        c-5.163-8.917-19.673-10.167-32.41-2.792c-12.737,7.375-18.876,20.582-13.713,29.499
                                                                                        C260.973,124.705,275.484,125.955,288.221,118.58z"/>
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <g>
                                                                            <path style="fill:#FF725E;" d="M286.768,106.473c3.091-1.79,4.844-4.912,3.416-8.496l3.394-1.965l-0.999-1.725L291.3,93.93
                                                                                l0.455,0.833l-2.54,1.471c-1.376-1.957-3.503-3.394-5.501-3.699l-2.512,2.719c1.809,0.329,3.602,1.398,4.74,2.875l-6.06,3.509
                                                                                c-2.171-1.862-4.712-3.734-8.924-1.295c-3.091,1.79-4.886,4.908-3.44,8.454l-3.424,1.983l0.578,0.998l-0.844,0.489l1.265,0.239
                                                                                l3.364-1.948c0.716,1.041,1.854,1.795,3.06,2.336l-0.025,0.501l1.583,0.094l0.419-0.444l1.823-1.93l0.156-0.166
                                                                                c0,0-0.737-0.143-1.573-0.501c-0.878-0.5-1.604-1.1-2.154-1.767c-0.004-0.007-0.008-0.014-0.012-0.021l6.116-3.541
                                                                                C280.02,106.98,282.555,108.912,286.768,106.473z M270.821,106.885c-0.532-1.687,0.193-2.95,1.527-3.722
                                                                                c1.455-0.842,2.645-0.324,3.867,0.599L270.821,106.885z M271.729,108.663L271.729,108.663L271.729,108.663L271.729,108.663z
                                                                                M285.481,103.622c-1.485,0.86-2.718,0.338-3.964-0.627l5.364-3.106C287.436,101.619,286.784,102.867,285.481,103.622z"/>
                                                                        </g>
                                                                    </g>
                                                                    <g style="opacity:0.3;">
                                                                        <g>
                                                                            <path d="M286.768,106.473c3.091-1.79,4.844-4.912,3.416-8.496l3.394-1.965l-0.999-1.725L291.3,93.93l0.455,0.833l-2.54,1.471
                                                                                c-1.376-1.957-3.503-3.394-5.501-3.699l-2.512,2.719c1.809,0.329,3.602,1.398,4.74,2.875l-6.06,3.509
                                                                                c-2.171-1.862-4.712-3.734-8.924-1.295c-3.091,1.79-4.886,4.908-3.44,8.454l-3.424,1.983l0.578,0.998l-0.844,0.489l1.265,0.239
                                                                                l3.364-1.948c0.716,1.041,1.854,1.795,3.06,2.336l-0.025,0.501l1.583,0.094l0.419-0.444l1.823-1.93l0.156-0.166
                                                                                c0,0-0.737-0.143-1.573-0.501c-0.878-0.5-1.604-1.1-2.154-1.767c-0.004-0.007-0.008-0.014-0.012-0.021l6.116-3.541
                                                                                C280.02,106.98,282.555,108.912,286.768,106.473z M270.821,106.885c-0.532-1.687,0.193-2.95,1.527-3.722
                                                                                c1.455-0.842,2.645-0.324,3.867,0.599L270.821,106.885z M271.729,108.663L271.729,108.663L271.729,108.663L271.729,108.663z
                                                                                M285.481,103.622c-1.485,0.86-2.718,0.338-3.964-0.627l5.364-3.106C287.436,101.619,286.784,102.867,285.481,103.622z"/>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <path style="fill:#FF725E;" d="M285.526,106.244c-4.212,2.439-6.747,0.505-8.918-1.356l-6.121,3.544
                                                                            c0.828,1.008,2.026,1.89,3.611,2.462l-2.56,2.634c-1.719-0.524-3.299-1.715-4.323-3.201l-3.364,1.948l-0.999-1.726l3.424-1.983
                                                                            c-1.448-3.548,0.348-6.666,3.439-8.456c4.212-2.439,6.753-0.566,8.924,1.298l6.06-3.509c-1.138-1.477-2.931-2.547-4.74-2.876
                                                                            l2.511-2.72c1.998,0.304,4.125,1.742,5.501,3.701l3.364-1.948l0.999,1.726l-3.394,1.965
                                                                            C290.369,101.331,288.616,104.455,285.526,106.244z M271.104,102.93c-1.333,0.772-2.058,2.035-1.526,3.724l5.394-3.123
                                                                            C273.749,102.607,272.559,102.088,271.104,102.93z M285.637,99.66l-5.363,3.105c1.246,0.964,2.48,1.486,3.964,0.626
                                                                            C285.542,102.637,286.194,101.388,285.637,99.66z"/>
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <path style="fill:#FFFFFF;" d="M270.525,77.362c0.049,0.1-1.512,0.882-3.891,2.371c-2.379,1.484-5.538,3.749-8.642,6.692
                                                                            c-3.096,2.952-5.517,5.994-7.119,8.296c-1.606,2.301-2.465,3.82-2.563,3.767c-0.04-0.022,0.138-0.421,0.494-1.128
                                                                            c0.349-0.71,0.92-1.705,1.681-2.899c1.516-2.39,3.914-5.523,7.052-8.514c3.144-2.983,6.393-5.22,8.856-6.614
                                                                            c1.231-0.7,2.253-1.22,2.98-1.533C270.097,77.478,270.505,77.321,270.525,77.362z"/>
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <path style="fill:#FFFFFF;" d="M283.303,74.207c0.03,0.18-1.635,0.603-3.718,0.944c-2.084,0.342-3.796,0.473-3.825,0.293
                                                                            c-0.03-0.18,1.635-0.603,3.719-0.945C281.561,74.158,283.273,74.027,283.303,74.207z"/>
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <path style="fill:#FFFFFF;" d="M273.125,99.885c0.011,0.194-1.401,0.335-2.82,1.235c-1.437,0.872-2.19,2.075-2.359,1.978
                                                                            c-0.166-0.049,0.401-1.551,2.011-2.539C271.557,99.556,273.155,99.714,273.125,99.885z"/>
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <path style="fill:#FFFFFF;" d="M301.82,107.187c0.063,0.036-0.545,1.276-1.849,3.081c-1.299,1.804-3.359,4.128-6.031,6.242
                                                                            c-2.679,2.107-5.42,3.569-7.477,4.412c-2.059,0.848-3.406,1.151-3.427,1.08c-0.034-0.103,1.255-0.562,3.236-1.506
                                                                            c1.982-0.94,4.63-2.437,7.259-4.504c2.622-2.074,4.694-4.301,6.07-6.009C300.981,108.277,301.727,107.13,301.82,107.187z"/>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                            <g>
                                                                <g>
                                                                    <g>
                                                                        <g>
                                                                            <g>
                                                                                <g>
                                                                                    
                                                                                        <ellipse transform="matrix(0.5362 -0.8441 0.8441 0.5362 22.2164 355.1937)" style="fill:#FF725E;" cx="334.333" cy="157.38" rx="21.911" ry="30.503"/>
                                                                                </g>
                                                                                <g style="opacity:0.2;">
                                                                                    
                                                                                        <ellipse transform="matrix(0.5362 -0.8441 0.8441 0.5362 22.2164 355.1937)" cx="334.333" cy="157.38" rx="21.911" ry="30.503"/>
                                                                                </g>
                                                                                <g>
                                                                                    
                                                                                        <ellipse transform="matrix(0.5362 -0.8441 0.8441 0.5362 27.2663 355.5143)" style="fill:#FF725E;" cx="337.151" cy="152.945" rx="21.911" ry="30.503"/>
                                                                                </g>
                                                                                <g style="opacity:0.1;">
                                                                                    <path style="fill:#FFFFFF;" d="M356.217,143.335c-0.875,0.55-2.116,2.258-2.499,3.347c-1.389,3.959-0.798,8.433,1.175,12.471
                                                                                        c1.91,3.909,4.739,7.21,8.082,10.017c4.717-7.584,2.475-18.08-4.785-26.668C357.499,142.682,356.838,142.944,356.217,143.335
                                                                                        z"/>
                                                                                </g>
                                                                                <g>
                                                                                    <path style="fill:#FF725E;" d="M328.961,166.891c-10.929-6.943-15.818-18.82-10.921-26.529
                                                                                        c4.898-7.71,17.727-8.331,28.656-1.389c10.929,6.943,15.818,18.82,10.92,26.53
                                                                                        C352.719,173.213,339.89,173.834,328.961,166.891z"/>
                                                                                </g>
                                                                                <g style="opacity:0.2;">
                                                                                    <path d="M328.961,166.891c-10.929-6.943-15.818-18.82-10.921-26.529c4.898-7.71,17.727-8.331,28.656-1.389
                                                                                        c10.929,6.943,15.818,18.82,10.92,26.53C352.719,173.213,339.89,173.834,328.961,166.891z"/>
                                                                                </g>
                                                                                <g>
                                                                                    <path style="fill:#FF725E;" d="M328.055,167.263c-10.665-6.775-15.465-18.32-10.722-25.787
                                                                                        c4.743-7.466,17.234-8.027,27.899-1.252c10.665,6.775,15.465,18.32,10.722,25.786
                                                                                        C351.21,173.478,338.72,174.038,328.055,167.263z"/>
                                                                                </g>
                                                                                <g style="opacity:0.2;">
                                                                                    <path style="fill:#FFFFFF;" d="M327.999,167.351c-10.665-6.775-15.465-18.32-10.722-25.787
                                                                                        c4.743-7.466,17.234-8.027,27.899-1.252c10.665,6.775,15.465,18.32,10.722,25.786
                                                                                        C351.155,173.566,338.664,174.126,327.999,167.351z"/>
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <g>
                                                                            <path style="fill:#FF725E;" d="M337.369,156.17l5.121,3.253c-0.003,0.006-0.008,0.011-0.011,0.018
                                                                                c-0.496,0.552-1.139,1.041-1.91,1.439c-0.73,0.278-1.367,0.374-1.367,0.374l0.128,0.148l1.495,1.72l0.344,0.395l1.361-0.025
                                                                                l-0.004-0.431c1.054-0.421,2.057-1.028,2.707-1.895l2.817,1.789l1.094-0.16l-0.707-0.449l0.531-0.836l-2.867-1.822
                                                                                c1.366-2.99-0.065-5.729-2.653-7.373c-3.527-2.241-5.772-0.724-7.7,0.796l-5.075-3.224c1.028-1.226,2.604-2.08,4.167-2.299
                                                                                l-2.059-2.421c-1.724,0.191-3.599,1.349-4.848,2.979l-2.127-1.351l0.42-0.699l-1.109,0.261l-0.918,1.445l2.842,1.806
                                                                                c-1.351,3.024,0.042,5.764,2.63,7.408C333.199,159.258,335.442,157.691,337.369,156.17z M338.82,155.064
                                                                                c1.081-0.748,2.12-1.151,3.338-0.377c1.116,0.709,1.694,1.818,1.178,3.246L338.82,155.064z M342.495,159.426L342.495,159.426
                                                                                L342.495,159.426C342.495,159.426,342.495,159.426,342.495,159.426z M329.808,151.367l4.491,2.853
                                                                                c-1.103,0.783-2.179,1.188-3.422,0.398C329.786,153.924,329.27,152.83,329.808,151.367z"/>
                                                                        </g>
                                                                    </g>
                                                                    <g style="opacity:0.3;">
                                                                        <g>
                                                                            <path d="M337.369,156.17l5.121,3.253c-0.003,0.006-0.008,0.011-0.011,0.018c-0.496,0.552-1.139,1.041-1.91,1.439
                                                                                c-0.73,0.278-1.367,0.374-1.367,0.374l0.128,0.148l1.495,1.72l0.344,0.395l1.361-0.025l-0.004-0.431
                                                                                c1.054-0.421,2.057-1.028,2.707-1.895l2.817,1.789l1.094-0.16l-0.707-0.449l0.531-0.836l-2.867-1.822
                                                                                c1.366-2.99-0.065-5.729-2.653-7.373c-3.527-2.241-5.772-0.724-7.7,0.796l-5.075-3.224c1.028-1.226,2.604-2.08,4.167-2.299
                                                                                l-2.059-2.421c-1.724,0.191-3.599,1.349-4.848,2.979l-2.127-1.351l0.42-0.699l-1.109,0.261l-0.918,1.445l2.842,1.806
                                                                                c-1.351,3.024,0.042,5.764,2.63,7.408C333.199,159.258,335.442,157.691,337.369,156.17z M338.82,155.064
                                                                                c1.081-0.748,2.12-1.151,3.338-0.377c1.116,0.709,1.694,1.818,1.178,3.246L338.82,155.064z M342.495,159.426L342.495,159.426
                                                                                L342.495,159.426C342.495,159.426,342.495,159.426,342.495,159.426z M329.808,151.367l4.491,2.853
                                                                                c-1.103,0.783-2.179,1.188-3.422,0.398C329.786,153.924,329.27,152.83,329.808,151.367z"/>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <path style="fill:#FF725E;" d="M328.118,149.454l-2.842-1.805l0.918-1.445l2.816,1.789c1.25-1.63,3.126-2.788,4.849-2.979
                                                                            l2.06,2.421c-1.564,0.219-3.139,1.072-4.168,2.299l5.075,3.224c1.929-1.521,4.173-3.037,7.701-0.797
                                                                            c2.588,1.645,4.019,4.384,2.653,7.374l2.867,1.822l-0.918,1.445l-2.817-1.79c-0.929,1.239-2.327,2.207-3.819,2.595l-2.105-2.352
                                                                            c1.381-0.433,2.438-1.146,3.184-1.984l-5.125-3.257c-1.928,1.521-4.171,3.089-7.698,0.849
                                                                            C328.16,155.22,326.767,152.479,328.118,149.454z M331.953,154.463c1.243,0.79,2.319,0.385,3.423-0.398l-4.492-2.854
                                                                            C330.346,152.675,330.862,153.77,331.953,154.463z M339.897,154.909l4.516,2.869c0.516-1.429-0.062-2.538-1.178-3.247
                                                                            C342.016,153.758,340.977,154.161,339.897,154.909z"/>
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <path style="fill:#FFFFFF;" d="M344.631,132.62c0.015-0.028,0.356,0.128,0.961,0.435c0.609,0.3,1.463,0.787,2.491,1.435
                                                                            c2.056,1.29,4.756,3.326,7.344,5.992c2.583,2.673,4.531,5.437,5.755,7.533c0.614,1.048,1.074,1.917,1.354,2.535
                                                                            c0.287,0.615,0.432,0.961,0.404,0.975c-0.071,0.036-0.742-1.304-2.031-3.342c-1.285-2.038-3.252-4.741-5.807-7.386
                                                                            c-2.561-2.638-5.199-4.69-7.195-6.039C345.912,133.404,344.593,132.69,344.631,132.62z"/>
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <path style="fill:#FFFFFF;" d="M333.782,129.463c0.025-0.122,1.485,0.076,3.259,0.442c1.775,0.367,3.193,0.763,3.168,0.885
                                                                            c-0.025,0.122-1.484-0.076-3.259-0.442C335.175,129.982,333.757,129.585,333.782,129.463z"/>
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <path style="fill:#FFFFFF;" d="M341.607,151.848c-0.019-0.116,1.34-0.171,2.661,0.737c1.332,0.893,1.783,2.177,1.668,2.202
                                                                            c-0.119,0.065-0.705-1.018-1.922-1.827C342.813,152.128,341.59,151.982,341.607,151.848z"/>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                            <g>
                                                                <g>
                                                                    <g>
                                                                        <g>
                                                                            <g>
                                                                                <path style="fill:#FF725E;" d="M217.06,69.629c0.359-6.296,4.253-15.011,10.606-23.52c6.353-8.508,13.604-14.717,19.539-16.85
                                                                                    l2.718-3.64l5.471,4.086c5.927,4.426,2.767,18.68-7.058,31.838c-9.826,13.159-22.596,20.236-28.522,15.811l-5.471-4.086
                                                                                    L217.06,69.629z"/>
                                                                            </g>
                                                                            <g style="opacity:0.3;">
                                                                                <path d="M217.06,69.629c0.359-6.296,4.253-15.011,10.606-23.52c6.353-8.508,13.604-14.717,19.539-16.85l2.718-3.64
                                                                                    l5.471,4.086c5.927,4.426,2.767,18.68-7.058,31.838c-9.826,13.159-22.596,20.236-28.522,15.811l-5.471-4.086L217.06,69.629z"
                                                                                    />
                                                                            </g>
                                                                            <g>
                                                                                <path style="fill:#FF725E;" d="M243.251,57.746c9.825-13.158,12.99-27.409,7.069-31.83
                                                                                    c-5.921-4.421-18.686,2.661-28.511,15.819c-9.826,13.159-12.99,27.409-7.069,31.83
                                                                                    C220.661,77.987,233.425,70.905,243.251,57.746z"/>
                                                                            </g>
                                                                            <g style="opacity:0.1;">
                                                                                <path style="fill:#FFFFFF;" d="M238.195,36.23c-0.781,2.94-1.495,6.008-2.69,8.816c-4.262,10.02-13.207,17.903-23.728,20.186
                                                                                    c0.277-6.431,3.822-15.181,10.032-23.497c5.945-7.962,12.966-13.694,18.896-16.003
                                                                                    C239.971,29.255,239.119,32.754,238.195,36.23z"/>
                                                                            </g>
                                                                            <g>
                                                                                <path style="fill:#FF725E;" d="M238.58,54.947c7.551-10.113,11.697-19.748,7.719-22.718
                                                                                    c-4.222-3.153-14.573,1.85-22.124,11.962c-7.551,10.112-10.448,20.718-6.471,23.688c0.976,0.729,2.038,1.522,5.012,1.14
                                                                                    C227.411,68.415,232.882,62.578,238.58,54.947z"/>
                                                                            </g>
                                                                            <g style="opacity:0.3;">
                                                                                <path d="M238.58,54.947c7.551-10.113,11.697-19.748,7.719-22.718c-4.222-3.153-14.573,1.85-22.124,11.962
                                                                                    c-7.551,10.112-10.448,20.718-6.471,23.688c0.976,0.729,2.038,1.522,5.012,1.14C227.411,68.415,232.882,62.578,238.58,54.947z
                                                                                    "/>
                                                                            </g>
                                                                            <g>
                                                                                <path style="fill:#FF725E;" d="M240.553,55.732c7.369-9.869,10.118-20.276,6.141-23.246
                                                                                    c-3.977-2.97-13.176,2.621-20.545,12.49c-7.369,9.869-10.118,20.276-6.14,23.246
                                                                                    C223.986,71.193,233.184,65.601,240.553,55.732z"/>
                                                                            </g>
                                                                            <g style="opacity:0.2;">
                                                                                <path style="fill:#FFFFFF;" d="M240.553,55.732c7.369-9.869,10.118-20.276,6.141-23.246
                                                                                    c-3.977-2.97-13.176,2.621-20.545,12.49c-7.369,9.869-10.118,20.276-6.14,23.246
                                                                                    C223.986,71.193,233.184,65.601,240.553,55.732z"/>
                                                                            </g>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <g>
                                                                                <path style="fill:#FF725E;" d="M238.943,50.577c1.689-2.2,2.167-4.85,0.381-6.769l1.855-2.416l-1.071-0.822l-0.949,0.18
                                                                                    l0.499,0.406l-1.388,1.808c-1.379-0.853-3.15-1.115-4.574-0.666l-1.085,2.63c1.302-0.372,2.762-0.245,3.871,0.366
                                                                                    l-3.312,4.314c-1.897-0.531-4.047-0.947-6.349,2.051c-1.689,2.2-2.196,4.862-0.407,6.749l-1.871,2.437l0.62,0.476
                                                                                    l-0.461,0.601l0.913-0.254l1.838-2.394c0.723,0.459,1.667,0.59,2.608,0.556l0.097,0.342l1.096-0.454l0.183-0.432l0.797-1.88
                                                                                    l0.068-0.161c0,0-0.532,0.145-1.181,0.18c-0.71-0.046-1.339-0.208-1.864-0.472c-0.004-0.004-0.009-0.006-0.013-0.01
                                                                                    l3.342-4.354C234.481,53.117,236.641,53.575,238.943,50.577z M228.219,56.056c-0.745-0.949-0.541-2.026,0.187-2.975
                                                                                    c0.795-1.035,1.721-1.079,2.76-0.864L228.219,56.056z M229.24,56.943L229.24,56.943L229.24,56.943L229.24,56.943z
                                                                                    M237.42,49.099c-0.811,1.057-1.767,1.112-2.832,0.877l2.931-3.818C238.29,47.128,238.132,48.172,237.42,49.099z"/>
                                                                            </g>
                                                                        </g>
                                                                        <g style="opacity:0.3;">
                                                                            <g>
                                                                                <path d="M238.943,50.577c1.689-2.2,2.167-4.85,0.381-6.769l1.855-2.416l-1.071-0.822l-0.949,0.18l0.499,0.406l-1.388,1.808
                                                                                    c-1.379-0.853-3.15-1.115-4.574-0.666l-1.085,2.63c1.302-0.372,2.762-0.245,3.871,0.366l-3.312,4.314
                                                                                    c-1.897-0.531-4.047-0.947-6.349,2.051c-1.689,2.2-2.196,4.862-0.407,6.749l-1.871,2.437l0.62,0.476l-0.461,0.601l0.913-0.254
                                                                                    l1.838-2.394c0.723,0.459,1.667,0.59,2.608,0.556l0.097,0.342l1.096-0.454l0.183-0.432l0.797-1.88l0.068-0.161
                                                                                    c0,0-0.532,0.145-1.181,0.18c-0.71-0.046-1.339-0.208-1.864-0.472c-0.004-0.004-0.009-0.006-0.013-0.01l3.342-4.354
                                                                                    C234.481,53.117,236.641,53.575,238.943,50.577z M228.219,56.056c-0.745-0.949-0.541-2.026,0.187-2.975
                                                                                    c0.795-1.035,1.721-1.079,2.76-0.864L228.219,56.056z M229.24,56.943L229.24,56.943L229.24,56.943L229.24,56.943z
                                                                                    M237.42,49.099c-0.811,1.057-1.767,1.112-2.832,0.877l2.931-3.818C238.29,47.128,238.132,48.172,237.42,49.099z"/>
                                                                            </g>
                                                                        </g>
                                                                        <g>
                                                                            <path style="fill:#FF725E;" d="M238.083,50.506c-2.111,3.134-4.295,2.81-6.221,2.399l-3.067,4.556
                                                                                c0.815,0.352,1.839,0.483,3.031,0.271l-0.971,2.656c-1.27,0.292-2.628,0.098-3.7-0.492L225.47,62.4l-1.12-0.754l1.715-2.549
                                                                                c-1.903-1.773-1.562-4.46-0.014-6.761c2.112-3.136,4.283-2.853,6.209-2.441l3.037-4.511c-1.144-0.542-2.609-0.576-3.886-0.125
                                                                                l0.92-2.693c1.394-0.536,3.176-0.385,4.606,0.382l1.686-2.505l1.12,0.754l-1.7,2.526
                                                                                C239.945,45.53,239.632,48.204,238.083,50.506z M227.722,53.656c-0.669,0.993-0.805,2.08-0.003,2.982l2.704-4.014
                                                                                C229.373,52.473,228.451,52.573,227.722,53.656z M236.387,46.183l-2.688,3.993c1.077,0.168,2.029,0.053,2.772-1.051
                                                                                C237.126,48.155,237.217,47.102,236.387,46.183z"/>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path style="fill:#263238;" d="M225.214,68.832c-0.063-0.115,1.677-1.08,4.299-2.9c2.615-1.816,6.065-4.61,9.095-8.413
                                                                                c3.053-3.78,5.197-7.667,6.653-10.508c1.446-2.854,2.253-4.669,2.37-4.62c0.049,0.021-0.101,0.496-0.414,1.339
                                                                                c-0.301,0.849-0.809,2.048-1.465,3.519c-1.339,2.92-3.433,6.904-6.544,10.756c-3.088,3.875-6.672,6.664-9.392,8.381
                                                                                c-1.359,0.869-2.503,1.501-3.313,1.896C225.697,68.681,225.24,68.879,225.214,68.832z"/>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <path style="fill:#FFFFFF;" d="M234.979,29.955c-0.053-0.088,0.678-0.664,1.942-1.485c1.264-0.808,3.086-1.889,5.33-2.579
                                                                            c2.249-0.691,4.454-0.685,5.949-0.303c1.51,0.368,2.285,0.971,2.238,1.041c-0.055,0.115-0.897-0.295-2.342-0.505
                                                                            c-1.437-0.226-3.487-0.147-5.622,0.506c-2.137,0.656-3.955,1.629-5.28,2.311C235.872,29.635,235.035,30.049,234.979,29.955z"/>
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <path style="fill:#FFFFFF;" d="M233.908,42.948c-0.065-0.198,0.664-0.602,1.659-0.606c0.995-0.008,1.73,0.387,1.667,0.585
                                                                            c-0.06,0.209-0.792,0.177-1.662,0.187C234.703,43.115,233.971,43.157,233.908,42.948z"/>
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <path style="fill:#FFFFFF;" d="M256.899,35.023c-0.224,0.005-0.39-1.231-1.03-2.574c-0.619-1.354-1.46-2.274-1.313-2.442
                                                                            c0.116-0.167,1.307,0.59,2.012,2.115C257.285,33.642,257.102,35.041,256.899,35.023z"/>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                        <g id="Sparkles">
                                                            <g>
                                                                <g>
                                                                    <polygon style="fill:#FFFFFF;" points="194.651,197.566 196.179,200.361 198.974,201.889 196.179,203.418 194.651,206.213 
                                                                        193.122,203.418 190.327,201.889 193.122,200.361 			"/>
                                                                </g>
                                                                <g>
                                                                    <polygon style="fill:#F5F5F5;" points="237.802,164.556 238.843,166.46 240.747,167.501 238.843,168.543 237.802,170.447 
                                                                        236.76,168.543 234.856,167.501 236.76,166.46 			"/>
                                                                </g>
                                                                <g>
                                                                    <polygon style="fill:#F5F5F5;" points="261.067,86.176 262.108,88.08 264.012,89.122 262.108,90.163 261.067,92.067 
                                                                        260.025,90.163 258.121,89.122 260.025,88.08 			"/>
                                                                </g>
                                                                <g>
                                                                    <polygon style="fill:#F5F5F5;" points="158.913,127.075 159.955,128.979 161.859,130.021 159.955,131.062 158.913,132.966 
                                                                        157.872,131.062 155.968,130.021 157.872,128.979 			"/>
                                                                </g>
                                                                <g>
                                                                    <polygon style="fill:#FFFFFF;" points="296.249,186.202 297.938,189.291 301.027,190.981 297.938,192.67 296.249,195.759 
                                                                        294.56,192.67 291.471,190.981 294.56,189.291 			"/>
                                                                </g>
                                                                <g>
                                                                    <polygon style="fill:#F5F5F5;" points="249.964,242.222 251.426,244.896 254.1,246.359 251.426,247.821 249.964,250.495 
                                                                        248.501,247.821 245.828,246.359 248.501,244.896 			"/>
                                                                </g>
                                                                <g>
                                                                    <polygon style="fill:#F5F5F5;" points="279.767,217.494 280.736,219.267 282.509,220.236 280.736,221.205 279.767,222.978 
                                                                        278.798,221.205 277.026,220.236 278.798,219.267 			"/>
                                                                </g>
                                                                <g>
                                                                    <polygon style="fill:#F5F5F5;" points="286.533,208.201 286.866,208.809 287.475,209.143 286.866,209.475 286.533,210.084 
                                                                        286.2,209.475 285.591,209.143 286.2,208.809 			"/>
                                                                </g>
                                                                <g>
                                                                    <polygon style="fill:#F5F5F5;" points="227.513,187.532 227.846,188.141 228.455,188.474 227.846,188.807 227.513,189.415 
                                                                        227.18,188.807 226.571,188.474 227.18,188.141 			"/>
                                                                </g>
                                                            </g>
                                                            <g>
                                                                <polygon style="fill:#F5F5F5;" points="336.313,101.012 337.703,103.552 340.243,104.941 337.703,106.331 336.313,108.871 
                                                                    334.924,106.331 332.384,104.941 334.924,103.552 		"/>
                                                            </g>
                                                            <g>
                                                                <polygon style="fill:#EBEBEB;" points="365.185,197.165 366.575,199.705 369.115,201.095 366.575,202.484 365.185,205.024 
                                                                    363.796,202.484 361.256,201.095 363.796,199.705 		"/>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                
                                                
                                                
                                                </div>
                                                <div class="flex flex-col flex-grow mt-2">

                                                    <p class="font-Allerta text-xs md:text-sm font-bold text-blue-500"> 1er lugar=<span class="text-yellow-500 text-xs md:text-sm font-bold">{{$this->ganancia_sorteo_primer()}}$</span></p>
                                                    <p class="font-Allerta text-xs md:text-sm font-bold text-blue-500"> 2do lugar=<span class="text-yellow-500 text-xs md:text-sm font-bold">{{$this->ganancia_sorteo_segundo()}}$</span></p>
                                                    <p class="font-Allerta text-xs md:text-sm font-bold text-blue-500"> 3er lugar=<span class="text-yellow-500 text-xs md:text-sm font-bold">{{$this->ganancia_sorteo_tercero()}}$</span></p>
                                         
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div> 


                              <div class="w-full bg-white border p-2 border-gray-200 rounded-b-lg shadow ">

                                <div id="accordion-flush" data-accordion="collapse"
                                    data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white"
                                    data-inactive-classes="text-gray-500 dark:text-gray-400">

                                 <h2 id="accordion-flush-heading-3">
                                        <button wire:click="visible_todos"
                                            type="button"
                                            class="flex justify-between items-center py-5 w-full font-medium text-left text-gray-500  border-gray-200 dark:border-gray-700 dark:text-gray-400 focus:outline-none  " 
                                            data-accordion-target="#accordion-flush-body-3" 
                                            aria-expanded="false"
                                             aria-controls="accordion-flush-body-3"
                                             wire:loading.attr="disabled"
                                             wire:loading.class="opacity-50 cursor-not-allowed"
                                             x-data="{ isLoading: false }"
                                             wire:loading.attr="disabled"
                                            wire:loading.class="opacity-50 cursor-not-allowed">
                                        
                                            
                                            <span wire:loading.remove x-show="!isLoading" class="font-Allerta text-sm md:text-md lg:text-lg font-bold text-blue-500 ml-4">CARTONES DE TODOS LOS PARTICIPANTES</span>
                                            
                                            <span wire:loading.delay x-show="isLoading">
                                                <div class="flex space-x-2">
                                                    <p class="font-Allerta text-sm md:text-md lg:text-lg font-bold text-blue-500  mr-2 ml-6" > CARGANDO </p>
                                                    <div class="w-3 h-3 bg-blue-300 rounded-full animate-bounce" style="animation-delay: 0s"></div>
                                                    <div class="w-3 h-3 bg-blue-300 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                                                    <div class="w-3 h-3 bg-blue-300 rounded-full animate-bounce" style="animation-delay: 0.4s"></div>
                                                  </div>
                                            </span>
                                            
                                            <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        
                                        

                                        </button>

                                        
                                    </h2> 
                                    <div id="accordion-flush-body-3" class="@if($visible == 0) hidden @endif" aria-labelledby="accordion-flush-heading-3">
                                        <div class="py-5  ">
                                            <div class="flex overflow-x-auto  ">
                                                @foreach ($cartones_todos as $todo_c)
                         
                                                         <div class=" bg-blue-500 mr-2 rounded-md shadow-md w-24  ">
                                                            <div class="grid grid-cols-5 gap-0.5 justify-center mb-0.5 mt-1 w-24 ">  
                                                    
                                                                <div class=" bg-blue-500 text-white justify-center ml-1 text-xs text-center  py-2 font-bold">B</div>  
                                                                <div class=" bg-blue-500 text-white justify-center mx-0.5 text-xs  text-center  py-2 font-bold">I</div>  
                                                                <div class=" bg-blue-500 text-white justify-center mx-0.5 text-xs  text-center py-2  font-bold">N</div>  
                                                                <div class=" bg-blue-500 text-white justify-center mx-0.5 text-xs  text-center py-2  font-bold">G</div>  
                                                                <div class=" bg-blue-500 text-white justify-center mr-1 text-xs  text-center py-2  font-bold">O</div>  
                                                            </div>  
                                                    
                                                            <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1  w-22  mb-0.5">  
                                                                @foreach (json_decode($todo_c->carton->content_1) as $item)
                                                                    <div class="bg-gray-100  {{$this->background($item)}}  text-xs justify-center text-center py-2 font-bold">{{$item}}</div>  
                                                                @endforeach
                                                            </div>  
                                                    
                                                            <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1 w-22  mb-0.5">  
                                                                @foreach (json_decode($todo_c->carton->content_2) as $item)
                                                                    <div class="bg-gray-100 {{$this->background($item)}}  text-xs justify-center text-center py-2 font-bold">{{$item}}</div>  
                                                                @endforeach
                                                            </div> 
                
                                                            <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1 w-22  mb-0.5">  
                                                                @foreach (json_decode($todo_c->carton->content_3) as $item)
                                                                    <div class="bg-gray-100 {{$this->background($item)}} text-xs justify-center text-center py-2 font-bold">{{$item}}</div>  
                                                                @endforeach
                                                            </div> 
                                                    
                                                            <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1 w-22  mb-0.5">  
                                                                @foreach (json_decode($todo_c->carton->content_4) as $item)
                                                                    <div class="bg-gray-100 {{$this->background($item)}} text-xs justify-center text-center py-2 font-bold">{{$item}}</div>  
                                                                @endforeach
                                                            </div> 
                                                    
                                                            <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1 w-22  mb-0.5">  
                                                                @foreach (json_decode($todo_c->carton->content_5) as $item)
                                                                    <div class="bg-gray-100 {{$this->background($item)}} text-xs justify-center text-center py-2 font-bold">{{$item}}</div>  
                                                                @endforeach
                                                            </div> 
                
                                                            <div class="bg-blue-600 m-1 text-center w-20 ">
                                                                <p class=" text-white  text-xs ">Cartón Nro. {{$todo_c->carton->id}}  </p>
                                                            </div>
                
                                                            <div class="bg-blue-500 m-1 text-center w-20 ">
                                                                <p class=" text-white text-xs "> {{$this->nombre($todo_c->user->name)}}</p>
                                                            </div>
                
                
                                                        </div>   
                                    
                                                        @if($ganador_1 == 0 && $user->id == 1)
                                    
                                                            @if($type_3 == 'Lineal')
                                                                    {{$this->verifi_linea_horizontal($todo_c->carton->id)}} 
                                                                    {{$this->verifi_linea_vertical($todo_c->carton->id)}}
                                                            @elseif($type_3 == 'Diagonal')
                                                                    {{$this->diagonal_iz($todo_c->carton->id)}}
                                                                    {{$this->diagonal_dr($todo_c->carton->id)}}
                                                            @elseif($type_3 == 'Cruz_grande')
                                                                    {{$this->cruz_grande($todo_c->carton->id)}}
                                                            @elseif($type_3 == 'Cruz_pequena')
                                                                    {{$this->cruz_pequeña($todo_c->carton->id)}}
                                                            @elseif($type_3 == 'Cuatro_esquinas')
                                                                    {{$this->verifi_cuatro_esquinas($todo_c->carton->id)}}
                                                            @else
                                                                {{$this->verifi_carton_lleno($todo_c->carton->id)}}
                                                            @endif
                                                        @endif

                                                        @if($ganador_1 == 1 && $ganador_2 == 0 && $user->id == 1)
                                    
                                                            @if($type_2 == 'Lineal')
                                                                    {{$this->verifi_linea_horizontal($todo_c->carton->id)}} 
                                                                    {{$this->verifi_linea_vertical($todo_c->carton->id)}}
                                                            @elseif($type_2 == 'Diagonal')
                                                                    {{$this->diagonal_iz($todo_c->carton->id)}}
                                                                    {{$this->diagonal_dr($todo_c->carton->id)}}
                                                            @elseif($type_2 == 'Cruz_grande')
                                                                    {{$this->cruz_grande($todo_c->carton->id)}}
                                                            @elseif($type_2 == 'Cruz_pequena')
                                                                    {{$this->cruz_pequeña($todo_c->carton->id)}}
                                                            @elseif($type_2 == 'Cuatro_esquinas')
                                                                    {{$this->verifi_cuatro_esquinas($todo_c->carton->id)}}
                                                            @else
                                                                {{$this->verifi_carton_lleno($todo_c->carton->id)}}
                                                            @endif
                                    
                                                        @endif

                                                        @if($ganador_1 == 1 && $ganador_2 == 1 && $ganador_3 == 0 && $user->id == 1)
                                    
                                                            @if($type_1 == 'Lineal')
                                                                    {{$this->verifi_linea_horizontal($todo_c->carton->id)}} 
                                                                    {{$this->verifi_linea_vertical($todo_c->carton->id)}}
                                                            @elseif($type_1 == 'Diagonal')
                                                                    {{$this->diagonal_iz($todo_c->carton->id)}}
                                                                    {{$this->diagonal_dr($todo_c->carton->id)}}
                                                            @elseif($type_1 == 'Cruz_grande')
                                                                    {{$this->cruz_grande($todo_c->carton->id)}}
                                                            @elseif($type_1 == 'Cruz_pequena')
                                                                    {{$this->cruz_pequeña($todo_c->carton->id)}}
                                                            @elseif($type_1 == 'Cuatro_esquinas')
                                                                    {{$this->verifi_cuatro_esquinas($todo_c->carton->id)}}
                                                            @else
                                                                {{$this->verifi_carton_lleno($todo_c->carton->id)}}
                                                            @endif
                                    
                                                        @endif

                                                @endforeach
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div> 

                        

                            <div class="grid grid-cols-5 md:grid-cols-8 gap-1 mt-4">

                                <aside class="col-start-1 col-end-6 overflow-y-hidden md:col-span-1 overflow-x-auto md:h-162 md:overflow-x-hidden md:overflow-y-auto bg-blue-500 border p-2 border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700  " >
                                    <div class="w-full flex justify-start md:flex-col md:max-h-96">
                                        <p class=" font-Allerta text-sm md:text-md lg:text-lg font-bold text-white text-center ">FICHAS</p>
                                        @foreach($fichas as $ficha)
                                            <div class="relative mr-2 md:mr-0 md:w-full mt-7">
                                                @if($ficha_ultima == $ficha->id)
                                                    <div class="w-full flex justify-center">
                                                        <div class="bg-red-500 w-16 h-16 absolute rounded-full shadow-2xl shadow-red-500 animate-ping border-2 flex justify-center items-center"></div>
                                                    </div>
                                                @endif

                                                <div class="w-full flex justify-center">
                                                    <div class="@if($ficha_ultima == $ficha->id) h-14 w-14 lg:h-16 lg:w-16 @else h-14 w-14 animate-pulse animate-fade-right @endif mx-auto my-auto border-2 rounded-full @if($ficha_ultima == $ficha->id) bg-red-700 @else bg-blue-700 @endif relative bola-3d">
                                                        <!-- Efecto de luz para el 3D -->
                                                        <div class="absolute top-1/4 left-1/4 w-1/2 h-1/2 bg-white/30 rounded-full blur-sm"></div>

                                                        <!-- Contenido de la ficha -->
                                                        <p class="text-center font-bold text-white mt-1">
                                                            {{$ficha->letra}}
                                                        </p>
                                                        <p class="text-center font-bold text-white">
                                                            {{$ficha->numero}}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                        
                                </aside>

                                <div class="col-span-3 md:col-span-5 p-2 ">

                                    <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-70 mi-div h-full">

                                        <p class=" font-Allerta text-sm md:text-md lg:text-lg font-bold text-blue-500 text-center"  >MIS CARTONES</p>

                                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-1 font-Arima mt-7 mx-1">

                                            @foreach ($mis_cartones as $carton)
                                
                                                <div class=" bg-white rounded-md shadow-md overflow-hidden">
                                                    <div class=" bg-blue-500 rounded-t-md shadow-md overflow-hidden md:max-w-xl ">
                                
                                                        <div class="flex justify-center ">
                                
                                                            <img src="{{Storage::url('img/logo4.png') }}" alt="" class="block h-16 w-36 ">
                                
                                                        </div>

                                                        <hr  class="mt-2" >
                                
                                                        <div class="grid grid-cols-5 gap-0.5 justify-center mb-0.5 mt-1">
                                
                                                            <div class="bg-blue-500 text-white justify-center text-2xl text-center ml-1  py-2  font-bold">B</div>
                                                            <div class="bg-blue-500 text-white justify-center text-2xl text-center mx-0.5 py-2 font-bold">I</div>
                                                            <div class="bg-blue-500 text-white justify-center text-2xl text-center mx-0.5 py-2 font-bold">N</div>
                                                            <div class="bg-blue-500 text-white justify-center text-2xl text-center mx-0.5 py-2 font-bold">G</div>
                                                            <div class="bg-blue-500 text-white justify-center text-2xl text-center mr-1 py-2 font-bold">O</div>
                                                        </div>
                                
                                                        <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1 mb-0.5 ">
                                                            @foreach (json_decode($carton->carton->content_1) as $item)
                                                                <div class="{{$this->background($item)}} bg-gray-100 text-lg justify-center text-center py-2 font-bold">  {{$item}}  </div>
                                                            @endforeach
                                                        </div>
                                
                                                        <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1 mb-0.5">
                                                            @foreach (json_decode($carton->carton->content_2) as $item)
                                                                <div class="{{$this->background($item)}} bg-gray-100  text-lg justify-center text-center py-2 font-bold">{{$item}} </div>
                                                            @endforeach
                                                        </div>
                                
                                                        <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1 mb-0.5">
                                                            @foreach (json_decode($carton->carton->content_3) as $item)
                                                                <div class="{{$this->background($item)}} bg-gray-100 text-lg justify-center text-center py-2 font-bold">{{$item}} </div>
                                                            @endforeach
                                                        </div>
                                
                                                        <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1 mb-0.5">
                                                            @foreach (json_decode($carton->carton->content_4) as $item)
                                                                <div class="{{$this->background($item)}} bg-gray-100 text-lg justify-center text-center py-2 font-bold">{{$item}} </div>
                                                            @endforeach
                                                        </div>
                                
                                                        <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1 mb-0.5">
                                                            @foreach (json_decode($carton->carton->content_5) as $item)
                                                                <div class="{{$this->background($item)}} bg-gray-100 text-lg justify-center text-center py-2 font-bold">{{$item}}</div>
                                                            @endforeach
                                                        </div>

                                                        <div class="bg-blue-600 m-1 text-center">
                                                            <p class=" text-white  text-xs ">CARTÓN NRO. {{$carton->carton->id}}  </p>
                                                        </div>
                                
                                                        
                                
                                                    </div>
                                                </div>

                                            @endforeach
                                
                                        </div>
                                    </div>
                                </div>

                                <div class="col-span-2 md:col-span-2 mi-estrellas  overflow-y-auto  border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 p-2 " >
                                    
                                    <p class=" font-Allerta text-sm md:text-md lg:text-lg font-bold text-blue-500 text-center "  >GANADORES</p>

                                    <div class="mt-4">
                                        @foreach($cartones_ganadores as $cg)
                                            <div class="py-1 md:py-2 md:px-6 ">
                                                    <div class=" bg-blue-500 rounded-md shadow-md overflow-hidden md:max-w-xl ">
                                                        <div class="grid grid-cols-5 gap-0.5 justify-center  mb-0.5 mt-1">  
                                                
                                                            <div class=" bg-blue-500 text-white justify-center ml-1 text-xs text-center  py-2 font-bold">B</div>  
                                                            <div class=" bg-blue-500 text-white justify-center mx-0.5 text-xs  text-center  py-2 font-bold">I</div>  
                                                            <div class=" bg-blue-500 text-white justify-center mx-0.5 text-xs  text-center py-2  font-bold">N</div>  
                                                            <div class=" bg-blue-500 text-white justify-center mx-0.5 text-xs  text-center py-2  font-bold">G</div>  
                                                            <div class=" bg-blue-500 text-white justify-center mr-1 text-xs  text-center py-2  font-bold">O</div>  
                                                        </div>  
                                                
                                                        <div class="grid grid-cols-5 gap-0.5 justify-center ml-1  mr-1 mb-0.5 ">  
                                                            @foreach (json_decode($cg->carton->content_1) as $item)
                                                            
                                                                <div class="bg-gray-100
                                                                    @if($cg->type == 'Cuatro esquinas')
                                                                        @if($this->posicion($item,'1',$cg->carton->id) == '0' || $this->posicion($item,'1',$cg->carton->id) == '4')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                    @endif 

                                                                    @if($cg->type == 'Cartón lleno')
                                                                        @if($this->posicion($item,'1',$cg->carton->id) == '0' || $this->posicion($item,'1',$cg->carton->id) == '1' || $this->posicion($item,'1',$cg->carton->id) == '2' || $this->posicion($item,'1',$cg->carton->id) == '3' || $this->posicion($item,'1',$cg->carton->id) == '4')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                    @endif 

                                                                    @if($cg->type == 'Lineal' && $cg->type_lineal == 'Horizontal' && $cg->type_numero == '1')
                                                                        @if($this->posicion($item,'1',$cg->carton->id) == '0' || $this->posicion($item,'1',$cg->carton->id) == '1' || $this->posicion($item,'1',$cg->carton->id) == '2' || $this->posicion($item,'1',$cg->carton->id) == '3' || $this->posicion($item,'1',$cg->carton->id) == '4')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                    @endif 

                                                                    @if($cg->type == 'Lineal' && $cg->type_lineal == 'Vertical' && $cg->type_numero == '1')
                                                                            @if($this->posicion($item,'1',$cg->carton->id) == '0')
                                                                            bg-yellow-500 
                                                                            @endif 
                                                                    @endif

                                                                    @if($cg->type == 'Lineal' && $cg->type_lineal == 'Vertical' && $cg->type_numero == '2')
                                                                            @if($this->posicion($item,'1',$cg->carton->id) == '1')
                                                                            bg-yellow-500 
                                                                            @endif 
                                                                    @endif

                                                                    @if($cg->type == 'Lineal' && $cg->type_lineal == 'Vertical' && $cg->type_numero == '3')
                                                                            @if($this->posicion($item,'1',$cg->carton->id) == '2')
                                                                            bg-yellow-500 
                                                                            @endif 
                                                                    @endif

                                                                    @if($cg->type == 'Lineal' && $cg->type_lineal == 'Vertical' && $cg->type_numero == '4')
                                                                            @if($this->posicion($item,'1',$cg->carton->id) == '3')
                                                                            bg-yellow-500 
                                                                            @endif 
                                                                    @endif

                                                                    @if($cg->type == 'Lineal' && $cg->type_lineal == 'Vertical' && $cg->type_numero == '5')
                                                                            @if($this->posicion($item,'1',$cg->carton->id) == '4')
                                                                            bg-yellow-500 
                                                                            @endif 
                                                                    @endif

                                                                

                                                                    @if($cg->type == 'Cuatro esquinas')
                                                                        @if($this->posicion($item,'1',$cg->carton->id) == '0' || $this->posicion($item,'1',$cg->carton->id) == '4')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                    @endif

                                                                    @if($cg->type == 'Diagonal' && $cg->type_lineal == 'Izquierda')
                                                                        @if($this->posicion($item,'1',$cg->carton->id) == '0')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                    @endif

                                                                    @if($cg->type == 'Diagonal' && $cg->type_lineal == 'Derecha')
                                                                        @if($this->posicion($item,'1',$cg->carton->id) == '4')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                    @endif 

                                                                    @if($cg->type == 'Cruz G.')
                                                                        @if($this->posicion($item,'1',$cg->carton->id) == '2')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                    @endif
                                                                    
                                                                    text-xs justify-center text-center py-2 font-bold">
                                                                    
                                                                    {{$item}}
                                                                </div>  
                                                            @endforeach
                                                        </div>  
                                                
                                                        <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1 mb-0.5"> 
                                                            @foreach (json_decode($cg->carton->content_2) as $item)
                                                                <div class="bg-gray-100  

                                                                    @if($cg->type == 'Diagonal' && $cg->type_lineal == 'Izquierda')
                                                                        @if($this->posicion($item,'2',$cg->carton->id) == '1')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                    @endif 

                                                                    @if($cg->type == 'Cartón lleno')
                                                                        @if($this->posicion($item,'2',$cg->carton->id) == '0' || $this->posicion($item,'2',$cg->carton->id) == '1' || $this->posicion($item,'2',$cg->carton->id) == '2' || $this->posicion($item,'2',$cg->carton->id) == '3' || $this->posicion($item,'2',$cg->carton->id) == '4')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                    @endif


                                                                @if($cg->type == 'Lineal' && $cg->type_lineal == 'Horizontal' && $cg->type_numero == '2')
                                                                        @if($this->posicion($item,'2',$cg->carton->id) == '0' || $this->posicion($item,'2',$cg->carton->id) == '1' || $this->posicion($item,'2',$cg->carton->id) == '2' || $this->posicion($item,'2',$cg->carton->id) == '3' || $this->posicion($item,'2',$cg->carton->id) == '4')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                    @endif 


                                                                    @if($cg->type == 'Lineal' && $cg->type_lineal == 'Vertical' && $cg->type_numero == '1')
                                                                        @if($this->posicion($item,'2',$cg->carton->id) == '0')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                @endif

                                                                @if($cg->type == 'Lineal' && $cg->type_lineal == 'Vertical' && $cg->type_numero == '2')
                                                                        @if($this->posicion($item,'2',$cg->carton->id) == '1')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                @endif

                                                                @if($cg->type == 'Lineal' && $cg->type_lineal == 'Vertical' && $cg->type_numero == '3')
                                                                        @if($this->posicion($item,'2',$cg->carton->id) == '2')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                @endif

                                                                @if($cg->type == 'Lineal' && $cg->type_lineal == 'Vertical' && $cg->type_numero == '4')
                                                                        @if($this->posicion($item,'2',$cg->carton->id) == '3')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                @endif

                                                                @if($cg->type == 'Lineal' && $cg->type_lineal == 'Vertical' && $cg->type_numero == '5')
                                                                        @if($this->posicion($item,'2',$cg->carton->id) == '4')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                @endif


                                                                    @if($cg->type == 'Diagonal' && $cg->type_lineal == 'Derecha')
                                                                        @if($this->posicion($item,'2',$cg->carton->id) == '3')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                    @endif 

                                                                    @if($cg->type == 'Cruz P.')
                                                                        @if($this->posicion($item,'2',$cg->carton->id) == '2')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                    @endif

                                                                    text-xs justify-center text-center py-2 font-bold">
                                                                    {{$item}}
                                                                </div>  
                                                            @endforeach
                                                        </div> 
                
                                                        <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1 mb-0.5">  
                                                            @foreach (json_decode($cg->carton->content_3) as $item)
                                                                <div class="bg-gray-100 
                                                                    @if($cg->type == 'Diagonal' && $cg->type_lineal == 'Izquierda')
                                                                        @if($this->posicion($item,'3',$cg->carton->id) == '2')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                    @endif

                                                                    @if($cg->type == 'Cartón lleno')
                                                                        @if($this->posicion($item,'3',$cg->carton->id) == '0' || $this->posicion($item,'3',$cg->carton->id) == '1' || $this->posicion($item,'3',$cg->carton->id) == '2' || $this->posicion($item,'3',$cg->carton->id) == '3' || $this->posicion($item,'3',$cg->carton->id) == '4')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                    @endif 

                                                                    @if($cg->type == 'Lineal' && $cg->type_lineal == 'Horizontal' && $cg->type_numero == '3')
                                                                        @if($this->posicion($item,'3',$cg->carton->id) == '0' || $this->posicion($item,'3',$cg->carton->id) == '1' || $this->posicion($item,'3',$cg->carton->id) == '2' || $this->posicion($item,'3',$cg->carton->id) == '3' || $this->posicion($item,'3',$cg->carton->id) == '4')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                    @endif 


                                                                    @if($cg->type == 'Lineal' && $cg->type_lineal == 'Vertical' && $cg->type_numero == '1')
                                                                        @if($this->posicion($item,'3',$cg->carton->id) == '0')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                @endif

                                                                @if($cg->type == 'Lineal' && $cg->type_lineal == 'Vertical' && $cg->type_numero == '2')
                                                                        @if($this->posicion($item,'3',$cg->carton->id) == '1')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                @endif

                                                                @if($cg->type == 'Lineal' && $cg->type_lineal == 'Vertical' && $cg->type_numero == '3')
                                                                        @if($this->posicion($item,'3',$cg->carton->id) == '2')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                @endif

                                                                @if($cg->type == 'Lineal' && $cg->type_lineal == 'Vertical' && $cg->type_numero == '4')
                                                                        @if($this->posicion($item,'3',$cg->carton->id) == '3')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                @endif

                                                                @if($cg->type == 'Lineal' && $cg->type_lineal == 'Vertical' && $cg->type_numero == '5')
                                                                        @if($this->posicion($item,'3',$cg->carton->id) == '4')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                @endif

                                                                    
                                                                

                                                                    @if($cg->type == 'Diagonal' && $cg->type_lineal == 'Derecha')
                                                                        @if($this->posicion($item,'3',$cg->carton->id) == '2')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                    @endif 

                                                                    @if($cg->type == 'Cruz P.')
                                                                        @if($this->posicion($item,'3',$cg->carton->id) == '3' ||  $this->posicion($item,'3',$cg->carton->id) == '2' || $this->posicion($item,'3',$cg->carton->id) == '1')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                    @endif

                                                                    @if($cg->type == 'Cruz G.')
                                                                        @if($this->posicion($item,'3',$cg->carton->id) == '0' || $this->posicion($item,'3',$cg->carton->id) == '4')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                    @endif

                                                                    text-xs justify-center text-center py-2 font-bold">
                                                                    {{$item}}
                                                                </div>  
                                                            @endforeach
                                                        </div> 
                                                
                                                        <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1 mb-0.5">  
                                                            @foreach (json_decode($cg->carton->content_4) as $item)
                                                                <div class="bg-gray-100 
                                                                    @if($cg->type == 'Diagonal' && $cg->type_lineal == 'Izquierda')
                                                                        @if($this->posicion($item,'4',$cg->carton->id) == '3')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                    @endif 

                                                                    @if($cg->type == 'Diagonal' && $cg->type_lineal == 'Derecha')
                                                                        @if($this->posicion($item,'4',$cg->carton->id) == '1')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                    @endif 

                                                                    @if($cg->type == 'Cartón lleno')
                                                                        @if($this->posicion($item,'4',$cg->carton->id) == '0' || $this->posicion($item,'4',$cg->carton->id) == '1' || $this->posicion($item,'4',$cg->carton->id) == '2' || $this->posicion($item,'4',$cg->carton->id) == '3' || $this->posicion($item,'4',$cg->carton->id) == '4')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                    @endif 

                                                                    @if($cg->type == 'Lineal' && $cg->type_lineal == 'Horizontal' && $cg->type_numero == '4')
                                                                        @if($this->posicion($item,'4',$cg->carton->id) == '0' || $this->posicion($item,'4',$cg->carton->id) == '1' || $this->posicion($item,'4',$cg->carton->id) == '2' || $this->posicion($item,'4',$cg->carton->id) == '3' || $this->posicion($item,'4',$cg->carton->id) == '4')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                    @endif 


                                                                    @if($cg->type == 'Cruz P.')
                                                                        @if($this->posicion($item,'4',$cg->carton->id) == '2')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                    @endif

                                                                    @if($cg->type == 'Lineal' && $cg->type_lineal == 'Vertical' && $cg->type_numero == '1')
                                                                        @if($this->posicion($item,'4',$cg->carton->id) == '0')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                @endif

                                                                @if($cg->type == 'Lineal' && $cg->type_lineal == 'Vertical' && $cg->type_numero == '2')
                                                                        @if($this->posicion($item,'4',$cg->carton->id) == '1')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                @endif

                                                                @if($cg->type == 'Lineal' && $cg->type_lineal == 'Vertical' && $cg->type_numero == '3')
                                                                        @if($this->posicion($item,'4',$cg->carton->id) == '2')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                @endif

                                                                @if($cg->type == 'Lineal' && $cg->type_lineal == 'Vertical' && $cg->type_numero == '4')
                                                                        @if($this->posicion($item,'4',$cg->carton->id) == '3')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                @endif

                                                                @if($cg->type == 'Lineal' && $cg->type_lineal == 'Vertical' && $cg->type_numero == '5')
                                                                        @if($this->posicion($item,'4',$cg->carton->id) == '4')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                @endif

                                                                    text-xs justify-center text-center py-2 font-bold">
                                                                        {{$item}}
                                                                </div>  
                                                            @endforeach
                                                        </div> 
                                                
                                                        <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1 mb-0.5">  
                                                            @foreach (json_decode($cg->carton->content_5) as $item)
                                                                <div class="bg-gray-100 
                                                                @if($cg->type == 'Cuatro esquinas') 
                                                                    @if($this->posicion($item,'5',$cg->carton->id) == '0' || $this->posicion($item,'5',$cg->carton->id) == '4')
                                                                        bg-yellow-500 
                                                                    @endif
                                                                @endif

                                                                @if($cg->type == 'Cartón lleno')
                                                                    @if($this->posicion($item,'5',$cg->carton->id) == '0' || $this->posicion($item,'5',$cg->carton->id) == '1' || $this->posicion($item,'5',$cg->carton->id) == '2' || $this->posicion($item,'5',$cg->carton->id) == '3' || $this->posicion($item,'5',$cg->carton->id) == '4')
                                                                        bg-yellow-500 
                                                                    @endif 
                                                                @endif 


                                                                @if($cg->type == 'Lineal' && $cg->type_lineal == 'Horizontal' && $cg->type_numero == '5')
                                                                    @if($this->posicion($item,'5',$cg->carton->id) == '0' || $this->posicion($item,'5',$cg->carton->id) == '1' || $this->posicion($item,'5',$cg->carton->id) == '2' || $this->posicion($item,'5',$cg->carton->id) == '3' || $this->posicion($item,'5',$cg->carton->id) == '4')
                                                                        bg-yellow-500 
                                                                    @endif 
                                                                @endif 

                                                                @if($cg->type == 'Lineal' && $cg->type_lineal == 'Vertical' && $cg->type_numero == '1')
                                                                        @if($this->posicion($item,'5',$cg->carton->id) == '0')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                @endif

                                                                @if($cg->type == 'Lineal' && $cg->type_lineal == 'Vertical' && $cg->type_numero == '2')
                                                                        @if($this->posicion($item,'5',$cg->carton->id) == '1')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                @endif

                                                                @if($cg->type == 'Lineal' && $cg->type_lineal == 'Vertical' && $cg->type_numero == '3')
                                                                        @if($this->posicion($item,'5',$cg->carton->id) == '2')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                @endif

                                                                @if($cg->type == 'Lineal' && $cg->type_lineal == 'Vertical' && $cg->type_numero == '4')
                                                                        @if($this->posicion($item,'5',$cg->carton->id) == '3')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                @endif

                                                                @if($cg->type == 'Lineal' && $cg->type_lineal == 'Vertical' && $cg->type_numero == '5')
                                                                        @if($this->posicion($item,'5',$cg->carton->id) == '4')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                @endif

                                                                

                                                                @if($cg->type == 'Diagonal' && $cg->type_lineal == 'Izquierda')
                                                                        @if($this->posicion($item,'5',$cg->carton->id) == '4')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                @endif 

                                                                @if($cg->type == 'Diagonal' && $cg->type_lineal == 'Derecha')
                                                                    @if($this->posicion($item,'5',$cg->carton->id) == '0')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                @endif 

                                                                @if($cg->type == 'Cruz G.')
                                                                    @if($this->posicion($item,'5',$cg->carton->id) == '2')
                                                                        bg-yellow-500 
                                                                    @endif 
                                                                @endif

                                                                

                                                                text-xs justify-center text-center py-2 font-bold">{{$item}}</div>  
                                                            @endforeach
                                                        </div> 
                
                                                        <div class="bg-blue-600 m-1 text-center">
                                                            <p class=" text-white  text-xs ">CARTÓN NRO. {{$cg->carton->id}}  </p>
                                                        </div>
                
                                                        <div class="bg-blue-500 m-1 text-center">
                                                            <p class=" text-white text-xs "> {{$this->nombre($cg->user->name)}}</p>
                                                        </div>

                                                    
                                                        <div class="bg-blue-500 m-1 text-center">
                                                            <p class=" text-white text-xs font-bold  ">Modalidad: {{$cg->type}}  </p>
                                                        </div>

                                                        <div class="bg-blue-500 m-1 text-center">
                                                            <p class=" text-white text-xs font-bold uppercase ">LUGAR: {{$cg->lugar}} </p>
                                                        </div>
                
                
                                                    </div> 
                                            
                                            
                                            </div>
                                        @endforeach
                                    </div>
                                

                                </div>

                            </div>

                        @endif

                    @else

                        <div class=" text-lg font-extrabold text-center ">
                            <span class="bg-gradient-to-r from-blue-500 via-blue-400 to-blue-300 bg-clip-text text-transparent  "> RESULTADOS DEL SORTEO</span>
                        </div>
                        <div class=" flex justify-center w-full mt-4 mb-4">
                            @livewire('carton-ganador', ['sorteo' => $sorteo->id]) 
                            @livewire('fichas-sorteo', ['sorteo' => $sorteo->id]) 
                        </div>

                    


                        <div class=" bg-white border p-2 overflow-x-auto border-gray-200 rounded-lg shadow w-full mi-div  mt-4">
                            <div class="flex justify-center">
                                <img width="54" height="30" class="w-[54px]"
                                    src="https://horizon-ui.com/shadcn-nextjs-boilerplate/_next/static/media/SidebarBadge.d6d6c919.png"
                                    alt="">

                            </div>  

                                <p class=" font-Arima text-blue-600 font-bold text-center mt-4"  >CARTONES GANADORES</p>
                                <div class="container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-1 font-Arima mt-4 w-full">

         
                                        @foreach($cartones_ganadores as $cg)
                                            <div class="py-1 md:py-2 md:px-12 flex justify-center ">
                                                    <div class=" bg-blue-500 rounded-md shadow-md overflow-hidden w-48 mr-2  ">
                                                        <div class="grid grid-cols-5 gap-0.5 justify-center  mb-0.5 mt-1">  
                                                
                                                            <div class=" bg-blue-500 text-white justify-center ml-1 text-xs text-center  py-2 font-bold">B</div>  
                                                            <div class=" bg-blue-500 text-white justify-center mx-0.5 text-xs  text-center  py-2 font-bold">I</div>  
                                                            <div class=" bg-blue-500 text-white justify-center mx-0.5 text-xs  text-center py-2  font-bold">N</div>  
                                                            <div class=" bg-blue-500 text-white justify-center mx-0.5 text-xs  text-center py-2  font-bold">G</div>  
                                                            <div class=" bg-blue-500 text-white justify-center mr-1 text-xs  text-center py-2  font-bold">O</div>  
                                                        </div>  
                                                
                                                        <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1  w-22 xl:w-auto mb-0.5 ">  
                                                            @foreach (json_decode($cg->carton->content_1) as $item)
                                                            
                                                                <div class="bg-gray-100
                                                                    @if($cg->type == 'Cuatro esquinas')
                                                                        @if($this->posicion($item,'1',$cg->carton->id) == '0' || $this->posicion($item,'1',$cg->carton->id) == '4')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                    @endif 

                                                                    @if($cg->type == 'Cartón lleno')
                                                                        @if($this->posicion($item,'1',$cg->carton->id) == '0' || $this->posicion($item,'1',$cg->carton->id) == '1' || $this->posicion($item,'1',$cg->carton->id) == '2' || $this->posicion($item,'1',$cg->carton->id) == '3' || $this->posicion($item,'1',$cg->carton->id) == '4')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                    @endif 

                                                                    @if($cg->type == 'Lineal' && $cg->type_lineal == 'Horizontal' && $cg->type_numero == '1')
                                                                        @if($this->posicion($item,'1',$cg->carton->id) == '0' || $this->posicion($item,'1',$cg->carton->id) == '1' || $this->posicion($item,'1',$cg->carton->id) == '2' || $this->posicion($item,'1',$cg->carton->id) == '3' || $this->posicion($item,'1',$cg->carton->id) == '4')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                    @endif 

                                                                    @if($cg->type == 'Lineal' && $cg->type_lineal == 'Vertical' && $cg->type_numero == '1')
                                                                        @if($this->posicion($item,'1',$cg->carton->id) == '0')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                @endif

                                                                @if($cg->type == 'Lineal' && $cg->type_lineal == 'Vertical' && $cg->type_numero == '2')
                                                                        @if($this->posicion($item,'1',$cg->carton->id) == '1')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                @endif

                                                                @if($cg->type == 'Lineal' && $cg->type_lineal == 'Vertical' && $cg->type_numero == '3')
                                                                        @if($this->posicion($item,'1',$cg->carton->id) == '2')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                @endif

                                                                @if($cg->type == 'Lineal' && $cg->type_lineal == 'Vertical' && $cg->type_numero == '4')
                                                                        @if($this->posicion($item,'1',$cg->carton->id) == '3')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                @endif

                                                                @if($cg->type == 'Lineal' && $cg->type_lineal == 'Vertical' && $cg->type_numero == '5')
                                                                        @if($this->posicion($item,'1',$cg->carton->id) == '4')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                @endif


                                                        

                                                                    @if($cg->type == 'Cuatro esquinas')
                                                                        @if($this->posicion($item,'1',$cg->carton->id) == '0' || $this->posicion($item,'1',$cg->carton->id) == '4')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                    @endif

                                                                    @if($cg->type == 'Diagonal' && $cg->type_lineal == 'Izquierda')
                                                                        @if($this->posicion($item,'1',$cg->carton->id) == '0')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                    @endif

                                                                    @if($cg->type == 'Diagonal' && $cg->type_lineal == 'Derecha')
                                                                        @if($this->posicion($item,'1',$cg->carton->id) == '4')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                    @endif 

                                                                    @if($cg->type == 'Cruz G.')
                                                                        @if($this->posicion($item,'1',$cg->carton->id) == '2')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                    @endif
                                                                    
                                                                    text-xs justify-center text-center py-2 font-bold">
                                                                    
                                                                    {{$item}}
                                                                </div>  
                                                            @endforeach
                                                        </div>  
                                                
                                                        <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1  w-22 xl:w-auto mb-0.5">  
                                                            @foreach (json_decode($cg->carton->content_2) as $item)
                                                                <div class="bg-gray-100  

                                                                    @if($cg->type == 'Diagonal' && $cg->type_lineal == 'Izquierda')
                                                                        @if($this->posicion($item,'2',$cg->carton->id) == '1')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                    @endif 

                                                                    @if($cg->type == 'Cartón lleno')
                                                                        @if($this->posicion($item,'2',$cg->carton->id) == '0' || $this->posicion($item,'2',$cg->carton->id) == '1' || $this->posicion($item,'2',$cg->carton->id) == '2' || $this->posicion($item,'2',$cg->carton->id) == '3' || $this->posicion($item,'2',$cg->carton->id) == '4')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                    @endif


                                                                @if($cg->type == 'Lineal' && $cg->type_lineal == 'Horizontal' && $cg->type_numero == '2')
                                                                        @if($this->posicion($item,'2',$cg->carton->id) == '0' || $this->posicion($item,'2',$cg->carton->id) == '1' || $this->posicion($item,'2',$cg->carton->id) == '2' || $this->posicion($item,'2',$cg->carton->id) == '3' || $this->posicion($item,'2',$cg->carton->id) == '4')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                    @endif 

                                                                    @if($cg->type == 'Lineal' && $cg->type_lineal == 'Vertical' && $cg->type_numero == '1')
                                                                        @if($this->posicion($item,'2',$cg->carton->id) == '0')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                @endif

                                                                @if($cg->type == 'Lineal' && $cg->type_lineal == 'Vertical' && $cg->type_numero == '2')
                                                                        @if($this->posicion($item,'2',$cg->carton->id) == '1')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                @endif

                                                                @if($cg->type == 'Lineal' && $cg->type_lineal == 'Vertical' && $cg->type_numero == '3')
                                                                        @if($this->posicion($item,'2',$cg->carton->id) == '2')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                @endif

                                                                @if($cg->type == 'Lineal' && $cg->type_lineal == 'Vertical' && $cg->type_numero == '4')
                                                                        @if($this->posicion($item,'2',$cg->carton->id) == '3')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                @endif

                                                                @if($cg->type == 'Lineal' && $cg->type_lineal == 'Vertical' && $cg->type_numero == '5')
                                                                        @if($this->posicion($item,'2',$cg->carton->id) == '4')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                @endif


                                                                    

                                                                    @if($cg->type == 'Diagonal' && $cg->type_lineal == 'Derecha')
                                                                        @if($this->posicion($item,'2',$cg->carton->id) == '3')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                    @endif 

                                                                    @if($cg->type == 'Cruz P.')
                                                                        @if($this->posicion($item,'2',$cg->carton->id) == '2')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                    @endif

                                                                    text-xs justify-center text-center py-2 font-bold">
                                                                    {{$item}}
                                                                </div>  
                                                            @endforeach
                                                        </div> 
                
                                                        <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1  w-22 xl:w-auto mb-0.5">  
                                                            @foreach (json_decode($cg->carton->content_3) as $item)
                                                                <div class="bg-gray-100 
                                                                    @if($cg->type == 'Diagonal' && $cg->type_lineal == 'Izquierda')
                                                                        @if($this->posicion($item,'3',$cg->carton->id) == '2')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                    @endif

                                                                    @if($cg->type == 'Cartón lleno')
                                                                        @if($this->posicion($item,'3',$cg->carton->id) == '0' || $this->posicion($item,'3',$cg->carton->id) == '1' || $this->posicion($item,'3',$cg->carton->id) == '2' || $this->posicion($item,'3',$cg->carton->id) == '3' || $this->posicion($item,'3',$cg->carton->id) == '4')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                    @endif 

                                                                    @if($cg->type == 'Lineal' && $cg->type_lineal == 'Horizontal' && $cg->type_numero == '3')
                                                                        @if($this->posicion($item,'3',$cg->carton->id) == '0' || $this->posicion($item,'3',$cg->carton->id) == '1' || $this->posicion($item,'3',$cg->carton->id) == '2' || $this->posicion($item,'3',$cg->carton->id) == '3' || $this->posicion($item,'3',$cg->carton->id) == '4')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                    @endif 

                                                                    @if($cg->type == 'Lineal' && $cg->type_lineal == 'Vertical' && $cg->type_numero == '1')
                                                                        @if($this->posicion($item,'3',$cg->carton->id) == '0')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                @endif

                                                                @if($cg->type == 'Lineal' && $cg->type_lineal == 'Vertical' && $cg->type_numero == '2')
                                                                        @if($this->posicion($item,'3',$cg->carton->id) == '1')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                @endif

                                                                @if($cg->type == 'Lineal' && $cg->type_lineal == 'Vertical' && $cg->type_numero == '3')
                                                                        @if($this->posicion($item,'3',$cg->carton->id) == '2')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                @endif

                                                                @if($cg->type == 'Lineal' && $cg->type_lineal == 'Vertical' && $cg->type_numero == '4')
                                                                        @if($this->posicion($item,'3',$cg->carton->id) == '3')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                @endif

                                                                @if($cg->type == 'Lineal' && $cg->type_lineal == 'Vertical' && $cg->type_numero == '5')
                                                                        @if($this->posicion($item,'3',$cg->carton->id) == '4')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                @endif

                                                                    
                

                                                                    @if($cg->type == 'Diagonal' && $cg->type_lineal == 'Derecha')
                                                                        @if($this->posicion($item,'3',$cg->carton->id) == '2')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                    @endif 

                                                                    @if($cg->type == 'Cruz P.')
                                                                        @if($this->posicion($item,'3',$cg->carton->id) == '3' ||  $this->posicion($item,'3',$cg->carton->id) == '2' || $this->posicion($item,'3',$cg->carton->id) == '1')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                    @endif

                                                                    @if($cg->type == 'Cruz G.')
                                                                        @if($this->posicion($item,'3',$cg->carton->id) == '0' || $this->posicion($item,'3',$cg->carton->id) == '4')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                    @endif

                                                                    text-xs justify-center text-center py-2 font-bold">
                                                                    {{$item}}
                                                                </div>  
                                                            @endforeach
                                                        </div> 
                                                
                                                        <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1  w-22 xl:w-auto mb-0.5">
                                                            @foreach (json_decode($cg->carton->content_4) as $item)
                                                                <div class="bg-gray-100 
                                                                    @if($cg->type == 'Diagonal' && $cg->type_lineal == 'Izquierda')
                                                                        @if($this->posicion($item,'4',$cg->carton->id) == '3')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                    @endif 

                                                                    @if($cg->type == 'Diagonal' && $cg->type_lineal == 'Derecha')
                                                                        @if($this->posicion($item,'4',$cg->carton->id) == '1')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                    @endif 

                                                                    @if($cg->type == 'Cartón lleno')
                                                                        @if($this->posicion($item,'4',$cg->carton->id) == '0' || $this->posicion($item,'4',$cg->carton->id) == '1' || $this->posicion($item,'4',$cg->carton->id) == '2' || $this->posicion($item,'4',$cg->carton->id) == '3' || $this->posicion($item,'4',$cg->carton->id) == '4')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                    @endif 

                                                                    @if($cg->type == 'Lineal' && $cg->type_lineal == 'Horizontal' && $cg->type_numero == '4')
                                                                        @if($this->posicion($item,'4',$cg->carton->id) == '0' || $this->posicion($item,'4',$cg->carton->id) == '1' || $this->posicion($item,'4',$cg->carton->id) == '2' || $this->posicion($item,'4',$cg->carton->id) == '3' || $this->posicion($item,'4',$cg->carton->id) == '4')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                    @endif 


                                                                    @if($cg->type == 'Cruz P.')
                                                                        @if($this->posicion($item,'4',$cg->carton->id) == '2')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                    @endif

                                                                    

                                                                    @if($cg->type == 'Lineal' && $cg->type_lineal == 'Vertical' && $cg->type_numero == '1')
                                                                        @if($this->posicion($item,'4',$cg->carton->id) == '0')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                @endif

                                                                @if($cg->type == 'Lineal' && $cg->type_lineal == 'Vertical' && $cg->type_numero == '2')
                                                                        @if($this->posicion($item,'4',$cg->carton->id) == '1')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                @endif

                                                                @if($cg->type == 'Lineal' && $cg->type_lineal == 'Vertical' && $cg->type_numero == '3')
                                                                        @if($this->posicion($item,'4',$cg->carton->id) == '2')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                @endif

                                                                @if($cg->type == 'Lineal' && $cg->type_lineal == 'Vertical' && $cg->type_numero == '4')
                                                                        @if($this->posicion($item,'4',$cg->carton->id) == '3')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                @endif

                                                                @if($cg->type == 'Lineal' && $cg->type_lineal == 'Vertical' && $cg->type_numero == '5')
                                                                        @if($this->posicion($item,'4',$cg->carton->id) == '4')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                @endif

                                                                    text-xs justify-center text-center py-2 font-bold">
                                                                        {{$item}}
                                                                </div>  
                                                            @endforeach
                                                        </div> 
                                                
                                                        <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1  w-22 xl:w-auto mb-0.5">  
                                                            @foreach (json_decode($cg->carton->content_5) as $item)
                                                                <div class="bg-gray-100 
                                                                @if($cg->type == 'Cuatro esquinas') 
                                                                    @if($this->posicion($item,'5',$cg->carton->id) == '0' || $this->posicion($item,'5',$cg->carton->id) == '4')
                                                                        bg-yellow-500 
                                                                    @endif
                                                                @endif

                                                                @if($cg->type == 'Cartón lleno')
                                                                    @if($this->posicion($item,'5',$cg->carton->id) == '0' || $this->posicion($item,'5',$cg->carton->id) == '1' || $this->posicion($item,'5',$cg->carton->id) == '2' || $this->posicion($item,'5',$cg->carton->id) == '3' || $this->posicion($item,'5',$cg->carton->id) == '4')
                                                                        bg-yellow-500 
                                                                    @endif 
                                                                @endif 

                                                                @if($cg->type == 'Lineal' && $cg->type_lineal == 'Horizontal' && $cg->type_numero == '5')
                                                                    @if($this->posicion($item,'5',$cg->carton->id) == '0' || $this->posicion($item,'5',$cg->carton->id) == '1' || $this->posicion($item,'5',$cg->carton->id) == '2' || $this->posicion($item,'5',$cg->carton->id) == '3' || $this->posicion($item,'5',$cg->carton->id) == '4')
                                                                        bg-yellow-500 
                                                                    @endif 
                                                                @endif 


                                                            

                                                                @if($cg->type == 'Lineal' && $cg->type_lineal == 'Vertical' && $cg->type_numero == '1')
                                                                        @if($this->posicion($item,'5',$cg->carton->id) == '0')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                @endif

                                                                @if($cg->type == 'Lineal' && $cg->type_lineal == 'Vertical' && $cg->type_numero == '2')
                                                                        @if($this->posicion($item,'5',$cg->carton->id) == '1')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                @endif

                                                                @if($cg->type == 'Lineal' && $cg->type_lineal == 'Vertical' && $cg->type_numero == '3')
                                                                        @if($this->posicion($item,'5',$cg->carton->id) == '2')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                @endif

                                                                @if($cg->type == 'Lineal' && $cg->type_lineal == 'Vertical' && $cg->type_numero == '4')
                                                                        @if($this->posicion($item,'5',$cg->carton->id) == '3')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                @endif

                                                                @if($cg->type == 'Lineal' && $cg->type_lineal == 'Vertical' && $cg->type_numero == '5')
                                                                        @if($this->posicion($item,'5',$cg->carton->id) == '4')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                @endif



                                                                @if($cg->type == 'Diagonal' && $cg->type_lineal == 'Izquierda')
                                                                        @if($this->posicion($item,'5',$cg->carton->id) == '4')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                @endif 

                                                                @if($cg->type == 'Diagonal' && $cg->type_lineal == 'Derecha')
                                                                    @if($this->posicion($item,'5',$cg->carton->id) == '0')
                                                                        bg-yellow-500 
                                                                        @endif 
                                                                @endif 

                                                                @if($cg->type == 'Cruz G.')
                                                                    @if($this->posicion($item,'5',$cg->carton->id) == '2')
                                                                        bg-yellow-500 
                                                                    @endif 
                                                                @endif

                                                                

                                                                text-xs justify-center text-center py-2 font-bold">{{$item}}</div>  
                                                            @endforeach
                                                        </div> 
                
                                                        <div class="bg-blue-600 m-1 text-center">
                                                            <p class=" text-white  text-xs ">CARTÓN NRO. {{$cg->carton->id}}  </p>
                                                        </div>
                
                                                        <div class="bg-blue-500 m-1 text-center">
                                                            <p class=" text-white text-xs "> {{$this->nombre($cg->user->name)}}</p>
                                                        </div>

                                                        <div class="bg-blue-500 m-1 text-center">
                                                        

                                                            <p class=" text-white text-xs ">Ganancia: {{round($this->premio($cg->carton->id,$cg->sorteo_id),2)}} $ </p>
                                                        </div>

                                                        <div class="bg-blue-500 m-1 text-center">
                                                            <p class=" text-white text-xs font-bold  ">Modalidad: {{$cg->type}}  </p>
                                                        </div>

                                                        <div class="bg-blue-500 m-1 text-center">
                                                            <p class=" text-white text-xs font-bold uppercase ">LUGAR: {{$cg->lugar}} </p>
                                                        </div>
                
                
                                                    </div> 
                                            
                                            
                                            </div>
                                        @endforeach
                                

                                </div>

                        </div>

                        <span class="absolute inset-x-0 bottom-0 h-2 bg-gradient-to-r from-green-300 via-blue-500 to-purple-600" ></span>

                        
                    @endif
          
            </div>

            <p></p>


    



    @if($ganador_1 == 1 || $ganador_2 == 1 || $ganador_3 == 1)

        @if($ganador_user_login==1)

            <script>

                let duration = 15 * 2000;
                let animationEnd = Date.now() + duration;
                let defaults = { startVelocity: 30, spread: 360, ticks: 60, zIndex: 0 };

                function randomInRange(min, max) {
                return Math.random() * (max - min) + min;
                }

                let interval = setInterval(function() {
                let timeLeft = animationEnd - Date.now();

                if (timeLeft <= 0) {
                    return clearInterval(interval);
                }

                let particleCount = 50 * (timeLeft / duration);
                // since particles fall down, start a bit higher than random
                confetti(Object.assign({}, defaults, { particleCount, origin: { x: randomInRange(0.1, 0.3), y: Math.random() - 0.2 } }));
                confetti(Object.assign({}, defaults, { particleCount, origin: { x: randomInRange(0.7, 0.9), y: Math.random() - 0.2 } }));
                }, 250);
            </script>

        @else

        @endif

    @endif



        <link rel="stylesheet" href="{{ asset('vendor/css_contador/estilos.css') }}">


        <script src="{{ asset('vendor/dist/simplyCountdown.min.js') }}"></script>

        <script src="https://unpkg.com/flowbite@1.3.3/dist/flowbite.js"></script>

       

<script>
  
        Livewire.on('emitirSonido', function () {
  

            const audio = new Audio('{{ asset("img/notification-beep-229154.mp3") }}');


            audio.play();

            // Detener el sonido después de 2 segundos
            setTimeout(() => {
                audio.pause();
                audio.currentTime = 0; // Reiniciar el audio
            }, 2000); // 2000 milisegundos = 2 segundos
        });
    </script>

    
<script>
    // Escuchar el evento emitido por Livewire
    Livewire.on('emitirSonido_ganador', function () {
        // Crear un elemento de audio

        const audio = new Audio('{{ asset("img/handy-introduction-022-glbml-21786.mp3") }}');


        
        // Reproducir el sonido
        audio.play();

        // Detener el sonido después de 2 segundos
        setTimeout(() => {
            audio.pause();
            audio.currentTime = 0; // Reiniciar el audio
        }, 10000); // 2000 milisegundos = 2 segundos
    });
</script>


<script>


    document.addEventListener('DOMContentLoaded', function() {
            const startButton = document.getElementById('startButton');
            const audioToggle = document.getElementById('audioToggle');
            const soundOnIcon = document.getElementById('soundOn');
            const soundOffIcon = document.getElementById('soundOff');

            audioToggle.classList.add('hidden');

            let audioElement = null;

            startButton.addEventListener('click', function() {

                audioToggle.classList.remove('hidden');

                audioElement = new Audio("{{ asset('img/Skedaddle Back - Nathan Moore.mp3') }}");
                audioElement.volume = 0.4;
                audioElement.loop = true;

                // Reproducir el audio
                audioElement.play().catch(error => {
                    console.error('Error al reproducir el audio:', error);
                });

                // Ocultar el botón de inicio
                startButton.style.display = 'none';


                // Mostrar el botón de mute
                document.getElementById('audioToggle').classList.remove('hidden');

                // Configurar controles de audio
                setupAudioControls(audioElement);
            });

            function setupAudioControls(audio) {
               
                

                let isMuted = false;

                function toggleAudio() {
                    isMuted = !isMuted;
                    
                    if(isMuted) {
                        audio.pause();
                        soundOnIcon.classList.add('hidden');
                        soundOffIcon.classList.remove('hidden');
                        audioToggle.setAttribute('aria-label', 'Activar música');
                    } else {
                        audio.play();
                        soundOffIcon.classList.add('hidden');
                        soundOnIcon.classList.remove('hidden');
                        audioToggle.setAttribute('aria-label', 'Silenciar música');
                    }
                }

                audioToggle.addEventListener('click', toggleAudio);
            }

    });



</script>







</div>
