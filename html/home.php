<?php  

include 'config.php';

?>
<!doctype html>
	<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

		<!-- link for icon -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

		<!-- Option 1: Bootstrap Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

		<style type="text/css">
			#header{
				background: url("https://images.unsplash.com/photo-1519638617638-c589a8ba5b76?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1031&q=80");
				background-repeat: no-repeat;
				background-attachment: fixed;
				background-size: 100% 100%;
				color: white;
			}
		</style>

		<title>Laundry Aini</title>
	</head>
	<body>
		
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<div class="container-fluid">
				<a class="navbar-brand" href="#"><i>Aini Laundry</i></a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="home.php">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#Paket">Layanan</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#List">Harga</a>
						</li>
					</ul>
					<ul class="navbar-nav mb-2 mb-lg-0">
					<?php if (isset($_SESSION['id'])): ?>
						<li class="nav-item">
							<a href="#!" class="nav-link">Hallo</a>
						</li>
						<li class="nav-item">
							<a href="order.php" class="nav-link"><i class="fas fa-shopping-cart"></i></a>
						</li>
						<li class="nav-item">
							<a href="logout.php" class="btn btn-danger">Log Out</i></a>
						</li>
					<?php else: ?>
						<a href="login.php" class="btn btn-primary me-2">Login</a>
					<?php endif ?>
					</ul>
				</div>
			</div>
		</nav>

		<section id="header">
			<div class="container-fluid vh-100" style="background: rgba(0, 0, 0, 0.7);padding-top: 200px;">
				<div class="text-center">
					<h1 class="display-3"><i>Aini Laundry</i></h1>
					<p>Cuci Karpet Tercepat Terbersih dan Terapi di Indonesia</p>
					<a href="#Paket" class="btn btn-outline-light fw-bold my-5">Pilih Paket</a>
				</div>
			</div>
		</section>
		<section id="Paket">
			<div class="container py-5">
				<div class="text-center my-5">
					<h1 class="display-3">Pilih Paket</h1>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="card">
							<img src="https://biaya.info/wp-content/uploads/2021/09/laundry-karpet-678x381.jpg" class="card-img-top" alt="..." style="max-height: 350px;">
							<div class="card-body">
								<h5 class="card-title">Paket Kilat</h5>
								<p class="card-text">Cuci bersih karpet hanya dalam waktu 1 hari saja</p>
							</div>
							<div class="card-footer text-center">
								<a href="pesan.php?id=1" class="btn btn-primary px-5" >Pilih Paket</a>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="card">
							<img src="https://biaya.info/wp-content/uploads/2021/09/laundry-karpet-678x381.jpg" class="card-img-top" alt="..." style="max-height: 350px;">
							<div class="card-body">
								<h5 class="card-title">Paket Reguler</h5>
								<p class="card-text">Cuci bersih karpet dalam waktu 3 hari</p>
							</div>
							<div class="card-footer text-center">
								<a href="pesan.php?id=2" class="btn btn-primary px-5" >Pilih Paket</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section id="List" class="bg-light">
			<div class="container py-5">
				<div class="text-center my-5">
					<h1 class="display-3">List Harga</h1>
				</div>
				<table class="table table-bordered">
					<thead class="table-dark">
						<tr class="text-center">
							<th scope="col">Jenis Karpet</th>
							<th scope="col">Paket Kilat</th>
							<th scope="col">Paket Reguler</th>
						</tr>
					</thead>
					<tbody>
						<tr class="text-center">
							<td>Tipis</td>
							<td>Rp 33.000/m2</td>
							<td>Rp 16.500/m2</td>
						</tr>
						<tr class="text-center">
							<td>Standard</td>
							<td>Rp 39.000/m2</td>
							<td>Rp 19.500/m2</td>
						</tr>
						<tr class="text-center">
							<td>Medium</td>
							<td>Rp 43.000/m2</td>
							<td>Rp 21.500/m2</td>
						</tr>
						<tr class="text-center">
							<td>Super</td>
							<td>Rp 55.000/m2</td>
							<td>Rp 27.500/m2</td>
						</tr>
					</tbody>
				</table>
			</div>
		</section>

		<footer class="bg-dark text-center text-muted py-3">
			Dibuat Oleh Aini
		</footer>

	</body>
	</html>