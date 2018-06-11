@extends('masterPage')


@section('content')


<h2>Update Classroom:</h2><br>


@include('errors.formErrors')


<form action='{{ route('classroom.update',$classroom->id) }}' method='POST'>
    
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <p>
        <label for='class_name'>Class name:</label>
        <input type='text' name='class_name' id='class_name' class='form-control' value='{{ $classroom->class_name }}' />
    </p>
    <p>
        <label for='class_year'>Class year:</label>
        <input type='text' name='class_year' id='class_year' class='form-control' value='{{ $classroom->class_year }}' />
    </p>
    <p>
        <label for='class_officer'>Class officer:</label>
        <select name="class_officer" class="form-control">
            @foreach($professors as $professor)
                <option value="{{ $professor->first_name.' '.$professor->last_name  }}" <?php if($professor->id == $classroom->id) echo "selected"; ?> >{{ $professor->first_name.' '.$professor->last_name }}</option>
            @endforeach
        </select>
    </p>
    <p>
        <input type='submit' name='submit' value='Update' class='btn btn-primary' />
    </p>
</form>


@stop
