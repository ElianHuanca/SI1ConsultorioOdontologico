
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Graficos de lineas </title>
</head>
<body>
    <h1>hola mundo</h1>

        <div id="chart-container"></div>

        <script src="https://code.highcharts.com/highcharts.js"></script>
           <script>
           var datas =  <?php echo json_encode ($datas) ?>
           Highcharts.chart('chart-container',{
           title:{text:'Incrementos de nuevos Pacientes,2020'
           },
            subtitle:{
                text:'Fuente: medios de TI'
            },
            XAxis:{
                categories:['Ene','Feb','Mzo','Abr','May','jun','jul','Agt','Sep','Oct','Nov','Dic']
            },
            XAxis:{
                title:{
                    text:'Numero de nuevos pacientes'
                }
            },
           legend:{
               layout: 'vertical',
               align:'right',
               verticalAlign:'middle'
           },
           plotOptions:{
               series:{
                   allowPointSelect:true
               }
           },
           series:[{
               name:'nuevo Paciente'
               data: datas
           }],
           responsive:{
               rules:[
                 {
                   condition:{
                      maxwidth:500
                   },
                   chartOptions:{
                     legend:{
                         layout:'horizontal',
                         align:'center',
                         verticalAlign:'bottom'
                     }
                   }
                }
            ]
            
            }
            
        
        });
           </script>



</body>
</html>









               



