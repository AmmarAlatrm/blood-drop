<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link rel="stylesheet" href={{ asset('css/Contact_US.css') }}>
  <script src={{ asset('js/Contact_US.js') }}></script>

  <link href=" {{ asset('https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href={{ asset('css/bootstrap.min.css') }}>
  <script src={{ asset('js/bootstrap.bundle.min.js') }}></script>
</head>

<body>
<!-- star-navbar -->
<nav class="navbar navbar-expand-md navbar-dark  p-4 " aria-label="Fourth navbar example">
  <div class="container-fluid">
    <a class="navbar-brand " href="{{ url('index') }}">
      <img src="{{ URL::asset('/assets/icons8-blood-96.png') }}" alt="Logo" class="img" width="35" height="35">
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




  <div class="containert mt-5 " >
     <div class="row ">
      <div class="col-lg-6">
        <h2 class="contact-title">Contact Us</h2>
        <p class="lead  ">We are glad to collaborate with hospitals to reach available and inform society about blood needs. On the other hand, blood bank will be able to manage blood storage to be accessed by other users, who are in need for blood, or willing to donate with their blood.</p>
          <p class="lead " >The information that you enter in the form will be reviewed and confirmed. So please make sure you fill the form correctly. After the data are confirmed by the admin, you will be able to access the website by your account.</p>
      </div>
      <div class="col-lg-6 bg-danger loginBox">
        <div class="bg-light  p-5 rounded shadow-sm form-container " >
          <form method="POST" action={{ route('register.actionhos') }} >
            @csrf
            <div class="form-row mb-3 ">
              <div class="form-group col-md-6 ">
                <select  name="select" class="text-dark" name="usertype"   required onchange="hideSelectedOption()">
                  <option value="" >User Type</option>
                  <option value="">Hospital</option>
                </select>

              </div>


              <div class="form-group col-md-6">
                <select  name="city" value="{{ old('city') }}" class="form-control text-dark @error('city') is-invalid @enderror"   required onchange="hideSelectedOption()">
                    <option value="">City</option>
                  <option value="Damascus">Damascus</option>
                  <option value="Aleppo">Aleppo</option>
                  <option value="Homs">Homs</option>
                  <option value="Hama">Hama</option>
                  <option value="Latakia">Latakia</option>
                  <option value="Tartus">Tartus</option>
                  <option value="Al-Hasakah">Al-Hasakah</option>
                  <option value="Daraa">Daraa</option>
                  <option value="Deir-Al-Zor">Deir-ez-Zor</option>
                  <option value="Quneitra">Quneitra </option>
                  <option value="Idlib">Idlib </option>
                </select>
                @error('city')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
              </div>
            </div>
            <div class="form-row mb-3 ">
              <div class="form-group col-md-6">
                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name') }}" placeholder="Name" name="name" required oninput="validateInput(this)">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
              <div class="form-group col-md-6">
                <input type="text" id="username" class="form-control @error('username') is-invalid @enderror"  value="{{ old('username') }}" placeholder="username" name="username" required oninput="validateInput(this)">
                @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            </div>


            <div class="form-row mb-3">
              <div class="form-group col-md-6">
                <input type="text" id="name" class="form-control @error('address') is-invalid @enderror"  value="{{ old('address') }}" placeholder="Address" name="address" required oninput="validateInput(this)">
                @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
              <div class="form-group col-md-6">
                <input type="text" id="phone" class="form-control @error('mobile') is-invalid @enderror"  value="{{ old('mobile') }}" placeholder="Mobile Phone Number" name="mobile" required maxlength="10" pattern="09\d{8}" title="رقم الهاتف يجب أن يبدأ بـ 09 ويتكون من 10 أرقام." oninput="validatePhoneNumber()">
                @error('mobile')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            </div>
            <div class="form-row mb-3">
              <div class="form-group col-md-6">
             <input type="password" id="password" class="form-control @error('password') is-invalid @enderror"  value="{{ old('password') }}" name="password" placeholder="Password" required>
             @error('password')
             <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
             </span>
         @enderror
            </div>
              <div class="form-group col-md-6">
              <input type="password" id="confirm-password"  name="confirm-password"  class="form-control" placeholder="Confirm Password" required>              </div>
            </div>
            <button type="submit" class="btn btn-danger btn-block" onclick="validateInputs()">{{ __('signup') }} </button>
          </form>
          <p class="text-center mt-3 "> <a href="{{ url('login') }}" showLogin=true class="login">login <br> </a></p>
          <!-- <a href="#" class="login">login <br> </a> -->

        </div>
      </div>
    </div>
  </div>
  <!-- <a href="#" class="forget">Forget Password<br> </a> -->
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

</script>
<script src={{ asset('js/script.js') }}></script>

</body>

</html>

