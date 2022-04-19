<?php  

include 'config.php';


$user_id = $_SESSION['id'];

$sql = "SELECT * FROM orders INNER JOIN users ON orders.user_id=users.user_id WHERE orders.user_id = '$user_id'";
$select = mysqli_query($conn,$sql);

$i = 1;

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

		<section id="order">
			<div class="container pt-5" style="min-height: 83vh;">
				<div class="text-center mb-5">
					<h1 class="display-6">My Order List</h1>
				</div>
				<table class="table table-bordered">
					<thead class="table-dark">
						<tr>
							<th scope="col">No</th>
							<th scope="col">Jenis Servis</th>
							<th scope="col">Jenis Karpet</th>
							<th scope="col">Harga</th>
							<th scope="col">Nama</th>
							<th scope="col">Alamat</th>
							<th scope="col">No Handphone</th>
							<th scope="col">Status</th>
						</tr>
					</thead>
					<tbody>
						<?php while($data = mysqli_fetch_assoc($select)){ ?>
							<tr>
								<th scope="row"><?=$i++?></th>
								<td><?=$data['jenis_service']?></td>
								<td><?=$data['jenis_karpet']?></td>
								<td>Rp <?=number_format($data['harga'])?></td>
								<td><?=$data['nama']?></td>
								<td><?=$data['alamat']?></td>
								<td><?=$data['no_hp']?></td>
								<td>
									<?php if ($data['status']==1): ?>
										Laundry sedang diambil
									<?php endif ?>
									<?php if ($data['status']==2): ?>
										Laundry sedang dicuci
									<?php endif ?>
									<?php if ($data['status']==3): ?>
										Laundry sudah selesai
									<?php endif ?>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</section>

		<footer class="bg-dark text-center text-muted py-3">
			Dibuat Oleh Aini
		</footer>

	</body>
	</html>