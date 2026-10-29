@extends('layouts.app')

@section('title', 'Editar Tratamiento')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="bi bi-pencil"></i> Editar Tratamiento</h2>
    <a href="{{ route('tratamientos.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Volver</a>
</div>

<div class="card">
    <div class="card-header"><i class="bi bi-pencil"></i> Editar Tratamiento</div>
    <div class="card-body">
        <form action="{{ route('tratamientos.update', $tratamiento->id) }}" method="POST" novalidate>
            @csrf @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="mascota_id" class="form-label">Mascota *</label>
                    <select name="mascota_id" class="form-select @error('mascota_id') is-invalid @enderror" required>
                        <option value="{{ $tratamiento->mascota_id }}">Mascota ID: {{ $tratamiento->mascota_id }}</option>
                    </select>
                    @error('mascota_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="doctor_id" class="form-label">Doctor *</label>
                    <select name="doctor_id" class="form-select @error('doctor_id') is-invalid @enderror" required>
                        <option value="{{ $tratamiento->doctor_id }}">Doctor ID: {{ $tratamiento->doctor_id }}</option>
                    </select>
                    @error('doctor_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="tipo_registro" class="form-label">Tipo Registro *</label>
                    <select name="tipo_registro" class="form-select @error('tipo_registro') is-invalid @enderror" required>
                        <option value="consulta" {{ old('tipo_registro', $tratamiento->tipo_registro) == 'consulta' ? 'selected' : '' }}>Consulta</option>
                        <option value="vacunacion" {{ old('tipo_registro', $tratamiento->tipo_registro) == 'vacunacion' ? 'selected' : '' }}>Vacunación</option>
                        <option value="cirugia" {{ old('tipo_registro', $tratamiento->tipo_registro) == 'cirugia' ? 'selected' : '' }}>Cirugía</option>
                        <option value="tratamiento" {{ old('tipo_registro', $tratamiento->tipo_registro) == 'tratamiento' ? 'selected' : '' }}>Tratamiento</option>
                        <option value="control" {{ old('tipo_registro', $tratamiento->tipo_registro) == 'control' ? 'selected' : '' }}>Control</option>
                    </select>
                    @error('tipo_registro') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="estado_tratamiento" class="form-label">Estado *</label>
                    <select name="estado_tratamiento" class="form-select @error('estado_tratamiento') is-invalid @enderror" required>
                        <option value="activo" {{ old('estado_tratamiento', $tratamiento->estado_tratamiento) == 'activo' ? 'selected' : '' }}>Activo</option>
                        <option value="completado" {{ old('estado_tratamiento', $tratamiento->estado_tratamiento) == 'completado' ? 'selected' : '' }}>Completado</option>
                        <option value="suspendido" {{ old('estado_tratamiento', $tratamiento->estado_tratamiento) == 'suspendido' ? 'selected' : '' }}>Suspendido</option>
                        <option value="cancelado" {{ old('estado_tratamiento', $tratamiento->estado_tratamiento) == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                    </select>
                    @error('estado_tratamiento') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="diagnostico_enfermedad" class="form-label">Diagnóstico</label>
                <input type="text" name="diagnostico_enfermedad" class="form-control" value="{{ old('diagnostico_enfermedad', $tratamiento->diagnostico_enfermedad) }}">
            </div>
            <div class="mb-3">
                <label for="tratamiento_procedimiento" class="form-label">Tratamiento/Procedimiento</label>
                <textarea name="tratamiento_procedimiento" class="form-control" rows="3">{{ old('tratamiento_procedimiento', $tratamiento->tratamiento_procedimiento) }}</textarea>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="fecha_inicio" class="form-label">Fecha Inicio *</label>
                    <input type="date" name="fecha_inicio" class="form-control @error('fecha_inicio') is-invalid @enderror" value="{{ old('fecha_inicio', $tratamiento->fecha_inicio->format('Y-m-d')) }}" required>
                    @error('fecha_inicio') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="fecha_fin" class="form-label">Fecha Fin</label>
                    <input type="date" name="fecha_fin" class="form-control" value="{{ old('fecha_fin', $tratamiento->fecha_fin?->format('Y-m-d')) }}">
                </div>
            </div>
            <div class="mb-3">
                <label for="observaciones" class="form-label">Observaciones</label>
                <textarea name="observaciones" class="form-control" rows="2">{{ old('observaciones', $tratamiento->observaciones) }}</textarea>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Actualizar</button>
                <a href="{{ route('tratamientos.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection
