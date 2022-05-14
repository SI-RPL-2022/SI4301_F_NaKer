@extends('app')
@section('content')
<div class="container mt-4 ">
    <div class="row">
        <div class="col-4 mb-4">
            
        </div>
        <div class="col-8 mb-4">
            <h2 class="mb-4">Pembayaran</h2>
            @if (Session::get('fail'))
                <div class="alert alert-danger">
                    {{ Session::get('fail') }}
                </div>
            @endif
            @if (Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ Session::get('success') }} <i class="fa-solid fa-circle-check"></i></p>
                </div>
            @endif
        </div>
        <div class="col-4 mb-4">
            <div class="row">
                @if (!$pekerjaan_onboard->isEmpty())
                @foreach($pekerjaan_onboard as $pekerjaans)
                <div class="col-11 mb-3">
                    <div class="card" style="background-color:#DAD7CD;">
                        <div class="card-body">
                            <p class="card-title"><strong>{{ $pekerjaans->nama_pekerjaan }}</strong> ({{ $pekerjaans->name }}, <i class="" style="color:#636363;">{{ $pekerjaans->alamat }}</i>)</p>
                            <p class="card-text">{{ $pekerjaans->deskripsi_pekerjaan }}</p>
                            @if($pekerjaans->status_pembayaran == 'Belum Bayar')
                            <a href="{{ route('freelancer.selesai_bayar', ['id'=>$pekerjaans->id]) }}" class="btn text-light end-0" style="background-color:#588157;">Selesai</a>
                            @endif
                            <a href="{{ route('freelancer.check_pembayaran', ['id'=>$pekerjaans->id]) }}" class="btn text-light end-0" style="float:right; background-color:#344E41;">Cek Pembayaran</a>
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
                            @if(Route::is('freelancer.pembayaran'))
                            <h5 class="card-title mb-4 text-center">Pilih pembayaran yang ingin dilihat</h5>
                            @endif
                            @if(Route::is('freelancer.check_pembayaran', ['id'=>$pekerjaans->id]))
                                @foreach($detail_bayar as $detail_bayars)
                                <h5 class="card-title mb-4 text-center">{{ $detail_bayars->nama_pekerjaan }}</h5>
                                <div class="row g-3 align-items-center">
                                    <div class="col-3">
                                    </div>
                                    <div class="col-3">
                                        <p>Deskripsi Pekerjaan : </p>
                                    </div>
                                    <div class="col-6">
                                        <p style="background:#A3B18A;border-radius:10px;padding:10px;">{{ $detail_bayars->deskripsi_pekerjaan }}</p>
                                    </div>
                                </div>
                                <div class="row g-3 align-items-center">
                                    <div class="col-3">
                                    </div>
                                    <div class="col-3">
                                        <p>Sudah Terima Dari : </p>
                                    </div>
                                    <div class="col-6">
                                        <p style="background:#A3B18A;border-radius:10px;padding:10px;">{{ $detail_bayars->name }}</p>
                                    </div>
                                </div>
                                <div class="row g-3 align-items-center">
                                    <div class="col-3">
                                    </div>
                                    <div class="col-3">
                                        <p>Terbilang : </p>
                                    </div>
                                    <div class="col-6">
                                        <p style="background:#A3B18A;border-radius:10px;padding:10px;">Rp {{ number_format($detail_bayars->fee_pekerjaan,0,',','.') }}
                                        @if($pekerjaans->status_pembayaran == 'Sudah Bayar')
                                        <i class="" style="color:#636363;">(Sudah dibayar)</i>
                                        @endif
                                        </p>
                                    </div>
                                </div>
                                
                                <div class="row g-3 align-items-center mt-5 mb-5">
                                    <div class="col-6">
                                    </div>
                                    <div class="col-4">
                                        <label style="background:#588157;border-radius:10px;padding:10px;width:100%;color:white;padding:10px;"><i class="fa-regular fa-file-lines"></i> Bukti Bayar</label>
                                    </div>
                                    <div class="col-2">
                                        <a href="/dokumen/bukti_bayar/{{ $detail_bayars->bukti_pembayaran }}" class="btn text-light end-0" style="background-color:#344E41;padding:9px;border-radius:10px;" download>Unduh</a>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection