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
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link type='text/css' href="{{ asset('css/main.css') }}" rel='stylesheet' />

    </head>
    <body>

        <header class="pozadina text-white p-4"> 
            <div class="container">
                <h2>Electronic school diary</h2>
            </div>
        </header>
                      
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark col">
          <div class="container">
          
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
                    <a class="nav-link" href="{{ route('getLogin') }}">Login</a>
                    @else
                    <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                    @endif
                </li>
              </ul>
            </div>
          
          </div>
        </nav>
              
        <section>
            <div class="container py-5 mb-5">
                @yield('content')
            </div> 
        </section>
        
    
        <footer class="bg-dark fixed-bottom p-2 text-light">
          <div class="container text-center">
            <p class="m-0">Napravio: Miloš Marković</p>  
          </div>
        </footer>
      
        
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <!-- <script src="http://localhost/elektronski_dnevnik/public/js/jquery.js" ></script>   -->

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        
        <script src="{{ asset('js/jquery.js') }}"></script>

    </body>
</html>

@yield('script')