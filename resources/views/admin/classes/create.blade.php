@extends('masterPage')


@section('content')

<div class="border border-dark p-4 w-75 m-auto">

    <h2 class="text-center">Create new Class:</h2><hr><br>

    @include('errors.formErrors')

    <form action="{{ route('classroom.store') }}" method='POST'>
        {{ csrf_field() }}
        <p>
            <label for='class_name'>Class name:</label>
            <input type='text' name='class_name' id='class_name' class='form-control' />
        </p>
        <p>
            <label for='class_year'>Class year:</label>
            <select name="class_year" class="form-control" >
                @for ($i = 2010; $i <= 2020; $i++)
                <option value="{{ $i }}">
                    
                        {{ $i }}
                    
                </option>
                @endfor
            </select>
        </p>
        <p>
            <label for='class_officer'>Class officer:</label>
            <select name='class_officer' class='form-control' >
                @foreach($professors as $professor)
                    <option value="{{ $professor->first_name.' '.$professor->last_name }}">{{ $professor->first_name.' '.$professor->last_name }}</option>
                @endforeach
            </select>
        </p>
        <p class="text-center">
            <input type='submit' name='submit' value='Create' class='btn btn-outline-primary' />
        </p>
    </form>

</div>


@stop
