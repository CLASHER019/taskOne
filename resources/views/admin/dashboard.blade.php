<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Dashboard</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h4>Admin Dashboard | <a href="{{route('settings')}}">Settings</a> | <a href="{{route('profile')}}">Profile</a> | <a href="{{route('staff')}}">Staff</a> | <a href="{{route('logout')}}">Logout</a></h4>
                <table class="table table-hover">
                    <thead>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <td>{{$LoggedAdminInfo['name']}}</td>
                        <td>{{$LoggedAdminInfo['email']}}</td>
                        <td>Action</td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>