@extends('layouts.app')

@section('title', 'Editar Historial de Vacuna')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="bi bi-pencil-square"></i> Editar Historial de Vacuna / Desparasitación</h2>
    <a href="{{ route('historial_vacunas.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Volver</a>
</div>

<div class="card shadow-sm">
    <div class="card-header bg-white fw-bold"><i class="bi bi-pencil"></i> Formulario de Edición</div>
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

        <form action="{{ route('historial_vacunas.update', $historialVacuna->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="mascota_id" class="form-label">Mascota *</label>
                    <select name="mascota_id" id="mascota_id" class="form-select @error('mascota_id') is-invalid @enderror" required>
                        <option value="">Seleccionar Mascota</option>
                        @foreach($mascotas as $m)
                            <option value="{{ $m->id }}" {{ old('mascota_id', $historialVacuna->mascota_id) == $m->id ? 'selected' : '' }}>
                                {{ $m->nombre }} ({{ $m->especie }})
                            </option>
                        @endforeach
                    </select>
                    @error('mascota_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="doctor_id" class="form-label">Doctor / Veterinario *</label>
                    <select name="doctor_id" id="doctor_id" class="form-select @error('doctor_id') is-invalid @enderror" required>
                        <option value="">Seleccionar Doctor</option>
                        @foreach($doctores as $d)
                            <option value="{{ $d->id }}" {{ old('doctor_id', $historialVacuna->doctor_id) == $d->id ? 'selected' : '' }}>
                                Dr. {{ $d->nombre ?? $d->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('doctor_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nombre_producto" class="form-label">Nombre del Producto / Vacuna *</label>
                    <input type="text" name="nombre_producto" id="nombre_producto" class="form-control @error('nombre_producto') is-invalid @enderror" value="{{ old('nombre_producto', $historialVacuna->nombre_producto) }}" required>
                    @error('nombre_producto') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="fecha_aplicacion" class="form-label">Fecha Aplicación *</label>
                    <input type="date" name="fecha_aplicacion" id="fecha_aplicacion" class="form-control @error('fecha_aplicacion') is-invalid @enderror" 
                           value="{{ old('fecha_aplicacion', $historialVacuna->fecha_aplicacion ? \Carbon\Carbon::parse($historialVacuna->fecha_aplicacion)->format('Y-m-d') : '') }}" required>
                    @error('fecha_aplicacion') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="fecha_proxima_dosis" class="form-label">Próxima Dosis</label>
                    <input type="date" name="fecha_proxima_dosis" id="fecha_proxima_dosis" class="form-control @error('fecha_proxima_dosis') is-invalid @enderror" 
                           value="{{ old('fecha_proxima_dosis', $historialVacuna->fecha_proxima_dosis ? \Carbon\Carbon::parse($historialVacuna->fecha_proxima_dosis)->format('Y-m-d') : '') }}">
                    @error('fecha_proxima_dosis') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="observaciones" class="form-label">Observaciones</label>
                <textarea name="observaciones" id="observaciones" class="form-control @error('observaciones') is-invalid @enderror" rows="3">{{ old('observaciones', $historialVacuna->observaciones) }}</textarea>
                @error('observaciones') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Actualizar</button>
                <a href="{{ route('historial_vacunas.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection