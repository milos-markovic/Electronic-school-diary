@extends('masterPage')


@section('content')

<h2>Parents:</h2><br>


@if(count($parents))

    <table class='table'>
        <thead>
            <tr>
                <th></th>
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
                <th>Created at</th>
                <th>Upadted at</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach($parents as $parent)
            <tr>
                <td><img src="http://localhost/elektronski_dnevnik/public/images/{{ $parent->photo->name }}" width="100" class="rounded" /></td>
                <td><a href='{{ route('parents.show',$parent->id) }}'>{{ $parent->first_name }}</a></td>
                <td>{{ $parent->last_name }}</td>
                <td>{{ $parent->email }}</td>
                <td>{{ $parent->created_at->diffForHumans() }}</td>
                <td>{{ $parent->updated_at->diffForHumans() }}</td>
                <td>{{ $parent->role->name }}</td>
                <td><a href="{{ route('parents.edit',$parent->id) }}" class="btn btn-outline-primary" >Update</a></td>
                <td>
                    <form action='{{ route('parents.destroy',$parent->id) }}' method='POST'>
                        
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        
                        <button class='btn btn-outline-danger' >Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@else

    <h6>Create new Parent</h6>

@endif

<br>


<a href='{{ route('parents.create') }}' class='btn btn-outline-success' >Add Parent</a>

@stop
