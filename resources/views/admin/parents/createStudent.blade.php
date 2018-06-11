@extends('masterPage')


@section('content')


<h2>Create Student:</h2><br>


@include('errors.formErrors')


<form action='{{ route('parents.storeStudent',$parent->id) }}' method='POST' enctype="multipart/form-data" >
    {{ csrf_field() }}
    <p>
        <label for='first_name'>First name:</label>
        <input type='text' name='first_name' id='first_name' class='form-control' />
    </p>
    <p>
        <label for='last_name'>Last name:</label>
        <input type='text' name='last_name' id='last_name' class='form-control' />
    </p>
    <p>
        <label for='email'>Email:</label>
        <input type='text' name='email' id='email' class='form-control' />
    </p>
    <p>
        <label for='date_of_birth'>Date of birth:</label>
        <input type='text' name='date_of_birth' id='date_of_birth' class='form-control' />
    </p>
    <p>
        <label for='classroom'>Classroom:</label>
        <select name='classroom' class='form-control' >
            @foreach($classrooms as $classroom)
            
            <option value='{{ $classroom->id }}' >{{ $classroom->class_name }}</option>
            
            @endforeach
        </select>
    </p>
    <p>
        <label for='photo'>Pick foto to upload:</label>
        <input type='file' name='photo' id='photo' />
    </p>
    <p>
        <input type='submit' name='submit' value='Create' class='btn btn-outline-primary' />
    </p>
</form>


@stop
