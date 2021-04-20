@extends('admin.layout')
@section('content')
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm danh mục sản phẩm</h2>
        <div class="block copyblock">
            <span class="success">
                @if (Session::get('message')!=null)
                {{ Session::get('message') }}
                @endif
            </span>
           
            <form action="{{ route('addcategory') }}" method="POST">
                @csrf
                <table class="form">
                    <tr>
                        <td>
                            <input name="catName" type="text" placeholder="Nhập tên danh mục sản phẩm..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit" Value="Save" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
  
@endsection
