let inputs = document.querySelectorAll('.form__file')
Array.prototype.forEach.call(inputs, function (input) {
    let label = input.nextElementSibling,
        labelVal = label.querySelector('.form__file-button-text').innerText

    input.addEventListener('change', function () {
        let countFiles = ''
        if (this.files && this.files.length >= 1)
            countFiles = this.files.length

        if (countFiles)
            label.querySelector('.form__file-button-text').innerText = 'Выбрано файлов: ' + countFiles
        else
            label.querySelector('.form__file-button-text').innerText = labelVal
    })
})