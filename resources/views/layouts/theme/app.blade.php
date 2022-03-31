<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
        <title>Carrito de Compra</title>
        <!-- BEGIN STYLES -->
        @include('layouts.theme.styles');
        <!-- END STYLES -->
    </head>
    <body class="sidebar-noneoverflow dashboard-sales">
        <!-- BEGIN LOADER -->
        <div id="load_screen">
            <div class="loader">
                <div class="loader-content">
                    <div class="spinner-grow align-self-center"></div>
                </div>
            </div>
        </div>
        <!--  END LOADER -->

        <!--  BEGIN NAVBAR  -->
        @include('layouts.theme.header');
        <!--  END NAVBAR  -->

        <!--  BEGIN MAIN CONTAINER  -->
        <div class="main-container" id="container">
            <div class="overlay"></div>
            <div class="search-overlay"></div>

            <!--  BEGIN SIDEBAR  -->
            @include('layouts.theme.sidebar');
            <!--  END SIDEBAR  -->

            <!--  BEGIN CONTENT AREA  -->
            <div id="content" class="main-content">
                <div class="layout-px-spacing">
                    @yield('content')
                </div>
            </div>
            <!--  END CONTENT AREA  -->

            <!--  BEGIN FOOTER  -->
            @include('layouts.theme.footer');
            <!--  END FOOTER  -->
        </div>
        <!-- END MAIN CONTAINER -->

        <!-- BEGIN SCRIPTS -->
        @include('layouts.theme.scripts');
        <!-- END SCRIPTS -->
    </body>
</html>
