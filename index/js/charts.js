function getArduino(result){

//console.log(result);

// result.forEach(element => {console.log(
  
//   i++ +" "+ element["AcX"]+" "+ element["AcY"]+" "+element["GyX"]+" "+element["GyY"] )});
// var elemento = result[0];

google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

          var data = new google.visualization.DataTable();
            data.addColumn('number','Intervalo');
            data.addColumn('number', 'Aceleração do eixo Y'); //   ['Aceleração do eixo Y', 'Aceleração do eixo X', 'Giro do eixo Y', 'Giro do eixo X'],
            data.addColumn('number', 'Aceleração do eixo X');
            data.addColumn('number', 'Giro do eixo Y');
            data.addColumn('number', 'Giro do eixo X');

            result.forEach(element => {
                data.addRows([[
                  Contador(result),
                  parseFloat(element["AcY"]), 
                  parseFloat(element["AcX"]),
                  parseFloat(element["GyY"]),
                  parseFloat(element["GyX"])
                ]]);
              });
        //[parseFloat(element["AcX"]), parseFloat(element["AcY"]),parseFloat(element["GyX"]),parseFloat(element["GyY"])]}),

            var options = {
              title: 'Exercícios',
            };

          var chart = new google.charts.Line(document.getElementById('grafico'));
          chart.draw(data, google.charts.Line.convertOptions(options));
      }
    };


var count = 0;   
function Contador(result) {
  while (count < result.length) {
    count++;
    return count;
  }
  
};

