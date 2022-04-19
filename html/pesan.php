<?php  

include 'config.php';

if (!isset($_SESSION['id'])) {
	header('Location:login.php');
}

$id = $_GET['id'];

$user_id = $_SESSION['id'];

if (isset($_POST['pesan'])) {
	
	order($_POST);

}

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
							<a class="nav-link" href="home.php#Paket">Layanan</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="home.php#List">Harga</a>
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

		<section id="pesan">
			<div class="container">
				<div class="text-center">
					<h1 class="display-6">Isi Detail Pesanan</h1>
				</div>
				<div class="card mb-3">
					<div class="row g-0">
						<div class="col-md-5">
							<img src="https://biaya.info/wp-content/uploads/2021/09/laundry-karpet-678x381.jpg" class="card-img-top" class="img-fluid rounded-start" alt="...">
						</div>
						<div class="col-md-7">
							<div class="card-body">
								<form action="" method="POST" class="m-3">
									<div class="mb-3">
										<label for="paket" class="form-label">Paket dipilih</label>
										<input type="text" id="paket" name="paket" class="form-control" <?php if ($id == 1): ?>
											value="Paket Kilat"
										<?php endif ?>
										<?php if ($id == 2): ?>
											value="Paket Reguler"
										<?php endif ?> readonly>
									</div>
									<div class="mb-3">
										<label for="nama" class="form-label">Nama Pemesan</label>
										<input type="text" id="nama" name="nama" value="<?=$_SESSION['nama']?>" class="form-control" readonly>
									</div>
									<div class="mb-3">
										<label for="karpet" class="form-label">Jenis</label>
										<select name="karpet" id="karpet" class="form-select">
											<option selected disabled hidden>Pilih Jenis Karpet</option>
											<option>Tipis</option>
											<option>Standard</option>
											<option>Medium</option>
											<option>Super</option>
										</select>
									</div>
									<div class="mb-3">
										<label for="ukuran" class="form-label">Luas Karpet</label>
										<input type="number" name="ukuran" id="ukuran" class="form-control">
									</div>
									<div class="mb-3">
										<label for="alamat" class="form-label">Alamat Antar Jemput</label>
										<textarea name="alamat" id="alamat" class="form-control" rows="3"></textarea>
									</div>
									<div class="mb-3">
										<label for="phone" class="form-label">No Handphone Pemesan</label>
										<input type="number" name="phone" id="phone" class="form-control">
									</div>
									<div class="text-center">
										<button class="btn btn-primary px-5" type="submit" name="pesan">Pesan</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<footer class="bg-dark text-center text-muted py-3">
			Dibuat Oleh Aini
		</footer>

	</body>
	</html>