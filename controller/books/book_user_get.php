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

    	$query =  $db->update('user_book')
		    ->where('user_book_id',$_POST['id'])
    		->set(array(
				'userbook_status '=>0,
				'delivery_date'=>date("Y-m-d H:i:s")
    		));	

    		if($query){
    			$arr = array('priority' => 'success', 'title' => ' Kitap ', 'message'=> 'Kitap teslim alındı.');
            	echo json_encode($arr);
    		}
    }
?>