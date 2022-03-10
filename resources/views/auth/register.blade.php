@extends('layouts.web')

@section('content')


<div id="register">

    <div id="form">
        <div class="form-inner">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                
                <p class="title"> Login To Dashboard </p>
                <div class="content-title-underline"></div>


                <label for="name"> <i class="fas fa-user"></i> Username</label>
                <input type="text" name="name" class="form-control"  @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus  placeholder="Type Username..">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <br>

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

                <label for="password-confirm"> <i class="fas fa-lock"></i> Confirm Password </label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm password.." required autocomplete="new-password">
                <br>


                <input type="submit" class="btn btn-success" value="SignUp">

            </form>
        </div>
    </div>
    
</div>

@endsection
