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
                            <a href="{{route('freelancer.lamar_kerja', ['id'=>$pekerjaans->id_pekerjaan])}}" class="btn text-light end-0" style="float:right; background-color:#344E41;">Apply</a>

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