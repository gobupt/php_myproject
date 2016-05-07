<?php 
    require_once '../include.php';
    if(!isset($_SESSION['vipid']))  alertmes("请先登录会员", "../index.php");
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
	<div class="container-fluid" style="margin-bottom:30px">
		<div class="row">
			<div class="col-md-1">
				<div class="list-group">
					<a href="index.php" class="list-group-item ">个人中心</a> <a href="#"
						class="list-group-item">房屋列表</a>
					<div class="dropdown">
						<button
							class="btn btn-default dropdown-toggle list-group-item active"
							type="button" id="" data-toggle="dropdown" aria-haspopup="true"
							aria-expanded="true">
							发布信息 <span class="caret"></span>
						</button>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
							<li><a href="#">发布求购信息</a></li>
							<li><a href="#">发布求租信息</a></li>
							<li><a href="housesale.php">发布出售信息</a></li>
							<li><a href="houserent.php">发布出租信息</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-11">
				<!--body-->
				<div class="page-header text-center">
					<h1>
						免费发布出租房源<small>发布信息</small>
					</h1>
				</div>
				<form class="form-horizontal" enctype="multipart/form-data" action="addhouserent.handle.php" method="post">
					<div class="form-group">
						<label for="title" class="col-md-offset-2 col-md-2 control-label">房源标题</label>
						<div class="col-md-3">
							<input type="text" class="form-control" name="title" id="title"
								placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="community"
							class="col-md-offset-2 col-md-2 control-label">小区名称</label>
						<div class="col-md-2">
							<input type="text" class="form-control" name="community"
								id="community" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="province"
							class="col-md-offset-2 col-md-2 control-label">地址</label>
						<div class="col-md-1">
							<input type="text" class="form-control" name="province"
								id="province" placeholder="省">
						</div>
						<div class="col-md-1">
							<input type="text" class="form-control" name="city" id="city"
								placeholder="市">
						</div>
						<div class="col-md-1">
							<input type="text" class="form-control" name="county" id="county"
								placeholder="区/县">
						</div>
						<div class="col-md-1">
							<input type="text" class="form-control" name="town" id="town"
								placeholder="镇/街道">
						</div>
						<div class="col-md-2">
							<input type="text" class="form-control" name="address"
								id="address" placeholder="详细地址">
						</div>
					</div>
					<div class="form-group">
						<label for="room"
							class="col-md-offset-2 col-md-2 control-label">户型</label>
						<div class="col-md-1">
							<input type="text" class="form-control" name="room"
								id="room" placeholder="室">
						</div>
						<div class="col-md-1">
							<input type="text" class="form-control" name="hall" id="hall"
								placeholder="厅">
						</div>
						<div class="col-md-1">
							<input type="text" class="form-control" name="toilet" id="toilet"
								placeholder="卫">
						</div>
					</div>
					<div class="form-group">
						<label for="area" class="col-md-offset-2 col-md-2 control-label">房屋面积</label>
						<div class="col-md-1">
							<input type="text" class="form-control" name="area" id="area"
								placeholder="">
						</div>
						<div class="col-md-4">
							<p class="form-control-static">平方米</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-offset-2 col-md-2 control-label">装修程度</label>
						<div class="col-md-2">
							<select class="form-control" name="decoration">
								<option>精装修</option>
								<option>中等装修</option>
								<option>简装修</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="rent" class="col-md-offset-2 col-md-2 control-label">租金</label>
						<div class="col-md-1">
							<input type="text" class="form-control" name="rent" id="rent"
								placeholder="">
						</div>
						<div class="col-md-4">
							<p class="form-control-static">元/月</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-offset-2 col-md-2 control-label">入住时间</label>
						<div class="col-md-2">
							<input type="date" class="form-control" name="time" id="time">
						</div>
					</div>
					<div class="form-group">
						<label for="name"
							class="col-md-offset-2 col-md-2 control-label">姓名</label>
						<div class="col-md-2">
							<input type="text" class="form-control" name="name"
								id="name" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="phone"
							class="col-md-offset-2 col-md-2 control-label">联系电话</label>
						<div class="col-md-2">
							<input type="text" class="form-control" name="phone"
								id="phone" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for=""
							class="col-md-offset-2 col-md-2 control-label">上传图片</label>
						<div class="col-md-2">
							<input type="file" class="form-control" name="image[]"
								id="image" multiple="multiple">
						</div>
					</div>
					<div class="form-group">
						<label for="content" class="col-md-offset-2 col-md-2 control-label">房源描述</label>
						<div class="col-md-5">
							<script id="container" name="content" type="text/plain">
                            </script>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">
						  <button class="btn btn-primary" type="submit">发布</button>
						</label> 
						<label class="col-md-offset-3 control-label">
						  <button class="btn btn-warning" type="reset">重置</button>
						</label>
					</div>
			</form>
			<!--body-->
		</div>
	   </div>
	</div>
	<nav class="navbar navbar-inverse" style="margin-bottom:0">
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
	<script type="text/javascript" src="../UEditor/ueditor.config.js"></script>
    <script type="text/javascript" src="../UEditor/ueditor.all.js"></script>
    <script type="text/javascript">
        var ue = UE.getEditor('container');
    </script>
	<script src="js/jquery.1.11.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>