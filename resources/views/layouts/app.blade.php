<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
 
        <style>
            body{
                position: relative;
                padding-bottom: 11em;
                /*LE COLOCO 14EM PORQUE EL FOOTER MIDE APROXIMADAMENTE 215 PX QUE CONVIRTIENDOLO A EM DAN COMO 13EM SE LE SUMA UNO MAS Y ASI ME DA ESPACIO PARA COLOCAR EL CONTENIDO QUE ES LARGO */
                min-height: 100vh;
            }
      
            #footer {
                position: absolute;
                bottom: 0;
                height: 152px;
                width: 100%;
            }
        </style>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">


        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="stylesheet" href="{{ asset('vendor/FlexSlider/flexslider.css') }}">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Arima:wght@100..700&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Edu+AU+VIC+WA+NT+Dots:wght@400..700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Allerta+Stencil&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.tailgrids.com/tailgrids-fallback.css" />

    
        <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.15.1/css/pro.min.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
      
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">


        {{-- <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>  --}}

        <!-- Scripts -->
     {{-- <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">  --}}

   

        
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


        @livewireStyles
        @livewireScripts
        <script src="{{ mix('js/app.js') }}" defer></script> 



      
        {{-- confetti --}}

        <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.4.0/dist/confetti.browser.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.0.1/tailwind.min.css" rel="stylesheet" />


        <script src="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.7.7/glider.min.js" integrity="sha512-tHimK/KZS+o34ZpPNOvb/bTHZb6ocWFXCtdGqAlWYUcz+BGHbNbHMKvEHUyFxgJhQcEO87yg5YqaJvyQgAEEtA==" crossorigin="anonymous"></script>
        <script src="{{ mix('js/app.js') }}" defer></script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script src="{{ asset('vendor/FlexSlider/jquery.flexslider-min.js') }}"></script>

        {{-- FlexSlider --}}
        <script src="{{ asset('vendor/FlexSlider/jquery.flexslider-min.js') }}"></script>


    </head>
    <body >
        <x-banner />

        <div class="bg-white" >
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            <!-- Foooter -->
            <footer class="bg-black text-white bottom-0 " id="footer">
                <div class="max-w-screen-xl  mx-auto space-y-8 overflow-hidden pt-4 ">
                    <nav class=" items-center flex flex-wrap justify-center -mx-5 -my-2">
                        
                        <div class="px-2 py-2 flex justify-center">
                            <a href="{{route('politica_privacidad')}}" class="font-Arima text-xs md:text-base  hover:text-gray-300">
                                Política de Privacidad
                            </a>
                        </div>
    
                       
    
                        <div class="px-2 py-2 flex justify-center">
                            <a href="{{route('condiciones_servicio')}}" class="font-Arima text-xs  md:text-base   hover:text-gray-300">
                                Condiciones de Servicio
                            </a>
                        </div>

                        <div class="px-2 py-2 flex justify-center">
                            <a href="#" class="font-Arima text-xs  md:text-base   hover:text-gray-300">
                                Contacto
                            </a>
                        </div>
                     
                    </nav>
                    <div class="flex justify-center mt-8 space-x-6 font-Arima">
                        <a href="#" class=" hover:text-gray-300">
                            <span class="sr-only">Facebook</span>
                            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="#" class=" hover:text-gray-300">
                            <span class="sr-only">Instagram</span>
                            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="#" class=" hover:text-gray-300">
                            <span class="sr-only">Twitter</span>
                            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
                            </svg>
                        </a>
                    
                    </div>
                    <p class="mt-8 font-Arima text-xs  md:text-base  text-center text-gray-400">
                        Derechos de autor © 2024 BING+
                    </p>
                </div>
            </footer>
        </div>

        @stack('modals')

        

        @stack('script')

        <script>
            livewire.on('confirm', (ms,item1,item2,ms2) => {
                Swal.fire({
                title: ms,
                text: "",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si'
                }).then((result) => {
                if (result.isConfirmed) {
                            livewire.emitTo(item1,item2)
                            Swal.fire(
                            '',
                            ms2,
                            'success'
                            )
                    }
                })
            })
        </script>
        


    </body>
</html>
