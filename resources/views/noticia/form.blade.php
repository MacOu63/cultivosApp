<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="titulo" class="form-label">{{ __('Título:') }}</label>
            <input type="text" name="titulo" class="form-control @error('titulo') is-invalid @enderror" value="{{ old('titulo', $noticia?->titulo) }}" id="titulo" placeholder="Ingrese el título de la noticia:">
            {!! $errors->first('titulo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="subtitulo" class="form-label">{{ __('Subtítulo:') }}</label>
            <input type="text" name="subtitulo" class="form-control @error('subtitulo') is-invalid @enderror" value="{{ old('subtitulo', $noticia?->subtitulo) }}" id="subtitulo" placeholder="Ingrese el subtítulo de la noticia:">
            {!! $errors->first('subtitulo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="contenido" class="form-label">{{ __('Contenido:') }}</label>
            <textarea name="contenido" class="form-control @error('contenido') is-invalid @enderror" id="contenido" placeholder="Ingrese el contenido de la noticia:" style="height: 169px;">{{ old('contenido', $noticia?->contenido) }}</textarea>
            {!! $errors->first('contenido', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="image" class="form-label">{{ __('Imagen:') }}</label>
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image">
            {!! $errors->first('image', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="link" class="form-label">{{ __('Link:') }}</label>
            <textarea name="link" class="form-control @error('link') is-invalid @enderror" id="link" placeholder="Ingrese el link de la noticia:">{{ old('link', $noticia?->link) }}</textarea>
            {!! $errors->first('link', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="addedBy" class="form-label">{{ __('Añadido por:') }}</label>
            <select name="addedBy" class="form-control @error('addedBy') is-invalid @enderror" id="addedBy">
                @foreach($usuarios as $id => $nombre_usuario)
                    <option value="{{ $id }}" {{ old('addedBy', $noticia->addedBy) == $id ? 'selected' : '' }}>{{ $nombre_usuario }}</option>
                @endforeach
            </select>
            {!! $errors->first('addedBy', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>
