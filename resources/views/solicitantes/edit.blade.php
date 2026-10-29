@extends('layouts.app')

@section('title', 'Editar Solicitante')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="bi bi-pencil"></i> Editar Solicitante</h2>
    <a href="{{ route('solicitantes.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Volver</a>
</div>

<div class="card">
    <div class="card-header"><i class="bi bi-pencil"></i> Editar Solicitante</div>
    <div class="card-body">
        <form action="{{ route('solicitantes.update', $solicitante->id) }}" method="POST" novalidate>
            @csrf @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nombre" class="form-label">Nombre *</label>
                    <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $solicitante->nombre) }}" required>
                    @error('nombre') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="apellido" class="form-label">Apellido *</label>
                    <input type="text" name="apellido" class="form-control @error('apellido') is-invalid @enderror" value="{{ old('apellido', $solicitante->apellido) }}" required>
                    @error('apellido') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="ci_dni" class="form-label">CI/DNI *</label>
                    <input type="text" name="ci_dni" class="form-control @error('ci_dni') is-invalid @enderror" value="{{ old('ci_dni', $solicitante->ci_dni) }}" required>
                    @error('ci_dni') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email *</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $solicitante->email) }}" required>
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" name="telefono" class="form-control" value="{{ old('telefono', $solicitante->telefono) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="tipo_vivienda" class="form-label">Tipo Vivienda</label>
                    <input type="text" name="tipo_vivienda" class="form-control" value="{{ old('tipo_vivienda', $solicitante->tipo_vivienda) }}">
                </div>
            </div>
            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <textarea name="direccion" class="form-control" rows="2">{{ old('direccion', $solicitante->direccion) }}</textarea>
            </div>
            <div class="mb-3">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="tiene_mascotas_actuales" value="1" {{ old('tiene_mascotas_actuales', $solicitante->tiene_mascotas_actuales) ? 'checked' : '' }}>
                    <label class="form-check-label">¿Tiene mascotas actuales?</label>
                </div>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Actualizar</button>
                <a href="{{ route('solicitantes.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection
