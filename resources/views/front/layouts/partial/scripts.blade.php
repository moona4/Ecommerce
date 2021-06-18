<script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="{{ asset('public/front/vendor/jquery/jquery.min.js') }}" type="90c9d0bf828865ab6a11ba80-text/javascript">
</script>
<script src="{{ asset('public/front/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"
    type="90c9d0bf828865ab6a11ba80-text/javascript"></script>

<script src="{{ asset('public/front/vendor/select2/js/select2.min.js') }}"
    type="90c9d0bf828865ab6a11ba80-text/javascript"></script>

<script src="{{ asset('public/front/vendor/owl-carousel/owl.carousel.js') }}"
    type="90c9d0bf828865ab6a11ba80-text/javascript"></script>

<script src="{{ asset('public/front/js/custom.js') }}" type="90c9d0bf828865ab6a11ba80-text/javascript"></script>
<script src="{{ asset('public/front/js/hc-offcanvas-nav.js?ver=4.1.1') }}"
    type="90c9d0bf828865ab6a11ba80-text/javascript"></script>
<link rel="stylesheet" href="{{ asset('public/front/js/demo.css?ver=3.4.0') }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script type="90c9d0bf828865ab6a11ba80-text/javascript">
    (function($) {
        var $main_nav = $('#main-nav');
        var $toggle = $('.toggle');

        var defaultOptions = {
            disableAt: false,
            customToggle: $toggle,
            levelSpacing: 40,
            navTitle: 'All Categories',
            levelTitles: true,
            levelTitleAsBack: true,
            pushContent: '#container',
            insertClose: 2
        };

        // call our plugin
        var Nav = $main_nav.hcOffcanvasNav(defaultOptions);

        // add new items to original nav
        $main_nav.find('li.add').children('a').on('click', function() {
            var $this = $(this);
            var $li = $this.parent();
            var items = eval('(' + $this.attr('data-add') + ')');

            $li.before('<li class="new"><a href="#">' + items[0] + '</a></li>');

            items.shift();

            if (!items.length) {
                $li.remove();
            } else {
                $this.attr('data-add', JSON.stringify(items));
            }

            Nav.update(true);
        });

        // demo settings update

        const update = (settings) => {
            if (Nav.isOpen()) {
                Nav.on('close.once', function() {
                    Nav.update(settings);
                    Nav.open();
                });

                Nav.close();
            } else {
                Nav.update(settings);
            }
        };

        $('.actions').find('a').on('click', function(e) {
            e.preventDefault();

            var $this = $(this).addClass('active');
            var $siblings = $this.parent().siblings().children('a').removeClass('active');
            var settings = eval('(' + $this.data('demo') + ')');

            update(settings);
        });

        $('.actions').find('input').on('change', function() {
            var $this = $(this);
            var settings = eval('(' + $this.data('demo') + ')');

            if ($this.is(':checked')) {
                update(settings);
            } else {
                var removeData = {};
                $.each(settings, function(index, value) {
                    removeData[index] = false;
                });

                update(removeData);
            }
        });
    })(jQuery);

</script>
<script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js"
    data-cf-settings="90c9d0bf828865ab6a11ba80-|49" defer=""></script>

<!-- sweetalert CDN for item in cart-->
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
<script>
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

</script>
<script>
    const base_url = `{{ url('/') }}`;
    let cartItems = [];
    var countCartItems = 0;
    var deliveryCharge = '0.00';
    var discount = '0.00';
    var grossAmount = '0.00';
    var netAmount = '0.00';


    var toastMixin = Swal.mixin({
        toast: true,
        icon: 'success',
        title: 'General Title',
        animation: false,
        position: 'top-right',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });

    function getCartItems() {
        cartItems = localStorage.getItem('cartItems') ? JSON.parse(localStorage.getItem('cartItems')) : [];
    }

    function fetchCartItems() {
        $('.fetchCartItems').html('');
        if (cartItems.length == 0) {
            $('.fetchCartItems').html(`
                        <h4 style="margin-left:150px;">Empty</h4>
                        `)
        } else {
            $.each(cartItems, function(index, value) {
                $('.fetchCartItems').prepend(`
                <div class="cart-list-product">
                    <a class="float-right remove-cart" data-id="${value.id}" href="#"><i class="mdi mdi-close"></i></a>
                    <img class="img-fluid" src="${base_url}/public/${value.image}" alt="">
                    <h5 style="margin-bottom: 10px;"><a href="#">${value.name}</a></h5>
                    <span class="decrement-btn" data-id="${value.id}" style=" background: #CC471B; padding: 5px 8px; border-radius: 20px; color: #fff; cursor: pointer"><i class="fa fa-minus"></i></span>
                            <span style="padding: 0 10px">${value.quantity}</span>
                    <span class="increment-btn" data-id="${value.id}" style="background: #CC471B; padding: 5px 8px; border-radius: 20px; color: #fff; cursor: pointer"><i class="fa fa-plus"></i></span>
                    <p class="offer-price mb-0 pull-right" style="margin-top:10px;">Rs. ${value.price * value.quantity}</p>
             
                </div>`);
            });
        }

    }

    $(function() {
        getCartItems();
        countTotalCartItems();
        fetchCartItems();
        sumCartItems();

        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: `{{ url('medias') }}`,
            success: function(data) {
                $.each(data, function(index, value) {
                    $('#medias').append(`
                            <a class="btn-${value.type}" href="${value.link}"><i
                            class="mdi mdi-${value.type}"></i></a>
                     `)
                });
            }
        });


        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: `{{ url('payments') }}`,
            success: function(data) {
                $.each(data, function(index, value) {
                    $('#payment').append(`
              <img alt="${value.type}" src="public/${value.image}" height="50px" width="50px"> 
              `)
                });
            }

        });

        $('.addToCart').click(function() {
            let id = $(this).data('id');

            if (isItemInCart(id)) {
                increaseCartItem(id)

            } else {
                let item = {
                    id: id,
                    store_id: $(this).data('storeid'),
                    name: $(this).data('itemname'),
                    price: $(this).data('itemprice'),
                    image: $(this).data('itemimage'),
                    quantity: 1

                }
                cartItems.push(item);
                storeCartItems(cartItems);
                showToast();
            }
        });

        $(document).on('click', '.remove-cart', function() {
            let id = $(this).data('id');
            removeCartItem(id);

        });

    });

    function isItemInCart(id) {
        return !!cartItems.find(item => item.id === id);
    }

    function storeCartItems(newCartItems) {
        localStorage.setItem(
            "cartItems",
            JSON.stringify(newCartItems.length > 0 ? newCartItems : []));
        getCartItems();
        countTotalCartItems();
        sumCartItems();
        fetchCartItems();
    }

    function increaseCartItem(id) {
        cartItems[cartItems.findIndex(item => item.id === id)].quantity++;
        storeCartItems(cartItems);
    }

    function decreaseCartItem(id) {
        let quantity = cartItems[cartItems.findIndex(item => item.id === id)].quantity;
        if (quantity <= 1)
            return false;
        cartItems[cartItems.findIndex(item => item.id === id)].quantity--;
        storeCartItems(cartItems);
    }

    function removeCartItem(id) {
        let newCartItems = cartItems.filter(item => item.id !== id);
        storeCartItems(newCartItems);
        removeItem();
    }

    function countTotalCartItems() {
        countCartItems = cartItems.length;
        $('#countCartItems').text(`(${countCartItems} items)`);
        $('#countCartValue').text(countCartItems);
    }

    function sumCartItems() {
        grossAmount = cartItems.reduce((total, item) => total + item.price * item.quantity, 0).toFixed(2);
        $('.grossAmount').text(`Rs. ${grossAmount}`);
        netAmount = (parseFloat(deliveryCharge) + parseFloat(grossAmount) - parseFloat(discount)).toFixed(2);
        $('#deliveryCharge').text(`Rs. ${deliveryCharge}`);
        $('.discount').text(`Rs.${discount}`);
        $('.netAmount').text(`Rs. ${netAmount}`);
        $('#checkoutNetAmount').text(`Rs. ${netAmount}`);
        $(".discont").val(`Rs.${discount}`);
        $(".grossAmt").val(`Rs.${grossAmount}`);
        $(".netAmt").val(`Rs.${netAmount}`);

    }

    $(document).ready(function() {

        // $('.increment-btn').click(function () {
        $(document).on('click', '.increment-btn', function() {
            let itemId = $(this).data('id')
            increaseCartItem(itemId);



        });

        $(document).on('click', '.decrement-btn', function() {
            let itemId = $(this).data('id')
            decreaseCartItem(itemId);
        });
    });

</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="sweetalert2/dist/sweetalert2.all.min.js"></script>
<script>
    function showToast() {
        toastMixin.fire({
            animation: true,
            title: 'Item added to cart',
        });
    }

    function removeItem() {
        toastMixin.fire({
            title: 'Item removed from cart',
            icon: 'error'
        });
    }

</script>
