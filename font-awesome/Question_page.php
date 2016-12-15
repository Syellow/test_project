<?php
    session_start();
    if(isset($_SESSION['U_ID'])){
        $U_ID=$_SESSION['U_ID'];
	}else{
		echo "<script>location = 'login.php?error=1';</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!--countanser-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	
	<!--table-->
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="css/style.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script type="text/javascript">
	function submitForm(){
		$('#teacherlist').submit();
		}
	</script>
	<style>
	.margin{
		margin:10px
	}
	.panel-primary {
		background-color: #337ab7;
	}
	
	</style>
	
<?php
include 'conn2db.php';

	$Q_ID=$_GET['questionid'];
	//$Q_Overyet=$_GET['Q_Overyet'];//if over=1 clocked answer button;
	
	$Q_name = current($db->query("SELECT `Q_Title` FROM `q_list` WHERE Q_ID=$Q_ID")->fetch());
	$User_Name = current($db->query("SELECT `U_Name` FROM `user` u JOIN `q_list` q WHERE `Q_ID`=$Q_ID AND u.U_ID=q.U_ID")->fetch());
	$Q_Gender = current($db->query("SELECT `U_Gender` FROM `user` u JOIN `q_list` q WHERE `Q_ID`=$Q_ID AND u.U_ID=q.U_ID")->fetch());
	//$questionUser = current($db->query("SELECT `U_ID` FROM `user` WHERE `U_Username`=$_SESSION['U_Username']")->fetch());  
	
	
    $Q_data = $db->query("SELECT  q.`Q_ID`, `Q_Title`, `Q_Detail`, `Q_Time`, `Q_Ground` ,`Q_Overyet` , u.`U_Username`, q.U_ID, `Q_img`,`Q_Subject`,g.`City`, s.`S_Name`, COUNT(`A_ID`) as countANS FROM `q_list` q 
	LEFT JOIN `ans_list` a ON q.Q_ID=a.Q_ID JOIN `ground` g ON q.Q_Ground=g.G_ID JOIN `user` u ON q.U_ID=u.U_ID JOIN `subject` s ON s.S_ID= q.Q_Subject WHERE q.Q_ID=$Q_ID
    GROUP BY q.`Q_ID`, `Q_Title`, `Q_Detail`, `Q_Time`, `Q_Ground`, `Q_Overyet` ,q.U_ID, `Q_img`,`Q_Subject`, s.`S_Name` ");
    
	$A_data = $db->query("SELECT  q.`Q_ID`, `A_ID`, a.`U_ID`, `A_Time`, `A_Detail` ,`A_Correct` ,g.`City`, `U_Name` , `U_Gender`,g.`City` FROM `ans_list` a 
	RIGHT JOIN `q_list` q ON q.Q_ID=a.Q_ID JOIN `user` u ON u.U_ID=a.U_ID JOIN `ground` g ON a.A_Ground=G.G_ID WHERE q.Q_ID=$Q_ID
    GROUP BY q.`Q_ID`, `A_ID`, a.`U_ID`, `A_Time`, `A_Detail` ,`A_Correct` , g.`City`, `U_Name` , `U_Gender` ,g.`City` ");
?>
<title><?php echo $Q_name; ?></title>
	</head>
	<body>
	  <div id="wrapper">

        <!-- 導覽列 -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Logo+下拉式選單按鈕-->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../~s1102137107/">教藝</a>
            <!-- 搜尋列 -->
                <span>
                	<form action="search.php" method="get">
                        <input class="form-control" id="search" type="search" name="keyword" placeholder="Search">
                        <button class="btn btn-primary" type="submit">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        </button>
                    </form>
                </span>
            <!-- 下拉式選單 -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="userprofile.php"><i class="fa fa-fw fa-user-circle"></i> ​個人資料</a>
                    </li>
                    <li>
                        <a href="​ac_subjectlist.php"><i class="fa fa-fw fa-calendar-check-o"></i> 活動</a>
                    </li>
                    <li>
                        <a href="answerhistory.php"><i class="fa fa-fw fa-file-text-o"></i> 教導紀錄</a>
                    </li>
                    <li>
                        <a href="questionhistory.php"><i class="fa fa-fw fa-file-text"></i> 提問紀錄</a>
                    </li>
                    <li>
                        <a href="logout.php"><i class="fa fa-fw fa-sign-out"></i> 登出</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        </nav>

		 <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                    <?php foreach($Q_data as $data){ ?>
                        <h2 class="page-header">
                           <div class="row">
                            <span class="col-sm-6"><?php echo $Q_name?></span>
                            <span class="col-sm-6 pull-right"><small><?php echo $data['S_Name']?></small></span><br>
								<span class="col-sm-6"><img src="img/<?php echo $Q_Gender?>.png" class="img-circle" alt="Cinque Terre" width="30" height="30">
                            	<small><?php echo $User_Name?> &nbsp;<small><i class="fa fa-map-marker" aria-hidden="true"><?php echo $data['City'] ?></i></small></small>
                                </span>
                                <span class="col-sm-6 pull-right">
                                	<small><small>
                                

                                <?php echo $data['Q_Time']?>
                                </small></small>
                                </span>
                            </div>
						 </h2>
                    </div>
                </div>
                <!-- /.row -->
				<div class="row" >
					<div class="margin" rows="5">
						<?php echo $data['Q_Detail']?>
					</div>
					<?php if($data['Q_img'] != NULL){?>
					<div>
						<img src="UpdateQuestionIMG/<?php echo $data['Q_img'];?>">
					</div>
					<?php }?>
                        <div class="panel panel-primary col-xs-10 col-xs-offset-1">
                            <div class="panel-heading">
                            	<div class="row panel-primary">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $data['countANS']; ?></div>
                                        <div>New Answers!</div>
                                    </div>
                                </div>
								
                            </div>
                        </div>
				
				<div>
				<?php if($data['Q_Overyet'] == 0 && $data['U_Username'] != $_SESSION['U_Username']){?>
				<button type="button" class="btn btn-primary btn-lg"  onclick="location.href='Answer_selfintroduction.php?questionid=<?php echo $data['Q_ID']; ?>'">TEACH</button> 
				<?php }else if($data['Q_Overyet'] == 1 && $data['U_Username'] != $_SESSION['U_Username']){?>
				<button type="button" class="btn btn-primary btn-lg"  disabled>FINISHED</button>
				<?php }?>
				</div>
				
				
				<?php if($data['U_Username'] == $_SESSION['U_Username']) {?>
				
				<!--<h2>教師清單</h2>-->
				
				
				<?php foreach($A_data as $ans){ ?>
				<form method="POST" action="update_Q_Overyet.php" id="teacherlist">
												<input type="hidden" name="Q_ID" value="<?php echo $Q_ID; ?>"/>
												<input type="hidden" name="Q_U_ID" value="<?php echo $data['U_ID'];?>"/>
												
												 <div class="col-lg-12">
												 <div class="container">
												 <table class="table table-striped">
												 <tbody>
														<tr>
															<!--被選為最佳解-->
																<td><?php if($ans['A_Correct'] == 1){ ?><img src="img/Star.png" width="30" height="30"></td>
																<td><?php echo $ans['A_Time']?></td>
																<td onclick="location.href='view_userprofile.php?userid=<?php echo $ans['U_ID']; ?>'"><?php echo $ans['U_Name']?></td>
																<td><img src="img/<?php echo $ans['U_Gender']?>.png" class="img-circle" alt="Cinque Terre" width="30" height="30"></td>
																<td><?php echo $ans['City']?></td>
																<td><?php echo $ans['A_Detail']?></td>
															<!--沒被選為最佳解-->
																<?php }else if($data['Q_Overyet'] == 1 && $ans['A_Correct'] == 0){?>
																	<td></td>
																	<td><?php echo $ans['A_Time']?></td>
																	<td onclick="location.href='view_userprofile.php?userid=<?php echo $ans['U_ID']; ?>'"><?php echo $ans['U_Name']?></td>
																	<td><img src="img/<?php echo $ans['U_Gender']?>.png" class="img-circle" alt="Cinque Terre" width="30" height="30"></td>
																	<td><?php echo $ans['City']?></td>
																	<td><?php echo $ans['A_Detail']?></td>
															<!--問題還未有解-->
																<?php 	}else if($data['Q_Overyet'] == 0){?>
																<td><!-- Trigger the modal with a button -->
																  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" name="U_ID" value="<?php $ans['U_ID'] ?>"><script>console.log(<?php echo $ans['U_ID']?>)</script>選擇</button>
																	<input type="hidden" name="U_ID" value="<?php echo $ans['U_ID'];?>"/>
																  <!-- Modal -->
																	  <div class="modal fade" id="myModal" role="dialog">
																		<div class="modal-dialog">
																		
																		  <!-- Modal content-->
																		  <div class="modal-content">
																			<div class="modal-header">
																			  <button type="button" class="close" data-dismiss="modal">&times;</button>
																			  <h1 class="modal-title">建議</h1>
																			</div>
																			<div class="modal-body">
																			  <h3>您選擇這位當教師之前，有以下幾點需要先提醒您:</h3>
																			  <ul class="list-unstyled">
																				<li>◆若對方約您在深夜時刻到偏僻的地方，請慎重考慮</li>
																				<li>◆若遇到怪老師
																				  <ul>
																					<li>趕緊向店家求救</li>
																					<li>播打110報警</li>
																				  </ul>
																				</li>
																				<li>◆對方開價若是太高，請適當的商談</li>
																				<li>◆對方評價分數若是太低，請慎思</li>
																				<li>◆每個人的教學方式及學習能力都有落差，教導後若覺得良好，請給予相對應評價；若覺得不好，也請給予建議，請勿留下不當言論</li>
																			  </ul>
																			</div>

																			
																			<div class="modal-footer">
																			  <!--<input type="submit" name="U_ID" value="選擇<?php $ans['U_ID'] ?>" class="btn btn-default" data-dismiss="modal"">-->
																			  <button type="button" class="btn btn-default" data-dismiss="modal"   onclick="submitForm()"><?php echo $ans['U_ID'] ?>送出</button>
																			  <!--<input type="button" class="btn btn-default btn-lg" value="?" onclick="submitForm()"/>-->
																			</div>
																		  </div>
																	</form>
																		</div>
																	  </div>
																  </td>
																<td><?php echo $ans['A_Time']?></td>
																<td onclick="location.href='view_userprofile.php?userid=<?php echo $ans['U_ID']; ?>'"><?php echo $ans['U_Name']?></td>
																<td><img src="img/<?php echo $ans['U_Gender']?>.png" class="img-circle" alt="Cinque Terre" width="30" height="30"></td>
																<td><?php echo $ans['City']?></td>
																<td><?php echo $ans['A_Detail']?></td>
														</tr>
																<?php }?>
														
												<?php }?><!--$ans-->
																	<?php }?><!--$SESSION-->
							<?php }?><!--$data-->
							</tbody>
								
								
						</table>
					</div>
				 </div>
			 </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>