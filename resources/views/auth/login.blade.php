@extends('layouts.app')

@section('content')
<div class="columns">
    <div class="column is-one-third is-offset-one-third m-t-100">
        <div class="card">
            <div class="card-content">
                <h1 class="title has-text-centered">Login</h1>

                <form action="{{ route('login') }}" method="POST" role="form">
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
                  
                     <div class="field">
                        <label for="password" class="label">Password</label>
                        <p class="control">
                            <input type="password" class="input{{ $errors->has('password') ? ' is-danger' : '' }}" name="password" id="password" >
                        </p>
                        @if($errors->has('password'))
                            <p class="help is-danger">{{ $errors->first('password') }}</p>
                        @endif
                    </div>

                    <b-checkbox name="remember" class="m-t-20"></b-checkbox> Remember Me Next Time?

                    <button class="button is-primary is-outlined is-fullwidth m-t-30">Submit</button>
                </form> <!-- End Form -->
            </div> <!-- End .card-content -->
        </div> <!-- End card -->

        <h5 class="has-text-centered m-t-20">
            <a href="{{ route('password.request') }}" class="is-muted">Forgot Your Password? >> </a>
        </h5>
    </div> <!-- End .column -->
</div> <!-- End .columns -->
    
@endsection


@section('scripts')
<script>
    var app = new Vue({
        el: '#app',
        data: {}
    });
</script>
@endsection