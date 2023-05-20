<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="shortcut icon" sizes="any" href="{{ asset('img/icon4.png') }}" type="image/x-icon">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Edit Borrow Section - E-Library</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!-- Fonts and icons -->
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
    <div class="sidebar" data-color="blue" data-image="{{ asset('img/sidebar-2.jpg') }}">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"
        Tip 2: you can also add an image using data-image tag
    -->
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
          <div class="section"></div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Edit Borrow</h4>
                </div>
                <div class="card-body">
                  <form method="POST" action="{{ route('borrow.update', ['borrow_id' => $borrow->borrow_id]) }}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                      <div class="col-md-4 pr-1">
                        <div class="form-group">
                          <label>Student Number</label>
                          <input type="number" id="student_number" class="form-control" onblur="getStudentName()" name="student_number" value="{{$borrow->student_id}}">
                        </div>
                      </div>
                      <div class="col-md-4 pl-1">
                        <div class="form-group">
                          <label>Student Name</label>
                          <input type="text" id="student_name" class="form-control" name="student_name" value="{{$borrow->student->student_name}}">
                        </div>
                      </div>
                      <div class="col-md-4 pl-1">
                        <div class="form-group">
                          <label>Book ISBN</label>
                          <input type="number" id="book_isbn" class="form-control" name="book_isbn" value="{{$borrow->book_isbn}}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Time Borrow</label>
                          <input type="datetime-local" id="time_borrow" class="form-control" name="time_borrow" value="{{$borrow->time_borrow}}">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Time Return</label>
                          <input type="datetime-local" id="time-return" class="form-control" name="time_return" value="{{$borrow->time_return}}">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Fines</label>
                          <input type="number" id="fines" class="form-control" name="fines" value="{{$borrow->fines}}">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Action</label>
                          <select class="form-control" name="action" id="action">
                            <option>Select</option>
                            <option value="Paid">Paid</option>
                            <option value="Not Paid">Not Paid</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <button type="submit" id="save-button" name="submit" class="btn btn-info btn-fill pull-right">Save</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
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
  <!-- Core JS Files -->
  <script src="assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
  <script src="assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <!-- Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="assets/js/plugins/bootstrap-switch.js"></script>
  <!-- Google Maps Plugin -->
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist Plugin -->
  <script src="assets/js/plugins/chartist.min.js"></script>
  <!-- Notifications Plugin -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
  <script src="assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
  <!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/js/demo.js"></script>
  <script>
   function getStudentName() {
    var studentNumber = document.getElementById("student_number").value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = JSON.parse(this.responseText);
            if (response.error) {
                document.getElementById("student_name").value = "No Data found";
            } else {
                document.getElementById("student_name").value = response.student_name;
            }
        }
    };
    xhttp.open("GET", "{{ route('get-student-name') }}?student_number=" + studentNumber, true);
    xhttp.send();
}
  </script>
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
  <script>
    document.getElementById("save-button").addEventListener("click", function () {
      alert("Borrow update successfully!");
    });
  </script>
</html>
