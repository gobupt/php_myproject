<?php 
    require_once '../include.php';
    if(!isset($_SESSION['vipid']))  alertmes("请先登录", "../index.php");
    $id = $_SESSION['vipid'];
    $row = getonevip($id);
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<nav class="navbar navbar-inverse  ">
		<div class="container-fluid">
			<p class="navbar-text lead">
				<strong>房屋中介管理系统</strong>
			</p>
			<p class="navbar-text lead">——会员中心</p>
			<div class="navbar-right">
				<p class="navbar-text lead "><?php echo $_SESSION['vipname']?>,欢迎登陆</p>
				<p class="navbar-text lead ">
					<a class="navbar-link" href="../index.php">网站首页</a>
				</p>
				<p class="navbar-text lead ">
					<a class="navbar-link" href="vipexit.handle.php">退出</a>
				</p>
			</div>
		</div>
	</nav>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1">
				<div class="list-group">
					<a href="index.php" class="list-group-item active">个人中心</a> 
					<a href="#" class="list-group-item">房屋列表</a>
					<div class="dropdown">
						<button class="btn btn-default dropdown-toggle list-group-item"
							type="button" id="" data-toggle="dropdown" aria-haspopup="true"
							aria-expanded="true">
							发布信息 <span class="caret"></span>
						</button>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
							<li><a href="#">发布求购信息</a></li>
							<li><a href="#">发布求租信息</a></li>
							<li><a href="#">发布出售信息</a></li>
							<li><a href="#">发布出租信息</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-11">
				<!--body-->
				<div class="page-header text-right">
					<h1 class="text-center">
						会员信息管理 <small>个人中心</small>
					</h1>
				</div>
				<form class="form-horizontal" method="post"
					action="editvip.handle.php">
					<div class="form-group">
						<label for="username"
							class="col-md-offset-2 col-md-2 control-label">用户名</label> <label
							for="" class="col-md-2 control-label"><?php echo $row['username'];?></label>
					</div>
					<div class="form-group">
						<label for="password"
							class="col-md-offset-2 col-md-2 control-label">密码</label>
						<div class="col-md-4">
							<input type="password" class="form-control" id="password"
								name="password" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="col-md-offset-2 col-md-2 control-label">姓名</label>
						<div class="col-md-4">
							<input type="text" class="form-control" id="name" name="name"
								placeholder="<?php echo $row['name'];?>">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-md-offset-2 col-md-2 control-label">性别</label>
						<div class="col-md-4">
							<select class="form-control" name="sex">
								<option value="1">男</option>
								<option value="2">女</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-md-offset-2 col-md-2 control-label">邮箱</label>
						<div class="col-md-4">
							<input type="email" class="form-control" id="email" name="email"
								placeholder="<?php echo $row['email'];?>">
						</div>
					</div>
					<div class="form-group">
						<label for="id_card"
							class="col-md-offset-2 col-md-2 control-label">身份证号</label>
						<div class="col-md-4">
							<input type="text" class="form-control" id="id_card"
								name="id_card" placeholder="<?php echo $row['id_card'];?>">
						</div>
					</div>
					<div class="form-group">
						<label for="phone" class="col-md-offset-2 col-md-2 control-label">手机号</label>
						<div class="col-md-4">
							<input type="tel" class="form-control" id="phone" name="phone"
								placeholder="<?php echo $row['phone'];?>">
						</div>
					</div>
					<div class="form-group">
						<label for="address"
							class="col-md-offset-2 col-md-2 control-label">通讯地址</label>
						<div class="col-md-4">
							<input type="text" class="form-control" id="address"
								name="address" placeholder="<?php echo $row['address'];?>">
						</div>
					</div>
					<br /> <br />
					<button type="submit" class="btn btn-primary col-md-offset-5">修改</button>
					<button type="reset" class="btn btn-danger col-md-offset-1">重置</button>
				</form>
				<!--body-->
			</div>
		</div>
	</div>
	<nav class="navbar navbar-inverse navbar-fixed-bottom">
		<div class="row">
			<div class="col-md-offset-4">
				<p class="navbar-text">copyright&copy;&nbsp;2016</p>
				<p class="navbar-text">
					<strong><em>zhengwen</em></strong>
				</p>
				<p class="navbar-text">All Rights Reserved.</p>
			</div>
		</div>
	</nav>
	<script src="js/jquery.1.11.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>