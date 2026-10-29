@extends('layouts.app')

@section('title', 'Nuevo Tratamiento')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="bi bi-activity"></i> Nuevo Tratamiento</h2>
    <a href="{{ route('tratamientos.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Volver</a>
</div>

<div class="card shadow-sm">
    <div class="card-header bg-white fw-bold"><i class="bi bi-plus-circle"></i> Registrar Tratamiento</div>
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

        <form action="{{ route('tratamientos.store') }}" method="POST">
            @csrf
            <div class="row">
                <!-- Mascota -->
                <div class="col-md-6 mb-3">
                    <label for="mascota_id" class="form-label">Mascota *</label>
                    <select name="mascota_id" id="mascota_id" class="form-select @error('mascota_id') is-invalid @enderror" required>
                        <option value="">Seleccionar</option>
                        @foreach($mascotas as $mascota)
                            <option value="{{ $mascota->id }}" {{ old('mascota_id') == $mascota->id ? 'selected' : '' }}>
                                {{ $mascota->nombre }} - {{ $mascota->especie ?? 'N/A' }}
                            </option>
                        @endforeach
                    </select>
                    @error('mascota_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- Doctor -->
                <div class="col-md-6 mb-3">
                    <label for="doctor_id" class="form-label">Doctor *</label>
                    <select name="doctor_id" id="doctor_id" class="form-select @error('doctor_id') is-invalid @enderror" required>
                        <option value="">Seleccionar</option>
                        @foreach($doctores as $doctor)
                            <option value="{{ $doctor->id }}" {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>
                                Dr(a). {{ $doctor->nombre ?? $doctor->name }} {{ $doctor->apellido ?? '' }}
                            </option>
                        @endforeach
                    </select>
                    @error('doctor_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="tipo_registro" class="form-label">Tipo Registro *</label>
                    <select name="tipo_registro" id="tipo_registro" class="form-select @error('tipo_registro') is-invalid @enderror" required>
                        <option value="consulta" {{ old('tipo_registro') == 'consulta' ? 'selected' : '' }}>Consulta</option>
                        <option value="vacunacion" {{ old('tipo_registro') == 'vacunacion' ? 'selected' : '' }}>Vacunación</option>
                        <option value="cirugia" {{ old('tipo_registro') == 'cirugia' ? 'selected' : '' }}>Cirugía</option>
                        <option value="tratamiento" {{ old('tipo_registro') == 'tratamiento' ? 'selected' : '' }}>Tratamiento</option>
                        <option value="control" {{ old('tipo_registro') == 'control' ? 'selected' : '' }}>Control</option>
                    </select>
                    @error('tipo_registro') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="estado_tratamiento" class="form-label">Estado *</label>
                    <select name="estado_tratamiento" id="estado_tratamiento" class="form-select @error('estado_tratamiento') is-invalid @enderror" required>
                        <option value="activo" {{ old('estado_tratamiento') == 'activo' ? 'selected' : '' }}>Activo</option>
                        <option value="completado" {{ old('estado_tratamiento') == 'completado' ? 'selected' : '' }}>Completado</option>
                        <option value="suspendido" {{ old('estado_tratamiento') == 'suspendido' ? 'selected' : '' }}>Suspendido</option>
                        <option value="cancelado" {{ old('estado_tratamiento') == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                    </select>
                    @error('estado_tratamiento') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="diagnostico_enfermedad" class="form-label">Diagnóstico</label>
                <input type="text" name="diagnostico_enfermedad" id="diagnostico_enfermedad" class="form-control @error('diagnostico_enfermedad') is-invalid @enderror" value="{{ old('diagnostico_enfermedad') }}">
                @error('diagnostico_enfermedad') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="tratamiento_procedimiento" class="form-label">Tratamiento/Procedimiento</label>
                <textarea name="tratamiento_procedimiento" id="tratamiento_procedimiento" class="form-control @error('tratamiento_procedimiento') is-invalid @enderror" rows="3">{{ old('tratamiento_procedimiento') }}</textarea>
                @error('tratamiento_procedimiento') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="fecha_inicio" class="form-label">Fecha Inicio *</label>
                    <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control @error('fecha_inicio') is-invalid @enderror" value="{{ old('fecha_inicio') }}" required>
                    @error('fecha_inicio') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="fecha_fin" class="form-label">Fecha Fin</label>
                    <input type="date" name="fecha_fin" id="fecha_fin" class="form-control @error('fecha_fin') is-invalid @enderror" value="{{ old('fecha_fin') }}">
                    @error('fecha_fin') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="observaciones" class="form-label">Observaciones</label>
                <textarea name="observaciones" id="observaciones" class="form-control @error('observaciones') is-invalid @enderror" rows="2">{{ old('observaciones') }}</textarea>
                @error('observaciones') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Guardar Tratamiento</button>
                <a href="{{ route('tratamientos.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection