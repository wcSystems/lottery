@extends('layouts.app')

@section('content')
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
        <li class="breadcrumb-item">Afiliados</li>
    </ol>
    
    <div class="col-md-12 col xs 12 col sm 12">
        <div @if(($user->role_id == 2) || ($user->role_id ==3)) style="display:none;" @endif id="panel-1" class="panel">
            <div class="panel-container show">
                <div class="panel-content">
                    <a href="/agencies/new" class="btn btn-primary">Nueva Agencia</a>
                </div>
            </div>
        </div>
        <div id="panel-1" class="panel">
            <div class="panel-container show">
                <div class="panel-content">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th @if(($user->role_id == 2) || ($user->role_id ==3)) style="display:none;" @endif class="center" style="width: 5%">ID</th>
                            <th class="center" style="width: 20%">Nombre Agencia</th>
                            <th class="center" style="width: 10%">Teléfono</th>
                            <th class="center" style="width: 15%">Rif</th>
                            <th class="center" style="width: 30%">Dirección</th>
                            <th class="center" style="width: 10%"><i class="fa fa-pencil"></i></th>
                            <th class="center" style="width: 10%"><i class="fa fa-trash"></i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($agencies as $item)
                            <tr>
                                <td @if(($user->role_id == 2) || ($user->role_id ==3)) style="display:none;" @endif class="center">{{ $item->id }}</td>
                                <td class="center">{{ $item->name }}</td>
                                <td class="center">{{ $item->phone }}</td>
                                <td class="center">{{ $item->rif }}</td>
                                <td class="center">{{ $item->address }}</td>
                                <td class="center"><a class="btn btn-secondary" href="/agencies/{{ $item->id }}"><i class="fa fa-edit"></i></a></td>
                                <td class="center"><button @if(($user->role_id == 2) || ($user->role_id ==3)) disabled @endif class="btn btn-danger" data-toggle="modal" data-target="#agency-elim-{{ $item->id }}"><i class="fa fa-trash"></i></button></td>
                            </tr>
                            <div class="modal modal-alert fade" id="agency-elim-{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Eliminar a {{ $item->name }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Esta accion no se puede deshacer
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <a type="button" href="/agencies/{{ $item->id }}/remove" class="btn btn-primary">Continuar</a>
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
