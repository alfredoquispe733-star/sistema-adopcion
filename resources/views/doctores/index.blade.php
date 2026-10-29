@extends('layouts.app')

@section('title', 'Doctores')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="bi bi-stethoscope"></i> Doctores</h2>
    <a href="{{ route('doctores.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Nuevo Doctor</a>
</div>

<div class="card">
    <div class="card-header"><i class="bi bi-table"></i> Listado de Doctores</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Especialidad</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Colegiatura</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($doctores as $d)
                    <tr>
                        <td>{{ $d->id }}</td>
                        <td>{{ $d->nombre }}</td>
                        <td>{{ $d->especialidad ?? 'N/A' }}</td>
                        <td>{{ $d->email ?? 'N/A' }}</td>
                        <td>{{ $d->telefono ?? 'N/A' }}</td>
                        <td>{{ $d->colegiatura ?? 'N/A' }}</td>
                        <td class="text-end">
                            <a href="{{ route('doctores.show', $d->id) }}" class="btn btn-sm btn-outline-primary" title="Ver"><i class="bi bi-eye"></i></a>
                            <a href="{{ route('doctores.edit', $d->id) }}" class="btn btn-sm btn-outline-warning" title="Editar"><i class="bi bi-pencil"></i></a>
                            <form action="{{ route('doctores.destroy', $d->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar este doctor?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Eliminar"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="7" class="text-center py-4 text-muted">No hay doctores registrados</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-end mt-3">
            {{ $doctores->links() }}
        </div>
    </div>
</div>
@endsection
