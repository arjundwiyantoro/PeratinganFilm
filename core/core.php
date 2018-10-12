<?php 

// nama class harus sama dengan nama file nya
spl_autoload_register(function($class){
	require_once 'class/'.$class.'.php';
});


$Movie   = new Movie();
$Pemain  = new Pemain();
$Profil  = new Profil();
$Ratting = new Ratting();
$User    = new User();
$Photo   = new Photo();
$News	 = new News();
$Detail  = new Detail();
$Watchlist = new Watchlist();
$Komen 	   = new Komen();



 ?>