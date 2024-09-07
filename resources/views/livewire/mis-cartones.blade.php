<div>

    <div class="bg-white rounded-lg shadow-lg mb-6">
        <div class="px-6 py-2 flex justify-between items-center">
            <h1 class="font-semibold text-sm md:text-lg text-gray-700 uppercase">MIS CARTONES DE SORTEOS VIGENTES</h1>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    

        @foreach ($mis_cartones as $carton)

            <div class=" bg-white rounded-md shadow-md overflow-hidden">
                <div class=" {{$this->color($carton->id)}} rounded-t-md shadow-md overflow-hidden md:max-w-xl ">
                    <div class="grid grid-cols-5 gap-0.5 justify-center mb-1 mt-1">  

                        <div class="{{$this->color($carton->id)}} text-white justify-center text-2xl text-center  py-2  font-bold">B</div>  
                        <div class="{{$this->color($carton->id)}} text-white justify-center text-2xl text-center  py-2 font-bold">I</div>  
                        <div class="{{$this->color($carton->id)}} text-white justify-center text-2xl text-center  py-2 font-bold">N</div>  
                        <div class="{{$this->color($carton->id)}} text-white justify-center text-2xl text-center  py-2 font-bold">G</div>  
                        <div class="{{$this->color($carton->id)}} text-white justify-center text-2xl text-center py-2 font-bold">O</div>  
                    </div>  

                    <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1 mb-1 ">  
                        @foreach (json_decode($carton->carton->content_1) as $item)
                            <div class="bg-gray-100 text-lg justify-center text-center py-2 font-bold">{{$item}}</div>  
                        @endforeach
                    </div>  

                    <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1 mb-1">  
                        @foreach (json_decode($carton->carton->content_2) as $item)
                            <div class="bg-gray-100 text-lg justify-center text-center py-2 font-bold">{{$item}}</div>  
                        @endforeach
                    </div> 

                    <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1 mb-1">  
                        @foreach (json_decode($carton->carton->content_3) as $item)
                            <div class="bg-gray-100 text-lg justify-center text-center py-2 font-bold">{{$item}}</div>  
                        @endforeach
                    </div> 

                    <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1 mb-1">  
                        @foreach (json_decode($carton->carton->content_4) as $item)
                            <div class="bg-gray-100 text-lg justify-center text-center py-2 font-bold">{{$item}}</div>  
                        @endforeach
                    </div> 

                    <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1 mb-1">  
                        @foreach (json_decode($carton->carton->content_5) as $item)
                            <div class="bg-gray-100 text-lg justify-center text-center py-2 font-bold">{{$item}}</div>  
                        @endforeach
                    </div> 

                    <div class="{{$this->color($carton->id)}} m-1 text-center  ">
                        <p class=" text-white font-semibold text-sm ">SERIAL NRO. {{$carton->carton->serial}}  </p>
                    </div>

                </div> 

                <div class="p-2 text-grey-darker text-justify flex flex-row justify-end border-t">

                    @if($carton->status_pago == 'Pago recibido')

                        <div class="mt-2">

                            <p class=" text-gray-600 font-bold text-left text-lg " > Sorteo Nro. {{$carton->sorteo->id}} </p>
                            <p class=" text-green-500 font-bold text-left text-lg " > Cartón ajuditado a usted</p>
                            

                        </div>

                    @else

                        <div class="mt-2">

                            <p class=" text-gray-600 font-bold text-left text-lg " > Sorteo Nro. {{$carton->sorteo->id}} </p>
                            <p class=" text-yellow-500 font-bold text-left text-sm " > Su pago esta siendo verificado para adjudicarle el cartón</p>
                            
                            <p class=" text-yellow-500 font-bold text-center text-lg " > Cartón reservado a usted </p>
                            

                        </div>

                    @endif
                
                </div>
            </div>

        @endforeach

    </div>

</div>
