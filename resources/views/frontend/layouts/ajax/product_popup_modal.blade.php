<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fal fa-times"></i></button>
<form action="" id="modal_add_to_cart_form">
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <div class="fp__cart_popup_img">
        <img src="{{ asset($product->thumbnail_img) }}" alt="{{ $product->name }}" class="img-fluid w-100">
    </div>
    <div class="fp__cart_popup_text">
        <a href="{{ route('product.show', $product->slug) }}" class="title">{{ $product->name }}</a>
        <p class="rating">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <i class="far fa-star"></i>
            <span>(201)</span>
        </p>
        <h4 class="price">
            @if ($product->offer_price > 0)
                <input type="hidden" name="net_price" value="{{ $product->offer_price }}">
                {{ currencyPosition($product->offer_price) }}
                <del>{{ currencyPosition($product->price) }}</del>
            @else
                <input type="hidden" name="net_price" value="{{ $product->price }}">

                {{ currencyPosition($product->price) }}
            @endif
        </h4>

        <div class="details_size">

            @if ($product->productSizes()->exists())
                <div class="details_size">
                    <h5>select size</h5>
                    <div class="form-check">
                        @foreach ($product->productSizes as $productSize)
                            <input class="form-check-input" type="radio" name="product_size"
                                data-price="{{ $productSize->price }}" id="size-{{ $productSize->id }}"
                                value="{{ $productSize->id }}">
                            <label class="form-check-label" for="size-{{ $productSize->id }}">
                                {{ $productSize->name }} <span>+ {{ currencyPosition($productSize->price) }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
            @endif

            @if ($product->productOptions()->exists())
                <div class="details_extra_item">
                    <h5>select option <span>(optional)</span></h5>
                    @foreach ($product->productOptions as $productOption)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{ $productOption->id }}"
                                name="product_option[]" data-price="{{ $productOption->price }}"
                                id="option-{{ $productOption->id }}" value="{{ $productOption->id }}">
                            <label class="form-check-label" for="option-{{ $productOption->id }}">
                                {{ $productOption->name }} <span>+
                                    {{ currencyPosition($productOption->price) }}</span>
                            </label>
                        </div>
                    @endforeach

                </div>
            @endif

            <div class="details_quentity">
                <h5>select quantity</h5>
                <div class="quentity_btn_area d-flex flex-wrapa align-items-center">
                    <div class="quentity_btn">
                        <button class="btn btn-danger decrease"><i class="fal fa-minus"></i></button>
                        <input type="text" placeholder="1" value="1" readonly id="quantity" name="quantity">
                        <button class="btn btn-success increase"><i class="fal fa-plus"></i></button>
                    </div>
                    @if ($product->offer_price > 0)
                        <h3 id="total_price">{{ currencyPosition($product->offer_price) }}</h3>
                    @else
                        <h3 id="total_price">{{ currencyPosition($product->price) }}</h3>
                    @endif
                </div>
            </div>
            <ul class="details_button_area d-flex flex-wrap">
                <li><button type="submit" class="common_btn modal_cart_btn">add to cart</button></li>
            </ul>
        </div>
</form>


<script>
    $(document).ready(function() {
        $('input[name="product_size"]').on('change', function() {
            updateTotalPrice();
        })
        $('input[name="product_option[]"]').on('change', function() {
            updateTotalPrice();
        })
        $('.increase').on('click', function(e) {
            e.preventDefault();

            let quantity = $('#quantity');
            let currentQty = parseFloat(quantity.val());
            quantity.val(currentQty + 1);
            updateTotalPrice()
        })

        $('.decrease').on('click', function(e) {
            e.preventDefault();

            let quantity = $('#quantity');
            let currentQty = parseFloat(quantity.val());
            if (currentQty > 1) {

                quantity.val(currentQty - 1);
            }
            updateTotalPrice()
        })



        function updateTotalPrice() {
            let netPrice = parseFloat($('input[name="net_price"]').val());
            let selectedSizePrice = 0;
            let selectedOptionsPrice = 0;
            let Qyt = parseFloat($('#quantity').val());

            // select size price
            let selectedSize = $('input[name="product_size"]:checked')
            if (selectedSize.length > 0) {
                selectedSizePrice = parseFloat(selectedSize.data("price"));
            }
            // select options price

            let selectedOptions = $('input[name="product_option[]"]:checked')
            $(selectedOptions).each(function() {
                selectedOptionsPrice += parseFloat($(this).data('price'))

            })
            // total price

            let totalPrice = (netPrice + selectedSizePrice + selectedOptionsPrice) * Qyt;
            $('#total_price').text("{{ config('settings.currency_icon') }}" + totalPrice)
        }
        // Add to cart

        $('#modal_add_to_cart_form').on('submit', function(e) {
            e.preventDefault();

            let selectedSize = $("input[name='product_size']");

            if (selectedSize.length > 0) {
                if ($("input[name='product_size']:checked").val() === undefined) {

                    toastr.error('Please select a size.');
                    console.log('Please select a size.');
                    return;
                }
            }



            let formData = $(this).serialize();
            $.ajax({
                url: "{{ route('add-to-cart') }}",
                type: 'POST',
                data: formData,
                beforeSend: function() {
                    $('.modal_cart_btn').attr('disabled', true),
                        $('.modal_cart_btn').html(
                            '<span class="spinner-border spinner-border-sm text-light" role="status" aria-hidden="true"></span> Adding...'
                        )
                },


                success: function(data) {
                    updateSidebarCart();
                    toastr.success(data.message);
                },

                error: function(xhr, status, error) {
                    let errorMsg = xhr.responseJSON.message;
                    toastr.error(errorMsg);

                },
                complete: function() {
                    $('.modal_cart_btn').html('Add to Cart');
                    $('.modal_cart_btn').attr('disabled', false);

                }
            });

        })





    });
</script>
