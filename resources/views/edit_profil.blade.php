@extends('app')
@section('content')
<style>
    .form-group {
        position: relative;
    }

    .form-group .form-control-icon {
        position: absolute;
        z-index: 2;
        display: block;
        width: 2.375rem;
        height: 2.375rem;
        line-height: 2.375rem;
        text-align: center;
        pointer-events: none;
        color: black;
        right: 0;
        top: 0px;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="../gambar/2.png" class="d-block w-100" alt="...">
        </div>
        <!-- <div class="carousel-item">
        <img src="" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
        <img src="..." class="d-block w-100" alt="...">
        </div> -->
    </div>
    <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button> -->
</div>
<div class="container mb-5">
    <div class="row row-cols-1 row-cols-md-3 g-4" style="padding-top : 0.5cm">
        <div class="col">
            <div class="card text-center">
                <img src="../gambar/profile.jpg" class="card-img-top" alt="..." style="display: block; margin-left:auto; margin-right: auto; width: 50%; ">
                <div class="card-body">
                    <h5 class="card-text">{{ Auth::user()->nama_freelancer }}</h5>
                    <h5 class="card-text">@faizaleric</h5>
                </div>
                <!-- <div class="card-footer">
                    <a href="edit-profile"><button class="button">Edit</button></a>
                </div> -->
                <div class="container" style="text-align: center;">
                    <a href="">
                        <button type="submit" class="btn" style="color:white;font-size:20px;background-color: #CCCCCC; width: 150px; height: 50px;">Cancel</button>
                    </a>
                </div>
                <br>
                <div class="container" style="text-align: center;">
                    <a href="profil">
                        <button type="submit" class="btn" style="color:white;font-size:20px;background-color: #588157; width: 150px; height: 50px;">Save</button>
                    </a>
                </div>
                <br>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body" style="background-color: #344E41; color: white; border-radius: 5%;">
                    <form class="row g-3">
                        <div class="col-12">
                            <label for="DateOfBirth" class="form-label">Date Of Birth</label>
                            <div class="form-group">
                                <span class="fa fa-pencil form-control-icon"></span>
                                <input type="email" class="form-control" id="DateOfBirth">
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Address</label>
                            <div class="form-group">
                                <span class="fa fa-pencil form-control-icon"></span>
                                <input type="text" class="form-control" id="inputAddress">
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="inputEmail" class="form-label">Email</label>
                            <div class="form-group">
                                <span class="fa fa-pencil form-control-icon"></span>
                                <input type="text" class="form-control" id="inputEmail">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="inputLinkedin" class="form-label">Linkedin Name</label>
                            <div class="form-group">
                                <span class="fa fa-pencil form-control-icon"></span>
                                <input type="text" class="form-control" id="inputLinkedin">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="inputCV" class="form-label">Curriculum Vitae</label>
                            <input type="file" class="form-control" id="inputCV">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card col">
                <div class="card-body" style="background-color: #344E41; color: white; border-radius: 5%;">
                    <div class="mb-3">
                        <label for="Experience" class="form-label">Experience</label>
                        <div class="form-group">
                            <span class="fa fa-pencil form-control-icon"></span>  
                            <textarea class="form-control" id="Experience" rows="6"></textarea>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="Certification" class="form-label">Certification</label>
                        <div class="form-group">
                            <span class="fa fa-pencil form-control-icon"></span>  
                            <textarea class="form-control" id="Certification" rows="6"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
</div>
@endsection