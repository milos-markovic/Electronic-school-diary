@extends('masterPage')

@section('content')

<h2>Create student:</h2><br>

@include('errors.formErrors')


<form action='{{ route('students.store') }}' method='POST' enctype='multipart/form-data'>
    
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
        <label>Student parent:</label>
        <select name='parent' class='form-control'>
            @foreach($parents as $parent)
            
                <option value='{{ $parent->id }}'>{{ $parent->first_name.' '.$parent->last_name }}</option>
                
            @endforeach
        </select>
    </p>
    <p>
        <label for='classroom'>Classroom:</label>
        <select name='classroom' class='form-control' id='classroom'>
            @foreach($classrooms as $classroom)
            
            <option value='{{ $classroom->id }}' >{{ $classroom->class_name }}</option>
            
            @endforeach
        </select>
    </p>
    <p>
        <label>Pick profile Picture:</label>
        <input type='file' name='photo' id='file' class='btn' />
    </p>
    <p>
        <input type='submit' name='submit' value='Create' class='btn btn-outline-primary' />
    </p>
    
</form>


@stop
