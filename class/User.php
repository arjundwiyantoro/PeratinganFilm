<?php 


class User extends Db
{
	public function show()
	{
		$query = $this->db->prepare("SELECT * FROM user");
		$query->execute();
		return $this->run($query);
	}

	public function login($nama,$password)
	{
		$query = $this->db->prepare("SELECT * FROM user Where nama = :nama AND password = :password");
		$query->bindParam(':nama',$nama);
		$query->bindParam(':password',$password);
		$query->execute();
		if($query->rowcount() != 0){
			$data = $query->fetch();
			Session::set('id_user',$data['id_user']);
			Session::set('nama',$data['nama']);
			return true;
		}else{
			return false;
		}
	}

	public function loginv($email,$password)
	{
		$query = $this->db->prepare("SELECT * FROM user WHERE email  = :email");
		$query->bindParam(':email',$email);
		$query->execute();
		$data = $query->fetch();
		if($data && password_verify($password,$data['password'])){
			Session::set('id_user',$data['id_user']);
			Session::set('nama',$data['nama']);
			return true;
		}else{
			return false;
		}
	}

	public function store($nama,$password,$email,$tanggal)
	{
		$query = $this->db->prepare("INSERT INTO user(nama,password,email,tanggal,profil) VALUES(:nama,:password,:email,:tanggal,:profil)");
		$data = array(
				':nama'		=> $nama,
				':password'	=> $password,
				':email'	=> $email,
				':tanggal'	=> $tanggal,
				':profil'	=> 'profil.png'
			);
		$query->execute($data);
		return $this->tf($query);
	}

	public function updateimg($id_user,$profil)
	{
		$query = $this->db->prepare("UPDATE user SET profil = :profil WHERE id_user = :id_user");
		$query->bindParam(':profil',$profil);
		$query->bindParam(':id_user',$id_user);
		$query->execute();
		return $this->tf($query);
	}

	public function cekemail($email)
	{
		$query = $this->db->prepare("SELECT * FROM user WHERE email = :email");
		$query->bindParam(':email',$email);
		$query->execute();
		return $query->rowcount();
	}

	public function tes($id_user)
	{
		$query = $this->db->prepare("SELECT user.id_user,rating.id_rating,rating.jumlah,rating.tanggal,movie.id_movie,movie.judul,movie.cover,movie.tanggal_rilis,movie.sinopsis,movie.genre,movie.slug, AVG(rating.jumlah) as jml	
					FROM user 
					RIGHT JOIN rating ON user.id_user = rating.id_user
			 	   	RIGHT JOIN movie ON rating.id_movie = movie.id_movie
			 	   	WHERE user.id_user = :id_user
			 	   	GROUP BY movie.id_movie");
		$query->bindParam(':id_user',$id_user);
		$query->execute();
		return $this->run($query);
	}

	public function limit5($id_user)
	{
		$query = $this->db->prepare("SELECT user.id_user,rating.id_rating,rating.jumlah,movie.id_movie,movie.judul,movie.cover,movie.tanggal_rilis,movie.sinopsis,movie.genre,movie.slug, AVG(rating.jumlah) as jml	
					FROM user 
					RIGHT JOIN rating ON user.id_user = rating.id_user
			 	   	RIGHT JOIN movie ON rating.id_movie = movie.id_movie
			 	   	WHERE user.id_user = :id_user
			 	   	GROUP BY movie.id_movie
			 	   	LIMIT 5");
		$query->bindParam(':id_user',$id_user);
		$query->execute();
		return $query;
	}

	public function cek($id_user)
	{
		$query = $this->db->prepare("SELECT user.id_user,rating.id_rating,rating.jumlah,movie.id_movie,movie.judul,movie.cover,movie.tanggal_rilis,movie.sinopsis,movie.genre,movie.slug, AVG(rating.jumlah) as jml	
					FROM user 
					RIGHT JOIN rating ON user.id_user = rating.id_user
			 	   	RIGHT JOIN movie ON rating.id_movie = movie.id_movie
			 	   	WHERE user.id_user = :id_user
			 	   	GROUP BY movie.id_movie
			 	   	LIMIT 5");
		$query->bindParam(':id_user',$id_user);
		$query->execute();
		return $query->rowcount();
	}

	public function single($id_user)
	{
		$query = $this->db->prepare("SELECT * FROM user WHERE id_user = :id_user");
		$query->bindParam(':id_user',$id_user);
		$query->execute();
		return $this->run($query);
	}

	public function delete($id_user)
	{
		$query = $this->db->prepare("DELETE FROM user WHERE id_user = :id_user");
		$query->bindParam(':id_user',$id_user);
		$query->execute();
		return $this->tf($query);
	}

	public function jumlah()
	{
		$query = $this->db->prepare("SELECT * FROM user");
		$query->execute();
		return $query->rowcount();
	}


}
