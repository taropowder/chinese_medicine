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
                "detail" => "评论成功，请等待审核"
            );
        }else{
            $array = array(
                "status" => "fail",
                "detail" => "评论失败"
            );
        }
        $mysql->close_sql();
    }else{
        $array = array(
            "status" => "fail",
            "detail" => "您未登陆，请登陆后尝试"
        );
    }


}else {
    $array = array(
        "status" => "fail",
        "detail" => "不能提交空"
    );
}
echo json_encode($array, JSON_UNESCAPED_SLASHES);