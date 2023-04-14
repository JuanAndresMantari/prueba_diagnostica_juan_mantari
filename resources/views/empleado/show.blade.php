@extends('layouts.app')

@section('template_title')
    {{ $empleado->name ?? "{{ __('Show') Empleado" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Empleado</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('empleados.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombres:</strong>
                            {{ $empleado->nombres }}
                        </div>
                        <div class="form-group">
                            <strong>Apellidos:</strong>
                            {{ $empleado->apellidos }}
                        </div>
                        <div class="form-group">
                            <strong>Dni:</strong>
                            {{ $empleado->dni }}
                        </div>
                        <div class="form-group">
                            <strong>Correo:</strong>
                            {{ $empleado->correo }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Nacimiento:</strong>
                            {{ $empleado->fecha_nacimiento }}
                        </div>
                        <div class="form-group">
                            <strong>Area:</strong>
                            {{ $empleado->area }}
                        </div>
                        <div class="form-group">
                            <strong>Cargo:</strong>
                            {{ $empleado->cargo }}
                        </div>
                        <div class="form-group">
                            <strong>Local:</strong>
                            {{ $empleado->local }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Inicio:</strong>
                            {{ $empleado->fecha_inicio }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Fin:</strong>
                            {{ $empleado->fecha_fin }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo Contrato:</strong>
                            {{ $empleado->tipo_contrato }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
