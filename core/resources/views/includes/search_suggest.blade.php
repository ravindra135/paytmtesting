

<div class="s-r-inner ScrollStyle2">
    @foreach ($items as $item)
    <div class="product-card p-col">
        <a class="product-thumb" href="{{route('front.product',$item->slug)}}">
            <img class="lazy" alt="Product" src="{{asset('assets/images/featuredimage/'.$item->thumbnail)}}" style=""></a>
        <div class="product-card-body">
            <h3 class="product-title"><a href="{{route('front.product',$item->slug)}}">
                {{ strlen(strip_tags($item->name)) > 35 ? substr(strip_tags($item->name), 0, 35) : strip_tags($item->name) }}
            </a></h3>
            
            <h4 class="product-price">
                {{PriceHelper::grandCurrencyPrice($item)}}
            </h4>
        </div>
    </div>
    @endforeach
    
</div>
<div class="bottom-area">
    <a id="view_all_search_" href="javascript:;">{{ __('View all result') }}</a>
</div>