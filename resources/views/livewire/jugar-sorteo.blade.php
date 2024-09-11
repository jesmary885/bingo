<div>



    @if($cartones_sorteo_iniciado == 1)

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

            @foreach ($mis_cartones as $carton)

                <div class=" bg-white rounded-md shadow-md overflow-hidden">
                    <div class=" bg-blue-500 rounded-t-md shadow-md overflow-hidden md:max-w-xl ">
                        <div class="grid grid-cols-5 gap-0.5 justify-center mb-1 mt-1">  

                            <div class="bg-blue-600 text-white justify-center text-2xl text-center  py-2  font-bold">B</div>  
                            <div class="bg-blue-600 text-white justify-center text-2xl text-center  py-2 font-bold">I</div>  
                            <div class="bg-blue-600 text-white justify-center text-2xl text-center  py-2 font-bold">N</div>  
                            <div class="bg-blue-600 text-white justify-center text-2xl text-center  py-2 font-bold">G</div>  
                            <div class="bg-blue-600 text-white justify-center text-2xl text-center py-2 font-bold">O</div>  
                        </div>  

                        <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1 mb-1 ">  
                            @foreach (json_decode($carton->carton->content_1) as $item)


                                <div class="{{$this->background($item)}} bg-gray-100 text-lg justify-center text-center py-2 font-bold">  {{$item}}  </div>  
                            @endforeach
                        </div>  

                        <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1 mb-1">  
                            @foreach (json_decode($carton->carton->content_2) as $item)
                                <div class="{{$this->background($item)}} bg-gray-100  text-lg justify-center text-center py-2 font-bold">{{$item}} </div>  
                            @endforeach
                        </div> 

                        <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1 mb-1">  
                            @foreach (json_decode($carton->carton->content_3) as $item)
                                <div class="{{$this->background($item)}} bg-gray-100 text-lg justify-center text-center py-2 font-bold">{{$item}} </div>  
                            @endforeach
                        </div> 

                        <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1 mb-1">  
                            @foreach (json_decode($carton->carton->content_4) as $item)
                                <div class="{{$this->background($item)}} bg-gray-100 text-lg justify-center text-center py-2 font-bold">{{$item}} </div>  
                            @endforeach
                        </div> 

                        <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1 mb-1">  
                            @foreach (json_decode($carton->carton->content_5) as $item)
                                <div class="{{$this->background($item)}} bg-gray-100 text-lg justify-center text-center py-2 font-bold">{{$item}}</div>  
                            @endforeach
                        </div> 

                        <div class="bg-blue-600 m-1 text-center  ">
                            <p class=" text-white font-semibold text-sm ">SERIAL NRO. {{$carton->carton->serial}}  </p>
                        </div>
                    </div> 
                </div>

                @if($type_1 == 'Lineal' || $type_2 == 'Lineal')
                    {{$this->verifi_linea_horizontal($carton->carton->id)}}
                    {{$this->verifi_linea_vertical($carton->carton->id)}}
                @endif

                @if($type_1 == 'Cuatro esquinas' || $type_2 == 'Cuatro esquinas')
                    {{$this->verifi_cuatro_esquinas($carton->carton->id)}}
                @endif

                @if($type_1 == 'Carton lleno' || $type_2 == 'Carton lleno')
                    {{$this->verifi_carton_lleno($carton->carton->id)}}
                @endif

            @endforeach

        </div>

    @else

        <section class="bg-white dark:bg-gray-900">

            <div class=" flex flex-col space-y-2  justify-center text-center   bg-gray-50 p-10 ">
                <div class="flex flex-col  justify-center items-center  -translate-x-1/2"> <p class=" text-2xl text-center text-gray-500">En estos momentos no se esta efectuando ningún sorteo en el que te encuestres participando</p>
                    <h1 class="font-bold  text-2xl text-indigo-500 mt-4 text-center ">
                        Tiempo restante para iniciar el sorteo Nro. {{$sorteo_nro}}
                    </h1>
                    <p class="text-xl text-gray-500 mt-3 "> </p>
                
            

                    <p class="text-gray-500 dark:text-gray-300">

                        <div class=" mt-2 " >
        
                            <div  id="cuenta">
            
            
                            </div>
            
                        </div>
                        
                    </p>

                </div>
            </div>


        </section>

        

    @endif

        @if($ganador == 1)

            <p>Ha ganado el carton Nro {{$carton_ganador->id}}, con Serial {{$carton_ganador->serial}}</p>
        @endif


            <link rel="stylesheet" href="{{ asset('vendor/css_contador/estilos.css') }}">

 

    <script>
        Echo.channel('ganador')
        .listen('NewGanador', (e) => {
            console.log(e);
        });
    </script>

    
    <script src="{{ asset('vendor/dist/simplyCountdown.min.js') }}"></script>


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
