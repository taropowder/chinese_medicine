<?php
include_once "../sqlhelper.php";
//ini_set("display_errors", "On");
//error_reporting(E_ALL | E_STRICT);
session_start();
function httpGet($url){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_TIMEOUT, 500);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, true);
    curl_setopt($curl, CURLOPT_URL, $url);
    $res = curl_exec($curl);
    curl_close($curl);
    return $res;
}
//发送
if (isset($_GET['code'])){
    $code = $_GET['code'];
    $api = "https://api.weixin.qq.com/sns/jscode2session?appid={$appid}&secret={$secret}&js_code={$code}&grant_type=authorization_code";
    //api接口
    $str = httpGet($api);
    $arr = json_decode($str);
    $openid = $arr->openid;
    $_SESSION['openid'] = $openid;
    $mysql = new sqlhelper();
    $sql_select = "SELECT id FROM user WHERE openid = '$openid'";
    $res = $mysql->execute_dql($sql_select);
    if ($res->num_rows == 0){
        $sql = "INSERT INTO user (openid) VALUES ('$openid')";
        $mysql->execute_dml($sql);
        $res = $mysql->execute_dql($sql_select);
    }
    $row = $res->fetch_assoc();
    $_SESSION['userid'] = $row['id'];
    $mysql->close_sql();
    echo $str;
}

?>