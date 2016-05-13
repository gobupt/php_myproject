<?php 
    require_once 'include.php';
    $pagesize=5;
    $totalrows=gethousenum("house_buy");   
    $page=$_GET['page']?$_GET['page']:1;
    $totalpage=ceil($totalrows/$pagesize);
    $province=$_GET['province'];
    $city=$_GET['city'];
    $title=$_GET['title'];
    $price=$_GET['price'];
    if($province) $where.="province='$province'";
    if($city) {
        if($where)
        $where.="and city='$city'";
        else 
        $where.="city='$city'";
    }
    if($title) {
        if($where)
        $where.="and title='$title'";
        else 
        $where.="title='$title'";
    }
    if($price)
    $row3 = gethousebypage($pagesize, $page, $totalpage,"house_buy",$where,"price $price");
    else 
    $row3 = gethousebypage($pagesize, $page, $totalpage, "house_buy",$where);
    $where="province=$province&city=$city&title=$title&price=$price";
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
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed"
					data-toggle="collapse" data-target="#navbar" aria-expanded="false"
					aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand">房屋中介管理系统</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="index.php">网站首页</a></li>
				<li><a href="introduce.php">网站介绍</a></li>
			</ul>
			<ul class="nav navbar-nav">
				<li class="dropdown"><a href="#" class="dropdown-toggle"
					data-toggle="dropdown">房屋供应<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="housesalelist.php">房屋出售</a></li>
						<li><a href="houserentlist.php">房屋出租</a></li>
					</ul></li>
			</ul>
			<ul class="nav navbar-nav">
				<li class="dropdown active"><a href="#" class="dropdown-toggle"
					data-toggle="dropdown">房屋需求<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="housebuylist.php">房屋求购</a></li>
						<li><a href="houseneedlist.php">房屋求租</a></li>
					</ul></li>
			</ul>
			<ul class="nav navbar-nav">
				<li><a href="board.php">留言板</a></li>
				<li><a href="newslist.php">最新行情</a></li>
			</ul>
			<?php if($_SESSION['vipname']||$_SESSION['adminname']||$_COOKIE['adminname']) {$name=$_SESSION['vipname'];?>
			<?php if(!isset($_SESSION['adminid'])) {
                        $_SESSION['adminid']=$_COOKIE['adminid'];
                        $_SESSION['adminname']=$_COOKIE['adminname'];
                  } 
            ?>
			<?php if($_SESSION['adminname']) $name=$_SESSION['adminname']?>
			<div class="navbar-right">
				<p class="navbar-text ">
					<strong>亲爱的<?php echo $name?>,欢迎登陆</strong>
				</p>
			    <?php if(!$_SESSION['adminname']) {?>
			    <p class="navbar-text ">
					<a class="navbar-link" href="./vip/index.php">会员中心</a>
				</p>
			    <?php }?>
			    <?php if($_SESSION['adminname']) {?>
			    <p class="navbar-text ">
					<a class="navbar-link" href="./admin/index.php">管理员中心</a>
				</p>
			    <?php }?>
			    <?php if(!$_SESSION['adminname']) {?>
			    <p class="navbar-text ">
					<a class="navbar-link" href="vipexit.handle.php">退出</a>
				</p>
			    <?php }?>
			    <?php if($_SESSION['adminname']) {?>
			    <p class="navbar-text ">
					<a class="navbar-link" href="adexit.handle.php">退出</a>
				</p>
			    <?php }?>
			</div>
			<?php }?>
			<?php if(empty($_SESSION['vipname'])&&empty($_SESSION['adminname'])) {?>
			<form class="navbar-form navbar-right" method="post"
				action="./vip/viplogin.handle.php">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="请输入账号"
						name="username"> <input type="password" class="form-control"
						placeholder="请输入密码" name="password">
				</div>
				<button type="submit" class="btn btn-primary">登录</button>
			</form>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#addvip" data-toggle="modal">注册会员</a></li>
			</ul>
		    <?php }?>
		</div>
	</nav>
	<!--body-->
	<div class="container" style="margin-bottom: 70px">
		<div class="panel panel-danger">
			<div class="panel-heading lead">个人房屋求购</div>
			<div class="panel-body">
				<form class="form-inline" action="housebuylist.php" method="get">
					<div class="form-group">
						<label for="province">省份</label> <input type="search" name="province"
							class="form-control" id="province"
							value="<?php echo $province;?>">
					</div>
					<div class="form-group">
						<label for="city">城市</label> <input type="search" name="city"
							class="form-control" id="city"
							value="<?php echo $city;?>">
					</div>
					<div class="form-group">
						<label for="title">标题</label> <input type="search" name="title"
							class="form-control" id="title"
							value="<?php echo $title;?>">
					</div>
					<div class="form-group">
						<label for="price">价格</label> 
						<select class="form-control" name="price" id="price">
                            <option value="">请选择</option>
                            <option value="asc" <?php if($price=="asc") echo "selected=selected"?>>从低到高</option>
                            <option value="desc" <?php if($price=="desc") echo "selected=selected"?>>从高到低</option>
                        </select>
					</div>
					<button type="submit" class="btn btn-default">搜索</button>
				</form>
			</div>
			<div class="list-group">
	   <?php if($row3&&is_array($row3))
	           foreach ($row3 as $buy) {
	               if(mb_strlen($buy['content'],'utf-8')>=60) {
	                   $content=mb_substr($buy['content'], 0,60,'utf-8')."...";
	               }else {
	                   $content=$buy['content'];
	               }
	   ?>
		<a href="housebuy.php?id=<?php echo $buy[id]?>"
					class="list-group-item ">
					<h3 class="list-group-item-heading">[<?php echo $buy['province'].$buy['city'];?>]<?php echo $buy['title'];?></h3>
					<div class="row">
						<div class="col-md-7">
							<h4 class="list-group-item-text text-left"><?php echo $content;?></h4>
						</div>
						<div class="col-md-offset-2 col-md-3">
							<h4 class="list-group-item-text text-right"><?php echo date("Y/m/d H:i:s",$buy['pubtime']);?></h4>
						</div>
					</div>
					<h4 class="list-group-item-text"><?php echo $buy['name'];?>:&nbsp;&nbsp;<?php echo $buy['phone'];?></h4>
				</a>
		<?php }?>
	   </div>
		</div>
		<div class="col-md-offset-5">
           <?php echo showpage($page, $totalpage,$where);?>
       </div>
	</div>
	<!--body-->
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
	<!-- 触发addvip-->
	<div class="modal" tabindex="-1" role="dialog"
		aria-labelledby="myLargeModalLabel" aria-hidden="true" id="addvip">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&times;</span> <span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title text-center">注册会员</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" action="addvip.handle.php"
						method="post">
						<div class="form-group">
							<label for="username" class="col-sm-2 control-label">用户名</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="username"
									name="username" placeholder="注册用户名">
							</div>
						</div>
						<div class="form-group">
							<label for="password" class="col-sm-2 control-label">密码</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" id="password"
									name="password" placeholder="注册密码">
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="col-sm-2 control-label">姓名</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="name" name="name"
									placeholder="注册姓名">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">性别</label> &nbsp;&nbsp; <label
								class="radio-inline"> <input type="radio" name="sex"
								id="inlineRadio1" value="1"> 男
							</label> <label class="radio-inline"> <input type="radio"
								name="sex" id="inlineRadio2" value="2"> 女
							</label>
						</div>
						<div class="form-group">
							<label for="email" class="col-sm-2 control-label">邮箱</label>
							<div class="col-sm-10">
								<input type="email" class="form-control" id="email" name="email"
									placeholder="注册邮箱">
							</div>
						</div>
						<div class="form-group">
							<label for="id_card" class="col-sm-2 control-label">身份证号</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="id_card"
									name="id_card" placeholder="身份证号">
							</div>
						</div>
						<div class="form-group">
							<label for="phone" class="col-sm-2 control-label">手机号码</label>
							<div class="col-sm-10">
								<input type="tel" class="form-control" id="phone" name="phone"
									placeholder="手机号码">
							</div>
						</div>
						<div class="form-group">
							<label for="address" class="col-sm-2 control-label">地址</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="address"
									name="address" placeholder="地址">
							</div>
						</div>
						<hr />
						<div class="form-group">
							<div class="col-sm-offset-2">
								<button type="submit" class="btn btn-default">注册</button>
								&nbsp;&nbsp;&nbsp;
								<button type="button" class="btn btn-primary"
									data-dismiss="modal">取消</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- 触发addvip-->
	<script src="js/jquery.1.11.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>