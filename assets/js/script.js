// * Выпадающее видео и меню бургер
// querySelectorAll вернет коллецию, не настоящий массив!
// поэтому с помощью [...] превращаем его в настоящий массив
function togClass(burger_menu) {
    // так как burger_menu массив, то что бы стили сработали
    // нужно в цикле пройтись по каждому элементу и ему присвоить стили
    [...burger_menu].forEach(elem => {
        elem.classList.toggle("active");
    });
    document.body.classList.toggle("lock");
}

let header__burger = document.querySelector('.header__burger');
let fullscreen__button = document.querySelector('.full-screen__button');
let fullscreen__close = document.querySelector('.full-screen__close');
let header__menu = document.querySelector('.header__menu');
let header__list = document.querySelector('.header__list');
let header__links = document.querySelectorAll('.header__link');
let burger_menu = document.querySelectorAll('.header__burger,.header__menu,.header__link');

if (header__burger && fullscreen__button) {

    header__menu.classList.add('header__menu_burger');
    header__list.classList.add('header__list_burger');
    header__links.forEach(elem => {
        elem.classList.add('header__link_burger');
        elem.addEventListener("click", () => {
            if (elem.classList.contains('active')) {
                togClass(burger_menu);
                elem.classList.remove('active');
            }
        });
    });

    fullscreen__close.addEventListener('click', () => {
        const fullscreen__video = document.querySelectorAll('.full-screen__close,.full-screen__video');
        togClass(fullscreen__video, 'video__active');
    });

    fullscreen__button.addEventListener('click', () => {
        const fullscreen__video = document.querySelectorAll('.full-screen__close,.full-screen__video');
        togClass(fullscreen__video, 'video__active');
    });

    header__burger.addEventListener('click', () => {
        togClass(burger_menu);
    });
} else {
    header__menu.classList.remove('header__menu_burger');
    header__list.classList.remove('header__list_burger');
    header__links.forEach(elem => {
        elem.classList.remove('header__link_burger');
    });
}