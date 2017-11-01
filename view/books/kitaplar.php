  <!-- end header -->
		<div id="content">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="column-box">
          <div class="column-title">
            <h1>Kitap Listesi</h1>
          </div>
          <div class="column-body">
				<table id="" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Kitap Adı</th>
                <th>Kategorisi</th>
                <th>Okuyan Kişi</th>
                <th>Veriliş Tarihi</th>
                <th>Teslim Tarihi</th>
                <th>Mesaj</th>
                <th>Durum</th>
                <th>İşlemler</th>
            </tr>
        </thead>

         <tbody>

             <?php $fonk->KitapListeleri($_SESSION['rutbe'],$_SESSION['userId']);?>

        </tbody>
        
            </table>
            </div>
            </div>
				</div>
			</div>
		</div>
<div class="modal fade" id="KullaniciKitapDuzenle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Kitap </h4>
      </div>
      <div class="modal-body">
        <form action="" id="form" method="post" data-toggle="validator" onsubmit="return false">
            <input type="text" id="book_id" name="book_id" hidden>
           <div class="form-group">
           
            <label for="">Kitap Adı</label>
            <select name="kitapadi" id="kitapadi" class="form-control">
             
            <?php $fonk->KitapListe(); ?>

            </select>
          </div> 
          <div class="form-group">
            <label for="">Ad ve Soyad :</label>
            <select name="adsoyad" id="adsoyad" class="form-control">
             
              <?php $fonk->KullaniciListe(); ?>

            </select>
          </div>     
           <div class="form-group">
            <label for="">Veriliş Tarihi :</label>
            <input class="form-control" id="v_date" name="v_date" placeholder="MM/DD/YYY" type="text"/>
          </div>

          <div class="form-group">
            <label for="">Teslim Tarihi :</label>
            <input class="form-control"  id="t_date" name="t_date" placeholder="MM/DD/YYY" type="text"/>
          </div>
            <div class="form-group">
              <label for="">Durum :</label>
               <select class="form-control" id="durum" name="durum">
                  <option value="1">Aktif</option>
                  <option value="0">Pasif</option>
                </select>
            </div>
                <button type="submit" onclick="$.K_KitapDuzenleKaydet()" class="btn btn-block btn-primary">Kaydet</button>
        </form>
      </div>
    </div>
  </div>
</div>
