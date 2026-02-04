import { fetchWp } from "./fetch-wp.js";

fetchWp({
  name: "Vélemények",
  url:
    "https://admin.3doptika.hu/wp-json/wp/v2/testimonials?per_page=100&orderby=date&order=desc",
  output: "source/_data/testimonials.json",
  mapItem: item => ({
    title: item.title?.rendered ?? "",
    text: item.content?.rendered ?? "",
    author: item.author ?? ""
  })
});
