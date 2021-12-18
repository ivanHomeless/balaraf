function destroy(event, id) {
    event.preventDefault();
    let result = confirm('Вы уверены?');
    if (result) {
        console.log('destroy-form-' + id);
        document.getElementById('destroy-form-' + id).submit();;
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


