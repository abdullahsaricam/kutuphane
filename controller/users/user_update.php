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
		
		 	if(empty($_POST['password'])  &&  empty($_POST['password2'])){
 				echo '<div class="alert alert-warning"><strong>Uyarı!</strong> Bilgileri boş bırakma</div>'; 
				exit();
 		}		
 				
 		if($_POST['password'] == $_POST['password2']){
	 				
			$query = $db->update('users')
					->where('id',$_POST['id'])	
					->set(array(
					'name_surname'=>$_POST['name_surname'],
					'username'=>$_POST['username'],
					'password'=>$_POST['password'],
					'password_md5'=>md5(sha1($_POST['password'])),
					'eposta'=>$_POST['eposta'],
					'status'=>$_POST['durum'],
					'rank'=>$_POST['rutbe']
				));

				if($query){
					$arr = array('priority' => 'success', 'title' => ' Uye ', 'message'=> 'Kayıt güncellendi..');
          			echo json_encode($arr);
				}
	
			}else{
				$arr = array('priority' => 'info', 'title' => ' Kategori ', 'message'=> 'Şifreler aynı değil');
          		echo json_encode($arr);
          		exit();
			}

}
		
?>
