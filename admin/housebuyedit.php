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
    $id = $_GET['id'];
    $buy = getonehouse($id,"house_buy");
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
<body>
	<nav class="navbar navbar-inverse">
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
					</ul></li>
				<li class="dropdown"><a href="#" class="dropdown-toggle"
					data-toggle="dropdown">房屋列表<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="housebuylist.php">求购信息</a></li>
						<li><a href="houseneedlist.php">求租信息</a></li>
						<li><a href="housesalelist.php">出售信息</a></li>
						<li><a href="houserentlist.php">出租信息</a></li>
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
	<div class="page-header text-center">
		<h1>
			编辑房屋求购<small>编辑信息</small>
		</h1>
	</div>
	<form class="form-horizontal" action="edithousebuy.handle.php"
		method="post">
		<input type="hidden" name="id" value="<?php echo $id?>">
		<div class="form-group">
			<label for="title" class="col-md-offset-2 col-md-2 control-label h2">基础信息</label>
		</div>
		<div class="form-group">
			<label for="province" class="col-md-offset-2 col-md-2 control-label">
				<span class="glyphicon glyphicon-star" aria-hidden="true"
				style="color: red"></span> 求购地段
			</label>
			<div class="col-md-1">
				<input type="text" class="form-control" name="province"
					id="province" placeholder="省(选填)"
					value="<?php echo $buy['province'];?>">
			</div>
			<div class="col-md-1">
				<input type="text" class="form-control" name="city" id="city"
					placeholder="市" value="<?php echo $buy['city'];?>">
			</div>
			<div class="col-md-1">
				<input type="text" class="form-control" name="county" id="county"
					placeholder="区/县" value="<?php echo $buy['county'];?>">
			</div>
			<div class="col-md-1">
				<input type="text" class="form-control" name="town" id="town"
					placeholder="镇/街道" value="<?php echo $buy['town'];?>">
			</div>
			<div class="col-md-2">
				<input type="text" class="form-control" name="address" id="address"
					placeholder="详细地址" value="<?php echo $buy['address'];?>">
			</div>
		</div>
		<div class="form-group">
			<label for="price" class="col-md-offset-2 col-md-2 control-label"> <span
				class="glyphicon glyphicon-star" aria-hidden="true"
				style="color: red"></span> 期望价格
			</label>
			<div class="col-md-2">
				<select class="form-control" name="price">
					<option value="1"
						<?php if($buy['price']==1) echo 'selected="selected"';?>>50以下</option>
					<option value="2"
						<?php if($buy['price']==2) echo 'selected="selected"';?>>50-80</option>
					<option value="3"
						<?php if($buy['price']==3) echo 'selected="selected"';?>>80-100</option>
					<option value="4"
						<?php if($buy['price']==4) echo 'selected="selected"';?>>100-120</option>
					<option value="5"
						<?php if($buy['price']==5) echo 'selected="selected"';?>>120-150</option>
					<option value="6"
						<?php if($buy['price']==6) echo 'selected="selected"';?>>150-200</option>
					<option value="7"
						<?php if($buy['price']==7) echo 'selected="selected"';?>>200以上</option>
				</select>
			</div>
			<div class="col-md-4">
				<p class="form-control-static " style="color: red">万元</p>
			</div>
		</div>
		<div class="form-group">
			<label for="area" class="col-md-offset-2 col-md-2 control-label"> <span
				class="glyphicon glyphicon-star" aria-hidden="true"
				style="color: red"></span> 期望面积
			</label>
			<div class="col-md-2">
				<select class="form-control" name="area">
					<option value="1"
						<?php if($buy['area']==1) echo 'selected="selected"';?>>50以下</option>
					<option value="2"
						<?php if($buy['area']==2) echo 'selected="selected"';?>>50-70</option>
					<option value="3"
						<?php if($buy['area']==3) echo 'selected="selected"';?>>70-90</option>
					<option value="4"
						<?php if($buy['area']==4) echo 'selected="selected"';?>>90-120</option>
					<option value="5"
						<?php if($buy['area']==5) echo 'selected="selected"';?>>120-150</option>
					<option value="6"
						<?php if($buy['area']==6) echo 'selected="selected"';?>>150-200</option>
					<option value="7"
						<?php if($buy['area']==7) echo 'selected="selected"';?>>200-500</option>
					<option value="8"
						<?php if($buy['area']==8) echo 'selected="selected"';?>>500以上</option>
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
			<label for="title" class="col-md-offset-2 col-md-2 control-label"> <span
				class="glyphicon glyphicon-star" aria-hidden="true"
				style="color: red"></span> 标题
			</label>
			<div class="col-md-3">
				<input type="text" class="form-control" name="title" id="title"
					placeholder="" value="<?php echo $buy['title'];?>">
			</div>
		</div>
		<div class="form-group">
			<label for="content" class="col-md-offset-2 col-md-2 control-label">补充说明</label>
			<div class="col-md-4">
				<textarea class="form-control" name="content" id="content" rows="10"><?php echo $buy['content'];?></textarea>
			</div>
		</div>

		<div class="form-group">
			<label for="title" class="col-md-offset-2 col-md-2 control-label h2">重要信息</label>
		</div>
		<div class="form-group">
			<label for="name" class="col-md-offset-2 col-md-2 control-label"> <span
				class="glyphicon glyphicon-star" aria-hidden="true"
				style="color: red"></span> 姓名
			</label>
			<div class="col-md-2">
				<input type="text" class="form-control" name="name" id="name"
					placeholder="" value="<?php echo $buy['name'];?>">
			</div>
		</div>
		<div class="form-group">
			<label for="phone" class="col-md-offset-2 col-md-2 control-label"> <span
				class="glyphicon glyphicon-star" aria-hidden="true"
				style="color: red"></span> 联系电话
			</label>
			<div class="col-md-2">
				<input type="text" class="form-control" name="phone" id="phone"
					placeholder="" value="<?php echo $buy['phone'];?>">
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
								id="inlineRadio1" value="0"> 男
							</label> <label class="radio-inline"> <input type="radio"
								name="sex" id="inlineRadio2" value="1"> 女
							</label>
						</div>
						<div class="form-group">
							<label for="email" class="col-sm-2 control-label">邮箱</label>
							<div class="col-sm-10">
								<input type="email" class="form-control" id="email" name="email"
									placeholder="注册邮箱">
							</div>
						</div>
						<hr />
						<div class="form-group">
							<div class="col-sm-offset-2">
								<button type="submit" class="btn btn-default">添加</button>
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
				        <a class="btn  btn-xs btn-warning"
								href="delad.handle.php?id=<?php echo $val['id']?>">删除</a><?php }?>
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
								<input type="text" class="form-control" id="password"
									name="password" placeholder="">
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
						<hr />
						<div class="form-group">
							<div class="col-sm-offset-2">
								<button type="submit" class="btn btn-default">修改</button>
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
								id="inlineRadio1" value="0"> 男
							</label> <label class="radio-inline"> <input type="radio"
								name="sex" id="inlineRadio2" value="1"> 女
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
								<button type="submit" class="btn btn-default">添加</button>
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
							<td><a class="btn  btn-xs btn-warning"
								href="delvip.handle.php?id=<?php echo $val['id']?>">删除</a></td>
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
							<input type="hidden" name="id[]"
								value="<?php echo $value['id'];?>"> <label for=""
								class="col-sm-1 control-label">#<?php echo $j;?></label> <label
								for="username" class="col-sm-2 control-label">用户名:</label> <label
								for="" class="control-label col-sm-1"><?php echo $value['username'];?></label>
							<label for="password"
								class="col-sm-offset-2 col-sm-1 control-label">密码:</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="password"
									name="password[]" placeholder="请输入大于6位的密码">
							</div>
						</div>
						<?php $j++;}?>
						<hr />
						<div class="form-group">
							<div class="col-sm-offset-5">
								<button type="submit" class="btn btn-default">修改</button>
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
	<!-- 触发editvip-->

	<script src="js/jquery.1.11.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>