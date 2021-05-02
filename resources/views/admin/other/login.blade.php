<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('resources/css/admin/stylelogin.css') }}" media="screen" />
</head>

<body>
	<div class="container">
		<section id="content">
			<form action="{{ route('adminlogin') }}" method="post">
				@csrf
				<h1>Admin Login</h1>
				<span class="success">
					@if (Session::get('message')!=null)
					{{ Session::get('message') }}
					@endif
			</span>
				<div>
					<input type="email" placeholder="Email" required name="adminEmail" />
				</div>
				<div>
					<input type="password" placeholder="Password" required name="adminPass" />
				</div>
				<div>
					<input type="submit" value="Log in" />
				</div>
			</form><!-- form -->
			<div class="button">
				<a href="#">Training with live project</a>
			</div><!-- button -->
		</section><!-- content -->
	</div><!-- container -->
</body>

</html>