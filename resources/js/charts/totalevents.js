
// Total Events
google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Events', 'Visitations', { role: 'style' }],
            ['Webinars', 10, 'color: #A7D129'],  // Light Green
            ['Workshop', 14, 'color: #78C850'],  // Fresh Green
            ['Summit', 16, 'color: #4CAF50'],    // Standard Green
            ['Community Activity', 22, 'color: #388E3C'],  // Dark Green
            ['Fundraising', 28, 'color: #1B5E20'] 
          ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        //title: "Density of Precious Metals, in g/cm^3",
        width: 420,
        height: 300,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
      chart.draw(view, options);
  }