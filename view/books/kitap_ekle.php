		<!-- end header -->
		<div id="content">
			<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-12"></div>
				<div class="col-md-8 col-sm-8 col-xs-12">
					<div class="column-box">
          <div class="column-title">
            <h1>Kitap Ekle</h1>
          </div>
          <div class="column-body">
					<form action="" id="form" method="post" data-toggle="validator" onsubmit="return false">
						<input type="text" id="id" name="id" hidden value="<?php echo $_SESSION['userId']; ?>">
						<div class="form-group">
							<label for="">Kitap Adı :</label>
							<input type="text" name="name" id="name" class="form-control" >
						</div>
						<div class="form-group">
							<label for="">Kitap Yazarı :</label>
							<input type="text" name="book_author" id="book_author" class="form-control" >
						</div>
						<div class="row">
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="form-group">
							<label for="">Sayfa Sayısı :</label>
							<input type="number"  min="0" name="page_count" id="page_count" class="form-control" >
						</div>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="form-group">
							<label for="">Yayın Evi :</label>
							<input type="text" name="publisher" id="publisher" class="form-control" >
						</div>
						</div>
						</div>
						<div class="form-group">
							<label for="">Özet :</label>
							<textarea name="summary" id="summary" cols="30" rows="4" class="form-control" >
								
							</textarea>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
							<label for="">Dili :</label>
							<select name="language" id="language" class="form-control" >
								<option value="1">Türkçe</option>
								<option value="2">İngilizce</option>
							</select>
						</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
							<label for="">Kategori :</label>
							<select name="category_id" id="category_id" class="form-control" >
								
									<?php  $fonk->KategorListe();  ?>

							</select>
						</div>
							</div>
						</div>
						<div class="form-group">
							<label for="">Basım Tarihi :</label>
							<input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="date"/>
						</div>
						<button type="submit" onclick="$.KitapEkle()" class="btn btn-block btn-success">Kitap Ekle</button>
					</form>
					</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end content -->
