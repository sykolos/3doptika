import fs from "fs";

const API_URL =
  "https://admin.3doptika.hu/wp-json/wp/v2/faq?per_page=100&orderby=date&order=desc";
const OUTPUT = "source/_data/faq.json";

async function run() {
  const res = await fetch(API_URL);
  const data = await res.json();

  const faq = data.map(item => ({
    question: item.title.rendered,
    answer: item.content.rendered
  }));

  fs.mkdirSync("source/_data", { recursive: true });
  fs.writeFileSync(OUTPUT, JSON.stringify(faq, null, 2));

  console.log(`✔ ${faq.length} GYIK elem elmentve`);
}

run().catch(console.error);
