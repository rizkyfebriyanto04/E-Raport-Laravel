<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - {{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('dist/assets/compiled/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/compiled/css/app-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/compiled/css/iconly.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/extensions/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/extensions/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/extensions/choices.js/public/assets/styles/choices.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/compiled/css/table-datatable.css') }}">

    {{-- <link rel="stylesheet" href="{{ 'dist/assets/compiled/css/app.css'}}"> --}}
    {{-- <link rel="stylesheet" href="{{ 'dist/assets/compiled/css/app-dark.css'}}">
    <link rel="stylesheet" href="{{ 'dist/assets/compiled/css/iconly.css'}}">
    <link rel="stylesheet" href="{{ 'dist/assets/extensions/@fortawesome/fontawesome-free/css/all.min.css'}}">
    <link rel="stylesheet" href="{{ 'dist/assets/extensions/flatpickr/flatpickr.min.css'}}">

    <link rel="stylesheet" href="{{ 'dist/assets/extensions/choices.js/public/assets/styles/choices.css'}}">
    <link rel="stylesheet" href="{{ 'dist/assets/extensions/simple-datatables/style.css'}}">
    <link rel="stylesheet" href="{{ 'dist/assets/compiled/css/table-datatable.css'}}"> --}}

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <script src="{{ 'dist/assets/static/js/initTheme.js'}}"></script>
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
                <h3>Dashboard | SMK AL AMANAH</h3>
            </div>

            {{-- <div class="card">
                <div class="card-header">
                    <h4 class="card-title">SMK AL AMANAH</h4>
                </div>
            </div> --}}

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
                        <p>2024 &copy; Mila</p>
                        {{-- <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                            by <a href="https://saugi.me">Saugi</a></p> --}}
                    </div>
                </div>
            </footer>
        </div>
    </div>
    {{-- <script src="{{ 'dist/assets/static/js/components/dark.js'}}"></script>
    <script src="{{ 'dist/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js'}}"></script>
    <script src="{{ 'dist/assets/compiled/js/app.js'}}"></script>
    <script src="{{ 'dist/assets/extensions/apexcharts/apexcharts.min.js'}}"></script>
    <script src="{{ 'dist/assets/static/js/pages/dashboard.js'}}"></script>
    <script src="{{ 'dist/assets/extensions/flatpickr/flatpickr.min.js'}}"></script>
    <script src="{{ 'dist/assets/static/js/pages/date-picker.js'}}"></script>
    <script src="{{ 'dist/assets/static/js/pages/ui-chartjs.js'}}"></script>
    <script src="{{ 'dist/assets/extensions/simple-datatables/umd/simple-datatables.js'}}"></script>
    <script src="{{ 'dist/assets/static/js/pages/simple-datatables.js'}}"></script>
    <script src="{{ 'dist/assets/extensions/choices.js/public/assets/scripts/choices.js'}}"></script>
    <script src="{{ 'dist/assets/static/js/pages/form-element-select.js'}}"></script> --}}

    <script src="{{ asset('dist/assets/static/js/components/dark.js') }}"></script>
    <script src="{{ asset('dist/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('dist/assets/compiled/js/app.js') }}"></script>
    <script src="{{ asset('dist/assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('dist/assets/static/js/pages/dashboard.js') }}"></script>
    <script src="{{ asset('dist/assets/extensions/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('dist/assets/static/js/pages/date-picker.js') }}"></script>
    <script src="{{ asset('dist/assets/static/js/pages/ui-chartjs.js') }}"></script>
    <script src="{{ asset('dist/assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('dist/assets/static/js/pages/simple-datatables.js') }}"></script>
    <script src="{{ asset('dist/assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
    <script src="{{ asset('dist/assets/static/js/pages/form-element-select.js') }}"></script>

</body>

</html>
