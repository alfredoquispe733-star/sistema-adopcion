@extends('layouts.app')

@section('title', 'Mascotas')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="bi bi-heart-pulse"></i> Mascotas</h2>
    <a href="{{ route('mascotas.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Nueva Mascota</a>
</div>

<div class="card">
    <div class="card-header"><i class="bi bi-table"></i> Listado de Mascotas</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Especie</th>
                        <th>Raza</th>
                        <th>Foto</th>
                        <th>Edad</th>
                        <th>Sexo</th>
                        <th>Estado</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($mascotas as $m)
                    <tr>
                        <td>{{ $m->id }}</td>
                        <td>{{ $m->nombre }}</td>
                        <td>{{ $m->especie }}</td>
                        <td>{{ $m->raza }}</td>
                        <td>
                            @php
                                // Detecta si la ruta ya viene completa o si está en el storage público
                                $foto = $m->imagen ?? $m->image_url ?? null;
                                $urlFoto = $foto ? (Str::startsWith($foto, ['http://', 'https://', 'storage/']) ? asset($foto) : asset('storage/' . $foto)) : null;
                            @endphp

                            @if($urlFoto)
                                <img src="{{ $urlFoto }}"
                                     onerror="this.onerror=null; this.src='https://via.placeholder.com/40x40?text=Sin+Img';"
                                     alt="{{ $m->nombre }}"
                                     width="40" height="40" class="rounded" style="object-fit: cover;">
                            @else
                                <img src="https://via.placeholder.com/40x40?text=Sin+Img" 
                                     alt="Sin Imagen" 
                                     width="40" height="40" class="rounded" style="object-fit: cover;">
                            @endif
                        </td>
                        <td>{{ $m->edad_aproximada }}</td>
                        <td>{{ $m->sexo }}</td>
                        <td>
                            <span class="badge bg-{{ $m->estado == 'disponible' ? 'success' : ($m->estado == 'en proceso' ? 'warning' : 'secondary') }}">
                                {{ ucfirst($m->estado) }}
                            </span>
                        </td>
                        <td class="text-end">
                            <a href="{{ route('mascotas.show', $m->id) }}" class="btn btn-sm btn-outline-primary" title="Ver"><i class="bi bi-eye"></i></a>
                            <a href="{{ route('mascotas.edit', $m->id) }}" class="btn btn-sm btn-outline-warning" title="Editar"><i class="bi bi-pencil"></i></a>
                            <form action="{{ route('mascotas.destroy', $m->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar esta mascota?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Eliminar"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="9" class="text-center py-4 text-muted">No hay mascotas registradas</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-end mt-3">
            {{ $mascotas->links() }}
        </div>
    </div>
</div>
@endsection