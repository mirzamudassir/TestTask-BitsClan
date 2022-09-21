<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Image</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-4.0.0/css/bootstrap.min.css') }}">
    <style>.w-5{display:none}</style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">TestTask</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard <span class="sr-only">(current)</span></a>
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
                   <h4>Edit Image</h4><hr>
                   @if(Session::get('success'))
                   <div class="alert alert-success">
                      {{ Session::get('success') }}
                   </div>
                @endif
                  
                  <form method="POST" action="{{ url('update-image/' . $image->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="image" name="image" accept="image/*">
                      <label class="custom-file-label" for="customFile">Choose Image</label>
                      <span class="text-danger">@error('image'){{ $message }} @enderror</span>
                    </div>
                    <div class="input-group-append">
                      <button class="btn btn-success my-2 my-sm-0" type="submit">Update</button>
                    </div>
                  </div>
                  </form>
                  <div class="mt-5">
                    <span>Current Image:</span>
                    <img src="{{ URL::asset($image->image_path) }}" width="70" height="70" alt="image">
                    <a href="{{ route('admin.dashboard') }}"><button class="btn btn-outline-primary mt-2 my-sm-0 float-right" type="button">Go Back</button></a>
                  </div>
            </div>
         </div>
    </div>
    <script src="{{ asset('bootstrap-4.0.0/js/bootstrap.min.js') }}"></script>
</body>
</html>