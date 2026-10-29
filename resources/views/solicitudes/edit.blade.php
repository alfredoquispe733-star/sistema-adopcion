@extends('layouts.app')

@section('title', 'Editar Solicitud')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="bi bi-pencil"></i> Editar Solicitud</h2>
    <a href="{{ route('solicitudes.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Volver</a>
</div>

<div class="card">
    <div class="card-header"><i class="bi bi-pencil"></i> Editar Solicitud</div>
    <div class="card-body">
        <form action="{{ route('solicitudes.update', $solicitud->id) }}" method="POST" novalidate>
            @csrf @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="solicitante_id" class="form-label">Solicitante *</label>
                    <select name="solicitante_id" class="form-select @error('solicitante_id') is-invalid @enderror" required>
                        <option value="{{ $solicitud->solicitante_id }}">ID: {{ $solicitud->solicitante_id }}</option>
                    </select>
                    @error('solicitante_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="mascota_id" class="form-label">Mascota *</label>
                    <select name="mascota_id" class="form-select @error('mascota_id') is-invalid @enderror" required>
                        <option value="{{ $solicitud->mascota_id }}">ID: {{ $solicitud->mascota_id }}</option>
                    </select>
                    @error('mascota_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="tipo_vivienda" class="form-label">Tipo Vivienda *</label>
                    <input type="text" name="tipo_vivienda" class="form-control @error('tipo_vivienda') is-invalid @enderror" value="{{ old('tipo_vivienda', $solicitud->tipo_vivienda) }}" required>
                    @error('tipo_vivienda') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="estado" class="form-label">Estado</label>
                    <select name="estado" class="form-select">
                        <option value="pendiente" {{ old('estado', $solicitud->estado) == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                        <option value="en evaluacion" {{ old('estado', $solicitud->estado) == 'en evaluacion' ? 'selected' : '' }}>En evaluación</option>
                        <option value="aprobada" {{ old('estado', $solicitud->estado) == 'aprobada' ? 'selected' : '' }}>Aprobada</option>
                        <option value="rechazada" {{ old('estado', $solicitud->estado) == 'rechazada' ? 'selected' : '' }}>Rechazada</option>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="experiencia_previa" class="form-label">Experiencia Previa *</label>
                <textarea name="experiencia_previa" class="form-control @error('experiencia_previa') is-invalid @enderror" rows="3" required>{{ old('experiencia_previa', $solicitud->experiencia_previa) }}</textarea>
                @error('experiencia_previa') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label for="motivo_adopcion" class="form-label">Motivo Adopción</label>
                <textarea name="motivo_adopcion" class="form-control" rows="2">{{ old('motivo_adopcion', $solicitud->motivo_adopcion) }}</textarea>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-check form-switch mt-4">
                        <input class="form-check-input" type="checkbox" name="tiene_mascotas_actuales" value="1" {{ old('tiene_mascotas_actuales', $solicitud->tiene_mascotas_actuales) ? 'checked' : '' }}>
                        <label class="form-check-label">Tiene mascotas actuales</label>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-check form-switch mt-4">
                        <input class="form-check-input" type="checkbox" name="todos_de_acuerdo" value="1" {{ old('todos_de_acuerdo', $solicitud->todos_de_acuerdo) ? 'checked' : '' }}>
                        <label class="form-check-label">Todos de acuerdo</label>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="observacion_admin" class="form-label">Observación Admin</label>
                <textarea name="observacion_admin" class="form-control" rows="2">{{ old('observacion_admin', $solicitud->observacion_admin) }}</textarea>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Actualizar</button>
                <a href="{{ route('solicitudes.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection
