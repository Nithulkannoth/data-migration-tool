<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
@yield('scripts')
<script>
    function changeSvgSize(className, width, height) {
        var svgs = document.querySelectorAll(className);
        svgs.forEach(function(svg) {
            svg.setAttribute('width', width);
            svg.setAttribute('height', height);
        });
    }

    // Change the SVG size to 50x50 for all elements with the class 'resize-svg'
    changeSvgSize('.w-5', '15', '15');
</script>
</html>
