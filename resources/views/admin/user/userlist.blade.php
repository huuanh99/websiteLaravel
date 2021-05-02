@extends('admin.layout')
@section('content')
<div class="grid_10">
	<div class="box round first grid">
		<h2>User List</h2>
		<div class="block">
			<table class="data display datatable" id="example">
				<thead>

					<tr>
						<th width="5%">STT</th>
						<th width="15%">Name</th>
						<th width="20%">Email</th>
						<th width="15%">Phone</th>
						<th width="25%">Address</th>
						<th width="10%">City</th>
						<th width="10%">Trạng thái</th>
					</tr>

				</thead>
				<tbody>
					@foreach ($users as $key => $item)
					<tr class="odd gradeX">
						<td>{{ ++$key }}</td>
						<td>{{ $item->name }}</td>
						<td>{{ $item->email }}</td>
						<td>{{ $item->phone }}</td>
						<td>{{ $item->address }}</td>
						<td>{{ $item->city }}</td>
						<td>@if ($item->is_activated==1)
							Đã kích hoạt
							@else
							Chưa kích hoạt
							@endif</td>
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