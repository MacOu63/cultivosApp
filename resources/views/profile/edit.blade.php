<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    <link rel="icon" type="image/x-icon" href="assets/IconoAgri.png" />
    <style>
        body {
            background-color: #25262a;
            font-family: 'Arial', sans-serif;
            color: #333;
        }

        .container {
            max-width: 900px;
            background-color: #121212;
            margin: 50px auto;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .back-button {
            width: 100%;
            max-width: 200px;
            margin-bottom: 20px;
            padding: 13px 15px;
            background-color: #6c757d;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 17px;
        }

        h2 {
            font-weight: 700;
            margin-bottom: 20px;
            color: #e1ddda;
        }

        h5 {
            font-weight: 600;
            margin-bottom: 15px;
            color: #e1ddda;
        }

        h4{
            color: #e1ddda;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: 600;
            margin-bottom: 5px;
            display: inline-block;
            color: #e1ddda;
        }

        input.form-control {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            font-size: 14px;
            width: 100%;
            margin-bottom: 10px;
            background-color: #F3E5E5;
        }

        button.btn {
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
        }

        button.btn-primary {
            background-color: #007bff;
            border: none;
            color: #fff;
        }

        button.btn-danger {
            background-color: #dc3545;
            border: none;
            color: #fff;
        }

        .card {
            border: none;
            border-radius: 8px;
            background-color: #121212;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card-body {
            padding: 20px;
        }

        .text-center {
            text-align: center;
        }

        .rounded-circle {
            border-radius: 50%;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }

        /* Media Queries */
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            .row {
                display: flex;
                flex-direction: column;
            }

            .col-md-4, .col-md-8 {
                width: 100%;
                margin-bottom: 20px;
            }

            .back-button {
                width: 100%;
            }
        }

        @media (max-width: 576px) {
            h2, h5 {
                font-size: 18px;
            }

            .back-button {
                font-size: 16px;
            }

            input.form-control {
                font-size: 13px;
                padding: 8px;
            }

            button.btn {
                padding: 8px 12px;
                font-size: 13px;
            }
        }
    </style>
</head>
<body>

<br>

<button class="back-button" onclick="window.history.back();">Volver Atrás</button>

<div class="container">
    <h2>Editar Perfil</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <img id="avatarPreview" src="{{ $user->image ? asset('avatars/' . $user->image) : asset('images/default-avatar.jpg') }}" class="rounded-circle" alt="Avatar" width="150">
                        <h4>{{ $user->nombre_usuario }} {{ $user->apellido_usuario }}</h4>
                        <input type="file" name="avatar" id="avatar" class="d-none" onchange="previewAvatar(event)">
                    </div>     
                </div>
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5>Información de Usuario</h5>

                        <div class="form-group">
                            <label for="nombre">Nombres:</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $user->nombre }}" placeholder="Ingrese sus nombres si desea cambiarlos:">
                        </div>

                        <div class="form-group">
                            <label for="apellido">Apellidos:</label>
                            <input type="text" name="apellido" id="apellido" class="form-control" value="{{ $user->apellido }}" placeholder="Ingrese sus apellidos si desea cambiarlos:">
                        </div>

                        <div class="form-group">
                            <label for="telefono">Número de Teléfono:</label>
                            <input type="telefono" name="telefono" id="telefono" class="form-control" value="" placeholder="Ingrese su teléfono si desea cambiarlo:">
                        </div>

                        <div class="form-group">
                            <label for="password">Nueva Contraseña:</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Ingrese una nueva contraseña si desea cambiarla:">
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirmar Nueva Contraseña:</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Vuelva a ingresar su nueva contraseña:">
                        </div>

                        <div class="form-group">
                            <label for="current_password">Contraseña Actual:</label>
                            <input type="password" name="current_password" id="current_password" class="form-control" placeholder="Ingrese su contraseña actual para guardar los cambios:">
                            @error('current_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-danger mt-3">Actualizar Información</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    function previewAvatar(event) {
        const reader = new FileReader();
        reader.onload = function(){
            const output = document.getElementById('avatarPreview');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

<script>
    document.getElementById('nombre').addEventListener('input', function (e) {
        let input = e.target;
        input.value = input.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/g, ''); // Permite letras, tildes y espacios
    });
</script>

<script>
    document.getElementById('apellido').addEventListener('input', function (e) {
        let input = e.target;
        input.value = input.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/g, ''); // Permite letras, tildes y espacios
    });
</script>

<script>
    document.getElementById('telefono').addEventListener('input', function (e) {
        let input = e.target;
        // Permite solo números y limita la longitud a 9 dígitos
        input.value = input.value.replace(/[^0-9]/g, '').slice(0, 9);
    });
</script>

</body>
</html>
