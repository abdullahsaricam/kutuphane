<?php
  
  require_once 'class/BasicDB.php';
  $db = new Erbilen\Database\BasicDB('localhost', 'kutuphane', 'root', '');

 ?>
  
		<!-- end header -->
		<div id="content">
			<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-12"></div>
				<div class="col-md-8 col-sm-8 col-xs-12">
				<div class="column-box">
          <div class="column-title">
            <h1>Kitap Listesi</h1>
          </div>
          <div class="column-body">
				<table id="kitap_listesi" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Kitap Adı</th>
                <th>Kitap Yazarı</th>
                <th>İşlemler</th>
            </tr>
        </thead>

         <tbody id="kitaplar">
        
          <?php $fonk->KitapTableListe(); ?>
        
        </tbody>
        
            </table>
            </div>
            </div>
				</div>
			</div>
		</div>
<div class="modal fade" id="kitapVer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Kitap</h4>
      </div>
      <div class="modal-body">
        <form action="" id="form" method="post" data-toggle="validator" onsubmit="return false">
          <div class="form-group">
            <input id="book_id" name="book_id" type="text" hidden />
            <label for="">Ad ve Soyad :</label>
            <select name="name_surname" id="name_surname" class="form-control">
             
              <?php  $fonk->KullaniciListe();   ?>

            </select>
          </div>     
          
          <div class="form-group">
            <label for="">Teslim Tarihi :</label>
            <input class="form-control" id="t_date" name="t_date" placeholder="MM/DD/YYY" type="date"/>
          </div>
          <button type="submit" onclick="$.KitapVer()" class="btn btn-block btn-primary">Kaydet</button>
        </form>
      </div>
    </div>
  </div>
</div>