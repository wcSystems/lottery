@extends('layouts.app')

@section('content')
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
        <li class="breadcrumb-item">Usuarios</li>
        <li class="breadcrumb-item">Nuevo</li>
    </ol>
    <div class="col-sm-6">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>
                    Nuevo <span class="fw-300"><i>Usuario</i></span>
                </h2>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <form action="/users" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div id="app_create_user" class="row">
                            <div class="col-12 mb-15">
                                    <label class="form-label" for="imagen">Imagen</label>
                                <div id="preview" class="form-group">
                                    <img v-if="url" :src="url" class="img-responsive" height="100" width="100" />
                                </div>
                            </div>
                            <div class="col-6 mb-15">
                                <div class="form-group">
                                    <label class="form-label" for="firstname">Nombre</label>
                                    <input name="firstname" autocomplete="firstname" type="text" class="@error("firstname") is-invalid @enderror form-control" value="{{old("firstname")}}" placeholder="Nombre" required>
                                    @error("firstname") <div class="invalid-feedback">Este campo es obligatorio</div> @enderror
                                </div>
                            </div>
                            <div class="col-6 mb-15">
                                <div class="form-group">
                                    <label class="form-label" for="lastname">Apellido</label>
                                    <input name="lastname" type="text" class="@error("lastname") is-invalid @enderror form-control" value="{{old("lastname")}}" placeholder="Apellido" required>
                                    @error("lastname") <div class="invalid-feedback">Este campo es obligatorio</div> @enderror
                                </div>
                            </div>
                            <div class="col-6 mb-15">
                                <div class="form-group">
                                    <label class="form-label" for="email">Email</label>
                                    <input name="email" type="text" class="@error("email") is-invalid @enderror form-control" value="{{old("email")}}" placeholder="Email" required>
                                    @error("email") <div class="invalid-feedback">No es un correo valido o ya esta registrado</div> @enderror
                                </div>
                            </div>
                            <div class="col-6 mb-15">
                                <div class="form-group">
                                    <label class="form-label" for="profile">Profile</label>
                                    <input name="profile" type="file" @change="onFileChange" class="@error("profile") is-invalid @enderror form-control" value="{{old("profile")}}" placeholder="Profile" required>
                                    @error("profile") <div class="invalid-feedback">No es un imagen valida</div> @enderror
                                </div>
                            </div>


                            <div class="col-6 mb-15">
                                <div class="form-group">
                                    <label class="form-label" for="doc">Documento</label>
                                    <input name="doc" type="text" class="@error("doc") is-invalid @enderror form-control" value="{{old("doc")}}" placeholder="Documento" required>
                                    @error("doc") <div class="invalid-feedback">Minimo 8 caracteres</div> @enderror
                                </div>
                            </div>
                            <div class="col mb-15">
                                <div class="form-group">
                                    <label class="form-label" for="doc">Password</label>
                                    <input name="password" type="password" class="@error("password") is-invalid @enderror form-control" value="{{old("password")}}" placeholder="Password" required>
                                    @error("password") <div class="invalid-feedback">Minimo 8 caracteres</div> @enderror
                                </div>
                            </div>

                            <div class="form-group col-6 mb-15">
                                <label class="form-label" for="role_id">Rol</label>
                                <select name="role_id" class="form-control" required>
                                    <option value="">Sin Rol</option>
                                    @foreach($roles as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col mb-15">
                                <label class="form-label" for="agencia">Agencia</label>
                                <select name="agency_id" class="form-control" {{($user->role_id < 4) ? "required" : ''}}>
                                    <option value="">SIN AGENCIA</option>
                                    @foreach($agency as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-12 mb-15">
                                <label class="form-label" for="agencia">Afiliado</label>
                                <select name="master" class="form-control" {{($user->role_id < 4) ? "required" : ''}}>
                                    <option value="">Sin Afiliado</option>
                                    @foreach($user_afiliado as $item)
                                        <option value="{{$item->id}}">{{$item->firstname}} {{$item->lastname}}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- @if($role_id == 1 || $role_id == 4)
                            <div class="col-md-12 col-sm-12">
                                <h3>Accesos</h3>
                                <div class="row">
                                @foreach($acceso as $item)
                                @if($item->id < 6 || $role_id == 4)
                                    <div class="col-6">
                                        <div class="col-12 mb-15">
                                         <h4>{{$item->nombre}}</h4>
                                        </div>
                                        @foreach($item->hijos as $item)
                                        <div class="col-12 mb-15">
                                            <div class="custom-control custom-checkbox">
                                                <input name="access[]" value="{{$item->id}}" type="checkbox" class="custom-control-input" id="C{{$item->id}}">
                                                <label class="custom-control-label" for="C{{$item->id}}">{{$item->name}}</label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                @endif
                                @endforeach
                                </div>
                            </div>
                            @endif --}}
                            <hr>
                            <div class="col-12">
                                <button class="btn btn-primary float-right" type="submit">Crear</button>
                                <a class="btn btn-secondary" href="/users">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
            const vm = new Vue({
                el: '#app_create_user',
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
