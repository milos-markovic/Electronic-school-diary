@extends('masterPage')


@section('content')

<h2>Login:</h2><br>

@include('errors.formErrors')


<form action='{{ route('login.user') }}' method='POST'>
    
    {{ csrf_field() }}
    <p>
        <label for='email' >Email:</label>
        <input type='text' name='email' id='email' class='form-control' />
    </p>
    <p>
        <label for='password'>Password:</label>
        <input type='password' name='password' id='password' class='form-control' />
    </p>
    <p>
        <input type='submit' name='submit' value='Login' class='btn btn-outline-primary' />
    </p>
    
</form>

@stop

