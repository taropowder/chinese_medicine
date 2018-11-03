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
if ($_POST['name']) {
    $time = date('Y-m-d H:i:s');
    $files = array('mp3', 'img');
    foreach ($files as $key) {
        if ($_FILES[$key]["error"] > 0) {
            echo "ERROR ";
            exit();
        } else {
            if (file_exists("$key/" . $_FILES["$key"]["name"])) {
                echo "<script>alert('{$_FILES[$key]['name']},已经存在了');window.location.href='song.php';</script>";
                exit();
            } else {
                move_uploaded_file($_FILES["$key"]["tmp_name"],
                    "$key/" . $_FILES["$key"]["name"]);
            }
        }
    }
    $mp3 = $_FILES['mp3']["name"];
    $img = $_FILES['img']["name"];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $sql = "INSERT INTO song (name, mp3, img, description, creat_time) VALUES ('$name','$mp3','$img','$description','$time')";
    $res = $mysqli->execute_dml($sql);
    echo "<script>alert('增加成功');window.location.href='managesong.php';</script>";


}
$mysqli->close_sql();

?>
<div id="page-wrapper">

    <div class="header">
        <h1 class="page-header">
           上传广播
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
                        <form method="post" enctype="multipart/form-data">
                            <table>
                                <tr>
                                    <td>
                                        <font size="5">广播标题</font>
                                    </td>
                                    <td>
                                        <input name="name" >
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <font size="5">广播介绍</font>
                                    </td>
                                    <td>
                                        <input name="description" >
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <font size="5">图片</font>
                                    </td>
                                    <td>
                                        <input type="file" name="img" >
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <font size="5">音频文件</font>
                                    </td>
                                    <td>
                                        <input type="file" name="mp3" >
                                    </td>
                                </tr>
                            </table>
                            <div align="center">
                                <button type="submit" class="btn btn-default">增加</button>
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
