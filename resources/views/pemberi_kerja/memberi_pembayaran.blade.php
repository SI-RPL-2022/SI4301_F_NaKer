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
        <div class="row">
            <div class="col-4 mb-4">
            </div>
            <div class="col-8 mb-4">
                <div class="row">
                    <div class="col">   
                        <h2 class="mb-1">Pembayaran</h2>
                    </div>
                    <div class="col">   
                        <a href="{{ route('pemberi_kerja.riwayat_pembayaran')}}" class="btn" style="color:white;background-color: #344E41;"><h5>Riwayat Pembayaran <i class="fa fa-history" aria-hidden="true"></i></h5></a>
                    </div>
                </div>
            </div>
            <div class="col-4 mb-4">
                @if (!$pekerjaan_onboard->isEmpty())
                @foreach($pekerjaan_onboard as $pekerjaans)
                <div class="mb-3">
                    <div class="card" style="background-color:#DAD7CD;">
                        <div class="card-body">
                            <h5 class="card-title"><strong>{{ $pekerjaans->nama_pekerjaan }}</strong> ({{ $pekerjaans->name }})</h5>
                            <p class="card-text">{{ $pekerjaans->deskripsi_pekerjaan }}</p>
                            <a href="#" class="btn mt-4" style="color:white;font-size:14px;background-color: #588157; ">Belum Selesai</a>
                            <a href="{{ route('pemberi_kerja.detail_pembayaran', ['id'=>$pekerjaans->id_myjob]) }}" class="btn mt-4" style="color:white;font-size:14px;background-color: #344E41; ">Cek Pembayaran</a>
                        </div>
                    </div>
                </div>   
                @endforeach
                @else
                <h2 class='text-center'>No record found</h2>
                @endif
            </div>
            <div class="col-8">
                <div class="row">
                <div class="card" style="background-color:#DAD7CD;">
                    <div class="card-body">
                        <div class="container">
                            @if(Route::is('pemberi_kerja.memberi_pembayaran'))
                            <h5 class="card-title mb-4 text-center">Pilih pembayaran yang ingin dilihat</h5>
                            @endif
                            @if(!$pekerjaan_onboard->isEmpty()) 
                            @if(Route::is('pemberi_kerja.detail_pembayaran', ['id'=>$pekerjaans->id_myjob]))
                            @foreach($detail_bayar as $detail_bayars)   
                                @if (Session::get('fail'))
                                    <div class="alert alert-error alert-dismissible fade show" role="alert">
                                        {{ Session::get('fail') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                @endif
                                @if (Session::get('success'))
                                    <div class="alert alert-error alert-dismissible fade show" role="alert">
                                        {{ Session::get('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                @endif
                                <h5 class="card-title mb-4 text-center">{{ $detail_bayars->nama_pekerjaan }}</h5>
                                <div class="row g-5 align-items-center">
                                    <div class="col-4">
                                        <p>Deskripsi Pekerjaan : </p>
                                    </div>
                                    <div class="col">
                                        <p style="background:#A3B18A;border-radius:10px;padding:10px;">{{ $detail_bayars->deskripsi_pekerjaan }}</p>
                                    </div>
                                </div>
                                <div class="row g-5 align-items-center">
                                    <div class="col-4">
                                        <p>Kategori Pekerjaan : </p>
                                    </div>
                                    <div class="col">
                                        <p style="background:#A3B18A;border-radius:10px;padding:10px;">{{ $detail_bayars->kategori }}</p>
                                    </div>
                                </div>
                                <div class="row g-5 align-items-center">
                                    <div class="col-4">
                                        <p>Diberikan Kepada : </p>
                                    </div>
                                    <div class="col">
                                        <p style="background:#A3B18A;border-radius:10px;padding:10px;">{{ $detail_bayars->name }}</p>
                                    </div>
                                </div>
                                <div class="row g-5 align-items-center">
                                    <div class="col-4">
                                        <p>Terbilang : </p>
                                    </div>
                                    <div class="col">
                                        <p style="background:#A3B18A;border-radius:10px;padding:10px;">Rp {{ number_format($detail_bayars->fee_pekerjaan,0,',','.') }}</p>
                                    </div>
                                </div>
                                <div class="row g-5 align-items-center">
                                <div class="col-4">
                                        <p>Status : </p>
                                    </div>
                                    <div class="col">
                                        <p style="background:#A3B18A;border-radius:10px;padding:10px;">Belum Selesai</p>
                                    </div>
                                </div>
                                <div class="row g-5 align-items-center mb-3 text-center">
                                    <div class="col">
                                    </div>
                                    <div class="col-4">
                                        <!-- <a data-bs-toggle="modal" data-bs-target="#exampleModal{{ $detail_bayars->id_myjob }}" class="btn text-dark" style="background-color:#E5E5E5;border-radius:10px;padding:10px;width:100%;color:white;padding:10px;">Edit</a> -->
                                    </div>
                                    <div class="col-4">
                                    <a data-bs-toggle="modal" data-bs-target="#exampleModal{{ $detail_bayars->id_myjob }}" class="btn text-dark" style="background-color:#E5E5E5;border-radius:10px;padding:10px;width:100%;color:white;padding:10px;">Edit</a>
                                        <!-- <a href="#" class="btn text-light end-0" style="background-color:#3A5A40;border-radius:10px;padding:10px;width:100%;color:white;padding:10px;">Unggah</a> -->
                                    </div>
                                </div>
                                <div class="modal fade" id="exampleModal{{ $detail_bayars->id_myjob }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Pembayaran</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <h5 class="card-title mb-4 text-center">{{ $detail_bayars->nama_pekerjaan }}</h5>
                                            <form class="row g-3" method="POST" action="{{ route('pemberi_kerja.create_pembayaran') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <p>Deskripsi Pekerjaan : </p>
                                                        <p style="background:#A3B18A;border-radius:10px;padding:10px;">{{ $detail_bayars->deskripsi_pekerjaan }}</p>
                                                    </div>
                                                    <div class="mb-3" hidden>
                                                        <p>Id Myjob : </p>
                                                        <input type="text" class="form-control" name="id_myjob" id="id_myjob" value="{{ $detail_bayars->id_myjob }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <p>Diberikan Kepada : </p>
                                                        <p style="background:#A3B18A;border-radius:10px;padding:10px;">{{ $detail_bayars->name }}</p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="jumlah_pembayaran" class="form-label">Terbilang : </label>
                                                        <input type="text" class="form-control" name="jumlah_pembayaran" id="jumlah_pembayaran" value="{{ $detail_bayars->fee_pekerjaan }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="bukti_pembayaran" class="form-label">Unggah Bukti Pembayaran</label>
                                                        <input onbeforeeditfocus="return false;" type="file" name="bukti_pembayaran" id="uploadFile">
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