// @ts-nocheck
const fs = require('fs');
const path = require('path');

const postsPath = path.resolve(__dirname, '../source/_data/posts.json');
const outputDir = path.resolve(__dirname, '../source/blog');

// Segédfüggvények
function stripHtml(html) {
  return html.replace(/<[^>]*>/g, '');
}

function cleanText(str) {
  return str
    .replace(/\s+/g, ' ')
    .replace(/"/g, "'")
    .trim();
}

// JSON beolvasás
const posts = JSON.parse(fs.readFileSync(postsPath, 'utf8'));

// Régi blog mappa törlése
if (fs.existsSync(outputDir)) {
  fs.rmSync(outputDir, { recursive: true, force: true });
}

// Újramappa létrehozása
fs.mkdirSync(outputDir, { recursive: true });

posts.forEach(post => {
  if (!post.slug) {
    console.warn('⛔ Skipped post without slug:', post);
    return;
  }

  const filePath = path.join(outputDir, `${post.slug}.blade.php`);

  const metaTitle = cleanText(post.meta_title || post.title);

  let rawDescription =
    post.meta_description ||
    post.excerpt ||
    post.content ||
    '';

  rawDescription = stripHtml(rawDescription);
  rawDescription = cleanText(rawDescription);

  const metaDescription =
    rawDescription.length > 0
      ? rawDescription.substring(0, 160)
      : post.title;

  const content = `---
title: "${metaTitle}"
description: "${metaDescription}"
date: ${post.date}
author: ${post.author || '3D Optika'}
featured_image: ${post.featured_image || ''}
---

@extends('_layouts.main')

@section('head')
  @include('_includes.schema-blog-posting')
@endsection

@section('content')

<section class="pageHead">
  <div class="container">
    <h1 class="page-title">${post.title}</h1>
  </div>
</section>

<section class="content">
  <div class="container container--narrow">

    <article class="infoCard infoCard--post">

      <div class="post-meta">
        <span class="date">${post.date}</span>
        <span class="author">${post.author || '3D Optika'}</span>
      </div>

      ${post.featured_image ? `
      <figure class="post-image">
        <img src="${post.featured_image}" alt="${post.title}">
      </figure>
      ` : ''}

      <div class="post-content">
        ${post.content || ''}
      </div>

    </article>

  </div>
</section>

@endsection
`;

  fs.writeFileSync(filePath, content, 'utf8');
});

console.log(`✔ Blog posts generated: ${posts.length}`);
