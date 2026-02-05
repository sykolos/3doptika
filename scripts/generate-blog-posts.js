// @ts-nocheck
const fs = require('fs');
const path = require('path');

const postsPath = path.resolve(__dirname, '../source/_data/posts.json');
const outputDir = path.resolve(__dirname, '../source/blog');

if (!fs.existsSync(outputDir)) {
  fs.mkdirSync(outputDir, { recursive: true });
}

const posts = JSON.parse(fs.readFileSync(postsPath, 'utf8'));

posts.forEach(post => {
  if (!post.slug) {
    console.warn('⛔ Skipped post without slug:', post);
    return;
  }

  const filePath = path.join(outputDir, `${post.slug}.blade.php`);

  const content = `---
title: ${post.meta_title || post.title}
description: ${post.meta_description || ''}
date: ${post.date}
author: ${post.author}
featured_image: ${post.featured_image || ''}
---

@extends('_layouts.main')

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
        <span class="author">${post.author}</span>
      </div>

      ${post.featured_image ? `
      <figure class="post-image">
        <img src="${post.featured_image}" alt="${post.title}">
      </figure>
      ` : ''}

      <div class="post-content">
        ${post.content}
      </div>

    </article>

  </div>
</section>

@endsection
`;

  fs.writeFileSync(filePath, content, 'utf8');
});

console.log(`✔ Blog posts generated: ${posts.length}`);
