<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <div class="labels">
            @if($product->isNew())
                <span class="badge badge-success">New</span>
            @endif
            @if($product->isRecommend())
                  <span class="badge badge-warning">Recommend</span>
            @endif
             @if($product->isHit())
                    <span class="badge badge-danger">Hit</span>
             @endif

        </div>
        <img src="{{Storage::url($product ->image)}}" alt="iPhone X 64GB">
        <div class="caption">
            <h3>{{$product -> name }}</h3>
            <p>{{$product ->price }}</p>
            <p>

                <form action="{{route('basket-add', $product)}}" method="POST">
                    @if($product->isAvailable())
                        <button type="submit"  class="btn btn-primary" role="button">In Basket</button>
                    {{--{{$product->category->name}}--}}
                    @else
                        No available
                    @endif
                        <a href="{{ route('product', [isset($category) ? $category->code : $product->category->code, $product->code]) }}" class="btn btn-default"
                           role="button">Details</a>
{{--                    <a href="{{route('product',[isset($category) ? $category->code:$product->category->code, $product->code])}}"
                       class="btn btn-default"
                       role="button">Details</a>--}}
                    @csrf
                </form>
            </p>
        </div>
    </div>
</div>