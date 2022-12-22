<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">


    <!-- FontAwesome JS-->
    <script defer src="{{ url('/assets/plugins/fontawesome/js/all.min.js') }}"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="{{ url('/assets/css/portal.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0-beta.0/dist/trix.css">

    <!-- Filter -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css">

    {{-- Function Show Hide --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    {{-- Upload Document --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="{{ url('/assets/css/sweetalert2.min.css') }}">

    <link rel="icon" href="{{ url('/img/logo_sistem.png') }}">
    <title>@yield('title')</title>
    <style>
    body {
        font-family: 'Inter', sans-serif;
    }
    </style>

    <!-- Table -->
    <link rel="stylesheet" href="{{ url('/assets/css/twitter-bootstrap-4.5.0.css') }}">
    <link rel="stylesheet" href="{{ url('/assets/css/dataTables.bootstrap5.min.css') }}">

</head>

<body class="app">
    <header class="app-header fixed-top" style="height: 5em;">
        <div class="app-header-inner">
            <div class="container-fluid py-2">
                <div class="app-header-content">
                    <div class="row justify-content-between align-items-center head" >

                        <div class="col-auto">
                            <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"
                                    role="img">
                                    <title>Menu</title>
                                    <path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10"
                                        stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path>
                                </svg>
                            </a>
                        </div>
                        <!--//col-->
                        <div class="col">
                            <div class="title" style="font-weight:bold;">
                                @yield('pages')
                            </div>
                        </div>
                        <!--//app-search-box-->

                        <!--//app-utilities-->
                    </div>
                    <!--//row-->
                </div>
                <!--//app-header-content-->
            </div>
            <!--//container-fluid-->
        </div>
        <!--//app-header-inner-->
        <div id="app-sidepanel" class="app-sidepanel">
            <div id="sidepanel-drop" class="sidepanel-drop"></div>
            <div class="sidepanel-inner d-flex flex-column">
                <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
                <div class="app-branding"  style="margin-bottom:20px; margin-left:5px;">
                    <a class="app-logo" href=""><img class="logo-icon me-2"
                            src="{{ url('/assets/images/portal-logo.svg') }}" alt="logo">
                    </a>
                    <div class="info-text my-auto">
                        @if ($loginby->role_id == 1)
                            <span class="logo-text-1">
                        @else
                            <span class="logo-text">
                        @endif
                            @if ($loginby->role_id == 0)
                                {{'Developer'}}
                            @elseif ($loginby->role_id == 1)
                                {{$loginby->area->nama_area}}
                            @elseif ($loginby->role_id == 2)
                                {{$loginby->provinsi->nama_provinsi}}
                            @elseif ($loginby->role_id == 3)
                                {{$loginby->kabkota->nama_kabkota}}
                            @elseif ($loginby->role_id == 4)
                                {{'Pimpinan'}}
                            @elseif ($loginby->role_id == 5)
                                {{'Admin Pusat'}}
                            @endif
                        </span>
                        <span class="child-text">
                            @if ($loginby->role_id == 0)
                            {{'Developer'}}
                            @elseif ($loginby->role_id == 1)
                            {{'Tim SPBE'}}
                            @elseif ($loginby->role_id == 2)
                            {{'Admin Provinsi'}}
                            @elseif ($loginby->role_id == 3)
                            {{'Admin Kabupaten/Kota'}}
                            @elseif ($loginby->role_id == 4)
                            {{'Pimpinan'}}
                            @elseif ($loginby->role_id == 5)
                            {{'Admin Pusat'}}
                            @endif
                        </span>
                    </div>
                </div>
                <!--//app-branding-->

                <nav id="app-nav-main" class=" d-flex flex-column app-nav app-nav-main flex-grow-1">
                    <ul class="app-menu list-unstyled accordion" id="menu-accordion">
                        <li class="nav-item">
                            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                            <a class="nav-link @yield('beranda')" href="{{ url('beranda') }}">
                                <span class="nav-icon">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z" />
                                        <path fill-rule="evenodd"
                                            d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                                    </svg>
                                </span>
                                <span class="nav-link-text">Beranda</span>
                            </a>
                            <!--//nav-link-->
                        </li>
                        <!--//nav-item-->
                        <li class="nav-item">
                            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                            <a class="nav-link @yield('perencanaan')"
                                class="{{ request()->is('/perencanaan-kegiatan') ? 'active' : '' }}"
                                href="/perencanaan-kegiatan">
                                <span class="nav-icon">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-card-list"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                        <path fill-rule="evenodd"
                                            d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5z" />
                                        <circle cx="3.5" cy="5.5" r=".5" />
                                        <circle cx="3.5" cy="8" r=".5" />
                                        <circle cx="3.5" cy="10.5" r=".5" />
                                    </svg>
                                </span>
                                <span class="nav-link-text">Perencanaan</span>
                            </a>
                            <!--//nav-link-->
                        </li>

                    @if ($loginby->role_id == 0 || $loginby->role_id == 2 || $loginby->role_id == 3)
                        <!--//nav-item-->
                        <li class="nav-item">
                            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                            <a class="nav-link @yield('usulan')" href="/usulan-kegiatan">
                                <span class="nav-icon">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-card-list"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                        <path fill-rule="evenodd"
                                            d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5z" />
                                        <circle cx="3.5" cy="5.5" r=".5" />
                                        <circle cx="3.5" cy="8" r=".5" />
                                        <circle cx="3.5" cy="10.5" r=".5" />
                                    </svg>
                                </span>
                                <span class="nav-link-text">Usulan</span>
                            </a>
                            <!--//nav-link-->
                        </li>
                    @endif


                    @if ($loginby->role_id == 0 || $loginby->role_id == 1 || $loginby->role_id == 2 || $loginby->role_id == 3)
                        <!--//nav-item-->
                        <li class="nav-item has-submenu">
                            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                            <a class="nav-link @yield('pengelolaan')" href="/pengelolaan-kegiatan">
                                <span class="nav-icon">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-folder"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.828 4a3 3 0 0 1-2.12-.879l-.83-.828A1 1 0 0 0 6.173 2H2.5a1 1 0 0 0-1 .981L1.546 4h-1L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3v1z" />
                                        <path fill-rule="evenodd"
                                            d="M13.81 4H2.19a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4zM2.19 3A2 2 0 0 0 .198 5.181l.637 7A2 2 0 0 0 2.826 14h10.348a2 2 0 0 0 1.991-1.819l.637-7A2 2 0 0 0 13.81 3H2.19z" />
                                    </svg>
                                </span>
                                <span class="nav-link-text">Pengelolaan</span>
                            </a>
                        </li>
                    @endif


                    @if ($loginby->role_id == 0 || $loginby->role_id == 4 || $loginby->role_id == 5)
                            <!--//nav-item-->
                        <li class="nav-item has-submenu">
                            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                            <a class="nav-link submenu-toggle" href="#submenu-2" data-toggle="collapse"
                                data-target="#submenu-2" aria-expanded="false" aria-controls="submenu-2">
                                <span class="nav-icon">
                                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-columns-gap"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M6 1H1v3h5V1zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H1zm14 12h-5v3h5v-3zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-5zM6 8H1v7h5V8zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H1zm14-6h-5v7h5V1zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1h-5z" />
                                    </svg>
                                </span>
                                <span class="nav-link-text">Persetujuan</span>
                                <span class="submenu-arrow">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                    </svg>
                                </span>
                                <!--//submenu-arrow-->
                            </a>
                            <!--//nav-link-->
                            <div id="submenu-2" class="collapse submenu submenu-2" data-bs-parent="#menu-accordion"
                                style="margin-left:3em;">
                                <ul class="submenu-list list-unstyled">
                                    <li class="submenu-item"><a class="submenu-link @yield('persetujuan-laporan')"
                                            href="{{ url('/persetujuan-laporan') }}"
                                            style="text-decoration:none;">Laporan</a></li>
                                    <li class="submenu-item"><a class="submenu-link @yield('persetujuan-usulan')"
                                            href="{{ url('/persetujuan-usulan') }}"
                                            style="text-decoration:none;">Usulan</a></li>
                                </ul>
                            </div>
                        </li>
                    @endif

                    @if ($loginby->role_id == 0 || $loginby->role_id == 5)
                            <!--//nav-item-->
                        <!--//nav-item-->
                        <li class="nav-item">
                            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                            <a class="nav-link @yield('User Management')" href="/role">
                                <span class="nav-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
                                        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"/>
                                        <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
                                    </svg>
                                </span>
                                <span class="nav-link-text">User Management</span>
                            </a>
                            <!--//nav-link-->
                        </li>
                    @endif
                        <!--//nav-item-->
                    </ul>
                    <!--//footer-menu-->
                    <div class="p-2">
                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger nav-link submenu-toggle text-center"
                                style="color:white; border:0; width: 150px; padding: 5px 5px; margin-top: 30px; margin-left: 40px"
                                aria-controls="submenu-1" data-bs-toggle="collapse"
                                aria-expanded="false">Logout</button>
                        </form>
                    </div>
                    <div class="mt-auto p-2 text-center mx-auto">
                        <hr>
                        <div class="d-flex flex-row bd-highlight mb-2">
                            <div class=" bd-highlight">
                                <img src="{{ url('/img/logo_sistem.png') }}" alt="Logo Sistem" style="width:30px;">
                            </div>

                            <div class="d-flex flex-column bd-highlight mb-2" style="margin-left: 10px;">
                                <div class="bd-highlight">
                                    <div class="h5 text-dark m-0 text-start" style="font-weight:bold">SPBE</div>
                                </div>
                                <div class="bd-highlight">
                                    <div class="small text-dark m-0" style="font-weight:bold">Manajemen Perubahan</div>
                                </div>
                            </div>

                        </div>
                    </div>
                </nav>
            </div>
            <!--//app-sidepanel-footer-->

        </div>
        <!--//sidepanel-inner-->
        </div>
        <!--//app-sidepanel-->
    </header>
    <!--//app-header-->

    @yield('container')

    <!-- Javascript -->
    <script src="{{ url('/assets/plugins/popper.min.js') }}"></script>
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0-beta.0/dist/trix.umd.min.js"></script>
    <script src="{{ url('/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script>
    document.addEventListener("DOMContentLoaded", () => {
        const rows = document.querySelectorAll("tr[data-href]");

        rows.forEach(row => {
            row.addEventListener("click", () => {
                window.location.href = row.dataset.href;
            });
        });
    });
    </script>

    <!-- Charts JS -->
    <script src="{{ url('/assets/plugins/chart.js/chart.min.js') }}"></script>
    <script src="{{ url('/assets/js/index-charts.js') }}"></script>

    <!-- Page Specific JS -->
    <script src="{{ url('/assets/js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Table -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="{{ url('/assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#listKegiatan').DataTable({
            scrollX : true,
        });
    });
    </script>

    <script>
    $(document).ready(function() {
        $('#detailKegiatan').DataTable({
            scrollX : true,
        });
    });
    </script>
    <!-- Filter -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>

    <!-- Number only -->
    <script>
        function isNumberKey(event){
            return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))
        }
    </script>
</body>

</html>
