@extends('layouts.app')

@section('content')
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
        <li class="breadcrumb-item">Afiliados</li>
    </ol>
    <div class="col-md-12 col xs 12 col sm 12">
        <div id="panel-1" class="panel">
            <div class="panel-container show">
                <div class="panel-content">
                    <a href="/afiliates/new" class="btn btn-primary">Nuevo afiliado</a>
                </div>
            </div>
        </div>
        <div id="panel-1" class="panel">
            <div class="panel-container show">
                <div class="panel-content">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th class="center" style="width: 20%">Foto</th>
                            <th class="align-middle" style="width: 30%">Nombre y Apellido</th>
                            <th class="align-middle" style="width: 30%">Email</th>
                            <th class="center" style="width: 10%"><i class="fa fa-pencil"></i></th>
                            <th class="center" style="width: 10%"><i class="fa fa-trash"></i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $item)
                            <tr>
                                <td class="center"><img src="{{ asset($item->profile) }}" class="img-responsive" height="50" width="50" /></td>
                                <td class="align-middle">{{ $item->firstname }} {{ $item->lastname }}</td>
                                <td class="align-middle">{{$item->email}}</td>
                                <td class="center"><a class="btn btn-secondary" href="/afiliates/{{$item->id}}"><i class="fa fa-edit"></i></a></td>
                                <td class="center"><button class="btn btn-danger" data-toggle="modal" data-target="#user-elim-{{$item->id}}"><i class="fa fa-trash"></i></button></td>
                            </tr>
                            <div class="modal modal-alert fade" id="user-elim-{{$item->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Eliminar a {{$item->name}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Esta accion no se puede deshacer
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <a type="button" href="/afiliates/{{$item->id}}/remove" class="btn btn-primary">Continuar</a>
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
@endsection
