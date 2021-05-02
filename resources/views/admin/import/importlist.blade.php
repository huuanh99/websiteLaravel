@extends('admin.layout')
@section('content')
<div class="grid_10">
	<div class="box round first grid">
		<h2>Tổng doanh thu bán hàng : {{ $fm->vndFormat($income) }}</h2>
		<h2>Tổng chi phí nhập hàng : {{ $fm->vndFormat($outcome) }}</h2>
		<h2>Lợi nhuận của cửa hàng : {{ $fm->vndFormat($income-$outcome) }}</h2>
		<h2>Product List</h2>
		<div class="block">
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th width="10%">STT</th>
						<th width="30%">Tên sản phẩm</th>
						<th width="15%">Tổng số hàng nhập</th>
						<th width="15%">Số hàng tồn kho</th>
						<th width="15%">Chi tiết</th>
						<th width="15%">Nhập hàng</th>
					</tr>

				</thead>
				<tbody>
					@foreach ($products as $key => $item)
					<tr class="odd gradeX">
						<td>{{ ++$key }}</td>
						<td>{{ $fm->textShorten($item->productName,40) }}</td>
						<td>
              <?php $totalquantity=0 ?>
              @foreach ($item->imports as $import)
                  <?php $totalquantity+=$import->quantity ?>
              @endforeach
              {{ $totalquantity }}
            </td>
						<td>{{ $item->quantity }}</td>
						<td><a href="{{ route('importdetail',['id'=>$item->id]) }}">Detail</a></td>
						<td><a href="{{ route('importadd',['id'=>$item->id]) }}">Nhập hàng</a>
						</td>
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
