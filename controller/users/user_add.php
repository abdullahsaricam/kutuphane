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

		
			if(empty($_POST['password']) && empty($_POST['password2'])){

				$arr = array('priority' => 'info', 'title' => ' Üye ', 'message'=> 'Bilgileri boş bırakmayın');
                echo json_encode($arr);
                exit();
			}

			if($validate->filterEmail($_POST['eposta'])){
				
				$arr = array('priority' => 'info', 'title' => ' Üye ', 'message'=> 'Geçersiz mail adresi');
                echo json_encode($arr);
                exit();
			}



		  if($_POST['password'] == $_POST['password2']){
	 				
			$query = $db->insert('users')
				->set(array(
					'name_surname'=>$_POST['name_surname'],
					'username'=>$_POST['username'],
					'password'=>$_POST['password'],
					'password_md5'=>md5(sha1($_POST['password'])),
					'eposta'=>$_POST['eposta'],
					'status'=>1,
					'rank'=>1
				));

				if($query){
					$arr = array('priority' => 'success', 'title' => ' Üye ', 'message'=> 'Kayıt eklendi..');
                    echo json_encode($arr);
				}
	
			}else{
				$arr = array('priority' => 'info', 'title' => ' Üye ', 'message'=> 'Şifreler aynı değil');
                echo json_encode($arr);
				exit();
			}
	}
		
?>
