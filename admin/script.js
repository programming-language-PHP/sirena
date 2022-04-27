let json = document.getElementById('repertoire').getAttribute('data-repertoires'),
    repertoire = JSON.parse(json),
    $repertoireItems = document.getElementById('repertoire__items'),
    groundingCategory = '',
    groundingSubCategory = ''

repertoire.forEach((musicData) => {
    if (groundingCategory !== musicData.category) {
        let category = `<h2 class="repertoire__title repertoire__title_hover">
            ${musicData.category}
            <form action='del_music.php' method='POST'>
                <input type='hidden' name='item' value='${musicData.category}' /> 
                <button type='submit'>&#10006;</button>
            </form>
        </h2>
        <ul data-category="${musicData.category}" class="repertoire__song-list song-list song-list_hide"></ul>`
        $repertoireItems.insertAdjacentHTML('beforeend', category)
    }
    if (groundingSubCategory !== musicData.sub_category) {
        let $category = document.querySelector('.repertoire__items ul:last-child'),
            subCategory = `<li class="song-list__item">
            <span class="song-list__group-name">${musicData.sub_category}</span> 
            <form action='del_music.php' method='POST'>
                <input type='hidden' name='item' value='${musicData.sub_category}' /> 
                <button type='submit'>&#10006;</button>
            </form>
        </li>`
        $category.insertAdjacentHTML('beforeend', subCategory)
    }
    $category = document.querySelector('.repertoire__items ul:last-child')
    item = `<li class="song-list__item">
        <span class="song-list__group-name">${musicData.executor} -</span> ${musicData.music_name} 
        <form action='del_music.php' method='POST'>
            <input type='hidden' name='item' value='${musicData.id}' /> 
            <button type='submit'>&#10006;</button>
        </form>
    </li>`
    $category.insertAdjacentHTML('beforeend', item)

    groundingCategory = musicData.category
    groundingSubCategory = musicData.sub_category
})