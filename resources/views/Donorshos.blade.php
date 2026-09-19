<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href={{ asset('css/Donors.css') }}>

    <link rel="stylesheet" href={{ asset('css/bootstrap.min.css') }}>

    <script src={{ asset('js/bootstrap.bundle.min.js') }}></script>

  </head>
<body>


    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-dark p-4" aria-label="Fourth navbar example">
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
                      <a class="nav-link text-dark" data-bs-toggle="modal" href="#exampleModalToggle">announcment</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-dark" href="{{ url('profile') }}">profile</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('logout') }}">logout</a>
                </li>

              </ul>
              <form class="d-flex ms-auto">
                  <select class="form-select me-2 border-danger" aria-label="Blood Type">
                      <option selected>Select Blood Type</option>
                      <option value="A+">A+</option>
                      <option value="A-">A-</option>
                      <option value="B+">B+</option>
                      <option value="B-">B-</option>
                      <option value="AB+">AB+</option>
                      <option value="AB-">AB-</option>
                      <option value="O+">O+</option>
                      <option value="O-">O-</option>
                  </select>
                  <input class="form-control me-2 border-danger" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-light bg-danger" type="submit">Search</button>
              </form>
          </div>
      </div>
  </nav>
  <!-- end navbar -->
    <!-- Modal -->
    <div class="modal fade " id="announcementModal" tabindex="-1" role="dialog" aria-labelledby="announcementModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="announcementModalLabel">إضافة إعلان</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           <!-- <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="announcementTitle ">عنوان الإعلان</label>
                  <input type="text" class="form-control" id="announcementTitle" placeholder="أدخل عنوان الإعلان">
                </div>
                <div class="form-group">
                  <label for="announcementDetails">تفاصيل الإعلان</label>
                  <textarea class="form-control" id="announcementDetails" rows="3" placeholder="أدخل تفاصيل الإعلان"></textarea>
                </div>
                <button type="submit" class="btn btn-danger">حفظ</button>
              </form>
            </div>-->
            <!-- <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
            </div> -->
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




<body>
  <div class="container my-5">
    <div class="row">
      <!-- Start of Card -->
      @foreach ($datauser as $key => $data)
      <div class="col-md-4 mb-4">
        <div class="card shadow-sm">
          <div class="card-body">
            <h5 class="card-title">{{ $data->fullname }}</h5>
            <p class="card-text">{{ $data->address }}</p>
            <p class="card-text">{{ $data->mobile}}</p>
            <p class="card-text">{{ $data->bloodtype }}</p>
         <!--     <label for="available1">Available:</label>
            <label for="yes-1-1">Yes</label>
            <input type="radio" id="yes-1-1" name="available-1" value="yes">

            <label for="no-1-1">No</label>
            <input type="radio" id="no-1-1" name="available-1" value="no">
            -->
          </div>
        </div>
      </div>
      @endforeach
      <!-- End of Card -->


    </div>
  </div>

  <script src="{{ asset('https://code.jquery.com/jquery-3.5.1.slim.min.js') }}"></script>
  <script src="{{ asset('https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js') }}"></script>
  <script src="{{ asset('https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js') }}"></script>
</body>
</html>
