function destroy(event, id) {
    event.preventDefault();
    let result = confirm('Вы уверены?');
    if (result) {
        console.log('destroy-form-' + id);
        document.getElementById('destroy-form-' + id).submit();;
    }
}
function getCoords(elem) { // кроме IE8-
    var box = elem.getBoundingClientRect();

    return {
        top: box.top + pageYOffset,
        left: box.left + pageXOffset
    };

}
let audio = null;
function playSound(sound, element) {

    if (!audio) {
        audio = new Audio(sound);
        audio.play();
        element.find('.play').attr('fill', '#FFDB70');

        let interval = setInterval(function () {
            let color = element.find('.play').attr('fill');
            if (color === '#e5e5e5') {
                element.find('.play').attr('fill', '#ffdb70');
            } else {
                element.find('.play').attr('fill', '#e5e5e5');
            }
        }, 150);
        $(audio).on('ended', function () {
            audio = null;
            clearInterval(interval);
            element.find('.play').attr('fill', '#e5e5e5');
        });
    }

}

$( '#media-back-select' ).change(function() {
    let val = $(this).find('option:selected').val();
    $('#media-back-input').attr('name', val);

    let content = $('.media-back-content')
    if (content.length) {
        content.find('div').css('display', 'none');
        content.find('.media-' + val).css('display', 'block');
    }

});


$('.change-language__select').change(function () {
    let val = $(this).find('option:selected').val();
    document.location.href = '/change-language/' + val;
})

$('.alphabet-cards__item').on('click', function () {
    let self = $(this);
    let box = getCoords(this);
    self.addClass('route-card');
    var audio = null;


    let card = self.clone();
    card.removeClass('route-card').addClass('move-card').appendTo('body');

    let top = Math.max(0, (($(window).height() - card.outerHeight()) / 2) +
        $(window).scrollTop()) + "px";
    let left = Math.max(0, (($(window).width() - card.outerWidth()) / 2) +
        $(window).scrollLeft()) + "px";
    let sound = card.find('.alphabet-cards__back-sound').data('sound');


    $('.move-card').on('click', function () {
        playSound(sound, card);
    });

    card.css({
        'position': 'absolute',
        'left': box.left+ 'px',
        'top': box.top + 'px',
    }).animate({
        'left' : left,
        'top': top,
    }, 500, "linear");

    $( '.overlay' ).show();
    setTimeout(function () {
        card.append('<img class="left" src="/public/images/left.png">');
        card.append('<img class="right" src="/public/images/right.png">');

        playSound(sound, card);

        let currentIndex = self.data('index')
        let items = $('.alphabet-cards .alphabet-cards__item');
        let last = items.length - 1;

        $('.left').on('click', function () {
            let newIndex = currentIndex - 1;
            if (newIndex < 0) {
                newIndex = last;
            }
            let newCard = $('[data-index="'+ newIndex +'"]')
            card.remove();
            newCard.click();
        });

        $('.right').on('click', function () {
            let newIndex = currentIndex + 1;
            if (newIndex > last) {
                newIndex = 0;
            }
            let newCard = $('[data-index="'+ newIndex +'"]')
            card.remove();
            newCard.click();
        })

    }, 500)



});
$( '.overlay' ).on('click', function () {
    $(this).hide();
    $('.move-card').remove();
})


