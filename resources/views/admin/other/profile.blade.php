@extends('admin.layout')
@section('content')
<div class="grid_10">
  <div class="box round first grid">
    <h2>Thay đổi thông tin cá nhân</h2>
    <div class="block">
      <span class="success">
        @if (Session::get('message')!=null)
        {{ Session::get('message') }}
        @endif
      </span>
      <form action="{{ route('updateadmin') }}" method="POST">
        @csrf
        <table class="form">
          <tr>
            <td>
              <label>Admin Name</label>
            </td>
            <td>
              <input required type="text" value="{{ Session::get('admin')->adminName }}" name="adminName"
                class="medium" />
            </td>
          </tr>
          <tr>
            <td>
              <label>Admin Email</label>
            </td>
            <td>
              <input required type="email" value="{{ Session::get('admin')->adminEmail }}" name="adminEmail"
                class="medium" />
            </td>
          </tr>
          <tr>
            <td>
            </td>
            <td>
              <input type="submit" name="submit" Value="Update" />
            </td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div>

@endsection