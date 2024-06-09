<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
<div class="header" >
    <header>
        <h1>patisserie <span>YLOLYS</span> Metz</h1>
   </header>
    </div>
    
    

    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <a class="navbar-brand" href="#"><span>YLOLYS</span>
      </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php?p=acceuil.html">Acceuil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?p=nos_prestation.html">Nos Prestations</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?p=tarif.html">Tarifs</a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="index.php?p=contact.php">Contact</a>
      </li>   
    </ul>
  </div>  
</nav>

<main>
<?php
  if (isset($_GET['p'])) {
	  $fichier="include/".$_GET['p'];
	  if(file_exists($fichier)) 
        include($fichier);
        else
        echo "Erreur 404: la page demandée n'existe pas";
      }
?>
</main>

<footer>

<h3>informations</h3>
<p>Spécialiste du cake design et gâteau personnalisé 
    sur mesure pour votre évenement à Toulouse, Un jour, 
    un gâteau réalise pour vous des gâteaux uniques.</p>

<h3>reseaux sociaux</h3>

<a target="_self" href="https://www.facebook.com" id="fcbk"><i class="material-icons">facebook</i></a>
<a target="_self" href="https://www.snapchat.com" id="snap"><i class="material-icons">snapchat</i></a>

<p>suivez nous pour ne rien manquer &nbsp;!</p>
&copy; Copyleft Belamy Ranelle 


</footer>
</body>
</html>
