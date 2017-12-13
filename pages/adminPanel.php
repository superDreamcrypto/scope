<?php
include '../utils/userDAL.php';
include '../utils/connection.php';

// session_start();

if(isset($_GET['Message']))
{
$message = $_GET['Message'];
  echo "<script type='text/javascript'>alert('$message');</script>";
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
            <!-- <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="SingIn.php">Sign In</a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="userHome.php">User Home</a>
            </li>
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

    
    <!-- <div class="container h-1500"style=""> -->
      <div class="col-md-12">
        <div class="col-md-10 mx-auto">
          <div class="col-md-10 mx-auto">
          <div style="height:100px;">
                    <!-- spacer -->
          </div>
          <div class="container">
            <div class="cols-sm-6 cols-sm-offset-3 text-center">
              <h1 class=""><b>Admin Panel</b></h1>
            </div>
          </div>

<!-- users table -->

         <div class="container col-md-12 ">
              <h2 class="text-center">Users</h2>
          <form action="adminEditUser.php" method="post" name="tableUsers">
              <table class="table-bordered " width="100%">
                  <tr>
                      <td align="center">First Name</td>
                      <td align="center">Last Name</td>
                      <td align="center">Username</td>
                      <td align="center">Password</td>
                      <td align="center">Email</td>
                      <td align="center">Role</td>
                      <td align="center" colspan="4">Actions</td>
                  </tr>

                  <?php
                  $start = 0;
                  $limit = 10;
                  $current_page = null;
                  if(isset($_GET['page']))
                  {
                      $current_page = $_GET['page'];
                      $start = ($current_page-1)*$limit;
                  }

                 
                //   $query =$con->prepare("SELECT * FROM user LIMIT $start, $limit");
                //   $query->execute();
                  
                      
                //   while($row=$query->fetch())

                $query = "SELECT * FROM user LIMIT $start, $limit";
                // while ($result = mysqli_query($con, $query))
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                {
                    
                  
                    $userID = $row['User_ID'];
                    $fName = $row['First_Name'];
                    $lName= $row['Last_Name'];
                    $uName= $row['Username'];
                    $phone= $row['User_Phone_Num'];
                    $email= $row['Email'];
                    $password= $row['Password'];
                    $role = $row['Role'];
                    $hair = $row['Hair_Color'];
                    $weight = $row['Weight'];
                    $ethnicity = $row['Ethnicity'];
                    $lat = $row['Lat'];
                    $lon = $row['Lon'];
                      
                      ?>

                      <tr>
                      <!-- <input type="hidden" name="id" value="<?php echo $id; ?>"> -->
                          <td align="center"><?php echo $fName; ?></td>
                          <td align="center" ><?php echo $lName ;?></td>
                          <td align="center" ><?php echo $uName; ?></td>
                          <td align="center"><?php echo $password; ?></td>
                          <td align="center" ><?php echo $email ;?></td>
                          <td align="center" ><?php echo $role; ?></td>
                          <td align="center" colspan="4">
                              <a href="../pages/adminEditUser.php?id=<?php echo $userID;?>">
                              <img src="../img/edit.ico"  allt="edit_icon"
                               height="20px">
                                &nbsp;&nbsp;
                              <a href="../utils/adminDeleteUser.php?id=<?php echo $userID;?>">
                              <img src="../img/x.png" allt="delet_icon"
                               height="20px"> 
                          </td>
                          
                      </tr>
                      <?php
                  }
                  ?>
               </table>

               <div class="col-md-8 col-md-offset-2 ">
               <?php
            //    $data=$com->prepare('SELECT * FROM user');
            //       $data->execute();
            $query = "SELECT * FROM user";
            $data = mysqli_query($con, $query);
            $totalRcr = mysqli_num_rows($data);
            $num_of_pages = ceil($totalRcr/$limit);
                 

                  if($current_page > 1)
                  {
                      ?>
                          <button><a href="?page=<?php echo ($current_page-1) ;?>">
                          Previous</a></button>
                      <?php
                  }
              
                  if($current_page < $num_of_pages)
                  {
                      ?>
                          <button><a href="?page=<?php echo ($current_page+1) ;?>">
                          Next</a></button>
                          <?php
                  }
                  
                  echo "<b class='page'>";
                  for($i = 1; $i <= $num_of_pages;$i++)
                  {
                      echo "&emsp;";
                      if($i == $current_page)
                      {
                          echo "<b class ='current'>".$i."</b>" ;
                      }
                      else
                      {
                          echo "<b ><a href='?page=".$i."'>".$i."</a></b>";
                      }
                      echo "</b>";
                  }
                  ?> 
                  </div> 

                  
          </form>
      </div>    
    <!-- </div> -->
    <div style="height:10px;">
            <!-- spacer -->
    </div>

  <!-- groups table -->
<div class="row container col-md-12">
  <div class="container col-md-6 ">
  <h2 class="text-center">Groups</h2>
          <form action="../pages/adminEditGroup.php" method="post" name="tableGroup">
              <table class="table-bordered " width="100%">
                  <tr>
                      <td align="center">Group ID</td>
                      <td align="center">Group Name</td>
                      <td align="center" colspan="4">Actions</td>
                  </tr>

                  <?php
                  $start = 0;
                  $limit = 10;
                  $current_page = null;
                  if(isset($_GET['page']))
                  {
                      $current_page = $_GET['page'];
                      $start = ($current_page-1)*$limit;
                  }


                $query = "SELECT * FROM `group` LIMIT $start, $limit";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                {
                    
                  
                    $groupID = $row['Group_ID'];
                    $gName = $row['Group_Name'];
                 
                      
                      ?>

                      <tr>
                      <!-- <input type="hidden" name="id" value="<?php echo $id; ?>"> -->
                          <td align="center"><?php echo $groupID; ?></td>
                          <td align="center" ><?php echo $gName ;?></td>
                          <td align="center" colspan="4">
                              <a href="../pages/adminEditGroup.php?id=<?php echo $groupID;?>">
                              <img src="../img/edit.ico"  allt="edit_icon"
                               height="20px">
                                &nbsp;&nbsp;
                              <a href="../utils/adminDeleteGroup.php?id=<?php echo $groupID;?>">
                              <img src="../img/x.png" allt="delet_icon"
                               height="20px"> 
                          </td>
                          
                      </tr>
                      <?php
                  }
                  ?>
               </table>

               <div class="col-md-8 col-md-offset-2 ">
               <?php
            //    $data=$com->prepare('SELECT * FROM user');
            //       $data->execute();
            $query = "SELECT * FROM `group`";
            $data = mysqli_query($con, $query);
            $totalRcr = mysqli_num_rows($data);
            $num_of_pages = ceil($totalRcr/$limit);
                 

                  if($current_page > 1)
                  {
                      ?>
                          <button><a href="?page=<?php echo ($current_page-1) ;?>">
                          Previous</a></button>
                      <?php
                  }
              
                  if($current_page < $num_of_pages)
                  {
                      ?>
                          <button><a href="?page=<?php echo ($current_page+1) ;?>">
                          Next</a></button>
                          <?php
                  }
                  
                  echo "<b class='page'>";
                  for($i = 1; $i <= $num_of_pages;$i++)
                  {
                      echo "&emsp;";
                      if($i == $current_page)
                      {
                          echo "<b class ='current'>".$i."</b>" ;
                      }
                      else
                      {
                          echo "<b ><a href='?page=".$i."'>".$i."</a></b>";
                      }
                      echo "</b>";
                  }
                  ?> 
                  </div> 

                  
          </form>
      </div>    
  <!-- </div> -->

  <!--devices table -->

  <div class="container col-md-6 ">
  <h2 class="text-center">Devices</h2>
          <form action="" method="post" name="tableDevice">
              <table class="table-bordered " width="100%">
                  <tr>
                      <td align="center">Device ID</td>
                      <td align="center">User Device ID</td>
                      <!-- <td align="center">Phone Num</td> -->
                      <td align="center">Name</td>
                      <td align="center" colspan="4">Actions</td>
                  </tr>

                  <?php
                  $start = 0;
                  $limit = 10;
                  $current_page = null;
                  if(isset($_GET['page']))
                  {
                      $current_page = $_GET['page'];
                      $start = ($current_page-1)*$limit;
                  }

                 
               

                $query = "SELECT * FROM device LIMIT $start, $limit";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                {
                    
                  
                    $deviceID = $row['Device_ID'];
                    $deviceUserID = $row['Device_User_ID'];
                    $phone = $row['Device_Phone_Num'];
                    $name = $row['Device_Name'];
                      
                      ?>

                      <tr>
                      <!-- <input type="hidden" name="id" value="<?php echo $deviceID; ?>"> -->
                          <td align="center"><?php echo $deviceID; ?></td>
                          <td align="center" ><?php echo $deviceUserID ;?></td>
                          <!-- <td align="center" ><?php echo $phone; ?></td> -->
                          <td align="center"><?php echo $name; ?></td>
                          <td align="center" colspan="4">
                              <a href="../pages/adminEditDevice.php?id=<?php echo $deviceID;?>">
                              <img src="../img/edit.ico"  allt="edit_icon"
                               height="20px">
                                &nbsp;&nbsp;
                              <a href="../utils/adminDeleteDevice.php?id=<?php echo $deviceID;?>">
                              <img src="../img/x.png" allt="delet_icon"
                               height="20px"> 
                          </td>
                          
                      </tr>
                      <?php
                  }
                  ?>
               </table>

               <div class="col-md-8 col-md-offset-2 ">
               <?php
     
            $query = "SELECT * FROM device";
            $data = mysqli_query($con, $query);
            $totalRcr = mysqli_num_rows($data);
            $num_of_pages = ceil($totalRcr/$limit);
                 

                  if($current_page > 1)
                  {
                      ?>
                          <button><a href="?page=<?php echo ($current_page-1) ;?>">
                          Previous</a></button>
                      <?php
                  }
              
                  if($current_page < $num_of_pages)
                  {
                      ?>
                          <button><a href="?page=<?php echo ($current_page+1) ;?>">
                          Next</a></button>
                          <?php
                  }
                  
                  echo "<b class='page'>";
                  for($i = 1; $i <= $num_of_pages;$i++)
                  {
                      echo "&emsp;";
                      if($i == $current_page)
                      {
                          echo "<b class ='current'>".$i."</b>" ;
                      }
                      else
                      {
                          echo "<b ><a href='?page=".$i."'>".$i."</a></b>";
                      }
                      echo "</b>";
                  }
                  ?> 
                  </div> 

                  
            </form>
        </div>    
    </div>
  <!-- </div> -->
                
                
          </div>
        </div>
      </div>
    <!-- </div> -->
  <!-- </div>  -->
<!-- </div>
    </header> -->
    <div style="height:50px;">
                    <!-- spacer -->
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

  </body>

</html>
