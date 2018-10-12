<?php 


class Komen extends db
{
	public function single($id_news)
	{
		$query = $this->db->prepare("SELECT komen.id_user,komen.komen,komen.tanggal,user.id_user,user.nama,user.profil FROM komen
			LEFT JOIN user
			ON komen.id_user = user.id_user
			WHERE komen.id_news = '$id_news'");
		$query->bindParam(':id_news',$id_news);
		$query->execute();
		return $query;
	}

	public function store($id_news,$id_user,$komen,$tanggal)
	{
		$query = $this->db->prepare("INSERT INTO komen(id_news,id_user,komen,tanggal) VALUES(:id_news,:id_user,:komen,:tanggal)");
		$data = array(
				':id_news' => $id_news,
				':id_user' => $id_user,
				':komen'   => $komen,
				':tanggal' => $tanggal
			);
		$query->execute($data);
		return $this->tf($query);
	}

	
}



 ?>