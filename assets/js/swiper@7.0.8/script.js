// Инициализируем Swiper
// внутри скобок пишем объект который станет слайдером
new Swiper('.image-slider', {
    // Стрелки 
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev'
    },
    // Навигация
    // Буллеты текущее положение, прогрессбар
    pagination: {
        el: '.swiper-pagination',
        // // Буллеты
        // clickable: true,
        // // Динамические буллеты
        // dynamicBullets: true,
        // // Кастомные буллеты
        // renderBullet: function (index, className) {
        //     return '<span class="' + className + '">' + (index + 1) + '</span>';
        // },
        // Фракция - это пагинация в виде дроби текущий/всего эелементов
        type: 'fraction',
        // Кастомный вывод фракции
        renderFraction: function (currentClass, totalClass) {
            return 'Фото <span class="' + currentClass + '"></span>' +
                ' из ' +
                '<span class="' + totalClass + '"></span>';
        },
        // // Прогрессбар
        // type: 'progressbar',
    },
    // Скролл
    scrollbar: {
        el: '.swiper-scrollbar',
        // Возможность перетаскивать скролл
        draggable: true,
    },

    // Включение/отключение
    // перетаскивания на ПК
    simulateTouch: true,
    // Чувствительность свайпа
    touchRatio: 1,
    // Угол срабатывания свайпа/перетаскивания
    touchAngle: 45,
    // Курсор претаскивания
    grabCursor: true,

    // Переключение при клике на слайд
    slideToClickedSlide: false,

    // Навигация по хешу
    hashNavigation: {
        // Отслеживать состояние
        watchState: true,
    },

    // Управление клавиатурой
    keyboard: {
        // Включить \ выключить
        enabled: true,
        // Включить \ выключить
        // только когда слайдер
        // в пределах вьюпорта
        onlyInViewport: true,
        // Включить \ выключить
        // управление клавишами
        // pageUp, pageDown
        pageUpDown: true,
    },

    // Управление колесом мыши
    mousewheel: {
        // Чувствительность колеса мыши
        sensitivity: 1,
        // Класс объекта на котором
        // будет срабатывать прокрутка мышью.
        // eventsTarget: ".image-slider"
    },

    // Автовысота
    autoHeight: false,

    // Количество слайдов для показа. Можно вводить не целые числа
    // slidesPerView: 'auto', // не будет работать если slidesPerColumn > 1
    slidesPerView: 3,

    // Отключение функционала
    // если слайдов меньше чем нужно
    watchOverflow: true,

    // Отступ между слайдами
    spaceBetween: 70,

    // Количество пролистываемых слайдов
    slidesPerGroup: 1,

    // Активный слайд по центру
    centeredSlides: false,

    // Стартовый слайд
    initialSlide: 0,

    // Бесконечный слайдер. slidesPerColumn не должна быть больше 1
    loop: false,

    // Кол-во дублирующих слайдов
    // Для корректной работы
    loopedSlides: 0,

    // Свободный режим. Перетаскивается как лента, т.е. без фиксации
    freeMode: true,

    // Автопрокрутка
    // autoplay: {
    //     // Пауза между прокруткой
    //     delay: 1000,
    //     // Закончить на последнем слайде
    //     stopOnLastSlide: true,
    //     // Отключить после ручного преключения
    //     disableOnInteraction: false
    // },

    // Скорость. По умолчанию 300
    speed: 800,

    // Вертикальный слайдер. По умолчинию horizontal
    direction: 'horizontal',

    // // Эффекты переключения слайдов. По умолчнию slide
    // // Листание
    // effect: 'slide',

    // // Эффекты переключения слайдов.
    // // Смена прозрачности
    // effect: 'fade',

    // // Дополнение к fade
    // fadeEffect: {
    //     // Параллельная
    //     // смена прозрачности
    //     crossFade: true
    // },

    // // Эффекты переключения слайдов.
    // // Переворот
    // effect: 'flip',

    // // Дополнение к flip
    // flipEffect: {
    //     // Тень
    //     slideShadows: true,
    //     // Показ только аквиного слайда
    //     limitRotation: true
    // },

    // // Эффекты переключения слайдов.
    // // Куб
    // effect: 'cube',

    // // Дополнение к cube
    // cubeEffect: {
    //     // Настройки тени
    //     slideShadows: true,
    //     shadow: true,
    //     shadowOffset: 20,
    //     shadowScale: 0.94
    // },

    // Эффекты переключения слайдов.
    // Эффект потока
    effect: 'coverflow',

    // Дополнение к fade
    coverflowEffect: {
        // Угол
        rotate: 20,
        // Наклон
        stretch: -150,
        // Тень
        slideShadows: false,
    },

    // Брейк поинты (адаптив)
    // Ширина экрана
    breakpoints: {
        320: {
            slidesPerView: 1,
        },
        700: {
            slidesPerView: 2,
        },
        992: {
            slidesPerView: 3,
        }
    },

    // // Брейк поинты (адаптив)
    // // Соотношение сторон
    // breakpoints: {
    //     '@0.75': {
    //         slidesPerView: 1,
    //     },
    //     '@1.00': {
    //         slidesPerView: 2,
    //     },
    //     '@1.50': {
    //         slidesPerView: 3,
    //     }
    // },

    // Отключить предзагрузку картинок
    preloadImages: false,
    // Lazy Loading
    // (подгрузка картинок)
    lazy: {
        // Подгружать на смарте
        // перекдючения слайда
        loadOnTransitionStart: false,
        // Подгрузить предыдущую
        // и следующую картинку
        loadPrevNext: false,
    },
    // Лучше ставить когда slidesPerView = auto либо больше 1
    // Слежка за видимыми слайдами
    watchSlidesProgress: true,
    // Добавление класса видимым слайдом
    watchSlidesVisibility: true,

    // Зум картинки
    zoom: {
        // Максимальное увелечение
        maxRatio: 5,
        // Минимальное увеличение
        minRatio: 1,
    },

    // Виртуальные слайды
    // формирование слайдера
    virtual: {
        slides: (function () {
            let slide = [],
                arr_images = document.querySelector('div.hidden'),
                images = JSON.parse(arr_images.dataset.array);
            for (key in images) {
                slide.push(`
                    <div data-hash="slide-${images[key]}" class="image-slider__slide swiper-slide">
                        <div class="image-slider__image swiper-zoom-container">
                            <img data-src="./img/gallery/${images[key]}" src="img/1x1.png" class="swiper-lazy" alt="Картинка">
                            <div class="swiper-lazy-preloader"></div>
                        </div>
                    </div>`);
            }
            return slide;
        }()),
    },

    centeredSlides: true,
});