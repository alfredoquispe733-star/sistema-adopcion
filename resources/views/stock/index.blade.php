@extends('layouts.app')

@section('title', 'Stock')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="bi bi-box-seam"></i> Stock</h2>
    <a href="{{ route('stock.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Nuevo Ítem</a>
</div>

<div class="card">
    <div class="card-header"><i class="bi bi-table"></i> Listado de Stock</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre Ítem</th>
                        <th>Categoría</th>
                        <th>Cantidad</th>
                        <th>Mínima</th>
                        <th>Estado</th>
                        <th>Precio</th>
                        <th>Vencimiento</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($stock as $s)
                    <tr>
                        <td>{{ $s->id }}</td>
                        <td>{{ $s->nombre_item }}</td>
                        <td>{{ $s->categoria ?? 'N/A' }}</td>
                        <td>{{ $s->cantidad_disponible }}</td>
                        <td>{{ $s->cantidad_minima }}</td>
                        <td>
                            <span class="badge bg-{{ $s->estado_stock == 'buen_estado' ? 'success' : ($s->estado_stock == 'bajo_stock' ? 'warning' : 'danger') }}">
                                {{ ucfirst(str_replace('_', ' ', $s->estado_stock)) }}
                            </span>
                        </td>
                        <td>{{ $s->precio_unitario ? '$' . number_format($s->precio_unitario, 2) : 'N/A' }}</td>
                        <td>{{ $s->fecha_vencimiento?->format('d/m/Y') ?? 'N/A' }}</td>
                        <td class="text-end">
                            <a href="{{ route('stock.show', $s->id) }}" class="btn btn-sm btn-outline-primary" title="Ver"><i class="bi bi-eye"></i></a>
                            <a href="{{ route('stock.edit', $s->id) }}" class="btn btn-sm btn-outline-warning" title="Editar"><i class="bi bi-pencil"></i></a>
                            <form action="{{ route('stock.destroy', $s->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar este ítem?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Eliminar"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="9" class="text-center py-4 text-muted">No hay ítems registrados</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-end mt-3">
            {{ $stock->links() }}
        </div>
    </div>
</div>
@endsection
