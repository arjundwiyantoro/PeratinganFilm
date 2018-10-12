<?php 


class Photo extends Db
{
	public function single($id_movie)
	{
		$query = $this->db->prepare("SELECT * FROM photo where id_movie = :id_movie");
		$query->bindParam(':id_movie',$id_movie);
		$query->execute();

		return $this->run($query);
	}

	public function single2($id_movie)
	{
		$query = $this->db->prepare("SELECT * FROM photo where id_movie = :id_movie");
		$query->bindParam(':id_movie',$id_movie);
		$query->execute();

		return $query;
	}

	public function galery()
	{
		$query = $this->db->prepare("SELECT * FROM photo ORDER BY rand() LIMIT 3");
		$query->execute();
		return $this->run($query);
	}

	public function show()
	{
		$query = $this->db->prepare("SELECT * FROM photo ORDER BY rand() LIMIT 3");
		$query->execute();
		return $query;
	}

	public function store($id_movie,$photo)
	{
		$query = $this->db->prepare("INSERT INTO photo(id_movie,photo) VALUES(:id_movie,:photo)");
		$query->bindParam(':id_movie',$id_movie);
		$query->bindParam(':photo',$photo);
		$query->execute();
	}

	public function singleid($id_photo)
	{
		$query = $this->db->prepare("SELECT * FROM photo WHERE id_photo = :id_photo");
		$query->bindParam('id_photo',$id_photo);
		$query->execute();
		return $this->run($query);
	}

	public function delete($id_photo)
	{
		$query = $this->db->prepare("DELETE FROM photo WHERE id_photo = :id_photo");
		$query->bindParam(':id_photo',$id_photo);
		$query->execute();
		return $this->tf($query);
	}
}



 ?>