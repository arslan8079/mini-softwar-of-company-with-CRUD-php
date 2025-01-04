 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <link rel="stylesheet" href='style.css'>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>
<body>
<div class="container">
<form  id='frm' METHOD='GET' ACTION="">
<input id='myInput' type='text' name='Search' class='search' placeholder='Search here'>
</form>
<div><button type="" name="" id="exp_btn">Add New</button>


</div>
<form id="frm1" method="POST">
<label>Name</label>
<input type='text' placeholder="Enter Name" name="m_name">
<label>Adress</label>
<input type='text' placeholder="Enter Adress" name="m_adress">
<label>Area</label>
<input type='text' placeholder="Enter Area" name="m_area">
<button type="submit" name="insert_btn">Submit</button>
</form> 
<script>
	$('#frm1').hide();
	$("#exp_btn").click(function(){
		$('#frm1').slideToggle("2000");
	});

//search filter
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});


</script>

</body>
</html>
<?php
$host='localhost';
$username='root';
$password='';
$db='sohnidherti';
$data_base=mysqli_connect($host,$username,$password,$db);
if(!$data_base){
	echo 'database is no conected';
}
//search Query

if(isset($_GET['Search'])){
$search=$_GET['Search'];
$select= mysqli_query($data_base, "SELECT * FROM `recordes` WHERE `Name` like '%".$search."%' OR `Id` like '%".$search."%' OR `Area` like '%".$search."%' OR `Adress` like '%".$search."%' ");
}else{
	$select= mysqli_query($data_base, "SELECT * FROM `recordes`");
}
//DELETE QUERY
if(isset($_GET['delet'])){
$d=$_GET['delet'];
$dlet=mysqli_query($data_base, "DELETE FROM `recordes` WHERE `Id`='$d'");
if($dlet){
	echo "<a href='assignment.php'>Back Page</a>";
}
}
// Insert Query
if(isset($_POST['insert_btn'])){
$Naame=$_POST['m_name'];
$Adress=$_POST['m_adress'];
$Area=$_POST['m_area'];
$inst=mysqli_query($data_base,"INSERT INTO `recordes`(`Name`,`Adress`,`Area`)VALUE('$Naame','$Adress','$Area')");
//count query
//$inst=mysqli_query($data_base,"CONT(*) FROM `recordes`");
if(!$inst){
	echo "data is not Insert";
}
}

?>

<table id="myTable">
<h3> <?php //echo $inst;?></h3>
<tr style="position: sticky;
  top: 0;">
<th>Name</th>
<th>Adess</th>
<th>Area</th>
<th>Delete</th>
<th>Update</th>
<?php
while($rec = mysqli_fetch_array($select)){
	?>
	<tr>
	
	<td><?php echo $rec['Name'];?></td>
	<td><?php echo $rec['Adress'];?></td>
	<td><?php echo $rec['Area'];?></td>
	<td><a id='dlt_btn' href="?delet=<?php echo $rec['Id'];?>">Delete</a></td>
	<td><a id='upd_btn' href="assign_child.php?update=<?php echo $rec['Id'];?>">Update</a></td>
	</tr>
	
<?php
}
?>
</tr></table>
<?php
?>
</div>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

table{
	font-family: 'Poppins', sans-serif;
	font-size:14px;
}
th{
	padding:10px 7px;
}
td{
	border-top:0px  !important;
	padding:10px 7px;
}
#dlt_btn{
	background: red;
    color: white;
    font-size: 14px;
    border-radius: 20px;
    text-decoration: none;
    padding: 5px 10px;
	margin:0px 10px;
}
#upd_btn{
	background: green;
	
    color: white;
    font-size: 14px;
    border-radius: 20px;
    text-decoration: none;
    padding: 5px 10px;
}
</style>