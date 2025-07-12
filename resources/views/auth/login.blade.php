@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
        <form method="post" action="{{ route('loginverification') }}" class="bg-dark p-4 rounded">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required autofocus>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="d-flex justify-content-center mb-3">
                <button type="submit" class="btn btn-custom">Login</button>
            </div>

            <div class="text-center">
                <a href="{{ route('forgot.password')}}" class="text-info">Forgot username/password</a>
            </div>
        </form>
    </div>
</div>
@endsection
