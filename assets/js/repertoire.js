// * Репертуар
let repertoire__title = document.querySelectorAll('.repertoire__title');

repertoire__title.forEach((elem) => {
    elem.addEventListener('click', () => {
        elem.nextElementSibling.classList.toggle("song-list_hide");
        elem.classList.toggle("repertoire__title_pressed");
    });
});