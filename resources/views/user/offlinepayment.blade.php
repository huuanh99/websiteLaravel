@extends('layoutnoslider')
@section('content')
<div class="main">
  <div class="content">
    <div class="section group">
      <div class="heading">
        <h3>OFFLINE PAYMENT</h3>
      </div>
      <div class="clear"></div>
      <form action="{{ route('insertOrder') }}" method="post">
        @csrf
        <table class="tblone">
          <tr>
            <td>NAME</td>
            <td>:</td>
            <td><input required type="text" name="name" id="" value="{{ Session::get('customer')->name }}"></td>
          </tr>
          <tr>
            <td>ADDRESS</td>
            <td>:</td>
            <td><input required type="text" name="address" id="" value="{{ Session::get('customer')->address }}"></td>
          </tr>
          <tr>
            <td>ZIPCODE</td>
            <td>:</td>
            <td><input required type="text" name="zipcode" id="" value="{{ Session::get('customer')->zipcode }}"></td>
          </tr>
          <tr>
            <td>PHONE</td>
            <td>:</td>
            <td><input required type="text" name="phone" id="" value="{{ Session::get('customer')->phone }}"></td>
          </tr>
          <tr>
            <td>EMAIL</td>
            <td>:</td>
            <td><input required type="text" name="email" id="" value="{{ Session::get('customer')->email }}"></td>
          </tr>
          <tr>
            <td>TOTAL</td>
            <td>:</td>
            <td>{{ $fm->vndFormat(Session::get('subtotal')*0.95) }}</td>
          </tr>
          <tr>
            <td colspan="3"><input type="submit" name="order" value="ORDER"> </td>
          </tr>

        </table>
      </form>
    </div>
  </div>
</div>


@endsection