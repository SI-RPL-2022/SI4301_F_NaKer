@extends('app')
@section('content')
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="gambar/1.png" class="d-block w-100" alt="...">
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
    <h3 class="mt-3 mb-3">Most Popular </h3>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card">
                <img src="gambar/back.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Back End Developer</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Saepe expedita, esse tempora, provident nihil blanditiis, sequi nobis voluptatum enim minima fugiat molestiae quis ullam! Ducimus voluptates pariatur deleniti asperiores nam.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="gambar/ui ux.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">UI/UX Designer</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, ipsum repellat doloribus illum suscipit qui, dolore maiores excepturi iste laboriosam quibusdam, odit provident temporibus dolores veniam quaerat deleniti nam quae.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card col">
                <img src="gambar/IT.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Front End Developer</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum nulla quas nisi architecto excepturi repellendus, atque nostrum facere officia laborum soluta sapiente ipsum, dolore optio, perspiciatis error nemo temporibus doloremque.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>
        
        
    </div>
</div>

<!-- <div class="container mt-4 ">
    <h2 class="mb-4">Daftar Pekerjaan</h2>
    <div class="row">
        <div class="col-4">
            <div class="card" style="background-color: #A3B18A;color: white; height:600px;">
                <div class="card-header">
                    Kategori
                </div>
                <ul class="list-group list-group-flush" >
                    <a class="text-dark text-decoration-none " href="#"><li class="list-group-item" style="background-color: #A3B18A;color: white;"><i class="fa-solid fa-circle fa-2xs"></i> IT</li></a>
                    <a class="text-dark text-decoration-none " href="#"><li class="list-group-item" style="background-color: #A3B18A;color: white;"><i class="fa-solid fa-circle fa-2xs"></i> Desain Grafis</li></a>
                    <a class="text-dark text-decoration-none " href="#"><li class="list-group-item" style="background-color: #A3B18A;color: white;"><i class="fa-solid fa-circle fa-2xs"></i> Agrikultur</li></a>
                </ul>
                </div>
        </div>
        <div class="col-8">
            <div class="row">
                @php
                if (!$pekerjaan->isEmpty()){
                @endphp
                @foreach($pekerjaan as $pekerjaans)
                <div class="col-sm-6">
                    <div class="card" style="background-color:#DAD7CD;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $pekerjaans->nama_pekerjaan }}</h5>
                            <p class="card-text">{{ $pekerjaans->deskripsi_pekerjaan }}</p>
                            <a href="#" class="btn text-light end-0" style="float:right; background-color:#344E41;">Apply</a>
                        </div>
                    </div>
                </div>
                @endforeach
                @php
                } else{
                @endphp
                    <p class='text-center'>No record found.</p>
                @php
                }
                @endphp
                
            </div>
        </div>
    </div>
</div> -->
@endsection