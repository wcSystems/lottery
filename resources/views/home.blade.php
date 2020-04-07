    @extends('layouts.app')
    @section('content')
        <ol class="breadcrumb page-breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
            <li class="breadcrumb-item">Inicio</li>
        </ol>
        <div class="row">
            <div class="col-12">
                <div class="subheader">
                    <h1 class="subheader-title">
                        <i class='subheader-icon fal fa-chart-area'></i> Analisis Estadísticos
                        <small>
                        </small>
                    </h1>
                    <div class="subheader-block d-lg-flex align-items-center">
                        <div class="d-inline-flex flex-column justify-content-center mr-3">
                            <span class="fw-300 fs-xs d-block opacity-50">
                                <small>Premios</small>
                            </span>
                            <span class="fw-500 fs-xl d-block color-primary-500">
                                $47,000
                            </span>
                        </div>
                        <span class="sparklines hidden-lg-down" sparkType="bar" sparkBarColor="#886ab5" sparkHeight="32px" sparkBarWidth="5px" values="3,4,3,6,7,3,3,6,2,6,4"></span>
                    </div>
                    <div class="subheader-block d-lg-flex align-items-center border-faded border-right-0 border-top-0 border-bottom-0 ml-3 pl-3">
                        <div class="d-inline-flex flex-column justify-content-center mr-3">
                            <span class="fw-300 fs-xs d-block opacity-50">
                                <small>Utilidad</small>
                            </span>
                            <span class="fw-500 fs-xl d-block color-danger-500">
                                $38,500
                            </span>
                        </div>
                        <span class="sparklines hidden-lg-down" sparkType="bar" sparkBarColor="#fe6bb0" sparkHeight="32px" sparkBarWidth="5px" values="1,4,3,6,5,3,9,6,5,9,7"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div id="panel-1" class="panel  " data-panel-lock="false" data-panel-close="false" data-panel-fullscreen="false" data-panel-collapsed="false" data-panel-color="false" data-panel-locked="false" data-panel-refresh="false" data-panel-reset="false">
                            <div class="panel-hdr">
                                <h2>
                                    Volumen de Jugada
                                </h2>
                                <div class="panel-toolbar pr-3 align-self-end">
                                    <ul id="demo_panel-tabs" class="nav nav-tabs border-bottom-0 nav-tabs-clean" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#tab_default-1" onclick="agencias_lines()" role="tab">Agencias</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#tab_default-2" onclick="taquillas_lines()" role="tab">Taquillas</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-container show">
                                <div class="panel-content border-faded border-left-0 border-right-0 border-top-0">
                                    <div class="row no-gutters">
                                        <div class="col-lg-7 col-xl-8">
                                            <div class="position-relative">
                                                <div class="custom-control custom-switch position-absolute pos-top pos-left ml-5 mt-3 z-index-cloud">
                                                    <input type="checkbox" class="custom-control-input" id="start_interval">
                                                    <label class="custom-control-label" for="start_interval">Automatico</label>
                                                </div>
                                                <div id="chart01" style="height:242px"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-xl-4 pl-lg-3">
                                            <div  id="agencias_lineas">
                                            </div>
                                            <div style="display: none" id="taquillas_lineas">
                                            </div>  
                                            <div class="row no-gutters">
                                                <div class="col-6 pr-1">
                                                    <a href="#" class="btn btn-default btn-block">Agencias</a>
                                                </div>
                                                <div class="col-6 pl-1">
                                                    <a href="#" class="btn btn-default btn-block">Loterias</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="panel-content p-0">
                                    <div class="row row-grid no-gutters">
                                        <div id="actividades" class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                            
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                            <div class="px-3 py-2 d-flex align-items-center">
                                                <div class="js-easy-pie-chart color-success-500 position-relative d-inline-flex align-items-center justify-content-center" data-percent="79" data-piesize="50" data-linewidth="5" data-linecap="butt">
                                                    <div class="d-flex flex-column align-items-center justify-content-center position-absolute pos-left pos-right pos-top pos-bottom fw-300 fs-lg">
                                                        <span class="js-percent d-block text-dark"></span>
                                                    </div>
                                                </div>
                                                <span class="d-inline-block ml-2 text-muted">
                                                    Cantidad de ticket pagados
                                                    <i class="fal fa-caret-down color-success-500 ml-1"></i>
                                                </span>
                                                <div class="ml-auto d-inline-flex align-items-center">
                                                    <div class="sparklines d-inline-flex" sparktype="line" sparkheight="30" sparkwidth="70" sparklinecolor="#1dc9b7" sparkfillcolor="false" sparklinewidth="1" values="5,9,7,3,5,2,5,3,9,6"></div>
                                                    <div class="d-inline-flex flex-column small ml-2">
                                                        <span class="d-inline-block badge badge-info opacity-50 text-center p-1 width-6">76%</span>
                                                        <span class="d-inline-block badge bg-warning-300 opacity-50 text-center p-1 width-6 mt-1">3%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                            <div class="px-3 py-2 d-flex align-items-center">
                                                <div class="js-easy-pie-chart color-info-500 position-relative d-inline-flex align-items-center justify-content-center" data-percent="4.02" data-piesize="50" data-linewidth="5" data-linecap="butt">
                                                    <div class="d-flex flex-column align-items-center justify-content-center position-absolute pos-left pos-right pos-top pos-bottom fw-300 fs-lg">
                                                        <span class="js-percent d-block text-dark"></span>
                                                    </div>
                                                </div>
                                                <span class="d-inline-block ml-2 text-muted">
                                                    Deuda Afiliado
                                                    <i class="fal fa-caret-up color-success-500 ml-1"></i>
                                                </span>
                                                <div class="ml-auto d-inline-flex align-items-center">
                                                    <div class="sparklines d-inline-flex" sparktype="line" sparkheight="30" sparkwidth="70" sparklinecolor="#51adf6" sparkfillcolor="false" sparklinewidth="1" values="300,552,248,596,335,998,614,536,999,774"></div>
                                                    <div class="d-inline-flex flex-column small ml-2">
                                                        <span class="d-inline-block badge bg-fusion-500 opacity-50 text-center p-1 width-6">999</span>
                                                        <span class="d-inline-block badge bg-fusion-300 opacity-50 text-center p-1 width-6 mt-1">248</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                            <div class="px-3 py-2 d-flex align-items-center">
                                                <div class="js-easy-pie-chart color-fusion-500 position-relative d-inline-flex align-items-center justify-content-center" data-percent="36" data-piesize="50" data-linewidth="5" data-linecap="butt">
                                                    <div class="d-flex flex-column align-items-center justify-content-center position-absolute pos-left pos-right pos-top pos-bottom fw-300 fs-lg">
                                                        <span class="js-percent d-block text-dark"></span>
                                                    </div>
                                                </div>
                                                <span class="d-inline-block ml-2 text-muted">
                                                    Configuracion de premio
                                                    <i class="fal fa-caret-down color-success-500 ml-1"></i>
                                                </span>
                                                <div class="ml-auto d-inline-flex align-items-center">
                                                    <div class="sparklines d-inline-flex" sparktype="line" sparkheight="30" sparkwidth="70" sparklinecolor="#fd3995" sparkfillcolor="false" sparklinewidth="1" values="5,3,9,6,5,9,7,3,5,2"></div>
                                                    <div class="d-inline-flex flex-column small ml-2">
                                                        <span class="d-inline-block badge badge-danger opacity-50 text-center p-1 width-6">124</span>
                                                        <span class="d-inline-block badge bg-info-300 opacity-50 text-center p-1 width-6 mt-1">40F</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div id="panel-7" class="panel">
                    <div class="panel-hdr">
                        <h2>
                        <span class="fw-300"><i>Grafico global semanal de utilidad master</i></span>
                        </h2>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <div id="chart02">
                                <canvas style="width:100%; height:300px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div id="panel-10" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            <span class="fw-300"><i>Utilidad media del dia</i></span>
                        </h2>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <div id="chart04">
                                <canvas style="width:100%; height:300px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div id="panel-10" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            <span class="fw-300"><i>Promedio dia</i></span>
                        </h2>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <div id="chart03">
                                <canvas style="width:100%; height:300px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div id="panel-12" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            <span class="fw-300"><i>Distribucion de utilidad diario</i></span>
                        </h2>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <div id="chart05">
                                <canvas style="width:100%; height:300px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div id="panel-12" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            <span class="fw-300"><i>Utilidad porcentual promedio del dia</i></span>
                        </h2>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <div id="chart06">
                                <canvas style="width:100%; height:300px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div id="panel-4" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            <span class="fw-300"><i>Porcentaje  frente animalito</i></span>
                        </h2>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <div id="chart07">
                                <canvas style="width:100%; height:300px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('graficas')
    <script>
        let colors = []
        colors[0] = "bg-fusion-400"
        colors[1] = "bg-success-500"
        colors[2] = "bg-info-400"
        colors[3] = "bg-primary-300"

        let colors_codigo = []
        colors_codigo[0] =  myapp_get_color.success_400
        colors_codigo[1] =  myapp_get_color.primary_300
        colors_codigo[2] = myapp_get_color.success_400
        colors_codigo[3] = myapp_get_color.primary_300
        colors_codigo[4] = myapp_get_color.success_400
        colors_codigo[5] = myapp_get_color.primary_300
        colors_codigo[6] = myapp_get_color.success_400
        colors_codigo[7] = myapp_get_color.primary_300
        colors_codigo[8] = myapp_get_color.success_400
        colors_codigo[9] = myapp_get_color.primary_300
        colors_codigo[10] = myapp_get_color.success_400
        colors_codigo[11] = myapp_get_color.primary_300
        colors_codigo[12] = myapp_get_color.success_400
        colors_codigo[13] = myapp_get_color.primary_300
        colors_codigo[14] = myapp_get_color.success_400
        colors_codigo[15] = myapp_get_color.primary_300
        colors_codigo[16] = myapp_get_color.success_400
        colors_codigo[17] = myapp_get_color.primary_300
        colors_codigo[18] = myapp_get_color.success_400
        colors_codigo[19] = myapp_get_color.primary_300
        colors_codigo[20] = myapp_get_color.success_400
        colors_codigo[21] = myapp_get_color.primary_300
        colors_codigo[22] = myapp_get_color.success_400
        colors_codigo[23] = myapp_get_color.primary_300
        colors_codigo[24] = myapp_get_color.success_400
        colors_codigo[25] = myapp_get_color.primary_300
        colors_codigo[26] = myapp_get_color.success_400
        colors_codigo[27] = myapp_get_color.primary_300
        colors_codigo[28] = myapp_get_color.success_400
        colors_codigo[29] = myapp_get_color.primary_300
        colors_codigo[30] = myapp_get_color.success_400
        colors_codigo[31] = myapp_get_color.primary_300
        colors_codigo[32] = myapp_get_color.success_400
        colors_codigo[33] = myapp_get_color.primary_300
        colors_codigo[34] = myapp_get_color.success_400
        colors_codigo[35] = myapp_get_color.primary_300
        colors_codigo[36] = myapp_get_color.success_400
        colors_codigo[37] = myapp_get_color.primary_300

        //data - chart03 - Promedio dia
        let elementos = {!! $elementos !!}
        let elementos_description = []
        let elementos_monto = []
        let elementos_ticket = []
        elementos.forEach(element => {
            elementos_description.push(element.description)
            elementos_monto.push(element.bet_value_id)
            elementos_ticket.push(element.contador_ticket)
        });

        //data - ultimo grafico
        let sum_dispersion = 0
        let porcentaje_dispersion = []
        elementos.forEach(element => {
            sum_dispersion += element.bet_value_id
        });

        elementos.forEach(element => {
            obj = {}
            let number = element.bet_value_id/sum_dispersion*100
            obj['valor'] = number.toFixed(2)
            obj['nombre'] = element.description
            porcentaje_dispersion.push(obj)
        });

        new_arr = []
        porcentaje_dispersion.forEach(function(element, index) {
            arra_qq = {}
            arra_qq['label'] = element.nombre
            arra_qq['backgroundColor'] = colors_codigo[index];
            arra_qq['borderColor'] = colors_codigo[index];
            arra_qq['data'] = [{'x':index+1,'y':element.valor,'r':10}]
            new_arr.push(arra_qq)  
        });


        
        
        //data - agencias - lineas
        let agencias_lineas = {!! $agencias !!}
        let taquillas_lineas = {!! $ticketoffice !!}
        let add = ''
        let add2 = ''
        let sum = 0
        let sum2 = 0

        agencias_lineas.forEach(element => {
            sum += element.recaudado
        });
        
        taquillas_lineas.forEach(element => {
            sum2 += element.recaudado
        });
        
        

        agencias_lineas.forEach(function(element, indice) {
            add +=`
            <div class="d-flex mt-2">
                ${element.name}
                <span class="d-inline-block ml-auto">${element.recaudado} / ${sum}</span>
            </div>
            <div class="progress progress-sm mb-3">
                <div class="progress-bar ${colors[indice]}" role="progressbar" style="width: ${element.recaudado/sum*100}%;" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
            </div>`
        });
        $('#agencias_lineas').empty().append(add)

        let arr_taquillas = []
        taquillas_lineas.forEach(function(element, indice) {
            arr_taquillas.push(element.recaudado)
            add2 +=`
            <div class="d-flex mt-2">
                ${element.agencia} | ${element.name}
                <span class="d-inline-block ml-auto">${element.recaudado} / ${sum}</span>
            </div>
            <div class="progress progress-sm mb-3">
                <div class="progress-bar ${colors[indice]}" role="progressbar" style="width: ${element.recaudado/sum*100}%;" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
            </div>`
        });
        $('#taquillas_lineas').empty().append(add2)
        $('#actividades').empty().append(`<div class="px-3 py-2 d-flex align-items-center">
                                                <div class="js-easy-pie-chart color-primary-300 position-relative d-inline-flex align-items-center justify-content-center" data-percent="${(arr_taquillas[0]*100)/sum2}" data-piesize="50" data-linewidth="5" data-linecap="butt" data-scalelength="0">
                                                    <div class="d-flex flex-column align-items-center justify-content-center position-absolute pos-left pos-right pos-top pos-bottom fw-300 fs-lg">
                                                        <span class="js-percent d-block text-dark"></span>
                                                    </div>
                                                </div>
                                                <span class="d-inline-block ml-2 text-muted">
                                                    Actividad de taquillas
                                                    <i class="fal fa-caret-up color-danger-500 ml-1"></i>
                                                </span>
                                                <div class="ml-auto d-inline-flex align-items-center">
                                                    <div class="sparklines d-inline-flex" sparktype="line" sparkheight="30" sparkwidth="70" sparklinecolor="#886ab5" sparkfillcolor="false" sparklinewidth="1" values="${arr_taquillas.toString()}"></div>
                                                    <div class="d-inline-flex flex-column small ml-2">
                                                        <span class="d-inline-block badge badge-success opacity-50 text-center p-1 width-6">${((arr_taquillas[1]*100)/sum2).toFixed(2)}</span>
                                                        <span class="d-inline-block badge bg-fusion-300 opacity-50 text-center p-1 width-6 mt-1">${((arr_taquillas[2]*100)/sum2).toFixed(2)}</span>
                                                    </div>
                                                </div>
                                            </div>`)





        





        
        //chart01 - Volumen de Jugada
        let grafico01 = function()
        {
            let options = {
                colors: [myapp_get_color.primary_700],
                series:
                {
                    lines:
                    {
                        show: true,
                        lineWidth: 0.5,
                        fill: 0.9,
                        fillColor:
                        {
                            colors: [
                            {
                                opacity: 0.6
                            },
                            {
                                opacity: 0
                            }]
                        },
                    },
                    shadowSize: 0
                },
                grid:
                {
                    borderColor: '#F0F0F0',
                    borderWidth: 1,
                    labelMargin: 5
                },
                xaxis:
                {
                    color: '#F0F0F0',
                    font:
                    {
                        size: 10,
                        color: '#999'
                    }
                },
                yaxis:
                {
                    min: 0,
                    max: 100,
                    color: '#F0F0F0',
                    font:
                    {
                        size: 10,
                        color: '#999'
                    }
                }
            };
            let plot = $.plot($("#chart01"), [{!! $venta !!}], options);
        };

        //chart02 - Grafico global semanal de utilidad master
        let grafico02 = function()
        {
            let config = {
                type: 'line',
                data:
                {
                    labels: ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"],
                    datasets: [
                    {
                        label: "Util moneda",
                        backgroundColor: 'rgba(136,106,181, 0.2)',
                        borderColor: myapp_get_color.primary_500,
                        pointBackgroundColor: myapp_get_color.primary_700,
                        pointBorderColor: 'rgba(0, 0, 0, 0)',
                        pointBorderWidth: 1,
                        borderWidth: 1,
                        pointRadius: 3,
                        pointHoverRadius: 4,
                        data: [
                            12816.25,
                            7011.75,
                            13929,
                            14002.25,
                            7205,
                            10136.25,
                            12428.5
                        ],
                        fill: true
                    },
                    {
                        label: "Util %",
                        backgroundColor: 'rgba(29,201,183, 0.2)',
                        borderColor: myapp_get_color.success_500,
                        pointBackgroundColor: myapp_get_color.success_700,
                        pointBorderColor: 'rgba(0, 0, 0, 0)',
                        pointBorderWidth: 1,
                        borderWidth: 1,
                        pointRadius: 3,
                        pointHoverRadius: 4,
                        data: [
                            12016.25,
                            5011.75,
                            10829,
                            1202.25,
                            5005,
                            9036.25,
                            10328.5
                        ],
                        fill: true
                    }]
                },
                options:
                {
                    responsive: true,
                    title:
                    {
                        display: false,
                        text: 'Area Chart'
                    },
                    tooltips:
                    {
                        mode: 'index',
                        intersect: false,
                    },
                    hover:
                    {
                        mode: 'nearest',
                        intersect: true
                    },
                    scales:
                    {
                        xAxes: [
                        {
                            display: true,
                            scaleLabel:
                            {
                                display: false,
                                labelString: '6 months forecast'
                            },
                            gridLines:
                            {
                                display: true,
                                color: "#f2f2f2"
                            },
                            ticks:
                            {
                                beginAtZero: true,
                                fontSize: 11
                            }
                        }],
                        yAxes: [
                        {
                            display: true,
                            scaleLabel:
                            {
                                display: false,
                                labelString: 'Profit margin (approx)'
                            },
                            gridLines:
                            {
                                display: true,
                                color: "#f2f2f2"
                            },
                            ticks:
                            {
                                beginAtZero: true,
                                fontSize: 11
                            }
                        }]
                    }
                }
            };
            new Chart($("#chart02 > canvas").get(0).getContext("2d"), config);
        }

        //chart03 - Promedio dia
        let grafico03 = function()
        {
            let barlineCombineData = {
                labels: elementos_description,
                datasets: [
                {
                type: 'line',
                label: 'Ticket',
                borderColor: myapp_get_color.danger_300,
                pointBackgroundColor: myapp_get_color.danger_500,
                pointBorderColor: myapp_get_color.danger_500,
                pointBorderWidth: 1,
                borderWidth: 2,
                pointRadius: 4,
                pointHoverRadius: 5,
                fill: false,
                data: elementos_ticket
                },
                {
                    type: 'bar',
                    label: 'Monto',
                    backgroundColor: myapp_get_color.primary_300,
                    borderColor: myapp_get_color.primary_500,
                    data: elementos_monto,
                    borderWidth: 1
                }]
            };
            let config = {
                type: 'bar',
                data: barlineCombineData,
                options:
                {
                    responsive: true,
                    legend:
                    {
                        position: 'top',
                    },
                    title:
                    {
                        display: true,
                        text: 'Animalitos'
                    },
                    scales:
                    {
                        xAxes: [
                        {
                            display: true,
                            scaleLabel:
                            {
                                display: false,
                                labelString: '6 months forecast'
                            },
                            gridLines:
                            {
                                display: true,
                                color: "#f2f2f2"
                            },
                            ticks:
                            {
                                beginAtZero: true,
                                fontSize: 11
                            }
                        }],
                        yAxes: [
                        {
                            display: true,
                            scaleLabel:
                            {
                                display: false,
                                labelString: 'Profit margin (approx)'
                            },
                            gridLines:
                            {
                                display: true,
                                color: "#f2f2f2"    
                            },
                            ticks:
                            {
                                beginAtZero: true,
                                fontSize: 11
                            }
                        }]
                    }
                }
            }
            new Chart($("#chart03 > canvas").get(0).getContext("2d"), config);
        }

        //chart04 - Utilidad media del dia
        let grafico04 = function()
        {
            let barlineCombineData2 = {
                labels: ['07:00 AM','12:00 M','04:00 PM','06:00 PM'],
                datasets: [
                {
                    type: 'line',
                    label: 'Utilidad en %',
                    borderColor: myapp_get_color.danger_300,
                    pointBackgroundColor: myapp_get_color.danger_500,
                    pointBorderColor: myapp_get_color.danger_500,
                    pointBorderWidth: 1,
                    borderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 5,
                    fill: false,
                    data: [
                        11000,
                        8174,
                        13319,
                        -9320
                    ]
                },
                {
                    type: 'bar',
                    label: 'Utilidad en Moneda',
                    backgroundColor: myapp_get_color.primary_300,
                    borderColor: myapp_get_color.primary_500,
                    data: [
                        11908,
                        10174,
                        16319,
                        -11320
                    ],
                    borderWidth: 1
                }
                ]
            };
            let config = {
                type: 'bar',
                data: barlineCombineData2,
                options:
                {
                    responsive: true,
                    legend:
                    {
                        position: 'top',
                    },
                    title:
                    {
                        display: true,
                        text: 'Hora'
                    },
                    scales:
                    {
                        xAxes: [
                        {
                            display: true,
                            scaleLabel:
                            {
                                display: false,
                                labelString: '6 months forecast'
                            },
                            gridLines:
                            {
                                display: true,
                                color: "#f2f2f2"
                            },
                            ticks:
                            {
                                beginAtZero: true,
                                fontSize: 11
                            }
                        }],
                        yAxes: [
                        {
                            display: true,
                            scaleLabel:
                            {
                                display: false,
                                labelString: 'Profit margin (approx)'
                            },
                            gridLines:
                            {
                                display: true,
                                color: "#f2f2f2"    
                            },
                            ticks:
                            {
                                beginAtZero: true,
                                fontSize: 11
                            }
                        }]
                    }
                }
            }
            new Chart($("#chart04 > canvas").get(0).getContext("2d"), config);
        }

        //chart05 - Distribucion de utilidad diario
        let grafico05 = function()
        {
            let config = {
                type: 'doughnut',
                data:
                {
                    datasets: [
                    {
                        data: [
                            15836,
                            18738,
                            14290,
                            9697,
                        ],
                        backgroundColor: [
                            myapp_get_color.success_200,
                            myapp_get_color.success_400,
                            myapp_get_color.primary_50,
                            myapp_get_color.primary_300
                        ],
                        label: 'Utilidad Monetaria'
                    }],
                    labels: [
                        "Facilito",
                        "Gran Milenio",
                        "Animalitos",
                        "Lotto"
                    ]
                },
                options:
                {
                    responsive: true,
                    legend:
                    {
                        display: true,
                        position: 'bottom',
                    }
                }
            };
            new Chart($("#chart05 > canvas").get(0).getContext("2d"), config);
        }

        //chart06 - Utilidad porcentual promedio del dia
        let grafico06 = function()
        {
            let config = {
                type: 'doughnut',
                data:
                {
                    datasets: [
                    {
                        data: [
                            48.47,
                            51.53,
                        ],
                        backgroundColor: [
                            myapp_get_color.success_200,
                            myapp_get_color.success_400,
                        ],
                        label: 'My dataset'
                    }],
                    labels: [
                        "UTILIDAD %",
                        "PROCENTUAL %",
                    ]
                },
                options:
                {
                    responsive: true,
                    legend:
                    {
                        display: true,
                        position: 'bottom',
                    }
                }
            };
            new Chart($("#chart06 > canvas").get(0).getContext("2d"), config);
        }

        //chart07 - Porcentaje frente animalito
        let grafico07 = function()
        {
            let config = {
                type: 'bubble',
                data:
                {
                    labels: "Porcentajes",
                    datasets: new_arr
                },
                options:
                {
                    title:
                    {
                        display: true,
                        text: 'Animalitos'
                    },
                    scales:
                    {
                        yAxes: [
                        {
                            scaleLabel:
                            {
                                display: true,
                                labelString: "Porcentajes"
                            }
                        }],
                        xAxes: [
                        {
                            scaleLabel:
                            {
                                display: true,
                                labelString: "Animalitos"
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(t, d) {
                            return d.datasets[t.datasetIndex].label + 
                                    ': ' + t.yLabel + ' %';
                            }
                        }
                    }
                }
            }
            new Chart($("#chart07 > canvas").get(0).getContext("2d"), config);
        }

        let agencias_lines = function(){
            $('#taquillas_lineas').css('display','none')
            $('#agencias_lineas').css('display','')
        }
        let taquillas_lines = function(){
            $('#agencias_lineas').css('display','none')
            $('#taquillas_lineas').css('display','')
        }

        //Ejecutar todos los graficos
        $(document).ready(function()
        {
            grafico01()
            grafico02()
            grafico03()
            grafico04()
            grafico05()
            grafico06()
            grafico07()
        });
        </script>
    @endsection









