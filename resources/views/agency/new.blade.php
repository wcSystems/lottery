@extends('layouts.app')

@section('content')

    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
        <li class="breadcrumb-item">Agencias</li>
        <li class="breadcrumb-item">Nuevo</li>
    </ol>
    <div class="col-md-6 col-sm-12 col-xs-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>
                    Nuevo <span class="fw-300"><i>Agencia</i></span>
                </h2>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <form action="/agencies/new/create" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="row">
                            <div class="col-6 mb-15">
                                <div class="form-group">
                                    <label class="form-label" for="name">Nombre Agencia</label>
                                    <input name="name" type="text" class="@error("name") is-invalid @enderror form-control" value="{{ old("name") }}" placeholder="Nombre agencia" required>
                                    @error("name") <div class="invalid-feedback">Este campo es obligatorio</div> @enderror
                                </div>
                            </div>
                            <div class="col-6 mb-15">
                                <div class="form-group">
                                    <label class="form-label" for="rif">Rif</label>
                                    <input name="rif" type="text" class="@error("rif") is-invalid @enderror form-control" value="{{ old("rif") }}" placeholder="Rif" required>
                                    @error("rif") <div class="invalid-feedback">Minimo 8 caracteres</div> @enderror
                                </div>
                            </div>
                            <div class="col-6 mb-15">
                                <div class="form-group">
                                    <label class="form-label" for="phone">Teléfono</label>
                                    <input name="phone" type="text" class="@error("phone") is-invalid @enderror form-control" value="{{ old("phone") }}" placeholder="Teléfono" required>
                                    @error("phone") <div class="invalid-feedback">Este campo es obligatorio</div> @enderror
                                </div>
                            </div>
                            <div class="col-6 mb-15">
                                <div class="form-group">
                                    <label class="form-label" for="address">Porcentaje de ganancia</label>
                                    <input name="percentage_profit" type="number" class="@error("percentage_profit") is-invalid @enderror form-control" value="{{ old("percentage_profit") }}" placeholder="Porcentaje de ganancia" required>
                                    @error("percentage_profit") <div class="invalid-feedback">Este campo es obligatorio</div> @enderror
                                </div>
                            </div>
                             <div class="col-12 mb-15">
                                <div class="form-group">
                                    <label class="form-label" for="address">Dirección</label>
                                    <input name="address" type="text" class="@error("address") is-invalid @enderror form-control" value="{{ old("address") }}" placeholder="Dirección" required>
                                    @error("address") <div class="invalid-feedback">Este campo es obligatorio</div> @enderror
                                </div>
                            </div>
                            <hr>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3>Accesos Loterias</h3>
                                        <hr>
                                        <div class="row">
                                                @foreach($lotto as $item)
                                                <div class="col-4 mb-15">
                                                    <div class="custom-control custom-checkbox">
                                                        <input name="loteria[]" value="{{$item->id}}" type="checkbox" class="custom-control-input" id="C{{$item->id}}">
                                                        <label class="custom-control-label" for="C{{$item->id}}">{{$item->name}}</label>
                                                    </div>
                                                </div>
                                                @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary float-right" type="submit">Crear</button>
                                <a class="btn btn-secondary" href="/agencies">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  
@endsection
