@extends('admin.layout')
@section('content')
<div class="grid_10">
	<div class="box round first grid">
		<h2>Comment List</h2>
		<div class="block">
			<table class="data display datatable" id="example">
				<thead>

					<tr>
						<th width="5%">STT</th>
						<th width="15%">Tên người dùng</th>
						<th width="45%">Nội dung</th>
            <th width="25%">Thời gian viết</th>
						<th width="10%">Xóa</th>
					</tr>

				</thead>
				<tbody>
					@foreach ($comments as $key => $item)
					<tr class="odd gradeX">
						<td>{{ ++$key }}</td>
						<td>{{ $item->customer->name }}</td>
						<td>{{ $item->body }}</td>
            <td>{{ $fm->formatDate($item->created_at) }}</td>
						<td><a onclick="return confirm('Do you want to delete this comment?')"
                   href="{{ route('deletecomment',['id'=>$item->id]) }}">Delete</a></td>
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
