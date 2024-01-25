<script>
    // Show loader
    function showLoader() {
        $('.overlay-container').removeClass('d-none');
        $('.overlay').addClass('active');

    };

    // Hideloader
    function hideLoader() {
        $('.overlay').removeClass('active');
        $('.overlay-container').addClass('d-none');

    };


    // load product modal
    function loadProductModal($productId) {
        $.ajax({
            url: "{{ route('load-product-modal', ':productId') }}".replace(':productId', $productId),
            method: 'GET', // or 'POST', 'PUT', etc.
            // dataType: 'json', // Change as needed
            beforeSend: function() {
                $('.overlay-container').removeClass('d-none');
                $('.overlay').addClass('active');
            },


            success: function(response) {
                $('.load_popup_body').html(response);
                $('#cartModal').modal('show');
            },

            error: function(xhr, status, error) {
                // Handle errors
                console.error(error);
            },
            complete: function() {
                $('.overlay').removeClass('active');
                $('.overlay-container').addClass('d-none');

            }

        });
    }

    // updating sidebar cart
    function updateSidebarCart(callback = null) {
        $.ajax({
            url: '{{ route('get-cart-products') }}',
            method: 'GET',


            success: function(response) {
                $('.cart_content').html(response);
                let cartTotal = $('#cart_total').val();
                let cartCount = $('#cart_count').val();
                $('.cart_subtotal').text("{{ currencyPosition(':cartTotal') }}".replace(':cartTotal',
                    cartTotal));
                $('.cart_count_nav').text(cartCount);
                if (callback && typeof callback === 'function') {
                    callback();
                }

            },

            error: function(xhr, status, error) {
                // Handle errors
                console.error(error);
            }

        });

    }
    // remove product from cart sidebar
    function removeProductSidebar($rowId) {
        $.ajax({
            method: 'GET',
            url: '{{ route('remove-cart-product', ':rowId') }}'.replace(':rowId', $rowId),
            beforeSend: function() {
                showLoader();
            },

            success: function(response) {
                if (response.status === 'success') {
                    updateSidebarCart(function() {

                        toastr.success(response.message);
                        hideLoader();
                    })
                }
            },


            error: function(xhr, status, error) {
                let errorMsg = xhr.responseJSON.message;
                toastr.error(errorMsg);

            }

        })
    }
</script>
