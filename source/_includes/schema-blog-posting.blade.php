@if (isset($page->author) && isset($page->date))
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
    "name": "{{ $page->author }}"
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
