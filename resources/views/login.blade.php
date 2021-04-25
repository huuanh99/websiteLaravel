@extends('layoutnoslider')
@section('content')
<div class="main">
	<div class="content">
		<div class="login_panel">
			<h3>Existing Customers</h3>
			@if (Session::get('message')!=null)
			{{ Session::get('message') }}
			{{ Session::forget('message') }}
			@endif
			<form action="{{ route('customerlogin') }}" method="POST">
				@csrf
				<input required name="email" type="text" placeholder="Email">
				<input required name="password" type="password" placeholder="Password">
				<input type="submit" name="login" class="grey" value="SIGN IN"></input>
			</form>
			<p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p>
		</div>
		<div class="register_account">
			<h3>Register New Account</h3>
			<span class="success">
				@if (Session::get('register')!=null)
				{{ Session::get('register') }}
				@endif
			</span>
			<form method="POST" action="{{ route('register') }}">
				@csrf
				<table>
					<tbody>
						<tr>
							<td>
								<div>
									<input required name="name" type="text" placeholder="Name">
								</div>

								<div>
									<input required name="city" type="text" placeholder="City">
								</div>

								<div>
									<input required name="zipcode" type="text" placeholder="Zipcode">
								</div>
								<div>
									<input required name="email" type="email" placeholder="Email">
								</div>
							</td>
							<td>
								<div>
									<input required name="address" type="text" placeholder="Address">
								</div>
								<div>
									<select id="country" name="country" onchange="change_country(this.value)" class="frm-field required">
										@foreach ($countries as $item)
										<option value="{{ $item->id }}">{{ $item->country_name }}</option>
										@endforeach
									</select>
								</div>

								<div>
									<input required name="phone" type="text" placeholder="Phone">
								</div>

								<div>
									<input required name="password" type="password" placeholder="Password">
								</div>
							</td>
						</tr>
					</tbody>
				</table>
				<div class="search">
					<div><input type="submit" name="submit" class="grey" value="Create Account"></input></div>
				</div>
				<p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
				<div class="clear"></div>
			</form>
		</div>
		<div class="clear"></div>
	</div>
</div>
@endsection