<?php
    require_once '../include.php'; 
    if($_SESSION['vipname'])    alertmes("您已登录会员,请退出", "../index.php");
    if(!isset($_SESSION['adminid'])&&!isset($_COOKIE['adminid']))
        alertmes("请先登录","adlogin.php");
    if(!isset($_SESSION['adminid'])) {
        $_SESSION['adminid']=$_COOKIE['adminid'];
        $_SESSION['adminname']=$_COOKIE['adminname'];
    }
    $row = getalladmin();
    $row2= getallvip();
    $edit = getoneadmin($_SESSION['adminid']);
    /* $row3= getallnew(); */
    $pagesize=3;
    $totalrows=getnewnum();
    $page=$_GET['page']?$_GET['page']:1;
    $totalpage=ceil($totalrows/$pagesize);
    $row3 = getnewbypage($pagesize, $page, $totalpage);
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>房屋中介管理系统后台</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body >
	<nav class="navbar  navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed"
					data-toggle="collapse" data-target="#navbar" aria-expanded="false"
					aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">房屋中介管理系统</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="index.php">首页</a></li>
				<li class="dropdown"><a href="#" class="dropdown-toggle"
					data-toggle="dropdown">管理员<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a data-toggle="modal" href="#addad">添加管理员</a></li>
						<li><a data-toggle="modal" href="#addlist">管理员列表</a></li>
						<li><a data-toggle="modal" href="#addedit">编辑个人资料</a>
					</ul></li>
				<li class="dropdown"><a href="#" class="dropdown-toggle"
					data-toggle="dropdown">会员管理<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="#addvip" data-toggle="modal">添加会员</a></li>
						<li><a href="#viplist" data-toggle="modal">会员列表</a></li>
						<li><a href="#vipedit" data-toggle="modal">编辑会员</a></li>
						<li><a href="board.php">留言板管理</a></li>
					</ul></li>
				<li class="dropdown"><a href="#" class="dropdown-toggle"
					data-toggle="dropdown">房屋管理<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="house.php">发布房屋</a></li>
						<li><a href="houselist.php">房屋列表</a></li>
					</ul></li>
				<li class="dropdown"><a href="#" class="dropdown-toggle"
					data-toggle="dropdown">新闻管理<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="news.php">发布新闻</a></li>
						<li><a href="newslist.php">新闻列表</a></li>
					</ul></li>
			</ul>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<p class="navbar-text">欢迎您,<?php echo "$_SESSION[adminname]"?></p>
					<li><a href="../index.php">前往网站首页</a></li>
					<li><a href="adexit.handle.php">退出登录</a></li>
				</ul>
			</div>
	   </div>
	</nav>
	<!-- 触发addad -->
	<div class="modal" tabindex="-1" role="dialog"
		aria-labelledby="myLargeModalLabel" aria-hidden="true" id="addad">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&times;</span> <span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title text-center">添加管理员</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" action="addad.handle.php"
						method="post">
						<div class="form-group">
							<label for="username" class="col-sm-2 control-label">用户名</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="username" name="username"
									placeholder="注册用户名">
							</div>
						</div>
						<div class="form-group">
							<label for="password" class="col-sm-2 control-label">密码</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" id="password" name="password"
									placeholder="注册密码">
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
						    <label class="col-sm-2 control-label">性别</label>
						    &nbsp;&nbsp;
							<label class="radio-inline"> 
							<input type="radio" name="sex" id="inlineRadio1" value="0"> 男
							</label> 
							<label class="radio-inline"> 
							<input type="radio" name="sex" id="inlineRadio2" value="1"> 女
							</label>
						</div>
						<div class="form-group">
							<label for="email" class="col-sm-2 control-label">邮箱</label>
							<div class="col-sm-10">
								<input type="email" class="form-control" id="email" name="email"
									placeholder="注册邮箱">
							</div>
						</div>
						<hr/>
						<div class="form-group">
						    <div class="col-sm-offset-2">
					       <button type="submit" class="btn btn-default">添加</button>
					       &nbsp;&nbsp;&nbsp;
					       <button type="button" class="btn btn-primary" data-dismiss="modal">取消</button>
					       </div>
					   </div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- 触发addad -->

	<!-- 触发addlist -->
	<div class="modal fade" tabindex="-1" role="dialog"
		aria-labelledby="myLargeModalLabel" aria-hidden="true" id="addlist">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&times;</span> <span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title text-center">管理员列表</h4>
				</div>
				<div class="modal-body">
				    <table class="table table-striped">
				    <tr>
				        <th>id</th>
				        <th>用户名</th>
				        <th>姓名</th>
				        <th>性别</th>
				        <th>邮箱</th>
				        <th>操作</th>
				    </tr>
				    <?php $i=1; foreach ($row as $val) {?>
				    <tr>
				        <td><?php echo $i;?></td>
				        <td><?php echo $val['username'];?></td>
				        <td><?php echo $val['name'];?></td>
				        <td><?php echo $val['sex'];?></td>
				        <td><?php echo $val['email'];?></td>
				        <td><?php if($i!=1) {?>
				        <a class="btn  btn-xs btn-warning" href="delad.handle.php?id=<?php echo $val['id']?>">删除</a><?php }?>
				        </td>
				    </tr>
				    <?php $i++; }?>
				    </table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">关闭</button>
				</div>
			</div>
		</div>
	</div>
	<!-- 触发addlist -->
	
	<!-- 触发addedit-->
		<div class="modal" tabindex="-1" role="dialog"
		aria-labelledby="myLargeModalLabel" aria-hidden="true" id="addedit">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&times;</span> <span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title text-center">编辑个人资料</h4>
				</div>
				<div class="modal-body">
                    <form class="form-horizontal" action="editad.handle.php"
						method="post">
						<div class="form-group">
							<label for="username" class="col-sm-2 control-label">用户名</label>
							<label for="" class="col-sm-2 control-label"><?php echo $edit['username'];?></label>
						</div>
						<div class="form-group">
							<label for="password" class="col-sm-2 control-label">密码</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="password" name="password"
									placeholder="">
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="col-sm-2 control-label">姓名</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="name" name="name"
									placeholder="<?php echo $edit['name'];?>"> 
							</div>
						</div>
						<div class="form-group">
							<label for="email" class="col-sm-2 control-label">邮箱</label>
							<div class="col-sm-10">
								<input type="email" class="form-control" id="email" name="email"
									placeholder="<?php echo $edit['email'];?>"> 
							</div>
						</div>
						<hr/>
						<div class="form-group">
						    <div class="col-sm-offset-2">
					       <button type="submit" class="btn btn-default">修改</button>
					       &nbsp;&nbsp;&nbsp;
					       <button type="button" class="btn btn-primary" data-dismiss="modal">取消</button>
					       </div>
					   </div>
					</form>
				</div>
				</div>
			</div>
		</div>
	</div>
	<!-- 触发addedit-->
    <!-- 触发addvip-->
    <div class="modal" tabindex="-1" role="dialog"
		aria-labelledby="myLargeModalLabel" aria-hidden="true" id="addvip">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&times;</span> <span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title text-center">添加会员</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" action="addvip.handle.php"
						method="post">
						<div class="form-group">
							<label for="username" class="col-sm-2 control-label">用户名</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="username" name="username"
									placeholder="注册用户名">
							</div>
						</div>
						<div class="form-group">
							<label for="password" class="col-sm-2 control-label">密码</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" id="password" name="password"
									placeholder="注册密码">
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
						    <label class="col-sm-2 control-label">性别</label>
						    &nbsp;&nbsp;
							<label class="radio-inline"> 
							<input type="radio" name="sex" id="inlineRadio1" value="0"> 男
							</label> 
							<label class="radio-inline"> 
							<input type="radio" name="sex" id="inlineRadio2" value="1"> 女
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
						        <input type="text" class="form-control" id="id_card" name="id_card"
						            placeholder="身份证号">
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
						        <input type="text" class="form-control" id="address" name="address"
						            placeholder="地址">
						    </div>
						</div>
						<hr/>
						<div class="form-group">
						    <div class="col-sm-offset-2">
					       <button type="submit" class="btn btn-default">添加</button>
					       &nbsp;&nbsp;&nbsp;
					       <button type="button" class="btn btn-primary" data-dismiss="modal">取消</button>
					       </div>
					   </div>
					</form>
				</div>
			</div>
		</div>
	</div>
    <!-- 触发addvip-->
    <!-- 触发listvip-->
    <div class="modal fade" tabindex="-1" role="dialog"
		aria-labelledby="myLargeModalLabel" aria-hidden="true" id="viplist">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&times;</span> <span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title text-center">会员列表</h4>
				</div>
				<div class="modal-body">
				    <table class="table table-striped">
				    <tr>
				        <th>id</th>
				        <th>用户名</th>
				        <th>姓名</th>
				        <th>性别</th>
				        <th>邮箱</th>
				        <th>身份证号</th>
				        <th>注册时间</th>
				        <th>操作</th>
				    </tr>
				    <?php $i=1; foreach ($row2 as $val) {?>
				    <tr>
				        <td><?php echo $i;?></td>
				        <td><?php echo $val['username'];?></td>
				        <td><?php echo $val['name'];?></td>
				        <td><?php echo $val['sex'];?></td>
				        <td><?php echo $val['email'];?></td>
				        <td><?php echo $val['id_card'];?></td>
				        <td><?php $time=$val['regtime'];echo date('y-m-d h:i:s',$time);?></td>
				        <td>
				        <a class="btn  btn-xs btn-warning" href="delvip.handle.php?id=<?php echo $val['id']?>">删除</a>
				        </td>
				    </tr>
				    <?php $i++; }?>
				    </table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">关闭</button>
				</div>
			</div>
		</div>
	</div>
    <!-- 触发listvip-->
    
    <!-- 触发editvip-->
    <div class="modal " tabindex="-1" role="dialog"
		aria-labelledby="myLargeModalLabel" aria-hidden="true" id="vipedit">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&times;</span> <span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title text-center">编辑会员</h4>
				</div>
				<div class="modal-body">
				                
				   <form class="form-horizontal" action="editvip.handle.php"
						method="post">
						<?php $j=1;foreach ($row2 as $value) {?>
						<div class="form-group">
						         <input type="hidden" name="id[]" value="<?php echo $value['id'];?>">
						    <label for="" class="col-sm-1 control-label">#<?php echo $j;?></label>
							<label for="username" class="col-sm-2 control-label">用户名:</label>
							<label for=""  class="control-label col-sm-1"><?php echo $value['username'];?></label>
							<label for="password" class="col-sm-offset-2 col-sm-1 control-label">密码:</label>
							<div class="col-sm-4">
							    <input type="text" class="form-control" id="password" name="password[]"
							        placeholder="请输入大于6位的密码">
							</div>
						</div>
						<?php $j++;}?>
						<hr/>
						<div class="form-group">
						    <div class="col-sm-offset-5">
					       <button type="submit" class="btn btn-default">修改</button>
					       &nbsp;&nbsp;&nbsp;
					       <button type="button" class="btn btn-primary" data-dismiss="modal">取消</button>
					       </div>
					   </div>
					</form>
				</div>  
			</div>
		</div>
	</div>    
    <!-- 触发editvip-->
 	<div class="page-header text-center">
        <h1>新闻列表<small>后台管理</small></h1>
    </div>
    <div class="row ">
       <div class="col-md-offset-3 col-md-7">
        <table class="table table-bordered table-hover table-striped ">
            <tr >
                <th class="text-center">#</th>
                <th class="text-center">标题</th>
                <th class="text-center">来源</th>
                <th class="text-center">发布时间</th>
                <th class="text-center">操作</th>
            </tr>
            <?php if(!empty($row3)) { 
                $k=($page-1)*$pagesize+1;foreach ($row3 as $val) {?>
            <tr>
                <td class="text-center"><?php echo $k;?></td>
                <td class="text-center"><?php echo $val['title']?></td>
                <td class="text-center"><?php echo $val['source']?></td>
                <td class="text-center"><?php echo date("Y/m/d H:i:s",$val['pubtime'])?></td>
                <td class="text-center"> 
                    <a class="btn btn-info btn-xs" href= "newsedit.php?id=<?php echo $val['id'];?>">编辑</a> 
                    &nbsp; &nbsp;
                    <a class="btn btn-danger btn-xs" href="newsdel.handle.php?id=<?php echo $val['id']?>">删除</a>
                </td>
            </tr>
            <?php $k++;}}?>
            <?php echo showpage($page, $totalpage)?>
        </table>
       </div>
    </div>
	<script src="js/jquery.1.11.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>