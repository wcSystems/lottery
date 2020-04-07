@extends('layouts.app')

@section('content')
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
        <li class="breadcrumb-item">Agencias</li>
        <li class="breadcrumb-item">{{$edit->name}}</li>
    </ol>
    <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Editar <span class="fw-300"><i>Agencia</i></span>
                    </h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <form action="/agencies/{{ $edit->id }}/update" method="POST">
                            @csrf
                            @method("PUT")
                            <div class="row"> 
                                <div class="col-6 mb-15">
                                    <div class="form-group">
                                        <label class="form-label" for="name">Nombre</label>
                                        <input name="name" type="text" class="@error("name") is-invalid @enderror form-control" value="{{ $edit->name }}" placeholder="Nombre" required>
                                        @error("name") <div class="invalid-feedback">Este campo es obligatorio</div> @enderror
                                    </div>
                                </div>
                                <div class="col-6 mb-15">
                                    <div class="form-group">
                                        <label class="form-label" for="rif">Rif</label>
                                        <input name="rif" type="text" class="@error("rif") is-invalid @enderror form-control" value="{{ $edit->rif }}" placeholder="Rif" required>
                                        @error("rif") <div class="invalid-feedback">Minimo 8 caracteres</div> @enderror
                                    </div>
                                </div>
                                <div class="col-6 mb-15">
                                        <div class="form-group">
                                            <label class="form-label" for="phone">Teléfono</label>
                                            <input name="phone" type="text" class="@error("phone") is-invalid @enderror form-control" value="{{ $edit->phone }}" placeholder="Teléfono" required>
                                            @error("phone") <div class="invalid-feedback">Este campo es obligatorio</div> @enderror
                                        </div>
                                </div>
                                <div class="col-6 mb-15">
                                    <div class="form-group">
                                        <label class="form-label" for="percentage_profit">Porcentaje de ganancia</label>
                                        <input @if(($user->role_id == 2) || ($user->role_id ==3)) readonly @endif name="percentage_profit" type="text" class="@error("percentage_profit") is-invalid @enderror form-control" value="{{ $edit->percentage_profit  }}" placeholder="Porcentaje de ganacia" required>
                                        @error("percentage_profit") <div class="invalid-feedback">Este campo es obligatorio</div> @enderror
                                    </div>
                                </div>
                                <div class="col-12 mb-15">
                                    <div class="form-group">
                                        <label class="form-label" for="address">Dirección</label>
                                        <input name="address" type="text" class="@error("address") is-invalid @enderror form-control" value="{{ $edit->address  }}" placeholder="Dirección" required>
                                        @error("address") <div class="invalid-feedback">Este campo es obligatorio</div> @enderror
                                    </div>
                                </div>
                                <hr>
                                <div @if(($user->role_id == 2) || ($user->role_id ==3)) style="display:none;" @endif class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3>Accesos Loterias</h3>
                                            <div class="row">
                                                    @foreach($lotto as $item)
                                                    <div class="col-4 mb-15">
                                                        <div class="custom-control custom-checkbox">
                                                        <input @foreach($agency_lottery as $item2) @if($item->id == $item2->id) checked="" @endif @endforeach name="loteria[]" value="{{$item->id}}" type="checkbox" class="custom-control-input" id="C{{$item->id}}">
                                                            <label class="custom-control-label" for="C{{$item->id}}">{{$item->name}}</label>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-12">
                                    <button class="btn btn-primary float-right" type="submit">Guardar</button>
                                    <a class="btn btn-secondary" href="/agencies">Cancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 " >
            <div id="panel-1" class="panel">
                <div class="panel-hdr mb-3">
                    <h2>
                        Control <span class="fw-300"><i>Agencia</i></span>
                    </h2>
                </div>
                <div class="row ">
                    
                    <div class="col-md-6 " >
                        <div class="panel-hdr">
                            <h2>
                                Usuarios
                            </h2>
                        </div>
                        <div class="panel-container show">
                            
                            <div class="panel-content">
                                <table class="table table-striped table-hover">
                                    <thead class="bg-primary-400">
                                    <tr>
                                        <th class="center" style="width: 20%">Nombre</th>
                                        <th class="center" style="width: 20%">Rol</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($usuarios as $item)
                                            <tr>
                                                <td class="center">{{$item->firstname}} {{$item->lastname}}</td>
                                                <td class="center">{{$item->name}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 " >
                        <div class="panel-hdr">
                            <h2>
                                Taquillas
                            </h2>
                        </div>
                        <div class="panel-container show">
                            <div class="panel-content">
                                <table class="table table-striped table-hover">
                                    <thead class="bg-primary-400">
                                    <tr>
                                        <th class="center" style="width: 20%">Status</th>
                                        <th class="center" style="width: 20%">Taquillas</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($taquillas as $item)
                                            <tr>
                                                <td class="center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input name="status" disabled value="1" @if($item->status) checked="" @endif type="checkbox" class="custom-control-input" id="ver{{$item->id}}">
                                                        <label class="custom-control-label"  for="ver{{$item->id}}" ></label>
                                                    </div>
                                                </td>
                                                <td class="center">{{$item->descripcion}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
