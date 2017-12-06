<?php
include '../utils/groupDAL.php';
include '../utils/connection.php';



$id = $_GET['id'];
$groupArray = getGroupByID($id);

$groupName = $groupArray[1];
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Group Scope</title>
    <link rel="icon" type="image/png" href="../img/groupScopeLogo.png" />
    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../vendor/simple-line-icons/css/simple-line-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">

    <!-- bootstrap form -->
    <link rel="stylesheet" href="../css/form.css">
		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="../device-mockups/device-mockups.min.css">

    <!-- Custom styles for this template -->
    <link href="../css/new-age.min.css" rel="stylesheet">

  </head>


  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
      <a href="../index.html">
          <img src="../img/groupScopeLogo.png" alt="Group Scope logo"height="50px">
        </a>
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Group Scope</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
          <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="createGroup.php">Add Group</a>
        </li>
        <li>
          <div style="height:10px;">
              <!-- spacer -->
          </div>
        </li>
        <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="../utils/logout.php">Log Out</a>
         </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- <header class="masthead"> -->

    
    <div style="height:1500px;"class="container h-2500">
      <div class="row h-100">
        <div class="col-sm-8 mx-auto">
          <div class="col-md-10 mx-auto">
          
          <div style="height:100px;">
                    <!-- spacer -->
          </div>
          <div class="container">
            <div class="cols-sm-6 cols-sm-offset-3 text-center">
              <h1 class=""><b>Edit Group</b></h1>
            </div>
          </div>
            <!-- boostrap form start-->
            <div class="container ">
              <div class="row main">
                <!-- <div class="main-login main-center"> -->
                <div class="main-center" >
                  
                  <form class="" method="post" action="../utils/adminEditGroupUtil.php?id=<?php echo $id;?>">
                    
                  <div class="form-group">
                      <label for="groupid" class="cols-sm-2 control-label">Group ID </label>
                      <div class="cols-sm-10">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                          <input type="text" class="form-control" name="groupid" id="groupid" readonly value="<?php echo $id ; ?>" />
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="profname" class="cols-sm-2 control-label">Group Name</label>
                      <div class="cols-sm-10">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                          <input type="text" class="form-control" name="groupname" id="groupname"  value="<?php echo $groupName ; ?>" />
                        </div>
                      </div>
                    </div>
                    
                   
                    <div class="form-group"> 
                    <div class="col-sm-offset-2 col-sm-10">
                      <!-- <button type="submit" class="btn btn-default">Sign Up</button> -->
                      <button type="submit" action="../utils/adminEditUserUtil.php?id=<?php echo $id;?>" class="btn btn-primary btn-lg btn-block login-button">Edit Group</button>
                    </div>
                  </div>
                  
                  </form> 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!-- </div> -->
<!-- </div> -->
    <!-- </header> -->

    

    <footer>
    <div class="container"style="margin: auto;">
      <p>&copy; Group Scope 2017. By: Chad Lofgren
            <br> All Rights Reserved.</p>
      <ul class="list-inline">
        <li class="list-inline-item">
          <a href="#">Privacy</a>
        </li>
        <li class="list-inline-item">
          <a href="#">Terms</a>
        </li>
        <li class="list-inline-item">
          <a href="#">FAQ</a>
        </li>
      </ul>
    </div>
  </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/popper/popper.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="../js/new-age.min.js"></script>
    	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) **boostrap form** -->
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

  </body>

</html>
