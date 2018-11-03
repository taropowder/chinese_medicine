<?php
/**
 * Created by PhpStorm.
 * User: taro
 * Date: 18-5-31
 * Time: 下午4:56
 */
session_start();
session_destroy();
header("Location: ./login");