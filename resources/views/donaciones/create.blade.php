@extends('layouts.app')

@section('title', 'Nueva Donación')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="bi bi-gift"></i> Nueva Donación</h2>
    <a href="{{ route('donaciones.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Volver</a>
</div>

<div class="card">
    <div class="card-header"><i class="bi bi-plus-circle"></i> Registrar Donación</div>
    <div class="card-body">
        <form action="{{ route('donaciones.store') }}" method="POST" novalidate>
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="donante_nombre" class="form-label">Nombre Donante *</label>
                    <input type="text" name="donante_nombre" class="form-control @error('donante_nombre') is-invalid @enderror" value="{{ old('donante_nombre') }}" required>
                    @error('donante_nombre') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="donante_identificacion" class="form-label">Identificación (CI/DNI/RUC)</label>
                    <input type="text" name="donante_identificacion" class="form-control" value="{{ old('donante_identificacion') }}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="tipo_donacion" class="form-label">Tipo Donación *</label>
                    <select name="tipo_donacion" class="form-select @error('tipo_donacion') is-invalid @enderror" required>
                        <option value="">Seleccionar</option>
                        <option value="Monetaria" {{ old('tipo_donacion') == 'Monetaria' ? 'selected' : '' }}>Monetaria</option>
                        <option value="Insumos" {{ old('tipo_donacion') == 'Insumos' ? 'selected' : '' }}>Insumos</option>
                        <option value="Medicamentos" {{ old('tipo_donacion') == 'Medicamentos' ? 'selected' : '' }}>Medicamentos</option>
                        <option value="Alimentos" {{ old('tipo_donacion') == 'Alimentos' ? 'selected' : '' }}>Alimentos</option>
                        <option value="Equipos" {{ old('tipo_donacion') == 'Equipos' ? 'selected' : '' }}>Equipos</option>
                        <option value="Otros" {{ old('tipo_donacion') == 'Otros' ? 'selected' : '' }}>Otros</option>
                    </select>
                    @error('tipo_donacion') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="monto" class="form-label">Monto (si es monetaria)</label>
                    <input type="number" step="0.01" name="monto" class="form-control" value="{{ old('monto') }}" min="0" step="0.01">
                </div>
            </div>
            <div class="mb-3">
                <label for="descripcion_insumos" class="form-label">Descripción Insumos (si es en especie)</label>
                <textarea name="descripcion_insumos" class="form-control" rows="2" placeholder="Descripción detallada de los insumos donados...">{{ old('descripcion_insumos') }}</textarea>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="fecha" class="form-label">Fecha *</label>
                    <input type="date" name="fecha" class="form-control @error('fecha') is-invalid @enderror" value="{{ old('fecha', now()->format('Y-m-d')) }}" required>
                    @error('fecha') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Guardar Donación</button>
                <a href="{{ route('donaciones.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection