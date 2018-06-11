@extends('masterPage')

@section('content')

<h2>Parent:</h2><br>

<table class='table parent_table'>
    <thead>
        <tr>
            <th></th>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Created at</th>
            <th>Updated at</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><img src='http://localhost/elektronski_dnevnik/public/images/{{ $parent->photo->name }}' width='100' class="border" /></td>
            <td>{{ $parent->first_name }}</td>
            <td>{{ $parent->last_name }}</td>
            <td>{{ $parent->email }}</td>
            <td>{{ $parent->created_at->DiffForHumans() }}</td>
            <td>{{ $parent->updated_at->DiffForHumans() }}</td>
        </tr>
    </tbody>
</table>


@if(count($parent->students))

    <h4>Students of parent {{ $parent->first_name.' '.$parent->last_name }}:</h4><br>


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
            @foreach($parent->students as $student)
            <tr>
                <td><img src='http://localhost/elektronski_dnevnik/public/images/{{ $student->photo->name }}' width='100'  /></td>
                <td><a href='{{ route('parents.studentDetails',$student->id) }}'>{{ $student->first_name }}</a></td>
                <td>{{ $student->last_name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->date_of_birth }}</td>
                <td><a href="{{ route('parents.editStudent',$student->id) }}" class='btn btn-outline-primary' >Update</a></td>
                <td><a href='{{ route('parents.destroyStudent',[ $parent->id,$student->id ]) }}' class='btn btn-outline-danger' >Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
   
@else

<h6>Add student to parent {{ $parent->first_name.' '.$parent->last_name }}</h6><br>

@endif

 <a href="{{ route('parents.createStudent',$parent->id) }}" class="btn btn-outline-success" >Add Student</a>

@stop

