@extends('masterPage')



@section('content')


<h2 class="text-center">Update student: {{ $student->first_name.' '.$student->last_name }}</h2><br>


<div class="row">
      
    <div class="col-sm-4">
    
        <img src="{{ asset('images/'.$student->photo->name) }}" class="img-thumbnail border-dark" />
    
    </div>

    
    <div class="col-sm-8">
    
        @include('errors.formErrors')

        <form action="{{ route('students.update',$student->id) }}" method='POST' enctype='multipart/form-data' >
            {{ csrf_field() }}
            
            {{ method_field('PUT') }}
            <p>
                <label for='first_name'>First name:</label>
                <input type='text' name='first_name' id='first_name' value='{{ $student->first_name }}' class='form-control' />
            </p>
            <p>
                <label for='last_name'>Last name:</label>
                <input type='text' name='last_name' id='last_name' value='{{ $student->last_name }}' class='form-control' />
            </p>
            <p>
                <label for='email'>Email:</label>
                <input type="text" name='email' id='email' value='{{ $student->email }}' class='form-control' />
            </p>
            <p>
                <label for='date_of_birth'>Date of birth:</label>
                <input type='text' name='date_of_birth' id='date_of_birth' value='{{ $student->date_of_birth }}' class='form-control' />
            </p>
            <p>
                <label for='parent'>Student parent:</label>
                <select name='parent' class='form-control' >
                    @foreach($parents as $parent)
                    
                        <option value='{{ $parent->id }}' <?php if($parent->id == $student->parents()->first()->id) echo "selected"; ?>   >{{ $parent->first_name.' '.$parent->last_name }}</option>
                    
                    @endforeach
                </select>
            </p>
            <p>
                <label for='classroom' >Classroom:</label>
                <select name='classroom' id='classroom' class='form-control' >
                    
                    @foreach($classrooms as $classroom)
                        
                        <option value='{{ $classroom->id }}' <?php if($classroom->id === $student->classroom_id) echo "selected"; ?>  >

                            {{ $classroom->class_name }}

                        </option>
                      
                    @endforeach
                </select>
            </p>
            <p>
                <label for='photo'>Pick file for profile photo:</label>
                <input type='file' name='photo' id='photo' />
            </p>
            <p class="text-center">
                <input type='submit' name='submit' value='Update' class='btn btn-outline-primary' />
            </p>
        </form>
            
        

    </div>

</div>



@stop
