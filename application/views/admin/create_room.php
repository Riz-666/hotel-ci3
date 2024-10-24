<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
		        <?php $this->load->view('_template/header.php'); ?>	
		        <style type="text/css">
		        	.card-header{
		        		font-size: 30px;
		        	}
		        </style>
</head>
<body>
	<?php $this->load->view('_template/menu.php'); ?>	
	<form action="<?php echo site_url(). '/admin/admin_room/tambah_data' ?>" method="post" enctype="multipart/form-data">

		        <br>
		        <div class="container">
<div class="card text-center">
  <div class="card-header">
<strong>Input Kamar</strong>
  </div>
<table class="table table-light table-hover">
	<tr>
		<th><label>Tipe Kamar</label></th>
		<td><input type="text" name="tipe_kamar" class="form-control"></td>
	</tr>
	<tr>
		<th><label>Jumlah Kamar</label></th>
		<td><input type="number" name="jumlah_kamar" class="form-control"></td>
	</tr>
	<tr>
		<th><label>Fasilitas Kamar</label></th>
		<td><input type="text" name="fasilitas_kamar" class="form-control"></td>
	</tr>
	<tr>
		<th><label>Harga Sewa</label></th>
		<td><input type="text" name="harga_sewa" class="form-control"></td>
	</tr>
	<tr>
		<td><label>Image</label></td>
		<td><input type="file" name="image" class="form-control" ></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" class="btn btn-outline-dark form-control" value="Tambah"></td>
	</tr>
</table>
  </div>
</div>
</div>
   <?php $this->load->view('_template/footer.php'); ?>	
</body>
</html>