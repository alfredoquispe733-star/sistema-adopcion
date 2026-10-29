@extends('layouts.app')

@section('title', 'Nuevo Seguimiento')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="bi bi-plus-circle"></i> Nuevo Seguimiento Post-Adopción</h2>
    <a href="{{ route('seguimientos_adopcion.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Volver</a>
</div>

<div class="card">
    <div class="card-header"><i class="bi bi-plus-circle"></i> Nuevo Seguimiento Post-Adopción</div>
    <div class="card-body">
        <form action="{{ route('seguimientos_adopcion.store') }}" method="POST" novalidate>
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="solicitud_id" class="form-label">Solicitud *</label>
                    <select name="solicitud_id" class="form-select @error('solicitud_id') is-invalid @enderror" required>
                        <option value="">Seleccionar Solicitud Aprobada</option>
                        @foreach($solicitudes as $s)
                            @if($s->estado == 'aprobada')
                                <option value="{{ $s->id }}" {{ old('solicitud_id') == $s->id ? 'selected' : '' }}>
                                    {{ $s->solicitante->nombre }} {{ $s->solicitante->apellido }} - {{ $s->mascota->nombre }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                    @error('solicitud_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="visitador_id" class="form-label">Visitador *</label>
                    <select name="visitador_id" class="form-select @error('visitador_id') is-invalid @enderror" required>
                        <option value="">Seleccionar Visitador</option>
                        @foreach($users as $u)
                            <option value="{{ $u->id }}" {{ old('visitador_id') == $u->id ? 'selected' : '' }}>
                                {{ $u->name }} ({{ $u->rol }})
                            </option>
                        @endforeach
                    </select>
                    @error('visitador_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="fecha_visita" class="form-label">Fecha Visita *</label>
                    <input type="date" name="fecha_visita" class="form-control @error('fecha_visita') is-invalid @enderror" value="{{ old('fecha_visita', now()->format('Y-m-d')) }}" required>
                    @error('fecha_visita') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="estado_mascota" class="form-label">Estado Mascota *</label>
                    <input type="text" name="estado_mascota" class="form-control @error('estado_mascota') is-invalid @enderror" value="{{ old('estado_mascota', 'Bien') }}" required placeholder="Ej: Bien, En observación, Requiere atención">
                    @error('estado_mascota') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="observaciones" class="form-label">Observaciones</label>
                <textarea name="observaciones" class="form-control" rows="3" placeholder="Observaciones sobre el estado de la mascota...">{{ old('observaciones') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="fotografia_evidencia" class="form-label">URL Fotografía Evidencia</label>
                <input type="url" name="fotografia_evidencia" class="form-control" value="{{ old('fotografia_evidencia') }}" placeholder="https://ejemplo.com/foto.jpg">
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Guardar Seguimiento</button>
                <a href="{{ route('seguimientos_adopcion.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection