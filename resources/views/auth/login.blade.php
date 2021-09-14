@extends('layouts.app')
<style>
    .faa {
        padding: 20px;
        font-size: 30px;
        width: 50px;
        text-align: center;
        text-decoration: none;
        margin: 5px 2px;
    }

    .fa:hover {
        opacity: 0.7;
    }

    .fa-facebook {
        background: #3B5998;
        color: white;
    }

    .fa-twitter {
        background: #55ACEE;
        color: white;
    }

    .fa-google {
        background: #dd4b39;
        color: white;
    }

    .fa-linkedin {
        background: #007bb5;
        color: white;
    }


    .fa-instagram {
        background: #125688;
        color: white;
    }





    .fa-skype {
        background: #00aff0;
        color: white;
    }
  .fa-github {
        background: lightsteelblue;
        color: black;
    }

    .fa-globe {
        background: lightsteelblue;
        color: blue;
    }





</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">

        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <h5 class="mbr-section-subtitle mbr-fonts-style mb-2 display-7">
                    <strong>CONTACT </strong>
                </h5>
                <ul class="list mbr-fonts-style display-4">
                    <li style="font-family: 'Lato', 'sans-serif'; font-size: 15px" class="mbr-text item-wrap"><i style="color: red;" class="fa fa-map-marker"></i>  Mirpur-6, Dhaka-1216, Bangladesh </li>
                    <li style="font-family: 'Lato', 'sans-serif'; font-size: 15px" class="mbr-text item-wrap"><i style="color: green;" class="fa fa-phone"></i> +880178 12 75612, +8809696475612</li>
                    <li style="font-family: 'Lato', 'sans-serif'; font-size: 15px" class="mbr-text item-wrap"><i style="color: red;" class="fa fa-envelope"></i> <a href="mailto:sarifit95@gmail.com" rel="nofollow">sarifit95@gmail.com</a></li>
                    <li style="font-family: 'Lato', 'sans-serif'; font-size: 15px" class="mbr-text item-wrap"><i title="whatsapp" style="color: green;" class="fa fa-whatsapp"></i> +880178 12 75612</li>
                    <li style="font-family: 'Lato', 'sans-serif'; font-size: 15px" class="mbr-text item-wrap"><i title="skype" class="fa fa-skype"></i> sarifit95</li>

                </ul>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <a title="Facebook" href="https://www.facebook.com/sarifit95/" target="_blank" class="faa fa fa-facebook"></a>
                <a title="twitter" href="https://twitter.com/Sariful21221382" target="_blank" class="faa fa fa-twitter"></a>
                <a title="linkedin" href="https://www.linkedin.com/in/sariful-islam-22893b153/" target="_blank" class="faa fa fa-linkedin"></a>
                <a title="instagram" href="https://www.instagram.com/sariful_islamit/" target="_blank" class="faa fa fa-instagram"></a>
                <a title="Github" href="https://github.com/Sarifit95"  style="" target="_blank" class="faa fa fa-github"></a>
                <a title="Website" href="https://sarifit95.github.io/"  style="" target="_blank" class="faa fa fa-globe"></a>


            </div>


        </div>

    </div>

</div>
@endsection
