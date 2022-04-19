<?php  


if (!isset($_SESSION)) {
	session_start();
};

$conn = mysqli_connect('localhost','root','','laundry');

if (isset($_GET['logout'])) {
	
	session_destroy();
	header("Location:../login.php");

}

function register($request)
{
	global $conn;

	$nama = $request['nama'];
	$email = $request['email'];
	$password = $request['password'];

	$getuser = "SELECT * FROM users WHERE email = '$email' ";
	$select = mysqli_query($conn,$getuser);

	$cek_user = mysqli_num_rows($select);

	if ($cek_user == 0) {
		
		$sql = "INSERT INTO users VALUES ('','$nama','$email','$password')";
		mysqli_query($conn,$sql);

		header('Location:login.php');
		exit();

	}else{

		echo "<script>alert('Gagal Regis')</script>";

		exit();
	}

}

function login($value)
{
	
	global $conn;

	$email = $value['email'];
	$password = $value['password'];


	$cek = "SELECT * FROM users WHERE email = '$email'";
	$select = mysqli_query($conn,$cek);

	$cekemail = mysqli_num_rows($select);

	if ($cekemail == 1) {
		
		$data = mysqli_fetch_assoc($select);

		if ($password == $data['password']) {
			

			$_SESSION['id'] = $data['user_id'];
			$_SESSION['nama'] = $data['nama'];

			if ($email == "admin@admin") {
				
				header('Location:admin');

			}else{

				if (isset($_POST['remember'])) {

					setcookie('email', $_POST['email'], strtotime('+7 days'), "/");
					setcookie('password', $_POST['password'], strtotime('+7 days'), "/");
				}

				header('Location:Home.php');
			}

		}else{

			echo "<script>alert('Password Salah')</script>";

		}
	}else{
		echo "<script>alert('Login Gagal')</script>";
	}
}

function order($value)
{
	global $conn;

	$user_id = $_SESSION['id'];

	$paket = $value['paket'];
	$karpet = $value['karpet'];
	$harga = 0;
	$alamat = $value['alamat'];
	$ukuran = $value['ukuran'];
	$phone = $value['phone'];

	if ($paket == 'Paket Kilat') {
		
		if ($karpet == 'Tipis' ) {
			$harga = 33000;
		}elseif ($karpet == 'Standard') {
			$harga = 39000;
		}elseif ($karpet == 'Medium' ) {
			$harga = 43000;
		}elseif ($karpet == 'Super') {
			$harga = 55000;
		}
	}elseif ($paket == 'Paket Reguler') {
		if ($karpet == 'Tipis' ) {
			$harga = 16500;
		}elseif ($karpet == 'Standard') {
			$harga = 19500;
		}elseif ($karpet == 'Medium' ) {
			$harga = 21500;
		}elseif ($karpet == 'Super') {
			$harga = 27500;
		}
	}

	$harga = $harga * $ukuran;

	$sql = "INSERT INTO orders VALUES ('','$paket','$karpet','$harga','$user_id','$alamat','$phone','1')";
	mysqli_query($conn,$sql);

	header('Location:order.php');
}

function ubahstatus($value)
{
	global $conn;

	$order_id = $value['order_id'];
	$status = $value['status'];

	$sql = "UPDATE orders SET status = '$status' WHERE order_id = '$order_id'";
	mysqli_query($conn,$sql);
	header('Location:home.php');
}

function ubahuser($value)
{
	

	global $conn;


	$user_id = $value['user_id'];
	$nama = $value['nama'];
	$email = $value['email'];
	$password = $value['password'];

	$sql = "UPDATE users SET nama = '$nama', email = '$email', password = '$password' WHERE user_id = '$user_id' ";
	mysqli_query($conn,$sql);

	header('Location:admin/user.php');

}



if (isset($_GET['delete'])) {
	
	$id = $_GET['delete'];

	$sql = "DELETE FROM users WHERE user_id = '$id'";
	mysqli_query($conn,$sql);
	header('Location:user.php');
	

}

if (isset($_GET['logout'])) {
	
	session_destroy();
	header('Location:login.php');
}

?>