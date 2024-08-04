@extends('layouts.app')

@section('template_title')
    {{ $precio->name ?? __('Show') . " " . __('Precio') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Precio</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('precios.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Precio:</strong>
                                    {{ $precio->precio }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Cultivos Id:</strong>
                                    {{ $precio->cultivos_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Departamentos Id:</strong>
                                    {{ $precio->departamentos_id }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
