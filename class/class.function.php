<?php

namespace Asaricam\Fonksiyon;

class Fonksiyon extends \Asaricam\Validate\Validate
{

    public function KategoriListe(){

        $query = $this->from('category')
            ->where('status',1)
            ->run();

        foreach ($query as $row) {
            echo '<option value="'.$row['id'].'">'.$row['cat_name'].'</option>';
        }
    }

    public function KullaniciListe(){

        $query = $this->from('users')
            ->where('status',1)
            ->run();

        foreach ($query as $row) {
            echo '<option value="'.$row['id'].'">'.$row['name_surname'].'</option>';
        }
    }

    public function KitapListe(){

        $query = $this->from('books')
            ->where('status',1)
            ->run();

        foreach ($query as $row) {
            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
        }
    }

    public function KategoriTableListe(){
        $query = $this->from('category')
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
                echo '<td>'.$this->DateFormat($row['register_date']).'</td>';
                echo '<td>';
                echo '<div class="btn-group btn-group-xs">';
                echo '<button type="submit" onclick="$.KategoriSil('.$row['id'].')" class="btn btn-danger">Sil </button>';
                echo '<a href="index.php?do=kategori_duzenle&id='.$row['id'].'"   class="btn btn-primary">  Düzenle  </a>';
                echo '</div>';
                echo'</td>';
                echo '</tr>';
            }

        }
    }

    public function KullaniciTableListe(){

        $query = $this->from('users')
            ->where('status',1)
            ->run();

        if($query){

            foreach ( $query as $row ){

                echo '<tr>';
                echo '<td>'.$row['name_surname'].'</td>';
                echo '<td>'.$row['username'].'</td>';
                echo '<td>'.$this->dateformat($row['register_date']).'</td>';
                echo '<td>';

                echo '<div class="btn-group btn-group-xs">';
                echo '<button type="submit" onclick="$.UyeSil('.$row['id'].')" class="btn btn-danger">Sil </button>';
                echo '<a href="index.php?do=uye-duzenle&id='.$row['id'].'"  class="btn btn-primary"> { Düzenle } </a>';
                echo '</div>';

                echo'</td>';
                echo '</tr>';
            }

        }

    }

    public function KitapTableListe(){

        $query = $this-> from('books')
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
    }

    public  function  KitapListeleri($rutbe,$id){


        if($rutbe==0){

            $query = $this->from('user_book')
                ->join('books','%s.id = %s.book_id','inner')
                ->join('category','%s.id = books.category_id','inner')
                ->join('users','%s.id = user_id','inner')
                ->run();
            $durum ="visible";
        }

        if($rutbe == 1){
            $query = $this->from('user_book')
                ->join('books','%s.id = %s.book_id','inner')
                ->join('category','%s.id = books.category_id','inner')
                ->join('users','%s.id = user_id','inner')
                ->where('user_id',$id)
                ->run();
            $durum = "disabled";
        }


        if($query){


            $today = date("Y-m-d");

            foreach ( $query as $row ){

                $delivery_date = $this->DateFormat($row['delivery_date']);

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
                echo '<td>'.$this->dateformat($row['ubook_register_date']).'</td>';
                echo '<td>'.$this->dateformat($row['delivery_date']).'</td>';
                echo '<td>'.$msj.'</td>';
                echo '<td>'.$status.'</td>';
                echo '<td>';

                echo '<div class="btn-group btn-group-xs">';

                if ($rutbe ==0 ){
                    echo '<button type="submit" '.$status_.'  onclick="$.KitapAl('.$row['user_book_id'].')" class="btn btn-danger">Kitap Al </button>';
                    echo '<a href="" data-toggle="modal"  data-target="#KullaniciKitapDuzenle" onclick="$.K_KitapDuzenle('.$row['user_book_id'].')" class="btn btn-primary">Düzenle</a>';
                }

                echo '</div>';
                echo'</td>';
                echo '</tr>';

            }

        }

    }
}

?>