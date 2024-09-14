@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Cultivo
@endsection

@section('content')
    <style>
        .card-title {
            color: #fff;
        }
        .card-body {
            background-color: #333;
            color: #fff;
        }
        input, select, textarea {
            background-color: #555;
            color: #fff;
            border: 1px solid #777;
            padding: 10px;
            border-radius: 4px;
        }
        button {
            background-color: #444;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #666;
        }
        .card {
            background-color: #222;
            border: 1px solid #444;
        }
    </style>

    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Actualizar') }} Cultivo</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('cultivos.update', $cultivo->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('cultivo.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
