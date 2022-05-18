@extends('pemberi_kerja.app')
@section('content')
<div class="container mt-4 ">
    <div class="row">
        <div class="col-4 mb-4">
            <h2 class="mb-4">Daftar Pekerjaan</h2>
        </div>
        <div class="col-8 mb-4">
            <div class="row">
                <div class="col-6">
                    <form action="{{ route('pemberi_kerja.hasil_pekerjaan') }}" method="GET">
                        <div class="input-group">
                            <input type="text" id="form1" class="form-control" placeholder="Cari Nama Pekerjaan" name="pencarian"/>
                                
                            <button type="submit" class="btn" style="background-color:#344E41;color:white;">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <a href="{{ route('pemberi_kerja.tambah_kerja') }}" class="btn mt-4" style="color:white;font-size:14px;background-color: #344E41; ">
                Tambah Pekerjaan
            </a>
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
        @error('judul_pekerjaan')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
        @error('deskripsi_pekerjaan')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
        @error('gaji')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
        @error('kategori')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
        @error('deadline_daftar')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
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
                        <a class="text-dark text-decoration-none " href="{{ route('pemberi_kerja.pekerjaan_kategori',['index'=>$kategoris->kategori]) }}"><li class="list-group-item" style="background-color: #A3B18A;color: white;"><i class="fa-solid fa-circle fa-2xs"></i> {{ $kategoris->kategori }}</li></a>
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
                <div class="col-sm-6 mb-3">
                    <div class="card" style="background-color:#DAD7CD;">
                        <div class="card-body">
                            <p class="card-title"><strong>{{ $pekerjaans->nama_pekerjaan }}</strong> ({{ $pekerjaans->name }}, <i class="" style="color:#636363;">{{ $pekerjaans->alamat }}</i>)</p>
                            <p class="card-text">{{ $pekerjaans->deskripsi_pekerjaan }}</p>
                            <a class="btn btn-danger" onclick="return confirm('Yakin hapus pekerjaan?')" href="{{route('pemberi_kerja.delete_pekerjaan', ['id'=>$pekerjaans->id_pekerjaan])}}"><i class="fa fa-trash"></i></a>
                            <a class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#exampleModal{{ $pekerjaans->id_pekerjaan }}"><i class="fa-solid fa-pen"></i></a>
                           

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{ $pekerjaans->id_pekerjaan }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Pekerjaan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                    
                                        <form class="row g-3" method="POST" action="{{ route('pemberi_kerja.edit_pekerjaan',['id'=>$pekerjaans->id_pekerjaan]) }}">
                                            <div class="modal-body">
                                                <div class="container row">
                                                @csrf
                                                <div class="col-md-12 mb-3">
                                                    <label for="inputJudul" class="form-label">{{ __('Judul Pekerjaan') }}</label>
                                                    <input id="inputJudul" type="text" class="form-control @error('judul_pekerjaan') is-invalid @enderror" style="background-color: #A3B18A" name="judul_pekerjaan" value="{{ $pekerjaans->nama_pekerjaan }}" required autocomplete="judul_pekerjaan" autofocus>

                                                    @error('judul_pekerjaan')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="deksripsi" class="form-label">{{ __('Deskripsi Pekerjaan') }}</label>
                                                    <textarea name="deskripsi_pekerjaan" id="" cols="20" rows="5" style="background-color: #A3B18A" id="deksripsi" class="form-control @error('deskripsi_pekerjaan') is-invalid @enderror">{{ $pekerjaans->deskripsi_pekerjaan }}</textarea>
                                                    @error('deskripsi_pekerjaan')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12 mb-3">
                                                    <label for="inputGaji" class="form-label">{{ __('Perkiraan Gaji') }}</label>
                                                    <input id="inputGaji" type="number" class="form-control @error('gaji') is-invalid @enderror" style="background-color: #A3B18A" name="gaji" value="{{ $pekerjaans->fee_pekerjaan }}" required autocomplete="gaji" autofocus>

                                                    @error('gaji')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="inputKategori" class="form-label">{{ __('Kategori') }}</label>
                                                    <input id="inputKategori" type="text" class="form-control @error('kategori') is-invalid @enderror" style="background-color: #A3B18A" name="kategori" value="{{ $pekerjaans->kategori }}" required autocomplete="kategori" autofocus>

                                                    @error('kategori')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="inputDeadline" class="form-label">{{ __('Deadline Daftar') }}</label>
                                                    <input id="inputDeadline" type="datetime-local" class="form-control @error('deadline_daftar') is-invalid @enderror" style="background-color: #A3B18A" name="deadline_daftar" value="{{ date('Y-m-d\TH:i', strtotime($pekerjaans->deadline)) }}" required autocomplete="deadline_daftar" autofocus>

                                                    @error('deadline_daftar')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                        
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