<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cs" lang="cs">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Language" content="cs" />
<title>Kybernetická soutěž a.s.</title>
<meta name="robots" content="noindex,follow" />
<link rel="stylesheet" type="text/css" href="http://hosting.wedos.com/css/default-pages.css" />
</head>
<body class="web_default">

<div id="page">

<?php
$web_user=$_POST["user"];

$servername="localhost";
$username="webreader";
$password="GitPassword"; //add correct password here
$database="web";

$conn= new mysqli($servername,$username,$password,$database);


if($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);
}


$userSel="SELECT longname FROM Users WHERE name= '$web_user'";

$result=$conn->query($userSel);

if(!($result)){
	echo "Nikdo tohoto jména v databázi není.<br>";
	exit;
	}

if($result->num_rows > 0){
	echo "Plná jména zvoleného uživatele<br>";
	while($row=$result->fetch_row()){
		echo "Plné jméno: ".$row[0]."<br>";
	}
}



?>

</div>

	<pre>
	<a href="index.html">Zpět na hlavní stránku</a>.
	</pre>	
<div>
<p style="font-size:8;color:gray">Copyright &copy; 2018 <a href="https://www.i.cz/">S.ICZ a.s.</a></p>
</div>


</body>

</html>
