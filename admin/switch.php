<?php 

require_once '../core/core2.php';

if(input::get('page')){
  $page = input::get('page');
  switch ($page) {
    case 'movie':
      require_once('movie.php');
      break;
    case 'tambah_movie':
      require_once('buatmovie.php');
      break;
    case 'tambah_movie2':
      require_once('tambahmovie2.php');
      break;
    case 'edit_movie':
      require_once('editmovie2.php');
      break;
    case 'tambah_profil':
      require_once('buatprofil.php');
      break;
    case 'news':
      require_once('news.php');
      break;
    case 'tambah_news':
      require_once('buatnews.php');
      break;
    case 'edit_news':
      require_once('editnews.php');
      break;
    case 'tambah_pemain':
      require_once('buatpemain.php');
      break;
    case 'tambah_galery':
      require_once('buatgalery.php');
      break;
    case 'celebrity':
      require_once('celebrity.php');
      break;
    case 'tambah_celebrity':
      require_once('buatprofil.php');
      break;
    case 'edit_celebrity':
      require_once('editprofil.php');
      break;
    case 'user':
      require_once('user.php');
      break;
    case 'pemain':
      require_once('pemain.php');
      break;
    case 'lihat_pemain':
      require_once('lihatpemain.php');
      break;
    case 'diputar':
      require_once('diputar.php');
      break;
    case 'tambah_diputar':
      require_once('tambahdiputar.php');
      break;
    case 'galery':
      require_once('galery.php');
      break;
    case 'lihat_galery':
      require_once('lihatgalery.php');
      break;
    case 'laporan':
      require_once('laporan.php');
      break;
    case 'editadmin':
      require_once('editadmin.php');
      break;
    case 'review':
      require_once('review.php');
      break;
    case 'lihat_review':
      require_once('lihatreview.php');
      break;
    default:
      require_once('404.php');
  }
}else{
  require_once 'dasboard.php';
}

 ?>