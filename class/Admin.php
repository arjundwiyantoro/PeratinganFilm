<?php 

class Admin extends db
{
	public function login($username,$password)
	{
		$query = $this->db->prepare("SELECT * FROM admin WHERE username = :username");
		$query->bindParam(':username',$username);
		$query->execute();
		$data = $query->fetch();
		if($data && password_verify($password,$data['password'])){
			Session::set('admin',$username);
			return true;
		}else{
			return false;
		}
	}

	public function input()
	{
		$username = 'admin';
		$password = password_hash('admin',PASSWORD_DEFAULT);
		$query = $this->db->query("INSERT INTO admin(username,password) VALUES('$username','$password')");
		return $query;
	}

	public function cekpass($password)
	{
		$query = $this->db->query("SELECT * FROM admin");
		$data = $query->fetchObject();
		if($data && password_verify($password,$data->password)){
			return true;
		}else{
			return false;
		}
	}

	public function editpass($password)
	{
		$id_admin = 1;
		$query = $this->db->prepare("UPDATE admin SET password = :password WHERE id_admin = :id_admin");
		$query->bindParam(':password',$password);
		$query->bindParam(':id_admin',$id_admin);
		$query->execute();
		return $this->tf($query);
	}
}




 ?>