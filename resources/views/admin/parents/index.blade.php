@extends('masterPage')


@section('content')

<h2>Parents:</h2><br>


@if(count($parents))

    <div class="card">
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
                    <td><img src="{{ asset('images/'.$parent->photo->name) }}" width="100" class="rounded" /></td>
                    <td><a href="{{ route('parents.show',$parent->id) }}">{{ $parent->first_name }}</a></td>
                    <td>{{ $parent->last_name }}</td>
                    <td>{{ $parent->email }}</td>
                    <td>{{ $parent->created_at->diffForHumans() }}</td>
                    <td>
                        @if( isset($parent->updated_at ))
                            {{ $parent->updated_at->diffForHumans() }}
                        @endif
                    </td>
                    <td>{{ $parent->role->name }}</td>
                    <td><a href="{{ route('parents.edit',$parent->id) }}" class="btn btn-outline-primary" >Update</a></td>
                    <td>
                        <form action="{{ route('parents.destroy',$parent->id) }}" method='POST'>
                            
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            
                            <button class='btn btn-outline-danger' >Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@else

    <h6>Create new Parent</h6>

@endif

<br>


<a href="{{ route('parents.create') }}" class='btn btn-outline-primary text-center' >Add Parent</a>

@stop
