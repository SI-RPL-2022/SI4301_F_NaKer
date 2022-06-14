@extends('pemberi_kerja.app')
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
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @elseif (session()->has('error'))
    <div class="alert alert-error alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif
<div class="container mb-5">
<form action="{{ route('pemberi_kerja.update_profil') }}" method="POST" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <input type="hidden" id="id" name="id" value="{{ Auth::guard('pemberi_kerja')->user()->id_pemberikerja }}">
        <div class="row" style="padding-top : 0.5cm">
            <div class="col">
                <div class="card text-center">
                    @if(Auth::guard('pemberi_kerja')->user()->pic != '')
                    <img src="/gambar/userprofile/{{Auth::guard('pemberi_kerja')->user()->pic}}" class="card-img-top" alt="..." style="display: block; margin-left:auto; margin-right: auto; width: 50%; ">
                    <div class="pic">
                        <div class="mt-1">
                            <label class="form-label"><strong>Ganti Foto Profile*</strong></label>
                        </div>
                        <div class="mb-3">
                            <input onbeforeeditfocus="return false;" type="file" name="pic" id="pic">
                        </div>
                    </div>
                    @endif
                    @if(Auth::guard('pemberi_kerja')->user()->pic == '')>
                    <img src="../gambar/profile.jpg" class="card-img-top" alt="..." style="display: block; margin-left:auto; margin-right: auto; width: 50%; ">
                    <div class="pic">
                        <div class="mt-1">
                            <label class="form-label"><strong>Foto Profile*</strong> <i class="" style="color:#636363;">belum ada foto profile ter-upload</i> </label>
                        </div>
                        <div class="mb-3">
                            <input onbeforeeditfocus="return false;" type="file" name="pic" id="pic">
                        </div>
                    </div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-text">{{ Auth::guard('pemberi_kerja')->user()->name }}</h5>
                        <h5 class="card-text">{{ Auth::guard('pemberi_kerja')->user()->email }}</h5>
                    </div>
                    <div class="container" style="text-align: center;">
                        <a href="profil">
                            <a href="{{ route('pemberi_kerja.profil') }}" class="btn" style="color:white;font-size:20px;background-color: #CCCCCC; width: 150px; height: 50px;">Cancel</a>
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
                                <label for="date_of_birth" class="form-label">Date Of Birth</label>
                                <div class="form-group">
                                    <span class="fa fa-pencil form-control-icon"></span>
                                    <input type="text" class="form-control" name = "date_of_birth" id="date_of_birth" value="{{ Auth::guard('pemberi_kerja')->user()->date_of_birth }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="alamat" class="form-label">Address</label>
                                <div class="form-group">
                                    <span class="fa fa-pencil form-control-icon"></span>
                                    <input type="text" class="form-control" name="alamat" id="alamat" value="{{ Auth::guard('pemberi_kerja')->user()->alamat }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="email" class="form-label">Email</label>
                                <div class="form-group">
                                    <span class="fa fa-pencil form-control-icon"></span>
                                    <input type="email" class="form-control" name="email" id="email" value="{{ Auth::guard('pemberi_kerja')->user()->email }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="no_telepon" class="form-label">No Telepon</label>
                                <div class="form-group">
                                    <span class="fa fa-pencil form-control-icon"></span>
                                    <input type="text" class="form-control" name="no_telepon" id="no_telepon"  value="{{ Auth::guard('pemberi_kerja')->user()->no_telepon }}">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- <div class="col">
                <div class="card col">
                    <div class="card-body" style="background-color: #344E41; color: white; border-radius: 5%;">
                    <div class="mb-3">
                        <label for="Experience" class="form-label">Experience</label>
                        <input type="textarea" class="form-control" name="portofolio" id="portofolio" rows="6" value="{{ Auth::guard('pemberi_kerja')->user()->portofolio }}">
                    </div>
                    <div class="mb-3">
                        <label for="Certification" class="form-label">Certification</label>
                        <input type="textarea" class="form-control" name="sertifikat" id="sertifikat" rows="6" value="{{ Auth::guard('pemberi_kerja')->user()->sertifikat }}">
                    </div>
                    </div>
                </div>
            </div> -->
        </div>
    </form>
</div>
</div>
@endsection