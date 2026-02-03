document.addEventListener("click", e => {
  const btn = e.target.closest(".blog-toggle");
  if (!btn) return;

  const id = btn.dataset.target;
  const content = document.getElementById(id);

  const open = !content.hasAttribute("hidden");
  content.toggleAttribute("hidden", open);
  btn.setAttribute("aria-expanded", String(!open));
});
