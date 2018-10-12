<?php 

require_once '../core/core2.php';

$i = 0;

 ?>

<link rel="stylesheet" type="text/css" href="../plugin/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../plugin/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../plugin/jquery-ui/jquery-ui.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
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
    <h3><b><i class="fa fa-glass"></i> Celebrity > Data Celebrity</b></h3>
</header>

<table id="konten">
	<tr>
		<td style="background-color: #79abfc;color: white;" height="50px"><h4 style="margin-left: 10px;"><b>Daftar Celebrity</b></h4></td>
	</tr>
	<tr>
		<td>
			<table id="example1" class="table table-striped" style="padding-top: 20px;margin-left: 10px;padding-bottom: 20px;width: 95%;">
				<thead>
			 	<tr>
			 		<th>No</th>
			 		<th>Nama</th>
			 		<th>Tanggal Lahir</th>
			 		<th>Tentang</th>
			 		<th>cover</th>
			 		<th>Action</th>
			 	</tr>
			 	</thead>
			 	<tbody>
			 	<?php foreach($Profil->show() as $d){$i++ ?>
			 	<tr>
			 		<td><?php echo $i; ?></td>
			 		<td><?php echo $d->nama; ?></td>
			 		<td><?php echo date('j F Y',strtotime($d->tanggal_lahir)); ?></td>
			 		<td><?php echo substr($d->tentang, 0,20); ?></td>
			 		<td><img width="100px" height="80px" src="../profil/<?php echo $d->photo; ?>"></td>
			 		<td>
			 			<a class="btn btn-warning" href="admin.php?page=edit_celebrity&id_celeb=<?php echo $d->id_celeb; ?>"><i class="glyphicon glyphicon-pencil"></i> Edit</a> 
			 			<a onclick="return confirm('Anda Yakin Ingin Mendelete ?');" class="btn btn-danger" href="delete.php?page=profil&id_celeb=<?php echo $d->id_celeb; ?>"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
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
<script src="../plugin/jquery-ui/jquery-ui.js"></script>
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