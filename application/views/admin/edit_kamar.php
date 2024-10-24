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
<form action="<?php echo site_url('admin/admin_room/edit_data') ?>" method="post">
<div class="container">
	<table class="table table-light">
				<?php foreach ($rooms as $room) { ?>
		<tr>
			<td>
				<input type="hidden" name="id_kamar" value="<?php echo $room->id_kamar; ?>">
				
				<input type="text" name="tipe_kamar" value="<?php echo $room->tipe_kamar; ?>">
			</td>
			<td>
				<input type="text" name="jumlah_kamar" value="<?php echo $room->jumlah_kamar; ?>">
			</td>
			<td>
				<input type="text" name="harga_sewa" value="<?php echo $room->harga_sewa; ?>">
			</td>

			<td>
				<input type="file" name="image" class="form-control" placeholder="">
			</td>			
			<td>
				<img src="<?= base_url('upload/rooms/'. $room->image) ?>" class="img-thumbnail my-1" style="width: 120px;">
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