@extends('layouts.app')

@section('content')
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
        <li class="breadcrumb-item">Loterias</li>
        <li class="breadcrumb-item">Nuevo</li>
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
                        <form action="/lotteries" method="POST" enctype="multipart/form-data" style="width:100%">
                            <div class="row">
                                @csrf
                                <div class="col-md-10 col-sm-12 offset-md-1 mb-15" id="app_ticket">
                                    <div class="row">
                                        <div class="col-4 mb-15">
                                            <div class="form-group">
                                                <label class="form-label" for="name">Nombre</label>
                                                <input name="name" type="text" class="@error("name") is-invalid @enderror form-control" value="{{old("name")}}" placeholder="Nombre" required>
                                                @error("name") <div class="invalid-feedback">Este campo es obligatorio</div> @enderror
                                            </div>
                                        </div>
                                        <div class="col-2 mb-15">
                                            <div class="form-group">
                                                <label class="col-12 form-label" for="box">Nro. Jugadas</label>
                                                {{-- <input name="box" v-model="box" type="number" class="@error("box") is-invalid @enderror form-control" value="{{old("box")}}" placeholder="¿Nro. jugadas?" min="1" max="50" required>
                                                @error("name") <div class="invalid-feedback">Este campo es obligatorio</div> @enderror  --}}
                                                <div col-12 class="btn-group" role="group" aria-label="Basic example">
                                                    <button type="button" class="btn btn-secondary" @click="incrementar" name="name">
                                                       <i class="fa fa-plus-square"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-secondary" @click="quitar" name="name">
                                                        <i class="fa fa-minus-square"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-secondary" @click="reset" name="name">
                                                        <i class="fa fa-window-close"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-15">
                                            <div class="row form-group">
                                                <div class="col-8">
                                                    <label class="form-label" for="image">Imagen</label>
                                                    <input name="image" class="@error("image") is-invalid @enderror form-control form-control-file" placeholder="Imagen asociada" required type="file" @change="onFileChange"/>
                                                </div>
                                                <div class="col-4" id="preview">
                                                    <img v-if="url" :src="url" class="img-responsive" height="100" width="100" />
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
                                                                    <input name="horarios[]" value="{{$item->id}}" type="checkbox" class="custom-control-input" id="C{{$item->id}}">
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
                                                {{--  @for($i = 1;$i<=3;$i++)  --}}
                                                    <div class="col-md-4 col-col-sm-12 mb-15" v-for="nan of newItem">
                                                        <div class="form-group center">
                                                            <select name="boxes[]" class="form-control lotterie-box" required>
                                                                <option value="">SIN ACTIVAR</option>
                                                                @foreach($games as $item)
                                                                    <option value="{{$item->id}}">{{$item->description}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                {{--  @endfor  --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md 12 mb-15 center">
                                        <button type="submit" class="btn btn-primary">Crear nueva loteria</button>
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
            el: '#app_ticket',
            data: {
                url: null,
                newItem: ['1'],
                name: ''
            },
            methods: {
              onFileChange: function(e) {
                const file = e.target.files[0];
                this.url = URL.createObjectURL(file);
              },
              incrementar: function(){
                this.newItem.push({
                    name: this.name
                })
              },
              quitar: function(){
                if (this.newItem.length>1) {
                    this.newItem.splice(0,1)
                }
              },
              reset: function(){
                this.newItem.splice(1)
              }
            }
          })

       

    </script>
@endsection
