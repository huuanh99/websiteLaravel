@extends('admin.layout')
@section('content')
<div class="grid_10">
	<div class="box round first grid">
		<h2>Quản lý đơn hàng</h2>
		<div class="block">
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>No.</th>
						<th>Tên khách hàng</th>
						<th>Số điện thoại</th>
						<th>Địa chỉ nhận hàng</th>
						<th>Tổng số tiền</th>
						<th>Thời gian đặt hàng</th>
						<th>Chi tiết</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($order as $key => $item)
					<tr class="odd gradeX">
						<td>{{ ++$key }}</td>
						<td>{{ $item->name }}</td>
						<td>{{ $item->phone }}</td>
						<td>{{ $item->address }}</td>
						<td>{{ $fm->vndFormat($item->total) }}</td>
						<td>{{ $fm->formatDate($item->time_order) }}</td>
						<td><a href="{{ route('adminorderdetail',['id'=>$item->id]) }}">Detail</a></td>
						{{-- <td>
							@if ($item->status==0)
							<a href="{{ route('handleOrder',['id'=>$item->id]) }}">Đang chờ xử lý</a>
							@else
							Đang vận chuyển
							@endif
						</td> --}}
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		setupLeftMenu();

		$('.datatable').dataTable();
		setSidebarHeight();
	});
</script>	
@endsection

