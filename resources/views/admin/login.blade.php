<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Admin Login</title>
</head>
<body>
    <div class="container">
        <div class="row" style="margin-top:45px;">
            <div class="col-md-4 col-md-offset-4">
                <h4>Admin Login</h4>
                <form action="{{route('check')}}" method="post">
                    @if(Session::get('fail'))
                    <div class="alert alert-danger">
                        {{Session::get('fail')}}
                    </div>
                    @endif
                    @csrf
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter Email Address">
                        <span class="text-danger">@error('email') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter Password" >
                        <span class="text-danger">@error('password') {{$message}} @enderror</span>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-block btn-primary">Log IN</button>
                    <hr>
                    I don't have an account, <a href="{{ route('admin.register') }}">create now</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>