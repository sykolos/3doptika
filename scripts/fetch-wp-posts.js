import fs from "fs";

const API_URL = "https://admin.3doptika.hu/wp-json/wp/v2/posts?_embed&per_page=100";
const OUTPUT = "source/_data/posts.json";

async function run() {
  console.log("▶ Blogposztok lekérése...");

  const res = await fetch(API_URL);
  if (!res.ok) {
    throw new Error("WP API nem elérhető");
  }

  const data = await res.json();

  const posts = data.map(p => ({
    title: p.title.rendered,
    content: p.content.rendered,
    excerpt: p.excerpt.rendered,
    date: p.date,
    featured_image:
      p._embedded?.["wp:featuredmedia"]?.[0]?.source_url || null
  }));

  fs.mkdirSync("source/_data", { recursive: true });
  fs.writeFileSync(OUTPUT, JSON.stringify(posts, null, 2));

  console.log(`✔ ${posts.length} poszt elmentve ide: ${OUTPUT}`);
}

run().catch(err => {
  console.error("❌ Hiba:", err.message);
});
