<?php 

require_once '../core/core2.php';

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
    <h3><b><i class="fa fa-film"></i> <span style="color: #206ce8;">Movie</span> > Data Movie</b></h3>
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
			 		<th>No</th>
			 		<th>Id Movie</th>
			 		<th>Judul</th>
			 		<th>Genre</th>
			 		<th>Tanggal Rilis</th>
			 		<th>Cover</th>
			 		<th>Action</th>
			 	</tr>
			 </thead>
			 <tbody>
			 	<?php foreach($Movie->show2() as $d){$i++ ?>
			 	<tr>
			 		<td><?php echo $i; ?></td>
			 		<td><?php echo $d->id_movie; ?></td>
			 		<td><a target="_blank" href="../tittle.php?m=<?php echo $d->slug; ?>"><?php echo $d->judul; ?></a></td>
			 		<td><?php echo ucfirst($d->genre); ?></td>
			 		<td><?php echo date("j F Y", strtotime($d->tanggal_rilis)); ?></td>
			 		<td><img width="100px" height="80px" src="../cover/<?php echo $d->cover; ?>"></td>
			 		<td>
			 		<a class="btn btn-warning" href="admin.php?page=edit_movie&id_movie=<?php echo $d->id_movie; ?>"><i class="glyphicon glyphicon-pencil"></i> Edit</a> 
			 		<a onclick="return confirm('Anda Yakin Ingin Mendelete ?');" class="btn btn-danger" href="delete.php?page=movie&id_movie=<?php echo $d->id_movie; ?>"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
			 		</td>
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
      "bInfo": true,
      "bFilter": true,
    });
  });
</script>