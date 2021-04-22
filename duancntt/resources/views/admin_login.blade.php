
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<link href="dist/images/logo.svg" rel="shortcut icon">
	<title>Admin</title>
	<!-- BEGIN: CSS Assets-->
	<link rel="stylesheet" href="{{asset('public/backend/dist/css/app.css')}}" />
	<!-- END: CSS Assets-->
</head>
<!-- END: Head -->
<body class="login">
	<div class="container sm:px-10">
		<div class="block xl:grid grid-cols-2 gap-4">
			<!-- BEGIN: Login Info -->
			<div class="hidden xl:flex flex-col min-h-screen">
				<a href="" class="-intro-x flex items-center pt-5">
					<img alt="Midone Tailwind HTML Admin Template" class="w-6" src="{{asset('public/backend/dist/images/logo.svg')}}">
					<span class="text-white text-lg ml-3"> Shop<span class="font-medium">Giày</span> </span>
				</a>
				<div class="my-auto">
					<img alt="Midone Tailwind HTML Admin Template" class="-intro-x w-1/2 -mt-16" src="{{asset('public/backend/dist/images/illustration.svg')}}">
					<div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
						Hệ thống quản lý shop
						<br>
						VJP
					</div>
					<div class="-intro-x mt-5 text-lg text-white">Quản lý thông tin cửa hàng</div>
				</div>
			</div>
			<!-- END: Login Info -->
			<!-- BEGIN: Login Form -->
			
			<div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
				<div class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
					<h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
						Đăng nhập
					</h2>
				<form action="{{URL::to('/sc_admin-dashboard')}}" method="post">
					{{csrf_field()}}
					<div class="intro-x mt-2 text-gray-500 xl:hidden text-center">A few more clicks to sign in to your account. Manage all your e-commerce accounts in one place</div>
					<div class="intro-x mt-8">
						<input name="admin_email" type="text" class="intro-x login__input input input--lg border border-gray-300 block" placeholder="Email" required="">
						<input name="admin_password" type="password" class="intro-x login__input input input--lg border border-gray-300 block mt-4" placeholder="Mật khẩu" required="">
					</div>
					<div class="intro-x flex text-gray-700 text-xs sm:text-sm mt-4">
						<div class="flex items-center mr-auto">
							<input type="checkbox" class="input border mr-2" id="remember-me">
							<label class="cursor-pointer select-none" for="remember-me">Nhớ tài khoản</label>
						</div>
					</div>
					<div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
						<button class="button button--lg w-full xl:w-32 text-white bg-theme-1 xl:mr-6">Đăng nhập</button>
					</div>
				</form>
					<div class="intro-x mt-10 xl:mt-24 text-gray-700 text-center xl:text-left">
						@php
						$message = Session::get('message');
						if ($message) {
							echo '<span style="text-align: center;color: red;width: 100%;">',$message,'</span>';
							Session::put('message',null);
						}
					@endphp

					</div>
				</div>
			</div>
			<!-- END: Login Form -->
		</div>
	</div>
	<!-- BEGIN: JS Assets-->
	<script src="{{asset('public/backend/dist/js/app.js')}}"></script>
	<!-- END: JS Assets-->
</body>
</html>
