@if (isset($page->author) && isset($page->date))
<script type="application/ld+json">
@php
  $schema = [
    "@context" => "https://schema.org",
    "@type" => "BlogPosting",
    "mainEntityOfPage" => [
      "@type" => "WebPage",
      "@id" => url($page->getUrl())
    ],
    "headline" => strip_tags($page->title),
    "datePublished" => \Carbon\Carbon::parse($page->date)->toIso8601String(),
    "dateModified" => \Carbon\Carbon::parse($page->date)->toIso8601String(),
    "author" => [
      "@type" => "Person",
      "name" => $page->author
    ],
    "publisher" => [
      "@type" => "Organization",
      "name" => "3D Optika",
      "logo" => [
        "@type" => "ImageObject",
        "url" => url('/assets/images/logo.png')
      ]
    ]
  ];

  if (!empty($page->featured_image)) {
    $schema["image"] = [$page->featured_image];
  }
@endphp

{!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endif
