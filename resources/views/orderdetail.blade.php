{{-- <?php
include_once 'inc/header.php';
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
	$id = $_GET['id'];
} else {
	echo "<script>window.location='order.php'</script>";
}
if (!isset($_SESSION['customer'])) {
	echo "<script>window.location='login.php'</script>";
}
$subtotal = 0;
?> --}}

@extends('layoutnoslider')
@section('content')
<div class="main">
	<div class="content">
		<div class="cartoption">
			<div class="cartpage">
				<h2>Chi tiết hóa đơn</h2>
				<table class="tblone">
					<tr>
						<th width="20%">Product Name</th>
						<th width="20%">Image</th>
						<th width="15%">Price</th>
						<th width="25%">Quantity</th>
						<th width="20%">Total Price</th>
					</tr>
					<?php $subtotal =0 ?>
					@foreach ($order as $item)
					<tr>
						<td>{{ $item->product->productName }}</td>
						<td> <a href="{{ route('details',['id'=>$item->product->id]) }}">
								<img src="../uploads/{{ $item->product->image }}" alt="" />
							</a>
						</td>
						<td>{{ $fm->vndFormat($item->product->price) }}</td>
						<td>{{ $item->quantity }}</td>
						<td>{{ $fm->vndFormat($item->product->price*$item->quantity) }}</td>
					</tr>
					<?php $subtotal += $item->product->price*$item->quantity?>
					@endforeach
				</table>
				@if ($subtotal==0)
					<script>window.location='order.php'</script>
				@else
				<table style="float:right;text-align:left;" width="40%">
					<tr>
						<th>Giá hàng : </th>
						<td>{{ $fm->vndFormat($subtotal) }}</td>
					</tr>
					<tr>
						<th>Khuyến mãi : </th>
						<td>{{ $fm->vndFormat($subtotal*0.05) }}</td>
					</tr>
					<tr>
						<th>Tổng số tiền :</th>
						<td>{{ $fm->vndFormat($subtotal*0.95) }} </td>
					</tr>
				</table>
				@endif
	
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