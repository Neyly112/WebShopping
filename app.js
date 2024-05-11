let time = 2000;

function SuccessAction(message) {
    // alert('thanh cong');
    $('div[message-id=successMessage]').removeClass('d-none');
    $('div[message-id=successMessage]').html('<strong>Success!</strong> ' + message).fadeIn(100).fadeOut(time);
    // alert('end');
}

function FailAction(message) {
    $('div[message-id=failMessage]').removeClass('d-none');
    $('div[message-id=failMessage]').html('<strong>Fail!</strong> ' + message).fadeIn(100).fadeOut(time);
}