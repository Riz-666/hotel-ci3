<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<?php $this->load->view('_template/header.php'); ?>	
</head>
<body>	
<div class="container">
	<br>
	<center><h1>Data Pemesanan</h1></center>
	<table class="table table-dark table-hover">
  <thead>
		<tr>
			<th>#</th>
			<th>Nama Tamu</th>
			<th>Nama Pemesanan</th>
			<th>Tgl Pemesanan</th>
			<th>Check In</th>
			<th>Check Out</th>
			<th>Jumlah Kamar</th>
			<th>Tipe Kamar</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
  </thead>
  <tbody>

		<tr>
			<?php $no=1; foreach($reservation as $reser) { ?>
			<td><?php echo $no++ ?></td>
			<td><?php echo $reser->nama_tamu ?></td>
			<td><?php echo $reser->nama_pemesan ?></td>
			<td><?php echo $reser->tgl_pemesanan ?></td>
			<td><?php echo $reser->tgl_check_in ?></td>
			<td><?php echo $reser->tgl_check_out ?></td>
			<td><?php echo $reser->jumlah_kamar ?></td>
			<td><?php echo $reser->tipe_kamar ?></td>
			<td>
			<?php
			switch ($reser->status){
				case 1:
				echo 'Booked';
				break;
				case 2:
				echo 'Check In';
				break;
				case 3:
				echo 'Check Out';
				break;
				case 4:
				echo 'Canceled';
				break;
			}
			?>


			</td>
<td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalView" data-id="<?php echo $reser->id_pemesanan ?>" data-idkamar="<?php echo $reser->id_kamar ?>">
  Lihat
</button></td>
</tr>
<?php } ?>	
<!-- Modal -->
<div class="modal fade" id="modalView" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      	<h1>Detail</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      	<div id="modal-data">
      		
      	</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

  </tbody>
</table>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#modalView').on('show.bs.modal', function(event){
			var getId = $(event.relatedTarget).data('id');
			var getIdkamar = $(event.relatedTarget).data('idkamar');

			$.ajax({
				type:'post',
				url: '<?= site_url('receptionist/reservation/ajaxPemesanan') ?>',
				data:'getId='+ JSON.stringify({id_reser:getId}),
				success: function (data){
					$('#modal-data').html(data)
				}
			})
		})
	})
</script>

</body>

</html>