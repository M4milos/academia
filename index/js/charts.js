function getArduino(result){

google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Aceleração do eixo Y', 'Aceleração do eixo X', 'Giro do eixo Y', 'Giro do eixo X'],
            ['0',  0,      0,      0],
        ]);

        var options = {
          title: 'Exercícios',
          hAxis: {title: 'Acompanhamento exercícios',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('Grafico'));
        chart.draw(data, options);
      }
    };