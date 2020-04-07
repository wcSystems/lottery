@extends('layouts.app')

@section('content')
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
        <li class="breadcrumb-item">Juegos</li>
        <li class="breadcrumb-item">{{$game->description}}</li>
        <li class="breadcrumb-item">Elementos</li>
        <li class="breadcrumb-item">Nuevo</li>
    </ol>
    <div class="col-md-6 col-sm-12 col-xs-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>
                    Nuevo <span class="fw-300"><i>Elemento</i> para <i>{{$game->description}}</i></span>
                </h2>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <form action="/games/{{$game->id}}/elements/new/create" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="row">
                            <div class="col mb-15">
                                <div class="form-group">
                                    <label class="form-label" for="name">Nombre</label>
                                    <input name="name" type="text" class="@error("name") is-invalid @enderror form-control" value="{{old("name")}}" placeholder="Nombre" required>
                                    @error("name") <div class="invalid-feedback">Ya existe un Elemento con el mismo nombre</div> @enderror
                                </div>
                                <div id="app_img" class=" form-group">
                                    <div  class="col-8">
                                        <label class="form-label" for="image">Imagen</label>
                                        <input name="image" class="@error("image") is-invalid @enderror form-control form-control-file" placeholder="Imagen asociada" required type="file" @change="onFileChange"/>
                                    </div>
                                    <hr>
                                    <div class="col-4" id="preview">
                                        <img v-if="url" :src="url" class="img-responsive" height="100" width="100" />
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="col-12">
                                <button class="btn btn-primary float-right" type="submit">Crear</button>
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
    el: '#app_img',
    data() {
        return {
        url: null,
        }
    },
    methods: {
        onFileChange(e) {
        const file = e.target.files[0];
        this.url = URL.createObjectURL(file);
        }
    }
    })
</script>
@endsection
