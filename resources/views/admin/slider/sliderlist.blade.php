@extends('admin.layout')
@section('content')
<div class="grid_10">
	<div class="box round first grid">
		<h2>Slider List</h2>
		<div class="block">
			<table class="data display datatable" id="example">
				<thead>

					<tr>
						<th width="10%">STT</th>
						<th width="40%">Image</th>
						<th width="25%">Delete</th>
						<th width="25%">Edit</th>
					</tr>

				</thead>
				<tbody>
					@foreach ($sliders as $key => $item)
					<tr class="odd gradeX">
						<td>{{ ++$key }}</td>
						<td><img width="300" src="{{ asset('uploads') }}/{{ $item->image }}" alt=""></td>
						<td> <a onclick="return confirm('Do you want to delete? You still can restore it')"
								href="{{ route('softsliderdelete',['id'=>$item->id]) }}">Delete</a></td>
						<td><a href="{{ route('slideredit',['id'=>$item->id]) }}">Edit</a></td>
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