<div class="container" >
    <div>
        <div class=" flex justify-end pt-2 " >
            <div class="container" >
                <div>

            
                    @if ($usuarios != [])
            
                        <div class=" mt-8 mb-2">
                            <h3 class="my-2 mx-2 text-gray-800 font-bold text-lg">Registro de usuarios por premiar</h3>
                        </div>
                        
                        <table class="table text-sm table-bordered table-responsive-lg table-responsive-md table-responsive-sm">
                                <thead class="text-xs bg-gray-700 text-gray-400">
                                    <tr>
                                       
            
                                        <th 
                                            class="text-center">
                                            Usuario
                                        </th>

            
                                        <th>
                                        </th>
                                    </tr>
                            </thead>
                            <tbody>
            
                                @foreach ($usuarios as $usuario)
                                    <tr class=" border-gray-700 hover:bg-gray-300">
            
                                      
                                        <td class="text-center">
                                        {{$usuario->user->name}}
                                        </td>

                                        <td class="text-center">
            
                                            @livewire('admin.referidos.premiar-add',['registro' => $usuario->id],key($usuario->id))
            
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
        </div>
    </div>
</div>
