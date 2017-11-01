<?php 

  require '../../class/BasicDB.php';
  require '../../class/class.validate.php';
    
    $db = new Erbilen\Database\BasicDB(); 
    $validate = new Asaricam\Validate\Validate();  

  if(!$validate->isAjax()){
    header("location:../../login.php");
    exit();
    }


      $query = $db->from('users')
      ->where('status',1)
      ->run();

      if($query){
          
          foreach ( $query as $row ){
          
            echo '<tr>';
            echo '<td>'.$row['name_surname'].'</td>';
            echo '<td>'.$row['username'].'</td>';
            echo '<td>'.$validate->dateformat($row['register_date']).'</td>';
            echo '<td>';
          
              echo '<div class="btn-group btn-group-xs">';
              echo '<button type="submit" onclick="$.UyeSil('.$row['id'].')" class="btn btn-danger">Sil </button>';
              echo '<a href="index.php?do=uye-duzenle&id='.$row['id'].'"  class="btn btn-primary"> { Düzenle } </a>';
              echo '</div>';

              echo'</td>';
            echo '</tr>';
      }

  }

?>