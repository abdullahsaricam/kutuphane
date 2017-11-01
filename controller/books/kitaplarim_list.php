<?php

require '../../class/BasicDB.php';
require '../../class/class.validate.php';

$db = new Erbilen\Database\BasicDB();
$validate = new Asaricam\Validate\Validate();

if(!$validate->isAjax()){
    header("location:../../login.php");
    exit();
}



$query = $db->from('user_book')
    ->join('books','%s.id = %s.book_id','inner')
    ->join('category','%s.id = books.category_id','inner')
    ->join('users','%s.id = user_id','inner')
    //->where('userbook_status.status',1)
    ->run();

if($query){


    $today = date("Y-m-d");

    foreach ( $query as $row ){

        $delivery_date = $validate->DateFormat($row['delivery_date']);

        if($row['userbook_status'] == 0){
            $status = "<span class='label label-warning'>İptal</span>";
            $status_ = "disabled";
        }

        if($row['userbook_status'] == 1){
            $status = "<span class='label label-success'>Aktif</span>";
            $status_ = "active";
        }

        $fark=(strtotime($delivery_date)-strtotime($today))/86400;
        if($fark > 0 ){
            $msj = "Teslim için ".$fark." gün var";
        }else if($fark < 0 ){
            $msj ="Teslim günü geçti";
        }else if($fark == 0){
            $msj = "Teslim bügün";
            if($row['userbook_status'] == 0)
                $msj = "Teslim alındı";
        }

        echo '<tr>';
        echo '<td>'.$row['name'].'</td>';
        echo '<td>'.$row['cat_name'].'</td>';
        echo '<td>'.$row['name_surname'].'</td>';
        echo '<td>'.$validate->dateformat($row['ubook_register_date']).'</td>';
        echo '<td>'.$validate->dateformat($row['delivery_date']).'</td>';
        echo '<td>'.$msj.'</td>';
        echo '<td>'.$status.'</td>';
        echo '<td>';

        echo '<div class="btn-group btn-group-xs">';
        echo '<button type="submit" '.$status_.' onclick="$.KitapAl('.$row['user_book_id'].')" class="btn btn-danger">Kitap Al </button>';
        echo '<a href="" data-toggle="modal"  data-target="#KullaniciKitapDuzenle" onclick="$.K_KitapDuzenle('.$row['user_book_id'].')" class="btn btn-primary">Düzenle</a>';
        echo '</div>';
        echo'</td>';
        echo '</tr>';

    }

}

?>