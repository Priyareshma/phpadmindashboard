<!DOCTYPE html>
<html>
<head>
<script type="text/javascript"
    src="https://www.gstatic.com/charts/loader.js"></script>
    </head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Attendance Graph using Charts</title>
<body>
    <form method="post">
  <div class="float-right">
  <div class="row">  
     <!-- <input type="date" name="date"/>-->
     <input type="date" id="sweet" name="sweet">
<button type="button" name="submit" id="mybtn-1">submit</button>
    
     <div class="col-md-3">
  </div>
</div>
</div>
</div>
    </form>
</body>
<script type="text/javascript"> 
    $('#mybtn-1').click(function(){
var sweet = $('#sweet').val();

$.ajax({
    url:"test_chat.php",
    method:"POST",
    data:{sweet:sweet},
    success:function(data){
        console.log(JSON.parse(data));
        drawColumnChart(JSON.parse(data));
        drawPieChart(JSON.parse(data));
    }
});
});

google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawColumnChart);

function drawColumnChart(data) {
   
    var present =data.present;
    var absent = data.absent;
    
    var bar = google.visualization.arrayToDataTable([
           ['attendance','Count',{ role: "style" } ],
           ['Present', parseInt(present),"#006EFF"],
           ['Absent',parseInt(absent),"#666666"],
           ]);
    var columnview = new google.visualization.DataView(bar);
    columnview.setColumns([0, 1,
               { calc: "stringify",
                 sourceColumn: 1,
                 type: "string",
                 role: "annotation" },
               2]);       
    var header = {
    title: 'Count of attendance',
    bar: {groupWidth: "30%"}
    };
    var barchart = new google.visualization.ColumnChart(document.getElementById("columnchart"));
    barchart.draw(columnview, header);
}
google.charts.load('current', {'packages':['corechart']});  
google.charts.setOnLoadCallback(drawPieChart);  

function drawPieChart(data)
{  
    var present =data.present;
    var absent = data.absent;
    var pie = google.visualization.arrayToDataTable([  
              ['attendance', 'Number'],
              ['Present', parseInt(present)],
              ['Absent', parseInt(absent)],               
         ]);  
    var header = {  
          title: 'Percentage of employee attendance for selected date',
          slices: {0: {color:'#006EFF' }, 1:{color:'#666666' }}
         };  
    var piechart = new google.visualization.PieChart(document.getElementById('piechart'));  
    piechart.draw(pie, header);  
} 
</script>
</head>
<body>
    <h4>Attendance Graph using Charts</h4>
    
    <div id="piechart"></div>
    <div id="columnchart"></div>
    </div>

</body>
</html>

 


