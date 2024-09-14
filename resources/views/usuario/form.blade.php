<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="nombre_usuario" class="form-label">{{ __('Nombres del Usuario:') }}</label>
            <input type="text" name="nombre_usuario" class="form-control @error('rol') is-invalid @enderror" value="{{ old('nombre_usuario', $usuario?->nombre_usuario) }}" id="nombre_usuario" placeholder="Ingrese los nombres del usuario:">
            {!! $errors->first('nombre_usuario', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="apellido_usuario" class="form-label">{{ __('Apellidos del Usuario:') }}</label>
            <input type="text" name="apellido_usuario" class="form-control @error('rol') is-invalid @enderror" value="{{ old('apellido_usuario', $usuario?->apellido_usuario) }}" id="apellido_usuario" placeholder="Ingrese los apellidos del usuario:">
            {!! $errors->first('apellido_usuario', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        
        <div class="form-group mb-2 mb20">
            <label for="rol" class="form-label">{{ __('Rol:') }}</label>
            <input type="text" name="rol" class="form-control @error('rol') is-invalid @enderror" value="{{ old('rol', $usuario?->rol) }}" id="rol" placeholder="Ingrese el rol del usuario:">
            {!! $errors->first('rol', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="telefono" class="form-label">{{ __('Telefono:') }}</label>
            <input type="text" name="telefono" class="form-control @error('telefono') is-invalid @enderror" value="{{ old('telefono', $usuario?->telefono) }}" id="telefono" maxlength="9" placeholder="Ingrese el número de teléfono del usuario:">
            {!! $errors->first('telefono', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="password" class="form-label">{{ __('Contraseña:') }}</label>
            <div class="input-group">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Dejar en blanco si no se desea cambiar">
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
            {!! $errors->first('password', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>

<script>
    document.getElementById('nombre_usuario').addEventListener('input', function (e) {
        let input = e.target;
        input.value = input.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/g, ''); // Permite letras, tildes y espacios
    });
</script>

<script>
    document.getElementById('apellido_usuario').addEventListener('input', function (e) {
        let input = e.target;
        input.value = input.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/g, ''); // Permite letras, tildes y espacios
    });
</script>

<script>
    document.getElementById('rol').addEventListener('input', function (e) {
        let input = e.target;
        input.value = input.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ]/g, ''); // Permite solo letras y tildes, sin espacios
    });
</script>

<script>
    document.getElementById('telefono').addEventListener('input', function (e) {
        let input = e.target;
        // Permite solo números y limita la longitud a 9 dígitos
        input.value = input.value.replace(/[^0-9]/g, '').slice(0, 9);
    });
</script>

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
