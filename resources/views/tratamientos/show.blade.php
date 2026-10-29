@extends('layouts.app')

@section('title', 'Detalle Tratamiento')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="bi bi-activity"></i> Tratamiento #{{ $tratamiento->id }}</h2>
    <div>
        <a href="{{ route('tratamientos.edit', $tratamiento->id) }}" class="btn btn-warning"><i class="bi bi-pencil"></i> Editar</a>
        <a href="{{ route('tratamientos.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Volver</a>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header"><i class="bi bi-info-circle"></i> Información</div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-4">ID</dt>
                    <dd class="col-sm-8">{{ $tratamiento->id }}</dd>
                    <dt class="col-sm-4">Mascota</dt>
                    <dd class="col-sm-8">{{ $tratamiento->mascota->nombre ?? 'N/A' }}</dd>
                    <dt class="col-sm-4">Doctor</dt>
                    <dd class="col-sm-8">{{ $tratamiento->doctor->nombre ?? 'N/A' }}</dd>
                    <dt class="col-sm-4">Tipo</dt>
                    <dd class="col-sm-8">{{ $tratamiento->tipo_registro }}</dd>
                    <dt class="col-sm-4">Estado</dt>
                    <dd class="col-sm-8">
                        <span class="badge bg-{{ $tratamiento->estado_tratamiento == 'activo' ? 'success' : ($tratamiento->estado_tratamiento == 'completado' ? 'primary' : 'secondary') }}">
                            {{ ucfirst($tratamiento->estado_tratamiento) }}
                        </span>
                    </dd>
                    <dt class="col-sm-4">Fecha Inicio</dt>
                    <dd class="col-sm-8">{{ $tratamiento->fecha_inicio->format('d/m/Y') }}</dd>
                    <dt class="col-sm-4">Fecha Fin</dt>
                    <dd class="col-sm-8">{{ $tratamiento->fecha_fin?->format('d/m/Y') ?? 'N/A' }}</dd>
                </dl>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header"><i class="bi bi-journal-text"></i> Detalles</div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-4">Diagnóstico</dt>
                    <dd class="col-sm-8">{{ $tratamiento->diagnostico_enfermedad ?? 'N/A' }}</dd>
                    <dt class="col-sm-4">Procedimiento</dt>
                    <dd class="col-sm-8">{{ $tratamiento->tratamiento_procedimiento ?? 'N/A' }}</dd>
                    <dt class="col-sm-4">Observaciones</dt>
                    <dd class="col-sm-8">{{ $tratamiento->observaciones ?? 'N/A' }}</dd>
                </dl>
            </div>
        </div>
    </div>
</div>
@endsection
