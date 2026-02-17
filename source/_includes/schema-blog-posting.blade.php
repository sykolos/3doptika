<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BlogPosting",
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "{{ $page->getUrl() }}"
  },
  "headline": "{{ strip_tags($page->title) }}",
  "datePublished": "{{ date('c', $page->date) }}",
  "dateModified": "{{ date('c', $page->date) }}"
  @if ($page->featured_image),
  "image": ["{{ $page->featured_image }}"]
  @endif,
  "author": {
    "@type": "Person",
    "name": "{{ $page->author }}"
  },
  "publisher": {
    "@type": "Organization",
    "name": "3D Optika"
  }
}
</script>
