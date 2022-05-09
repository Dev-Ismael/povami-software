@extends('layouts.web')

@section('content')
    <div id="auth">


        <!----- Header ----->
        <div id="header" class="bg-parallax"></div>

        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div id="content-box">

                            <h4 class="text-center"> <i class="fa-solid fa-clipboard-check"></i>Verify Your Email Address</h4>
                            <div class="content-title-underline center mb-3"></div>

                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                A fresh verification link has been sent to your email address.
                            </div>
                        @endif

                        Before proceeding, please check your email for a verification link.
                        If you did not receive the email,
                        <br>
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit"
                                class="btn purple mt-3">Click here to request another</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
