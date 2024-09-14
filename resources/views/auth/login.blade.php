<!doctype html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="assets/IconoAgri.png" />
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.3.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    
    <!-- Font Awesome para los íconos -->
    
    <link rel="stylesheet" href="{{ asset('assets/estilos.css') }}" />
</head>
<body>
<section class="h-100 gradient-form" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
                <div class="card rounded-3 text-black">
                    <div class="row g-0">
                        <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                            <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                <h4 class="mb-4">Bienvenido de nuevo a Agro Market</h4>
                                <p class="small mb-0">Estamos aquí para brindarle la información más exacta posible sobre los precios actuales del mercado agrícola.</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card-body p-md-5 mx-md-4">
                                <div class="text-center">
                                    <img src="{{ asset('assets/IconoAgri.png') }}" style="width: 185px;" alt="logo">
                                    <h4 class="mt-1 mb-5 pb-1">Iniciar Sesión</h4>
                                </div>

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    

                                    <!-- Campo de teléfono con validación -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="telefono">Número de Teléfono</label>
                                        <input id="telefono" type="tel" class="form-control @error('telefono') is-invalid @enderror"
                                            name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus
                                            maxlength="9" pattern="\d{9}" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                        @error('telefono')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Campo de contraseña con ícono de ojo -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="password">Contraseña</label>
                                        <div class="input-group">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                                name="password" required autocomplete="current-password">
                                            <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                                                <!-- Ícono del ojo para mostrar/ocultar -->
                                                <svg xmlns="http://www.w3.org/2000/svg" id="icono-ojo" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                    <!-- Ojo abierto (inicialmente oculto) -->
                                                    <path class="ojo-abierto d-none" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                                    <path class="ojo-abierto d-none" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                                    <!-- Ojo tachado (visible por defecto) -->
                                                    <path class="ojo-tachado" d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7 7 0 0 0-2.79.588l.77.771A6 6 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755q-.247.248-.517.486z"/>
                                                    <path class="ojo-tachado" d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829"/>
                                                    <path class="ojo-tachado" d="M3.35 5.47q-.27.24-.518.487A13 13 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7 7 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12z"/>
                                                </svg>
                                            </button>
                                        </div>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-check mb-4">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            Recordarme
                                        </label>
                                    </div>

                                    <div class="text-center pt-1 mb-5 pb-1">
                                        <button type="submit" class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3">
                                            Iniciar Sesión
                                        </button>
                                    </div>

                                    @if (Route::has('password.request'))
                                        <div class="text-center">
                                            <a class="btn btn-link" href="https://wa.me/+51957874833">
                                                ¿Olvidaste tu contraseña, Click aquí y escríbenos!
                                            </a>
                                        </div>
                                    @endif

                                    <div class="text-center">
                                        <p class="mb-0 me-2">¿No tienes una cuenta?</p>
                                        <a href="{{ route('register') }}" class="btn btn-outline-danger">Regístrate Aquí</a>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

<!-- Script para mostrar/ocultar contraseña y alternar ícono del ojo -->
<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    const icon = document.querySelector('#icono-ojo');

    togglePassword.addEventListener('click', function () {
        // Alternar el tipo de input entre "password" y "text"
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);

        // Alternar las clases del ícono
        if (type === 'text') {
            // Mostrar el ícono de ojo abierto
            icon.querySelectorAll('.ojo-abierto').forEach(path => path.classList.remove('d-none'));
            icon.querySelectorAll('.ojo-tachado').forEach(path => path.classList.add('d-none'));
        } else {
            // Mostrar el ícono de ojo tachado
            icon.querySelectorAll('.ojo-abierto').forEach(path => path.classList.add('d-none'));
            icon.querySelectorAll('.ojo-tachado').forEach(path => path.classList.remove('d-none'));
        }
    });

    // Asegurarse de que el ícono tachado esté visible al cargar la página
    window.addEventListener('DOMContentLoaded', () => {
        icon.querySelectorAll('.ojo-abierto').forEach(path => path.classList.add('d-none'));
        icon.querySelectorAll('.ojo-tachado').forEach(path => path.classList.remove('d-none'));
    });
</script>

</body>
</html>