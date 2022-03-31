<?php
$conn=mysqli_connect('localhost','root','','project');
if(isset($_GET['rejectionid'])&&($_GET['email']))
{
    $id=$_GET['rejectionid'];
    $email=$_GET['email'];
}
$sql="update leave_submit set status='Rejected' where email='$email' and id='$id'";
mysqli_query($conn,$sql);
header('location:dashboard.php?cat=leave_status&subcat=leave_rejected');
?>