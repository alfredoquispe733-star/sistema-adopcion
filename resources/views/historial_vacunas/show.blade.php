@extends('layouts.app')

@section('title', 'Detalle Registro Vacunal')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="bi bi-capsule"></i> Registro Vacunal #{{ $historialVacuna->id }}</h2>
    <div>
        <a href="{{ route('historial_vacunas.edit', $historialVacuna->id) }}" class="btn btn-warning"><i class="bi bi-pencil"></i> Editar</a>
        <a href="{{ route('historial_vacunas.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Volver</a>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header"><i class="bi bi-info-circle"></i> Información</div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-4">ID</dt>
                    <dd class="col-sm-8">{{ $historialVacuna->id }}</dd>
                    <dt class="col-sm-4">Mascota</dt>
                    <dd class="col-sm-8">{{ $historialVacuna->mascota->nombre }} ({{ $historialVacuna->mascota->especie }})</dd>
                    <dt class="col-sm-4">Tipo</dt>
                    <dd class="col-sm-8">
                        <span class="badge bg-{{ $historialVacuna->tipo == 'Vacuna' ? 'primary' : 'warning' }}">
                            {{ $historialVacuna->tipo }}
                        </span>
                    </dd>
                    <dt class="col-sm-4">Producto</dt>
                    <dd class="col-sm-8">{{ $historialVacuna->nombre_producto }}</dd>
                    <dt class="col-sm-4">Fecha Aplicación</dt>
                    <dd class="col-sm-8">{{ $historialVacuna->fecha_aplicacion->format('d/m/Y') }}</dd>
                    <dt class="col-sm-4">Próx. Dosis</dt>
                    <dd class="col-sm-8">{{ $historialVacuna->fecha_proxima_dosis?->format('d/m/Y') ?? 'N/A' }}</dd>
                    <dt class="col-sm-4">Doctor</dt>
                    <dd class="col-sm-8">{{ $historialVacuna->doctor->nombre ?? 'N/A' }}</dd>
                    <dt class="col-sm-4">Registrado</dt>
                    <dd class="col-sm-8">{{ $historialVacuna->created_at->format('d/m/Y H:i') }}</dd>
                </dl>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"><i class="bi bi-heart-pulse"></i> Detalles de la Mascota</div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-3">Nombre</dt>
                    <dd class="col-sm-9">{{ $historialVacuna->mascota->nombre }} ({{ $historialVacuna->mascota->especie }})</dd>
                    <dt class="col-sm-3">Raza</dt>
                    <dd class="col-sm-9">{{ $historialVacuna->mascota->raza }}</dd>
                    <dt class="col-sm-3">Edad</dt>
                    <dd class="col-sm-9">{{ $historialVacuna->mascota->edad_aproximada }} meses</dd>
                    <dt class="col-sm-3">Sexo</dt>
                    <dd class="col-sm-9">{{ $historialVacuna->mascota->sexo }}</dd>
                </dl>
            </div>
        </div>
    </div>
</div>
@endsection