<div>
    <div class="card">
        <div class="card-header">
                <input wire:model="search" placeholder="Ingrese el nombre o correo del usuario a buscar" class="form-control">
       
        </div>
       

        </div>
        @if ($users->count())
     
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg container mt-2">
            <table class="table text-sm table-bordered table-responsive-lg table-responsive-md table-responsive-sm">
                <thead class="text-xs uppercase bg-gray-700 text-gray-400">
                    <tr>
                        <th class="text-center py-3">Nombre</th>
                        <th class="text-center">Correo</th>
                        <th class="text-center">Nro de teléfono</th>
                        <th class="text-center">Cuenta de retiro</th>
                        <th class="text-center">Retiro inmediato</th>
                        <th class="text-center">Cantidad de sorteos jugados</th>
                        

                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                            <tr class=" border-gray-700 hover:bg-gray-300">

                                <th class="py-3 text-center font-medium whitespace-nowrap ">{{$user->name}}</th>
                                <td class="text-center">{{$user->email}}</td>
                                <td class="text-center">{{$user->telefono_whatsapp}}</td>
                                <td class="text-center">
                                    @livewire('admin.usuarios.cuenta-usuario', ['registro' => $user->id],key($user->id))
                                </td>
                                @if($user->retiro_inmediato == null)
                                    <td class="text-center">-</td>
                                @else
                                    <td class="text-center">{{$user->retiro_inmediato}}</td>
                                @endif
                                <td class="text-center">{{$this->sorteos_jugados($user->id)}}</td>


                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{$users->links()}}
            </div>
        
        @else
             <div class="card-body">
                <strong>No hay registros</strong>
            </div>
        @endif
            
    </div>
</div>
