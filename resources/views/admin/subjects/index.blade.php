@extends('masterPage')

@section('content')

<div class="row">
    
    
    <div class="col-sm-5">
        
        <h2>Subjects:</h2><br>

        @if(count($subjects))
            <table class='table'>
                <thead>
                    <tr>
                        <th></th>
                        <th>Subject name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subjects as $subject)
                    <tr>
                        <td>{{ $subject->id }}</td>
                        <td>{{ $subject->name }}</td>
                        <td>
                            <form action='{{ route('subjects.destroy',$subject->id) }}' method='POST'>
                                
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                
                                <input type='submit' name='submit' value='Delete' class='btn btn-outline-danger' />
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h4>Create subject</h4>
        @endif

    </div>
    
    
    
    <div class="col-sm-5 offset-sm-2">
    
        
        @include('errors.formErrors')   

        <form action="{{ route('subjects.store') }}" method="POST">
            {{ csrf_field() }}
            <p>
                <label for="subject">Create subject:</label>
                <input type="text" name="name" id="subject" class="form-control" />
            </p>
            <p>
                <input type="submit" name="submit" value="Create" class="btn btn-outline-success" />
            </p>
        </form>

    </div>
    
</div>

@stop

