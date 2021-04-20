{{-- <?php
include_once 'inc/header.php';
if (isset($_GET['catid']) && is_numeric($_GET['catid'])) {
	$id = $_GET['catid'];
	$category = $cat->getCatById($id);
} else {
	echo "<script>window.location='index.php'</script>";
}

?> --}}

@extends('layoutnoslider')
@section('content')
<div class="main">
	<div class="content">
		<div class="content_top">
			<div class="heading">
				<h3>Category: {{ $category->catName }}</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			@foreach ($product as $item)
			<div class="grid_1_of_4 images_1_of_4">
				<a href="{{ route('details',['id'=>$item->id]) }}"><img height="250" src="../uploads/{{ $item->image }}" alt="" /></a>
				<h2>{{ $item->productName }}</h2>
				<p><span class="price">{{ $fm->vndFormat($item->price) }}</span></p>
				<div class="button"><span><a href="{{ route('details',['id'=>$item->id]) }}" class="details">Details</a></span></div>
			</div>
			@endforeach
				

		</div>



	</div>
</div>


@endsection
