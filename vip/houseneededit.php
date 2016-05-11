<?php 
    require_once '../include.php';
    if(!isset($_SESSION['vipid']))  alertmes("请先登录会员", "../index.php");
    $id = $_SESSION['vipid'];
    $row = getonevip($id);
    $id = $_GET['id'];
    $need = getonehouse($id,"house_need");
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
						编辑房屋求租<small>编辑信息</small>
					</h1>
				</div>
				<form class="form-horizontal"  action="edithouseneed.handle.php" method="post">
				    <input type="hidden" name="id" value="<?php echo $id?>">
				    <div class="form-group">
				        <label for="title" class="col-md-offset-2 col-md-2 control-label h2">基础信息</label>
				    </div>
					<div class="form-group">
						<label for="province"
							class="col-md-offset-2 col-md-2 control-label">
							<span class="glyphicon glyphicon-star" aria-hidden="true" style="color:red"></span>
							求租地段
							</label>
						<div class="col-md-1">
							<input type="text" class="form-control" name="province"
								id="province" placeholder="省(选填)" value="<?php echo $need['province'];?>">
						</div>
						<div class="col-md-1">
							<input type="text" class="form-control" name="city" id="city"
								placeholder="市" value="<?php echo $need['city'];?>">
						</div>
						<div class="col-md-1">
							<input type="text" class="form-control" name="county" id="county"
								placeholder="区/县" value="<?php echo $need['county'];?>">
						</div>
						<div class="col-md-1">
							<input type="text" class="form-control" name="town" id="town"
								placeholder="镇/街道" value="<?php echo $need['town'];?>">
						</div>
						<div class="col-md-2">
							<input type="text" class="form-control" name="address"
								id="address" placeholder="详细地址" value="<?php echo $need['address'];?>">
						</div>
					</div>
					<div class="form-group">
						<label for="rent" class="col-md-offset-2 col-md-2 control-label">
						<span class="glyphicon glyphicon-star" aria-hidden="true" style="color:red"></span>
						租金
						</label>
						<div class="col-md-2">
							<select class="form-control" name="rent">
								<option value="1" <?php if($need['rent']==1) echo 'selected="selected"';?>>500-1000</option>
								<option value="2" <?php if($need['rent']==2) echo 'selected="selected"';?>>1000-2000</option>
								<option value="3" <?php if($need['rent']==3) echo 'selected="selected"';?>>2000-3000</option>
								<option value="4" <?php if($need['rent']==4) echo 'selected="selected"';?>>3000-4000</option>
								<option value="5" <?php if($need['rent']==5) echo 'selected="selected"';?>>4000-5000</option>
								<option value="6" <?php if($need['rent']==6) echo 'selected="selected"';?>>5000-6000</option>
								<option value="7" <?php if($need['rent']==7) echo 'selected="selected"';?>>6000-7000</option>
								<option value="8" <?php if($need['rent']==8) echo 'selected="selected"';?>>7000-8000</option>
								<option value="9" <?php if($need['rent']==9) echo 'selected="selected"';?>>8000-9000</option>
								<option value="10" <?php if($need['rent']==10) echo 'selected="selected"';?>>9000-10000</option>
								<option value="11" <?php if($need['rent']==11) echo 'selected="selected"';?>>1万元以上</option>
							</select>
						</div>
						<div class="col-md-4">
							<p class="form-control-static " style="color: red">元/月</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-offset-2 col-md-2 control-label">
						<span class="glyphicon glyphicon-star" aria-hidden="true" style="color:red"></span>
						入住时间
						</label>
						<div class="col-md-2">
							<input type="date" class="form-control" name="time" id="time" value="<?php echo $need['time'];?>">
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
								placeholder="" value="<?php echo $need['title'];?>">
						</div>
					</div>
					<div class="form-group">
						<label for="content"
							class="col-md-offset-2 col-md-2 control-label">补充说明</label>
						<div class="col-md-4">
							<textarea class="form-control" name="content" id="content" rows="10"><?php echo $need['content'];?></textarea>
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
								placeholder="" value="<?php echo $need['name'];?>">
						</div>
					</div>
					<div class="form-group">
						<label for="phone" class="col-md-offset-2 col-md-2 control-label">
						<span class="glyphicon glyphicon-star" aria-hidden="true" style="color:red"></span>
						联系电话
						</label>
						<div class="col-md-2">
							<input type="text" class="form-control" name="phone" id="phone"
								placeholder="" value="<?php echo $need['phone'];?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">
							<button class="btn btn-primary" type="submit">编辑</button>
						</label> <label class="col-md-offset-3 control-label">
							<button class="btn btn-warning" type="reset">重置</button>
						</label>
					</div>
				</form>
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