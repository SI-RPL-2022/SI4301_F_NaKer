<?php  

include 'config.php';

if (isset($_POST['login'])) {
	
	login($_POST);

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
				<a class="navbar-brand" href="home.php"><i>Aini Laundry</i></a>
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
					<a href="login.php" class="btn btn-primary me-2">Login</a>
				</div>
			</div>
		</nav>

		<section id="header">
			<div class="container-fluid vh-100" style="background: rgba(0, 0, 0, 0.7);padding-top: 200px;">
				<div class="col-md-4 mx-auto p-4 rounded" style="background-color: white; color:#000;">
					<div class="text-center">
						<h1 class="display-6">Login</h1>
					</div>
					<form action="" method="POST">
						<hr class="mt-3">
						<div class="mb-3">
							<input type="email" name="email" class="form-control" placeholder="Email" <?php if (isset($_COOKIE['email'])): ?>
								value="<?=$_COOKIE['email']?>"
							<?php endif ?>>
						</div>
						<input type="password" name="password" class="form-control mb-2" placeholder="Password" <?php if (isset($_COOKIE['password'])): ?>
								value="<?=$_COOKIE['password']?>"
							<?php endif ?>>
						<input type="checkbox" name="remember" id="remember" class="form-check-input">
						<label for="remember" class="form-check-label">Remember Me</label>
						<hr class="mb-4">
						<div class="text-center">
							<button type="submit" class="btn btn-primary px-5" name="login">Login</button>
							<p><small class="text-muted">Belum Punya Akun? <a href="register.php">Daftar Sekarang</a></small></p>
						</div>
					</form>
				</div>
			</div>
		</section>
		

		<footer class="bg-dark text-center text-muted py-3">
			Dibuat Oleh Aini
		</footer>

	</body>
	</html>