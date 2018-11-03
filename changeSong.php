<?php
/**
 * Created by PhpStorm.
 * User: taro
 * Date: 18-5-31
 * Time: 上午11:53
 */
include "base.php";
include 'sqlhelper.php';
$mysqli = new sqlhelper();
if($_POST['id']){
    $id = addslashes($_POST['id']);
    $name = addslashes($_POST['name']);
    $description = addslashes($_POST['description']);
    $mp3 = addslashes($_POST['old_mp3']);
    $img = addslashes($_POST['old_img']);
    $files = array('mp3', 'img');
    foreach ($files as $key) {
        if ($_FILES[$key]['name']) {
            if ($key == 'mp3'){
                unlink("mp3/$mp3");
                $mp3 = $_FILES[$key]['name'];
            }elseif ($key == 'img'){
                unlink("img/$img");
                $img = $_FILES[$key]['name'];
            }
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

        }
    }
    $sql = "UPDATE song SET name = '$name',mp3 = '$mp3', img = '$img' ,description = '$description' where id = '$id'";
    $mysqli->execute_dml($sql);
//    if ($_FILES['mp3']['name']){
//        echo "<script>alert('mp3');</script>";
//        unlink("mp3/$mp3");
//        if ($_FILES[$key]["error"] > 0) {
//            echo "Return Code: " . $_FILES['mp3']["error"] . "<br />";
//        } else {
//            echo "Upload: " . $_FILES[$key]["name"] . "<br />";
//            if (file_exists("$key/" . $_FILES["$key"]["name"])) {
//                echo $_FILES["$key"]["name"] . " already exists. ";
//            } else {
//                move_uploaded_file($_FILES["$key"]["tmp_name"],
//                    "$key/" . $_FILES["$key"]["name"]);
//            }
//        }
//
//    }
//    if ($_FILES['img']['name']){
//        echo "<script>alert('img');</script>";
//
//    }

}
if($_GET['id']){
    $id = addslashes($_GET['id']);
    $sql = "SELECT id,name,description,img,mp3 FROM song";
    $res = $mysqli->execute_dql($sql);
    $row = $res->fetch_row();
}
$mysqli->close_sql();
?>
<div id="page-wrapper">

    <div class="header">
        <h1 class="page-header">
            修改广播
        </h1>
    </div>

    <div id="page-inner">

        <div class="row">
            <div class="col-md-12">

                <!-- Advanced Tables -->

                <div class="card">
                    <div class="card-action">
                    </div>
                    <div class="card-content">
                        <form method="post" action="" enctype="multipart/form-data">
                            <table>
                                <tr>
                                    <td>
                                        <font size="5">广播标题</font>
                                    </td>
                                    <td>
                                        <input name="name" value="<?php echo @$row[1];?>" >
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <font size="5">广播简介</font>
                                    </td>
                                    <td>
                                        <input type="text" name="description" value="<?php echo @$row[2];?>" >
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <font size="5">广播图片</font>
                                    </td>
                                    <td>
                                        <img src="img/<?php echo @$row[3]?>" height='50' width='50'>
                                        <input type="file" name="img">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <font size="5">广播音频</font>
                                    </td>
                                    <td>
                                        <audio src='mp3/<?php echo @$row[4]?>' controls>$row[5]</audio>
                                        <input type="file" name="mp3">
                                    </td>
                                </tr>
                                <tr>
                                <input type="hidden" name="id" value="<?php echo @$row[0];?>">
                                <input type="hidden" name="old_mp3" value="<?php echo @$row[4];?>">
                                <input type="hidden" name="old_img" value="<?php echo @$row[3];?>">
                            </table>
                            <div align="center">
                                <button type="submit" class="btn btn-default">修改</button>
                            </div>

                        </form>
                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>
        <!-- /. ROW  -->

    </div>
    <!-- /. PAGE INNER  -->
</div>
<?php
include 'foot.php';
?>
