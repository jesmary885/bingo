<div>

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

        @endforeach

        {{$this->verifi_linea_horizontal(1)}}

    </div>

    @if($ganador == 1)

        <p>ha ganado el carton </p>
    @endif

    <script>
        Echo.channel('ganador')
        .listen('NewGanador', (e) => {
            console.log(e);
        });
    </script>
</div>
