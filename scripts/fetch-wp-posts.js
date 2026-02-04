import { fetchWp } from "./fetch-wp.js";

fetchWp({
  name: "Blogposztok",
  url: "https://admin.3doptika.hu/wp-json/wp/v2/posts?_embed&per_page=100",
  output: "source/_data/posts.json",

  mapItem: p => ({
    id: p.id,

    slug: p.slug,

    url: `https://3doptika.hu/blog/${p.slug}/`,

    title: p.title?.rendered ?? "",

    excerpt: p.excerpt?.rendered ?? "",

    content: p.content?.rendered ?? "",

    date: p.date ?? null,

    author:
      p._embedded?.author?.[0]?.name ?? "",

    featured_image:
      p._embedded?.["wp:featuredmedia"]?.[0]?.source_url ?? null,

    tags:
      p._embedded?.["wp:term"]
        ?.flat()
        ?.filter(t => t.taxonomy === "post_tag")
        ?.map(t => t.name) ?? [],

    meta_title:
      p.yoast_head_json?.title ?? null,

    meta_description:
      p.yoast_head_json?.description ?? null
  })
});
