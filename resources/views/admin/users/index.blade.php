@extends('masterPage')


@section('content')

<h2 class="text-center">Users:</h2><br>

@include('message.sessionMessage')


@if(count($users))
<div class="card">

    <table class="table text-center">
        <thead>
            <tr>
                <th></th>
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td><img width='70' src="{{ asset('images/'.$user->photo->name) }}" class="rounded" /></td>
                <td><a href="{{ route('users.edit',$user->id) }}">{{ $user->first_name }}</a></td>
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at->diffForHumans() }}</td>
                <td>
                    @if( isset( $user->updated_at ))

                         {{ $user->updated_at->diffForHumans() }}

                    @endif
                </td>
                <td>{{ $user->role->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</div>
@else
     <h4>Create new user</h4>
@endif

<br>

<a href="{{ route('users.create') }}" class="btn btn-outline-primary">Create User</a>


@stop