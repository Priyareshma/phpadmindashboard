<?php 
      
include('../config/database.php');

       $cat= !empty($_GET['cat'])?$_GET['cat']:'';
       $subcat = !empty($_GET['subcat'])?$_GET['subcat']:'';
      
          if($cat=='website-setting' && $subcat=='add-website-menu'){
          
          include('../scripts/multilevel-script.php');
          
        }

        if(!empty($cat) && !empty($subcat)){

            
            $sub=explode('-', $subcat);
if($sub[0]=='add')
{
           $val=[];
          foreach ($sub as $key => $value) {
            if($value==$sub[0])
            {
             continue;
            }
            $val[]=$value;
            
         }
        
      include("../".$cat."/".implode('-',$val).".php");   
 }else{
  include("../".$cat."/".$subcat.".php");
 }
       
        }else{
        ?>
      <center><h3  style=color:green;><i><b>Employee Details</b></i></h3></center>
        <form method="post">
    
            <table id="table" class="table table-striped table-bordered" class="text-light">
            <thead><tr>
<th>Employee Name</th>
<th>Employee Email</th>
<th>Employee Date of Birth</th>
<th>Employee Date of Joining</th>
<th>Employee Gender</th>
<th>Employee Address</th>
<th>Employee Phone Number</th>
<th>View</th>

                </tr>
                </thead>
<?php
$conn=mysqli_connect('localhost','root','','project');
$sql="select r.name,r.email,e.date_of_birth,e.date_of_joining,e.gender,e.address,e.phone from register r inner join employee_details e on r.email=e.email";
$result=mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result))
    {
  echo '
  <tr>
 <td>'.$row["name"].'</td>
  <td>'.$row["email"].'</td>
  <td>'.$row["date_of_birth"].'</td>
  <td>'.$row["date_of_joining"].'</td>
  <td>'.$row["gender"].'</td>
  <td>'.$row["address"].'</td>
  <td>'.$row["phone"].'</td>
  
  ';
 ?>  <td><input type="button" name="view" value="view" id="<?php echo $row["email"]; ?>" class="btn btn-info btn-xs view_data" /></td> 
 <?php }
 }?>     
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
<div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <h4 class="modal-title">More Information</h4>  
                </div>  
                <div class="modal-body" id="employee_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
</body>
</html>
<script>
    $(document).ready(function(){  
        $(document).on('click', '.view_data', function(){  
           var employee_email = $(this).attr("id");
           if(employee_email != '')  
           {  
                $.ajax({  
                     url:"select.php",  
                     method:"POST",  
                     data:{employee_email:employee_email},  
                     success:function(data){  
                          $('#employee_detail').html(data);  
                          $('#dataModal').modal('show');  
                     }  
                });  
           }            
      });  
    }); 
</script>

