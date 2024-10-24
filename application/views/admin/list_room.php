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
	</style>
</head>
<body>
	        <?php $this->load->view('_template/menu.php'); ?>	
<br>
<div class="container">
<form action="" method="post"> 
<table class="table table-dark table-striped ">
 	<tr>
 		<th colspan="5"><h5>Kelola Kamar</h5></th>
 	</tr>
 	<tr>
 		<td>
 			<div class="container-fluid">

 			<a class="btn btn-outline-primary" href="<?php echo site_url('admin/admin_room/tambah'); ?>">Tambah</a>
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

 	<tr>
 		<td>Tipe Kamar</td>
 		<td>Jumlah Kamar</td>
 		<td>Harga Sewa</td>
 		<td>Image</td>
 		<td>Action</td>
 	</tr>
 	 	<?php
 		foreach($rooms as $room){
 			?>
 	<tr>
 		<td><?php echo $room->tipe_kamar; ?></td>
 		<td><?php echo $room->jumlah_kamar; ?></td>
 		<td><?php echo $room->harga_sewa; ?></td>
 		<td><?php echo $room->image; ?></td>
 		<td>
 			<div class="action">
 			<a class="btn btn-outline-warning" href="<?php echo site_url('admin/admin_room/edit/'. $room->id_kamar) ?>">Ubah</a>
 			
 			<a class="btn btn-outline-primary" href="<?php echo site_url('admin/admin_room/hapus/' . $room->id_kamar) ?>">Hapus</a>

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