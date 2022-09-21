<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-4.0.0/css/bootstrap.min.css') }}">
</head>
<body>

<div class="container">
   <div class="row justify-content-center" style="margin-top:45px">
      <div class="col-md-4 col-md-offset-4">
           <h4>Login | Test Task (BitsClan)</h4><hr>
           <form action="{{ route('auth.check') }}" method="post">
            @if(Session::get('fail'))
               <div class="alert alert-danger">
                  {{ Session::get('fail') }}
               </div>
            @endif
  
           @csrf
              <div class="form-group">
                 <label>Email</label>
                 <input type="text" class="form-control" name="email" placeholder="Enter email address" value="{{ old('email') }}">
                 <span class="text-danger">@error('email'){{ $message }} @enderror</span>
              </div>
              <div class="form-group">
                 <label>Password</label>
                 <input type="password" class="form-control" name="password" placeholder="Enter password">
                 <span class="text-danger">@error('password'){{ $message }} @enderror</span>
              </div>
              <button type="submit" class="btn btn-block btn-primary">Login</button>
              <hr>
                                <h5 class="heading-h5 mb-3">Demo account login credentials</h5>
                                <table id="example" class="table">
        <tbody>
        <tr>
                                        <td class="text-left">Admin</td>
                                        <td class="text-break px-0  text-left">mudassir@email.com</td>
                                        <td class="text-right">12345678</td>
                                        <td class="text-right copy-login cursor-pointer"
                                            data-email="admin@example.com"></i>
                                        </td>
                                       </tr>
    </tbody>
</table>
           </form>
      </div>
   </div>
</div>
</body>
</html>