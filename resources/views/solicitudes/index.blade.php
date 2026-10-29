@extends('layouts.app')

@section('title', 'Solicitudes')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="bi bi-file-earmark-text"></i> Solicitudes de Adopción</h2>
    <a href="{{ route('solicitudes.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Nueva Solicitud</a>
</div>

<div class="card">
    <div class="card-header"><i class="bi bi-table"></i> Listado de Solicitudes</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Solicitante</th>
                        <th>Mascota</th>
                        <th>Tipo Vivienda</th>
                        <th>Estado</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($solicitudes as $s)
                    <tr>
                        <td>{{ $s->id }}</td>
                        <td>{{ $s->solicitante->nombre ?? 'N/A' }} {{ $s->solicitante->apellido ?? '' }}</td>
                        <td>{{ $s->mascota->nombre ?? 'N/A' }}</td>
                        <td>{{ $s->tipo_vivienda }}</td>
                        <td>
                            <span class="badge bg-{{ $s->estado == 'aprobada' ? 'success' : ($s->estado == 'rechazada' ? 'danger' : ($s->estado == 'en evaluacion' ? 'warning' : 'secondary')) }}">
                                {{ ucfirst(str_replace('_', ' ', $s->estado)) }}
                            </span>
                        </td>
                        <td class="text-end">
                            <a href="{{ route('solicitudes.show', $s->id) }}" class="btn btn-sm btn-outline-primary" title="Ver"><i class="bi bi-eye"></i></a>
                            <a href="{{ route('solicitudes.edit', $s->id) }}" class="btn btn-sm btn-outline-warning" title="Editar"><i class="bi bi-pencil"></i></a>
                            <form action="{{ route('solicitudes.destroy', $s->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar esta solicitud?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Eliminar"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="6" class="text-center py-4 text-muted">No hay solicitudes registradas</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-end mt-3">
            {{ $solicitudes->links() }}
        </div>
    </div>
</div>
@endsection
