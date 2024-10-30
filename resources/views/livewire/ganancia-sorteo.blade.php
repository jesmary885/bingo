<div>

   

    @if($sorteo_s->type_2 == null && $sorteo_s->type_3 == null)

        <div class="flex justify-center ">

            <p class="text-sm text-gray-500 font-bold" > 
                {{$ganancia_dolares}} $
            </p>
        
            <p class="ml-1 text-sm text-gray-500 font-bold " > 
                (Bs. {{($ganancia_dolares * $dolar_hoy) }})
            </p>

        </div>
    @elseif($sorteo_s->type_2 != null && $sorteo_s->type_3 == null)

        <div class="flex justify-center ">

            <p class="text-sm text-gray-500 font-bold mr-2" > 
                1er lugar
            </p>

            <p class="text-sm text-gray-500 font-bold" > 
                {{$ganancia_dolares}} $
            </p>
        
            <p class="ml-1 text-sm text-gray-500 font-bold " > 
                (Bs. {{($ganancia_dolares * $dolar_hoy) }})
            </p>

        </div>

        <div class="flex justify-center ">

            <p class="text-sm text-gray-500 font-bold mr-2" > 
                2do lugar
            </p>

            <p class="text-sm text-gray-500 font-bold" > 
                {{$ganancia_dolares_2do}} $
            </p>
        
            <p class="ml-1 text-sm text-gray-500 font-bold " > 
                (Bs. {{($ganancia_dolares_2do * $dolar_hoy) }})
            </p>

        </div>

    @elseif($sorteo_s->type_2 != null && $sorteo_s->type_3 != null)

        <div class="flex justify-center ">

            <p class="text-sm text-gray-500 font-bold mr-2" > 
                1er lugar
            </p>

            <p class="text-sm text-gray-500 font-bold" > 
                {{$ganancia_dolares}} $
            </p>
        
            <p class="ml-1 text-sm text-gray-500 font-bold " > 
                (Bs. {{($ganancia_dolares * $dolar_hoy) }})
            </p>

        </div>

        <div class="flex justify-center ">

            <p class="text-sm text-gray-500 font-bold mr-2" > 
                2do lugar
            </p>

            <p class="text-sm text-gray-500 font-bold" > 
                {{$ganancia_dolares_2do}} $
            </p>
        
            <p class="ml-1 text-sm text-gray-500 font-bold " > 
                (Bs. {{($ganancia_dolares_2do * $dolar_hoy) }})
            </p>

        </div>

        <div class="flex justify-center ">

            <p class="text-sm text-gray-500 font-bold mr-2" > 
                3er lugar
            </p>

            <p class="text-sm text-gray-500 font-bold" > 
                {{$ganancia_dolares_3er}} $
            </p>
        
            <p class="ml-1 text-sm text-gray-500 font-bold " > 
                (Bs. {{($ganancia_dolares_3er * $dolar_hoy) }})
            </p>

        </div>

    @endif

 </div>
