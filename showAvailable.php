<html>
<head>
<title>Show Number of Available Parking lots</title>
<style>
table {
    border-collapse: collapse;
}

table, td, th {
    border: 2px solid black;
    height: 50px;
    text-align: center;
    font-size: 30px;
}
div.head {
    background-color: lightblue;
    width: 600px;
    padding:25px;
    font-size: 40px;
    color: #FFFFFF;
    margin-bottom: 40px;
}
</style>
</head>
<body>
<?php
//echo "start";
$servername = "localhost";
$username = "root";
$password = "GQ#h43Fe";
$dbname = "parkhere";

  //Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

  //Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT pId,pName,remain FROM parkArea";
$result = $conn->query($sql);
$sql2 = "SELECT A.pId, COUNT(B.pId) as reserve FROM reserve as A LEFT JOIN ( SELECT * FROM reserve WHERE date = CURRENT_DATE() and status = '0' ) as B on A.reserveId = B.reserveId GROUP by A.pId";
$result2 = $conn->query($sql2);
?>
<div class=head align="center">ParkHere Application</div>
<div align = "center">
<table width="600">
	  <tr>
		<th width="220"> <div align="center">Parking Area</div></th>
		<th width="100"> <div align="center">Available</div></th>
	  </tr>
<?php
if ($result->num_rows > 0) {

      while($row = $result->fetch_assoc()){
        $row2 = $result2->fetch_assoc()
?>
        <tr>
      		<td><?php echo $row["pName"]; ?></td>
      		<td><?php echo $row["remain"] - $row2["reserve"]; ?></td>

	     </tr>
</div>
         <!-- echo $row['pId'] . "," . $row['pName'] . "," . $row['remain']. "\n"; -->
<?php
     }
 } else {
   echo "0";
 }
 ?>

 </table>
<?php
$conn->close();
?>
</body>
</html>
