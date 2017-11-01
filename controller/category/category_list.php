<?php 

require '../../class/BasicDB.php';
    require '../../class/class.validate.php';

    $db = new Erbilen\Database\BasicDB(); 
    $validate = new Asaricam\Validate\Validate();  

	if(!$validate->isAjax()){
    
	  header("location:../../login.php");
	  exit();
    }
 
        $query = $db->from('category')
                ->where('status',1)
                ->run();

              
                if($query){
                    
                    foreach ( $query as $row ){
                    
                      if($row['status'] == 0)
                              $status = "<span class='label label-warning'>İptal</span>";
                      if($row['status'] == 1)
                            $status = "<span class='label label-success'>Aktif</span>";

                      
                      echo '<tr>';
                      echo '<td>'.$row['cat_name'].'</td>';
                      echo '<td>'.$row['description'].'</td>';
                      echo '<td>'.$status.'</td>';
                      echo '<td>'.$validate->DateFormat($row['register_date']).'</td>';
                      echo '<td>';
                    
                        echo '<div class="btn-group btn-group-xs">';
                          echo '<button type="submit" onclick="$.KategoriSil('.$row['id'].')" class="btn btn-danger">Sil </button>';
                          echo '<a href="index.php?do=kategori_duzenle&id='.$row['id'].'"   class="btn btn-primary">  Düzenle  </a>';
                          
                        echo '</div>';

                        echo'</td>';
                      echo '</tr>';
                }

            }

        ?>

       