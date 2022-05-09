@extends('layouts.web')

@section('content')
    <div id="auth">


        <!----- Header ----->
        <div id="header" class="bg-parallax"></div>

        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div id="content-box">
                        <h4 class="text-center"> <i class="fa-solid fa-unlock"></i> Reset Password </h4>
                        <div class="content-title-underline center mb-3"></div>

                        <form method="POST" action="{{ route('password.update') }}" class="p-3">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group row">
                                <label for="email" class=" col-form-label text-md-right"><i
                                        class="fas fa-envelope-open-text"></i> Email</label>

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ $email ?? old('email') }}" required autocomplete="email"
                                    autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <label for="password" class=" col-form-label text-md-right"> <i class="fas fa-lock"></i>
                                    Password </label>

                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="new-password" placeholder="Type Password..">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class=" col-form-label text-md-right"> <i
                                        class="fas fa-lock"></i> Confirm Password </label>

                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password"
                                    placeholder="Confirm Password..">
                            </div>

                            <div class="form-group row mb-0">
                                <button type="submit" class="btn purple">
                                    <i class="fa-solid fa-gear mr-1"></i> Reset Password
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
