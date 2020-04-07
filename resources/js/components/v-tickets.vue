<template>
  <div class="col-sm-12">





    <div id="panel-1" class="row panel">
      <div class="panel-container show">
        <div class="panel-content">
          <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label v-for="(item, index) in vlotteries" :key="index" @click="blottery(item)" class="btn btn-primary" >
              <input type="radio" :id="'L'+item.id+''" v-bind:value="item.id" />
                {{item.name}}
            </label>
          </div>
        </div>
      </div>
    </div>

    <div class="row">

      <div v-if="iflottery" class="col-sm-2">
        <h3 class="mb-15 ">Horarios</h3>
        <div v-for="(item1, index) in vlottery" :key="index" class="row">
          <div v-for="(item2, index) in item1.schedules" :key="index" class="col-sm-12 mb-15">
            <div class="col-sm-12 mb-15">
              <div class="custom-control custom-checkbox">
                <input name="access[]" type="checkbox" v-model="play_horarios" v-bind:value="item2" class="custom-control-input" :class="invalid_horario" :id="'C'+item2.id+''" @change="valid" />
                <label class="custom-control-label" :for="'C'+item2.id+''" >
                  {{item2.iniitial_schedule}}</label>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 mb-15">
          <div class="form-group">
              <input type="number" v-model.number="amount" class="form-control  input-sm" @keyup="valid" :class="invalid_amount"  placeholder="Monto de la apuesta" required>
              <div v-if="disabled_invalid_amount" class="invalid-feedback">Ingrese un monto.</div>
              <div v-if="disabled_invalid_horario" class="invalid-feedback">Elija un horario.</div>
              <div v-if="disabled_invalid_play_animal" class="invalid-feedback mb-15">Elija una jugada.</div>
          </div>
        </div>
        <button type="button" @click="insertar" class="btn btn-primary">Insertar</button>
      </div>

      <div v-if="iflottery && this.tipodejuego == 3"   class="col-sm-5">
        <div class="row">
          <div class="col-sm-12">
            <h3 class="mb-15 text-center">Animalitos</h3>
            <div data-spy="scroll" data-offset="10" class="position-relative overflow-auto p-4 row">
              <div   v-for="(item1, index) in animalitos" :key="index"  class="col-sm-3 mb-15">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" v-model="play" v-bind:value="item1" class="custom-control-input" :class="invalid_play_animal" @change="valid" :id="''+item1.code+''" />
                    <label class="custom-control-label  " :for="''+item1.code+''" >
                      <p style="font-size:15px" >
                        {{item1.description}}
                        {{item1.code}}
                      </p>
                      <img width="40px" class="rounded-circle border border-primary"  :src="'/img/elements/animals/'+item1.code+'.jpg'">
                    </label>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>

 

      <div v-if="iflottery && this.tipodejuego == 2"   class="col-sm-5">
        <div class="row">
          <div class="col-sm-12">
            <h3 class="mb-15 text-center">Zodiacos</h3>
            <div class="row">
              <div v-for="(item1, index) in zodiacos" :key="index"  class="col-sm-3 mb-15">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" v-model="play" v-bind:value="item1" class="custom-control-input" :class="invalid_play_animal" @change="valid" :id="''+item1.code+''" />
                    <label class="custom-control-label  " :for="''+item1.code+''" >
                      <p style="font-size:15px" >
                        {{item1.description}}
                        {{item1.code}}
                      </p>
                      <img width="40px" class="rounded-circle border border-primary"  :src="'/img/elements/zodiacos/'+item1.code+'.jpg'">
                    </label>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div v-if="iflottery && this.tipodejuego == 1" class="col-sm-5">
        <div class="row">
          <div class="col-sm-12">
            <h3 class="mb-15 text-center">Numeros</h3>
            <div class="row">
              <div class="col-sm-12 mb-15">
                  <div class="form-group">
                    <input type="number"  v-model.number="play_number.id" class="form-control" :class="invalid_play_animal" />
                    <div v-if="disabled_invalid_play_animal" class="invalid-feedback mb-15">Ingrese un numero.</div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div v-if="iflottery && this.tipodejuego != 1 && this.tipodejuego != 2 && this.tipodejuego != 3"   class="col-sm-5">
        <div class="row">
          <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-12 mb-15 center">
                <div v-for="(item1, index) in vlottery" :key="index" class="btn-group btn-group-toggle" data-toggle="buttons">
                  <label v-for="(item2, index) in item1.type_games" :key="index"  class="btn btn-secondary" @click="blotterymixta(item2)">
                    <input type="radio" name="lotteries[]" :id="'MIXTO'+item2.id+''" v-bind:value="item2.id" />
                    {{item2.description}}
                  </label>
                </div>
              </div>
            </div>
            <div v-if="iflotterymixto && this.tipodejuegomixto == 1" class="row">
              <div class="col-sm-12">
                <h3 class="mb-15 text-center">Numeros</h3>
                <div class="row">
                  <div class="col-sm-12 mb-15">
                      <div class="form-group">
                        <input type="number"  v-model.number="play_number.id" class="form-control" :class="invalid_play_animal" />
                      </div>
                  </div>
                </div>
              </div>
            </div>
            <div v-if="iflotterymixto && this.tipodejuegomixto == 2" class="row">
              <div class="col-sm-12">
                <h3 class="mb-15 text-center">Zodiacos</h3>
                <div class="row">
                  <div v-for="(item1, index) in zodiacos" :key="index"  class="col-sm-3 mb-15">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" v-model="play" v-bind:value="item1" class="custom-control-input"   :class="invalid_play_animal" @change="valid" :id="''+item1.code+''" />
                        <label class="custom-control-label  " :for="''+item1.code+''" >
                          <p style="font-size:15px" >
                            {{item1.description}}
                            {{item1.code}}
                          </p>
                          <img width="40px" class="rounded-circle border border-primary"  :src="'/img/elements/zodiacos/'+item1.code+'.jpg'">
                        </label>
                      </div>
                  </div>
                </div>
              </div>
            </div>
            <div v-if="iflotterymixto && this.tipodejuegomixto == 3" class="row">
              <div class="col-sm-12">
                <h3 class="mb-15 text-center">Animalitos</h3>
                <div class="row">
                  <div v-for="(item1, index) in animalitos" :key="index"  class="col-sm-3 mb-15">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" v-model="play" v-bind:value="item1" class="custom-control-input"  :class="invalid_play_animal" @change="valid" :id="''+item1.code+''" />
                        <label class="custom-control-label" :for="''+item1.code+''" >
                          <p style="font-size:15px" >
                            {{item1.description}}
                            {{item1.code}}
                          </p>
                          <img width="40px" class="rounded-circle border border-primary"  :src="'/img/elements/animals/'+item1.code+'.jpg'">
                        </label>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div v-if="iflottery" id="panel-1" class="col-sm-5">
        <div class="panel-container show">
          <div class="panel-content">
            <form @submit.prevent="insertar_cliente" >
              <h3 class="mb-15 text-center">Ticket</h3>
              <div class="row">
                <div class="col-sm-6 mb-15">
                    <div class="form-group">
                        <input name="cedula" class="form-control" :class="invalid_cliente_cedula" type="number" v-model.number="cliente.cedula" @keyup="cedula" @change="valid" placeholder="Cedula" >
                        <div v-if="disabled_invalid_cliente_cedula" class="invalid-feedback">Ingrese cedula.</div>
                    </div>
                </div>
                <div class="col-sm-6 mb-15">
                    <div class="form-group">
                        <input name="nombre" class="form-control" :class="invalid_cliente_nombre" type="text" v-model="cliente.nombre" @keyup="valid" placeholder="Nombre" >
                        <div v-if="disabled_invalid_cliente_nombre" class="invalid-feedback">Ingrese nombre.</div>
                    </div>
                </div>
                <div class="col-sm-6 mb-15">
                    <div class="form-group">
                        <input name="apellido" class="form-control" :class="invalid_cliente_apellido" type="text" v-model="cliente.apellido" @keyup="valid" placeholder="Apellido" >
                        <div v-if="disabled_invalid_cliente_apellido" class="invalid-feedback">Ingrese apellido.</div>
                    </div>
                </div>
                <div class="col-sm-6 mb-15">
                    <div class="form-group">
                        <input name="telefono" class="form-control" :class="invalid_cliente_telefono" type="number" v-model.number="cliente.telefono" @keyup="valid" placeholder="Telefono" >
                        <div v-if="disabled_invalid_cliente_telefono" class="invalid-feedback">Ingrese telefono.</div>
                    </div>
                </div>
                <div class="col-sm-12 mb-15">
                    <div class="form-group">
                        <textarea name="direccion" class="form-control" :class="invalid_cliente_direccion" type="text-area" v-model="cliente.direccion" @keyup="valid" placeholder="Direccion" ></textarea>
                        <div v-if="disabled_invalid_cliente_direccion" class="invalid-feedback">Ingrese direccion.</div>
                    </div>
                </div>
              </div>
              <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="center" >Loteria</th>
                        <th class="center" >Horario</th>
                        <th class="center" >Jugada</th>
                        <th class="center" >Monto</th>
                        <th class="center" ><i class="fa fa-trash"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-if="ticket == ''"   >
                        <td colspan="5" class="center"> Vacio</td>
                    </tr>
                    <tr v-else v-for="(item1, index1) in ticket" :key="index1"   >
                        <td  class="center">{{item1.loteria_name}}</td>
                        <td v-for="(item2, index2) in item1.jugadas" :key="index2" v-if="(index2 === 0)" class="center">{{item2.horarios}}</td>
                      
                        <td class="center float-right" style="margin: 0 " >
                          <span v-for="(item3, index3) in item1.jugadas "  :key="index3"> {{ item3.descripcion }}  </span>  
                        </td>
                     
                   
                        <td  class="center">{{item1.amount}}</td>
                        <td  class="center"><button type="button" class="btn btn-danger"  @click="eliminar(index1)"  ><i class="fa fa-trash"></i></button></td>
                    </tr>
                    <tr v-if="ticket != ''" >
                        <td colspan="3" class="center"></td>
                        <td  class="center">Subtotal:</td>
                        <td class="center">{{sub_total_ticket}}</td>
                    </tr>
                    <tr v-if="ticket != ''" >
                        <td colspan="3" class="center"></td>
                        <td  class="center">iva(12%):</td>
                        <td class="center">{{total_iva_ticket}}</td>
                    </tr>
                    <tr v-if="ticket != ''" >
                        <td colspan="3" class="center"></td>
                        <td  class="center">Total:</td>
                        <td class="center">{{total_ticket}}</td>
                    </tr>
                </tbody>
              </table>
              <hr>
              <div class="col-12">
                  <button class="btn btn-primary float-right ml-3" type="submit">Guardar</button>
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
      incrementar: 0,
      arraymixta: [],
      total: 0,
      sub_total: 0,
      iva: 0,
      vlotteries: [],
      vlottery: [],
      velements: [],
      iflottery: false,
      iflotterymixto: false,

      play: [],
      plays: false,
      play_number: {id:'', description:''},
      array_jugadas: [],
      modelo_juego: { horarios_id:'', horarios: '',elementos_id:'', elementos:'',descripcion:''},
      jugadas_cliente: {loteria_id:'',loteria_name:'',jugadas:'', amount:''},


      play_horarios: [],
      play_animal: [],
      play_animal_mixto: [],
      play_mixta_number: [],

      animals: [],
      animalitos: [],
      zodiacos: [],
      amount: '',
      array_jugada: [],
      cliente: {id:'', cedula:'', nombre: '', apellido:'', telefono: '', direccion:''},
      modelo: {loteria_name:'',horarios_id:'', horarios: '',elementos_id:'', elementos:'', amount:''},
      modelo2: {horarios_id:'', horarios: '',elementos_id:'', elementos:''},
      modelo_numero: {id:'', code:'', description:'', image: '',type_game_id:''},
      loteria:{id:'', name: ''},
      sendticket: {amount:'', jugada_element:''},
      ticket: [],
      tipodejuego:[],
      tipodejuegomixto:[],

      invalid_amount: '',
      invalid_horario: '',
      invalid_play_animal: '',
      invalid_play_numero: '',

      invalid_cliente_cedula: '',
      invalid_cliente_nombre: '',
      invalid_cliente_apellido: '',
      invalid_cliente_telefono: '',
      invalid_cliente_direccion: '',

      disabled_invalid_amount: false,
      disabled_invalid_horario: false,
      disabled_invalid_play_animal: false,
      disabled_invalid_numero: false,
      
      disabled_invalid_cliente_cedula: false,
      disabled_invalid_cliente_nombre: false,
      disabled_invalid_cliente_apellido: false,
      disabled_invalid_cliente_telefono: false,
      disabled_invalid_cliente_direccion: false,
    };
  },
  created() {
    axios.get("/vlotteries").then(res => {
      this.vlotteries = res.data;
    });
    axios.get("/velements").then(res => {
      this.velements = res.data;
    });
    axios.get("/animalitos").then(res => {
      this.animalitos = res.data;
    });
    axios.get("/zodiacos").then(res => {
      this.zodiacos = res.data;
    });
  },
  methods: {
    blottery(item) {
      this.play = []
      this.play_horarios = [] 
      this.iflotterymixto = false
      this.tipodejuego = [];
      this.vlottery = [];
      this.loteria = {id:'', name: ''};
      axios.get("/vlottery/" + item.id, item.id).then(res => {
        this.iflottery = true;
        const Servidor = res.data;
        this.vlottery.push(Servidor);
        this.loteria.id = item.id,
        this.loteria.name = item.name
        this.vlottery.forEach(element => {
          element.type_games.forEach(elemen => {
            this.tipodejuego.push(elemen.id);
          });
        });
      });
    },
    blotterymixta(item2){
      this.iflotterymixto = true
      this.tipodejuegomixto = item2.id
      console.log(this.iflotterymixto)
    },


    insertar(){
          //console.log(this.play)
          if(this.play_number.id > 0){
            this.play_number.description = this.play_number.id
            this.play.push(this.play_number)
          }
          if(this.play_horarios && this.play && this.amount && this.iflotterymixto == true){
            this.play_horarios.forEach(element1 => {
              this.play.forEach(element2 => {
                this.modelo_juego.horarios_id = element1.id,
                this.modelo_juego.horarios = element1.iniitial_schedule,
                this.modelo_juego.elementos_id = element2.id,
                this.modelo_juego.elementos = element2.id,
                this.modelo_juego.descripcion = element2.description,
                this.array_jugadas.push(this.modelo_juego)
                this.modelo_juego = { horarios_id:'', horarios: '',elementos_id:'', elementos:'', descripcion:''}
              });
                this.jugadas_cliente.loteria_id = this.loteria.id,
                this.jugadas_cliente.loteria_name = this.loteria.name,
                this.jugadas_cliente.jugadas = this.array_jugadas
                this.jugadas_cliente.amount = this.amount
                this.ticket.push(this.jugadas_cliente)
                 
                
                this.array_jugadas = [] 
                this.modelo_juego = { horarios_id:'', horarios: '',elementos_id:'', elementos:'', descripcion:''}
                this.jugadas_cliente = {loteria_id:'',loteria_name:'',jugadas:'', amount:''}
                console.log(this.ticket)
            });
                this.play_number = {id:''} 
                this.play = []  
                this.amount = '',
                this.play_horarios = []
                
          }













            if(this.play_horarios && this.play && this.amount && this.iflotterymixto == false){

              this.play_horarios.forEach(element1 => {
                this.play.forEach(element2 => {


                  this.modelo_juego.horarios_id = element1.id,
                  this.modelo_juego.horarios = element1.iniitial_schedule,
                  this.modelo_juego.elementos_id = element2.id,
                  this.modelo_juego.elementos = element2.id,
                  this.modelo_juego.descripcion = element2.description,
                  this.array_jugadas.push(this.modelo_juego)
                  this.jugadas_cliente.loteria_id = this.loteria.id,
                  this.jugadas_cliente.loteria_name = this.loteria.name,
                  this.jugadas_cliente.jugadas = this.array_jugadas
                  this.jugadas_cliente.amount = this.amount
                  this.ticket.push(this.jugadas_cliente)
                  
                  
                  this.array_jugadas = [] 
                  this.modelo_juego = { horarios_id:'', horarios: '',elementos_id:'', elementos:'', descripcion:''}
                  this.jugadas_cliente = {loteria_id:'',loteria_name:'',jugadas:'', amount:''}
                  console.log(this.ticket)


                });
              });
                  this.amount = '',
                  this.play = []  
                  this.play_horarios = [] 
                  this.play_number = {description:''} 
            }
    },

    insertar_cliente(){
       if(!this.cliente.nombre){
        this.disabled_invalid_cliente_nombre = true
        this.invalid_cliente_nombre = 'is-invalid'
      }
       if(!this.cliente.apellido){
        this.disabled_invalid_cliente_apellido = true
        this.invalid_cliente_apellido = 'is-invalid'
      }
       if(!this.cliente.telefono){
        this.disabled_invalid_cliente_telefono = true
        this.invalid_cliente_telefono = 'is-invalid'
      }
       if(!this.cliente.direccion){
        this.disabled_invalid_cliente_direccion = true
        this.invalid_cliente_direccion = 'is-invalid'
      }
      if(!this.cliente.cedula){
        this.disabled_invalid_cliente_cedula = true
        this.invalid_cliente_cedula = 'is-invalid'
      }else{
        const send = {'cliente':this.cliente,'jugada':this.ticket,'iva':this.iva,'sub_total':this.sub_total,'total':this.total}

        axios.post('/tickets', send)
          .then((res) =>{
            console.log(res.data);
          })
          this.cliente = {id:'', cedula:'', nombre: '', apellido:'', telefono: '', direccion:''}
          this.ticket = []
          console.log(send)
      }
      
      
      
        
    },


    cedula(){
      this.disabled_invalid_cliente_cedula = false
      this.invalid_cliente_cedula = ''
      axios.get("/customer/search/" + this.cliente.cedula, this.cliente.cedula).then(res => {
        const Servidor = res.data;
        Servidor.forEach(element => {
          if(this.cliente.cedula == element.identity_card){
            this.cliente.cedula = element.identity_card,
            this.cliente.nombre = element.firstname,
            this.cliente.apellido = element.lastname,
            this.cliente.telefono = element.phone,
            this.cliente.direccion = element.address
            this.cliente.id = element.id
          }
        });
   
        
      });
    },
    eliminar(index){
        this.ticket.splice(index, 1);    
        console.log(this.ticket)             
    },
    valid(){
      if(this.play_horarios != ''){
        this.disabled_invalid_horario = false
        this.invalid_horario = ''
      }
      if(this.play_animal != ''){
        this.disabled_invalid_play_animal = false
        this.invalid_play_animal = ''
      }
      if(this.amount){
        this.disabled_invalid_amount = false
        this.invalid_amount = ''
      }
      if(this.cliente.nombre){
        this.disabled_invalid_cliente_nombre = false
        this.invalid_cliente_nombre = ''
      }
      if(this.cliente.apellido){
        this.disabled_invalid_cliente_apellido = false
        this.invalid_cliente_apellido = ''
      }
      if(this.cliente.telefono){
        this.disabled_invalid_cliente_telefono = false
        this.invalid_cliente_telefono = ''
      }
      if(this.cliente.direccion){
        this.disabled_invalid_cliente_direccion = false
        this.invalid_cliente_direccion = ''
      }
    }
  },
  computed:{
     sub_total_ticket(){
            this.sub_total = 0;
            this.ticket.forEach(element => {
              this.sub_total = this.sub_total + element.amount
            });
            return this.sub_total;
        },
     total_iva_ticket(){
            this.iva = 0;
            this.ticket.forEach(element => {
              this.iva = this.iva + element.amount/100*12
            });
            return this.iva;
        },
     total_ticket(){
            this.total = 0;
            this.total = this.sub_total + this.iva;
            return this.total;
        },
  }
};

            

               
</script>
