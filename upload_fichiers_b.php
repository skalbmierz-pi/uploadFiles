<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8"/>
	  <link rel="stylesheet" type="text/css" href="upload_fichiers_factures_b.css"/>
	  <title>LISTE DES FICHIERS</title>
	</head>
	
	<body>
	
	<h1>LISTE DES FICHIERS</h1>
		 <a href="fichiers.php"><font color="blue">Retour au tableau de bord</font></a></br></br>
	     <a href="upload_fichiers.php">Retour à la page d'upload</a></br></br>

	<p style="color:red;">Cliquez sur les liens pour les visualiser</p>

	<hr style="height: 3px; background-color: #9400D3;">
	
<!------------------------------------------------------------------------------------------------------------------------------>		   
 <fieldset>
   
    <center>
    <h3>BARRE DE RECHERCHE</h3>
	</center>
  
  
<?php
try{
		$bdd = new PDO('mysql:host=localhost;dbname=ddb', 'root', '');
		
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(Exception $e) {
		die ('Error: ' . $e->getMessage());
	}




$factures = $bdd->prepare('SELECT file, CONCAT(file)concatenation FROM upload_fichiers ORDER BY id DESC');


if(isset($_GET['q']) AND !empty($_GET['q']))
{
	$q = htmlspecialchars($_GET['q']);
	$factures = $bdd->prepare('SELECT file, CONCAT(file)concatenation FROM upload_fichiers WHERE file LIKE "%'.$q.'%" ORDER BY id DESC');
	$factures->execute();
	/*if($factures->rowCount() == 0){
		$factures = $bdd->prepare('SELECT file,contenu CONCAT(file,contenu)concatenation FROM upload_fichiers WHERE file,contenu LIKE "%'.$q.'%" ORDER BY id DESC');
	}*/
}

/*var_dump($bdd->errorInfo());*/

?>
  <center>
  <form class="barresearch" method="GET" action="">
       <input class="search" type="search" name="q" placeholder="Recherche..."/>
	   <input class="submit" type="submit" value="Valider"/>
  </form>
  </center>
  
<center>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Scripts javascript : Aperçu</title>
<SCRIPT LANGUAGE="JavaScript">
/*
Source :  http://www.editeurjavascript.com
 Adaptation : http://www.outils-web.com
*/
function HeureCheckEJS()
	{
	krucial = new Date;
	heure = krucial.getHours();
	min = krucial.getMinutes();
	sec = krucial.getSeconds();
	jour = krucial.getDate();
	mois = krucial.getMonth()+1;
	annee = krucial.getFullYear();
	if (sec < 10)
		sec0 = "0";
	else
		sec0 = "";
	if (min < 10)
		min0 = "0";
	else
		min0 = "";
	if (heure < 10)
		heure0 = "0";
	else
		heure0 = "";
	DinaHeure = heure0 + heure + ":" + min0 + min + ":" + sec0 + sec;
	which = DinaHeure
	if (document.getElementById){
		document.getElementById("ejs_heure").innerHTML=which;
	}
	setTimeout("HeureCheckEJS()", 1000)
	}
window.onload = HeureCheckEJS;
</SCRIPT>

</head>
<body>

</br>

<div id="ejs_heure">Initialisation</div>

</body>
</html>
</center>

</fieldset>
  
<fieldset>

<?php if($factures->rowCount() > 0){ ?>
    <ul>
     <?php
	
	 echo '<p><strong>Résultat de la recherche</strong></p>';
	 while($a = $factures->fetch()) { ?>
          	 <li><?php echo "<a href='images/".$a['file']."'>".$a['file']."</a>"; ?></li>
             </br>		
           <?php  } ?>				
	</ul>

 <?php
 }
 else
 {
	echo 'Aucun résultat....';
 }
?> 



      

   </body>
</html>

   </fieldset>
   
   	<hr style="height: 3px; background-color: #9400D3;">	
<!------------------------------------------------------------------------------------------------------------------------------>


<?php

     $db = mysqli_connect ("localhost", "root", "", "ddb");
	 
	 $sql = "SELECT * FROM upload_fichiers ORDER BY id DESC";
	 $result = mysqli_query ($db, $sql);
	 while ($row = mysqli_fetch_array ($result))
	 {
		 echo "<div id = 'lien'>";

		 echo '<img src="fichier.PNG" alt=""/>';
		 echo "<a href='images/".$row['id']."'>Numéro&nbsp;".$row['id']."/&nbsp;</a>";
		 echo "<a href='images/".$row['file']."'>'".$row['file']."'</a>";

?>

<?php

		 
	echo	 "</div>";
		 
		
	 }
		 
?>

      </body>
</html>