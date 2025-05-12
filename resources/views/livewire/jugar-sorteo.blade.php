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
                                        <button wire:click="visible_todos" type="button" class="flex justify-between items-center py-5 w-full font-medium text-left text-gray-500  border-gray-200 dark:border-gray-700 dark:text-gray-400 focus:outline-none  " data-accordion-target="#accordion-flush-body-3" aria-expanded="false" aria-controls="accordion-flush-body-3">
                                        
                                            
                                            <span class="font-Allerta text-sm md:text-md lg:text-lg font-bold text-blue-500 ml-4">CARTONES DE TODOS LOS PARTICIPANTES</span>
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
