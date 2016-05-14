<?php 
    require_once 'include.php';
    $id = $_GET['id'];
    $need = getonehouse($id, "house_need");
    $vid = $_SESSION['vipid'];
    $rent = array("500-1000","1000-2000","2000-3000","3000-4000","4000-5000","5000-6000","6000-7000","7000-8000","8000-9000","9000-10000","1万元以上");
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
	<div class="container">
	   <div class="page-header " >
	      <div class="row">
            <div class="col-md-8 text-center"><h2><strong><?php echo $need['title'];?></strong></h2></div>
            <div class="col-md-4 text-right">
                <h3>
                    <small>
                        发布时间:<?php echo date('Y-m-d H:i:s',$need['pubtime'])."&nbsp"."&nbsp";
                                    if($_SESSION['adminid']) 
                                        echo "<a class='btn btn-info btn-xs' href='admin/houseneededit.php?id={$need['id']}'>编辑</a> &nbsp; | &nbsp; <a class='btn btn-danger btn-xs' href='admin/houseneeddel.handle.php?id={$need['id']}'>删除</a>";
                                    else if($vid == $need['vid'])
                                        echo "<a class='btn btn-info btn-xs' href='vip/houseneededit.php?id={$need['id']}'>编辑</a> &nbsp; | &nbsp; <a class='btn btn-danger btn-xs' href='vip/houseneeddel.handle.php?id={$need['id']}'>删除</a>";
                                 ?>
                    </small>
                </h3>
            </div>
          </div>
       </div>
       <div class="row">
        <div class="col-md-6" style="border-right:1px solid #eee">
            <ul class="list-unstyled" style="margin-bottom: 50px;margin-top:50px">
               <li style="margin-bottom: 50px">
                <h4>地点：<?php echo $need['province'].$need['city'].$need['county'].$need['town'].$need['address'];?>  </h4>
               </li> 
               <li style="margin-bottom: 50px">
                <h4>期望租金：<?php echo $rent[$need['rent']-1];?> 元/月</h4>
               </li>
               <li>
                <h4>入住时间：<?php echo $need['time'];?> </h4>
               </li> 
            </ul>
        </div>
        <div class="col-md-6" >
            <ul class="list-unstyled" style="margin-bottom: 50px;margin-top:50px">
               <li style="margin-bottom: 100px">
                <h4>联系人：<?php echo $need['name'];?> </h4>
               </li> 
               <li>
                <h4>联系电话：<?php echo $need['phone'];?> </h4>
               </li>
            </ul>
        </div>
       </div>
       <hr/>
       <p class="lead" style="margin-top: 50px"><?php echo $need['content'];?></p>
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