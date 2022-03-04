@extends('layouts.app')

@section('content')


<div id="register">



    <div id="header" class="bg-parallax">
                
    </div>


    <div id="form">
        <div class="form-inner">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <p class="title"> Login To Dashboard </p>
                <div class="content-title-underline"></div>


                <label for="email"> <i class="fas fa-envelope-open-text"></i> Email</label>
                <input type="text" name="email" class="form-control" placeholder="Type Email..">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <br>


                <label for="password"> <i class="fas fa-lock"></i> Password</label>
                <input type="password" name="password" class="form-control" placeholder="Type password..">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <br>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
                <br>


                <input type="submit" class="btn btn-success" value="Login">

            </form>
        </div>
    </div>

    


@endsection
