@extends('admin.layout')
@section('content')
<div class="grid_10">
	<div class="box round first grid">
		<h2>Brand List</h2>
		<div class="block">
			<?php if (isset($del_brand)) {
				echo $del_brand;
			} ?>
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>Serial No.</th>
						<th>Brand Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($brand as $key => $item)
					<tr class="odd gradeX">
						<td>{{ ++$key }}</td>
						<td>{{ $item->brandName }}</td>
						<td><a href="{{ route('brandedit',['id'=>$item->id]) }}">Edit</a> || <a onclick="return confirm('Do you want to delete?')" href="{{ route('brandDelete',['id'=>$item->id]) }}">Delete</a></td>
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
