<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield("title", "My Laravel App")</title>
    @vite(["resources/js/app.js"])
    @vite(["resources/css/app.css"])
</head>
<body>
    <x-header />

    <main class="container">
        {{ $slot }}
    </main>

    <x-footer />
</body>
</html>