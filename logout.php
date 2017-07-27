
<?php
session_start();
session_destroy();
unset($_SESSION['access_token']);
header("location:http://localhost/juspay/index.php");

?>
