{{-- <?php
include_once 'inc/header.php';
if (!isset($_SESSION['customer'])) {
  echo "<script>window.location='login.php'</script>";
} 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
	$updateCustomer=$cs->update_customer($_POST,$_SESSION['customer']);
}
?> --}}

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
          @if (Session::get('message')!=null)
          {{ Session::get('message') }}
          {{ Session::forget('message') }}
          @endif

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
              <td>EMAIL</td>
              <td>:</td>
              <td><input required type="text" name="email" id="" value="{{ Session::get('customer')->email }}"></td>
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


