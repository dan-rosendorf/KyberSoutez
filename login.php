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
$web_passw=$_POST["passwd"];

$servername="localhost";
$username="webreader";
$password="GitPassword"; //add correct password here
$database="web";

$conn= new mysqli($servername,$username,$password,$database);


if($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);
}
#echo "Connected successfully<br>";



$passSel=$conn->prepare('SELECT password FROM Users WHERE name= ?');

$passSel->bind_param('s',$web_user);

$passSel->execute();

$result=$passSel->get_result();

if($result){
	echo "Got result<br>";
}
else {
	echo "Didn't get result<br>";
	}


if($result->num_rows!=1){
	echo "Neznámý uživatel. Zkuste to znovu.<br>";
	exit;
}
else{
	$row=$result->fetch_row();
	$storedHash=$row[0];
	$hash=openssl_digest($web_passw,"SHA256");
	if($hash==$storedHash){
		echo "GitMessage"; //add correct resulting message here
	}
	else{
		echo "<p>Bohužel tohle není správné heslo. Připomínáme, že vaše heslo bylo rodné číslo bez lomítka.</p>";
	}

}
	


?>


<hr/>

</div>

	<pre>
	<a href="index.html">Zpět na hlavní stránku</a>.
	</pre>	
<div>
<p style="font-size:8;color:gray">Copyright &copy; 2018 <a href="https://www.i.cz/">S.ICZ a.s.</a></p>
</div>


</body>

</html>
