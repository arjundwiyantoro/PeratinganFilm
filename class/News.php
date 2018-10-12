<?php 

class News Extends Db
{
	public function rand4()
	{
		$query = $this->db->query("SELECT * FROM news order by rand() LIMIT 4");
		return $this->run($query);
	}
	public function show()
	{
		$query = $this->db->query("SELECT * FROM news");
		return $this->run($query);
	}
	public function news2()
	{
		$query = $this->db->query("SELECT * FROM news order by id_news LIMIT 2");
		return $this->run($query);
	}
	public function rand3()
	{
		$query = $this->db->query("SELECT * FROM news order by rand() LIMIT 3");
		return $this->run($query);
	}
	public function limit($val)
	{
		$query = $this->db->query("SELECT * FROM news LIMIT $val");
		return $this->run($query);
	}
	public function terbaru()
	{
		$query = $this->db->query("SELECT * FROM news ORDER BY tanggal DESC");
		return $this->run($query);
	}
	public function single($slug)
	{
		$query = $this->db->prepare("SELECT * FROM news WHERE slug = :slug");
		$query->bindParam(':slug',$slug);
		$query->execute();
		return $this->run($query);
	}
	public function singleid($id_news)
	{
		$query = $this->db->prepare("SELECT * FROM news WHERE id_news = :id_news");
		$query->bindParam(':id_news',$id_news);
		$query->execute();
		return $this->run($query);
	}
	public function paging()
	{
		$perPage = 8;
		$page 	 = isset($_GET["halaman"]) ? (int)$_GET["halaman"]: 1;
		$start	 = ($page > 1) ? ($page * $perPage) - $perPage : 0;
		$query = $this->db->query("SELECT * FROM news ORDER BY tanggal DESC LIMIT $start, $perPage ");
		return $this->run($query);
	}
	public function jumlah()
	{
		$query = $this->db->prepare("SELECT * FROM news");
		$query->execute();
		return $query->rowcount();
	
	}
	public function store($judul,$slug,$tanggal,$isi,$image)
	{
		$query = $this->db->prepare("INSERT INTO news(judul,slug,tanggal,isi,image) VALUES(:judul,:slug,:tanggal,:isi,:image)");
		$data = array(
				':judul' => $judul,
				':slug' => $slug,
				':tanggal' => $tanggal,
				':isi' => $isi,
				':image' => $image
			);
		$query->execute($data);
		return $this->tf($query);
	}
	public function update($id_news,$judul,$slug,$isi,$image)
	{
		$query = $this->db->prepare("UPDATE news SET judul = :judul,slug = :slug,isi = :isi,image = :image WHERE id_news = :id_news");
		$data = array(
				':id_news' => $id_news,
				':judul' => $judul,
				':slug'  => $slug,
				':isi' => $isi,
				':image' => $image
			);
		$query->execute($data);
		return $this->tf($query);
	}
	public function delete($id_news)
	{
		$query = $this->db->prepare("DELETE FROM news WHERE id_news = :id_news");
		$query->bindParam(':id_news',$id_news);
		$query->execute();
		return $this->tf($query);
	}
}




 ?>