@extends('admin.app')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <h3>Upload Video</h3>
            
            <form class="row g-3" method="POST" action="{{ route('admin.create_video') }}">
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
                                <label for="inputJudul" class="form-label">{{ __('Judul Video') }}</label>
                                <input id="inputJudul" type="text" class="form-control @error('judul_video') is-invalid @enderror" style="background-color: #A3B18A" name="judul_video" required autocomplete="judul_video" autofocus>

                                @error('judul_video')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="deksripsi" class="form-label">{{ __('Deskripsi Video') }}</label>
                                <textarea name="deskripsi_video" id="" cols="20" rows="5" style="background-color: #A3B18A" id="deksripsi" class="form-control @error('deskripsi_video') is-invalid @enderror"></textarea>
                                @error('deskripsi_video')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="inputLink" class="form-label">{{ __('Link Video') }}</label>
                                <input id="inputLink" type="text" class="form-control @error('link_video') is-invalid @enderror" style="background-color: #A3B18A" name="link_video" required autocomplete="link_video" autofocus>

                                @error('link_video')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="inputDurasi" class="form-label">{{ __('Durasi (Jam/Menit/Detik)') }}</label>
                                <input id="inputDurasi" type="time" step="1" class="form-control @error('durasi') is-invalid @enderror" style="background-color: #A3B18A" name="durasi" required autocomplete="durasi" autofocus>
                                @error('durasi')
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