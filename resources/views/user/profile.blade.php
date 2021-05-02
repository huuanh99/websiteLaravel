@extends('layoutnoslider')
@section('content')
<div class="main">
  <div class="content">
    <div class="section group">
      <div class="content_top">
        <div class="heading">
          <h3>Profile Customer</h3>
        </div>
        <div class="clear"></div>
      </div>
      <form action="{{ route('updatecustomer') }}" method="post">
      @csrf
      <table class="tblone">
        <tr>
          <span class="success">
          @if (Session::get('message')!=null)
          {{ Session::get('message') }}
          @endif
          </span>
        </tr>
       
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
              <td>COUNTRY</td>
              <td>:</td>
              <td>
                <select id="country" name="country" onchange="change_country(this.value)" class="frm-field required">
                  @foreach ($countries as $item)
                  @if (Session::get('customer')->country_id==$item->id)
                  <option selected value="{{ $item->id }}">{{ $item->country_name }}</option>
                  @else
                  <option value="{{ $item->id }}">{{ $item->country_name }}</option>
                  @endif
                  @endforeach
                </select>
              </td>
            </tr>
            <tr>
              <td>CITY</td>
              <td>:</td>
              <td><input required type="text" name="city" id="" value="{{ Session::get('customer')->city }}"></td>
            </tr>
            <tr>
            <td colspan="3"><input type="submit" name="update" value="UPDATE"> </td>
            </tr>
      
      </table>
      </form>
     
    </div>
  </div>
</div>
@endsection


