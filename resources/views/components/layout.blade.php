<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestionale</title>
    @livewireStyles
</head>
<body>
    <header>

        <x-primary-menu />

    </header>

    {{$slot}}

    <x-assets />
    @livewireScripts
</body>
</html>