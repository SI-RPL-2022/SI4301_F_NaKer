@extends('app')
@section('content')
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
                @if(Auth::guard('web')->user()->pic != '')
                <img src="/gambar/userprofile/{{Auth::guard('web')->user()->pic}}" class="card-img-top" alt="..." style="display: block; margin-left:auto; margin-right: auto; width: 50%; ">
                @endif
                @if(Auth::guard('web')->user()->pic == '')>
                <img src="../gambar/profile.jpg" class="card-img-top" alt="..." style="display: block; margin-left:auto; margin-right: auto; width: 50%; ">
                @endif
                <div class="card-body">
                    <h5 class="card-text">{{ Auth::guard('web')->user()->name }}</h5>
                    <h5 class="card-text">{{ Auth::guard('web')->user()->email }}</h5>
                </div>
                <div class="container mb-4" style="text-align: center;">
                    <a href="">
                        <a href="{{ route('freelancer.edit_profil') }}" class="btn" style="color:white;font-size:20px;background-color: #588157; width: 150px; height: 50px;">Edit</a>
                    </a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body" style="background-color: #344E41; color: white; border-radius: 5%;">
                    <form class="row g-3">
                        <div class="col-12">
                            <label for="date_of_birth" class="form-label">Date Of Birth</label>
                            <input type="email" class="form-control" id="date_of_birth" value="{{ Auth::guard('web')->user()->date_of_birth }}" disabled>
                        </div>
                        <div class="col-12">
                            <label for="alamat" class="form-label">Address</label>
                            <input type="text" class="form-control" id="alamat" value="{{ Auth::guard('web')->user()->alamat }}" disabled>
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" value="{{ Auth::guard('web')->user()->email }}" disabled>
                        </div>
                        <div class="col-md-12">
                            <label for="LinkedinName" class="form-label">Linkedin Name</label>
                            <input type="text" class="form-control" name="LinkedinName" id="LinkedinName" value="{{ Auth::guard('web')->user()->LinkedinName }}" disabled>
                        </div>
                        <div class="col-md-12">
                            <label for="no_telepon" class="form-label">No Telepon</label>
                            <input type="text" class="form-control" name="no_telepon" id="no_telepon" value="{{ Auth::guard('web')->user()->no_telepon }}" disabled>
                        </div>
                        <div class="col-md-12">
                            @if(Auth::guard('web')->user()->cv != '')
                            <div class="cv">
                                <div class="mt-1">
                                    <label class="form-label"><strong>Curriculum Vitae*</strong> <i class="" style="color:#636363;">file ter-upload : {{Auth::guard('web')->user()->cv}}</i> </label>
                                    <embed src="/dokumen/cv/{{Auth::guard('web')->user()->cv}}" style="width:100%;height:250px;" type="application/pdf">
                                </div>
                            </div>
                            @endif
                            @if(Auth::guard('web')->user()->cv == '')
                            <div class="cv">
                                <div class="mt-1">
                                    <label class="form-label"><strong>Curriculum Vitae*</strong> <i class="" style="color:#636363;">belum ada cv ter-upload</i> </label>
                                </div>
                            </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card col">
                <div class="card-body" style="background-color: #344E41; color: white; border-radius: 5%;">
                    <div class="mb-3">
                        @if(Auth::guard('web')->user()->portofolio != '')
                        <div class="portofolio">
                            <div class="mt-1">
                                <label class="form-label"><strong>Portofolio*</strong> <i class="" style="color:#636363;">file ter-upload : {{Auth::guard('web')->user()->portofolio}}</i> </label>
                                <embed src="/dokumen/portofolio/{{Auth::guard('web')->user()->portofolio}}" style="width:100%;height:250px;" type="application/pdf">
                            </div>
                        </div>
                        @endif
                        @if(Auth::guard('web')->user()->portofolio == '')
                        <div class="portofolio">
                            <div class="mt-1">
                                <label class="form-label"><strong>Portofolio*</strong> <i class="" style="color:#636363;">belum ada portofolio ter-upload</i> </label>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        @if(Auth::guard('web')->user()->sertifikat != '')
                        <div class="sertifikat">
                            <div class="mt-1">
                                <label class="form-label"><strong>Sertifikat (optional)</strong> <i class="" style="color:#636363;">file ter-upload : {{Auth::guard('web')->user()->portofolio}}</i> </label>
                                <embed src="/dokumen/sertifikat/{{Auth::guard('web')->user()->sertifikat}}" style="width:100%;height:250px;" type="application/pdf">
                            </div>
                        </div>
                        @endif
                        @if(Auth::guard('web')->user()->sertifikat == '')
                        <div class="sertifikat">
                            <div class="mt-1">
                                <label class="form-label"><strong>Sertifikat (optional)</strong> <i class="" style="color:#636363;">belum ada sertifikat ter-upload</i> </label>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
</div>
@endsection