<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login </title>
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
                <h2 class="login-signup-heading">LOGIN</h2> 
   
                <form action="{{route('loginMatch')}}" method="POST">
                    @csrf
                    <div class="input-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="input-group">
                        <label for="password">password</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div class="checkbox-lost-password">
                        <label for="option1">
                            <input type="checkbox" id="option1" name="options" value="option1">
                            remember me
                          </label>
                          <a href="{{route('register')}}">password lost?</a>

                    </div>
                   
                    <button class="btn btn-primary blue-button " type="submit">login</button>
                </form>

                <div>don't have an account? <a href="{{route('register')}}">Register</a></div>

            </div>

        
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