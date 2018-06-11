@extends('masterPage')


@section('content')

<h2>Create new Class:</h2><hr><br>

@include('errors.formErrors')

<form action='{{ route('classroom.store') }}' method='POST'>
    {{ csrf_field() }}
    <p>
        <label for='class_name'>Class name:</label>
        <input type='text' name='class_name' id='class_name' class='form-control' />
    </p>
    <p>
        <label for='class_year'>Class year:</label>
        <select name="class_year" class="form-control" >
            @for ($i = 2010; $i <= 2020; $i++)
            <option value="{{ $i }}">
                
                    {{ $i }}
                
            </option>
            @endfor
        </select>
    </p>
    <p>
        <label for='class_officer'>Class officer:</label>
        <select name='class_officer' class='form-control' >
            @foreach($professors as $professor)
                <option value='{{ $professor->first_name.' '.$professor->last_name }}'>{{ $professor->first_name.' '.$professor->last_name }}</option>
            @endforeach
        </select>
    </p>
    <p>
        <input type='submit' name='submit' value='Create' class='btn btn-outline-success' />
    </p>
</form>


@stop
