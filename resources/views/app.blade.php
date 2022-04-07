<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NaKer</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css"/>
    
    
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
                <div class="navbar-nav">
                    <a class="nav-link" href="#">Video Training</a>
                </div>
                <div class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <a class="nav-link me-3" href="#">Pekerjaan</a>
                    <a class="nav-link me-3" href="#">Status Seleksi</a>
                    <a class="nav-link me-3" href="#">Pembayaran</a>
                    <a class="nav-link" href="#">Faizal Eric <i class="fa-solid fa-user"></i></a>
                </div>
            
          </div>
        </div>
    </nav>

    @yield('content')



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/bootstrap.bundle.js"></script>
    <script src="https://kit.fontawesome.com/b577fb9d6e.js" crossorigin="anonymous"></script>
</body>
</html>