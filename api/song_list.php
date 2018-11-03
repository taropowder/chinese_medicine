<?php
/**
 * Created by PhpStorm.
 * User: yang.yu01
 * Date: 2018/11/3
 * Time: 11:01 AM
 */
include_once "../sqlhelper.php";
$mp3_dir = "http://192.168.64.2/wechat/mp3/";
$img_dir = "http://192.168.64.2/wechat/img/";

$order = 'creat_time';
if (@$_GET['order']){
    $order = addslashes($_GET['order']);
}
$mysql = new sqlhelper();
$sql = "SELECT * FROM song order by $order";
$res = $mysql->execute_dql($sql);
while ($row = $res->fetch_assoc()){
    $row['mp3'] = $mp3_dir.$row['mp3'];
    $row['img'] = $img_dir.$row['img'];
    echo json_encode($row, JSON_UNESCAPED_SLASHES);
}