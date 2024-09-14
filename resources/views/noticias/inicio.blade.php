@extends('layouts.plantillano')

@section('title', 'Noticias')

@section('content')
    <div class="container">
        @foreach ($noticias as $noticia)
            <section class="page-section">
                <div class="container">
                    <div class="product-item">
                        <div class="product-item-title d-flex">
                            <div class="bg-faded p-5 d-flex ms-auto rounded">
                                <h2 class="section-heading mb-0">
                                    <span class="section-heading-upper">{{ $noticia->subtitulo }}</span>
                                    <span class="section-heading-lower">{{ $noticia->titulo }}</span>
                                </h2>
                            </div>
                        </div>
                        <!-- Suponiendo que la imagen se guarda en el campo 'image' en la base de datos -->
                        <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" 
                             src="{{ asset('storage/' . $noticia->image) }}" alt="Imagen de Noticia" />
                        <div class="product-item-description d-flex me-auto">
                            <div class="bg-faded p-5 rounded">
                                <p class="mb-0">{!! nl2br(e($noticia->contenido)) !!}</p>
                            </div>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="{{ $noticia->fuente }}" class="btn btn-primary" 
                               style="margin-left: 3px; align-self: flex-end; padding: 30px;">
                                Ir a la fuente
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        @endforeach
    </div>
@endsection