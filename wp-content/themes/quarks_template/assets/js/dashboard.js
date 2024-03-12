// /* globals Chart:false */
// // https://www.chartjs.org/chartjs-plugin-annotation/latest/samples/intro.html

var myChart;
var requestFile;
var url;
const annotation1 = {
  type: 'box',
  backgroundColor: 'rgba(255, 245, 157, 0.2)',
  borderWidth: 0,
  xMax: 2,
  xMin: 2.1,
  label: {
    drawTime: 'afterDraw',
    display: true,
    color: 'rgba(255,255,255)',
    content: 'First quarter',
    font: [{size: 10, weight: 'normal'}, {family: 'courier'}],
    position: {
      x: 'center',
      y: 'start'
    }
  }
};

const chartImage = new Image();
chartImage.src = 'http://quarks.id/public/assets/img/chart-bg.png';

const chartBgAnn = {
  type: 'box',
  backgroundColor: 'rgba(0, 0, 0, 0.2)',
  borderWidth: 0,
  borderColor: '#F27173',
  label: {
    drawTime: 'afterDraw',
    display: true,
    color: 'rgba(255,255,255,0.2)',
    width:568 * screen.width/1200,
    height:150 * screen.width/1200,
    content: chartImage,    
    position: {
      x: 'center',
      y: 'center'
    }
  }
  // label: {
  //   display: true,
  //   content: Utils.getImage(),
  //   width: 150,
  //   height: 150,
  //   position: 'center'
  // }
};

var chartConfig = {
  type: 'line',
  data: {
    labels: null,
    datasets: [{
      data: null,
      lineTension: 0,
      backgroundColor: 'transparent',
      borderColor: '#007bff',
      borderWidth: 4,
      pointBackgroundColor: '#007bff',
    }]
  },
  options: {
    interaction: {
      intersect: false,
      mode: 'index',
    },
    scales: {
      y: {
          beginAtZero: true
      },    
    },
    plugins:{
      legend: {
        display: false
      },
      tooltip: {
        boxPadding: 10,
        padding:10
      },
      annotation: {
        annotations: {
          //  annotation1,
          chartBgAnn
        }
      }
    }
  },
  plugins: [{
    
      afterDraw: chart => {
        if (chart.tooltip?._active?.length) {
          let x = chart.tooltip._active[0].element.x;
          let yAxis = chart.scales.y;
          let ctx = chart.ctx;
          ctx.save();
          ctx.beginPath();
          ctx.moveTo(x, yAxis.top);
          ctx.lineTo(x, yAxis.bottom);
          ctx.lineWidth = 1;
          ctx.strokeStyle = '#4b63a6';
          ctx.stroke();
          ctx.restore();
        }
      }
    
  }]
};


function makeChart(jsondata){
  if(myChart == null){ myChart = new Chart( $('#chart'), chartConfig) };
  /**CLEANUP DATA **/
  myChart.data.labels.pop();
  myChart.data.datasets.forEach((dataset) => {
      dataset.data.pop();
  });
  myChart.update();
  myChart.data.labels = jsondata.label;
  myChart.data.datasets[0].data = jsondata.value;  
  myChart.update();
}

function generateLabelsFromTable() {
  var labels = [];
  var rows = $(".chartTable tr");
  rows.each(function (index) {
      if (index != 0)
      {
          var cols = $(this).find("td");
          labels.push(cols.first().text());
      }
  });
  return labels;
}

function generateValueFromTable() {
  var data;
  var datasets = [];
  var rows = $(".chartTable tr");
  var data = [];
  rows.each(function (index) {
      if (index != 0)
      {
          var cols = $(this).find("td");
          cols.each(function (innerIndex) {
              if (innerIndex != 0)
                 data.push($(this).text());
          });
      }
  });
  return data;
}

$(function(){
  var jsondataTable = {};
  jsondataTable.label = generateLabelsFromTable();
  jsondataTable.value = generateValueFromTable();
  if(jsondataTable.label.length>0)
  makeChart(jsondataTable);

  if($('.nav-link.active').html() == "Resources"){
    $.ajax({
        type: "GET",
        url: base_url+'/chart/'+$('.btn-toggle-nav a.active').attr('data'),
        dataType: "json",
        success: function(data) {
          makeChart(data);
        },
        error: function(){
            // alert("json not found");
        }
    });
  }

  $('#data-selector').on('change',function(){
    window.location.href = $(this).find("option:selected").attr('data');      
  });

  dselect(document.querySelector('#data-selector'),{
    search: true
  })

})