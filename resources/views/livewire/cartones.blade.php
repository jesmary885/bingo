
<div>

    <figure class="">
        <img class="w-full h-80 object-cover object-center"  src="{{ Storage::url('img/comprar_cartones.jpg') }}" alt="">
    </figure>

    <div class=" bg-white pt-2 pb-4 shadow-lg mb-1 ">

        <div class="max-w-2xl mx-auto">
            <label for="default-search" class=" text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Search</label>
            <div class="relative">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input wire:model.defer="search" type="search" id="default-search" class=" focus:outline-none focus:ring focus:border-blue-500 block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Escribe el Nro del cartón a buscar..." required>
        
                <button wire:click="search_" type="submit" wire class="text-white absolute right-1 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buscar</button>

                @if($ver_todos_act == 1)
                    <button wire:click="ver_todos" type="submit" class="text-white absolute right-20  bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ver todos los cartones</button>
                @endif
            </div>

            

            
  
        </div>

        <!-- Creacte By Joker Banny -->


    </div>


    <div class="px-4  ">
        <div class="bg-white rounded-lg shadow-lg mb-6">
            <div class="px-6 py-2 flex justify-between items-center">
                <h1 class="font-semibold text-sm md:text-lg text-gray-700 uppercase">CARTONES {{$tipo_cartones}}</h1>

                <div class=" flex justify-center mt-1 ">

                    <button
                    class=" btn-sm middle none center mr-1 rounded-lg bg-blue-500 py-1 px-2 font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                    data-ripple-light="true"
                  >
                    Disponibles
                  </button>
    
                  <button
                    class="middle none center mr-1 rounded-lg bg-red-500 py-1 px-2 font-sans text-xs font-bold uppercase text-white shadow-md shadow-red-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                    data-ripple-light="true"
                    >
                    No disponibles
                    </button>
    
                    <button
                    class="middle none center rounded-lg bg-yellow-500 py-1 px-2 font-sans text-xs font-bold uppercase text-white shadow-md shadow-yellow-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                    data-ripple-light="true"
                    >
                    Reservados
                    </button>
    
    
    
                </div>
    
            </div>
        </div>


        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    

        @foreach ($cartones as $carton)

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

                @if($carton->status_carton == 'Disponible')

                <button wire:click="add_cart('{{$carton->carton->id}}')" type="button" class="text-white  bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                    <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
                    <path d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z"/>
                    </svg>
                    Comprar
                </button>

                @elseif($carton->status_carton == 'Reservado')

                <div class="mt-2">
                    
                    <p class=" text-yellow-500 font-bold text-center text-lg " > Cartón reservado </p>

                </div>

                @else

                <div class="mt-2">

                    <p class=" text-red-500 font-bold text-center text-lg " > Cartón no disponible </p>

                </div>


                @endif
            
             </div>
        </div>
           
                

        @endforeach
    
         
        
        
        
            
        
        
        
    
               
        
           
        
        </div>

    </div>



    

</div>




