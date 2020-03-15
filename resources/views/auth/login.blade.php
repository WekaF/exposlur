<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive admin dashboard and web application ui kit. ">
    <meta name="keywords" content="login, signin">

    <title>Expo Login&mdash; PERPUSOY</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,300i" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('assets/css/core.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/app.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.min.css')}}" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="../assets/img/apple-touch-icon.png">
    <link rel="icon" href="../assets/img/favicon.png">
  </head>

  <body>



    <div class="row min-h-fullscreen center-vh p-20 m-0">
      <div class="col-12">
        <div class="card card-shadowed px-50 py-30 w-400px mx-auto" style="max-width: 100%">
          <h5 class="text-uppercase">Sign in</h5>
          <br>

      
          <form class="form-type-material" method="POST" action="{{ route('login') }}">                        
          @csrf
            <div class="form-group">
              <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required autocomplete="email" autofocus>
              @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
              <label for="email">Email</label>
            </div>

            <div class="form-group">
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
              @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
              <label for="password">Password</label>
            </div>

            <div class="form-group flexbox flex-column flex-md-row">
              <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" checked {{ old('remember') ? 'checked' : '' }}>
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Remember me</span>
              </label>

              <a class="text-muted hover-primary fs-13 mt-2 mt-md-0" href="#">Forgot password?</a>
            </div>

            <div class="form-group">
              <button class="btn btn-bold btn-block btn-primary" type="submit">Login</button>
            </div>
          </form>

         
        </div>
        <p class="text-center text-muted fs-13 mt-20">Don't have an account? <a class="text-primary fw-500" href="{{route('register')}}">Sign up</a></p>
      </div>


      <footer class="col-12 align-self-end text-center fs-13">
        <p class="mb-0"><small>Copyright © 2017 <a href="http://thetheme.io/theadmin">TheAdmin</a>. All rights reserved.</small></p>
      </footer>
    </div>




    <!-- Scripts -->
    <script src="{{ asset('assets/js/core.min.js')}}"></script>
    <script src="{{ asset('assets/js/app.min.js')}}"></script>
    <script src="{{ asset('assets/js/script.min.js')}}"></script>

  </body>
</html>
