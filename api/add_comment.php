<?php
/**
 * Created by PhpStorm.
 * User: yang.yu01
 * Date: 2018/11/3
 * Time: 5:37 PM
 */
session_start();
if (isset($_GET['comment'])){
    $comment = addslashes($_GET['comment']);
    $songid = addslashes($_GET['songid']);
    if ($_SESSION['userid']){
        include_once "../sqlhelper.php";
        $mysql = new sqlhelper();
        $time = date('Y-m-d H:i:s');
        $sql = "INSERT INTO comment (comment_time, songid, content) VALUES ('$time', '$songid', '$comment')";
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