<?php 

require '../../class/BasicDB.php';
    require '../../class/class.validate.php';

   $db = new Erbilen\Database\BasicDB(); 
   $validate = new Asaricam\Validate\Validate();  
   
  if(!$validate->isAjax()){
    header("location:../../login.php");
    exit();
    }

        $query = $db-> from('books')
        ->where('status',1)
        ->run();

        if($query){
          
          foreach ( $query as $row ){
            
            if($row['status'] == 0)
                    $status = "<span class='label label-warning'>İptal</span>";
            if($row['status'] == 1)
                  $status = "<span class='label label-success'>Aktif</span>";

              echo '<tr>';
                    echo '<td>'.$row['name'].'</td>';
                    echo '<td>'.$row['book_author'].'</td>';
                    echo '<td>';
                  
                    echo '<div class="btn-group btn-group-xs">';
                      echo '<a href="" data-toggle="modal" data-target="#kitapVer"  onclick="$.KitapID('.$row['id'].')"  class="btn btn-warning"> Kitap ver </a>';
                      echo '<button type="submit" onclick="$.KitapSil('.$row['id'].')" class="btn btn-danger">Sil </button>';
                      echo '<a href="index.php?do=kitap-duzenle&id='.$row['id'].'"  class="btn btn-primary">Düzenle</a>';
                    echo '</div>';

                    echo'</td>';
                  echo '</tr>';
        }

      }

        ?>