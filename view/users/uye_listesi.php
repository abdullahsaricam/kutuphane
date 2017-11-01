
		<!-- end header -->
		<div id="content">
			<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-12"></div>
				<div class="col-md-8 col-sm-8 col-xs-12">
					<div class="column-box">
          <div class="column-title">
            <h1>Üye Listesi</h1>
          </div>
          <div class="column-body">
					<table id="uye_listesi" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Ad ve Soyad</th>
                <th>Kullanıcı Adı</th>
                <th>Kayıt Tarihi</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody id="uyeler">
          
          <?php $fonk->KullaniciTableListe(); ?>
        
        </tbody>

            </table>
            </div>
            </div>
				</div>
			</div>
		</div>

