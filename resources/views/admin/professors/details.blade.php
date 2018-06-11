@extends('masterPage')


@section('content')

<h2>Details of professor {{ $professor->first_name.' '.$professor->last_name }}</h2><br>

<table class='table'>
    <thead>
        <tr>
            <th></th>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Created_at</th>
            <th>Updated_at</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><img src="http://localhost/elektronski_dnevnik/public/images/{{ $professor->photo->name }}" width="100" class="border"  /></td>
            <td>{{ $professor->first_name }}</td>
            <td>{{ $professor->last_name }}</td>
            <td>{{ $professor->email }}</td>
            <td>{{ $professor->role->name }}</td>
            <td>{{ $professor->created_at->diffForHumans() }}</td>
            <td>{{ $professor->updated_at->diffForHumans() }}</td>
        </tr>
    </tbody>
</table>


@if(count($subjects))

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Teach Subjects</th>
            <th>In Classrooms</th>
        </tr>
    </thead>
    <tbody>

        @foreach($subjects as $subject)
        <tr>
           
            <td>
                
                <span style="font-size: 1.1em;">{{ $subject->name }}</span>
                
                <a href="{{ route('professorSubject.destroy',[$professor->id,$subject->id]) }}" class="deleteSubject" >Delete Subject</a>
                
            </td>
          
            <td>
                @foreach($subject->programs()->with('classroom')->where('professor_id','=',$professor->id)->get()->pluck('classroom') as $classroom)
     
                
                    <a class="h6" href='{{ route('professor.classroomStudents',$classroom->id) }}' >{{ $classroom->class_name.', ' }}</a>
                
                    <a href='{{ route('subjectClass.destroy',[$professor->id,$subject->id,$classroom->id]) }}' class='deleteClass' >Delete</a>
                    
                    
                @endforeach
            </td>
            
        </tr>
        @endforeach
        
    </tbody>
</table>

@else
    <h6>Professor doesn't have subjects</h6>
@endif

<br>

<a href="{{ route('add.subjects',$professor->id) }}" class="btn btn-outline-primary" >Add Subject</a>

@stop