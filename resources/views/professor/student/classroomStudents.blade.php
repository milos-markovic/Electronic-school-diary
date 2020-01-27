@extends('masterPage')


@section('content')

<h2>Students from classroom {{ $classroom->class_name }}</h2><br>

@if(count($classroom->students))

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th></th>
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($classroom->students as $student)
            <tr>
                <td><img src="{{ asset('images/'.$student->photo->name) }}" width='100' /></td>
                <td><a href="{{ route('professor.student.details',[$classroom->id,$student->id]) }}">{{ $student->first_name }}</a></td>
                <td>{{ $student->last_name }}</td>
                <td>{{ $student->email }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@else
    
    <h5>Classroom doesn't have students</h5>

@endif


@stop

