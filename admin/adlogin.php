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
  
    <div class="container">
        <nav class="navbar navbar-default">
        <h1 class="text-center">房屋中介管理系统</h1>
        <h2 class="text-center">后台登录</h2>
        </nav>
        <hr />
       <form class="form" action="adlogin.handle.php" method="post">
          <div class="form-group">
            <label for=username>用户名</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="请输入用户名">
          </div>
          <div class="form-group">
            <label for=password>密码</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="请输入密码">
          </div>
          <div class="form-group">
            <label for=veryfy>验证码</label>
            <input type="text" class="form-control" id="verify" name="verify" placeholder="请输入验证码">
          </div>
          <img src="../lib/getVerify.php" alt="验证码">
          <div class="checkbox">
          <label>
            <input type="checkbox" name="autoFlag" value="1">  是否一周内自动登录？
          </label>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">登录</button>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button type="reset" class="btn btn-warning">重置</button>
          </div>
       </form>
    </div> 
  <body>
    <script src="js/jquery.1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>