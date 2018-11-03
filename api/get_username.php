<?php
/**
 * Created by PhpStorm.
 * User: yang.yu01
 * Date: 2018/11/3
 * Time: 5:04 PM
 */
session_start();
if (isset($_GET['username'])){
    $username = addslashes($_GET['username']);
    if ($_SESSION['userid']){
        include_once "../sqlhelper.php";
        $mysql = new sqlhelper();
        $sql = "UPDATE user SET username VALUES '$username'";

        if ($mysql->execute_dml($sql)){
            $array = array(
                "status" => "success",
            );
        }else{
            $array = array(
                "status" => "error",
            );
        }
        echo json_encode($array);
        $mysql->close_sql();
    }


}