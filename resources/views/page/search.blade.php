@extends('master')

@section('content')
<div class="container">
    <h3>Kết quả tìm kiếm cho: "{{ $keyword }}"</h3>
    
    @if(count($search) > 0)
        <div class="row">
            @foreach($search as $product)
                <div class="col-sm-3">
                    <div class="single-item">
                        <div class="single-item-header">
                            <a href="detail/{{$product->id}}">
                                <img width="200" height="200" src="/source/assets/image/product/{{ $product->image }}" alt="">
                            </a>
                        </div>
                        <div class="single-item-body">
                            <p class="single-item-title">{{ $product->name }}</p>
                            <p class="single-item-price">
                                <span class="flash-sale">{{ number_format($product->unit_price) }} Đồng</span>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Hiển thị phân trang -->
        <div class="row">{{ $search->links("pagination::bootstrap-4") }}</div>
    @else
        <p>Không tìm thấy sản phẩm nào phù hợp.</p>
    @endif
</div>
@endsection
