<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	        <?php $this->load->view('_template/header.php'); ?>	
	<title>admin</title>
	<style type="text/css">
		h5{
			text-align: center;
			font-style: initial;
		}
		.form-control{
			width: 200px;
		}
		.insearch{
			position: absolute;
		
			left: 1300px;
		}
		.tabled{
			border-top-left-radius: 10px;
		}
		.font{
			font-family: "copperplate",times,serif;
		}
	</style>
</head>
<body>
	        <?php $this->load->view('_template/menu.php'); ?>	
<br>
<div class="container">
<form action="" method="post"> 
<table class="table table-dark table-striped ">
 	<tr>
 		<th colspan="5"><h5>Kelola Fasilitas</h5></th>
 	</tr>
 	<tr>
 		<td>
 			<div class="container-fluid">

 			<a class="btn btn-outline-primary" href="<?php echo site_url('admin/admin_fasilitas/tambah'); ?>">Tambah</a>
 		</td>
 		<td>
 			<div class="insearch">
 			<div class="d-flex">
 			<input type="search" name="Search" class="form-control me-2" placeholder="search">
 			<button class="btn btn-outline-primary">Search</button>
 			</div>
 		</div>
 		</div>
 		</td>
 	</tr>
<div class="font">
 	<tr>
 		<td><strong>Nama Fasilitas</strong></td>
 		<td><strong>Keterangan</strong></td>
 		<td><strong>Image</strong></td>
 		<td></td>
 		<td><strong>Action</strong></td>
 	</tr>
 </div>
 	 	<?php
 		foreach($facilities as $faci){
 			?>
 	<tr>
 		<td><?php echo $faci->nama_fasilitas; ?></td>
 		<td><?php echo $faci->keterangan; ?></td>
 		<td><?php echo $faci->image; ?></td>
 		<td><?php empty ($faci->image) ? '' : '<i class="fa-duotone fa-check-double"></i>'; ?></td>
 		<td>
 			<div class="action">
 			<a class="btn btn-outline-warning" href="<?php echo site_url('admin/admin_fasilitas/edit/'. $faci->id_fasilitas) ?>">Ubah</a>
 			
 			<a class="btn btn-outline-primary" href="<?php echo site_url('admin/admin_fasilitas/hapus/' . $faci->id_fasilitas) ?>">Hapus</a>

 		</div>
 		</td>
 	</tr>
 <?php } ?>
</table>
</div>
</form>
   <?php $this->load->view('_template/footer.php'); ?>	
</body>
</html>