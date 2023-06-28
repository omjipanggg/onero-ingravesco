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
            // const data = {
                // page: title,
                // activeUri: url
            // };
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
                        item.addEventListener('input', function(event) {
                            let value = this.value.replace(/[^0-9]/g, '');
                            this.value = moneyFormat(value);
                            // onkeypress='return /[0-9]/i.test(event.key)'
                            // onkeyup='return /[0-9]/i.test(event.key)'
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

    // LOADER INSTANCE FOR LOADING
    $('#loader').fadeOut();

    // SHOW OR HIDE TOAST INSTANCES
    function showToast(param) {
        let target = document.querySelector('.toast');
        let container = document.querySelector('#toast-container');
        let clonedTarget = target.cloneNode(true);
        clonedTarget.children[1].innerHTML = param;
        container.appendChild(clonedTarget);
        const bsToast = bootstrap.Toast.getOrCreateInstance(clonedTarget);
        bsToast.show();
        setTimeout(() => {
            while (container.childNodes.length > 1) {
                container.removeChild(container.firstChild);
            }
        }, 8420);
    }

    // FILTERING ITEMS USING MIXITUP I GUESS
    document.querySelectorAll('.products .filter-item').forEach((e, i) => {
        e.addEventListener('click', (event) => {
            let elem = [...document.querySelectorAll('.products .filter-item')].filter((el) => {
                e !== el ? el.classList.remove('active') : null;
            });
            event.target.classList.add('active');
        })
    });

    // MIXITUP FUNCTION
    let mixerContainer = document.querySelector('.products .card-container'), mixer;
    if (mixerContainer) {
        mixer = mixitup(mixerContainer, {
            selectors: { target: '.products .mix' },
            animation: { duration: 367 },
        });
    }

    // SCROLL TO HREF WITH HASHTAG FUNCTION
    $('a[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') || location.hostname === this.hostname) {
            let target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
                $('html, body').animate({ scrollTop: target.offset().top - 0 }, 521);
                return false;
            }
        }
    });

    // SAVE CURRENT SALES TO DATABASE
    $('#saveToDatabase').click(() => {
        $('#triggerToDatabase').trigger('click');
    });

    // FETCH TRANSACTION BY SUBMITTED DATE
    function fetchSalesHistory(event) {
        let date = event.currentTarget.value;
        $.ajax({
            type: "GET",
            url: "./config/daily.php",
            data: {
                date: date,
            },
            success: (response) => {
                $('#fetchData').html(response);
            },
        });
    }

    // WHOLE HELL OF BIG CART FUNCTION
    let shoppingCart = (function() {
        cart = [];

        function Item(id, name, price, count) {
            this.id = id;
            this.name = name;
            this.price = price;
            this.count = count;
        }

        function saveCart() {
            localStorage.setItem('cart', JSON.stringify(cart));
        }

        function loadCart() {
            cart = JSON.parse(localStorage.getItem('cart'));
        }

        if (localStorage.getItem('cart') != null) {
            loadCart();
        }

        let obj = {};

        obj.addItemToCart = function(id, name, price, count) {
            for (let item in cart) {
                if (cart[item].id === id) {
                    cart[item].count++;
                    saveCart();
                    return;
                }
            }
            let item = new Item(id, name, Number(price), count);
            cart.push(item);
            saveCart();
        }

        obj.setCountForItem = function(id, count) {
            for (let item in cart) {
                if (cart[item].id === id) {
                    cart[item].count = count;
                    break;
                }
            }
            saveCart();
        }

        obj.removeItemFromCart = function(id) {
            for (let item in cart) {
                if (cart[item].id === id) {
                    cart[item].count--;
                    if (cart[item].count === 0) {
                        cart.splice(item, 1);
                    }
                    break;
                }
            }
            saveCart();
        }

        obj.removeItemAllFromCart = function(id) {
            for (let item in cart) {
                if (cart[item].id === id) {
                    cart.splice(item, 1);
                    break;
                }
            }
            saveCart();
        }

        obj.clearCart = function() {
            cart = [];
            saveCart();
        }

        obj.totalCount = function() {
            let totalCount = 0;
            for (let item in cart) {
                totalCount += cart[item].count;
            }
            return totalCount;
        }

        obj.totalCart = function() {
            let totalCart = 0;
            for (let item in cart) {
                totalCart += cart[item].price * cart[item].count;
            }
            return Number(totalCart.toFixed(2));
        }

        obj.listCart = function() {
            let cartCopy = [];
            for (product in cart) {
                let temp = cart[product];
                itemCopy = {};
                for (index in temp) {
                    itemCopy[index] = temp[index];
                }
                cartCopy.push(itemCopy)
            }
            return cartCopy;
        }
        return obj;
    })();

    // DISPLAY THE CART
    function displayCart() {
        let cartObj = shoppingCart.listCart();
        if (document.querySelector('table#itemList')) {
            $('table#itemList').DataTable().destroy();
            $('table#itemList').dataTable({
                data: cartObj,
                columns: [
                    {
                        data: "id",
                        render: function(data, type, row) {
                            return '<a class="btn-remove-cart" href="#" data-id="'+ row['id'] +'"><i class="bi bi-x-square"></i></a>';
                        }
                    },
                    { data: "name" },
                    {
                        data: "count",
                        render: function(data, type, row) {
                            return '<a class="btn-minus-cart me-3" href="#" data-id="'+ row['id'] +'"><i class="bi bi-dash-square"></i></a>' + data + '<a href="#" class="btn-plus-cart ms-3" data-id="'+ row['id'] +'"><i class="bi bi-plus-square"></i></a>';
                        }
                    },
                    { data: "price" }
                ],
                language: {
                    paginate: {
                        previous: '<i class="bi bi-chevron-left"></i>',
                        next: '<i class="bi bi-chevron-right"></i>'
                    },
                    infoFiltered: '',
                    lengthMenu: '_MENU_',
                    search: "",
                    searchPlaceholder: "Search...",
                    emptyTable: 'Cart is empty'
                },
                info: false,
                searching: false,
                paging: false,
            });
            $('.dataTables_length select').removeClass('form-select-sm');
            $('.dataTables_info').css({ paddingTop: 0 });
        }
        $('.total-cart').html(shoppingCart.totalCart());
        $('.total-count').html(shoppingCart.totalCount());
    }

    $('.item-on-card').click((event) => {
        let id = event.currentTarget.dataset.id;
        let name = event.currentTarget.dataset.name;
        let price = event.currentTarget.dataset.price;
        shoppingCart.addItemToCart(id, name, price, 1);

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

        Toast.fire({
            icon: 'success',
            title: name +  ' added.'
        });

        // setLink();
        displayCart();
    });

    $('.btn-clear-cart').click((event) => {
        Swal.fire({
            title: 'Empty Cart?',
            text: 'Click OK to continue.',
            icon: 'warning',
            showCancelButton: true,
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                shoppingCart.clearCart();
                displayCart();
                Swal.fire('Cleared', 'Cart has been cleared.','success')
                .then((answer) => {
                    console.log('Clearing cart...');
                });
            } // else if (result.dismiss === Swal.DismissReason.cancel) { Swal.fire('Cancelled', 'Data is here.', 'error'); }
        });

        // setLink();
        // displayCart();
    });

    $('.cart-placeholder').on('click', '.btn-minus-cart', (event) => {
        event.preventDefault();
        let id = event.currentTarget.dataset.id;
        shoppingCart.removeItemFromCart(id);
        // setLink();
        displayCart();
    });

    $('.cart-placeholder').on('click', '.btn-plus-cart', (event) => {
        event.preventDefault();
        let id = event.currentTarget.dataset.id;
        shoppingCart.addItemToCart(id, null, null, null);
        // setLink();
        displayCart();
    });

    $('.cart-placeholder').on('change', '.item-count', (event) => {
        let id = event.currentTarget.dataset.id;
        let count = Number(event.target.value);
        shoppingCart.setCountForItem(id, count);
        // setLink();
        displayCart();
    });

    $('.cart-placeholder').on('click', '.btn-remove-cart', (event) => {
        event.preventDefault();
        let id = event.currentTarget.dataset.id;
        shoppingCart.removeItemAllFromCart(id);
        // setLink();
        displayCart();
    });

    function setLink() {
        let jason = {};
        let thisDate = new Date();
        jason.id = new Date(thisDate.getFullYear(), (thisDate.getMonth()-1), thisDate.getDate()).getTime();
        jason.user = document.querySelector('.btn-print').getAttribute('data-user');
        jason.item = JSON.parse(localStorage.getItem('cart'));
        jason.datetime = (new Date(Date.now() - (new Date()).getTimezoneOffset() * 60000)).toISOString().slice(0, 19).replace('T', ' ');
        jason.count = shoppingCart.totalCount();
        jason.subtotal = shoppingCart.totalCart();

        let header = "data:text/json;charset:utf-8," + encodeURIComponent(JSON.stringify(jason));
        let anchor = document.querySelector('#saveToLocal');
        anchor.setAttribute('href', header);
        anchor.setAttribute('download', "data.json");

        let context = document.querySelector('#context');
        context.value = JSON.stringify(jason);
    }

    const checkout = document.querySelector('#checkout');
    if (checkout) {
        // setLink();
    }

    // IDK WHY DID THIS LINE IS HERE
    displayCart();
});
</script>