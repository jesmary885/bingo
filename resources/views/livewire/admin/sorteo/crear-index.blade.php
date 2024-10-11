<div class="container" >
    <div>
        <div class=" flex justify-end pt-2 " >
            @livewire('admin.sorteo.crear-sorteo', ['tipo' => 'agregar'])
        </div>

        @if ($sorteos != [])

            <div class=" mt-8 mb-2">
                <h3 class="my-2 mx-2 text-gray-800 font-bold text-lg">Registro de sorteos</h3>
            </div>
            
            <table class="table text-sm table-bordered table-responsive-lg table-responsive-md table-responsive-sm">
                    <thead class="text-xs uppercase text-gray-800">
                        <tr>
                            <th class="text-center py-3">
                                Nro
                            </th>
                            <th class="text-center py-3">
                                Fecha de ejecución
                            </th>
                            
                            <th 
                                class="text-center">
                                Cant de premios
                            </th>

                            <th 
                                class="text-center">
                                Tipo (1er lugar)
                            </th>

                            <th 
                            class="text-center">
                                Porcentaje de ganancia 
                            </th>

                            <th 
                                class="text-center">
                                Tipo (2do lugar)
                            </th>

                            <th 
                            class="text-center">
                            Porcentaje de ganancia
                            </th>
                        
                            <th 
                                class="text-center">
                                Estado
                            </th>
                            <th 
                                class="text-center">
                                Precio del cartón
                            </th>
                           

                            <th>
                            </th>

                            <th>
                            </th>
                        </tr>
                </thead>
                <tbody>

                    @foreach ($sorteos as $sorteo)
                        <tr class=" border-gray-800 hover:bg-gray-200">

                            <td class="text-center text-gray-800">
                                {{$sorteo->id}}
                            </td>
                            
                            <td class="py-3 text-center">
                            {{\Carbon\Carbon::parse($sorteo->fecha_ejecucion)->format('d-m-Y h:i')}}
                            </td>

                            <td class="text-center">
                                {{$this->cant_premios($sorteo->id)}}
                            </td>

                            <td class="text-center">
                            {{$sorteo->type_1}}
                            </td>

                            <td class="text-center">
                                {{$sorteo->porcentaje_ganancia}} %
                            </td>


                            @if($this->cant_premios($sorteo->id) == 'Un premio')

                                <td class="text-center">
                                    -
                                </td>
        
                                <td class="text-center">
                                    -
                                </td>

                            @else

                                <td class="text-center">
                                    {{$sorteo->type_2}}
                                </td>
        
                                <td class="text-center">
                                    {{$sorteo->porcentaje_ganancia_2do_lugar}} %
                                </td>

                            @endif

                            <td class="text-center">
                            {{$sorteo->status}}
                            </td>
                            <td class="text-center">
                            {{$sorteo->precio_carton_dolar}}
                            </td>
                           
                            <td class="text-center">

                                @livewire('admin.sorteo.crear-sorteo', ['tipo' => 'editar','sorteo' => $sorteo->id],key($sorteo->id))

                            </td>

                            <td class="text-center">
                                <button class="text-red-600 text-lg hover:text-red-800"
                                    
                                wire:click="Eliminar('{{$sorteo->id}}')">
                                <i class="	fa fa-times-circle"></i>
                            </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        @else
            <div class="px-6 py-4">
                No hay ningún registro coincidente
            </div>
        @endif

        @if ($sorteos != [])
            
            <div class="px-6 py-4">
                {{ $sorteos->links() }}
            </div>
            
        @endif

    </div>

</div>
