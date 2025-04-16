<x-app-layout>

  
    <div class="bg-white" >

            <div class="container" >


                <div class=" flex justify-center mt-8 mb-6">

                    <a href="{{route('welcome')}}" class="flex-shrink-0 flex items-center -mt-2 ">
        
                        <img src="{{Storage::url('img/logo4.png') }}" alt="" class="block h-16 w-36">
                      
                      </a>

                </div>



                <div class="bg-gray-50 text-gray-800">
                    <!-- Header -->
                    <header class="bg-blue-600 text-white py-6 shadow-lg">
                        <div class="container mx-auto px-4">
                            <h1 class="text-3xl font-bold text-center font-Allerta ">Términos y Condiciones</h1>
                     
                        </div>
                    </header>
                
                    <!-- Contenido -->
                    <div class="container mx-auto px-4 py-8 max-w-4xl font-Arima ">
                        <!-- Sección 1 -->
                        <section class="term-section bg-white p-6 rounded-lg shadow-md mb-6 transition duration-300">
                            <h2 class="text-xl font-bold  mb-3 flex items-center">
                                <span class="bg-blue-100 p-2 rounded-full mr-3">1</span>
                                Aceptación de los Términos
                            </h2>
                            <p class="text-gray-700">Al acceder y utilizar BingoMas, aceptas cumplir con estos términos y condiciones. Si no estás de acuerdo con alguna parte de estos términos, no debes utilizar este sitio web.</p>
                        </section>
                
                        <!-- Sección 2 -->
                        <section class="term-section bg-white p-6 rounded-lg shadow-md mb-6 transition duration-300">
                            <h2 class="text-xl font-bold  mb-3 flex items-center">
                                <span class="bg-blue-100 p-2 rounded-full mr-3">2</span>
                                Elegibilidad
                            </h2>
                            <ul class="list-disc pl-6 text-gray-700 space-y-2">
                                <li>Debes tener la edad legal para jugar juegos de azar en tu jurisdicción.</li>
                                <li>Es tu responsabilidad verificar y cumplir con las leyes locales relacionadas con los juegos de azar en línea.</li>
                            </ul>
                        </section>
                
                        <!-- Sección 3 -->
                        <section class="term-section bg-white p-6 rounded-lg shadow-md mb-6 transition duration-300">
                            <h2 class="text-xl font-bold  mb-3 flex items-center">
                                <span class="bg-blue-100 p-2 rounded-full mr-3">3</span>
                                Registro de Cuenta
                            </h2>
                            <ul class="list-disc pl-6 text-gray-700 space-y-2">
                                <li>Debes proporcionar información precisa y completa al registrarte.</li>
                                <li>Eres responsable de mantener la confidencialidad de tu contraseña y cuenta.</li>
                                <li>BingoMas se reserva el derecho de suspender o cancelar cuentas que infrinjan estos términos.</li>
                            </ul>
                        </section>

                         <!-- Sección 4 -->
                         <section class="term-section bg-white p-6 rounded-lg shadow-md mb-6 transition duration-300">
                            <h2 class="text-xl font-bold  mb-3 flex items-center">
                                <span class="bg-blue-100 p-2 rounded-full mr-3">4</span>
                                Depósitos y retiros
                            </h2>
                            <ul class="list-disc pl-6 text-gray-700 space-y-2">
                                <li>Los depósitos se pueden realizar utilizando los métodos de pago especificados en el sitio web.</li>
                                <li>Los retiros están sujetos a los límites y procedimientos establecidos por BingoMas.</li>
                                <li>BingoMas se reserva el derecho de solicitar documentación adicional para verificar tu identidad antes de procesar un retiro.</li>
                            </ul>
                        </section>

                        <!-- Sección 5 -->
                        <section class="term-section bg-white p-6 rounded-lg shadow-md mb-6 transition duration-300">
                            <h2 class="text-xl font-bold mb-3 flex items-center">
                                <span class="bg-blue-100 p-2 rounded-full mr-3">5</span>
                                Reglas del juego
                            </h2>
                            <ul class="list-disc pl-6 text-gray-700 space-y-2">
                                <li>Las reglas del bingo se explican claramente en el sitio web.</li>
                                <li>En caso de discrepancia, la decisión de BingoMas será definitiva.</li>
                                <li> BingoMas se reserva el derecho de modificar las reglas del juego en cualquier momento.</li>
                            </ul>
                        </section>

                        <!-- Sección 6 -->
                        <section class="term-section bg-white p-6 rounded-lg shadow-md mb-6 transition duration-300">
                            <h2 class="text-xl font-bold  mb-3 flex items-center">
                                <span class="bg-blue-100 p-2 rounded-full mr-3">6</span>
                                Bonificaciones y promociones
                            </h2>
                            <ul class="list-disc pl-6 text-gray-700 space-y-2">
                                <li>BingoMas se reserva el derecho de modificar o cancelar bonificaciones y promociones en cualquier momento.</li>
                                <li>En caso de discrepancia, la decisión de BingoMas será definitiva.</li>
                                <li>  El abuso de bonificaciones puede resultar en la suspensión o cancelación de la cuenta.</li>
                            </ul>
                        </section>

                        <!-- Sección 7 -->
                        <section class="term-section bg-white p-6 rounded-lg shadow-md mb-6 transition duration-300">
                            <h2 class="text-xl font-bold  mb-3 flex items-center">
                                <span class="bg-blue-100 p-2 rounded-full mr-3">7</span>
                                Juego responsable
                            </h2>
                            <ul class="list-disc pl-6 text-gray-700 space-y-2">
                                <li>BingoMas promueve el juego responsable.</li>
                                <li> Puedes establecer límites de depósito y autoexclusión de tu cuenta.</li>
                                <li>Si crees que tienes un problema con el juego, busca ayuda profesional.</li>
                            </ul>
                        </section>

                        <!-- Sección 8 -->
                        <section class="term-section bg-white p-6 rounded-lg shadow-md mb-6 transition duration-300">
                            <h2 class="text-xl font-bold  mb-3 flex items-center">
                                <span class="bg-blue-100 p-2 rounded-full mr-3">8</span>
                                Propiedad intelectual
                            </h2>
                            <ul class="list-disc pl-6 text-gray-700 space-y-2">
                                <li>Todo el contenido de BingoMas, incluidos los logotipos, gráficos y textos, está protegido por derechos de autor.</li>
                                <li> No puedes utilizar ni reproducir ningún contenido sin el permiso expreso de BingoMas.</li>

                            </ul>
                        </section>

                         <!-- Sección 9 -->
                         <section class="term-section bg-white p-6 rounded-lg shadow-md mb-6 transition duration-300">
                            <h2 class="text-xl font-bold  mb-3 flex items-center">
                                <span class="bg-blue-100 p-2 rounded-full mr-3">9</span>
                                Limitación de responsabilidad
                            </h2>
                            <ul class="list-disc pl-6 text-gray-700 space-y-2">
                                <li>BingoMas no será responsable de ninguna pérdida o daño que surja del uso de este sitio web.</li>
                                <li> BingoMas no garantiza que el sitio web esté libre de errores o interrupciones.</li>

                            </ul>
                        </section>

                        <!-- Sección 9 -->
                        <section class="term-section bg-white p-6 rounded-lg shadow-md mb-6 transition duration-300">
                            <h2 class="text-xl font-bold  mb-3 flex items-center">
                                <span class="bg-blue-100 p-2 rounded-full mr-3">10</span>
                                Cambios en los términos y condiciones
                            </h2>
                            <ul class="list-disc pl-6 text-gray-700 space-y-2">
                                <li>BingoMas se reserva el derecho de modificar estos términos y condiciones en cualquier momento.</li>
                                <li> Se te notificará de cualquier cambio mediante la publicación de los nuevos términos en el sitio web.</li>
                                <li> Tu uso continuado del sitio web después de la publicación de los cambios constituye la aceptación de los nuevos términos.</li>

                            </ul>
                        </section>

                        <!-- Sección 11 -->
                        <section class="term-section bg-white p-6 rounded-lg shadow-md mb-6 transition duration-300">
                            <h2 class="text-xl font-bold  mb-3 flex items-center">
                                <span class="bg-blue-100 p-2 rounded-full mr-3">11</span>
                                Ley aplicable
                            </h2>
                            <ul class="list-disc pl-6 text-gray-700 space-y-2">
                                <li>Estos términos y condiciones se rigen por las leyes de [tu jurisdicción].</li>
                                <li> Cualquier disputa relacionada con estos términos y condiciones se resolverá en los tribunales de [tu jurisdicción].</li>
                              

                            </ul>
                        </section>
                
                        <!-- Más secciones... (repetir patrón) -->
                
                        <!-- Sección 12 -->
                        <section class="term-section bg-white p-6 rounded-lg shadow-md mb-6 transition duration-300">
                            <h2 class="text-xl font-bold mb-3 flex items-center">
                                <span class="bg-blue-100 p-2 rounded-full mr-3">12</span>
                                Contacto
                            </h2>
                            <p class="text-gray-700">Si tienes preguntas sobre estos términos, contacta a nuestro servicio de atención al cliente:</p>
                            <div class="mt-4 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                <span class="font-medium">soporte@bingomas.com</span>
                            </div>
                        </section>
                
                        <!-- Aceptación -->
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 text-justify  mt-8">

                            <h2 class="text-xl font-bold text-blue-800 mb-3 flex items-center">
                           
                                Información adicional
                            </h2>

                            <li class="font-medium text-blue-800">Es importante que adaptes estos términos y condiciones a las leyes y regulaciones específicas de tu jurisdicción.</li>
                            <li class="font-medium text-blue-800">Considera incluir información sobre la política de privacidad de tu sitio web y cómo recopilas y utilizas los datos de los usuarios.</li>
                            <li class="font-medium text-blue-800">Si los juegos de bingo incluyen transacciones monetarias, es de suma importancia que se incluyan las politicas de devoluciones y reembolsos.</li>
                         
                        </div>
                    </div>
                
  
                </div>


               

                <div  >














    

                </div>
            </div>
    </div>
</x-app-layout>
   
