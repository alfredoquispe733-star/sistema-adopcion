@extends('layouts.app')

@section('title', 'Detalle Solicitante')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="bi bi-person-badge"></i> Solicitante #{{ $solicitante->id }}</h2>
    <div>
        <a href="{{ route('solicitantes.edit', $solicitante->id) }}" class="btn btn-warning"><i class="bi bi-pencil"></i> Editar</a>
        <a href="{{ route('solicitantes.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Volver</a>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header"><i class="bi bi-info-circle"></i> Información Personal</div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-4">ID</dt>
                    <dd class="col-sm-8">{{ $solicitante->id }}</dd>
                    <dt class="col-sm-4">Nombre</dt>
                    <dd class="col-sm-8">{{ $solicitante->nombre }} {{ $solicitante->apellido }}</dd>
                    <dt class="col-sm-4">CI/DNI</dt>
                    <dd class="col-sm-8">{{ $solicitante->ci_dni }}</dd>
                    <dt class="col-sm-4">Email</dt>
                    <dd class="col-sm-8">{{ $solicitante->email }}</dd>
                    <dt class="col-sm-4">Teléfono</dt>
                    <dd class="col-sm-8">{{ $solicitante->telefono ?? 'N/A' }}</dd>
                    <dt class="col-sm-4">Dirección</dt>
                    <dd class="col-sm-8">{{ $solicitante->direccion ?? 'N/A' }}</dd>
                    <dt class="col-sm-4">Tipo Vivienda</dt>
                    <dd class="col-sm-8">{{ $solicitante->tipo_vivienda ?? 'N/A' }}</dd>
                    <dt class="col-sm-4">Mascotas Actuales</dt>
                    <dd class="col-sm-8">
                        <span class="badge bg-{{ $solicitante->tiene_mascotas_actuales ? 'warning' : 'success' }}">
                            {{ $solicitante->tiene_mascotas_actuales ? 'Sí' : 'No' }}
                        </span>
                    </dd>
                </dl>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header"><i class="bi bi-clock-history"></i> Información del Sistema</div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-4">Registrado</dt>
                    <dd class="col-sm-8">{{ $solicitante->created_at->format('d/m/Y H:i') }}</dd>
                    <dt class="col-sm-4">Actualizado</dt>
                    <dd class="col-sm-8">{{ $solicitante->updated_at->format('d/m/Y H:i') }}</dd>
                </dl>
            </div>
        </div>
    </div>
</div>
@endsection
