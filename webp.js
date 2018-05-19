var imagemin = require("imagemin"),    // The imagemin module.
  webp = require("imagemin-webp"),   // imagemin's WebP plugin.
  sourceFolder = "./public/images"
  outputFolder = "./public/images",            // Output folder
  PNGImages = sourceFolder+"/*.png",         // PNG images
  JPEGImages = sourceFolder+"/*.jpg";        // JPEG images

imagemin([PNGImages], outputFolder, {
  plugins: [webp({
      lossless: true // Losslessly encode images
  })]
});

imagemin([JPEGImages], outputFolder, {
  plugins: [webp({
    quality: 65 // Quality setting from 0 to 100
  })]
});