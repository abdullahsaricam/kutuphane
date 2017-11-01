<?php 
	 
	require '../../class/BasicDB.php';
    require '../../class/class.validate.php';

   $db = new Erbilen\Database\BasicDB(); 
   $validate = new Asaricam\Validate\Validate();  

	if(!$validate->isAjax()){
	  header("location:../../login.php");
	  exit();
    }

  	
	if (isset($_POST)) {
		
	 	if($validate->filterInput($_POST['name'])){
		 				
			$query = $db->update('category')
					->where('id',$_POST['id'])
					->set(array(
					'cat_name'=>$_POST['name'],
					'description'=>$_POST['description'],
					'status'=>$_POST['status'],
					'update_date'=>date("Y-m-d H:i:s")
			));

		if($query){

			$arr = array('priority' => 'success', 'title' => ' Kategori ', 'message'=> 'Kayıt güncellendi..');
            echo json_encode($arr);
		}

		}
}
		
?>
