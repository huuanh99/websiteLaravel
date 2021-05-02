@extends('layoutnoslider')
@section('content')
<div class="main">
	<div class="content">
		<div class="cartoption">
			<div class="cartpage">
				<h2>Your Order</h2>
				<table class="tblone">
					<tr>
						<th width="25%">Tổng số tiền</th>
						<th width="25%">Thời gian đặt hàng</th>
						<th width="25%">Tình trạng</th>
						<th width="25%">Chi tiết đơn hàng</th>
					</tr>
					@foreach ($orders as $item)
					<tr>
						<td>{{ $fm->vndFormat($item->total) }}</td>
						<td>{{ $fm->formatDate($item->time_order) }}</td>
						<td>@if ($item->status==0)
							Đang chờ xử lý
							@elseif($item->status==1)
							<a onclick="return confirm('Bạn xác nhận đã nhận hàng ?')" 
									href="{{ route('receiveOrder',['id'=>$item->id]) }}">Đang	giao hàng</a>
							@else
							Đã nhận hàng
							@endif</td>
						<td><a href="{{ route('orderdetail',['id'=>$item->id]) }}">Chi tiết đơn hàng</a></td>
					</tr>
					@endforeach


				</table>
				{{-- <?php
				if($orders==null){
					echo "<span class='empty_cart'>Bạn chưa có đơn hàng nào</span>";
				}
				?> --}}
			</div>
			<div class="shopping">
				<div class="shopleft">
					<a href="index.php"> <img src="images/shop.png" alt="" /></a>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>
@endsection