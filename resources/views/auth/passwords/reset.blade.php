@extends('layouts.app')

@section('content')

<div class="columns">
    <div class="column is-one-third is-offset-one-third m-t-100">
        <div class="card">
            <div class="card-content">
                <h1 class="title has-text-centered">Reset Password</h1>

                @if(session('email'))
                    <p class="notification is-success">
                        {{ session('email') }}
                    </p>
                @endif

                <form action="{{ route('password.request') }}" method="POST" role="form">
                    {{ csrf_field() }} 
                     <input type="hidden" name="token" value="{{ $token }}">
                    <div class="field">
                        <label for="email" class="label">Email Address</label>
                        <p class="control">
                            <input type="email" class="input{{ $errors->has('email') ? ' is-danger' : '' }}" name="email" id="email" placeholder='arnold@example.com' value="{{ old('email') }}">
                        </p>
                        @if($errors->has('email'))
                            <p class="help is-danger">{{ $errors->first('email') }}</p>
                        @endif

                    </div>
                  
                     <div class="field">
                        <label for="password" class="label">Password</label>
                        <p class="control">
                            <input type="password" class="input{{ $errors->has('password') ? ' is-danger' : '' }}" name="password" id="password" >
                        </p>
                        @if($errors->has('password'))
                            <p class="help is-danger">{{ $errors->first('password') }}</p>
                        @endif
                    </div>

                    <div class="field">
                        <label for="password-confirm" class="label">Confirm Password</label>
                        <p class="control">
                            <input type="password" class="input{{ $errors->has('password_confirmation') ? ' is-danger' : '' }}" name="password_confirmation" id="password-confirm" >
                        </p>
                       @if($errors->has('password_confirmation'))
                            <p class="help is-danger">{{ $errors->first('password_confirmation') }}</p>
                        @endif
                    </div>

                   

                    <button class="button is-primary is-outlined is-fullwidth m-t-30">Reset Password</button>
                </form> <!-- End Form -->
            </div> <!-- End .card-content -->
        </div> <!-- End card -->

        
    </div> <!-- End .column -->
</div> <!-- End .columns -->

@endsection
