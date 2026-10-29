<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOLA - Hogar de Esperanza</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://images.unsplash.com/photo-1548199973-03cce0bbc87b?auto=format&fit=crop&w=1400&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 120px 0;
        }
        /* Imagen ocupando exactamente la mitad izquierda de la tarjeta */
        .card-img-half {
            width: 100%;
            height: 100%;
            object-fit: cover;
            min-height: 240px;
        }
        .card-mascota {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none;
            border-radius: 15px;
            overflow: hidden;
        }
        .card-mascota:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(0,0,0,0.15) !important;
        }
        .filter-btn.active {
            background-color: #0d6efd !important;
            color: white !important;
        }
    </style>
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="#">
                <img src="{{ asset('storage/logotipo/logotipo.jpg') }}" alt="DOLA - Hogar de Esperanza" height="40" width="40" style="object-fit: cover;" class="rounded-circle border border-2 border-primary shadow-sm">
                <span class="fw-bold text-primary fs-4 d-none d-md-inline">
                    <span class="text-primary">DOLA</span> <span class="text-dark">Hogar de Esperanza</span>
                </span>
                <span class="fw-bold text-primary fs-5 d-md-none">DOLA</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto me-3 mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" href="#inicio">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#mascotas">Mascotas en Adopción</a></li>
                    <li class="nav-item"><a class="nav-link" href="#nosotros">Nosotros</a></li>
                    <li class="nav-item"><a class="nav-link" href="#testimonios">Testimonios</a></li>
                    <li class="nav-item"><a class="nav-link" href="#donar">Donaciones</a></li>
                </ul>
                <a href="{{ route('login') }}" class="btn btn-primary px-4 rounded-pill shadow-sm">
                    <i class="bi bi-box-arrow-in-right me-1"></i> Ingresar al Sistema
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header id="inicio" class="hero-section text-center">
        <div class="container py-4">
            <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fs-6 mb-3">Refugio de Animales</span>
            <h1 class="display-3 fw-bold mb-3">Dale un hogar lleno de amor</h1>
            <p class="lead mb-4 col-md-8 mx-auto">Rescatamos, rehabilitamos y buscamos familias responsables para nuestros peluditos rescatados en Tarija.</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="#mascotas" class="btn btn-warning btn-lg px-4 rounded-pill text-white fw-bold shadow">
                    <i class="bi bi-heart-fill me-1"></i> Ver Mascotas
                </a>
                <button type="button" class="btn btn-outline-light btn-lg px-4 rounded-pill" data-bs-toggle="modal" data-bs-target="#modalDonacion">
                    <i class="bi bi-cash-coin me-1"></i> Apoyar con Donación
                </button>
            </div>
        </div>
    </header>

    <!-- Impacto / Misión -->
    <section id="nosotros" class="py-5 bg-white text-center">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="p-4 rounded shadow-sm bg-light h-100">
                        <i class="bi bi-heart-fill text-danger display-4 mb-3 d-block"></i>
                        <h4 class="fw-bold">Rescate y Salud</h4>
                        <p class="text-muted mb-0">Brindamos atención médica, vacunación y esterilización a cada animal rescatado.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 rounded shadow-sm bg-light h-100">
                        <i class="bi bi-house-heart-fill text-primary display-4 mb-3 d-block"></i>
                        <h4 class="fw-bold">Refugio Temporal</h4>
                        <p class="text-muted mb-0">Nuestras instalaciones ofrecen un ambiente seguro y digno mientras esperan a su nueva familia.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 rounded shadow-sm bg-light h-100">
                        <i class="bi bi-people-fill text-success display-4 mb-3 d-block"></i>
                        <h4 class="fw-bold">Adopción Responsable</h4>
                        <p class="text-muted mb-0">Entrevistamos y realizamos seguimiento a cada solicitud para garantizar un hogar adecuado.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Catálogo Dinámico de Mascotas -->
    <section id="mascotas" class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-4">
                <h2 class="fw-bold text-dark">Mascotas Listas para Adopción</h2>
                <p class="text-muted">Conoce a algunos de nuestros rescatados que están buscando un hogar permanente</p>

                <!-- Filtros Interactivos -->
                <div class="btn-group mt-2" role="group">
                    <button type="button" class="btn btn-outline-primary filter-btn active" onclick="filtrarMascotas('todas', this)">Todas</button>
                    <button type="button" class="btn btn-outline-primary filter-btn" onclick="filtrarMascotas('perro', this)">🐶 Perros</button>
                    <button type="button" class="btn btn-outline-primary filter-btn" onclick="filtrarMascotas('gato', this)">🐱 Gatos</button>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-3 g-4" id="contenedorMascotas">
                @forelse($mascotas as $mascota)
                    <div class="col mascota-item" data-especie="{{ strtolower($mascota->especie ?? 'perro') }}">
                        <div class="card card-mascota shadow-sm h-100">
                            <!-- Imagen de la mascota (usa su foto única de la BD) -->
                            @php
                                $foto = $mascota->fotografia ?? $mascota->imagen ?? null;
                                // Si tiene foto propia y no es placeholder, úsala; si no, usa fallback por especie
                                if ($foto && !Str::contains($foto, 'placeholder.com')) {
                                    $urlImagen = Str::startsWith($foto, 'http') ? $foto : asset('storage/' . $foto);
                                } else {
                                    $urlImagen = $mascota->image_url; // fallback por especie/raza
                                }
                            @endphp
                            <img src="{{ $urlImagen }}"
                                 onerror="this.onerror=null; this.src='https://via.placeholder.com/300x200?text=Sin+Imagen';"
                                 class="card-img-top w-100"
                                 style="height: 200px; object-fit: cover;"
                                 alt="{{ $mascota->nombre }}">
                            <div class="card-body d-flex flex-column">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <h5 class="card-title fw-bold mb-0">{{ $mascota->nombre }}</h5>
                                        <span class="badge bg-success rounded-pill" style="font-size: 0.75rem;">{{ ucfirst($mascota->estado ?? 'disponible') }}</span>
                                    </div>
                                    <p class="card-text text-muted small mb-1">
                                        <i class="bi bi-tag me-1"></i>{{ $mascota->raza ?? 'Mestizo' }}
                                    </p>
                                    <p class="card-text text-muted small mb-2">
                                        <i class="bi bi-gender-ambiguous me-1"></i>{{ $mascota->sexo ?? 'M/H' }} | 
                                        <i class="bi bi-calendar-event me-1"></i>{{ $mascota->edad_aproximada ?? 'N/D' }} años
                                    </p>
                                </div>
                                <div class="mt-3">
                                    <button type="button" class="btn btn-outline-primary btn-sm w-100 rounded-pill" data-bs-toggle="modal" data-bs-target="#modalSolicitudAdopcion{{ $mascota->id }}">
                                        <i class="bi bi-heart me-1"></i> Solicitar Adopción
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <i class="bi bi-emoji-smile text-muted display-1"></i>
                        <h4 class="text-muted mt-3">Pronto agregaremos nuevas mascotas disponibles</h4>
                        <p class="text-muted">Si eres personal del refugio, <a href="{{ route('login') }}">inicia sesión</a> para registrar nuevas mascotas.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Sección de Testimonios / Historias Reales -->
    <section id="testimonios" class="py-5 bg-white text-center">
        <div class="container py-4">
            <span class="text-warning fw-semibold text-uppercase small d-block mb-1">Una decisión, una vida transformada, un hogar lleno de amor.</span>
            <h2 class="display-5 fw-bold mb-3">Historias reales de personas que eligieron adoptar</h2>
            <p class="text-muted col-md-8 mx-auto mb-5">
                Cada testimonio que compartimos es una historia de amor, paciencia y segundas oportunidades. Nuestros rescatados llegaron con miedo, heridas o abandono, y hoy duermen en hogares donde son parte de una familia.
            </p>

            <div class="row g-4">
                <!-- Tarjeta Testimonio 1 -->
                <div class="col-md-4">
                    <div class="p-4 border rounded-4 shadow-sm h-100 bg-light">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=150&q=80" class="rounded-circle mb-3 shadow-sm" width="90" height="90" style="object-fit: cover;" alt="Bennett Miller">
                        <div class="text-warning mb-2">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <h5 class="fw-bold mb-1">Bennett Miller</h5>
                        <p class="text-warning small mb-3 fw-medium">Amante de los animales</p>
                        <p class="text-muted small mb-0">"Adoptar cambió nuestra dinámica familiar por completo. Ver la confianza que recuperó nuestro rescatado no tiene precio."</p>
                    </div>
                </div>

                <!-- Tarjeta Testimonio 2 -->
                <div class="col-md-4">
                    <div class="p-4 border rounded-4 shadow-sm h-100 bg-light">
                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=150&q=80" class="rounded-circle mb-3 shadow-sm" width="90" height="90" style="object-fit: cover;" alt="Audrey Stevenson">
                        <div class="text-warning mb-2">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                        </div>
                        <h5 class="fw-bold mb-1">Audrey Stevenson</h5>
                        <p class="text-warning small mb-3 fw-medium">Amante de los animales</p>
                        <p class="text-muted small mb-0">"El proceso de adopción en DOLA fue transparente y muy responsable. Te acompañan para asegurar el bienestar de la mascota."</p>
                    </div>
                </div>

                <!-- Tarjeta Testimonio 3 -->
                <div class="col-md-4">
                    <div class="p-4 border rounded-4 shadow-sm h-100 bg-light">
                        <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=150&q=80" class="rounded-circle mb-3 shadow-sm" width="90" height="90" style="object-fit: cover;" alt="Fred Rodriquez">
                        <div class="text-warning mb-2">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                        </div>
                        <h5 class="fw-bold mb-1">Fred Rodriquez</h5>
                        <p class="text-warning small mb-3 fw-medium">Amante de los gatos</p>
                        <p class="text-muted small mb-0">"Dar una segunda oportunidad a un animal rescatado llena la casa de alegría. Animo a todos a abrir sus puertas a un nuevo integrante."</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección de Donaciones -->
    <section id="donar" class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-4">
                <h2 class="fw-bold mb-3">¿Cómo puedes ayudar?</h2>
                <p class="text-muted col-md-8 mx-auto mb-4">El refugio DOLA sostiene sus rescates, alimento y tratamientos veterinarios gracias al apoyo incondicional de la comunidad.</p>
            </div>

            <!-- Etiquetas decorativas informativas -->
            <div class="d-flex flex-wrap justify-content-center gap-2 mb-4">
                <span class="btn btn-outline-primary disabled" aria-disabled="true">
                    <i class="bi bi-qr-code-scan me-1"></i> Aporte Económico / QR
                </span>
                <span class="btn btn-outline-warning disabled" aria-disabled="true">
                    <i class="bi bi-basket me-1"></i> Donar Alimento
                </span>
                <span class="btn btn-outline-info disabled" aria-disabled="true">
                    <i class="bi bi-prescription2 me-1"></i> Insumos Médicos
                </span>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-4">
        <div class="container">
            <p class="mb-1">© {{ date('Y') }} Refugio DOLA - Hogar de Esperanza</p>
            <small class="text-secondary">Tarija, Bolivia — Sistema de Gestión de Adopciones</small>
        </div>
    </footer>

    <!-- JS de Bootstrap y Script de Filtro -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function filtrarMascotas(especie, boton) {
            // Cambiar clase activa en los botones de forma segura
            const botones = document.querySelectorAll('.filter-btn');
            botones.forEach(btn => btn.classList.remove('active'));
            boton.classList.add('active');

            // Filtrar las tarjetas de mascotas usando clase CSS para grid responsive
            const items = document.querySelectorAll('.mascota-item');
            items.forEach(item => {
                const esp = item.getAttribute('data-especie') || '';
                const show = especie === 'todas' || esp.toLowerCase().includes(especie);
                
                if (show) {
                    item.classList.remove('d-none');
                } else {
                    item.classList.add('d-none');
                }
            });
        }

        function copiarCuenta() {
            const cuenta = document.getElementById('numeroCuenta').innerText;
            navigator.clipboard.writeText(cuenta).then(() => {
                const btn = document.getElementById('btnCopiar');
                const original = btn.innerHTML;
                btn.innerHTML = '<i class="bi bi-check-lg"></i> ¡Copiado!';
                btn.classList.replace('btn-outline-primary', 'btn-success');
                setTimeout(() => {
                    btn.innerHTML = original;
                    btn.classList.replace('btn-success', 'btn-outline-primary');
                }, 2000);
            });
        }

        function copiarCuentaModal() {
            const cuenta = document.getElementById('numeroCuentaModal').innerText;
            navigator.clipboard.writeText(cuenta).then(() => {
                const btn = document.querySelector('#pestana-qr-modal button');
                const original = btn.innerHTML;
                btn.innerHTML = '<i class="bi bi-check-lg"></i> ¡Copiado!';
                btn.classList.replace('btn-outline-primary', 'btn-success');
                setTimeout(() => {
                    btn.innerHTML = original;
                    btn.classList.replace('btn-success', 'btn-outline-primary');
                }, 2000);
            });
        }
    </script>

    <!-- Modal de Donación con Tabs -->
    <div class="modal fade" id="modalDonacion" tabindex="-1" aria-labelledby="modalDonacionLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4 shadow-lg">
          <div class="modal-header bg-primary text-white rounded-top-4">
            <h5 class="modal-title fw-bold" id="modalDonacionLabel">
              <i class="bi bi-heart-fill me-2"></i> Apoya a DOLA - Hogar de Esperanza
            </h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
          </div>
          <div class="modal-body p-0">
            <ul class="nav nav-pills nav-fill p-3" id="modalDonarTabs" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="tab-qr-modal" data-bs-toggle="pill" data-bs-target="#pestana-qr-modal" type="button" role="tab">
                  <i class="bi bi-qr-code-scan me-1"></i> Aporte / QR
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="tab-alimento-modal" data-bs-toggle="pill" data-bs-target="#pestana-alimento-modal" type="button" role="tab">
                  <i class="bi bi-basket me-1"></i> Alimento
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="tab-insumos-modal" data-bs-toggle="pill" data-bs-target="#pestana-insumos-modal" type="button" role="tab">
                  <i class="bi bi-prescription2 me-1"></i> Insumos
                </button>
              </li>
            </ul>
            <div class="tab-content p-3 pb-4">
              <div class="tab-pane fade show active" id="pestana-qr-modal" role="tabpanel">
                <div class="row g-4 align-items-center">
                  <div class="col-md-5 text-center">
                    @php $qrPath = 'QR/QR.jpg'; $qrExists = file_exists(storage_path('app/public/' . $qrPath)); @endphp
                    @if($qrExists)
                      <img src="{{ asset('storage/' . $qrPath) }}" class="img-fluid rounded-3 shadow-sm" alt="QR Donación" style="max-width: 240px;">
                    @else
                      <div class="border rounded-3 p-4 bg-light d-flex flex-column align-items-center justify-content-center" style="min-height: 240px;">
                        <i class="bi bi-qr-code text-muted display-1"></i>
                        <p class="text-muted mt-2 mb-0">QR no disponible</p>
                      </div>
                    @endif
                  </div>
                  <div class="col-md-7">
                    <h6 class="fw-bold">Datos Bancarios - Banco Unión</h6>
                    <ul class="list-unstyled">
                      <li><strong>Número de cuenta:</strong> <span id="numeroCuentaModal" class="fw-mono">1234567890-12</span>
                          <button class="btn btn-sm btn-outline-primary ms-2" onclick="copiarCuentaModal()">Copiar</button>
                      </li>
                      <li><strong>Titular:</strong> Refugio DOLA Hogar de Esperanza</li>
                      <li><strong>NIT/CI:</strong> 12345678-9</li>
                    </ul>
                    <div class="alert alert-info small">Escanea el QR o transfiere. Envía comprobante a contacto@dola.bo asunto “Donación”.</div>
                  </div>
                </div>
              </div>

              <div class="tab-pane fade" id="pestana-alimento-modal" role="tabpanel">
                <h6 class="fw-bold mb-3">Donar Alimento</h6>
                <p class="text-muted small">Croquetas para cachorro y adulto, alimento húmedo, galletas para gatos, pienso para razas pequeñas/grandes. Productos sellados y vigentes.</p>
                <div class="card border-0 bg-light shadow-sm">
                  <div class="card-body">
                    <h6 class="fw-bold"><i class="bi bi-geo-alt me-2"></i> Punto de acopio</h6>
                    <p class="mb-1"><strong>Universidad Privada Domingo Savio - UPDS</strong></p>
                    <p class="text-muted small mb-0">Campus Tarija, Av. Integración Nacional s/n<br>Lunes a viernes 08:00 - 17:00</p>
                  </div>
                </div>
              </div>

              <div class="tab-pane fade" id="pestana-insumos-modal" role="tabpanel">
                <h6 class="fw-bold mb-3">Insumos Médicos Veterinarios</h6>
                <p class="text-muted small">Tu aporte permite atender emergencias y campañas de salud.</p>
                <div class="row">
                  <div class="col-sm-6">
                    <ul class="list-unstyled">
                      <li><i class="bi bi-check-circle text-success me-2"></i>Vacunas</li>
                      <li><i class="bi bi-check-circle text-success me-2"></i>Desparasitantes</li>
                      <li><i class="bi bi-check-circle text-success me-2"></i>Antibióticos</li>
                    </ul>
                  </div>
                  <div class="col-sm-6">
                    <ul class="list-unstyled">
                      <li><i class="bi bi-check-circle text-success me-2"></i>Alcohol y gasas</li>
                      <li><i class="bi bi-check-circle text-success me-2"></i>Jeringas y agujas</li>
                      <li><i class="bi bi-check-circle text-success me-2"></i>Antisépticos</li>
                    </ul>
                  </div>
                </div>
                <p class="small text-muted mt-3">Recepción: UPDS Tarija - Área de Bienestar Animal.</p>
                <div class="ratio ratio-4x3 rounded-3 overflow-hidden shadow-sm">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3826.5!2d-64.7!3d-21.5!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjHCsDMwJzAwLjAiUyA2NMKwNDInMDAuMCJX!5e0!3m2!1ses!2sbo!4v0000000000"
                      style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer bg-light rounded-bottom-4">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <a href="#donar" class="btn btn-primary" data-bs-dismiss="modal">
              <i class="bi bi-cash-coin me-1"></i> Ver formas de ayudar
            </a>
          </div>
        </div>
      </div>
    </div>

  <!-- Modales para Solicitar Adopción (uno por mascota) -->
  @foreach($mascotas as $mascota)
  <div class="modal fade" id="modalSolicitudAdopcion{{ $mascota->id }}" tabindex="-1" aria-labelledby="modalSolicitudAdopcionLabel{{ $mascota->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content rounded-4 shadow-lg">
        <div class="modal-header bg-primary text-white rounded-top-4">
          <h5 class="modal-title fw-bold" id="modalSolicitudAdopcionLabel{{ $mascota->id }}">
            <i class="bi bi-heart-fill me-2"></i> Solicitar Adopción - {{ $mascota->nombre }}
          </h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <form action="{{ route('solicitudes.store') }}" method="POST">
          @csrf
          <div class="modal-body p-4">
            <input type="hidden" name="mascota_id" value="{{ $mascota->id }}">
            
            <div class="row g-3">
              <div class="col-12">
                <h6 class="fw-bold text-primary mb-3">Datos del Solicitante</h6>
              </div>
              <div class="col-md-6">
                <label for="nombre{{ $mascota->id }}" class="form-label fw-semibold">Nombre *</label>
                <input type="text" name="nombre" id="nombre{{ $mascota->id }}" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label for="apellido{{ $mascota->id }}" class="form-label fw-semibold">Apellido *</label>
                <input type="text" name="apellido" id="apellido{{ $mascota->id }}" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label for="email{{ $mascota->id }}" class="form-label fw-semibold">Correo Electrónico *</label>
                <input type="email" name="email" id="email{{ $mascota->id }}" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label for="telefono{{ $mascota->id }}" class="form-label fw-semibold">Teléfono *</label>
                <input type="tel" name="telefono" id="telefono{{ $mascota->id }}" class="form-control" required>
              </div>
              <div class="col-12">
                <label for="direccion{{ $mascota->id }}" class="form-label fw-semibold">Dirección *</label>
                <input type="text" name="direccion" id="direccion{{ $mascota->id }}" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label for="tipo_vivienda{{ $mascota->id }}" class="form-label fw-semibold">Tipo de Vivienda *</label>
                <select name="tipo_vivienda" id="tipo_vivienda{{ $mascota->id }}" class="form-select" required>
                  <option value="">Seleccionar...</option>
                  <option value="Casa">Casa</option>
                  <option value="Departamento">Departamento</option>
                  <option value="Finca">Finca</option>
                  <option value="Otro">Otro</option>
                </select>
              </div>
              <div class="col-12">
                <label for="motivo_adopcion{{ $mascota->id }}" class="form-label fw-semibold">Motivo de la Adopción *</label>
                <textarea name="motivo_adopcion" id="motivo_adopcion{{ $mascota->id }}" class="form-control" rows="3" placeholder="Cuéntanos por qué quieres adoptar a {{ $mascota->nombre }}..." required></textarea>
              </div>
              <div class="col-md-6">
                <label for="experiencia_previa{{ $mascota->id }}" class="form-label fw-semibold">Experiencia Previa con Mascotas *</label>
                <textarea name="experiencia_previa" id="experiencia_previa{{ $mascota->id }}" class="form-control" rows="2" placeholder="Describe tu experiencia cuidando mascotas..." required></textarea>
              </div>
              <div class="col-md-6">
                <div class="form-check mt-4">
                  <input class="form-check-input" type="checkbox" name="tiene_mascotas_actuales" id="tiene_mascotas_actuales{{ $mascota->id }}" value="1">
                  <label class="form-check-label" for="tiene_mascotas_actuales{{ $mascota->id }}">
                    Tengo otras mascotas actualmente
                  </label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-check mt-4">
                  <input class="form-check-input" type="checkbox" name="todos_de_acuerdo" id="todos_de_acuerdo{{ $mascota->id }}" value="1" required>
                  <label class="form-check-label" for="todos_de_acuerdo{{ $mascota->id }}">
                    Todos en el hogar están de acuerdo con la adopción *
                  </label>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer bg-light rounded-bottom-4">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">
              <i class="bi bi-send me-1"></i> Enviar Solicitud
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  @endforeach
</body>
</html>