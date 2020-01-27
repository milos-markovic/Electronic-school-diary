@extends('masterPage')


@section('content')

<h2>Student:</h2><br>

<table class="table table-bordered table-hover">
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

<table class='table table-bordered table-hover'>
    <thead>
        <tr>
            <th>Listen at professor</th>
            <th>Subject</th>
            <th>Subject Grade</th>
        </tr>
    </thead>
    <tbody>
        @foreach($professors  as $professor)
        <tr>
           
            <td>
                {{ $professor->first_name.' '.$professor->last_name  }}
            </td>
            
            <td>
              
            </td>
            <td>
                
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@stop
