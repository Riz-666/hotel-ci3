<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head> 
    <?php $this->load->view('_template/header.php'); ?>
	<title>HOTEL 666</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/style/style.css">
</head>
<body>
	    <div>
        <?php $this->load->view('_template/navbar.php'); ?>	
<div id="container">
	<br>
<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo base_url(); ?>assets/img/banner1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="<?php echo base_url(); ?>assets/img/banner2.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="<?php echo base_url(); ?>assets/img/banner3.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
  <br>

			<form class="container" method="POST" action="">
<div class="form-row">
<div class="col">
	<tr>
		<td><label for="check_in">Check In</label></td>
			<td>
				<input type="date" class="form-control datepicker" id="tgl_check_in" name="tgl_check_in" />
			</td>
	</tr>
</div>
<div class="col">
	<tr>
		<td>
			<label for="check_out">Check Out</label>
		</td>
		<td>
			<input type="date" class="form-control datepicker" id="tgl_check_out" name="tgl_check_out" />
		</td>
	</tr>
</div>
<div class="col">
		<tr>
			<td>
				<label for="jml_kamar">Jumlah Kamar</label>
			</td>
				<td>
					<input type="number" onKeyPress="if(this.value.length==2 && event.keyCode!=[8,46]) return false;" class="form-control" id="jumlah_kamar" name="jumlah_kamar" />
				</td>
		</tr>
	</div>
<div class="col">
<tr>
	<td></td>
		<td>
			<button id="show" type="button" class="btn btn-outline-dark" style="margin: 2.3em auto;">Pesan</button>
		</td>
</tr>
</div>
</div>
<br>
<br />
			<div id="pemesanan" class="container border">
				<h1>Form Pemesanan</h1>
	<div class="container">
			<div class="row">
	<div class="col">
		<div class="form-group">
		<input type="hidden" class="form-control" name="id_pemesanan" placeholder="Nama Pesanan"/>
			
			<label for="nama_pemesan">Nama Pemesan</label>
				<input type="text" class="form-control" name="nama_pemesan" placeholder="Nama Pesanan" required maxlength="50" />
			<div class="invalid-feedback"></div>
	</div>
		<div class="form-group">
			<label for="email">Email</label>
				<input type="email" class="form-control" aria-describedby="emailHelp" name="email" placeholder="Email" required maxlength="60" />
			<div class="invalid-feedback"></div>
		</div>
	<div class="form-group">
			<label for="contact">No. Hp</label>
		<input type="number" class="form-control" name="no_hp" placeholder="No Telepon" required maxlength="16"/>
			<div class="invalid-feedback"></div>
				</div>
		</div>
			<div class="col border-left">
		<div class="form-group">
			<label for="nama_tamu">Nama Tamu</label>
				<input type="text" class="form-control" name="nama_tamu" placeholder="Nama Tamu" required maxlength="50" />
					<div class="invalid-feedback"></div>
		</div>
			<div class="form-group">
				<label for="tipe_kamar">Tipe Kamar</label>
					<select name="id_kamar" id="id_kamar" class="form-control" required>
					<option value="">Tidak Di Pilih</option>
					<?php foreach ($rooms as $row) {  ?>
						<option value="<?= $row->id_kamar; ?>"><?= $row->tipe_kamar; ?></option>
					<?php } ?>
					</select>
			<div class="invalid-feedback"></div>
		</div>
				<input type="text" class="d-none" id="harga_sewa" name="harga_sewa" />
			<input type="text" class="d-none" id="total_hari" name="total_hari" />
		<div class="form-group">
			<label for="nama_tamu">Estimasi Biaya</label>
				<input type="text" class="form-control" id="estimasi_biaya" name="estimasi_biaya" required readonly />
					<div class="invalid-feedback"></div>
	</div>

			</div>
		</div>
	<div>
				<button type="submit" id="konfirmasi" value="kirim" class="btn btn-outline-info btn-block" style="margin: 3.3em auto;">Konfirmasi Pesanan</button>
		</div>

					</div>
				</div>
 <div id="tentang">
 	<center><h1>Tentang Kami</h1></center>
 	<p style="text-align: justify;">
 		Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
 	</p>
</div>
 </div>
</div>
   <?php $this->load->view('_template/footer.php'); ?>	
   <script type="text/javascript">
   		$(function(){
   			$('#pemesanan').hide();
   			$('#show').on('click',function(){
   				$('#show').hide();
   				$('#tentang').hide();
   				$('#pemesanan').show();
   			});
   		});

$(document).ready(() => {

function jumlahDate(tgl_check_in, tgl_check_out) {
const d1 = new Date(tgl_check_in)
const d2 = new Date(tgl_check_out)
var d1Time = d1.getTime();
var d2Time = d2.getTime();
// Checkin Kurang Dari Checkout adalah Benar Maka return 0
if (d1Time < d2Time) {
return 0
} else {
return 1
}
}

function getBulan(bulan) {
var bulanArr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
const bulanFix = bulanArr[bulan];
if (bulanFix > 9) {
return bulanFix
} else {
return '0' + bulanFix
}

}

function getTanggal(tanggal) {
if (tanggal > 9) {
return tanggal
} else {
return '0' + tanggal
}
}

var d = new Date();
var checkmin = d.getFullYear() + '-' + getBulan(d.getMonth()) + '-' + getTanggal(d.getDate());


$('#tgl_check_in').attr('min', checkmin);
$('#tgl_check_out').attr('min', checkmin);

$('#konfirmasi').click(() => {
tglcheckout = $('#tgl_check_out').val()
tglcheckin = $('#tgl_check_in').val()
if (jumlahDate(tglcheckin, tglcheckout)) {
$('#checkout').val('');
}
})

$('#tgl_check_out').click(() => {
if ($('#tgl_check_in').val()) {
haricheckin = $('#tgl_check_in').val()
$('#tgl_check_out').attr('min', haricheckin)

}
})

$('#Pesan').on('show.bs.modal', () => {
$.ajax({
type: 'post',
url: '<?= site_url('Ajax/Pesan') ?>',
data: "data=" + JSON.stringify({
checkin: $('#tgl_check_in').val(),
checkout: $('#tgl_check_out').val(),
jumlahkamar: $('#jumlahkamar').val()
}),
success: (data) => {
$('.modal-data').html(data);
}

})
})
})
</script>
</body>
</html>