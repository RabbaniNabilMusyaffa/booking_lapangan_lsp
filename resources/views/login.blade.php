@extends('layouts.auth')
@section('content')
<style>
  @font-face {
      font-family: 'Plus Jakarta Sans';
      src: url('fonts/PlusJakartaSans-Medium.ttf');
  }

  body {
      font-family: 'Plus Jakarta Sans', sans-serif;
      background-color: #f0f0f0; /* Set background color to light gray */
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh; /* Set the height to full viewport height */
  }



</style>
  <div class="row justify-content-center">
    <div class="col-6 login">
      @if (session('failed'))
        <div class="alert alert-danger" role="alert">
          {{ session('failed') }}
        </div>
      @endif
      <div class="card">
        <div class="card-header bg-primary">
          <h4 class="text-center" style="color: #f0f0f0;">Login</h4>
        </div>
        <div class="card-body">
          <form method="POST">
            @csrf
            <div class="mb-3">
              <label class="form-label border-success" for="email">Email</label>
              <input class="form-control" type="email" name="email" id="email">
            </div>
            <div class="mb-3">
              <label class="form-label" for="password">Password</label>
              <input class="form-control" type="password" name="password" id="password">
            </div>
            <button class="btn btn-primary w-100" style="color: #f0f0f0;">Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
