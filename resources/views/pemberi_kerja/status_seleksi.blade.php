@extends('pemberi_kerja.app')
@section('content')
@if (Session::get('fail'))
    <div class="alert alert-danger alert-dismissible fade show">
        {{ Session::get('fail') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif
@if (Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <p>{{ Session::get('success') }} <i class="fa-solid fa-circle-check"></i></p>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif
<div class="container mt-4">
    <div class="row">
        <div class="col-4 mb-4">
            <div class="row">
                <h2 class="mb-3">Status Seleksi</h2>
            </div>
        </div>
        <div class="col-8 mb-4">
        </div>
        <div class="col-4 mb-4">
            <div class="row">
                @if (!$status_onboard->isEmpty())
                @foreach($status_onboard as $statuss)
                <div class="mb-3">
                    <div class="card" style="background-color:#DAD7CD;">
                        <div class="card-body">
                            <h5 class="card-title"><strong>{{ $statuss->nama_pekerjaan }}</strong><i> ({{ $statuss->name }})</i></h5>
                            <p class="card-text">{{ $statuss->deskripsi_pekerjaan }}</p>
                            <p class="card-text">Pelamar : {{ $statuss->name }}</p>
                            <a href="{{ route('pemberi_kerja.detail_seleksi', ['id'=>$statuss->id_myjob]) }}" class="btn mt-4" style="color:white;font-size:14px;background-color: #3A5A40; ">Detail</a>
                        </div>
                    </div>
                </div>   
                @endforeach
                @else
                <p class='text-center'>No record found.</p>
                @endif
            </div>
        </div>
        <div class="col-8 mb-4">
            <div class="row">
                <div class="card" style="background-color:#DAD7CD;">
                    <div class="card-body">
                        <div class="container">
                            @if(Route::is('pemberi_kerja.status_seleksi'))
                            <h5 class="card-title mb-4 text-center">Pilih kandidat yang ingin dilihat</h5>
                            @endif
                            @if (!$status_onboard->isEmpty())
                            @if(Route::is('pemberi_kerja.detail_seleksi', ['id'=>$statuss->id_myjob]))
                                @foreach($detailSeleksi_onboard as $detail_seleksi)
                                    <h5 class="card-title mb-4 text-center">{{ $detail_seleksi->nama_pekerjaan }}</h5>
                                    <div class="row g-5 align-items-center">
                                        <div class="col-4">
                                            <p>Deskripsi Pekerjaan  : </p>
                                        </div>
                                        <div class="col">
                                            <p style="background:#A3B18A;border-radius:10px;padding:10px;">{{ $detail_seleksi->deskripsi_pekerjaan }}</p>
                                        </div>
                                    </div>
                                    <div class="row g-5 align-items-center">
                                        <div class="col-4">
                                            <p>Nama Freelancer   : </p>
                                        </div>
                                        <div class="col">
                                            <p style="background:#A3B18A;border-radius:10px;padding:10px;">{{ $detail_seleksi->name }}</p>
                                        </div>
                                    </div>
                                    <div class="row g-5 align-items-center">
                                        <div class="col-4">
                                            <p>No Telepon   : </p>
                                        </div>
                                        <div class="col">
                                            <p style="background:#A3B18A;border-radius:10px;padding:10px;">{{ $detail_seleksi->no_telepon }}</p>
                                        </div>
                                    </div>
                                    <div class="row g-5 align-items-center">
                                        <div class="col-4">
                                            <p>Status Seleksi   : </p>
                                        </div>
                                        <div class="col">
                                            <p style="background:#A3B18A;border-radius:10px;padding:10px;">{{ $detail_seleksi->status }}</p>
                                        </div>
                                    </div>
                                    <div class="row g-5 align-items-center mb-3 text-center">
                                        <div class="col">
                                        </div>
                                        <div class="col-4">
                                        </div>
                                        <div class="col-4">
                                            <!-- <a href="#" class="btn text-light end-0" style="background-color:#3A5A40;border-radius:10px;padding:10px;width:100%;color:white;padding:10px;">Unggah</a> -->
                                            <a data-bs-toggle="modal" data-bs-target="#exampleModal{{ $detail_seleksi->id_myjob }}" class="btn text-dark end-0" style="background-color:#E5E5E5;border-radius:10px;padding:10px;width:100%;padding:10px;">Edit</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="exampleModal{{ $detail_seleksi->id_myjob }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Status Seleksi</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <h5 class="card-title mb-4 text-center">{{ $detail_seleksi->nama_pekerjaan }}</h5>
                                            <form class="row g-3" method="POST" action="{{ route('pemberi_kerja.create_seleksi') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <p>Deskripsi Pekerjaan : </p>
                                                        <p style="background:#A3B18A;border-radius:10px;padding:10px;">{{ $detail_seleksi->deskripsi_pekerjaan }}</p>
                                                    </div>
                                                    <div class="mb-3" hidden>
                                                        <p>Id Myjob : </p>
                                                        <input type="text" class="form-control" name="id_myjob" id="id_myjob" value="{{ $detail_seleksi->id_myjob }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <p>Nama Freelancer : </p>
                                                        <p style="background:#A3B18A;border-radius:10px;padding:10px;">{{ $detail_seleksi->name }}</p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="status" class="form-label">Status Seleksi</label>
                                                        <select class="form-select" aria-label="Default select example" id="status" name="status">
                                                            <option name="status" value="Tahap Seleksi" {{($detail_seleksi->status == 'Tahap Seleksi') ? "selected":'' }}>Seleksi Freelancer</option>
                                                            <option name="status" value="Terpilih" {{($detail_seleksi->status == 'Terpilih') ? "selected":'' }}>Pilih Freelancer</option>
                                                            <option name="status" value="Tertolak" {{($detail_seleksi->status == 'Tertolak') ? "selected":'' }}>Tolak Freelancer</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn" style="background-color: #344E41;color:white;">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                            @endif
                        </div>
                    </div>
                </div>   
            </div>
        </div>
    </div>
</div>
@endsection