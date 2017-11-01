<?php
		if(isset($_GET['id'])){
				if(empty($_GET['id']))
					header('location:index.php');
 		}else{
 			header('location:index.php');
 			exit();
 		}

 ?>
	<div id="content">
			<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-12"></div>
				<div class="col-md-8 col-sm-8 col-xs-12">
					<div class="column-box">
          <div class="column-title">
            <h1>Kategori Duzenle</h1>
          </div>
          <div class="column-body">
					<form action="" id="form" method="post" data-toggle="validator" onsubmit="return false">
						<input type="text" name="id" id="id"  value="<?php echo $_GET['id']; ?>" hidden>
						<div class="form-group">
							<label for="">Kategori Adı :</label>
							<input type="text" name="name" id="name" class="form-control">
						</div>
						<div class="form-group">
							<label for="">Kategori Açıklama :</label>
							<textarea name="description" id="description" cols="30" rows="4" class="form-control" ></textarea>
						</div>
								
						<div class="form-group">
							<label for="">Durum :</label>
							 <select class="form-control" id="status" name="status">
							    <option value="1">Aktif</option>
							    <option value="0">Pasif</option>
  							</select>
						</div>
							
						<button type="submit" onclick="$.KategoriDuzenle()" class="btn btn-block btn-success">Kategori Duzenle</button>
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
        url: 'controller/category/category_update_list.php',
        data: { "id" : id },
        dataType:'json',
        success:function(response){
        	$("#name").val(response.cat_name);
        	$("#description").val(response.description);
        	$("#status").val(response.status);
        }
      });
});
</script>