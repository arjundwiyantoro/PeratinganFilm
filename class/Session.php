<?php 


class Session
{
	public static function set($key,$value)
	{
		return $_SESSION[$key] = $value;
	}
	public static function get($key)
	{
		return $_SESSION[$key];
	}
	public static function cek($key)
	{
		if(Seasson::get($key) != ""){
			return true;
		}else{
			return false;
		}
	}
}



 ?>