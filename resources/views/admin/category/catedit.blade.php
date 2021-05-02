@extends('admin.layout')
@section('content')
<div class="grid_10">
  <div class="box round first grid">
    <h2>Sửa danh mục sản phẩm</h2>
    <div class="block copyblock">
      <span class="success">
        @if (Session::get('message')!=null)
        {{ Session::get('message') }}
        @endif
      </span>
     
      <form action="{{ route('editcategory') }}" method="POST">
        @csrf
        <table class="form">
          <tr>
            <td>
              <input readonly type="text" class="medium" value="{{ $cat->catName }}" />
            </td>
          </tr>
          <tr>
            <td>
              <input name="catId" type="hidden" value="{{ $cat->id }}" />
              <input name="catName" type="text" placeholder="Nhập tên danh mục sản phẩm mới" class="medium" required />
            </td>
          </tr>
          <tr>
            <td>
              <input type="submit" name="submit" Value="UPDATE" />
            </td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div>

@endsection
