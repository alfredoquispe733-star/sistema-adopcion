@extends('layouts.app')

@section('title', 'Tratamientos')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="bi bi-activity"></i> Tratamientos</h2>
    <a href="{{ route('tratamientos.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Nuevo Tratamiento</a>
</div>

<div class="card">
    <div class="card-header"><i class="bi bi-table"></i> Listado de Tratamientos</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Mascota</th>
                        <th>Doctor</th>
                        <th>Tipo</th>
                        <th>Diagnóstico</th>
                        <th>Fecha Inicio</th>
                        <th>Estado</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tratamientos as $t)
                    <tr>
                        <td>{{ $t->id }}</td>
                        <td>{{ $t->mascota->nombre ?? 'N/A' }}</td>
                        <td>{{ $t->doctor->nombre ?? 'N/A' }}</td>
                        <td>{{ $t->tipo_registro }}</td>
                        <td>{{ Str::limit($t->diagnostico_enfermedad, 30) }}</td>
                        <td>{{ $t->fecha_inicio->format('d/m/Y') }}</td>
                        <td>
                            <span class="badge bg-{{ $t->estado_tratamiento == 'activo' ? 'success' : ($t->estado_tratamiento == 'completado' ? 'primary' : 'secondary') }}">
                                {{ ucfirst($t->estado_tratamiento) }}
                            </span>
                        </td>
                        <td class="text-end">
                            <a href="{{ route('tratamientos.show', $t->id) }}" class="btn btn-sm btn-outline-primary" title="Ver"><i class="bi bi-eye"></i></a>
                            <a href="{{ route('tratamientos.edit', $t->id) }}" class="btn btn-sm btn-outline-warning" title="Editar"><i class="bi bi-pencil"></i></a>
                            <form action="{{ route('tratamientos.destroy', $t->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar este tratamiento?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Eliminar"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="8" class="text-center py-4 text-muted">No hay tratamientos registrados</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-end mt-3">
            {{ $tratamientos->links() }}
        </div>
    </div>
</div>
@endsection
