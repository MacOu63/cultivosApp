@extends('layouts.plantilla')

@section('title', 'Contáctanos')

@section('content')

<style>
    body {
        color: black;
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
        background-color: #2E8B57;
        padding: 30px;
        border-radius: 15px;
        width: 100%;
        max-width: 850px;
        margin: 0 auto;
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
        padding: 10px;
        margin-top: 15px;
        margin-bottom: 45px;
        border: 1px solid #2C2F48;
        border-radius: 8px;
        background-color: #2E8B57;
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
        background: linear-gradient(to right, #FFB88C, #FF7E5F);
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    }

    #submitBtn {
        position: relative;
        display: inline-block;
        padding: 10px;
        background:  linear-gradient(to right, #FF7E5F, #FFB88C);
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        width: 100%;
        font-size: 1.2em;
        transition: all 0.3s ease;
        overflow: hidden;
        height: 60px;
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

    /* Media queries para hacer responsive el diseño */
    @media (max-width: 768px) {
        h1 {
            font-size: 1.5em;
        }

        h2 {
            font-size: 1.2em;
            margin-bottom: 25px;
        }

        .label-group {
            flex-direction: column;
            align-items: flex-start;
        }

        .form-group input[type="text"], 
        .form-group input[type="email"], 
        .form-group textarea {
            height: auto;
            margin-top: 10px;
            margin-bottom: 25px;
        }

        #submitBtn {
            font-size: 1em;
            height: 50px;
        }
    }

    @media (max-width: 480px) {
        h1 {
            font-size: 1.2em;
        }

        h2 {
            font-size: 1em;
            margin-bottom: 20px;
        }

        .form-group input[type="text"], 
        .form-group input[type="email"], 
        .form-group textarea {
            margin-top: 5px;
            margin-bottom: 15px;
        }

        #submitBtn {
            font-size: 0.9em;
            height: 45px;
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
    <h2>"Si tienes alguna duda, no dudes en escribirnos; estaremos más que dispuestos a ayudarte."</h2>

    <form action="{{ route('contactanos.index') }}" method="POST">
        @csrf

        <div class="form-group">
            <style>
                .form-group input[name="name"]::placeholder {
                    color: #CCCCCC; /* Cambia este color al que prefieras */
                    opacity: 1; /* Opcional: asegura que el color del placeholder sea completamente visible */
                }
            </style>
            <div class="label-group">
                <label for="name">Nombre:</label>
                @error('name')<p class="error-message"><strong>{{ $message }}</strong></p>@enderror
            </div>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Dejanos tu nombre:">
        </div>

        <div class="form-group">
            <style>
                .form-group input[name="correo"]::placeholder {
                    color: #CCCCCC; /* Cambia este color al que prefieras */
                    opacity: 1; /* Opcional: asegura que el color del placeholder sea completamente visible */
                }
            </style>
            <div class="label-group">
                <label for="correo">Correo:</label>
                @error('correo')<p class="error-message"><strong>{{ $message }}</strong></p>@enderror
            </div>
            <input type="text" name="correo" value="{{ old('correo') }}" placeholder="Ingresa tu correo electrónico:">
        </div>

        <div class="form-group">
            <style>
                .form-group textarea[name="mensaje"]::placeholder {
                    color: #CCCCCC; /* Cambia este color al que prefieras */
                    opacity: 1; /* Opcional: asegura que el color del placeholder sea completamente visible */
                }
            </style>
            <div class="label-group">
                <label for="mensaje">Razón de contacto:</label>
                @error('mensaje')<p class="error-message"><strong>{{ $message }}</strong></p>@enderror
            </div>
            <textarea name="mensaje" rows="4" placeholder="Cuéntanos el motivo de tu contacto:">@if(old('mensaje')){{ old('mensaje') }}@endif</textarea>
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
    event.preventDefault();

    var btnText = document.getElementById("btnText");
    var loader = document.getElementById("loader");

    btnText.classList.add("hidden");
    loader.classList.remove("hidden");

    setTimeout(function() {
        event.target.closest('form').submit();
    }, 500);
});
</script>

@endsection