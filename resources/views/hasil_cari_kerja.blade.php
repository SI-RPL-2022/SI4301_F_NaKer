@extends('app')
@section('content')
<div class="container mt-4 ">
    <h2 class="mb-4">Daftar Pekerjaan</h2>
    <div class="row">
        <div class="col-4 mb-4">
        </div>
        <div class="col-8 mb-4">
            <form action="/cari-kerja/cari" method="GET">
                <div class="input-group">
                    <div class="form-outline">
                        <input type="search" id="form1" class="form-control" placeholder="Cari Pekerjaan" name="pencarian"/>
                        
                    </div>
                    <button type="submit" class="btn" style="background-color:#344E41;color:white;">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
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
</div>
@endsection