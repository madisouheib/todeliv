



@extends('dashboard.lay.log')

@section('content-login')
   



    <div class="auth-wrapper">
        <div class="auth-content">
            <div class="auth-bg">
                <span class="r"></span>
                <span class="r s"></span>
                <span class="r s"></span>
                <span class="r"></span>
            </div>
            <div class="card">

                <div class="card-body text-center">
                    <div class="mb-4">
                 <img src="{{ url('images/logo.png')}}" style="heigth:80px;width:80px">
                    </div>
                    <h3 class="mb-4">{{ config('app.name') }}</h3>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf 
                  
                        <div class="input-group mb-3">
                            <input id="email" type="text" placeholder="Saisier vote email .. " class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
             
                        <div class="input-group mb-4">
                            <input  id="password" type="password" placeholder="Saisier vote mot de passe .. " class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
               
                    <button type="submit"  class="btn btn-primary shadow-2 mb-4">Connectez - vous  <i class="fas fa-sign-in-alt"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
