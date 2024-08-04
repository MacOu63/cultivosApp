@extends('layouts.app')

@section('template_title')
    {{ $preferencia->name ?? __('Show') . " " . __('Preferencia') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Preferencia</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('preferencias.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Usuarios Id:</strong>
                                    {{ $preferencia->usuarios_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Cultivos Id:</strong>
                                    {{ $preferencia->cultivos_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Departamentos Id:</strong>
                                    {{ $preferencia->departamentos_id }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
