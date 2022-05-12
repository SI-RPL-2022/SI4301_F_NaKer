@extends('app')
@section('content')

<!-- @if(Auth::guard('web')->user()->cv != '')
<style>
    
    input[type=file]{
        background:#A3B18A;
        border: 1px solid #b5bcc7;
        width: 100%;
        text-align: left;
        line-height: 38px;
        padding: 10px;
        border-radius:10px;
        color: transparent !important;
    }
    input[type=file]::before {
        content: "{{Auth::guard('web')->user()->cv}}";
        color: black;
        margin-right: 10px; 
    }

    input[type="file"]::-webkit-file-upload-button {
        background: #344E41;
        color: #FFFFFF;
        line-height: 38px;
        padding: 0px 20px;
        margin-right:0;
        border: none;
        float: right;
        border-radius:10px;
    }
</style>

@endif -->
@php
$cv = Auth::guard('web')->user()->cv;
@endphp
<script>
    var isFile = JSON.parse("{{ json_encode($cv) }}");
    if( isFile != '' AND document.getElementById("uploadFile").files.length == 0 ){

        <style jsx>{`
            input[type=file]{
        background:#A3B18A;
        border: 1px solid #b5bcc7;
        width: 100%;
        text-align: left;
        line-height: 38px;
        padding: 10px;
        border-radius:10px;
        color: transparent !important;
    }
    input[type=file]::before {
        content: "{{Auth::guard('web')->user()->cv}}";
        color: black;
        margin-right: 10px; 
    }

    input[type="file"]::-webkit-file-upload-button {
        background: #344E41;
        color: #FFFFFF;
        line-height: 38px;
        padding: 0px 20px;
        margin-right:0;
        border: none;
        float: right;
        border-radius:10px;
    }
     `}</style>
    }

    if( document.getElementById("uploadFile").files.length != 0 ){
        <style jsx>{`
            input[type=file]{
        background:#A3B18A;
        border: 1px solid #b5bcc7;
        width: 100%;
        text-align: left;
        line-height: 38px;
        padding: 10px;
        border-radius:10px;
    }
    input[type=file]::before {
        color: black;
        margin-right: 10px; 
    }
    input[type="file"]::-webkit-file-upload-button {
        background: #344E41;
        color: #FFFFFF;
        line-height: 38px;
        padding: 0px 20px;
        margin-right:0;
        border: none;
        float: right;
        border-radius:10px;
    }
     `}</style>
    }
</script>
@if(Auth::guard('web')->user()->cv === '')
<style>
    
    input[type=file]{
        background:#A3B18A;
        border: 1px solid #b5bcc7;
        width: 100%;
        text-align: left;
        line-height: 38px;
        padding: 10px;
        border-radius:10px;
    }
    input[type=file]::before {
        color: black;
        margin-right: 10px; 
    }

    input[type="file"]::-webkit-file-upload-button {
        background: #344E41;
        color: #FFFFFF;
        line-height: 38px;
        padding: 0px 20px;
        margin-right:0;
        border: none;
        float: right;
        border-radius:10px;
    }
</style>
@endif


<div class="container mt-4">
    
    <div class="row">
        <div class="col-12 mb-3">
            <h2 class="mb-4">Melamar Pekerjaan</h2>
        </div>
        <div class="col-4 mb-4">
            <div class="card" style="background-color:#DAD7CD;">
                <div class="card-body">
                    <p class="card-title"><strong>Judul Pekerjaan :</strong> <br>{{ $pekerjaan->nama_pekerjaan??null }}</p>
                    <p class="card-text"><strong>Deksripsi Pekerjaan :</strong> <br>{{ $pekerjaan->deskripsi_pekerjaan??null }}</p>
                </div>
            </div>
        </div>
        <div class="col-8 mb-4">
            <div class="card" style="background-color:#DAD7CD;">
                <div class="card-body">
                    <div class="container">
                        <h5 class="card-title mb-4">Lengkapi Dokumen</h5>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Curriculum Vitae</label>
                            <input onbeforeeditfocus="return false;" type="file" name="file" id="uploadFile">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection