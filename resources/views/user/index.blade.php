@extends('layout')
@section('content')
<div class="main">
	<div class="content">
		<div class="content_top">
			<div class="heading">
				<h3>Feature Products</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			@foreach ($product_featured as $item)
			<div class="grid_1_of_4 images_1_of_4">
				<a href="{{ route('details',['id'=>$item->id]) }}">
					<img height="200" src="{{ asset('uploads') }}/{{ $item->image }}" alt="" /></a>
				<h2> {{ $fm->textShorten($item->productName,30) }} </h2>
				<p>
				@if ($item->oldprice!=0)
						<span class="oldprice">{{ $fm->vndFormat($item->oldprice) }}</span>
				@endif
						<span class="price">{{ $fm->vndFormat($item->price) }}</span>
				</p>
				<div class="button"><span><a href="{{ route('details',['id'=>$item->id]) }}" class="details">Chi tiết</a></span>
				</div>
			</div>
			@endforeach


		</div>
		<div class="content_bottom">
			<div class="heading">
				<h3>New Products</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">

			@foreach ($new_product as $item)
			<div class="grid_1_of_4 images_1_of_4">
				<a href="{{ route('details',['id'=>$item->id]) }}">
					<img height="200" src="{{ asset('uploads') }}/{{ $item->image }}" alt="" /></a>
				<h2> {{ $fm->textShorten($item->productName,30) }} </h2>
				<p>
				@if ($item->oldprice!=0)
						<span class="oldprice">{{ $fm->vndFormat($item->oldprice) }}</span>
				@endif
						<span class="price">{{ $fm->vndFormat($item->price) }}</span>
				</p>
				<div class="button"><span><a href="{{ route('details',['id'=>$item->id]) }}" class="details">Chi tiết</a></span>
				</div>
			</div>
			@endforeach


		</div>
	</div>
</div>


@endsection