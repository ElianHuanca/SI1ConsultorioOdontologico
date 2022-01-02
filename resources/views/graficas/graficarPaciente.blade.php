
<body>
    <div id="container"></div>
</body>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    Highcharts.chart('container',{
title:{
text:'Pacientes registrados en el sistema'
} , 
subtitle:{
    text:'Grafica'
},

xAxis:{
    categories:['Ene','Feb','Marz','Abr','May','Jun','Jul','Agt','Sep','Oct','Nov','Dic']
},

yAxis:{
    title:{
        text:'Nuevos pacientes'
    }
},

legend:{

    layout:'vertical',
    align:'right'
    verticalAlign:'middle'
},

 plotOptions:{
     series:{
         allowPointSelect:true
     }
 },

 series:[
     {
         name:'Nuevos Paciente',
         data:pacientes,
     }
 ],

  responsive:{
      rules:[{
              condition:{
                maxWidth:500
              },
              chartOptions:{
                    legend:{
                     layout: 'horizontal',
                     align:'center',
                    verticalAlign: 'bottom'
                  }
              }
            }]
  }

});
</script>
