const mix = require('laravel-mix');
const fs = require('fs-extra');
require('laravel-mix-jigsaw');

mix.disableSuccessNotifications();
mix.setPublicPath('source/assets');

mix.jigsaw()
    .sass('source/_assets/css/main.sass', 'build/css')
    .js('source/_assets/js/main.js', 'build/js')
    .options({
        processCssUrls: false,
    })
    .version();

// Képek másolása
mix.then(() => {
    const srcDir = 'source/_assets/img';
    const destDir = 'source/assets/img';
    if (fs.existsSync(srcDir)) {
        fs.copySync(srcDir, destDir);
    }
});
