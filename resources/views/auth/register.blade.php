<!doctype html>
<html lang="en">
<head>
    <title>Registro</title>
    <link rel="icon" type="image/x-icon" href="assets/IconoAgri.png" />
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/estilos.css') }}" />
</head>
<body>
<section class="h-100 gradient-form" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
                <div class="card rounded-3 text-black">
                    <div class="row g-0">
                        <div class="col-lg-6">
                            <div class="card-body p-md-5 mx-md-4">
                                <div class="text-center">
                                    <img src="{{ asset('assets/IconoAgri.png') }}" style="width: 185px;" alt="logo">
                                    <h4 class="mt-1 mb-5 pb-1">Bienvenido a Agro Market</h4>
                                </div>

                                <form action="{{ route('register') }}" method="post">
                                    @csrf
                                    <p>Registrarse</p>

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <!-- Campo para el Nombre -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form2Example12">Nombre</label>
                                        <input type="text" name="nombre" id="form2Example12" class="form-control"
                                            placeholder="Ingresa tu nombre" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '');" />
                                    </div>

                                    <!-- Campo para el Apellido -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form2Example13">Apellido</label>
                                        <input type="text" name="apellido" id="form2Example13" class="form-control"
                                            placeholder="Ingresa tu apellido" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '');" />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form2Example11">Número de Teléfono</label>
                                        <input type="tel" name="telefono" id="form2Example11" class="form-control"
                                            placeholder="Ingresar Número de Teléfono" maxlength="9" 
                                            pattern="\d{9}" oninput="this.value = this.value.replace(/[^0-9]/g, '');" required />
                                    </div>

                                    <!-- Campo para la Contraseña con Ojo Tachado -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form2Example22">Contraseña</label>
                                        <div class="input-group">
                                            <input type="password" name="password" id="form2Example22" class="form-control" />
                                            <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                                                <!-- Ícono del ojo para mostrar/ocultar contraseña -->
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
                                    </div>

                                    <!-- Campo para Confirmar Contraseña con Ojo Tachado -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form2Example23">Confirmar Contraseña</label>
                                        <div class="input-group">
                                            <input type="password" name="password_confirmation" id="form2Example23" class="form-control" />
                                            <button type="button" class="btn btn-outline-secondary" id="togglePasswordConfirm">
                                                <!-- Ícono del ojo para mostrar/ocultar contraseña -->
                                                <svg xmlns="http://www.w3.org/2000/svg" id="icono-ojo-confirm" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
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
                                    </div>

                                    <div class="text-center pt-1 mb-5 pb-1">
                                        <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Registrarse</button>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-center pb-4">
                                        <p class="mb-0 me-2">¿Ya tienes una cuenta?</p>
                                        <a href="{{ route('login') }}" class="btn btn-outline-danger">Ingresa Aquí</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                            <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                <h4 class="mb-4">Somos más que una página web</h4>
                                <p class="small mb-0">Estamos dispuestos a brindarle la información más exacta posible sobre los precios actuales del mercado agrícola</p>
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

<!-- Script para alternar el ojo -->
<script>
    // Alternar contraseña principal
    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('form2Example22');
    togglePassword.addEventListener('click', function () {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);

        // Alterna el ícono del ojo
        this.querySelector('.ojo-tachado').classList.toggle('d-none');
        this.querySelector('.ojo-abierto').classList.toggle('d-none');
    });

    // Alternar confirmación de contraseña
    const togglePasswordConfirm = document.getElementById('togglePasswordConfirm');
    const passwordConfirm = document.getElementById('form2Example23');
    togglePasswordConfirm.addEventListener('click', function () {
        const type = passwordConfirm.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordConfirm.setAttribute('type', type);

        // Alterna el ícono del ojo
        this.querySelector('.ojo-tachado').classList.toggle('d-none');
        this.querySelector('.ojo-abierto').classList.toggle('d-none');
    });
</script>

</body>
</html>
