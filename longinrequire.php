<?php
/**
 * Created by PhpStorm.
 * User: taro
 * Date: 18-5-31
 * Time: 下午4:52
 */
session_start();
if (!isset($_SESSION['name'])){
    header("Location: ./login");
}