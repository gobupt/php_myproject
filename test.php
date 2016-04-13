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
  <div id="slidershow" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li class="active" data-target="#slidershow" data-slide-to="0"></li>
        <li data-target="#slidershow" data-slide-to="1"></li> 
        <li data-target="#slidershow" data-slide-to="2"></li>
    </ol>
    <!-- 设置轮播图片 -->
    <div class="carousel-inner">
        <div class="item active">
            <a href="##"><img src="http://images3.c-ctrip.com/rk/201407/ll580x145.jpg" alt=""></a>
        </div>
        <div class="item">
            <a href="##"><img src="http://images3.c-ctrip.com/dj/201408/zj/zj_580145.jpg" alt=""></a>
            <div class="carousel-caption">
                <h3>图片标题2</h3>
                <p>描述内容2...</p>
            </div>
        </div>
        <div class="item">
            <a href="##"><img src="http://images3.c-ctrip.com/dj/201408/zqgq_580145.jpg" alt=""></a>
            <div class="carousel-caption">
                <h3>图片标题3</h3>
                <p>描述内容3...</p>
            </div>
        </div>
        <!-- 设置轮播图片控制器 -->
        <a class="left carousel-control" href="#slidershow" role="button" data-slide="prev" >
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#slidershow" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
  </div>
    <script src="js/jquery.1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

