<div class="container mx-auto " >

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">


        
     

    @if($cartones_sorteo_iniciado == 1)  


        

            <div class="relative block p-4 overflow-hidden border bg-white border-slate-100 rounded-lg mb-2 mt-1 ">

                @if($ganador == 0)

                    <div class=" text-lg font-extrabold text-center ">
                        <span class="bg-gradient-to-r from-blue-500 via-blue-400 to-blue-300 bg-clip-text text-transparent"> FICHAS DEL SORTEO NRO {{$sorteo_nro}}</span>
                    </div>
                
                    <span class="absolute inset-x-0 bottom-0 h-2 bg-gradient-to-r from-green-300 via-blue-500 to-purple-600" ></span>

                    <div class="mt-5 mb-10 flex mx-2 ">
                        <div class="w-full grid grid-cols-6 sm:grid-cols-8 md:grid-cols-10 lg:grid-cols-12 gap-8   ">
                            @foreach($fichas as $ficha)
                                <div class="relative h-10 w-10 ">
                                    @if($ficha_ultima == $ficha->id)
                                        <div class="w-16 h-16 bg-red-500 rounded-full absolute  animate-ping"></div>
                                    @endif
                                    <div class="@if($ficha_ultima == $ficha->id) h-16 w-16 @else h-14 w-14 animate-pulse animate-fade-right @endif mx-auto my-auto  rounded-full  @if($ficha_ultima == $ficha->id) bg-red-700 @else bg-blue-700 @endif">
                                        <p class="  text-center font-bold  text-white  mt-1">
                                            {{$ficha->letra}}
                                        </p>
                                        <p class="  text-center font-bold  text-white ">
                                            {{$ficha->numero}}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else

                <div class=" text-lg font-extrabold text-center ">
                    <span class="bg-gradient-to-r from-blue-500 via-blue-400 to-blue-300 bg-clip-text text-transparent  "> RESULTADOS DEL SORTEO NRO {{$sorteo_nro}}</span>
                </div>

                <div class=" flex justify-center w-full mt-4 mb-4">

                    @livewire('carton-ganador', ['sorteo' => $sorteo->id])

                    @livewire('fichas-sorteo', ['sorteo' => $sorteo->id])

                </div>

            







                <span class="absolute inset-x-0 bottom-0 h-2 bg-gradient-to-r from-green-300 via-blue-500 to-purple-600" ></span>

                @endif
            </div>
     

        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mx-2 ">

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

                        <div class="bg-blue-600 m-1 text-center">
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

                @if($type_1 == 'Diagonal' || $type_2 == 'Diagonal')
                    {{$this->diagonal($carton->carton->id)}}
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

            @if($ganador_user_login==1)

                <script>

                        let duration = 15 * 5000;
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

            @endif

    

            {{-- @livewire('carton-ganador', ['sorteo' => $sorteo->id]) --}}

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
