Dear client, product {{$product->name}} is in stock.

<a href="{{route('product',[$product->category->code, $product->code])}}">Details</a>