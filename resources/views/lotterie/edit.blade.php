@extends('layouts.app')

@section('content')
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
        <li class="breadcrumb-item">Loterias</li>
        <li class="breadcrumb-item">{{$edit->name}}</li>
    </ol>
    <div class="col-md-12 col xs 12 col sm 12">
        <div id="panel-1" class="panel">
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="row">
                        <div class="col">
                            <a class="btn btn-secondary" href="/lotteries">Atras</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="panel-1" class="panel">
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="row">
                        <form action="/lotteries/{{$edit->id}}" method="POST"  enctype="multipart/form-data" style="width:100%">
                            <div class="row">
                                @csrf
                                @method("PUT")
                                <div class="col-md-10 col-sm-12 offset-md-1 mb-15" id="app_edit_ticket">
                                    <div class="row">
                                        <div class="col-6 mb-15">
                                            <div class="form-group">
                                                <label class="form-label" for="name">Nombre</label>
                                                <input name="name" type="text" class="@error("name") is-invalid @enderror form-control" value="{{ $edit->name }}" placeholder="Nombre" required>
                                                @error("name") <div class="invalid-feedback">Este campo es obligatorio</div> @enderror
                                            </div>
                                        </div>
                                        <div class="col mb-15">
                                            <div id="app2" class="row mb-15">
                                                <div class="form-group">
                                                    <label class="form-label" for="image">Imagen</label>
                                                    <input name="image" class="@error("image") is-invalid @enderror form-control form-control-file" placeholder="Imagen asociada" type="file" @change="onFileChange"/>
                                                </div>
                                                <div class="col-4" id="preview">
                                                    <img v-if="url" :src="url" class="img-responsive" height="100" width="100" />
                                                    <img v-else src="{{ asset($edit->image) }}" class="img-responsive" height="100" width="100" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h3>Horarios</h3>
                                                    <div class="row">
                                                            @foreach($schedule as $item)
                                                            <div class="col-4 mb-15">
                                                                <div class="custom-control custom-checkbox">
                                                                <input @foreach($check as $item2) @if($item->id == $item2->id) checked="" @endif @endforeach name="horarios[]" value="{{$item->id}}" type="checkbox" class="custom-control-input" id="C{{$item->id}}">
                                                                    <!--<input name="horarios[]" value="{{$item->id}}" type="checkbox" class="custom-control-input" id="C{{$item->id}}">-->
                                                                    <label class="custom-control-label" for="C{{$item->id}}">{{$item->iniitial_schedule}}</label>
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                             @foreach($checkTypeGame as $item)
                                                    <div class="col-md-4 col-col-sm-12 mb-15">
                                                        <div class="form-group center">
                                                            <select name="boxes[]"  class="form-control lotterie-box" >
                                                                @foreach($games as $item2)
                                                                    <option  {{($item->id == $item2->id) ? "selected" : ''}}   value="{{$item2->id}}">{{$item2->description}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md 12 mb-15 center">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const vm = new Vue({
            el: '#app_edit_ticket',
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
