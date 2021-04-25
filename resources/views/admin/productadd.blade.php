@extends('admin.layout')
@section('content')
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm sản phẩm</h2>
        <span class="success">
            @if (Session::get('message')!=null)
            {{ Session::get('message') }}
            @endif
        </span>
        <div class="block">
            <form action="{{ route('addproduct') }}" method="post" enctype="multipart/form-data">
                @csrf
                <table class="form">
                    <tr>
                        <td>
                            <label>Name</label>
                        </td>
                        <td>
                            <input required name="productName" type="text" placeholder="Enter Product Name..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Quantity</label>
                        </td>
                        <td>
                            <input required name="quantity" type="number" placeholder="Enter Quantity..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Category</label>
                        </td>
                        <td>
                            <select required id="select" name="category">
                                <option>Select Category</option>
                                @foreach ($category as $item)
                                <option value="{{ $item->id }}">{{ $item->catName }}</option>
                                @endforeach
                                
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Brand</label>
                        </td>
                        <td>
                            <select required id="select" name="brand">
                                <option>Select Brand</option>
                                @foreach ($brand as $item)
                                <option value="{{ $item->id }}">{{ $item->brandName }}</option>
                                @endforeach

                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Description</label>
                        </td>
                        <td>
                            <textarea required name="product_desc" class="tynymce"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Price</label>
                        </td>
                        <td>
                            <input required name="price" type="number" placeholder="Enter Price..." class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Upload Image</label>
                        </td>
                        <td>
                            <input required type="file" name="image" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Product Type</label>
                        </td>
                        <td>
                            <select required id="select" name="type">
                                <option>Select Type</option>
                                <option value="1">Featured</option>
                                <option value="0">Non-Featured</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Save" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
 
@endsection
