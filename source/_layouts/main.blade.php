<!DOCTYPE html>
<html lang="{{ $page->language ?? 'en' }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="canonical" href="{{ $page->getUrl() }}">
        <meta name="description" content="{{ $page->description }}">
        <title>{{ $page->title }}</title>
        <link rel="stylesheet" href="{{ $page->baseUrl }}/assets/build/css/main.css">
        <script defer src="{{ $page->baseUrl }}/assets/build/js/main.js"></script>
    </head>
    <body class="text-gray-900 font-sans antialiased">
        @include('_includes.nav')

        @yield('body')

        @include('_includes.footer')
    </body>
</html>
