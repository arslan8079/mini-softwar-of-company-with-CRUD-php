<?php
$host='localhost';
$username='root';
$password='';
$db='sohnidherti';
$data_base=mysqli_connect($host,$username,$password,$db);
if(!$data_base){
	echo 'database is no conected';
}
$upd=$_GET['update'];
$slct=mysqli_query($data_base, "SELECT * FROM `recordes` WHERE `Id`='$upd'");
$rec=mysqli_fetch_array($slct);
if(isset($_POST['Id'])){

$id=$_POST['Id'];
$Name=$_POST['m_name'];
$Adress=$_POST['m_adress'];
$Area=$_POST['m_area'];

$udp=mysqli_query($data_base, "UPDATE `recordes` SET `Name`='$Name',`Adress`='$Adress',`Area`='$Area' WHERE `Id`='$id'");
if($udp){
echo "<a href='assignment.php'>Back Home</a>";
}

}

?>

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <link rel="stylesheet" href='style.css'>
</head>
<body>

<form id="frm1" method="post">
<input type='hidden' value="<?php echo $rec['Id'] ; ?>" name="Id">
<label>Name</label>
<input type='text' value="<?php echo $rec['Name'] ; ?>" name="m_name">
<label>Adress</label>
<input type='text' value="<?php echo $rec['Adress'] ; ?>" name="m_adress">
<label>Area</label>
<input type='text' value="<?php echo $rec['Area'] ; ?>" name="m_area">
<button type="submit" name="insert_btn">Submit</button>
</form>   
</body>
</html