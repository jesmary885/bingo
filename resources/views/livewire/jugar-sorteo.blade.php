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
                                            <div aria-label="action panel"  tabindex="0" class="focus:outline-none w-11/12 mx-auto mb-4 my-6 md:w-5/12 shadow sm:px-10 sm:py-6 py-4 px-4 bg-white dark:bg-gray-800 rounded-md">
                                                <p tabindex="0" class="focus:outline-none text-lg text-gray-800 dark:text-gray-100 font-semibold pb-3 text-center">El sorteo ya esta efectuandose</p>
                                                <p tabindex="0" class="focus:outline-none text-sm text-gray-600 dark:text-gray-400 pb-3 font-normal  ">Le invitamos a ingresar a la sala de juego, haciendo clic en el botón INICIAR </p>
                                                <div  class="w-12 h-6 mb-2 cursor-pointer rounded-full relative shadow-sm">


                                                    <button id="startButton" wire:click="activar_sonido_pulsar"  class="bg-blue-500 mb-2  hover:bg-blue-600 py-3 px-2 text-xs rounded-full font-bold uppercase text-white cursor-pointer tracking-widest focus:outline-none focus:ring-2  focus:ring-blue-500 focus:ring-opacity-50 ">INICIAR</button>
                                                    

                            
                                                    
                                                
                                                </div>
                                                <style>
                                                    .checkbox:checked {
                                                        /* Apply class right-0*/
                                                        right: 0;
                                                    }
                                                    .checkbox:checked + .toggle-label {
                                                        /* Apply class bg-indigo-700 */
                                                        background-color: #4c51bf;
                                                    }
                                                </style>
                                            </div>
                                        </dh-component>
                                    </div>
                                </div>

                            </div>



                        @else


                            <div class="flex items-center rounded-t-lg  bg-blue-500 text-gray-800 border p-2 border-gray-200 shadow">

                    
                            </div> 


                            <div class="w-full bg-white border p-2 border-gray-200 rounded-b-lg shadow ">

                                <div id="accordion-flush" data-accordion="collapse"
                                    data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white"
                                    data-inactive-classes="text-gray-500 dark:text-gray-400">
                                    

                                 <h2 id="accordion-flush-heading-3">
                                    
                                    </h2> 
                                    <div id="accordion-flush-body-3" class="@if($visible == 0) hidden @endif" aria-labelledby="accordion-flush-heading-3">
                                        <div class="py-5  ">
                                            <div class="flex overflow-x-auto  ">

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        

                            <div class="grid grid-cols-5 md:grid-cols-8 gap-1 mt-4">

                              

                                <div class="col-span-3 md:col-span-5 p-2 ">

                                    
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
