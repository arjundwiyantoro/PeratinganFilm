<?php 

class Profil Extends Db
{
	public function show()
	{
		$query = $this->db->query("SELECT * FROM profilceleb");
		return $this->run($query);
	}
	public function single($slug)
	{
		$query = $this->db->prepare("SELECT * FROM profilceleb Where slug = :slug");
		$query->bindParam(':slug',$slug);
		$query->execute();
		return $this->run($query);
	}

	public function cek($nama)
	{
		$query = $this->db->prepare("SELECT * FROM profilceleb WHERE nama = :nama");
		$query->bindParam(':nama',$nama);
		$query->execute();
		return $query->rowcount();
	}

	public function store($nama,$slug,$tanggal_lahir,$tempat_lahir,$tentang,$photo)
	{
		$query = $this->db->prepare("INSERT INTO profilceleb(nama,slug,tanggal_lahir,tempat_lahir,tentang,photo) VALUES(:nama,:slug,:tanggal_lahir,:tempat_lahir,:tentang,:photo)");
		$data = array(
				':nama'				=> $nama,
				':slug'         	=> $slug,
				':tanggal_lahir'	=> $tanggal_lahir,
				':tempat_lahir'		=> $tempat_lahir,
				':tentang'      	=> $tentang,
				':photo'        	=> $photo
			);
		$query->execute($data);
		return $this->tf($query);
	}

	public function update($id_celeb,$nama,$slug,$tanggal_lahir,$tempat_lahir,$tentang,$photo)
	{
		$query = $this->db->prepare("UPDATE profilceleb SET nama = :nama,slug = :slug,tanggal_lahir = :tanggal_lahir,tempat_lahir= :tempat_lahir,tentang = :tentang,photo = :photo WHERE id_celeb = :id_celeb");
		$data = array(
				':id_celeb'			=> $id_celeb,
				':nama'				=> $nama,
				':slug'         	=> $slug,
				':tanggal_lahir'	=> $tanggal_lahir,
				':tempat_lahir'		=> $tempat_lahir,
				':tentang'      	=> $tentang,
				':photo'			=> $photo
			);
		$query->execute($data);
		return $this->tf($query);
	}

	public function delete($id_celeb)
	{
		$query = $this->db->prepare("DELETE FROM profilceleb WHERE id_celeb = :id_celeb");
		$query->bindParam('id_celeb',$id_celeb);
		$query->execute();
		return $this->tf($query);
	}

	public function single2($id_celeb)
	{
		$query = $this->db->prepare("SELECT * FROM profilceleb Where id_celeb = :id_celeb");
		$query->bindParam(':id_celeb',$id_celeb);
		$query->execute();
		return $this->run($query);
	}

	public function borntoday()
	{
		$query = $this->db->query("SELECT * FROM profilceleb WHERE 
			MONTH(tanggal_lahir)   = MONTH(CURDATE())
  			AND DAY(tanggal_lahir) = DAY(CURDATE())");
		return $query;
	}

	public function borntoday5()
	{
		$query = $this->db->query("SELECT * FROM profilceleb WHERE 
			MONTH(tanggal_lahir)   = MONTH(CURDATE())
  			AND DAY(tanggal_lahir) = DAY(CURDATE())
  			LIMIT 5");
		return $query;
	}

	public function jumlah($slug)
	{
		$query = $this->db->prepare("SELECT * FROM profilceleb WHERE slug = :slug");
		$query->bindParam(':slug',$slug);
		$query->execute();
		return $query->rowcount();
	}

}





 ?>