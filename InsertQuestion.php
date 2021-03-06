<?php
    session_start();
    if(isset($_SESSION['U_ID'])){
        $U_ID=$_SESSION['U_ID'];
	}else{
		echo "<script>location = 'login.php?error=1';</script>";
    }


include_once 'QuestionAction.php';
$QuestionAction=new QuestionAction();
$GroundData=$QuestionAction->SelectGroundAction();
$GroundArr=$GroundData->fetchALL();
$SubjectData=$QuestionAction->SelectSubjectAction();
$SubjectArr=$SubjectData->fetchALL();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>教藝-免費家庭教師搜尋平台</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script type="text/javascript">
	
		function updateFile(){
			var id1=document.getElementById("y_updatechoose");
			if(id1.checked != true)
			{
				document.getElementById("questionimg").disabled=true;
			}
			else
			{
				document.getElementById("questionimg").disabled=false;
			}
		}
		
		function submitForm(){
			var is_null=false;
			var tit=$('[name=title]').val();
			var con=$('[name=content]').val();
			if(tit == '')
			{
				alert('請輸入標題');
				//$('[name=title]').parent().attr('class', $('[name=title]').parents().attr('class') + ' has-error')
				$('[name=title]').parent().addClass(' has-error');
				is_null=true;
			}
			
			if(con == '')
			{
				alert('請輸入內容');
				$('[name=content]').parent().addClass(' has-error');
				is_null=true;
			}
			
			if(is_null == true)
			{
				return;
			}
			
			$('#editForm').submit();
		}
	</script>
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
                        <a href="ac/ac_subjectlist.php"><i class="fa fa-fw fa-calendar-check-o"></i> 活動</a>
                    </li>
                    <li id="navbarhistory">
                        <a href="javascript:;" data-toggle="collapse" data-target="#collapsehistory"><i class="fa fa-fw fa-file-o"></i> 紀錄 <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="collapsehistory" class="collapse navbar-collapse">
                            <li>
                        		<a href="answerhistory.php"><i class="fa fa-fw fa-file-text-o"></i> 教導紀錄</a>
                    		</li>
                    		<li>
                        		<a href="questionhistory.php"><i class="fa fa-fw fa-file-text"></i> 提問紀錄</a>
                    		</li>
                            <li>
                        		<a href="ac/add_ac_history.php"><i class="fa fa-fw fa-file-text-o"></i> 活動舉辦紀錄</a>
                    		</li>
                    		<li>
                        		<a href="ac/signuphistory.php"><i class="fa fa-fw fa-file-text"></i> 活動參與紀錄</a>
                    		</li>
                        </ul>
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
                        <h1 class="page-header">
                            提問
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" id="editForm" action="InsertQuestionAction.php" method="post" enctype="multipart/form-data" >
                            <div class="form-group">
                                <h3><label>地區</label></h3> 
                                <select class="form-control" name="groundkind">
									<?php for($i=0;$i<count($GroundArr);$i++){ ?>
										<option value="<?php echo $GroundArr[$i]["G_ID"]; ?>"><?php echo $GroundArr[$i]["City"]; ?></option>
									<?php } ?>
                                </select>
                            </div>
							
							<div class="form-group">
                                <h3><label>分類</label></h3> 
                                <select class="form-control" name="classkind">
									<?php for($i=0;$i<count($SubjectArr);$i++){ ?>
										<option value="<?php echo $SubjectArr[$i]["S_ID"]; ?>" 
                                        <?php echo $QuestionAction->IsDefaultSubject($SubjectArr[$i]["S_ID"]); ?>><?php echo $SubjectArr[$i]["S_Name"]; ?></option>
									<?php } ?>
                                </select>
                            </div>
							
                            <div class="form-group">
                                <h3><label>標題</label></h3>
                                <input class="form-control" placeholder="請輸入標題" name="title" >
                            </div>   


                            <div class="form-group">
                                <h3><label>問題描述</label></h3>
                                <textarea class="form-control" rows="3" name="content"></textarea>
                            </div>
							
							

                            <h3><label>是否需上傳相關檔案(例如：數學圖形等)</label></h3>
							<div class="radio">
								<label>
									<input type="radio" name="ynupdata" value="udy" onclick="updateFile()" id="y_updatechoose"><h4>是</h4>
									<input type="radio" name="ynupdata" value="udn" onclick="updateFile()" id="n_updatechoose" checked><h4>否</h4>
								</label>
							</div>
								
							<div class="form-group">
                                <h3><label>檔案上傳</label></h3>
                                <input type="file" id="questionimg" name="imgupdate" disabled>
                            </div>
							
							
							<center><input type="button" class="btn btn-default btn-lg" value="送出" onclick="submitForm()"/></center>
							<div width="auto" height="20px"></div>
                        </form>      

                    </div>
                </div>
                <!-- /.row -->

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