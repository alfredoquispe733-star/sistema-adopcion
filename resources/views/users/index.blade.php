@extends('layouts.app')

@section('title', 'Lista de Usuarios')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="bi bi-people"></i> Gestión de Usuarios</h2>
    <a href="{{ route('users.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Nuevo Usuario</a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td class="fw-bold">{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        
                        <!-- Columna de Rol con diseño dinámico adaptado a minúsculas -->
                        <td>
                            @php
                                $roleColors = [
                                    'admin'          => 'danger',          // Rojo
                                    'administrativo' => 'primary',         // Azul
                                    'veterinario'    => 'success',         // Verde
                                    'adoptante'      => 'warning text-dark', // Amarillo oscuro
                                ];
                                // Convertimos a minúsculas por seguridad para que coincida con la BD
                                $rolKey = strtolower(trim($user->rol));
                                $badgeClass = $roleColors[$rolKey] ?? 'secondary';
                            @endphp

                            <span class="badge bg-{{ $badgeClass }}">
                                {{ ucfirst($user->rol ?? 'Sin rol') }}
                            </span>
                        </td>

                        <td class="text-end">
                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-info text-white" title="Ver"><i class="bi bi-eye"></i></a>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning" title="Editar"><i class="bi bi-pencil"></i></a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar este usuario?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" title="Eliminar"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">No hay usuarios registrados.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection