@extends('masterPage')


@section('content')


@include('errors.formErrors')

    <div class="border border-dark p-4 w-75 m-auto mb-5">

        <h2 class="text-center">Create User:</h2><hr><br>
    
        <form action="{{ url('admin/users') }}" method='POST' enctype="multipart/form-data">
            
            {{ csrf_field() }}
            <p>
                <label for='first_name' >First name:</label>
                <input type='text' name='first_name' id='first_name' class='form-control' />
            </p>
            <p>
                <label for='last_name' >Last name:</label>
                <input type='text' name='last_name' id='last_name' class='form-control' />
            </p>
            <p>
                <label for='email' >Email:</label>
                <input type='text' name='email' id='email' class='form-control' />
            </p>
            <p>
                <label for='password' >Password:</label>
                <input type='password' name='password' id='password' class='form-control' />
            </p>
            <p>
                <label id='role_id'>Role:</label>
                <select name='role_id' id='role_id' class='form-control'>
                
                    @foreach($userRoles as $role)    
                        <option value='{{ $role->id }}'>{{ $role->name }}</option>
                    @endforeach
                    
                </select>
            </p>
            <p>
                <label for='photo_id'><b>Pick your photo:</b></label><br>
                <input type='file' name='photo_id' id='photo_id' class='btn btn-outline-default'  />
            </p>
            <p class="text-center">
                <input type='submit' name='submit' value='Create' class='btn btn-outline-success' />
            </p>
            
        </form>
    
    </div>

@stop

