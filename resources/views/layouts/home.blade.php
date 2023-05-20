
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="shortcut icon" sizes="any" href="{{ asset('img/icon4.png') }}" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Homepage E-Library</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/light-bootstrap-dashboard.css?v=2.0.0') }}" rel="stylesheet">
    <!-- CSS Just for demo purpose -->
    <link href="{{ asset('css/demo.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="blue" data-image="{{ asset('img/sidebar-6.jpg') }}">

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
                    <div class="row">
                         <div class="col-md-6">
                             <div class="card">
                             <div class="header">
                                <h4 class="title"style="text-align: center;">Top 10 Most Borrowed Books</h4>
                                  <p class="category" style="text-align: center;">Books</p>
                                </div>
                            <div class="content" style="padding-right: 15px;">
                       <center><canvas id="myChartTopFive"></canvas></center>
                       
                <div class="footer">
             <hr>
         <div class="stats" style="text-align: center;">
            <i class="fa fa-clock-o"></i> Update Automatically
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="col-md-6">
            <div class="card ">
                 <div class="header ">
                     <h4 class="title" style="text-align: center;">Top Colleges</h4>
                        <p class="category" style="text-align: center;">Colleges</p>
                            </div>
                                <div class="content"style="padding-right: 15px;">
                                <canvas id="collegeChartTopFive"></canvas>
                                
                        <div class="footer">
                        <hr>
                                     <div class="stats"style="text-align: center;">
                                        <i class="fa fa-clock-o"></i> Update Automatically
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-6">
                 <div class="card ">
                 <div class="header ">
                     <h4 class="title" style="text-align: center;">Student By College in Library</h4>
                        <p class="category" style="text-align: center;">Colleges Enrolled in Library</p>
                            </div>
                        <div class="content"style="padding-right: 15px;">
                        <center><canvas id="mycollegeChartTopFive"></canvas></center>
                       
                        <div class="footer">
                        <hr>
                                     <div class="stats"style="text-align: center;">
                                        <i class="fa fa-clock-o"></i> Update Automatically
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
         <div class="col-md-6">
             <div class="card ">
                 <div class="header ">
                     <h4 class="title" style="text-align: center;">Top Fines</h4>
                        <p class="category" style="text-align: center;">Borrow fines Category</p>
                            </div>
                                <div class="content"style="padding-right: 15px;">
                                <canvas id="studentChartTopfines"></canvas>
                           

                        <div class="footer">
                        <hr>
                                     <div class="stats"style="text-align: center;">
                                        <i class="fa fa-clock-o"></i> Update Automatically
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-6">
                 <div class="card ">
                 <div class="header ">
                     <h4 class="title" style="text-align: center;">No. Students Who Borrow per Month</h4>
                        <p class="category" style="text-align: center;">Borrow Count Category</p>
                            </div>
                                <div class="content"style="padding-right: 15px;">
                                <canvas id="studentChartTopmonths"></canvas>
                               

                        <div class="footer">
                        <hr>
                                     <div class="stats"style="text-align: center;">
                                        <i class="fa fa-clock-o"></i> Update Automatically
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-6">
                          <div class="card ">
                                <div class="card-header ">
                                    <h4 class="card-title" style="text-align: center;">Top 5 Recent Students</h4>
                                    <p class="card-category" style="text-align: center;">Recently added</p>
                                </div>
                                <div class="card-body ">
                                <br>
                                <table border="2" style="margin: 0 auto; width: 80%; height: 200px; text-align: center;">
                                        <tr>
                                            <th>Student Name</th>
                                            <th>College Name</th>
                                        </tr>
                                        @foreach ($students as $student)
                                            <tr>
                                                <td>{{ $student->student_name }}</td>
                                                <td>{{ $student->college_name }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                    <style>
                                            tr, td, th{
                                                text-align: center;
                                                
                                            }
                                           
                                            th{
                                                background-color: #1AA7EC;
                                                color: #fff;
                                            }
                                            tr:nth-child(even) {
                                                background-color: #f2f2f2;
                                            }
                                            tr:nth-child(odd) {
                                                background-color: rgba(4, 71, 255, 0.08);
                                            }
                                            </style>
                                    <hr>
                                    <div class="stats"style="text-align: center;">
                                        <i class="fa fa-clock-o"></i> Report Update Automatically
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
<style>
#mycollegeChartTopFive {
  width: 400px;
  height: 400px;
}
</style>
<script>
    var data = {
        labels: @json($label_chart),
        datasets: [{
            label: 'No. of Students who Borrowed Book',
            data: @json($count_book),
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 0, 132, 0.2)',
                'rgba(0, 227, 255, 0.2)',
                'rgba(255, 166, 0, 0.2)',
                'rgba(168, 255, 0, 0.2)',
                'rgba(236, 0, 255, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 0, 132, 1)',
                'rgba(0, 227, 255, 1)',
                'rgba(255, 166, 0, 1)',
                'rgba(168, 255, 0, 1)',
                'rgba(236, 0, 255, 1)'
            ],
            borderWidth: 1
        }]
    };

    // Create the chart
    var ctx = document.getElementById('myChartTopFive').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
<script>
var data = {
    labels: @json($labelChart),
  datasets: [{
    label: 'No. of Student in College Borrowed',
    data: @json($countCollege),
    backgroundColor: [
      'rgba(0, 255, 0, 0.2)',
      'rgba(255, 0, 0, 0.2)',
      'rgba(0, 29, 242, 0.2)',
      'rgba(252, 6, 240, 0.2)',
      'rgba(254, 255, 101, 0.2)',
      'rgb(220,20,60, 0.2)',
      'rgba(255, 88, 1, 0.2)',
      'rgba(255, 180, 52, 0.2)',
      'rgba(0, 255, 225, 0.2)'
      
    ],
    borderColor: [
      'rgba(0, 255, 0, 1)',
      'rgba(255, 0, 0, 1)',
      'rgba(0, 29, 242, 1)',
      'rgba(252, 6, 240, 1)',
      'rgba(254, 255, 101, 1)',
      'rgb(220,20,60, 1)',
      'rgba(255, 88, 1, 1)',
      'rgba(255, 180, 52, 1)',
      'rgba(0, 255, 225, 1)'
    ],
    borderWidth: 1
  }]
};
var ctx = document.getElementById('collegeChartTopFive').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: data,
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
<script>
var data = {
  labels: @json($lab_mychart),
  datasets: [{
    label: 'No. of Student in College Borrowed',
    data: @json($count_mycollege),
    backgroundColor: [
      'rgba(0, 255, 0, 0.2)',
      'rgba(255, 0, 0, 0.2)',
      'rgba(0, 29, 242, 0.2)',
      'rgba(252, 6, 240, 0.2)',
      'rgba(254, 255, 101, 0.2)',
      'rgb(220,20,60, 0.2)',
      'rgba(255, 88, 1, 0.2)',
      'rgba(255, 180, 52, 0.2)',
      'rgba(0, 255, 225, 0.2)'
      
    ],
    borderColor: [
      'rgba(0, 255, 0, 1)',
      'rgba(255, 0, 0, 1)',
      'rgba(0, 29, 242, 1)',
      'rgba(252, 6, 240, 1)',
      'rgba(254, 255, 101, 1)',
      'rgb(220,20,60, 1)',
      'rgba(255, 88, 1, 1)',
      'rgba(255, 180, 52, 1)',
      'rgba(0, 255, 225, 1)'
    ],
    borderWidth: 1
  }]
};

// Create the chart
var ctx = document.getElementById('mycollegeChartTopFive').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: data,
    options: {
        responsive: false,
    maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
<script>
var data = {
  labels: @json($fines_chart),
  datasets: [{
    label: 'Top 10 highest fines ',
    data: @json($count_fines),
    backgroundColor: [
      'rgba(0, 255, 0, 0.2)',
      'rgba(255, 0, 0, 0.2)',
      'rgba(0, 29, 242, 0.2)',
      'rgba(252, 6, 240, 0.2)',
      'rgba(254, 255, 101, 0.2)',
      'rgb(220,20,60, 0.2)',
      'rgba(255, 88, 1, 0.2)',
      'rgba(42, 202, 255, 0.2)',
      'rgba(255, 180, 52, 0.2)'
    ],
    borderColor: [
      'rgba(0, 255, 0, 1)',
      'rgba(255, 0, 0, 1)',
      'rgba(0, 29, 242, 1)',
      'rgba(252, 6, 240, 1)',
      'rgba(254, 255, 101, 1)',
      'rgb(220,20,60, 1)',
      'rgba(255, 88, 1, 1)',
      'rgba(42, 202, 255, 1)',
      'rgba(255, 180, 52, 1)'
    ],
    borderWidth: 1
  }]
};

// Create the chart
var ctx = document.getElementById('studentChartTopfines').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: data,
    options: {

        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('studentChartTopmonths').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [@foreach ($student_chart as $label) "{{ $label }}", @endforeach],
                datasets: [{
                    label: 'Number of Students',
                    data: [@foreach ($count_students as $count) {{ $count }}, @endforeach],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    });
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

</html>
