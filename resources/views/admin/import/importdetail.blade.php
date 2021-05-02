@extends('admin.layout')
@section('content')
<div class="grid_10">
	<div class="box round first grid">
		<h2>Import List</h2>
		<div class="block">
			<table class="data display datatable" id="example">
				<thead>

					<tr>
						<th width="5%">STT</th>
						<th width="15%">Số lượng hàng nhập</th>
						<th width="15%">Gía nhập</th>
						<th width="25%">Ghi chú</th>
						<th width="15%">Thời gian nhập</th>
						<th width="15%">Thời gian sửa</th>
						<th width="10%">Sửa</th>
					</tr>

				</thead>
				<tbody>
					@foreach ($imports as $key => $item)
					<tr class="odd gradeX">
						<td>{{ ++$key }}</td>
						<td>{{ $item->quantity }}</td>
						<td>{{ $fm->vndFormat($item->price) }}</td>
						<td>{{ $item->note }}</td>
						<td>{{ $fm->formatDate($item->created_at) }}</td>
						<td>{{ $fm->formatDate($item->updated_at) }}</td>
						<td><a href="{{ route('importedit',['id'=>$item->id]) }}">Edit</a></td>
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
