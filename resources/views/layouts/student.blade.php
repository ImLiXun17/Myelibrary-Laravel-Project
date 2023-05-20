
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="shortcut icon" sizes="any" href="img/icon4.png" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Student Section E-Library</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
<!-- CSS Files -->
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/light-bootstrap-dashboard.css?v=2.0.0') }}" rel="stylesheet">
<!-- CSS Just for demo purpose -->
<link href="{{ asset('css/demo.css') }}" rel="stylesheet">

</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="blue" data-image="img/sidebar-7.jpg">

            <div class="sidebar-wrapper">
            @include('includes.sidebar')
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            @include('includes.navbar')
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="section">
                    </div>
                    <div class="row">
                    <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                            </br>
                            <div class="col-md-4">
                                <form action="{{ route('student')}}" method="GET">
                                    <input type="text" name="search" class="form-control" placeholder="Search here"style="margin-bottom: 8px"/>
                                    <input type="submit" name ="submit" value="Search" class ="btn btn-info btn-fill" />
                                </form>
                            </div>
                            <div class="col-md-12">
                                <a href="{{ route('student.create') }}">
                                    <button type="submit"class="btn btn-info btn-fill pull-right">Add New Student</button>
                                </a>
                            </div>
                                <div class="card-header ">
                                    <h4 class="card-title">Student</h4>
                                    <p class="card-category">Here is ythe list of Students</p>
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>Full Name</th>
                                            <th>Corporate Email</th>
                                            <th>College</th>
                                            <th>Address</th>
                                        </thead>
                                        <tbody>
                                          @foreach($students as $student)
                                            <tr>
                                                <td>{{ $student->student_name }}</td>
                                                <td>{{ $student->corporate_email }}</td>
                                                <td>{{ $student->college->college_name }}</td>
                                                <td>{{ $student->address }}</td>
                                                <td>
                                                    <a href="{{ route('student-edit', ['sid' => $student->sid]) }}">
                                                    <button type="submit" class ="btn btn-warning btn-fill pull-right">Edit</button>
                                                    </a>
                                                </td>
                                                <td>
                                                <form action="{{ route('student-delete', ['sid' => $student->sid]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-fill pull-right">Delete</button>
                                                </form>
                                                </td>
                                               
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{ $students->links('vendor.pagination.default') }}
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav>
                        <ul class="footer-menu">
                            <li>
                                <a href="home.php">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="http://psulibrary.palawan.edu.ph/home/">
                                    Company
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Developers<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                <li><a href="https://github.com/ImLiXun17">Maurene Llado</a></li>
                                <li><a href="https://github.com/SeanHarvy">Sean Orga</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="">
                                    Blog
                                </a>
                            </li>
                        </ul>
                        <p class="copyright text-center">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                        </p>
                    </nav>
                </div>
            </footer>
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="{{ asset('js/core/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/core/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/core/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- Plugin for Switches -->
<script src="{{ asset('js/plugins/bootstrap-switch.js') }}"></script>
<!-- Google Maps Plugin -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chartist Plugin -->
<script src="{{ asset('js/plugins/chartist.min.js') }}"></script>
<!-- Notifications Plugin -->
<script src="{{ asset('js/plugins/bootstrap-notify.js') }}"></script>
<!-- Control Center for Light Bootstrap Dashboard -->
<script src="{{ asset('js/light-bootstrap-dashboard.js?v=2.0.0') }}" type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods -->
<script src="{{ asset('js/demo.js') }}"></script>
<script>
  const start = new Date();
  // update the time every second
  setInterval(() => {
    const now = new Date();
    const elapsed = Math.floor((now - start) / 1000);
  
    // get the weekday name from the current date
    const weekdayNames = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    const weekdayIndex = now.getDay();
    const weekdayName = weekdayNames[weekdayIndex];
  
    // get the month name, day, and year from the current date
    const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    const monthIndex = now.getMonth();
    const monthName = monthNames[monthIndex];
    const day = now.getDate();
    const year = now.getFullYear();
  
    // format the time string
    let hours = now.getHours();
    const minutes = now.getMinutes().toString().padStart(2, "0");
    const seconds = now.getSeconds().toString().padStart(2, "0");
    const ampm = hours >= 12 ? "pm" : "am";
    hours %= 12;
    hours = hours ? hours : 12; // convert 0 to 12
  
    const timeString = hours + ":" + minutes + ":" + seconds + " " + ampm;
  
    // construct the final date string
    const dateString = weekdayName + ", " + monthName + " " + day + ", " + year;
    document.getElementById("clock").innerHTML = dateString + " " + timeString;
  }, 1000);
</script>
 

</html>
