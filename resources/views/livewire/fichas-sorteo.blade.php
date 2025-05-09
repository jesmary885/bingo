<div>
    @if($tipo == 'menu')
        <button type="button" wire:click="$set('open',true)" type="button" class="text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Ver
        </button>
    @else

        <button type="button" wire:click="$set('open',true)" type="button" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg class="w-4 h-4 me-2 text-white " xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g id="_x31_2_x2C__Triple_Sevens_x2C__Casino_x2C__Slot_Machine_x2C__Gambler_x2C__Prize_x2C__Gambling_x2C__Coins_x2C__Seven"><g><polygon style="fill:#FFFFFF;" points="66,351 66,426 216,461.79 366,426 366,351 222.4,325.4   "/><path style="fill:#FFFFFF;" d="M66,426v35c0,22.09,17.91,40,40,40h220c22.09,0,40-17.91,40-40v-35H66z"/><circle style="fill:#FFFFFF;" cx="481" cy="61" r="20"/><polygon style="fill:#FFFFFF;" points="481,241 481,301 441,301 427.933,260.067 441,211 481,211   "/><path style="fill:#9DCAFC;" d="M381.91,101H70.09C101.21,47.2,159.38,11,226,11S350.79,47.2,381.91,101z"/><path style="fill:#9DCAFC;" d="M256,401c13.81,0,25,11.19,25,25c0,6.9-2.8,13.16-7.32,17.68C269.16,448.2,262.9,451,256,451h-80    c-13.81,0-25-11.19-25-25c0-6.9,2.8-13.16,7.32-17.68C162.84,403.8,169.1,401,176,401H256z"/><path style="fill:#FFFFFF;" d="M441,301v10c0,22.09-17.91,40-40,40h-35H66H51c-22.09,0-40-17.91-40-40V141c0-22.09,17.91-40,40-40    h19.09h311.82H401c22.09,0,40,17.91,40,40v70V301z"/><polygon style="fill:#9DCAFC;" points="281,151 293.8,220.82 281,301 171,301 151,220.82 171,151   "/><rect x="281" y="151" style="fill:#FFFFFF;" width="110" height="150"/><rect x="61" y="151" style="fill:#FFFFFF;" width="110" height="150"/><g><path style="fill:#4269A7;" d="M131,181h-30c-5.523,0-10,4.477-10,10s4.477,10,10,10h14.834l-24.026,56.061     c-2.176,5.076,0.176,10.955,5.252,13.13c5.058,2.169,10.948-0.159,13.13-5.252l30-70C143.014,188.353,138.179,181,131,181z"/><path style="fill:#4269A7;" d="M241,181h-30c-5.523,0-10,4.477-10,10s4.477,10,10,10h14.834l-24.026,56.061     c-2.176,5.076,0.176,10.955,5.252,13.13c5.058,2.169,10.948-0.159,13.13-5.252l30-70C253.014,188.353,248.179,181,241,181z"/><path style="fill:#4269A7;" d="M321,201h23.82l-32.764,65.528c-3.346,6.693,1.588,14.475,8.937,14.475     c3.668,0,7.2-2.026,8.952-5.53l40-80C373.268,188.824,368.419,181,361,181h-40c-5.523,0-10,4.477-10,10S315.477,201,321,201z"/><path style="fill:#4269A7;" d="M391,141c-9.245,0-316.619,0-330,0c-5.523,0-10,4.477-10,10v150c0,5.523,4.477,10,10,10     c9.245,0,316.619,0,330,0c5.523,0,10-4.477,10-10V151C401,145.477,396.523,141,391,141z M71,161h90v130H71V161z M181,161h90v130     h-90V161z M381,291h-90V161h90V291z"/><path style="fill:#4269A7;" d="M511,61c0-16.542-13.458-30-30-30s-30,13.458-30,30c0,13.036,8.361,24.152,20,28.28V201h-20v-60     c0-27.57-22.43-50-50-50h-13.431C354.025,36.909,294.121,1,226,1C157.92,1,97.997,36.872,64.431,91H51c-27.57,0-50,22.43-50,50     v170c0,27.57,22.43,50,50,50h5v100c0,27.57,22.43,50,50,50h220c27.57,0,50-22.43,50-50V361h25c27.57,0,50-22.43,50-50h30     c5.523,0,10-4.477,10-10c0-52.502,0-170.283,0-211.72C502.639,85.152,511,74.036,511,61z M226,21     c54.494,0,105.671,26.436,137.461,70H88.539C120.329,47.436,171.506,21,226,21z M326,491H106c-16.542,0-30-13.458-30-30v-25     h66.463c4.314,14.441,17.712,25,33.537,25h80c15.825,0,29.223-10.559,33.537-25H356v25C356,477.542,342.542,491,326,491z      M161,426c0-8.271,6.729-15,15-15h80c8.271,0,15,6.729,15,15s-6.729,15-15,15h-80C167.729,441,161,434.271,161,426z M356,416     h-66.463c-4.314-14.441-17.712-25-33.537-25h-80c-15.825,0-29.223,10.559-33.537,25H76v-55h280V416z M431,311     c0,16.542-13.458,30-30,30c-20.365,0-338.233,0-350,0c-16.542,0-30-13.458-30-30V141c0-16.542,13.458-30,30-30h350     c16.542,0,30,13.458,30,30C431,166.518,431,289.974,431,311z M471,291h-20v-70h20C471,239.912,471,278.544,471,291z M481,71     c-5.514,0-10-4.486-10-10s4.486-10,10-10s10,4.486,10,10S486.514,71,481,71z"/></g></g></g><g id="Layer_1"/></svg>
                    Mis cartones
        </button>

    @endif

    


    <x-dialog-modal wire:model="open">

        <x-slot name="title">
            <div class=" flex justify-between ">
                <p class=" font-Allerta text-xs text-center " >MIS CARTONES Y FICHAS SORTEADAS - SORTEO NRO {{$sorteo}}</p>

                <button type="button" wire:click="close" wire:loading.attr="disabled"  class="py-2.5 px-3 me-2 mb-2 text-sm font-bold text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    X
                </button>
            </div>
            
        </x-slot>

        <x-slot name="content">

            <div class="w-full grid grid-cols-3 md:grid-cols-5 lg:grid-cols-6 gap-8 container card rounded-lg shadow-md mb-4  ">
                @foreach($fichas as $ficha)

                    <div class="bg-blue-500 w-16 h-16 mb-2  rounded-full shadow-2xl shadow-blue-500 border-white  border-dashed border-2  flex justify-center items-center ">
                        <div >
                            <p class="  text-center font-bold  text-white  mt-2">
                                {{$ficha->letra}}
                            </p>
                            <p class="  text-center font-bold  text-white ">
                                {{$ficha->numero}}
                            </p>
                        </div>
                    </div>

                @endforeach 
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2  gap-6 mx-2 ">

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


        </x-slot>

        <x-slot name="footer">
            <button type="button" wire:click="close" wire:loading.attr="disabled" class="text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Cerrar
            </button>
        </x-slot>

    </x-dialog-modal>
  

</div>



