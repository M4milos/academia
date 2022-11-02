
// function getArduino(result){

  google.charts.load('current', {'packages':['line']});
        google.charts.setOnLoadCallback(drawChart);

          function drawChart() {
            // var data = google.visualization.arrayToDataTable([
            //   ['Intervalo', 'Aceleração do eixo Y', 'Aceleração do eixo X', 'Aceleração do eixo Z', 'Giro do eixo Y', 'Giro do eixo X', 'Giro do eixo Z'],
            //   ['1',  1,      3,      5,     44.33,      11,      11],
            //   ['2',  2,      2,      1,      32.22,      -10,      -22],
            //   ['3',  -2,      2,      6,      31.22,      -10,      19],
            //   ['4',  -4,      3,      8,      10.2,      -15,      20],
            //   ['5',  1,      0,      7,      4.2,      8,      33.3],
            //   ['6',  -5,      2,      10,      8.2,      15,      -10],
            // ]);

            var data = new google.visualization.DataTable();
              data.addColumn('number','Intervalo');
              data.addColumn('number', 'Aceleração do eixo Y'); //   ['Aceleração do eixo Y', 'Aceleração do eixo X', 'Giro do eixo Y', 'Giro do eixo X'],
              data.addColumn('number', 'Aceleração do eixo X');
              data.addColumn('number', 'Aceleração do eixo Z');
              data.addColumn('number', 'Giro do eixo Y');
              data.addColumn('number', 'Giro do eixo X');
              data.addColumn('number', 'Giro do eixo Z');

              result.forEach(el => {
                el.forEach(element => {
                  console.log(element);
                  data.addRows([[
                    // Math.max(el),
                    Contador(element),
                    parseFloat(element["AcY"]), 
                    parseFloat(element["AcX"]),
                    parseFloat(element["AcZ"]),
                    parseFloat(element["GyY"]),
                    parseFloat(element["GyX"]),
                    parseFloat(element["GyZ"])
                  ]]);
                });
                });
              var options = {
                title: 'Exercícios',
              };

            var chart = new google.charts.Line(document.getElementById('grafico'));
            chart.draw(data, google.charts.Line.convertOptions(options));
        }
      // };


  // var count = 0;    
  // function Contador(result) {
  //   while (count < result.length) {
  //     count++;
  //     return count;
  //   }
  // };

