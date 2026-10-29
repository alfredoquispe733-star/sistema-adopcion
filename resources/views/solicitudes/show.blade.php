@extends('layouts.app')

@section('title', 'Detalle Solicitud')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="bi bi-file-earmark-text"></i> Solicitud #{{ $solicitud->id }}</h2>
    <div>
        <a href="{{ route('solicitudes.edit', $solicitud) }}" class="btn btn-warning">
            <i class="bi bi-pencil"></i> Editar
        </a>
        <a href="{{ route('solicitudes.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Volver
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white fw-bold"><i class="bi bi-info-circle"></i> Información</div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-4">ID</dt>
                    <dd class="col-sm-8">{{ $solicitud->id }}</dd>
                    
                    <dt class="col-sm-4">Solicitante</dt>
                    <dd class="col-sm-8">{{ $solicitud->solicitante->nombre ?? 'N/A' }} {{ $solicitud->solicitante->apellido ?? '' }}</dd>
                    
                    <dt class="col-sm-4">Mascota</dt>
                    <dd class="col-sm-8">{{ $solicitud->mascota->nombre ?? 'N/A' }}</dd>
                    
                    <dt class="col-sm-4">Tipo Vivienda</dt>
                    <dd class="col-sm-8">{{ $solicitud->tipo_vivienda }}</dd>
                    
                    <dt class="col-sm-4">Estado</dt>
                    <dd class="col-sm-8">
                        @php
                            $badgeColor = match($solicitud->estado) {
                                'aprobada' => 'success',
                                'rechazada' => 'danger',
                                'en evaluacion' => 'warning',
                                default => 'secondary'
                            };
                        @endphp
                        <span class="badge bg-{{ $badgeColor }}">
                            {{ ucfirst(str_replace('_', ' ', $solicitud->estado)) }}
                        </span>
                    </dd>
                    
                    <dt class="col-sm-4">Presupuesto Mensual</dt>
                    <dd class="col-sm-8">{{ $solicitud->presupuesto_estimado_mensual ? '$' . number_format($solicitud->presupuesto_estimado_mensual, 2) : 'N/A' }}</dd>
                </dl>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white fw-bold"><i class="bi bi-journal-text"></i> Detalles</div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-4">Experiencia Previa</dt>
                    <dd class="col-sm-8">{{ $solicitud->experiencia_previa }}</dd>
                    
                    <dt class="col-sm-4">Motivo Adopción</dt>
                    <dd class="col-sm-8">{{ $solicitud->motivo_adopcion ?? 'N/A' }}</dd>
                    
                    <dt class="col-sm-4">Observación Admin</dt>
                    <dd class="col-sm-8">{{ $solicitud->observacion_admin ?? 'N/A' }}</dd>
                    
                    <dt class="col-sm-4">Mascotas Actuales</dt>
                    <dd class="col-sm-8">{{ $solicitud->tiene_mascotas_actuales ? 'Sí' : 'No' }}</dd>
                    
                    <dt class="col-sm-4">Todos de Acuerdo</dt>
                    <dd class="col-sm-8">{{ $solicitud->todos_de_acuerdo ? 'Sí' : 'No' }}</dd>
                </dl>
            </div>
        </div>
    </div>
</div>
@endsection