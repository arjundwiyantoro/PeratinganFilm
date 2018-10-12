<?php 

class Ratting extends Db
{
	public function store($id_movie,$id_user,$jumlah,$review,$username,$tanggal)
	{
		$query = $this->db->prepare("INSERT INTO rating(id_movie,id_user,jumlah,review,username,tanggal) VALUES(:id_movie,:id_user,:jumlah,:review,:username,:tanggal)");
		$data = array(
				':id_movie'  => $id_movie,
				':id_user'   => $id_user,
				':jumlah'    => $jumlah,
				':review'    => $review,
				':username'  => $username,
				':tanggal'   => $tanggal
			);
		$query->execute($data);
		return $this->tf($query);
	}

	public function update()
	{
		$query = $this->db->prepare("UPDATE rating SET id_movie = :id_movie,id_user = :id_user,jumlah = :jumlah,tanggal = :tanggal WHERE id_rating = :id_rating");
		$data = array(
				':id_movie' => $id_movie,
				':id_user'  => $id_user,
				':jumlah'   => $jumlah,
				':tanggal'	=> $tanggal,
				':id_rating' => $id_rating
			);
		$query->execute($data);
		return $this->run($query);
	}

	public function single($id_movie)
	{
		$query = $this->db->prepare("SELECT * FROM rating WHERE id_movie = :id_movie LIMIT 7");
		$query->bindParam(':id_movie',$id_movie);
		$query->execute();
		return $this->run($query);
	}

	public function single2($id_movie)
	{
		$query = $this->db->prepare("SELECT * FROM rating WHERE id_movie = :id_movie LIMIT 7");
		$query->bindParam(':id_movie',$id_movie);
		$query->execute();
		return $query;
	}

	public function jumlah($id_movie)
	{
		$query = $this->db->prepare("SELECT * FROM rating WHERE id_movie = :id_movie");
		$query->bindParam(':id_movie',$id_movie);
		$query->execute();
		return $query->rowcount();
	}

	public function editsingle($id_user,$id_movie)
	{
		$query = $this->db->prepare("SELECT * FROM rating WHERE id_user = :id_user AND id_movie = :id_movie");
		$query->bindParam(':id_user',$id_user);
		$query->bindParam(':id_movie',$id_movie);
		$query->execute();
		return $this->run($query);
	}

	public function cekkomen($id_user,$id_movie)
	{
		$query = $this->db->prepare("SELECT * FROM rating WHERE id_user = :id_user AND id_movie = :id_movie");
		$query->bindParam(':id_user',$id_user);
		$query->bindParam(':id_movie',$id_movie);
		$query->execute();
		if($query->rowcount() != 0){
			return true;
		}else{
			return false;
		}
		
	}

	public function jumlah1()
	{
		$query = $this->db->prepare("SELECT * FROM rating");
		$query->execute();
		return $query->rowcount();
	}

	public function diatas7()
	{
		$query = $this->db->prepare("SELECT * FROM rating WHERE jumlah >= 7");
		$query->execute();
		return $query->rowcount();
	}

	public function diatas4()
	{
		$query = $this->db->prepare("SELECT * FROM rating WHERE jumlah > 4 AND jumlah < 7");
		$query->execute();
		return $query->rowcount();
	}

	public function diatas0()
	{
		$query = $this->db->prepare("SELECT * FROM rating WHERE jumlah <= 4");
		$query->execute();
		return $query->rowcount();
	}

	public function terbaru()
	{
		$query = $this->db->prepare("SELECT * FROM rating ORDER BY id_rating DESC LIMIT 2");
		$query->execute();
		return $this->run($query);
	}

	public function singlerating($id_user)
	{
		$query = $this->db->prepare("SELECT movie.id_movie,movie.cover,movie.judul,rating.id_movie,rating.id_user,rating.tanggal,rating.review
			FROM rating
			LEFT JOIN movie
			ON rating.id_movie = movie.id_movie
			WHERE rating.id_user = :id_user
			ORDER BY rating.id_rating DESC
			LIMIT 1");
		$query->bindParam(':id_user',$id_user);
		$query->execute();
		return $query;
	}

	public function delete($id_rating)
	{
		$query = $this->db->prepare("DELETE FROM rating WHERE id_rating = :id_rating");
		$query->bindParam(':id_rating',$id_rating);
		$query->execute();
		return $this->tf($query);
	}
}






 ?>