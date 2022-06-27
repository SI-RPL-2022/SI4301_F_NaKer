@extends('app')
@section('content')
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
                            @if($statuss->status == 'Tertolak')
                                <a href="#" class="btn mt-4" style="color:white;font-size:14px;background-color: black; ">Ditolak</a>
                                <a href="{{route('freelancer.delete_seleksi', ['id'=>$statuss->id_myjob])}}" onclick="return confirm('Yakin hapus ?')" class="btn btn-danger mt-4" style="color:white;font-size:14px; ">Delete</a>
                            @elseif($statuss->status == 'Terpilih')
                                <a href="#" class="btn mt-4" style="color:white;font-size:14px;background-color: #3A5A40; ">Terpilih</a>
                            @elseif($statuss->status == 'Tahap Seleksi')
                                <a href="#" class="text-white-50 btn mt-4" style="font-size:14px;background-color: #3A5A40; ">Tahap Seleksi</a>
                            @elseif($statuss->status == 'Selesai')
                                <a href="#" class="text-white-50 btn mt-4" style="font-size:14px;background-color: #3A5A40;">Selesai</a>
                            @endif
                            <a href="{{ route('freelancer.detail_seleksi', ['id'=>$statuss->id_myjob]) }}" class="btn mt-4" style="color:white;font-size:14px;background-color: #3A5A40; ">Detail Seleksi</a>
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
                            @if(Route::is('freelancer.status_seleksi'))
                            <h5 class="card-title mb-4 text-center">Pilih status seleksi pekerjaan yang ingin dilihat</h5>
                            @endif
                            @if (!$status_onboard->isEmpty())
                            @if(Route::is('freelancer.detail_seleksi', ['id'=>$statuss->id_myjob]))
                                @foreach($detail_onboard as $detail_seleksi)
                                    <h5 class="card-title mb-4 text-center">{{ $detail_seleksi->nama_pekerjaan }}</h5>
                                    <div class="row g-5 align-items-center">
                                        <div class="col-4">
                                            <p>Deskripsi Pekerjaan : </p>
                                        </div>
                                        <div class="col">
                                            <p style="background:#A3B18A;border-radius:10px;padding:10px;">{{ $detail_seleksi->deskripsi_pekerjaan }}</p>
                                        </div>
                                    </div>
                                    <div class="row g-5 align-items-center">
                                        <div class="col-4">
                                            <p>Kategori Pekerjaan : </p>
                                        </div>
                                        <div class="col">
                                            <p style="background:#A3B18A;border-radius:10px;padding:10px;">{{ $detail_seleksi->kategori }}</p>
                                        </div>
                                    </div>
                                    <div class="row g-5 align-items-center">
                                        <div class="col-4">
                                            <p>Perusahaan : </p>
                                        </div>
                                        <div class="col">
                                            <p style="background:#A3B18A;border-radius:10px;padding:10px;">{{ $detail_seleksi->name }}</p>
                                        </div>
                                    </div>
                                    <div class="row g-5 align-items-center">
                                        <div class="col-4">
                                            <p>No Perusahaan : </p>
                                        </div>
                                        <div class="col">
                                            <p style="background:#A3B18A;border-radius:10px;padding:10px;">{{ $detail_seleksi->no_telepon }}</p>
                                        </div>
                                    </div>
                                    <div class="row g-5 align-items-center">
                                        <div class="col-4">
                                            <p>Deadline Pekerjaan: </p>
                                        </div>
                                        <div class="col">
                                            <p style="background:#A3B18A;border-radius:10px;padding:10px;">{{ $detail_seleksi->deadline }}</p>
                                        </div>
                                    </div>
                                    <div class="row g-5 align-items-center">
                                        <div class="col-4">
                                            <p>Status Seleksi: </p>
                                        </div>
                                        <div class="col">
                                            <p style="background:#A3B18A;border-radius:10px;padding:10px;">{{ $detail_seleksi->status }}</p>
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