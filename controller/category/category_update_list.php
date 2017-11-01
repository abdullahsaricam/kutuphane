<?php 

    require '../../class/BasicDB.php';
require '../../class/class.validate.php';

    $db = new Erbilen\Database\BasicDB(); 
    $validate = new Asaricam\Validate\Validate();  

	if(!$validate->isAjax()){
	  header("location:../../login.php");
	  exit();
    }
 
 
    if(isset($_POST['id'])){

       $query = $db->from('category')
                  ->where('status',1)
                  ->where('id',$_POST['id'])
                  ->first();

            if($query){
              echo json_encode($query);
            }
    
       }
 ?>

       