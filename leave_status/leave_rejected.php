<body>
         <center><h3  style=color:Red;><i>Rejected Lists</i></h3></center>
         <form method="post">
     
             <table id="emp_reject_table" class="table table-striped table-bordered" class="text-light">
             <thead><tr>
 <th>Employee Email</th>
 <th>Leave Starting Date</th>
 <th>Leave Ending Date</th>
 <th>Total Days</th>
 <th>Reason For Leave</th>
                 </tr>
                 </thead>
 <?php
 $conn=mysqli_connect('localhost','root','','project');
 $sql= "select * from leave_submit where status='Rejected'";
 $result=mysqli_query($conn,$sql);
 while($row = mysqli_fetch_array($result))
     {
   echo '
   <tr>
  <td>'.$row["email"].'</td>
   <td>'.$row["start_date"].'</td>
   <td>'.$row["end_date"].'</td>
   <td>'.$row["total_days"].'</td>
   <td>'.$row["reason"].'</td>
   </tr>
   ';
   }
  ?>        
             </table>
             </form>
     </body>
 </html>
 <script>
 $(document).ready(function(){
        $('#emp_reject_table').DataTable();
     });
 </script>
 