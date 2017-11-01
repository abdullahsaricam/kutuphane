<?php

/*sistem çalışmıyor ajax kısmı sonra bakılacak*/

    require_once '../../class/BasicDB.php';   
    $db = new Erbilen\Database\BasicDB(); 


   if (isset($_POST)) {
   		
   		$query = $db->from("users")
	    	->where('username',$_POST['username'])
	    	->where('password',$_POST['password'])
	    	->first();

            if($query){

                    session_start();
                    $_SESSION['oturum'] = true;
                    $_SESSION['username']   =  $query['username'];
                    $_SESSION['userId'] = $query['id'];
                    $_SESSION['rutbe'] =  $query['rank'];
                    echo json_encode(true);

                 }else{
                    echo json_encode(false);
                }
	    }

?>