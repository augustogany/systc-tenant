@extends('frontend.welcome')

@section('content')
<header class="header-area header-bg dark-home-1" id="home">

    <div class="shape-1"><img src="assets/img/shape/01.png" alt=""></div>
    <div class="shape-2"><img src="assets/img/shape/02.png" alt=""></div>
    <div class="shape-3"><img src="assets/img/shape/03.png" alt=""></div>
    <div class="shape-4"><img src="assets/img/shape/05.png" alt=""></div>

    <div class="header-right-image">
        <img src="assets/img/mobile-image-4.png" alt="header right image">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="header-inner">
                    <h1 class="title wow fadeInDown">{{ __('Login') }}</h1>
                    <form method="post" action="{{route('login')}}" name="loginuser">
                        @csrf
                        <div class="form-group">
                            <p>{{ __('E-Mail Address') }}</p>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <p>{{ __('Password') }}</p>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <p class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </p>
                        </div>
                         <div class="form-group">
                            <div class="btn-wrapper wow fadeInUp">
                                <a href="javascript::();" class="boxed-btn btn-rounded" onclick="document.forms.loginuser.submit()">  {{ __('Login') }}</a>
                                @if (Route::has('password.request'))
                                    <a class="boxed-btn btn-rounded blank" href="{{ route('password.request') }}" title="{{ __('Forgot Your Password?') }}">
                                        Reseteo
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>

@endsection
