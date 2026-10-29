@extends('layouts.app')

@section('title', 'Detalle de Donación')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="bi bi-heart-fill text-danger"></i> Donación #{{ $donacion->id }}</h2>
    <div>
        <a href="{{ route('donaciones.edit', $donacion->id) }}" class="btn btn-warning"><i class="bi bi-pencil"></i> Editar</a>
        <a href="{{ route('donaciones.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Volver</a>
    </div>
</div>

<div class="row">
    <div class="col-md-5">
        <div class="card shadow-sm">
            <div class="card-header bg-white fw-bold">
                <i class="bi bi-info-circle"></i> Información General
            </div>
            <div class="card-body">
                @php
                    $badgeColors = [
                        'Monetaria' => 'success',
                        'Insumos' => 'primary',
                        'Medicamentos' => 'info',
                        'Alimentos' => 'warning',
                        'Equipos' => 'secondary',
                    ];
                    $badgeColor = $badgeColors[$donacion->tipo_donacion] ?? 'secondary';
                @endphp

                <dl class="row mb-0">
                    <dt class="col-sm-4">ID</dt>
                    <dd class="col-sm-8">{{ $donacion->id }}</dd>

                    <dt class="col-sm-4">Donante</dt>
                    <dd class="col-sm-8">{{ $donacion->donante_nombre ?? 'Anónimo' }}</dd>

                    <dt class="col-sm-4">Identificación</dt>
                    <dd class="col-sm-8">{{ $donacion->donante_identificacion ?? 'N/A' }}</dd>

                    <dt class="col-sm-4">Contacto</dt>
                    <dd class="col-sm-8">{{ $donacion->donante_contacto ?? 'N/A' }}</dd>

                    <dt class="col-sm-4">Tipo</dt>
                    <dd class="col-sm-8">
                        <span class="badge bg-{{ $badgeColor }}">
                            {{ $donacion->tipo_donacion }}
                        </span>
                    </dd>

                    <dt class="col-sm-4">Monto / Valor</dt>
                    <dd class="col-sm-8 fw-bold text-success">
                        {{ $donacion->monto ? 'Bs. ' . number_format($donacion->monto, 2) : 'N/A' }}
                    </dd>

                    <dt class="col-sm-4">Fecha</dt>
                    <dd class="col-sm-8">
                        {{ $donacion->fecha_donacion ? \Carbon\Carbon::parse($donacion->fecha_donacion)->format('d/m/Y') : 'N/A' }}
                    </dd>

                    <dt class="col-sm-4">Registrado</dt>
                    <dd class="col-sm-8">
                        {{ $donacion->created_at ? $donacion->created_at->format('d/m/Y H:i') : 'N/A' }}
                    </dd>
                </dl>
            </div>
        </div>
    </div>

    <div class="col-md-7">
        <div class="card shadow-sm">
            <div class="card-header bg-white fw-bold">
                <i class="bi bi-box-seam"></i> Descripción / Contenido de la Donación
            </div>
            <div class="card-body">
                <p class="mb-0">{{ $donacion->descripcion ?? 'Sin descripción detallada.' }}</p>
            </div>
        </div>

        @if(isset($donacion->observaciones) && $donacion->observaciones)
        <div class="card shadow-sm mt-3">
            <div class="card-header bg-white fw-bold">
                <i class="bi bi-journal-text"></i> Observaciones Adicionales
            </div>
            <div class="card-body">
                <p class="mb-0">{{ $donacion->observaciones }}</p>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection