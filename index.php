<?php 
    require_once 'include.php';
    $row = gettopnewbynum(5);
    $row1 = gettophousebynum(5,"house_buy");
    $row2 = gettophousebynum(5,"house_need");
    $row3 = gettophousebynum(8,"house_sale");
    $row4 = gettophousebynum(8,"house_rent");
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
				<li class="active"><a href="index.php">网站首页</a></li>
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
				<li class="dropdown"><a href="#" class="dropdown-toggle"
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
	<div id="slidershow" class="carousel slide" data-ride="carousel"
		data-interval="1800">
		<ol class="carousel-indicators">
			<li class="active" data-target="#slidershow" data-slide-to="0"></li>
			<li data-target="#slidershow" data-slide-to="1"></li>
			<li data-target="#slidershow" data-slide-to="2"></li>
		</ol>
		<!-- 设置轮播图片 -->
		<div class="carousel-inner">
			<div class="item active">
				<a href="##"><img
					src="http://www.fwzjw.roboo.com/upload/2015-11-27/1448614947904-11706.png"
					alt="" height="100"></a>
				<!-- <div class="carousel-caption">
					<h3>图片标题1</h3>
					<p>描述内容1...</p>
				</div> -->
			</div>
			<div class="item">
				<a href="##"><img
					src="http://www.fwzjw.roboo.com/upload/2015-11-27/1448614947904-11706.png"
					alt=""></a>
				<!-- <div class="carousel-caption">
					<h3>图片标题2</h3>
					<p>描述内容2...</p>
				</div> -->
			</div>
			<div class="item">
				<a href="##"><img
					src="http://www.fwzjw.roboo.com/upload/2015-11-27/1448614947904-11706.png"
					alt=""></a>
				<!-- <div class="carousel-caption">
					<h3>图片标题3</h3>
					<p>描述内容3...</p>
				</div> -->
			</div>
		</div>
		<!-- 设置轮播图片控制器 -->
		<a class="left carousel-control" href="#slidershow" role="button"
			data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span>
		</a> <a class="right carousel-control" href="#slidershow"
			role="button" data-slide="next"> <span
			class="glyphicon glyphicon-chevron-right"></span>
		</a>
	</div>
	<div class="container-fluid">
		<div class="panel panel-success">
			<div class="panel-heading text-center h1">房屋需求</div>
			<div class="row">
				<div class="col-md-6">
					<div class="page-header text-center" style="margin-top: 0;">
						<h2>
							房屋求购<small>房屋需求</small>
						</h2>
					</div>
					<div class="text-right">
						<a class="text-right" style="color: black" href="housebuylist.php">查看更多>></a>
					</div>
					<table class="table table-hover">
					   <?php   if($row1&&is_array($row1))
					           foreach ($row1 as $buy) {?>
						<tr>
							<td class="text-left"><a href="housebuy.php?id=<?php echo $buy['id'];?>" style="color: black"><?php echo "[{$buy['city']}]{$buy['title']}" ?></a></td>
							<td class="text-right"><?php echo date("Y/m/d H:i:s",$buy['pubtime']);?></td>
						</tr>
					   <?php }?>
					</table>
				</div>
				<div class="col-md-6">
					<div class="page-header text-center" style="margin-top: 0">
						<h2>
							房屋求租<small>房屋需求</small>
						</h2>
					</div>
					<div class="text-right">
						<a class="text-right" style="color: black" href="houseneedlist.php">查看更多>></a>
					</div>
					<table class="table table-hover">
					   <?php   if($row2&&is_array($row2))
					           foreach ($row2 as $need) {?>
						<tr>
							<td class="text-left"><a href="houseneed.php?id=<?php echo $need['id'];?>" style="color: black"><?php echo "[{$need['city']}]{$need['title']}" ?></a></td>
							<td class="text-right"><?php echo date("Y/m/d H:i:s",$need['pubtime']);?></td>
						</tr>
					   <?php }?>
					</table>
				</div>
			</div>
		</div>
		<div class="panel panel-warning">
			<div class="panel-heading text-center h1">房屋供应</div>
			<div class="row">
				<div class="col-md-6">
					<div class="page-header text-center" style="margin-top: 0;">
						<h2>
							房屋出售<small>房屋供应</small>
						</h2>
					</div>
					<div class="text-right">
						<a class="text-right" style="color: black" href="housesalelist.php">查看更多>></a>
					</div>
					<div class="row">
					   <?php 
					           if($row3 && is_array($row3))
					           foreach ($row3 as $sale) {
					               $img=getoneimgbyhid($sale['id'],"sale");
					   ?>
					   <div class="col-md-3">
					       <a href="housesale.php?id=<?php echo $sale['id'];?>"><img src="<?php echo "images_homethumb/".$img['albumpath'];?>" ></a>
					       <p style="color: red"><strong>一口价:<?php echo $sale['price'];?>万</strong></p>
					       <p><strong><?php echo $sale['community']."[{$sale['province']}{$sale['city']}{$sale['county']}{$sale['town']}]" ?></strong></p>
					   </div>
					   <?php   }?>
					</div>
				</div>
				<div class="col-md-6">
					<div class="page-header text-center" style="margin-top: 0">
						<h2>
							房屋出租<small>房屋供应</small>
						</h2>
					</div>
					<div class="text-right">
						<a class="text-right" style="color: black" href="houserentlist.php">查看更多>></a>
					</div>
					<div class="row">
					   <?php 
					           if($row4 && is_array($row4))
					           foreach ($row4 as $rent) {
					               $img=getoneimgbyhid($rent['id'],"rent");
					   ?>
					   <div class="col-md-3">
					       <a href="houserent.php?id=<?php echo $rent['id'];?>"><img src="<?php echo "images_homethumb/".$img['albumpath'];?>" ></a>
					       <p style="color: red"><strong>租金:<?php echo $rent['rent'];?>元/月</strong></p>
					       <p><strong><?php echo $rent['community']."[{$rent['province']}{$rent['city']}{$rent['county']}{$rent['town']}]" ?></strong></p>
					   </div>
					   <?php   }?>
					</div>
				</div>
			</div>
		</div>
		<div class="panel panel-info">
			<div class="panel-heading text-center h1">最新行情</div>
			<div class="panel-body">
				<span class="lead">导言:在刚刚闭幕的中央经济工作会议指出，明年经济社会发展特别是结构性改革任务十分繁重，主要是抓好去产能、去库存、去杠杆、降成本、补短板五大任务。化解房地产库存成为2016年经济工作的五大任务之一，也让外界对2016年房地产市场的发展平添信心。而在“去库存”基调下的诸多具体举措，也将推动房地产行业转型，为经济发展增添新的动力。</span>
				<div class="text-right">
					<a class="text-right" style="color: black" href="newslist.php">查看更多>></a>
				</div>
			</div>
			<table class="table table-hover ">
            <?php if(!empty($row)) { 
                    foreach ($row as $new) {?>
            <tr>
					<td class="text-left"><span
						class="glyphicon glyphicon-exclamation-sign" style="color: blue"></span>&nbsp;<a
						href="news.php?id=<?php echo $new['id'];?>" style="color: black"><?php echo $new['title']?></a></td>
					<td class="text-right"><?php echo date("Y/m/d H:i:s",$new['pubtime']);?></td>
				</tr>
            <?php }}?>
            </table>
		</div>
	</div>
	<!--body-->
	<nav class="navbar navbar-inverse">
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