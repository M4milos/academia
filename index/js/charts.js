function getArduino(result){
  google.charts.load('current', {'packages':['line']});
        google.charts.setOnLoadCallback(drawChart);
          function drawChart() {
            var data = new google.visualization.DataTable();
              data.addColumn('number','Intervalo');
              data.addColumn('number', 'Aceleração');
              result.forEach(el => {
                console.log(el);
                data.addRow([el.id_arduino, el.acc]);
              });
              var options = {
                title: 'Exercícios',
              };
            var chart = new google.charts.Line(document.getElementById('grafico'));
            chart.draw(data, google.charts.Line.convertOptions(options));
        }
      };

