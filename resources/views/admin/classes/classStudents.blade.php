@extends('masterPage')


@section('content')


<h2>Students from classrooms {{ $classroom->class_name }}:</h2><br>

@if(count($students))

    <table class='table'>
        <thead>
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
                <th>Date of birth</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td><img src='http://localhost/elektronski_dnevnik/public/images/{{ $student->photo->name }}' width='80' /></td>
                <td><a href='{{ route('classroom.student.details',[$student->classroom->id,$student->id]) }}'>{{ $student->first_name }}</a></td>
                <td>{{ $student->last_name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->date_of_birth }}</td>
                <td><a href='{{ route('classroom.studentEdit',$student->id) }}' class='btn btn-outline-primary' >Update</a></td>
                <td><a href='{{ route('classroom.studentDestroy',[ $classroom->id,$student->id ]) }}' class='btn btn-outline-danger' >Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@else

<h6>Insert student in classroom</h6><br>
    
@endif

<a href='{{ route('classroom.studentCreate',$classroom->id) }}' class='btn btn-outline-success' >Add student</a>


@stop

