<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" sizes="any" href="{{ asset('img/icon4.png') }}" type="image/x-icon">
    <title>Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  </head>
   
  <body>
    <div class="container">
      <div class="con-head">
        <div class="header"><span>Admin</span></div>
        <form method="POST" action="{{ route('login') }}">
        @csrf
          <div class="logo">
           <img src="{{ asset('img/avat.png') }}" alt="logo" width="70" height="70">
          </div>
          @if($errors->any())
               <div class="error-mess">{{ $errors->first('message') }}</div>
              @endif
          <div class="box">
            <i class="fas fa-user"></i>
            <input type="text" name="email" placeholder="Email or Username" required>
          </div>
          <div class="box">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" placeholder="Password"  required>
          </div>
          <div class="box button">
            <input type="submit" name="loggedin" value="Login">
          </div>
        </form>
      </div>
    </div>

  </body>
</html>