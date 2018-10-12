<?php 

class Detail Extends Db
{
	public function single($id_movie)
	{
		$query = $this->db->prepare("SELECT * FROM detail where id_movie = :id_movie");
		$query->bindParam(':id_movie',$id_movie);
		$query->execute();

		return $this->run($query);
	}

	public function store($id_movie,$negara,$bahasa,$runtime,$budget,$keuntungan)
	{
		$query = $this->db->prepare("INSERT INTO detail(id_movie,negara,bahasa,runtime,budget,keuntungan) VALUES(:id_movie,:negara,:bahasa,:runtime,:budget,:keuntungan)");
		$data = array(
				':id_movie' => $id_movie,
				':negara'	=> $negara,
				':bahasa'	=> $bahasa,
				':runtime'	=> $runtime,
				':budget'	=> $budget,
				':keuntungan' => $keuntungan
			);
		$query->execute($data);
		return $this->tf($query);
	}

	public function update($id_movie,$negara,$bahasa,$runtime,$budget,$keuntungan)
	{
		$query = $this->db->prepare("UPDATE detail SET negara = :negara,bahasa = :bahasa,runtime = :runtime,budget = :budget,keuntungan = :keuntungan WHERE id_movie = :id_movie");
		$data = array(
				':id_movie' => $id_movie,
				':negara'	=> $negara,
				':bahasa'	=> $bahasa,
				':runtime'	=> $runtime,
				':budget'	=> $budget,
				':keuntungan' => $keuntungan
			);
		$query->execute($data);
		return $this->tf($query);
	}

	public function delete($id_movie)
	{
		$query = $this->db->prepare("DELETE FROM detail WHERE id_movie = :id_movie");
		$query->bindParam(':id_movie',$id_movie);
		$query->execute();
		return $this->tf($query);
	}
}



 ?>