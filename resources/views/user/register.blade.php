<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>User Login</title>
</head>
<body>
    <div class="container" style="margin-top:50px;">
        <div class="row">
            <div class="col">
                <h4>User Register</h4>
                <form action="{{ route('create')}}" method="get">
                    @if(Session::get('fail'))
                        <div class="alert alert-danger">
                            {{Session::get('fail')}}
                        </div>
                    @elseif(Session::get('success'))
                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                    @endif
                    @csrf
                     <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Your Name">
                        <span class="text-danger">@error('name') {{$message}} @enderror</span>
                     </div>
                     <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter Your Email">
                        <span class="text-danger">@error('email') {{$message}} @enderror</span>
                     </div>
                     <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter Your Password">
                        <span class="text-danger">@error('password') {{$message}} @enderror</span>
                     </div>
                     <br>
                     <button type="submit" class="btn btn-primary">Login</button>
                </form>
                <hr>
                I have an account, <a href="{{route('login')}}">Sign in</a>
            </div>
        </div>
    </div>
</body>
</html>