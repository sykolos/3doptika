// @ts-nocheck

import { fetchWp } from "./fetch-wp.js";

fetchWp({
  name: "Szolgáltatások",
  url:
    "https://admin.3doptika.hu/wp-json/wp/v2/services?per_page=100&orderby=date&order=desc",
  output: "source/_data/services.json",
  mapItem: item => ({
    title: item.title?.rendered ?? "",
    content: item.content?.rendered ?? ""
  })
});
