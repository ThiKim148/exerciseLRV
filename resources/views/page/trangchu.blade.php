	@extends('master')
	@section('content')

<div class="rev-slider">
    <div class="fullwidthbanner-container">
        <div class="fullwidthbanner">
            <div class="bannercontainer">
                <div class="banner">
                    <ul>
						@foreach ($slide as $sl)
                        <!-- THE FIRST SLIDE -->
						<li data-transition="boxfade" data-slotamount="20" class="active-revslide current-sr-slide-visible" style="width: 100%; height: 100%; overflow: hidden; visibility: inherit; opacity: 1; z-index: 20;">
						            <div class="slotholder" 
									style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" 
									data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" 
									data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" 
									data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
									<img class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" 
										data-bgrepeat="no-repeat" data-lazydone="undefined" src="source\assets\image\slide\{{$sl->image}}" data-src="source\assets\dest\images\thumbs\1.jpg" 
										style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('source\assets\dest\images\thumbs\1.jpg'); background-size: cover; 
										background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
									</img>
									</div>

						</li>
						@endforeach
						
                    </ul>
                </div>
            </div>
            <div class="tp-bannertimer"></div>
        </div>
    </div>
</div>

	<!--slider-->
	</div>
		<div class="container">
			<div id="content" class="space-top-none">
				<div class="main-content">
					<div class="space60">&nbsp;</div>
						<div class="row">
							<div class="col-sm-12">
							<div class="beta-products-list">
							<h4>New Products</h4>
					<div class="beta-products-details">
						<p class="pull-left">{{count($new_product)}} styles found</p>
		<div class="clearfix"></div>
	</div>
	
	<div class="row">
	@foreach($new_product as $new)
		<div class="col-sm-3">
			<div class="single-item">
				<div class="single-item-header">
					<a href="detail/{{$new->id}}"><img width="200" height="200"
						src="/source/assets/image/product/{{$new->image}}" alt=""></a>
				</div>
				@if($new->promotion_price==!0)
				<div class="ribbon-wrapper">
					<div class="ribbon sale">Sale</div>
				</div>
				@endif
				<div class="single-item-body">
					<p class="single-item-title">{{$new->name}}</p>
					<p class="single-item-price" style="text-align:left;font-size: 15px;">
						@if($new->promotion_price==0)
				
						<span class="flash-sale">{{number_format($new->unit_price)}} Đồng</span>
						@else
						<span class="flash-del">{{number_format($new->unit_price)}} Đồng </span>
						<span class="flash-sale">{{number_format($new->promotion_price)}} Đồng</span>
						@endif
					</p>
				</div>
				<div class="single-item-caption">
					<a class="add-to-cart pull-left" href="{{route('themgiohang', $new->id)}}"><i class="fa fa-shopping-cart"></i></a>

					<a class="add-to-wishlist" href="wishlist/add/{{$new->id}}"><i class="fa fa-heart"></i></a>
			
					<a class="beta-btn primary" href="detail/{{$new->id}}">Details <i class="fa fa-chevron-right"></i></a>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	@endforeach
</div>

<div class="row">{{$new_product->links("pagination::bootstrap-4")}}</div>
</div> <!-- .beta-products-list -->
	
<div class="space50">&nbsp;</div>
	
<div class="beta-products-list">
	<h4>Top Products</h4>
	<div class="beta-products-details">
		<p class="pull-left">{{count($promotion_product)}} founded</p>
		<div class="clearfix"></div>
	</div>
	<div class="row">
		@foreach($promotion_product as $km)
		<div class="col-sm-3">
			<div class="single-item">
				<div class="single-item-header">
				<a href="detail/{{$new->id}}"><img width="200" height="200" src="/source/assets/image/product/{{$km->image}}" alt=""></a>
			</div>
			<div class="single-item-body">
				<p class="single-item-title">{{$km->name}}</p>
				<p class="single-item-price" style="text-align:left;font-size: 15px;">
					@if($km->promotion_price==0)
					<span class="flash-sale">{{number_format($km->unit_price)}} Đồng</span>
					@else
					<span class="flash-del">{{number_format($km->unit_price)}} Đồng</span>
					<span class="flash-sale">{{number_format($km->promotion_price)}} Đồng</span>
					@endif
				</p>
			</div>
			
			<div class="single-item-caption">
				<a class="add-to-cart pull-left" href="{{route('themgiohang', $new->id)}}"><i class="fa fa-shopping-cart"></i></a>
				
				<a class="add-to-wishlist" href="wishlist/add/{{$km->id}}"><i class="fa fa-heart"></i></a>
				
				<a class="beta-btn primary" href="detail/{{$km->id}}">Details <i class="fa fa-chevron-right"></i></a>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	@endforeach
</div>

<div class="row">{{$promotion_product->links("pagination::bootstrap-4")}}</div>
	
</div> <!-- .beta-products-list -->
</div>
</div> <!-- end section with sidebar and main content -->
	
</div> <!-- .main-content -->
</div> <!-- #content -->
</div> <!-- .container -->
	
<!-- include js files -->
<script src="assets/dest/js/jquery.js"></script>
	<script src="assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
	<script src="assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
	<script src="assets/dest/vendors/animo/Animo.js"></script>
	<script src="assets/dest/vendors/dug/dug.js"></script>
	<script src="assets/dest/js/scripts.min.js"></script>
	<script src="assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script src="assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script src="assets/dest/js/waypoints.min.js"></script>
	<script src="assets/dest/js/wow.min.js"></script>
	<!--customjs-->
	<script src="assets/dest/js/custom2.js"></script>
	<script>
	$(document).ready(function($) {    
		$(window).scroll(function(){
			if($(this).scrollTop()>150){
			$(".header-bottom").addClass('fixNav')
			}else{
				$(".header-bottom").removeClass('fixNav')
			}}
		)
	})
	</script>
@endsection
	