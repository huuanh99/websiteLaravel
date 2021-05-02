<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h3>Thông tin đơn hàng của bạn</h3>
  <h3>Nngười nhận:{{ $data->name }}</h3>
  <h3>Zipcode:{{ $data->zipcode }}</h3>
  <h3>Email:{{ $data->email }}</h3>
  <h3>Địa chỉ nhận hàng:{{ $data->address }}</h3>
  <h3>Số điện thoại liên hệ:{{ $data->phone }}</h3>
  <h3>Tổng số tiền:{{ $fm->vndFormat($data->total) }}</h3>
  <h3>Chúc bạn 1 ngày may mắn</h3>
</body>
</html>