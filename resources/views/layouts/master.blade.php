<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jetstram-First</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    {{-- <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.min.css"> --}}
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,200;0,400;0,800;0,900;1,200;1,400;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d4cbcb96c8.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Scripts -->
    @vite([/* 'resources/css/app.css', */ 'resources/css/custom.css', 'resources/js/app.js'])


    <style>
@import url('https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;1,100;1,200&display=swap');

        body {
            
            /* font-family: 'Fira Sans', sans-serif; */
            /* ackground-color:yellow; */
        }
    </style>
</head>
<body style="">
    <header>
        @include('layouts.navigationmine')
    </header>

    <main>
        <div class="mb-5 pt-3">
            @yield('content') <!-- This is where the content will be inserted -->
        </div>
        
    </main>

    <footer class="fixed-bottom pt-3 bg-secondary">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 text-start">
                    <div class="logo">Your Logo</div>
                </div>
                <div class="col-12 col-md-4 text-center">
                    <a class="legal-notice" href="#">Legal Notice</a>
                </div>
                <div class="col-12 col-md-4 text-end">
                    <button class="btn btn-secondary arrow-up" id="btnScrollToTop" onclick="scrollToTop()">
                        <i class="fa-solid fa-circle-chevron-up fa-2x"></i>
                    </button>
                </div>
            </div>
        </div>
    </footer>

   <!-- Include Bootstrap JS, Popper.js, and FontAwesome (if not already included) -->
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@2.11.6/dist/umd/popper.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
   </html>