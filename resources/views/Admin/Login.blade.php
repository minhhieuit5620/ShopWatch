<!doctype html>
<html lang="en">
  <head>
  	<title>Login 09</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="../../../AssetLogin/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<!-- <div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login #09</h2>
				</div>
			</div> -->
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap py-5">
		      	<div class="img d-flex align-items-center justify-content-center" ><img src="../assets/images/avatars/admin.png" alt="Profile image" class="avatar-rounded"></div>
				  <!-- <div class="img d-flex align-items-center justify-content-center" style="background-image: url(../../../img/avatar-adm/121778924_953961691673990_7773257665991056387_n.jpg);"></div> -->
		      	<h3 class="text-center mb-0">Welcome</h3>
		      	<p class="text-center">Nhập thông tin tài khoản mật khẩu của bạn</p>
				<form action="{{URL::to('/Admin/Login-user')}}" method="post" class="login-form">
				{{csrf_field()}}
		      		<div class="form-group">
		      			<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-user"></span></div>
		      			<input type="text" class="form-control" name="user" placeholder="Username" required>
		      		</div>
					<div class="form-group">
						<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lock"></span></div>
					<input type="password" class="form-control" name="pass" placeholder="Password" required>
					</div>	            
					<div class="form-group">
						<button type="submit" class="btn form-control btn-primary rounded submit px-3">Đăng nhập</button>
					</div>
	          </form>
	          <div class="w-100 text-center mt-4 text">
	          		<p class="mb-0">Bạn quên mật khẩu ?</p>
		          <!-- <a href="#">Sign Up</a> -->
	          </div>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="../assets/js/jquery.min.js"></script>
  <script src="../AssetLogin/popper.js"></script>
  <script src="../assets/css/bootstrap.min.css"></script>
  <script src="../AssetLogin/main.js"></script>

	</body>
</html>

