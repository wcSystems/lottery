@extends('layouts.app')

@section('content')
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
        <li class="breadcrumb-item">Juegos</li>
        <li class="breadcrumb-item">Nuevo</li>
    </ol>
    <div class="col-md-6 col-sm-12 col-xs-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>
                    Nuevo <span class="fw-300"><i>Juego</i></span>
                </h2>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <form action="/games/new/create" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="row">
                            <div class="col mb-15">
                                <div class="form-group">
                                    <label class="form-label" for="name">Nombre</label>
                                    <input name="name" type="text" class="@error("name") is-invalid @enderror form-control" value="{{old("name")}}" placeholder="Nombre" required>
                                    @error("name") <div class="invalid-feedback">Ya existe un juego con el mismo nombre</div> @enderror
                                </div>
                            </div>
                            <hr>
                            <div class="col-12">
                                <button class="btn btn-primary float-right" type="submit">Crear</button>
                                <a class="btn btn-secondary" href="/games">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
