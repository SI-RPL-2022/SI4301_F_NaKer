@extends('app')
@section('content')

<!-- <style>
    
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
</style> -->

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
                        <form action="{{ route('freelancer.applied', ['id'=>$pekerjaan->id_pekerjaan]) }}" method="post" enctype="multipart/form-data">
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
                            @if(Auth::guard('web')->user()->cv != '')
                            <div class="cv">
                                <div class="mt-1">
                                    <label class="form-label"><strong>Curriculum Vitae*</strong> <i class="" style="color:#636363;">file ter-upload : {{Auth::guard('web')->user()->cv}}</i> </label>
                                    <embed src="/dokumen/cv/{{Auth::guard('web')->user()->cv}}" style="width:100%;height:250px;" type="application/pdf">
                                </div>
                                <div class="mb-3">
                                    <label for="uploadFile" class="form-label">Ganti File</label>
                                    <input onbeforeeditfocus="return false;" type="file" name="cvfile" id="uploadFile">
                                </div>
                            </div>
                            @endif
                            @if(Auth::guard('web')->user()->cv == '')
                            <div class="cv">
                                <div class="mt-1">
                                    <label class="form-label"><strong>Curriculum Vitae*</strong> <i class="" style="color:#636363;">belum ada cv ter-upload</i> </label>
                                </div>
                                <div class="mb-3">
                                    <input onbeforeeditfocus="return false;" type="file" name="cvfile" id="uploadFile">
                                </div>
                            </div>
                            @endif

                            @if(Auth::guard('web')->user()->portofolio != '')
                            <div class="portofolio">
                                <div class="mt-1">
                                    <label class="form-label"><strong>Portofolio*</strong> <i class="" style="color:#636363;">file ter-upload : {{Auth::guard('web')->user()->portofolio}}</i> </label>
                                    <embed src="/dokumen/portofolio/{{Auth::guard('web')->user()->portofolio}}" style="width:100%;height:250px;" type="application/pdf">
                                </div>
                                <div class="mb-3">
                                    <label for="uploadFile" class="form-label">Ganti File</label>
                                    <input onbeforeeditfocus="return false;" type="file" name="cvfile" id="uploadFile">
                                </div>
                            </div>
                            @endif
                            @if(Auth::guard('web')->user()->portofolio == '')
                            <div class="portofolio">
                                <div class="mt-1">
                                    <label class="form-label"><strong>Portofolio*</strong> <i class="" style="color:#636363;">belum ada portofolio ter-upload</i> </label>
                                </div>
                                <div class="mb-3">
                                    <input onbeforeeditfocus="return false;" type="file" name="portofile" id="uploadFile">
                                </div>
                            </div>
                            @endif


                            @if(Auth::guard('web')->user()->sertifikat != '')
                            <div class="sertifikat">
                                <div class="mt-1">
                                    <label class="form-label"><strong>Sertifikat (optional)</strong> <i class="" style="color:#636363;">file ter-upload : {{Auth::guard('web')->user()->portofolio}}</i> </label>
                                    <embed src="/dokumen/sertifikat/{{Auth::guard('web')->user()->sertifikat}}" style="width:100%;height:250px;" type="application/pdf">
                                </div>
                                <div class="mb-5">
                                    <label for="uploadFile" class="form-label">Ganti File</label>
                                    <input onbeforeeditfocus="return false;" type="file" name="cvfile" id="uploadFile">
                                </div>
                            </div>
                            @endif
                            @if(Auth::guard('web')->user()->sertifikat == '')
                            <div class="sertifikat">
                                <div class="mt-1">
                                    <label class="form-label"><strong>Sertifikat (optional)</strong> <i class="" style="color:#636363;">belum ada sertifikat ter-upload</i> </label>
                                </div>
                                <div class="mb-5">
                                    <input onbeforeeditfocus="return false;" type="file" name="sertifikatfile" id="uploadFile">
                                </div>
                            </div>
                            @endif
                            <button type="submit" class="btn text-light end-0" style="float:right; background-color:#344E41;border-radius:10px;width: 110px; height: 50px;">Apply</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection