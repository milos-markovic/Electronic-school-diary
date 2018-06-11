<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Elektronski dnevnik</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <link type='text/css' href='http://localhost/elektronski_dnevnik/public/css/main.css' rel='stylesheet' />
    </head>
    <body>
        <div class='container wrapper'>

            <div class="row">
                <header class="col"> 
                        <h2 class="pl-4">Electronic school diary</h2>
                </header>
            </div>
            
            <div class='row'>
                
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark col">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                          <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                        </li>

                        @if(Auth::check() && Auth::user()->role->name == 'Administrator')
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Admin staff
                          </a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('users.index') }}">Users</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('classroom.index') }}">Classrooms</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('subjects.index') }}">Subjects</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('professors.index') }}">Professors</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('parents.index') }}">Parents</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('students.index') }}">Students</a>
                          </div>
                        </li>
                        @endif

                        @if(Auth::check() && Auth::user()->role->name == 'Professor')
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('professor.index') }}">Professor</a>
                        </li>
                        @endif

                        @if(Auth::check() && Auth::user()->role->name == 'Parent')
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('parent.index') }}">Parent</a>
                        </li>
                        @endif
                      </ul>
                      <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item" >
                            @if(!Auth::user())
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                            @else
                            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                            @endif
                        </li>
                      </ul>
                    </div>
                </nav>
                
            </div>
                
            <section>
                
                @yield('content')
                
            </section>
            
            <div class="row">
                <footer class="col">

                    <p>Napravio: Miloš Marković</p>

                </footer>
            </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
        <script src="http://localhost/elektronski_dnevnik/public/js/jquery.js" ></script>  
    </body>
</html>

@yield('script')