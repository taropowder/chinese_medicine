<?php
/**
 * Created by PhpStorm.
 * User: yang.yu01
 * Date: 2018/11/3
 * Time: 10:29 AM
 */
if ($_GET['id']){
    $id = addslashes($_GET['id']);
    include_once "sqlhelper.php";
    $mysql = new sqlhelper();
    $sql = "SELECT mp3,img FROM song WHERE id = '$id'";
    $res = $mysql->execute_dql($sql);
    $row = $res->fetch_row();
    $mp3 = $row[0];
    $img = $row[1];
    if (unlink("mp3/$mp3") && unlink("img/$img")){
        $sql = "DELETE FROM song WHERE id = '$id'";
        $mysql->execute_dql($sql);
        echo "<script>alert('删除成功');window.location.href='managesong.php'</script>";
    }else{
        echo "<script>alert('删除失败');window.location.href='managesong.php'</script>";

    }
    $mysql->close_sql();

}