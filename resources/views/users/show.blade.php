@extends('layouts.app')

@section('title', 'Detalle Usuario')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="bi bi-people"></i> Usuario #{{ $user->id }}</h2>
    <div>
        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning"><i class="bi bi-pencil"></i> Editar</a>
        <a href="{{ route('users.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Volver</a>
    </div>
</div>

<div class="card">
    <div class="card-header"><i class="bi bi-info-circle"></i> Información</div>
    <div class="card-body">
        <dl class="row">
            <dt class="col-sm-3">ID</dt>
            <dd class="col-sm-9">{{ $user->id }}</dd>
            <dt class="col-sm-3">Nombre</dt>
            <dd class="col-sm-9">{{ $user->name }}</dd>
            <dt class="col-sm-3">Email</dt>
            <dd class="col-sm-9">{{ $user->email }}</dd>
            <dt class="col-sm-3">Rol</dt>
            <dd class="col-sm-9">
                <span class="badge bg-{{ $user->rol == 'admin' ? 'danger' : ($user->rol == 'veterinario' ? 'primary' : 'secondary') }}">
                    {{ ucfirst($user->rol) }}
                </span>
            </dd>
            <dt class="col-sm-3">Email Verificado</dt>
            <dd class="col-sm-9">
                @if($user->email_verified_at)
                    <span class="badge bg-success">Sí</span> ({{ $user->email_verified_at->format('d/m/Y H:i') }})
                @else
                    <span class="badge bg-warning">No</span>
                @endif
            </dd>
            <dt class="col-sm-3">Registrado</dt>
            <dd class="col-sm-9">{{ $user->created_at->format('d/m/Y H:i') }}</dd>
            <dt class="col-sm-3">Actualizado</dt>
            <dd class="col-sm-9">{{ $user->updated_at->format('d/m/Y H:i') }}</dd>
        </dl>
    </div>
</div>
@endsection
