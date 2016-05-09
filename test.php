<?php
    require_once 'include.php'; 
    $id=7;
    $sql = "select name from (select A.id,name from house_admin A,house_board B where A.id=B.pubid) as C where id=$id";
    $ad=fetchone($sql);
    print_r($ad);
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
	<form action="test2.php" method="post" enctype="multipart/form-data">
		<script id="container" name="content" type="text/plain">
        
        </script>

		<label class="checkbox-inline"> <input type="checkbox"
			id="inlineCheckbox1" value="option1" name="c1[]"> 1
		</label> <label class="checkbox-inline"> <input type="checkbox"
			id="inlineCheckbox2" value="option2" name="c1[]"> 2
		</label> <label class="checkbox-inline"> <input type="checkbox"
			id="inlineCheckbox3" value="option3" name="c1[]"> 3
		</label>
		<input type="submit" placeholder="">
	</form>

	<script type="text/javascript" src="./UEditor/ueditor.config.js"></script>
	<script type="text/javascript" src="./UEditor/ueditor.all.js"></script>
	<script type="text/javascript">
        var ue = UE.getEditor('container');
    </script>
	<script src="js/jquery.1.11.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
