@extends('admin.layout')
@section('content')
<div class="grid_10">
	<div class="box round first grid">
		<h2>Product List</h2>
		<div class="block">
			<table class="data display datatable" id="example">
				<thead>

					<tr>
						<th width="5%">ID</th>
						<th width="25%">Product Name</th>
						<th width="10%">Price</th>
						<th width="10%">Image</th>
						<th width="10%">Category</th>
						<th width="10%">Brand</th>
						<th width="10%">Quantity</th>
						<th width="10%">Type</th>
						<th width="10%">Action</th>
					</tr>

				</thead>
				<tbody>
					@foreach ($products as $key => $item)
					<tr class="odd gradeX">
						<td>{{ ++$key }}</td>
						<td>{{ $fm->textShorten($item->productName,40) }}</td>
						<td>{{ $fm->vndFormat($item->price) }}</td>
						<td><img width="80" src="{{ asset('uploads') }}/{{ $item->image }}" alt=""></td>
						<td>{{ $item->category->catName }}</td>
						<td>{{ $item->brand->brandName }}</td>
						<td>{{ $item->quantity }}</td>
						<td>@if ($item->type==1)
								Featured
						@else
								Non-Featured
						@endif</td>
						<td><a href="{{ route('productedit',['id'=>$item->id]) }}">Edit</a> ||
								<a onclick="return confirm('Do you want to delete? You still can restore it')" 
								href="{{ route('softdelete',['id'=>$item->id]) }}">Delete</a>
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
