@extends('masterPage')

@section('content')

<h2>Students:</h2><br>

@if(count($students))

<div class="card">
    <table class='table'>
        <thead>
            <tr>
                <th></th>
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
                <th>Date of birth</th>
                <th>Classroom</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td><img src="{{ asset('images/'.$student->photo->name) }}" width='80' class="border" /></td>
                <td><a href="{{ route('student.details',$student->id) }}">{{ $student->first_name }}</a></td>
                <td>{{ $student->last_name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->date_of_birth }}</td>
                <td>{{ $student->classroom->class_name }}</td>
                <td><a href="{{ route('students.edit',$student->id) }}" class='btn btn-outline-primary' >Update</a></td>
                <td>
                    <form action="{{ route('students.destroy',$student->id) }}" method='POST'>

                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}

                        <button class='btn btn-outline-danger'>Delete</button>

                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@else

    <h6>Create student</h6>
    
@endif

<br>

<a href="{{ route('students.create') }}" class='btn btn-outline-primary' >Add student</a>

@stop
