@extends('layouts.app')

@section('content')
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
        <li class="breadcrumb-item">Juegos</li>
        <li class="breadcrumb-item">{{$game->description}}</li>
    </ol>
    <div class="col-md-12 col xs 12 col sm 12">
        <div id="panel-1" class="panel">
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="row">
                        <div class="col">
                            <a href="/games" class="btn btn-primary">Atras</a>
                            <a class="btn btn-secondary" href="/games/{{$game->id}}/elements/new">Nuevo Elemento</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="panel-1" class="panel">
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="row">
                        @foreach($elements as $item)
                            <div class="col-3 center">
                                <img src="/storage/element/{{$item->image}}" class="rounded-circle shadow-2 img-thumbnail for-element" alt="">
                                <h2 class="header-element"> {{$item->description}}</h2>
                                <a href="/games/{{$game->id}}/elements/{{$item->id}}/edit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                <a class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#element-elim-{{$item->id}}"><i class="fa fa-trash"></i></a>
                            </div>
                            <div class="modal modal-alert fade" id="element-elim-{{$item->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Eliminar a {{$item->description}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Esta accion no se puede deshacer
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <a type="button" href="/games/{{$game->id}}/elements/{{$item->id}}/remove" class="btn btn-primary">Continuar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
