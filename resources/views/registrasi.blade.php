@extends('app')
@section('content')
    <div style="margin-left: 15% ; margin-right: 15%; margin-top:5%">
        <form class="row g-3">
            <div class="col-md-6">
                <label for="inputFirstName" class="form-label">Registrasi sebagai</label>
                <select class="form-select" aria-label="Default select example" style="background-color: #A3B18A">
                    <option selected disabled>Open this select menu</option>
                    <option value="1">Perusahaan</option>
                    <option value="2">Pekerja</option>
                    <option value="3">Admin</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="inputUsername" class="form-label">Username</label>
                <input type="text" class="form-control" id="inputUsername" style="background-color: #A3B18A">
            </div>
            <div class="col-md-6">
                <label for="inputFirstName" class="form-label">First Name</label>
                <input type="email" class="form-control" id="inputFirstName" style="background-color: #A3B18A">
            </div>
            <div class="col-md-6">
                <label for="inputLastName" class="form-label">Last Name</label>
                <input type="password" class="form-control" id="inputLastName" style="background-color: #A3B18A">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Email Address</label>
                <input type="text" class="form-control" id="inputAddress" style="background-color: #A3B18A">
            </div>
            <div class="col-12">
                <label for="inputPassword" class="form-label">Password</label>
                <input type="text" class="form-control" id="inputPassword" style="background-color: #A3B18A">
            </div>
            <div class="col-12" style="padding-bottom: 2%;">
                <label for="inputConfirmPassword" class="form-label">Confirm Password</label>
                <input type="text" class="form-control" id="inputConfirmPassword" style="background-color: #A3B18A">
            </div>
            <div class="container" style="text-align: center; background-color: #344E41; width: 200px; height: 50px;border-radius: 5%;">
                <button type="submit" class="btn" style="color:white;font-size:25px">Register</button>
            </div>
            <div class="container" style="text-align: center; padding-top: 2%;">
                <p>Already have an account? <a href="login" style="color:black">Log In</a>.</p>
            </div>
        </form>
    </div>

@endsection