<?php 
session_start();
include 'class/Input.php';


if(isset($_POST['submit'])){
	$value_token = $_POST['value_token'];
	if(Input::validasi($value_token) == true){
		die("TOKEN Sudah di set");
	}else{
		die("TOKEN BLUM DI SET");
	}
}

 ?>

 <form action="" method="post">
 	<input type="text" name="nama"><br>
 	<input type="hidden" value="<?php echo Input::token(); ?>" name="value_token">
 	<input type="submit" name="submit">
 </form>