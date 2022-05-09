@extends('layouts.affiliate')

@section('content')


<div id="affiliate-register">


    <!----- Header ----->
    <div id="header" class="bg-parallax"></div>


    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-left">

                    <div id="form">
                        <div class="form-inner">
                            <form method="POST" action="{{ route('affiliate.register') }}">
                                @csrf

                                <p class="title"> Create an account </p>
                                <div class="content-title-underline center"></div>


                                <label for="name"> <i class="fas fa-envelope-open-text"></i> name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Type name..">
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

                                <button type="submit" class="btn purple"> <i class="fa-solid fa-right-to-bracket"></i> SignUp</button>

                                <p class="mt-2 text-center d-flex justify-content-center"> Have an account ?<a href="{{route('affiliate.login')}}" class="form-question"> Login Now!</a>   </p>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('images/backgrounds/affiliate_register.png') }}" alt="affilate-login" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
