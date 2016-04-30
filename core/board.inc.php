<?php
/**
 * 增加一条留言
 * @param unknown $fid
 * @param unknown $content
 * @param unknown $cate
 * @param unknown $pubid
 */
function insert_board($fid,$content,$cate,$pubid,$replyid='',$replycate='') {
    $table = "house_board";
    $array = array(
        "fid"=>$fid,
        "content"=>$content,
        "cate"=>$cate,
        "pubid"=>$pubid,
        "pubtime"=>time(),
        "replyid"=>$replyid,
        "replycate"=>$replycate
    );
    return insert($table, $array);
}
/**
 * 获得留言数
 * @return number
 */
function getboardnum() {
    $sql = "select * from house_board where fid=0";
    return getresultnum($sql);
}
function getallboardbypage($pagesize,$page,$totalpage) {
    $offset = ($page-1)*$pagesize;
    $sql = "select * from house_board where fid=0 order by pubtime desc limit $offset,$pagesize";
    $row3 = fetchall($sql);
    return $row3;
}
/**
 * 按页数显示留言板
 * @param number $i
 */
function getboardbypage($i=0) {
    $pagesize=5;
    $totalrows=getboardnum();
    $page=$_GET['page']?$_GET['page']:1;
    $totalpage=ceil($totalrows/$pagesize);
    $rows = getallboardbypage($pagesize, $page, $totalpage);
    if($rows) {
        $i=1;
        $flag=1;
    }
    foreach ($rows as $data) {
        $j = $i+1;
        $id = $data['id'];
        $pubid = $data['pubid'];
        $cate = $data['cate'];
        $sql = "select * from house_board where fid=$id";
        $row = fetchall($sql);
        echo "<table class='table table-hover table-condensed table-bordered'>";
        echo showboard($data,$row,$i);
        echo "</table>";
        echo <<<eof
        <div class="collapse" id="reply{$i}">
            <form action="replymessage.handle.php" method="post">
                <input type="hidden" name="replyid" value="{$pubid}">
                <input type="hidden" name="replycate" value="{$cate}">
                <input type="hidden" name="fid" value="{$id}">
                <script id="replymessage{$j}" name="content" type="text/plain">
                
                </script>
                <button class="btn btn-info" type="submit" onClick="return replymessage{$j}();">回复留言</button>
            </form>
        </div>
eof;
        $i++;
    }
    if($flag)
    echo "<div class='col-md-offset-5'>".showpage($page, $totalpage)."</div>";
    return $i;
}
/**
 * 返回主留言及其回复
 * @param unknown $arr
 * @param unknown $row
 * @param unknown $i
 * @return string
 */
function showboard($arr,$row,$i) {
    $id = $arr['id'];
    $content = $arr['content'];
    $cate = $arr['cate'];
    $pubid = $arr['pubid'];
    $pubtime = date("Y/m/d H:i:s",$arr['pubtime']);
    $color=NULL;
    $username=NULL;
    if($cate == 'ad') {
        $color = "red";
        $sql = "select username from (select A.id,username from house_admin A,house_board B where A.id=B.pubid) as C where id=$pubid";
        $ad=fetchone($sql);
        $username=$ad['username'];
    }
    else {
        $color = "black";
        $sql = "select username from (select A.id,username from house_vip A,house_board B where A.id=B.pubid) as C where id=$pubid";
        $vip=fetchone($sql);
        $username=$vip['username'];
    }
    $s1 = <<<eof
    <tr class="info">
    <td>
    <div class="row">
    <div class="col-md-3">
    <span class="h3" style="color: {$color}">{$username}:</span>
    </div>
    <div class="col-md-offset-8">
    <span class="h3">发表于{$pubtime}
    <a class="btn btn-primary btn-xs" role="button" data-toggle="collapse" href="#reply{$i}">回复</a>
eof;
    if($pubid == $_SESSION['vipid']&& $cate == 'vip') 
        $s1.="&nbsp;<a class='btn btn-danger btn-xs' role='button' href='deletemessage.handle.php?id=$id'>删除</a>";
    if($_SESSION['adminid'] && $cate == 'vip')
        $s1.="&nbsp;<a class='btn btn-danger btn-xs' role='button' href='deletemessage.handle.php?id=$id'>删除</a>";
    if($pubid == $_SESSION['adminid'] && $cate == 'ad')
        $s1.="&nbsp;<a class='btn btn-danger btn-xs' role='button' href='deletemessage.handle.php?id=$id'>删除</a>";
     $s1.= <<<eof
    </span>
    </div>
    </div>
    <p></p>
    {$content}
    </td>
    </tr>
eof;
    $s2 = show_board_message($row,$i);
    return $s1.$s2;
}
/**
 * 返回回复
 * @param unknown $row
 * @param unknown $i
 * @return string
 */
function show_board_message($row,$i) {
    foreach($row as $arr) {
        $id = $arr['id'];
        $content = $arr['content'];
        $cate = $arr['cate'];
        $pubid = $arr['pubid'];
        $pubtime = date("Y/m/d H:i:s",$arr['pubtime']);
        $replyid = $arr['replyid'];
        $replycate = $arr['replycate'];
        $color=NULL;
        $username=NULL;
        $reply_username=NULL;
        $reply_color=NULL;
        if($cate == 'ad') {
            $color = "red";
            $sql = "select username from (select A.id,username from house_admin A,house_board B where A.id=B.pubid) as C where id=$pubid";
            $ad=fetchone($sql);
            $username=$ad['username'];
        }
        else {
            $color = "black";
            $sql = "select username from (select A.id,username from house_vip A,house_board B where A.id=B.pubid) as C where id=$pubid";
            $vip=fetchone($sql);
            $username=$vip['username'];
        }
        if($replycate == 'ad') {
            $reply_color = "red";
            $sql = "select username from (select A.id,username from house_admin A,house_board B where A.id=B.replyid) as C where id=$replyid";
            $ad=fetchone($sql);
            $reply_username=$ad['username'];
        }
        else {
            $reply_color = "black";
            $sql = "select username from (select A.id,username from house_vip A,house_board B where A.id=B.replyid) as C where id=$replyid";
            $vip=fetchone($sql);
            $reply_username=$vip['username'];
        }
        $s1.= <<<eof
        <tr class="success">
        <td>
        <div class="row">
        <div class="col-md-3">
        <span class="h4" style="color: {$color}">{$username}</span> <span class="h4">回复</span> <span class="h4" style="color: {$reply_color}">{$reply_username}:</span>
        </div>
        <div class="col-md-offset-8">
        <span class="h4">发表于{$pubtime}
            <a class="btn btn-primary btn-xs" role="button" data-toggle="collapse" href="#reply{$i}">回复</a>
eof;
    if($pubid == $_SESSION['vipid']&& $cate == 'vip') 
        $s1.="&nbsp;<a class='btn btn-danger btn-xs' role='button' href='deletemessage.handle.php?id=$id'>删除</a>";
    if($_SESSION['adminid'] && $cate == 'vip')
        $s1.="&nbsp;<a class='btn btn-danger btn-xs' role='button' href='deletemessage.handle.php?id=$id'>删除</a>";
    if($pubid == $_SESSION['adminid'] && $cate == 'ad')
        $s1.="&nbsp;<a class='btn btn-danger btn-xs' role='button' href='deletemessage.handle.php?id=$id'>删除</a>";
     $s1.= <<<eof
        </span>
        </div>
        </div>
        <p></p>
        {$content}
        </td>
        </tr>
eof;
    }
    return $s1;
}
/**
 * 删除某条留言
 * @param unknown $id
 */
function delete_board($id) {
    $table = "house_board";
    $where = "id=$id";
    $sql = "select * from house_board where fid=$id";
    $row = fetchall($sql);
    if(isset($row)) {
        foreach ($row as $arr) {
            delete($table,"id={$arr['id']}");  
        }
    }
    delete($table,$where);
}
function showjavascript_board($t) {
    $t-=1;
    for($j=1;$j<=$t;$j++) {
    $i=$j+1;
    $str.=<<<eof
    <script type="text/javascript">
    UE.delEditor("replymessage{$i}");
    var ue{$i} = UE.getEditor('replymessage{$i}',{
        maximumWords:'100',
         
    });
    
    function replymessage{$i}() {
        var flag=ue{$i}.hasContents();
        var number=ue{$i}.getContentLength(true);
        if(flag==0) {
            alert('请输入内容');
            return false;
        }
        else if(number>100) {
            alert('对不起,您输入的内容过长');
            return false;
        }
        else
            return true;
    }
    
    </script>
eof;
    }
    return $str;
}