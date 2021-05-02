@extends('admin.layout')
@section('content')
<div class="grid_10">
  <div class="box round first grid">
    <h2>
      @if ($order->status==0)
      <a onclick="return confirm('Bạn xác nhận đã xử lý đơn hàng')"
         href="{{ route('handleOrder',['id'=>$order->id]) }}">
         Trạng thái : Chờ xử lý
      </a>
      @elseif($order->status==1)
      Trạng thái : Đang vận chuyển
      @else
      Trạng thái : Giao hàng thành công
      @endif
    </h2>
    <h2>Thông tin khách hàng</h2>
    <div class="block">
      <table class="table table-bordered table-dark table-hover ">
        <tr>
          <th>Tên người đặt hàng</th>
          <td>{{ $order->name }}</td>
        </tr>
        <tr>
          <th>Thời gian đặt hàng</th>
          <td>{{ $fm->formatDate($order->time_order) }}</td>
        </tr>
        <tr>
          <th>Số điện thoại</th>
          <td>{{ $order->phone }}</td>
        </tr>
        <tr>
          <th>Địa chỉ</th>
          <td>{{ $order->address }}</td>
        </tr>
        <tr>
          <th>Email</th>
          <td>{{ $order->email }}</td>
        </tr>
        <tr>
          <th>Zipcode</th>
          <td>{{ $order->zipcode }}</td>
        </tr>
        <tr>
          <th>Tổng số tiền</th>
          <td>{{ $fm->vndFormat($order->total) }}</td>
        </tr>
      </table>
    </div>
    <h2>Chi tiết đơn hàng</h2>
    <div class="block">
      <table class="data display datatable" id="example">
        <thead>
          <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Image</th>
            <th>Giá tiền</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
          </tr>

        </thead>
        <tbody>
          @foreach ($orderdetails as $key => $item)
          <tr class="odd gradeX">
            <td>{{ ++$key }}</td>
            <td>{{ $fm->textShorten($item->product->productName,40) }}</td>
            <td><img width="100" src="{{ asset('uploads') }}/{{ $item->product->image }}" alt=""></td>
            <td>{{ $fm->vndFormat($item->product->price) }}</td>
            <td>{{ $item->quantity }}</td>
            <td>{{ $fm->vndFormat($item->product->price*$item->quantity) }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>

    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
		setupLeftMenu();
		$('.datatable').dataTable();
		setSidebarHeight();
	});
</script>

@endsection