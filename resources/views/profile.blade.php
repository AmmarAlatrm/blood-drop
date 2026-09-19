<!doctype html>
<html lang="ar">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>تحديث المعلومات الشخصية</title>
  <link rel="stylesheet" href={{ asset('css/profile.css') }}>
  <link rel="stylesheet" href="{{ asset('https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href={{ asset('css/bootstrap.min.css') }}>
  <script src="{{ asset('https://code.jquery.com/jquery-3.5.1.slim.min.js') }}"></script>
  <script src="{{ asset('https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js') }}"></script>
  <script src="{{ asset('https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js') }}"></script>
  <script src={{ asset('js/bootstrap.bundle.min.js') }}></script>
</head>


  <body>

        <!-- Navbar -->
        <nav class="navbar navbar-expand-md navbar-dark p-4 " aria-label="Fourth navbar example">
            <div class="container-fluid">
                <a class="navbar-brand " href="#">
                    <img src="{{ URL::asset('assets/icons8-blood-96.png') }}" alt="Logo" class="img" width="35" height="35">
                    <span class="m-t-3">B-DROP</span>
                </a>
                <button class="navbar-toggler bg-danger" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse text-center" id="navbarsExample04" style="font-size: 25px;">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link text-dark" aria-current="page" href="{{ url('Donorshos') }}">HomePage</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" data-bs-toggle="modal" href="#exampleModalToggle">Announcment</a>
                        </li>

                        <li class="nav-item">
                          <a class="nav-link text-dark" href="" data-toggle="modal" data-target="#announcementModal">AddAnnouncement</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{ url('profile') }}">profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{ route('logout') }}">logout</a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
        <!-- end navbar -->


        <!-- Modal -->
        <div>
       <div class="modal fade " id="announcementModal" tabindex="-1" role="dialog" aria-labelledby="announcementModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-danger">
              <div class="modal-inner-content">
                <div class="modal-header ">
              <h5 class="modal-title" id="announcementModalLabel">إضافة إعلان</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="POST" action={{ route('AddAnnounce') }}>
                    @csrf
                <div class="form-group col-md-6">
                    <select   value="{{ old('neededbloodtype') }}" class="form-control text-dark @error('neededbloodtype') is-invalid @enderror" name="neededbloodtype" required onchange="hideSelectedOption()">
                        <option value="">needed blood type</option>
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

                    @error('neededbloodtype')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                  <div class="form-group">
                    <label for="announcementDetails">post announcement here </label>

                  </div>
                  <button type="submit" onclick="validateInputs()" class="btn btn-danger" >{{ __('post') }} </button>                     <!--class="btn btn-outline-light bg-danger"-->            <!--class="btn btn-danger"-->
                </form>
              </div>
              <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
              </div> -->
            </div>
          </div>
        </div>
        </div>


        <!-- Modal -->
        <form role="search">
             <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
             <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content bg-danger">
                  <div class="modal-inner-content">
                  <div class="modal-header ">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="notifications-container">
                                    <div class="notification">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">مريض بحاجة لدم في المستشفى الوطني</h5>
                                                <p class="card-text">20/12/2023, 12:20</p>
                                                <p class="card-text text-muted">زمرة الدم المطلوبة: A+</p>
                                            </div>
                                            justify-content: center;
                                          </div>
                                    </div>
                                    <div class="notification">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">مريض بحاجة لدم في المستشفى الوطني</h5>
                                                <p class="card-text">20/12/2023, 12:20</p>
                                                <p class="card-text text-muted">زمرة الدم المطلوبة: A+</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="notification">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">مريض بحاجة لدم في المستشفى الوطني</h5>
                                                <p class="card-text">20/12/2023, 12:20</p>
                                                <p class="card-text text-muted">زمرة الدم المطلوبة: A+</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>



            <!-- Form Section -->
        <div class="col-md-6 container">
          <form class="loginBox">
            <div class="form-group">
              <label for="fullName">Full Name</label>
              <input type="text" class="form-control" id="fullName">
            </div>
            <div class="form-group form-in">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username">
            </div>
            <div class="form-group">
              <label for="address">Address</label>
              <input type="text" class="form-control" id="address">
            </div>
            <div class="form-group">
              <label for="mobileNumber">Mobile Phone Number</label>
              <input type="text" class="form-control" id="mobileNumber">
              <div id="mobileNumberError" class="error-message" style="display: none;">
                Phone number must start with 09 and be 10 digits long.        </div>
            </div>
            <button type="button" class="btn" id="btn-save">Save Changes</button>
          </form>
        </div>

        <!-- Section to display the saved information -->
        <div id="info" class="info-container mt-4 container"></div>



        <!-- </div> -->
        <script>
          document.getElementById('btn-save').addEventListener('click', function() {
            // احصل على القيم المدخلة من الحقول
            var fullName = document.getElementById('fullName').value;
            var username = document.getElementById('username').value;
            var address = document.getElementById('address').value;
            var mobileNumber = document.getElementById('mobileNumber').value;
            var mobileNumberError = document.getElementById('mobileNumberError');
            var mobileNumberField = document.getElementById('mobileNumber');

            // تحقق من أن رقم الموبايل يبدأ بـ "09" ويتبعه 8 أرقام
            var mobileNumberPattern = /^09\d{8}$/;
            if (!mobileNumberPattern.test(mobileNumber)) {
              mobileNumberError.style.display = 'block';
              mobileNumberField.classList.add('is-invalid'); // إضافة فئة للتحقق من النموذج
              return;
            } else {
              mobileNumberError.style.display = 'none';
              mobileNumberField.classList.remove('is-invalid'); // إزالة فئة التحقق من النموذج
            }

            // عرض القيم المدخلة في div
            var infoDiv = document.getElementById('info');
            infoDiv.innerHTML = `
              <div class="card p-3">
                <p><strong>Full Name:</strong> ${fullName}</p>
                <p><strong>Username:</strong> ${username}</p>
                <p><strong>Address:</strong> ${address}</p>
                <p><strong>Mobile Phone Number:</strong> ${mobileNumber}</p>
              </div>
            `;
          });
        </script>


        <script>
          document.getElementById('btn-save').addEventListener('click', function() {
        // احصل على القيم المدخلة من الحقول
        var fullName = document.getElementById('fullName').value;
        var username = document.getElementById('username').value;
        var address = document.getElementById('address').value;
        var mobileNumber = document.getElementById('mobileNumber').value;
        var mobileNumberError = document.getElementById('mobileNumberError');
        var mobileNumberField = document.getElementById('mobileNumber');

        // تحقق من أن رقم الموبايل يبدأ بـ "09" ويتبعه 8 أرقام
        var mobileNumberPattern = /^09\d{8}$/;
        if (!mobileNumberPattern.test(mobileNumber)) {
          mobileNumberError.style.display = 'block';
          mobileNumberField.classList.add('is-invalid'); // إضافة فئة للتحقق من النموذج
          return;
        } else {
          mobileNumberError.style.display = 'none';
          mobileNumberField.classList.remove('is-invalid'); // إزالة فئة التحقق من النموذج
        }

        // عرض القيم المدخلة في div
        var infoDiv = document.getElementById('info');
        infoDiv.innerHTML = `
          <div class="card p-3">
            <p><strong>Full Name:</strong> ${fullName}</p>
            <p><strong>Username:</strong> ${username}</p>
            <p><strong>Address:</strong> ${address}</p>
            <p><strong>Mobile Phone Number:</strong> ${mobileNumber}</p>
          </div>
        `;
      });

      </script>



      </body>
      </html>
