const fs = require('fs-extra');

module.exports = (jigsaw) => {
  const srcDir = 'source/assets/build';
  const destDir = jigsaw.destinationPath + '/assets/build';

  if (fs.existsSync(srcDir)) {
    fs.copySync(srcDir, destDir);
  } 
  const imgSrcDir = 'source/assets/img';
  const imgDestDir = jigsaw.destinationPath + '/assets/img';

  if (fs.existsSync(imgSrcDir)) {
    fs.copySync(imgSrcDir, imgDestDir);
  } 
};
