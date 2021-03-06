// Вывод репертуара
let json = document.getElementById('repertoire').getAttribute('data-repertoires'),
    repertoire = JSON.parse(json),
    $repertoireItems = document.getElementById('repertoire__items'),
    groundingCategory = '',
    groundingSubCategory = '',

    pathname = window.location.pathname,
    segmentPathname = pathname.split('/'),
    lastPathIndex = segmentPathname.length - 1,
    lastPathname = segmentPathname[lastPathIndex],
    isFirstPage = lastPathname === '' || lastPathname === 'index.php'

repertoire.forEach((musicData) => {

    // Категория
    if (groundingCategory !== musicData.category) {
        let $btnDelete = `<form class="delete" action='./music/del_music.php' method='POST'>
        <input type='hidden' name='category' value='${musicData.category}' /> 
        <button class="btn-delete" type='submit'>&#10006;</button>
    </form>`,
            category = `
        <li class="repertoire__item">
            <h2 class="repertoire__title repertoire__title_hover">
                ${musicData.category}` + getBtnDelete(isFirstPage, $btnDelete) + `</h2>
            <ul data-category="${musicData.category}" class="repertoire__song-list song-list song-list_hide"></ul>
        </li>`
        // 'beforeend': сразу перед закрывающим тегом element (после последнего потомка).
        $repertoireItems.insertAdjacentHTML('beforeend', category)
    }

    // Подкатегория
    if (groundingSubCategory !== musicData.sub_category & musicData.sub_category !== '' & musicData.sub_category !== 'Популярные') {
        let $category = document.querySelector('.repertoire__items li:last-child>ul'),
            $btnDelete = `<form class="delete" action='./music/del_music.php' method='POST'>
        <input type='hidden' name='sub_category' value='${
            [
                musicData.category,
                musicData.sub_category
            ]
        }' /> 
        <button class="btn-delete" type='submit'>&#10006;</button>
    </form>`,
            subCategory = `<li class="song-list__item">
            <span class="song-list__group-name song-list__group-name_title">${musicData.sub_category}</span>` +
            getBtnDelete(isFirstPage, $btnDelete) +
            `</li>`
        $category.insertAdjacentHTML('beforeend', subCategory)
    }

    // Музыка
    let $category = document.querySelector('.repertoire__items li:last-child>ul'),
        $btnDelete = `<form class="delete" action='./music/del_music.php' method='POST'>
        <input type='hidden' name='music' value='${musicData.id}' /> 
        <button class="btn-delete" type='submit'>&#10006;</button>
    </form>`,
        item = `<li class="song-list__item">
        <span class="song-list__group-name executor">${musicData.executor} - </span>${musicData.music_name}` +
        getBtnDelete(isFirstPage, $btnDelete) +
        `</li>`
    $category.insertAdjacentHTML('beforeend', item)

    groundingCategory = musicData.category
    groundingSubCategory = musicData.sub_category
})

function getBtnDelete(isFirstPage, $btnDelete) {
    return isFirstPage ? '' : $btnDelete
}

let repertoire__title = document.querySelectorAll('.repertoire__title');

repertoire__title.forEach((elem) => {
    // Обработчик событий
    elem.addEventListener('click', () => {
        // nextElementSibling – берёт следующий соседний элемент в данном случае <ul>
        elem.nextElementSibling.classList.toggle("song-list_hide");
        elem.classList.toggle("repertoire__title_pressed");
    });
});