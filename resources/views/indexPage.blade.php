@extends('masterPage')


@section('content')



<div class="jumbotron jumbotron-fluid" style='background-color: lightgray;' >
  <div class="container">
    <h1 class="display-4 text-center mb-4">Electronic school diary</h1>
    <p class="lead "><strong>Electronic school diary - is diary in electronic format which provides timely information to all user groups, offers quality information and easy access.</strong></p>
    
    <hr class="my-4">
    
    <p class='lead text-uppercase text-center' style='font-weight:1em'><strong>Logged in user are provided different options depending on the type of user.</strong></p>
    <li class='lead text-center'><strong>If logged in user is type of director or administrator he has the options such as:</strong></li>
    
    <br>
    
    <ul class="list-group" style="width:400px;margin:auto;">
      <li class="list-group-item pozadina">Edit professors</li>
      <li class="list-group-item pozadina">Edit Parents</li>
      <li class="list-group-item pozadina">Edit Students</li>
      <li class="list-group-item pozadina">Edit subjects</li>
      <li class="list-group-item pozadina">Edit classrooms</li>
    </ul><br>
    
    
    <li class='lead text-center'><strong>If logged in user is professor he has the options such as:</strong></li>
    
    <br>
    
    <ul class="list-group" style="width:400px;margin:auto;" >
        <li class="list-group-item pozadina">Insert grade to students subject</li>
    </ul>
    
    <br>
    
    <li class='lead text-center' ><strong>Logged in parent user can see the current result of their childrens</strong></li>
    
  </div>
</div>


@stop

