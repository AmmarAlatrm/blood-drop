<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href={{ asset('css/index.css') }}>

  <link rel="stylesheet" href={{ asset('css/bootstrap.min.css') }}>

  <script src={{ asset('css/bootstrap.min.css') }}></script>

</head>

<body>

  <!-- star-navbar -->
  <nav class="navbar navbar-expand-md navbar-dark  p-4 " aria-label="Fourth navbar example">
    <div class="container-fluid">
      <a class="navbar-brand " href="#">
        <img src="{{ URL::asset('assets/icons8-blood-96.png') }}" alt="Logo" class="img" width="35" height="35">
        <span class="m-t-3">B-DROP</span>

        <!-- <SPAN class="Blazing dark fire mt-3">B-DROP</SPAN> -->


      </a> <button class="navbar-toggler bg-danger" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse text-center " id="navbarsExample04" style="font-size: 25px;">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link  text-dark " aria-current="page" href="{{ url('index') }}" >Home Page</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="Contact_US.html">Contact US</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="About_US.html">About US</a>
          </li>
        </ul>

      </div>
    </div>
  </nav>
  <!-- end navbar -->


  <div class="">
    <div class="container b-r-10 ">
      <div class="row ">
        <div class="col-md-7  text-center text-logo ">
          <br><br><br><br><br>
          <h2 class="featurette-heading text-dark "><span class="text-danger bloodw" > Blood</span>
            Storage in Homs City</h2>
          <br>
          <p class="lead">Some great placeholder content for the first featurette here. Imagine some exciting
            prose here.</p>

          <!-- Modal -->
          <form role="search" >

            <div class="modal fade " id="exampleModalToggle" aria-hidden="true"
              aria-labelledby="exampleModalToggleLabel" tabindex="-1">
              <div class="modal-dialog modal-dialog-centered w-100 ">
                <div class="modal-content ">

                  <div class="loginBox br-gray"  >
                    <img class="user" src="{{ URL::asset('assets/Photo/logoB.png') }}" width="150px" height="150px" fill="#eee" />
                    <h3 class="signin">login here</h3>
                    <form  method="POST" action={{ route('login.action') }}>
                      <div class="inputBox" required>
                        <select  name="select" class="text-dark"   required onchange="hideSelectedOption()">
                  <option value=""  >User Type</option>
                  <option value="">Normal</option>
                  <option value="">Hospital</option>
                </select>
                        <div class="form-group col-md-15">
                          <input type="text" placeholder="UserName" name="username" required oninput="validateInput(this)">

                        </div>
                        <div class="form-group col-md-15">
                          <input type="text" placeholder="Password" name="passwordu" required>
                        </div>
                      </div>
                      <button type="submit" name="" value="Login" id="openModalBtn">{{ __('login') }}</button>
                    </form>
                    <div class="text-center">
                      <a href="{{ url('signup') }}">
                        <p class="sign p-2" >Sign-Up</p>
                      </a>
                    </div>

                  </div>


                </div>
              </div>
            </div>
          </form>

          <!-- Button trigger modal -->
          <a class="btn btn-outline-danger original-login" data-bs-toggle="modal" href="#exampleModalToggle"
            role="button">Login</a>

          <a class="btn  btn-danger original-sign mx-5" href="signup.html">Signup</a>
<P></P>
        </div>
        <div class="col-md-5">
          <div class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto " width="500"
            height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500"
            preserveAspectRatio="xMidYMid slice" focusable="false">
            <br>
            <!-- <img src="Photo/logoB.png" width="90%" height="100%" fill="#eee" /> -->

            <div id="carouselExampleSlidesOnly " class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner img-flu ">
                <div class="carousel-item active">
            <img src="{{ URL::asset('assets/Photo/1.png') }}" class="img-ind"  fill="#eee" />
          </div>
                <div class="carousel-item">
            <img src="{{ URL::asset('assets/Photo/2.png') }}" class="img-ind" fill="#eee" />
          </div>
                <div class="carousel-item">
            <img src="{{ URL::asset('assets/Photo/3.png') }}" class="img-ind" fill="#eee" />
          </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>


  </div>
  </div>

<footer class="text-center ">
  <!-- Grid container -->
  <div class="containerr p-4 ">
    <!-- Section: Social media -->
    <section class="mb-4">
           <!-- Facebook -->
           <a class="btn btn-outline-light btn-floating m-1 text-primary " href="http://www.Facebook.com"  target="_blank" role="button"><i class="fab bi-facebook"></i></a>

           <!-- Twitter -->
           <a class="btn btn-outline-light btn-floating m-1 text-primary " href="https://Twitter.com"target="_blank" role="button"><i class="fab bi-twitter"></i></a>

           <!-- Google -->
           <a class="btn btn-outline-light btn-floating m-1 text-danger" href="https://www.Google.com" target="_blank" role="button"><i class="fab bi-google"></i></a>


           <!-- Github -->
           <a class="btn btn-outline-light btn-floating m-1 text-dark" href="https://www.Github.com" target="_blank" role="button"><i class="fab bi-github"></i></a>
         </section>
    <!-- Section: Social media -->

    <!-- Section: Links -->
    <section class="">
      <!--Grid row-->
      <div class="row">
        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <a class="nav-link" href="index.html">
            <h5 class="text-uppercase ">HOME PAGE</h5>
          </a>

          <ul class="list-unstyled mb-0">
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <a class="nav-link" href="Contact_US.html">
            <h5 class="text-uppercase ">Contact US</h5>
          </a>
          <ul class="list-unstyled mb-0">
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <a class="nav-link" href="About_US.html">
            <h5 class="text-uppercase">About US</h5>
          </a>
          </ul>
        </div>
        <!--Grid column-->

      </div>
    </section>
  </div>
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    <img src="{{ URL::asset('assets/icons8-blood-96.png') }}" alt="Logo" class="imge" width="25" height="25">
    B-DROP
    <a class="text-white" href="#">B-DROP </a>
  </div>
  <!-- Copyright -->
</footer>
  </section>
<!--  -->
<script src={{ asset('js/script.js') }}></script>
<Script src={{ asset('js/movLog.js') }}></Script>
</body>

</html>
