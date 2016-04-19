<?php require_once '../include.php';?>
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
                <p class="navbar-text lead" ><strong>房屋中介管理系统</strong></p>
                <p class="navbar-text lead">——会员中心</p>
                <div class="navbar-right">
                <p class="navbar-text lead "><?php echo $_SESSION['vipname']?>,欢迎登陆</p>
                <p class="navbar-text lead "><a class="navbar-link" href="../index.php">网站首页</a></p>
                <p class="navbar-text lead "><a class="navbar-link" href="vipexit.handle.php">退出</a></p>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1">
                    <div class="list-group">
                        <a href="#" class="list-group-item active">个人中心</a>
                        <a href="#" class="list-group-item">留言管理</a>
                        <a href="#" class="list-group-item">房屋列表</a>
                        <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle list-group-item" type="button" id="" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="true">
                        发布信息
                        <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li><a href="#">发布求购信息</a></li>
                            <li><a href="#">发布求租信息</a></li>
                            <li><a href="#">发布出售信息</a></li>
                            <li><a href="#">发布出租信息</a></li>
                        </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-11">
                <!--body-->
                <!--body-->
                </div>
            </div>
        </div>
        <nav class="navbar navbar-inverse navbar-fixed-bottom">
             <div class="row">
               <div class="col-md-offset-4">
                <p class="navbar-text">copyright&copy;&nbsp;2016</p>
                <p class="navbar-text"><strong><em>zhengwen</em></strong></p>
                <p class="navbar-text">All Rights Reserved.</p>
               </div>
             </div>
        </nav>
        <script src="js/jquery.1.11.3.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
  </body>
</html>