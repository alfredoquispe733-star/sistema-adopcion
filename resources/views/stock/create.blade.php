@extends('layouts.app')

@section('title', 'Nuevo Ítem Stock')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="bi bi-box-seam"></i> Nuevo Ítem Stock</h2>
    <a href="{{ route('stock.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Volver</a>
</div>

<div class="card shadow-sm">
    <div class="card-header bg-white fw-bold"><i class="bi bi-plus-circle"></i> Registrar Ítem</div>
    <div class="card-body">
        
        <!-- Alerta general de errores si los hubiera -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('stock.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nombre_item" class="form-label">Nombre Ítem *</label>
                    <input type="text" name="nombre_item" id="nombre_item" class="form-control @error('nombre_item') is-invalid @enderror" value="{{ old('nombre_item') }}" required>
                    @error('nombre_item') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="categoria" class="form-label">Categoría</label>
                    <input type="text" name="categoria" id="categoria" class="form-control @error('categoria') is-invalid @enderror" value="{{ old('categoria') }}" placeholder="Medicamentos, Alimentos, etc.">
                    @error('categoria') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="cantidad_disponible" class="form-label">Cantidad Disponible *</label>
                    <input type="number" name="cantidad_disponible" id="cantidad_disponible" class="form-control @error('cantidad_disponible') is-invalid @enderror" value="{{ old('cantidad_disponible', 0) }}" min="0" required>
                    @error('cantidad_disponible') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label for="cantidad_minima" class="form-label">Cantidad Mínima</label>
                    <input type="number" name="cantidad_minima" id="cantidad_minima" class="form-control @error('cantidad_minima') is-invalid @enderror" value="{{ old('cantidad_minima', 5) }}" min="0">
                    @error('cantidad_minima') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label for="unidad_medida" class="form-label">Unidad Medida</label>
                    <input type="text" name="unidad_medida" id="unidad_medida" class="form-control @error('unidad_medida') is-invalid @enderror" value="{{ old('unidad_medida') }}" placeholder="unidades, cajas, kg">
                    @error('unidad_medida') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label for="precio_unitario" class="form-label">Precio Unitario</label>
                    <input type="number" step="0.01" name="precio_unitario" id="precio_unitario" class="form-control @error('precio_unitario') is-invalid @enderror" value="{{ old('precio_unitario') }}" min="0">
                    @error('precio_unitario') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="estado_stock" class="form-label">Estado Stock *</label>
                    <select name="estado_stock" id="estado_stock" class="form-select @error('estado_stock') is-invalid @enderror" required>
                        <option value="buen_estado" {{ old('estado_stock') == 'buen_estado' ? 'selected' : '' }}>Buen estado</option>
                        <option value="bajo_stock" {{ old('estado_stock') == 'bajo_stock' ? 'selected' : '' }}>Bajo stock</option>
                        <option value="agotado" {{ old('estado_stock') == 'agotado' ? 'selected' : '' }}>Agotado</option>
                        <option value="reservado" {{ old('estado_stock') == 'reservado' ? 'selected' : '' }}>Reservado</option>
                    </select>
                    @error('estado_stock') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="fecha_vencimiento" class="form-label">Fecha Vencimiento</label>
                    <input type="date" name="fecha_vencimiento" id="fecha_vencimiento" class="form-control @error('fecha_vencimiento') is-invalid @enderror" value="{{ old('fecha_vencimiento') }}">
                    @error('fecha_vencimiento') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="observaciones" class="form-label">Observaciones</label>
                <textarea name="observaciones" id="observaciones" class="form-control @error('observaciones') is-invalid @enderror" rows="2">{{ old('observaciones') }}</textarea>
                @error('observaciones') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Guardar Ítem</button>
                <a href="{{ route('stock.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection