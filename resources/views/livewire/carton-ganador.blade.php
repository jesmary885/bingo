<div>

    @if($tipo == 'menu')

        <button type="button" wire:click="$set('open',true)" type="button" class="text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
           <svg class="w-8 h-8  text-white " xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g id="_x33_1_x2C__Search_x2C__See_x2C__Finding_x2C__Entertainment_x2C__View_x2C__Eye_x2C__Find_x2C__Tools"><g><path style="fill:#FFFFFF;" d="M450.848,61.152c66.39,66.39,66.39,174.03,0,240.41c-66.39,66.39-174.03,66.39-240.41,0    c-66.39-66.38-66.39-174.02,0-240.41C276.818-5.238,384.458-5.238,450.848,61.152z"/><circle style="fill:#9DCAFC;" cx="330.643" cy="181.357" r="130.002"/><ellipse style="fill:#FFFFFF;" cx="330.638" cy="181.362" rx="77.96" ry="45"/><path style="fill:#FFFFFF;" d="M185.688,382.882l-106.07,106.07c-15.62,15.62-40.95,15.62-56.57,0    c-7.81-7.81-11.72-18.05-11.72-28.28c0-10.24,3.91-20.48,11.72-28.29l106.07-106.07l28.28,28.29h0.01L185.688,382.882z"/><g><path style="fill:#4269A7;" d="M330.641,1.358c-99.495,0-180,80.52-180,180c0,44.731,16.214,86.966,45.849,120.011     l-39.089,39.089l-21.214-21.214c-3.905-3.904-10.238-3.904-14.142,0L15.979,425.31c-19.494,19.495-19.494,51.216,0,70.711     c19.496,19.495,51.216,19.495,70.711,0l106.066-106.065c3.904-3.906,3.903-10.238,0-14.143l-21.212-21.212l39.09-39.09     c70.59,63.223,179.481,60.932,247.287-6.873c33.997-33.998,52.721-79.2,52.721-127.279     C510.642,81.864,430.122,1.358,330.641,1.358z M72.548,481.878c-11.696,11.697-30.729,11.697-42.426,0     c-11.697-11.696-11.697-30.729,0-42.426l98.995-98.995c14.315,14.315,26.742,26.742,42.427,42.427L72.548,481.878z      M217.502,294.492c-30.218-30.219-46.86-70.398-46.86-113.134c0-88.439,71.573-160,160-160c88.44,0,160,71.574,160,160     C490.642,323.352,317.774,394.757,217.502,294.492z"/><path style="fill:#4269A7;" d="M429.637,82.363c-54.587-54.586-143.404-54.585-197.991,0c-54.72,54.72-54.71,143.279,0,197.99     c54.588,54.585,143.404,54.584,197.99,0h0C484.356,225.633,484.348,137.074,429.637,82.363z M415.495,266.211     c-46.788,46.788-122.917,46.788-169.706,0c-22.665-22.665-35.147-52.8-35.147-84.853c0-66.596,53.923-119.943,120-119.943     c66.066,0,120,53.334,120,119.943C450.642,213.411,438.159,243.546,415.495,266.211z"/><path style="fill:#4269A7;" d="M417.258,176.352c-17.837-30.837-51.026-49.993-86.616-49.993s-68.78,19.156-86.617,49.993     c-1.792,3.098-1.792,6.916,0,10.014c17.838,30.837,51.027,49.993,86.617,49.993s68.778-19.156,86.616-49.993     C419.05,183.268,419.05,179.449,417.258,176.352z M264.488,181.358c31.804-46.611,100.519-46.588,132.307,0     C364.99,227.97,296.277,227.947,264.488,181.358z"/><ellipse transform="matrix(0.9871 -0.1602 0.1602 0.9871 -72.3278 14.8532)" style="fill:#4269A7;" cx="55.964" cy="456.045" rx="9.789" ry="9.789"/><ellipse transform="matrix(0.9239 -0.3827 0.3827 0.9239 -44.5591 140.4012)" style="fill:#4269A7;" cx="330.642" cy="182.207" rx="9.789" ry="9.789"/></g></g></g><g id="Layer_1"/></svg>
        </button>
    @else

        <button type="button" wire:click="$set('open',true)" type="button" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg class="w-4 h-4 me-2 text-white "  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g id="_x32_1_x2C__Bingo_x2C__Lottery_x2C__Bet_x2C__Bingo_x2C__Gambling_x2C__Gaming_x2C__Card_x2C__Check"><g><path style="fill:#FFFFFF;" d="M501,41v430c0,16.57-13.43,30-30,30H41c-16.57,0-30-13.43-30-30V41c0-16.57,13.43-30,30-30h430    C487.57,11,501,24.43,501,41z"/><polygon style="fill:#FFFFFF;" points="456,261 456,311 431,320.867 406,311 397,286.6 406,261   "/><polygon style="fill:#FFFFFF;" points="356,261 365.4,286.2 356,311 331,318.733 306,311 295.8,287.8 306,261   "/><polygon style="fill:#FFFFFF;" points="256,261 261.8,286.2 256,311 231,323 206,311 198.6,286.6 206,261   "/><polygon style="fill:#FFFFFF;" points="156,261 161.8,284.2 156,311 131,318.733 106,311 100.6,286.6 106,261   "/><polygon style="fill:#FFFFFF;" points="406,261 406,311 381,320.867 356,311 356,261   "/><polygon style="fill:#FFFFFF;" points="306,261 306,311 281,320.867 256,311 256,261   "/><polygon style="fill:#FFFFFF;" points="206,261 206,311 181,318.733 156,311 156,261   "/><polygon style="fill:#FFFFFF;" points="106,261 106,311 81,318.733 56,311 56,261   "/><polygon style="fill:#FFFFFF;" points="456,310.835 456,360.835 431,370.702 406,360.835 397,336.435 406,310.835   "/><polygon style="fill:#FFFFFF;" points="356,310.835 365.4,336.035 356,360.835 331,368.568 306,360.835 295.8,337.635     306,310.835   "/><polygon style="fill:#FFFFFF;" points="256,310.835 261.8,336.035 256,360.835 231,372.835 206,360.835 198.6,336.435     206,310.835   "/><polygon style="fill:#FFFFFF;" points="156,310.835 161.8,334.035 156,360.835 131,368.568 106,360.835 100.6,336.435     106,310.835   "/><polygon style="fill:#FFFFFF;" points="406,310.835 406,360.835 381,370.702 356,360.835 356,310.835   "/><polygon style="fill:#FFFFFF;" points="306,310.835 306,360.835 281,370.702 256,360.835 256,310.835   "/><polygon style="fill:#FFFFFF;" points="206,310.835 206,360.835 181,368.568 156,360.835 156,310.835   "/><polygon style="fill:#FFFFFF;" points="106,310.835 106,360.835 81,368.568 56,360.835 56,310.835   "/><polygon style="fill:#FFFFFF;" points="456,360.67 456,410.67 431,420.537 406,410.67 397,386.27 406,360.67   "/><polygon style="fill:#FFFFFF;" points="356,360.67 365.4,385.87 356,410.67 331,418.403 306,410.67 295.8,387.47 306,360.67   "/><polygon style="fill:#FFFFFF;" points="256,360.67 261.8,385.87 256,410.67 231,422.67 206,410.67 198.6,386.27 206,360.67   "/><polygon style="fill:#FFFFFF;" points="156,360.67 161.8,383.87 156,410.67 131,418.403 106,410.67 100.6,386.27 106,360.67   "/><polygon style="fill:#FFFFFF;" points="406,360.67 406,410.67 381,420.537 356,410.67 356,360.67   "/><polygon style="fill:#FFFFFF;" points="306,360.67 306,410.67 281,420.537 256,410.67 256,360.67   "/><polygon style="fill:#FFFFFF;" points="206,360.67 206,410.67 181,418.403 156,410.67 156,360.67   "/><polygon style="fill:#FFFFFF;" points="106,360.67 106,410.67 81,418.403 56,410.67 56,360.67   "/><polygon style="fill:#FFFFFF;" points="456,410.505 456,460.505 406,460.505 397,436.105 406,410.505   "/><polygon style="fill:#FFFFFF;" points="356,410.505 365.4,435.705 356,460.505 306,460.505 295.8,437.305 306,410.505   "/><polygon style="fill:#FFFFFF;" points="256,410.505 261.8,435.705 256,460.505 206,460.505 198.6,436.105 206,410.505   "/><polygon style="fill:#FFFFFF;" points="156,410.505 161.8,433.705 156,460.505 106,460.505 100.6,436.105 106,410.505   "/><rect x="356" y="410.505" style="fill:#FFFFFF;" width="50" height="50"/><rect x="256" y="410.505" style="fill:#FFFFFF;" width="50" height="50"/><rect x="156" y="410.505" style="fill:#FFFFFF;" width="50" height="50"/><rect x="56" y="410.505" style="fill:#FFFFFF;" width="50" height="50"/><rect x="81" y="171" style="fill:#9DCAFC;" width="350" height="50"/><g><path style="fill:#4269A7;" d="M471,1H41C18.944,1,1,18.944,1,41v430c0,22.056,17.944,40,40,40h430c22.056,0,40-17.944,40-40V41     C511,18.944,493.056,1,471,1z M491,471c0,11.028-8.972,20-20,20H41c-11.028,0-20-8.972-20-20V41c0-11.028,8.972-20,20-20h430     c11.028,0,20,8.972,20,20V471z"/><path style="fill:#4269A7;" d="M61,141h20c16.542,0,30-13.458,30-30c0-7.678-2.902-14.688-7.663-20     C108.098,85.688,111,78.678,111,71c0-16.542-13.458-30-30-30H61c-5.523,0-10,4.477-10,10c0,9.679,0,70.257,0,80     C51,136.523,55.477,141,61,141z M81,121H71v-20h10c5.514,0,10,4.486,10,10S86.514,121,81,121z M91,71c0,5.514-4.486,10-10,10H71     V61h10C86.514,61,91,65.486,91,71z"/><path style="fill:#4269A7;" d="M141,141c5.523,0,10-4.477,10-10V51c0-5.523-4.477-10-10-10s-10,4.477-10,10v80     C131,136.523,135.477,141,141,141z"/><path style="fill:#4269A7;" d="M181,141c5.523,0,10-4.477,10-10V85.868l31.52,50.432c2.379,3.807,6.976,5.535,11.237,4.313     c4.288-1.229,7.243-5.151,7.243-9.612V51c0-5.523-4.477-10-10-10s-10,4.477-10,10v45.132L189.48,45.7     c-2.364-3.783-6.948-5.543-11.237-4.313C173.955,42.617,171,46.539,171,51v80C171,136.523,175.477,141,181,141z"/><path style="fill:#4269A7;" d="M311,141h20c5.523,0,10-4.477,10-10V91c0-5.523-4.477-10-10-10h-20c-5.523,0-10,4.477-10,10     s4.477,10,10,10h10v20h-10c-16.542,0-30-13.458-30-30s13.458-30,30-30h20c5.523,0,10-4.477,10-10s-4.477-10-10-10h-20     c-27.57,0-50,22.43-50,50S283.43,141,311,141z"/><path style="fill:#4269A7;" d="M411,141c27.57,0,50-22.43,50-50s-22.43-50-50-50s-50,22.43-50,50S383.43,141,411,141z M411,61     c16.542,0,30,13.458,30,30s-13.458,30-30,30s-30-13.458-30-30S394.458,61,411,61z"/><path style="fill:#4269A7;" d="M81,161c-5.523,0-10,4.477-10,10v50c0,5.523,4.477,10,10,10h350c5.523,0,10-4.477,10-10v-50     c0-5.523-4.477-10-10-10H81z M421,211H91v-30h330V211z"/><path style="fill:#4269A7;" d="M456,251c-310.093,0-39.145,0-400,0c-5.523,0-10,4.477-10,10c0,17.6,0,173.464,0,200     c0,5.523,4.477,10,10,10c146.31,0,253.183,0,400,0c5.523,0,10-4.477,10-10c0-17.6,0-173.464,0-200     C466,255.477,461.523,251,456,251z M446,351h-30v-30h30V351z M396,351h-30v-30h30V351z M346,351h-30v-30h30V351z M296,351h-30     v-30h30V351z M246,351h-30v-30h30V351z M196,351h-30v-30h30V351z M146,351h-30v-30h30V351z M96,351H66v-30h30V351z M66,371h30v30     H66V371z M116,371h30v30h-30V371z M166,371h30v30h-30V371z M216,371h30v30h-30V371z M266,371h30v30h-30V371z M316,371h30v30h-30     V371z M366,371h30v30h-30V371z M416,371h30v30h-30V371z M446,301h-30v-30h30V301z M396,301h-30v-30h30V301z M346,301h-30v-30h30     V301z M296,301h-30v-30h30V301z M246,301h-30v-30h30V301z M196,301h-30v-30h30V301z M146,301h-30v-30h30V301z M66,271h30v30H66     V271z M66,421h30v30H66V421z M116,421h30v30h-30V421z M166,421h30v30h-30V421z M216,421h30v30h-30V421z M266,421h30v30h-30V421z      M316,421h30v30h-30V421z M366,421h30v30h-30V421z M446,451h-30v-30h30V451z"/></g></g></g><g id="Layer_1"/></svg>
                Cartones ganadores
        </button>
    @endif


    <x-dialog-modal wire:model="open">

        <x-slot name="title">
            <div class=" flex justify-between ">

                <p>CARTONES GANADORES DEL SORTEO NRO {{$sorteo}}</p>

                <button type="button" wire:click="close" wire:loading.attr="disabled"  class="py-2.5 px-3 me-2 mb-2 text-sm font-bold text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    X
                </button>





            </div>
            
        </x-slot>

        <x-slot name="content">


            <div class="grid grid-cols-2 sm:grid-cols-2  gap-6 mx-2 ">

                @foreach ($ganadores_sorteo as $carton)
    
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
                                    <div class=" {{$this->background($item)}} bg-gray-100 font-bold text-lg justify-center text-center py-2 text-black ">  {{$item}}  </div>
                                @endforeach
                            </div>
    
                            <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1 mb-1">
                                @foreach (json_decode($carton->carton->content_2) as $item)
                                    <div class=" {{$this->background($item)}} bg-gray-100  text-lg justify-center text-center py-2 font-bold text-black">{{$item}} </div>
                                @endforeach
                            </div>
    
                            <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1 mb-1">
                                @foreach (json_decode($carton->carton->content_3) as $item)
                                    <div class=" {{$this->background($item)}} bg-gray-100  text-lg justify-center text-center py-2 font-bold text-black">{{$item}} </div>
                                @endforeach
                            </div>
    
                            <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1 mb-1">
                                @foreach (json_decode($carton->carton->content_4) as $item)
                                    <div class=" {{$this->background($item)}} bg-gray-100 text-lg justify-center text-center py-2 font-bold text-black">{{$item}} </div>
                                @endforeach
                            </div>
    
                            <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1 mb-1">
                                @foreach (json_decode($carton->carton->content_5) as $item)
                                    <div class=" {{$this->background($item)}} bg-gray-100 text-lg justify-center text-center py-2 font-bold text-black">{{$item}}</div>
                                @endforeach
                            </div>

                            {{$this->imagen($carton->id)}}

                            <div class="bg-blue-600 m-1 text-center">
                                <p class=" text-white font-semibold text-sm ">CARTON NRO. {{$carton->carton->id}}  </p>
                                <p class="text-white font-semibold text-sm " >Ganador categoria : {{$carton->type}} </p>
                                <p class="text-white font-semibold text-sm " >Usuario ganador : {{ $carton->user->name }} </p>
                                <p class="text-white font-semibold text-sm " >Premio : {{ $carton->premio }} $  (Bs. {{$carton->premio * $dolar_hoy}})</p>

                                @if($carton->lugar == 'Primero')

                                    <p class="text-white font-semibold text-sm " > PRIMER LUGAR </p>
                                @else
                                    <p class="text-white font-semibold text-sm " > SEGUNDO LUGAR </p>

                                @endif

                             
       
                            </div>
    
                        </div>
                    </div>
    
                   
                @endforeach
    
            </div>

        </x-slot>

        <x-slot name="footer">

            <button type="button" wire:click="close" wire:loading.attr="disabled" class="text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Cerrar
            </button>



      

        </x-slot>

    </x-dialog-modal>
  

</div>

