@extends('masterPage')

@section('content')

<h2>Professor:</h2><br>

<table class='table table'>
    <thead>
        <tr>
            <th></th>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><img src="images/{{ Auth::user()->photo->name }}" width='80' /></td>
            <td>{{ Auth::user()->first_name }}</td>
            <td>{{ Auth::user()->last_name }}</td>
            <td>{{ Auth::user()->email }}</td>
            <td>{{ Auth::user()->role->name }}</td>
        </tr>
    </tbody>
</table>



<table class='table table-bordered' >
    <thead>
        <tr>
            <th>Teach Subjects</th>
            <th>In classrooms</th>
        </tr>
    </thead>
    <tbody>
        @foreach(Auth::user()->programs()->with('subject')->get()->pluck('subject')->unique() as $subject)
        <tr>
            <td>
                {{ $subject->name }}
            </td>
            <td>
                @foreach($subject->programs()->with('classroom')->where('professor_id',Auth::user()->id)->get()->pluck('classroom') as $classroom)
                
                <a href='{{ route('classroomStudents',$classroom->id) }}'>{{ $classroom->class_name.', ' }}</a>&nbsp;
                
                @endforeach
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@stop

