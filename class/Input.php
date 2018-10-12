<?php 

class Input
{
	public static function get($name)
	{	
		if(isset($_POST[$name])){
			return $_POST[$name];
		}else if(isset($_GET[$name])){
			return $_GET[$name];
		}else{
			return false;
		}
	}

	public static function rupiah($angka)
	{
		$hasil_rupiah = "Rp ". number_format($angka,2,',','.');
		return $hasil_rupiah;
	}

	public static function token()
	{
		$token = base64_encode(openssl_random_pseudo_bytes(32));
		$_SESSION['csrf_value'] = $token;
		return $token;
	}

	public static function validasi($value_token)
	{
		if(isset($_SESSION['csrf_value'])){
			if($_SESSION['csrf_value'] == $value_token){
				unset($_SESSION['csrf_value']);
				return true;
			}else{
				unset($_SESSION['csrf_value']);
				return false;
			}
		}else{
			unset($_SESSION['csrf_value']);
			return false;
		}
	}

	public static function convert($n)
	{
		$n = (0+str_replace(",", "", $n));

        // is this a number?
        if (!is_numeric($n)) return false;

        // now filter it;
        if ($n > 1000000000000) return round(($n/1000000000000), 1).' Triliun';
        elseif ($n > 1000000000) return round(($n/1000000000), 1).' Miliar';
        elseif ($n > 1000000) return round(($n/1000000), 1).' Juta';
        elseif ($n > 1000) return round(($n/1000), 1).' Ribu';

        return number_format($n);
	} 
}




 ?>

 