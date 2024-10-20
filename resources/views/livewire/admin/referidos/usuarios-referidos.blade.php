<div class="container" >
    <div>
  
        @if ($usuarios != [])

            <div class=" mt-8 mb-2">
                <h3 class="my-2 mx-2 text-gray-800 font-bold text-lg">Registro de usuarios con referidos</h3>
            </div>
            
            <table class="table text-sm table-bordered table-responsive-lg table-responsive-md table-responsive-sm">
                    <thead class="text-xs bg-gray-700 text-gray-400">
                        <tr>
                            <th class="text-center py-3">
                                Fecha de registro
                            </th>
                            <th class="text-center py-3">
                                Usuario registrado
                            </th>
                            
                            <th 
                                class="text-center">
                                Referido de
                            </th>

                        </tr>
                </thead>
                <tbody>

                    @foreach ($usuarios as $usuario)
                        <tr class=" border-gray-700 hover:bg-gray-300">

                            
                            <td class="py-3 text-center">
                            {{\Carbon\Carbon::parse($usuario->created_at)->format('d-m-Y h:i')}}
                            </td>

                            <td class="text-center">
                            {{$usuario->refer->name}}
                            </td>

                            <td class="text-center">
                                {{$usuario->user->name}}
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

        @if ($usuarios != [])
            
            <div class="px-6 py-4">
                {{ $usuarios->links() }}
            </div>
            
        @endif

    </div>

</div>
