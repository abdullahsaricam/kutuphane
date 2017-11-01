<?php
		if(isset($_GET['id'])){
				if(empty($_GET['id']))
					header('location:index.php');
 		}else{
 			header('location:index.php');
 			exit();
 		}

 ?>
		<!-- end header -->
		<div id="content">
			<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-12"></div>
				<div class="col-md-8 col-sm-8 col-xs-12">
					<div class="column-box">
          <div class="column-title">
            <h1>Üye Duzenle</h1>
          </div>
          <div class="column-body">
					<form  method="post" data-toggle="validator" id="form"  onsubmit="return false">
						<input type="text" name="id" id="id"  value="<?php echo $_GET['id']; ?>" hidden>
						<div class="form-group">
							<label for="">Ad ve Soyad :</label>
							<input type="text" name="name_surname" id="name_surname" class="form-control" required>
						</div>

						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label for="">Kullanıcı Adı :</label>
							<input type="text" name="username" id="username" class="form-control" required>
						</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								
						<div class="form-group">
							<label for="">E-mail Adresi :</label>
							<input type="text" name="eposta" id="eposta" class="form-control" required>
						</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label for="">Şifre :</label>
							<input type="password" name="password" id="password" class="form-control" required>
						</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label for="">Şifre Tekrar :</label>
							<input type="password" name="password2" id="password2" class="form-control" required>
						</div>
							</div>
						
							<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label for="">Durum :</label>
							 <select class="form-control" id="durum" name="durum">
							    <option value="1">Aktif</option>
							    <option value="0">Pasif</option>
  							</select>
						</div>
							</div>

								<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label for="">Rutbe :</label>
							 <select class="form-control" id="rutbe" name="rutbe">
							    <option value="0">Admin</option>
							    <option value="1">Üye</option>
  							</select>
						</div>
							</div>

						</div>
						<button type="submit" onclick="$.UyeDuzenle()" class="btn btn-block btn-success">Üye Duzenle</button>
					</form>
					</div>
					</div>
				</div>
			</div>
		</div>

<script type="text/javascript">
	
$(document).ready(function(){

	 var id = $("#id").val();

	  $.ajax({
        type: 'POST',
        url: 'controller/users/user_update_list.php',
        data: { "id" : id },
        dataType:'json',
        success:function(response){
        	

        	$("#name_surname").val(response.name_surname);
        	$("#username").val(response.username);
        	$("#eposta").val(response.eposta);
        	$("#password").val(response.password);
        	$("#password2").val(response.password);
        	$("#durum").val(response.status);
        	$("#rutbe").val(response.rank);

        }
      });
});
</script>