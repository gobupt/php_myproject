<?php 
    require_once '../include.php';
    if(!isset($_SESSION['vipid']))  alertmes("请先登录会员", "../index.php");
    $id = $_SESSION['vipid'];
    $row = getonevip($id);
    $hid = $_GET['id'];
    $sale = getonehouse($hid,"house_sale");
    $imgs = getallimgbyhid($sale['id'],"sale");
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
						编辑出售房源<small>编辑信息</small>
					</h1>
				</div>
				<form class="form-horizontal" enctype="multipart/form-data" action="edithousesale.handle.php" method="post">
				    <input type="hidden" name="hid" value="<?php echo $hid?>">
					<div class="form-group">
						<label for="title" class="col-md-offset-2 col-md-2 control-label">
						<span class="glyphicon glyphicon-star" aria-hidden="true" style="color:red"></span>
						房源标题</label>
						<div class="col-md-3">
							<input type="text" class="form-control" name="title" id="title"
								placeholder="" value="<?php echo $sale['title'];?>">
						</div>
					</div>
					<div class="form-group">
						<label for="community"
							class="col-md-offset-2 col-md-2 control-label">
							<span class="glyphicon glyphicon-star" aria-hidden="true" style="color:red"></span>
							小区名称</label>
						<div class="col-md-2">
							<input type="text" class="form-control" name="community"
								id="community" placeholder="" value="<?php echo $sale['community'];?>">
						</div>
					</div>
					<div class="form-group">
						<label for="province"
							class="col-md-offset-2 col-md-2 control-label">
							<span class="glyphicon glyphicon-star" aria-hidden="true" style="color:red"></span>
							地址</label>
						<div class="col-md-1">
							<input type="text" class="form-control" name="province"
								id="province" placeholder="省(选填)" value="<?php echo $sale['province'];?>">
						</div>
						<div class="col-md-1">
							<input type="text" class="form-control" name="city" id="city"
								placeholder="市" value="<?php echo $sale['city'];?>">
						</div>
						<div class="col-md-1">
							<input type="text" class="form-control" name="county" id="county"
								placeholder="区/县" value="<?php echo $sale['county'];?>">
						</div>
						<div class="col-md-1">
							<input type="text" class="form-control" name="town" id="town"
								placeholder="镇/街道" value="<?php echo $sale['town'];?>">
						</div>
						<div class="col-md-2">
							<input type="text" class="form-control" name="address"
								id="address" placeholder="详细地址" value="<?php echo $sale['address'];?>">
						</div>
					</div>
					<div class="form-group">
						<label for="room"
							class="col-md-offset-2 col-md-2 control-label">
							<span class="glyphicon glyphicon-star" aria-hidden="true" style="color:red"></span>
							户型</label>
						<div class="col-md-1">
							<input type="text" class="form-control" name="room"
								id="room" placeholder="室" value="<?php echo $sale['room'];?>">
						</div>
						<div class="col-md-1">
							<input type="text" class="form-control" name="hall" id="hall"
								placeholder="厅" value="<?php echo $sale['hall'];?>">
						</div>
						<div class="col-md-1">
							<input type="text" class="form-control" name="toilet" id="toilet"
								placeholder="卫" value="<?php echo $sale['toilet'];?>">
						</div>
					</div>
					<div class="form-group">
						<label for="area" class="col-md-offset-2 col-md-2 control-label">
						<span class="glyphicon glyphicon-star" aria-hidden="true" style="color:red"></span>
						房屋面积</label>
						<div class="col-md-1">
							<input type="text" class="form-control" name="area" id="area"
								placeholder="" value="<?php echo $sale['area'];?>">
						</div>
						<div class="col-md-4">
							<p class="form-control-static">平方米</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-offset-2 col-md-2 control-label">
						<span class="glyphicon glyphicon-star" aria-hidden="true" style="color:red"></span>
						装修程度</label>
						<div class="col-md-2">
							<select class="form-control" name="decoration">
								<option value="精装修" <?php if($sale['decoration']=="精装修") echo 'selected="selected"';?>>精装修</option>
								<option value="中等装修" <?php if($sale['decoration']=="中等装修") echo 'selected="selected"';?>>中等装修</option>
								<option value="简装修" <?php if($sale['decoration']=="简装修") echo 'selected="selected"';?>>简装修</option>
							</select>
						</div>
					</div>
					<div class="form-group">
					   <label class="col-md-offset-2 col-md-2 control-label">
					   <span class="glyphicon glyphicon-star" aria-hidden="true" style="color:red"></span>
					   结构
					   </label>
					      <div class="col-md-4">
					       <label class="radio-inline"> 
					           <input type="radio" name="structure" id="inlineRadio1" value="平层" <?php if($sale['structure']=="平层") echo ' checked="checked"';?>> 平层
					       </label> 
					       <label class="radio-inline"> 
					           <input type="radio" name="structure" id="inlineRadio2" value="复式" <?php if($sale['structure']=="复式") echo ' checked="checked"';?>> 复式
					       </label> 
					       <label class="radio-inline"> 
					           <input type="radio" name="structure" id="inlineRadio3" value="板楼" <?php if($sale['structure']=="板楼") echo ' checked="checked"';?>> 板楼
					       </label>
					      </div>
					</div>
					<div class="form-group">
						<label class="col-md-offset-2 col-md-2 control-label">
						<span class="glyphicon glyphicon-star" aria-hidden="true" style="color:red"></span>
						产权性质</label>
						<div class="col-md-2">
							<select class="form-control" name="property">
								<option value="私产平房" <?php if($sale['property']=="私产平房") echo 'selected="selected"';?>>私产平房</option>
								<option value="已购公房" <?php if($sale['property']=="已购公房") echo 'selected="selected"';?>>已购公房</option>
								<option value="经济适用房" <?php if($sale['property']=="经济适用房") echo 'selected="selected"';?>>经济适用房</option>
								<option value="商品房" <?php if($sale['property']=="商品房") echo 'selected="selected"';?>>商品房</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="price" class="col-md-offset-2 col-md-2 control-label">
						<span class="glyphicon glyphicon-star" aria-hidden="true" style="color:red"></span>总价
						</label>
						<div class="col-md-1">
							<input type="text" class="form-control" name="price" id="price"
								placeholder="" value="<?php echo $sale['price'];?>">
						</div>
						<div class="col-md-4">
							<p class="form-control-static">万</p>
						</div>
					</div>
					<div class="form-group">
						<label for="time" class="col-md-offset-2 col-md-2 control-label">建成年代</label>
						<div class="col-md-2">
							<input type="text" class="form-control" name="time" id="time" value="<?php if($sale['time']!="0000") echo $sale['time'];?>">
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="col-md-offset-2 col-md-2 control-label">
						<span class="glyphicon glyphicon-star" aria-hidden="true" style="color:red"></span>
						姓名</label>
						<div class="col-md-2">
							<input type="text" class="form-control" name="name"
								id="name" placeholder="" value="<?php echo $sale['name'];?>">
						</div>
					</div>
					<div class="form-group">
						<label for="phone"
							class="col-md-offset-2 col-md-2 control-label">
							<span class="glyphicon glyphicon-star" aria-hidden="true" style="color:red"></span>
							联系电话</label>
						<div class="col-md-2">
							<input type="text" class="form-control" name="phone"
								id="phone" placeholder="" value="<?php echo $sale['phone'];?>">
						</div>
					</div>
					<div class="form-group">
						<label for=""
							class="col-md-offset-2 col-md-2 control-label">
							已上传图片(删除)</label>
						<div class="col-md-8">
						    <?php
						    if(!$imgs) echo "<p class='form-control-static'>暂未上传图片</p>";
						    if($imgs&&is_array($imgs)) {
						        $count=0;
						        $i=0;
						    foreach ($imgs as $img) {$count++;?>
						    <label class="checkbox-inline">
						    <input type="checkbox" name="delimage[]" value="<?php echo $img['id'];?>" <?php if($i==0) echo "disabled";?>> 
							<img src="<?php echo "../images_homethumb/{$img['albumpath']}";?>" alt="" class="img-rounded">
							</label>
							<?php if($count==4)  {echo "<br>";$count=0;} $i++;
						    }
						    }?>
						</div>
					</div>
					<div class="form-group">
						<label for=""
							class="col-md-offset-2 col-md-2 control-label">
							修改展示图</label>
						<div class="col-md-2">
							<input type="file" class="form-control" name="image_index"
								id="image" >
						</div>
					</div>
					<div class="form-group">
						<label for=""
							class="col-md-offset-2 col-md-2 control-label">
							上传图片</label>
						<div class="col-md-2">
							<input type="file" class="form-control" name="image[]"
								id="image" multiple="multiple">
						</div>
					</div>
					<div class="form-group">
						<label for="content" class="col-md-offset-2 col-md-2 control-label">房源描述</label>
						<div class="col-md-5">
							<script id="container" name="content" type="text/plain"><?php echo $sale['content'];?></script>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">
						  <button class="btn btn-primary" type="submit">编辑</button>
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
    <script type="text/javascript">
        var ue = UE.getEditor('container');
    </script>
	<script src="js/jquery.1.11.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>