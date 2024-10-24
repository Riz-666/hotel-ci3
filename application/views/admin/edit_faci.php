<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
		        <?php $this->load->view('_template/header.php'); ?>	
</head>
<body>
	        <?php $this->load->view('_template/menu.php'); ?>	
<form action="<?php echo site_url('admin/admin_fasilitas/edit_data'); ?>" method="post">
<div class="container">
	<table class="table table-dark">
				<?php foreach ($facilities as $faci) { ?>
		<tr>
			<td>
				<input type="hidden" name="id_fasilitas" value="<?php echo $faci->id_fasilitas; ?>">

				<input type="text" name="nama_fasilitas" value="<?php echo $faci->nama_fasilitas; ?>">
			</td>
			<td>
				<input type="text" name="keterangan" value="<?php echo $faci->keterangan; ?>">
			</td>
			<td>
				<input type="file" name="image" class="form-control">
			</td>			
			<td>
				<img src="<?= base_url('/upload/facilities/'.$faci->image) ?>" class="img-thumbnail my-1" style="width: 120px;">
			</td>
		</tr>
			<td colspan="5">
				<input type="submit" name="submit" class="form-control" value="Edit">
			</td>
		</tr>
		<?php } ?>
	</table>

</div>
</form>
   <?php $this->load->view('_template/footer.php'); ?>
</body>
</html>