@extends('layouts.web')

@section('content')


<div id="auth">


    <!----- Header ----->
    <div id="header" class="bg-parallax"></div>


    <div id="form">
        <div class="form-inner">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <p class="title"> Login To Account </p>
                <div class="content-title-underline center"></div>


                <label for="name"> <i class="fas fa-user"></i> Username</label>
                <input type="text" name="name" class="form-control"  @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus  placeholder="Type Username..">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <br>

                <label for="email"> <i class="fas fa-envelope-open-text"></i> Email Address </label>
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

                <label for="password-confirm"> <i class="fas fa-lock"></i> Confirm Password </label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm password.." required autocomplete="new-password">
                <br>

                <button type="submit" class="btn purple"> <i class="fa-solid fa-right-to-bracket"></i> SignUp</button>

                <p class="mt-2 text-center"> Have an account ?<a href="{{route('login')}}" class="form-question "> Login Now!</a>   </p>


            </form>
        </div>
    </div>

</div>

@endsection
