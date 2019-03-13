@extends('layouts.app')

@section('content')
<div class="header">
    <div class="header-main">
        <h1>Laravel Login</h1>
        <div class="header-bottom">
            <div class="header-right w3agile">
                
                <div class="header-left-bottom agileinfo">
                    
                <form method="POST" action="{{ route('login') }}" id="form_login" class="form_login">
                    @csrf
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    <input type="text" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus/>
                    
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    <input id="password" type="password"  placeholder="Password" name="password" required />
                    <div class="remember">
                        <span class="checkbox1">
                            <label class="checkbox"><input type="checkbox" name="" checked=""><i> </i>{{ __('Remember Me') }}</label>
                        </span>
                        @if (Route::has('password.request'))
                            <div class="forgot">
                                <a class="text-light" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        @endif
                        {{-- <div class="forgot">
                            <h6><a href="#">Forgot Password?</a></h6>
                        </div> --}}
                    </div>
                    
                    <input type="submit" value="Login">
                </form>	
                <div class="header-left-top">
                    <div class="sign-up"> <h2>or</h2> </div>
                
                </div>
                <div class="header-social wthree">
                    <a href="#" class="face"><h5>Facebook</h5></a>
                    <a href="#" class="twitt"><h5>Twitter</h5></a>
                </div>
            </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
