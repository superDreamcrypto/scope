<?php
include '../utils/userDAL.php';
include '../utils/groupDAL.php';
include '../utils/groupUserDAL.php';
// include '../tests/locationDAL.js';
include '../utils/connection.php';
// session_start();
// session_destroy();
session_start();


// new user
if(isset($_POST['fname']))
{
  $fName = $_POST['fname'];
  $lName = $_POST['lname'];
  $uName = $_POST['uName'];
  $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
  $confPassword = $_POST['confirm'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $groupName = $_POST['groupname'];
  
   
  addUser($fName, $lName, $uName, $password, $phone, $email);
  addUserToSession($uName, $password);
  $userID = $_SESSION['userID'];
  addGroup($groupName);
  $groupID = getGroupByName($groupName);
  addGroupUser($userID, $groupID);
  
  
  
  
}
//sign in
elseif(isset($_POST['logInuName']))
{
  
  $uName = $_POST['logInuName'];
  $password = password_hash($_POST['logInPassword'],PASSWORD_DEFAULT);
  validateUser($uName,$password);
  addUserToSession($uName, $password);
  $userID = $_SESSION['userID'];
}
// else
// {
//   $Message = "Invalid username or password! ";
//   header('Location: ./signIn.php?Message='.$Message);
// }

if(isset($_GET['Message']))
{
  $message = $_GET['Message'];
  echo "<script type='text/javascript'>alert('$message');</script>";
  $userID = $_SESSION['userID'];
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

    <!-- button ajax and css -->
    <!-- <link rel="stylesheet" type="text/css" href="../css/select_style.css"> -->
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript">
    function populateMembers(val)
    {
    $.ajax({
    type: 'get',
    url: '../api/populateMembersList.php',
    data: {
      groupName:val
    },
    success: function (response) {
      document.getElementById("member_select").innerHTML=response; 
      console.log(response); 
    }
    });
    }

    function getUserLocation(val)
    {
    $.ajax({
    type: 'get',
    // url: '../api/userLocation.php?username=' + val,
    url: '../api/userLocation.php',
    dataType: 'json',
    data: {
      username:val
    },
    error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus + ': ' + errorThrown);
        },
    success: function (response) {
      console.log(response);
      if (typeof response == 'string')
      {
        console.log('response = a string');
      }
        
    
      var map;
      function initMap() {
        // var latLon = !null ? response : {lat: 44.9727845, lng: -93.2923275};
        // var uluru = latLon;
        // var chadAfrica = {lat: 14.5517891, lng: 13.972887};
        var uluru = response;
        var map = new google.maps.Map(document.getElementById('map'), {

          zoom: 12,
          center: uluru,
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
      initMap();
    }
    });
    }

    

    </script>


<style>
  .btn-userhome{
    /* select{ */
    height:37px;
    border:1px solid #BDBDBD;
    margin-top:20px;
    font-size:13px;
    /* font-family: 'FontAwesome'; */
    color:black;
    border-radius:20px;
    background-color: rgba(255,255,255,0);  
    border-color:#fff;
    text-transform: none;
    }
    /* .btn-drop-userhome{
    background-color: rgba(255, 255, 255, 0.534);;  
    border-color:#fff;'='
    color:rgb(73, 72, 72);
    color:black;
    } */
    /* .btn-drop-userhome:hover{
    background-color:black;  
    border-color:#fff;
    color:rgb(73, 72, 72);
    } */
</style>
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
              <a class="nav-link js-scroll-trigger" href="createGroup.php">Add Group</a>
            </li>
            <?php
              if($_SESSION['role'] == "Admin")
              {
                ?>
               <li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="adminPanel.php">Admin Panel</a>
                </li>
              <?php
              }
            ?>
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

   

    
    <div class="container h-1300" style="height:660px;">
      <div class="row h-100">
        <div class="col-md-8 mx-auto">
          <div class="col-md-10 mx-auto">
          <div style="height:90px;"> 
                    <!-- spacer -->
          </div>
          <div class="container h-100">
            <!-- <div class=""> -->
              <div class="col-md-8 mx-auto">
                <!-- <div class=""> -->
<!-- start button group -->
                    <div class=" row  ">
                      <div class=" mx-auto">
                        <div id="select_box" class="dropdown">
                          <select onchange="populateMembers(this.value);" class="btn-userhome btn btn-outline"  >
                            <option  class="btn-drop-userhome">Group</option>
                              <?php
                             
                              $con2;
                              $group=mysql_query("SELECT `Group_Name` 
                                                    FROM `group`
                                                      LEFT JOIN `groupuser`
                                                        ON `group`.`Group_ID` = `groupuser`.`GroupUser_Group_ID` 
                                                      LEFT JOIN `user`
                                                        ON `user`.`User_ID` = `groupuser`.`GroupUser_User_ID` 
                                                      WHERE `groupuser`.`GroupUser_User_ID` = '$userID'
                                                      ORDER BY `Group_Name` ASC");
                              
                                            
                            while($row=mysql_fetch_array($group))
                            {
                                echo "<option class='btn-drop-userhome'>".$row['Group_Name']."</option>";   
                            }                           
                          ?>
                            </select>
                          </div>
                        </div>
                        &emsp;
                        <div class=" btn-group-sm mx-auto">
                          <div class=" dropdown" >
                            <select onchange="getUserLocation(this.value);" class="btn-userhome btn btn-outline" id="member_select">
                              <option  class="btn-drop-userhome">Member</option>
                            </select>
                        </div>
                      </div>
                    </div> 
                <!-- end button group -->

                  <div style="height:30px;">
                    <!-- spacer -->
                  </div>
                  <!-- start map -->
                  
                  <div class="align-content-center mx-auto">
                    
                    <div id="map"></div>
                  </div>
                  <div style="height:25px;">
                    <!-- spacer -->
                  </div>
                  <div >
                 

                    <p id="demo" class="text-center"></p>
                    <script>
                      
                    var x = document.getElementById("demo");
                    function getLocation() {
                        if (navigator.geolocation) {
                            navigator.geolocation.getCurrentPosition(showPosition);
                        } else { 
                            x.innerHTML = "Geolocation is not supported by this browser.";
                        }
                    }

                    function showPosition(position) {
                        x.innerHTML = "Your Location has been updated";
                        $.get("/GroupScope/utils/updateUserLocation.php",{lat : position.coords.latitude, lon : position.coords.longitude})
                    }
                    </script>
                    
                  </div>
                  
                  <div class="mx-auto text-center ">
                    <!-- <a href="../utils/requestLocation.php"  class="btn btn-outline justify-content-center btn-xl js-scroll-trigger">Request Location</a> -->
                    <div style="height:10px;">
                      <!-- spacer -->
                    </div>  
                    <a onclick="getLocation()" class="btn btn-outline btn-xl js-scroll-trigger">Send Location</a>
                    <!-- <a href="../utils/sendLocation.php" onclick="getLocation()" class="btn btn-outline btn-xl js-scroll-trigger">Send Location</a> -->
                  </div>
                  <div style="height:10px;">
                    <!-- spacer -->
                  </div>
                  
                </div>
              </div>
            </div>
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
            <!-- </div> -->
     
      <!-- </div> -->

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

    <script>
    var map;
      function initMap(response) {
        var latLon = null ? response : {lat: 44.9727845, lng: -93.2923275};
        // var uluru = latLon;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: latLon
        });
        var marker = new google.maps.Marker({
          position: latLon,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCldpY0c82gC1FchTPivrtxAMlEylVRFD4&callback=initMap">
    </script>

  </body>

</html>
