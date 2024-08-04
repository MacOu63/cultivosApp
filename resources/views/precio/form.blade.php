<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="precio" class="form-label">{{ __('Precio') }}</label>
            <input type="text" name="precio" class="form-control @error('precio') is-invalid @enderror" value="{{ old('precio', $precio?->precio) }}" id="precio" placeholder="Precio">
            {!! $errors->first('precio', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
        <label for="cultivos_id" class="form-label">{{ __('Cultivos Id') }}</label>
        <select name="cultivos_id" id="cultivos_id" class="form-control{{ $errors->has('cultivos_id') ? ' is-invalid' : '' }}">
           @foreach($cultivo as $id => $nombre)
             <option value="{{ $id }}"{{ $id == old('cultivos_id', $precio?->cultivos_id) ? ' selected' : '' }}>{{ $nombre }}</option>
              @endforeach
         </select>
        @if($errors->has('cultivos_id'))
        <div class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('cultivos_id') }}</strong>
        </div>
          @endif
        </div>

        <div class="form-group mb-2 mb20">
        <label for="departamentos_id" class="form-label">{{ __('Departamentos Id') }}</label>
        <select name="departamentos_id" id="departamentos_id" class="form-control{{ $errors->has('departamentos_id') ? ' is-invalid' : '' }}">
            @foreach($departamento as $id => $nombre)
             <option value="{{ $id }}"{{ $id == old('departamentos_id', $precio?->departamentos_id) ? ' selected' : '' }}>{{ $nombre }}</option>
              @endforeach
        </select>
            @if($errors->has('departamentos_id'))
        <div class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('departamentos_id') }}</strong>
        </div>
        @endif
        </div>


    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>