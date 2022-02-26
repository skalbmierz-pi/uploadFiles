<?php

if (!empty($_FILES['file']))
{
	$file = $_FILES['file']['name'];
	$tempRep = $_FILES['file']['tmp_name'];
	$size = $_FILES['file']['size'];
	$typeFichier = $_FILES['file']['type'];
	$error = $_FILES['file']['error'];
	
	$db = mysqli_connect("localhost", "root", "","ddb");
	
	$sql = "INSERT INTO table (file) VALUES ('$file')";
	mysqli_query($db, $sql);
			
	
	if ($error !=0 || !$tempRep)
	{
		echo 'Le fichier n\'a pas pu être uploadé!';
		die();
	}
	
	if (move_uploaded_file($tempRep, 'images/'.$file))
	{
		echo 'Chargement du fichier','&nbsp'.$file.'&nbsp','Terminé!';
	}
	else
	{
		echo 'Une erreur est survenue lors de l\'envoi du fichier!';
	}
	
}

?>

<!DOCTYPE html>
<html> 
  <head>
  	<meta charset="utf8"/>
  	<title>UPLOAD FICHIERS</title>
  	<link rel="stylesheet" type="text/css" href="upload_fichiers_a.css"/>
  </head>

  <body>
  </body>
</html>