<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="{{asset('/style/css/ch-ui.admin.css')}}">
	<link rel="stylesheet" href="{{asset('/style/font/css/font-awesome.min.css')}}">
</head>
<body style="background:#F3F3F4;">
	<div class="login_box">
		<h1>Blog</h1>
		<h2>欢迎使用哈后台管理平台</h2>
		<div class="form">
			@if(session('msg'))
				<p style="color:red">{{session('msg')}}</p>
			@endif
			<form action="" method="post">
					{{csrf_field()}}
				<ul>
					<li>
					<input type="text" name="user_name" class="text"/>
						<span><i class="fa fa-user"></i></span>
					</li>
					<li>
						<input type="password" name="user_pass" class="text"/>
						<span><i class="fa fa-lock"></i></span>
					</li>
					<li>
						<input type="text" class="code" name="code"/>
						<span><i class="fa fa-check-square-o"></i></span>
						<img src="{{url('admin/code')}}" alt="" onclick="this.src='{{url('admin/code')}}?'+Math.random()">
					</li>
					<li>
						<input type="submit" value="立即登陆"/>
					</li>
				</ul>
			</form>
			<p><a href="#">返回首页</a> &copy; 2016 Powered by <a href="https://github.com/atoht" target="_blank">github.com/atoht</a></p>
		</div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    // window.location = "https://github.com/atoht"
    localStorage.setItem('localData','localStorage test data111111');//设置数据
    var localData = localStorage.getItem('localData');//取出数据
    sessionStorage.setItem('sessionData','session test data');//设置数据
    var sessionData = sessionStorage.getItem('sessionData');//取出数据
    // $(location).attr('href', '/admin/test');
    self.location.href='/admin/test';
</script>
</body>
</html>
