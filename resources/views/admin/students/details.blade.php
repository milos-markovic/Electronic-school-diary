@extends('masterPage')

@section('content')

<h2>Details of student {{ $student->first_name.' '.$student->last_name }}:</h2><br>

<table class='table'>
    <thead>
        <tr>
            <th></th>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Date of birth</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Classroom</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><img src="http://localhost/elektronski_dnevnik/public/images/{{ $student->photo->name }}" width="100" /></td>
            <td>{{ $student->first_name }}</td>
            <td>{{ $student->last_name }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->date_of_birth }}</td>
            <td>{{ $student->created_at->diffForHumans() }}</td>
            <td>{{ $student->updated_at->diffForHumans() }}</td>
            <td>{{ $student->classroom->class_name }}</td>
        </tr>
    </tbody>
</table>

<br>

@if(count($classrooms))
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Listen at the professor</th>
                <th>Subject</th>
                <th>Subject Grade</th>
            </tr>
        </thead>
        <tbody>
            @foreach($classrooms as $classroom)

            <tr>
                <td>{{ $classroom->professor->first_name.' '.$classroom->professor->last_name }}</td>
                <td>{{ $classroom->subject->name }}</td>
                <td>
                    @foreach($classroom->subject()->first()->programs1()->with('grade')->where('student_id','=',$student->id)->get()->pluck('grade') as $grade )

                    {{ $grade->name.', ' }}

                    @endforeach
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif

@stop
