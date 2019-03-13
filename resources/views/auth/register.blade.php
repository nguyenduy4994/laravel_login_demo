@extends('layouts.app')

@section('content')
<div class="header">
    <div class="header-main">
        <h1>Laravel Register</h1>
        <div class="header-bottom">
            <div class="header-right w3agile">
                
                <div class="header-left-bottom agileinfo">
                    
                <form method="POST" action="{{ route('register') }}" class="form_login text-center">
                    @csrf

                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                    <input type="text" placeholder="Name" name="name" value="{{ old('name') }}" required autofocus/>
                    
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    <input type="text" id="email" placeholder="Email" name="email" value="{{ old('email') }}" required/>
                    
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    <input id="password" type="password"  placeholder="Password" name="password" required />

                    @if ($errors->has('password_confirmation'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                    <input id="password-confirm" type="password"  placeholder="Password Vonfirmation" name="password_confirmation" required />
                    
                    <input type="submit" value="Register">
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
