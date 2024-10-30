<div>
    <div class="card-header  mb-2">
        <div class="flex items-center">
            <h2 class="font-semibold text-lg text-gray-500 leading-tight">
                Registros de pagos
            </h2>
        </div>
    </div>

    <div class="row">
        <div class="col-6 col-sm-6 col-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-archive"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Pendientes por reportar</span>
                    <span class="info-box-number">
                        {{$this->pendientes_verificar()}}
                        <small></small>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
            <div class="card card-secondary card-outline">
                <div class="card-header">
                    <h3 class="font-semibold text-lg text-gray-500 leading-tight mb-2 ">Buscador</h3>
                   
                </div> 
                <div class="card-body">
                    <div class="md:flex items-center justify-between">
                        <div class="w-full md:mb-0 ">
                            <label class="text-gray-500 text-md mx-2 ">Vista de registro</label>
                            <select wire:model="vista_registros" id="vista_registros" class="form-control w-full" name="vista_registros">
                                <option value="0">Pendientes</option>
                                <option value="1">Pagos reportados</option>
                            </select>
                        </div>

                        <div class="w-full  md:ml-4 ml-2">

                            <label class="text-gray-500 text-md md:text-md">Filtro del buscador</label>

                            <select wire:model="buscador" id="buscador" class="form-control" name="buscador">
                                <option value="0">Usuario</option>
                            </select>

                        </div>

                        <div class="w-full  md:ml-4 ml-2">
                            <label class="text-gray-500 text-md ">Buscador</label>
                            <input wire:model="search" placeholder="Nombre de usuario" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
    </section>

   
    <div class="px-2 ">



        @if ($registros != [])

            <div class=" mt-8 mb-2">
                <h3 class="my-2 mx-4 text-gray-500 font-bold text-lg">Registro de solicitudes de pagos</h3>
            </div>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="table text-sm table-bordered table-responsive-lg table-responsive-md table-responsive-sm">
                        <thead class="text-xs uppercase bg-gray-700 text-gray-400">
                            <tr>
                                <th class="text-center py-3">
                                    Fecha
                                </th>
                                
                                <th 
                                    class="text-center">
                                    Monto
                                </th>
                            
                                <th 
                                    class="text-center">
                                    Usuario
                                </th>
                                <th 
                                    class="text-center">
                                    Cuenta de retiro
                                </th>
                                <th 
                                    class="text-center">
                                    Constancia
                                </th>

                                <th>
                                
                                </th>
                            </tr>
                    </thead>
                    <tbody>
                        @foreach ($registros as $registro)
                            <tr class="  border-gray-700 hover:bg-gray-300">
                                
                                <td class="py-3 text-center">
                                {{\Carbon\Carbon::parse($registro->created_at)->format('d-m-Y h:i')}}
                                </td>
                                <td class="text-center">
                                    {{ $registro->monto }} $  (Bs. {{$registro->monto * $dolar_hoy}})
                                </td>
                            
                                <td class="text-center">
                                    {{$registro->user->name}}
                                </td>


                                <td class="text-center">
                                    @livewire('admin.usuarios.cuenta-usuario', ['registro' => $registro->user->id],key($registro->id))
                                </td>

                                @if($registro->referencia)
                                    <td class="text-center">
                                        {{$registro->referencia}}
                                    </td>
                                @else
                                    <td class="text-center">
                                        -
                                    </td>
                                @endif
                                @if($registro->constancia)
                                    <td class="text-center">
                                        <button class="text-green-600 text-lg hover:text-green-900"
                                            
                                            wire:click="download('{{$registro->constancia}}')">
                                            <i class="fas fa-download"></i>
                                        </button>
                                    </td>
                                @endif

                                <td class="text-center">
                                    @livewire('admin.pagos.reporte-pago-reportar', ['registro' => $registro->id],key($registro->id))
                                </td>
                            </tr>

                        @endforeach
                        
                    </tbody>
                </table>
            </div>

        @else
            <div class="px-6 py-4">
                No hay ningún registro coincidente
            </div>
        @endif

        @if ($registros != [])
            
            <div class="px-6 py-4">
                {{ $registros->links() }}
            </div>
            
        @endif
</div>

