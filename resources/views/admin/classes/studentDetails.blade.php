@extends('masterPage')


@section('content')

<h2>Details of student: {{ $student->first_name.' '.$student->last_name }}:</h2><br>

<table class='table'>
    <thead>
        <tr>
            <th></th>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Date of birth</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><img src="{{ asset('images/'.$student->photo->name) }}" width='100' /></td>
            <td>{{ $student->first_name }}</td>
            <td>{{ $student->last_name }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->date_of_birth }}</td>
        </tr>
    </tbody>
</table>

<br>

<table class='table table-bordered'>
    <thead>
        <tr>
            <th>Professor</th>
            <th>Classroom subjects</th>
            <th>Subject Grades</th>
        </tr>
    </thead>
    <tbody>
        @foreach($subjects as $subject)
        <tr>
            @foreach($subject->programs()->with('professor')->where('classroom_id',$classroom->id)->get()->pluck('professor') as $professor)
            <td>
                {{ $professor->first_name.' '.$professor->last_name }}
            </td>
            @endforeach
            <td>
                {{ $subject->name }}
            </td>
            <td>
                @foreach($subject->programs1()->with('grade')->where('student_id','=',$student->id)->get()->pluck('grade') as $grade)
                
                {{ $grade->name.', ' }}
                
                @endforeach
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@stop
