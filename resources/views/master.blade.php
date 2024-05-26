<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - {{ $title }}</title>
    <link rel="stylesheet" href="{{ 'dist/assets/compiled/css/app.css'}}">
    <link rel="stylesheet" href="{{ 'dist/assets/compiled/css/app-dark.css'}}">
    <link rel="stylesheet" href="{{ 'dist/assets/compiled/css/iconly.css'}}">
    <link rel="stylesheet" href="{{ 'dist/assets/extensions/@fortawesome/fontawesome-free/css/all.min.css'}}">
    <link rel="stylesheet" href="{{ 'dist/assets/extensions/flatpickr/flatpickr.min.css'}}">

</head>

<body>
    <script src="assets/static/js/initTheme.js"></script>
    <div id="app">
        <div id="sidebar">
            <div class="sidebar-wrapper active">
                    @include('template.toogle')
                    @include('template.sidebarmenu')
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <br><span class="text-muted">Dashboard</span>
                <h3>E - Raport SMK Al - Amanah</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    {{-- @include('template.content') --}}
                    @yield('content')
                </section>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        {{-- <p>2024 &copy; Mazer</p> --}}
                    </div>
                    <div class="float-end">
                        <p>2024 &copy; Mazer</p>
                        {{-- <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                            by <a href="https://saugi.me">Saugi</a></p> --}}
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{ 'dist/assets/static/js/components/dark.js'}}"></script>
    <script src="{{ 'dist/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js'}}"></script>
    <script src="{{ 'dist/assets/compiled/js/app.js'}}"></script>
    <script src="{{ 'dist/assets/extensions/apexcharts/apexcharts.min.js'}}"></script>
    <script src="{{ 'dist/assets/static/js/pages/dashboard.js'}}"></script>
    <script src="{{ 'dist/assets/extensions/flatpickr/flatpickr.min.js'}}"></script>
    <script src="{{ 'dist/assets/static/js/pages/date-picker.js'}}"></script>
</body>

</html>
