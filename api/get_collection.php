<?php
/**
 * Created by PhpStorm.
 * User: yang.yu01
 * Date: 2018/11/6
 * Time: 11:38 PM
 */
session_start();

if (isset($_SESSION['userid'])) {
    include_once "../sqlhelper.php";
    $mysql = new sqlhelper();
    $user_id = $_SESSION['userid'];
    $sql = "SELECT singid FROM collection where userid = '$user_id'";
    $res = $mysql->execute_dql($sql);
    $out_json = array();
    while ($row = $res->fetch_assoc()) {
        array_push($out_json, $row);
    }
    echo json_encode($out_json, JSON_UNESCAPED_SLASHES);
}