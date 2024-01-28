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
                @yield('content-wrapper')
            </div>
            @include('layout.partials.footer')
        </div>
    </div>
    @include('layout.partials.footer-scripts')
</body>
</html>