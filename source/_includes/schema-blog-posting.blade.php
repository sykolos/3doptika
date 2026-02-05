@php
  use Illuminate\Support\Str;
@endphp

@if (!empty($page->date) && Str::startsWith($page->getPath(), 'blog/'))
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BlogPosting",
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "{{ $page->getUrl() }}"
  },
  "headline": "{{ strip_tags($page->title) }}",
  "datePublished": "{{ $page->date }}",
  "dateModified": "{{ $page->date }}",
  "author": {
    "@type": "Person",
    "name": "{{ $page->author ?? '3D Optika' }}"
  },
  "publisher": {
    "@type": "Organization",
    "name": "3D Optika"
  }
  @if (!empty($page->featured_image)),
  "image": [
    "{{ $page->featured_image }}"
  ]
  @endif
}
</script>
@endif
