@extends('layouts.web')

@section('content')


<div id="auth">

    <!----- Header ----->
    <div id="header" class="bg-parallax"></div>


    <div id="form">
        <div class="form-inner">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <p class="title"> Login To Account </p>
                <div class="content-title-underline center"></div>


                <label for="email"> <i class="fas fa-envelope-open-text"></i> Email</label>
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Type Email..">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <br>



                <label for="password"> <i class="fas fa-lock"></i> Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Type Password..">
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

                <a href="{{route('register')}}" class="form-question">Don't Have an account yet ?!</a>
                <button type="submit" class="btn purple"> <i class="fa-solid fa-right-to-bracket"></i> Login</button>

            </form>
        </div>
    </div>


</div>

@endsection
