<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>testing</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  @stack('heads')
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <a class="navbar-brand">
        <h1 style="font-family: 'Poppins', sans-serif;">N-Field</h1>      
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link @guest disabled @endguest" href="{{ route('booking.index') }}">Booking</a>
          </li>
         
            <li class="nav-item">
              <a class="nav-link" href="{{ route('riwayat.index') }}">Riwayat Booking</a>
            </li>
        </ul>
        @auth
          <a class="btn px-3 btn btn-outline-danger confirmLogout">Logout</a>
        @endauth
        @guest
          <a class="btn px-3 me-2 btn-outline-primary" href="{{ route('regis.view') }}">Daftar</a>
          <a class="btn px-3 btn-primary" href="{{ route('login.view') }}">Login</a>
        @endguest
      </div>
    </div>
  </nav>
  <div class="container">
    @yield('content')
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  @stack('scripts')
  
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function () {

        $('.confirmLogout').click(function (e) {
            e.preventDefault();

            Swal.fire({
                title: "Apa anda yakin?",
                text: "Anda akan keluar!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Iya", 
                cancelButtonText: "Tidak", 
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('logout') }}";
                }
            });
        });

    });
</script>

</body>

</html>