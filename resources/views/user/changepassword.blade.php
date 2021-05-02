@extends('layoutnoslider')
@section('content')
<div class="main">
  <div class="content">
    <div class="section group">
      <div class="content_top">
        <div class="heading">
          <h3>ĐỔI MẬT KHẨU</h3>
        </div>
        <div class="clear"></div>
      </div>
      <form action="{{ route('changingpassworduser') }}" method="post">
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
              <td>MẬT KHẨU CŨ</td>
              <td>:</td>
              <td><input required type="password" name="oldpass" id=""></td>
            </tr>
            <tr>
              <td>MẬT KHẨU MỚI</td>
              <td>:</td>
              <td><input required type="password" name="newpass" id=""></td>
            </tr>
            <tr>
              <td>XÁC NHẬN MẬT KHẨU</td>
              <td>:</td>
              <td><input required type="password" name="confirmpass" id=""></td>
            </tr>
            <td colspan="3"><input type="submit" name="update" value="UPDATE"> </td>
            </tr>
      
      </table>
      </form>
     
    </div>
  </div>
</div>
@endsection


