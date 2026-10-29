@extends('layouts.app')

@section('title', 'Editar Usuario')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="bi bi-pencil"></i> Editar Usuario</h2>
    <a href="{{ route('users.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Volver</a>
</div>

<div class="card shadow-sm">
    <div class="card-header bg-white fw-bold"><i class="bi bi-pencil"></i> Editar Usuario</div>
    <div class="card-body">
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('users.update', $user->id) }}" method="POST" novalidate>
            @csrf 
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Nombre *</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required>
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email *</label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required>
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Nueva Contraseña</label>
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                <small class="text-muted">Dejar en blanco para mantener la actual</small>
            </div>

            <div class="mb-3">
                <label for="rol" class="form-label">Rol *</label>
                <select name="rol" id="rol" class="form-select @error('rol') is-invalid @enderror" required>
                    <option value="">Seleccione un rol...</option>
                    <option value="Administrativo" {{ old('rol', $user->rol) == 'Administrativo' ? 'selected' : '' }}>Administrativo</option>
                    <option value="Admin" {{ old('rol', $user->rol) == 'Admin' ? 'selected' : '' }}>Admin</option>
                    <option value="Veterinario" {{ old('rol', $user->rol) == 'Veterinario' ? 'selected' : '' }}>Veterinario</option>
                    <option value="Adoptante" {{ old('rol', $user->rol) == 'Adoptante' ? 'selected' : '' }}>Adoptante</option>
                </select>
                @error('rol') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Actualizar</button>
                <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection