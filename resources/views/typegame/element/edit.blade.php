@extends('layouts.app')

@section('content')
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
        <li class="breadcrumb-item">Juegos</li>
        <li class="breadcrumb-item">{{$game->description}}</li>
        <li class="breadcrumb-item">Elementos</li>
        <li class="breadcrumb-item">{{$element->description}}</li>
    </ol>
    <div class="col-md-6 col-sm-12 col-xs-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>
                    Editar <span class="fw-300"><i>Elemento {{$element->description}}</i> para <i>{{$game->description}}</i></span>
                </h2>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <form action="/games/{{$game->id}}/elements/{{$element->id}}/update" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="row" id="app_edit_element">
                            <div class="col mb-15">
                                <div class="form-group">
                                    <label class="form-label" for="name">Nombre</label>
                                    <input name="name" type="text" class="@error("name") is-invalid @enderror form-control" value="{{$element->description}} {{old("name")}}" placeholder="Nombre" required>
                                    @error("name") <div class="invalid-feedback">Ya existe un Elemento con el mismo nombre</div> @enderror
                                </div>
                                <div id="app2" class="form-group">
                                    <div  class="col-8">
                                        <label class="form-label" for="image">Imagen</label>
                                        <input name="image" class="@error("image") is-invalid @enderror form-control form-control-file" placeholder="Imagen asociada" type="file" @change="onFileChange"/>
                                    </div>
                                    <hr>
                                    <div class="col-4" id="preview">
                                        <img v-if="url" :src="url" class="img-responsive" height="100" width="100" />
                                        <img v-else src="{{ asset($element->image) }}" class="img-responsive" height="100" width="100" />
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="col-12">
                                <button class="btn btn-primary float-right" type="submit">Actualizar</button>
                                <a class="btn btn-secondary" href="/games/{{$game->id}}/elements">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
 <script>
const vm = new Vue({
    el: '#app_edit_element',
    data: {
        url: null,
    },
    methods: {
        onFileChange: function(e) {
        const file = e.target.files[0];
        this.url = URL.createObjectURL(file);
        }
    }
    })
</script>
@endsection
