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
    	
    	$query = $db->update('user_book')
    				->where('user_book_id',$_POST['book_id'])
    				->set(array(
    					'user_id'=>$_POST['adsoyad'],
    					'book_id'=>$_POST['kitapadi'],
    					'ubook_register_date'=>$_POST['v_date'],
    					'delivery_date'=>$_POST['t_date'],
                        'userbook_status'=>$_POST['durum']
    				));

    			if($query){
    				$arr = array('priority' => 'success', 'title' => ' Kitap ', 'message'=> 'Kayıt günceelendi..');
          			echo json_encode($arr);
    			}	
    }
 ?>