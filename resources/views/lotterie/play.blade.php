@extends('layouts.app')

@section('content')
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
        <li class="breadcrumb-item">Loterias</li>
        <li class="breadcrumb-item">{{$data->name}}</li>
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
                        <form action="/lotteries" method="POST"   enctype="multipart/form-data"style="width:100%">
                            <div class="row">
                                @csrf
                                <div class="col-md-10 col-sm-12 offset-md-1 mb-15">
                                    <div class="row">
                                        <div class="col-6 mb-15">
                                            <div class="form-group">
                                                <label class="form-label" for="name">Nombre</label>
                                                <input name="name" type="text" class="@error("name") is-invalid @enderror form-control" value="{{$data->name}}" placeholder="Nombre" required>
                                                @error("name") <div class="invalid-feedback">Este campo es obligatorio</div> @enderror
                                            </div>
                                        </div>
                                        <div class="col mb-15">
                                        <div id="app2" class="row mb-15">
                                            <div class="form-group">
                                                <label class="form-label" for="image">Imagen</label>
                                                <input name="image" class="@error("image") is-invalid @enderror form-control" placeholder="Imagen asociada" required type="file" @change="onFileChange"/>
                                            </div>
                                            <div class="col-md-4" id="preview">
                                                <img v-if="url" :src="url" class="img-responsive" height="100" width="100" />
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
                                                                    <input name="horarios[]" value="{{$item->id}}" type="checkbox" class="custom-control-input" id="C{{$item->id}}">
                                                                    <label class="custom-control-label" for="C{{$item->id}}">{{$item->iniitial_schedule}}</label>
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input style="display:none;"type="text" name="box" value="{{$data->box}}">
                                        <div class="col-md-6">
                                            <div class="row">
                                                @for($i = 1;$i<=$data->box;$i++)
                                                    <div class="col-md-4 col-col-sm-12 mb-15">
                                                        <div class="form-group center">
                                                            <select name="boxes[]" class="form-control lotterie-box" id="box_{{$i}}">
                                                                <option value="">SIN ACTIVAR</option>
                                                                @foreach($games as $item)
                                                                    <option value="{{$item->id}}">{{$item->description}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md 12 mb-15 center">
                                        <button type="submit" class="btn btn-primary">Crea nueva loteria</button>
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
                el: '#app2',
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
