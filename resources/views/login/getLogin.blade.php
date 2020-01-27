@extends('masterPage')

@section('content')


    <div class="border border-dark w-50 mx-auto p-5">
        <form action="{{ route('login') }}" method="POST">

            {!! csrf_field() !!}
            <div class="form-group">
                <label for="email">Email: </label>
                <input type="text" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="form-group text-center">
                <input type="submit" value="Login" class="btn btn-primary">
            </div>
        </form>
    </div>



@stop