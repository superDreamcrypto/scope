<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/select_style.css">
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript">
function fetch_select(val)
{
 $.ajax({
 type: 'post',
 url: 'fetch_data.php',
 data: {
  get_option:val
 },
 success: function (response) {
  document.getElementById("new_select").innerHTML=response; 
 }
 });
}

</script>

</head>
<body>
<p id="heading">Dynamic Select Option Menu Using Ajax and PHP</p>
<center>
<div id="select_box">
 <select onchange="fetch_select(this.value);">
  <option>Select Group</option>
  <?php
  $host = 'localhost';
  $user = 'root';
  $pass = '';
  mysql_connect($host, $user, $pass);
  mysql_select_db('group_scope');

  $group=mysql_query("SELECT Group_Name FROM `group` ");
  while($row=mysql_fetch_array($group))
  {
   echo "<option>".$row['Group_Name']."</option>";
  }
 ?>
 </select>

 <select id="new_select">
 <!-- <option>Select Member</option> -->
 </select>
	  
</div>     
</center>
</body>
</html>