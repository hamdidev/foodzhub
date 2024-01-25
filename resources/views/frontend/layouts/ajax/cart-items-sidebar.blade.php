<input type="hidden" value="{{ cartTotal() }}" id="cart_total">
<input type="hidden" value="{{ count(Cart::content()) }}" id="cart_count">
@foreach (Cart::content() as $cartData)
    <li>
        <div class="menu_cart_img">
            <img src="{{ asset($cartData->options->product_info['image']) }}" alt="menu" class="img-fluid w-100">
        </div>
        <div class="menu_cart_text">
            <a class="title"
                href="{{ route('product.show', $cartData->options->product_info['slug']) }}">{!! $cartData->name !!}</a>
            <p class="size">{{ @$cartData->options->product_size['name'] }}
                {{ @$cartData->options->product_size['price'] ? '(' . currencyPosition(@$cartData->options->product_size['price']) . ')' : '' }}
            </p>


            <p class="size">Qyt: {{ $cartData->qty }}</p>
            @foreach ($cartData->options->product_options as $cartProductOption)
                <span class="extra">{{ $cartProductOption['name'] }}
                    ({{ currencyPosition($cartProductOption['price']) }})
                </span>
            @endforeach
            <p class="price">{{ currencyPosition($cartData->price) }}</p>
        </div>
        <span class="del_icon" onclick="removeProductSidebar('{{ $cartData->rowId }}')"><i
                class="fal fa-times"></i></span>
    </li>
@endforeach
