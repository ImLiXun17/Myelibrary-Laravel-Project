<div class="logo">
                    <a href="student.php" class="simple-text">
                      <img src="{{ asset('img/my-logo2.png') }}" alt="logo" width="90" height="80" style="margin-left: -50px;">
                      E-Library
                    </a>
                </div>
                <ul class="nav">
                <li class="nav-item active">
                        <a class="nav-link" href="{{route('home')}}">
                            <i class="nc-icon nc-icon nc-bank"></i>
                            <p>Home</p>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('borrow')}}">
                            <i class="nc-icon nc-icon nc-paper-2"></i>
                            <p>Borrow</p>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('book') }}">
                            <i class="nc-icon nc-single-copy-04"></i>
                            <p>Book</p>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('student') }}">
                            <i class="nc-icon nc-single-02"></i>
                            <p>Student</p>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('report') }}">
                            <i class="nc-icon nc-chart-pie-36"></i>
                            <p>Report</p>
                        </a>
                    </li>
                    <li class="nav-item active active-pro">
                        <a class="nav-link active" href="javascript:;">
                            <i class="nc-icon nc-spaceship"></i>
                            <p>Upgrade plan</p>
                        </a>
                    </li>
                </ul>