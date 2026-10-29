@extends('layouts.app')

@section('title', 'Editar Ítem Stock')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="bi bi-pencil"></i> Editar Ítem Stock</h2>
    <a href="{{ route('stock.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Volver</a>
</div>

<div class="card">
    <div class="card-header"><i class="bi bi-pencil"></i> Editar Ítem</div>
    <div class="card-body">
        <form action="{{ route('stock.update', $stock->id) }}" method="POST" novalidate>
            @csrf @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nombre_item" class="form-label">Nombre Ítem *</label>
                    <input type="text" name="nombre_item" class="form-control @error('nombre_item') is-invalid @enderror" value="{{ old('nombre_item', $stock->nombre_item) }}" required>
                    @error('nombre_item') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="categoria" class="form-label">Categoría</label>
                    <input type="text" name="categoria" class="form-control" value="{{ old('categoria', $stock->categoria) }}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="cantidad_disponible" class="form-label">Cantidad Disponible</label>
                    <input type="number" name="cantidad_disponible" class="form-control" value="{{ old('cantidad_disponible', $stock->cantidad_disponible) }}" min="0">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="cantidad_minima" class="form-label">Cantidad Mínima</label>
                    <input type="number" name="cantidad_minima" class="form-control" value="{{ old('cantidad_minima', $stock->cantidad_minima) }}" min="0">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="unidad_medida" class="form-label">Unidad Medida</label>
                    <input type="text" name="unidad_medida" class="form-control" value="{{ old('unidad_medida', $stock->unidad_medida) }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="precio_unitario" class="form-label">Precio Unitario</label>
                    <input type="number" step="0.01" name="precio_unitario" class="form-control" value="{{ old('precio_unitario', $stock->precio_unitario) }}" min="0">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="estado_stock" class="form-label">Estado Stock</label>
                    <select name="estado_stock" class="form-select">
                        <option value="buen_estado" {{ old('estado_stock', $stock->estado_stock) == 'buen_estado' ? 'selected' : '' }}>Buen estado</option>
                        <option value="bajo_stock" {{ old('estado_stock', $stock->estado_stock) == 'bajo_stock' ? 'selected' : '' }}>Bajo stock</option>
                        <option value="agotado" {{ old('estado_stock', $stock->estado_stock) == 'agotado' ? 'selected' : '' }}>Agotado</option>
                        <option value="reservado" {{ old('estado_stock', $stock->estado_stock) == 'reservado' ? 'selected' : '' }}>Reservado</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="fecha_vencimiento" class="form-label">Fecha Vencimiento</label>
                    <input type="date" name="fecha_vencimiento" class="form-control" value="{{ old('fecha_vencimiento', $stock->fecha_vencimiento?->format('Y-m-d')) }}">
                </div>
            </div>
            <div class="mb-3">
                <label for="observaciones" class="form-label">Observaciones</label>
                <textarea name="observaciones" class="form-control" rows="2">{{ old('observaciones', $stock->observaciones) }}</textarea>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Actualizar</button>
                <a href="{{ route('stock.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection
