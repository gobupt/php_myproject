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
	<div class="container-fluid" style="margin-bottom: 30px">
		<div class="row">
			<div class="col-md-1">
                    <div class="list-group">
                        <a href="index.php" class="list-group-item ">个人中心</a>
                        <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle list-group-item" type="button" id="" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="true">
                        信息列表
                        <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li><a href="housebuylist.php">查看求购信息</a></li>
                            <li><a href="houseneedlist.php">查看求租信息</a></li>
                            <li><a href="housesalelist.php">查看出售信息</a></li>
                            <li><a href="houserentlist.php">查看出租信息</a></li>
                        </ul>
                        </div>
                        <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle list-group-item active" type="button" id="" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="true">
                        发布信息
                        <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li><a href="housebuy.php">发布求购信息</a></li>
                            <li><a href="houseneed.php">发布求租信息</a></li>
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
						免费发布房屋求购<small>发布信息</small>
					</h1>
				</div>
				<form class="form-horizontal"  action="addhousebuy.handle.php" method="post">
				    <div class="form-group">
				        <label for="title" class="col-md-offset-2 col-md-2 control-label h2">基础信息</label>
				    </div>
					<div class="form-group">
						<label for="province"
							class="col-md-offset-2 col-md-2 control-label">
							<span class="glyphicon glyphicon-star" aria-hidden="true" style="color:red"></span>
							求购地段
							</label>
						<div class="col-md-1">
							<input type="text" class="form-control" name="province"
								id="province" placeholder="省(选填)">
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
						<label for="price" class="col-md-offset-2 col-md-2 control-label">
						<span class="glyphicon glyphicon-star" aria-hidden="true" style="color:red"></span>
						期望价格
						</label>
						<div class="col-md-2">
							<select class="form-control" name="price">
								<option value="1">50以下</option>
								<option value="2">50-80</option>
								<option value="3">80-100</option>
								<option value="4">100-120</option>
								<option value="5">120-150</option>
								<option value="6">150-200</option>
								<option value="7">200以上</option>
							</select>
						</div>
						<div class="col-md-4">
							<p class="form-control-static " style="color: red">万元</p>
						</div>
					</div>
					<div class="form-group">
						<label for="area" class="col-md-offset-2 col-md-2 control-label">
						<span class="glyphicon glyphicon-star" aria-hidden="true" style="color:red"></span>
						期望面积
						</label>
						<div class="col-md-2">
							<select class="form-control" name="area">
								<option value="1">50以下</option>
								<option value="2">50-70</option>
								<option value="3">70-90</option>
								<option value="4">90-120</option>
								<option value="5">120-150</option>
								<option value="6">150-200</option>
								<option value="7">200-500</option>
								<option value="8">500以上</option>
							</select>
						</div>
						<div class="col-md-4">
							<p class="form-control-static " style="color: red">㎡</p>
						</div>
					</div>
				
				    <div class="form-group">
				        <label for="title" class="col-md-offset-2 col-md-2 control-label h2">补充信息</label>
				    </div>
				    <div class="form-group">
						<label for="title" class="col-md-offset-2 col-md-2 control-label">
						<span class="glyphicon glyphicon-star" aria-hidden="true" style="color:red"></span>
						标题
						</label>
						<div class="col-md-3">
							<input type="text" class="form-control" name="title" id="title"
								placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="content"
							class="col-md-offset-2 col-md-2 control-label">补充说明</label>
						<div class="col-md-4">
							<textarea class="form-control" name="content" id="content" rows="10"></textarea>
						</div>
					</div>
				
				    <div class="form-group">
				        <label for="title" class="col-md-offset-2 col-md-2 control-label h2">重要信息</label>
				    </div>
					<div class="form-group">
						<label for="name" class="col-md-offset-2 col-md-2 control-label">
						<span class="glyphicon glyphicon-star" aria-hidden="true" style="color:red"></span>
						姓名
						</label>
						<div class="col-md-2">
							<input type="text" class="form-control" name="name" id="name"
								placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="phone" class="col-md-offset-2 col-md-2 control-label">
						<span class="glyphicon glyphicon-star" aria-hidden="true" style="color:red"></span>
						联系电话
						</label>
						<div class="col-md-2">
							<input type="text" class="form-control" name="phone" id="phone"
								placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">
							<button class="btn btn-primary" type="submit">发布</button>
						</label> <label class="col-md-offset-3 control-label">
							<button class="btn btn-warning" type="reset">重置</button>
						</label>
					</div>
				</form>
				<!--body-->
			</div>
		</div>
	</div>
	<nav class="navbar navbar-inverse" style="margin-bottom: 0">
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
	<script src="js/jquery.1.11.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>