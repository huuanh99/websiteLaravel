@extends('admin.layout')
@section('content')
<div class="grid_10">
  <div class="box round first grid">
    <h2>Sửa thương hiệu sản phẩm</h2>
    <div class="block copyblock">
      <span class="success">
        @if (Session::get('message')!=null)
        {{ Session::get('message') }}
        @endif
      </span>
      <form action="{{ route('editbrand') }}" method="POST">
        @csrf
        <table class="form">
          <tr>
            <td>
              <input readonly type="text" class="medium" value="{{ $brand->brandName }}" />
            </td>
          </tr>
          <tr>
            <td>
              <input name="brandId" type="hidden" value="{{ $brand->id }}" />
              <input name="brandName" type="text" placeholder="Nhập tên thương hiệu sản phẩm mới" class="medium" required />
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
