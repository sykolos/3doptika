<!DOCTYPE html>
<html lang="{{ $page->language ?? 'hu' }}">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <link rel="canonical" href="{{ $page->baseUrl }}{{ $page->getUrl() }}">
    <title>
        {{ $page->title ?? trim($__env->yieldContent('title')) ?? '3D Optika Vác' }}
        – 3D Optika Vác – Ahol a látás élménnyé válik!
    </title>
    <meta name="description"
          content="{{ $page->description ?? trim($__env->yieldContent('description')) ?? '3D Optika Vác – Professzionális optikai szolgáltatások.' }}">
    <meta property="og:title"
          content="{{ $page->title ?? trim($__env->yieldContent('title')) ?? '3D Optika Vác' }} – 3D Optika Vác">
    <meta property="og:description"
          content="{{ $page->description ?? trim($__env->yieldContent('description')) ?? '3D Optika Vác – Ahol a látás élménnyé válik.' }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $page->baseUrl }}{{ $page->getUrl() }}">
    <meta property="og:image" content="{{ $page->baseUrl }}/assets/images/3doptika_front.jpg">

    @yield('script_tags')

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
