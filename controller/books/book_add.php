<?php

require '../../class/BasicDB.php';
require '../../class/class.validate.php';

$db = new Erbilen\Database\BasicDB();
$validate = new Asaricam\Validate\Validate();


if(!$validate->isAjax()){
    header("location:../../login.php");
    exit();
}

if(isset($_POST)){

    $query = $db->insert('books')
        ->set(array(

            'category_id'=>$_POST['category_id'],
            'name'=>$_POST['name'],
            'book_author'=>$_POST['book_author'],
            'page'=>$_POST['page_count'],
            'publisher'=>$_POST['publisher'],
            'summary'=>$_POST['summary'],
            'like_'=>0,
            'disliking'=>0,
            'language'=>$_POST['language'],
            'status'=>1,
            'book_date'=>$_POST['date']

        ));

    if($query){
        $arr = array('priority' => 'success', 'title' => ' Kitap ', 'message'=> 'Kayıt eklendi..');
        echo json_encode($arr);
    }
}

?>