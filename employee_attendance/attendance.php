<html>
     <head> 
     <!-- <link rel="stylesheet" href="https://cdn.datatables.net/scroller/2.0.5/css/scroller.jqueryui.min.cs" /> -->
     </head>
     <body>
     <tbody>
         <?php
 $conn=mysqli_connect('localhost','root','','project');
 $query="select email from attendance group by email";
 $result=mysqli_query($conn,$query);
 foreach($result as $res)
 {
     $email= $res['email'];      
       echo ' <table id="example" class="display nowrap" style="width:100%">
       <thead><tr>
       <th>Employee Name</th>
       <th>Employee Email</th>
       <th>Attendance Date</th>
       <th>Start Time</th>
       <th>End Time</th>
       
                   </tr>
                   </thead> ';
 $sql= "select r.name,a.email,a.start_date,a.start_time,a.end_time from register r inner join attendance a on r.email=a.email where a.email='$email' order by a.id desc";
 $result=mysqli_query($conn,$sql);
 while($row =mysqli_fetch_array($result))
     {
   echo '
   <tr>
   <td>'.$row["name"].'</td>
  <td>'.$row["email"].'</td>
   <td>'.$row["start_date"].'</td>
   <td>'.$row["start_time"].'</td>
   <td>'.$row["end_time"].'</td>
   </tr>
   ';
   }
}
  ?>  
            </tbody> 
    </table>
<script>
$(document).ready(function() {
    $('table').DataTable( {
        //ajax:           "../data/2500.txt",
        deferRender:    true,
        scrollY:        200,
        scrollCollapse: true,
        //scroller:       true
    } );
} );
</script>


</body>
 </html>



