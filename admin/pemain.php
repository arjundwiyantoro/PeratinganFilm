<?php 

require_once '../core/core2.php';



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
    <h3><b><i class="fa fa-film"></i> <span style="color: #206ce8;">Movie</span> > Pemain</b></h3>
</header>
<table id="konten">
	<tr>
		<td style="background-color: #79abfc;color: white;" height="50px"><h4 style="margin-left: 10px;"><b>Daftar Movie</b></h4></td>
	</tr>
	<tr>
		<td>
			<table id="example1" class="table table-striped" style="padding-top: 20px;margin-left: 10px;padding-bottom: 20px;width: 95%;">
			<thead>
			 	<tr>
			 		<th>Id Movie</th>
			 		<th>Judul</th>
			 		<th>Genre</th>
			 		<th>Tanggal Rilis</th>
			 		<th>cover</th>
			 		<th>action</th>
			 	</tr>
			 </thead>
			 <tbody>
			 	<?php foreach($Movie->show2() as $d){ ?>
			 	<tr>
			 		<td><?php echo $d->id_movie; ?></td>
			 		<td><?php echo $d->judul; ?></td>
			 		<td><?php echo $d->genre; ?></td>
			 		<td><?php echo $d->tanggal_rilis; ?></td>
			 		<td><img width="100px" height="80px" src="../cover/<?php echo $d->cover; ?>"></td>
			 		<td><a class="btn btn-primary" href="?page=lihat_pemain&id_movie=<?php echo $d->id_movie; ?>"><i class="glyphicon glyphicon-eye-open"></i> Lihat Pemain</a></td>
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