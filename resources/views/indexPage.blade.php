@extends('masterPage')


@section('content')



<div class="jumbotron jumbotron-fluid" style='background-color: lightgray;' >
  <div class="container">
    <h1 class="display-4">Electronic school diary</h1>
    <p class="lead "><strong>Electronic school diary - is diary in electronic format which provides timely information to all user groups, offers quality information and easy access.</strong></p>
    
    <hr class="my-4">
    
    <p class='lead text-uppercase' style='font-weight:1em'><strong>Logged in user are provided different options depending on the type of user.</strong></p>
    <li class='lead text-center'><strong>If logged in user is type of director or administrator he has the options such as:</strong></li>
    
    <br>
    
    <ul class="list-group" style="width:400px;margin:auto;background-color:#1b6d85;">
      <li class="list-group-item " style="background-color:#1b6d85;color:white;">Edit professors</li>
      <li class="list-group-item " style="background-color:#1b6d85;color:white;">Edit Parents</li>
      <li class="list-group-item " style="background-color:#1b6d85;color:white;">Edit Students</li>
      <li class="list-group-item " style="background-color:#1b6d85;color:white;">Edit subjects</li>
      <li class="list-group-item" style="background-color:#1b6d85;color:white;">Edit classrooms</li>
    </ul><br>
    
    
    <li class='lead text-center'><strong>If logged in user is professor he has the options such as:</strong></li>
    
    <br>
    
    <ul class="list-group" style="width:400px;margin:auto;" >
        <li class="list-group-item" style="background-color:#1b6d85;color:white;">Insert grade to students subject</li>
    </ul>
    
    <br>
    
    <li class='lead text-center' ><strong>Logged in parent user can see the current result of their childrens</strong></li>
    
  </div>
</div>


@stop

