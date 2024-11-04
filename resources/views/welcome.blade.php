@include('layouts/navigation')
<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    @include('layouts/header')
    @include('layouts/whyus')
    @include('layouts/recent')
    @include('layouts/slogan')
    @include('layouts/footer')
</body>
</html>
