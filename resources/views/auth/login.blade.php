<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/signup.css') }}">
    <script src="{{ asset('js/signup.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- star-navbar -->
    <nav class="navbar bg-gray navbar-expand-md navbar-dark p-4" aria-label="Fourth navbar example">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ URL::asset('assets/icons8-blood-96.png') }}" alt="Logo" class="img" width="35" height="35">
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
</head>

<body>
    <section class="main p-3 bg-gray">
        <div class="container loginBox Sign-Up">
            <div class="bg-light p-5 rounded shadow-sm form-container">

                <!-- بداية قسم عرض رسائل الجلسة (النجاح والفشل) -->
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                <!-- نهاية قسم عرض الرسائل -->

                <form id="myForm" method="POST" action="{{ route('login.action') }}">
                    @csrf
                    <div class="form-row mb-3">
                        <div class="form-group col-md-6">
                            <select value="{{ old('usertype') }}" class="form-control text-dark @error('usertype') is-invalid @enderror" name="usertype" required onchange="hideSelectedOption()">
                                <option value="">usertype</option>
                                <option value="normal">normal</option>
                                <option value="hospital">hospital</option>
                            </select>
                            @error('usertype')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="form-group col-md-6">
                            <input type="text" id="Username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="UserName" required>
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="form-group col-md-6">
                            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-block text-white" onclick="validateInputs()" style="background-color: rgb(241, 31, 31);">{{ __('login') }} </button>
                </form>
                <p class="text-center mt-3">
                    <a href="{{ url('signup') }}" class="btn login" id="Already">sign up</a>
                </p>
            </div>
        </div>
    </section>

    <footer class="text-center">
        <!-- Grid container -->
        <div class="containerr p-4">
            <!-- Section: Social media -->
            <section class="mb-4">
                <a class="btn btn-outline-light btn-floating m-1 text-primary border-danger" href="https://www.Facebook.com" target="_blank" role="button"><i class="fab bi-facebook"></i></a>
                <a class="btn btn-outline-light btn-floating m-1 text-primary border-danger" href="https://www.twitter.com" target="_blank" role="button"><i class="fab bi-twitter"></i></a>
                <a class="btn btn-outline-light btn-floating m-1 text-danger border-danger" href="https://www.google.com" target="_blank" role="button"><i class="fab bi-google"></i></a>
                <a class="btn btn-outline-light btn-floating m-1 text-dark border-danger" href="https://www.Github.com" target="_blank" role="button"><i class="fab bi-github"></i></a>
            </section>

            <!-- Section: Links -->
            <section class="">
                <div class="row">
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <a class="nav-link" href="{{ url('index') }}">
                            <h5 class="text-uppercase">HOME PAGE</h5>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <a class="nav-link" href="{{ url('contactus') }}">
                            <h5 class="text-uppercase">Contact US</h5>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <a class="nav-link" href="{{ url('aboutus') }}">
                            <h5 class="text-uppercase">About US</h5>
                        </a>
                    </div>
                </div>
            </section>
        </div>
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            <img src="{{ URL::asset('assets/icons8-blood-96.png') }}" alt="Logo" class="imge" width="25" height="25">
            B-DROP
            <a class="text-white" href="{{ url('index') }}">B-DROP </a>
        </div>
    </footer>

    <script>
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('confirm-password');

        function validatePassword() {
            const password = passwordInput.value;
            const confirmPassword = confirmPasswordInput ? confirmPasswordInput.value : '';
            if (confirmPasswordInput) {
                if (password !== confirmPassword) {
                    confirmPasswordInput.setCustomValidity('كلمة المرور غير متطابقة.');
                } else {
                    confirmPasswordInput.setCustomValidity('');
                }
            }
        }
        if(passwordInput) passwordInput.addEventListener('input', validatePassword);
        if(confirmPasswordInput) confirmPasswordInput.addEventListener('input', validatePassword);
    </script>
</body>
</html>
