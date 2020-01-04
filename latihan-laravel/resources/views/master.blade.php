<!DOCTYPE html>
<html>
<head>
	<title>Percobaan Ku</title>
</head>
<link rel="stylesheet" type="text/css" href="{{ ('../asset/css/app.css') }}">
<link rel="stylesheet" type="text/css" href="{{ ('../asset/css/fontawesome-all.css') }}">
<style type="text/css">
	.pagination li{
		float: left;
		list-style-type: none;
		margin: 5px;
	}

	.float{
		position: fixed;
		width: 60px;
		height: 60px;
		bottom: 70px;
		right: 40px;
		background-color: #0C9;
		color: #FFF;
		border-radius: 50px;
		text-align: center;
		box-shadow: 2px 2px 3px #999;
	}

	.my-float{
		margin-top: 22px;
	}

	.navigasi{
		color: white;
		justify-content: center;
	}

	.warna{
		color: white;
	}
</style>
<body>
	<nav class="navbar navbar-expand-md navbar-dark bg-dark">
		<!-- bagian judul halaman blog -->
		<h2 class="warna" style="margin-left: 2%;"> @yield('judul_halaman') </h2>

		<div class="nav-item dropdown" style="margin-left: 70%;">
			<a id="navbarDropdown" class="nav-link dropdown-toggle warna" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
				{{ Auth::user()->name }} <span class="caret"></span>
			</a>

			<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
				<a class="dropdown-item" href="{{ route('logout') }}"
				onclick="event.preventDefault();
				document.getElementById('logout-form').submit();">
				{{ __('Logout') }}
			</a>

			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				@csrf
			</form>
		</div>
	</div>
</nav>
<br/>
<br/>
<!-- bagian konten blog -->
@yield('konten')
<br/>
<br/>
<footer>
	<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-bottom navigasi">
		<a class="nav-item nav-link warna" href="/dashboard">DASHBOARD</a>
		|
		<a class="nav-item nav-link warna" href="/transaksi">TRANSAKSI</a>
		|
		<a class="nav-item nav-link warna" href="/customer">CUSTOMER</a>
	</nav>
</footer>
</body>
<script type="text/javascript" src="{{ ('../asset/js/app.js') }}"></script>
<script type="text/javascript" src="{{ ('../asset/js/fontawesome.js') }}"></script>
<script type="text/javascript" src="{{ ('../asset/js/jquery.js') }}"></script>
</html>