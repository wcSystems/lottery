@extends('layouts.app')

@section('content')
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
        <li class="breadcrumb-item">Afiliados</li>
        <li class="breadcrumb-item">{{$edit->name}}</li>
    </ol>
    <div class="col-md-6 col-sm-12 col-xs-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>
                    Editar <span class="fw-300"><i>Afiliado</i></span>
                </h2>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <form action="/afiliates/{{$edit->id}}/update" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="row">
                            <div class="col-6 mb-15">
                                <div class="form-group">
                                    <label class="form-label" for="firstname">Nombre</label>
                                    <input name="firstname" type="text" class="@error("firstname") is-invalid @enderror form-control" value="{{ $edit->firstname }}" placeholder="Nombre" required>
                                    @error("firstname") <div class="invalid-feedback">Este campo es obligatorio</div> @enderror
                                </div>
                            </div>
                            <div class="col mb-15">
                                    <div class="form-group">
                                        <label class="form-label" for="lastname">Apellido</label>
                                        <input name="lastname" type="text" class="@error("lastname") is-invalid @enderror form-control" value="{{ $edit->lastname }}" placeholder="Apellido" required>
                                        @error("lastname") <div class="invalid-feedback">Este campo es obligatorio</div> @enderror
                                    </div>
                                </div>
                            <div class="col-6 mb-15">
                                <div class="form-group">
                                    <label class="form-label" for="doc">Documento</label>
                                    <input name="doc" type="text" class="@error("doc") is-invalid @enderror form-control" value="{{ $edit->doc }}" placeholder="Documento" required>
                                    @error("doc") <div class="invalid-feedback">Minimo 8 caracteres</div> @enderror
                                </div>
                            </div>
                            <div class="col mb-15">
                                <div class="form-group">
                                    <label class="form-label" for="password">Password</label>
                                    <input name="password" type="text" class="@error("password") is-invalid @enderror form-control" value="{{old("password")}}" placeholder="Password" required>
                                    @error("password") <div class="invalid-feedback">Minimo 8 caracteres</div> @enderror
                                </div>
                            </div>
                            <div class="col-12 mb-15">
                                <div class="form-group">
                                    <label class="form-label" for="email">Email</label>
                                    <input name="email" type="text" class="@error("email") is-invalid @enderror form-control" value="{{ $edit->email }}" placeholder="Email" required>
                                    @error("email") <div class="invalid-feedback">No es un correo valido o ya esta registrado</div> @enderror
                                </div>
                            </div>
                            <div id="app2" class="row mb-15">
                                <div class="col-md-8 form-group">
                                    <input name="profile" type="file" @change="onFileChange"/>
                                </div>
                                <div class="col-md-4 form-group" id="preview">
                                    <img v-if="url" :src="url" class="img-responsive" height="100" width="100" />
                                    <img v-else src="{{ asset($edit->profile) }}" class="img-responsive" height="100" width="100" />
                                </div>
                            </div>
                            <hr>
                            <div class="col-12">
                                <button class="btn btn-primary float-right" type="submit">Guardar</button>
                                <a class="btn btn-secondary" href="/afiliates">Cancelar</a>
                            </div>
                        </div>
                    </form>
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
