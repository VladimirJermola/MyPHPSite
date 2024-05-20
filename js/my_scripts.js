$(document).ready(function() {
    setTimeout(function() {
        $('.alert').fadeOut('slow');
    }, 5000);
});

function clearField() {
    document.getElementById('phrase').value = "";
}