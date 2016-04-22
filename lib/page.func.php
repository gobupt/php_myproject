 <?php
function showpage($page, $totalpage, $where = NULL)
{
    $where = ($where==null)?null:"&".$where;
    $url = $_SERVER['PHP_SELF'];
    $index = ($page == 1) ? "首页" : "<a href='$url?page=1$where'>首页</a>";
    $last = ($page == $totalpage) ? "尾页" : "<a href='$url?page=$totalpage$where'>尾页</a>";
    $pre = ($page == 1) ? "上一页" : "<a href='$url?page=" . ($page - 1) . "$where'>上一页</a>";
    $next = ($page == $totalpage) ? "下一页" : "<a href='$url?page=" . ($page + 1) . "$where'>下一页</a>";
    $s = "总共 $totalpage 页/当前是第 $page 页";
    for ($i = 1; $i <= $totalpage; $i ++) {
        if ($i == $page)
            $str .= "[$i]";
        else {
            $str .= "<a href='$url?page=" . $i . "'>[$i]</a>";
        }
    }
    $str = $s . "&nbsp" . $index . "&nbsp" . $pre . "&nbsp" . $str . "&nbsp" . $next . "&nbsp" . $last;
    return $str;
}