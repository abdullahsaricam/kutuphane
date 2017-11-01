<?php

require '../../class/BasicDB.php';
require '../../class/class.validate.php';

$db = new Erbilen\Database\BasicDB();
$validate = new Asaricam\Validate\Validate();

if(!$validate->isAjax()){
    header("location:../../login.php");
    exit();
}




?>