@extends('layouts.app')

@section('content')
<div class="columns">
    <div class="column is-one-third is-offset-one-third m-t-100">
        <div class="card">
            <div class="card-content">
                <h1 class="title has-text-centered">Join The Community</h1>

                <form action="{{ route('register') }}" method="POST" role="form">
                    {{ csrf_field() }} 

                    <div class="field">
                        <label for="name" class="label">Username</label>
                        <p class="control">
                            <input type="name" class="input{{ $errors->has('name') ? ' is-danger' : '' }}" name="name" id="name" placeholder='arnold' value="{{ old('name') }}">
                        </p>
                        @if($errors->has('name'))
                            <p class="help is-danger">{{ $errors->first('name') }}</p>
                        @endif

                    </div>

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


                    <button class="button is-primary is-outlined is-fullwidth m-t-30">Register</button>
                </form> <!-- End Form -->
            </div> <!-- End .card-content -->
        </div> <!-- End card -->

        <h5 class="has-text-centered m-t-20">
            <a href="{{ route('login') }}" class="is-muted">Already Have Accont? </a>
        </h5>
    </div> <!-- End .column -->
</div> <!-- End .columns -->
    
@endsection
