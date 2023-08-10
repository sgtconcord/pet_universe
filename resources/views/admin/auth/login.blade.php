@extends('layouts.site')

@section('stylesheet')
<link rel="stylesheet" href="{{asset('assets/site/css/custom.css')}}" />
@endsection

@section('content')
    <div class="conatiner main-container">
        <div class="login-container  py-5 ">
            <div class="card login-card">
                <div class="card-body login-card-body">
                    {{-- <div class="row">
                        <div style="background-color:#54359D;" class="col-12 text-center rounded"><a href="{{ route('home') }}"
                                class="logo logo-admin">
                                           <img src="{{ asset('assets/text-logo.png') }}" height="80" alt="logo">
                                <h4 style="color:white;">Pet Universe</h4>
                            </a></div>
                    </div> #f0f8ff87 --}}
                    <div class="pl-3 pr-3 pb-3">
                                <h3 class="m-2 text-center border-bottom pb-5" style="color:rgb(246,171,73);">Login</h3>
                            
                        @if (session()->has('status'))
                            {!! session()->get('status') !!}
                        @endif
                        <form class="form-horizontal mt-5" action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="text"> <i class="fa fa-duotone fa-envelope icon login-icon"></i> Email</label>
                                <div class="d-flex">
                                    <input type="email" name="email" id="email" placeholder="Enter Your Email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" required>
                                    <span class="mt-1 "></span>
                                </div>

                                <span class="spin"></span>
                                @error('username')
                                    <strong class="text-danger">{{ $errors->first('username') }}</strong>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label class="form-label" for="password"> <i class="fa fa-regular fa-key icon login-icon"></i> Password</label>
                                <div class="d-flex">
                                    <input type="password" name="password" id="password" placeholder="Enter Your Password"
                                        autocomplete="off" class="form-control @error('password') is-invalid @enderror"
                                        value="{{ old('password') }}" required>
                                    <span class="mt-1 "></span>
                                </div>

                                <span class="spin"></span>
                                @error('password')
                                    <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                @enderror
                                <a href="{{ route('password.request') }}" class=" pt-3 mx-auto">Forget Password?</a>
                            </div>

                            <div class="form-group row mt-4">
                                <div class="col-sm-12 text-right">
                                    <button style="background-color:rgb(246,171,73);"
                                        class="btn text-light w-100 waves-effect waves-light" type="submit">Log In</button>
                                </div>
                                <a href="{{ route('register') }}"
                                        class="pt-3 text-center">New User? Register Now</a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
