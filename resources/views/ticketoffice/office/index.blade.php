@extends('layouts.app')

@section('content')
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
        <li class="breadcrumb-item">Taquilla</li>
    </ol>
    <div class="col-md-6 col-sm-12 col-xs-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>
                 Taquillas <span class="fw-300"><i>Crear</i></span>
                </h2>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <div @if(($user->role_id == 2) || ($user->role_id ==3)) style="display:none;" @endif class="col mb-15">
                        <button data-toggle="modal" data-target="#new-ticketoffice" class="btn btn-primary">Nueva Taquilla</button>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="center" style="width: 35%">Habilitada</th>
                                <th class="center" style="width: 35%">Agencia</th>
                                <th class="center" style="width: 35%">Descripción</th>
                                <th class="center" style="width: 10%"><i class="fa fa-pencil"></i></th>
                                <th class="center" style="width: 10%"><i class="fa fa-trash"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($ticket_Offices as $item)
                            <tr>
                                <td class="center">
                                    <div class="custom-control custom-checkbox">
                                        <input name="status" disabled value="1" @if($item->status) checked="" @endif type="checkbox" class="custom-control-input" id="ver{{$item->id}}">
                                        <label class="custom-control-label"  for="ver{{$item->id}}" ></label>
                                    </div>
                                </td>
                                <td class="center">{{$item->name}}</td>
                                <td class="center">{{$item->descripcion}}</td>
                                <td class="center"><button  class="btn btn-secondary" data-toggle="modal" data-target="#editar-ticketoffice-{{$item->id}}"><i class="fa fa-edit"></i></button></td>
                                <td class="center"><button @if(($user->role_id == 2) || ($user->role_id ==3)) disabled @endif class="btn btn-danger" data-toggle="modal" data-target="#user-elim-{{$item->id}}"><i class="fa fa-trash"></i></button></td>
                            </tr>
                            <!-- Modal eliminar -->
                            <div class="modal modal-alert fade" id="user-elim-{{$item->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                    <form action="/taquillas/office/{{$item->id}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title">Eliminar a la taquilla {{$item->descripcion}}</h5>
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
                            <!-- fin Modal -->
                            <!-- Modal de Editar -->
                            <div class="modal fade"  id="editar-ticketoffice-{{$item->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">
                                                    Editar a {{$item->descripcion}}
                                                </h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container" style="margin: 2%;">
                                                    <form action="/taquillas/office/{{$item->id}}" method="POST">
                                                        @csrf
                                                        @method("PUT")
                                                        <div class="row">
                                                            <div class="col-4 mb-15">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="descripcion">Descripcion</label>
                                                                    <input name="descripcion" @if($user->role_id  == 2 || ($user->role_id ==3)) readonly @endif type="text" class="@error("descripcion") is-invalid @enderror form-control" value="{{$item->descripcion}}" placeholder="Descripcion" required>
                                                                    @error("descripcion") <div class="invalid-feedback">Este campo es obligatorio</div> @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-4 mb-15">
                                                                <div class="form-group ">
                                                                    <label class="form-label" for="agencia">Agencia</label>
                                                                    <select name="agency" @if(($user->role_id == 2) || ($user->role_id ==3)) disabled  @endif class="form-control " >
                                                                        <option value="">SIN AGENCIA</option>
                                                                        @foreach($Agency as $valor)
                                                                            <option  {{($item->agency_id == $valor->id) ? "selected" : ''}} value="{{$valor->id}}">{{$valor->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-4 mb-15">
                                                                <label class="form-label" for="status">Habilitar</label>
                                                                <div class="row">
                                                                    <div class="col-md-12 col-col-sm-12 mb-15 ">
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input name="status" value="1" @if($item->status) checked="" @endif type="checkbox" class="custom-control-input" id="{{$item->id}}">
                                                                            <label class="custom-control-label"  for="{{$item->id}}" ></label>
                                                                        </div>
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
                                </div>
                            <!--Fin de modal Editar -->
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL DE NUEVA TAQUILLA  -->
    <div class="modal fade"  id="new-ticketoffice" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Generar Nueva Taquilla
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container" style="margin: 2%;">
                        <form action="/taquillas/office" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-4 mb-15">
                                    <div class="form-group">
                                        <label class="form-label" for="descripcion">Descripcion</label>
                                        <input name="descripcion" type="text" class="@error("descripcion") is-invalid @enderror form-control" value="" placeholder="Descripcion" required>
                                        @error("descripcion") <div class="invalid-feedback">Este campo es obligatorio</div> @enderror
                                    </div>
                                </div>
                                <div class="col-4 mb-15">
                                    <div class="form-group ">
                                        <label class="form-label" for="agencia">Agencia</label>
                                        <select name="agency" class="form-control " >
                                            <option value="">SIN AGENCIA</option>
                                            @foreach($Agency as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4 mb-15">
                                    <label class="form-label" for="status">Habilitar</label>
                                    <div class="row">
                                        <div class="col-md-12 col-col-sm-12 mb-15 ">
                                            <div class="custom-control custom-checkbox">
                                                <input name="status" value="1" type="checkbox" class="custom-control-input" id="status">
                                                <label class="custom-control-label"  for="status" ></label>
                                            </div>
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
    </div>
<!--Fin de modal de nueva taquilla -->

@endsection
