function getArduino(){

  google.charts.load('current', {'packages':['line']});
        google.charts.setOnLoadCallback(drawChart);
          function drawChart() {
            var data = new google.visualization.DataTable();
              data.addColumn('number','Intervalo');
              data.addColumn('number', 'Aceleração');
              
                data.addRows([[1, 8.2] ]);
                   data.addRows([ [2, 8.3] ]);
                   data.addRows([ [3, 8.5] ]);
                   data.addRows([ [4, 8.7] ]);
                   data.addRows([ [5, 8.8] ]);
                   data.addRows([ [6, 9.1] ]);
                   data.addRows([ [7, 9.4] ]);
                   data.addRows([ [8, 9.8] ]);
                   data.addRows([ [9, 10.2] ]);
                   data.addRows([ [10, 10.7] ]);
                   data.addRows([ [11, 11.1] ]);
                   data.addRows([ [12, 11.6] ]);
                   data.addRows([ [13, 12.1] ]);
                   data.addRows([ [14, 12.7] ]);
                   data.addRows([ [15, 13.2] ]); 
                   data.addRows([ [16, 13.7] ]);
                   data.addRows([ [17, 14.1] ]);
                   data.addRows([ [18, 14.6] ]);
                   data.addRows([ [19, 14.9] ]);
                   data.addRows([ [20, 15.2] ]);
                   data.addRows([ [21, 15.5] ]); 
                   data.addRows([ [22, 15.7] ]);
                   data.addRows([ [23, 15.9] ]);
                   data.addRows([ [24, 16.1] ]);
                   data.addRows([ [25, 16.3] ]);
                   data.addRows([ [26, 16.5] ]);
                   data.addRows([ [27, 16.7] ]);
                   data.addRows([ [28, 16.9] ]);
                   data.addRows([ [29, 17.1] ]);
                   data.addRows([ [30, 17.2] ]);
                   data.addRows([ [31, 17.2] ]);
                   data.addRows([ [32, 17.2] ]);
                   data.addRows([ [33, 17.1] ]);
                   data.addRows([ [34, 17.0] ]);
                   data.addRows([ [35, 16.9] ]);
                   data.addRows([ [36, 16.8] ]);
                   data.addRows([ [37, 16.7] ]);
                   data.addRows([ [38, 16.5] ]);
                   data.addRows([ [39, 16.2] ]);
                   data.addRows([ [40, 15.8] ]);
              var options = {
                title: 'Exercícios',
              };
            var chart = new google.charts.Line(document.getElementById('grafico'));
            chart.draw(data, google.charts.Line.convertOptions(options));
        }
      };

