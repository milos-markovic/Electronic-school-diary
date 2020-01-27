@extends('masterPage')


@section('content')

<h2 class="text-center">Update Professor: {{ $professor->first_name.' '.$professor->last_name }}:</h2><hr><br>

@include('errors.formErrors')

<div class="row">

    
<div class="col-sm-3">
    <img src="{{ asset('images/'.$professor->photo->name ) }}" class="img-thumbnail border-secondary" />
</div>

<div class="col-sm-9">
    <form action="{{ route('professors.update',$professor->id) }}" method='POST' enctype='multipart/form-data'>

        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <p>
            <label for='first_name'>First name:</label>
            <input type='text' name='first_name' id='first_name' value='{{ $professor->first_name }}' class='form-control' />
        </p>
        <p>
            <label for='last_name'>Last name:</label>
            <input type='text' name='last_name' id='last_name' value='{{ $professor->last_name }}' class='form-control' />
        </p>
        <p>
            <label for='email'>Email:</label>
            <input type='text' name='email' id='email' value='{{ $professor->email }}' class='form-control' />
        </p>
        <p>
            <label for='password'>Password:</label>
            <input type='password' name='password' id='password' value='{{ $professor->password }}' class='form-control' />
        </p>
        <p>
            <label for='file' >Pick profile Picture:</label>
            <input type='file' name='file' id='file' class='btn btn-outline-default' />
        </p>
        <p class="text-center">
            <input type='submit' name='submit' value='Update' class='btn btn-outline-primary' />
        </p>
    </form>
</div>
    
</div>

@stop

