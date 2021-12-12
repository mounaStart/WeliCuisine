@include('layouts.script')
@extends('layouts.admin')
@section('content')


<div class="container">

@if(session('success'))
    <div class="container">
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                aria-hidden="true">x</span></button>
                {{session('success')}}
        </div>
    </div>
    @endif
    @if(session('pasDechat'))
        <div class="container">
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">x</span></button>
                    {{session('pasDechat')}}
            </div>
        </div>
    @endif
    @if(session('Pas connecte'))
    <div class="container">
        <div class="alert alert-warning">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                aria-hidden="true">x</span></button>
                {{session('Pas connecte')}}
        </div>
    </div>
    @endif 


@if(session('success-agentr'))
    <div class="container">
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                aria-hidden="true">x</span></button>
                {{session('success-agentr')}}
        </div>
    </div>
    @endif
    @if(session('error'))
    <div class="container">
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                aria-hidden="true">x</span></button>
                {{session('error')}}
        </div>
    </div>
    @endif
    <br>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"> {{ isset($url) ? ucwords($url) : ""}} {{ __('Login') }}</div>
                <div class="card-body"><br>
                    @isset($url)
                    <form method="POST" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">
                        @csrf
                        <div class="row">
                            <label for="email" class="col-md-3 col-form-label  ">E-Mail Address</label>
                            <div class="col-md-9">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div><br>
                        <div class="row">
                            <label for="password" class="col-md-3 col-form-label  ">Password</label>
                            <div class="col-md-9">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div><br>
                        <div class="  row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{
                                        old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Se souvenir de moi') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class=" row mb-0">
                            <div class="col-md-12 ">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Se connecter ') }}
                                </button>
                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Mot de passe oublié ') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                    <div class="new-account mt-3">
                        <h4>Pas encore de compte ?<a class="text-primary" href='{{  url("register/$url") }}'> <b>S'inscrire</b></a></h4>
                    </div><br>
                    @else
                    <form method="POST" action='{{ url("login") }}' aria-label="{{ __('Login') }}">
                        @csrf
                        <div class=" row">
                            <label for="email" class="col-md-3 col-form-label  ">E-Mail Address</label>
                            <div class="col-md-9">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div><br>
                        <div class=" row">
                            <label for="password" class="col-md-3 col-form-label  ">Password</label>
                            <div class="col-md-9">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div><br>
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">{{ __('Se souvenir de moi ') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12 ">
                                <button type="submit" class="btn btn-primary">Se connecter </button>
                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">Mot de passe oublié</a>
                                @endif
                            </div>
                        </div>
                    </form>
                    <div class="new-account mt-3">
                        <h4>Pas encore de compte ?<a class="text-primary" href="{{ url('register') }}">S'inscrire</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endisset
@endsection
