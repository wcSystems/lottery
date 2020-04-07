<template>
    <div class="col-sm-12">
        <div id="panel-1" class="row panel">
            <div class="panel-container show">
                <div class="panel-content">
                    <button @click="crear()" class="btn btn-primary">Nuevo usuario</button>
                </div>
            </div>
        </div>


        <div class="row">
            <div v-if="modoTabla" id="panel-1" class="panel col-sm-12">
                <div class="panel-container show">
                    <div class="panel-content">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="center" >ID</th>
                                    <th class="center" >Nombre y Apellido</th>
                                    <th class="center" >Email</th>
                                    <th class="center" >Type</th>
                                    <th class="center" >Master</th>
                                    <th class="center" ><i class="fa fa-pencil"></i></th>
                                    <th class="center" ><i class="fa fa-trash"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr  v-for="(item, index) in users" :key="index">
                                    <td class="center">{{item.id}}</td>
                                    <td class="center">{{item.firstname}} {{item.lastname}}</td>
                                    <td class="center">{{item.email}}</td>
                                    <td class="center">{{item.type}}</td>
                                    <td class="center">{{item.master}}</td>
                                    <td class="center"><button class="btn btn-secondary" @click="editar(item)"><i class="fa fa-edit"></i></button></td>
                                    <td class="center"><button class="btn btn-danger"  @click="eliminar(item, index)"  ><i class="fa fa-trash"></i></button></td>
                                </tr>





                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



            <div v-if="modoEditar" id="panel-1" class="panel col-sm-6">
                <div class="panel-container show">
                    <div class="panel-content">
                        <form @submit.prevent="update(user)"  enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12 mb-15">
                                    <label class="form-label" for="imagen">Imagen</label>
                                </div>
                                <div class="col-6 mb-15">
                                    <div class="form-group">
                                        <label class="form-label" for="firstname">Nombre</label>
                                        <input name="firstname" class="form-control" type="text" v-model="user.firstname" placeholder="Nombre" required>

                                    </div>
                                </div>
                                <div class="col-6 mb-15">
                                    <div class="form-group">
                                        <label class="form-label" for="lastname">Apellido</label>
                                        <input name="lastname" class="form-control" type="text" v-model="user.lastname" placeholder="Apellido" required>
                                    </div>
                                </div>
                                <div class="col-6 mb-15">
                                    <div class="form-group">
                                        <label class="form-label" for="email">Apellido</label>
                                        <input name="email" class="form-control" type="text" v-model="user.email" placeholder="Apellido" required>
                                    </div>
                                </div>
                                <div class="col-6 mb-15">
                                    <div class="form-group">
                                        <label class="form-label" for="email">Profile</label>
                                        <input name="profile" type="file" id="file" ref="file" v-on:change="handleFileUpload()"/>
                                        <input name="profile" class="form-control" type="files" v-model="user.profile" placeholder="Profile" required>
                                    </div>
                                </div>
                                <div class="col-6 mb-15">
                                    <div class="form-group">
                                        <label class="form-label" for="doc">Documento</label>
                                        <input name="doc" class="form-control" type="text" v-model="user.doc" placeholder="Documento" required>
                                    </div>
                                </div>
                                <div class="col-6 mb-15">
                                    <div class="form-group">
                                        <label class="form-label" for="password">Password</label>
                                        <input name="password" class="form-control" type="text" v-model="user.password" placeholder="Password" required>
                                    </div>
                                </div>
                                <div v-if="validat" class="form-group col-6 mb-15">
                                    <label class="form-label" for="role_id">Tipo</label>
                                    <select name="role_id" type="text" v-model="user.type" class="form-control" required>
                                        <option selected value="none" disabled>Seleccione una opcion</option>
                                        <option value="1">Master</option>
                                        <option value="2">Afiliate</option>
                                    </select>
                                </div>
                                <div v-if="validat" class="col-md-12 col-sm-12">
                                    <h3>Accesos</h3>
                                    <div class="row">
                                        <div v-for="(item, index) in menus" :key="index" class="col-6">
                                            <div  class="col-12 mb-15">
                                                <h4>{{item.nombre}}</h4>
                                                <div v-for="(item, index) in item.hijos" :key="index" class="col-12 mb-15">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input"  name="access[]" type="checkbox"  :id="'C'+item.id+''"  v-bind:value="item.id"   >
                                                        <label class="custom-control-label" :for="'C'+item.id+''" >{{item.name}}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-12">
                                    <button class="btn btn-primary float-right ml-3" type="submit">Guardar</button>
                                    <button class="btn btn-secondary float-right" @click="cancelar()" type="button">Cancelar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div v-if="modoCrear" id="panel-1" class="panel col-sm-6" >
                <div class="panel-container show">
                    <div class="panel-content">
                        <form @submit.prevent="crear"  enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12 mb-15">
                                    <label class="form-label" for="imagen">Imagen</label>
                                </div>
                                <div class="col-6 mb-15">
                                    <div class="form-group">
                                        <label class="form-label" for="firstname">Nombre</label>
                                        <input name="firstname" class="form-control  form-control-warning" type="text" v-model="user.firstname" placeholder="Nombre">
                                        <div class="invalid-feedback">Make sure this is a number between 1 and 10.</div>
                                    </div>
                                </div>
                                <div class="col-6 mb-15">
                                    <div class="form-group">
                                        <label class="form-label" for="lastname">Apellido</label>
                                        <input name="lastname" class="form-control" type="text" v-model="user.lastname" placeholder="Apellido">
                                    </div>
                                </div>
                                <div class="col-6 mb-15">
                                    <div class="form-group">
                                        <label class="form-label" for="email">Email</label>
                                        <input name="email" class="form-control" type="text" v-model="user.email" placeholder="Apellido" >
                                    </div>
                                </div>
                                <div class="col-6 mb-15">
                                    <div class="form-group">
                                        <label class="form-label" for="email">Profile</label>
                                        <input name="profile" class="form-control" type="file" placeholder="Profile" @change="getImage" accept="image/*">
                                    </div>
                                </div>
                                <div class="col-6 mb-15">
                                    <div class="form-group">
                                        <label class="form-label" for="doc">Documento</label>
                                        <input name="doc" class="form-control" type="text" v-model="user.doc" placeholder="Documento" >
                                    </div>
                                </div>
                                <div class="col-6 mb-15">
                                    <div class="form-group">
                                        <label class="form-label" for="password">Password</label>
                                        <input name="password" class="form-control" type="text" v-model="user.password" placeholder="Password" >
                                    </div>
                                </div>
                                <div v-if="validat" class="form-group col-6 mb-15">
                                    <label class="form-label" for="role_id">Tipo</label>
                                    <select name="role_id" type="text" v-model="user.type" class="form-control" >
                                        <option selected value="none" disabled>Seleccione una opcion</option>
                                        <option value="1">Master</option>
                                        <option value="2">Afiliate</option>
                                    </select>
                                </div>
                                <div v-if="validat" class="col-md-12 col-sm-12">
                                    <h3>Accesos</h3>
                                    <div class="row">
                                        <div v-for="(item, index) in menus" :key="index" class="col-6">
                                            <div  class="col-12 mb-15">
                                                <h4>{{item.nombre}}</h4>
                                                <div v-for="(item, index) in item.hijos" :key="index" class="col-12 mb-15">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input"  name="access[]" type="checkbox"  :id="'C'+item.id+''"  v-bind:value="item.id" v-model="user.access"  >
                                                        <label class="custom-control-label" :for="'C'+item.id+''" >{{item.name}}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>











                                <hr>
                                <div class="col-12">
                                    <button class="btn btn-primary float-right ml-3" type="submit">Guardar</button>
                                    <button class="btn btn-secondary float-right" @click="cancelar()" type="button">Cancelar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>




        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                errors: [],
                users: [],
                menus: [],
                user:{firstname:'',lastname:'',email:'',profile:'',doc:'',password:'', type:'',access: []},
                modoEditar: false,
                modoCrear: false,
                modoTabla: true,
                validat: true
            }
        },
        created(){
            axios.get('/usuarios').then(res=>{
            this.users = res.data;
            }),
            axios.get('/menus').then(res=>{
            this.menus = res.data;
            })
            axios.get('/userauth').then(res=>{
                if(res.data > 1 ){
                    this.validat = false
                }
            })
        },
        methods:{
            editar(item){
                this.user.id = item.id;
                this.user.firstname = item.firstname;
                this.user.lastname = item.lastname;
                this.user.email = item.email;
                this.user.profile = item.profile;
                this.user.doc = item.doc;
                this.user.password = item.password;
                this.user.type = item.type;
                this.user.access = item.access;
                this.modoTabla = false;
                this.modoCrear = false;
                this.modoEditar = true;
                },
            crear(){
                const userNuevo = this.user;
                this.user = {firstname: '', lastname: '', email: '', profile: '', doc: '', password: '', type:'',access: []};
                this.modoTabla = false;
                this.modoEditar = false;
                this.modoCrear = true;
                if (!this.user.firstname) {
                    this.errors.push('El nombre es obligatorio.');
                }
                if (!this.user.lastname) {
                    this.errors.push('La edad es obligatoria.');
                }
                console.log(userNuevo)
                axios.post('/users', userNuevo)
                    .then((res) =>{
                        this.modoCrear = false;
                        this.modoEditar = false;
                        this.modoTabla = true;
                        const userServidor = res.data;
                        this.users.push(userServidor);
                    })
            },
            cancelar(){

                this.modoEditar = false;
                this.modoCrear = false;
                this.modoTabla = true;

            },
            eliminar(user, index){
                        axios.delete(`/users/${user.id}`)
                        .then(()=>{
                            this.users.splice(index, 1);
                        })


            },
            update(user){
                const userUpdate = {firstname: user.firstname, lastname: user.lastname, email: user.email, profile: user.profile, doc: user.doc, password: user.password, type: user.type};
                axios.put(`/users/${user.id}`, userUpdate)
                    .then((res) =>{
                        this.modoCrear = false;
                        this.modoEditar = false;
                        this.modoTabla = true;
                        const index = this.users.findIndex(item => item.id === user.id);
                        this.users[index] = res.data;
                    })
            },

        },
    }


    $(document).ready(function()
    {
        $("#demo_1").ionRangeSlider(
        {
            skin: "sharp",
            type: "double",
            grid: true,
            min: 0,
            max: 100,
            from: 20,
            to: 80,
            prefix: "%"
        });
    })






</script>
