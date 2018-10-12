<?php 

require_once '../core/core2.php';

$id_movie = Input::get('id_movie');

if($Movie->diputarupdate($id_movie)){
	header('location:diputar.php');
}else{
	die("GAGAL");
}

 ?>

