import fs from "fs";

const API_URL = "https://admin.3doptika.hu/wp-json/wp/v2/services?per_page=100&orderby=date&order=desc";
const OUTPUT = "source/_data/services.json";

async function run() {
  const res = await fetch(API_URL);
  const data = await res.json();

  const services = data.map(item => ({
    title: item.title.rendered,
    content: item.content.rendered
  }));

  fs.mkdirSync("source/_data", { recursive: true });
  fs.writeFileSync(OUTPUT, JSON.stringify(services, null, 2));

  console.log(`✔ ${services.length} szolgáltatás elmentve`);
}

run().catch(console.error);
