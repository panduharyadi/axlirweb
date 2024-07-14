<!DOCTYPE html>
<html lang="en">

<head>
   @include('frontend.components.header')
</head>

<body>
    <!-- Start Top Nav -->
    @include('frontend.components.topbar')
    <!-- Close Top Nav -->


    <!-- Header -->
    @include('frontend.components.navbar')
    <!-- Close Header -->

    <!-- Modal -->
    @include('frontend.components.modalsearch')


    <!-- Start Categories of The Month -->
    @yield('content')
    <!-- End Featured Product -->


    <!-- Start Footer -->
    @include('frontend.components.footer')
    <!-- End Footer -->

    <!-- Start Script -->
    @include('frontend.components.js')
    <!-- End Script -->
</body>

</html>