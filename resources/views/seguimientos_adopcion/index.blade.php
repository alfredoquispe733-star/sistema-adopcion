@extends('layouts.app')

@section('title', 'Seguimientos de Adopción')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="bi bi-clipboard-check"></i> Seguimientos Post-Adopción</h2>
    <a href="{{ route('seguimientos_adopcion.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Nuevo Seguimiento
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-header bg-white fw-bold">
        <i class="bi bi-table"></i> Listado de Seguimientos Post-Adopción
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Solicitante</th>
                        <th>Mascota</th>
                        <th>Fecha Visita</th>
                        <th>Estado Mascota</th>
                        <th>Visitador</th>
                        <th>Fecha Registro</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($seguimientos as $s)
                    <tr>
                        <td>{{ $s->id }}</td>
                        <td>
                            {{ $s->solicitud?->solicitante?->nombre ?? 'Sin datos' }} 
                            {{ $s->solicitud?->solicitante?->apellido }}
                        </td>
                        <td>
                            <span class="badge bg-info text-dark">
                                {{ $s->solicitud?->mascota?->nombre ?? 'N/A' }}
                            </span>
                        </td>
                        <td>
                            {{ $s->fecha_visita ? \Carbon\Carbon::parse($s->fecha_visita)->format('d/m/Y') : 'N/R' }}
                        </td>
                        <td>
                            <span class="badge bg-secondary">{{ $s->estado_mascota ?? 'No registrado' }}</span>
                        </td>
                        <td>{{ $s->visitador?->name ?? 'Sin asignar' }}</td>
                        <td>
                            {{ $s->created_at ? $s->created_at->format('d/m/Y') : '-' }}
                        </td>
                        <td class="text-end">
                            <a href="{{ route('seguimientos_adopcion.show', $s->id) }}" class="btn btn-sm btn-outline-primary" title="Ver">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('seguimientos_adopcion.edit', $s->id) }}" class="btn btn-sm btn-outline-warning" title="Editar">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('seguimientos_adopcion.destroy', $s->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar este seguimiento?')">
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
                            No hay seguimientos registrados
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if(method_exists($seguimientos, 'links'))
            <div class="d-flex justify-content-end mt-3">
                {{ $seguimientos->links() }}
            </div>
        @endif
    </div>
</div>
@endsection