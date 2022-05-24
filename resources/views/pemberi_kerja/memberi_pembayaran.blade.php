@extends('pemberi_kerja.app')
@section('content')
<div class="container mt-5">
  <!-- Stack the columns on mobile by making one full-width and the other half-width -->
    <div class="row">
        <div class="col-6 col-md-4">
            <div class="input-group">
                <input type="text" id="form1" class="form-control" placeholder="Search" name="pencarian" style="width: 200px;"/>   
            </div>
            <div>

            </div>
        </div>
        <div class="col-md-6">
            <h3>Pembayaran</h3>
        </div>
    </div>
</div>
@endsection