<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

            </div>

            

            

            <div class="hidden sm:flex sm:items-center sm:ml-6">

                <a href="{{ route('billetera.index') }}">

                    <div class="bg-green-100 text-green-800 text-xs font-medium mr-4 px-2.5 py-1 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400 flex  ">
                        <p class="mr-1">Billetera:</p>  
                        
                        @livewire('saldo-usuario')
                    </div>
                </a>

               

                <div>
                    @livewire('dropdown-cart')
                </div>
                
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="ml-3 relative">
                        <x-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('Team Settings') }}
                                    </x-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-dropdown-link>
                                    @endcan

                                    <div class="border-t border-gray-200"></div>

                                    <!-- Team Switcher -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Switch Teams') }}
                                    </div>

                                    @foreach (Auth::user()->allTeams() as $team)
                                        <x-switchable-team :team="$team" />
                                    @endforeach
                                </div>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endif

                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">

                            @if(auth()->user()->roles->first()->id == 1)

                                <x-dropdown-link class="flex" href="{{ route('home_admin') }}" :active="request()->routeIs('profile.show')">

                                    <svg height="18" class=" mr-3"  width="18" data-name="Layer 1" id="Layer_1" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg"><defs><style>
                                        .cls-1 {
                                        fill: #e7ecef;
                                        }
                                
                                        .cls-2 {
                                        fill: #8b8c89;
                                        }
                                
                                        .cls-3 {
                                        fill: #bc6c25;
                                        }
                                
                                        .cls-4 {
                                        fill: #a3cef1;
                                        }
                                
                                        .cls-5 {
                                        fill: #dda15e;
                                        }
                                
                                        .cls-6 {
                                        fill: #6096ba;
                                        }
                                
                                        .cls-7 {
                                        fill: #274c77;
                                        }
                                    </style></defs><path class="cls-6" d="M35,25.5c0,1.66-1.34,3-3,3s-3-1.34-3-3h-3c-5.52,0-10,4.48-10,10v4H48v-4c0-5.52-4.48-10-10-10h-3Z"/><path class="cls-5" d="M36.58,22.54l-3,1.29c-1.01,.43-2.15,.43-3.15,0l-3-1.29c-1.47-.63-2.42-2.08-2.42-3.68v-5.36c0-3.31,2.69-6,6-6h2c3.31,0,6,2.69,6,6v5.36c0,1.6-.95,3.05-2.42,3.68Z"/><path class="cls-7" d="M22,15.23c-.29,.17-.64,.27-1,.27-1.1,0-2-.9-2-2s.9-2,2-2c.42,0,.81,.13,1.14,.36"/><path class="cls-7" d="M42,15.23c.29,.17,.64,.27,1,.27,1.1,0,2-.9,2-2s-.9-2-2-2c-.42,0-.81,.13-1.14,.36"/><path class="cls-3" d="M35,25.5c0,1.66-1.34,3-3,3s-3-1.34-3-3v-2.29l1.42,.61c1.01,.44,2.15,.44,3.16,0l1.42-.61v2.29Z"/><path class="cls-7" d="M16,37.09c-.61,.26-1.29,.41-2,.41-2.76,0-5-2.24-5-5s2.24-5,5-5c1.64,0,3.09,.79,4,2.01,.67-.91,1.5-1.69,2.44-2.32-.25-.1-.48-.25-.68-.45-.49-.48-.67-1.15-.57-1.78-1.04-.72-2.24-1.22-3.53-1.46-.37,.52-.97,.86-1.66,.86s-1.29-.34-1.66-.86c-1.29,.24-2.49,.74-3.53,1.46,.1,.63-.08,1.3-.57,1.78-.48,.49-1.15,.67-1.78,.57-.72,1.04-1.22,2.24-1.46,3.53,.52,.37,.86,.97,.86,1.66s-.34,1.29-.86,1.66c.24,1.29,.74,2.49,1.46,3.53,.63-.1,1.3,.08,1.78,.57,.49,.48,.67,1.15,.57,1.78,1.04,.72,2.24,1.22,3.53,1.46,.37-.52,.97-.86,1.66-.86s1.29,.34,1.66,.86c1.29-.24,2.49-.74,3.53-1.46-.03-.18-.03-.36-.01-.54h-3.18v-2.41Z"/><path class="cls-7" d="M46,29.51c.91-1.22,2.36-2.01,4-2.01,2.76,0,5,2.24,5,5s-2.24,5-5,5c-.71,0-1.39-.15-2-.41v2.41h-3.18c.02,.18,.02,.36-.01,.54,1.04,.72,2.24,1.22,3.53,1.46,.37-.52,.97-.86,1.66-.86s1.29,.34,1.66,.86c1.29-.24,2.49-.74,3.53-1.46-.1-.63,.08-1.3,.57-1.78,.48-.49,1.15-.67,1.78-.57,.72-1.04,1.22-2.24,1.46-3.53-.52-.37-.86-.97-.86-1.66s.34-1.29,.86-1.66c-.24-1.29-.74-2.49-1.46-3.53-.63,.1-1.3-.08-1.78-.57-.49-.48-.67-1.15-.57-1.78-1.04-.72-2.24-1.22-3.53-1.46-.37,.52-.97,.86-1.66,.86s-1.29-.34-1.66-.86c-1.29,.24-2.49,.74-3.53,1.46,.1,.63-.08,1.3-.57,1.78-.2,.2-.43,.35-.68,.45,.94,.63,1.77,1.41,2.44,2.32Z"/><path class="cls-2" d="M19.18,39.5c-.02,.18-.02,.36,.01,.54-1.04,.72-2.24,1.22-3.53,1.46-.37-.51-.96-.85-1.64-.86-.01,.03-.02,.06-.02,.09,1.06,.48,1.79,1.54,1.79,2.77s-.73,2.29-1.79,2.77c.2,1.33,.55,2.61,1.02,3.83,1.16-.11,2.33,.43,2.95,1.5,.61,1.07,.5,2.36-.18,3.31,.83,1.03,1.77,1.97,2.8,2.8,.95-.68,2.24-.79,3.31-.18,1.07,.62,1.61,1.79,1.5,2.95,1.22,.47,2.5,.82,3.83,1.02,.48-1.06,1.54-1.79,2.77-1.79s2.29,.73,2.77,1.79c1.33-.2,2.61-.55,3.83-1.02-.11-1.16,.43-2.33,1.5-2.95,1.07-.61,2.36-.5,3.31,.18,1.03-.83,1.97-1.77,2.8-2.8-.68-.95-.79-2.24-.18-3.31,.62-1.07,1.79-1.61,2.95-1.5,.47-1.22,.82-2.5,1.02-3.83-1.06-.48-1.79-1.54-1.79-2.77s.73-2.29,1.79-2.77c0-.03-.01-.06-.02-.09-.68,.01-1.27,.35-1.64,.86-1.29-.24-2.49-.74-3.53-1.46,.03-.18,.03-.36,.01-.54h-1.51c.45,1.25,.69,2.6,.69,4,0,6.63-5.37,12-12,12s-12-5.37-12-12c0-1.4,.24-2.75,.69-4h-1.51Z"/><path class="cls-4" d="M43.31,39.5c.45,1.25,.69,2.6,.69,4,0,6.63-5.37,12-12,12s-12-5.37-12-12c0-1.4,.24-2.75,.69-4"/><path class="cls-4" d="M18,29.51c-1.26,1.67-2,3.74-2,5.99v1.59c-.61,.26-1.29,.41-2,.41-2.76,0-5-2.24-5-5s2.24-5,5-5c1.64,0,3.09,.79,4,2.01Z"/><path class="cls-4" d="M48,37.09v-1.59c0-2.25-.74-4.32-2-5.99,.91-1.22,2.36-2.01,4-2.01,2.76,0,5,2.24,5,5s-2.24,5-5,5c-.71,0-1.39-.15-2-.41Z"/><path class="cls-7" d="M39,13.5c-.52-.65-1.03-1.19-1.52-1.62-1.92-1.72-4.78-1.49-6.7,.24-2.31,2.08-5.79,1.39-5.79,1.39,0-3.31,2.69-6,6-6h2c3.31,0,6,2.69,6,6Z"/><path class="cls-1" d="M39,18.1v-4.6c0-3.31-2.69-6-6-6h-2c-3.31,0-6,2.69-6,6v4h-2c-.55,0-1-.45-1-1v-3c0-5.52,4.48-10,10-10,2.76,0,5.26,1.12,7.07,2.93s2.93,4.31,2.93,7.07v3.18c0,.48-.34,.89-.8,.98l-2.2,.44Z"/><path class="cls-6" d="M32,19.5h0c-.11-.54,.24-1.07,.78-1.18l8.22-1.64v-2.86c0-4.79-3.61-8.98-8.38-9.3-5.24-.35-9.62,3.81-9.62,8.98v3h2v2h-2c-1.1,0-2-.9-2-2v-2.68c0-5.72,4.24-10.74,9.94-11.27,6.54-.62,12.06,4.53,12.06,10.95v3.18c0,.95-.67,1.77-1.61,1.96l-8.22,1.64c-.54,.11-1.07-.24-1.18-.78Z"/></svg>
                
                                
                                Administración
                                </x-dropdown-link>

                                <div class="border-t border-gray-200"></div>

                            @endif


                            <x-dropdown-link class="flex" href="{{ route('mis-cartones') }}">

                                <svg height="18" class=" mr-3"  width="18" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g id="_x32_1_x2C__Bingo_x2C__Lottery_x2C__Bet_x2C__Bingo_x2C__Gambling_x2C__Gaming_x2C__Card_x2C__Check"><g><path style="fill:#FFFFFF;" d="M501,41v430c0,16.57-13.43,30-30,30H41c-16.57,0-30-13.43-30-30V41c0-16.57,13.43-30,30-30h430    C487.57,11,501,24.43,501,41z"/><polygon style="fill:#FFFFFF;" points="456,261 456,311 431,320.867 406,311 397,286.6 406,261   "/><polygon style="fill:#FFFFFF;" points="356,261 365.4,286.2 356,311 331,318.733 306,311 295.8,287.8 306,261   "/><polygon style="fill:#FFFFFF;" points="256,261 261.8,286.2 256,311 231,323 206,311 198.6,286.6 206,261   "/><polygon style="fill:#FFFFFF;" points="156,261 161.8,284.2 156,311 131,318.733 106,311 100.6,286.6 106,261   "/><polygon style="fill:#FFFFFF;" points="406,261 406,311 381,320.867 356,311 356,261   "/><polygon style="fill:#FFFFFF;" points="306,261 306,311 281,320.867 256,311 256,261   "/><polygon style="fill:#FFFFFF;" points="206,261 206,311 181,318.733 156,311 156,261   "/><polygon style="fill:#FFFFFF;" points="106,261 106,311 81,318.733 56,311 56,261   "/><polygon style="fill:#FFFFFF;" points="456,310.835 456,360.835 431,370.702 406,360.835 397,336.435 406,310.835   "/><polygon style="fill:#FFFFFF;" points="356,310.835 365.4,336.035 356,360.835 331,368.568 306,360.835 295.8,337.635     306,310.835   "/><polygon style="fill:#FFFFFF;" points="256,310.835 261.8,336.035 256,360.835 231,372.835 206,360.835 198.6,336.435     206,310.835   "/><polygon style="fill:#FFFFFF;" points="156,310.835 161.8,334.035 156,360.835 131,368.568 106,360.835 100.6,336.435     106,310.835   "/><polygon style="fill:#FFFFFF;" points="406,310.835 406,360.835 381,370.702 356,360.835 356,310.835   "/><polygon style="fill:#FFFFFF;" points="306,310.835 306,360.835 281,370.702 256,360.835 256,310.835   "/><polygon style="fill:#FFFFFF;" points="206,310.835 206,360.835 181,368.568 156,360.835 156,310.835   "/><polygon style="fill:#FFFFFF;" points="106,310.835 106,360.835 81,368.568 56,360.835 56,310.835   "/><polygon style="fill:#FFFFFF;" points="456,360.67 456,410.67 431,420.537 406,410.67 397,386.27 406,360.67   "/><polygon style="fill:#FFFFFF;" points="356,360.67 365.4,385.87 356,410.67 331,418.403 306,410.67 295.8,387.47 306,360.67   "/><polygon style="fill:#FFFFFF;" points="256,360.67 261.8,385.87 256,410.67 231,422.67 206,410.67 198.6,386.27 206,360.67   "/><polygon style="fill:#FFFFFF;" points="156,360.67 161.8,383.87 156,410.67 131,418.403 106,410.67 100.6,386.27 106,360.67   "/><polygon style="fill:#FFFFFF;" points="406,360.67 406,410.67 381,420.537 356,410.67 356,360.67   "/><polygon style="fill:#FFFFFF;" points="306,360.67 306,410.67 281,420.537 256,410.67 256,360.67   "/><polygon style="fill:#FFFFFF;" points="206,360.67 206,410.67 181,418.403 156,410.67 156,360.67   "/><polygon style="fill:#FFFFFF;" points="106,360.67 106,410.67 81,418.403 56,410.67 56,360.67   "/><polygon style="fill:#FFFFFF;" points="456,410.505 456,460.505 406,460.505 397,436.105 406,410.505   "/><polygon style="fill:#FFFFFF;" points="356,410.505 365.4,435.705 356,460.505 306,460.505 295.8,437.305 306,410.505   "/><polygon style="fill:#FFFFFF;" points="256,410.505 261.8,435.705 256,460.505 206,460.505 198.6,436.105 206,410.505   "/><polygon style="fill:#FFFFFF;" points="156,410.505 161.8,433.705 156,460.505 106,460.505 100.6,436.105 106,410.505   "/><rect x="356" y="410.505" style="fill:#FFFFFF;" width="50" height="50"/><rect x="256" y="410.505" style="fill:#FFFFFF;" width="50" height="50"/><rect x="156" y="410.505" style="fill:#FFFFFF;" width="50" height="50"/><rect x="56" y="410.505" style="fill:#FFFFFF;" width="50" height="50"/><rect x="81" y="171" style="fill:#9DCAFC;" width="350" height="50"/><g><path style="fill:#4269A7;" d="M471,1H41C18.944,1,1,18.944,1,41v430c0,22.056,17.944,40,40,40h430c22.056,0,40-17.944,40-40V41     C511,18.944,493.056,1,471,1z M491,471c0,11.028-8.972,20-20,20H41c-11.028,0-20-8.972-20-20V41c0-11.028,8.972-20,20-20h430     c11.028,0,20,8.972,20,20V471z"/><path style="fill:#4269A7;" d="M61,141h20c16.542,0,30-13.458,30-30c0-7.678-2.902-14.688-7.663-20     C108.098,85.688,111,78.678,111,71c0-16.542-13.458-30-30-30H61c-5.523,0-10,4.477-10,10c0,9.679,0,70.257,0,80     C51,136.523,55.477,141,61,141z M81,121H71v-20h10c5.514,0,10,4.486,10,10S86.514,121,81,121z M91,71c0,5.514-4.486,10-10,10H71     V61h10C86.514,61,91,65.486,91,71z"/><path style="fill:#4269A7;" d="M141,141c5.523,0,10-4.477,10-10V51c0-5.523-4.477-10-10-10s-10,4.477-10,10v80     C131,136.523,135.477,141,141,141z"/><path style="fill:#4269A7;" d="M181,141c5.523,0,10-4.477,10-10V85.868l31.52,50.432c2.379,3.807,6.976,5.535,11.237,4.313     c4.288-1.229,7.243-5.151,7.243-9.612V51c0-5.523-4.477-10-10-10s-10,4.477-10,10v45.132L189.48,45.7     c-2.364-3.783-6.948-5.543-11.237-4.313C173.955,42.617,171,46.539,171,51v80C171,136.523,175.477,141,181,141z"/><path style="fill:#4269A7;" d="M311,141h20c5.523,0,10-4.477,10-10V91c0-5.523-4.477-10-10-10h-20c-5.523,0-10,4.477-10,10     s4.477,10,10,10h10v20h-10c-16.542,0-30-13.458-30-30s13.458-30,30-30h20c5.523,0,10-4.477,10-10s-4.477-10-10-10h-20     c-27.57,0-50,22.43-50,50S283.43,141,311,141z"/><path style="fill:#4269A7;" d="M411,141c27.57,0,50-22.43,50-50s-22.43-50-50-50s-50,22.43-50,50S383.43,141,411,141z M411,61     c16.542,0,30,13.458,30,30s-13.458,30-30,30s-30-13.458-30-30S394.458,61,411,61z"/><path style="fill:#4269A7;" d="M81,161c-5.523,0-10,4.477-10,10v50c0,5.523,4.477,10,10,10h350c5.523,0,10-4.477,10-10v-50     c0-5.523-4.477-10-10-10H81z M421,211H91v-30h330V211z"/><path style="fill:#4269A7;" d="M456,251c-310.093,0-39.145,0-400,0c-5.523,0-10,4.477-10,10c0,17.6,0,173.464,0,200     c0,5.523,4.477,10,10,10c146.31,0,253.183,0,400,0c5.523,0,10-4.477,10-10c0-17.6,0-173.464,0-200     C466,255.477,461.523,251,456,251z M446,351h-30v-30h30V351z M396,351h-30v-30h30V351z M346,351h-30v-30h30V351z M296,351h-30     v-30h30V351z M246,351h-30v-30h30V351z M196,351h-30v-30h30V351z M146,351h-30v-30h30V351z M96,351H66v-30h30V351z M66,371h30v30     H66V371z M116,371h30v30h-30V371z M166,371h30v30h-30V371z M216,371h30v30h-30V371z M266,371h30v30h-30V371z M316,371h30v30h-30     V371z M366,371h30v30h-30V371z M416,371h30v30h-30V371z M446,301h-30v-30h30V301z M396,301h-30v-30h30V301z M346,301h-30v-30h30     V301z M296,301h-30v-30h30V301z M246,301h-30v-30h30V301z M196,301h-30v-30h30V301z M146,301h-30v-30h30V301z M66,271h30v30H66     V271z M66,421h30v30H66V421z M116,421h30v30h-30V421z M166,421h30v30h-30V421z M216,421h30v30h-30V421z M266,421h30v30h-30V421z      M316,421h30v30h-30V421z M366,421h30v30h-30V421z M446,451h-30v-30h30V451z"/></g></g></g><g id="Layer_1"/></svg>


                              
                                Mis cartones
                            </x-dropdown-link>

                            <x-dropdown-link class="flex" href="{{ route('mis-cartones') }}">

                                <svg height="18" class=" mr-3"  width="18" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g id="_x34_3_x2C__Trophy_x2C__Competition_x2C__Sports_and_Competition_x2C__Winner_x2C__Award_x2C__Star_x2C__Prize_x2C__Best"><g><path style="fill:#FFFFFF;" d="M351.39,431.67v30.17L254.2,471l-93.59-9.16v-30.17c0-5.52,4.48-10,10-10h20.12L256,410.6    l65.27,11.07h20.12C346.91,421.67,351.39,426.15,351.39,431.67z"/><polygon style="fill:#FFFFFF;" points="220.86,306.44 220.86,351.39 256,368.2 291.14,351.39 291.14,306.44   "/><path style="fill:#9DCAFC;" d="M321.27,371.39v50.28H190.73v-50.28c0-11.05,8.96-20,20-20h10.13h70.28h10.13    C312.31,351.39,321.27,360.34,321.27,371.39z"/><path style="fill:#9DCAFC;" d="M391.55,471.84V492c0,5.52-4.48,10-10,10h-251.1c-5.52,0-10-4.48-10-10v-20.16    c0-5.53,4.48-10,10-10h30.16h190.78h30.16C387.07,461.84,391.55,466.31,391.55,471.84z"/><path style="fill:#FFFFFF;" d="M376.57,230.77c-15.23,36.65-46.7,64.86-85.43,75.67c-11.18,3.11-22.97,4.78-35.14,4.78    c-12.17,0-23.96-1.67-35.14-4.78c-38.73-10.81-70.2-39.02-85.43-75.67c-0.8-1.93-1.56-3.88-2.27-5.85    c-0.71-1.97-1.37-3.97-1.99-5.98c-0.31-1.01-0.6-2.02-0.89-3.04c-0.28-1.02-0.56-2.04-0.82-3.07c-0.62-2.45-1.17-4.93-1.65-7.43    c-0.13-0.65-0.25-1.3-0.36-1.95c-0.09-0.53-0.18-1.06-0.27-1.59c-0.08-0.53-0.17-1.06-0.25-1.59c-0.16-1.07-0.31-2.14-0.44-3.21    c-0.07-0.53-0.13-1.07-0.19-1.61c-0.11-0.92-0.2-1.85-0.28-2.78c-0.07-0.7-0.13-1.39-0.18-2.09c-0.08-1.09-0.15-2.18-0.2-3.28    c-0.02-0.23-0.03-0.45-0.03-0.67c-0.04-0.76-0.07-1.53-0.09-2.29c-0.03-1.21-0.05-2.43-0.05-3.65V90.33V50.16L262.2,31    l124.33,19.16v40.17v90.36c0,1.22-0.02,2.44-0.05,3.65c-0.02,0.76-0.05,1.53-0.09,2.29c0,0.22-0.01,0.44-0.03,0.67    c-0.05,1.1-0.12,2.19-0.2,3.28c-0.05,0.7-0.11,1.39-0.18,2.09c-0.08,0.93-0.17,1.86-0.28,2.78c-0.06,0.54-0.12,1.08-0.19,1.61    c-0.13,1.07-0.28,2.14-0.44,3.21c-0.08,0.53-0.17,1.06-0.25,1.59c-0.09,0.53-0.18,1.06-0.27,1.59c-0.11,0.65-0.23,1.3-0.36,1.95    c-0.48,2.5-1.03,4.98-1.65,7.43c-0.26,1.03-0.54,2.05-0.82,3.07c-0.29,1.02-0.58,2.03-0.89,3.04c-0.62,2.01-1.28,4.01-1.99,5.98    S377.37,228.84,376.57,230.77z"/><polygon style="fill:#FFFFFF;" points="324.58,165.21 282.2,196.01 298.39,245.84 256,215.04 213.61,245.84 229.8,196.01     187.42,165.21 239.81,165.21 256,115.39 272.19,165.21   "/><path style="fill:#FFFFFF;" d="M386.53,10c11.09,0,20.08,8.99,20.08,20.08c0,5.54-2.25,10.56-5.88,14.2    c-3.63,3.63-8.65,5.88-14.2,5.88H125.47c-11.09,0-20.08-8.99-20.08-20.08c0-5.54,2.25-10.56,5.88-14.2    c3.63-3.63,8.65-5.88,14.2-5.88H386.53z"/><g><path style="fill:#4269A7;" d="M383.257,240.269c55.781-5.9,98.62-52.972,98.62-109.779c0-27.66-22.504-50.164-50.164-50.164     H396.53V58.448c11.685-4.132,20.082-15.284,20.082-28.365C416.612,13.495,403.117,0,386.53,0H125.469     c-16.587,0-30.082,13.495-30.082,30.082c0,13.082,8.397,24.234,20.082,28.365v21.879H80.285     c-27.66,0-50.163,22.504-50.163,50.164c0,56.806,42.839,103.879,98.619,109.779c16.153,34.366,45.818,61.173,82.115,73.518     v27.601h-0.122c-16.542,0-30,13.458-30,30v40.286h-10.123c-11.028,0-20,8.972-20,20v20.163h-20.163c-11.028,0-20,8.972-20,20V492     c0,11.028,8.972,20,20,20h251.102c11.028,0,20-8.972,20-20v-20.163c0-11.028-8.972-20-20-20h-20.163v-20.163     c0-11.028-8.972-20-20-20h-10.122v-40.286c0-16.542-13.458-30-30-30h-0.123v-27.601     C337.439,301.442,367.104,274.635,383.257,240.269z M431.714,100.326c16.633,0,30.164,13.531,30.164,30.164     c0,42.992-29.96,79.18-70.555,88.23c6.75-24.017,5.177-33.359,5.207-118.395H431.714z M125.469,20H386.53     c5.56,0,10.082,4.522,10.082,10.082c0,5.559-4.522,10.081-10.082,10.081H125.469c-5.559,0-10.082-4.522-10.082-10.081     C115.387,24.522,119.91,20,125.469,20z M120.677,218.721c-40.595-9.051-70.554-45.238-70.554-88.23     c0-16.633,13.531-30.164,30.163-30.164h35.184C115.499,187.092,114.046,195.137,120.677,218.721z M135.625,186.867     c-0.229-4.522-0.156,0.862-0.156-126.704H376.53c0,127.61,0.075,122.385-0.169,126.906     C373.036,250.578,320.323,301.225,256,301.225C191.348,301.225,138.777,250.138,135.625,186.867z M381.551,492H130.449v-20.163     c20.084,0,243.165,0,251.102,0V492z M341.387,451.837H170.612v-20.163c39.944,0,137.261,0,170.775,0V451.837z M311.265,371.388     v40.286H200.735v-40.286c0-5.514,4.486-10,10-10h90.531C306.779,361.388,311.265,365.874,311.265,371.388z M281.142,341.388     h-50.286v-22.419c16.575,3.006,33.678,3.012,50.286,0V341.388z"/><path style="fill:#4269A7;" d="M292.508,253.927c3.506,2.547,8.25,2.547,11.756,0c3.505-2.546,4.972-7.06,3.633-11.18     l-13.944-42.918l36.508-26.524c3.505-2.546,4.972-7.06,3.633-11.18s-5.179-6.91-9.511-6.91h-45.126l-13.945-42.917     c-1.339-4.121-5.179-6.91-9.511-6.91c-4.333,0-8.172,2.79-9.511,6.91l-13.945,42.917h-45.126c-4.332,0-8.172,2.79-9.511,6.91     c-1.338,4.12,0.128,8.634,3.633,11.18l36.508,26.524l-13.945,42.918c-1.338,4.12,0.128,8.634,3.633,11.18     c3.505,2.546,8.25,2.548,11.756,0L256,227.402L292.508,253.927z M250.122,206.952l-17.487,12.704l6.68-20.557     c1.338-4.12-0.128-8.634-3.633-11.18l-17.487-12.705h21.615c4.332,0,8.172-2.79,9.511-6.91L256,147.748l6.68,20.557     c1.339,4.121,5.179,6.91,9.511,6.91h21.614l-17.486,12.705c-3.505,2.546-4.972,7.06-3.633,11.18l6.68,20.558l-17.487-12.705     C258.372,204.405,253.627,204.405,250.122,206.952z"/></g></g></g><g id="Layer_1"/></svg>
                                Resultado de sorteos
                            </x-dropdown-link>

                            

                            <x-dropdown-link class="flex " href="{{ route('jugar') }}">

                                <svg height="20" class=" mr-3"  width="20" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g id="_x31_2_x2C__Triple_Sevens_x2C__Casino_x2C__Slot_Machine_x2C__Gambler_x2C__Prize_x2C__Gambling_x2C__Coins_x2C__Seven"><g><polygon style="fill:#FFFFFF;" points="66,351 66,426 216,461.79 366,426 366,351 222.4,325.4   "/><path style="fill:#FFFFFF;" d="M66,426v35c0,22.09,17.91,40,40,40h220c22.09,0,40-17.91,40-40v-35H66z"/><circle style="fill:#FFFFFF;" cx="481" cy="61" r="20"/><polygon style="fill:#FFFFFF;" points="481,241 481,301 441,301 427.933,260.067 441,211 481,211   "/><path style="fill:#9DCAFC;" d="M381.91,101H70.09C101.21,47.2,159.38,11,226,11S350.79,47.2,381.91,101z"/><path style="fill:#9DCAFC;" d="M256,401c13.81,0,25,11.19,25,25c0,6.9-2.8,13.16-7.32,17.68C269.16,448.2,262.9,451,256,451h-80    c-13.81,0-25-11.19-25-25c0-6.9,2.8-13.16,7.32-17.68C162.84,403.8,169.1,401,176,401H256z"/><path style="fill:#FFFFFF;" d="M441,301v10c0,22.09-17.91,40-40,40h-35H66H51c-22.09,0-40-17.91-40-40V141c0-22.09,17.91-40,40-40    h19.09h311.82H401c22.09,0,40,17.91,40,40v70V301z"/><polygon style="fill:#9DCAFC;" points="281,151 293.8,220.82 281,301 171,301 151,220.82 171,151   "/><rect x="281" y="151" style="fill:#FFFFFF;" width="110" height="150"/><rect x="61" y="151" style="fill:#FFFFFF;" width="110" height="150"/><g><path style="fill:#4269A7;" d="M131,181h-30c-5.523,0-10,4.477-10,10s4.477,10,10,10h14.834l-24.026,56.061     c-2.176,5.076,0.176,10.955,5.252,13.13c5.058,2.169,10.948-0.159,13.13-5.252l30-70C143.014,188.353,138.179,181,131,181z"/><path style="fill:#4269A7;" d="M241,181h-30c-5.523,0-10,4.477-10,10s4.477,10,10,10h14.834l-24.026,56.061     c-2.176,5.076,0.176,10.955,5.252,13.13c5.058,2.169,10.948-0.159,13.13-5.252l30-70C253.014,188.353,248.179,181,241,181z"/><path style="fill:#4269A7;" d="M321,201h23.82l-32.764,65.528c-3.346,6.693,1.588,14.475,8.937,14.475     c3.668,0,7.2-2.026,8.952-5.53l40-80C373.268,188.824,368.419,181,361,181h-40c-5.523,0-10,4.477-10,10S315.477,201,321,201z"/><path style="fill:#4269A7;" d="M391,141c-9.245,0-316.619,0-330,0c-5.523,0-10,4.477-10,10v150c0,5.523,4.477,10,10,10     c9.245,0,316.619,0,330,0c5.523,0,10-4.477,10-10V151C401,145.477,396.523,141,391,141z M71,161h90v130H71V161z M181,161h90v130     h-90V161z M381,291h-90V161h90V291z"/><path style="fill:#4269A7;" d="M511,61c0-16.542-13.458-30-30-30s-30,13.458-30,30c0,13.036,8.361,24.152,20,28.28V201h-20v-60     c0-27.57-22.43-50-50-50h-13.431C354.025,36.909,294.121,1,226,1C157.92,1,97.997,36.872,64.431,91H51c-27.57,0-50,22.43-50,50     v170c0,27.57,22.43,50,50,50h5v100c0,27.57,22.43,50,50,50h220c27.57,0,50-22.43,50-50V361h25c27.57,0,50-22.43,50-50h30     c5.523,0,10-4.477,10-10c0-52.502,0-170.283,0-211.72C502.639,85.152,511,74.036,511,61z M226,21     c54.494,0,105.671,26.436,137.461,70H88.539C120.329,47.436,171.506,21,226,21z M326,491H106c-16.542,0-30-13.458-30-30v-25     h66.463c4.314,14.441,17.712,25,33.537,25h80c15.825,0,29.223-10.559,33.537-25H356v25C356,477.542,342.542,491,326,491z      M161,426c0-8.271,6.729-15,15-15h80c8.271,0,15,6.729,15,15s-6.729,15-15,15h-80C167.729,441,161,434.271,161,426z M356,416     h-66.463c-4.314-14.441-17.712-25-33.537-25h-80c-15.825,0-29.223,10.559-33.537,25H76v-55h280V416z M431,311     c0,16.542-13.458,30-30,30c-20.365,0-338.233,0-350,0c-16.542,0-30-13.458-30-30V141c0-16.542,13.458-30,30-30h350     c16.542,0,30,13.458,30,30C431,166.518,431,289.974,431,311z M471,291h-20v-70h20C471,239.912,471,278.544,471,291z M481,71     c-5.514,0-10-4.486-10-10s4.486-10,10-10s10,4.486,10,10S486.514,71,481,71z"/></g></g></g><g id="Layer_1"/></svg>

                              
                                Jugar
                            </x-dropdown-link>

                            <x-dropdown-link class="flex" href="{{ route('profile.show') }}">

                                <svg height="18" class=" mr-3"  width="18"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g id="_x30_3_x2C__Big_Bag_Of_Coins_x2C__Money_x2C__Coin_x2C__Bank_x2C__Banking_x2C__Currency_x2C__Business_x2C__Dollar_Symbol"><g><path style="fill:#9DCAFC;" d="M330.998,11.014l-40,60l-30,10.4l-30-10.4l-40-60c19.48,6.49,44.74,9.74,70,9.74    C286.258,20.754,311.518,17.504,330.998,11.014z"/><path style="fill:#FFFFFF;" d="M320.998,111.014l-56-13.6l-74,13.6c-97.57,61.49-147.65,176.77-124.98,289.85    c1.68,8.36,3.58,16.7,5.71,24.99c11.34,44.23,51.2,75.16,96.86,75.16h174.82c22.83,0,44.21-7.73,61.3-20.99    c17.09-13.27,29.89-32.05,35.56-54.17c2.13-8.29,4.03-16.63,5.71-24.99C468.648,287.784,418.568,172.504,320.998,111.014z"/><path style="fill:#9DCAFC;" d="M340.998,71.014c11.05,0,20,8.95,20,20c0,5.52-2.24,10.52-5.86,14.14    c-3.62,3.62-8.62,5.86-14.14,5.86h-20h-45h-30h-55h-10c-11.05,0-20-8.95-20-20c0-5.52,2.24-10.52,5.86-14.14    c3.62-3.62,8.62-5.86,14.14-5.86h50h60H340.998z"/><g><path style="fill:#4269A7;" d="M350.405,119.495c11.947-3.956,20.593-15.225,20.593-28.481c0-16.542-13.458-30-30-30h-31.315     l29.635-44.453c5.272-7.906-2.481-18.035-11.482-15.034c-36.855,12.285-96.82,12.285-133.676,0     c-9.014-3.006-16.746,7.14-11.482,15.034l29.635,44.453h-31.315c-16.542,0-30,13.458-30,30c0,10.815,5.753,20.309,14.359,25.589     C77.487,182.996,34.403,294.036,56.216,402.827c1.708,8.517,3.667,17.099,5.823,25.508     c12.482,48.68,56.298,82.679,106.553,82.679h174.813c50.254,0,94.07-33.999,106.553-82.679     c2.155-8.406,4.115-16.987,5.823-25.508C477.317,295.414,435.605,186.092,350.405,119.495z M213.568,26.841     c29.791,5.222,65.07,5.222,94.861,0l-22.782,34.173H236.35L213.568,26.841z M180.998,81.014c18.206,0,134.574,0,160,0     c5.514,0,10,4.486,10,10s-4.486,10-10,10c-6.708,0-153.145,0-160,0c-5.514,0-10-4.486-10-10S175.484,81.014,180.998,81.014z      M436.171,398.895c-1.64,8.174-3.519,16.408-5.587,24.472c-10.213,39.829-46.063,67.646-87.18,67.646H168.592     c-41.118,0-76.967-27.817-87.18-67.646c-2.068-8.067-3.948-16.3-5.586-24.472c-21.48-107.131,25.945-218.414,118.113-277.882     h27.917l-32.929,32.929c-3.905,3.905-3.905,10.237,0,14.143c3.905,3.905,10.238,3.905,14.143,0l47.071-47.071h21.715     l47.071,47.071c3.906,3.905,10.237,3.905,14.143,0c3.905-3.905,3.905-10.237,0-14.143l-32.929-32.929h17.917     C410.225,180.481,457.649,291.765,436.171,398.895z"/><path style="fill:#4269A7;" d="M144.548,210.758c-4.66-2.966-10.841-1.593-13.806,3.066     C96.401,267.777,83.966,332.701,96.414,394.77c1.092,5.445,6.388,8.92,11.771,7.838c5.415-1.086,8.924-6.356,7.838-11.771     c-11.47-57.196-0.25-116.247,31.591-166.274C150.58,219.905,149.207,213.723,144.548,210.758z"/><path style="fill:#4269A7;" d="M243.624,279.497c-9.504-9.503-9.504-24.968,0-34.471c9.526-9.527,24.945-9.526,34.471,0     c3.906,3.906,10.236,3.906,14.143,0c3.905-3.905,3.905-10.237,0-14.142c-7.361-7.361-16.655-11.585-26.239-12.698v-22.172     c0-5.523-4.478-10-10-10c-5.523,0-10,4.477-10,10v24.422c-30.532,10.839-39.605,50.115-16.517,73.204l38.891,38.891     c14.662,14.661,5.024,39.168-13.553,41.342c-8.02,1.152-15.549-1.502-20.917-6.871c-3.905-3.905-10.237-3.905-14.143,0     c-3.905,3.905-3.905,10.237,0,14.143c7.361,7.361,16.655,11.585,26.239,12.697v22.172c0,5.523,4.477,10,10,10     c5.522,0,10-4.477,10-10v-24.422c30.406-10.794,39.753-49.966,16.517-73.204L243.624,279.497z"/></g></g></g><g id="Layer_1"/></svg>

                               
                                Billetera
                            </x-dropdown-link>
                            
                            <x-dropdown-link class="flex" href="{{ route('profile.show') }}">

                                <svg height="18" class=" mr-3"  width="18"  id="svg1630" version="1.1" viewBox="0 0 6.3499999 6.3500002" width="24" xmlns="http://www.w3.org/2000/svg" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:svg="http://www.w3.org/2000/svg"><defs id="defs1624"/><g id="layer1"><path d="M 2.1172531,3.4397435 C 1.322787,3.4395919 0.52903671,3.9687583 0.52916671,4.762137 v 0.5879475 c 0,0.2827154 0.1942445,0.4707488 0.52936249,0.4707488 h 4.2329423 c 0.3323546,0 0.5293618,-0.204039 0.5293618,-0.4707488 V 4.762137 C 5.8207038,3.9687583 5.0269538,3.4395919 4.2327475,3.4397435 Z" id="path1955" style="color:#000000;font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:medium;line-height:normal;font-family:sans-serif;font-variant-ligatures:normal;font-variant-position:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-alternates:normal;font-variant-east-asian:normal;font-feature-settings:normal;font-variation-settings:normal;text-indent:0;text-align:start;text-decoration:none;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000000;letter-spacing:normal;word-spacing:normal;text-transform:none;writing-mode:lr-tb;direction:ltr;text-orientation:mixed;dominant-baseline:auto;baseline-shift:baseline;text-anchor:start;white-space:normal;shape-padding:0;shape-margin:0;inline-size:0;clip-rule:nonzero;display:inline;overflow:visible;visibility:visible;isolation:auto;mix-blend-mode:normal;color-interpolation:sRGB;color-interpolation-filters:linearRGB;solid-color:#000000;solid-opacity:1;vector-effect:none;fill:#3771c8;fill-opacity:1;fill-rule:nonzero;stroke:none;stroke-width:0.529225;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1;color-rendering:auto;image-rendering:auto;shape-rendering:auto;text-rendering:auto;enable-background:accumulate;stop-color:#000000"/><path d="M 3.1658929,0.52917505 C 2.4783575,0.53418705 1.9182516,1.098532 1.9182703,1.7860675 c -4e-7,0.6910289 0.5658787,1.2568932 1.2569253,1.2568927 0.6910467,5e-7 1.2569261,-0.5658638 1.2569256,-1.2568927 4e-7,-0.6906772 -0.5653238,-1.25631766 -1.2558919,-1.25689245 -0.00305,-1.114e-5 -0.00625,-1.114e-5 -0.0093,0 a 0.26464234,0.26463543 0 0 0 -0.00103,0 z" id="path1947" style="color:#000000;font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:medium;line-height:normal;font-family:sans-serif;font-variant-ligatures:normal;font-variant-position:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-alternates:normal;font-variant-east-asian:normal;font-feature-settings:normal;font-variation-settings:normal;text-indent:0;text-align:start;text-decoration:none;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000000;letter-spacing:normal;word-spacing:normal;text-transform:none;writing-mode:lr-tb;direction:ltr;text-orientation:mixed;dominant-baseline:auto;baseline-shift:baseline;text-anchor:start;white-space:normal;shape-padding:0;shape-margin:0;inline-size:0;clip-rule:nonzero;display:inline;overflow:visible;visibility:visible;isolation:auto;mix-blend-mode:normal;color-interpolation:sRGB;color-interpolation-filters:linearRGB;solid-color:#000000;solid-opacity:1;vector-effect:none;fill:#87aade;fill-opacity:1;fill-rule:nonzero;stroke:none;stroke-width:0.529225;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1;color-rendering:auto;image-rendering:auto;shape-rendering:auto;text-rendering:auto;enable-background:accumulate;stop-color:#000000"/></g></svg>
                                Perfil
                            </x-dropdown-link>

                           

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-dropdown-link>
                            @endif

                            <div class="border-t border-gray-200"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-dropdown-link class="flex" href="{{ route('logout') }}"
                                         @click.prevent="$root.submit();">

                                         <svg height="18" class=" mr-3"  width="18" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><defs><style>.cls-1{fill:#d8e1ef;}.cls-2{fill:#0593ff;}</style></defs><title/><g id="out"><rect class="cls-1" height="26" rx="4" ry="4" width="20" x="2" y="3"/><path class="cls-2" d="M29.71,15.29l-4-4a1,1,0,0,0-1.42,1.42L26.59,15H12a1,1,0,0,0,0,2H26.59l-2.3,2.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l4-4A1,1,0,0,0,29.71,15.29Z"/></g></svg>
                                    Cerrar sesión
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
 

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
           

            <div >

                @if(auth()->user()->roles->first()->id == 1)

                    <x-responsive-nav-link class="flex" href="{{ route('home_admin') }}" :active="request()->routeIs('profile.show')">

                        <svg height="18" class=" mr-3"  width="18" data-name="Layer 1" id="Layer_1" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg"><defs><style>
                            .cls-1 {
                            fill: #e7ecef;
                            }
                    
                            .cls-2 {
                            fill: #8b8c89;
                            }
                    
                            .cls-3 {
                            fill: #bc6c25;
                            }
                    
                            .cls-4 {
                            fill: #a3cef1;
                            }
                    
                            .cls-5 {
                            fill: #dda15e;
                            }
                    
                            .cls-6 {
                            fill: #6096ba;
                            }
                    
                            .cls-7 {
                            fill: #274c77;
                            }
                        </style></defs><path class="cls-6" d="M35,25.5c0,1.66-1.34,3-3,3s-3-1.34-3-3h-3c-5.52,0-10,4.48-10,10v4H48v-4c0-5.52-4.48-10-10-10h-3Z"/><path class="cls-5" d="M36.58,22.54l-3,1.29c-1.01,.43-2.15,.43-3.15,0l-3-1.29c-1.47-.63-2.42-2.08-2.42-3.68v-5.36c0-3.31,2.69-6,6-6h2c3.31,0,6,2.69,6,6v5.36c0,1.6-.95,3.05-2.42,3.68Z"/><path class="cls-7" d="M22,15.23c-.29,.17-.64,.27-1,.27-1.1,0-2-.9-2-2s.9-2,2-2c.42,0,.81,.13,1.14,.36"/><path class="cls-7" d="M42,15.23c.29,.17,.64,.27,1,.27,1.1,0,2-.9,2-2s-.9-2-2-2c-.42,0-.81,.13-1.14,.36"/><path class="cls-3" d="M35,25.5c0,1.66-1.34,3-3,3s-3-1.34-3-3v-2.29l1.42,.61c1.01,.44,2.15,.44,3.16,0l1.42-.61v2.29Z"/><path class="cls-7" d="M16,37.09c-.61,.26-1.29,.41-2,.41-2.76,0-5-2.24-5-5s2.24-5,5-5c1.64,0,3.09,.79,4,2.01,.67-.91,1.5-1.69,2.44-2.32-.25-.1-.48-.25-.68-.45-.49-.48-.67-1.15-.57-1.78-1.04-.72-2.24-1.22-3.53-1.46-.37,.52-.97,.86-1.66,.86s-1.29-.34-1.66-.86c-1.29,.24-2.49,.74-3.53,1.46,.1,.63-.08,1.3-.57,1.78-.48,.49-1.15,.67-1.78,.57-.72,1.04-1.22,2.24-1.46,3.53,.52,.37,.86,.97,.86,1.66s-.34,1.29-.86,1.66c.24,1.29,.74,2.49,1.46,3.53,.63-.1,1.3,.08,1.78,.57,.49,.48,.67,1.15,.57,1.78,1.04,.72,2.24,1.22,3.53,1.46,.37-.52,.97-.86,1.66-.86s1.29,.34,1.66,.86c1.29-.24,2.49-.74,3.53-1.46-.03-.18-.03-.36-.01-.54h-3.18v-2.41Z"/><path class="cls-7" d="M46,29.51c.91-1.22,2.36-2.01,4-2.01,2.76,0,5,2.24,5,5s-2.24,5-5,5c-.71,0-1.39-.15-2-.41v2.41h-3.18c.02,.18,.02,.36-.01,.54,1.04,.72,2.24,1.22,3.53,1.46,.37-.52,.97-.86,1.66-.86s1.29,.34,1.66,.86c1.29-.24,2.49-.74,3.53-1.46-.1-.63,.08-1.3,.57-1.78,.48-.49,1.15-.67,1.78-.57,.72-1.04,1.22-2.24,1.46-3.53-.52-.37-.86-.97-.86-1.66s.34-1.29,.86-1.66c-.24-1.29-.74-2.49-1.46-3.53-.63,.1-1.3-.08-1.78-.57-.49-.48-.67-1.15-.57-1.78-1.04-.72-2.24-1.22-3.53-1.46-.37,.52-.97,.86-1.66,.86s-1.29-.34-1.66-.86c-1.29,.24-2.49,.74-3.53,1.46,.1,.63-.08,1.3-.57,1.78-.2,.2-.43,.35-.68,.45,.94,.63,1.77,1.41,2.44,2.32Z"/><path class="cls-2" d="M19.18,39.5c-.02,.18-.02,.36,.01,.54-1.04,.72-2.24,1.22-3.53,1.46-.37-.51-.96-.85-1.64-.86-.01,.03-.02,.06-.02,.09,1.06,.48,1.79,1.54,1.79,2.77s-.73,2.29-1.79,2.77c.2,1.33,.55,2.61,1.02,3.83,1.16-.11,2.33,.43,2.95,1.5,.61,1.07,.5,2.36-.18,3.31,.83,1.03,1.77,1.97,2.8,2.8,.95-.68,2.24-.79,3.31-.18,1.07,.62,1.61,1.79,1.5,2.95,1.22,.47,2.5,.82,3.83,1.02,.48-1.06,1.54-1.79,2.77-1.79s2.29,.73,2.77,1.79c1.33-.2,2.61-.55,3.83-1.02-.11-1.16,.43-2.33,1.5-2.95,1.07-.61,2.36-.5,3.31,.18,1.03-.83,1.97-1.77,2.8-2.8-.68-.95-.79-2.24-.18-3.31,.62-1.07,1.79-1.61,2.95-1.5,.47-1.22,.82-2.5,1.02-3.83-1.06-.48-1.79-1.54-1.79-2.77s.73-2.29,1.79-2.77c0-.03-.01-.06-.02-.09-.68,.01-1.27,.35-1.64,.86-1.29-.24-2.49-.74-3.53-1.46,.03-.18,.03-.36,.01-.54h-1.51c.45,1.25,.69,2.6,.69,4,0,6.63-5.37,12-12,12s-12-5.37-12-12c0-1.4,.24-2.75,.69-4h-1.51Z"/><path class="cls-4" d="M43.31,39.5c.45,1.25,.69,2.6,.69,4,0,6.63-5.37,12-12,12s-12-5.37-12-12c0-1.4,.24-2.75,.69-4"/><path class="cls-4" d="M18,29.51c-1.26,1.67-2,3.74-2,5.99v1.59c-.61,.26-1.29,.41-2,.41-2.76,0-5-2.24-5-5s2.24-5,5-5c1.64,0,3.09,.79,4,2.01Z"/><path class="cls-4" d="M48,37.09v-1.59c0-2.25-.74-4.32-2-5.99,.91-1.22,2.36-2.01,4-2.01,2.76,0,5,2.24,5,5s-2.24,5-5,5c-.71,0-1.39-.15-2-.41Z"/><path class="cls-7" d="M39,13.5c-.52-.65-1.03-1.19-1.52-1.62-1.92-1.72-4.78-1.49-6.7,.24-2.31,2.08-5.79,1.39-5.79,1.39,0-3.31,2.69-6,6-6h2c3.31,0,6,2.69,6,6Z"/><path class="cls-1" d="M39,18.1v-4.6c0-3.31-2.69-6-6-6h-2c-3.31,0-6,2.69-6,6v4h-2c-.55,0-1-.45-1-1v-3c0-5.52,4.48-10,10-10,2.76,0,5.26,1.12,7.07,2.93s2.93,4.31,2.93,7.07v3.18c0,.48-.34,.89-.8,.98l-2.2,.44Z"/><path class="cls-6" d="M32,19.5h0c-.11-.54,.24-1.07,.78-1.18l8.22-1.64v-2.86c0-4.79-3.61-8.98-8.38-9.3-5.24-.35-9.62,3.81-9.62,8.98v3h2v2h-2c-1.1,0-2-.9-2-2v-2.68c0-5.72,4.24-10.74,9.94-11.27,6.54-.62,12.06,4.53,12.06,10.95v3.18c0,.95-.67,1.77-1.61,1.96l-8.22,1.64c-.54,.11-1.07-.24-1.18-.78Z"/></svg>

                    
                    Administración
                    </x-responsive-nav-link>

                    <div class="border-t border-gray-200"></div>

                @endif

             

                <x-responsive-nav-link class="flex" href="{{ route('mis-cartones') }}" :active="request()->routeIs('profile.show')">

                     <svg height="18" class=" mr-3"  width="18" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g id="_x32_1_x2C__Bingo_x2C__Lottery_x2C__Bet_x2C__Bingo_x2C__Gambling_x2C__Gaming_x2C__Card_x2C__Check"><g><path style="fill:#FFFFFF;" d="M501,41v430c0,16.57-13.43,30-30,30H41c-16.57,0-30-13.43-30-30V41c0-16.57,13.43-30,30-30h430    C487.57,11,501,24.43,501,41z"/><polygon style="fill:#FFFFFF;" points="456,261 456,311 431,320.867 406,311 397,286.6 406,261   "/><polygon style="fill:#FFFFFF;" points="356,261 365.4,286.2 356,311 331,318.733 306,311 295.8,287.8 306,261   "/><polygon style="fill:#FFFFFF;" points="256,261 261.8,286.2 256,311 231,323 206,311 198.6,286.6 206,261   "/><polygon style="fill:#FFFFFF;" points="156,261 161.8,284.2 156,311 131,318.733 106,311 100.6,286.6 106,261   "/><polygon style="fill:#FFFFFF;" points="406,261 406,311 381,320.867 356,311 356,261   "/><polygon style="fill:#FFFFFF;" points="306,261 306,311 281,320.867 256,311 256,261   "/><polygon style="fill:#FFFFFF;" points="206,261 206,311 181,318.733 156,311 156,261   "/><polygon style="fill:#FFFFFF;" points="106,261 106,311 81,318.733 56,311 56,261   "/><polygon style="fill:#FFFFFF;" points="456,310.835 456,360.835 431,370.702 406,360.835 397,336.435 406,310.835   "/><polygon style="fill:#FFFFFF;" points="356,310.835 365.4,336.035 356,360.835 331,368.568 306,360.835 295.8,337.635     306,310.835   "/><polygon style="fill:#FFFFFF;" points="256,310.835 261.8,336.035 256,360.835 231,372.835 206,360.835 198.6,336.435     206,310.835   "/><polygon style="fill:#FFFFFF;" points="156,310.835 161.8,334.035 156,360.835 131,368.568 106,360.835 100.6,336.435     106,310.835   "/><polygon style="fill:#FFFFFF;" points="406,310.835 406,360.835 381,370.702 356,360.835 356,310.835   "/><polygon style="fill:#FFFFFF;" points="306,310.835 306,360.835 281,370.702 256,360.835 256,310.835   "/><polygon style="fill:#FFFFFF;" points="206,310.835 206,360.835 181,368.568 156,360.835 156,310.835   "/><polygon style="fill:#FFFFFF;" points="106,310.835 106,360.835 81,368.568 56,360.835 56,310.835   "/><polygon style="fill:#FFFFFF;" points="456,360.67 456,410.67 431,420.537 406,410.67 397,386.27 406,360.67   "/><polygon style="fill:#FFFFFF;" points="356,360.67 365.4,385.87 356,410.67 331,418.403 306,410.67 295.8,387.47 306,360.67   "/><polygon style="fill:#FFFFFF;" points="256,360.67 261.8,385.87 256,410.67 231,422.67 206,410.67 198.6,386.27 206,360.67   "/><polygon style="fill:#FFFFFF;" points="156,360.67 161.8,383.87 156,410.67 131,418.403 106,410.67 100.6,386.27 106,360.67   "/><polygon style="fill:#FFFFFF;" points="406,360.67 406,410.67 381,420.537 356,410.67 356,360.67   "/><polygon style="fill:#FFFFFF;" points="306,360.67 306,410.67 281,420.537 256,410.67 256,360.67   "/><polygon style="fill:#FFFFFF;" points="206,360.67 206,410.67 181,418.403 156,410.67 156,360.67   "/><polygon style="fill:#FFFFFF;" points="106,360.67 106,410.67 81,418.403 56,410.67 56,360.67   "/><polygon style="fill:#FFFFFF;" points="456,410.505 456,460.505 406,460.505 397,436.105 406,410.505   "/><polygon style="fill:#FFFFFF;" points="356,410.505 365.4,435.705 356,460.505 306,460.505 295.8,437.305 306,410.505   "/><polygon style="fill:#FFFFFF;" points="256,410.505 261.8,435.705 256,460.505 206,460.505 198.6,436.105 206,410.505   "/><polygon style="fill:#FFFFFF;" points="156,410.505 161.8,433.705 156,460.505 106,460.505 100.6,436.105 106,410.505   "/><rect x="356" y="410.505" style="fill:#FFFFFF;" width="50" height="50"/><rect x="256" y="410.505" style="fill:#FFFFFF;" width="50" height="50"/><rect x="156" y="410.505" style="fill:#FFFFFF;" width="50" height="50"/><rect x="56" y="410.505" style="fill:#FFFFFF;" width="50" height="50"/><rect x="81" y="171" style="fill:#9DCAFC;" width="350" height="50"/><g><path style="fill:#4269A7;" d="M471,1H41C18.944,1,1,18.944,1,41v430c0,22.056,17.944,40,40,40h430c22.056,0,40-17.944,40-40V41     C511,18.944,493.056,1,471,1z M491,471c0,11.028-8.972,20-20,20H41c-11.028,0-20-8.972-20-20V41c0-11.028,8.972-20,20-20h430     c11.028,0,20,8.972,20,20V471z"/><path style="fill:#4269A7;" d="M61,141h20c16.542,0,30-13.458,30-30c0-7.678-2.902-14.688-7.663-20     C108.098,85.688,111,78.678,111,71c0-16.542-13.458-30-30-30H61c-5.523,0-10,4.477-10,10c0,9.679,0,70.257,0,80     C51,136.523,55.477,141,61,141z M81,121H71v-20h10c5.514,0,10,4.486,10,10S86.514,121,81,121z M91,71c0,5.514-4.486,10-10,10H71     V61h10C86.514,61,91,65.486,91,71z"/><path style="fill:#4269A7;" d="M141,141c5.523,0,10-4.477,10-10V51c0-5.523-4.477-10-10-10s-10,4.477-10,10v80     C131,136.523,135.477,141,141,141z"/><path style="fill:#4269A7;" d="M181,141c5.523,0,10-4.477,10-10V85.868l31.52,50.432c2.379,3.807,6.976,5.535,11.237,4.313     c4.288-1.229,7.243-5.151,7.243-9.612V51c0-5.523-4.477-10-10-10s-10,4.477-10,10v45.132L189.48,45.7     c-2.364-3.783-6.948-5.543-11.237-4.313C173.955,42.617,171,46.539,171,51v80C171,136.523,175.477,141,181,141z"/><path style="fill:#4269A7;" d="M311,141h20c5.523,0,10-4.477,10-10V91c0-5.523-4.477-10-10-10h-20c-5.523,0-10,4.477-10,10     s4.477,10,10,10h10v20h-10c-16.542,0-30-13.458-30-30s13.458-30,30-30h20c5.523,0,10-4.477,10-10s-4.477-10-10-10h-20     c-27.57,0-50,22.43-50,50S283.43,141,311,141z"/><path style="fill:#4269A7;" d="M411,141c27.57,0,50-22.43,50-50s-22.43-50-50-50s-50,22.43-50,50S383.43,141,411,141z M411,61     c16.542,0,30,13.458,30,30s-13.458,30-30,30s-30-13.458-30-30S394.458,61,411,61z"/><path style="fill:#4269A7;" d="M81,161c-5.523,0-10,4.477-10,10v50c0,5.523,4.477,10,10,10h350c5.523,0,10-4.477,10-10v-50     c0-5.523-4.477-10-10-10H81z M421,211H91v-30h330V211z"/><path style="fill:#4269A7;" d="M456,251c-310.093,0-39.145,0-400,0c-5.523,0-10,4.477-10,10c0,17.6,0,173.464,0,200     c0,5.523,4.477,10,10,10c146.31,0,253.183,0,400,0c5.523,0,10-4.477,10-10c0-17.6,0-173.464,0-200     C466,255.477,461.523,251,456,251z M446,351h-30v-30h30V351z M396,351h-30v-30h30V351z M346,351h-30v-30h30V351z M296,351h-30     v-30h30V351z M246,351h-30v-30h30V351z M196,351h-30v-30h30V351z M146,351h-30v-30h30V351z M96,351H66v-30h30V351z M66,371h30v30     H66V371z M116,371h30v30h-30V371z M166,371h30v30h-30V371z M216,371h30v30h-30V371z M266,371h30v30h-30V371z M316,371h30v30h-30     V371z M366,371h30v30h-30V371z M416,371h30v30h-30V371z M446,301h-30v-30h30V301z M396,301h-30v-30h30V301z M346,301h-30v-30h30     V301z M296,301h-30v-30h30V301z M246,301h-30v-30h30V301z M196,301h-30v-30h30V301z M146,301h-30v-30h30V301z M66,271h30v30H66     V271z M66,421h30v30H66V421z M116,421h30v30h-30V421z M166,421h30v30h-30V421z M216,421h30v30h-30V421z M266,421h30v30h-30V421z      M316,421h30v30h-30V421z M366,421h30v30h-30V421z M446,451h-30v-30h30V451z"/></g></g></g><g id="Layer_1"/></svg>
                    Mis cartones
                </x-responsive-nav-link>

                

                <x-responsive-nav-link class="flex" href="{{ route('mis-cartones') }}">

                    <svg height="18" class=" mr-3"  width="18" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g id="_x34_3_x2C__Trophy_x2C__Competition_x2C__Sports_and_Competition_x2C__Winner_x2C__Award_x2C__Star_x2C__Prize_x2C__Best"><g><path style="fill:#FFFFFF;" d="M351.39,431.67v30.17L254.2,471l-93.59-9.16v-30.17c0-5.52,4.48-10,10-10h20.12L256,410.6    l65.27,11.07h20.12C346.91,421.67,351.39,426.15,351.39,431.67z"/><polygon style="fill:#FFFFFF;" points="220.86,306.44 220.86,351.39 256,368.2 291.14,351.39 291.14,306.44   "/><path style="fill:#9DCAFC;" d="M321.27,371.39v50.28H190.73v-50.28c0-11.05,8.96-20,20-20h10.13h70.28h10.13    C312.31,351.39,321.27,360.34,321.27,371.39z"/><path style="fill:#9DCAFC;" d="M391.55,471.84V492c0,5.52-4.48,10-10,10h-251.1c-5.52,0-10-4.48-10-10v-20.16    c0-5.53,4.48-10,10-10h30.16h190.78h30.16C387.07,461.84,391.55,466.31,391.55,471.84z"/><path style="fill:#FFFFFF;" d="M376.57,230.77c-15.23,36.65-46.7,64.86-85.43,75.67c-11.18,3.11-22.97,4.78-35.14,4.78    c-12.17,0-23.96-1.67-35.14-4.78c-38.73-10.81-70.2-39.02-85.43-75.67c-0.8-1.93-1.56-3.88-2.27-5.85    c-0.71-1.97-1.37-3.97-1.99-5.98c-0.31-1.01-0.6-2.02-0.89-3.04c-0.28-1.02-0.56-2.04-0.82-3.07c-0.62-2.45-1.17-4.93-1.65-7.43    c-0.13-0.65-0.25-1.3-0.36-1.95c-0.09-0.53-0.18-1.06-0.27-1.59c-0.08-0.53-0.17-1.06-0.25-1.59c-0.16-1.07-0.31-2.14-0.44-3.21    c-0.07-0.53-0.13-1.07-0.19-1.61c-0.11-0.92-0.2-1.85-0.28-2.78c-0.07-0.7-0.13-1.39-0.18-2.09c-0.08-1.09-0.15-2.18-0.2-3.28    c-0.02-0.23-0.03-0.45-0.03-0.67c-0.04-0.76-0.07-1.53-0.09-2.29c-0.03-1.21-0.05-2.43-0.05-3.65V90.33V50.16L262.2,31    l124.33,19.16v40.17v90.36c0,1.22-0.02,2.44-0.05,3.65c-0.02,0.76-0.05,1.53-0.09,2.29c0,0.22-0.01,0.44-0.03,0.67    c-0.05,1.1-0.12,2.19-0.2,3.28c-0.05,0.7-0.11,1.39-0.18,2.09c-0.08,0.93-0.17,1.86-0.28,2.78c-0.06,0.54-0.12,1.08-0.19,1.61    c-0.13,1.07-0.28,2.14-0.44,3.21c-0.08,0.53-0.17,1.06-0.25,1.59c-0.09,0.53-0.18,1.06-0.27,1.59c-0.11,0.65-0.23,1.3-0.36,1.95    c-0.48,2.5-1.03,4.98-1.65,7.43c-0.26,1.03-0.54,2.05-0.82,3.07c-0.29,1.02-0.58,2.03-0.89,3.04c-0.62,2.01-1.28,4.01-1.99,5.98    S377.37,228.84,376.57,230.77z"/><polygon style="fill:#FFFFFF;" points="324.58,165.21 282.2,196.01 298.39,245.84 256,215.04 213.61,245.84 229.8,196.01     187.42,165.21 239.81,165.21 256,115.39 272.19,165.21   "/><path style="fill:#FFFFFF;" d="M386.53,10c11.09,0,20.08,8.99,20.08,20.08c0,5.54-2.25,10.56-5.88,14.2    c-3.63,3.63-8.65,5.88-14.2,5.88H125.47c-11.09,0-20.08-8.99-20.08-20.08c0-5.54,2.25-10.56,5.88-14.2    c3.63-3.63,8.65-5.88,14.2-5.88H386.53z"/><g><path style="fill:#4269A7;" d="M383.257,240.269c55.781-5.9,98.62-52.972,98.62-109.779c0-27.66-22.504-50.164-50.164-50.164     H396.53V58.448c11.685-4.132,20.082-15.284,20.082-28.365C416.612,13.495,403.117,0,386.53,0H125.469     c-16.587,0-30.082,13.495-30.082,30.082c0,13.082,8.397,24.234,20.082,28.365v21.879H80.285     c-27.66,0-50.163,22.504-50.163,50.164c0,56.806,42.839,103.879,98.619,109.779c16.153,34.366,45.818,61.173,82.115,73.518     v27.601h-0.122c-16.542,0-30,13.458-30,30v40.286h-10.123c-11.028,0-20,8.972-20,20v20.163h-20.163c-11.028,0-20,8.972-20,20V492     c0,11.028,8.972,20,20,20h251.102c11.028,0,20-8.972,20-20v-20.163c0-11.028-8.972-20-20-20h-20.163v-20.163     c0-11.028-8.972-20-20-20h-10.122v-40.286c0-16.542-13.458-30-30-30h-0.123v-27.601     C337.439,301.442,367.104,274.635,383.257,240.269z M431.714,100.326c16.633,0,30.164,13.531,30.164,30.164     c0,42.992-29.96,79.18-70.555,88.23c6.75-24.017,5.177-33.359,5.207-118.395H431.714z M125.469,20H386.53     c5.56,0,10.082,4.522,10.082,10.082c0,5.559-4.522,10.081-10.082,10.081H125.469c-5.559,0-10.082-4.522-10.082-10.081     C115.387,24.522,119.91,20,125.469,20z M120.677,218.721c-40.595-9.051-70.554-45.238-70.554-88.23     c0-16.633,13.531-30.164,30.163-30.164h35.184C115.499,187.092,114.046,195.137,120.677,218.721z M135.625,186.867     c-0.229-4.522-0.156,0.862-0.156-126.704H376.53c0,127.61,0.075,122.385-0.169,126.906     C373.036,250.578,320.323,301.225,256,301.225C191.348,301.225,138.777,250.138,135.625,186.867z M381.551,492H130.449v-20.163     c20.084,0,243.165,0,251.102,0V492z M341.387,451.837H170.612v-20.163c39.944,0,137.261,0,170.775,0V451.837z M311.265,371.388     v40.286H200.735v-40.286c0-5.514,4.486-10,10-10h90.531C306.779,361.388,311.265,365.874,311.265,371.388z M281.142,341.388     h-50.286v-22.419c16.575,3.006,33.678,3.012,50.286,0V341.388z"/><path style="fill:#4269A7;" d="M292.508,253.927c3.506,2.547,8.25,2.547,11.756,0c3.505-2.546,4.972-7.06,3.633-11.18     l-13.944-42.918l36.508-26.524c3.505-2.546,4.972-7.06,3.633-11.18s-5.179-6.91-9.511-6.91h-45.126l-13.945-42.917     c-1.339-4.121-5.179-6.91-9.511-6.91c-4.333,0-8.172,2.79-9.511,6.91l-13.945,42.917h-45.126c-4.332,0-8.172,2.79-9.511,6.91     c-1.338,4.12,0.128,8.634,3.633,11.18l36.508,26.524l-13.945,42.918c-1.338,4.12,0.128,8.634,3.633,11.18     c3.505,2.546,8.25,2.548,11.756,0L256,227.402L292.508,253.927z M250.122,206.952l-17.487,12.704l6.68-20.557     c1.338-4.12-0.128-8.634-3.633-11.18l-17.487-12.705h21.615c4.332,0,8.172-2.79,9.511-6.91L256,147.748l6.68,20.557     c1.339,4.121,5.179,6.91,9.511,6.91h21.614l-17.486,12.705c-3.505,2.546-4.972,7.06-3.633,11.18l6.68,20.558l-17.487-12.705     C258.372,204.405,253.627,204.405,250.122,206.952z"/></g></g></g><g id="Layer_1"/></svg>
                    Resultado de sorteos
                </x-responsive-nav-link>

                

                <x-responsive-nav-link class="flex " href="{{ route('profile.show') }}">

                    <svg height="20" class=" mr-3"  width="20" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g id="_x31_2_x2C__Triple_Sevens_x2C__Casino_x2C__Slot_Machine_x2C__Gambler_x2C__Prize_x2C__Gambling_x2C__Coins_x2C__Seven"><g><polygon style="fill:#FFFFFF;" points="66,351 66,426 216,461.79 366,426 366,351 222.4,325.4   "/><path style="fill:#FFFFFF;" d="M66,426v35c0,22.09,17.91,40,40,40h220c22.09,0,40-17.91,40-40v-35H66z"/><circle style="fill:#FFFFFF;" cx="481" cy="61" r="20"/><polygon style="fill:#FFFFFF;" points="481,241 481,301 441,301 427.933,260.067 441,211 481,211   "/><path style="fill:#9DCAFC;" d="M381.91,101H70.09C101.21,47.2,159.38,11,226,11S350.79,47.2,381.91,101z"/><path style="fill:#9DCAFC;" d="M256,401c13.81,0,25,11.19,25,25c0,6.9-2.8,13.16-7.32,17.68C269.16,448.2,262.9,451,256,451h-80    c-13.81,0-25-11.19-25-25c0-6.9,2.8-13.16,7.32-17.68C162.84,403.8,169.1,401,176,401H256z"/><path style="fill:#FFFFFF;" d="M441,301v10c0,22.09-17.91,40-40,40h-35H66H51c-22.09,0-40-17.91-40-40V141c0-22.09,17.91-40,40-40    h19.09h311.82H401c22.09,0,40,17.91,40,40v70V301z"/><polygon style="fill:#9DCAFC;" points="281,151 293.8,220.82 281,301 171,301 151,220.82 171,151   "/><rect x="281" y="151" style="fill:#FFFFFF;" width="110" height="150"/><rect x="61" y="151" style="fill:#FFFFFF;" width="110" height="150"/><g><path style="fill:#4269A7;" d="M131,181h-30c-5.523,0-10,4.477-10,10s4.477,10,10,10h14.834l-24.026,56.061     c-2.176,5.076,0.176,10.955,5.252,13.13c5.058,2.169,10.948-0.159,13.13-5.252l30-70C143.014,188.353,138.179,181,131,181z"/><path style="fill:#4269A7;" d="M241,181h-30c-5.523,0-10,4.477-10,10s4.477,10,10,10h14.834l-24.026,56.061     c-2.176,5.076,0.176,10.955,5.252,13.13c5.058,2.169,10.948-0.159,13.13-5.252l30-70C253.014,188.353,248.179,181,241,181z"/><path style="fill:#4269A7;" d="M321,201h23.82l-32.764,65.528c-3.346,6.693,1.588,14.475,8.937,14.475     c3.668,0,7.2-2.026,8.952-5.53l40-80C373.268,188.824,368.419,181,361,181h-40c-5.523,0-10,4.477-10,10S315.477,201,321,201z"/><path style="fill:#4269A7;" d="M391,141c-9.245,0-316.619,0-330,0c-5.523,0-10,4.477-10,10v150c0,5.523,4.477,10,10,10     c9.245,0,316.619,0,330,0c5.523,0,10-4.477,10-10V151C401,145.477,396.523,141,391,141z M71,161h90v130H71V161z M181,161h90v130     h-90V161z M381,291h-90V161h90V291z"/><path style="fill:#4269A7;" d="M511,61c0-16.542-13.458-30-30-30s-30,13.458-30,30c0,13.036,8.361,24.152,20,28.28V201h-20v-60     c0-27.57-22.43-50-50-50h-13.431C354.025,36.909,294.121,1,226,1C157.92,1,97.997,36.872,64.431,91H51c-27.57,0-50,22.43-50,50     v170c0,27.57,22.43,50,50,50h5v100c0,27.57,22.43,50,50,50h220c27.57,0,50-22.43,50-50V361h25c27.57,0,50-22.43,50-50h30     c5.523,0,10-4.477,10-10c0-52.502,0-170.283,0-211.72C502.639,85.152,511,74.036,511,61z M226,21     c54.494,0,105.671,26.436,137.461,70H88.539C120.329,47.436,171.506,21,226,21z M326,491H106c-16.542,0-30-13.458-30-30v-25     h66.463c4.314,14.441,17.712,25,33.537,25h80c15.825,0,29.223-10.559,33.537-25H356v25C356,477.542,342.542,491,326,491z      M161,426c0-8.271,6.729-15,15-15h80c8.271,0,15,6.729,15,15s-6.729,15-15,15h-80C167.729,441,161,434.271,161,426z M356,416     h-66.463c-4.314-14.441-17.712-25-33.537-25h-80c-15.825,0-29.223,10.559-33.537,25H76v-55h280V416z M431,311     c0,16.542-13.458,30-30,30c-20.365,0-338.233,0-350,0c-16.542,0-30-13.458-30-30V141c0-16.542,13.458-30,30-30h350     c16.542,0,30,13.458,30,30C431,166.518,431,289.974,431,311z M471,291h-20v-70h20C471,239.912,471,278.544,471,291z M481,71     c-5.514,0-10-4.486-10-10s4.486-10,10-10s10,4.486,10,10S486.514,71,481,71z"/></g></g></g><g id="Layer_1"/></svg>

                  
                    Jugar
                </x-responsive-nav-link>

                <x-responsive-nav-link class="flex" href="{{ route('profile.show') }}">

                    <svg height="18" class=" mr-3"  width="18"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g id="_x30_3_x2C__Big_Bag_Of_Coins_x2C__Money_x2C__Coin_x2C__Bank_x2C__Banking_x2C__Currency_x2C__Business_x2C__Dollar_Symbol"><g><path style="fill:#9DCAFC;" d="M330.998,11.014l-40,60l-30,10.4l-30-10.4l-40-60c19.48,6.49,44.74,9.74,70,9.74    C286.258,20.754,311.518,17.504,330.998,11.014z"/><path style="fill:#FFFFFF;" d="M320.998,111.014l-56-13.6l-74,13.6c-97.57,61.49-147.65,176.77-124.98,289.85    c1.68,8.36,3.58,16.7,5.71,24.99c11.34,44.23,51.2,75.16,96.86,75.16h174.82c22.83,0,44.21-7.73,61.3-20.99    c17.09-13.27,29.89-32.05,35.56-54.17c2.13-8.29,4.03-16.63,5.71-24.99C468.648,287.784,418.568,172.504,320.998,111.014z"/><path style="fill:#9DCAFC;" d="M340.998,71.014c11.05,0,20,8.95,20,20c0,5.52-2.24,10.52-5.86,14.14    c-3.62,3.62-8.62,5.86-14.14,5.86h-20h-45h-30h-55h-10c-11.05,0-20-8.95-20-20c0-5.52,2.24-10.52,5.86-14.14    c3.62-3.62,8.62-5.86,14.14-5.86h50h60H340.998z"/><g><path style="fill:#4269A7;" d="M350.405,119.495c11.947-3.956,20.593-15.225,20.593-28.481c0-16.542-13.458-30-30-30h-31.315     l29.635-44.453c5.272-7.906-2.481-18.035-11.482-15.034c-36.855,12.285-96.82,12.285-133.676,0     c-9.014-3.006-16.746,7.14-11.482,15.034l29.635,44.453h-31.315c-16.542,0-30,13.458-30,30c0,10.815,5.753,20.309,14.359,25.589     C77.487,182.996,34.403,294.036,56.216,402.827c1.708,8.517,3.667,17.099,5.823,25.508     c12.482,48.68,56.298,82.679,106.553,82.679h174.813c50.254,0,94.07-33.999,106.553-82.679     c2.155-8.406,4.115-16.987,5.823-25.508C477.317,295.414,435.605,186.092,350.405,119.495z M213.568,26.841     c29.791,5.222,65.07,5.222,94.861,0l-22.782,34.173H236.35L213.568,26.841z M180.998,81.014c18.206,0,134.574,0,160,0     c5.514,0,10,4.486,10,10s-4.486,10-10,10c-6.708,0-153.145,0-160,0c-5.514,0-10-4.486-10-10S175.484,81.014,180.998,81.014z      M436.171,398.895c-1.64,8.174-3.519,16.408-5.587,24.472c-10.213,39.829-46.063,67.646-87.18,67.646H168.592     c-41.118,0-76.967-27.817-87.18-67.646c-2.068-8.067-3.948-16.3-5.586-24.472c-21.48-107.131,25.945-218.414,118.113-277.882     h27.917l-32.929,32.929c-3.905,3.905-3.905,10.237,0,14.143c3.905,3.905,10.238,3.905,14.143,0l47.071-47.071h21.715     l47.071,47.071c3.906,3.905,10.237,3.905,14.143,0c3.905-3.905,3.905-10.237,0-14.143l-32.929-32.929h17.917     C410.225,180.481,457.649,291.765,436.171,398.895z"/><path style="fill:#4269A7;" d="M144.548,210.758c-4.66-2.966-10.841-1.593-13.806,3.066     C96.401,267.777,83.966,332.701,96.414,394.77c1.092,5.445,6.388,8.92,11.771,7.838c5.415-1.086,8.924-6.356,7.838-11.771     c-11.47-57.196-0.25-116.247,31.591-166.274C150.58,219.905,149.207,213.723,144.548,210.758z"/><path style="fill:#4269A7;" d="M243.624,279.497c-9.504-9.503-9.504-24.968,0-34.471c9.526-9.527,24.945-9.526,34.471,0     c3.906,3.906,10.236,3.906,14.143,0c3.905-3.905,3.905-10.237,0-14.142c-7.361-7.361-16.655-11.585-26.239-12.698v-22.172     c0-5.523-4.478-10-10-10c-5.523,0-10,4.477-10,10v24.422c-30.532,10.839-39.605,50.115-16.517,73.204l38.891,38.891     c14.662,14.661,5.024,39.168-13.553,41.342c-8.02,1.152-15.549-1.502-20.917-6.871c-3.905-3.905-10.237-3.905-14.143,0     c-3.905,3.905-3.905,10.237,0,14.143c7.361,7.361,16.655,11.585,26.239,12.697v22.172c0,5.523,4.477,10,10,10     c5.522,0,10-4.477,10-10v-24.422c30.406-10.794,39.753-49.966,16.517-73.204L243.624,279.497z"/></g></g></g><g id="Layer_1"/></svg>

                   
                    Billetera
                </x-responsive-nav-link>


                <!-- Account Management -->
                <x-responsive-nav-link class="flex" href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">

                    <svg height="18" class=" mr-3"  width="18"  id="svg1630" version="1.1" viewBox="0 0 6.3499999 6.3500002" width="24" xmlns="http://www.w3.org/2000/svg" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:svg="http://www.w3.org/2000/svg"><defs id="defs1624"/><g id="layer1"><path d="M 2.1172531,3.4397435 C 1.322787,3.4395919 0.52903671,3.9687583 0.52916671,4.762137 v 0.5879475 c 0,0.2827154 0.1942445,0.4707488 0.52936249,0.4707488 h 4.2329423 c 0.3323546,0 0.5293618,-0.204039 0.5293618,-0.4707488 V 4.762137 C 5.8207038,3.9687583 5.0269538,3.4395919 4.2327475,3.4397435 Z" id="path1955" style="color:#000000;font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:medium;line-height:normal;font-family:sans-serif;font-variant-ligatures:normal;font-variant-position:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-alternates:normal;font-variant-east-asian:normal;font-feature-settings:normal;font-variation-settings:normal;text-indent:0;text-align:start;text-decoration:none;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000000;letter-spacing:normal;word-spacing:normal;text-transform:none;writing-mode:lr-tb;direction:ltr;text-orientation:mixed;dominant-baseline:auto;baseline-shift:baseline;text-anchor:start;white-space:normal;shape-padding:0;shape-margin:0;inline-size:0;clip-rule:nonzero;display:inline;overflow:visible;visibility:visible;isolation:auto;mix-blend-mode:normal;color-interpolation:sRGB;color-interpolation-filters:linearRGB;solid-color:#000000;solid-opacity:1;vector-effect:none;fill:#3771c8;fill-opacity:1;fill-rule:nonzero;stroke:none;stroke-width:0.529225;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1;color-rendering:auto;image-rendering:auto;shape-rendering:auto;text-rendering:auto;enable-background:accumulate;stop-color:#000000"/><path d="M 3.1658929,0.52917505 C 2.4783575,0.53418705 1.9182516,1.098532 1.9182703,1.7860675 c -4e-7,0.6910289 0.5658787,1.2568932 1.2569253,1.2568927 0.6910467,5e-7 1.2569261,-0.5658638 1.2569256,-1.2568927 4e-7,-0.6906772 -0.5653238,-1.25631766 -1.2558919,-1.25689245 -0.00305,-1.114e-5 -0.00625,-1.114e-5 -0.0093,0 a 0.26464234,0.26463543 0 0 0 -0.00103,0 z" id="path1947" style="color:#000000;font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:medium;line-height:normal;font-family:sans-serif;font-variant-ligatures:normal;font-variant-position:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-alternates:normal;font-variant-east-asian:normal;font-feature-settings:normal;font-variation-settings:normal;text-indent:0;text-align:start;text-decoration:none;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000000;letter-spacing:normal;word-spacing:normal;text-transform:none;writing-mode:lr-tb;direction:ltr;text-orientation:mixed;dominant-baseline:auto;baseline-shift:baseline;text-anchor:start;white-space:normal;shape-padding:0;shape-margin:0;inline-size:0;clip-rule:nonzero;display:inline;overflow:visible;visibility:visible;isolation:auto;mix-blend-mode:normal;color-interpolation:sRGB;color-interpolation-filters:linearRGB;solid-color:#000000;solid-opacity:1;vector-effect:none;fill:#87aade;fill-opacity:1;fill-rule:nonzero;stroke:none;stroke-width:0.529225;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1;color-rendering:auto;image-rendering:auto;shape-rendering:auto;text-rendering:auto;enable-background:accumulate;stop-color:#000000"/></g></svg>

                    Perfil
                </x-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-responsive-nav-link>
                @endif

                <div class="border-t border-gray-200"></div>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-responsive-nav-link class="flex" href="{{ route('logout') }}"
                                   @click.prevent="$root.submit();">

                    <svg height="18" class=" mr-3"  width="18" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><defs><style>.cls-1{fill:#d8e1ef;}.cls-2{fill:#0593ff;}</style></defs><title/><g id="out"><rect class="cls-1" height="26" rx="4" ry="4" width="20" x="2" y="3"/><path class="cls-2" d="M29.71,15.29l-4-4a1,1,0,0,0-1.42,1.42L26.59,15H12a1,1,0,0,0,0,2H26.59l-2.3,2.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l4-4A1,1,0,0,0,29.71,15.29Z"/></g></svg>
                        Cerrar sesión
                    </x-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-responsive-nav-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                            {{ __('Create New Team') }}
                        </x-responsive-nav-link>
                    @endcan

                    <div class="border-t border-gray-200"></div>

                    <!-- Team Switcher -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Switch Teams') }}
                    </div>

                    @foreach (Auth::user()->allTeams() as $team)
                        <x-switchable-team :team="$team" component="responsive-nav-link" />
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</nav>
