<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Vue App</title>
    @vite('resources/js/app.js') {{-- Include your compiled assets --}}
</head>
<body>
<div id="app">
    <example-component></example-component> {{-- Your Vue component --}}
</div>
</body>
</html>
