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

    	if(empty($_POST['name'])){
    		echo '<div class="alert alert-warning"><strong>Uyarı!</strong> Bilgileri boş bırakma</div>'; 
		    exit();
    	}

    	$query = $db->insert('category')
    				->set(array(
    					'cat_name'=>$validate->filterInput(ucwords($_POST['name'])),
    					'description'=>$validate->filterInput($_POST['description']),
    					'status'=>1
    				));	
				if($query){
					$arr = array('priority' => 'success', 'title' => ' Kategori ', 'message'=> 'Kayıt eklendi..');
                    echo json_encode($arr);
				}

    }
?>