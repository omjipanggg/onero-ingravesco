<script>
document.addEventListener("DOMContentLoaded", function(handler) {
    const showNavbar = (toggleId, navId, bodyId, headerId) => {
        const toggle = document.getElementById(toggleId),
                 nav = document.getElementById(navId),
                body = document.getElementById(bodyId),
              header = document.getElementById(headerId);

        if (toggle && nav && body && header) {
            toggle.addEventListener('click', () => {
                   nav.classList.toggle('show-pd');
                  body.classList.toggle('body-pd');
                header.classList.toggle('body-pd');
                toggle.classList.toggle('is-active');
            });
        }
    }

    showNavbar('header-toggle','nav-bar','body-pd','header');

    if (localStorage.getItem('data') != null) {
        const data = JSON.parse(localStorage.getItem('data'));
    }

    const linkColor = document.querySelectorAll('.nav_link');

    function colorLink() {
        if (linkColor) {
            linkColor.forEach((item) => {
                item.classList.remove('active');
            });
            this.classList.add('active');
        }
    }

    linkColor.forEach((item) => {
        item.addEventListener('click', colorLink);
        item.addEventListener('click', function(event) {
            // event.preventDefault();
            let title = this.dataset.title;
            let url = this.getAttribute('href');
            $('#loader').fadeIn();
            // $.ajax({
            //     url: url,
            //     beforeSend: () => {
            //         $('#loader').fadeIn();
            //     },
            //     success: (response) => {
            //         document.title = title;
            //         $('#content-placeholder .data').html(response);
            //     },
            //     complete: (result) => {
            //         $('#loader').fadeOut();
            //         [...document.querySelectorAll('table.fetch')].map((item) => {
            //             $(item).dataTable({
            //                 language: {
            //                     paginate: {
            //                         previous: '<i class="bi bi-chevron-left"></i>',
            //                         next: '<i class="bi bi-chevron-right"></i>'
            //                     },
            //                     infoFiltered: '',
            //                     emptyTable: "No records found"
            //                 }
            //             });
            //         });
            //     }
            // });
            const data = {
                page: title,
                activeUri: url
            };
            console.log(data);
            // localStorage.setItem('data', JSON.stringify(data));
        });
    });

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
            theDate = harold(time.getDate()) + ' ' + (month[time.getMonth()]) + ' ' + time.getFullYear(),
            hours = time.getHours(),
            minutes = time.getMinutes(),
            seconds = time.getSeconds();

        document.querySelector('#clock').innerHTML = theDate + ' ' + harold(hours) + ":" + harold(minutes) + ":" + harold(seconds);
    }

    const setClock = document.querySelector('#clock');
    if (setClock) {
        setInterval(clock, 1000);
    }

    [...document.querySelectorAll('table.fetch')].map((item) => {
        let objDataTable = $(item).dataTable({
            language: {
                paginate: {
                    previous: '<i class="bi bi-chevron-left"></i>',
                    next: '<i class="bi bi-chevron-right"></i>'
                },
                // infoFiltered: '',
                lengthMenu: '_MENU_',
                search: "",
                searchPlaceholder: "Search...",
                emptyTable: "No records found"
            }
        });
        $('.dataTables_length select').removeClass('form-select-sm');
        $('.dataTables_info').css({ paddingTop: 0 });
    });

    [...document.querySelectorAll('.nav_link')].map((item) => {
        if (window.location.href === item.href) {
            item.classList.add('active');
        } else {
            item.classList.remove('active');
        }
    });

    let modalPreview = document.getElementById('modalPreview');
    if (modalPreview) {
        modalPreview.addEventListener('show.bs.modal', function (event) {
            let btn = event.relatedTarget;

            let route = btn.getAttribute('data-bs-route');
            let table = btn.getAttribute('data-bs-table');
            let filename = btn.getAttribute('data-bs-name');

            modalPreview.querySelector('#modalPreviewLabel').textContent = table;
            modalPreview.querySelector('#modalPreviewFooter').textContent = '../storage/images/' + filename;

            $.ajax({
                url: route,
                async: true,
                type: 'GET',
                beforeSend: () => {
                    $('#loader').fadeIn();
                    console.log('Fetching images...');
                },
                success: (response) => {
                    $('#modalPreviewPlaceholders').html(response);
                },
                complete: () => {
                    $('#loader').fadeOut();
                }
            })
        });
    }

    $('.img-preview').on('click', function(event) {
        event.preventDefault();
        let route = $(this).data('route');

        $.ajax({
            url: route,
            method: 'GET',
            success: (response) => {
                if (response.code == 200) {
                    Swal.fire({
                        customClass: {
                            image: 'img-fluid'
                        },
                        imageAlt: 'Image',
                        imageUrl: response.url,
                        imageWidth: 375,
                        showCloseButton: false,
                        showCancelButton: true,
                        cancelButtonText: 'Close',
                        showConfirmButton: false
                    });
                } else {
                    Swal.fire({
                        customClass: {
                            image: 'img-fluid'
                        },
                        imageAlt: 'Image',
                        imageUrl: '{{ asset('img/default.png') }}',
                        imageWidth: 375,
                        showCloseButton: false,
                        showCancelButton: true,
                        cancelButtonText: 'Close',
                        showConfirmButton: false
                    });
                }
            }
        })
    });

    let modalControl = document.getElementById('modalControl');
    if (modalControl) {
        modalControl.addEventListener('show.bs.modal', function (event) {
            let btn = event.relatedTarget;

            let route = btn.getAttribute('data-bs-route');
            let table = btn.getAttribute('data-bs-table');
            let type = btn.getAttribute('data-bs-type');

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
                    // $("input[type=date]").flatpickr({
                    //     dateFormat: 'Y-m-d',
                    //     altInput: true,
                    //     altFormat: 'd F Y',
                    //     locale: 'id'
                    // });

                    // $(".form-control[readonly].input").css({
                    //     backgroundColor: '#FFF',
                    //     cursor: 'pointer'
                    // });
                    const baseLabel = document.querySelectorAll('.base-for-label');

                    if (baseLabel) {
                        baseLabel.forEach((item) => {
                            item.querySelector('input').addEventListener('focus', (event) => {
                                item.classList.add('focused');
                            });
                            item.querySelector('input').addEventListener('blur', (event) => {
                                if (event.target.value == '') {
                                    item.classList.remove('focused');
                                }
                            });
                        });
                    }

                    [...document.querySelectorAll('.numeric')].forEach((item) => {
                        item.addEventListener('input', function() {
                            let value = this.value.replace(/[^0-9]/g, '');
                            this.value = moneyFormat(value);
                        });
                    });

                    let fileInput = document.getElementById('fileInputModal');
                    let fileNameElement = document.getElementById('fileNameModal');

                    fileInput.addEventListener('change', function() {
                        let fileNameString = null;

                        if (this.files[0] != undefined) { fileNameString = this.files[0].name; }
                        else { fileNameString = 'No file chosen'; }

                        if (this.files && this.files[0]) {
                            let reader = new FileReader();
                            reader.onload = function(read) {
                                document.querySelector('#imgOnModal').setAttribute('src', read.currentTarget.result);
                            }
                            reader.readAsDataURL(this.files[0]);
                        }
                        fileNameElement.textContent = fileNameString;
                    });


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

    function moneyFormat(number) {
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    }

    $(document).on('click', '#saveTrigger', (event) => {
        // $('#loader').fadeIn();
        $('#btnSubmitOnModal').trigger('click');
    });

    function checkTableWidth() {
        let container = document.querySelector('.table-responsive');
        [...document.querySelectorAll('.table')].map((item) => {
            if (item.clientWidth <= container.clientWidth) {
                container.classList.add('hide-scroll');
            } else {
                container.classList.remove('hide-scroll');
            }

        });
    }

    $('.btn-delete').click(function(event) {
        event.preventDefault();
        let id = $(this).data('id');
        let name = $(this).data('name');
        let href = $(this).attr('href');

        // const swalWithBootstrapButtons = Swal.mixin({
            // customClass: {
            //     confirmButton: 'btn btn-success',
            //     cancelButton: 'btn btn-danger'
            // },
            // buttonsStyling: false
        // });

        Swal.fire({
            title: name,
            text: "Are you sure to delete this record?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, I am',
            cancelButtonText: 'No, I changed my mind',
            reverseButtons: true,
            preConfirm: (confirm) => {
                return new Promise((resolve) => {
                    $.ajax({
                        url: href,
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            '_method': 'DELETE',
                            '_token': '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.success) {
                                resolve();
                            } else {
                                Swal.showValidationMessage('An error occurred.');
                            }
                        },
                        error: function(xhr, status, error) {
                            Swal.showValidationMessage('An error occurred.');
                        }
                    });
                });
            }
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Deleted',
                    'Data deleted successfully.',
                    'success'
                ).then((answer) => {
                    window.location.reload();
                });
            } // else if (result.dismiss === Swal.DismissReason.cancel) { Swal.fire('Cancelled', 'Data is here.', 'error'); }
        });
    });

    $('#loader').fadeOut();

});
</script>