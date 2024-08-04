<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="usuarios_id" class="form-label">{{ __('Usuarios Id') }}</label>
            <input type="text" name="usuarios_id" class="form-control @error('usuarios_id') is-invalid @enderror" value="{{ old('usuarios_id', $consulta?->usuarios_id) }}" id="usuarios_id" placeholder="Usuarios Id">
            {!! $errors->first('usuarios_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="cultivos_id" class="form-label">{{ __('Cultivos Id') }}</label>
            <input type="text" name="cultivos_id" class="form-control @error('cultivos_id') is-invalid @enderror" value="{{ old('cultivos_id', $consulta?->cultivos_id) }}" id="cultivos_id" placeholder="Cultivos Id">
            {!! $errors->first('cultivos_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_consulta" class="form-label">{{ __('Fecha Consulta') }}</label>
            <input type="text" name="fecha_consulta" class="form-control @error('fecha_consulta') is-invalid @enderror" value="{{ old('fecha_consulta', $consulta?->fecha_consulta) }}" id="fecha_consulta" placeholder="Fecha Consulta">
            {!! $errors->first('fecha_consulta', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>