$(document).ready(function() {
	$('#loader').fadeOut();

    let agent = navigator.userAgent;

    const names = [
        'Austin', 'Caesar',
        'Emily', 'Lucia', 'Eva',
        'Linda', 'Felix', 'Derek',
        'Diego', 'Georgia', 'Percy'
    ];

    let name = document.getElementById('name');
    if (name) {
        Swal.fire({
            icon: 'question',
            title: 'Your name please',
            iconColor: 'rgba(112, 102, 224, 1)',
            backdrop: 'rgba(58, 52, 124, .96)',
            confirmButtonText: 'Submit',
            allowOutsideClick: false,
            allowEscapeKey: false,
            input: 'text',
            inputPlaceholder: names[Math.floor(Math.random() * names.length)],
            inputValidator: (value) => {
                return new Promise((resolve) => {
                    if (value != '') { resolve(); }
                    else { resolve('Do not leave me blank'); }
                });
            }
        }).then((result) => {

            $.ajax({
                url: '/ajax/visitors/store',
                type: 'GET',
                data: {
                    name: result.value,
                    agent: agent
                },
                success: (response) => {
                    // console.log(response);
                }
            });

            Swal.fire({
                icon: 'success',
                title: 'Hi, ' + result.value + '!',
                iconColor: 'rgba(112, 102, 224, 1)',
                backdrop: 'rgba(58, 52, 124, .96)',
                text: 'Thank you for visiting!'
            });
        });
    }
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

function triggerClick(event, element) {
    event.preventDefault();
    $(element).trigger('click');
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
        theDate = harold((month[time.getMonth()]) + ' ' + time.getDate()) + ', ' + time.getFullYear(), hours = time.getHours(),
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

if (document.querySelector('table.fetch')) {
    let fetchTable = $('table.fetch').dataTable({
        language: {
            paginate: {
                previous: '<i class="bi bi-chevron-left"></i>',
                next: '<i class="bi bi-chevron-right"></i>'
            },
            infoFiltered: '',
            lengthMenu: '_MENU_',
            search: "",
            searchPlaceholder: "Search...",
            emptyTable: "No records found"
        }
    });
    $('.dataTables_length select').addClass('input-shadow mb-2');
    $('.dataTables_filter').addClass('mb-2');
    $('.dataTables_info').css({ paddingTop: 0 });
}

if (document.querySelector('table.link')) {
    let dataLink = $('table.link').dataTable({
        language: {
            paginate: {
                previous: '<i class="bi bi-chevron-left"></i>',
                next: '<i class="bi bi-chevron-right"></i>'
            },
            infoFiltered: '',
            lengthMenu: '_MENU_',
            search: "",
            searchPlaceholder: "Search...",
            emptyTable: "No records found"
        },
        order: [[1, 'asc']]
    });
    $('.dataTables_length select').addClass('input-shadow mb-2');
    $('.dataTables_filter').addClass('mb-2');
    $('.dataTables_info').css({ paddingTop: 0 });
}

let modalControl = document.getElementById('modalControl');
if (modalControl) {
    modalControl.addEventListener('show.bs.modal', function (event) {
        let btn = event.relatedTarget;
        let table = btn.getAttribute('data-bs-table');
        let type = btn.getAttribute('data-bs-type');
        let route = btn.getAttribute('href');

        modalControl.querySelector('.modal-title').textContent = table + '—' + type;

        $.ajax({
            url: route,
            async: true,
            type: 'GET',
            beforeSend: () => {
                console.log('Fetching...');
            },
            success: (result) => {
                $('#modalControlPlaceholders').html(result);
            },
            complete: () => {
                    [...document.querySelectorAll('.select2multipleModal')].forEach((item) => {
                        $(item).select2({
                            placeholder: 'Choose',
                            tags: true,
                            cache: true,
                            theme: 'bootstrap-5',
                            width: '100%',
                            dropdownAutoWidth: true,
                            dropdownParent: modalControl,
                            // autoWidth: false,
                            // closeOnSelect: false,
                            debug: true
                        });
                    });
            },
            timeout: 6270
        });
    });
}

$('.btn-delete').click(function(event) {
    event.preventDefault();
    let name = $(this).data('name');
    let form = $(this).data('delete-form');
    form = document.getElementById(form);

    Swal.fire({
        title: name,
        text: "Delete this record?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) { form.submit(); }
    });
});

$(document).on('click', '#saveTrigger', (event) => {
    $('#btnSubmitOnModal').trigger('click');
});
