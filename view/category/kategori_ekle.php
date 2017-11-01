	<div id="content">
			<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-12"></div>
				<div class="col-md-8 col-sm-8 col-xs-12">
					<div class="column-box">
          <div class="column-title">
            <h1>Kategori Ekle</h1>
          </div>
          <div class="column-body">
					<form action="" id="form" method="post" data-toggle="validator" onsubmit="return false">
						
						<div class="form-group">
							<label for="">Kategori Adı :</label>
							<input type="text" name="name" id="name" class="form-control" value="" required>
						</div>
						<div class="form-group">
							<label for="">Kategori Açıklama :</label>
							<textarea name="description" id="description" cols="30" rows="4" class="form-control" value="" required></textarea>
						</div>
						<button type="submit" onclick="$.KategoriEkle()"  class="btn btn-block btn-success">Kategori Ekle</button>
					</form>
					</div>
					</div>
				</div>
			</div>
		</div>

