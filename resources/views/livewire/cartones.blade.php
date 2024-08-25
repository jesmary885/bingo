
<div>
    <div class="bg-white rounded-lg shadow-lg mb-6">
        <div class="px-6 py-2 flex justify-between items-center">
            <h1 class="font-semibold text-gray-700 uppercase">CARTONES {{$tipo_cartones}}</h1>

            
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">

        <aside>
    
            <button class="text-blue-600 text-lg hover:text-green-900" wire:click="type('disponibles'}')">
                DISPONIBLES
            </button>

            <button class="text-blue-600 text-lg hover:text-green-900" wire:click="type('reservados'}')">
                RESERVADOS
            </button>

            <button class="text-blue-600 text-lg hover:text-green-900" wire:click="type('no_disponibles'}')">
                NO DISPONIBLES
            </button>
    
            
        </aside>
    
    
    
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
    
    
            @foreach ($cartones as $carton)
                <div class=" bg-{{$this->color($carton->id)}}-300 rounded-md shadow-md overflow-hidden md:max-w-xl m-2">
    
                    <div class="grid grid-cols-5 gap-0.5 justify-center m-1">  
                        <div class="bg-{{$this->color($carton->id)}}-300 text-white justify-center text-2xl text-center  py-2  font-bold">B</div>  
                        <div class="bg-{{$this->color($carton->id)}}-300 text-white justify-center text-2xl text-center  py-2 font-bold">I</div>  
                        <div class="bg-{{$this->color($carton->id)}}-300 text-white justify-center text-2xl text-center  py-2 font-bold">N</div>  
                        <div class="bg-{{$this->color($carton->id)}}-300 text-white justify-center text-2xl text-center  py-2 font-bold">G</div>  
                        <div class="bg-{{$this->color($carton->id)}}-300 text-white justify-center text-2xl text-center py-2 font-bold">O</div>  
                    </div>  
    
                    <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1 mb-1 ">  
                        @foreach (json_decode($carton->content_1) as $item)
                            <div class="bg-gray-100 text-lg justify-center text-center py-2 font-bold">{{$item}}</div>  
                        @endforeach
                    </div>  
    
                    <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1 mb-1">  
                        @foreach (json_decode($carton->content_2) as $item)
                            <div class="bg-gray-100 text-lg justify-center text-center py-2 font-bold">{{$item}}</div>  
                        @endforeach
                    </div> 
    
                    <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1 mb-1">  
                        @foreach (json_decode($carton->content_3) as $item)
                            <div class="bg-gray-100 text-lg justify-center text-center py-2 font-bold">{{$item}}</div>  
                        @endforeach
                    </div> 
    
                    <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1 mb-1">  
                        @foreach (json_decode($carton->content_4) as $item)
                            <div class="bg-gray-100 text-lg justify-center text-center py-2 font-bold">{{$item}}</div>  
                        @endforeach
                    </div> 
    
                    <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1 mb-1">  
                        @foreach (json_decode($carton->content_5) as $item)
                            <div class="bg-gray-100 text-lg justify-center text-center py-2 font-bold">{{$item}}</div>  
                        @endforeach
                    </div> 
    
                    <div class="bg-{{$this->color($carton->id)}}-300 m-1">
                        <p class=" text-white font-bold text-lg ">SERIAL NRO. {{$carton->id}}  </p>
                    </div>
    
                </div>
    
            @endforeach
    
        </div>
    
    </div>

</div>




