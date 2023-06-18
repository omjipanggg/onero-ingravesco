$(document).ready(function() {

});

function showChar(event) {
    [...document.body.querySelectorAll('.password')].map((item) => {
        item.type = event.target.checked ? 'text' : 'password';
        if (event.target.checked) {
		    event.target.nextElementSibling.children[0].classList.replace('bi-eye', 'bi-eye-slash');
        } else {
        	event.target.nextElementSibling.children[0].classList.replace('bi-eye-slash', 'bi-eye');
        }
    });
}