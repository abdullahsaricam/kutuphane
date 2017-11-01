<?php 

	ob_start();
 	session_start(); 
 
	 include 'class/BasicDB.php';
	 include 'class/class.validate.php';
	 include 'class/class.function.php';
	 $db = new Erbilen\Database\BasicDB();  
	 $fonk = new Asaricam\Fonksiyon\Fonksiyon();
	 $validate = new Asaricam\Validate\Validate();

?>

<!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="UTF-8">
	<title>Kütüphane</title>
	<!-- meta tags -->
	<meta name="" content="">
	<meta name="" content="">
	<meta name="" content="">
	<meta name="" content="">
	<!-- css -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="assets/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
</head>
<body>

  <?php

    if(!(isset($_SESSION['oturum']))) { 
          header("location:login.php");
           exit();
         }
        else{
          include 'view/index.php';
        }

?>
	
	

	<!-- scripts -->
	
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="assets/js/dataTables.bootstrap.min.js"></script>
  	<script type="text/javascript" src="assets/js/validator.js"></script>
	<script type="text/javascript" src="assets/js/main.js"></script>
	<script type="text/javascript" src="assets/js/jquery.toaster.js"></script>
  	<script type="text/javascript" src="view/script.js"></script>
  	
</body>
</html>

<?php 
  ob_end_flush();
?>