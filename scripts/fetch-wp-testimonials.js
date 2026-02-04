import fs from "fs";

const API_URL =
  "https://admin.3doptika.hu/wp-json/wp/v2/testimonials?per_page=100&orderby=date&order=desc";
const OUTPUT = "source/_data/testimonials.json";

async function run() {
  const res = await fetch(API_URL);
  const data = await res.json();

  const testimonials = data.map(item => ({
    title: item.title.rendered,
    text: item.content.rendered,
    author: item.author || ""
  }));

  fs.mkdirSync("source/_data", { recursive: true });
  fs.writeFileSync(OUTPUT, JSON.stringify(testimonials, null, 2));

  console.log(`✔ ${testimonials.length} vélemény betöltve`);
}

run().catch(console.error);
