@extends('layouts.app')

@section('title', 'Donaciones')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="bi bi-gift"></i> Donaciones</h2>
    <a href="{{ route('donaciones.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Nueva Donación
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-header bg-white fw-bold">
        <i class="bi bi-table"></i> Listado de Donaciones
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Donante</th>
                        <th>Identificación</th>
                        <th>Tipo</th>
                        <th>Monto</th>
                        <th>Insumos</th>
                        <th>Fecha</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($donaciones as $d)
                    <tr>
                        <td>{{ $d->id }}</td>
                        <td>{{ $d->donante_nombre }}</td>
                        <td>{{ $d->donante_identificacion }}</td>
                        <td>
                            @php
                                $badgeColor = match($d->tipo_donacion) {
                                    'Monetaria' => 'success',
                                    'Insumos' => 'primary',
                                    'Medicamentos' => 'info',
                                    'Alimentos' => 'warning',
                                    default => 'secondary'
                                };
                            @endphp
                            <span class="badge bg-{{ $badgeColor }}">
                                {{ $d->tipo_donacion }}
                            </span>
                        </td>
                        <td>{{ $d->monto ? '$' . number_format($d->monto, 2) : 'N/A' }}</td>
                        <td>{{ $d->descripcion_insumos ?? 'N/A' }}</td>
                        <td>
                            {{ $d->fecha ? \Carbon\Carbon::parse($d->fecha)->format('d/m/Y') : 'N/R' }}
                        </td>
                        <td class="text-end">
                            <a href="{{ route('donaciones.show', $d->id) }}" class="btn btn-sm btn-outline-primary" title="Ver">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('donaciones.edit', $d->id) }}" class="btn btn-sm btn-outline-warning" title="Editar">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('donaciones.destroy', $d->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar esta donación?')">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Eliminar">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-4 text-muted">
                            <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                            No hay donaciones registradas
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Paginación de Bootstrap -->
        @if(method_exists($donaciones, 'links'))
            <div class="d-flex justify-content-end mt-3">
                {{ $donaciones->links() }}
            </div>
        @endif
    </div>
</div>
@endsection