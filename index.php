<?php
include 'base.php';
include_once "sqlhelper.php";
?>

        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
		  <div class="header"> 
                        <h1 class="page-header">
                           公告
                        </h1>
		</div>
            <div id="page-inner"> 
			
			  <div class="row">
                    
                    <div class="col-md-12">
                    <div class="card">
                        <div class="card-action">
                            公告
                        </div>
                         <div class="card-content">
						 <p>管理员您好</p>
                           <div class="clearBoth"><br/></div>
                             当前使用过国医奇谈小程序用户共有
                             <strong>
                             <?php
                             $mysql = new sqlhelper();
                             $sql = "SELECT COUNT(id) FROM user";
                             $res = $mysql->execute_dql($sql);
                             $row = $res->fetch_row();
                             echo $row[0];
                             ?>
                             </strong>人
						 </div>
                    </div>



				</div>
             <!-- /. PAGE INNER  -->
            </div>

         <!-- /. PAGE WRAPPER  -->
        </div>

<?php
include 'foot.php';
?>
