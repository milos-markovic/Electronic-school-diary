@extends('masterPage')

@section('content')

<h2>Details of student {{ $student->first_name.' '.$student->last_name }}</h2><br>

<table class='table'>
    <thead>
        <tr>
            <th></th>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><img src="{{ asset('images/'.$student->photo->name) }}" width='100' /></td>
            <td>{{ $student->first_name }}</td>
            <td>{{ $student->last_name }}</td>
            <td>{{ $student->email }}</td>
        </tr>
    </tbody>
</table><br>


<table class='table table-bordered'>
    <thead>
        <tr>
            <th>Professor</th>
            <th>Classroom subject</th>
            <th>Subject Grade</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($subjects as $subject) 

        <tr>
            <td>
                @foreach($subject->programs()->where('classroom_id',$classroom->id)->with('professor')->get()->pluck('professor') as $professor)
                
                {{ $professor->first_name.' '.$professor->last_name }}
                
                @endforeach
            </td>
            <td>
                {{ $subject->name }}
            </td>
            <td>
                @foreach($subject->programs1()->with('grade')->get()->pluck('grade') as $grade)
                
              
                    {{ $grade->name.', ' }}
                    
                     @foreach($subject->programs()->where('classroom_id',$classroom->id)->with('professor')->get()->pluck('professor') as $professor)
                    
                        @if(Auth::user()->id == $professor->id)
                
                        <a href='{{ route('subject.removeGrade',[ $student->id,$subject->id,$grade->id ]) }}' >erase</a>&nbsp;&nbsp;
                    
                        @endif
                        
                     @endforeach
                
                @endforeach
            </td>
            <td>
                @foreach($subject->programs()->where('classroom_id',$classroom->id)->with('professor')->get()->pluck('professor') as $professor)
                
                    @if($professor->id === Auth::user()->id)
                    
                    <a href='{{ route('student.insertGrade',[ $student->id,$subject->id ]) }}' class='btn btn-primary' >Insert grade</a>
                    
                    @endif
                
                @endforeach
            </td>
        </tr>
        
        @endforeach
    </tbody>
</table>


@stop


