const mix = require('laravel-mix');
const fs = require('fs-extra');
require('laravel-mix-jigsaw');


mix.disableSuccessNotifications();
mix.setPublicPath('source/assets/build');

mix.jigsaw()
    .sass('source/_assets/css/main.sass', 'css')
    .js('source/_assets/js/main.js', 'js')
    .options({
        processCssUrls: false,
    })
    .version();
mix.then(() => {
        const srcDir = 'source/_assets/img';
        const destDir = 'source/assets/img';
        if (fs.existsSync(srcDir)) {
            fs.copySync(srcDir, destDir);
        }
});