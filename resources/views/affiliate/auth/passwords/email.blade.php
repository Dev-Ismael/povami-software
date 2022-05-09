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

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group">
                                <label for="email" class="col-form-label text-md-right"> <i
                                        class="fas fa-envelope-open-text"></i> Email Address </label>

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email"
                                    placeholder="Type Email..">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row mb-0 justify-content-center">
                                <button type="submit" class="btn purple mb-2">
                                    <i class="fa-solid fa-paper-plane"></i> Send Password Reset Link
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
