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
    //self.addClass('route-card');

    setTimeout(function () {
        //let card = self.clone().addClass('move-card').appendTo('body');

        /*card.css({
            'position': 'absolute',
            'left': box.left+ 'px',
            'top': box.top + 'px',
        }).animate({
            'left' : '50%',
            'top': '50%',
        });*/
    }, 1000);



});

$('.alphabet-cards__back-sound').on('click', function () {
    let sound = $(this).data('sound');
    var audio = new Audio(sound);
    audio.play();
});
