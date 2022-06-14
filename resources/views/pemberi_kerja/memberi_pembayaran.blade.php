@extends('pemberi_kerja.app')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="row">
            <div class="col-4">
                <div>
                    <form action="" method="GET">
                        <div class="input-group">
                            <input type="text" id="form1" class="form-control" placeholder="Search" name="pencarian" style="background-color: #E5E5E5"/>
                        </div>
                    </form>
                </div>
                @if (!$pekerjaan_onboard->isEmpty())
                @foreach($pekerjaan_onboard as $pekerjaans)
                <div class="mt-5">
                    <div class="card" style="background-color:#DAD7CD;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $pekerjaans->nama_pekerjaan }}</h5>
                            <p class="card-text">{{ $pekerjaans->deskripsi_pekerjaan }}</p>
                            <a href="#" class="btn mt-4" style="color:white;font-size:14px;background-color: #588157; ">Selesai</a>
                            <a href="#" class="btn mt-4" style="color:white;font-size:14px;background-color: #3A5A40; ">Cek Pembayaran</a>
                        </div>
                    </div>
                </div>   
                @endforeach
                @else
                <p class='text-center'>No record found.</p>
                @endif
            </div>
            <div class="col-sm-8">
                <h2>Pembayaran</h2>
                <div class="mt-5">
                    <div class="text-center" style="background-color:#DAD7CD;">
                        <p>Judul Pekerjaan</p>
                        <div class="mx-5">
                            <div class="card" style="height: 97%">
                                <div class="card-body">
                                    <div class="row g-5">
                                        <div class="col-4">
                                            <label for="deskripsi_pekerjaan" class="col-form-label mb-5">Deskripsi Pekerjaan</label>
                                        </div>
                                        <div class="col">
                                            <textarea type="text" id="deskripsi_pekerjaan" class="form-control mb-3" style="background-color:#A3B18A;"></textarea>
                                        </div>
                                    </div>
                                    <div class="row g-5">
                                        <div class="col-4">
                                            <label for="freelancer" class="col-form-label mb-5">Diperikan Kepada</label>
                                        </div>
                                        <div class="col">
                                            <textarea type="text" id="freelancer" class="form-control mb-3" style="background-color:#A3B18A;""></textarea>
                                        </div>
                                    </div>
                                    <div class="row g-5">
                                        <div class="col-4">
                                            <label for="fee" class="col-form-label mb-5">Terbilang</label>
                                        </div>
                                        <div class="col">
                                            <textarea type="text" id="fee" class="form-control mb-3" style="background-color:#A3B18A;"></textarea>
                                        </div>
                                    </div>
                                    <div class="row g-5">
                                        <div class="col-4">
                                        </div>
                                        <div class="col">
                                            <input type="file" class="form-control" id="inputBukti" placeholder="Bukti Bayar">
                                        </div>
                                    </div>
                                    <div class="row g-5">
                                        <div class="col-4">
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="col">
                                                    <a href="#" class="btn mt-4" style="color:white;font-size:14px;background-color: #E5E5E5; ">Edit</a>
                                                </div>
                                                <div class="col">
                                                    <a href="#" class="btn mt-4" style="color:white;font-size:14px;background-color: #3A5A40; ">Unggah</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection