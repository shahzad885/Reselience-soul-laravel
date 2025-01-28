<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('css/home.css')}}" rel="stylesheet">
    <!--google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Alegreya+Sans+SC:ital,wght@0,100;0,300;0,400;0,500;0,700;0,800;0,900;1,100;1,300;1,400;1,500;1,700;1,800;1,900&family=Great+Vibes&family=Sofadi+One&display=swap"
        rel="stylesheet">

    <!-- font osm  icon-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />




</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top navbar-custom">
        <a class="navbar-brand" href="#">Resilient Souls</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#about">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('articles.userIndex') }}">Articles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('diary') }}">Personal Dairy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('mood') }}">Mood Today?</a>
                </li>

                <!-- Profile Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Profile
                    </a>
                    <div style="background-color: rgba(255, 255, 255, 0.5);" class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <span class="dropdown-item"> {{ Auth::user()->username }}</span>
                        <span class="dropdown-item">{{ Auth::user()->email }}</span>
                        <div  class="dropdown-divider"><p></p></div>
                        <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>


    </nav>

    <div style="padding: 10px; background-color: #D0D1D3;; height: 50px; width:100%;">

    </div>




    <!-- hero section -->
    <div class="hero-section text-center ">
        <!---<marquee behavior="scroll" direction="left">New update coming soon !! New update coming soon !! </marquee> -->
        <div class="row hero-section-content ">
            <div class="col-lg-6 col-md-6 col-sm-10 hero-section-title  ">
                <h1>Welcome , {{Auth::user()->username}} <br> to Mental Health Hub</h1>
                <p>Your well-being is our priority.</p>
                <a href="#blog" class="btn btn-primary blue-button ">Read Our Blog</a>
                <a href="#contact" class="btn btn-outline-dark black-button">Contact Us</a>
            </div>

            <div class="col-lg-6 col-md-6  col-sm-12 hero-section-image">
                <img style="

                width: 100%;
            " src="{{ asset('images/bg_1.png')}}" alt="">
            </div>
        </div>

    </div>
    <!--                                                       about                            -->


    <div id="about" class="section">
        <div class="container">
            <div class="row">
                <div class=" about-image col-lg-5 col-md-6 col-sm-12 ">

                    <img class="about-image" src="{{ asset('images/about.jpg')}}" alt="">

                </div>
                <div class="about-content col-lg-6 col-md-5 col-sm-12  ">
                    <h1>
                        Empower you to overcome <span style="  font-family: cursive; color: #183692;">stress</span> and
                        <span style="  font-family: cursive; color: #183692;">depression !</span>
                    </h1>
                    <p>
                        Our website offers a comprehensive range of resources, including practical tips, expert advice,
                        and supportive communities. Through evidence-based strategies, guided meditations, and
                        personalized tools, we'll help you develop healthy coping mechanisms, challenge negative thought
                        patterns, and build resilience. Together, we'll create a personalized plan to support your
                        mental well-being and journey toward a more fulfilling life
                    </p>

                    <div>
                        <a href="appointment.html" class="btn btn-primary about-blue-button ">Appointment</a>
                        <a href="#contact" class="btn btn-outline-dark about-black-button">Contact Us</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!--                                  Our services -->

    <div id="services" class="section">
        <div class="container">
            <h1 class="servicesh1">Our Services</h1>
            <div class="row">
                <div class="services-content col-lg-8  col-sm-12">


                    <div class="row">
                        <div class="emergency col-lg-6 inner-content ">
                            <div>
                                <i class="fa-solid fa-stethoscope icons"></i>
                                <!-- <img class="services-image" src="png/003-examination.png" alt=""> -->
                            </div>
                            <div>
                                <h5>
                                    Outdoor checkup

                                </h5>
                                <p>A small river named Duden flows by their place and supplies it with the necessary
                                    regelialia.</p>
                            </div>

                        </div>
                        <div class="Qualified-doctors   col-lg-6   col-sm-12 inner-content">
                            <div>
                                <i class="fa-solid fa-user-doctor icons"></i>
                            </div>
                            <div>
                                <h5>
                                    Qualified doctors

                                </h5>
                                <p>A small river named Duden flows by their place and supplies it with the necessary
                                    regelialia.</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="emergency col-lg-6 inner-content ">
                            <div>
                                <i class="fa-solid fa-hand-holding-medical icons"></i>
                            </div>
                            <div>
                                <h5>
                                    24/7 service

                                </h5>
                                <p>A small river named Duden flows by their place and supplies it with the necessary
                                    regelialia.</p>
                            </div>

                        </div>
                        <div class="Qualified-doctors  col-lg-6 inner-content">
                            <div>
                                <i class="fa-solid fa-laptop-medical icons"></i>
                            </div>
                            <div>
                                <h5>
                                    Emergency Services

                                </h5>
                                <p>A small river named Duden flows by their place and supplies it with the necessary
                                    regelialia.</p>
                            </div>
                        </div>
                    </div>





                </div>


                <div class=" col-lg-4 col-sm-12">
                    <img class="services-image-main" src="{{ asset('images/image_6.jpg')}}" alt="">
                </div>


            </div>

        </div>
    </div>



    </div>


    <!--                                       blog -->

    <div id="blog" class="section">
        <div class="container">

            <h2 class="blog-title">Gets Every Single Updates Here</h2>
            <p style="color:#D0D1D3 ;" class="blog-title">Far far away, behind the word mountains, far from the
                countries Vokalia and Consonantia</p>

            <div class="row">
                <div class="col-md-4 blog-post">
                    <img class="blog-image" style="max-width: 100%;" src="{{asset('images/image_1.jpg')}}" alt="">

                    <h4 class="blog-heading">Scary Thing That You Don’t Get Enough Sleep</h4>
                    <p class="blog-para">Far far away, behind the word mountains, far from the countries Vokalia and
                        Consonantia, there live the blind texts....</p>
                    <a href="article.html" class="btn btn-primary about-blue-button">Read More</a>
                </div>
                <div class="col-md-4 blog-post">
                    <img class="blog-image" style="max-width: 100%;" src="{{asset('images/image_3.jpg')}}" alt="">
                    <h4 class="blog-heading">Scary Thing That You Don’t Get Enough Sleep</h4>
                    <p class="blog-para">Far far away, behind the word mountains, far from the countries Vokalia and
                        Consonantia, there live the blind texts....</p>
                    <a href="article.html" class="btn btn-primary about-blue-button">Read More</a>
                </div>
                <div class="col-md-4 blog-post">
                    <img class="blog-image" style="max-width: 100%;" src="{{asset('images/image_2.jpg')}}" alt="">
                    <h4 class="blog-heading">Scary Thing That You Don’t Get Enough Sleep</h4>
                    <p class="blog-para">Far far away, behind the word mountains, far from the countries Vokalia and
                        Consonantia, there live the blind texts....</p>
                    <a href="article.html" class="btn btn-primary about-blue-button">Read More</a>
                </div>
                <!-- Repeat for more blog posts -->
            </div>
        </div>
    </div>

    <!--                                      testimonials -->

    <div id="testimonials" class="section">
        <div class="row">
            <div class=" col-md-3 col-sm-12 card" style=" background-color:#e4e7ec2b; ">
                <img class="card-img-top" src="{{asset('images/person_1.jpg')}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">jeff freshman</h5>
                    <p class="card-text">Far far away, behind the word mountains, far from the countries Vokalia and
                        Consonantia, there live the blind texts..</p>

                </div>
            </div>

            <div class=" col-md-3 card col-sm-12" style=" background-color:#e4e7ec2b;; ">
                <img class="card-img-top" src="{{asset('images/person_3.jpg')}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">jeff freshman</h5>
                    <p class="card-text">Far far away, behind the word mountains, far from the countries Vokalia and
                        Consonantia, there live the blind texts..</p>

                </div>
            </div>

            <div class=" col-md-3 col-sm-12 card" style=" background-color:#e4e7ec2b; ">
                <img class="card-img-top" src="{{asset('images/person_2.jpg')}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">jeff freshman</h5>
                    <p class="card-text">Far far away, behind the word mountains, far from the countries Vokalia and
                        Consonantia, there live the blind texts..</p>

                </div>
            </div>
            <!-- <div class="row">
            <div class="col-md-4 testimonials-post">

        <div class="testimonials-image">
            <img class="testimonials-image" src="css/images/person_1.jpg" alt="">
        </div>
        <div class="testimonials-desc">
            <p>Far far away, behind the word mountains, <br> far from the countries Vokalia and Consonantia, there live the blind texts.</p>
        </div>
        <div class="testimonials-name"> <h3>mr john</h3></div>
        <div class="testimonials-type"><p>mr john</p></div>


</div>

       </div> -->
        </div>

    </div>


    <!--                                  newsletter -->


    <div style="background-image: url('{{asset('images/footer-bg.jpg')}}'); background-position: center;" id="newsletter"
        class="section">
        <div class="container text-center">
            <h2>Stay Updated</h2>
            <p>Subscribe to our newsletter for the latest updates and tips.</p>
            <form>
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Enter your email">
                </div>
                <button type="submit" class="btn btn-primary about-blue-button">Subscribe</button>
            </form>

            <!-- contact -->
            <div id="contact" class="section">
                <div class="container">
                    <h2>Contact Us</h2>
                    <p>Email: support@mentalhealthhub.com</p>
                    <p>Phone: (123) 456-7890</p>
                </div>
            </div>
            <!-- footer -->
            <footer class="footer text-center">
                <div class="container">
                    <p>&copy; 2024 Mental Health Hub. All rights reserved.</p>
                    <div class="social-media">
                        <a href="#">Facebook</a> | <a href="#">Twitter</a> | <a href="#">Instagram</a>
                    </div>
                </div>
            </footer>

        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
