@extends('admin.layout')
@section('content')
<div class="grid_10">
    <div class="box round first grid">
        <h2>Nhập hàng</h2>
        <span class="success">
            @if (Session::get('message')!=null)
            {{ Session::get('message') }}
            @endif
        </span>
        <div class="block">
            <form action="{{ route('addimport') }}" method="post">
                @csrf
                <table class="form">
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <tr>
                        <td>
                            <label>Tên sản phẩm</label>
                        </td>
                        <td>
                            <input readonly name="productName" type="text" value="{{ $product->productName }}" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Số lượng nhập</label>
                        </td>
                        <td>
                            <input min="1" required name="quantity" type="number" placeholder="Enter Quantity..." class="medium" />
                        </td>
                    </tr>                
                    <tr>
                        <td>
                            <label>Giá nhập</label>
                        </td>
                        <td>
                            <input min="1000" required name="price" type="number" placeholder="Enter Price..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                      <td>
                          <label>Ghi chú</label>
                      </td>
                      <td>
                          <textarea required name="note" placeholder="Ghi chú" class="medium"></textarea>
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
