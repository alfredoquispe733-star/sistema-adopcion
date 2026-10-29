@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Panel de Control General</h1>
    </div>

    <div class="row g-4">
        <!-- Tarjeta de ejemplo para un módulo -->
        <div class="col-md-4">
            <div class="card text-white bg-primary shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Mascotas</h5>
                    <p class="card-text">Administra el registro, estado y detalles de las mascotas del refugio.</p>
                    <a href="{{ route('mascotas.index') }}" class="btn btn-light btn-sm">Ir a Mascotas</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-success shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Solicitantes</h5>
                    <p class="card-text">Gestiona la información de las personas interesadas en adopciones.</p>
                    <a href="{{ route('solicitantes.index') }}" class="btn btn-light btn-sm">Ir a Solicitantes</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-warning shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Donaciones</h5>
                    <p class="card-text">Control y registro de donaciones monetarias o en especie.</p>
                    <a href="{{ route('donaciones.index') }}" class="btn btn-light btn-sm">Ir a Donaciones</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection