let photos = [
    'assest/img/Product_card/subcard1.jpg',
    'assest/img/Product_card/subcard2.jpg',
    'assest/img/Product_card/subcard3.jpg',
    'assest/img/Product_card/subcard4.jpg',
    'assest/img/Product_card/subcard5.jpg',
    'assest/img/Product_card/subcard6.jpg',
];

let thumbnails = document.querySelectorAll('.product-card__image');
let fullPhoto = document.querySelector('.product-card__image-main-img');

let addThumbnailClickHandler = function(thumbnails, photo) {
    thumbnails.addEventListener('click', function() {
        fullPhoto.src = photo;
    });
};

for (let i = 0; i < thumbnails.length; i++) {
    addThumbnailClickHandler(thumbnails[i], photos[i]);
}