// @ts-nocheck

import fs from "fs";
import path from "node:path";

export async function fetchWp({
  name,
  url,
  output,
  mapItem,
  requiredFields = ["title", "content"]
}) {
  console.log(`▶ ${name} lekérése...`);

  let data;

  try {
    const res = await fetch(url, {
      signal: AbortSignal.timeout(30000),
      headers: {
        'Accept': 'application/json',
        'User-Agent': '3DOptika-Build-Bot'
      }
    });


    if (!res.ok) {
      throw new Error(`HTTP ${res.status}`);
    }

    data = await res.json();
  } catch (err) {
    console.error(`❌ ${name} fetch hiba:`, err.message);
    throw err; //  CI STOP
  }

  if (!Array.isArray(data) || data.length === 0) {
    throw new Error(`${name}: empty or invalid response; existing data was not changed.`);
  }

  const items = data.map(mapItem);

  for (const [index, item] of items.entries()) {
    for (const field of requiredFields) {
      if (typeof item?.[field] !== "string" || item[field].trim() === "") {
        throw new Error(`${name}: item ${index + 1} has no ${field}; existing data was not changed.`);
      }
    }
  }

  fs.mkdirSync(path.dirname(output), { recursive: true });
  const temporaryOutput = `${output}.tmp`;
  try {
    fs.writeFileSync(temporaryOutput, JSON.stringify(items, null, 2));
    fs.renameSync(temporaryOutput, output);
  } finally {
    fs.rmSync(temporaryOutput, { force: true });
  }

  console.log(`✔ ${items.length} ${name} mentve → ${output}`);
}
