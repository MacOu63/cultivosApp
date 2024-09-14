@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Noticia
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                    <span class="card-title">{{ __('Crear') }} nueva Noticia</span>
                    <a class="btn btn-primary btn-sm" href="{{ route('noticias.index') }}"> {{ __('Regresar') }}</a>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('noticias.store') }}" role="form" enctype="multipart/form-data">
                        @csrf
                        @include('noticia.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .card-title{
        color: #fff;
    }

    .card-body {
        background-color: #333; /* Adjust the color to match your sidebar */
        color: #fff; /* This will change the text color to white */
    }
    input, select, textarea {
        background-color: #555; /* Lighter shade for visibility */
        color: #fff;
        border: 1px solid #777;
        padding: 10px;
        border-radius: 4px;
    }
    button {
        background-color: #444; /* Dark background for the button */
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }
    button:hover {
        background-color: #666; /* Slightly lighter on hover */
    }
    .card {
        background-color: #222; /* Dark background for the card */
        border: 1px solid #444; /* Slight border to define the card edges */
    }
</style>
@endsection
