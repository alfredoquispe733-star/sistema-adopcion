@extends('layouts.app')

@section('title', 'Detalle Doctor')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="bi bi-stethoscope"></i> Doctor #{{ $doctor->id }}</h2>
    <div>
        <a href="{{ route('doctores.edit', $doctor->id) }}" class="btn btn-warning"><i class="bi bi-pencil"></i> Editar</a>
        <a href="{{ route('doctores.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Volver</a>
    </div>
</div>

<div class="card">
    <div class="card-header"><i class="bi bi-info-circle"></i> Información</div>
    <div class="card-body">
        <dl class="row">
            <dt class="col-sm-3">ID</dt>
            <dd class="col-sm-9">{{ $doctor->id }}</dd>
            <dt class="col-sm-3">Nombre</dt>
            <dd class="col-sm-9">{{ $doctor->nombre }}</dd>
            <dt class="col-sm-3">Especialidad</dt>
            <dd class="col-sm-9">{{ $doctor->especialidad ?? 'N/A' }}</dd>
            <dt class="col-sm-3">Email</dt>
            <dd class="col-sm-9">{{ $doctor->email ?? 'N/A' }}</dd>
            <dt class="col-sm-3">Teléfono</dt>
            <dd class="col-sm-9">{{ $doctor->telefono ?? 'N/A' }}</dd>
            <dt class="col-sm-3">Colegiatura</dt>
            <dd class="col-sm-9">{{ $doctor->colegiatura ?? 'N/A' }}</dd>
            <dt class="col-sm-3">Registrado</dt>
            <dd class="col-sm-9">{{ $doctor->created_at->format('d/m/Y H:i') }}</dd>
        </dl>
    </div>
</div>
@endsection
