<!DOCTYPE html>
<html>
    <head>
        <title> @yield('title') </title>
        <link rel="stylesheet" href="{{ asset('style.css') }}">
    </head>
    <body>
    <div class="container">
        <div class="header">
            <div class="profile">
                <div class="image">
                    <img src="{{ 'http://127.0.0.1:8000'.Storage::url(session('file_path')) }}" />
                </div>
                <a href="{{ route('user.dashboard')}}" style="color: whitesmoke; font-size:25px"><h3> {{ session('first_name') }} </h3></a>
            </div>
            <div class="menu">
                @if(session('access_type') == "admin" || session('access_type') == "teacher")
                    <button> <a href="{{ route('user.show') }}">List All Users</a> </button>
                    <button> <a href="{{ route('user.adduser') }}">Add User</a> </button>
                @endif
                <button> <a href="{{ route('user.logout') }}">Logout</a> </button>
            </div>
        </div>
    </div>
    <div class="navbar">
            <button> <a href="{{ route('chapter.show') }}">Chapter</a> </button>
            <button> <a href="{{ route('subject.show') }}">Subject</a> </button>
            <button> <a href="{{ route('standard.show') }}">Standard</a> </button>

        @if(session('access_type') == "admin" || session('access_type') == "teacher")
        <div class="dropdown">
            <button class="dropbtn">Other Operations</button>
            <div class="dropdown-content">
                    <button> <a href="{{ route('assign_chapter.show') }}">Assign Chapter to Subject</a> </button>
                    <button> <a href="{{ route('assign_subject.show') }}">Assign Subject to Standard</a> </button>
                    <button> <a href="{{ route('assign_student.show') }}">Assign Student to Standard</a> </button>
            </div>
        </div>
     @endif
    </div>

    @yield('content1')
    </body>
</html>
