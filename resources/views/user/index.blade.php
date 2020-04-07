@extends('layouts.app')

@section('content')
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
        <li class="breadcrumb-item">Usuarios</li>
    </ol>
    <div class="col-md-12 col xs 12 col sm 12">
        @if($user->role_id != 3)
        <div id="panel-1" class="panel">
            <div class="panel-container show">
                <div class="panel-content">
                    <a class="btn btn-primary" href="/users/create">Nuevo usuario</a>
                </div>
            </div>
        </div>
        @endif
        <div id="panel-1" class="panel">
            <div class="panel-container show">
                <div class="panel-content">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="center" style="width: 10%">Foto</th>
                                <th class="center" style="width: 25%">Nombre y Apellido</th>
                                <th class="center" style="width: 25%">Agencia</th>
                                <th class="center" style="width: 10%" >Rol</th>
                                <th class="center" style="width: 20%" >Afiliado</th>
                                <th class="center" style="width: 10%"><i class="fa fa-pencil"></i></th>
                                @if($user->role_id != 3)
                                <th class="center" style="width: 10%"><i class="fa fa-trash"></i></th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($users as $item)
                                <tr>
                                    <td class="center"><img src="{{ asset($item->profile) }}" class="img-responsive rounded-circle" height="50" width="50" /></td>
                                    <td class="center">{{$item->firstname}} {{$item->lastname}}</td>
                                    <td class="center">{{$item->agencia}}</td>
                                    <td class="center">{{$item->rol}}</td>
                                    <td class="center">@foreach($user_all as $item2) @if($item->master == $item2->id) {{ $item2->firstname }} {{ $item2->lastname }} @endif @endforeach</td>
                                    <td class="center"><a class="btn btn-secondary" href="/users/{{$item->id}}/edit"><i class="fa fa-edit"></i></a></td>
                                    @if($user->role_id != 3)
                                    <td class="center"><button class="btn btn-danger" data-toggle="modal" data-target="#user-elim-{{$item->id}}"><i class="fa fa-trash"></i></button></td>
                                    @endif
                                </tr>
                                <div class="modal modal-alert fade" id="user-elim-{{$item->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <form action="/users/{{$item->id}}" method="POST">
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
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
