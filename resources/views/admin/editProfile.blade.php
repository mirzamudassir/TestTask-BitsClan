<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-4.0.0/css/bootstrap.min.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">TestTask</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Edit Profile <span class="sr-only">(current)</span></a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <a href="{{ route('auth.logout') }}"><button class="btn btn-danger my-2 my-sm-0" type="button">Logout</button></a>
          </form>
        </div>
      </nav>
    
    <div class="container">
         <div class="row justify-content-center">
            <div class="col-md-6 col-md-offset-3">
                   <h4>Edit Profile</h4><hr>
                   @if(Session::get('success'))
                   <div class="alert alert-success">
                      {{ Session::get('success') }}
                   </div>
                @endif
                  
                <form method="POST" action="{{ url('update-profile/' . $admin->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                     <div class="form-group col-md-6">
                        <label for="inputName4">Name</label>
                        <input type="text" class="form-control" id="inputName4" name="name" value="{{ $admin->name }}">
                        <span class="text-danger">@error('name'){{ $message }} @enderror</span>
                      </div>

                      <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" name="email" value="{{ $admin->email }}">
                        <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                      </div>
                      
                      <div class="form-group col-md-6">
                        <label for="inputPassword4">Password</label>
                        <input type="password" class="form-control" id="inputPassword4" name="password" placeholder="New Password">
                        <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                      </div>
                    </div>
                    <div class="mt-5">
                        <button type="submit" class="btn btn-success float-right">Update Profile</button>
                    <a href="{{ route('admin.dashboard') }}"><button class="btn btn-outline-primary mt-2 my-sm-0" type="button">Go Back</button></a>
                    </div>
                  </form>
            </div>
         </div>
    </div>
    <script src="{{ asset('bootstrap-4.0.0/js/bootstrap.min.js') }}"></script>
</body>
</html>