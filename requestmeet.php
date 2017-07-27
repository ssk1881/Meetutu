<?php
require "dbconn.php";
session_start();
if(!$_SESSION["email"]){
header("location:index.php");
}
$usermail=$_SESSION["email"];


if(isset($_POST['request-submit']))
{
	if($_POST['email']=='')
{
 echo "<script>alert('Enter email');document.location='teacher_index.php'</script>";
        
        exit();
    }

		$result =mysqli_query($con,"SELECT to_user FROM request WHERE `to_user` = '".$_POST['email']."'");
		if ($result && mysqli_num_rows($result) > 0)
    {
	echo "<script>alert('Request Already Exits');document.location='teacher_index.php'</script>";
        
        exit();
	}
		$result =mysqli_query($con,"SELECT email FROM learner_register WHERE `email` = '".$_POST['email']."'");
		if ($result && mysqli_num_rows($result) > 0)
    {
	$get=mysqli_query($con,"select * from request order by sno desc limit 1");
$got=mysqli_fetch_array($get);
$did=$got['sno'];
$id=$did;
$id++;
$eml=$_SESSION['email'];
$postemail=$_POST['email'];
	mysqli_query($con,"insert into request
	 values('$id','$eml','$postemail');")
	 or die(mysqli_error($con));
	
}	
        echo "<script>alert('Request successfully registered');document.location='teacher_index.php'</script>";
        
        exit();
    }
