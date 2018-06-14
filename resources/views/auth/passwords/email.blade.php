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

                <form action="{{ route('password.email') }}" method="POST" role="form">
                    {{ csrf_field() }} 
                    
                    <div class="field">
                        <label for="email" class="label">Email Address</label>
                        <p class="control">
                            <input type="email" class="input{{ $errors->has('email') ? ' is-danger' : '' }}" name="email" id="email" placeholder='arnold@example.com' value="{{ old('email') }}">
                        </p>
                        @if($errors->has('email'))
                            <p class="help is-danger">{{ $errors->first('email') }}</p>
                        @endif

                    </div>

                    <button class="button is-primary is-outlined is-fullwidth m-t-30">Send Password Reset Link</button>
                </form> <!-- End Form -->
            </div> <!-- End .card-content -->
        </div> <!-- End card -->

        
    </div> <!-- End .column -->
</div> <!-- End .columns -->

@endsection
