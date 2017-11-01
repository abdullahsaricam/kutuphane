<?php 

	require '../../class/BasicDB.php';
    require '../../class/class.validate.php';

   $db = new Erbilen\Database\BasicDB(); 
   $validate = new Validate();  

    if(!$validate->isAjax()){
    header("location:../../login.php");
    exit();
    }


    if (isset($_POST)) {
    	

    	$query = $db->from('user_book')
    				->where('user_book_id',$_POST['id'])
    				->first();

    				echo json_encode($query);

    }

?>