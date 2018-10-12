<?php 

require_once '../core/core2.php';

$page = Input::get('page');

if($page == "profil"){
	$id_celeb = Input::get('id_celeb');
	if($Profil->delete($id_celeb)){
		header('location:admin.php?page=celebrity');
	}else{
		die('gagal');
	}
}else if ($page == "movie"){
	$id_movie = Input::get('id_movie');
	if($Movie->delete($id_movie)){
		$Detail->delete($id_movie);
		header('location:admin.php?page=movie');
	}else{
		die('gagal');
	}
}else if ($page == "photo"){
	$id_photo = Input::get('id_photo');
	if($Photo->delete($id_photo)){
		header('location:admin.php?page=galery');
	}else{
		die('gagal');
	}
}else if ($page == "ratting"){
	$id_rating = Input::get('id_rating');
	if($Ratting->delete($id_photo)){
		header('location:profilceleb.php');
	}else{
		die('gagal');
	}
}else if ($page == "news"){
	$id_news = Input::get('id_news');
	if($News->delete($id_news)){
		header('location:admin.php?page=news');
	}else{
		die('gagal');
	}
}else if ($page == "user"){
	$id_user = Input::get('id_user');
	if($User->delete($id_user)){
		header('location:admin.php?page=user');
	}else{
		die('gagal');
	}
}else if ($page == "galery"){
	$id_user = Input::get('id_photo');
	foreach($Photo->singleid($id_photo) as $d){
		$photo = $d->photo;
	}
	if($User->delete($id_photo)){
		unlink('../photo/'.$photo);
		header('location:admin.php?page=galery');
	}else{
		die('gagal');
	}
}else if ($page == "pemain"){
	$id_pemain = Input::get('id_pemain');
	if($Pemain->delete($id_pemain)){
		echo "<script type='text/javascript'>window.history.back();</script>";
	}else{
		die('gagal');
	}
}else if ($page == "review"){
	$id_rating = Input::get('id_rating');
	if($Ratting->delete($id_rating)){
		header('location:admin.php?page=user');
	}else{
		die('gagal');
	}
}



 ?>
