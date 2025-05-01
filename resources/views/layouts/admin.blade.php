<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
        @yield('title', 'Admin') - SaaS
    </title>

    @include('includes.admin.style')

</head>

<body>
    <div class="wrapper">
        @include('sweetalert::alert')

        <!-- Sidebar -->
        @include('includes.admin.sidebar')
        <!-- End Sidebar -->

        <div class="main-panel">
            @include('includes.admin.header')

            <div class="container">
                <div class="page-inner">

                    @yield('breadcrumbs')

                    @yield('content')

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                @include('includes.admin.footer')
            </div>

        </div>
        @include('includes.admin.script')

</body>

</html>
