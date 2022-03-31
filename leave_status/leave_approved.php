<?php
 $conn=mysqli_connect('localhost','root','','project');
 ?>     
     <body>
         <center><h4 style=color:blue;><i>Employees Applied for Leave</i></h4></center>
         <form method="post">
     
             <table id="table" class="table table-striped table-bordered" class="text-light">
             <thead><tr>
 <!-- <td>Employee Name</td> -->
 <th>Employee Email</th>
 <th>Leave Starting Date</th>
 <th>Leave Ending Date</th>
 <th>Total Days</th>
 <th>Reason For Leave</th>
 <th>Action</th>
 
                 </tr>
                 </thead>
 <?php
 $sql= "select * from leave_submit where status='Leave Applied'";
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
   <td><a href="approval.php?approvalid='.$row["id"].'& email='.$row["email"].'" class="btn btn-success" class="text-light" role="button"><i class="fa fa-check"></i></a>
   <a href="rejection.php?rejectionid='.$row["id"].'& email='.$row["email"].'" class="btn btn-danger" class="text-light" role="button"><i class="fa fa-remove"></i></a></td>
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
        $('#table').DataTable();
     });
 </script>
<body>
         <center><h3  style=color:green;><i>Approved Lists</i></h3></center>
         <form method="post">
     
             <table id="emp_table" class="table table-striped table-bordered" class="text-light">
             <thead><tr>
 <th>Employee Email</th>
 <th>Leave Starting Date</th>
 <th>Leave Ending Date</th>
 <th>Total Days</th>
 <th>Reason For Leave</th>
 
                 </tr>
                 </thead>
 <?php
 $sql= "select * from leave_submit where status='Approved'";
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
                   $('#emp_table').DataTable();
     });
 </script>
    