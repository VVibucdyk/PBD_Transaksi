<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Arus Kas JMR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="laravel\resources\Image\image.png">
    <link rel="stylesheet" href="laravel\resources\css\style.css">
</head>

<body class="bg-light">
    <center><a href="{{url("/")}}" style="text-decoration: none;"><h1>Transaksi Keuangan Masuk dan Keluar JMR</h1></a></center>
    <main class="container">
        <div class="row justify-content-center text center">
            <div class="col-lg-12">
                @include('komponen.pesan')
                @yield('konten')
                @include('layout.footer')
            </div>
        </div>
    </main>
</body>

</html>