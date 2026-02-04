import { fetchWp } from "./fetch-wp.js";

fetchWp({
  name: "GYIK",
  url:
    "https://admin.3doptika.hu/wp-json/wp/v2/faq?per_page=100&orderby=date&order=desc",
  output: "source/_data/faq.json",
  mapItem: item => ({
    question: item.title?.rendered ?? "",
    answer: item.content?.rendered ?? ""
  })
});
