<div>
    @if($tipo == 'menu')
        <button type="button" wire:click="$set('open',true)" type="button" class="text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg class="w-8 h-8  text-white " xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g id="_x33_1_x2C__Search_x2C__See_x2C__Finding_x2C__Entertainment_x2C__View_x2C__Eye_x2C__Find_x2C__Tools"><g><path style="fill:#FFFFFF;" d="M450.848,61.152c66.39,66.39,66.39,174.03,0,240.41c-66.39,66.39-174.03,66.39-240.41,0    c-66.39-66.38-66.39-174.02,0-240.41C276.818-5.238,384.458-5.238,450.848,61.152z"/><circle style="fill:#9DCAFC;" cx="330.643" cy="181.357" r="130.002"/><ellipse style="fill:#FFFFFF;" cx="330.638" cy="181.362" rx="77.96" ry="45"/><path style="fill:#FFFFFF;" d="M185.688,382.882l-106.07,106.07c-15.62,15.62-40.95,15.62-56.57,0    c-7.81-7.81-11.72-18.05-11.72-28.28c0-10.24,3.91-20.48,11.72-28.29l106.07-106.07l28.28,28.29h0.01L185.688,382.882z"/><g><path style="fill:#4269A7;" d="M330.641,1.358c-99.495,0-180,80.52-180,180c0,44.731,16.214,86.966,45.849,120.011     l-39.089,39.089l-21.214-21.214c-3.905-3.904-10.238-3.904-14.142,0L15.979,425.31c-19.494,19.495-19.494,51.216,0,70.711     c19.496,19.495,51.216,19.495,70.711,0l106.066-106.065c3.904-3.906,3.903-10.238,0-14.143l-21.212-21.212l39.09-39.09     c70.59,63.223,179.481,60.932,247.287-6.873c33.997-33.998,52.721-79.2,52.721-127.279     C510.642,81.864,430.122,1.358,330.641,1.358z M72.548,481.878c-11.696,11.697-30.729,11.697-42.426,0     c-11.697-11.696-11.697-30.729,0-42.426l98.995-98.995c14.315,14.315,26.742,26.742,42.427,42.427L72.548,481.878z      M217.502,294.492c-30.218-30.219-46.86-70.398-46.86-113.134c0-88.439,71.573-160,160-160c88.44,0,160,71.574,160,160     C490.642,323.352,317.774,394.757,217.502,294.492z"/><path style="fill:#4269A7;" d="M429.637,82.363c-54.587-54.586-143.404-54.585-197.991,0c-54.72,54.72-54.71,143.279,0,197.99     c54.588,54.585,143.404,54.584,197.99,0h0C484.356,225.633,484.348,137.074,429.637,82.363z M415.495,266.211     c-46.788,46.788-122.917,46.788-169.706,0c-22.665-22.665-35.147-52.8-35.147-84.853c0-66.596,53.923-119.943,120-119.943     c66.066,0,120,53.334,120,119.943C450.642,213.411,438.159,243.546,415.495,266.211z"/><path style="fill:#4269A7;" d="M417.258,176.352c-17.837-30.837-51.026-49.993-86.616-49.993s-68.78,19.156-86.617,49.993     c-1.792,3.098-1.792,6.916,0,10.014c17.838,30.837,51.027,49.993,86.617,49.993s68.778-19.156,86.616-49.993     C419.05,183.268,419.05,179.449,417.258,176.352z M264.488,181.358c31.804-46.611,100.519-46.588,132.307,0     C364.99,227.97,296.277,227.947,264.488,181.358z"/><ellipse transform="matrix(0.9871 -0.1602 0.1602 0.9871 -72.3278 14.8532)" style="fill:#4269A7;" cx="55.964" cy="456.045" rx="9.789" ry="9.789"/><ellipse transform="matrix(0.9239 -0.3827 0.3827 0.9239 -44.5591 140.4012)" style="fill:#4269A7;" cx="330.642" cy="182.207" rx="9.789" ry="9.789"/></g></g></g><g id="Layer_1"/></svg>
        </button>
    @else

        <button type="button" wire:click="$set('open',true)" type="button" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg class="w-4 h-4 me-2 text-white " xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g id="_x31_2_x2C__Triple_Sevens_x2C__Casino_x2C__Slot_Machine_x2C__Gambler_x2C__Prize_x2C__Gambling_x2C__Coins_x2C__Seven"><g><polygon style="fill:#FFFFFF;" points="66,351 66,426 216,461.79 366,426 366,351 222.4,325.4   "/><path style="fill:#FFFFFF;" d="M66,426v35c0,22.09,17.91,40,40,40h220c22.09,0,40-17.91,40-40v-35H66z"/><circle style="fill:#FFFFFF;" cx="481" cy="61" r="20"/><polygon style="fill:#FFFFFF;" points="481,241 481,301 441,301 427.933,260.067 441,211 481,211   "/><path style="fill:#9DCAFC;" d="M381.91,101H70.09C101.21,47.2,159.38,11,226,11S350.79,47.2,381.91,101z"/><path style="fill:#9DCAFC;" d="M256,401c13.81,0,25,11.19,25,25c0,6.9-2.8,13.16-7.32,17.68C269.16,448.2,262.9,451,256,451h-80    c-13.81,0-25-11.19-25-25c0-6.9,2.8-13.16,7.32-17.68C162.84,403.8,169.1,401,176,401H256z"/><path style="fill:#FFFFFF;" d="M441,301v10c0,22.09-17.91,40-40,40h-35H66H51c-22.09,0-40-17.91-40-40V141c0-22.09,17.91-40,40-40    h19.09h311.82H401c22.09,0,40,17.91,40,40v70V301z"/><polygon style="fill:#9DCAFC;" points="281,151 293.8,220.82 281,301 171,301 151,220.82 171,151   "/><rect x="281" y="151" style="fill:#FFFFFF;" width="110" height="150"/><rect x="61" y="151" style="fill:#FFFFFF;" width="110" height="150"/><g><path style="fill:#4269A7;" d="M131,181h-30c-5.523,0-10,4.477-10,10s4.477,10,10,10h14.834l-24.026,56.061     c-2.176,5.076,0.176,10.955,5.252,13.13c5.058,2.169,10.948-0.159,13.13-5.252l30-70C143.014,188.353,138.179,181,131,181z"/><path style="fill:#4269A7;" d="M241,181h-30c-5.523,0-10,4.477-10,10s4.477,10,10,10h14.834l-24.026,56.061     c-2.176,5.076,0.176,10.955,5.252,13.13c5.058,2.169,10.948-0.159,13.13-5.252l30-70C253.014,188.353,248.179,181,241,181z"/><path style="fill:#4269A7;" d="M321,201h23.82l-32.764,65.528c-3.346,6.693,1.588,14.475,8.937,14.475     c3.668,0,7.2-2.026,8.952-5.53l40-80C373.268,188.824,368.419,181,361,181h-40c-5.523,0-10,4.477-10,10S315.477,201,321,201z"/><path style="fill:#4269A7;" d="M391,141c-9.245,0-316.619,0-330,0c-5.523,0-10,4.477-10,10v150c0,5.523,4.477,10,10,10     c9.245,0,316.619,0,330,0c5.523,0,10-4.477,10-10V151C401,145.477,396.523,141,391,141z M71,161h90v130H71V161z M181,161h90v130     h-90V161z M381,291h-90V161h90V291z"/><path style="fill:#4269A7;" d="M511,61c0-16.542-13.458-30-30-30s-30,13.458-30,30c0,13.036,8.361,24.152,20,28.28V201h-20v-60     c0-27.57-22.43-50-50-50h-13.431C354.025,36.909,294.121,1,226,1C157.92,1,97.997,36.872,64.431,91H51c-27.57,0-50,22.43-50,50     v170c0,27.57,22.43,50,50,50h5v100c0,27.57,22.43,50,50,50h220c27.57,0,50-22.43,50-50V361h25c27.57,0,50-22.43,50-50h30     c5.523,0,10-4.477,10-10c0-52.502,0-170.283,0-211.72C502.639,85.152,511,74.036,511,61z M226,21     c54.494,0,105.671,26.436,137.461,70H88.539C120.329,47.436,171.506,21,226,21z M326,491H106c-16.542,0-30-13.458-30-30v-25     h66.463c4.314,14.441,17.712,25,33.537,25h80c15.825,0,29.223-10.559,33.537-25H356v25C356,477.542,342.542,491,326,491z      M161,426c0-8.271,6.729-15,15-15h80c8.271,0,15,6.729,15,15s-6.729,15-15,15h-80C167.729,441,161,434.271,161,426z M356,416     h-66.463c-4.314-14.441-17.712-25-33.537-25h-80c-15.825,0-29.223,10.559-33.537,25H76v-55h280V416z M431,311     c0,16.542-13.458,30-30,30c-20.365,0-338.233,0-350,0c-16.542,0-30-13.458-30-30V141c0-16.542,13.458-30,30-30h350     c16.542,0,30,13.458,30,30C431,166.518,431,289.974,431,311z M471,291h-20v-70h20C471,239.912,471,278.544,471,291z M481,71     c-5.514,0-10-4.486-10-10s4.486-10,10-10s10,4.486,10,10S486.514,71,481,71z"/></g></g></g><g id="Layer_1"/></svg>
                    Fichas sorteadas
        </button>

    @endif

    


    <x-dialog-modal wire:model="open">

        <x-slot name="title">
            <div class=" flex justify-between ">
                <p>FICHAS SORTEADAS EN EL SORTEO NRO {{$sorteo}}</p>

                <button type="button" wire:click="close" wire:loading.attr="disabled"  class="py-2.5 px-3 me-2 mb-2 text-sm font-bold text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    X
                </button>
            </div>
            
        </x-slot>

        <x-slot name="content">

            <div class="w-full grid grid-cols-6 sm:grid-cols-8 gap-8  ">
                @foreach($fichas as $ficha)
                    <div class="relative h-10 w-10 ">
                        <div class=" h-16 w-16  mx-auto my-auto rounded-full bg-blue-500">
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

        </x-slot>

        <x-slot name="footer">
            <button type="button" wire:click="close" wire:loading.attr="disabled" class="text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Cerrar
            </button>
        </x-slot>

    </x-dialog-modal>
  

</div>



