<?php 
    require_once 'include.php';
    $id = $_GET['id'];
    $sale = getonehouse($id, "house_sale");
    $vid = $_SESSION['vipid'];
    //$rent = array("500-1000","1000-2000","2000-3000","3000-4000","4000-5000","5000-6000","6000-7000","7000-8000","8000-9000","9000-10000","1万元以上");
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
				<li class="dropdown active"><a href="#" class="dropdown-toggle"
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
	<div class="container">
	   <div class="page-header " >
	      <div class="row">
            <div class="col-md-8 text-center"><h2><strong><?php echo $sale['title'];?></strong></h2></div>
            <div class="col-md-4 text-right">
                <h3>
                    <small>
                        发布时间:<?php echo date('Y-m-d H:i:s',$sale['pubtime'])."&nbsp"."&nbsp";
                                    if($_SESSION['adminid']) 
                                        echo "<a class='btn btn-info btn-xs' href='admin/housesaleedit.php?id={$sale['id']}'>编辑</a> &nbsp; | &nbsp; <a class='btn btn-danger btn-xs' href='admin/housesaledel.handle.php?id={$sale['id']}'>删除</a>";
                                    else if($vid == $sale['vid'])
                                        echo "<a class='btn btn-info btn-xs' href='vip/housesaleedit.php?id={$sale['id']}'>编辑</a> &nbsp; | &nbsp; <a class='btn btn-danger btn-xs' href='vip/housesaledel.handle.php?id={$sale['id']}'>删除</a>";
                                 ?>
                    </small>
                </h3>
            </div>
          </div>
       </div>
       <div class="row">
        <div class="col-md-5" style="border-right:1px solid #eee">
        <?php 
            $hid=$id;
            $imgs=getallimgbyhid($hid,"sale");
            $count=count($imgs);
        ?>
        <div id="slidershow" class="carousel slide" data-ride="carousel" style="width: 451px;height:338px"
		data-interval="1800">
		<ol class="carousel-indicators">
			<?php 
			for($i=0;$i<$count;$i++) {
			if($i==0)
			echo <<<eof
<li class="active" data-target="#slidershow" data-slide-to="{$i}"></li>
eof;
			else 
			echo <<<eof
<li data-target="#slidershow" data-slide-to="{$i}"></li>
eof;
			}
			?>
		</ol>
		<!-- 设置轮播图片 -->
		<div class="carousel-inner">
			<?php 
			$i=1;
			foreach ($imgs as $img) {
			if($i==1)
			echo <<<eof
            <div class="item active">
				<a href="##"><img
					src="images_detail/{$img['albumpath']}"
					alt="" ></a>
				<!-- <div class="carousel-caption">
					<h3>图片标题1</h3>
					<p>描述内容1...</p>
				</div> -->
			</div>
eof;
			else 
			echo <<<eof
            <div class="item">
				<a href="##"><img
					src="images_detail/{$img['albumpath']}"
					alt=""></a>
				<!-- <div class="carousel-caption">
					<h3>图片标题3</h3>
					<p>描述内容3...</p>
				</div> -->
			</div>
eof;
			$i++;
			}
			?>
		</div>
		<!-- 设置轮播图片控制器 -->
		<a class="left carousel-control" href="#slidershow" role="button"
			data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span>
		</a> <a class="right carousel-control" href="#slidershow"
			role="button" data-slide="next"> <span
			class="glyphicon glyphicon-chevron-right"></span>
		</a>
	</div>            
        </div>
        <div class="col-md-7">
            <ul class="list-unstyled" style="color:#666;font-size:16px;line-height:26px">
               <li >
                <p>售价&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;<span style="font-size:30px;color:#f60;"><?php echo $sale['price'];?>万元</span></p>
               </li> 
               <li>
                <p>所在小区&nbsp; &nbsp; &nbsp;<?php echo $sale['community'];?> </p>
               </li>
               <li>
                <p>户型&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;<?php echo $sale['room']."室".$sale['hall']."厅".$sale['toilet']."卫";?> </p>
               </li>
               <li>
                <p>面积&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;<?php echo $sale['area'];?>平米</p>
               </li>
               <li>
                <p>装修程度&nbsp; &nbsp; &nbsp;<?php echo $sale['decoration'];?> </p>
               </li>
               <li>
                <p>地址&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;<?php echo $sale['province'].$sale['city'].$sale['county'].$sale['town'].$sale['address'];?> </p>
               </li>
               <li>
                <p>建成年代&nbsp; &nbsp; &nbsp;<?php echo $sale['time'];?> </p>
               </li>
               <li>
                <p>产权性质&nbsp; &nbsp; &nbsp;<?php echo $sale['property'];?> </p>
               </li>
               <li>
                <p>房屋结构&nbsp; &nbsp; &nbsp;<?php echo $sale['structure'];?> </p>
               </li>
               <li>
                <p>联系方式&nbsp; &nbsp; &nbsp;<?php echo $sale['name']."&nbsp;&nbsp;&nbsp;&nbsp;<span class='glyphicon glyphicon-earphone' aria-hidden='true'></span>&nbsp;&nbsp;".$sale['phone'];?> </p>
               </li>
            </ul>
        </div>
       </div>
       <hr/>
       <h1 class="lead" style="margin-top: 50px"><strong><?php echo $sale['content'];?></strong></h1>
       <p style="color: red"><strong>联系我时，请说是在房屋中介管理系统上看到的，谢谢！</strong></p>
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