@extends('layouts.app')

@section('title', 'Detalle Seguimiento')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="bi bi-clipboard-check"></i> Seguimiento #{{ $seguimiento->id }}</h2>
    <div>
        <a href="{{ route('seguimientos_adopcion.edit', $seguimiento->id) }}" class="btn btn-warning"><i class="bi bi-pencil"></i> Editar</a>
        <a href="{{ route('seguimientos_adopcion.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Volver</a>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header"><i class="bi bi-info-circle"></i> Información</div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-4">ID</dt>
                    <dd class="col-sm-8">{{ $seguimiento->id }}</dd>
                    <dt class="col-sm-4">Solicitud</dt>
                    <dd class="col-sm-8">{{ $seguimiento->solicitud->solicitante->nombre }} {{ $seguimiento->solicitud->solicitante->apellido }}</dd>
                    <dt class="col-sm-4">Mascota</dt>
                    <dd class="col-sm-8">{{ $seguimiento->solicitud->mascota->nombre }}</dd>
                    <dt class="col-sm-4">Fecha Visita</dt>
                    <dd class="col-sm-8">{{ $seguimiento->fecha_visita->format('d/m/Y') }}</dd>
                    <dt class="col-sm-4">Estado</dt>
                    <dd class="col-sm-8">{{ $seguimiento->estado_mascota }}</dd>
                    <dt class="col-sm-4">Visitador</dt>
                    <dd class="col-sm-8">{{ $seguimiento->visitador->name }}</dd>
                    <dt class="col-sm-4">Registrado</dt>
                    <dd class="col-sm-8">{{ $seguimiento->created_at->format('d/m/Y H:i') }}</dd>
                </dl>
            </div>
        </div>
        @if($seguimiento->fotografia_evidencia)
        <div class="card mt-3">
            <div class="card-header"><i class="bi bi-image"></i> Evidencia Fotográfica</div>
            <div class="card-body text-center">
                <img src="{{ $seguimiento->fotografia_evidencia }}" alt="Evidencia" class="img-fluid rounded" style="max-height: 300px;">
            </div>
        </div>
        @endif
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"><i class="bi bi-heart"></i> Mascota: {{ $seguimiento->solicitud->mascota->nombre }}</div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-3">Nombre</dt>
                    <dd class="col-sm-9">{{ $seguimiento->solicitud->mascota->nombre }} ({{ $seguimiento->solicitud->mascota->especie }})</dd>
                    <dt class="col-sm-3">Raza</dt>
                    <dd class="col-sm-9">{{ $seguimiento->solicitud->mascota->raza }}</dd>
                    <dt class="col-sm-3">Edad</dt>
                    <dd class="col-sm-9">{{ $seguimiento->solicitud->mascota->edad_aproximada }} meses</dd>
                    <dt class="col-sm-3">Sexo</dt>
                    <dd class="col-sm-9">{{ $seguimiento->solicitud->mascota->sexo }}</dd>
                    <dt class="col-sm-3">Estado Mascota</dt>
                    <dd class="col-sm-9">{{ $seguimiento->estado_mascota }}</dd>
                </dl>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header"><i class="bi bi-journal-text"></i> Observaciones</div>
            <div class="card-body">
                <p>{{ $seguimiento->observaciones ?? 'Sin observaciones' }}</p>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header"><i class="bi bi-person"></i> Solicitante</div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-3">Nombre</dt>
                    <dd class="col-sm-9">{{ $seguimiento->solicitud->solicitante->nombre }} {{ $seguimiento->solicitud->solicitante->apellido }}</dd>
                    <dt class="col-sm-3">Email</dt>
                    <dd class="col-sm-9">{{ $seguimiento->solicitud->solicitante->email }}</dd>
                    <dt class="col-sm-3">Teléfono</dt>
                    <dd class="col-sm-9">{{ $seguimiento->solicitud->solicitante->telefono }}</dd>
                    <dt class="col-sm-3">Visitador</dt>
                    <dd class="col-sm-9">{{ $seguimiento->visitador->name }} ({{ $seguimiento->visitador->rol }})</dd>
                </dl>
            </div>
        </div>
    </div>
</div>
@endsection