<?php
/**
 * Created by PhpStorm.
 * User: yang.yu01
 * Date: 2018/11/3
 * Time: 12:33 PM
 */
if($_POST['id']){
    $id = addslashes($_POST['id']);
    $name = addslashes($_POST['name']);
    $description = addslashes($_POST['description']);
    $mp3 = addslashes($_POST['old_mp3']);
    $img = addslashes($_POST['old_img']);
    $files = array('mp3', 'img');
    foreach ($files as $key) {
        if ($_FILES[$key]['name']) {
            $file = eval($key);
            unlink("$key/$file");
            if ($_FILES[$key]["error"] > 0) {
                echo "Return Code: " . $_FILES[$key]["error"] . "<br />";
            } else {
                if (file_exists("$key/" . $_FILES["$key"]["name"])) {
                    echo $_FILES["$key"]["name"] . " already exists. ";
                } else {
                    move_uploaded_file($_FILES["$key"]["tmp_name"],
                        "$key/" . $_FILES["$key"]["name"]);
                }
            }
            $file = $_FILES[$key]['name'];
        }
    }

}