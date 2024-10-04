<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags -->
@include('website.includes.meta')

<!-- Style -->
@include('website.includes.style')

</head>
<body>

@include('website.includes.header')

@yield('body')

<!-- Footer -->
@include('website.includes.footer')


<!-- Script -->

@include('website.includes.script')

</body>

</html>

