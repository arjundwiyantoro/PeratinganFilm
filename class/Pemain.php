<?php 

class Pemain Extends Db
{
	public function single($id_movie)
	{
		$query = $this->db->prepare("SELECT * FROM pemain WHERE id_movie = :id_movie");
		$query->bindParam(':id_movie',$id_movie);
		$query->execute();
		return $this->run($query);
	}

	public function single2($id_movie)
	{
		$query = $this->db->prepare("SELECT * FROM pemain WHERE id_movie = :id_movie");
		$query->bindParam(':id_movie',$id_movie);
		$query->execute();
		return $query;
	}

	public function limit10($id_movie)
	{
		$query = $this->db->prepare("SELECT * FROM pemain WHERE id_movie = :id_movie LIMIT 10");
		$query->bindParam(':id_movie',$id_movie);
		$query->execute();
		return $this->run($query);
	}

	public function store($id_movie,$nama,$sebagai)
	{
		$query = $this->db->prepare("INSERT INTO pemain(id_movie,nama,sebagai) VALUES(:id_movie,:nama,:sebagai)");
		$data = array(
				'id_movie'  => $id_movie,
				'nama'		  => $nama,
				'sebagai'	  => $sebagai
			);
		$query->execute($data);
		return $this->tf($query);
	}

	public function store2($id_movie,$namas,$sebagai)
	{
		$query = $this->db->prepare("INSERT INTO pemain(id_movie,nama,sebagai) VALUES (:id_movie,:nama,:sebagai)");
		$data = array(
				'id_movie'  => $id_movie,
				'nama'		  => $namas,
				'sebagai'	  => $sebagai[$index]
			);
		$query->execute($data);
		return $this->tf($query);
	}

	public function delete($id_pemain)
	{
		$query = $this->db->prepare("DELETE FROM pemain WHERE id_pemain = :id_pemain");
		$query->bindParam(':id_pemain',$id_pemain);
		$query->execute();
		return $this->tf($query);
	}

	public function bermain($pemain)
	{
		$query = $this->db->prepare("SELECT movie.id_movie, movie.judul,movie.slug,movie.sinopsis,movie.penulis,movie.director,movie.cover,movie.genre,movie.tanggal_rilis,movie.region,pemain.nama,pemain.sebagai,pemain.id_movie,AVG(rating.jumlah) as jml
			FROM pemain 
			LEFT JOIN movie
			ON pemain.id_movie = movie.id_movie
			LEFT JOIN rating
			ON movie.id_movie = rating.id_movie
			WHERE pemain.nama = :pemain
			GROUP BY movie.id_movie
			");
		$query->bindParam(':pemain',$pemain);
		$query->execute();
		return $query;
	}



}





 ?>