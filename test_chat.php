<?php 
    if(isset($_POST["sweet"]))
    {
        $date=$_POST["sweet"];
    }
  $connect = mysqli_connect("localhost", "root", "", "project");
$q="select count(email) as employee_present from attendance where start_date='$date'";
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
$output=array('present'=>$emp_present,'absent'=>$emp_absent);
echo json_encode($output);


?>