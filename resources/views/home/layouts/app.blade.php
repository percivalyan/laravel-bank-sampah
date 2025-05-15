<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.layouts.partials.header')
</head>

<body>

    <!-- Spinner Start -->
    @include('home.layouts.partials.spinner')
    <!-- Spinner End -->

    <main>
        @yield('home')
    </main>

    <!-- Footer Start -->
    @include('home.layouts.partials.footer')
    <!-- Footer End -->

    <!-- Copyright Start -->
    @include('home.layouts.partials.copyright')
    <!-- Copyright End -->


    <!-- Back to Top -->
    @include('home.layouts.partials.top')

    <!-- JavaScript Libraries -->
    <!-- Template Javascript -->
    @include('home.layouts.partials.script')
</body>

</html>
