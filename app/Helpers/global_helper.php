<?php

use Gloudemans\Shoppingcart\Facades\Cart;

if (!function_exists('generateUniqueSlug')) {

    function generateUniqueSlug($model, $name): string
    {
        $modelClass = "App\\Models\\$model";
        if (!class_exists($modelClass)) {
            throw new \InvalidArgumentException("Model $model not found.");
        }
        $slug = \Str::slug($name);
        $count = 2;

        while ($modelClass::where('slug', $slug)->exists()) {
            $slug = \Str::slug($name) . '-' . $count;
            $count++;
        }
        return $slug;
    }
}
if (!function_exists('currencyPosition')) {
    function currencyPosition($price): string
    {
        if (config('settings.icon_position') === 'left') {

            return config('settings.currency_icon') . $price;
        } else {
            return $price . config('settings.currency_icon');
        }
    }
}


// calculate cart total price

function cartTotal()
{
    $total = 0;
    foreach (Cart::content() as $item) {
        $productPrice = $item->price;
        $sizePrice = $item->options?->product_size['price'] ?? 0;
        $optionsPrice = 0;
        foreach ($item->options->product_options as $option) {
            $optionsPrice += $option['price'];
        }
        $total += ($productPrice + $sizePrice + $optionsPrice) * $item->qty;
    }
    return $total;
}
