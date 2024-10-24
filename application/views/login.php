<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login!</title>
	<?php $this->load->view('_template/header.php'); ?>
	<style type="text/css">
		.card{
			width: 30%;
			height: 60%;
		}
		.box-login{
   			display: flex;
   			justify-content:space-between;
   			margin: 8px;
   			border-bottom: 2px solid black;
   			padding: 8px 0;
		}
		.box-login input{
			width: 95%;
   			padding: 8px 0;
   			margin: 1px;
   			background: none;
   			border: none;
   			outline: none;
   			color: black;
   			font-size: 18px;
		}
		.btn{
			margin: 1px;
			padding: 8px 0;
			width: 95%;
		}
	</style>
</head>
<body>
		<?php $this->load->view('_template/navbar.php'); ?>
	<form action="" method="post">

	<br>
	<center><div class="container">	
<div class="card text-center bg-light">
	<div class="card-header">
		Selamat Datang!
  </div>
  <div class="card-body" >
  	<table border="0px" class="container">
  	<tr>
  		<td>
  	<label>Username</label>
  </td>
</tr>
<tr>
  <td>
  	<div class="box-login">
  	<input type="text" name="username" class="form-control" placeholder="Masukan Username">
  </div>
  </td>
  <tr>
    <td>

  	<label>Password</label>
  </td>
</tr>
<tr>
  <td>
  	<div class="box-login">
  	<input type="password" name="password" class="form-control" placeholder="Masukan Password">
  </div>
  </td>
</tr>
<tr>
  <td>
  	<button type="submit" name="submit" class="btn btn-outline-primary form-control">Masuk</button>
  </div>
  </td>
</table>

  </div>
  	<div class="card-footer">
</div>
</form>
</body>
</html>