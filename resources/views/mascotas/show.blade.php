@extends('layouts.app')

@section('title', 'Detalle Mascota')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="bi bi-heart-pulse"></i> Mascota #{{ $mascota->id }}</h2>
    <div>
        <a href="{{ route('mascotas.edit', $mascota->id) }}" class="btn btn-warning"><i class="bi bi-pencil"></i> Editar</a>
        <a href="{{ route('mascotas.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Volver</a>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header"><i class="bi bi-info-circle"></i> Información</div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-4">ID</dt>
                    <dd class="col-sm-8">{{ $mascota->id }}</dd>
                    <dt class="col-sm-4">Nombre</dt>
                    <dd class="col-sm-8">{{ $mascota->nombre }}</dd>
                    <dt class="col-sm-4">Especie</dt>
                    <dd class="col-sm-8">{{ $mascota->especie }}</dd>
                    <dt class="col-sm-4">Raza</dt>
                    <dd class="col-sm-8">{{ $mascota->raza }}</dd>
                    <dt class="col-sm-4">Edad</dt>
                    <dd class="col-sm-8">{{ $mascota->edad_aproximada }}</dd>
                    <dt class="col-sm-4">Sexo</dt>
                    <dd class="col-sm-8">{{ $mascota->sexo }}</dd>
                    <dt class="col-sm-4">Estado</dt>
                    <dd class="col-sm-8">
                        <span class="badge bg-{{ $mascota->estado == 'disponible' ? 'success' : ($mascota->estado == 'en proceso' ? 'warning' : 'secondary') }}">
                            {{ ucfirst($mascota->estado) }}
                        </span>
                    </dd>
                    <dt class="col-sm-4">Tamaño</dt>
                    <dd class="col-sm-8">{{ $mascota->tamano ?? 'N/A' }}</dd>
                    <dt class="col-sm-4">Nivel Energía</dt>
                    <dd class="col-sm-8">{{ $mascota->nivel_energia ?? 'N/A' }}</dd>
                    <dt class="col-sm-4">Esterilizado</dt>
                    <dd class="col-sm-8">{{ $mascota->es_esterilizado ? 'Sí' : 'No' }}</dd>
                    <dt class="col-sm-4">Fecha Ingreso</dt>
                    <dd class="col-sm-8">{{ $mascota->fecha_ingreso?->format('d/m/Y') ?? 'N/A' }}</dd>
                </dl>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"><i class="bi bi-box"></i> Detalles</div>
            <div class="card-body">
                <div class="mb-3">
                <label class="form-label fw-bold">Fotografía</label>
                <img src="{{ $mascota->image_url }}"
                     onerror="this.onerror=null; this.src='https://via.placeholder.com/250x250?text=Sin+Imagen';"
                     class="img-thumbnail rounded shadow-sm"
                     style="max-width: 250px; max-height: 250px; object-fit: cover;"
                     alt="Foto de {{ $mascota->nombre }}">
            </div>
                @if($mascota->historia_origen)
                <div class="mb-3">
                    <label class="form-label fw-bold">Historia Origen</label>
                    <p>{{ $mascota->historia_origen }}</p>
                </div>
                @endif
                <div class="row">
                    <div class="col-md-4">
                        <div class="p-3 bg-light rounded">
                            <strong>Sociabilidad</strong>
                            <ul class="mb-0">
                                <li>Perros: {{ $mascota->sociable_con_perros ? 'Sí' : 'No' }}</li>
                                <li>Gatos: {{ $mascota->sociable_con_gatos ? 'Sí' : 'No' }}</li>
                                <li>Niños: {{ $mascota->sociable_con_ninos ? 'Sí' : 'No' }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <dl class="row">
                            <dt class="col-sm-4">Registrado</dt>
                            <dd class="col-sm-8">{{ $mascota->created_at->format('d/m/Y H:i') }}</dd>
                            <dt class="col-sm-4">Actualizado</dt>
                            <dd class="col-sm-8">{{ $mascota->updated_at->format('d/m/Y H:i') }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
