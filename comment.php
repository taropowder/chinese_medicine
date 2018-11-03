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

if (@$_GET['display_id']){
    $id = addslashes($_GET['display_id']);
    $sql = "UPDATE comment SET display = TRUE WHERE id = '$id'";
    $mysql->execute_dml($sql);
    echo "<script>alert('审核成功');</script>";

}
if (@$_GET['del_id']){
    $id = addslashes($_GET['del_id']);
    $sql = "DELETE FROM comment WHERE id = '$id'";
    $mysql->execute_dml($sql);
    echo "<script>alert('删除成功');</script>";

}
$sql = "SELECT
  song.name,
  comment.comment_time,
  user.username,
  comment.content,
  comment.display,
  comment.id
FROM song, user, comment
where comment.userid = user.id and comment.songid = song.id";
if (isset($_GET['display'])){
    $display =   intval($_GET['display']);
    $sql = $sql." and display = $display";

}

$res = $mysql->execute_dql($sql);

?>
    <div id="page-wrapper" >

        <div class="header">
            <h1 class="page-header">
                评论管理
            </h1>
        </div>

        <div id="page-inner">

            <div class="row">
                <div class="col-md-12">

                    <!-- Advanced Tables -->


                    <div class="card">
                        <div class="card-action">评论管理
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th class="center">评论广播</th>
                                        <th class="center">评论时间</th>
                                        <th class="center">评论用户</th>
                                        <th class="center">评论内容</th>
                                        <th class="center">是否审核通过</th>
                                        <th class="center">审核</th>
                                        <th class="center">删除</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        while($row = $res->fetch_array(MYSQLI_NUM)){
                                            echo "<tr>";
                                            echo "<td class=\"center\">$row[0]</td>";
                                            echo "<td class=\"center\">$row[1]</td>";
                                            echo "<td class=\"center\">$row[2]</td>";
                                            echo "<td class=\"center\">$row[3]</td>";
                                            if ($row[4]){
                                                echo "<td class=\"center\">✅</td>";
                                                $disable = "disabled=\"disabled\"";
                                            }else{
                                                echo "<td class=\"center\">❌</td>";
                                                $disable = '';

                                            }
                                            echo "<td class=\"center\"><a role=\"button\"  $disable class=\"btn btn-primary\" href='comment.php?display_id=$row[5]'>通过</a></td>";
                                            echo "<td class=\"center\"><a role=\"button\"  class=\"btn btn-danger\" href='comment.php?del_id=$row[5]'>删除</a></td>";
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