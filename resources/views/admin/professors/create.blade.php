@extends('masterPage')


@section('content')

<div class="border border-dark p-4 w-75 m-auto">

    <h2 class="text-center">Create Professor:</h2><hr><br>


    @include('errors.formErrors')

    <form action="{{ route('professors.store') }}" method='POST' enctype='multipart/form-data'>
        
        {{ csrf_field() }}
        <p>
            <label for='first_name'>First name:</label>
            <input type='text' name='first_name' id='first_name' class='form-control' />
        </p>
        <p>
            <label for='last_name'>Last name</label>
            <input type='text' name='last_name' id='last_name' class='form-control' />
        </p>
        <p>
            <label for='email'>Email:</label>
            <input type='text' name='email' id='email' class='form-control' />
        </p>
        <p>
            <label for='password'>Password:</label>
            <input type='password' name='password' id='password' class='form-control' />
        </p>
        <p>
            <label for='photo'>Pick photo for upload:</label>
            <input type='file' name='file' id='photo' />
        </p>
        <p class="text-center">
            <input type='submit' name='submit' value='Create' class='btn btn-outline-primary'/>
        </p>
    </form>

</div>


@stop