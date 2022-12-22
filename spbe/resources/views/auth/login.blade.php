
@include('sweetalert::alert')

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="icon" href="img/logo_sistem.png">

    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">

    <title>@yield('title')</title>
</head>

<body class="vh-100">
    <section class="w-100 h-100 p-4 d-flex justify-content-center pb-4">
        <div style="" class="my-auto">
            <!-- Pills content -->
            <div class="tab-content rounded-5 shadow w-100 m-auto" style="padding: 2em; width: 20rem;">
            {{-- @if(Session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            @if(Session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif --}}

            <!-- Form Login -->
                <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                    <img class="rounded mx-auto d-block" src="img/logo_sistem.png" alt="Logo Sistem"
                        style="width:70px; margin: 20px;">
                    <div class="h6 text-center" style="font-weight: bold;"> SISTEM MANAJEMEN PERUBAHAN TI
                    </div>
                    <div class="h6 text-center" style="font-weight: bold;"> BADAN PUSAT STATISTIK (BPS)
                    </div>
                    <form action="/login" method="POST">
                        @csrf
                        <!-- Email input -->
                        <div class="form-floating @error('email') is-invalid @enderror" style="margin: 10px 0; margin-top: 40px;">
                            <input type="email" class="form-control" id="floatingInput"
                            id="email" name="email" placeholder="Email"  required value="{{ old('email') }}">
                            <label for="email">Email Address</label>
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Password input -->
                        <div class="form-floating" style="margin: 10px 0;">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            <label for="password">Password</label>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block mb-4 w-100 text-white"
                            style="margin: 2px 0;">Login</button>
                    </form>
                </div>

                <!-- Pills content -->
            </div>



            <!-- Javascript -->
            <script src="assets/plugins/popper.min.js"></script>
            <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

            <!-- Charts JS -->
            <script src="assets/plugins/chart.js/chart.min.js"></script>
            <script src="assets/js/index-charts.js"></script>

            <!-- Page Specific JS -->
            <script src="assets/js/app.js"></script>

</body>


<script src="{{ url('/assets/js/sweetalert2.all.min.js') }}"></script>
    <script>
    @if (session()->has('error'))
    Swal.fire({
        title: 'Gagal Login',
        icon: 'error',
        text: 'Email atau Password Salah!'
    });
    @endif
    </script>

</html>
