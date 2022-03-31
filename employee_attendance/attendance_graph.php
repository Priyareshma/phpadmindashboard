<?php
$connect = mysqli_connect("localhost", "root", "", "project");
$today_date=date('y-m-d');
$q="select count(email) as employee_present from attendance where start_date='$today_date'";
$res=mysqli_query($connect,$q);
while($r=mysqli_fetch_array($res))
{
    $emp_present=$r['employee_present'];
}
$q1="select count(email) as total_employee from employee_details";
$res1=mysqli_query($connect,$q1);
while($r1=mysqli_fetch_array($res1))
{
    $total_employee=$r1['total_employee'];
}
$emp_absent=$total_employee-$emp_present;
?> 
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Attendance Graph using Charts</title>
<body>
    <form method="post">
  <div class="float-right">
  <div class="row">  
     <!-- <input type="date" name="date"/>-->
     <input type="date" id="sweet" name="sweet">
<button type="submit" name="submit" id="mybtn-1">submit</button>
    
     <div class="col-md-3">
  </div>
</div>
</div>
</div>
    </form>
</body>
<script type="text/javascript">  
google.charts.load('current', {'packages':['corechart']});  
google.charts.setOnLoadCallback(drawPieChart);  

function drawPieChart()
{  
    var pie = google.visualization.arrayToDataTable([  
              ['attendance', 'Number'],
              ['Present', <?php echo $emp_present; ?>],
              ['Absent', <?php echo $emp_absent; ?>],               
         ]);  
    var header = {  
          title: 'Percentage of employee attendance for this day',
          slices: {0: {color:'#006EFF' }, 1:{color:'#666666' }}
         };  
    var piechart = new google.visualization.PieChart(document.getElementById('piechart'));  
    piechart.draw(pie, header);  
} 
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawColumnChart);

function drawColumnChart() {
    var bar = google.visualization.arrayToDataTable([
           ['attendance','Count',{ role: "style" } ],
           ['Present', <?php echo $emp_present; ?>,"#006EFF"],
           ['Absent', <?php echo $emp_absent; ?>,"#666666"]
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
</script>
</head>
<body>
    <h4>Attendance Graph using Charts</h4>
    
    <div id="piechart"></div>
    <div id="availability"></div>
    <div id="columnchart"></div>
    </div>

</body>
</html>
<script>
     $(document).ready(function(){
    $('#mybtn-1').click(function(){
var sweet = $('#sweet').val();
$.ajax({
    url:"test_chat.php",
    method:"POST",
    data:{sweet:sweet},
    success:function(data){
        console.log(data)
        $("#availability").html(data); 
    }
});
});
});
    </script>
    <!-- <script>
     $(document).ready(function(){
  $("form").submit(function(){
    alert("Submitted");
  });
});
    </script>-->


