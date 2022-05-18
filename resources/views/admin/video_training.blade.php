@extends('admin.app')
@section('content')
<div class="container">
    <div class="row mt-5 mb-5">
        <div class="col-12">
            <div class="row">
                <div class="col-2">
                    <h3>All courses</h3>
                </div>
                <div class="col-10">
                    <a href="{{ route('admin.upload_video') }}" class="btn" style="color:white;font-size:14px;background-color: #344E41; ">
                        Tambah Video Training
                    </a>
                </div>
            </div>
            
            
        </div>
    </div>
    <div class="row">
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
        @if(!$vid->isEmpty())
        @foreach($vid as $vids)
        <div class="col-4 mb-3">
            <div class="card">
                <iframe style="width:100%;height:200px;" src="{{ $vids->link_video }}" allowfullscreen></iframe>
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <p class="card-text">COURSE</p>
                        </div>
                        <div class="col-9">
                            <p class="card-text"><i class="fa-regular fa-clock" style="color:#63FF03;"></i> {{ $vids->durasi }}</p>
                        </div>
                    </div>
                    <p class="card-title mt-1"><strong>{{ $vids->nama_videotraining }}</strong></p>
                    <p class="card-text">{{ $vids->deskripsi_videotraining }}</p>
                    <a class="btn btn-danger" onclick="return confirm('Yakin hapus video?')" href="{{route('admin.delete_video', ['id'=>$vids->id])}}"><i class="fa fa-trash"></i></a>
                    <a class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#exampleModal{{ $vids->id }}"><i class="fa-solid fa-pen"></i>
                        
                    </a>
                    <!-- Button trigger modal -->
                    

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{ $vids->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Video Training</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                            
                                <form class="row g-3" method="POST" action="{{ route('admin.edit_video',['id'=>$vids->id]) }}">
                                    <div class="modal-body">
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
                                                <input id="inputJudul" type="text" class="form-control @error('judul_video') is-invalid @enderror" style="background-color: #A3B18A" value="{{ $vids->nama_videotraining }}" name="judul_video" required autocomplete="judul_video" autofocus>

                                                @error('judul_video')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="deksripsi" class="form-label">{{ __('Deskripsi Video') }}</label>
                                                <textarea name="deskripsi_video" id="" cols="20" rows="5" style="background-color: #A3B18A" id="deksripsi" class="form-control @error('deskripsi_video') is-invalid @enderror">{{ $vids->deskripsi_videotraining }}</textarea>
                                                @error('deskripsi_video')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <label for="inputLink" class="form-label">{{ __('Link Video') }}</label>
                                                <input id="inputLink" type="text" class="form-control @error('link_video') is-invalid @enderror" style="background-color: #A3B18A" value="{{ $vids->link_video }}" name="link_video" required autocomplete="link_video" autofocus>

                                                @error('link_video')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="inputDurasi" class="form-label">{{ __('Durasi (Jam/Menit/Detik)') }}</label>
                                                <input id="inputDurasi" type="time" step="1" class="form-control @error('durasi') is-invalid @enderror" style="background-color: #A3B18A" value="{{ $vids->durasi }}" name="durasi" required autocomplete="durasi" autofocus>
                                                @error('durasi')
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
        @else
        <p class='text-center'>Tidak ada video.</p>
        @endif
    </div>
</div>
@endsection