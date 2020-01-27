@extends('masterPage')



@section('content')

<h2 class="text-center">Classes:</h2><br>

<div class="card">

    @if(count($classes))
        <table class='table table-hover text-center m-0'>
            <thead>
                <tr>
                    <th>Class name</th>
                    <th>Class year</th>
                    <th>Class officer</th>
                </tr>
            </thead>
            <tbody>
                @foreach($classes as $class)
                <tr>
                    <td><a href="{{ route('classroom.studentsIndex',$class->id) }}">{{ $class->class_name }}</a></td>
                    <td>{{ $class->class_year }}</td>
                    <td>{{ $class->class_officer }}</td>
                    <td><a href="{{ route('classroom.edit',$class->id) }}" class='btn btn-outline-primary' >Update</a></td>
                    <td>
                        <form action="{{ route('classroom.destroy',$class->id) }}" method="POST">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            
                            <button class="btn btn-outline-danger" >Delete</button>
                        
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h4>Create new classroom</h4>
    @endif<br>

</div>

<a href="{{ route('classroom.create') }}" class='btn btn-outline-primary mt-4' >Create Class</a>

@stop

