<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href={{ asset('css/About_US.css') }}>
  <link rel="stylesheet" href={{ asset('bootstrap.min.css') }}>

  <script src={{ asset('js/bootstrap.bundle.min.js') }}></script>
  <title>Document</title>
</head>

<body>


   <!-- star-navbar -->
   <nav class="navbar navbar-expand-md navbar-dark  p-4 " aria-label="Fourth navbar example">
    <div class="container-fluid">
      <a class="navbar-brand " href="{{ url('aboutus') }}">
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
            <a class="nav-link text-dark" href="{{ url('contactus') }}">Contact US</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="{{ url('aboutus') }}">About US</a>
          </li>
        </ul>

      </div>
    </div>
  </nav>
  <!-- end navbar -->




  <section class="main p-3">
    <div class="container">
      <div class="cont-up p-3 div">

        <div class="signin ">

          <h2 class="text-danger">ABOUT US</h2>

  <div class="row featurette">
    <div class="col-md-7">
      <p></p>

     <p class="lead"> we are Informatics students in Albaath University.We are trying to help the
       the society in Homs city, including patients, hospitals and donors,
      in blood transformation process.</p>
      <br>

<p class="lead"> Using our Knowledge in web application developments, we learnt and developed
     this website to help users to easily involve in blood donation and access
      hospitals' and blood centers' information.</p>
    <p></p>
    </div>
    <div class="col-md-5 text-center">
      <img src="{{ URL::asset('assets/Photo/a.png') }}" class=" img-fluid" width="400" height="400"  >

    </div>
  </div>

</div>
</div>
    </div>

</section>



<footer class="text-center ">
  <!-- Grid container -->
  <div class="container p-4">
    <!-- Section: Social media -->
    <section class="mb-4">
      <a class="btn btn-outline-light btn-floating m-1 text-primary" href="{{ asset('http://www.Facebook.com') }}"  target="_blank" role="button"><i class="fab bi-facebook"></i></a>

        <!-- Twitter -->
        <a class="btn btn-outline-light btn-floating m-1 text-primary " href="{{ asset('https://Twitter.com') }}"target="_blank" role="button"><i class="fab bi-twitter"></i></a>

        <!-- Google -->
        <a class="btn btn-outline-light btn-floating m-1 text-danger" href="{{ asset('https://googlecom') }}" target="_blank" role="button"><i class="fab bi-google"></i></a>


        <!-- Github -->
        <a class="btn btn-outline-light btn-floating m-1 text-dark" href="{{ asset('https://Github.com') }}" target="_blank" role="button"><i class="fab bi-github"></i></a>
      </section>
    <!-- Section: Social media -->

    <!-- Section: Links -->
    <section class="">
      <!--Grid row-->
      <div class="row">
        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <a class="nav-link" href="index.html">
            <h5 class="text-uppercase">HOME PAGE</h5>
          </a>

          <ul class="list-unstyled mb-0">
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <a class="nav-link" href="{{ url('contactuS') }}">
            <h5 class="text-uppercase">Contact US</h5>
          </a>
          <ul class="list-unstyled mb-0">
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <a class="nav-link" href="{{ url('aboutus') }}">
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
    <a class="text-white" href="{{url('index')}}">B-DROP </a>
  </div>
  <!-- Copyright -->
</footer>

<script src={{ asset('js/script.js') }}></script>
  <script src={{ asset('js/movLog.js') }}></script>




</html>
