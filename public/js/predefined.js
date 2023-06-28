$(document).ready(function() {
	$('#loader').fadeOut();
});

let swalStack = null;
let swalCount = 0;

function swalToCart(event) {
    event.preventDefault();

    if (swalStack != null) {
        swalStack.close();
    }

    swalCount++;
    const Toast = Swal.mixin({
        timer: 1852,
        toast: true,
        showConfirmButton: false,
        timerProgressBar: true,
        position: `bottom-end`,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer);
            toast.addEventListener('mouseleave', Swal.resumeTimer);
        }
    });

    console.log(swalCount);

    swalStack = Toast.fire({
        icon: 'success',
        title: 'Product added.'
    });
}

function clock() {
    const month = [ "January", "February", "March", "April", "May", "June",
                    "July", "August", "September", "October",
                    "November", "December" ];

    function harold(standIn) {
        if (standIn < 10) {
            standIn = '0' + standIn;
        } return standIn;
    }

    let time = new Date(),
        theDate = harold(time.getDate()) + ' ' + (month[time.getMonth()]) + ' ' + time.getFullYear(), hours = time.getHours(),
        minutes = time.getMinutes(), seconds = time.getSeconds();

    document.querySelector('#clock').innerHTML = theDate + ' ' + harold(hours) + ":" + harold(minutes) + ":" + harold(seconds);
}

const setClock = document.body.querySelector('#clock');
if (setClock) { setInterval(clock, 1000); }

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