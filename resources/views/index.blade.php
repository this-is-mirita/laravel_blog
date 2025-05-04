<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vue Start</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('assets/vendors/font-awesome/css/all.min.css') }}">
    @vite('resources/js/app.js') <!-- важно! -->
</head>
<body>
{{--vue шаблон--}}
<div id="app"></div>

</body>
</html>
