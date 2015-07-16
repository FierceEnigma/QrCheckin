
$('.qrcode-type-select').change(function(){

    $('.qrcode-selected-input').children('input').remove();

    var option = $(this).find('option:selected').val();
    var $new_input = '';

    switch(option) {

        case 'text': $new_input = '<input class="form-control" name="content" type="text" value="" id="text" placeholder="text">';
            break;
        case 'url':  $new_input = '<input class="form-control" name="content" type="url" value="" id="url" placeholder="http://www.example.com">';
            break;
    }

    $('.qrcode-selected-input').append($new_input);
});