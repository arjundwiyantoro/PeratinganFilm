<?php 

require_once '../core/core2.php';

$id_movie = Input::get('id_movie');

$photo = $Photo->single2($id_movie);

$i = 0;

 ?>

  <link rel="stylesheet" type="text/css" href="../plugin/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../plugin/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../plugin/datatables/jquery.dataTables.css">
<style type="text/css">
	header{
		background-color: white;
		width: 94%;
		margin-left: 30px;
	}
	#konten {
		background-color: white;
		margin-left: 30px;
		margin-top: 20px;
		width: 94%;
	}

</style>

<header class="w3-container" style="padding-top:5px;padding-bottom: 10px;">
    <h3><b><i class="fa fa-film"></i> <span style="color: #206ce8;">Movie</span> > <span style="color: #206ce8;">Galery</span> > Lihat Galery</b></h3>
</header>
<table id="konten">
	<tr>
		<td style="background-color: #79abfc;color: white;" height="50px"><h4 style="margin-left: 10px;"><b>Daftar Movie</b></h4></td>
	</tr>
	<tr>
		<td><h5 style="margin-left: 10px;"><a class="btn btn-primary" href="?page=tambah_galery&id_movie=<?php echo $id_movie; ?>"><i class="glyphicon glyphicon-plus"></i> Tambah Photo</a></h5></td>
	</tr>
	<tr>
		<td>
		 <table id="example1" class="table table-striped" style="padding-top: 20px;margin-left: 10px;padding-bottom: 20px;width: 95%;">
		 	<thead>
		 		<tr>
		 			<th>No</th>
		 			<th>Photo</th>
		 			<th>Aksi</th>
		 		</tr>
		 	</thead>
		 	<tbody>
		 		<?php while($d = $photo->fetchObject()){$i++ ?>
		 		<tr>
		 			<td><?php echo $i; ?></td>
		 			<td><img width="250px" height="180px" src="../photo/<?php echo $d->photo; ?>"></td>
		 			<td><a class="btn btn-danger" href="delete.php?page=galery&id_photo=<?php echo $d->id_photo; ?>"><i class="glyphicon glyphicon-trash"></i> Delete</a></td>
		 		</tr>
		 		<?php } ?>
		 	</tbody>
		 </table>
	 	</td>
	 </tr>
</table>

 <script src="../plugin/js/jquery1.js"></script>
<script src="../plugin/bootstrap/js/bootstrap.js"></script>
<script src="../plugin/datatables/dataTables.bootstrap.js"></script>
<script src="../plugin/datatables/jquery.dataTables.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#example1').DataTable({
      "bLengthChange": false,
      "bAutoWidth": false,
      "bInfo": false,
      "bFilter": false,
    });
  });
</script>

