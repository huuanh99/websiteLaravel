@extends('admin.layout')
@section('content')
<div class="grid_10">
  <div class="box round first grid">
    <h2>Thêm thương hiệu sản phẩm</h2>
    <div class="block copyblock">
      <span class="success">
        @if (Session::get('message')!=null)
        {{ Session::get('message') }}
        @endif
    </span>
      <form action="{{ route('addbrand') }}" method="POST">
        @csrf
        <table class="form">
          <tr>
            <td>
              <input name="brandName" type="text" placeholder="Thêm thương hiệu sản phẩm..." class="medium" />
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
