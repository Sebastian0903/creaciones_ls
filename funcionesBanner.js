
// Script para cargar las imágenes de la carpeta "images"
const imageGallery = document.getElementById('imageGallery');

const imageFolder = 'imgs/'; // Carpeta que contiene las imágenes
const imageExtensions = ['.jpg', '.jpeg', '.png', '.gif']; // Extensiones de archivo permitidas

const loadImageGallery = () => {
fetch(imageFolder)
    .then(response => response.text())
    .then(data => {
    const parser = new DOMParser();
    const htmlDocument = parser.parseFromString(data, 'text/html');
    const imageElements = htmlDocument.getElementsByTagName('a');
    const images = [];

    for (let i = 0; i < imageElements.length; i++) {
        const href = imageElements[i].getAttribute('href');
        const extension = href.substring(href.lastIndexOf('.')).toLowerCase();

        if (imageExtensions.includes(extension)) {
        const img = document.createElement('img');
        img.src = imageFolder + href;
        img.alt = 'Imagen ' + (i + 1);
        images.push(img);
        }
    }

    renderImageGallery(images);
    })
    .catch(error => {
    console.error('Error al cargar las imágenes', error);
    });
};

const renderImageGallery = (images) => {
const gallery = document.getElementById('imageGallery');

for (let i = 0; i < images.length; i++) {
    gallery.appendChild(images[i]);
}
};

loadImageGallery();