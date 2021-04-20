@extends('layoutnoslider')
@section('content')
<div class="main">
  <div class="content">
    <div class="section group">
      <div class="content_top">
        <div class="heading">
          <h3>Payment Method</h3>
        </div>
        <div class="clear"></div>
        <div class="wrapper_method">
          <h3 class="payment">Choose your payment method</h3>
          <a href="{{ route('offlinepayment') }}">Offline Payment</a>
          <a href="onlinepayment.php">Online Payment</a>
        </div>
      </div>


    </div>
  </div>
</div>


@endsection
