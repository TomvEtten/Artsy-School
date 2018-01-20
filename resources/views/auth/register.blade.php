@extends('layout.app')

@section('content')

<div class="mx-auto register-form" id="achtergrond" style="position:center">
    <br/>
    <div class="container card text-left" style="width: 30rem;position:right" id="loginscreen">
        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
            <div class="card-body">
                <h5 class="card-title">Register</h5>

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" >Name</label>

                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
                    <label for="surname" >Surname</label>

                    <input id="surname" type="text" class="form-control" name="surname" value="{{ old('surname') }}" required autofocus>

                    @if ($errors->has('username'))
                    <span class="help-block">
                        <strong>{{ $errors->first('surname') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    <label for="username" >Username</label>

                    <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                    @if ($errors->has('username'))
                    <span class="help-block">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email">E-Mail Address</label>

                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" >Password</label>

                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="password-confirm">Confirm Password</label>

                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>

                <div class="form-group{{ $errors->has('studentnr') ? ' has-error' : '' }}">
                    <label for="studentnr" >Studentnumber</label>
                    <input id="studentnr" type="text" class="form-control" name="studentnr" required>

                    @if ($errors->has('studentnr'))
                    <span class="help-block">
                        <strong>{{ $errors->first('studentnr') }}</strong>
                    </span>
                    @endif
                </div>
                <label for="sel1">Select your School:</label>
                <select class="form-control"  name="school" id="school">
                    <option value="1">Hogeschool van Amsterdam(HvA)</option>
                    <option value="2">Universiteit van Amsterdam(UvA)</option>
                    <option value="3">Gerrit Rietveld Academie(GRA)</option>
                    <option value="4">Vrije universiteit(VU)</option>
                    <option value="5">Amsterdamse Hogeschool voor Kunsten(AHK)</option>
                </select>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="0" id = 'check' required="true"> I agree with the terms and conditions of this site</label>
            </div>
            <button type="submit" href="#" class="btn btn-primary btn-block" id='register--' value="Register">Register</button>
    </div>
</form>
</br>
</div>

@endsection