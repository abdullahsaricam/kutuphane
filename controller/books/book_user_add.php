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

      if(empty($_POST['t_date'])){
       $arr = array('priority' => 'info', 'title' => ' Kitap ', 'message'=> 'Teslim tarihi seçin');
        echo json_encode($arr);
        exit();
      }

      $query = $db->from('user_book')
                  ->where('user_id',$_POST['name_surname'])
                  ->where('book_id',$_POST['book_id'])
                  ->run();


  		if(count($query) >0 ){
          $arr = array('priority' => 'info', 'title' => ' Kitap ', 'message'=> 'Aynı kitabı tekrar veremezsiniz.');
          echo json_encode($arr);
      }else{

        $query = $db->insert('user_book')
            ->set(array(
              'user_id'=>$_POST['name_surname'],//Kullanici ID;
              'book_id'=>$_POST['book_id'],
              'delivery_date'=>$_POST['t_date'],
              'userbook_status'=>1
            ));

        if($query){
             $arr = array('priority' => 'success', 'title' => ' Kitap ', 'message'=> 'Kitap kullanıcıya verildi.');
             echo json_encode($arr);
        }

      }

  	}

?>