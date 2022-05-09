@extends('pemberi_kerja.app')
@section('content')
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="../gambar/1.png" class="d-block w-100" alt="...">
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
                <img src="../gambar/back.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Back End Developer</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Saepe expedita, esse tempora, provident nihil blanditiis, sequi nobis voluptatum enim minima fugiat molestiae quis ullam! Ducimus voluptates pariatur deleniti asperiores nam.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="../gambar/ui ux.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">UI/UX Designer</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, ipsum repellat doloribus illum suscipit qui, dolore maiores excepturi iste laboriosam quibusdam, odit provident temporibus dolores veniam quaerat deleniti nam quae.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card col">
                <img src="../gambar/IT.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Front End Developer</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum nulla quas nisi architecto excepturi repellendus, atque nostrum facere officia laborum soluta sapiente ipsum, dolore optio, perspiciatis error nemo temporibus doloremque.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>
        
        
    </div>
</div>

@endsection