let fullscreen__button = document.querySelector('.full-screen__button');
let fullscreen__close = document.querySelector('.full-screen__close');
fullscreen__close.addEventListener('click', () => {
    const fullscreen__video = document.querySelectorAll('.full-screen__close,.full-screen__video');
    togClass(fullscreen__video, 'video__active');
});

fullscreen__button.addEventListener('click', () => {
    const fullscreen__video = document.querySelectorAll('.full-screen__close,.full-screen__video');
    togClass(fullscreen__video, 'video__active');
});