@extends('layouts.app')

@section('title', 'Historial Vacunal')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="bi bi-capsule"></i> Historial Vacunal / Desparasitación</h2>
    <a href="{{ route('historial_vacunas.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Nuevo Registro
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-header bg-white fw-bold">
        <i class="bi bi-table"></i> Historial Vacunal
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Mascota</th>
                        <th>Tipo</th>
                        <th>Producto</th>
                        <th>Fecha Aplicación</th>
                        <th>Próxima Dosis</th>
                        <th>Doctor</th>
                        <th>Fecha Registro</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($historialVacunas as $h)
                    <tr>
                        <td>{{ $h->id }}</td>
                        <td>
                            <span class="fw-bold">{{ $h->mascota?->nombre ?? 'N/A' }}</span> 
                            <small class="text-muted">({{ $h->mascota?->especie ?? 'N/A' }})</small>
                        </td>
                        <td>
                            @php
                                $badgeColor = ($h->tipo == 'Vacuna') ? 'primary' : 'warning';
                            @endphp
                            <span class="badge bg-{{ $badgeColor }}">
                                {{ $h->tipo }}
                            </span>
                        </td>
                        <td>{{ $h->nombre_producto }}</td>
                        <td>
                            {{ $h->fecha_aplicacion ? \Carbon\Carbon::parse($h->fecha_aplicacion)->format('d/m/Y') : 'N/R' }}
                        </td>
                        <td>
                            {{ $h->fecha_proxima_dosis ? \Carbon\Carbon::parse($h->fecha_proxima_dosis)->format('d/m/Y') : 'N/A' }}
                        </td>
                        <td>{{ $h->doctor?->nombre ?? 'N/A' }}</td>
                        <td>
                            {{ $h->created_at ? $h->created_at->format('d/m/Y') : '-' }}
                        </td>
                        <td class="text-end">
                            <a href="{{ route('historial_vacunas.show', $h->id) }}" class="btn btn-sm btn-outline-primary" title="Ver">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('historial_vacunas.edit', $h->id) }}" class="btn btn-sm btn-outline-warning" title="Editar">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('historial_vacunas.destroy', $h->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar este registro?')">
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
                        <td colspan="9" class="text-center py-4 text-muted">
                            <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                            No hay registros vacunales
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Paginación de Bootstrap -->
        @if(method_exists($historialVacunas, 'links'))
            <div class="d-flex justify-content-end mt-3">
                {{ $historialVacunas->links() }}
            </div>
        @endif
    </div>
</div>
@endsection