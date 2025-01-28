
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans+SC:ital,wght@0,100;0,300;0,400;0,500;0,700;0,800;0,900;1,100;1,300;1,400;1,500;1,700;1,800;1,900&family=Great+Vibes&family=Sofadi+One&display=swap" rel="stylesheet">
    <!-- boostrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/home.css')}}">

</head>

<body>
    <div class="login">
        <div class="row">

          
           
            <div class="login-container col-md-4 col-sm-12">
                <h2 class="login-signup-heading">Register</h2>
                <form action="{{route('registerSave')}}" method="POST">
                    @csrf
                    <div class="input-group">
                        <label for="username">username</label>
                        <input type="text" id="username" name="username" required>
                    </div>
                    <div class="input-group">
                        <label for="email">email</label>
                        <input type="text" id="email" name="email" required>
                    </div>
                  
                    <div class="input-group">
                        <label for="password">password</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div class="input-group">
                        <label for="password"> confirm password</label>
                        <input type="password" id="password" name="password_confirmation" required>
                    </div>
                    
                   
                   
                    <button class="btn btn-primary blue-button " type="submit">Register</button>
                </form>

                <div>already have an account? <a href="{{ route('login') }}">login</a></div>

            </div>

            @if ($errors->any())
            <div class="card-footer text-body-secondary">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        
                    
                


        
  <div class="login-image col-md-7 col-sm-12">
                <img src="{{asset('images/Login-bro.svg')}}" alt="">
 
             </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>