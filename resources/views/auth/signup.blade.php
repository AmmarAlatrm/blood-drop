<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href={{asset('css\signup.css')}}>
<script src={{ asset('js/signup.js') }}></script>
  <link rel="stylesheet" href={{asset('css\bootstrap.min.css')}}>

  <script src={{ asset('js/bootstrap.bundle.min.js') }}></script>
    <link rel="stylesheet" href="{{asset('https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css')}}">



    <!-- star-navbar -->
     <nav class="navbar bg-gray navbar-expand-md navbar-dark  p-4 " aria-label="Fourth navbar example">
        <div class="container-fluid">
          <a class="navbar-brand " href={{asset('#')}}>
            <img src="{{ URL::asset('assets/icons8-blood-96.png') }}" alt="Logo" class="img" width="35" height="35">
            <span class="m-t-3">B-DROP</span>

            <!-- <SPAN class="Blazing dark fire mt-3">B-DROP</SPAN> -->


          </a> <button class="navbar-toggler bg-danger" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse text-center " id="navbarsExample04"  style="font-size: 25px;">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
              <li class="nav-item">
                <a class="nav-link  text-dark " aria-current="page" href="{{ url('index') }}">Home Page</a>
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
</head>





<body>
    <section class="main p-3 bg-gray " >

    <!-- <div class="container  signup-form" style="background-color: aqua;">
        <div class="cont-up p-3" style="background-color:salmon ;">
            <h2>SIGN UP</h2> -->

            <div class="container loginBox Sign-Up" >
                <div class="bg-light p-5 rounded shadow-sm form-container">
                    <form id="myForm" method="POST" action={{ route('register.action') }}>
                        @csrf
                        <div class="form-row mb-3">
                            <div class="form-group col-md-6">
                                <input type="text" id="fullName" class="form-control @error('fullname') is-invalid @enderror" placeholder="Full Name" name="fullname"  value="{{ old('fullname') }}" required oninput="validateInput(this)">

                                @error('fullname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" id="Username" class="form-control  @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}"  placeholder="UserName" required >

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row mb-3">
                            <div class="form-group col-md-6">
                                <input type="text" id="address" class="form-control @error('address') is-invalid @enderror" name="address"  value="{{ old('address') }}" placeholder="Address" required oninput="validateInput(this)">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" id="phone" name="mobile"  value="{{ old('mobile') }}" class="form-control @error('mobile') is-invalid @enderror" placeholder="Mobile Phone Number" required maxlength="10" pattern="09\d{8}" title="رقم الهاتف يجب أن يبدأ بـ 09 ويتكون من 10 أرقام." oninput="validatePhoneNumber()">

                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row mb-3">
                            <div class="form-group col-md-6">
                                <select   value="{{ old('bloodtype') }}" class="form-control text-dark @error('bloodtype') is-invalid @enderror" name="bloodtype" required onchange="hideSelectedOption()">
                                    <option value="">blood type</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="B+">B+</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>

                                @error('bloodtype')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <input type="number" value="{{ old('age') }}" id="age" class="form-control  @error('age') is-invalid @enderror" placeholder="Age" name="age" required oninput="validateAge(this)">

                                @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row mb-3">
                            <div class="form-group col-md-6">
                           <input type="password" id="password" class="form-control  @error('password') is-invalid @enderror" name="password" placeholder="Password" required>

                           @error('password')
                           <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                       @enderror
                        </div>
                            <div class="form-group col-md-6">
                            <input type="password"  id="confirm-password"  name="confirm-password"  class="form-control " placeholder="Confirm Password" required>

                          </div>

                        <button type="submit" class="btn btn-block" onclick="validateInputs()" style="background-color: rgb(241, 31, 31);">{{ __('Register') }} </button>
                    </form>
                    <p class="text-center mt-3">
                      <a href="{{ url('login') }}" class="btn login" id="Already">Already have an account?</a>
                    </p>
                    <p class="text-center mt-3">
                      <a href="{{ url('login')}}" showlogin="true" class="btn login" id="Already">Log in as a hospital? </a>
                    </p>
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
               <a class="btn btn-outline-light btn-floating m-1 text-primary border-danger" href="{{ asset('https://www.Facebook.com') }}"  target="_blank" role="button"><i class="fab bi-facebook"></i></a>

               <!-- Twitter -->
               <a class="btn btn-outline-light btn-floating m-1 text-primary border-danger" href="{{ asset('https://www.twitter.com') }}"target="_blank" role="button"><i class="fab bi-twitter"></i></a>

               <!-- Google -->
               <a class="btn btn-outline-light btn-floating m-1 text-danger border-danger" href="{{ asset('https://www.google.com') }}" target="_blank" role="button"><i class="fab bi-google"></i></a>


               <!-- Github -->
               <a class="btn btn-outline-light btn-floating m-1 text-dark border-danger" href="{{ asset('https://www.Github.com') }}" target="_blank" role="button"><i class="fab bi-github"></i></a>
             </section>
        <!-- Section: Social media -->

        <!-- Section: Links -->
        <section class="">
          <!--Grid row-->
          <div class="row">
            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
              <a class="nav-link" href="i{{ url('index') }}">
                <h5 class="text-uppercase ">HOME PAGE</h5>
              </a>

              <ul class="list-unstyled mb-0">
              </ul>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
              <a class="nav-link" href="{{ url('contactus') }}">
                <h5 class="text-uppercase ">Contact US</h5>
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
        <a class="text-white" href="{{ url('index') }}">B-DROP </a>
      </div>
      <!-- Copyright -->
    </footer>





<!--
    <script>

        function validateInput(element) {
            const value = element.value;
            const regex = /^[A-Za-zأ-ي\s]*$/;
            if (!regex.test(value)) {
                element.setCustomValidity('Please enter only Arabic or English letters.');
            } else {
                element.setCustomValidity('');
            }
            element.reportValidity();
        }

        function validatePhoneNumber() {
            const phoneInput = document.getElementById('phone');
            phoneInput.setCustomValidity(phoneInput.validity.patternMismatch ? 'Phone number must start with 09 and be 10 digits long.' : '');
            phoneInput.reportValidity();
        }

        function validateAge(element) {
            const age = parseInt(element.value, 10);
            if (age < 18 || age > 40) {
                element.setCustomValidity('Age must be between 18 and 40.');
            } else {
                element.setCustomValidity('');
            }
            element.reportValidity();
        }

        function validateInputs() {
            const form = document.getElementById('myForm');
            if (form.checkValidity()) {
                window.location.href = 'Donors.html';
            } else {
                form.reportValidity();
            }
        }

        function hideSelectedOption() {
            // Function to handle the select change event if needed
        }



    </script> -->


 <script>

    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('confirm-password');

    function validatePassword() {
        const password = passwordInput.value;
        const confirmPassword = confirmPasswordInput.value;

        if (password !== confirmPassword) {
            confirmPasswordInput.setCustomValidity('كلمة المرور غير متطابقة.');
        } else {
            confirmPasswordInput.setCustomValidity('');
        }
    }

    // Add event listeners to validate password on input
    passwordInput.addEventListener('input', validatePassword);
    confirmPasswordInput.addEventListener('input', validatePassword);

  </l>
</body>
</html>
