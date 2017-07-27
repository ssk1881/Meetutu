<?php
require "dbconn.php";

if(isset($_POST['register-submit']))
{
	$result =mysqli_query($con,"SELECT email FROM teach_register WHERE `email` = '".$_POST['email']."'");
if ($result && mysqli_num_rows($result) > 0)

    {
		
        echo "<script>alert('Email already registered');document.location='register.php'</script>";
        
        exit();
    }
if($_POST['first_name']=='')
{
 echo "<script>alert('Enter first name');document.location='register.php'</script>";
        
        exit();
    }
 echo"hello";
 if($_POST['last_name']=='')
{
 echo "<script>alert('Enter last name');document.location='register.php'</script>";
        
        exit();
    }
    
    if($_POST['mobile_number']=='')
{
 echo "<script>alert('Enter mobile number');document.location='register.php'</script>";
        
        exit();
    }
    
    

if($_POST['email']=='')
{
 echo "<script>alert('Enter valid Email');document.location='register.php'</script>";
        
        exit();
    }




if($_POST['password']=='')
{
 echo "<script>alert('Enter password');document.location='register.php'</script>";
        
        exit();
    }


if($_POST['confirm-password']=='')
{
 echo "<script>alert('Enter confirm password');document.location='register.php'</script>";
        
        exit();
    }

else
    {
if($_POST['password']==$_POST['confirm-password']){
$get=mysqli_query($con,"select * from teach_register order by sno desc limit 1");
$got=mysqli_fetch_array($get);
$did=$got['sno'];
$id=$did;
$id++;
$email=$_POST['email'];
mysqli_query($con,"insert into teach_register
values
  ('$id','".$_POST['first_name']."','".$_POST['last_name']."','".$_POST['mobile_number']."','".$_POST['teach']."','".$_POST['email']."','".$_POST['password']."');")
or die(mysql_error());

}

echo "<script>alert('Successfuly Registered..!');document.location='index.php'</script>";

}
exit;
}
?>
