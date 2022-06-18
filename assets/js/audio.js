//Получаем объекты
//Плеер
function play(audioId) {
    let audioPlayer = document.getElementById(audioId);
    //Время
    let progressBar = document.getElementById(audioId + '__progress-bar');
    let currTime = document.getElementById(audioId + '__curr-time');
    let durationTime = document.getElementById(audioId + '__duration');
    //Кнопки
    let actionButton = document.getElementById(audioId + '__action');

    //Запуск, пауза
    audioAct();

    function audioAct() { //Запускаем или ставим на паузу
        if (audioPlayer.paused) {
            audioPlayer.play();
            // setAttribute - добавляет новый атрибут или изменяет значение существующего атрибута в выбранном элементе
            actionButton.setAttribute('class', 'audio-hud__element audio-hud__action audio-hud__action_play');
        } else {
            audioPlayer.pause();
            actionButton.setAttribute('class', 'audio-hud__element audio-hud__action audio-hud__action_pause');
        }
        if (durationTime.innerHTML.replace(/[^+\d]/g, '') == '0000') {
            // duration свойство возвращает длину медиа в секундах или ноль, если данные по медиа недоступны
            durationTime.innerHTML = audioTime(audioPlayer.duration); // Об этой функции чуть ниже
        }
    }

    // Отображение времени
    audioPlayer.addEventListener('timeupdate', audioProgress);

    function audioProgress() { //Отображаем время воспроизведения
        // currentTime указывает текущее время воспроизведения в секундах
        progress = (Math.floor(audioPlayer.currentTime) / (Math.floor(audioPlayer.duration) / 100));
        progressBar.value = progress;
        currTime.innerHTML = audioTime(audioPlayer.currentTime);
    }

    function audioTime(time) { //Рассчитываем время в секундах и минутах
        time = Math.floor(time);
        let minutes = Math.floor(time / 60);
        let seconds = Math.floor(time - minutes * 60);
        let minutesVal = minutes;
        let secondsVal = seconds;
        if (minutes < 10) {
            minutesVal = '0' + minutes;
        }
        if (seconds < 10) {
            secondsVal = '0' + seconds;
        }
        return minutesVal + ':' + secondsVal;
    }

    //Перемотка
    progressBar.addEventListener('click', audioChangeTime);
    // touchstart Событие срабатывает при возникновении касания к элементу.
    progressBar.addEventListener('touchstart', audioChangeTime);
    // touchend	Событие возникает после разрыва прикосновения к элементу.
    progressBar.addEventListener('touched', audioChangeTime);

    function audioChangeTime(e) { //Перематываем
        let pageX = e.pageX || e.touches[0].pageX;
        // offsetLeft/offsetTop – позиция в пикселях верхнего левого угла относительно offsetParent.
        // offsetParent – ближайший CSS-позиционированный родитель или ближайший td, th, table, body.
        let mouseX = Math.floor(pageX - progressBar.offsetLeft);
        // Свойство HTMLElement.offsetWidth только для чтения возвращает ширину макета элемента в виде целого числа
        let progress = mouseX / (progressBar.offsetWidth / 100);
        audioPlayer.currentTime = audioPlayer.duration * (progress / 100);
    }
}

let players = document.querySelectorAll(".audio-hud__action");
players.forEach((elem) => {
    let audioId = elem.id.split('__')[0];
    determinePlaybackTime(audioId);
    elem.addEventListener("click", (item) => {
        let audioId = item.target.id.split('__')[0];
        play(audioId);
    });
});

function determinePlaybackTime(audioId) {
    let audio = document.getElementById(audioId);
    let durationTime = document.getElementById(audioId + '__duration');
    // Событие onloadeddata запускается после завершения загрузки первого кадра мультимедиа
    audio.onloadeddata = () => {
        let time = Math.floor(audio.duration);
        let minutes = Math.floor(time / 60);
        let seconds = Math.floor(time - minutes * 60);
        durationTime.innerHTML = String(minutes) + ':' + String(seconds);
    }
}