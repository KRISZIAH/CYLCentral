
// Regular Members
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawVisualization);

function drawVisualization() {
  // Some raw data (not necessarily accurate)
  var data = google.visualization.arrayToDataTable([
    ['Batch', 'Total Applicants', 'Accepted Members', 'Retention rate',  { role: 'style' }],
    ['Batch 1',  5, 1, 6, 'color: #A7D129'],
    ['Batch 2',  26, 8, 26, 'color: #A7D129' ],
    ['Batch 3',  10, 3, 9, 'color: #A7D129'],
    ['Batch 4',  9, 3, 9, 'color: #A7D129' ],
    //['2008/09',  136,      691,         629,             1026,          366,      569.6]
  ]);

  var options = {
    //title : 'Monthly Coffee Production by Country',
    vAxis: {title: 'Number of Applicants'},
    hAxis: {title: 'Batch'},
    seriesType: 'bars',
    series: {5: {type: 'line'}}
  };

  var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
  chart.draw(data, options);
}