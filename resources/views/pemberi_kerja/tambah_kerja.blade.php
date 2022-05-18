@extends('pemberi_kerja.app')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <h3>Tambah Pekerjaan</h3>
            
            <form class="row g-3" method="POST" action="{{ route('pemberi_kerja.create_kerja') }}">
                <div class="card mt-5" style="background-color:#DAD7CD;">
                    <div class="card-body mt-4 mb-4">
                        <div class="container row">
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
                        @csrf
                            <div class="col-md-12 mb-3">
                                <label for="inputJudul" class="form-label">{{ __('Judul Pekerjaan') }}</label>
                                <input id="inputJudul" type="text" class="form-control @error('judul_pekerjaan') is-invalid @enderror" style="background-color: #A3B18A" name="judul_pekerjaan" value="{{ old('judul_pekerjaan') }}" required autocomplete="judul_pekerjaan" autofocus>

                                @error('judul_pekerjaan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="deksripsi" class="form-label">{{ __('Deskripsi Pekerjaan') }}</label>
                                <textarea name="deskripsi_pekerjaan" id="" cols="20" rows="5" style="background-color: #A3B18A" id="deksripsi" class="form-control @error('deskripsi_pekerjaan') is-invalid @enderror"></textarea>
                                @error('deskripsi_pekerjaan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="inputGaji" class="form-label">{{ __('Perkiraan Gaji') }}</label>
                                <input id="inputGaji" type="number" class="form-control @error('gaji') is-invalid @enderror" style="background-color: #A3B18A" name="gaji" value="{{ old('gaji') }}" required autocomplete="gaji" autofocus>

                                @error('gaji')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="inputKategori" class="form-label">{{ __('Kategori') }}</label>
                                <input id="inputKategori" type="text" class="form-control @error('kategori') is-invalid @enderror" style="background-color: #A3B18A" name="kategori" value="{{ old('kategori') }}" required autocomplete="kategori" autofocus>

                                @error('kategori')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="inputDeadline" class="form-label">{{ __('Deadline Daftar') }}</label>
                                <input id="inputDeadline" type="datetime-local" class="form-control @error('deadline_daftar') is-invalid @enderror" style="background-color: #A3B18A" name="deadline_daftar" value="{{ old('deadline_daftar') }}" required autocomplete="deadline_daftar" autofocus>

                                @error('deadline_daftar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
                <div class="container" style="text-align: center;">
                    <button type="submit" class="btn" style="background-color: #344E41;color:white;width: 200px;font-size:20px">
                        {{ __('Tambah') }}
                    </button>
                </div>
            </form>
                    
        </div>
        <div class="col-2"></div>
    </div>
</div>
@endsection