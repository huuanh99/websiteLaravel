@extends('layoutnoslider')
@section('content')
<div class="main">
	<span class="success">
		@if (Session::get('message')!=null)
		{{ Session::get('message') }}
		@endif
	</span>
	<div class="content">
		<div class="section group">
			<div class="cont-desc span_1_of_2">
				<div class="grid images_3_of_2">
					<img src="{{ asset('uploads') }}/{{ $product->image }}" alt="" />
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
				<section class="content-item" id="comments">
					<div class="container">
						<div class="row">
							<div class="col-sm-8">
								<div class="media">
								
									<div class="media-body">
										<form action="{{ route('comment') }}" method="POST">
											@csrf
											<h3 class="pull-left">New Comment</h3>
											<textarea name="body" class="form-control" id="message" placeholder="Your message"
												required=""></textarea>
											<input type="hidden" name="product_id" value="{{ $product->id }}">
											<button type="submit" class="btn btn-normal pull-right">Gửi bình luận</button>
										</form>
									</div>
								</div>


							<h3>{{ $comment->count() }} Comments</h3>
							@foreach ($comment as $item)
								<div class="media">
									<a class="pull-left" href="#"><img class="media-object"
											src="{{ asset('uploads/avatar1.png') }}" alt=""></a>
									<div class="media-body">
										<h4 class="media-heading">{{ $item->customer->name }}</h4>
										<p>{{ $item->body }}</p>
										<ul class="list-unstyled list-inline media-detail pull-left">
											<li><i class="fa fa-calendar"></i>{{ $fm->formatDate($item->created_at) }}</li>
											<li><i class="fa fa-thumbs-up"></i>1</li>
										</ul>
										<ul class="list-unstyled list-inline media-detail pull-right">
											<li class="like"><a href="">Like</a></li>
											<li class="like"><a href="">Reply</a></li>
										</ul>
									</div>
								</div>
							
							@endforeach
						</div>

						</div>
					</div>
				</section>

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