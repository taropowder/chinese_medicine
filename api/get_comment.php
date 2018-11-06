<?php
/**
 * Created by PhpStorm.
 * User: yang.yu01
 * Date: 2018/11/3
 * Time: 3:25 PM
 */
if (isset($_GET['songid'])){
    include_once "../sqlhelper.php";
    $mysql = new sqlhelper();
    $id = intval($_GET['songid']);
    $sql = "SELECT  comment.content, user.username, comment_time FROM comment,user WHERE  user.id = comment.userid and comment.songid = $id";
    $res = $mysql->execute_dql($sql);
    $out_json = array();
    while ($row = $res->fetch_assoc()){
        array_push($out_json,$row);
    }
    echo json_encode($out_json, JSON_UNESCAPED_SLASHES);
}