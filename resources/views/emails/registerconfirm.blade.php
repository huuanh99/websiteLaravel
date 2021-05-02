<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h3>Xác nhận thông tin tài khoản bạn đăng ký</h3>
  <h3>Tên người dùng:{{ $data->name }}</h3>
  <h3>Thành phố:{{ $data->city }}</h3>
  <h3>Zipcode:{{ $data->zipcode }}</h3>
  <h3>Email:{{ $data->email }}</h3>
  <h3>Địa chỉ:{{ $data->address }}</h3>
  <h3>Số điện thoại:{{ $data->phone }}</h3>
  <h3>Bạn hãy xác nhận tài khoản tại đây:{{ asset('useractivation/') }}/{{ $data->remember_token }}</h3>
</body>
</html>