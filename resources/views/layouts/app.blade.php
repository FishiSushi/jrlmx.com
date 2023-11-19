<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >
    <meta
        name="csrf-token"
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

<body
    class="min-h-screen bg-gradient-to-br from-green-900 via-green-950 to-blue-950 text-green-50"
>
    <livewire:layout.navigation />

    {{ $slot }}
</body>

</html>
