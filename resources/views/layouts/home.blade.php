<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>
        @yield('title', 'Home') - SaaS
    </title>

    @include('includes.home.style')

</head>

<body class="index-page">

    @include('includes.home.header')

    <main class="main">

        @yield('content')

    </main>

    @include('includes.home.footer')

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    @include('includes.home.script')

</body>

</html>
