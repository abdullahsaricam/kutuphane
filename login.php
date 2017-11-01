<?php

  ob_start();
  session_start();
   include 'class/BasicDB.php';
   $db = new Erbilen\Database\BasicDB();  

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
</head>
<body>
  
  <!-- modal box's -->
  
  <!-- 1.login modal -->

  <div class=""  tabindex="-1" role="" aria-labelledby="">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Giriş</h4>
      </div>
      <div class="modal-body">
        <form   id="form" method="post" data-toggle="validator" onsubmit="return false">
          <div class="form-group">
          <label for="">Kullanıcı Adı :</label>
          <input type="text" name="username" id="username" class="form-control" required="" placeholder="kullanıcı adı...">
          </div>
          <div class="form-group">
          <label for="">Şifre :</label>
          <input type="password" name="password" id="password" class="form-control" required="" placeholder="şifre...">
          </div>
          <button type="submit" id="login" class="btn btn-block btn-success">Giriş</button>
        </form>
      </div>
    </div>
  </div>
</div>
  
  <!-- scripts -->
  <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="assets/js/dataTables.bootstrap.min.js"></script>
  <script type="text/javascript" src="assets/js/validator.js"></script>
  <script type="text/javascript" src="assets/js/main.js"></script>
  <script type="text/javascript" src="view/script.js"></script>

</body>
</html>