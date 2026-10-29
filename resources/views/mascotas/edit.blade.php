@extends('layouts.app')

@section('title', 'Editar Mascota')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="bi bi-pencil"></i> Editar Mascota</h2>
    <a href="{{ route('mascotas.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Volver</a>
</div>

<div class="card">
    <div class="card-header"><i class="bi bi-pencil"></i> Editar Mascota</div>
    <div class="card-body">
        <form action="{{ route('mascotas.update', $mascota->id) }}" method="POST" enctype="multipart/form-data" novalidate>
            @csrf @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nombre" class="form-label">Nombre *</label>
                    <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $mascota->nombre) }}" required>
                    @error('nombre') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="especie" class="form-label">Especie *</label>
                    <input type="text" name="especie" class="form-control @error('especie') is-invalid @enderror" value="{{ old('especie', $mascota->especie) }}" required>
                    @error('especie') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="raza" class="form-label">Raza *</label>
                    <input type="text" name="raza" class="form-control @error('raza') is-invalid @enderror" value="{{ old('raza', $mascota->raza) }}" required>
                    @error('raza') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label for="edad_aproximada" class="form-label">Edad Aprox. *</label>
                    <input type="number" name="edad_aproximada" class="form-control @error('edad_aproximada') is-invalid @enderror" value="{{ old('edad_aproximada', $mascota->edad_aproximada) }}" required>
                    @error('edad_aproximada') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label for="sexo" class="form-label">Sexo *</label>
                    <select name="sexo" class="form-select @error('sexo') is-invalid @enderror" required>
                        <option value="Macho" {{ old('sexo', $mascota->sexo) == 'Macho' ? 'selected' : '' }}>Macho</option>
                        <option value="Hembra" {{ old('sexo', $mascota->sexo) == 'Hembra' ? 'selected' : '' }}>Hembra</option>
                    </select>
                    @error('sexo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="estado" class="form-label">Estado *</label>
                    <select name="estado" class="form-select @error('estado') is-invalid @enderror" required>
                        <option value="disponible" {{ old('estado', $mascota->estado) == 'disponible' ? 'selected' : '' }}>Disponible</option>
                        <option value="en proceso" {{ old('estado', $mascota->estado) == 'en proceso' ? 'selected' : '' }}>En proceso</option>
                        <option value="adoptada" {{ old('estado', $mascota->estado) == 'adoptada' ? 'selected' : '' }}>Adoptada</option>
                    </select>
                    @error('estado') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="tamano" class="form-label">Tamaño</label>
                    <input type="text" name="tamano" class="form-control" value="{{ old('tamano', $mascota->tamano) }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="nivel_energia" class="form-label">Nivel Energía</label>
                    <input type="text" name="nivel_energia" class="form-control" value="{{ old('nivel_energia', $mascota->nivel_energia) }}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="imagen" class="form-label">Fotografía</label>
                    @if($mascota->fotografia)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $mascota->fotografia) }}" alt="Foto actual" style="max-width: 150px; max-height: 150px; object-fit: cover;" class="img-thumbnail rounded">
                            <div class="form-text">Foto actual</div>
                        </div>
                    @endif
                    <input type="file" name="imagen" class="form-control @error('imagen') is-invalid @enderror" accept="image/*">
                    @error('imagen') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    <div class="form-text">Deja vacío para mantener la foto actual. Formatos: JPG, PNG, GIF. Máx. 2MB.</div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="fecha_ingreso" class="form-label">Fecha Ingreso</label>
                    <input type="date" name="fecha_ingreso" class="form-control" value="{{ old('fecha_ingreso', $mascota->fecha_ingreso?->format('Y-m-d')) }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Esterilizado</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="es_esterilizado" value="1" {{ old('es_esterilizado', $mascota->es_esterilizado) ? 'checked' : '' }}>
                        <label class="form-check-label">Sí</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="sociable_con_perros" value="1" {{ old('sociable_con_perros', $mascota->sociable_con_perros) ? 'checked' : '' }}>
                        <label class="form-check-label">Sociable con perros</label>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="sociable_con_gatos" value="1" {{ old('sociable_con_gatos', $mascota->sociable_con_gatos) ? 'checked' : '' }}>
                        <label class="form-check-label">Sociable con gatos</label>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="sociable_con_ninos" value="1" {{ old('sociable_con_ninos', $mascota->sociable_con_ninos) ? 'checked' : '' }}>
                        <label class="form-check-label">Sociable con niños</label>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="historia_origen" class="form-label">Historia Origen</label>
                <textarea name="historia_origen" class="form-control" rows="3">{{ old('historia_origen', $mascota->historia_origen) }}</textarea>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Actualizar</button>
                <a href="{{ route('mascotas.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection
