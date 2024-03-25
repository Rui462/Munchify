<?php


	include 'navbar.php';


?>



<!DOCTYPE html>
<html>
<head>
    <br>
<title>Felhasználók</title>
<style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
<table>
<tr>
<th>Id</th>
<th>felhasznalonev</th>
<th>email</th>
<th>veznev</th>
<th>kernev</th>
<th>Törlés</th>
<th>Tiltás/engedélyezés</th>
</tr>
<?php
$conn = mysqli_connect("88.132.223.56", "Frankfurt", "Frankfurt123", "munchifydb");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
    $id=$row["id"];
echo 

"<tr><td>" . $row["id"].
"</td><td>". $row["felhasznalonev"].
"</td><td>" . $row["email"] .
"</td><td>". $row["vezeteknev"].
"</td><td>". $row["keresztnev"].
"</td><td>"."<button onclick='torles($id)'>Törlés</button>".
"</td><td>"."<button onclick='ban($id)' >Kitiltás</button>"."<button onclick='unban($id)'>Engedélyezés</button>".
"</td></tr>" 
 ;
}
echo "</table>";
} else { echo "Nincs találat"; }
$conn->close();
?>
</table>
</body>
<script>
    function torles(userid) {
        let result = confirm("Biztos törölni szeretnéd?");
            if (result === true) {

  window.location = 'torles.php?k='+userid;
            }
  }
  function ban(userid) {
        let result = confirm("Biztos banolni szeretnéd?");
            if (result === true) {
  window.location = 'ban.php?k='+userid;
            }
  }
  function unban(userid) {
        let result = confirm("Biztos unbanolni szeretnéd?");
            if (result === true) {
  window.location = 'unban.php?k='+userid;
            }
  }


    </script>
</html>
