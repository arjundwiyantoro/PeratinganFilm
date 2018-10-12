<?php 
header('Content-Type: application/json');

require_once '../core/core2.php';

$page = Input::get('page');


if($page == "cari"){

	$term = Input::get('term');

	foreach($Movie->cari($term) as $d){
		$rest['value'] = $d->judul;
		$rest['url'] = 'tittle.php?m='.$d->slug;
		$rest['icon'] = $d->cover;
		$hasil[] = $rest;
	}
	echo json_encode($hasil);
	

}else if($page == "store"){
	$id_user    = Input::get('id_user');
	$id_movie   = Input::get('id_movie');
	$judul		= Input::get('judul');
	$slug		= Input::get('slug');
	$cover		= Input::get('cover');
	if($Watchlist->store($id_user,$id_movie,$judul,$slug,$cover)){
		$rest['report'] = "Berhasil";
		$rest['code']	= 200;
		echo json_encode($rest);
	}else{
		$rest['report'] = "Error";
		$rest['code']	= 500;
		echo json_encode($rest);
	}
}else if($page == "delete"){
	$id_movie   = Input::get('id_movie');
	$id_user	= Input::get('id_user');
	if($Watchlist->delete($id_movie,$id_user)){
		$hasil['report'] = "berhasil menghapus";
		$hasil['code']   = 200;
		echo json_encode($hasil);
	}else{
		$hasil['report'] = "Gagal Menghapus";
		$hasil['code']   = 500;
		echo json_encode($hasil);
	}
}else if($page == 'update'){
	$id_movie = Input::get('id_movie');
	if($Movie->diputarupdate($id_movie)){
		$hasil['report'] = "Berhasil Mengupdate";
		$hasil['code'] = 200;
		echo json_encode($hasil);
	}else{
		$hasil['report'] = "Gagal Mengupdate";
		$hasil['code'] = 500;
		echo json_encode($hasil);
	}
}else if($page == 'update2'){
	$id_movie = Input::get('id_movie');
	if($Movie->diputarupdate2($id_movie)){
		$hasil['report'] = "Berhasil Mengupdate";
		$hasil['code'] = 200;
		echo json_encode($hasil);
	}else{
		$hasil['report'] = "Gagal Mengupdate";
		$hasil['code'] = 500;
		echo json_encode($hasil);
	}
}

 ?>