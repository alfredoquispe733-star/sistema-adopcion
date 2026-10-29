@extends('layouts.app')

@section('title', 'Nueva Solicitud')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="bi bi-file-earmark-text"></i> Nueva Solicitud</h2>
    <a href="{{ route('solicitudes.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Volver
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-header bg-white fw-bold"><i class="bi bi-plus-circle"></i> Registrar Solicitud</div>
    <div class="card-body">
        <form action="{{ route('solicitudes.store') }}" method="POST">
            @csrf

            <div class="row mb-3">
                <!-- Solicitante -->
                <div class="col-md-6">
                    <label for="solicitante_id" class="form-label">Solicitante *</label>
                    <select name="solicitante_id" id="solicitante_id" class="form-select @error('solicitante_id') is-invalid @enderror" required>
                        <option value="">Seleccionar</option>
                        @foreach($solicitantes as $solicitante)
                            <option value="{{ $solicitante->id }}" {{ old('solicitante_id') == $solicitante->id ? 'selected' : '' }}>
                                {{ $solicitante->nombre }} {{ $solicitante->apellido }} (CI: {{ $solicitante->ci_dni }})
                            </option>
                        @endforeach
                    </select>
                    @error('solicitante_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Mascota -->
                <div class="col-md-6">
                    <label for="mascota_id" class="form-label">Mascota *</label>
                    <select name="mascota_id" id="mascota_id" class="form-select @error('mascota_id') is-invalid @enderror" required>
                        <option value="">Seleccionar</option>
                        @foreach($mascotas as $mascota)
                            <option value="{{ $mascota->id }}" {{ old('mascota_id') == $mascota->id ? 'selected' : '' }}>
                                {{ $mascota->nombre }} - {{ $mascota->especie ?? 'N/A' }}
                            </option>
                        @endforeach
                    </select>
                    @error('mascota_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="tipo_vivienda" class="form-label">Tipo Vivienda *</label>
                    <input type="text" name="tipo_vivienda" id="tipo_vivienda" class="form-control @error('tipo_vivienda') is-invalid @enderror" value="{{ old('tipo_vivienda') }}" required>
                    @error('tipo_vivienda')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="estado" class="form-label">Estado</label>
                    <select name="estado" id="estado" class="form-select @error('estado') is-invalid @enderror">
                        <option value="pendiente" {{ old('estado') == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                        <option value="en evaluacion" {{ old('estado') == 'en evaluacion' ? 'selected' : '' }}>En Evaluación</option>
                        <option value="aprobada" {{ old('estado') == 'aprobada' ? 'selected' : '' }}>Aprobada</option>
                        <option value="rechazada" {{ old('estado') == 'rechazada' ? 'selected' : '' }}>Rechazada</option>
                    </select>
                    @error('estado')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="experiencia_previa" class="form-label">Experiencia Previa *</label>
                <textarea name="experiencia_previa" id="experiencia_previa" rows="3" class="form-control @error('experiencia_previa') is-invalid @enderror" required>{{ old('experiencia_previa') }}</textarea>
                @error('experiencia_previa')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="motivo_adopcion" class="form-label">Motivo Adopción</label>
                <textarea name="motivo_adopcion" id="motivo_adopcion" rows="3" class="form-control @error('motivo_adopcion') is-invalid @enderror">{{ old('motivo_adopcion') }}</textarea>
                @error('motivo_adopcion')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row mb-3 align-items-center">
                <div class="col-md-6">
                    <div class="form-check form-switch mt-4">
                        <input type="hidden" name="tiene_mascotas_actuales" value="0">
                        <input type="checkbox" name="tiene_mascotas_actuales" id="tiene_mascotas_actuales" value="1" class="form-check-input" {{ old('tiene_mascotas_actuales') ? 'checked' : '' }}>
                        <label for="tiene_mascotas_actuales" class="form-check-label">Tiene mascotas actuales</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-check form-switch mt-4">
                        <input type="hidden" name="todos_de_acuerdo" value="0">
                        <input type="checkbox" name="todos_de_acuerdo" id="todos_de_acuerdo" value="1" class="form-check-input" {{ old('todos_de_acuerdo', 1) ? 'checked' : '' }}>
                        <label for="todos_de_acuerdo" class="form-check-label">Todos de acuerdo</label>
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <label for="observacion_admin" class="form-label">Observación Admin</label>
                <textarea name="observacion_admin" id="observacion_admin" rows="2" class="form-control @error('observacion_admin') is-invalid @enderror">{{ old('observacion_admin') }}</textarea>
                @error('observacion_admin')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-end gap-2">
                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Guardar Solicitud</button>
                <a href="{{ route('solicitudes.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection