import 'bootstrap'
window.$ = window.jQuery = require('jquery');
$(function() {
    let container = $('body').find('#trans');
    container.length && updateTransactions($(container).attr('data'));
});
function updateTransactions(interval = 5000) 
{   
    setInterval(()=> {
        $.ajax({
            url: '/refresh',
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'html',
            crossDomain: false,
            async: false,
            cache: false,
            processData: false,
            contentType: false,
            success: function (respond) {
                $('body').find('#trans').html(respond)
            },
            error: function () {
                console.log('Error');
            },
        });
    }, interval);
}

