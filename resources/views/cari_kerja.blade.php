@extends('app')
@section('content')
<div class="container mt-4 ">
    <div class="row">
        <div class="col-4 mb-4">
            <h2 class="mb-4">Daftar Pekerjaan</h2>
        </div>
        <div class="col-8 mb-4">
            <div class="row">
                <div class="col-6">
                    <form action="/cari-kerja/cari" method="GET">
                        <div class="input-group">
                            <input type="text" id="form1" class="form-control" placeholder="Cari Pekerjaan" name="pencarian"/>
                                
                            <button type="submit" class="btn" style="background-color:#344E41;color:white;">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @if (Session::get('fail'))
            <div class="alert alert-danger">
                {{ Session::get('fail') }}
            </div>
        @endif
        @if (Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        <div class="col-4">
            <div class="card" style="background-color: #A3B18A;color: white; height:600px;">
                
                <div class="card-header">
                    Kategori
                </div>
                <ul class="list-group list-group-flush" >
                    @php
                        if (!$kategori->isEmpty()){
                    @endphp
                        @foreach($kategori as $kategoris)
                        <a class="text-dark text-decoration-none " href="{{ url('/pekerjaan-kategori', $kategoris->kategori ) }}"><li class="list-group-item" style="background-color: #A3B18A;color: white;"><i class="fa-solid fa-circle fa-2xs"></i> {{ $kategoris->kategori }}</li></a>
                        @endforeach
                    @php
                    } else{
                    @endphp
                        <p class='text-center'>Tidak ada kategori.</p>
                    @php
                    }
                    @endphp
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
                            <p class="card-title"><strong>{{ $pekerjaans->nama_pekerjaan }}</strong> ({{ $pekerjaans->name }}, <i class="" style="color:#636363;">{{ $pekerjaans->alamat }}</i>)</p>
                            <p class="card-text">{{ $pekerjaans->deskripsi_pekerjaan }}</p>
                            @auth('web')
                            <a href="freelancer/lamar-kerja/{{$pekerjaans->id_pekerjaan}}" class="btn text-light end-0" style="float:right; background-color:#344E41;">Apply</a>
                            <a class="btn bg-secondary text-white end-0" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $pekerjaans->id_pekerjaan }}" style="float:left; background-color:#grey;">Detail</a>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{ $pekerjaans->id_pekerjaan }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Detail Pekerjaan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container row">
                                                <h5 class="card-title mb-4 text-center"><strong>{{ $pekerjaans->nama_pekerjaan }}</strong> ({{ $pekerjaans->name }}, <i class="" style="color:#636363;">{{ $pekerjaans->alamat }}</i>)</h5>
                                                <div class="col-md-12">
                                                    <p>Deskripsi Pekerjaan : </p>
                                                    <p style="background:#A3B18A;border-radius:10px;padding:10px;">{{ $pekerjaans->deskripsi_pekerjaan }}</p>
                                                </div>
                                                <div class="col-md-12">
                                                    <p>Kategori Pekerjaan : </p>
                                                    <p style="background:#A3B18A;border-radius:10px;padding:10px;">{{ $pekerjaans->kategori }}</p>
                                                </div>
                                                <div class="col-md-12">
                                                    <p>Upah Pekerjaan : </p>
                                                    <p style="background:#A3B18A;border-radius:10px;padding:10px;">{{ $pekerjaans->fee_pekerjaan }}</p>
                                                </div>
                                                <div class="col-md-12">
                                                    <p>Deadline Pekerjaan : </p>
                                                    <p style="background:#A3B18A;border-radius:10px;padding:10px;">{{ $pekerjaans->deadline }}</p>
                                                </div>
                                            </div>   
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endauth
                            @if(!Auth::guard('web')->check())
                            <button onclick="myFunction()" class="btn text-light end-0" style="float:right; background-color:#344E41;">Apply</button>

                                <script>
                                    function myFunction() {
                                        alert("Kamu harus login sebagai freelancer!");
                                        window.location = "{{ route('freelancer.login') }}";
                                    }
                                </script>
                            @endif
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