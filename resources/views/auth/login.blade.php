<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>TransRoom | Log in</title>

      
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1.0/dist/css/adminlte.min.css">
  </head>
  <body class="hold-transition login-page">

      <div class="login-box">
          <div class="login-logo">
              <a href="#"><b>Trans</b>Room</a>
          </div>

          @if(session('error'))
          <div class="alert alert-danger">
              {{ session('error') }}
          </div>
          @endif

          <!-- Login form -->
          <div class="card">
              <div class="card-body login-card-body">
                  <p class="login-box-msg">Sign in to start your session</p>

                  <form action="{{ route('login.post') }}" method="post">
                      @csrf

                      <div class="input-group mb-3">
                          <input type="text" name="username" class="form-control" placeholder="Username" required>
                          <div class="input-group-append">
                              <div class="input-group-text">
                                  <span class="fas fa-envelope"></span>
                              </div>
                          </div>
                      </div>

                      <div class="input-group mb-3">
                          <input type="password" name="password" class="form-control" placeholder="Password" required>
                          <div class="input-group-append">
                              <div class="input-group-text">
                                  <span class="fas fa-lock"></span>
                              </div>
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-12">
                              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
          <!-- /.login form -->
      </div>

      <!-- AdminLTE JS -->
      <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1.0/dist/js/adminlte.min.js"></script>
  </body>
</html>