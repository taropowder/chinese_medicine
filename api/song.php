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

$mysql = new sqlhelper();
$sql = "SELECT id FROM song";
$id_res = $mysql->execute_dql($sql);
$id_arrary = array();
while ($id_row = $id_res->fetch_row()){
    array_push($id_arrary,$id_row[0]);
}
$id_key = array_rand($id_arrary);
$id = $id_arrary[$id_key];
if (@$_GET['id']){
    $id = addslashes($_GET['id']);
}
$sql = "UPDATE song SET listening_times = listening_times + 1 WHERE id = '$id'";
$mysql->execute_dml($sql);
$sql = "SELECT * FROM song where id = '$id'";
$res = $mysql->execute_dql($sql);
$row = $res->fetch_assoc();
echo json_encode($row);