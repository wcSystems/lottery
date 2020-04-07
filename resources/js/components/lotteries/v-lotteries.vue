
<template>
    <div>
        <ol class="breadcrumb page-breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
            <li class="breadcrumb-item">Loterias</li>
        </ol>
        <div class="col-md-12 col xs 12 col sm 12">
            <div id="panel-1" class="panel">
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="row">
                            <div class="col">
                                <button v-if="bolean_index" @click="Bolean_insertar()" class="btn btn-primary waves-effect waves-themed">Nueva Loteria</button>
                                <button v-if="bolean_insertar" @click="Atras()" class="btn btn-primary waves-effect waves-themed">Atras</button>
                                <button v-if="bolean_edit" @click="Atras()" class="btn btn-primary waves-effect waves-themed">Atras</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="bolean_insertar" id="panel-1" class="panel">
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="">Configurar margenes de utilidad</label>
                                    <select name="" id="" class="form-control" v-model="select" @change="Select()">
                                        <option selected disabled  value="">Seleccione una opcion</option>
                                        <option  value="1">Baja</option>
                                        <option  value="2">Media</option>
                                        <option  value="3">Alta</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="">Criterio de premio</label>
                                    <input class="form-control" type="number" v-model="criterio" placeholder="Criterio de premio">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





            <div v-if="bolean_edit" id="panel-1" class="panel">
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="">Configurar margenes de utilidad</label>
                                    <select name="" id="edit_select" class="form-control" v-model="select" @change="Select()">
                                        <option selected disabled  value="">Seleccione una opcion</option>
                                        <option  value="1">Baja</option>
                                        <option  value="2">Media</option>
                                        <option  value="3">Alta</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="">Criterio de premio</label>
                                    <input class="form-control" type="number" v-model="criterio" placeholder="Criterio de premio">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                                    <transition id="alerta" name="slide-fade">
                                        <div  v-if="show1" class="alert alert-success alert-dismissible fade show" style="position:fixed;top:10%;right:2%;float:right">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                            </button>
                                            <div class="d-flex align-items-center">
                                                <div class="alert-icon width-8">
                                                    <span class="icon-stack icon-stack-xl">
                                                        <i class="base-2 icon-stack-3x color-success-400"></i>
                                                        <i class="base-10 text-white icon-stack-1x"></i>
                                                        <i class="ni md-profile color-success-800 icon-stack-2x"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-1 pl-1">
                                                    <span class="h2">
                                                       ¡Adoptaste la opción Baja!
                                                    </span>
                                                    <br>
                                                    Al elegir esta opción,el promedio de ganadores o premios pagados será más bajo
                                                </div>
                                            </div>
                                        </div>
                                    </transition>
                                    <transition name="slide-fade">
                                        <div  v-if="show2" class="alert alert-info alert-dismissible fade show" style="position:fixed;top:10%;right:2%;float:right">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                            </button>
                                            <div class="d-flex align-items-center">
                                                <div class="alert-icon width-8">
                                                    <span class="icon-stack icon-stack-xl">
                                                        <i class="base-2 icon-stack-3x color-info-400"></i>
                                                        <i class="base-10 text-white icon-stack-1x"></i>
                                                        <i class="ni md-profile color-info-800 icon-stack-2x"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-1 pl-1">
                                                    <span class="h2">
                                                        ¡Adoptaste la opción Media!
                                                    </span>
                                                    <br>
                                                    El promedio de ganadores y promedio de utiliadad seran iguales.
                                                </div>
                                            </div>
                                        </div>
                                    </transition>
                                    <transition name="slide-fade">
                                        <div  v-if="show3" class="alert alert-danger alert-dismissible fade show" style="position:fixed;top:10%;right:2%;float:right">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                            </button>
                                            <div class="d-flex align-items-center">
                                                <div class="alert-icon width-8">
                                                    <span class="icon-stack icon-stack-xl">
                                                        <i class="base-2 icon-stack-3x color-danger-400"></i>
                                                        <i class="base-10 text-white icon-stack-1x"></i>
                                                        <i class="ni md-profile color-danger-800 icon-stack-2x"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-1 pl-1">
                                                    <span class="h2">
                                                        ¡Adoptaste la opción Alta!
                                                    </span>
                                                    <br>
                                                    A costa de perder utilidad se tendrá un ratio de ganadores o premios más alto.
                                                </div>
                                            </div>
                                        </div>
                                    </transition>





            <!-- <div v-if="bolean_edit" id="panel-1" class="panel">
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="panel-tag">
                                    configurar margenes de utilidad
                                </div>
                                <input id="demo_8" type="text" class="d-none"   tabindex="-1" readonly="">
                            </div>
                            <div class="col-sm-6">
                                <div class="panel-tag">
                                    Criterio de premio
                                </div>
                                <input id="demo_9" type="text" class="d-none"   tabindex="-1" readonly="">
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->


        <div v-if="bolean_index" id="panel-1" class="panel">
            <div class="panel-container show">
                <div class="panel-content">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="center" style="width: 10%">ID</th>
                                <th class="center" style="width: 35%">Nombre</th>
                                <th class="center" style="width: 10%"><i class="fa fa-pencil"></i></th>
                                <th class="center" style="width: 10%"><i class="fa fa-trash"></i></th>
                            </tr>
                        </thead>
                        <tbody v-for="(item, index) in loterias" :key="index">
                 
                            <tr >
                                <td class="center">{{item.id}}</td>
                                <td class="center">{{item.name}}</td>
                                <td class="center"><button type="button" @click="editar(item)" class="btn btn-secondary" ><i class="fa fa-edit"></i></button></td>
                                <td class="center"><button class="btn btn-danger" data-toggle="modal" :data-target="'#ELIM'+item.id" ><i class="fa fa-trash"></i></button></td>
                            </tr>
                            <div class="modal modal-alert fade" :id="'ELIM'+item.id" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Eliminar a {{item.name}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Esta accion no se puede deshacer
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" @click="BDestroy(item.id,index)" class="btn btn-primary">Continuar</button>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
                        














                        
                 
              
            <div v-if="bolean_insertar" id="panel-1" class="panel">
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="row">
                            <form @submit.prevent="Insertar_loteria" enctype="multipart/form-data" style="width:100%">
                                <div class="row">
                                    <div class="col-md-10 col-sm-12 offset-md-1 mb-15" id="app_ticket">
                                        <div class="row">
                                            <div class="col-12 mb-15">
                                                <div class="form-group" id="preview">
                                                    <img v-if="url" :src="url" class="img-responsive rounded-circle"  height="100" width="100" />
                                                </div>
                                            </div>
                                            <div class="col-5 mb-15">
                                                <div class="form-group">
                                                    <label class="form-label" for="name">Nombre</label>
                                                    <input name="name" type="text" class=" form-control" value="" v-model="nombre" placeholder="Nombre" required>
                                                    <div class="invalid-feedback">Este campo es obligatorio</div>
                                                </div>
                                            </div>
                                            <div class="col-5 mb-15">
                                                <div class="form-group">
                                                    <label class="form-label" for="image">Imagen</label>
                                                    <input name="image"  class="form-control-file" id="image" type="file"  placeholder="Imagen asociada" @change="onFileChange"/>
                                                </div>
                                            </div>
                                            <div class="col-2 mb-15 center">
                                                <div class="form-group">
                                                    <label class="col-12 form-label" for="box">Nro. Jugadas</label>
                                                    <div col-12 class="btn-group" role="group" aria-label="Basic example">
                                                        <button type="button" class="btn btn-secondary"  @click="Incrementar" >
                                                        <i class="fa fa-plus-square"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-secondary" @click="Quitar">
                                                            <i class="fa fa-minus-square"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-secondary" @click="Reset">
                                                            <i class="fa fa-window-close"></i>
                                                        </button>
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
                                                            <div v-for="(item1, index1) in horarios" :key="index1" class="col-4 mb-15">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input name="" type="checkbox" class="custom-control-input" v-model="horario" v-bind:value="item1.id" :id="'C'+item1.id+''">
                                                                    <label class="custom-control-label" :for="'C'+item1.id+''">{{item1.iniitial_schedule}}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                        <div class="col-md-4 col-col-sm-12 mb-15" v-for="(nan, index) in newItem" :key="index">
                                                            <div class="form-group center">
                                                                <select  class="form-control lotterie-box" v-model="juego[index]" required>
                                                                    <option  value="">SIN ACTIVAR</option>
                                                                    <option v-for="(item2, index2) in juegos" :key="index2"  v-bind:value="item2.id" :id="'A'+item2.id+''">{{item2.description}}</option>
                                                                </select>
                                                            </div>
                                                        </div>
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



            <div v-if="bolean_edit" id="panel-1" class="panel">
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="row">
                            <form @submit.prevent="BUpdate(modelo_loteria)" enctype="multipart/form-data" style="width:100%">
                                <div class="row">
                                    <div class="col-md-10 col-sm-12 offset-md-1 mb-15" id="app_ticket">
                                        <div class="row">
                                            <div class="col-12 mb-15">
                                                <div class="form-group" id="preview">
                                                    <img v-if="url" :src="url" class="img-responsive rounded-circle"  height="100" width="100" />
                                                    <img v-else :src="modelo_loteria.imagen" class="img-responsive rounded-circle"  height="100" width="100" />
                                                </div>
                                            </div>
                                            <div class="col-5 mb-15">
                                                <div class="form-group">
                                                    <label class="form-label" for="name">Nombre</label>
                                                    <input name="name" type="text" class=" form-control" value="" v-model="nombre" placeholder="Nombre" required>
                                                    <div class="invalid-feedback">Este campo es obligatorio</div>
                                                </div>
                                            </div>
                                            <div class="col-5 mb-15">
                                                <div class="form-group">
                                                    <label class="form-label" for="image">Imagen</label>
                                                    <input name="image"  class="form-control-file" id="image" type="file"  placeholder="Imagen asociada" @change="onFileChange"/>
                                                </div>
                                            </div>
                                            <div class="col-2 mb-15 center">
                                                <div class="form-group">
                                                    <label class="col-12 form-label" for="box">Nro. Jugadas</label>
                                                    <div col-12 class="btn-group" role="group" aria-label="Basic example">
                                                        <button type="button" class="btn btn-secondary"  @click="Incrementarud" >
                                                        <i class="fa fa-plus-square"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-secondary" @click="Quitarud">
                                                            <i class="fa fa-minus-square"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-secondary" @click="Resetud">
                                                            <i class="fa fa-window-close"></i>
                                                        </button>
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


                                                            <div v-for="(item1, index1) in horarios" :key="index1" class="col-4 mb-15">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input  name="" type="checkbox" class="custom-control-input check_h" v-model="checked"  v-bind:value="item1.id" :id="'C'+item1.id+''" >
                                                                        <label class="custom-control-label" :for="'C'+item1.id+''">{{item1.iniitial_schedule}}</label>
                                                                    </div>
                                                            </div>


                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="row">
                                                        <div class="col-md-4 col-col-sm-12 mb-15" v-for="(nan, index) in check_juegos" :key="index">
                                                            <div class="form-group center">
                                                                <select  class="form-control lotterie-box" :id="'SL'+nan.id+''"  @change="validar(nan.id)">
                                                                    <option  value="">SIN ACTIVAR</option>
                                                                    <option  v-for="(item2, index2) in juegos" :key="index2"  v-bind:value="item2.id" :id="'A'+item2.id+''" :selected="nan.id == item2.id" >{{item2.description}}</option>
                                                                </select>
                                                            </div>
                                                        </div>
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
    </div>
</template>
<script>

    export default {
        data() {
            return{
                url: null,
                newItem: ['0'],
                image: '',
                show1: false,
                show2: false,
                show3: false,
                select:'',
                criterio:'',

                bolean_index: true,
                bolean_insertar: false,
                bolean_edit: false,



                disabled_alert1: false,
                disabled_alert2: false,
                disabled_alert3: false,
                utilidad: [],
                horario: [],
                hora:{horario:[],checked:[]},
                checked:[],
                checked2:[],
                juego: [],
                nombre: '',

                check_juegos: [],
                check_horarios: [],

                horarios: [],
                juegos: [],
                loterias: [],

                modelo_loteria: {id:'',name:'',min:'',max:'',elementos:'',horarios:'',boxes:'',imagen:''}
            }
        },
        created() {
            axios.get("/horarios").then(res => {
                this.horarios = res.data;
            });
            axios.get("/juegos").then(res => {
                this.juegos = res.data;
            });
            axios.get("/loterias").then(res => {
                this.loterias = res.data;
            });
        },
        methods: {
            validar(id){
                this.checked2[id] = $('#SL'+id).val()
            },
            Select(){
                if(this.select == 1){
                    this.show1 = true
                    this.show2 = false
                    this.show3 = false

                }
                if(this.select == 2){
                    this.show1 = false
                    this.show2 = true
                    this.show3 = false
                }
                if(this.select == 3){
                    this.show1 = false
                    this.show2 = false
                    this.show3 = true
                }
                setTimeout(function () { $('div.alert').css('display','none') }, 3000)
            },
            Bolean_insertar(){
                this.bolean_insertar = true,
                this.bolean_index = false
            },
            Insertar_loteria(){

                let formData = new FormData()
                formData.append('name',this.nombre)
                formData.append('percent',this.select)
                formData.append('payment_x',this.criterio)
                formData.append('horarios',this.horario)
                formData.append('boxes',this.juego)
                formData.append('image',this.image)

                axios.post('/lotteries', formData)
                .then((res) =>{
                        this.Atras()
                        this.loterias.push(res.data)
                })
            },
            BUpdate(modelo_loteria){

                let arrnew = []
                this.checked.forEach(element => {
                    arrnew.push(element)
                });

                let arrnew2 = []
                this.checked2.forEach(element => {
                    arrnew2.push(element)
                });

             
                
                let formData = new FormData()
                formData.append("_method", "put")
                formData.append('name',this.nombre)
                formData.append('percent',this.select)
                formData.append('payment_x',this.criterio)

                formData.append('horarios',arrnew)
                formData.append('boxes',arrnew2)
                
                formData.append('image',this.image) 

                 axios.post(`/lotteries/${modelo_loteria.id}`, formData)
                    .then((res) =>{
                        this.Atras()
                        const index = this.loterias.findIndex(item => item.id === modelo_loteria.id);
                        this.loterias[index] = res.data;
                    })
            },
             editar(item){
                 this.checked = []
                 axios.get("/check_horarios/"+item.id,item.id).then(res => {
                    this.check_horarios = res.data;
                    this.check_horarios.forEach(element => {
                        this.checked[element.id] = element.id
                    });

                    axios.get("/check_juegos/"+item.id,item.id).then(res => {
                        this.check_juegos = res.data;
                        this.check_juegos.forEach(element => {
                            this.checked2[element.id] = element.id
                        });
                    });

                    this.bolean_index = false
                    this.bolean_crear = false
                    this.bolean_edit = true
                    this.modelo_loteria.id = item.id;
                    this.nombre = item.name;
                    this.modelo_loteria.imagen = item.image;

                    this.select = item.percent
                    this.criterio = item.payment_x
                });

               
                
            },
            Atras(){
                $("#image").val('')
                this.select = '',
                this.criterio = '',
                this.horario = []
                this.juego = []
                this.nombre = ''
                this.url = null
                this.bolean_index = true,
                this.bolean_insertar = false,
                this.bolean_edit = false
            },
            onFileChange: function(e) {
                this.image = e.target.files[0];
                this.url = URL.createObjectURL(this.image);
            },
            BDestroy(id, index){
                axios.delete(`/lotteries/${id}`)
                .then(()=>{
                    this.loterias.splice(index, 1);
                    $('#ELIM'+id).click()
                })
            },
            Incrementar: function(){
                this.newItem.push(0)
            },
            Quitar: function(){
                if (this.newItem.length>1) {
                    this.newItem.splice(0,1)
                }
            },
            Reset: function(){
                this.newItem.splice(1)
            },
            Incrementarud: function(){
                this.check_juegos.push(0)
            },
            Quitarud: function(){
                if (this.check_juegos.length>1) {
                    this.check_juegos.splice(0,1)
                }
            },
            Resetud: function(){
                this.check_juegos.splice(1)
            },
           
        
        }
    }
    
</script>