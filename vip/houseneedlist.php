<?php 
    require_once '../include.php';
    if(!isset($_SESSION['vipid']))  alertmes("请先登录", "../index.php");
    $id = $_SESSION['vipid'];
    $row = getonevip($id);
    $pagesize=5;
    $totalrows=gethousenum("house_need","vid=$id");   
    $page=$_GET['page']?$_GET['page']:1;
    $totalpage=ceil($totalrows/$pagesize);
    $row3 = gethousebypage($pagesize, $page, $totalpage,"house_need","vid=$id"); 
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
					<a href="index.php" class="list-group-item ">个人中心</a>
					<div class="dropdown">
						<button
							class="btn btn-default dropdown-toggle list-group-item active"
							type="button" id="" data-toggle="dropdown" aria-haspopup="true"
							aria-expanded="true">
							信息列表 <span class="caret"></span>
						</button>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
							<li><a href="housebuylist.php">查看求购信息</a></li>
							<li><a href="houseneedlist.php">查看求租信息</a></li>
							<li><a href="housesalelist.php">查看出售信息</a></li>
							<li><a href="houserentlist.php">查看出租信息</a></li>
						</ul>
					</div>
					<div class="dropdown">
						<button class="btn btn-default dropdown-toggle list-group-item"
							type="button" id="" data-toggle="dropdown" aria-haspopup="true"
							aria-expanded="true">
							发布信息 <span class="caret"></span>
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
						查看求租信息<small>信息列表</small>
					</h1>
				</div>
				<div class="row">
					<div class="col-md-offset-2 col-md-8">
						<table class="table table-bordered table-hover table-striped ">
							<tr>
								<th class="text-center" style="width: 100px">#</th>
								<th class="text-center">标题</th>
								<th class="text-center" style="width: 200px">发布时间</th>
								<th class="text-center" style="width: 200px">操作</th>
							</tr>
							<?php if ($row3) {
							    $k=($page-1)*$pagesize+1;
							    foreach ($row3 as $v) {
							?>
                            <tr>
								<td class="text-center"><?php echo $k;?></td>
								<td class="text-center"><?php echo $v['title'];?></td>
								<td class="text-center"><?php echo date("Y/m/d H:i:s",$v['pubtime']);?></td>
								<td class="text-center"><a class="btn btn-info btn-xs"
									href="houseneededit.php?id=<?php echo $v['id'];?>">编辑</a> &nbsp;
									&nbsp; <a class="btn btn-danger btn-xs"
									href="houseneeddel.handle.php?id=<?php echo $v['id'];?>">删除</a></td>
							</tr>
							<?php $k++;}
							    }?>
                        </table>
						<div class="col-md-offset-5">
                        <?php echo showpage($page, $totalpage)?>
                        </div>
				</div>
				</div>
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