<div class="container" >

    <div class=" grid grid-cols-1 md:grid-cols-2 gap-2 " >

    </div>

    <div class="col-span-1" >

        <div class=" mt-8 mb-2">
            <h3 class="my-2 mx-2 text-gray-800 font-bold text-lg">Registro de cartones duplicados en sorteo</h3>
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
                            
                            <th 
                                class="text-center">
                                Carton Nro.
                            </th>

                            <th>
                            </th>
                        </tr>
                </thead>
                <tbody>

                    @foreach ($sorteos_d as $sorteo_d)
                        <tr class=" border-gray-700 hover:bg-gray-300">

                            <td class="text-center text-gray-800">
                                {{$sorteo_d->sorteo->id}}
                            </td>

                            <td class="text-center">
                            {{$sorteo_d->user->name}}
                            </td>

                            <td class="text-center">
                                {{$sorteo_d->carton->id}} 
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>




    </div>
    
    
    <div class=" col-span-1  " >
     

        @if ($sorteos != [])



            <div class=" mt-8 mb-2">
                <h3 class="my-2 mx-2 text-gray-800 font-bold text-lg">Registro de sorteos con cartones y usuarios</h3>
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
                                    {{$sorteo->id}}
                                </td>
                    


                                <td class="text-center">
                                {{$sorteo->user->name}}
                                </td>

                                <td class="text-center">
                                    {{$sorteo->carton->id}} 
                                </td>


                                <td class="text-center">

                                    @livewire('admin.sorteo.user-sorteo-create', ['sorteo' => $sorteo->id],key($sorteo->id))

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