
function getArduino(result){

  google.charts.load('current', {'packages':['line']});
        google.charts.setOnLoadCallback(drawChart);
          function drawChart() {
            var data = new google.visualization.DataTable();
              data.addColumn('number','Intervalo');
              data.addColumn('number', 'Aceleração');
              
              result.forEach(el => {
                el.forEach(element => {
                  console.log(element);
                  data.addRows([[
                    Contador(element),
                    parseFloat(element["acc"])
                  ]]);
                });
                });
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

