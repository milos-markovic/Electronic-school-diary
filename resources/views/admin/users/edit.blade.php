@extends('masterPage')


@section('content')

<h2>Update user {{ $user->first_name.' '.$user->last_name }}:</h2><hr><br>

<div class="row">
   
    
<div class="col-sm-3">
    
    <img src="http://localhost/elektronski_dnevnik/public/images/{{ $user->photo->name }}" class="img-thumbnail border-dark" />
    
</div>

    
<div class="col-sm-9">    
    
    <form action='{{ url('admin/users',$user->id) }}' method='POST' enctype='multipart/form-data'>

        {{ method_field('PUT') }}

        {{ csrf_field() }}
        <p>
            <label for='first_name' >First name:</label>
            <input type='text' name='first_name' id='first_name' value='{{ $user->first_name }}' class='form-control' />
        </p>
        <p>
            <label for='last_name' >Last name:</label>
            <input type='text' name='last_name' id='last_name'  value='{{ $user->last_name }}' class='form-control' />
        </p>
        <p>
            <label for='email' >Email:</label>
            <input type='text' name='email' id='email' value='{{ $user->email }}'  class='form-control' />
        </p>
        <p>
            <label for='password' >Password:</label>
            <input type='password' name='password' id='password' value='{{ $user->password }}' class='form-control' />
        </p>
        <p>
            <label id='role_id'>Role:</label>
            <select name='role_id' id='role_id' class='form-control'>

                @foreach($userRoles as $role)

                        <option value='{{ $role->id }}' <?php if($role->name == $user->role->name)echo "selected" ;?>  >{{ $role->name }}</option>

                @endforeach

            </select>
        </p>
        <p>
            <label for='photo_id'><b>Pick your photo:</b></label><br>
            <input type='file' name='photo_id' id='photo_id' class='form-control'  />
        </p>
        <p>
            <input type='submit' name='submit' value='Update' class='btn btn-outline-success '  />
        </p>

    </form>

    <form action='{{ url('admin/users',$user->id) }}' method='POST' >
        {{ csrf_field() }}

        {{ method_field('DELETE') }}
        <p>
            <input type='submit' name='submit' value='Delete' class='btn btn-outline-danger' />
        </p>
    </form>

</div>
    
    
</div>


@stop
