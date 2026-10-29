<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'DOLA Hogar de Esperanza')</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    @stack('styles')
</head>
<body class="bg-light">

    @guest
        <!-- SI NO HAY SESIÓN INICIADA: Muestra solo la vista de Login ampliada -->
        <div class="container d-flex justify-content-center align-items-center min-vh-100 py-5">
            <div class="w-100" style="max-width: 580px;">
                @yield('content')
            </div>
        </div>
    @endguest

    @auth
        <!-- SI HAY SESIÓN INICIADA: Se muestra el Sidebar y todo el Panel de Control -->
        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar / Menú Lateral -->
                <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse text-white min-vh-100 p-3">
                    <div class="position-sticky d-flex flex-column h-100">
                        
                        <h4 class="text-center py-3 text-info fs-5 fw-bold">🐾 DOLA Hogar de Esperanza</h4>
                        
                        <!-- Info del usuario autenticado -->
                        <div class="bg-secondary bg-opacity-25 p-2 rounded text-center mb-3">
                            <small class="d-block text-light"><i class="bi bi-person-circle"></i> {{ Auth::user()->name }}</small>
                            <span class="badge bg-primary text-capitalize mt-1">{{ Auth::user()->rol ?? 'Usuario' }}</span>
                        </div>

                        <hr>

                        <ul class="nav flex-column gap-1">
                            <li class="nav-item">
                                <a class="nav-link text-white {{ request()->is('/') ? 'active bg-primary rounded' : '' }}" href="{{ url('/') }}">
                                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white {{ request()->is('users*') ? 'active bg-primary rounded' : '' }}" href="{{ route('users.index') }}">
                                    <i class="bi bi-people me-2"></i> Usuarios
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white {{ request()->is('solicitantes*') ? 'active bg-primary rounded' : '' }}" href="{{ route('solicitantes.index') }}">
                                    <i class="bi bi-person-badge me-2"></i> Solicitantes
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white {{ request()->is('doctores*') ? 'active bg-primary rounded' : '' }}" href="{{ route('doctores.index') }}">
                                    <i class="bi bi-hospital me-2"></i> Doctores
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white {{ request()->is('mascotas*') ? 'active bg-primary rounded' : '' }}" href="{{ route('mascotas.index') }}">
                                    <i class="bi bi-shield-shaded me-2"></i> Mascotas
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white {{ request()->is('stock*') ? 'active bg-primary rounded' : '' }}" href="{{ route('stock.index') }}">
                                    <i class="bi bi-box-seam me-2"></i> Stock
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white {{ request()->is('tratamientos*') ? 'active bg-primary rounded' : '' }}" href="{{ route('tratamientos.index') }}">
                                    <i class="bi bi-capsule me-2"></i> Tratamientos
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white {{ request()->is('solicitudes*') ? 'active bg-primary rounded' : '' }}" href="{{ route('solicitudes.index') }}">
                                    <i class="bi bi-card-checklist me-2"></i> Solicitudes
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white {{ request()->is('historial_vacunas*') ? 'active bg-primary rounded' : '' }}" href="{{ route('historial_vacunas.index') }}">
                                    <i class="bi bi-journal-medical me-2"></i> Historial Vacunas
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white {{ request()->is('seguimientos_adopcion*') ? 'active bg-primary rounded' : '' }}" href="{{ route('seguimientos_adopcion.index') }}">
                                    <i class="bi bi-heart me-2"></i> Seguimiento Adopción
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white {{ request()->is('donaciones*') ? 'active bg-primary rounded' : '' }}" href="{{ route('donaciones.index') }}">
                                    <i class="bi bi-cash-coin me-2"></i> Donaciones
                                </a>
                            </li>
                        </ul>

                        <hr class="mt-auto">

                        <!-- Botón de Cerrar Sesión -->
                        <form action="{{ route('logout') }}" method="POST" class="d-grid pb-3">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger text-start">
                                <i class="bi bi-box-arrow-right me-2"></i> Cerrar Sesión
                            </button>
                        </form>

                    </div>
                </nav>

                <!-- Contenido Principal -->
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                    @yield('content')
                </main>
            </div>
        </div>
    @endauth

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Renderiza los scripts enviados desde otras vistas con @push('scripts') -->
    @stack('scripts')
</body>
</html>