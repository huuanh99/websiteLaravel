{{-- <?php
include_once 'inc/header.php';
include_once 'inc/sidebar.php';
include_once '../classes/category.php';
$cat = new category();
if (isset($_GET['delId']) && is_numeric($_GET['delId'])) {
	$id = $_GET['delId'];
	$delCat = $cat->del_category($id);
} 
?> --}}

@extends('admin.layout')
@section('content')
<div class="grid_10">
	<div class="box round first grid">
		<h2>Category List</h2>
		<div class="block">
			<?php if (isset($del_cat)) {
				echo $del_cat;
			} ?>
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>Serial No.</th>
						<th>Category Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($category as $key => $item)
					<tr class="odd gradeX">
						<td>{{ ++$key }}</td>
						<td>{{ $item->catName }}</td>
						<td><a href="{{ route('catedit',['id'=>$item->id]) }}">Edit</a> || <a onclick="return confirm('Do you want to delete?')" href="{{ route('catdelete',['id'=>$item->id]) }}">Delete</a></td>
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

