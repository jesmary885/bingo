<div  class="bg-white" >

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">


    @if($cartones_sorteo_iniciado == 1)

    

            <div class="relative block p-4 overflow-hidden border bg-white border-slate-100 rounded-lg mb-2 mt-1 font-Arima ">
                @if($cant_lugares == 1)
                    @if($ganador_1 == 0)

                        <div class="w-full bg-white border p-2 border-gray-200 rounded-lg shadow ">

                            <div id="accordion-flush" data-accordion="collapse"
                                data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white"
                                data-inactive-classes="text-gray-500 dark:text-gray-400">
                                

                                <h2 id="accordion-flush-heading-3">
                                    <button wire:click="visible_todos" type="button" class="flex justify-between items-center py-5 w-full font-medium text-left text-gray-500  border-gray-200 dark:border-gray-700 dark:text-gray-400 focus:outline-none  " data-accordion-target="#accordion-flush-body-3" aria-expanded="false" aria-controls="accordion-flush-body-3">
                                        <span class="font-Arima text-blue-600 font-bold text-center ml-4">CARTONES DE TODOS LOS PARTICIPANTES</span>
                                        <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    </button>
                                </h2>
                                <div id="accordion-flush-body-3" class="@if($visible == 0) hidden @endif" aria-labelledby="accordion-flush-heading-3">
                                    <div class="py-5  ">
                                        <div class="flex overflow-x-auto  ">

                                            @foreach ($cartones_todos as $todo_c)
                        
                                                    <div class=" bg-blue-500 mr-2 rounded-md shadow-md w-24 xl:w-auto ">
                                                        <div class="grid grid-cols-5 gap-0.5 justify-center mb-0.5 mt-1 w-24 xl:w-auto ">  
                                                
                                                            <div class=" bg-blue-600 text-white justify-center ml-1 text-xs text-center  py-2 font-bold">B</div>  
                                                            <div class=" bg-blue-600 text-white justify-center mx-0.5 text-xs  text-center  py-2 font-bold">I</div>  
                                                            <div class=" bg-blue-600 text-white justify-center mx-0.5 text-xs  text-center py-2  font-bold">N</div>  
                                                            <div class=" bg-blue-600 text-white justify-center mx-0.5 text-xs  text-center py-2  font-bold">G</div>  
                                                            <div class=" bg-blue-600 text-white justify-center mr-1 text-xs  text-center py-2  font-bold">O</div>  
                                                        </div>  
                                                
                                                        <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1  w-22 xl:w-auto mb-0.5">  
                                                            @foreach (json_decode($todo_c->carton->content_1) as $item)
                                                                <div class="bg-gray-100  {{$this->background($item)}}  text-xs justify-center text-center py-2 font-bold">{{$item}}</div>  
                                                            @endforeach
                                                        </div>  
                                                
                                                        <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1 w-22 xl:w-auto mb-0.5">  
                                                            @foreach (json_decode($todo_c->carton->content_2) as $item)
                                                                <div class="bg-gray-100 {{$this->background($item)}}  text-xs justify-center text-center py-2 font-bold">{{$item}}</div>  
                                                            @endforeach
                                                        </div> 
            
                                                        <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1 w-22 xl:w-auto mb-0.5">  
                                                            @foreach (json_decode($todo_c->carton->content_3) as $item)
                                                                <div class="bg-gray-100 {{$this->background($item)}} text-xs justify-center text-center py-2 font-bold">{{$item}}</div>  
                                                            @endforeach
                                                        </div> 
                                                
                                                        <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1 w-22 xl:w-auto mb-0.5">  
                                                            @foreach (json_decode($todo_c->carton->content_4) as $item)
                                                                <div class="bg-gray-100 {{$this->background($item)}} text-xs justify-center text-center py-2 font-bold">{{$item}}</div>  
                                                            @endforeach
                                                        </div> 
                                                
                                                        <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1 w-22 xl:w-auto mb-0.5">  
                                                            @foreach (json_decode($todo_c->carton->content_5) as $item)
                                                                <div class="bg-gray-100 {{$this->background($item)}} text-xs justify-center text-center py-2 font-bold">{{$item}}</div>  
                                                            @endforeach
                                                        </div> 
            
                                                        <div class="bg-blue-600 m-1 text-center w-20 xl:w-auto">
                                                            <p class=" text-white  text-xs ">Cartón Nro. {{$todo_c->carton->id}}  </p>
                                                        </div>
            
                                                        <div class="bg-blue-500 m-1 text-center w-20 xl:w-auto">
                                                            <p class=" text-white text-xs "> {{$this->nombre($todo_c->user->name)}}</p>
                                                        </div>
            
            
                                                    </div> 

                                
                                                    @if($ganador_1 == 0)
                                
                                                        @if($type_1 == 'Tradicional')
                                                            {{$this->verifi_linea_horizontal($todo_c->carton->id)}}
                                                            {{$this->verifi_linea_vertical($todo_c->carton->id)}}
                                                            {{$this->verifi_cuatro_esquinas($todo_c->carton->id)}}
                                                            {{$this->diagonal_iz($todo_c->carton->id)}}
                                                            {{$this->diagonal_dr($todo_c->carton->id)}}
                                                            {{$this->cruz_pequeña($todo_c->carton->id)}}
                                                            {{$this->cruz_grande($todo_c->carton->id)}}
                                                        @else
                                                            {{$this->verifi_carton_lleno($todo_c->carton->id)}}
                                                        @endif
                                                    @else
                                
                                                        @if($type_2 == 'Tradicional')
                                                            {{$this->verifi_linea_horizontal($todo_c->carton->id)}}
                                                            {{$this->verifi_linea_vertical($todo_c->carton->id)}}
                                                            {{$this->verifi_cuatro_esquinas($todo_c->carton->id)}}
                                                            {{$this->diagonal_iz($todo_c->carton->id)}}
                                                            {{$this->diagonal_dr($todo_c->carton->id)}}
                                                            {{$this->cruz_pequeña($todo_c->carton->id)}}
                                                            {{$this->cruz_grande($todo_c->carton->id)}}
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

                            <aside class="col-start-1 col-end-6 overflow-y-hidden md:col-span-1 overflow-x-auto md:h-162 md:overflow-x-hidden md:overflow-y-auto bg-blue-100 border p-2 border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700  " >
                                <div class="w-full flex justify-start md:flex-col md:max-h-96">
                                    <p class=" font-Arima text-blue-600 font-bold text-center text-sm md:text-base ">FICHAS</p>
                                    @foreach($fichas as $ficha)
                                            <div class="relative mr-2 md:mr-0 md:w-full  mt-7">
                                                @if($ficha_ultima == $ficha->id)
                                                    <div class="w-full flex justify-center " >
                                                        <div class=" w-16 h-16  bg-red-500 rounded-full absolute  animate-ping"></div>

                                                    </div>
                                                
                                                @endif
                                                <div class="w-full flex justify-center " >

                                                    <div class="@if($ficha_ultima == $ficha->id) h-14 w-14 lg:h-16 lg:w-16 @else h-14 w-14 animate-pulse animate-fade-right @endif mx-auto my-auto  rounded-full  @if($ficha_ultima == $ficha->id) bg-red-700 @else bg-blue-700 @endif">
                                                        <p class="  text-center font-bold  text-white  mt-1">
                                                            {{$ficha->letra}}
                                                        </p>
                                                        <p class="  text-center font-bold  text-white ">
                                                            {{$ficha->numero}}
                                                        </p>
                                                    </div>

                                                </div>
                                            
                                            </div>
                                    @endforeach
                                </div>
                    
                            </aside>

                            <div class="col-span-3 md:col-span-5 p-2">

                                <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-70">

                                    <p class=" font-Arima text-blue-600 font-bold text-center text-sm md:text-base "  >MIS CARTONES</p>

                                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-1 font-Arima mt-7 mx-1">

                                        @foreach ($mis_cartones as $carton)
                            
                                            <div class=" bg-white rounded-md shadow-md overflow-hidden">
                                                <div class=" bg-blue-500 rounded-t-md shadow-md overflow-hidden md:max-w-xl ">
                            
                                                    <div class="flex justify-center ">
                            
                                                        <img src="{{Storage::url('img/logo4.png') }}" alt="" class="block h-16 w-36 ">
                            
                                                    </div>
                            
                                                    <div class="grid grid-cols-5 gap-0.5 justify-center mb-0.5 mt-1">
                            
                                                        <div class="bg-blue-600 text-white justify-center text-2xl text-center ml-1  py-2  font-bold">B</div>
                                                        <div class="bg-blue-600 text-white justify-center text-2xl text-center mx-0.5 py-2 font-bold">I</div>
                                                        <div class="bg-blue-600 text-white justify-center text-2xl text-center mx-0.5 py-2 font-bold">N</div>
                                                        <div class="bg-blue-600 text-white justify-center text-2xl text-center mx-0.5 py-2 font-bold">G</div>
                                                        <div class="bg-blue-600 text-white justify-center text-2xl text-center mr-1 py-2 font-bold">O</div>
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

                            <div class="col-span-2 md:col-span-2  overflow-y-auto bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 p-2 " >
                                
                                <p class=" font-Arima text-blue-600 font-bold text-center text-sm md:text-base "  >GANADORES</p>

                                <div class="mt-4">
                                   

                                    @foreach($cartones_ganadores as $cg)

                                        <div class="py-1 md:py-2 md:px-12 ">
                                                <div class=" bg-blue-500 rounded-md shadow-md overflow-hidden md:max-w-xl ">
                                                    <div class="grid grid-cols-5 gap-0.5 justify-center  mb-0.5 mt-1">  
                                            
                                                        <div class=" bg-blue-600 text-white justify-center ml-1 text-xs text-center  py-2 font-bold">B</div>  
                                                        <div class=" bg-blue-600 text-white justify-center mx-0.5 text-xs  text-center  py-2 font-bold">I</div>  
                                                        <div class=" bg-blue-600 text-white justify-center mx-0.5 text-xs  text-center py-2  font-bold">N</div>  
                                                        <div class=" bg-blue-600 text-white justify-center mx-0.5 text-xs  text-center py-2  font-bold">G</div>  
                                                        <div class=" bg-blue-600 text-white justify-center mr-1 text-xs  text-center py-2  font-bold">O</div>  
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
                                                                @if($this->posicion($item,'5',$cg->carton->id) == '0' || $this->posicion($item,'3',$cg->carton->id) == '1' || $this->posicion($item,'5',$cg->carton->id) == '2' || $this->posicion($item,'5',$cg->carton->id) == '3' || $this->posicion($item,'5',$cg->carton->id) == '4')
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
                                                        <p class=" text-white text-xs ">Ganancia: {{round($this->premio($cg->carton->id),2)}}$ </p>
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

                    @else
                        <div class=" text-lg font-extrabold text-center ">
                            <span class="bg-gradient-to-r from-blue-500 via-blue-400 to-blue-300 bg-clip-text text-transparent  "> RESULTADOS DEL SORTEO</span>
                        </div>
                        <div class=" flex justify-center w-full mt-4 mb-4">
                            @livewire('carton-ganador', ['sorteo' => $sorteo->id]) 
                            @livewire('fichas-sorteo', ['sorteo' => $sorteo->id]) 
                        </div>

                    


                        <div class=" bg-white border p-2 overflow-x-auto border-gray-200 rounded-lg shadow  mt-4">
                            <div class="flex justify-center">
                                <img width="54" height="30" class="w-[54px]"
                                    src="https://horizon-ui.com/shadcn-nextjs-boilerplate/_next/static/media/SidebarBadge.d6d6c919.png"
                                    alt="">

                            </div>  

                                <p class=" font-Arima text-blue-600 font-bold text-center mt-4"  >CARTONES GANADORES</p>
                                <div class="flex justify-center text-center overflow-x-auto ">

                                        @foreach($cartones_ganadores as $cg)
                    
                                            <div class=" bg-blue-500 rounded-md shadow-md overflow-hidden w-40 mr-2   ">
                                                <div class="grid grid-cols-5 gap-0.5 justify-center  mb-0.5 mt-1 ">  
                                                
                                                    <div class=" bg-blue-600 text-white justify-center ml-1 text-xs text-center  py-2 font-bold">B</div>  
                                                    <div class=" bg-blue-600 text-white justify-center mx-0.5 text-xs  text-center  py-2 font-bold">I</div>  
                                                    <div class=" bg-blue-600 text-white justify-center mx-0.5 text-xs  text-center py-2  font-bold">N</div>  
                                                    <div class=" bg-blue-600 text-white justify-center mx-0.5 text-xs  text-center py-2  font-bold">G</div>  
                                                    <div class=" bg-blue-600 text-white justify-center mr-1 text-xs  text-center py-2  font-bold">O</div>  
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
                                                            <p class=" text-white text-xs font-bold ">{{$cg->user->name}}  </p>
                                                        </div>

                                                        <div class="bg-blue-500 m-1 text-center">
                                                            <p class=" text-white text-xs ">Ganancia: {{round($this->premio($cg->carton->id),2)}} $ </p>
                                                        </div>

                                                        <div class="bg-blue-500 m-1 text-center">
                                                            <p class=" text-white text-xs font-bold  ">Modalidad: {{$cg->type}}  </p>
                                                        </div>

                                                        <div class="bg-blue-500 m-1 text-center">
                                                            <p class=" text-white text-xs font-bold uppercase ">LUGAR: {{$cg->lugar}} </p>
                                                        </div>
                
                                            </div> 
                        




                                            
                                        @endforeach
                                

                                </div>

                        </div>

                        <span class="absolute inset-x-0 bottom-0 h-2 bg-gradient-to-r from-green-300 via-blue-500 to-purple-600" ></span>
                    @endif
                
                
                @elseif($cant_lugares == 2)
                    @if($ganador_1 == 0 || $ganador_2 == 0)
                        <div class="w-full bg-white border p-2 border-gray-200 rounded-lg shadow ">

                            <div id="accordion-flush" data-accordion="collapse"
                                data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white"
                                data-inactive-classes="text-gray-500 dark:text-gray-400">
                                

                                <h2 id="accordion-flush-heading-3">
                                    <button wire:click="visible_todos" type="button" class="flex justify-between items-center py-5 w-full font-medium text-left text-gray-500  border-gray-200 dark:border-gray-700 dark:text-gray-400 focus:outline-none  " data-accordion-target="#accordion-flush-body-3" aria-expanded="false" aria-controls="accordion-flush-body-3">
                                        <span class="font-Arima text-blue-600 font-bold text-center ml-4">CARTONES DE TODOS LOS PARTICIPANTES</span>
                                        <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    </button>
                                </h2>
                                <div id="accordion-flush-body-3" class="@if($visible == 0) hidden @endif" aria-labelledby="accordion-flush-heading-3">
                                    <div class="py-5  ">
                                        <div class="flex overflow-x-auto  ">

                                            @foreach ($cartones_todos as $todo_c)
                          
                                                    <div class=" bg-blue-500 mr-2 rounded-md shadow-md w-24 xl:w-auto ">
                                                        <div class="grid grid-cols-5 gap-0.5 justify-center mb-0.5 mt-1 w-24 ">  
                                                
                                                            <div class=" bg-blue-500 text-white justify-center ml-1 text-xs text-center  py-2 font-bold">B</div>  
                                                            <div class=" bg-blue-500 text-white justify-center mx-0.5 text-xs  text-center  py-2 font-bold">I</div>  
                                                            <div class=" bg-blue-500 text-white justify-center mx-0.5 text-xs  text-center py-2  font-bold">N</div>  
                                                            <div class=" bg-blue-500 text-white justify-center mx-0.5 text-xs  text-center py-2  font-bold">G</div>  
                                                            <div class=" bg-blue-500 text-white justify-center mr-1 text-xs  text-center py-2  font-bold">O</div>  
                                                        </div>  
                                                
                                                        <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1  w-22 mb-0.5">  
                                                            @foreach (json_decode($todo_c->carton->content_1) as $item)
                                                                <div class="bg-gray-100  {{$this->background($item)}}  text-xs justify-center text-center py-2 font-bold">{{$item}}</div>  
                                                            @endforeach
                                                        </div>  
                                                
                                                        <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1 w-22 mb-0.5">  
                                                            @foreach (json_decode($todo_c->carton->content_2) as $item)
                                                                <div class="bg-gray-100 {{$this->background($item)}}  text-xs justify-center text-center py-2 font-bold">{{$item}}</div>  
                                                            @endforeach
                                                        </div> 
            
                                                        <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1 w-22 mb-0.5">  
                                                            @foreach (json_decode($todo_c->carton->content_3) as $item)
                                                                <div class="bg-gray-100 {{$this->background($item)}} text-xs justify-center text-center py-2 font-bold">{{$item}}</div>  
                                                            @endforeach
                                                        </div> 
                                                
                                                        <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1 w-22 mb-0.5">  
                                                            @foreach (json_decode($todo_c->carton->content_4) as $item)
                                                                <div class="bg-gray-100 {{$this->background($item)}} text-xs justify-center text-center py-2 font-bold">{{$item}}</div>  
                                                            @endforeach
                                                        </div> 
                                                
                                                        <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1 w-22 mb-0.5">  
                                                            @foreach (json_decode($todo_c->carton->content_5) as $item)
                                                                <div class="bg-gray-100 {{$this->background($item)}} text-xs justify-center text-center py-2 font-bold">{{$item}}</div>  
                                                            @endforeach
                                                        </div> 
            
                                                        <div class="bg-blue-600 m-1 text-center w-20">
                                                            <p class=" text-white  text-xs ">Cartón Nro. {{$todo_c->carton->id}}  </p>
                                                        </div>
            
                                                        <div class="bg-blue-500 m-1 text-center w-20">
                                                            <p class=" text-white text-xs "> {{$this->nombre($todo_c->user->name)}}</p>
                                                        </div>
            
            
                                                    </div> 

                                
                                                    @if($ganador_1 == 0)
                                
                                                        @if($type_2 == 'Tradicional')
                                                            {{$this->verifi_linea_horizontal($todo_c->carton->id)}}
                                                            {{$this->verifi_linea_vertical($todo_c->carton->id)}}
                                                            {{$this->verifi_cuatro_esquinas($todo_c->carton->id)}}
                                                            {{$this->diagonal_iz($todo_c->carton->id)}}
                                                            {{$this->diagonal_dr($todo_c->carton->id)}}
                                                            {{$this->cruz_pequeña($todo_c->carton->id)}}
                                                            {{$this->cruz_grande($todo_c->carton->id)}}
                                                        @else
                                                            {{$this->verifi_carton_lleno($todo_c->carton->id)}}
                                                        @endif
                                                    @else
                                
                                                        @if($type_1 == 'Tradicional')
                                                            {{$this->verifi_linea_horizontal($todo_c->carton->id)}}
                                                            {{$this->verifi_linea_vertical($todo_c->carton->id)}}
                                                            {{$this->verifi_cuatro_esquinas($todo_c->carton->id)}}
                                                            {{$this->diagonal_iz($todo_c->carton->id)}}
                                                            {{$this->diagonal_dr($todo_c->carton->id)}}
                                                            {{$this->cruz_pequeña($todo_c->carton->id)}}
                                                            {{$this->cruz_grande($todo_c->carton->id)}}
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

                            <aside class="col-start-1 col-end-6 overflow-y-hidden md:col-span-1 overflow-x-auto md:h-162 md:overflow-x-hidden md:overflow-y-auto bg-blue-100 border p-2 border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700  " >
                                <div class="w-full flex justify-start md:flex-col md:max-h-96">
                                    <p class=" font-Arima text-blue-600 font-bold text-center text-sm md:text-base ">FICHAS</p>
                                    @foreach($fichas as $ficha)
                                            <div class="relative mr-2 md:mr-0 md:w-full  mt-7">
                                                @if($ficha_ultima == $ficha->id)
                                                    <div class="w-full flex justify-center " >
                                                        <div class=" w-16 h-16  bg-red-500 rounded-full absolute  animate-ping"></div>

                                                    </div>
                                                
                                                @endif
                                                <div class="w-full flex justify-center " >

                                                    <div class="@if($ficha_ultima == $ficha->id) h-14 w-14 lg:h-16 lg:w-16 @else h-14 w-14 animate-pulse animate-fade-right @endif mx-auto my-auto  rounded-full  @if($ficha_ultima == $ficha->id) bg-red-700 @else bg-blue-700 @endif">
                                                        <p class="  text-center font-bold  text-white  mt-1">
                                                            {{$ficha->letra}}
                                                        </p>
                                                        <p class="  text-center font-bold  text-white ">
                                                            {{$ficha->numero}}
                                                        </p>
                                                    </div>

                                                </div>
                                            
                                            </div>
                                    @endforeach
                                </div>
                    
                            </aside>

                            <div class="col-span-3 md:col-span-5 p-2">

                                <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-70">

                                    <p class=" font-Arima text-blue-600 font-bold text-center text-sm md:text-base "  >MIS CARTONES</p>

                                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-1 font-Arima mt-7 mx-1">

                                        @foreach ($mis_cartones as $carton)
                            
                                            <div class=" bg-white rounded-md shadow-md overflow-hidden">
                                                <div class=" bg-blue-500 rounded-t-md shadow-md overflow-hidden md:max-w-xl ">
                            
                                                    <div class="flex justify-center ">
                            
                                                        <img src="{{Storage::url('img/logo4.png') }}" alt="" class="block h-16 w-36 ">
                            
                                                    </div>

                                                    <hr class=" mt-1 "  >
                            
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

                            <div class="col-span-2 md:col-span-2  overflow-y-auto bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 p-2 " >
                                
                                <p class=" font-Arima text-blue-600 font-bold text-center text-sm md:text-base "  >GANADORES</p>

                                <div class="mt-4">
                                    @foreach($cartones_ganadores as $cg)
                                        <div class="py-1 md:py-2 md:px-12 ">
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
                                                                @if($this->posicion($item,'5',$cg->carton->id) == '0' || $this->posicion($item,'3',$cg->carton->id) == '1' || $this->posicion($item,'5',$cg->carton->id) == '2' || $this->posicion($item,'5',$cg->carton->id) == '3' || $this->posicion($item,'5',$cg->carton->id) == '4')
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
                                                        <p class=" text-white text-xs ">Ganancia: {{round($this->premio($cg->carton->id),2)}} $ </p>
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
                    @else

                        <div class=" text-lg font-extrabold text-center ">
                            <span class="bg-gradient-to-r from-blue-500 via-blue-400 to-blue-300 bg-clip-text text-transparent  "> RESULTADOS DEL SORTEO</span>
                        </div>
                        <div class=" flex justify-center w-full mt-4 mb-4">
                            @livewire('carton-ganador', ['sorteo' => $sorteo->id]) 
                            @livewire('fichas-sorteo', ['sorteo' => $sorteo->id]) 
                        </div>

                    


                        <div class=" bg-white border p-2 overflow-x-auto border-gray-200 rounded-lg shadow  mt-4">
                            <div class="flex justify-center">
                                <img width="54" height="30" class="w-[54px]"
                                    src="https://horizon-ui.com/shadcn-nextjs-boilerplate/_next/static/media/SidebarBadge.d6d6c919.png"
                                    alt="">

                            </div>  

                                <p class=" font-Arima text-blue-600 font-bold text-center mt-4"  >CARTONES GANADORES</p>
                                <div class="flex justify-center text-center overflow-x-auto ">

                                        @foreach($cartones_ganadores as $cg)
                     
                                            <div class=" bg-blue-500 rounded-md shadow-md overflow-hidden w-40 mr-2   ">
                                                <div class="grid grid-cols-5 gap-0.5 justify-center  mb-0.5 mt-1 ">  
                                                
                                                    <div class=" bg-blue-600 text-white justify-center ml-1 text-xs text-center  py-2 font-bold">B</div>  
                                                    <div class=" bg-blue-600 text-white justify-center mx-0.5 text-xs  text-center  py-2 font-bold">I</div>  
                                                    <div class=" bg-blue-600 text-white justify-center mx-0.5 text-xs  text-center py-2  font-bold">N</div>  
                                                    <div class=" bg-blue-600 text-white justify-center mx-0.5 text-xs  text-center py-2  font-bold">G</div>  
                                                    <div class=" bg-blue-600 text-white justify-center mr-1 text-xs  text-center py-2  font-bold">O</div>  
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
                                                            <p class=" text-white text-xs font-bold ">{{$cg->user->name}}  </p>
                                                        </div>
    
                                                        <div class="bg-blue-500 m-1 text-center">
                                                            <p class=" text-white text-xs ">Ganancia: {{round($this->premio($cg->carton->id),2)}} $ </p>
                                                        </div>
    
                                                        <div class="bg-blue-500 m-1 text-center">
                                                            <p class=" text-white text-xs font-bold  ">Modalidad: {{$cg->type}}  </p>
                                                        </div>
    
                                                        <div class="bg-blue-500 m-1 text-center">
                                                            <p class=" text-white text-xs font-bold uppercase ">LUGAR: {{$cg->lugar}} </p>
                                                        </div>
                
                                            </div> 
                        




                                            
                                        @endforeach
                                 

                                </div>

                        </div>

                        <span class="absolute inset-x-0 bottom-0 h-2 bg-gradient-to-r from-green-300 via-blue-500 to-purple-600" ></span>

                    @endif
                @else
                    @if($ganador_1 == 0 || $ganador_2 == 0 || $ganador_3 == 0)


                    <div class="flex items-center rounded-t-lg  bg-blue-500 text-gray-800 border p-2 border-gray-200 shadow">

                        
                        <div class="p-4 w-full">
                            
                            <div class="grid grid-cols-4 gap-4">
                                <div class="col-span-2 lg:col-span-1 ">
                                    <div class="flex flex-row bg-white shadow-sm rounded p-4">
                                        <div class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-blue-100 text-blue-500">
                                        
                                        <svg class="w-8 h-8" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg"><g id="a"><path d="M36.08,45.81c7.79-3.37,12.83-11.04,12.83-19.53,0-1.5-.16-2.99-.47-4.46l-2.28-6c-3.77-6.69-10.85-10.82-18.53-10.82C15.88,5,6.35,14.53,6.35,26.28c0,8.49,5.04,16.16,12.83,19.53h16.9Z" fill="#f0f3f5" fill-rule="evenodd"/><path d="M27.63,5c-.69,0-1.36,.04-2.04,.1,6.92,.63,13.15,4.6,16.6,10.72l2.28,6c.31,1.47,.47,2.96,.47,4.46,0,8.49-5.04,16.16-12.83,19.53h3.96c7.79-3.37,12.83-11.04,12.83-19.53,0-1.5-.16-2.99-.47-4.46l-2.28-6c-3.77-6.69-10.85-10.82-18.53-10.82Z" fill="#e4ecf0" fill-rule="evenodd"/><path d="M34.5,37.18c-.3,0-.59,.05-.88,.14l-.24,2.69,1.85,2.88c1.28-.33,2.17-1.49,2.17-2.81,0-1.6-1.3-2.9-2.9-2.9Z" fill="#e8a3c1" fill-rule="evenodd"/><path d="M21.09,34.1c-1.6,0-2.9,1.3-2.9,2.9,0,1.52,1.18,2.79,2.7,2.89l1.57-2.24v-3.2c-.42-.23-.89-.35-1.37-.35h0Z" fill="#8fd7f8" fill-rule="evenodd"/><path d="M40.89,30.43c-1.6,0-2.9,1.3-2.9,2.9,0,1.6,1.3,2.9,2.9,2.9,1.6,0,2.9-1.3,2.9-2.9,0-1.6-1.3-2.9-2.9-2.9Z" fill="#8fd7f8" fill-rule="evenodd"/><path d="M13.35,28.27c-1.6,0-2.9,1.3-2.9,2.9,0,1.6,1.3,2.9,2.9,2.9,1.6,0,2.9-1.3,2.9-2.9,0-1.6-1.3-2.9-2.9-2.9Z" fill="#e8a3c1" fill-rule="evenodd"/><path d="M21.07,20.85c-1.6,0-2.9,1.3-2.9,2.9s1.23,2.84,2.79,2.9l1.99-5.1c-.53-.45-1.19-.69-1.88-.69Z" fill="#f5e680" fill-rule="evenodd"/><path d="M31.91,17.05c-1.52,0-2.78,1.17-2.89,2.68l4.14,2.83c1.01-.48,1.65-1.5,1.65-2.62,0-1.6-1.3-2.9-2.9-2.9Z" fill="#b8f5d2" fill-rule="evenodd"/><path d="M19.88,12.44c-1.6,0-2.9,1.3-2.9,2.9s1.3,2.9,2.9,2.9c1.6,0,2.9-1.3,2.9-2.9,0-1.6-1.3-2.9-2.9-2.9Z" fill="#e8a3c1" fill-rule="evenodd"/><path d="M34.5,37.18c-.28,0-.55,.04-.81,.12,1.2,.36,2.07,1.46,2.07,2.78,0,.84-.36,1.61-.96,2.15l.42,.66c1.28-.33,2.17-1.49,2.17-2.81,0-1.6-1.3-2.9-2.9-2.9Z" fill="#e38fb6" fill-rule="evenodd"/><path d="M21.09,34.1c-.29,0-.56,.04-.82,.12,.19,.06,.38,.13,.56,.22l-1.27,5.01c.39,.24,.84,.4,1.33,.43l1.57-2.24v-3.2c-.42-.23-.89-.35-1.37-.35Z" fill="#75cdf8" fill-rule="evenodd"/><path d="M40.89,30.43c-.27,0-.54,.05-.8,.13,1.22,.37,2.06,1.5,2.06,2.77,0,1.28-.85,2.4-2.08,2.77,.27,.08,.54,.13,.82,.13,1.6,0,2.9-1.3,2.9-2.9,0-1.6-1.3-2.9-2.9-2.9Z" fill="#75cdf8" fill-rule="evenodd"/><path d="M13.35,28.27c-.28,0-.56,.05-.82,.13,1.23,.36,2.08,1.49,2.08,2.77,0,1.28-.84,2.41-2.07,2.77,.26,.08,.53,.12,.81,.13,1.6,0,2.9-1.3,2.9-2.9,0-1.6-1.3-2.9-2.9-2.9Z" fill="#e38fb6" fill-rule="evenodd"/><path d="M21.07,20.85c-.29,0-.59,.05-.87,.14,.41,.1,.79,.29,1.11,.55l-1.8,4.62c.43,.29,.93,.45,1.45,.48l1.99-5.1c-.53-.45-1.19-.69-1.88-.69Z" fill="#f2d865" fill-rule="evenodd"/><path d="M31.91,17.05c-.28,0-.56,.04-.83,.13,1.24,.36,2.09,1.48,2.1,2.77,0,.77-.3,1.5-.85,2.05l.83,.57c1.01-.48,1.65-1.5,1.65-2.62,0-1.6-1.3-2.9-2.9-2.9Z" fill="#a1f3c0" fill-rule="evenodd"/><path d="M19.88,12.44c-.27,0-.54,.05-.8,.13,1.22,.37,2.06,1.49,2.06,2.77,0,1.28-.85,2.4-2.08,2.77,.27,.08,.54,.13,.82,.13,1.6,0,2.9-1.3,2.9-2.9,0-1.6-1.3-2.9-2.9-2.9Z" fill="#e38fb6" fill-rule="evenodd"/><polygon fill="#f5e680" fill-rule="evenodd" points="38.22 53.23 31.92 31.42 28.24 29.89 23.34 31.41 17.04 53.23 29.62 55.32 38.22 53.23"/><path d="M28.24,29.89l-4.9,1.52-1.11,3.84c1.54,1.25,3.47,1.93,5.45,1.94,1.95-.01,3.84-.66,5.37-1.87l-1.12-3.9-3.68-1.53Z" fill="#f2d865" fill-rule="evenodd"/><path d="M27.63,41.72c-1.8,0-3.08,1.46-3.25,3.25l-.8,8.27,3.89,1.83,4.19-1.83-.79-8.27c-.17-1.79-1.45-3.25-3.25-3.25Z" fill="#ebb680" fill-rule="evenodd"/><path d="M34,28.36c-.9,2.75-3.47,4.61-6.37,4.61-3.7,0-6.7-3-6.7-6.7s3-6.7,6.7-6.7c2.9,0,5.47,1.86,6.37,4.61v4.17Z" fill="#7a8594" fill-rule="evenodd"/><path d="M40.78,15.82c-.94,0-1.77,.63-2.01,1.54l-1.83,6.83h-9.3c-1.15,0-2.09,.93-2.09,2.08s.93,2.09,2.09,2.09h10.9c.94,0,1.77-.63,2.02-1.55l1.83-6.83h5.8v-4.17h-7.41Z" fill="#8fd7f8" fill-rule="evenodd"/><path d="M43.67,15.82c-.28,.66-.42,1.37-.42,2.09,0,.72,.15,1.42,.42,2.08h4.51v-4.17h-4.51Z" fill="#75cdf8" fill-rule="evenodd"/><path d="M57.65,17.91c0,3.01-2.44,5.44-5.44,5.44s-5.44-2.44-5.44-5.44,2.44-5.44,5.44-5.44,5.44,2.44,5.44,5.44Z" fill="#d9f0f3" fill-rule="evenodd"/><path d="M52.21,12.46c-.46,0-.91,.06-1.35,.18,2.39,.63,4.06,2.79,4.06,5.26,0,2.48-1.68,4.64-4.08,5.26,.45,.12,.91,.18,1.37,.18,3.01,0,5.44-2.44,5.44-5.44,0-3.01-2.44-5.44-5.44-5.44Z" fill="#b8e3ee" fill-rule="evenodd"/><polygon fill="#f2d865" fill-rule="evenodd" points="17.86 50.38 17.04 53.23 29.62 55.32 38.22 53.23 37.4 50.38 17.86 50.38"/><polygon fill="#e6a361" fill-rule="evenodd" points="23.86 50.38 23.59 53.23 27.48 55.06 31.67 53.23 31.4 50.38 23.86 50.38"/><path d="M14.9,53.23h25.46c1.6,0,2.88,1.29,2.88,2.88s-1.29,2.88-2.88,2.88H14.9c-1.6,0-2.88-1.29-2.88-2.88s1.29-2.88,2.88-2.88Z" fill="#f0f3f5" fill-rule="evenodd"/><path d="M36.69,53.23c1.6,0,2.89,1.29,2.89,2.88s-1.29,2.88-2.89,2.88h3.67c1.6,0,2.88-1.29,2.88-2.88s-1.29-2.88-2.88-2.88h-3.67Z" fill="#e4ecf0" fill-rule="evenodd"/><path d="M52.2,11.46c-2.39,0-4.46,1.32-5.57,3.26-4.03-6.62-11.23-10.72-19.01-10.72C15.35,4,5.35,13.99,5.35,26.28c0,8.59,4.95,16.33,12.64,20.04l-1.71,5.92h-1.39c-2.14,0-3.88,1.74-3.88,3.88s1.74,3.88,3.88,3.88h25.46c2.14,0,3.88-1.74,3.88-3.88s-1.74-3.88-3.88-3.88h-1.39l-1.71-5.92c7.69-3.7,12.65-11.44,12.65-20.03,0-.8-.05-1.61-.13-2.41,.75,.31,1.57,.48,2.43,.48,3.55,0,6.44-2.89,6.44-6.44s-2.89-6.44-6.44-6.44Zm-16.36,29.93l-.9-3.12c.82,.21,1.46,.93,1.46,1.81,0,.51-.22,.97-.56,1.31Zm-8.21-9.41c-3.14,0-5.7-2.56-5.7-5.7s2.57-5.7,5.7-5.7c1.82,0,3.59,.83,4.74,2.62h-4.74c-1.7,0-3.08,1.38-3.08,3.08s1.38,3.08,3.08,3.08h4.74c-1.03,1.59-2.78,2.62-4.74,2.62Zm-7.43,6.68c-.6-.32-1.01-.94-1.01-1.66,0-1.05,.85-1.9,1.9-1.9,.04,0,.08,.03,.13,.03l-1.02,3.53Zm-1.03-14.92c0-1.03,.87-1.9,1.9-1.9,.08,0,.16,.03,.24,.04-.69,.99-1.12,2.15-1.29,3.39-.5-.35-.85-.9-.85-1.54Zm14.11-2.58c-.84-.93-1.86-1.67-3.04-2.1,.32-.6,.95-1.02,1.67-1.02,1.05,0,1.9,.85,1.9,1.9,0,.47-.23,.88-.53,1.22Zm-5.65,6.2c-.6,0-1.08-.49-1.08-1.08s.49-1.08,1.08-1.08h9.3c.45,0,.85-.3,.97-.74l1.83-6.83c.13-.47,.56-.8,1.05-.8h5.09c-.06,.35-.11,.71-.11,1.08s.05,.73,.11,1.08h-3.49c-.45,0-.85,.3-.97,.74l-1.83,6.83c-.13,.47-.56,.8-1.05,.8h-10.91Zm-20.28-1.08C7.35,15.1,16.45,6,27.63,6c6.7,0,12.92,3.36,16.68,8.82h-3.53c-1.39,0-2.62,.94-2.98,2.29l-1.63,6.08h-1.57c-.05-.1-.1-.2-.15-.3,.85-.73,1.37-1.8,1.37-2.95,0-2.15-1.75-3.9-3.9-3.9-1.68,0-3.09,1.11-3.62,2.64-.22-.02-.43-.1-.66-.1-1.83,0-3.49,.67-4.81,1.74-.54-.28-1.12-.47-1.74-.47-2.15,0-3.9,1.75-3.9,3.9,0,1.76,1.24,3.22,2.87,3.68,.25,1.67,1.01,3.17,2.16,4.31l-.42,1.45c-.23-.04-.46-.09-.69-.09-2.15,0-3.9,1.75-3.9,3.9,0,1.62,1.02,2.99,2.46,3.58l-1.09,3.78c-6.83-3.43-11.21-10.37-11.21-18.08Zm34.89,29.84c0,1.04-.84,1.88-1.88,1.88H14.9c-1.04,0-1.88-.85-1.88-1.88s.85-1.88,1.88-1.88h25.46c1.04,0,1.88,.85,1.88,1.88Zm-17.56-3.88l.69-7.17c.11-1.13,.86-2.34,2.25-2.34s2.15,1.21,2.25,2.34l.69,7.17h-5.89Zm7.89,0l-.71-7.36c-.23-2.41-2.02-4.15-4.25-4.15s-4.01,1.75-4.24,4.15l-.71,7.36h-4.31l5.56-19.24c1.1,.61,2.36,.99,3.71,.99s2.58-.42,3.69-1.04l5.57,19.29h-4.31Zm4.12-7.87l-.27-.93c1.19-.68,1.97-1.93,1.97-3.35,0-2.15-1.75-3.9-3.9-3.9-.05,0-.1,.02-.16,.02l-1.32-4.56c.65-.65,1.18-1.41,1.56-2.28h3.94c1.39,0,2.62-.94,2.98-2.29l1.63-6.08h3.44c.26,.47,.56,.9,.92,1.29,.26,1.31,.41,2.66,.41,4,0,7.71-4.38,14.66-11.21,18.08Zm15.5-22.01c-2.45,0-4.44-1.99-4.44-4.44s1.99-4.44,4.44-4.44,4.44,1.99,4.44,4.44-1.99,4.44-4.44,4.44Z"/><path d="M27.63,35.45c-.55,0-1,.45-1,1v1.55c0,.55,.45,1,1,1s1-.45,1-1v-1.55c0-.55-.45-1-1-1Z"/><path d="M40.89,29.43h0c-2.15,0-3.9,1.75-3.9,3.9s1.75,3.9,3.9,3.9,3.9-1.75,3.9-3.9-1.75-3.9-3.9-3.9Zm0,5.8c-1.05,0-1.9-.85-1.9-1.9s.85-1.9,1.9-1.9c1.05,0,1.9,.85,1.9,1.9s-.87,1.9-1.9,1.9Z"/><path d="M13.35,27.27c-2.15,0-3.9,1.75-3.9,3.9s1.75,3.9,3.9,3.9,3.9-1.75,3.9-3.9-1.75-3.9-3.9-3.9Zm0,5.8c-1.05,0-1.9-.85-1.9-1.9s.85-1.9,1.9-1.9,1.9,.85,1.9,1.9-.85,1.9-1.9,1.9Z"/><path d="M19.88,19.24c2.15,0,3.9-1.75,3.9-3.9,0-2.15-1.75-3.9-3.9-3.9s-3.9,1.75-3.9,3.9,1.75,3.9,3.9,3.9Zm0-5.79h0c1.03,0,1.9,.87,1.9,1.9,0,1.05-.85,1.9-1.9,1.9s-1.9-.87-1.9-1.9,.87-1.9,1.9-1.9Z"/></g><g id="b"/><g id="c"/><g id="d"/><g id="e"/><g id="f"/><g id="g"/><g id="h"/><g id="i"/><g id="j"/><g id="k"/><g id="l"/><g id="m"/><g id="n"/><g id="o"/><g id="p"/><g id="q"/><g id="r"/><g id="s"/><g id="t"/><g id="u"/><g id="v"/><g id="w"/><g id="x"/><g id="y"/><g id="a`"/><g id="aa"/><g id="ab"/><g id="ac"/><g id="ad"/><g id="ae"/><g id="af"/><g id="ag"/><g id="ah"/><g id="ai"/><g id="aj"/><g id="ak"/><g id="al"/><g id="am"/><g id="an"/><g id="ao"/><g id="ap"/><g id="aq"/><g id="ar"/><g id="as"/><g id="at"/><g id="au"/><g id="av"/><g id="aw"/><g id="ax"/></svg>
                                        </div>
                                        <div class="flex flex-col flex-grow ml-4">
                                        <div class="text-xs md:text-base text-blue-500 font-bold">SORTEO NRO</div>

                
                                        <div class="font-semibold text-sm">{{$sorteo->id}}</div>

                                     

                                        
                                        </div>
                                    </div>
                                </div>



                                <div class="col-span-2 lg:col-span-1 ">
                                    <div class="flex flex-row bg-white shadow-sm rounded p-4">
                                    <div class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-blue-100 text-blue-500">
                                        <svg  class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g id="_x32_1_x2C__Bingo_x2C__Lottery_x2C__Bet_x2C__Bingo_x2C__Gambling_x2C__Gaming_x2C__Card_x2C__Check"><g><path style="fill:#FFFFFF;" d="M501,41v430c0,16.57-13.43,30-30,30H41c-16.57,0-30-13.43-30-30V41c0-16.57,13.43-30,30-30h430    C487.57,11,501,24.43,501,41z"/><polygon style="fill:#FFFFFF;" points="456,261 456,311 431,320.867 406,311 397,286.6 406,261   "/><polygon style="fill:#FFFFFF;" points="356,261 365.4,286.2 356,311 331,318.733 306,311 295.8,287.8 306,261   "/><polygon style="fill:#FFFFFF;" points="256,261 261.8,286.2 256,311 231,323 206,311 198.6,286.6 206,261   "/><polygon style="fill:#FFFFFF;" points="156,261 161.8,284.2 156,311 131,318.733 106,311 100.6,286.6 106,261   "/><polygon style="fill:#FFFFFF;" points="406,261 406,311 381,320.867 356,311 356,261   "/><polygon style="fill:#FFFFFF;" points="306,261 306,311 281,320.867 256,311 256,261   "/><polygon style="fill:#FFFFFF;" points="206,261 206,311 181,318.733 156,311 156,261   "/><polygon style="fill:#FFFFFF;" points="106,261 106,311 81,318.733 56,311 56,261   "/><polygon style="fill:#FFFFFF;" points="456,310.835 456,360.835 431,370.702 406,360.835 397,336.435 406,310.835   "/><polygon style="fill:#FFFFFF;" points="356,310.835 365.4,336.035 356,360.835 331,368.568 306,360.835 295.8,337.635     306,310.835   "/><polygon style="fill:#FFFFFF;" points="256,310.835 261.8,336.035 256,360.835 231,372.835 206,360.835 198.6,336.435     206,310.835   "/><polygon style="fill:#FFFFFF;" points="156,310.835 161.8,334.035 156,360.835 131,368.568 106,360.835 100.6,336.435     106,310.835   "/><polygon style="fill:#FFFFFF;" points="406,310.835 406,360.835 381,370.702 356,360.835 356,310.835   "/><polygon style="fill:#FFFFFF;" points="306,310.835 306,360.835 281,370.702 256,360.835 256,310.835   "/><polygon style="fill:#FFFFFF;" points="206,310.835 206,360.835 181,368.568 156,360.835 156,310.835   "/><polygon style="fill:#FFFFFF;" points="106,310.835 106,360.835 81,368.568 56,360.835 56,310.835   "/><polygon style="fill:#FFFFFF;" points="456,360.67 456,410.67 431,420.537 406,410.67 397,386.27 406,360.67   "/><polygon style="fill:#FFFFFF;" points="356,360.67 365.4,385.87 356,410.67 331,418.403 306,410.67 295.8,387.47 306,360.67   "/><polygon style="fill:#FFFFFF;" points="256,360.67 261.8,385.87 256,410.67 231,422.67 206,410.67 198.6,386.27 206,360.67   "/><polygon style="fill:#FFFFFF;" points="156,360.67 161.8,383.87 156,410.67 131,418.403 106,410.67 100.6,386.27 106,360.67   "/><polygon style="fill:#FFFFFF;" points="406,360.67 406,410.67 381,420.537 356,410.67 356,360.67   "/><polygon style="fill:#FFFFFF;" points="306,360.67 306,410.67 281,420.537 256,410.67 256,360.67   "/><polygon style="fill:#FFFFFF;" points="206,360.67 206,410.67 181,418.403 156,410.67 156,360.67   "/><polygon style="fill:#FFFFFF;" points="106,360.67 106,410.67 81,418.403 56,410.67 56,360.67   "/><polygon style="fill:#FFFFFF;" points="456,410.505 456,460.505 406,460.505 397,436.105 406,410.505   "/><polygon style="fill:#FFFFFF;" points="356,410.505 365.4,435.705 356,460.505 306,460.505 295.8,437.305 306,410.505   "/><polygon style="fill:#FFFFFF;" points="256,410.505 261.8,435.705 256,460.505 206,460.505 198.6,436.105 206,410.505   "/><polygon style="fill:#FFFFFF;" points="156,410.505 161.8,433.705 156,460.505 106,460.505 100.6,436.105 106,410.505   "/><rect x="356" y="410.505" style="fill:#FFFFFF;" width="50" height="50"/><rect x="256" y="410.505" style="fill:#FFFFFF;" width="50" height="50"/><rect x="156" y="410.505" style="fill:#FFFFFF;" width="50" height="50"/><rect x="56" y="410.505" style="fill:#FFFFFF;" width="50" height="50"/><rect x="81" y="171" style="fill:#9DCAFC;" width="350" height="50"/><g><path style="fill:#4269A7;" d="M471,1H41C18.944,1,1,18.944,1,41v430c0,22.056,17.944,40,40,40h430c22.056,0,40-17.944,40-40V41     C511,18.944,493.056,1,471,1z M491,471c0,11.028-8.972,20-20,20H41c-11.028,0-20-8.972-20-20V41c0-11.028,8.972-20,20-20h430     c11.028,0,20,8.972,20,20V471z"/><path style="fill:#4269A7;" d="M61,141h20c16.542,0,30-13.458,30-30c0-7.678-2.902-14.688-7.663-20     C108.098,85.688,111,78.678,111,71c0-16.542-13.458-30-30-30H61c-5.523,0-10,4.477-10,10c0,9.679,0,70.257,0,80     C51,136.523,55.477,141,61,141z M81,121H71v-20h10c5.514,0,10,4.486,10,10S86.514,121,81,121z M91,71c0,5.514-4.486,10-10,10H71     V61h10C86.514,61,91,65.486,91,71z"/><path style="fill:#4269A7;" d="M141,141c5.523,0,10-4.477,10-10V51c0-5.523-4.477-10-10-10s-10,4.477-10,10v80     C131,136.523,135.477,141,141,141z"/><path style="fill:#4269A7;" d="M181,141c5.523,0,10-4.477,10-10V85.868l31.52,50.432c2.379,3.807,6.976,5.535,11.237,4.313     c4.288-1.229,7.243-5.151,7.243-9.612V51c0-5.523-4.477-10-10-10s-10,4.477-10,10v45.132L189.48,45.7     c-2.364-3.783-6.948-5.543-11.237-4.313C173.955,42.617,171,46.539,171,51v80C171,136.523,175.477,141,181,141z"/><path style="fill:#4269A7;" d="M311,141h20c5.523,0,10-4.477,10-10V91c0-5.523-4.477-10-10-10h-20c-5.523,0-10,4.477-10,10     s4.477,10,10,10h10v20h-10c-16.542,0-30-13.458-30-30s13.458-30,30-30h20c5.523,0,10-4.477,10-10s-4.477-10-10-10h-20     c-27.57,0-50,22.43-50,50S283.43,141,311,141z"/><path style="fill:#4269A7;" d="M411,141c27.57,0,50-22.43,50-50s-22.43-50-50-50s-50,22.43-50,50S383.43,141,411,141z M411,61     c16.542,0,30,13.458,30,30s-13.458,30-30,30s-30-13.458-30-30S394.458,61,411,61z"/><path style="fill:#4269A7;" d="M81,161c-5.523,0-10,4.477-10,10v50c0,5.523,4.477,10,10,10h350c5.523,0,10-4.477,10-10v-50     c0-5.523-4.477-10-10-10H81z M421,211H91v-30h330V211z"/><path style="fill:#4269A7;" d="M456,251c-310.093,0-39.145,0-400,0c-5.523,0-10,4.477-10,10c0,17.6,0,173.464,0,200     c0,5.523,4.477,10,10,10c146.31,0,253.183,0,400,0c5.523,0,10-4.477,10-10c0-17.6,0-173.464,0-200     C466,255.477,461.523,251,456,251z M446,351h-30v-30h30V351z M396,351h-30v-30h30V351z M346,351h-30v-30h30V351z M296,351h-30     v-30h30V351z M246,351h-30v-30h30V351z M196,351h-30v-30h30V351z M146,351h-30v-30h30V351z M96,351H66v-30h30V351z M66,371h30v30     H66V371z M116,371h30v30h-30V371z M166,371h30v30h-30V371z M216,371h30v30h-30V371z M266,371h30v30h-30V371z M316,371h30v30h-30     V371z M366,371h30v30h-30V371z M416,371h30v30h-30V371z M446,301h-30v-30h30V301z M396,301h-30v-30h30V301z M346,301h-30v-30h30     V301z M296,301h-30v-30h30V301z M246,301h-30v-30h30V301z M196,301h-30v-30h30V301z M146,301h-30v-30h30V301z M66,271h30v30H66     V271z M66,421h30v30H66V421z M116,421h30v30h-30V421z M166,421h30v30h-30V421z M216,421h30v30h-30V421z M266,421h30v30h-30V421z      M316,421h30v30h-30V421z M366,421h30v30h-30V421z M446,451h-30v-30h30V451z"/></g></g></g><g id="Layer_1"/></svg>
                                       
                                    </div>
                                    <div class="flex flex-col flex-grow ml-4">
                                        <div class="text-xs md:text-base text-blue-500 font-bold">MODALIDAD</div>
    
                                        @if($ganador_1 == 0 )
                                        <div class="font-semibold text-sm">{{$sorteo->type_3}}</div>
    
                                        @endif
    
                                    @if($ganador_2 == 0 && $ganador_1 == 1)
                                    <div class="font-semibold text-sm">{{$sorteo->type_2}}</div>
                                    @endif
    
                                    @if($ganador_3 == 0 && $ganador_2 == 1)
                                    <div class="font-semibold text-sm">{{$sorteo->type_1}}</div>
                                    @endif
    
                                        
                                    </div>
                                    </div>
                                </div>

                                <div class="col-span-2 lg:col-span-1 ">
                                    <div class="flex flex-row bg-white shadow-sm rounded p-4">
                                    <div class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-blue-100 text-blue-500">
                                        <svg  class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g id="_x32_1_x2C__Bingo_x2C__Lottery_x2C__Bet_x2C__Bingo_x2C__Gambling_x2C__Gaming_x2C__Card_x2C__Check"><g><path style="fill:#FFFFFF;" d="M501,41v430c0,16.57-13.43,30-30,30H41c-16.57,0-30-13.43-30-30V41c0-16.57,13.43-30,30-30h430    C487.57,11,501,24.43,501,41z"/><polygon style="fill:#FFFFFF;" points="456,261 456,311 431,320.867 406,311 397,286.6 406,261   "/><polygon style="fill:#FFFFFF;" points="356,261 365.4,286.2 356,311 331,318.733 306,311 295.8,287.8 306,261   "/><polygon style="fill:#FFFFFF;" points="256,261 261.8,286.2 256,311 231,323 206,311 198.6,286.6 206,261   "/><polygon style="fill:#FFFFFF;" points="156,261 161.8,284.2 156,311 131,318.733 106,311 100.6,286.6 106,261   "/><polygon style="fill:#FFFFFF;" points="406,261 406,311 381,320.867 356,311 356,261   "/><polygon style="fill:#FFFFFF;" points="306,261 306,311 281,320.867 256,311 256,261   "/><polygon style="fill:#FFFFFF;" points="206,261 206,311 181,318.733 156,311 156,261   "/><polygon style="fill:#FFFFFF;" points="106,261 106,311 81,318.733 56,311 56,261   "/><polygon style="fill:#FFFFFF;" points="456,310.835 456,360.835 431,370.702 406,360.835 397,336.435 406,310.835   "/><polygon style="fill:#FFFFFF;" points="356,310.835 365.4,336.035 356,360.835 331,368.568 306,360.835 295.8,337.635     306,310.835   "/><polygon style="fill:#FFFFFF;" points="256,310.835 261.8,336.035 256,360.835 231,372.835 206,360.835 198.6,336.435     206,310.835   "/><polygon style="fill:#FFFFFF;" points="156,310.835 161.8,334.035 156,360.835 131,368.568 106,360.835 100.6,336.435     106,310.835   "/><polygon style="fill:#FFFFFF;" points="406,310.835 406,360.835 381,370.702 356,360.835 356,310.835   "/><polygon style="fill:#FFFFFF;" points="306,310.835 306,360.835 281,370.702 256,360.835 256,310.835   "/><polygon style="fill:#FFFFFF;" points="206,310.835 206,360.835 181,368.568 156,360.835 156,310.835   "/><polygon style="fill:#FFFFFF;" points="106,310.835 106,360.835 81,368.568 56,360.835 56,310.835   "/><polygon style="fill:#FFFFFF;" points="456,360.67 456,410.67 431,420.537 406,410.67 397,386.27 406,360.67   "/><polygon style="fill:#FFFFFF;" points="356,360.67 365.4,385.87 356,410.67 331,418.403 306,410.67 295.8,387.47 306,360.67   "/><polygon style="fill:#FFFFFF;" points="256,360.67 261.8,385.87 256,410.67 231,422.67 206,410.67 198.6,386.27 206,360.67   "/><polygon style="fill:#FFFFFF;" points="156,360.67 161.8,383.87 156,410.67 131,418.403 106,410.67 100.6,386.27 106,360.67   "/><polygon style="fill:#FFFFFF;" points="406,360.67 406,410.67 381,420.537 356,410.67 356,360.67   "/><polygon style="fill:#FFFFFF;" points="306,360.67 306,410.67 281,420.537 256,410.67 256,360.67   "/><polygon style="fill:#FFFFFF;" points="206,360.67 206,410.67 181,418.403 156,410.67 156,360.67   "/><polygon style="fill:#FFFFFF;" points="106,360.67 106,410.67 81,418.403 56,410.67 56,360.67   "/><polygon style="fill:#FFFFFF;" points="456,410.505 456,460.505 406,460.505 397,436.105 406,410.505   "/><polygon style="fill:#FFFFFF;" points="356,410.505 365.4,435.705 356,460.505 306,460.505 295.8,437.305 306,410.505   "/><polygon style="fill:#FFFFFF;" points="256,410.505 261.8,435.705 256,460.505 206,460.505 198.6,436.105 206,410.505   "/><polygon style="fill:#FFFFFF;" points="156,410.505 161.8,433.705 156,460.505 106,460.505 100.6,436.105 106,410.505   "/><rect x="356" y="410.505" style="fill:#FFFFFF;" width="50" height="50"/><rect x="256" y="410.505" style="fill:#FFFFFF;" width="50" height="50"/><rect x="156" y="410.505" style="fill:#FFFFFF;" width="50" height="50"/><rect x="56" y="410.505" style="fill:#FFFFFF;" width="50" height="50"/><rect x="81" y="171" style="fill:#9DCAFC;" width="350" height="50"/><g><path style="fill:#4269A7;" d="M471,1H41C18.944,1,1,18.944,1,41v430c0,22.056,17.944,40,40,40h430c22.056,0,40-17.944,40-40V41     C511,18.944,493.056,1,471,1z M491,471c0,11.028-8.972,20-20,20H41c-11.028,0-20-8.972-20-20V41c0-11.028,8.972-20,20-20h430     c11.028,0,20,8.972,20,20V471z"/><path style="fill:#4269A7;" d="M61,141h20c16.542,0,30-13.458,30-30c0-7.678-2.902-14.688-7.663-20     C108.098,85.688,111,78.678,111,71c0-16.542-13.458-30-30-30H61c-5.523,0-10,4.477-10,10c0,9.679,0,70.257,0,80     C51,136.523,55.477,141,61,141z M81,121H71v-20h10c5.514,0,10,4.486,10,10S86.514,121,81,121z M91,71c0,5.514-4.486,10-10,10H71     V61h10C86.514,61,91,65.486,91,71z"/><path style="fill:#4269A7;" d="M141,141c5.523,0,10-4.477,10-10V51c0-5.523-4.477-10-10-10s-10,4.477-10,10v80     C131,136.523,135.477,141,141,141z"/><path style="fill:#4269A7;" d="M181,141c5.523,0,10-4.477,10-10V85.868l31.52,50.432c2.379,3.807,6.976,5.535,11.237,4.313     c4.288-1.229,7.243-5.151,7.243-9.612V51c0-5.523-4.477-10-10-10s-10,4.477-10,10v45.132L189.48,45.7     c-2.364-3.783-6.948-5.543-11.237-4.313C173.955,42.617,171,46.539,171,51v80C171,136.523,175.477,141,181,141z"/><path style="fill:#4269A7;" d="M311,141h20c5.523,0,10-4.477,10-10V91c0-5.523-4.477-10-10-10h-20c-5.523,0-10,4.477-10,10     s4.477,10,10,10h10v20h-10c-16.542,0-30-13.458-30-30s13.458-30,30-30h20c5.523,0,10-4.477,10-10s-4.477-10-10-10h-20     c-27.57,0-50,22.43-50,50S283.43,141,311,141z"/><path style="fill:#4269A7;" d="M411,141c27.57,0,50-22.43,50-50s-22.43-50-50-50s-50,22.43-50,50S383.43,141,411,141z M411,61     c16.542,0,30,13.458,30,30s-13.458,30-30,30s-30-13.458-30-30S394.458,61,411,61z"/><path style="fill:#4269A7;" d="M81,161c-5.523,0-10,4.477-10,10v50c0,5.523,4.477,10,10,10h350c5.523,0,10-4.477,10-10v-50     c0-5.523-4.477-10-10-10H81z M421,211H91v-30h330V211z"/><path style="fill:#4269A7;" d="M456,251c-310.093,0-39.145,0-400,0c-5.523,0-10,4.477-10,10c0,17.6,0,173.464,0,200     c0,5.523,4.477,10,10,10c146.31,0,253.183,0,400,0c5.523,0,10-4.477,10-10c0-17.6,0-173.464,0-200     C466,255.477,461.523,251,456,251z M446,351h-30v-30h30V351z M396,351h-30v-30h30V351z M346,351h-30v-30h30V351z M296,351h-30     v-30h30V351z M246,351h-30v-30h30V351z M196,351h-30v-30h30V351z M146,351h-30v-30h30V351z M96,351H66v-30h30V351z M66,371h30v30     H66V371z M116,371h30v30h-30V371z M166,371h30v30h-30V371z M216,371h30v30h-30V371z M266,371h30v30h-30V371z M316,371h30v30h-30     V371z M366,371h30v30h-30V371z M416,371h30v30h-30V371z M446,301h-30v-30h30V301z M396,301h-30v-30h30V301z M346,301h-30v-30h30     V301z M296,301h-30v-30h30V301z M246,301h-30v-30h30V301z M196,301h-30v-30h30V301z M146,301h-30v-30h30V301z M66,271h30v30H66     V271z M66,421h30v30H66V421z M116,421h30v30h-30V421z M166,421h30v30h-30V421z M216,421h30v30h-30V421z M266,421h30v30h-30V421z      M316,421h30v30h-30V421z M366,421h30v30h-30V421z M446,451h-30v-30h30V451z"/></g></g></g><g id="Layer_1"/></svg>
                                       
                                    </div>
                                    <div class="flex flex-col flex-grow ml-4">
                                        <div class="text-xs md:text-base text-blue-500 font-bold">MODALIDADES</div>

                                        <div class="font-semibold text-sm">@livewire('sorteo.info-modalidades',['sorteo_select' => $sorteo->id, 'tipo' => 'Jugar']) </div>
    
                     
    
                                  
    
                                        
                                    </div>
                                    </div>
                                </div>

                                <div class="col-span-2 lg:col-span-1 ">
                                    <div class="flex flex-row bg-white shadow-sm rounded p-4">
                                    <div class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-blue-100 text-blue-500">
                                     
                                    
                                        <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 32 32" style="enable-background:new 0 0 32 32;" xml:space="preserve"><style type="text/css">
                                            .st0{display:none;}
                                            .st1{display:inline;}
                                            .st2{fill:#CDF6F9;}
                                            .st3{fill:#FFFFFF;}
                                            .st4{fill:#1A83A8;}
                                        </style><g id="Layer_1" class="st0"/><g id="Layer_2"/><g id="Layer_3"/><g id="Layer_4"/><g id="Layer_5"/><g id="Layer_6"><circle class="st2" cx="16" cy="20.667" r="8.333"/><path class="st3" d="M16.383,16.901l1.066,1.706l1.952,0.486c0.324,0.081,0.451,0.473,0.237,0.728l-1.293,1.541l0.141,2.007   c0.023,0.333-0.31,0.575-0.619,0.45L16,23.065l-1.865,0.754c-0.309,0.125-0.643-0.117-0.619-0.45l0.141-2.007l-1.293-1.541   c-0.214-0.256-0.087-0.647,0.237-0.728l1.952-0.486l1.066-1.706C15.794,16.618,16.206,16.618,16.383,16.901z"/><path class="st2" d="M24.5,4.5l-3.23,9.71C19.83,13.03,18,12.33,16,12.33s-3.83,0.7-5.27,1.88L7.5,4.5C7.25,3.76,7.8,3,8.58,3   h14.84C24.2,3,24.75,3.76,24.5,4.5z"/><path class="st3" d="M19.21,3l-1.14,9.59c-0.66-0.17-1.36-0.26-2.07-0.26s-1.41,0.09-2.07,0.26L12.79,3H19.21z"/><path class="st4" d="M19.618,18.22l-1.6-0.398l-0.872-1.397c-0.498-0.796-1.795-0.796-2.293,0l-0.872,1.397l-1.6,0.398   c-0.455,0.113-0.813,0.447-0.958,0.894c-0.146,0.446-0.052,0.927,0.25,1.286l1.06,1.262l-0.115,1.644   c-0.033,0.468,0.174,0.912,0.554,1.188c0.235,0.171,0.513,0.259,0.792,0.259c0.171,0,0.344-0.033,0.508-0.1L16,24.035l1.527,0.617   c0.435,0.176,0.922,0.117,1.301-0.159c0.38-0.276,0.587-0.72,0.554-1.188l-0.115-1.644l1.06-1.262   c0.302-0.359,0.396-0.84,0.25-1.286C20.432,18.667,20.073,18.333,19.618,18.22z M17.654,20.783   c-0.15,0.179-0.225,0.409-0.208,0.642l0.09,1.29l-1.199-0.485c-0.107-0.043-0.223-0.065-0.337-0.065s-0.229,0.022-0.337,0.065   l-1.199,0.485l0.09-1.29c0.017-0.233-0.058-0.463-0.208-0.642l-0.831-0.99l1.255-0.313c0.227-0.057,0.422-0.199,0.546-0.397   L16,17.987l0.685,1.097c0.124,0.198,0.319,0.34,0.546,0.397l1.255,0.313L17.654,20.783z"/><path class="st4" d="M25.072,2.948C24.689,2.417,24.07,2.1,23.415,2.1H8.585c-0.655,0-1.274,0.317-1.657,0.848   C6.545,3.479,6.439,4.167,6.646,4.788l3.047,9.154c-1.796,1.686-2.927,4.073-2.927,6.725c0,5.091,4.143,9.233,9.233,9.233   s9.233-4.142,9.233-9.233c0-2.652-1.13-5.039-2.927-6.725l3.047-9.154C25.561,4.167,25.455,3.479,25.072,2.948z M16,11.434   c-0.439,0-0.867,0.041-1.29,0.101L13.803,3.9h4.394l-0.907,7.635C16.867,11.475,16.439,11.434,16,11.434z M8.354,4.219   C8.321,4.122,8.354,4.047,8.388,4.001S8.481,3.9,8.585,3.9h3.406l0.958,8.063c-0.613,0.216-1.196,0.494-1.743,0.828L8.354,4.219z    M23.433,20.667c0,4.099-3.334,7.434-7.433,7.434s-7.433-3.335-7.433-7.434s3.334-7.433,7.433-7.433S23.433,16.568,23.433,20.667z    M23.646,4.219l-2.853,8.571c-0.547-0.334-1.129-0.612-1.743-0.828L20.009,3.9h3.406c0.104,0,0.164,0.055,0.197,0.101   S23.679,4.122,23.646,4.219z"/></g><g id="Layer_7"/><g id="Layer_8"/><g id="Layer_9"/><g id="Layer_10"/><g id="Layer_11"/><g id="Layer_12"/><g id="Layer_13"/><g id="Layer_14"/><g id="Layer_15"/><g id="Layer_16"/><g id="Layer_17"/><g id="Layer_18"/><g id="Layer_19"/><g id="Layer_20"/><g id="Layer_21"/><g id="Layer_22"/><g id="Layer_23"/><g id="Layer_24"/><g id="Layer_25"/><g id="Layer_26"/></svg>
                                    </div>
                                    <div class="flex flex-col flex-grow ml-4">
                                        <div class="text-xs md:text-base text-blue-500 font-bold">LUGAR NRO</div>
    
                                        @if($ganador_1 == 0 )
                                        <div class="font-semibold text-sm">Tercero</div>
    
                                        @endif
    
                                        @if($ganador_2 == 0 && $ganador_1 == 1)
                                        <div class="font-semibold text-sm">Segundo</div>
                                        @endif
        
                                        @if($ganador_3 == 0 && $ganador_2 == 1)
                                        <div class="font-semibold text-sm">Primero</div>
                                        @endif
    
                                        
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
                                    <button wire:click="visible_todos" type="button" class="flex justify-between items-center py-5 w-full font-medium text-left text-gray-500  border-gray-200 dark:border-gray-700 dark:text-gray-400 focus:outline-none  " data-accordion-target="#accordion-flush-body-3" aria-expanded="false" aria-controls="accordion-flush-body-3">
                                        <span class="font-Arima text-blue-600 font-bold text-center text-sm md:text-base ml-4">CARTONES DE TODOS LOS PARTICIPANTES</span>
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
                                
                                                    @if($ganador_1 == 0)
                                
                                                        @if($type_3 == 'Tradicional')
                                                            {{$this->verifi_linea_horizontal($todo_c->carton->id)}}
                                                            {{$this->verifi_linea_vertical($todo_c->carton->id)}}
                                                            {{$this->verifi_cuatro_esquinas($todo_c->carton->id)}}
                                                            {{$this->diagonal_iz($todo_c->carton->id)}}
                                                            {{$this->diagonal_dr($todo_c->carton->id)}}
                                                            {{$this->cruz_pequeña($todo_c->carton->id)}}
                                                            {{$this->cruz_grande($todo_c->carton->id)}}
                                                        @else
                                                            {{$this->verifi_carton_lleno($todo_c->carton->id)}}
                                                        @endif
                                                    @endif

                                                    @if($ganador_1 == 1 && $ganador_2 == 0 && $ganador_3 == 0)
                                
                                                        @if($type_2 == 'Tradicional')
                                                            {{$this->verifi_linea_horizontal($todo_c->carton->id)}}
                                                            {{$this->verifi_linea_vertical($todo_c->carton->id)}}
                                                            {{$this->verifi_cuatro_esquinas($todo_c->carton->id)}}
                                                            {{$this->diagonal_iz($todo_c->carton->id)}}
                                                            {{$this->diagonal_dr($todo_c->carton->id)}}
                                                            {{$this->cruz_pequeña($todo_c->carton->id)}}
                                                            {{$this->cruz_grande($todo_c->carton->id)}}
                                                        @else
                                                            {{$this->verifi_carton_lleno($todo_c->carton->id)}}
                                                        @endif
                                
                                                    @endif

                                                    @if($ganador_1 == 1 && $ganador_2 == 1 && $ganador_3 == 0)
                                
                                                        @if($type_1 == 'Tradicional')
                                                            {{$this->verifi_linea_horizontal($todo_c->carton->id)}}
                                                            {{$this->verifi_linea_vertical($todo_c->carton->id)}}
                                                            {{$this->verifi_cuatro_esquinas($todo_c->carton->id)}}
                                                            {{$this->diagonal_iz($todo_c->carton->id)}}
                                                            {{$this->diagonal_dr($todo_c->carton->id)}}
                                                            {{$this->cruz_pequeña($todo_c->carton->id)}}
                                                            {{$this->cruz_grande($todo_c->carton->id)}}
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
                                    <p class=" font-Arima text-white font-bold text-center text-sm md:text-base ">FICHAS</p>
                                    @foreach($fichas as $ficha)
                                            <div class="relative mr-2 md:mr-0 md:w-full  mt-7">
                                                @if($ficha_ultima == $ficha->id)
                                                    <div class="w-full flex justify-center " >

                                                        <div class=" bg-red-500 w-16 h-16 absolute  rounded-full shadow-2xl shadow-red-500 animate-ping border-white  border-dashed border-2  flex justify-center items-center "></div>
                                                        {{-- <div class=" w-16 h-16  bg-red-500 rounded-full absolute  animate-ping"></div> --}}

                                                    </div>
                                                
                                                @endif
                                                <div class="w-full flex justify-center " >

                                                    <div class="@if($ficha_ultima == $ficha->id) h-14 w-14 lg:h-16 lg:w-16 @else h-14 w-14 animate-pulse animate-fade-right @endif mx-auto my-auto border-white  border-dashed border-2  shadow-2xl  rounded-full  @if($ficha_ultima == $ficha->id) bg-red-700 @else bg-blue-700 @endif">
                                                        <p class="  text-center font-bold  text-white  mt-1">
                                                            {{$ficha->letra}}
                                                        </p>
                                                        <p class="  text-center font-bold  text-white ">
                                                            {{$ficha->numero}}
                                                        </p>
                                                    </div>

                                                </div>
                                            
                                            </div>
                                    @endforeach
                                </div>
                    
                            </aside>

                            <div class="col-span-3 md:col-span-5 p-2">

                                <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-70">

                                    <p class=" font-Arima text-blue-600 font-bold text-center text-sm md:text-base "  >MIS CARTONES</p>

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

                            <div class="col-span-2 md:col-span-2  overflow-y-auto bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 p-2 " >
                                
                                <p class=" font-Arima text-blue-600 font-bold text-center text-sm md:text-base "  >GANADORES</p>

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
                                                       

                                                        <p class=" text-white text-xs ">Ganancia: {{round($this->premio($cg->carton->id),2)}} $ </p>
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
                        
                    @else

                        <div class=" text-lg font-extrabold text-center ">
                            <span class="bg-gradient-to-r from-blue-500 via-blue-400 to-blue-300 bg-clip-text text-transparent  "> RESULTADOS DEL SORTEO</span>
                        </div>
                        <div class=" flex justify-center w-full mt-4 mb-4">
                            @livewire('carton-ganador', ['sorteo' => $sorteo->id]) 
                            @livewire('fichas-sorteo', ['sorteo' => $sorteo->id]) 
                        </div>

                    


                        <div class=" bg-white border p-2 overflow-x-auto border-gray-200 rounded-lg shadow w-full  mt-4">
                            <div class="flex justify-center">
                                <img width="54" height="30" class="w-[54px]"
                                    src="https://horizon-ui.com/shadcn-nextjs-boilerplate/_next/static/media/SidebarBadge.d6d6c919.png"
                                    alt="">

                            </div>  

                                <p class=" font-Arima text-blue-600 font-bold text-center mt-4"  >CARTONES GANADORES</p>
                                <div class="flex overflow-x-auto text-center  ">

         
                                        @foreach($cartones_ganadores as $cg)
                                            <div class="py-1 md:py-2 md:px-12 ">
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
                                                        

                                                            <p class=" text-white text-xs ">Ganancia: {{round($this->premio($cg->carton->id),2)}} $ </p>
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
                @endif
            </div>


    @else

        <div class=" flex justify-between relative container " >

            <div class="w-full flex flex-col justify-center " >
                <h3 class=" font-Allerta font-bold text-xl md:text-5xl text-blue-500 text-center mt-4 mb-2   ">JUGAR SORTEO</h3>
            </div>

            <div class="w-full font-Arima ">

                <div class=" w-3/4 items-center"  >

                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        viewBox="0 0 500 500" style="enable-background:new 0 0 500 500;" xml:space="preserve">
                        <g id="Window">
                            <g id="Window_9_">
                                <g>
                                    <polygon id="XMLID_674_" style="fill:#FFFFFF;" points="124.677,150.279 27.466,206.399 27.466,93.689 124.677,37.582 			"/>
                                </g>
                                <g>
                                    <polygon id="XMLID_673_" style="fill:#FAFAFA;" points="25.559,207.505 27.465,208.641 126.582,151.416 124.677,150.279 			"/>
                                    <path id="XMLID_556_" style="fill:#F0F0F0;" d="M130.18,30.235L23.869,91.613l0,123.257l106.31-61.379L130.18,30.235z
                                        M126.582,151.416l-99.116,57.225l0.001-114.952l99.116-57.225L126.582,151.416z"/>
                                    <polygon id="XMLID_551_" style="fill:#E0E0E0;" points="126.582,151.416 124.677,150.279 124.677,37.582 126.582,36.464 			"/>
                                    <polygon id="XMLID_528_" style="fill:#FAFAFA;" points="130.18,30.235 128.244,29.127 21.934,90.505 23.869,91.613 			"/>
                                    <polygon id="XMLID_526_" style="fill:#E0E0E0;" points="21.934,90.505 23.869,91.613 23.869,214.87 21.934,213.762 			"/>
                                </g>
                                <g>
                                    <polygon id="XMLID_512_" style="fill:#FAFAFA;" points="29.05,147.149 29.05,149.386 126.582,93.003 124.677,91.866 			"/>
                                    <polygon id="XMLID_452_" style="fill:#E0E0E0;" points="73.958,66.857 75.893,65.74 75.894,180.698 73.958,179.59 			"/>
                                    <polygon style="fill:#F0F0F0;" points="79.491,63.673 75.893,65.74 75.894,180.698 79.49,178.615 			"/>
                                    <g>
                                        <polygon style="fill:#F0F0F0;" points="126.582,93.003 126.582,97.15 27.428,154.61 27.428,150.463 				"/>
                                    </g>
                                    <polygon style="fill:#FAFAFA;" points="75.894,122.376 73.958,121.187 27.465,148.061 27.465,150.463 			"/>
                                </g>
                            </g>
                        </g>
                        <g id="Pictures">
                            <g id="Picture_10_">
                                <g id="Frame_8_">
                                    <polygon id="XMLID_3560_" style="fill:#FAFAFA;" points="145.018,72.701 146.625,73.66 179.609,54.616 178.002,53.657 			"/>
                                    <g id="XMLID_684_">
                                        <g id="XMLID_3556_">
                                            <g id="XMLID_3558_">
                                                <polygon id="XMLID_3559_" style="fill:#FFFFFF;" points="178.002,53.657 146.626,71.769 146.626,45.088 178.003,26.988 						
                                                    "/>
                                            </g>
                                        </g>
                                    </g>
                                    <path id="XMLID_678_" style="fill:#F0F0F0;" d="M182.643,20.792l-39.051,22.546l0,35.575l39.051-22.546L182.643,20.792z
                                        M179.609,54.616L146.625,73.66l0.001-28.571l32.983-19.043L179.609,54.616z"/>
                                    <polygon id="XMLID_677_" style="fill:#E0E0E0;" points="179.609,54.616 178.002,53.657 178.003,26.988 179.609,26.045 			"/>
                                    <polygon id="XMLID_676_" style="fill:#FAFAFA;" points="182.643,20.792 181.011,19.857 141.96,42.403 143.592,43.338 			"/>
                                    <polygon id="XMLID_675_" style="fill:#E0E0E0;" points="141.96,42.403 143.592,43.338 143.592,78.913 141.96,77.978 			"/>
                                </g>
                                <g id="Land_8_">
                                    <polygon style="fill:#F0F0F0;" points="176.777,52.675 147.851,69.376 147.851,67.202 155.083,50.502 159.588,54.677 
                                        158.964,58.549 167.956,40.316 176.777,50.502 			"/>
                                    <path style="fill:#F0F0F0;" d="M159.316,42.438c-1.182,0.682-2.139,2.341-2.139,3.706c0,1.364,0.958,1.917,2.139,1.235
                                        c1.182-0.682,2.139-2.341,2.139-3.706C161.455,42.308,160.497,41.756,159.316,42.438z"/>
                                </g>
                            </g>
                            <g id="Picture_1_">
                                <g id="Frame_1_">
                                    <polygon id="XMLID_3574_" style="fill:#FAFAFA;" points="145.255,128.074 146.862,129.032 179.846,109.988 178.239,109.029 			
                                        "/>
                                    <g id="XMLID_3568_">
                                        <g id="XMLID_3571_">
                                            <g id="XMLID_3572_">
                                                <polygon id="XMLID_3573_" style="fill:#FFFFFF;" points="178.239,109.029 146.863,127.141 146.863,100.46 178.24,82.36 						
                                                    "/>
                                            </g>
                                        </g>
                                    </g>
                                    <path id="XMLID_3564_" style="fill:#F0F0F0;" d="M182.88,76.164L143.829,98.71l0,35.575l39.051-22.546L182.88,76.164z
                                        M179.846,109.988l-32.983,19.043l0.001-28.571l32.983-19.043L179.846,109.988z"/>
                                    <polygon id="XMLID_3563_" style="fill:#E0E0E0;" points="179.846,109.988 178.239,109.029 178.24,82.36 179.846,81.417 			"/>
                                    <polygon id="XMLID_3562_" style="fill:#FAFAFA;" points="182.88,76.164 181.248,75.229 142.197,97.775 143.829,98.71 			"/>
                                    <polygon id="XMLID_3561_" style="fill:#E0E0E0;" points="142.197,97.775 143.829,98.71 143.829,134.285 142.197,133.35 			"/>
                                </g>
                                <g id="Land_1_">
                                    <polygon style="fill:#F0F0F0;" points="177.014,108.047 148.088,124.748 148.088,122.575 155.32,105.874 159.825,110.049 
                                        159.201,113.922 168.193,95.688 177.014,105.874 			"/>
                                    <path style="fill:#F0F0F0;" d="M159.553,97.81c-1.182,0.682-2.139,2.341-2.139,3.706c0,1.364,0.958,1.917,2.139,1.235
                                        c1.182-0.682,2.139-2.341,2.139-3.706C161.692,97.681,160.734,97.128,159.553,97.81z"/>
                                </g>
                            </g>
                            <g id="Picture_2_">
                                <g id="Frame_2_">
                                    <polygon id="XMLID_3605_" style="fill:#FAFAFA;" points="312.843,146.903 310.619,148.229 276.033,128.26 278.255,126.933 			"/>
                                    <g id="XMLID_3596_">
                                        <g id="XMLID_3597_">
                                            <g id="XMLID_3598_">
                                                <polygon id="XMLID_3604_" style="fill:#FFFFFF;" points="278.255,126.933 310.619,145.614 310.618,61.786 278.254,43.122 
                                                                            "/>
                                            </g>
                                        </g>
                                    </g>
                                    <path id="XMLID_3579_" style="fill:#F0F0F0;" d="M271.836,130.681l42.979,24.814l0-96.131L271.835,34.55L271.836,130.681z
                                        M276.032,41.817l34.586,19.969l0.001,86.443l-34.587-19.969L276.032,41.817z"/>
                                    <polygon id="XMLID_3578_" style="fill:#E0E0E0;" points="276.033,128.26 278.255,126.933 278.254,43.122 276.032,41.817 			"/>
                                    <polygon id="XMLID_3577_" style="fill:#FAFAFA;" points="271.835,34.55 274.093,33.258 317.072,58.072 314.815,59.364 			"/>
                                    <polygon id="XMLID_457_" style="fill:#E0E0E0;" points="317.072,58.072 314.815,59.364 314.815,155.495 317.072,154.202 			"/>
                                </g>
                                <g id="Land_4_">
                                    <polygon style="fill:#F0F0F0;" points="281.51,124.336 307.378,139.271 307.378,65.718 281.51,50.783 			"/>
                                </g>
                                <g>
                                    <g id="Land_3_">
                                        <polygon style="fill:#F0F0F0;" points="281.51,124.336 307.378,139.271 307.378,65.718 281.51,50.783 				"/>
                                    </g>
                                    <path style="fill:#FAFAFA;" d="M307.378,113.824c-1.226,0.44-2.47,0.695-3.697,0.866c-4.3,0.598-8.554,0.325-12.599-0.809
                                        c-3.131-0.877-6.259-2.245-9.572-1.563v12.018l3.503,2.023c1.394-2.104,3.004-3.867,4.802-4.984
                                        c4.985-3.097,10.097-0.778,15.218-1.202c0.778-0.064,1.562-0.218,2.345-0.412V113.824z"/>
                                    <path style="fill:#FAFAFA;" d="M307.378,101.591c-5.788-1.017-11.726-1.589-15.856-6.628c-3.329-4.062-4.897-10.44-5.993-16.797
                                        c-1.096-6.358-1.847-13.014-3.952-18.609c-0.021-0.056-0.047-0.107-0.068-0.162v38.334c0.325,0.609,0.648,1.22,0.994,1.805
                                        c3.801,6.409,9.4,11.165,15.792,10.066c3.004-0.516,6.108-2.283,9.083-3V101.591z"/>
                                    <path style="fill:#FAFAFA;" d="M307.378,85.966c-4.438-4.49-6.814-12.864-5.731-21.475c0.08-0.638,0.182-1.276,0.292-1.913
                                        l-9.952-5.745c0.039,0.924,0.071,1.85,0.089,2.775c0.105,5.394-0.027,10.913,0.816,15.992
                                        c1.413,8.517,5.675,15.324,11.338,18.107c1.012,0.497,2.067,0.859,3.148,1.099V85.966z"/>
                                </g>
                            </g>
                        </g>
                        <g id="Door_3_">
                            <g id="Door">
                                <g id="Interior">
                                    <g>
                                        <g>
                                            <polygon style="fill:#E0E0E0;" points="356.075,356.589 458.1,415.427 458.1,299.361 					"/>
                                        </g>
                                    </g>
                                </g>
                                <g id="Interior_1_" style="opacity:0.15;">
                                    <g>
                                        <g>
                                            <polygon points="356.075,356.589 458.1,415.427 458.1,299.361 					"/>
                                        </g>
                                    </g>
                                </g>
                                <g id="Door_1_">
                                    <g id="Door_2_">
                                        <path style="fill:#455A64;" d="M360.897,64.37v289.514l102.026,58.826V123.204L360.897,64.37z M404,217.31l-30.773-17.787
                                            V83.458l30.781,17.787L404,217.31z M448.698,243.096l-30.879-17.769V109.262l30.879,17.769V243.096z"/>
                                        <g>
                                            <polygon style="fill:#263238;" points="417.825,225.374 414.488,227.301 448.701,246.996 448.698,243.096 					"/>
                                            <polygon style="fill:#263238;" points="373.228,199.574 369.891,201.5 403.996,221.208 407.333,219.282 					"/>
                                            <polygon style="fill:#37474F;" points="373.228,199.572 373.228,83.459 369.882,81.528 369.891,201.499 					"/>
                                            <polygon style="fill:#455A64;" points="414.488,227.301 403.996,221.208 403.996,101.286 414.488,107.379 					"/>
                                            <polygon style="fill:#37474F;" points="414.488,227.301 417.825,225.374 417.819,109.262 414.488,107.379 					"/>
                                            <g>
                                                <polygon style="opacity:0.1;" points="414.488,243.326 448.702,263.021 448.701,386.66 414.488,366.965 						"/>
                                                <polygon style="fill:#455A64;" points="416.839,251.111 443.304,266.332 443.303,377.113 416.839,361.892 						"/>
                                                <polygon style="fill:#37474F;" points="448.702,263.021 443.304,266.332 443.303,377.113 448.701,386.66 						"/>
                                                <polygon style="fill:#37474F;" points="414.488,243.326 416.839,251.111 416.839,361.892 414.488,366.965 						"/>
                                                <polygon style="fill:#263238;" points="414.488,366.965 416.839,361.892 443.303,377.113 448.701,386.66 						"/>
                                            </g>
                                            <g>
                                                <polygon style="opacity:0.1;" points="369.88,217.519 403.995,237.232 403.993,360.871 369.88,341.159 						"/>
                                                <polygon style="fill:#455A64;" points="372.23,225.304 398.596,240.543 398.595,351.324 372.23,336.086 						"/>
                                                <polygon style="fill:#37474F;" points="403.995,237.232 398.596,240.543 398.595,351.324 403.993,360.871 						"/>
                                                <polygon style="fill:#37474F;" points="369.88,217.519 372.23,225.304 372.23,336.086 369.88,341.159 						"/>
                                                <polygon style="fill:#263238;" points="369.88,341.159 372.23,336.086 398.595,351.324 403.993,360.871 						"/>
                                            </g>
                                        </g>
                                        <g id="Latch">
                                            <polygon style="fill:#E0E0E0;" points="459.806,250.482 458.096,251.469 458.094,279.852 459.805,278.865 					"/>
                                            <polygon style="fill:#FAFAFA;" points="458.096,251.469 448.878,246.148 448.877,274.53 458.094,279.852 					"/>
                                            <path style="opacity:0.05;" d="M448.877,253.958l4.035,2.33l-0.001,4.613c0,0.424-0.459,0.689-0.826,0.477l-3.209-1.852
                                                V253.958z"/>
                                            <polygon style="fill:#EBEBEB;" points="448.878,246.148 450.588,245.161 459.806,250.482 458.096,251.469 					"/>
                                            <g>
                                                <path style="fill:#E0E0E0;" d="M454.562,255.335l-4.228,2.441l-1.692-2.931l4.228-2.441l0,0
                                                    c0.217-0.125,0.516-0.107,0.846,0.084c0.661,0.382,1.197,1.31,1.197,2.073C454.913,254.942,454.779,255.21,454.562,255.335z"
                                                    />
                                                <polygon style="opacity:0.1;" points="452.912,256.288 451.376,257.175 451.376,255.155 449.74,254.211 451.276,253.323 
                                                    452.912,254.268 						"/>
                                                <g>
                                                    <polygon style="fill:#FAFAFA;" points="450.865,255.475 450.865,259.909 433.961,250.154 433.961,245.719 							"/>
                                                    <polygon style="fill:#E0E0E0;" points="450.865,255.475 452.402,254.587 452.402,259.022 450.865,259.909 							"/>
                                                    <polygon style="fill:#EBEBEB;" points="433.961,245.719 435.497,244.831 452.402,254.587 450.865,255.475 							"/>
                                                </g>
                                            </g>
                                            <path style="fill:#455A64;" d="M455.039,267.836c0-0.99-0.695-2.195-1.553-2.69c-0.858-0.495-1.553-0.094-1.553,0.896
                                                c0,0.737,0.387,1.591,0.937,2.185l0,2.897c0,0.335,0.235,0.742,0.525,0.91l0.181,0.105c0.29,0.168,0.525,0.032,0.525-0.303
                                                v-2.896C454.653,268.984,455.039,268.574,455.039,267.836z"/>
                                        </g>
                                        <g>
                                            <g>
                                                <polygon style="fill:#5d88e7;" points="373.228,83.459 403.996,101.286 403.995,217.352 373.228,199.572 						"/>
                                                <polygon style="opacity:0.4;fill:#FFFFFF;" points="373.228,83.459 403.996,101.286 403.995,217.352 373.228,199.572 						
                                                    "/>
                                            </g>
                                            <g>
                                                <polygon style="fill:#5d88e7;" points="417.819,109.262 448.698,127.029 448.698,243.096 417.819,225.375 						"/>
                                                <polygon style="opacity:0.4;fill:#FFFFFF;" points="417.819,109.262 448.698,127.029 448.698,243.096 417.819,225.375 						
                                                    "/>
                                            </g>
                                            <path style="opacity:0.2;fill:#FFFFFF;" d="M395.729,96.496l-22.501,22.501v5.914l26.246-26.246L395.729,96.496z
                                                M382.151,88.629l-8.924,8.924v12.187l16.64-16.64L382.151,88.629z M394.141,211.658l9.854-9.854v-5.914l-13.602,13.602
                                                L394.141,211.658z M417.819,109.262v0.313l0.199-0.199L417.819,109.262z M385.465,206.644l18.53-18.53V182.2l-22.278,22.278
                                                L385.465,206.644z M426.148,114.054l-8.33,8.33v5.914l12.083-12.083L426.148,114.054z M440.097,122.081l-22.278,22.278v12.187
                                                l30.014-30.015L440.097,122.081z M373.228,154.166l30.768-30.768l0-15.405l-30.769,30.769V154.166z M417.819,222.358
                                                l30.879-30.879v-15.405l-30.879,30.879V222.358z M426.571,230.398l22.126-22.126v-5.914l-25.884,25.884L426.571,230.398z
                                                M417.819,187.98l30.879-30.879v-5.914l-30.879,30.879V187.98z M373.228,199.572l0.992,0.573l29.776-29.776v-12.188
                                                l-30.768,30.768V199.572z M440.908,238.626l7.789-7.789v-12.187l-15.533,15.533L440.908,238.626z M373.228,172.889
                                                l30.768-30.768l0-5.914l-30.768,30.768V172.889z M417.819,168.376v5.914l30.879-30.879v-5.914L417.819,168.376z"/>
                                        </g>
                                    </g>
                                    <polygon style="fill:#263238;" points="467.778,409.904 462.919,412.709 462.922,123.204 467.779,120.399 			"/>
                                    <polygon style="fill:#37474F;" points="365.754,61.562 467.779,120.399 462.922,123.204 360.897,64.367 			"/>
                                </g>
                                <g id="Casing">
                                    <g>
                                        <polygon style="fill:#E0E0E0;" points="360.896,353.88 356.075,356.589 356.075,61.581 360.895,64.362 				"/>
                                    </g>
                                    <g>
                                        <g>
                                            <polygon style="fill:#F5F5F5;" points="458.6,415.138 458.6,120.129 355.577,60.715 355.574,355.723 341.81,347.776 
                                                341.81,36.875 472.379,112.183 472.378,423.06 					"/>
                                            <path style="fill:#E0E0E0;" d="M342.311,37.74l129.568,74.732l-0.002,309.724l-12.778-7.347V120.418v-0.578l-0.5-0.289
                                                L356.577,60.714l-1.5-0.865v1.731l-0.002,293.277l-12.764-7.369V37.74 M341.311,36.009v312.056l14.764,8.524l0.002-295.009
                                                L458.1,120.418v295.009l14.778,8.497l0.002-312.03L341.311,36.009L341.311,36.009z"/>
                                        </g>
                                    </g>
                                    <g>
                                        <polygon style="fill:#FAFAFA;" points="341.311,36.009 472.879,111.895 477.619,109.144 346.047,33.258 				"/>
                                    </g>
                                    <g>
                                        <polygon style="fill:#E0E0E0;" points="472.88,423.924 472.879,111.895 477.619,109.144 477.618,421.189 				"/>
                                    </g>
                                </g>
                            </g>
                        </g>
                        <g id="Plant">
                            <g id="Plant_2_">
                                <g id="Pot_1_">
                                    <path style="fill:#EBEBEB;" d="M296.31,347.037c-7.183-7.412-11.402-26.045-4.396-31.924h35.648
                                        c7.004,5.877,2.79,24.5-4.389,31.917c-0.061,0.069-0.132,0.136-0.197,0.204c-0.082,0.082-0.165,0.165-0.247,0.245
                                        c-0.203,0.199-0.418,0.393-0.649,0.584c-0.057,0.048-0.115,0.09-0.172,0.136c-0.176,0.139-0.35,0.28-0.542,0.414
                                        c-0.306,0.22-0.615,0.424-0.929,0.6c-5.909,3.45-15.489,3.45-21.397,0h0h-0.001c-0.315-0.177-0.627-0.383-0.935-0.605
                                        c-0.179-0.125-0.34-0.256-0.505-0.386c-0.07-0.057-0.142-0.109-0.212-0.168c-0.223-0.184-0.43-0.372-0.626-0.563
                                        c-0.096-0.091-0.191-0.187-0.285-0.282C296.421,347.152,296.362,347.096,296.31,347.037z"/>
                                    <path style="fill:#FAFAFA;" d="M324.467,312.746c8.133,4.749,8.133,12.449,0,17.197c-8.134,4.749-21.322,4.749-29.455,0
                                        c-8.134-4.749-8.134-12.448,0-17.197C303.145,307.997,316.333,307.997,324.467,312.746z"/>
                                    <path style="fill:#E0E0E0;" d="M320.554,315.03c5.974,3.488,5.973,9.142,0,12.629c-5.973,3.488-15.658,3.488-21.631,0
                                        c-5.973-3.487-5.973-9.142,0-12.629C304.897,311.543,314.581,311.543,320.554,315.03z"/>
                                    <path style="fill:#EBEBEB;" d="M298.923,321.024c5.973-3.488,15.658-3.488,21.631,0c1.659,0.969,2.84,2.108,3.578,3.318
                                        c-0.738,1.21-1.919,2.349-3.578,3.318c-5.973,3.488-15.658,3.488-21.631,0c-1.659-0.969-2.841-2.107-3.578-3.318
                                        C296.083,323.131,297.264,321.992,298.923,321.024z"/>
                                </g>
                                <g>
                                    <g>
                                        <path style="fill:#E0E0E0;" d="M307.341,273.484c-2.732,2.96-10.325,3.775-13.468-4.224c-2.948-7.502-6.131-14.612-7.038-17.366
                                            c-0.908-2.754,1.815-3.661,1.815-3.661s0.217-4.121,7.201-1.329c6.914,2.764,11.912,7.031,14.957,13.886
                                            C313.809,267.548,312.016,272.563,307.341,273.484z"/>
                                        <path style="opacity:0.45;fill:#FFFFFF;" d="M307.341,273.484c-2.732,2.96-10.325,3.775-13.468-4.224
                                            c-2.948-7.502-6.131-14.612-7.038-17.366c-0.908-2.754,1.815-3.661,1.815-3.661s0.217-4.121,7.201-1.329
                                            c6.914,2.764,11.912,7.031,14.957,13.886C313.809,267.548,312.016,272.563,307.341,273.484z"/>
                                    </g>
                                    <g>
                                        <path style="fill:#E0E0E0;" d="M310.364,284.059c-0.131-1.399-0.318-2.795-0.606-4.172c-0.573-2.737-1.354-5.422-2.316-8.047
                                            c-1.96-5.349-4.696-10.368-8.094-14.94c-1.911-2.571-3.999-5.046-6.361-7.216c-0.072-0.066-0.127,0.094-0.079,0.146
                                            c3.891,4.187,7.309,8.687,9.963,13.764c2.582,4.939,4.537,10.172,5.763,15.61c0.343,1.519,0.67,3.047,0.949,4.579
                                            c0.284,1.558,0.445,3.131,0.708,4.691c0.026,0.156,0.268,0.251,0.281,0.039C310.661,287.035,310.502,285.529,310.364,284.059z"
                                            />
                                        <path style="opacity:0.1;" d="M310.364,284.059c-0.131-1.399-0.318-2.795-0.606-4.172c-0.573-2.737-1.354-5.422-2.316-8.047
                                            c-1.96-5.349-4.696-10.368-8.094-14.94c-1.911-2.571-3.999-5.046-6.361-7.216c-0.072-0.066-0.127,0.094-0.079,0.146
                                            c3.891,4.187,7.309,8.687,9.963,13.764c2.582,4.939,4.537,10.172,5.763,15.61c0.343,1.519,0.67,3.047,0.949,4.579
                                            c0.284,1.558,0.445,3.131,0.708,4.691c0.026,0.156,0.268,0.251,0.281,0.039C310.661,287.035,310.502,285.529,310.364,284.059z"
                                            />
                                    </g>
                                    <g>
                                        <path style="fill:#E0E0E0;" d="M312.698,271.41c-6.273,1.94-10.933-2.956-9.32-10.635c1.613-7.679,9.679-16.202,12.726-13.912
                                            c1.902-1.902,6.094-1.219,8.066,5.016C326.141,258.115,324.348,274.131,312.698,271.41z"/>
                                        <path style="opacity:0.25;fill:#FFFFFF;" d="M312.698,271.41c-6.273,1.94-10.933-2.956-9.32-10.635
                                            c1.613-7.679,9.679-16.202,12.726-13.912c1.902-1.902,6.094-1.219,8.066,5.016C326.141,258.115,324.348,274.131,312.698,271.41z
                                            "/>
                                    </g>
                                    <g>
                                        <path style="fill:#E0E0E0;" d="M316.378,251.534c-1.867,4.408-3.089,9.14-4.17,13.795c-1.106,4.76-1.84,9.597-2.422,14.446
                                            c-1.126,9.382-1.318,18.87-1.257,28.31c0.017,2.612,0.055,5.224,0.104,7.836c0.051,2.686,0.008,5.408,0.239,8.085
                                            c0.089,1.026,1.548,0.753,1.567-0.188c0.092-4.702-0.165-9.425-0.213-14.129c-0.047-4.65-0.031-9.302,0.087-13.95
                                            c0.241-9.466,0.932-18.935,2.539-28.274c0.448-2.603,0.944-5.201,1.551-7.772c0.639-2.705,1.421-5.371,2.132-8.057
                                            C316.562,251.53,316.439,251.39,316.378,251.534z"/>
                                        <path style="opacity:0.1;" d="M316.378,251.534c-1.867,4.408-3.089,9.14-4.17,13.795c-1.106,4.76-1.84,9.597-2.422,14.446
                                            c-1.126,9.382-1.318,18.87-1.257,28.31c0.017,2.612,0.055,5.224,0.104,7.836c0.051,2.686,0.008,5.408,0.239,8.085
                                            c0.089,1.026,1.548,0.753,1.567-0.188c0.092-4.702-0.165-9.425-0.213-14.129c-0.047-4.65-0.031-9.302,0.087-13.95
                                            c0.241-9.466,0.932-18.935,2.539-28.274c0.448-2.603,0.944-5.201,1.551-7.772c0.639-2.705,1.421-5.371,2.132-8.057
                                            C316.562,251.53,316.439,251.39,316.378,251.534z"/>
                                    </g>
                                    <g>
                                        <path style="fill:#E0E0E0;" d="M302.489,293.927c-2.741,3.102-9.022,2.828-13.234-2.708c-4.212-5.537-6.742-26.354-0.814-25.027
                                            c1.256-2.779,17.635,3.893,19.737,17.479C309.707,293.546,302.489,293.927,302.489,293.927z"/>
                                        <path style="opacity:0.25;fill:#FFFFFF;" d="M302.489,293.927c-2.741,3.102-9.022,2.828-13.234-2.708
                                            c-4.212-5.537-6.742-26.354-0.814-25.027c1.256-2.779,17.635,3.893,19.737,17.479
                                            C309.707,293.546,302.489,293.927,302.489,293.927z"/>
                                    </g>
                                    <g>
                                        <path style="fill:#E0E0E0;" d="M307.388,303.764c-0.171-1.288-0.471-2.543-0.808-3.796c-0.685-2.552-1.5-5.061-2.437-7.532
                                            c-1.915-5.051-4.427-9.808-7.319-14.363c-1.602-2.523-3.282-5.041-5.195-7.34c-0.053-0.064-0.102,0.081-0.072,0.125
                                            c1.464,2.133,2.946,4.241,4.264,6.471c1.364,2.309,2.587,4.706,3.713,7.14c2.169,4.684,3.99,9.527,5.403,14.493
                                            c0.401,1.41,0.732,2.839,1.148,4.245c0.432,1.459,0.977,2.891,1.344,4.368c0.053,0.215,0.328,0.293,0.299,0.009
                                            C307.601,306.313,307.557,305.035,307.388,303.764z"/>
                                        <path style="opacity:0.1;" d="M307.388,303.764c-0.171-1.288-0.471-2.543-0.808-3.796c-0.685-2.552-1.5-5.061-2.437-7.532
                                            c-1.915-5.051-4.427-9.808-7.319-14.363c-1.602-2.523-3.282-5.041-5.195-7.34c-0.053-0.064-0.102,0.081-0.072,0.125
                                            c1.464,2.133,2.946,4.241,4.264,6.471c1.364,2.309,2.587,4.706,3.713,7.14c2.169,4.684,3.99,9.527,5.403,14.493
                                            c0.401,1.41,0.732,2.839,1.148,4.245c0.432,1.459,0.977,2.891,1.344,4.368c0.053,0.215,0.328,0.293,0.299,0.009
                                            C307.601,306.313,307.557,305.035,307.388,303.764z"/>
                                    </g>
                                    <g>
                                        <path style="fill:#E0E0E0;" d="M312.519,290.851c-3.585-0.817-3.764-5.124,0.717-10.409c4.481-5.285,15.773-7.588,16.31-5.361
                                            c2.509,0,2.509,7.86-3.047,15.081C320.943,297.383,312.855,295.704,312.519,290.851z"/>
                                        <path style="opacity:0.25;fill:#FFFFFF;" d="M312.519,290.851c-3.585-0.817-3.764-5.124,0.717-10.409
                                            c4.481-5.285,15.773-7.588,16.31-5.361c2.509,0,2.509,7.86-3.047,15.081C320.943,297.383,312.855,295.704,312.519,290.851z"/>
                                    </g>
                                    <g>
                                        <path style="fill:#E0E0E0;" d="M319.543,283.166c-2.353,1.685-4.43,3.596-6.206,5.892c-1.764,2.28-3.147,4.809-4.172,7.502
                                            c-0.117,0.307,0.414,0.757,0.541,0.422c1.998-5.277,5.469-10.18,9.857-13.745C319.59,283.216,319.587,283.134,319.543,283.166z"
                                            />
                                        <path style="opacity:0.1;" d="M319.543,283.166c-2.353,1.685-4.43,3.596-6.206,5.892c-1.764,2.28-3.147,4.809-4.172,7.502
                                            c-0.117,0.307,0.414,0.757,0.541,0.422c1.998-5.277,5.469-10.18,9.857-13.745C319.59,283.216,319.587,283.134,319.543,283.166z"
                                            />
                                    </g>
                                    <g>
                                        <path style="fill:#E0E0E0;" d="M316.615,317.082c-4.967,2.01-2.838,7.923,2.01,12.417c4.848,4.493,11.78,5.676,15.114,5.44
                                            c3.334-0.237,4.187-0.694,4.187-0.694s0.532-5.113-0.026-8.22c-0.784-4.37-3.982-10.515-11.705-12.608
                                            C318.472,311.323,316.615,314.126,316.615,317.082z"/>
                                        <path style="opacity:0.45;fill:#FFFFFF;" d="M316.615,317.082c-4.967,2.01-2.838,7.923,2.01,12.417
                                            c4.848,4.493,11.78,5.676,15.114,5.44c3.334-0.237,4.187-0.694,4.187-0.694s0.532-5.113-0.026-8.22
                                            c-0.784-4.37-3.982-10.515-11.705-12.608C318.472,311.323,316.615,314.126,316.615,317.082z"/>
                                    </g>
                                    <g>
                                        <path style="fill:#E0E0E0;" d="M330.363,325.814c-2.301-2.572-4.705-5.127-7.605-7.035c-2.828-1.861-6.598-3.449-9.989-2.289
                                            c-1.314,0.449-3.357,1.759-3.11,3.386c0.025,0.161,0.312,0.563,0.505,0.34c0.608-0.7,1.042-1.512,1.788-2.086
                                            c0.775-0.597,1.703-0.899,2.667-1.011c2.366-0.276,4.882,0.482,6.963,1.585c3.359,1.78,6.068,4.543,8.742,7.19
                                            C330.353,325.922,330.386,325.84,330.363,325.814z"/>
                                        <path style="opacity:0.1;" d="M330.363,325.814c-2.301-2.572-4.705-5.127-7.605-7.035c-2.828-1.861-6.598-3.449-9.989-2.289
                                            c-1.314,0.449-3.357,1.759-3.11,3.386c0.025,0.161,0.312,0.563,0.505,0.34c0.608-0.7,1.042-1.512,1.788-2.086
                                            c0.775-0.597,1.703-0.899,2.667-1.011c2.366-0.276,4.882,0.482,6.963,1.585c3.359,1.78,6.068,4.543,8.742,7.19
                                            C330.353,325.922,330.386,325.84,330.363,325.814z"/>
                                    </g>
                                    <g>
                                        <path style="fill:#E0E0E0;" d="M297.706,291.652c0.471-2.262-2.792-7.677-12.975-8.715c-10.183-1.038-17.81,3.282-19.348,5.254
                                            c-1.538,1.973-2.314,4.05-0.467,4.566c1.846,0.516,8.208,1.137,12.386,3.059c4.178,1.923,12.666,7.603,18.461,5.914
                                            C301.558,300.041,300.587,293.899,297.706,291.652z"/>
                                        <path style="opacity:0.45;fill:#FFFFFF;" d="M297.706,291.652c0.471-2.262-2.792-7.677-12.975-8.715
                                            c-10.183-1.038-17.81,3.282-19.348,5.254c-1.538,1.973-2.314,4.05-0.467,4.566c1.846,0.516,8.208,1.137,12.386,3.059
                                            c4.178,1.923,12.666,7.603,18.461,5.914C301.558,300.041,300.587,293.899,297.706,291.652z"/>
                                    </g>
                                    <g>
                                        <path style="fill:#E0E0E0;" d="M305.446,299.535c-4.294-8.87-15.362-11.577-24.408-11.528c-2.997,0.016-5.921,0.394-8.822,1.147
                                            c-0.04,0.01-0.046,0.11,0.003,0.103c4.852-0.765,9.88-0.939,14.738-0.149c4.802,0.78,9.518,2.272,13.468,5.193
                                            c1.942,1.437,3.591,3.324,4.816,5.403C305.369,299.918,305.534,299.716,305.446,299.535z"/>
                                        <path style="opacity:0.1;" d="M305.446,299.535c-4.294-8.87-15.362-11.577-24.408-11.528c-2.997,0.016-5.921,0.394-8.822,1.147
                                            c-0.04,0.01-0.046,0.11,0.003,0.103c4.852-0.765,9.88-0.939,14.738-0.149c4.802,0.78,9.518,2.272,13.468,5.193
                                            c1.942,1.437,3.591,3.324,4.816,5.403C305.369,299.918,305.534,299.716,305.446,299.535z"/>
                                    </g>
                                    <g>
                                        <path style="fill:#E0E0E0;" d="M321.426,279.769c-0.13,3.562,4.881,5.628,9.732,2.55c4.85-3.078,9.935-6.077,14.428-7.238
                                            c4.494-1.161,6.622-4.827,5.203-6.601c-1.419-1.774-3.676-6.25-15.491-4.789c-11.815,1.461-16,6.785-17.62,10.544
                                            C316.059,277.995,319.649,280.796,321.426,279.769z"/>
                                        <path style="opacity:0.45;fill:#FFFFFF;" d="M321.426,279.769c-0.13,3.562,4.881,5.628,9.732,2.55
                                            c4.85-3.078,9.935-6.077,14.428-7.238c4.494-1.161,6.622-4.827,5.203-6.601c-1.419-1.774-3.676-6.25-15.491-4.789
                                            c-11.815,1.461-16,6.785-17.62,10.544C316.059,277.995,319.649,280.796,321.426,279.769z"/>
                                    </g>
                                    <g>
                                        <path style="fill:#E0E0E0;" d="M340.655,268.465c-1.668-0.262-3.45,0.115-5.067,0.531c-1.491,0.384-2.941,0.906-4.338,1.554
                                            c-2.773,1.285-5.298,3.119-7.387,5.351c-0.594,0.635-1.161,1.302-1.668,2.008c-0.455,0.634-1.008,1.323-1.262,2.066
                                            c-0.08,0.234,0.263,0.616,0.469,0.377c0.585-0.674,1.024-1.499,1.573-2.209c0.59-0.763,1.222-1.491,1.901-2.176
                                            c1.365-1.376,2.899-2.576,4.552-3.586c1.604-0.98,3.277-1.814,5.045-2.455c0.965-0.35,1.944-0.633,2.94-0.882
                                            c1.061-0.266,2.11-0.528,3.213-0.447C340.683,268.601,340.712,268.474,340.655,268.465z"/>
                                        <path style="opacity:0.1;" d="M340.655,268.465c-1.668-0.262-3.45,0.115-5.067,0.531c-1.491,0.384-2.941,0.906-4.338,1.554
                                            c-2.773,1.285-5.298,3.119-7.387,5.351c-0.594,0.635-1.161,1.302-1.668,2.008c-0.455,0.634-1.008,1.323-1.262,2.066
                                            c-0.08,0.234,0.263,0.616,0.469,0.377c0.585-0.674,1.024-1.499,1.573-2.209c0.59-0.763,1.222-1.491,1.901-2.176
                                            c1.365-1.376,2.899-2.576,4.552-3.586c1.604-0.98,3.277-1.814,5.045-2.455c0.965-0.35,1.944-0.633,2.94-0.882
                                            c1.061-0.266,2.11-0.528,3.213-0.447C340.683,268.601,340.712,268.474,340.655,268.465z"/>
                                    </g>
                                    <g>
                                        <path style="fill:#E0E0E0;" d="M312.949,298.989c-1.655-1.656-6.149-1.271-8.278,3.621c-2.129,4.893,2.339,10.245,2.838,11.751
                                            c2.053-1.186,3.65-0.479,7.264-1.186c3.615-0.706,7.162-4.517,6.926-8.998C321.463,299.699,319.571,296.743,312.949,298.989z"/>
                                        <path style="opacity:0.45;fill:#FFFFFF;" d="M312.949,298.989c-1.655-1.656-6.149-1.271-8.278,3.621
                                            c-2.129,4.893,2.339,10.245,2.838,11.751c2.053-1.186,3.65-0.479,7.264-1.186c3.615-0.706,7.162-4.517,6.926-8.998
                                            C321.463,299.699,319.571,296.743,312.949,298.989z"/>
                                    </g>
                                    <g>
                                        <path style="fill:#E0E0E0;" d="M312.887,298.496c-0.887,0.431-1.647,1.476-2.194,2.27c-0.585,0.849-1.064,1.776-1.421,2.743
                                            c-0.728,1.971-1.034,4.155-0.625,6.23c0.016,0.079,0.081,0.007,0.077-0.043c-0.136-2.117,0.168-4.219,1.047-6.158
                                            c0.399-0.88,0.9-1.709,1.492-2.473c0.311-0.402,0.642-0.79,0.998-1.154c0.305-0.31,0.72-0.577,0.951-0.947
                                            C313.328,298.777,313.139,298.374,312.887,298.496z"/>
                                        <path style="opacity:0.1;" d="M312.887,298.496c-0.887,0.431-1.647,1.476-2.194,2.27c-0.585,0.849-1.064,1.776-1.421,2.743
                                            c-0.728,1.971-1.034,4.155-0.625,6.23c0.016,0.079,0.081,0.007,0.077-0.043c-0.136-2.117,0.168-4.219,1.047-6.158
                                            c0.399-0.88,0.9-1.709,1.492-2.473c0.311-0.402,0.642-0.79,0.998-1.154c0.305-0.31,0.72-0.577,0.951-0.947
                                            C313.328,298.777,313.139,298.374,312.887,298.496z"/>
                                    </g>
                                    <g>
                                        <path style="fill:#E0E0E0;" d="M305.158,308.904c-0.152-3.642-4.098-6.526-9.713-8.195c-5.615-1.669-11.686-0.26-15.784,4.195
                                            c-4.098,4.455-6.223,8.25-4.553,9.312c1.669,1.062,9.106,3.794,13.962,5.312c4.857,1.518,11.231,1.973,16.087-0.911
                                            C310.014,315.733,309.711,310.725,305.158,308.904z"/>
                                        <path style="opacity:0.25;fill:#FFFFFF;" d="M305.158,308.904c-0.152-3.642-4.098-6.526-9.713-8.195
                                            c-5.615-1.669-11.686-0.26-15.784,4.195c-4.098,4.455-6.223,8.25-4.553,9.312c1.669,1.062,9.106,3.794,13.962,5.312
                                            c4.857,1.518,11.231,1.973,16.087-0.911C310.014,315.733,309.711,310.725,305.158,308.904z"/>
                                    </g>
                                    <g>
                                        <path style="fill:#E0E0E0;" d="M305.47,308.494c-1.802-1.046-4.054-1.422-6.102-1.629c-2.032-0.206-4.084-0.165-6.111,0.073
                                            c-2.143,0.253-4.259,0.727-6.327,1.337c-1.082,0.319-2.154,0.674-3.212,1.064c-0.985,0.363-2.014,0.704-2.937,1.208
                                            c-0.036,0.02-0.056,0.14,0.006,0.127c1.029-0.215,2.035-0.617,3.04-0.925c1.084-0.333,2.172-0.654,3.27-0.939
                                            c2.051-0.534,4.129-0.956,6.238-1.179c2.104-0.222,4.237-0.239,6.337,0.022c1.981,0.246,3.835,0.857,5.744,1.405
                                            C305.808,309.171,305.691,308.623,305.47,308.494z"/>
                                        <path style="opacity:0.1;" d="M305.47,308.494c-1.802-1.046-4.054-1.422-6.102-1.629c-2.032-0.206-4.084-0.165-6.111,0.073
                                            c-2.143,0.253-4.259,0.727-6.327,1.337c-1.082,0.319-2.154,0.674-3.212,1.064c-0.985,0.363-2.014,0.704-2.937,1.208
                                            c-0.036,0.02-0.056,0.14,0.006,0.127c1.029-0.215,2.035-0.617,3.04-0.925c1.084-0.333,2.172-0.654,3.27-0.939
                                            c2.051-0.534,4.129-0.956,6.238-1.179c2.104-0.222,4.237-0.239,6.337,0.022c1.981,0.246,3.835,0.857,5.744,1.405
                                            C305.808,309.171,305.691,308.623,305.47,308.494z"/>
                                    </g>
                                    <g>
                                        <path style="fill:#E0E0E0;" d="M316.744,303.48c-4.013-3.188-2.676-10.836,11.372-11.248
                                            c14.047-0.413,24.081,3.255,23.635,7.776c2.261,2.261,1.115,8.595-10.257,10.572
                                            C330.122,312.556,313.846,311.573,316.744,303.48z"/>
                                        <path style="opacity:0.25;fill:#FFFFFF;" d="M316.744,303.48c-4.013-3.188-2.676-10.836,11.372-11.248
                                            c14.047-0.413,24.081,3.255,23.635,7.776c2.261,2.261,1.115,8.595-10.257,10.572
                                            C330.122,312.556,313.846,311.573,316.744,303.48z"/>
                                    </g>
                                    <g>
                                        <path style="fill:#E0E0E0;" d="M345.142,300.057c-4.114-0.757-8.376-0.85-12.549-0.732c-3.854,0.109-7.851,0.292-11.586,1.331
                                            c-0.97,0.27-1.917,0.615-2.826,1.05c-0.42,0.201-0.834,0.417-1.232,0.66c-0.319,0.194-0.675,0.362-0.79,0.736
                                            c-0.07,0.227,0.193,0.5,0.418,0.447c0.854-0.2,1.65-0.859,2.457-1.218c0.788-0.351,1.605-0.641,2.432-0.885
                                            c1.592-0.471,3.234-0.756,4.88-0.961c3.922-0.49,7.905-0.706,11.857-0.654c2.31,0.031,4.609,0.206,6.911,0.389
                                            C345.186,300.226,345.213,300.07,345.142,300.057z"/>
                                        <path style="opacity:0.1;" d="M345.142,300.057c-4.114-0.757-8.376-0.85-12.549-0.732c-3.854,0.109-7.851,0.292-11.586,1.331
                                            c-0.97,0.27-1.917,0.615-2.826,1.05c-0.42,0.201-0.834,0.417-1.232,0.66c-0.319,0.194-0.675,0.362-0.79,0.736
                                            c-0.07,0.227,0.193,0.5,0.418,0.447c0.854-0.2,1.65-0.859,2.457-1.218c0.788-0.351,1.605-0.641,2.432-0.885
                                            c1.592-0.471,3.234-0.756,4.88-0.961c3.922-0.49,7.905-0.706,11.857-0.654c2.31,0.031,4.609,0.206,6.911,0.389
                                            C345.186,300.226,345.213,300.07,345.142,300.057z"/>
                                    </g>
                                </g>
                            </g>
                        </g>
                        <g id="Chairs">
                            <g id="Chair_4_">
                                <g id="XMLID_533_">
                                    <g id="XMLID_549_">
                                        <path id="XMLID_550_" style="fill:#263238;" d="M209.076,336.03c-0.364,0-0.727-0.145-0.996-0.43l-50.269-53.195l-50.178,52.97
                                            c-0.521,0.552-1.388,0.574-1.937,0.052c-0.55-0.52-0.573-1.388-0.052-1.936l51.174-54.022c0.258-0.273,0.618-0.428,0.994-0.428
                                            h0.001c0.376,0,0.736,0.155,0.994,0.43l51.263,54.248c0.521,0.55,0.495,1.417-0.055,1.936
                                            C209.752,335.905,209.414,336.03,209.076,336.03z"/>
                                    </g>
                                    <g id="XMLID_547_">
                                        <path id="XMLID_548_" style="fill:#37474F;" d="M157.812,376.31c-0.757,0-1.37-0.613-1.37-1.37v-88.101
                                            c0-0.757,0.613-1.37,1.37-1.37s1.37,0.613,1.37,1.37v88.101C159.183,375.697,158.57,376.31,157.812,376.31z"/>
                                    </g>
                                    <g id="XMLID_544_">
                                        <path id="XMLID_545_" style="fill:#37474F;" d="M212.321,344.243c-0.546,0-1.061-0.328-1.274-0.867l-27.016-68.379
                                            c-0.278-0.704,0.067-1.5,0.771-1.777c0.701-0.281,1.499,0.065,1.777,0.771l27.016,68.379c0.278,0.704-0.067,1.5-0.771,1.777
                                            C212.66,344.212,212.488,344.243,212.321,344.243z"/>
                                    </g>
                                    <g id="XMLID_542_">
                                        <path id="XMLID_543_" style="fill:#37474F;" d="M103.305,344.243c-0.167,0-0.339-0.031-0.503-0.096
                                            c-0.704-0.277-1.049-1.073-0.771-1.777l27.016-68.379c0.278-0.705,1.074-1.052,1.777-0.771c0.704,0.277,1.049,1.073,0.771,1.777
                                            l-27.016,68.379C104.366,343.915,103.851,344.243,103.305,344.243z"/>
                                    </g>
                                    <g id="XMLID_540_">
                                        <path id="XMLID_541_" style="fill:#E0E0E0;" d="M210.459,333.917l3.572,9.426c0.021,0.08,0.032,0.161,0.032,0.241
                                            c0.005,0.053,0.005,0.112,0,0.171c-0.032,0.193-0.276,0.439-0.538,0.594c-0.6,0.348-1.574,0.348-2.174,0
                                            c-0.219-0.128-0.359-0.284-0.423-0.444c0-0.005,0-0.011-0.005-0.016l-0.027-0.129l-3.311-8.837L210.459,333.917z"/>
                                    </g>
                                    <g id="XMLID_536_">
                                        <path id="XMLID_537_" style="fill:#E0E0E0;" d="M105.167,333.917l-3.572,9.426c-0.022,0.08-0.032,0.161-0.032,0.241
                                            c-0.005,0.053-0.005,0.112,0,0.171c0.032,0.193,0.276,0.439,0.538,0.594c0.6,0.348,1.574,0.348,2.174,0
                                            c0.219-0.128,0.359-0.284,0.423-0.444c0-0.005,0-0.011,0.005-0.016l0.027-0.129l3.312-8.837L105.167,333.917z"/>
                                    </g>
                                    <g id="XMLID_534_">
                                        <path id="XMLID_535_" style="fill:#E0E0E0;" d="M159.393,368.118l0,7.797c0,0.233-0.154,0.467-0.463,0.645
                                            c-0.617,0.356-1.618,0.356-2.234,0c-0.309-0.178-0.463-0.411-0.463-0.645v-7.797C157.286,367.59,158.339,367.59,159.393,368.118
                                            z"/>
                                    </g>
                                </g>
                                <g id="Chair_5_">
                                    <path style="fill:#E0E0E0;" d="M209.132,279.154c-0.007-1.906-1.68-3.949-5.225-6.246c-6.541-4.244-30.182-18.032-39.342-23.106
                                        c-0.014-0.068-0.075-0.075-0.075-0.075c-7.049-4.278-11.172-37.103-16.054-52.578c-0.046-0.145-0.39-1.334-1.022-2.847
                                        c-0.029-0.071-0.06-0.136-0.089-0.206c-0.088-0.206-0.181-0.415-0.279-0.63c-0.047-0.103-0.092-0.214-0.139-0.315l-0.006,0.001
                                        c-0.79-1.666-1.877-3.489-3.258-4.705c-0.116-0.103-0.667-0.642-1.597-1.123c-0.793-0.447-2.457-1.374-2.873-1.617
                                        c-4.788-2.865-16.096,3.237-23.922,7.523c-4.867,2.669-9.02,5.84-11.547,11.751h-0.001c-1.214,2.832-2.05,6.301-2.42,10.641
                                        c-0.692,8.159,1.95,38.317,3.609,50.131l-0.007-0.007c2.4,19.74,5.341,19.774,9.62,23.079
                                        c7.357,5.684,28.516,16.826,35.502,19.575c12.664,4.984,23.017-2.702,30.738-6.514c7.714-3.806,22.223-12.414,25.473-14.772
                                        c1.926-1.406,2.928-2.825,2.907-4.32C209.118,282.205,209.132,279.778,209.132,279.154z"/>
                                    <g id="XMLID_529_">
                                        <path id="XMLID_531_" style="fill:#F5F5F5;" d="M180.742,298.217c7.715-3.811,22.227-12.419,25.475-14.777
                                            c4.39-3.188,3.986-6.449-2.306-10.531c-8.741-5.671-44.373-25.889-44.373-25.889s-50.074,29.248-48.137,34.157
                                            c1.938,4.909,29.82,20.096,38.604,23.552C162.674,309.711,173.026,302.027,180.742,298.217z"/>
                                    </g>
                                    <path id="XMLID_516_" style="fill:#F5F5F5;" d="M142.047,187.324c-4.742-2.488-15.931,3.559-23.554,7.735
                                        c-4.883,2.677-9.043,5.848-11.571,11.783l-3.218-1.861c2.528-5.911,6.68-9.082,11.548-11.751
                                        c7.826-4.286,19.134-10.388,23.922-7.523C139.59,185.95,141.254,186.876,142.047,187.324z"/>
                                    <g id="XMLID_510_">
                                        <path style="fill:#EBEBEB;" d="M148.436,197.148c-0.103-0.329-1.734-6.007-4.793-8.701c-0.226-0.199-2.087-1.975-5.183-1.975
                                            c-4.141,0-14.14,5.399-19.968,8.587c-0.487,0.267-0.967,0.542-1.44,0.823c-0.185,0.103-0.363,0.213-0.542,0.322
                                            c-0.219,0.13-0.432,0.267-0.645,0.404c-0.158,0.096-0.315,0.199-0.473,0.309c-1.028,0.679-2.009,1.419-2.934,2.228
                                            c-0.151,0.13-0.295,0.26-0.439,0.404c-0.583,0.535-1.138,1.111-1.666,1.728c-0.096,0.11-0.192,0.219-0.281,0.329
                                            c-0.11,0.137-0.226,0.274-0.329,0.411c-0.11,0.137-0.213,0.281-0.322,0.425c-0.103,0.137-0.206,0.281-0.309,0.432
                                            c-0.411,0.59-0.802,1.207-1.166,1.865c-0.048,0.082-0.096,0.164-0.137,0.247c-0.096,0.171-0.185,0.35-0.274,0.528
                                            c-0.13,0.261-0.254,0.521-0.377,0.782c-1.33,2.928-2.249,6.548-2.64,11.156c-1.131,13.404,3.342,61.437,7.949,65.256
                                            c0,0,0.984-4.002,8.564-10.168c8.18-6.654,16.805-11.822,23.33-15.5c15.394-8.678,20.128-7.314,20.128-7.314
                                            C157.441,245.447,153.318,212.623,148.436,197.148z"/>
                                    </g>
                                </g>
                            </g>
                            <g id="Chair_1_">
                                <g id="XMLID_652_">
                                    <g id="XMLID_671_">
                                        <path id="XMLID_672_" style="fill:#263238;" d="M127.35,384.058c-0.364,0-0.727-0.145-0.996-0.43l-50.269-53.195l-50.178,52.97
                                            c-0.521,0.552-1.388,0.574-1.937,0.052c-0.55-0.52-0.573-1.388-0.052-1.936l51.174-54.022c0.258-0.273,0.618-0.428,0.994-0.428
                                            h0.001c0.376,0,0.736,0.155,0.994,0.43l51.263,54.248c0.521,0.55,0.495,1.417-0.055,1.936
                                            C128.026,383.933,127.688,384.058,127.35,384.058z"/>
                                    </g>
                                    <g id="XMLID_667_">
                                        <path id="XMLID_670_" style="fill:#37474F;" d="M76.086,424.338c-0.757,0-1.37-0.613-1.37-1.37v-88.101
                                            c0-0.757,0.613-1.37,1.37-1.37s1.371,0.613,1.371,1.37v88.101C77.457,423.725,76.844,424.338,76.086,424.338z"/>
                                    </g>
                                    <g id="XMLID_662_">
                                        <path id="XMLID_664_" style="fill:#37474F;" d="M130.595,392.271c-0.546,0-1.061-0.328-1.274-0.867l-27.016-68.379
                                            c-0.278-0.704,0.067-1.5,0.771-1.777c0.701-0.281,1.499,0.065,1.777,0.771l27.015,68.379c0.278,0.704-0.067,1.5-0.771,1.777
                                            C130.934,392.24,130.762,392.271,130.595,392.271z"/>
                                    </g>
                                    <g id="XMLID_659_">
                                        <path id="XMLID_661_" style="fill:#37474F;" d="M21.579,392.271c-0.167,0-0.339-0.031-0.503-0.096
                                            c-0.704-0.277-1.049-1.073-0.771-1.777l27.016-68.379c0.278-0.706,1.075-1.052,1.777-0.771c0.704,0.277,1.049,1.073,0.771,1.777
                                            l-27.016,68.379C22.64,391.943,22.125,392.271,21.579,392.271z"/>
                                    </g>
                                    <g id="XMLID_657_">
                                        <path id="XMLID_658_" style="fill:#E0E0E0;" d="M128.733,381.945l3.572,9.426c0.021,0.08,0.032,0.161,0.032,0.241
                                            c0.005,0.053,0.005,0.112,0,0.171c-0.032,0.193-0.276,0.439-0.538,0.594c-0.6,0.348-1.574,0.348-2.174,0
                                            c-0.219-0.128-0.359-0.284-0.423-0.444c0-0.005,0-0.011-0.005-0.016l-0.027-0.129l-3.312-8.837L128.733,381.945z"/>
                                    </g>
                                    <g id="XMLID_655_">
                                        <path id="XMLID_656_" style="fill:#E0E0E0;" d="M23.441,381.945l-3.572,9.426c-0.022,0.08-0.032,0.161-0.032,0.241
                                            c-0.005,0.053-0.005,0.112,0,0.171c0.032,0.193,0.276,0.439,0.538,0.594c0.6,0.348,1.574,0.348,2.174,0
                                            c0.219-0.128,0.359-0.284,0.423-0.444c0-0.005,0-0.011,0.005-0.016l0.027-0.129l3.312-8.837L23.441,381.945z"/>
                                    </g>
                                    <g id="XMLID_653_">
                                        <path id="XMLID_654_" style="fill:#E0E0E0;" d="M77.667,416.147l0,7.797c0,0.233-0.154,0.467-0.463,0.645
                                            c-0.617,0.356-1.618,0.356-2.234,0c-0.309-0.178-0.463-0.411-0.463-0.645v-7.797C75.56,415.618,76.613,415.618,77.667,416.147z"
                                            />
                                    </g>
                                </g>
                                <g id="Chair_3_">
                                    <path style="fill:#E0E0E0;" d="M127.406,327.182c-0.007-1.906-1.68-3.949-5.225-6.246c-6.541-4.244-30.182-18.032-39.342-23.106
                                        c-0.014-0.069-0.075-0.075-0.075-0.075c-7.049-4.278-11.172-37.103-16.054-52.578c-0.045-0.145-0.39-1.334-1.022-2.847
                                        c-0.029-0.071-0.06-0.136-0.089-0.206c-0.088-0.206-0.181-0.415-0.279-0.63c-0.047-0.103-0.092-0.214-0.139-0.315l-0.006,0.001
                                        c-0.79-1.666-1.877-3.489-3.258-4.705c-0.116-0.102-0.667-0.642-1.597-1.123c-0.793-0.447-2.457-1.374-2.873-1.617
                                        c-4.788-2.865-16.096,3.237-23.922,7.523c-4.867,2.669-9.02,5.84-11.547,11.751l-0.001,0c-1.214,2.832-2.05,6.301-2.42,10.641
                                        c-0.693,8.159,1.95,38.317,3.609,50.131l-0.007-0.007c2.399,19.74,5.341,19.774,9.62,23.079
                                        c7.357,5.684,28.516,16.826,35.503,19.575c12.664,4.984,23.017-2.702,30.738-6.514c7.714-3.805,22.224-12.414,25.474-14.772
                                        c1.926-1.406,2.928-2.825,2.907-4.32C127.393,330.233,127.406,327.806,127.406,327.182z"/>
                                    <g id="XMLID_647_">
                                        <path id="XMLID_650_" style="fill:#F5F5F5;" d="M99.016,346.245c7.715-3.81,22.227-12.418,25.475-14.777
                                            c4.39-3.188,3.986-6.449-2.306-10.531c-8.741-5.67-44.373-25.889-44.373-25.889s-50.074,29.248-48.137,34.157
                                            c1.938,4.909,29.82,20.096,38.604,23.551C80.948,357.739,91.3,350.056,99.016,346.245z"/>
                                    </g>
                                    <path id="XMLID_557_" style="fill:#F5F5F5;" d="M60.321,235.352c-4.742-2.488-15.931,3.559-23.554,7.735
                                        c-4.883,2.677-9.043,5.848-11.571,11.783l-3.218-1.861c2.528-5.911,6.68-9.082,11.548-11.751
                                        c7.826-4.286,19.134-10.388,23.922-7.523C57.864,233.978,59.528,234.905,60.321,235.352z"/>
                                    <g id="XMLID_552_">
                                        <path style="fill:#EBEBEB;" d="M66.71,245.176c-0.103-0.329-1.734-6.007-4.793-8.701c-0.226-0.199-2.087-1.974-5.183-1.974
                                            c-4.141,0-14.14,5.399-19.968,8.588c-0.487,0.267-0.967,0.542-1.44,0.823c-0.185,0.103-0.363,0.213-0.542,0.322
                                            c-0.219,0.13-0.432,0.267-0.645,0.405c-0.158,0.096-0.315,0.199-0.473,0.309c-1.028,0.679-2.009,1.419-2.934,2.228
                                            c-0.151,0.13-0.295,0.261-0.439,0.404c-0.583,0.535-1.138,1.111-1.666,1.728c-0.096,0.11-0.192,0.219-0.281,0.329
                                            c-0.11,0.137-0.226,0.274-0.329,0.411c-0.11,0.137-0.213,0.281-0.322,0.425c-0.103,0.137-0.206,0.281-0.308,0.432
                                            c-0.411,0.59-0.802,1.207-1.166,1.865c-0.048,0.082-0.096,0.164-0.137,0.247c-0.096,0.171-0.185,0.35-0.274,0.528
                                            c-0.13,0.261-0.254,0.521-0.377,0.782c-1.33,2.928-2.249,6.548-2.64,11.156c-1.131,13.404,3.342,61.437,7.949,65.256
                                            c0,0,0.984-4.002,8.564-10.168c8.18-6.654,16.805-11.822,23.33-15.5c15.394-8.678,20.128-7.314,20.128-7.314
                                            C75.715,293.476,71.592,260.651,66.71,245.176z"/>
                                    </g>
                                </g>
                            </g>
                        </g>
                        <g id="Shadows">
                            <ellipse id="Shadow_52_" style="fill:#E0E0E0;" cx="248.204" cy="419.756" rx="82.293" ry="47.512"/>
                            <path id="Shadow_7_" style="fill:#E0E0E0;" d="M118.791,452.191l-24.576-14.189c-4.296-2.48-4.296-6.501,0-8.982l75.653-43.678
                                c4.296-2.48,11.261-2.48,15.557,0l24.577,14.189c4.296,2.48,4.296,6.501,0,8.982l-75.654,43.679
                                C130.053,454.672,123.087,454.672,118.791,452.191z"/>
                        </g>
                        <g id="Clock_1_">
                            <g id="Clock">
                                <path id="XMLID_445_" style="fill:#5d88e7;" d="M194.732,305.944l-18.81-10.86c-0.023-0.014-0.047-0.027-0.07-0.041l-0.139-0.08
                                    l-0.002,0.006c-9.279-5.256-22.042-4.446-36.134,3.69c-28.361,16.374-51.352,56.196-51.352,88.945
                                    c0,16.273,5.681,27.73,14.872,33.138l-0.004,0.005l0.14,0.081c0.023,0.013,0.045,0.026,0.068,0.039l18.812,10.86l3.265-8.592
                                    c4.512-1.108,9.272-3.038,14.2-5.884c28.361-16.374,51.352-56.196,51.352-88.944c0-5.643-0.697-10.693-1.973-15.128
                                    L194.732,305.944z"/>
                                <path id="XMLID_402_" style="opacity:0.4;fill:#FFFFFF;" d="M194.732,305.944l-18.81-10.86c-0.023-0.014-0.047-0.027-0.07-0.041
                                    l-0.139-0.08l-0.002,0.006c-9.279-5.256-22.042-4.446-36.134,3.69c-28.361,16.374-51.352,56.196-51.352,88.945
                                    c0,16.273,5.681,27.73,14.872,33.138l-0.004,0.005l0.14,0.081c0.023,0.013,0.045,0.026,0.068,0.039l18.812,10.86l3.265-8.592
                                    c4.512-1.108,9.272-3.038,14.2-5.884c28.361-16.374,51.352-56.196,51.352-88.944c0-5.643-0.697-10.693-1.973-15.128
                                    L194.732,305.944z"/>
                                <path style="opacity:0.4;fill:#5d88e7;" d="M88.674,379.598c-0.286,2.703-0.45,5.379-0.45,8.006
                                    c0,16.273,5.681,27.73,14.872,33.138l-0.004,0.005l0.14,0.081c0.023,0.013,0.045,0.026,0.068,0.039l18.811,10.86l3.265-8.592
                                    c1.066-0.262,2.148-0.578,3.241-0.933l4.854-16.741L88.674,379.598z"/>
                                <g id="XMLID_277_">
                                    
                                        <ellipse transform="matrix(0.5 -0.866 0.866 0.5 -240.211 321.8182)" style="fill:#5d88e7;" cx="158.596" cy="368.937" rx="72.623" ry="41.929"/>
                                </g>
                                <g>
                                    <path style="fill:#5d88e7;" d="M135.661,427.168c-12.736,0-20.339-10.685-20.339-28.583c0-29.616,21.666-67.144,47.312-81.949
                                        c6.721-3.879,13.255-5.93,18.895-5.93c12.736,0,20.339,10.685,20.339,28.583c0.002,29.614-21.664,67.141-47.312,81.95
                                        c-6.721,3.879-13.255,5.93-18.893,5.93C135.661,427.168,135.661,427.168,135.661,427.168z"/>
                                    <path style="opacity:0.15;" d="M135.661,427.168c-12.736,0-20.339-10.685-20.339-28.583c0-29.616,21.666-67.144,47.312-81.949
                                        c6.721-3.879,13.255-5.93,18.895-5.93c12.736,0,20.339,10.685,20.339,28.583c0.002,29.614-21.664,67.141-47.312,81.95
                                        c-6.721,3.879-13.255,5.93-18.893,5.93C135.661,427.168,135.661,427.168,135.661,427.168z"/>
                                </g>
                                <g>
                                    <path style="fill:#FAFAFA;" d="M197.143,336.48c0-11.396-3.093-19.851-8.62-24.502c-2.116-0.826-4.446-1.272-6.992-1.272
                                        c-5.641,0-12.174,2.051-18.895,5.93c-25.646,14.805-47.312,52.333-47.312,81.949c0,11.396,3.093,19.851,8.62,24.502
                                        c2.116,0.826,4.446,1.272,6.992,1.272c0,0,0,0,0.002,0c5.638,0,12.172-2.051,18.893-5.93
                                        C175.478,403.62,197.145,366.094,197.143,336.48z"/>
                                    <g>
                                        <path style="fill:#37474F;" d="M171.832,375.353c-0.267,0-0.54-0.048-0.804-0.151l-20.496-7.893l20.428-38.394
                                            c0.581-1.091,1.937-1.505,3.029-0.925c1.092,0.581,1.506,1.937,0.925,3.029l-18.051,33.928l15.775,6.076
                                            c1.154,0.445,1.73,1.74,1.285,2.894C173.58,374.808,172.732,375.353,171.832,375.353z"/>
                                    </g>
                                    <g id="XMLID_262_">
                                        <path style="fill:#455A64;" d="M153.869,374.584c4.044-2.335,7.323-8.014,7.323-12.684c0-4.67-3.279-6.563-7.323-4.228
                                            c-4.044,2.335-7.323,8.014-7.323,12.684S149.825,376.919,153.869,374.584z"/>
                                    </g>
                                    <g>
                                        <path style="fill:#5d88e7;" d="M153.869,410.973c-0.601,0.347-1.088,0.026-1.088-0.716v-8.622c0-0.742,0.487-1.625,1.088-1.971
                                            c0.601-0.347,1.088-0.026,1.088,0.716v8.622C154.957,409.744,154.47,410.626,153.869,410.973z"/>
                                        <path style="fill:#5d88e7;" d="M153.783,335.622c-0.601,0.347-1.087,0.026-1.087-0.716v-8.622c0-0.742,0.487-1.625,1.087-1.971
                                            c0.601-0.347,1.088-0.027,1.088,0.716v8.622C154.871,334.392,154.384,335.275,153.783,335.622z"/>
                                        <path style="fill:#5d88e7;" d="M117.317,389.134c0.003-0.692,0.527-1.553,1.169-1.924l7.467-4.311
                                            c0.643-0.371,1.161-0.111,1.158,0.581c-0.003,0.692-0.527,1.553-1.169,1.924l-7.467,4.311
                                            C117.832,390.086,117.314,389.826,117.317,389.134z"/>
                                        <path style="fill:#5d88e7;" d="M182.24,351.56c0.003-0.692,0.527-1.553,1.169-1.924l7.467-4.311
                                            c0.643-0.371,1.161-0.111,1.158,0.581c-0.003,0.692-0.527,1.553-1.169,1.924l-7.467,4.311
                                            C182.756,352.512,182.237,352.251,182.24,351.56z"/>
                                    </g>
                                </g>
                            </g>
                        </g>
                        <g id="Character">
                            <g id="Character_16_">
                                <g id="Bottom_1_">
                                    <g>
                                        <path style="fill:#FFBF9D;" d="M205.921,401.886c0.985-13.552-0.645-28.453,0.483-49.615v0
                                            c0.101-5.424,0.297-11.235,0.66-16.397c1.224-17.368,3.901-23.306,4.149-26.658c0,0,1.315-33.284,2.45-71.288
                                            c0.534-17.878,5.714-23.292,9.854-32.781h49.202c5.497,23.416,7.063,74.479,6.899,98.612c-0.084,12.304-5.05,78.12-5.149,79.634
                                            c-0.352,5.371,0.116,7.491,2.222,9.75c4.409,4.73,10.799,9.233,16.323,13.357c-0.8,2.113-7.444,2.036-10.733,0.427
                                            c-5.254-2.57-10.469-6.49-12.262-7.817c-4.539-3.36-10.34-6.056-10.414-11.169c-0.013-0.637-0.185-0.812-0.152-0.913
                                            c-0.086-2.986-7.046-47.013-7.625-57.23c-0.498-8.784,0.571-23.691,0.571-23.691l-5.668-37.211c0,0-4.35,28.254-7.885,43.272
                                            c-2.877,12.224-7.622,33.083-10.861,48.127l0,0c-3.11,17.331-7.571,34.179-8.361,42.855c-0.239,2.071-2.584,22.402-3.553,27.059
                                            c-0.968,4.657-11.118,4.78-11.769-3.229C203.869,421.648,205.736,404.437,205.921,401.886z"/>
                                    </g>
                                    <g>
                                        <path style="fill:#263238;" d="M302.414,411.903c0.281-0.003,0.738,3.089-0.774,4.421c-1.745,1.538-6.888,4.087-13.728,3.277
                                            c-6.841-0.81-10.562-2.884-13.32-5.142c-2.758-2.259-6.624-5.444-9.721-6.092c-2.877-0.602-6.008-1.869-6.936-2.747
                                            c-0.928-0.877-0.843-4.823-0.843-4.823L302.414,411.903z"/>
                                        <path id="XMLID_3832_" style="fill:#37474F;" d="M259.31,385.583c0,0-0.515,0.022-0.682,0.937
                                            c-0.199,1.089-0.392,4.253-0.825,6.042c-0.6,2.487-0.966,7.573-0.568,9.591c0.398,2.017,5.092,3.371,8.095,4.478
                                            c3.066,1.131,6.625,3.49,9.753,6.014c3.238,2.612,10.019,5.195,14.472,5.213c6.798,0.027,11.18-1.864,12.513-4.321
                                            c1.649-3.04,0.312-4.777-7.537-8.313c-1.486-0.669-6.713-3.687-8.495-4.783c-1.883-1.157-3.689-2.447-5.357-3.899
                                            c-0.844-0.735-1.651-1.511-2.41-2.334c-0.667-0.724-1.605-1.599-2.006-2.505c-0.091-0.205-0.155-0.446-0.236-0.659
                                            c-0.235-0.615-0.397-1.183-0.529-1.825c-0.133-0.648-0.222-1.594-0.844-1.976c-0.714-0.439-1.993-0.37-2.795-0.3
                                            c-1.009,0.087-2.023,0.227-3.008,0.459c-1.147,0.27-2.476,0.387-3.146,1.474c-0.513,0.833-0.582,1.879-0.613,2.836
                                            c-0.015,0.456,0,0.915,0.001,1.371c0,0.195,0.087,0.544-0.187,0.466c-0.261-0.074-0.558-0.753-0.659-0.983
                                            c-0.222-0.508-0.367-1.053-0.609-1.553c-0.277-0.571-0.589-1.157-0.989-1.643c-0.374-0.454-0.781-0.889-1.25-1.246
                                            c-0.427-0.325-0.968-0.483-1.347-0.852C259.573,386.803,259.355,385.969,259.31,385.583z"/>
                                        <path style="fill:#FAFAFA;" d="M295.796,405.806c-9.833,0.783-12.867,6.893-13.244,10.658c2.447,0.838,4.968,1.385,7.003,1.393
                                            c6.798,0.027,11.459-1.864,12.792-4.322C303.902,410.668,302.801,408.379,295.796,405.806z"/>
                                        <g>
                                            <g>
                                                <path style="fill:#F0F0F0;" d="M281.046,406.064c-0.107,0.001-0.215-0.033-0.305-0.105c-0.207-0.166-0.24-0.468-0.075-0.675
                                                    c1.352-1.692,5.279-3.955,8.859-3.603c0.265,0.025,0.459,0.261,0.432,0.524c-0.025,0.263-0.254,0.457-0.525,0.432
                                                    c-3.342-0.318-6.945,1.906-8.017,3.248C281.323,406.001,281.186,406.063,281.046,406.064z"/>
                                            </g>
                                            <g>
                                                <path style="fill:#F0F0F0;" d="M276.781,403.641c-0.107,0.001-0.215-0.033-0.305-0.105c-0.208-0.165-0.24-0.468-0.075-0.676
                                                    c1.353-1.694,5.282-3.962,8.86-3.604c0.265,0.025,0.458,0.261,0.432,0.525c-0.025,0.263-0.249,0.457-0.525,0.432
                                                    c-3.342-0.323-6.945,1.905-8.016,3.247C277.059,403.578,276.921,403.639,276.781,403.641z"/>
                                            </g>
                                            <g>
                                                <path style="fill:#F0F0F0;" d="M272.825,400.863c-0.107,0.001-0.215-0.033-0.306-0.105c-0.207-0.165-0.24-0.468-0.075-0.676
                                                    c1.352-1.693,5.295-3.957,8.859-3.603c0.265,0.025,0.459,0.261,0.432,0.525c-0.025,0.264-0.251,0.456-0.525,0.432
                                                    c-3.338-0.32-6.944,1.906-8.016,3.248C273.102,400.799,272.965,400.861,272.825,400.863z"/>
                                            </g>
                                            <g>
                                                <path style="fill:#F0F0F0;" d="M268.948,398.083c-0.104,0.001-0.211-0.032-0.299-0.101c-0.211-0.162-0.248-0.465-0.085-0.674
                                                    c1.859-2.4,6.102-4.013,9.678-3.661c0.265,0.025,0.459,0.261,0.432,0.525c-0.025,0.264-0.252,0.45-0.525,0.432
                                                    c-3.22-0.315-7.176,1.165-8.826,3.293C269.229,398.019,269.089,398.082,268.948,398.083z"/>
                                            </g>
                                        </g>
                                    </g>
                                    <g>
                                        <path style="fill:#263238;" d="M219.26,433.838c-0.27,4.641-0.991,7.718-2.638,10.44c-1.646,2.722-4.753,3.577-7.9,2.78
                                            c-3.146-0.797-7.176-2.928-8.078-6.931c-0.902-4.004-1.427-6.748-0.713-11.052L219.26,433.838z"/>
                                        <path id="XMLID_3831_" style="fill:#37474F;" d="M206.033,400.228c-1.296,0.102-1.679,6.334-2.426,12.574
                                            c-0.801,6.688-2.798,9.454-3.514,14.938c-0.818,6.265,0.219,9.064,2.414,12.852c2.195,3.789,9.966,7.504,13.796,2.079
                                            c3.122-4.423,3.251-9.328,2.967-15.584c-0.294-6.467,0.153-10.945,0.417-15.853c0.253-4.691,1.291-9.421,0.165-9.943
                                            c-0.087,0.689-0.171,1.563-0.263,2.24c-0.113,0.833-0.116,1.706-0.418,2.501c-0.132,0.348-0.421,0.714-0.539,0.147
                                            c-0.08-0.385-0.042-0.782,0.001-1.167c0.19-1.728-0.681-1.869-1.15-2.003c-1.019-0.291-5.042-0.786-6.014-0.852
                                            c-0.99-0.068-4.409-0.216-4.853,0.347c-0.3,0.382-0.344,1.021-0.436,1.812c-0.111,0.943-0.329,1.634-0.356,1.338
                                            c-0.062-0.675,0.069-2.43,0.086-2.854c0.016-0.406,0.082-0.961,0.088-1.369C206.002,401.03,206.005,400.629,206.033,400.228z"/>
                                        <path style="fill:#FAFAFA;" d="M199.733,431.37c-0.224,3.89,0.706,6.555,2.424,9.52c2.195,3.789,10.592,7.517,14.422,2.091
                                            c1.906-2.699,2.416-5.891,2.678-9.147C216.962,429.653,203.353,427.811,199.733,431.37z"/>
                                        <g>
                                            <g>
                                                <path style="fill:#F0F0F0;" d="M216.429,427.023c-0.054-0.006-0.107-0.02-0.16-0.044c-0.052-0.025-6.051-2.505-11.889-1.154
                                                    c-0.258,0.055-0.516-0.102-0.577-0.361c-0.06-0.259,0.102-0.517,0.361-0.577c6.176-1.425,12.292,1.116,12.521,1.223
                                                    c0.239,0.116,0.34,0.402,0.227,0.642C216.822,426.939,216.625,427.042,216.429,427.023z"/>
                                            </g>
                                            <g>
                                                <path style="fill:#F0F0F0;" d="M204.67,421.155c-0.181-0.018-0.345-0.14-0.408-0.323c-0.084-0.252,0.05-0.525,0.301-0.611
                                                    c5.812-1.969,12.262,0.986,12.505,1.114c0.236,0.123,0.326,0.413,0.202,0.648c-0.124,0.234-0.418,0.32-0.648,0.202
                                                    c-0.054-0.028-6.341-2.892-11.749-1.053C204.806,421.155,204.738,421.161,204.67,421.155z"/>
                                            </g>
                                            <g>
                                                <path style="fill:#F0F0F0;" d="M204.875,416.752c-0.178-0.018-0.339-0.136-0.404-0.316c-0.09-0.251,0.04-0.526,0.29-0.615
                                                    c6.393-2.29,12.515,0.939,12.742,1.077c0.227,0.138,0.3,0.434,0.161,0.66c-0.138,0.227-0.439,0.3-0.661,0.161
                                                    c-0.05-0.032-5.968-3.123-11.918-0.994C205.016,416.751,204.944,416.759,204.875,416.752z"/>
                                            </g>
                                            <g>
                                                <path style="fill:#EBEBEB;" d="M205.193,412.417c-0.176-0.018-0.335-0.133-0.402-0.309c-0.093-0.249,0.032-0.526,0.281-0.619
                                                    c5.99-2.243,12.581,1.067,12.828,1.211c0.23,0.131,0.309,0.426,0.176,0.656c-0.131,0.231-0.425,0.313-0.656,0.176
                                                    c-0.058-0.033-6.448-3.228-12.011-1.144C205.338,412.415,205.264,412.424,205.193,412.417z"/>
                                            </g>
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <path style="fill:#455A64;" d="M218.496,205.147c-5.406,13.326-7.27,20.896-7.861,52.503c-0.59,31.606-0.53,45.3-0.654,49.111
                                                c-0.124,3.811-2.342,10.623-4.289,29.397c-1.948,18.774-0.158,40.757-0.158,40.757s1.858,3.407,9.037,4.051
                                                c6.623,0.594,9.902-1.892,9.902-1.892s9.081-36.558,11.592-47.866c2.512-11.308,10.666-54.749,10.666-54.749l4.331,30.155
                                                c0,0-2.02,10.36,0,26.824c2.02,16.463,5.579,33.327,5.579,33.327s4.504,1.747,10.169,1.662
                                                c5.666-0.085,8.926-2.332,8.926-2.332s5.626-48.984,5.626-67.644c0-18.66-0.235-65.675-6.108-93.302H218.496z"/>
                                        </g>
                                        <path style="fill:#FFBF9D;" d="M237.844,312.121c0,0-2.851-4.119-9.852-4.964c-7-0.845-10.637,2.957-10.637,2.957
                                            S230.346,308.741,237.844,312.121z M216.568,312.874c9.025,1.782,13.144,1.419,17.263,0.597
                                            C233.831,313.47,220.85,311.831,216.568,312.874z"/>
                                        <path style="fill:#FFBF9D;" d="M281.265,303.317l0.06-2.023c-6.029-0.803-15.624,1.142-18.204,2.629
                                            C272.208,302.55,281.265,303.317,281.265,303.317z M267.404,306.266c4.037,1.085,13.655,1.575,13.655,1.575l0.098-1.898
                                            C281.158,305.942,274.281,305.73,267.404,306.266z"/>
                                        <path style="fill:#37474F;" d="M207.287,378.65c0.269,0.206,0.594,0.42,0.98,0.634c-1.828-29.502,1.839-46.444,4.286-57.736
                                            c0.235-1.085,0.459-2.116,0.665-3.1c1.848-8.826,2.682-26.55,2.652-41.062c-0.008-4.366-0.017-8.88,0.025-13.676
                                            c0.049-5.609,0.218-11.418,0.676-17.164c10.284-1.227,12.518-11.385,15.329-24.211c0.385-1.753,0.782-3.566,1.214-5.428
                                            l-0.914-0.211c-0.432,1.865-0.83,3.682-1.216,5.439c-2.817,12.852-4.886,22.187-14.336,23.44
                                            c1.119-13.05,3.813-25.696,10.213-34.835l-0.767-0.538c-9.521,13.593-10.972,34.672-11.137,53.5
                                            c-0.042,4.799-0.033,9.316-0.025,13.685c0.029,14.458-0.805,32.138-2.632,40.868c-0.206,0.982-0.429,2.011-0.664,3.094
                                            C209.199,332.604,205.55,349.442,207.287,378.65z M252.643,240.574l-5.912,35.883l4.331,30.155l-0.572-29.291l4.013-22.25
                                            c0.149,2.21,0.304,4.475,0.461,6.788c1.303,19.076,2.779,40.699,1.781,45.25c-2.737,12.476-1.932,20.345-0.47,34.632
                                            c0.148,1.451,0.303,2.966,0.462,4.558c0.803,8.073,1.691,15.99,2.291,21.186c0.299,0.076,0.626,0.152,0.97,0.227
                                            c-0.6-5.183-1.508-13.264-2.329-21.507c-0.159-1.592-0.313-3.108-0.462-4.56c-1.452-14.191-2.251-22.008,0.453-34.336
                                            c1.027-4.683-0.391-25.441-1.761-45.515c-0.249-3.642-0.49-7.169-0.711-10.529l1.139-6.319c4.5-1.079,14.41-6.308,15.728-12.518
                                            C265.121,239.683,252.643,240.574,252.643,240.574z"/>
                                    </g>
                                </g>
                                <g id="Top_19_">
                                    <g>
                                        <g>
                                            <path style="fill:#263238;" d="M303.722,189.462c-0.757-0.414-2.159,0.827-4.037,2.575c-1.566,1.457-1.317,3.408-1.317,3.408
                                                s1.72-0.184,3.277-1.892C303.203,191.844,303.722,189.462,303.722,189.462z"/>
                                            <path d="M307.969,203.793c-0.72-0.23-0.992-0.54-0.005-1.469c0.987-0.929,4.333-3.351,4.333-3.351l0.829,1.4
                                                C313.127,200.372,309.249,204.069,307.969,203.793z"/>
                                        </g>
                                        <g>
                                            <path style="fill:#FFBF9D;" d="M329.226,181.114c-0.47-2.066-2.728-3.585-6.804-5.854c-0.007-0.004-0.011-0.009-0.018-0.013
                                                c-0.031-0.017-0.077-0.041-0.111-0.059c-0.193-0.107-0.368-0.207-0.569-0.318c-0.007,0.003-0.015,0.007-0.021,0.009
                                                c-6.777-3.463-40.081-18.527-45.478-20.596c-7.236-2.772-9.741-2.898-12.937-3.349l7.474,26.29c0,0,24.747,7.746,34.97,10.892
                                                c-2.817,3.33-5.565,6.552-8.095,7.717l9.975,8.467c2.215-3.435,15.718-10.314,18.707-14.963
                                                C328.552,185.865,329.681,183.118,329.226,181.114z"/>
                                            <path style="fill:#ec8181;" d="M319.26,177.539c-6.82-0.733-12.466,5.123-15.132,8.173c-0.265,0.303-0.832,0.99-1.279,1.515
                                                c1.046,0.324,2.019,0.624,2.882,0.89c0.145-0.169,1.285-1.675,1.993-2.626C310.975,181.12,314.794,178.624,319.26,177.539z"/>
                                        </g>
                                        <g>
                                            <g>
                                                <path style="fill:#FFBF9D;" d="M306.849,196.822c-1.131-1.003-3.892-3.528-5.646-2.787c-2.765,1.168-4.065,2.261-8.216,4.208
                                                    c-3.004,1.409-6.65,3.288-7.432,4.221c-1.991,2.374-1.323,8.455-0.525,11.03c0.767,2.476,3.228,1.47,3.228,1.47
                                                    c0.243,0.525,0.911,1.667,3.034,1.24c0.159,0.789,1.364,1.733,3.241,1.355c0.236,0.874,1.921,1.176,3.051,0.665
                                                    c1.564-0.707,3.201-2.941,4.187-3.791c0.901-0.776,1.456-1.171,1.477-1.704c0.029-0.723-0.766-1.445-2.086-1.324
                                                    c1.483-0.493,3.023-1.228,4.037-2.557c0.816-1.069,1.524-2.386,2.044-3.613c0.571-1.346,0.884-1.834,1.812-2.879
                                                    c1.457-1.641-0.725-4.096-1.901-5.249C307.055,197.009,306.953,196.914,306.849,196.822z"/>
                                                <path style="fill:#ec8181;" d="M301.162,211.405c-0.459,0.255-0.905,0.518-1.273,0.86c-0.18,0.174-0.357,0.349-0.504,0.551
                                                    c-0.154,0.2-0.269,0.42-0.443,0.646l-0.087,0.113l-0.129-0.065c-0.712-0.358-1.584-0.351-2.435-0.33
                                                    c0.807-0.294,1.741-0.362,2.592,0.016l-0.216,0.048c0.281-0.39,0.603-0.882,1.045-1.193
                                                    C300.149,211.727,300.649,211.518,301.162,211.405z"/>
                                                <path style="fill:#ec8181;" d="M298.256,215.628c0.1-0.412,0.246-0.756,0.321-1.13c0.109-0.366,0.154-0.733,0.227-1.146
                                                    c0.221,0.375,0.197,0.824,0.117,1.232C298.798,214.986,298.603,215.377,298.256,215.628z"/>
                                                <path style="fill:#ec8181;" d="M294.532,217.559c-0.533-0.974-0.736-2.089-0.85-3.182c-0.061-1.096-0.059-2.227,0.304-3.278
                                                    c-0.069,1.094-0.049,2.173,0.05,3.25C294.109,215.429,294.278,216.491,294.532,217.559z"/>
                                                <path style="fill:#FFBF9D;" d="M291.291,216.204c-0.479-1.237-0.736-2.546-0.894-3.862c-0.115-1.318-0.134-2.665,0.169-3.96
                                                    c-0.008,1.322,0.03,2.624,0.183,3.924C290.865,213.609,291.096,214.895,291.291,216.204z"/>
                                                <path style="fill:#FFBF9D;" d="M288.257,214.964c-1.167-2.455-1.444-5.382-0.674-7.999c-0.105,1.356-0.175,2.696-0.037,4.029
                                                    C287.64,212.332,287.939,213.641,288.257,214.964z"/>
                                                <path style="fill:#FFBF9D;" d="M287.764,204.885c-0.016-0.322,0.026-0.656,0.163-0.965c0.131-0.312,0.362-0.578,0.616-0.795
                                                    c0.543-0.4,1.165-0.623,1.807-0.7c-0.281,0.161-0.56,0.313-0.833,0.462c-0.271,0.153-0.539,0.304-0.766,0.499
                                                    C288.26,203.739,287.981,204.274,287.764,204.885z"/>
                                                <path style="fill:#FFBF9D;" d="M290.857,206.092c-0.016-0.322,0.026-0.655,0.163-0.965c0.131-0.312,0.361-0.578,0.616-0.795
                                                    c0.543-0.4,1.165-0.623,1.807-0.7c-0.28,0.161-0.56,0.313-0.833,0.462c-0.271,0.153-0.539,0.304-0.766,0.499
                                                    C291.353,204.946,291.073,205.482,290.857,206.092z"/>
                                                <path style="fill:#FFBF9D;" d="M294.606,207.795c-0.016-0.322,0.026-0.656,0.163-0.965c0.131-0.312,0.361-0.578,0.616-0.795
                                                    c0.543-0.4,1.165-0.623,1.807-0.7c-0.28,0.161-0.56,0.313-0.833,0.462c-0.271,0.153-0.539,0.303-0.767,0.499
                                                    C295.102,206.649,294.822,207.184,294.606,207.795z"/>
                                            </g>
                                            <g id="Watch">
                                                <g>
                                                    <g>
                                                        <path style="fill:#37474F;" d="M310.271,190.334l-4.202-1.416c-0.862-0.291-2.116-0.039-2.798,0.563l-3.328,2.931
                                                            c-0.342,0.301-0.475,0.632-0.416,0.924c0.044,0.215,0.205,1.023,0.249,1.239c0.06,0.291,0.311,0.543,0.74,0.688l4.202,1.416
                                                            c0.863,0.291,2.116,0.039,2.799-0.563l3.327-2.931c0.332-0.292,0.467-0.612,0.421-0.898
                                                            c-0.037-0.225-0.211-1.046-0.253-1.261C310.954,190.733,310.703,190.479,310.271,190.334z"/>
                                                        <path style="fill:#455A64;" d="M299.943,192.411l3.327-2.931c0.683-0.602,1.936-0.854,2.799-0.563l4.202,1.416
                                                            c0.863,0.291,1.008,1.014,0.325,1.616l-3.328,2.931c-0.683,0.602-1.936,0.854-2.799,0.563l-4.202-1.416
                                                            C299.405,193.737,299.26,193.013,299.943,192.411z"/>
                                                        <path style="fill:#263238;" d="M305.856,195.093c-0.452,0.091-0.909,0.077-1.254-0.039l-4.202-1.416
                                                            c-0.268-0.09-0.439-0.23-0.469-0.383c-0.031-0.152,0.073-0.347,0.285-0.533l3.328-2.931c0.272-0.241,0.688-0.431,1.14-0.522
                                                            c0.453-0.091,0.91-0.076,1.254,0.04l4.202,1.416c0.268,0.09,0.439,0.229,0.47,0.382c0.031,0.153-0.074,0.347-0.286,0.534
                                                            l-3.328,2.931C306.724,194.812,306.308,195.002,305.856,195.093z"/>
                                                        <g>
                                                            <path style="fill:#455A64;" d="M304.002,195.956c-0.024,0.005-0.05,0.004-0.075-0.005l-2.978-1.004
                                                                c-0.075-0.025-0.116-0.107-0.091-0.182c0.026-0.077,0.108-0.117,0.183-0.09l2.978,1.004
                                                                c0.075,0.025,0.116,0.107,0.091,0.183C304.093,195.912,304.051,195.946,304.002,195.956z"/>
                                                        </g>
                                                    </g>
                                                </g>
                                                <path style="fill:#5192ce;" d="M307.535,195.347c0.632,0.196,2.028,1.054,2.599,3.565c0.57,2.511-0.731,4.592-2.165,4.881
                                                    c0.506,0.336,1.719-0.166,3.213-1.286c0.48-0.36,0.896-0.673,1.239-0.931c0.996-0.75,1.565-1.938,1.499-3.182
                                                    c-0.018-0.35-0.07-0.728-0.169-1.127c-0.495-1.977-1.134-3.431-3.073-4.683L307.535,195.347z"/>
                                            </g>
                                        </g>
                                    </g>
                                    <g>
                                        <path style="fill:#5090cc;" d="M210.975,228.073c2.298-10.484,5.792-25.933,5.875-28.248c0.336-9.385-2.08-16.37-2.952-22.207
                                            c-1.9-12.711,2.864-23.382,5.824-25.885c0,0,3.074-0.707,6.752-1.582c2.211-0.526,2.97-0.663,6.337-1.139
                                            c7.477-1.055,14.178-0.75,16.975-0.466c1.378,0.14,7.909,1.266,7.909,1.266c1.977,0.461,5.588,1.117,5.595,1.122
                                            c0,0,4.514,3.687,8.738,11.237c3.224,5.763,4.811,10.576,4.386,22.922c-0.128,3.703-0.274,10.332-0.126,15.626
                                            c0.317,11.327,1.177,15.993,2.612,26.276C265.884,234.995,233.114,238.686,210.975,228.073z"/>
                                    </g>
                                    <g id="Head_9_">
                                        <path style="fill:#443a0d;" d="M233.836,142c0.977-0.198,1.927-0.605,2.852-0.999c1.364-0.581,2.807-1.156,4.282-1.007
                                            c1.832,0.186,3.327,1.412,5.072,1.888c0.968,0.264,1.995,0.251,2.983,0.114c0.622-0.086,1.217-0.284,1.827-0.426
                                            c1.03-0.239,2-0.301,3.05-0.171c1.039,0.129,2.132,0.315,3.149-0.034c1.614-0.553,2.551-2.295,4.104-3.001
                                            c1.743-0.793,3.802-0.105,5.683-0.46c1.696-0.32,3.163-1.511,4.003-3.019c0.84-1.508,1.089-3.3,0.897-5.016
                                            c-0.133-1.184-0.459-2.425-0.017-3.532c0.299-0.749,0.911-1.32,1.455-1.916c1.094-1.2,2.009-2.852,1.497-4.394
                                            c-0.447-1.347-1.894-2.29-1.993-3.706c-0.092-1.323,1.341-2.506,2.625-2.178c1.285,0.329,1.976,2.039,1.292,3.174
                                            c1.308-1.003,2.509-2.405,2.52-4.053c0.01-1.389-0.834-2.646-1.814-3.631c-0.98-0.985-2.129-1.806-2.997-2.89
                                            c-0.469-0.585-0.841-1.264-1.025-1.994c-0.09-0.355-0.133-0.724-0.111-1.09c0.039-0.657,0.296-1.294,0.402-1.939
                                            c0.432-2.648-1.392-5.473-3.983-6.17c-1.397-0.376-3.082-0.276-4.023-1.375c-0.686-0.801-0.703-1.964-1.102-2.94
                                            c-1.016-2.49-4.41-3.237-6.915-2.258c-1.237,0.483-2.487,1.302-3.78,1.001c-0.9-0.21-1.58-0.92-2.286-1.516
                                            c-1.164-0.982-2.538-1.709-3.997-2.143c-0.73-0.217-1.481-0.361-2.24-0.428c-0.379-0.033-0.76-0.047-1.14-0.041
                                            c-0.285,0.004-0.586,0.064-0.87,0.043c-0.254-0.02-0.481-0.083-0.742-0.077c-0.311,0.007-0.622,0.031-0.931,0.071
                                            c-1.235,0.16-2.436,0.578-3.508,1.212c-0.868,0.513-1.653,1.169-2.3,1.943c-0.474,0.566-0.882,1.195-1.446,1.671
                                            c-1.426,1.206-3.475,1.184-5.329,1.416c-2.136,0.266-4.257,0.973-5.949,2.303c-1.692,1.331-2.916,3.332-3.033,5.482
                                            c-0.053,0.964,0.1,1.993-0.352,2.847c-0.346,0.654-0.994,1.089-1.642,1.446c-1.51,0.832-3.171,1.399-4.58,2.392
                                            c-1.41,0.993-2.58,2.578-2.438,4.297c0.12,1.455,1.126,2.655,1.975,3.842c0.85,1.187,1.611,2.662,1.167,4.053
                                            c-0.281,0.88-0.996,1.546-1.441,2.355c-1.101,2.001-0.161,4.845,1.914,5.797c1.291,0.592,3.118,0.756,3.485,2.128
                                            c0.205,0.765-0.197,1.546-0.328,2.328c-0.396,2.353,1.864,4.5,4.228,4.822c1.336,0.182,2.834-0.017,3.902,0.806
                                            c0.914,0.705,1.204,1.939,1.841,2.901c0.628,0.948,1.641,1.615,2.742,1.877c0.542,0.129,1.105,0.055,1.639,0.189
                                            C232.702,142.145,233.234,142.122,233.836,142z"/>
                                        <g>
                                            <path style="fill:#FFBF9D;" d="M233.462,145.133c0.023-2.082-0.263-12.533-0.263-12.533c-0.089,0.778-3.885,2.897-7.264-1.132
                                                c-3.469-4.136-3.605-8.314-1.565-11.036c2.255-3.008,8.135-2.938,8.691,2.156c2.919-0.112,4.328-1.372,3.175-6.179
                                                c0.257-2.799,2.944-3.947,3.776-8.494c0.64-3.498,3.443-6.309,6.997-6.438c2.711-0.099,5.19,0.545,7.495,2.858
                                                c1.078-1.717,2.238-2.479,3.519-2.692c3.909-0.649,7.548,2.144,8.385,6.017c0.791,3.661,1.502,8.927,1.286,14.682
                                                c-0.416,11.089-3.395,16.434-6.948,18.292c-2.382,1.246-4.539,1.538-8.69,1.184l0.188,3.482l0,0
                                                c0.074,1.744-0.083,3.04,1.612,3.61c1.138,0.383,3.837,0.901,3.837,0.901s3.944,6.817-6.935,7.428
                                                c-17.341,0.974-24.285-7.09-24.285-7.09s1.167-0.354,3.836-1.184C233.139,148.087,233.439,147.216,233.462,145.133z"/>
                                            <path style="fill:#ec8181;" d="M254.47,129.726c-0.279-0.365-0.679-0.63-1.124-0.759c-0.398-0.115-0.807-0.183-1.22-0.218
                                                c-0.409-0.034-0.796-0.013-1.197,0.075c-0.214,0.047-0.445,0.094-0.649,0.176c-0.179,0.072-0.335,0.204-0.489,0.32
                                                c-0.093,0.07-0.215,0.462-0.004,0.465c0.212,0.002,0.42,0.026,0.63-0.002c0.182-0.024,0.365-0.042,0.549-0.05
                                                c0.388-0.018,0.788-0.014,1.176,0.013c0.377,0.026,0.753,0.099,1.116,0.204c0.161,0.047,0.321,0.071,0.485,0.105
                                                c0.09,0.019,0.18,0.05,0.271,0.062c0.115,0.015,0.228-0.012,0.344-0.022C254.495,130.084,254.541,129.818,254.47,129.726z"/>
                                            <path style="opacity:0.2;" d="M254.47,129.726c-0.279-0.365-0.679-0.63-1.124-0.759c-0.398-0.115-0.807-0.183-1.22-0.218
                                                c-0.409-0.034-0.796-0.013-1.197,0.075c-0.214,0.047-0.445,0.094-0.649,0.176c-0.179,0.072-0.335,0.204-0.489,0.32
                                                c-0.093,0.07-0.215,0.462-0.004,0.465c0.212,0.002,0.42,0.026,0.63-0.002c0.182-0.024,0.365-0.042,0.549-0.05
                                                c0.388-0.018,0.788-0.014,1.176,0.013c0.377,0.026,0.753,0.099,1.116,0.204c0.161,0.047,0.321,0.071,0.485,0.105
                                                c0.09,0.019,0.18,0.05,0.271,0.062c0.115,0.015,0.228-0.012,0.344-0.022C254.495,130.084,254.541,129.818,254.47,129.726z"/>
                                            <g>
                                                <path id="XMLID_3824_" style="fill:#263238;" d="M264.474,112.527l-4.365-1.742c0.439-1.233,1.773-1.843,2.978-1.361
                                                    C264.293,109.905,264.914,111.295,264.474,112.527z"/>
                                                <path id="XMLID_3823_" style="fill:#263238;" d="M249.581,111.103l-4.655-0.994c-0.326,1.285,0.453,2.549,1.738,2.824
                                                    C247.949,113.207,249.255,112.388,249.581,111.103z"/>
                                                <path id="XMLID_3822_" style="fill:#263238;" d="M259.712,116.727c-0.085,1.068,0.722,2.025,1.8,2.14
                                                    c1.078,0.114,2.02-0.659,2.104-1.726c0.085-1.068-0.722-2.026-1.799-2.14C260.739,114.887,259.796,115.66,259.712,116.727z"/>
                                                <path id="XMLID_3821_" style="fill:#263238;" d="M245.513,117.043c-0.084,1.067,0.722,2.025,1.8,2.14
                                                    c1.078,0.114,2.021-0.659,2.104-1.726c0.085-1.068-0.722-2.026-1.799-2.139C246.539,115.203,245.596,115.976,245.513,117.043z
                                                    "/>
                                            </g>
                                            <path style="fill:#ec8181;" d="M261.476,123.549l-6.395,2.344l-1.704-11.125C255.844,114.829,258.989,118.711,261.476,123.549z
                                                "/>
                                            <g id="XMLID_3819_">
                                                <path id="XMLID_3820_" style="fill:#ec8181;" d="M252.055,141.819c-7.448-0.768-14.572-3.223-16.238-6.623
                                                    c0,0,0.296,3.239,2.983,5.489c4.969,4.161,13.397,3.769,13.397,3.769L252.055,141.819z"/>
                                            </g>
                                        </g>
                                    </g>
                                    <g id="Arm_6_">
                                        <g>
                                            <path style="fill:#ec8181;" d="M207.658,245.555c-3.14,0.894-7.159-3.011-8.261-4.369c-1.103-1.359,0.317-4.587,0.984-7.31
                                                c0.666-2.723-0.028-7.329,3.366-6.04C207.141,229.126,214.204,238.223,207.658,245.555z"/>
                                            <path style="fill:#FFBF9D;" d="M219.721,151.733c-8.737,1.292-12.787,3.389-17.597,13.058
                                                c-5.601,11.26-14.668,26.923-16.068,31.812c-1.303,4.547-3.904,7.793,1.075,14.709c4.554,6.326,18.865,22.906,20.967,25.338
                                                c1.86,2.152,0.832,8.317-5.566,7.4c0,0,4.869,4.308,7.542,3.829c2.307-0.413,5.937-2.432,9.265-9.432
                                                c2.1-4.416,0.342-7.88-2.853-12.796c-3.815-5.868-12.061-22.238-12.061-22.238l14.754-26.197
                                                C219.178,177.216,227.162,159.498,219.721,151.733z"/>
                                        </g>
                                    </g>
                                </g>
                                <g>
                                    <path style="fill:#FAFAFA;" d="M308.327,410.035c-0.051-1.421-0.786-2.693-1.778-3.678c-0.892-0.885-2.177-1.776-3.469-1.828
                                        c-0.233-0.009-0.349,0.332-0.362,0.508c-0.018,0.242,0.068,0.544,0.28,0.684c0.947,0.622,1.971,1.047,2.749,1.879
                                        c0.335,0.359,0.636,0.759,0.858,1.198c0.057,0.112,0.107,0.225,0.158,0.34c0.005,0.011,0.018,0.044,0.028,0.068
                                        c0.026,0.069,0.05,0.139,0.076,0.207c0.098,0.263,0.212,0.519,0.28,0.792c0.131,0.528,0.083,0.939,0.13,1.487
                                        c0.013,0.152,0.02,0.337,0.11,0.466c0.268,0.383,0.621-0.306,0.722-0.565C308.296,411.107,308.346,410.552,308.327,410.035z"/>
                                    <path style="fill:#FAFAFA;" d="M310.334,403.773c-0.963-1.158-2.197-2.071-3.547-2.728c-1.336-0.651-3.048-1.133-4.494-0.605
                                        c-0.381,0.139-0.339,0.976,0.046,1.086c1.369,0.391,2.753,0.618,4.06,1.213c1.038,0.472,1.975,1.154,2.74,2
                                        c1.912,2.115,2.506,5.055,2.519,7.821c0.001,0.204,0.211,0.184,0.286,0.032C313.385,409.682,312.306,406.143,310.334,403.773z"/>
                                </g>
                            </g>
                        </g>
                        <g id="Speech_Bubble">
                            <g id="Speech_Bubble_7_">
                                <g id="Speech_Bubble_9_">
                                    <path style="fill:#FFFFFF;" d="M146.898,137.836c-0.012,0-0.023-0.001-0.035-0.001c-0.012,0-0.023,0.001-0.035,0.001H146.898z
                                        M106.103,117.353c5.46,11.079,18.293,20.471,40.759,20.483c10.007-0.005,18.091-1.879,24.475-4.926
                                        c4.295,5.285,13.03,7.242,19.353,4.778c0.829-0.323,0.829-1.514,0.008-1.857c-6.411-2.683-8.256-7.231-8.763-10.437
                                        c2.401-2.485,4.289-5.206,5.686-8.041c5.971-12.117,5.115-25.598-2.349-36.985c-7.241-11.047-23.159-17.991-38.41-17.991
                                        c-15.251,0-31.169,6.944-38.411,17.991C100.988,91.755,100.132,105.236,106.103,117.353z"/>
                                    <path style="fill:#455A64;" d="M184.788,139.113c-5.152,0-10.455-2.11-13.551-5.747c-6.83,3.203-15.016,4.83-24.34,4.839v0.001
                                        l-0.07-0.001c-26.861-0.023-37.251-12.971-41.055-20.688l0,0c-6.03-12.237-5.166-25.852,2.371-37.351
                                        c7.119-10.861,22.679-18.158,38.719-18.158c16.041,0,31.601,7.297,38.719,18.158c7.538,11.5,8.402,25.113,2.371,37.351
                                        c-1.428,2.898-3.318,5.589-5.622,8c0.551,3.196,2.488,7.454,8.512,9.974c0.518,0.217,0.848,0.725,0.841,1.292
                                        c-0.007,0.567-0.336,1.047-0.858,1.25C188.942,138.765,186.877,139.111,184.788,139.113z M171.441,132.451l0.183,0.226
                                        c4.099,5.042,12.591,7.134,18.933,4.667c0.239-0.094,0.384-0.308,0.388-0.571c0.002-0.212-0.098-0.48-0.388-0.602
                                        c-6.451-2.699-8.447-7.319-8.985-10.72l-0.029-0.182l0.128-0.133c2.309-2.391,4.2-5.064,5.62-7.947
                                        c5.912-11.997,5.064-25.344-2.326-36.62c-6.879-10.494-22.547-17.824-38.102-17.824s-31.222,7.33-38.102,17.824
                                        c-7.39,11.275-8.237,24.623-2.326,36.62c3.729,7.567,13.94,20.264,40.428,20.276c9.346-0.005,17.527-1.649,24.316-4.89
                                        L171.441,132.451z"/>
                                </g>
                                <g id="XMLID_487_">
                                    <g>
                                        <g>
                                            <g id="XMLID_7485_">
                                                <path style="fill:#5d88e7;" d="M156.163,107.632c2.656,2.924,2.898,6.488,2.898,10.759h-24.469
                                                    c0-4.272,0.242-7.835,2.894-10.759c2.656-2.924,4.807-3.944,5.891-5.002c1.088-1.058,1.33-1.862,1.33-2.484
                                                    c0-0.626-0.242-1.43-1.33-2.488c-1.084-1.058-3.235-2.077-5.891-5.002c-2.652-2.92-2.894-6.488-2.894-10.759h24.469
                                                    c0,4.272-0.242,7.839-2.898,10.759c-2.652,2.924-4.803,3.943-5.891,5.002c-1.084,1.058-1.326,1.862-1.326,2.488
                                                    c0,0.622,0.242,1.425,1.326,2.484c0.592,0.575,1.494,1.136,2.622,2C153.844,105.356,154.95,106.298,156.163,107.632z"/>
                                            </g>
                                            <path id="XMLID_3647_" style="opacity:0.6;fill:#FFFFFF;" d="M156.163,107.632c2.656,2.924,2.898,6.488,2.898,10.759h-24.469
                                                c0-4.272,0.242-7.835,2.894-10.759c2.656-2.924,4.807-3.944,5.891-5.002c1.088-1.058,1.33-1.862,1.33-2.484
                                                c0-0.626-0.242-1.43-1.33-2.488c-1.084-1.058-3.235-2.077-5.891-5.002c-2.652-2.92-2.894-6.488-2.894-10.759h24.469
                                                c0,4.272-0.242,7.839-2.898,10.759c-2.652,2.924-4.803,3.943-5.891,5.002c-1.084,1.058-1.326,1.862-1.326,2.488
                                                c0,0.622,0.242,1.425,1.326,2.484c0.592,0.575,1.494,1.136,2.622,2C153.844,105.356,154.95,106.298,156.163,107.632z"/>
                                        </g>
                                        <path id="XMLID_3656_" style="opacity:0.5;fill:#FFFFFF;" d="M135.278,117.886c0,0-0.001,0-0.002,0
                                            c-0.135-0.001-0.244-0.111-0.243-0.246c0.023-3.593,0.255-7.049,2.788-9.84c1.713-1.886,3.176-2.94,4.352-3.787
                                            c0.607-0.437,1.128-0.812,1.523-1.196c0.975-0.951,1.449-1.859,1.449-2.774c0-0.916-0.474-1.823-1.449-2.774
                                            c-0.393-0.383-0.912-0.757-1.513-1.19c-1.186-0.854-2.649-1.908-4.362-3.794c-2.534-2.79-2.765-6.246-2.788-9.839
                                            c-0.001-0.135,0.108-0.245,0.243-0.246c0.001,0,0.001,0,0.001,0c0.135,0,0.244,0.108,0.245,0.243
                                            c0.023,3.494,0.244,6.851,2.661,9.513c1.677,1.847,3.118,2.884,4.275,3.718c0.627,0.452,1.16,0.835,1.579,1.244
                                            c1.075,1.048,1.597,2.07,1.597,3.125c0,1.054-0.522,2.077-1.596,3.124c-0.421,0.41-0.956,0.795-1.575,1.241
                                            c-1.161,0.836-2.601,1.873-4.279,3.721c-2.417,2.663-2.638,6.02-2.661,9.514C135.522,117.778,135.413,117.886,135.278,117.886z"
                                            />
                                        <g>
                                            <path id="XMLID_7484_" style="fill:#FAFAFA;" d="M155.08,108.545c2.049,2.191,2.419,4.954,2.489,8.233h-21.415
                                                c0.07-3.279,0.421-6.06,2.489-8.233c2.147-2.256,4.613-3.118,8.219-3.118C150.467,105.427,153.461,106.814,155.08,108.545z"/>
                                            <path id="XMLID_7483_" style="fill:#FAFAFA;" d="M157.469,85.302c-0.241,2.407-0.796,4.484-2.389,6.237
                                                c-1.636,1.802-3.048,2.819-4.183,3.635c-0.639,0.461-1.191,0.858-1.645,1.3c-1.2,1.17-1.783,2.337-1.783,3.568
                                                c0,1.201-0.204,1.507-0.607,1.507c-0.403,0-0.608-0.277-0.608-1.507s-0.583-2.398-1.783-3.568
                                                c-0.453-0.442-1.006-0.84-1.645-1.3c-1.135-0.817-2.547-1.834-4.183-3.635c-0.478-0.526-0.865-1.081-1.178-1.665
                                                c-0.104-0.194,0.069-0.423,0.283-0.372c1.006,0.241,3.311,0.695,5.903,0.535c3.941-0.243,5.709-0.903,8.18-2.97
                                                c1.485-1.242,2.6-2.962,3.59-3.374C156.716,83.154,157.62,84.086,157.469,85.302z"/>
                                            <circle id="XMLID_3643_" style="fill:#FAFAFA;" cx="146.862" cy="103.301" r="0.728"/>
                                        </g>
                                        <path id="XMLID_6353_" style="opacity:0.3;fill:#5d88e7;" d="M152.894,104.63c0.95,0.726,2.056,1.667,3.27,3.002
                                            c2.656,2.924,2.898,6.488,2.898,10.759h-21.665c3.27,0,12.427-1.527,15.692-4.734
                                            C156.555,110.252,154.855,107.364,152.894,104.63z"/>
                                        <path id="XMLID_6352_" style="opacity:0.3;fill:#5d88e7;" d="M159.061,81.898c0,4.272-0.242,7.839-2.898,10.759
                                            c-2.652,2.924-4.803,3.943-5.891,5.002c-1.084,1.058-1.326,1.862-1.326,2.488c0,0.622,0.242,1.425,1.326,2.484
                                            c-3.594-2.177-3.01-4.367-2.341-5.835c0.674-1.469,5.14-4.22,4.894-8.258c-0.242-4.038-6.544-6.639-12.526-6.639H159.061z"/>
                                    </g>
                                    <g id="XMLID_6184_">
                                        <path id="XMLID_7482_" style="fill:#5d88e7;" d="M161.269,78.622c0,1.201-0.976,2.173-2.173,2.173h-24.469
                                            c-1.201,0-2.173-0.972-2.173-2.173H161.269z"/>
                                        <path id="XMLID_7481_" style="opacity:0.2;fill:#FFFFFF;" d="M151.365,78.622c0,1.201-0.972,2.173-2.173,2.173h-14.565
                                            c-1.201,0-2.173-0.972-2.173-2.173H151.365z"/>
                                        <path id="XMLID_7480_" style="fill:#5d88e7;" d="M162.971,75.931v0.842c0,1.019-0.829,1.849-1.849,1.849h-28.52
                                            c-1.019,0-1.849-0.829-1.849-1.849v-0.842c0-0.212,0.173-0.384,0.384-0.384h31.449C162.798,75.547,162.971,75.72,162.971,75.931
                                            z"/>
                                        <path id="XMLID_3659_" style="opacity:0.15;" d="M162.936,75.931v0.842c0,1.019-0.829,1.849-1.849,1.849h-28.52
                                            c-1.019,0-1.849-0.829-1.849-1.849v-0.842c0-0.212,0.173-0.384,0.384-0.384h31.449C162.763,75.547,162.936,75.72,162.936,75.931
                                            z"/>
                                        <path id="XMLID_7477_" style="fill:#5d88e7;" d="M154.773,75.931v0.842c0,1.019-0.829,1.849-1.853,1.849h-20.318
                                            c-1.019,0-1.849-0.829-1.849-1.849v-0.842c0-0.212,0.173-0.384,0.384-0.384h23.251C154.6,75.547,154.773,75.72,154.773,75.931z"
                                            />
                                        <path id="XMLID_6497_" style="opacity:0.2;fill:#FFFFFF;" d="M135.652,78.622c-0.795-0.833-0.693-2.362,0-3.075h6.552
                                            c0.795,0.833,0.693,2.362,0,3.075H135.652z"/>
                                        <path id="XMLID_3654_" style="opacity:0.2;fill:#FFFFFF;" d="M136.755,80.795c-0.528-0.589-0.46-1.669,0-2.173h4.347
                                            c0.528,0.589,0.46,1.669,0,2.173H136.755z"/>
                                    </g>
                                    <g id="XMLID_3658_">
                                        <path id="XMLID_3666_" style="fill:#5d88e7;" d="M132.455,121.463c0-1.201,0.976-2.173,2.173-2.173h24.469
                                            c1.201,0,2.173,0.972,2.173,2.173H132.455z"/>
                                        <path id="XMLID_3665_" style="opacity:0.2;fill:#FFFFFF;" d="M142.359,121.463c0-1.201,0.972-2.173,2.173-2.173h14.565
                                            c1.201,0,2.173,0.972,2.173,2.173H142.359z"/>
                                        <path id="XMLID_3664_" style="fill:#5d88e7;" d="M130.754,124.154v-0.842c0-1.019,0.829-1.849,1.849-1.849h28.52
                                            c1.019,0,1.849,0.829,1.849,1.849v0.842c0,0.212-0.173,0.384-0.384,0.384h-31.449
                                            C130.926,124.538,130.754,124.365,130.754,124.154z"/>
                                        <path id="XMLID_3663_" style="opacity:0.15;" d="M130.754,124.154v-0.842c0-1.019,0.829-1.849,1.849-1.849h28.52
                                            c1.019,0,1.849,0.829,1.849,1.849v0.842c0,0.212-0.173,0.384-0.384,0.384h-31.449
                                            C130.926,124.538,130.754,124.365,130.754,124.154z"/>
                                        <path id="XMLID_3662_" style="fill:#5d88e7;" d="M138.952,124.154v-0.842c0-1.019,0.829-1.849,1.853-1.849h20.318
                                            c1.019,0,1.849,0.829,1.849,1.849v0.842c0,0.212-0.173,0.384-0.384,0.384h-23.251
                                            C139.124,124.538,138.952,124.365,138.952,124.154z"/>
                                        <path id="XMLID_3661_" style="opacity:0.2;fill:#FFFFFF;" d="M158.072,121.463c0.795,0.833,0.693,2.362,0,3.075h-6.552
                                            c-0.795-0.833-0.693-2.362,0-3.075H158.072z"/>
                                        <path id="XMLID_3660_" style="opacity:0.2;fill:#FFFFFF;" d="M156.969,119.29c0.528,0.589,0.46,1.669,0,2.173h-4.347
                                            c-0.527-0.589-0.46-1.669,0-2.173H156.969z"/>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>

                </div>
                
            </div>


        </div>

        <div class=" font-Arima ">

            

            <div class="bg-white  shadow-lg">
                <div class=" py-1 flex justify-center ">

                    <p class="font-semibold text-md md:text-md text-gray-600 text-center justify-center mx-4  ">En estos momentos no se esta efectuando ningún sorteo en el que te encuestres participando</p>

                </div>
            </div>

            <section class="container  ">

                @if($no_hay_sorteos == 0)

                <div class=" flex flex-col space-y-2  justify-center text-center  pt-2 ">
                    <div class="flex flex-col  justify-center items-center  "> 
                        <h1 class="font-bold  text-xl md:text-2xl text-indigo-500 mt-4 text-center ">
                            Tiempo restante para iniciar el sorteo Nro. {{$sorteo_nro}}
                        </h1>
                        <p class="text-xl text-gray-500 mt-3 "> </p>
    
    
    
                        <p class="text-gray-500 dark:text-gray-300">
    
                            <div class=" mt-1 px-2 " >
    
                                <div  id="cuenta">
    
    
                                </div>
    
                            </div>
    
                        </p>
    
                    </div>
                </div>

                @else

                    

                @endif
    
    
            </section>

        </div>



    @endif



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
            simplyCountdown('#cuenta', {
                year: <?php echo $ano_restantes?>, // required
                month: <?php echo $mes_restantes?>, // required
                day: <?php echo $dias_restantes?>, // required
                hours: <?php echo $horas_restantes?>, // Default is 0 [0-23] integer
                minutes: <?php echo $minutos_restantes?>, // Default is 0 [0-59] integer
                seconds: 0, // Default is 0 [0-59] integer
                words: { //words displayed into the countdown
                    days: { singular: 'Día', plural: 'Dias' },
                    hours: { singular: 'Hora', plural: 'Horas' },
                    minutes: { singular: 'Minuto', plural: 'Minutos' },
                    seconds: { singular: 'segundo', plural: 'segundos' }
                },
                plural: true, //use plurals
                inline: false, //set to true to get an inline basic countdown like : 24 days, 4 hours, 2 minutes, 5 seconds
                inlineClass: 'simply-countdown-inline', //inline css span class in case of inline = true
                // in case of inline set to false
                enableUtc: true, //Use UTC as default
                onEnd: function() {
                    return;
                }, //Callback on countdown end, put your own function here
                refresh: 1000, // default refresh every 1s
                sectionClass: 'simply-section', //section css class
                amountClass: 'simply-amount', // amount css class
                wordClass: 'simply-word', // word css class
                zeroPad: false,
                countUp: false
            });
        </script>

</div>
