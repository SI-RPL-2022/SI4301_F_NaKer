@extends('pemberi_kerja.app')
@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-4 mb-4">
        </div>
        <div class="col-8 mb-4">
            <h2 class="mb-4">Riwayat Pembayaran</h2>
        </div>
        <div class="col-4 mb-4">
            @if (!$riwayat_onboard->isEmpty())
            @foreach($riwayat_onboard as $riwayats)
            <div class="mb-3">
                <div class="card" style="background-color:#DAD7CD;">
                    <div class="card-body">
                        <h5 class="card-title"><strong>{{ $riwayats->nama_pekerjaan }}</strong></h5>
                        <p class="card-text">{{ $riwayats->deskripsi_pekerjaan }}</p>
                        <a href="#" class="btn mt-4" style="color:white;font-size:14px;background-color: #588157; ">Selesai</a>
                        <a href="{{ route('pemberi_kerja.detail_riwayat', ['id'=>$riwayats->id]) }}" class="btn mt-4" style="color:white;font-size:14px;background-color: #3A5A40; ">Detail Pembayaran</a>
                    </div>
                </div>
            </div>   
            @endforeach
            @else
            <p class='text-center'>No record found.</p>
            @endif
        </div>
        <div class="col-8 mb-4">
            <div class="row">
                <div class="card" style="background-color:#DAD7CD;">
                    <div class="card-body">
                        <div class="container">
                            @if(Route::is('pemberi_kerja.riwayat_pembayaran'))
                            <h5 class="card-title mb-4 text-center">Pilih pembayaran yang ingin dilihat</h5>
                            @endif
                            @if(!$riwayat_onboard->isEmpty()) 
                            @if(Route::is('pemberi_kerja.detail_riwayat', ['id'=>$riwayats->id]))
                            @foreach($detailRiwayat_onboard as $detail_riwayats)
                                <h5 class="card-title mb-4 text-center">{{ $detail_riwayats->nama_pekerjaan }}</h5>
                                <div class="row g-5 align-items-center">
                                    <div class="col-4">
                                        <p>Deskripsi Pekerjaan : </p>
                                    </div>
                                    <div class="col">
                                        <p style="background:#A3B18A;border-radius:10px;padding:10px;">{{ $detail_riwayats->deskripsi_pekerjaan }}</p>
                                    </div>
                                </div>
                                <div class="row g-5 align-items-center">
                                    <div class="col-4">
                                        <p>Kategori : </p>
                                    </div>
                                    <div class="col">
                                        <p style="background:#A3B18A;border-radius:10px;padding:10px;">{{ $detail_riwayats->kategori }}</p>
                                    </div>
                                </div>
                                <div class="row g-5 align-items-center">
                                    <div class="col-4">
                                        <p>Diberikan Kepada : </p>
                                    </div>
                                    <div class="col">
                                        <p style="background:#A3B18A;border-radius:10px;padding:10px;">{{ $detail_riwayats->name }}</p>
                                    </div>
                                </div>
                                <div class="row g-5 align-items-center">
                                    <div class="col-4">
                                        <p>Terbilang : </p>
                                    </div>
                                    <div class="col">
                                        <p style="background:#A3B18A;border-radius:10px;padding:10px;">Rp {{ number_format($detail_riwayats->fee_pekerjaan,0,',','.')}}</p>
                                    </div>
                                </div>
                                <div class="row g-5 align-items-center">
                                    <div class="col-4">
                                        <p>Status : </p>
                                    </div>
                                    <div class="col">
                                        <p style="background:#A3B18A;border-radius:10px;padding:10px;">{{ $detail_riwayats->status_pembayaran }}</p>
                                    </div>
                                </div>
                                <div class="row g-5 align-items-center">
                                    <div class="col-4">
                                        <p>Bukti Pembayaran : </p>
                                    </div>
                                    <div class="col">
                                        <embed src="/gambar/buktiPembayaran/{{$detail_riwayats->bukti_pembayaran}}" style="width:100%;height:250px;" type="application/pdf">
                                        <label class="form-label"><i class="" style="color:#636363;">file ter-upload : {{$detail_riwayats->bukti_pembayaran}}</i> </label>
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