<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Manajemen Data Sekolah</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>


    <style>
        .jarak {
            padding-left: 15px;
        }

        form {
            max-width: 460px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
        }

        .navbar {
            background-color: #007bff;
        }

        .navbar-brand {
            color: white;
        }

        .navbar-nav .nav-link {
            color: #007bff;
        }

        .navbar-nav .nav-link:hover {
            color: #0056b3;
        }

        .sb-sidenav {
            background-color: #f8f9fa;
        }

        .sb-nav-link-icon {
            color: #007bff;
        }

        .collapse-item {
            font-size: 1.1rem;
            padding-left: 15px;
        }

        .collapse-item:hover {
            background-color: #e9ecef;
        }

        .alert-success {
            background-color: #28a745;
            color: white;
            font-weight: bold;
        }

        footer {
            background-color: #f8f9fa;
            border-top: 1px solid #ddd;
            padding: 10px;
        }

        footer .text-muted {
            color: #6c757d;
        }

        .sb-sidenav-footer {
            background-color: #f8f9fa;
        }

        .sb-sidenav-footer .small {
            color: #6c757d;
        }
    </style>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-light">
        <a class="navbar-brand ps-3" href="/">SDN 02 Kedukul</a>
        <button class="btn btn-link btn-sm" id="sidebarToggle"><i class="fas fa-bars"></i></button>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="/">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Manajemen</div>

                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#studentManagement">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-graduate"></i></div>
                            Siswa
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="studentManagement">
                            <div class="bg-white py-2 collapse-inner rounded jarak">
                                <a class="collapse-item" href="{{ route('siswa.index') }}">Data Siswa</a> <br>
                                <a class="collapse-item" href="{{ route('siswa.create') }}">Tambah Siswa</a>
                            </div>
                        </div>

                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#subjectManagement">
                            <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                            Mata Pelajaran
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="subjectManagement">
                            <div class="bg-white py-2 collapse-inner rounded jarak">
                                <a class="collapse-item" href="{{ route('nilai.mata_pelajaran')}}">Daftar Mata Pelajaran</a> <br>
                                <a class="collapse-item" href="{{ route('nilai.create') }}">Tambah Mata Pelajaran</a>
                            </div>
                        </div>

                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#academicManagement">
                            <div class="sb-nav-link-icon"><i class="fas fa-clipboard"></i></div>
                            Nilai Akademik
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="academicManagement">
                            <div class="bg-white py-2 collapse-inner rounded jarak">
                                <a class="collapse-item" href="{{ route('siswa.search') }}">Cari Siswa</a> <br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Admin
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @yield('content')
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4 text-center">
                    <div class="text-muted">&copy; Manajemen Data SDN 02 Kedukul 2024</div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>
