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

		    
		$query = $db->update('books')
		    ->where('id',$_POST['book_id'])
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
					$arr = array('priority' => 'success', 'title' => ' Kitap ', 'message'=> 'Kayıt günceelendi..');
          			echo json_encode($arr);
				}else{
					$arr = array('priority' => 'error', 'title' => ' Kitap ', 'message'=> 'Hata oluştu.');
         			 echo json_encode($arr);
				}

				 
	}

?>