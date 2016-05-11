 <?php
function showpage($page, $totalpage, $where = NULL)
{   
    if(!$totalpage) return ;
    $where = ($where==null)?null:"&".$where;
    $url = $_SERVER['PHP_SELF'];
    $index = ($page == 1) ? "<li class='disabled'><a href='$url?page=1$where'><span>&laquo</span></a></li>" : "<li><a href='$url?page=1$where'><span>&laquo</span></a></li>";
    $last = ($page == $totalpage) ? "<li class='disabled'><a href='$url?page=$totalpage$where' ><span>&raquo;</span></a></li>" : "<li><a href='$url?page=$totalpage$where' ><span>&raquo;</span></a></li>";
    $pre = ($page == 1) ? "<li class='disabled'><a href='$url?page=1$where'><span>&lsaquo;</span></a></li>" : "<li ><a href='$url?page=" . ($page - 1) . "$where'><span>&lsaquo;</span></a></li>";
    $next = ($page == $totalpage) ? "<li class='disabled'><a href='$url?page=" .$totalpage. "$where'><span>&rsaquo;</span></a></li>" : "<li ><a href='$url?page=" . ($page + 1) . "$where'><span>&rsaquo;</span></a></li>";
    for ($i = 1; $i <= $totalpage; $i ++) {
        if ($i == $page)
            $str .= "<li class='active'><a href='$url?page=" . $i . "'>$i</a></li>";
        else {
            $str .= "<li><a href='$url?page=" . $i . "'>$i</a></li>";
        }
    }
    $formathead = "<nav><ul class='pagination '>";
    $formatfoot = "</ul></nav>";
    $str = $formathead.  $index .  $pre .  $str .  $next .  $last . $formatfoot;
    return $str;
}
