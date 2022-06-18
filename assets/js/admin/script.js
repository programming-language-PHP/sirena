let inputs = document.querySelectorAll('.form__file')
inputs.forEach((input) => {
    // nextElementSibling - берёт соседний элемент, который стоит после (в данном случае label)
    let label = input.nextElementSibling,
        labelVal = label.querySelector('.form__file-button-text').innerText
    // Событие change срабатывает по окончании изменения элемента.
    input.addEventListener('change', function () {
        let countFiles = ''
        if (this.files && this.files.length >= 1) {
            countFiles = this.files.length
        }
        if (countFiles) {
            label.querySelector('.form__file-button-text').innerText = 'Выбрано файлов: ' + countFiles
            document.getElementById('count_files').value = countFiles
        } else {
            label.querySelector('.form__file-button-text').innerText = labelVal
        }
    })
})