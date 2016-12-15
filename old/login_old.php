
<!DOCTYPE html>
<html lang="cn">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Friteach</title>

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
            <div class="row">
                      <div class="col-sm-12">
                        <h1 class="page-header">
                            登入 <small><small>Friteach！交友學習兩不誤～</small></small>
                        </h1>
                        </div>
                      <div class="col-sm-12">
    						<form class="form-horizontal" method="POST" action="loginsucess.php">
                            <div class="form-group">
                                <label for="U_Username">請輸入您的賬號*  :</label>
                                <input class="form-control" name="U_Username" class="form-control" maxlength="15" id="U_Username" required="required" />
                            </div>

                            <div class="form-group">
                                <label for="U_Password">請輸入您的密碼*  :</label>
                                <input class="form-control" type="password" maxlength="15" id="U_Password" name="U_Password" required="required" />
                            </div>

                            <br><input id="submit" name="submit" type="submit"  class="btn btn-lg btn-primary"  value="登入">
                            &nbsp<a href="../UniFinal/register.php" class="button" >我要進行註冊</button>
                            </form>
               </div>
           </div>
      </div>
  </div>
</div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
