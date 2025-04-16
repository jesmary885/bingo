
<div class="w-full text-gray-700 bg-blue-100 dark-mode:text-gray-200 dark-mode:bg-gray-800 font-Arima">
  <div x-data="{ open: false }" class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
    <div class="p-4 flex flex-row items-center justify-between">


      <a href="{{route('welcome')}}" class="flex-shrink-0 flex items-center -mt-2 ">
        
        <img src="{{Storage::url('img/logo4.png') }}" alt="" class="block h-16 w-36">
      
      </a>


      <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
        <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
          <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
          <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
        </svg>
      </button>
    </div>
    <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row">
      @auth
      
                

      <a class="bg-blue-500 font-Allerta text-center  hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mr-2" href="{{route('home')}}">Ir al Home</a>

      @else

     
                

      <a class="bg-blue-500 font-Allerta text-center  hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mr-2" href="{{route('Registro')}}">Registrarse</a>
      <a class="bg-blue-500 font-Allerta text-center hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mr-2 mt-2 md:mt-0 " href="{{route('Login')}}">Iniciar sesión</a>

      @endauth

      <div @click.away="open = false" class="relative" x-data="{ open: false }">
       
        </div>
      </div>    
    </nav>
  </div>
</div>