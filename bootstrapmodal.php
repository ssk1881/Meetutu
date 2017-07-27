<?php
require "dbconn.php";
session_start();
if(!$_SESSION["email"]){
header("location:index.php");
}
?>
<html lang="en">
<head>
  <title>Meetutu Requests</title>
  		  <link rel="shortcut icon" href="tree.png" type="image/x-icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });
</script>
</head>
<body>

<div class="container">


  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Pending Requests</h4>
        </div>
        <div class="modal-body">
          <p>
			   <?php 
			  $id =$_SESSION["email"];
			  $result=mysqli_query($con,"select * from request where to_user='".$id."'");
			 // $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			  while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) 
			  echo"<tr><td>".$row['from_user']. "</td></tr>";
			  ?>
		  </p>
        </div>
        <div class="modal-footer">
          <button type="button" onclick=window.location.href="learner_index.php" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

</body>
</html>
