@extends('layouts.app')

@section('content')
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
        <li class="breadcrumb-item">Mi taquilla</li>
    </ol>
    <div class="col-md-6 col-sm-12 col-xs-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>
                    Usuario <span class="fw-300"><i>Habilitados</i></span>
                </h2>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="col mb-15">
                        <button data-toggle="modal" data-target="#new-sub-user" class="btn btn-primary">Agregar acceso</button>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="center" style="width: 35%">Nombre</th>
                                <th class="center" style="width: 35%">Apellido</th>
                                <th class="center" style="width: 10%"><i class="fa fa-pencil"></i></th>
                                <th class="center" style="width: 10%"><i class="fa fa-trash"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($user_taquilla as $item)
                            <tr>
                                <td class="center">{{$item->firstname}}</td>
                                <td class="center">{{$item->lastname}}</td>
                                <td class="center"><a data-toggle="modal" class="btn btn-secondary waves-effect waves-themed" data-target="#user-edit-{{$item->id}}"><i class="fa fa-edit"></i></a></td>
                                <td class="center"><button class="btn btn-danger" data-toggle="modal" data-target="#user-elim-{{$item->id}}"><i class="fa fa-trash"></i></button></td>
                            </tr>
                            <div class="modal modal-alert fade" id="user-elim-{{$item->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                    <form action="/taquillas/{{$item->id}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title">Eliminar a {{$item->firstname}} {{$item->lastname}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Esta accion no se puede deshacer
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Continuar</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>

                            <!-----------------------Model-editr-------------------------->
                            <div class="modal fade" id="user-edit-{{$item->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">
                                                Modificar datos
                                                <small class="m-0 text-muted">
                                                    Modificar usuario con permisos reducidos
                                                </small>
                                            </h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/taquillas/{{$item->id}}" method="POST">
                                                @csrf
                                                @method("PUT")
                                                <div class="row">
                                                    <div class="col-6 mb-15">
                                                        <div class="form-group">
                                                            <label class="form-label" for="firstname">Nombre</label>
                                                            <input name="firstname" type="text" class="@error("firstname") is-invalid @enderror form-control" value="{{$item->firstname}}" placeholder="Nombre" required>
                                                            @error("firstname") <div class="invalid-feedback">Este campo es obligatorio</div> @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 mb-15">
                                                        <div class="form-group">
                                                            <label class="form-label" for="lastname">Apellido</label>
                                                            <input name="lastname" type="text" class="@error("lastname") is-invalid @enderror form-control" value="{{$item->lastname}}" placeholder="Apellido" required>
                                                            @error("lastname") <div class="invalid-feedback">Este campo es obligatorio</div> @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 mb-15">
                                                        <div class="form-group">
                                                            <label class="form-label" for="doc">Documento</label>
                                                            <input name="doc" type="text" class="@error("doc") is-invalid @enderror form-control" value="{{$item->doc}}" placeholder="Documento" required>
                                                            @error("doc") <div class="invalid-feedback">Minimo 8 caracteres</div> @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 mb-15">
                                                        <div class="form-group">
                                                            <label class="form-label" for="email">Email</label>
                                                            <input name="email" type="text" class="@error("email") is-invalid @enderror form-control" value="{{$item->email}}" placeholder="Email" required>
                                                            @error("email") <div class="invalid-feedback">No es un correo valido o ya esta registrado</div> @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 mb-15">
                                                        <div class="form-group">
                                                            <label class="form-label" for="password">Password</label>
                                                            <input name="password" type="text" class="@error("password") is-invalid @enderror form-control" value="" placeholder="Password" required>
                                                            @error("password") <div class="invalid-feedback">No es una clave valida</div> @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary float-left" data-dismiss="modal">Cerrar</button>
                                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="new-sub-user" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Generar Nuevo Acceso
                        <small class="m-0 text-muted">
                            Creara un nuevo usuario con permisos reducidos
                        </small>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/taquillas" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-6 mb-15">
                                <div class="form-group">
                                    <label class="form-label" for="firstname">Nombre</label>
                                    <input name="firstname" type="text" class="@error("firstname") is-invalid @enderror form-control" value="{{old("firstname")}}" placeholder="Nombre" required>
                                    @error("firstname") <div class="invalid-feedback">Este campo es obligatorio</div> @enderror
                                </div>
                            </div>
                            <div class="col-6 mb-15">
                                <div class="form-group">
                                    <label class="form-label" for="lastname">Apellido</label>
                                    <input name="lastname" type="text" class="@error("lastname") is-invalid @enderror form-control" value="{{old("lastname")}}" placeholder="Apellido" required>
                                    @error("lastname") <div class="invalid-feedback">Este campo es obligatorio</div> @enderror
                                </div>
                            </div>
                            <div class="col mb-15">
                                <div class="form-group">
                                    <label class="form-label" for="doc">Documento</label>
                                    <input name="doc" type="text" class="@error("doc") is-invalid @enderror form-control" value="{{old("doc")}}" placeholder="Documento" required>
                                    @error("doc") <div class="invalid-feedback">Minimo 8 caracteres</div> @enderror
                                </div>
                            </div>
                            <div class="col-6 mb-15">
                                <div class="form-group">
                                    <label class="form-label" for="email">Email</label>
                                    <input name="email" type="text" class="@error("email") is-invalid @enderror form-control" value="{{old("email")}}" placeholder="Email" required>
                                    @error("email") <div class="invalid-feedback">No es un correo valido o ya esta registrado</div> @enderror
                                </div>
                            </div>
                            <div class="col-6 mb-15">
                                <div class="form-group">
                                    <label class="form-label" for="email">Password</label>
                                    <input name="password" type="text" class="@error("password") is-invalid @enderror form-control" value="{{old("password")}}" placeholder="Password" required>
                                    @error("password") <div class="invalid-feedback">No es una clave valida</div> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary float-left" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-------------->

@endsection
