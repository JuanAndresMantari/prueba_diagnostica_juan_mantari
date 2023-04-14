@extends('layouts.app')

@section('template_title')
    Empleado
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <form action="{{route('empleados.index')}}" method="get">
                <div class="container" style="width:100%">
                    <div class="row">
                        <div class="col-6">

                            <h5 >Filtrar por Area,Cargo o local:</h5>
                            <input type="text" class="form-control" name="texto" value="{{$texto}}">
               
                        
                        </div> <br>
                        <h5>filtrar por fecha</h5>
                        <div class="col-3">
                        
                            <label for="fecha1">Inicio</label>
                            <input type="date" class="form-control" name="fecha1" value="">
                        
                        </div>
                        <div class="col-3">
                            <label for="fecha2">fin</label>
                            <input type="date" class="form-control" name="fecha2" value="">
                        
                        </div>

                        <div class="col-auto my-1">
                            <input type="submit" class="btn btn-primary" value="Buscar">
                        </div>
                    </div>
                </div>
                   
                </form>

            </div>
         
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Empleado') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('empleados.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Nombres</th>
										<th>Apellidos</th>
										<th>Dni</th>
										<th>Correo</th>
										<th>Fecha Nacimiento</th>
										<th>Area</th>
										<th>Cargo</th>
										<th>Local</th>
										<th>Fecha Inicio</th>
										<th>Fecha Fin</th>
										<th>Tipo Contrato</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                          
                                    @foreach ($empleados as $empleado)
                                        <tr>
                                            
											<td>{{ $empleado->nombres }}</td>
											<td>{{ $empleado->apellidos }}</td>
											<td>{{ $empleado->dni }}</td>
											<td>{{ $empleado->correo }}</td>
											<td>{{ $empleado->fecha_nacimiento }}</td>
											<td>{{ $empleado->area }}</td>
											<td>{{ $empleado->cargo }}</td>
											<td>{{ $empleado->local }}</td>
											<td>{{ $empleado->fecha_inicio }}</td>
											<td>{{ $empleado->fecha_fin }}</td>
											<td>{{ $empleado->tipo_contrato }}</td>

                                            <td>
                                                <form action="{{ route('empleados.destroy',$empleado->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('empleados.show',$empleado->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('empleados.edit',$empleado->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                              

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection
