@extends('masterPage')


@section('content')

<h2>Parent:</h2><br>

<table class='table'>
    <thead>
        <th></th>
        <th>First name</th>
        <th>Last name</th>
        <th>Email</th>
        <th>Role</th>
    </thead>
    <tbody>
        <tr>
            <td><img src='images/{{ Auth::user()->photo->name }}' width='100' /></td>
            <td>{{ Auth::user()->first_name }}</td>
            <td>{{ Auth::user()->last_name }}</td>
            <td>{{ Auth::user()->email }}</td>
            <td>{{ Auth::user()->role->name }}</td>
        </tr>
    </tbody>
</table>

<br>

<h4>Students of parent {{ Auth::user()->first_name.' '.Auth::user()->last_name }}:</h4><br>

<table class='table table-hover'>
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
        @foreach(Auth::user()->students as $student)
        <tr>
            <td><img src='images/{{ $student->photo->name }}' width='100' /></td>
            <td><a href='{{ route('parent.student.details',$student->id) }}'>{{ $student->first_name }}</a></td>
            <td>{{ $student->last_name }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->date_of_birth }}</td>
        </tr>
        @endforeach
    </tbody>
</table>


@stop