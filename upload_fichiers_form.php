<!DOCTYPE html>
<html> 
  <head>
      <meta charset="utf-8"/>
      <link rel="stylesheet" type="text/css" href="upload_fichiers_form.css"/>
      <title>UPLOAD FICHIERS ET BDD</title>
	     	  <script>
	      function _(elmt)
		  {
			  return document.getElementById(elmt);
		  }
		  function uploadFichier()
		  {
		  var file = _('file').files[0];
		
		  
		  var data = new FormData();
		  data.append('file', file);
		  
		  var ajax = new XMLHttpRequest();
		  ajax.upload.addEventListener("progress", progressHandler, false);
		  ajax.addEventListener("load", completeHandler, false);
		  ajax.addEventListener("error", errorHandler, false);
		  ajax.addEventListener("abort", abortHandler, false);
		  ajax.open("post", "upload_fichiers.php");
		  ajax.send(data);
		  }
		  function progressHandler(event)
		  {
		      _('status_bytes').innerHTML = event.loaded + "bytes uploadés sur" + event.total;
			  var pourcentage = (event.loaded / event.total) * 100;			  
			  _('progressBar').value = Math.round(pourcentage);
              _('status').innerHTML = Math.round(pourcentage) + "% uploadé...Patientez!";			  
		  }
		   function completeHandler(event)		      
		  {
			  _('status').innerHTML = event.target.responseText;
			  _('progressBar').value = 0;    
		  }
		   function errorHandler()
		  {
			  _('status').innerHTML = "L'upload a échoué!";
			  
		  }
		   function abortHandler()
		  {
			  _('status').innerHTML = "L'upload a été annulé!";
			  
		  }
	  </script>
  </head>

  <body>

    <center>
  
     <h1>UPLOAD FICHIERS</h1>

      <div id="content">
    
      <a href="fichiers.php"><font color="blue">Retour au tableau de bord</font></a></br></br>
      <a href="upload_fichiers.php">Retour à la liste des factures</a>
      </br>
      </br>
      </br> 
	  <header id="barre_progression">  
	  <form method="post" action="" enctype="multipart/form-data">
	  <p style="background-color:red; color:white; border-style:groove; width:180px;">Choisissez un fichier</p>
	  <input type="file" id="file" name="file"/><br/>
	  <p>Max 128Mo (formats jpeg,jpg,png,gif,pdf)<br/>Nommer les fichiers en gardant l'extension(format)</p>
	  <br/>
	  <p style="background-color:red; color:white; border-style:groove; width:180px;">Uploadez le fichier</p>
	  <input type="button" value="Uploader le fichier" onclick="uploadFichier()"/><br/><br/>
	  <progress id="progressBar" value="0" max="100" style="width:500px"></progress>	
	  </form>
	  <br/>
	  <p style="background-color:red; color:white; border-style:groove; width:180px;">Aperçu de la progréssion</p>
	  <div id="apercu_telechargement">
	  <h2 id="status"></h2>
	  <p id="status_bytes"></p>
	  </div>
	  </header>
	  <br/>
	  <hr width="700px"/>
	  <a href="upload_fichiers.php" style="font-size:20px;"><strong>Tableau des fichiers/factures: visualisez les factures classées par mois et par date en cliquant sur ce lien!</strong></a>
	</center>

  </body>
</html>