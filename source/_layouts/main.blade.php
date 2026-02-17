<!DOCTYPE html>
<html lang="{{ $page->language ?? 'hu' }}">
    <head>
        <!-- MAIN LAYOUT HEAD -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="canonical" href="{{ $page->getUrl() }}">
        <meta name="description" content="{{ $page->description }}">
        @yield('script_tags')
        <title>{{ $page->title }}</title>
        <link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">
        <script defer src="{{ mix('js/main.js', 'assets/build') }}"></script>        
        @yield('head')
    </head>
    <body class="text-gray-900 font-sans antialiased">
        
        @include('_includes.nav')

    <main>
        @yield('content')
    </main>

    @include('_includes.callback-form')
    
    @include('_includes.footer')
    </body>
</html>
