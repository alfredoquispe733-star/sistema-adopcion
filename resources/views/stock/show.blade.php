@extends('layouts.app')

@section('title', 'Detalle Stock')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="bi bi-box-seam"></i> Ítem #{{ $stock->id }}</h2>
    <div>
        <a href="{{ route('stock.edit', $stock->id) }}" class="btn btn-warning"><i class="bi bi-pencil"></i> Editar</a>
        <a href="{{ route('stock.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Volver</a>
    </div>
</div>

<div class="card">
    <div class="card-header"><i class="bi bi-info-circle"></i> Información</div>
    <div class="card-body">
        <dl class="row">
            <dt class="col-sm-3">ID</dt>
            <dd class="col-sm-9">{{ $stock->id }}</dd>
            <dt class="col-sm-3">Nombre Ítem</dt>
            <dd class="col-sm-9">{{ $stock->nombre_item }}</dd>
            <dt class="col-sm-3">Categoría</dt>
            <dd class="col-sm-9">{{ $stock->categoria ?? 'N/A' }}</dd>
            <dt class="col-sm-3">Cantidad Disponible</dt>
            <dd class="col-sm-9">{{ $stock->cantidad_disponible }}</dd>
            <dt class="col-sm-3">Cantidad Mínima</dt>
            <dd class="col-sm-9">{{ $stock->cantidad_minima }}</dd>
            <dt class="col-sm-3">Unidad Medida</dt>
            <dd class="col-sm-9">{{ $stock->unidad_medida ?? 'N/A' }}</dd>
            <dt class="col-sm-3">Estado Stock</dt>
            <dd class="col-sm-9">
                <span class="badge bg-{{ $stock->estado_stock == 'buen_estado' ? 'success' : ($stock->estado_stock == 'bajo_stock' ? 'warning' : 'danger') }}">
                    {{ ucfirst(str_replace('_', ' ', $stock->estado_stock)) }}
                </span>
            </dd>
            <dt class="col-sm-3">Precio Unitario</dt>
            <dd class="col-sm-9">{{ $stock->precio_unitario ? '$' . number_format($stock->precio_unitario, 2) : 'N/A' }}</dd>
            <dt class="col-sm-3">Fecha Vencimiento</dt>
            <dd class="col-sm-9">{{ $stock->fecha_vencimiento?->format('d/m/Y') ?? 'N/A' }}</dd>
            <dt class="col-sm-3">Observaciones</dt>
            <dd class="col-sm-9">{{ $stock->observaciones ?? 'N/A' }}</dd>
        </dl>
    </div>
</div>
@endsection
