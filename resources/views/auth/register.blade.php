@extends('dashboard.lay.log')

@section('content-login')
<div class="auth-wrapper">

    <div class="auth-content subscribe">
        <div class="card">
            <div class="row no-gutters">
                <div class="col-md-2 col-lg-4 d-none d-md-flex d-lg-flex theme-bg align-items-center justify-content-center">
                    <img src="/images/login/user.jpg" alt="lock images" class="img-fluid">
                </div>
                <div class="col-md-10 col-lg-8">
                    <div class="card-body text-center">
                        <div class="row justify-content-center">
                            <div class="col-sm-10">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf 
                                <h3 class="mb-4" style="color:#6a737b;">Inscrivez-vous <i class="fas fa-user-circle"></i> </h3>
                                <div class="input-group mb-3">
                                    <input id="name" placeholder="Saisier vote username .. " type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                               
                                <div class="input-group mb-3">
                                    <input id="email" type="email" placeholder="Saisier vote email .. " class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
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


                                <div class="input-group mb-4">
                                    <input id="password-confirm" type="password" class="form-control" placeholder="re-saisier vote mot de passe .. " name="password_confirmation" required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                                <div class="input-group mb-3">
                                    <input id="tel" placeholder="Saisier vote Num??ro tel .. " type="text" class="form-control @error('tel') is-invalid @enderror" name="tel" value="{{ old('adress') }}" required>
                                    @error('adress')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>


                                <div class="input-group mb-4">
                                    <input id="full_name" type="text" class="form-control" placeholder="Nom de votre soci??t??.. " name="full_name" required >
                                    @error('full_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                                <div class="input-group mb-3">
                                    <input id="adress" placeholder="Saisier vote adresse .. " type="text" class="form-control @error('adress') is-invalid @enderror" name="adress" value="{{ old('adress') }}" required autocomplete="adress" autofocus>
                                    @error('adress')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                
                                <div class="input-group mb-3">
                             

                                        <select name="wilaya" class="form-control" required >
                                            <option value = ""> Selectionner une wilaya </option>
                                            <option value = "1">Adrar</option>
                                            <option value = "2">Chlef</option>
                                            <option value = "3">Laghouat</option>
                                            <option value = "4">Oum El Bouaghi</option>
                                            <option value = "5">Batna</option>
                                            <option value = "6">Bejaia</option>
                                            <option value = "7">Biskra</option>
                                            <option value = "8">Bechar</option>
                                            <option value = "9">Blida</option>
                                            <option value = "10">Bouira</option>
                                            <option value = "11">Tamanrasset</option>
                                            <option value = "12">Tebessa</option>
                                            <option value = "13">Tlemcen</option>
                                            <option value = "14">Tiaret</option>
                                            <option value = "15">Tizi Ouzou</option>
                                            <option value = "16">Alger</option>
                                            <option value = "17">Djelfa</option>
                                            <option value = "18">Jijel</option>
                                            <option value = "19">Setif</option>
                                            <option value = "20">Saida</option>
                                            <option value = "21">Skikda</option>
                                            <option value = "22">Sidi Bel Abbes</option>
                                            <option value = "23">Annaba</option>
                                            <option value = "24">Guelma</option>
                                            <option value = "25">Constantine</option>
                                            <option value = "26">Medea</option>
                                            <option value = "27">Mostaganem</option>
                                            <option value = "28">MSila</option>
                                            <option value = "29">Mascara</option>
                                            <option value = "30">Ouargla</option>
                                            <option value = "31">Oran</option>
                                            <option value = "32">El Bayadh</option>
                                            <option value = "33">Illizi</option>
                                            <option value = "34">Bordj Bou Arreridj</option>
                                            <option value = "35">Boumerdes</option>
                                            <option value = "36">El Tarf</option>
                                            <option value = "37">Tindouf</option>
                                            <option value = "38">Tissemsilt</option>
                                            <option value = "39">El Oued</option>
                                            <option value = "40">Khenchela</option>
                                            <option value = "41">Souk Ahras</option>
                                            <option value = "42">Tipaza</option>
                                            <option value = "43">Mila</option>
                                            <option value = "44">Ain Defla</option>
                                            <option value = "45">Naama</option>
                                            <option value = "46">Ain Temouchent</option>
                                            <option value = "47">Ghardaia</option>
                                            <option value = "48">Relizane</option>
                                        </select>

                       
                                </div>



                             
                                <button type="submit" class="btn btn-primary shadow-2 mb-4">   {{ __('Inscrivez') }} <i class="fas fa-user-plus"></i> </button>
                            <p class="mb-0 text-muted">vous avez un compte d??ja ? <a href="{{ url('/login')}}"> connectez-vous</a></p>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <ul class="nav nav-pills nav-fill mb-0 border-bottom" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><i class="feather icon-unlock py-2"></i></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="feather icon-user-plus py-2"></i></a>
        </li>
    </ul>
    <div class="tab-content text-center" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="mb-4">
                <i class="feather icon-unlock auth-icon"></i>
            </div>
            <h3 class="mb-4">Login</h3>
            <div class="input-group mb-3">
                <input type="email" class="form-control" placeholder="Email">
            </div>
            <div class="input-group mb-4">
                <input type="password" class="form-control" placeholder="password">
            </div>
            <div class="form-group text-left">
                <div class="checkbox checkbox-fill d-inline">
                    <input type="checkbox" name="checkbox-fill-1" id="checkbox-fill-a1" checked="">
                    <label for="checkbox-fill-a1" class="cr"> Save Details</label>
                </div>
            </div>
            <button class="btn btn-primary shadow-2 mb-4">Login</button>
            <p class="mb-2 text-muted">Forgot password? <a href="auth-reset-password.html">Reset</a></p>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="mb-4">
                <i class="feather icon-user-plus auth-icon"></i>
            </div>
            <h3 class="mb-4">Sign up</h3>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Username">
            </div>
            <div class="input-group mb-3">
                <input type="email" class="form-control" placeholder="Email">
            </div>
            <div class="input-group mb-4">
                <input type="password" class="form-control" placeholder="password">
            </div>
            <div class="form-group text-left">
                <div class="checkbox checkbox-fill d-inline">
                    <input type="checkbox" name="checkbox-fill-1" id="checkbox-fill-1" checked="">
                    <label for="checkbox-fill-1" class="cr"> Save Details</label>
                </div>
            </div>
            <div class="form-group text-left">
                <div class="checkbox checkbox-fill d-inline">
                    <input type="checkbox" name="checkbox-fill-2" id="checkbox-fill-2">
                    <label for="checkbox-fill-2" class="cr">Send me the <a href="#!"> Newsletter</a> weekly.</label>
                </div>
            </div>
            <button class="btn btn-primary shadow-2 mb-4">Sign up</button>
        </div>
    </div> -->

</div>


@endsection
