<?php 

class Watchlist Extends Db
{
	public function single($id_user)
	{
		$query = $this->db->prepare("SELECT * FROM watchlist WHERE id_user = :id_user");
		$query->bindParam(':id_user',$id_user);
		$query->execute();
		return $this->run($query);
	}

	public function store($id_user,$id_movie)
	{
		$query = $this->db->prepare("INSERT INTO watchlist(id_user,id_movie) VALUES(:id_user,:id_movie)");
		$data = array(
				':id_user'		=> $id_user,
				':id_movie' 	=> $id_movie
			);
		$query->execute($data);
		return $this->tf($query);
	}

		public function tes2($id_user)
	{
		$query = $this->db->prepare("SELECT watchlist.id_movie,movie.id_movie,movie.judul,movie.slug,movie.sinopsis,movie.director,movie.penulis,movie.cover,movie.tanggal_rilis,movie.genre, rating.jumlah,AVG(rating.jumlah) AS jml
			FROM watchlist
		  	LEFT JOIN movie ON watchlist.id_movie = movie.id_movie
		  	LEFT JOIN rating ON movie.id_movie    = rating.id_movie
		  	WHERE watchlist.id_user = :id_user
		  	GROUP BY movie.id_movie");
		$query->bindParam(':id_user',$id_user);
		$query->execute();
		return $this->run($query);
	}

	public function limit4($id_user)
	{
		$query = $this->db->prepare("SELECT watchlist.id_movie,movie.id_movie,movie.judul,movie.sinopsis,movie.director,movie.penulis,movie.cover,movie.tanggal_rilis,movie.genre, rating.jumlah,AVG(rating.jumlah) AS jml
			FROM watchlist
		  	LEFT JOIN movie ON watchlist.id_movie = movie.id_movie
		  	LEFT JOIN rating ON movie.id_movie    = rating.id_movie
		  	WHERE watchlist.id_user = :id_user
		  	GROUP BY movie.id_movie
		  	LIMIT 4");
		$query->bindParam(':id_user',$id_user);
		$query->execute();
		return $query;
	}

	public function cek($id_user,$id_movie)
	{
		$query = $this->db->prepare("SELECT * FROM watchlist WHERE id_user = :id_user AND id_movie = :id_movie ");
		$query->bindParam(':id_user',$id_user);
		$query->bindParam(':id_movie',$id_movie);
		$query->execute();
		return $query->rowcount();
	}

	public function cek2($id_user)
	{
		$query = $this->db->prepare("SELECT * FROM watchlist WHERE id_user = :id_user");
		$query->bindParam(':id_user',$id_user);
		$query->execute();
		return $query->rowcount();
	}

	public function delete($id_movie,$id_user)
	{
		$query = $this->db->prepare("DELETE FROM watchlist WHERE id_movie = :id_movie AND id_user = :id_user");
		$query->bindParam(':id_movie',$id_movie);
		$query->bindParam(':id_user',$id_user);
		$query->execute();
		return $this->tf($query);
	}

}



 ?>