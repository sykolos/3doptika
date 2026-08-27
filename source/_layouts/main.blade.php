<!DOCTYPE html>
<html lang="{{ $page->language ?? 'hu' }}">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <!-- Favicon -->
<link rel="icon" href="/assets/favicon/favicon.ico" sizes="any">
<link rel="icon" type="image/svg+xml" href="/assets/favicon/favicon.svg">
<link rel="icon" type="image/png" sizes="96x96" href="/assets/favicon/favicon-96x96.png">

<!-- Apple -->
<link rel="apple-touch-icon" sizes="180x180" href="/assets/favicon/apple-touch-icon.png">

<!-- PWA -->
<link rel="manifest" href="/assets/favicon/site.webmanifest">

<meta name="theme-color" content="#ffffff">

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

    <div class="cookie-banner">
    <p>
        Weboldalunk sütiket használ a jobb felhasználói élmény érdekében. A sütik használatával Ön beleegyezik a sütik használatába.
        <a href="/assets/pdf/Adatkezelesi_tajekoztato_3DOptika.pdf">Részletek</a>
    </p>

    <div class="cookie-actions">
        <button class="btn" id="accept-cookies">Elfogadom</button>
        <button class="btn" id="reject-cookies">Elutasítom</button>
    </div>
    </div>
    
    @include('_includes.footer')
    </body>
</html>
