<?php
/**
 * Created by PhpStorm.
 * User: taro
 * Date: 18-5-31
 * Time: 上午10:50
 */
include "base.php";
include_once "sqlhelper.php";
$mysql = new sqlhelper();
$sql = "SELECT name,img,description,creat_time,listening_times,mp3,id FROM song";
$res = $mysql->execute_dql($sql);

?>
    <div id="page-wrapper" >

        <div class="header">
            <h1 class="page-header">
                广播管理
            </h1>
        </div>

        <div id="page-inner">

            <div class="row">
                <div class="col-md-12">

                    <!-- Advanced Tables -->


                    <div class="card">
                        <div class="card-action">广播管理
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th class="center">广播名称</th>
                                        <th class="center">广播图片</th>
                                        <th class="center">广播简介</th>
                                        <th class="center">上传时间</th>
                                        <th class="center">收听次数</th>
                                        <th class="center">点击播放</th>
                                        <th class="center">修改</th>
                                        <th class="center">删除</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        while($row = $res->fetch_array(MYSQLI_NUM)){
                                            echo "<tr>";
                                            echo "<td class=\"center\">$row[0]</td>";
                                            echo "<td class=\"center\"><img src=\"img/$row[1]\" height='50' width='50'></td>";
                                            echo "<td class=\"center\">$row[2]</td>";
                                            echo "<td class=\"center\">$row[3]</td>";
                                            echo "<td class=\"center\">$row[4]</td>";
                                            echo "<td class=\"center\"><audio src='mp3/$row[5]' controls>$row[5]</audio> </td>";
                                            echo "<td><a role=\"button\"  class=\"btn btn-primary\" href='changeSong.php?id=$row[6]'>修改</a></td>";
                                            echo "<td><a role=\"button\"  class=\"btn btn-danger\" href='delSong.php?id=$row[6]'>删除</a></td>";
                                            echo "</tr>";
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            <!--add-->

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