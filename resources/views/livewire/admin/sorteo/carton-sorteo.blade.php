<div class="container" >


    <div class=" col-span-3  " >

        @if ($sorteos != [])
            <div class=" mt-8 mb-2">
                <h3 class="my-2 mx-2 text-gray-800 font-bold text-lg">Cartones pendientes por pagar</h3>
            </div>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            
                <table class="table text-sm table-bordered table-responsive-lg table-responsive-md table-responsive-sm">
                        <thead class="text-xs bg-gray-700 text-gray-400">
                            <tr>
                                <th class="text-center py-3">
                                    Sorteo Nro
                                </th>
                                <th class="text-center py-3">
                                    Usuario
                                </th>

                                <th class="text-center py-3">
                                    Teléfono
                                </th>
                                
                                <th 
                                    class="text-center">
                                    Carton Nro.
                                </th>

                                <th>
                                </th>
                            </tr>
                    </thead>
                    <tbody>

                        @foreach ($sorteos as $sorteo)
                            <tr class=" border-gray-700 hover:bg-gray-300">

                                <td class="text-center text-gray-800">
                                    {{$sorteo->sorteo->id}}
                                </td>

                                <td class="text-center">
                                    {{$sorteo->user->name}} 
                                </td>

                    

                                @if($sorteo->user->telefono_whatsapp)
                                    <td class="text-center">
                                        {{$sorteo->user->telefono_whatsapp}}
                                    </td>

                                    
                                @else

                                    <td class="text-center">
                                        Aún sin registrar
                                    </td>


                                @endif
                           

                                <td class="text-center">
                                    {{$sorteo->carton->id}} 
                                </td>


                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        @else
            <div class="px-6 py-4">
                No hay ningún registro
            </div>
        @endif

        @if ($sorteos != [])
            
            <div class="px-6 py-4">
                {{ $sorteos->links() }}
            </div>
            
        @endif

    </div>


</div>
