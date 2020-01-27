@extends('masterPage')

@section('content')


<h2 class="text-center">Update parent: {{ $parent->first_name.' '.$parent->last_name }}</h2><br>


<div class="row">

    
    <div class="col-sm-4" >

        <img src="{{ asset('images/'.$parent->photo->name) }}" class="img-thumbnail border-dark" />

    </div>
    

    <div class="col-sm-8">
    
        @include('errors.formErrors')
        
        <form action="{{ route('parents.update',$parent->id) }}" method='POST' enctype='multipart/form-data'>
            {{ csrf_field() }}

            {{ method_field('PUT') }}
            <p>
                <label>First name:</label>
                <input type='text' name='first_name' id='first_name' value='{{ $parent->first_name }}' class='form-control' />
            </p>
            <p>
                <label>Last name:</label>
                <input type='text' name='last_name' id='last_name' value='{{ $parent->last_name }}' class='form-control' />
            </p>
            <p>
                <label>Email:</label>
                <input type='text' name='email' id='email' value='{{ $parent->email }}' class='form-control' />
            </p>
            <p>
                <label>Password:</label>
                <input type='password' name='password' id='password' value='{{ $parent->password }}' class='form-control' />
            </p>
            <p>
                <label  for='photo'>Pick photo for profile:</label>
                <input type='file' name='photo' id='photo' />
            </p>
            <p class="text-center">
                <input type='submit' name='submit' value='Update' class='btn btn-outline-primary' />
            </p>
        </form>

    </div>

</div>    
    
@stop
