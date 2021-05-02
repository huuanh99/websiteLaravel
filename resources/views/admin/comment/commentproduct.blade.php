@extends('admin.layout')
@section('content')
<div class="grid_10">
	<div class="box round first grid">
		<h2>Product List</h2>
		<div class="block">
			<table class="data display datatable" id="example">
				<thead>

					<tr>
						<th width="10%">STT</th>
						<th width="40%">Tên sản phẩm</th>
						<th width="20%">Ảnh</th>
						<th width="15%">Số comment</th>
						<th width="15%">Chi tiết</th>
					</tr>

				</thead>
				<tbody>
					@foreach ($products as $key => $item)
					<tr class="odd gradeX">
						<td>{{ ++$key }}</td>
						<td>{{ $fm->textShorten($item->productName,60) }}</td>
						<td><img width="100" src="{{ asset('uploads') }}/{{ $item->image }}" alt=""></td>
						<td>{{ count($item->comments) }} comment</td>
						<td><a href="{{ route('commentlist',['id'=>$item->id]) }}">Watch comments</a></td>
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
