@extends('layout.app')

@section('content')
<div class="mx-auto register-form" id="achtergrond" style="position:center">
    <br/>
    <div class="container card text-left" style="width: 30rem;position:right" id="loginscreen">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                         <h5 class="card-title">Login</h5>

                        <div class="panel-body">
                            @include('inc.messages')
                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                    <label for="username" >Username</label>

                                        <input id="username" type="username" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" >Password</label>
                                        <input id="password" type="password" class="form-control" name="password" required>

                                </div>

                                <div class="form-group">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                            </label>
                                        </div>
                                </div>

                                <div class="form-group">
                                        <button type="submit" class="btn btn-primary">
                                            Login
                                        </button>

                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            Forgot Your Password?
                                        </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
