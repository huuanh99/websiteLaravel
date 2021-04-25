@extends('layoutnoslider')
@section('content')
<div class="main">
	<div class="content">
		<div class="cartoption">
			<div class="cartpage">
				<h2>Your Cart</h2>
				<span class="success">
					@if (Session::get('message')!=null)
					{{ Session::get('message') }}
					@endif
				</span>
				<table class="tblone">
					<tr>
						<th width="20%">Product Name</th>
						<th width="10%">Image</th>
						<th width="15%">Price</th>
						<th width="25%">Quantity</th>
						<th width="20%">Total Price</th>
						<th width="10%">Action</th>
					</tr>
				
					@if (Session::get('cart')!=null)
					@foreach (Session::get('cart') as $index => $item)
					<tr>
						<td>{{ $item->productName }}</td>
						<td> <a href="{{ route('details',['id'=>$item->id]) }}">
								<img src="{{ asset('uploads') }}/{{ $item->image }}" alt="" />
							</a>
						</td>
						<td>{{ $fm->vndFormat($item->price) }}</td>
						<td>
							<form action="{{ route('updatecart') }}" method="post">
								@csrf
								<input min="1" max="{{ $item->totalquantity }}" type="number" name="quantity" value="{{ $item->quantity }}" />
								<input type="hidden" name="id" value="{{ $item->id }}" />
								<input type="submit" name="submit" value="Update" />
							</form>
						</td>
						<td>{{ $fm->vndFormat($item->price*$item->quantity) }}</td>
						<td><a onclick="return confirm('Do you want to delete?')" href="{{ route('deletecart',['id'=>$item->id]) }}">Xóa</a></td>
					</tr>
					@endforeach
					@endif
				</table>
				@if (Session::get('subtotal')==null)
				<span class='empty_cart'>Your cart is empty. Please Shopping now</span>
				@else
				<table style="float:right;text-align:left;" width="40%">
					<tr>
						<th>Giá hàng : </th>
						<td>{{ $fm->vndFormat(Session::get('subtotal')) }}</td>
					</tr>
					<tr>
						<th>Khuyến mãi : </th>
						<td>{{ $fm->vndFormat(Session::get('subtotal')*0.05) }}</td>
					</tr>
					<tr>
						<th>Tổng số tiền :</th>
						<td>{{ $fm->vndFormat(Session::get('subtotal')*0.95) }}</td>
					</tr>
				</table>
				@endif 
					
			
			</div>
			<div class="shopping">
				<div class="shopleft">
					<a href="{{ route('index') }}"> <img src="{{ asset('images/shop.png') }}" alt="" /></a>
				</div>
				<div class="shopright">
					<a href="{{ route('payment') }}"> <img src="{{ asset('images/check.png') }}" alt="" /></a>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>	
@endsection


