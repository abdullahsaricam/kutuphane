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


      $query_user = $db->from('user_book')
                      ->where('user_id',$_POST['id'])
                      ->where('userbook_status',1)
                      ->run();

        if (count($query_user) > 0 ) {
              $arr = array('priority' => 'info', 'title' => ' Üye ', 'message'=> 'Üyenin kayıtlı kitabı bulunuyor silme işlemi yapamazsınız.');
              echo json_encode($arr);
              exit();
          }else{
            $query = $db->update('users')
                     ->where('id',$_POST['id'])
                     ->set(array(
                     'status'=>0
                      ));
        if($query){
          $arr = array('priority' => 'success', 'title' => ' Üye ', 'message'=> 'Kayıt silindi..');
          echo json_encode($arr);
        } 

          }	
  	}
?>