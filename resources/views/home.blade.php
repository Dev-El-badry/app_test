@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns">
        <div class="column is-half is-offset-one-quarter m-t-60">
            <h2 class="title">Employees Attendance</h2>
              @if ($errors->any())
            <div class="notification is-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif  
        @if(Session::has('status'))
        <div class="notification is-danger">
            <ul>
                   
                <li>{{ Session::get('status') }}</li>
                    
                </ul></div>
        @endif
            <form action="{{ route('enter') }}" method="POST">
            {{ csrf_field() }}
                <div class="columns">
                    <div class="column">
                       <span class="is-narrow-touch" style="color: red">*must insert the code identification max length = 5 and min length = 5</span>
                        <b-field>
                            <b-input
                                size="is-medium"
                                icon="account"
                                name="code"
                                maxlength="5"
                                minlength="5"
                                placeholder="Enter Code">
                            </b-input>
                        </b-field>

                    </div>
                </div>

                <div class="columns">
                    <div class="column">
                        <button type="submit" name="submit" class="button is-primary is-pulled-right" value="Login">Login</button>
                    </div>
                    <div class="column">
                        <button type="submit" name="submit" value=Logout class="button is-outlined">Logout</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    var app = new Vue({
        el: '#app',
        data: {}
    });
</script>
@endsection