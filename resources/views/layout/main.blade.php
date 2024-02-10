<!-- main.blade.php as Body -->
<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout.partials.head')
</head> 
<body id="page-top">
    <div id="wrapper">
        @include('layout.partials.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('layout.partials.nav')
                <br>
                @include('layout.partials.pesan')
                <!-- your page here -->
                @yield('content-wrapper')
                <!-- End of page here -->
            </div>
            @include('layout.partials.footer')
        </div>
    </div>
    @include('layout.partials.footer-scripts')
</body>
</html>
<!-- End of Body -->