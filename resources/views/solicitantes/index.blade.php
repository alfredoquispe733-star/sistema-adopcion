@extends('layouts.app')

@section('title', 'Solicitantes')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="bi bi-person-badge"></i> Solicitantes</h2>
    <a href="{{ route('solicitantes.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Nuevo Solicitante</a>
</div>

<div class="card">
    <div class="card-header"><i class="bi bi-table"></i> Listado de Solicitantes</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>CI/DNI</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Tipo Vivienda</th>
                        <th>Mascotas Actuales</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($solicitantes as $s)
                    <tr>
                        <td>{{ $s->id }}</td>
                        <td>{{ $s->nombre }} {{ $s->apellido }}</td>
                        <td>{{ $s->ci_dni }}</td>
                        <td>{{ $s->email }}</td>
                        <td>{{ $s->telefono ?? 'N/A' }}</td>
                        <td>{{ $s->tipo_vivienda ?? 'N/A' }}</td>
                        <td>
                            <span class="badge bg-{{ $s->tiene_mascotas_actuales ? 'warning' : 'success' }}">
                                {{ $s->tiene_mascotas_actuales ? 'Sí' : 'No' }}
                            </span>
                        </td>
                        <td class="text-end">
                            <a href="{{ route('solicitantes.show', $s->id) }}" class="btn btn-sm btn-outline-primary" title="Ver"><i class="bi bi-eye"></i></a>
                            <a href="{{ route('solicitantes.edit', $s->id) }}" class="btn btn-sm btn-outline-warning" title="Editar"><i class="bi bi-pencil"></i></a>
                            <form action="{{ route('solicitantes.destroy', $s->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar este solicitante?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Eliminar"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="8" class="text-center py-4 text-muted">No hay solicitantes registrados</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-end mt-3">
            {{ $solicitantes->links() }}
        </div>
    </div>
</div>
@endsection
