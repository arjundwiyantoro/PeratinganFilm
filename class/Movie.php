<?php 


class Movie Extends Db
{
	/* ,menggunakan metode singleton pattern
	public $database;

	public function __construct()
	{
		$this->database = Db::GetInstance();
	}
	*/
	public function show()
	{
		$query = $this->db->query("SELECT movie.id_movie, movie.judul,movie.slug,movie.sinopsis, AVG(rating.jumlah) AS jml 
			FROM movie 
			LEFT JOIN rating 
			ON movie.id_movie = rating.id_movie
			GROUP BY movie.id_movie");
		return $this->run($query);
	}

	public function recomend()
	{
		$query = $this->db->query("SELECT movie.id_movie, movie.judul,movie.slug,movie.cover,movie.sinopsis, AVG(rating.jumlah) AS jml 
			FROM movie 
			LEFT JOIN rating 
			ON movie.id_movie = rating.id_movie
			GROUP BY movie.id_movie
			ORDER BY rand()
			LIMIT 4");
		return $this->run($query);
	}

	public function terbaru()
	{
		$query = $this->db->query("SELECT movie.id_movie, movie.judul,movie.slug,movie.sinopsis,movie.penulis,movie.director,movie.cover,movie.genre,movie.tanggal_rilis, AVG(rating.jumlah) AS jml 
			FROM movie 
			LEFT JOIN rating 
			ON movie.id_movie = rating.id_movie
			GROUP BY movie.id_movie
			ORDER BY movie.tanggal_rilis DESC");
		return $this->run($query);
	}

	public function diputar()
	{
		$query = $this->db->query("SELECT movie.id_movie, movie.judul,movie.slug,movie.sinopsis,movie.penulis,movie.director,movie.cover,movie.genre,movie.diputar,movie.tanggal_rilis, AVG(rating.jumlah) AS jml 
			FROM movie 
			LEFT JOIN rating 
			ON movie.id_movie = rating.id_movie
			WHERE movie.diputar = 1
			GROUP BY movie.id_movie
			ORDER BY movie.tanggal_rilis DESC");
		return $this->run($query);
	}

	public function cari2($cari)
	{
		$query = $this->db->query("SELECT movie.id_movie, movie.judul,movie.slug,movie.sinopsis,movie.penulis,movie.director,movie.cover,movie.genre,movie.diputar,movie.tanggal_rilis, AVG(rating.jumlah) AS jml 
			FROM movie 
			LEFT JOIN rating 
			ON movie.id_movie = rating.id_movie
			WHERE movie.judul LIKE '%$cari%'
			GROUP BY movie.id_movie");
		return $this->run($query);
	}

	public function carijml($cari)
	{
		$query = $this->db->query("SELECT movie.id_movie, movie.judul,movie.slug,movie.sinopsis,movie.penulis,movie.director,movie.cover,movie.genre,movie.diputar,movie.tanggal_rilis, AVG(rating.jumlah) AS jml 
			FROM movie 
			LEFT JOIN rating 
			ON movie.id_movie = rating.id_movie
			WHERE movie.judul LIKE '%$cari%'
			GROUP BY movie.id_movie");
		return $query->rowcount();
	}

	public function diputarupdate($id_movie)
	{
		$diputar = 0;
		$query = $this->db->prepare("UPDATE movie SET diputar = :diputar WHERE id_movie = :id_movie");
		$query->bindParam(':diputar', $diputar);
		$query->bindParam(':id_movie',$id_movie);
		$query->execute();
		return $this->tf($query);
	}

	public function diputarupdate2($id_movie)
	{
		$diputar = 1;
		$query = $this->db->prepare("UPDATE movie SET diputar = :diputar WHERE id_movie = :id_movie");
		$query->bindParam(':diputar', $diputar);
		$query->bindParam(':id_movie',$id_movie);
		$query->execute();
		return $this->tf($query);
	}

	public function diputarlimit($val)
	{
		$query = $this->db->query("SELECT movie.id_movie, movie.judul,movie.slug,movie.sinopsis,movie.penulis,movie.director,movie.cover,movie.genre,movie.diputar,movie.tanggal_rilis, AVG(rating.jumlah) AS jml 
			FROM movie 
			LEFT JOIN rating 
			ON movie.id_movie = rating.id_movie
			WHERE movie.diputar = 1
			GROUP BY movie.id_movie
			ORDER BY movie.tanggal_rilis DESC
			LIMIT $val");
		return $this->run($query);
	}

	public function akandatang()
	{
		$date = date('y-m-d');
		$query = $this->db->query("SELECT movie.id_movie, movie.judul,movie.slug,movie.sinopsis,movie.penulis,movie.director,movie.cover,movie.genre,movie.diputar,movie.tanggal_rilis, AVG(rating.jumlah) AS jml 
			FROM movie 
			LEFT JOIN rating 
			ON movie.id_movie = rating.id_movie
			WHERE movie.tanggal_rilis > NOW() + INTERVAL + 7 DAY AND movie.tanggal_rilis <= NOW() + INTERVAL +2 MONTH
			GROUP BY movie.id_movie
			order by movie.tanggal_rilis");
		return $this->run($query);
	}

	public function akandatanglimit($val)
	{
		$date = date('y-m-d');
		$query = $this->db->query("SELECT movie.id_movie, movie.judul,movie.slug,movie.sinopsis,movie.penulis,movie.director,movie.cover,movie.genre,movie.diputar,movie.tanggal_rilis, AVG(rating.jumlah) AS jml 
			FROM movie 
			LEFT JOIN rating 
			ON movie.id_movie = rating.id_movie
			WHERE movie.tanggal_rilis > NOW() + INTERVAL + 7 DAY AND movie.tanggal_rilis <= NOW() + INTERVAL +2 MONTH
			GROUP BY movie.id_movie
			order by movie.tanggal_rilis
			LIMIT $val");
		return $this->run($query);
	}

	public function akandatang2()
	{
		
		$query = $this->db->query("SELECT * FROM movie WHERE tanggal_rilis > NOW()");
		$query->execute();
		return $this->run($query);
	}

		public function diputarmusimini()
	{
		$date = date('y-m-d');
		$query = $this->db->query("SELECT movie.id_movie, movie.judul,movie.slug,movie.sinopsis,movie.penulis,movie.director,movie.cover,movie.genre,movie.diputar,movie.tanggal_rilis, AVG(rating.jumlah) AS jml 
			FROM movie 
			LEFT JOIN rating 
			ON movie.id_movie = rating.id_movie
			WHERE movie.tanggal_rilis > NOW() AND movie.tanggal_rilis <= NOW() + INTERVAL +14 DAY
			GROUP BY movie.id_movie
			order by movie.tanggal_rilis");
		return $this->run($query);
	}

	public function single($id_movie)
	{
		$query = $this->db->prepare("SELECT movie.id_movie, movie.judul,movie.penulis,movie.director,movie.cover, movie.sinopsis, AVG(rating.jumlah) AS jml
			FROM movie
			LEFT JOIN rating
			ON movie.id_movie = rating.id_movie
			WHERE movie.id_movie = :id_movie");
		$query->bindParam(':id_movie',$id_movie);
		$query->execute();
		return $this->run($query);

	}

	public function store($id_movie,$judul,$slug,$sinopsis,$cover,$director,$penulis,$genre,$coverbgr,$region,$tanggal_rilis,$trailer)
	{
		$query = $this->db->prepare("INSERT INTO movie(id_movie,judul,slug,sinopsis,cover,director,penulis,genre,background,region,tanggal_rilis,trailer) VALUES(:id_movie,:judul,:slug,:sinopsis,:cover,:director,:penulis,:genre,:background,:region,:tanggal_rilis,:trailer)");
		$data = array(
				'id_movie'		 => $id_movie,
				':judul'		 => $judul,
				':slug'			 => $slug,
				':sinopsis'		 => $sinopsis,
				':cover'		 => $cover,
				':director'		 => $director,
				':penulis'		 => $penulis,
				':genre'		 => $genre,
				':background'	 => $coverbgr,
				':region'		 => $region,
				':tanggal_rilis' => $tanggal_rilis,
				':trailer'		 => $trailer
			);
		$query->execute($data);
		return $this->tf($query);
	}
	/* mengunakan metode singleton pattern
	public function testampil($id_movie)
	{
		$query = $this->database->tes("SELECT * FROM movie WHERE id_movie = :id_movie");
		$query->bindParam(':id_movie',$id_movie);
		$query->execute();
		return $query->fetchObject();
	}
	*/

	public function update($id_movie,$judul,$sinopsis,$director,$penulis,$genre,$trailer,$region)
	{
		$query = $this->db->prepare("UPDATE movie SET judul = :judul,sinopsis = :sinopsis,director = :director,penulis = :penulis,genre = :genre,trailer = :trailer,region = :region WHERE id_movie = :id_movie");
		$data = array(
				'id_movie'		=> $id_movie,
				'judul'			=> $judul,
				'sinopsis'		=> $sinopsis,
				'director'		=> $director,
				'penulis'		=> $penulis,
				'genre'			=> $genre,
				'trailer'		=> $trailer,
				'region'		=> $region
			);
		$query->execute($data);
		return $this->tf($query);
	}

	public function updatecover($id_movie,$cover)
	{
		$query =  $this->db->prepare("UPDATE movie SET cover = :cover WHERE id_movie = :id_movie");
		$query->bindParam(':cover',$cover);
		$query->bindParam(':id_movie',$id_movie);
		$query->execute();
		return $this->tf($query);
	}

		public function updatecoverbgr($id_movie,$coverbgr)
	{
		$query =  $this->db->prepare("UPDATE movie SET background = :coverbgr WHERE id_movie = :id_movie");
		$query->bindParam(':coverbgr',$coverbgr);
		$query->bindParam(':id_movie',$id_movie);
		$query->execute();
		return $this->tf($query);
	}

	public function delete($id_movie)
	{
		$query = $this->db->prepare("DELETE FROM movie WHERE id_movie = :id_movie");
		$query->bindParam('id_movie',$id_movie);
		$query->execute();
		return $this->tf($query);
	}

	public function cari($term)
	{
		$query = $this->db->prepare("SELECT * FROM movie WHERE judul LIKE concat('%',:term,'%')");
		$query->bindParam(':term',$term);
		$query->execute();
		return $this->run($query);
	}

	public function show2()
	{
		$query = $this->db->query("SELECT * FROM movie");
		return $this->run($query);
	}

	public function cekno($no)
	{
		$query = $this->db->prepare("SELECT max(id_movie) as last FROM movie WHERE id_movie LIKE concat('%',:no,'%')");
		$query->bindParam(':no',$no);
		$query->execute();
		$hasil = $query->fetch();
		$last  = $hasil['last'];
		$lastno = (int) substr($last, 4,3);
		$tambah = $lastno + 1;
		$next = sprintf('%03s',$tambah);
		return $next;
	}

	public function single2($id_movie)
	{
		$query = $this->db->prepare("SELECT * FROM movie WHERE id_movie = :id_movie");
		$query->bindParam(':id_movie',$id_movie);
		$query->execute();
		return $this->run($query);
	}

	public function slug($slug)
	{
		$query = $this->db->prepare("SELECT movie.id_movie, movie.judul,movie.penulis,movie.director,movie.cover,movie.background,movie.sinopsis,movie.trailer,movie.genre,movie.tanggal_rilis, AVG(rating.jumlah) AS jml
			FROM movie
			LEFT JOIN rating
			ON movie.id_movie = rating.id_movie
			WHERE movie.slug = :slug");
		$query->bindParam(':slug',$slug);
		$query->execute();
		return $this->run($query);
	}

	public function jumlah($field,$value)
	{
		$query = $this->db->prepare("SELECT * FROM movie WHERE $field = :value");
		$query->bindParam(':value',$value);
		$query->execute();
		return $query->rowcount();
	}

	public function jumlah2()
	{
		$query = $this->db->prepare("SELECT * FROM movie");
		$query->execute();
		return $query->rowcount();
	}

	public function genre($genre)
	{
		$query = $this->db->prepare("SELECT DISTINCT movie.id_movie, movie.judul,movie.slug,movie.penulis,movie.director,movie.cover,movie.genre,movie.tanggal_rilis, movie.sinopsis,rating.id_movie,AVG(rating.jumlah) as jml
			FROM movie
			LEFT JOIN rating
			ON movie.id_movie = rating.id_movie
			WHERE movie.genre = :genre
			GROUP BY movie.id_movie ");
		$query->bindParam(':genre',$genre);
		$query->execute();
		return $query;
	}

	public function alphabet($genre)
	{
		$query = $this->db->prepare("SELECT DISTINCT movie.id_movie, movie.judul,movie.slug,movie.penulis,movie.director,movie.cover,movie.genre,movie.tanggal_rilis, movie.sinopsis,rating.id_movie,AVG(rating.jumlah) as jml
			FROM movie
			LEFT JOIN rating
			ON movie.id_movie = rating.id_movie
			WHERE movie.genre = :genre
			GROUP BY movie.id_movie
			ORDER BY movie.judul ASC");
		$query->bindParam(':genre',$genre);
		$query->execute();
		return $query;
	}

		public function urutjml($genre)
	{
		$query = $this->db->prepare("SELECT DISTINCT movie.id_movie, movie.judul,movie.slug,movie.penulis,movie.director,movie.cover,movie.genre,movie.tanggal_rilis, movie.sinopsis,rating.id_movie,AVG(rating.jumlah) as jml
			FROM movie
			LEFT JOIN rating
			ON movie.id_movie = rating.id_movie
			WHERE movie.genre = :genre
			GROUP BY movie.id_movie
			ORDER BY jml DESC");
		$query->bindParam(':genre',$genre);
		$query->execute();
		return $query;
	}

		public function uruttgl($genre)
	{
		$query = $this->db->prepare("SELECT DISTINCT movie.id_movie, movie.judul,movie.slug,movie.penulis,movie.director,movie.cover,movie.genre,movie.tanggal_rilis, movie.sinopsis,rating.id_movie,AVG(rating.jumlah) as jml
			FROM movie
			LEFT JOIN rating
			ON movie.id_movie = rating.id_movie
			WHERE movie.genre = :genre
			GROUP BY movie.id_movie
			ORDER BY movie.tanggal_rilis DESC");
		$query->bindParam(':genre',$genre);
		$query->execute();
		return $query;
	}

	public function tes($genre)
	{
		$query = $this->db->prepare("SELECT * FROM movie WHERE genre = :genre");
		$query->bindParam(':genre',$genre);
		$query->execute();
		return $this->run($query);
	}

	public function terbaik()
	{
		$query = $this->db->query("SELECT movie.id_movie, movie.judul,movie.slug,movie.sinopsis,movie.penulis,movie.director,movie.cover,movie.genre,movie.tanggal_rilis, AVG(rating.jumlah) AS jml 
			FROM movie 
			LEFT JOIN rating 
			ON movie.id_movie = rating.id_movie
			GROUP BY movie.id_movie
			ORDER BY jml DESC");
		return $this->run($query);
	}

	public function indoterbaik()
	{
		$query = $this->db->query("SELECT movie.id_movie, movie.judul,movie.slug,movie.sinopsis,movie.penulis,movie.director,movie.cover,movie.genre,movie.tanggal_rilis,movie.region, AVG(rating.jumlah) AS jml 
			FROM movie 
			LEFT JOIN rating 
			ON movie.id_movie = rating.id_movie
			WHERE movie.region = 'indonesia'
			GROUP BY movie.id_movie
			ORDER BY jml DESC");
		return $this->run($query);
	}

	public function animasiterbaik()
	{
		$query = $this->db->query("SELECT movie.id_movie, movie.judul,movie.slug,movie.sinopsis,movie.penulis,movie.director,movie.cover,movie.genre,movie.tanggal_rilis,movie.region, AVG(rating.jumlah) AS jml 
			FROM movie 
			LEFT JOIN rating 
			ON movie.id_movie = rating.id_movie
			WHERE movie.genre = 'animation'
			GROUP BY movie.id_movie
			ORDER BY jml DESC");
		return $this->run($query);
	}

	public function topboxoffice()
	{
		$query = $this->db->query("SELECT movie.id_movie, movie.judul,movie.slug,movie.sinopsis,movie.penulis,movie.director,movie.cover,movie.genre,movie.tanggal_rilis,movie.region, AVG(rating.jumlah) AS jml,detail.id_movie,detail.keuntungan
			FROM movie
			LEFT JOIN detail
			ON movie.id_movie = detail.id_movie
			LEFT JOIN rating
			ON detail.id_movie = rating.id_movie
			WHERE movie.tanggal_rilis >= curdate() - INTERVAL DAYOFWEEK(curdate())+31 DAY
			AND movie.tanggal_rilis < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY
			GROUP BY movie.id_movie
			ORDER BY detail.keuntungan DESC
			");
		return $this->run($query);
	}

	public function terbaik2()
	{
		$query = $this->db->query("SELECT movie.id_movie, movie.judul,movie.slug,movie.sinopsis,movie.penulis,movie.director,movie.cover,movie.genre,movie.tanggal_rilis,movie.region, AVG(rating.jumlah) AS jml,detail.id_movie,detail.keuntungan
			FROM movie
			LEFT JOIN detail
			ON movie.id_movie = detail.id_movie
			LEFT JOIN rating
			ON detail.id_movie = rating.id_movie
			WHERE movie.tanggal_rilis >= curdate() - INTERVAL DAYOFWEEK(curdate())+31 DAY
			AND movie.tanggal_rilis < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY
			GROUP BY movie.id_movie
			ORDER BY jml DESC
			LIMIT 6");
		return $this->run($query);
	}

	public function topboxofficelimit($val)
	{
		$query = $this->db->query("SELECT movie.id_movie, movie.judul,movie.slug,movie.sinopsis,movie.penulis,movie.director,movie.cover,movie.genre,movie.tanggal_rilis,movie.region, AVG(rating.jumlah) AS jml,detail.id_movie,detail.keuntungan
			FROM movie
			LEFT JOIN detail
			ON movie.id_movie = detail.id_movie
			LEFT JOIN rating
			ON detail.id_movie = rating.id_movie
			WHERE movie.tanggal_rilis >= curdate() - INTERVAL DAYOFWEEK(curdate())+31 DAY
			AND movie.tanggal_rilis < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY
			GROUP BY movie.id_movie
			ORDER BY detail.keuntungan DESC
			LIMIT $val
			");
		return $this->run($query);
	}

	public function laporan($tglawal,$tglakhir)
	{
		$query = $this->db->query("SELECT movie.id_movie, movie.judul,movie.slug,movie.sinopsis,movie.penulis,movie.director,movie.cover,movie.genre,movie.tanggal_rilis,movie.region, AVG(rating.jumlah) AS jml,detail.id_movie,detail.keuntungan,detail.budget
			FROM movie
			LEFT JOIN detail
			ON movie.id_movie = detail.id_movie
			LEFT JOIN rating
			ON detail.id_movie = rating.id_movie
			WHERE movie.tanggal_rilis BETWEEN '$tglawal' AND '$tglakhir'
			GROUP BY movie.id_movie");
		return $this->run($query);
	}	
}




 ?>