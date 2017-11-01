
		<!-- end header -->
		<div id="content">
			<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-12"></div>
				<div class="col-md-8 col-sm-8 col-xs-12">
					<div class="column-box">
          <div class="column-title">
            <h1>Üye Ekle</h1>
          </div>
          <div class="column-body">
					<form  method="post" data-toggle="validator" id="form" onsubmit="return false"> 
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
							<input type="email" name="eposta" id="eposta" class="form-control" required>
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
						</div>
						<button type="submit" onclick="$.UyeEkle()" class="btn btn-block btn-success">Üye Ekle</button>
					</form>
					</div>
					</div>
				</div>
			</div>
		</div>
