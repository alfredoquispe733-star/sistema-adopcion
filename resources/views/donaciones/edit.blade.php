@extends('layouts.app')

@section('title', 'Editar Donación')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="bi bi-pencil-square"></i> Editar Donación #{{ $donacion->id }}</h2>
    <a href="{{ route('donaciones.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Volver</a>
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

        <form action="{{ route('donaciones.update', $donacion->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo de Donación *</label>
                <select name="tipo" id="tipo" class="form-select @error('tipo') is-invalid @enderror" required>
                    <option value="">Seleccione...</option>
                    <option value="Monetaria" {{ old('tipo', $donacion->tipo) == 'Monetaria' ? 'selected' : '' }}>Monetaria</option>
                    <option value="Insumos" {{ old('tipo', $donacion->tipo) == 'Insumos' ? 'selected' : '' }}>Insumos</option>
                    <option value="Medicamentos" {{ old('tipo', $donacion->tipo) == 'Medicamentos' ? 'selected' : '' }}>Medicamentos</option>
                    <option value="Alimentos" {{ old('tipo', $donacion->tipo) == 'Alimentos' ? 'selected' : '' }}>Alimentos</option>
                    <option value="Equipos" {{ old('tipo', $donacion->tipo) == 'Equipos' ? 'selected' : '' }}>Equipos</option>
                </select>
                @error('tipo') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="monto" class="form-label">Monto (Si es monetaria)</label>
                <input type="number" step="0.01" name="monto" id="monto" class="form-control @error('monto') is-invalid @enderror" value="{{ old('monto', $donacion->monto) }}">
                @error('monto') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="descripcion_insumos" class="form-label">Descripción de Insumos / Detalles</label>
                <textarea name="descripcion_insumos" id="descripcion_insumos" class="form-control @error('descripcion_insumos') is-invalid @enderror" rows="2">{{ old('descripcion_insumos', $donacion->descripcion_insumos) }}</textarea>
                @error('descripcion_insumos') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="fecha" class="form-label">Fecha *</label>
                    <input type="date" name="fecha" id="fecha" class="form-control @error('fecha') is-invalid @enderror" 
                           value="{{ old('fecha', $donacion->fecha ? \Carbon\Carbon::parse($donacion->fecha)->format('Y-m-d') : '') }}" required>
                    @error('fecha') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Actualizar</button>
                <a href="{{ route('donaciones.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection