@extends('layouts.app')
@section('content')
<title>Sign In</title>
<style>
    body{
        background-image: url('https://www.sheknows.com/wp-content/uploads/2019/11/woman-shopping-black-friday.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
    }
    .login-form{
        margin:10em;
    }
</style>
<main class="login-form" >
    <div class="cotainer" >
        <div class="row justify-content-center">
            <div class="col-md-4">
                
                <div class="card">
                
                    <h3 class="card-header text-center">Sign In As Admin</h3>
                    <div class="card-body" >
                        <form method="POST" action="{{ route('admin') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Email" id="email" class="form-control" name="email" required
                                    autofocus>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Sign In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection