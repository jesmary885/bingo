<div class="container" >

    <div class=" grid grid-cols-5  gap-2 " >

        
    <div class="col-span-2" >

        <div class=" mt-8 mb-2">
            <h3 class="my-2 mx-2 text-gray-800 font-bold text-lg">Registro de cartones duplicados en sorteo</h3>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

            @if ($sorteos_d->count())
            
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

<<<<<<< HEAD
                               

                                <th 
=======
                                <th >
>>>>>>> 30e905f
                            
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

                               

                                <td class="text-center">

                                    <button
                                    class="btn btn-danger btn-sm" 
                                    wire:click="delete('{{$sorteo_d->id}}')"
                                    title="Eliminar">
                                    <i class="fas fa-trash-alt"></i>
                                    </button>

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>

            @else
                <div class="px-6 py-4 mt-2">
                    No hay ningún registro
                </div>
            @endif
        </div>




    </div>
    
    
    <div class=" col-span-3  " >
     

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

                                 <th 
                                    class="text-center">
                                    Adjudicación
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
                    

                                @if($sorteo->user)
                                    <td class="text-center">
                                        {{$sorteo->user->name}}
                                    </td>

                                    
                                @else

                                    <td class="text-center">
                                        -
                                    </td>


                                @endif
                           

                                <td class="text-center">
                                    {{$sorteo->carton->id}} 
                                </td>

                                 <td class="text-center">
                                    {{$this->adjudicacion($sorteo->id)}}
                                </td>


                                <td class="text-center">

                                    @livewire('admin.sorteo.user-sorteo-create', ['sorteo' => $sorteo->sorteo->id,'carton'=> $sorteo->carton->id],key($sorteo->id))

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


</div>