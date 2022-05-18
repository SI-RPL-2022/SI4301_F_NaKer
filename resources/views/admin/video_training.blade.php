@extends('app')
@section('content')
<div class="container">
    <div class="row mt-5 mb-5">
        <div class="col-12">
            <h3>All courses</h3>
        </div>
    </div>
    <div class="row">
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