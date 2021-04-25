@extends('layoutnoslider')
@section('content')
<div class="main">
	<div class="content">
		<div class="section group">
			<div class="cont-desc span_1_of_2">
				<div class="grid images_3_of_2">
					<img src="../uploads/{{ $product->image }}" alt="" />
				</div>
				<div class="desc span_3_of_2">
					<h2> {{ $product->productName }} </h2>
					<p> {{ $fm->textShorten($product->product_desc,50) }}</p>
					<div class="price">
						<p>Price: <span>{{ $fm->vndFormat($product->price) }}</span></p>
						<p>Category: <span>{{ $product->category->catName }}</span></p>
						<p>Brand:<span>{{ $product->brand->brandName }}</span></p>
						<p>Số lượng sản phẩm có sẵn:<span>{{ $product->quantity }}</span></p>
					</div>
					<div class="add-cart">
						<form action="{{ route('addtocart')}}" method="post">
							@csrf
							<input type="hidden" name="id" value="{{ $product->id }}">
							<input type="number" class="buyfield" name="quantity" value="1" min="1" max="{{ $product->quantity }}" />
							<input type="submit" class="buysubmit" name="submit" value="Buy Now" />
						</form>
					</div>
				</div>
				<div class="product-desc">
					<h2>Product Details</h2>
					<p>{{ $product->product_desc }}</p>
				</div>

			</div>
	<div class="rightsidebar span_3_of_1">
				<h2>CATEGORIES</h2>
				<ul>
					@foreach ($category as $item)
          <li><a href="{{ route('productbycat',['id'=>$item->id]) }}">{{ $item->catName }}</a></li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>

@endsection
