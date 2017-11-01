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

  			$id = $_POST['id'];
 			  $query = $db->update('books')
 				->where('id',$id)
 				->set(array(
 					'status'=>0
 					));

 				if($query){
 					$arr = array('priority' => 'success', 'title' => ' Kitap ', 'message'=> 'Kitap silindi.');
          echo json_encode($arr);
 				}
  	}
?>