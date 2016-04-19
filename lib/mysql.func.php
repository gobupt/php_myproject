<?php
/**
 * 连接数据库
 * @return resource
 */
function connect() {
    $link = mysql_connect(DB_HOST,DB_USER,DB_PWD) or die("数据库连接失败");
    mysql_set_charset(DB_CHARSET);
    mysql_select_db(DB_DBNAME) or die("数据库连接失败");
    return $link;
}

/**
 * 插入数据
 * @return number
 */
function insert($table,$array) {
    $keys = join(",",array_keys($array));
    $value = "'".join("','",array_values($array))."'";
    $sql = "insert $table ($keys) values($value)";
    mysql_query($sql);
    return mysql_insert_id();
}
/**
 * 更新操作
 * @param unknown $table
 * @param unknown $array
 * @param string $where
 * @return number
 */
function update($table,$array,$where=null) {
    foreach ($array as $key=>$val) {
        if($str==null) {
            $sep="";
        }else {
            $sep=",";
        }
        $str.=$sep.$key."='".$val."'";
    }
    $sql = "update $table set $str ".($where==null? null:"where $where");
    mysql_query($sql);
    return mysql_affected_rows();
}
/**
 * 删除记录
 * @param unknown $table
 * @param string $where
 * @return number
 */
function delete($table,$where=null) {
    $where = ($where==null? null:"where $where");
    $sql = "delete from $table $where";
    mysql_query($sql);
    return mysql_affected_rows();
}
/**
 * 得到一条记录
 * @param unknown $sql
 * @return multitype:
 */
function fetchone($sql) {
    $result=mysql_query($sql);
    $row = mysql_fetch_assoc($result);
    return $row;
}
/**
 * 得到所有记录
 * @param unknown $sql
 * @return Ambigous <>
 */
function fetchall($sql) {
    $result=mysql_query($sql);
    while($row = mysql_fetch_assoc($result)) {
        $data[]=$row;
    }
    return $data;
}
/**
 * 得到结果集中的记录条数
 * @param unknown $sql
 * @return number
 */
function getresultnum($sql) {
    $result=mysql_query($sql);
    return mysql_num_rows($result);
}