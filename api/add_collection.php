<?php
/**
 * Created by PhpStorm.
 * User: yang.yu01
 * Date: 2018/11/6
 * Time: 11:43 PM
 */
session_start();
if (isset($_GET['songid'])) {
    include_once "../sqlhelper.php";
    $mysql = new sqlhelper();
    if ($_SESSION['userid']) {
        $user_id = $_SESSION['userid'];
        $song_id = intval($_GET['songid']);
        $sql = "INSERT INTO collection (userid, singid) VALUES ('$user_id','$song_id')";
        $res = $mysql->execute_dml($sql);
        if ($res) {
            $array = array(
                "status" => "success",
                "detail" => "收藏成功"
            );
        } else {
            $array = array(
                "status" => "fail",
                "detail" => "您未登陆，请登陆后尝试"
            );
        }
    }

} else {
    $array = array(
        "status" => "fail",
        "detail" => "没给出广播"
    );
}
echo json_encode($array, JSON_UNESCAPED_SLASHES);
