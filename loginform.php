<?php
session_start();

require "dbconn.php";
if(isset($_POST["login-submit"]))
{
	
	$id =$_POST["email"];
	$password=$_POST["password"];
	//echo "<script>alert($result)</script>";
$learner=mysqli_query($con,"select email,password from learner_register where email='".$id."' and password='".$password."'");
$teach=mysqli_query($con,"select email,password from teach_register where email='".$id."' and password='".$password."'");



	if (mysqli_num_rows($learner)>0)
    	{	
    	$_SESSION["email"]=$_POST["email"];
		echo "<script>document.location='learner_index.php'</script>";	
	
	}
	else if(mysqli_num_rows($teach)>0)

    	{	
    		$_SESSION["email"]=$_POST["email"];
			
		echo "<script>document.location='teacher_index.php'</script>";
	}	
	else{
	echo "<script>alert('Invalid credentials!');document.location='index.php'</script>";
}

}
?>
