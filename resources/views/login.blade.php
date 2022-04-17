<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NaKer</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css" />


    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">
    <link href="../css/sidebars.css" rel="stylesheet"> -->

    <style>

    </style>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #3A5A40;">
        <div class="container">
            <a class="navbar-brand" href="#">NaKer</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <a class="nav-link me-4" href="login">Masuk</a>
                    <a class="nav-link me-4" href="registrasi">Daftar</a>
                    <a class="nav-link me-4" href="#">Perusahaan</a>
                </div>

            </div>
        </div>
    </nav>
    <div style="margin-left: 30% ; margin-right: 30%; margin-top:10%">
        <form class="row g-3">
            <div class="col-12">
                <label for="inputAddress" class="form-label">Email Address</label>
                <input type="text" class="form-control" id="inputAddress" style="background-color: #A3B18A; height:75px">
            </div>
            <div class="col-12">
                <label for="inputPassword" class="form-label">Password</label>
                <input type="text" class="form-control" id="inputPassword" style="background-color: #A3B18A; height:75px" >
            </div>
            <div class="col-md-6">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="autoSizingCheck">
                    <label class="form-check-label" for="autoSizingCheck">
                        Remember me
                    </label>
                </div>
            </div>
            <div class="col-md-6" style="text-align: right">
                <label for="inputPassword4" class="form-label">Forgot Password ?</label>
            </div>
            <div class="container" style="text-align: center; background-color: #344E41; width: 200px; height: 50px;border-radius: 5%;">
                <button type="submit" class="btn" style="color:white;font-size:25px">Login</button>
            </div>
            <div lass="container" style="text-align: center; padding-top: 2%;">
                <p>Don't have an account? <a href="registrasi" style="color:black">Register</a>.</p>
            </div>
        </form>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/bootstrap.bundle.js"></script>
    <script src="https://kit.fontawesome.com/b577fb9d6e.js" crossorigin="anonymous"></script>
</body>

</html>