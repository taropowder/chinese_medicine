<?php
/**
 * Created by PhpStorm.
 * User: yang.yu01
 * Date: 2018/11/3
 * Time: 11:01 AM
 */
include_once "../sqlhelper.php";

$order = 'creat_time';
if (@$_GET['order']){
    $order = addslashes($_GET['order']);
}
$mysql = new sqlhelper();
$sql = "SELECT * FROM song order by $order";
$res = $mysql->execute_dql($sql);
$out_json = array();
while ($row = $res->fetch_assoc()){
    $row['mp3'] = $mp3_dir.$row['mp3'];
    $row['img'] = $img_dir.$row['img'];
    array_push($out_json,$row);
}
echo json_encode($out_json, JSON_UNESCAPED_SLASHES);
