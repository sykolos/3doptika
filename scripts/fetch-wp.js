import fs from "fs";

export async function fetchWp({
  name,
  url,
  output,
  mapItem
}) {
  console.log(`▶ ${name} lekérése...`);

  let data;

  try {
    const res = await fetch(url);

    if (!res.ok) {
      throw new Error(`HTTP ${res.status}`);
    }

    data = await res.json();
  } catch (err) {
    console.error(`❌ ${name} fetch hiba:`, err.message);
    throw err; //  CI STOP
  }

  if (!Array.isArray(data)) {
    console.warn(`⚠️ ${name}: nem tömb válasz, üres lista`);
    data = [];
  }

  const items = data.map(mapItem);

  fs.mkdirSync("source/_data", { recursive: true });
  fs.writeFileSync(output, JSON.stringify(items, null, 2));

  console.log(`✔ ${items.length} ${name} mentve → ${output}`);
}
