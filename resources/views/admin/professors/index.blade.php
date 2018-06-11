@extends('masterPage')


@section('content')

<h2>Professors:</h2><br>

@include('message.sessionMessage')

@if(count($professors))
    <table class="table">
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
            @foreach($professors as $professor)
            <tr>
                <td><img width='70' src="http://localhost/elektronski_dnevnik/public/images/{{ $professor->photo->name }}" class="border" /></td>
                <td><a href="{{ route( 'professor.details',$professor->id ) }}">{{ $professor->first_name }}</a></td>
                <td>{{ $professor->last_name }}</td>
                <td>{{ $professor->email }}</td>
                <td>{{ $professor->role->name }}</td>
                <td><a href="{{ route('professors.edit',$professor->id) }}" class="btn btn-outline-success" >Update</a></td>
                <td>
                    <form action="{{ route('professors.destroy',$professor->id) }}" method="POST">
                        {{ csrf_field() }} 
                        {{ method_field('DELETE') }} 
                        <button class="btn btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@else
     <h4>Create new professor</h4>
@endif

<br>

<a href="{{ route('professors.create') }}" class="btn btn-outline-primary">Create Professor</a>


@stop
