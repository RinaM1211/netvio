<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header>
        шапка
    </header>
    <main>
        {{ $slot }}
    </main>
    <footer>
        подвал 
    </footer>
</body>
</html>