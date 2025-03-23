
// Partner Groups
google.charts.load("current", {packages:["corechart"]});
google.charts.setOnLoadCallback(drawChart);
function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ['Partners', 'Number of Partners'],
    ['Government',     11],
    ['Business',      2],
    ['NGO/CSO',  2],
    ['Acadame', 2],
    ['International',    7]
  ]);

  var options = {
    //title: 'My Daily Activities',
    pieHole: 0.4,
  };

  var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
  chart.draw(data, options);
}
