<?php
include '../utils/userDAL.php';
include '../utils/connection.php';
session_start();

// new user
if(isset($_POST['fname']))
{
  $fName = $_POST['fname'];
  $lName = $_POST['lname'];
  $uName = $_POST['uName'];
  $password = $_POST['password'];
  $confPassword = $_POST['confirm'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  
   
  addUser($fName, $lName, $uName, $password, $phone, $email);
  getUser($uName, $password);
  // $userID = getUserID($fName, $lName, $email);
  // echo $userID . "userHome";
  // addRole($userID, $password);
  echo 'session ID from singUp='.$_SESSION['id'];
  
  
  
}
//sign in
elseif(isset($_POST['logInuName']))
{
  $uName = $_POST['logInuName'];
  $password = $_POST['logInPassword'];
  validateUser($uName,$password);
  getUser($uName, $password);
  echo 'session ID from signIn ='.$_SESSION['id'];
  echo '<br> session  from singIn='.$_SESSION['fName'];
  echo '<br>session  from singIn='.$_SESSION['lName'];
  echo '<br>session  from singIn='.$_SESSION['uName'];
}
// else
// {
//   $Message = "Invalid username or password! ";
//   header('Location: ./signIn.php?Message='.$Message);
// }

if(isset($_GET['Message']))
{
  // session_start();
  $uName = $_SESSION['uName'];
  $password = $_SESSION['password'];
  $message = $_GET['Message'];
  echo "<script type='text/javascript'>alert('$message');</script>";
  getUser($uName, $password);
}




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
              <a class="nav-link js-scroll-trigger" href="profile.php">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="addGoup.php">Add Group</a>
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

    
    <div class="container h-1300">
      <div class="row h-100">
        <div class="col-md-8 mx-auto">
          <div class="col-md-10 mx-auto">
          <!-- <div style="height:50px;"> -->
                    <!-- spacer -->
          <!-- </div> -->
          <header class="masthead">
              <div class="container h-100">
                <div class="">
                  <div class="col-md-8 mx-auto">
                    <div class="header-content mx-auto">
                      <div class="container row col-md-12">

                        <div class="col-xs-6 btn-group-sm mx-auto">
                          <div class="dropdown">
                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="membersButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Members
                            </button>
                            <div class="dropdown-menu" aria-labelledby="membersButton">
                              <a class="dropdown-item" href="#">Action</a>
                              <a class="dropdown-item" href="#">Another action</a>
                              <a class="dropdown-item" href="#">Member</a>
                            </div>
                          </div>
                        </div>
                        &emsp;
                        <div class="col-xs-6 btn-group-sm">
                          <div class="dropdown">
                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="grouprsButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Groups
                            </button>
                            <div class="dropdown-menu" aria-labelledby="groupsButton">
                              <a class="dropdown-item" href="#">Action</a>
                              <a class="dropdown-item" href="#">Another action</a>
                              <a class="dropdown-item" href="#">Group</a>
                            </div>
                          </div>
                        </div>

                      </div>
                      <div style="height:20px;">
                        <!-- spacer -->
                      </div>
                      <!-- start map -->
                      
                      <div class="align-content-center mx-auto">
                        <h3 class="text-center">John Johnson</h3>
                        <div id="map"></div>
                      </div>
                      <div style="height:25px;">
                        <!-- spacer -->
                      </div>
                      <div >
                        <h4 class="text-center">Location info</h4>
                      </div>
                      <div style="height:25px;">
                        <!-- spacer -->
                      </div>
                      <div class="mx-auto text-center ">
                        <a href="../utils/requestLocation.php" class="btn btn-outline justify-content-center btn-xl js-scroll-trigger">Request Location</a>
                        <div style="height:10px;">
                          <!-- spacer -->
                        </div>  
                        <a href="../utils/sendLocation.php" class="btn btn-outline btn-xl js-scroll-trigger">Send Location</a>
                      </div>
                      <div style="height:25px;">
                        <!-- spacer -->
                      </div>
                    </div>
                  </div>

                  
                  

    

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
    <!-- map scripts -->
    <script>
      function initMap() {
        var uluru = {lat: 44.9727845, lng: -93.2923275};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCldpY0c82gC1FchTPivrtxAMlEylVRFD4&callback=initMap">
    </script>

  </body>

</html>
