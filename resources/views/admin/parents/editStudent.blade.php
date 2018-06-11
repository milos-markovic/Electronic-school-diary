@extends('masterPage')


@section('content')

<h2>Update student {{ $student->first_name.' '.$student->last_name }}:</h2><br>


@include('errors.formErrors')

<div class="row">
    

    <div class="col-sm-4">
    
        <img src="http://localhost/elektronski_dnevnik/public/images/{{ $student->photo->name }}" class="img-thumbnail border-dark"  />
    
    </div>
 
 
    <div class="col-sm-8">
    
        <form action='{{ route('parents.updateStudent',$student->id) }}' method='POST' enctype="multipart/form-data" >
            {{ csrf_field() }}
            <p>
                <label for='first_name'>First name:</label>
                <input type='text' name='first_name' id='first_name' value='{{ $student->first_name }}' class='form-control' />
            </p>
            <p>
                <label for='last_name' >Last name:</label>
                <input type='text' name='last_name' id='last_name' value='{{ $student->last_name }}' class='form-control' />
            </p>
            <p>
                <label for='email' >Email:</label>
                <input type='text' name='email' id='email' value='{{ $student->email }}' class='form-control' />
            </p>
            <p>
                <label for="date_of_birth">Date of birth</label>
                <input type="text" name="date_of_birth" id="date_of_birth" value="{{ $student->date_of_birth }}" class="form-control" />
            </p>
            <p>
                <label for="classroom">Classroom</label>
                <select name='classroom' class='form-control' id="classroom" >
                    @foreach($classrooms as $classroom)

                    <option value='{{ $classroom->id }}' <?php if($classroom->id == $student->classroom_id) echo "selected"; ?> >{{ $classroom->class_name }}</option>

                    @endforeach
                </select>
            </p>
            <p>
                <label for='photo'>Pick photo for profile picture:</label>
                <input type="file" name='photo' id='photo' />
            </p>
            <p>
                <input type='submit' name='submit' value='Update' class='btn btn-outline-primary' />
            </p>
        </form>

        
    </div>     
        
</div>    
    
    
@stop
