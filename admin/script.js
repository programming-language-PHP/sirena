let json = document.getElementById('repertoire').getAttribute('data-repertoires'),
    repertoire = JSON.parse(json),
    $repertoireItems = document.getElementById('repertoire__items'),
    groundingCategory = '',
    groundingSubCategory = ''

repertoire.forEach((musicData) => {
    // Категория
    if (groundingCategory !== musicData.category) {
        let category = `
        <li class="repertoire__item">
            <h2 class="repertoire__title repertoire__title_hover">
                ${musicData.category}
                <form class="delete" action='del_music.php' method='POST'>
                    <input type='hidden' name='item' value='${musicData.category}' /> 
                    <button class="btn-delete" type='submit'>&#10006;</button>
                </form>
            </h2>
            <ul data-category="${musicData.category}" class="repertoire__song-list song-list song-list_hide"></ul>
        </li>`
        $repertoireItems.insertAdjacentHTML('beforeend', category)
    }

    // Подкатегория
    if (groundingSubCategory !== musicData.sub_category) {
        let $category = document.querySelector('.repertoire__items li:last-child>ul'),
            subCategory = `<li class="song-list__item">
            <span class="song-list__group-name song-list__group-name__title">${musicData.sub_category}</span> 
            <form class="delete" action='del_music.php' method='POST'>
                <input type='hidden' name='item' value='${musicData.sub_category}' /> 
                <button class="btn-delete" type='submit'>&#10006;</button>
            </form>
        </li>`
        $category.insertAdjacentHTML('beforeend', subCategory)
    }

    // Музыка
    $category = document.querySelector('.repertoire__items li:last-child>ul')
    item = `<li class="song-list__item">
        <span class="song-list__group-name">${musicData.executor} -</span> ${musicData.music_name} 
        <form class="delete" action='del_music.php' method='POST'>
            <input type='hidden' name='item' value='${musicData.id}' /> 
            <button class="btn-delete" type='submit'>&#10006;</button>
        </form>
    </li>`
    $category.insertAdjacentHTML('beforeend', item)

    groundingCategory = musicData.category
    groundingSubCategory = musicData.sub_category
})