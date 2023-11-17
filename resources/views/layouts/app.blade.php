<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >
    <meta
        name="crsf-token"
        content="{{ csrf_token() }}"
    >
    <title>{{ config('app.name', 'JRLmx.com') }}</title>

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >
    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >
    <link
        href="https://fonts.googleapis.com/css2?family=Playpen+Sans&display=swap"
        rel="stylesheet"
    >
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body>
    {{ $slot }}
</body>

</html>
