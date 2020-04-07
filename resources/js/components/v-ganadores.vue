<template>
  <div>
    <ol class="breadcrumb page-breadcrumb">
      <li class="breadcrumb-item">
        <a href="javascript:void(0);">Home</a>
      </li>
      <li class="breadcrumb-item">Loterias</li>
    </ol>
    <div class="row">
      <div class="col-md-6">
        <div id="panel-1" class="panel">
          <div class="panel-hdr mb-3">
            <h2>
              Calendario
              <span class="fw-300">
                <i>/Juegos</i>
              </span>
            </h2>
          </div>
          <div class="row">
            <div class="col-12 mb-3">
              <div style="margin-left: 30%;" class id="datepicker-6"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div id="panel-1" class="panel">
          <div class="panel-hdr mb-3">
            <h2>
              Sorteo
              <span class="fw-300">
                <i>/Días</i>
              </span>
            </h2>
          </div>
          <div class="col-12 mb-3">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th class="center">Horario</th>
                  <th class="center">Loteria</th>
                  <th class="center">Elemento</th>
                  <th class="center">
                    <i class="fa fa-cubes"></i>
                  </th>
                </tr>
              </thead>
              <tbody id="lotto"></tbody>
            </table>
          </div>
        </div>
      </div>
      <div id="tabla_ganadores" class="col-md-12">
        <div id="panel-1" class="panel">
          <div class="panel-hdr mb-3">
            <h2>
              Ganadores
              <span class="fw-300">
                <i>/Días</i>
              </span>
            </h2>
          </div>
          <div class="col-12 mb-3">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th class="center">Ticket Ganador</th>
                  <th class="center">Ganador</th>
                  <th class="center">Documento</th>
                  <th class="center">Apostado</th>
                  <th class="center">Ganado</th>
                  <th class="center">Pagar</th>
                </tr>
              </thead>
              <tbody id="ganadores"></tbody>
            </table>
            <div class="col-12">
                  <button type="button" onclick="pagar()" class="btn btn-primary float-right">Pagar</button>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>  
<script>








Calendario = function(){
  
      $(document).ready(function() {


      datosconsulta = []
            fecha = ""
            calendary = []
            fecha = ""









        $("#datepicker-6").datepicker({
          todayHighlight: true,
          templates: {
              leftArrow:
                '<i class="fal fa-angle-left" style="font-size: 1.25rem"></i>',
              rightArrow:
                '<i class="fal fa-angle-right" style="font-size: 1.25rem"></i>'
            },
          format: "yyyy-mm-dd"
        });
        if ($("#datepicker-6").datepicker("getFormattedDate") == "") {
          fecha = moment().format("YYYY-MM-DD");
        }
        axios
          .get("/ganadores/days_schedule/" + fecha, fecha)
          .then(res => {
            let add = "";
            let arr_data = res.data;
            if (arr_data == "") {
              add += `
                      <tr >
                          <td colspan="8"  class="center">Vacio</td>
                      </tr>`;
            } else {
              arr_data.forEach(element => {
                add += `
                        <tr >
                            <td  class="center">${element.iniitial_schedule}</td>
                            <td  class="center">${element.name}</td>
                            <td  class="center">${element.description}</td>
                            <td class="center"><button type="button" value="${JSON.stringify(element).replace(/\"/g,"'")}"  onclick="ver($(this).val())" class="btn btn-primary"><i class="fa fa-cubes"></i></button></td>
                        </tr>`;
              });
            }
            $("#lotto")
              .empty()
              .append(add);
          });
        $("#datepicker-6").on("changeDate", function() {
          fecha = $("#datepicker-6").datepicker("getFormattedDate");
          axios
            .get("/ganadores/days_schedule/" + fecha, fecha)
            .then(res => {
                

              let add = "";
              let arr_data = res.data;
              if (arr_data == "") {
                add += `
                        <tr >
                            <td colspan="8"  class="center">Vacio</td>
                        </tr>`;
              } else {
                arr_data.forEach(element => {


                  add += `
                          <tr >
                              <td  class="center">${element.iniitial_schedule}</td>
                              <td  class="center">${element.name}</td>
                              <td  class="center">${element.description}</td>
                              <td class="center"><button type="button" value="${JSON.stringify(element).replace(/\"/g,"'")}"  onclick="ver($(this).val())" class="btn btn-primary"><i class="fa fa-cubes"></i></button></td>
                          </tr>`;
                });
              }
              $("#lotto")
                .empty()
                .append(add);
            });
            
        });
      });
    }
    Calendario()





    ver = function(element){
      let sorteo = JSON.parse(element.replace(/\'/g, '"' ))
          axios
            .get("/lottery_winners/" + sorteo.id, sorteo.id)
            .then(res => {
              console.log(res.data)
                const respuesta = res.data
                let add = ""
                if(respuesta != ''){
                  respuesta.forEach(element => {
                    add += `
                            <tr >
                                <td  class="center">${element.ticket_id}</td>
                                <td  class="center">${element.firstname} ${element.lastname} </td>
                                <td  class="center">${element.identity_card}</td>
                                <td  class="center">${element.bet_value_id}</td>
                                <td  class="center">${element.Pago_por_ticket}</td>
                                <td class="center">
                                    <div class="custom-control custom-checkbox">
                                        <input name="status" value="${element.status}"  type="checkbox" class="custom-control-input" id="${element.ticket_id}" >
                                        <label class="custom-control-label"  for="${element.ticket_id}" ></label>
                                    </div>
                                </td>
                            </tr>`;
                  });
                }else{
                  add += `
                        <tr >
                            <td colspan="8"  class="center">Vacio</td>
                        </tr>`;
                }
                $("#ganadores").empty().append(add);
                $("#tabla_ganadores").removeClass('d-none')




                $("[name='status']").each(function(){
                  if($(this).val() == 1){$(this).prop('checked',true).prop('disabled',true)}else{$(this).prop('checked',false)}
                });

            });
    }

    ver("{'id':0}")

    pagar = function(){
    $("[name='status']").each(function(){
        if( $(this).val() == 0 && $(this).prop("checked") ) {
          console.log('id_ticket',$(this).attr('id'));
        } 
    });


    }

   






</script>