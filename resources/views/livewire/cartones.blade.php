
<div>
    <div class="bg-white rounded-lg shadow-lg mb-6">
        <div class="px-6 py-2 flex justify-between items-center">
            <h1 class="font-semibold text-gray-700 uppercase">CARTONES {{$tipo_cartones}}</h1>

            
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">

        <aside>

            <ul class="divide-y divide-gray-200">
                <li class="py-2 text-sm text-center">
                    <a class="cursor-pointer hover:text-orange-500 capitalize }}"
                        wire:click="type('disponibles')"
                    >DISPONIBLES
                    </a>
                </li>

                <li class="py-2 text-sm text-center">
                    <a class="cursor-pointer hover:text-orange-500 capitalize }}"
                        wire:click="type('reservados')"
                    >RESERVADOS
                    </a>
                </li>

                <li class="py-2 text-sm text-center">
                    <a class="cursor-pointer hover:text-orange-500 capitalize }}"
                        wire:click="type('no_disponibles')"
                    >NO DISPONIBLES
                    </a>
                </li>

            </ul>


    
            
        </aside>



            @foreach ($cartones as $carton)
       
            
                <div class=" bg-blue-300 rounded-md shadow-md overflow-hidden md:max-w-xl m-2">
    
                    <div class="grid grid-cols-5 gap-0.5 justify-center m-1">  
                        <div class="bg-blue-300 text-white justify-center text-2xl text-center  py-2  font-bold">B</div>  
                        <div class="bg-blue-300 text-white justify-center text-2xl text-center  py-2 font-bold">I</div>  
                        <div class="bg-blue-300 text-white justify-center text-2xl text-center  py-2 font-bold">N</div>  
                        <div class="bg-blue-300 text-white justify-center text-2xl text-center  py-2 font-bold">G</div>  
                        <div class="bg-blue-300 text-white justify-center text-2xl text-center py-2 font-bold">O</div>  
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
    
                    <div class="bg-blue-300 m-1">
                        <p class=" text-white font-bold text-lg ">SERIAL NRO. {{$carton->id}}  </p>
                    </div>
    
                </div> 
     

            @endforeach

     
    
    
    
        
    
    
    

           
    
       
    
    </div>

</div>




