@extends('layouts.plantilla')

@section('title', 'Contáctanos')

@section('content')

<style>
    body {
        color: black;
        font-family: 'Poppins', 'Helvetica Neue', Helvetica, Arial, sans-serif;
    }

    .alert {
        padding: 15px;
        background-color: #4CAF50;
        color: white;
        text-align: center;
        margin-bottom: 15px;
        border-radius: 8px;
    }

    section.content {
        background-color: #1E2139;
        padding: 30px;
        border-radius: 15px;
        width: 850px;
        height: 858px;
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
    }

    h1 {
        font-size: 2em;
        margin-bottom: 20px;
        color: #FFFFFF;
        text-align: center;
        letter-spacing: 2px;
    }

    h2 {
        font-size: 1.5em;
        margin-bottom: 35px;
        color: #FFFFFF;
        text-align: center;
        letter-spacing: 2px;
    }

    /*.form-group {
        margin-top: 3px;
        margin-bottom: 3px;
    }*/

    .label-group {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 5px;
    }

    .label-group label {
        font-size: 17px;
        color: #FFFFFF;
    }

    .error-message {
        color: #FF6B6B;
        font-size: 14px;
    }

    .form-group input[type="text"], 
    .form-group input[type="email"], 
    .form-group textarea {
        width: 100%;
        height: 65px;
        padding: 10px;
        margin-top: 15px;
        margin-bottom: 45px;
        border: 1px solid #2C2F48;
        border-radius: 8px;
        background-color: #252945;
        color: #FFFFFF;
        transition: all 0.3s ease;
        box-sizing: border-box;
    }

    .form-group textarea {
        height: 150px;
        resize: none;
    }

    .form-group input[type="text"]:hover, 
    .form-group input[type="email"]:hover, 
    .form-group textarea:hover {
        border-color: #777;
    }

    .form-group input[type="text"]:focus, 
    .form-group input[type="email"]:focus, 
    .form-group textarea:focus {
        outline: none;
        border-color: #ff7e5f;
        box-shadow: 0 0 8px rgba(255, 126, 95, 0.5);
    }

    button {
        background: linear-gradient(to right, #7C5DFA, #9277FF);
        margin-top: 3px;
        color: white;
        padding: 10px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        width: 100%;
        font-size: 1.2em;
        transition: all 0.3s ease;
    }

    button:hover {
        background: linear-gradient(to right, #9277FF, #7C5DFA);
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    }

    #submitBtn {
    position: relative;
    display: inline-block;
    padding: 10px;
    background: linear-gradient(to right, #7C5DFA, #9277FF);
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    width: 100%;
    font-size: 1.2em;
    transition: all 0.3s ease;
    overflow: hidden;
    height: 60px; /* Fija la altura del botón */
}

#btnText,
#loader {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100%;
}

.hidden {
    display: none !important;
}

#loader {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.dot {
    width: 8px;
    height: 8px;
    background-color: #FFF;
    border-radius: 50%;
    margin: 0 2px;
    animation: blink 1.4s infinite both;
}

.dot1 { animation-delay: 0s; }
.dot2 { animation-delay: 0.2s; }
.dot3 { animation-delay: 0.4s; }
.dot4 { animation-delay: 0.6s; }

@keyframes blink {
    0%, 80%, 100% {
        opacity: 0;
    }
    40% {
        opacity: 1;
    }
}

</style>

@if (session('info'))
        <div class="alert">
            {{ session('info') }}
        </div>
@endif


<section class="content">
    <h1>Contáctanos</h1>
    <h2>Si tienes alguna duda, no dudes en escribirnos; estamos más que dispuestos a ayudarte.</h2>

    <form action="{{ route('contactanos.index') }}" method="POST">
        @csrf

        <div class="form-group">
            <div class="label-group">
                <label for="name">Nombre:</label>
                @error('name')<p class="error-message"><strong>{{ $message }}</strong></p>@enderror
            </div>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Dejanos tu nombre">
        </div>

        <div class="form-group">
            <div class="label-group">
                <label for="correo">Correo:</label>
                @error('correo')<p class="error-message"><strong>{{ $message }}</strong></p>@enderror
            </div>
            <input type="text" name="correo" value="{{ old('correo') }}" placeholder="Ingresa tu correo electrónico">
        </div>

        <div class="form-group">
            <div class="label-group">
                <label for="mensaje">Razón de contacto:</label>
                @error('mensaje')<p class="error-message"><strong>{{ $message }}</strong></p>@enderror
            </div>
            <textarea name="mensaje" rows="4" placeholder="Cuéntanos el motivo de tu contacto">@if(old('mensaje')){{ old('mensaje') }}@endif</textarea>
        </div>

        <button id="submitBtn" type="submit">
            <span id="btnText">Enviar Mensaje</span>
            <div id="loader" class="hidden">
                <div class="dot dot1"></div>
                <div class="dot dot2"></div>
                <div class="dot dot3"></div>
                <div class="dot dot4"></div>
            </div>
        </button>
    </form>

</section>


<script>
document.getElementById("submitBtn").addEventListener("click", function(event) {
    // Evita que el formulario se envíe inmediatamente
    event.preventDefault();

    // Oculta el texto del botón y muestra la animación
    var btnText = document.getElementById("btnText");
    var loader = document.getElementById("loader");

    // Oculta el texto y muestra el loader
    btnText.classList.add("hidden");
    loader.classList.remove("hidden");

    // Envía el formulario después de un breve retraso
    setTimeout(function() {
        event.target.closest('form').submit();
    }, 500); // Ajusta el tiempo de retraso según sea necesario
});
</script>

@endsection