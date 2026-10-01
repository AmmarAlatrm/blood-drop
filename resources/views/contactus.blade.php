<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>B-DROP - Hospital Registration</title>

  <link rel="stylesheet" href="{{ asset('css/Contact_US.css') }}">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('js/Contact_US.js') }}"></script>
</head>

<body>
<!-- navbar -->
<nav class="navbar navbar-expand-md navbar-dark p-4" aria-label="Fourth navbar example">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ url('index') }}">
      <img src="{{ asset('/assets/icons8-blood-96.png') }}" alt="Logo" class="img" width="35" height="35">
      <span class="m-t-3">B-DROP</span>
    </a>
    <button class="navbar-toggler bg-danger" type="button" data-bs-toggle="collapse"
      data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false"
      aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse text-center" id="navbarsExample04" style="font-size: 25px;">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link text-dark" aria-current="page" href="{{ url('index') }}">Home Page</a>
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

<div class="containert mt-5">
  <div class="row">
    <div class="col-lg-6">
      <h2 class="contact-title">Contact Us</h2>
      <p class="lead">We are glad to collaborate with hospitals to reach available donors and inform society about blood needs. On the other hand, blood banks will be able to manage blood storage to be accessed by other users, who are in need of blood, or willing to donate.</p>
      <p class="lead">The information that you enter in the form will be reviewed and confirmed. So please make sure you fill the form correctly. After the data are confirmed by the admin, you will be able to access the website via your account.</p>
    </div>

    <div class="col-lg-6 bg-danger loginBox">
      <div class="bg-light p-5 rounded shadow-sm form-container">
        <form method="POST" action="{{ route('register.actionhos') }}">
          @csrf
          <div class="form-row mb-3">
            <div class="form-group col-md-6">
              <select name="usertype" class="form-control text-dark @error('usertype') is-invalid @enderror" required>
                <option value="">User Type</option>
                <option value="hospital" {{ old('usertype', 'hospital') == 'hospital' ? 'selected' : '' }}>Hospital</option>
              </select>
              @error('usertype')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>

            <div class="form-group col-md-6">
              <select name="city" class="form-control text-dark @error('city') is-invalid @enderror" required>
                <option value="">City</option>
                @php
                  $cities = ['Damascus', 'Aleppo', 'Homs', 'Hama', 'Latakia', 'Tartus', 'Al-Hasakah', 'Daraa', 'Deir-Al-Zor', 'Quneitra', 'Idlib'];
                @endphp
                @foreach($cities as $city)
                  <option value="{{ $city }}" {{ old('city') == $city ? 'selected' : '' }}>{{ $city }}</option>
                @endforeach
              </select>
              @error('city')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>
          </div>

          <div class="form-row mb-3">
            <div class="form-group col-md-6">
              <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Hospital Name" name="name" required>
              @error('name')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>

            <div class="form-group col-md-6">
              <input type="text" id="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" placeholder="Username" name="username" required>
              @error('username')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>
          </div>

          <div class="form-row mb-3">
            <div class="form-group col-md-6">
              <input type="text" id="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" placeholder="Address" name="address" required>
              @error('address')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>

            <div class="form-group col-md-6">
              <input type="text" id="phone" class="form-control @error('mobile') is-invalid @enderror" value="{{ old('mobile') }}" placeholder="Mobile Phone Number" name="mobile" required maxlength="10" pattern="09\d{8}" title="رقم الهاتف يجب أن يبدأ بـ 09 ويتكون من 10 أرقام.">
              @error('mobile')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>
          </div>

          <div class="form-row mb-3">
            <div class="form-group col-md-6">
              <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required>
              @error('password')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>

            <div class="form-group col-md-6">
              <input type="password" id="confirm-password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
            </div>
          </div>

          <button type="submit" class="btn btn-danger btn-block">{{ __('signup') }}</button>
        </form>

        <p class="text-center mt-3">
          <a href="{{ url('login') }}" class="login">login</a>
        </p>
      </div>
    </div>
  </div>
</div>

<script>
  const passwordInput = document.getElementById('password');
  const confirmPasswordInput = document.getElementById('confirm-password');

  function validatePassword() {
    if (passwordInput.value !== confirmPasswordInput.value) {
      confirmPasswordInput.setCustomValidity('كلمة المرور غير متطابقة.');
    } else {
      confirmPasswordInput.setCustomValidity('');
    }
  }

  passwordInput.addEventListener('input', validatePassword);
  confirmPasswordInput.addEventListener('input', validatePassword);
</script>

<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
