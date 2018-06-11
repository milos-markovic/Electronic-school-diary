@extends('masterPage')


@section('content')

<h3>Insert grade to subject {{ $subject->name }}</h3><br>


<form action='{{ route('student.storeGrade',$student->id) }}' method='POST'>
    {{ csrf_field() }}
    
    <p>
        <input type='hidden' name='subject' value='{{ $subject->id }}' />
    </p>
    <p>
        <label for='subject'>Subject:</label>
        <input type='text' name='subject' placeholder="{{ $subject->name }}" class='form-control' disabled/>
    </p>
    <p>
        <label for='grade' >Grade</label>
        <select name='grade' class='custom-select' >
            @foreach($grades as $grade)
            
            <option value='{{ $grade->id }}' >{{ $grade->name }}</option>
            
            @endforeach
        </select>
    </p><br>
    <p>
        <input type='submit' name='submit' value='Insert Grade' class='btn btn-outline-primary' />
    </p>
</form>


@stop
