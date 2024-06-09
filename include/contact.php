<?php
//print_r($_POST);
$Classnumcd='ok';
$Classtelephone='ok';
$Classville='ok';
$Classgateau='ok';
$Classgarniture='ok';
$Classdemande='ok';
$Classmdp='ok';
$Classevenement='ok';

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


// Vérification du formulaire
if(isset($_POST['submit']))  // le formulaire vient d'être soumis
 {
    $ChampsIncorrects='';
  

   // Vérification du numero de carte
   if(  (!isset($_POST['numcd'])) 
   )
  { $ChampsIncorrects=$ChampsIncorrects.'<li>Numero de carte</li>';
    $Classnumcd='error';
  }
  else {
        $_POST['numcd'] = test_input($_POST["numcd"]);
        $_POST['numcd'] = str_replace(['-', ' ', '.'], '', $_POST['numcd']);
        if (strlen($_POST['numcd']) != 12)
        
     { $ChampsIncorrects=$ChampsIncorrects.'<li>Numero de carte</li>';
          $Classnumcd='error';
    }
  }


  // verification de la ville
  if(  (!isset($_POST['ville'])) 
      || (trim($_POST['ville'])!='lyon')
      &&(trim($_POST['ville'])!='nancy')
      &&(trim($_POST['ville'])!='thionville')
      &&(trim($_POST['ville'])!='luxembourg')
      &&(trim($_POST['ville'])!='metz')
      &&(trim($_POST['ville'])!='bordeau')		
  )
{ $ChampsIncorrects=$ChampsIncorrects.'<li>ville</li>';
  $Classville='error';
}

//verification gateau-prefere
if(  (!isset($_POST['gateau'])) 
      || (trim($_POST['gateau'])!='cheesecake')
      &&(trim($_POST['gateau'])!='tiramisu')
      &&(trim($_POST['gateau'])!='brownie')
      &&(trim($_POST['gateau'])!='macaron')
  )
{ $ChampsIncorrects=$ChampsIncorrects.'<li>gateau</li>';
  $Classgateau='error';
}
// Vérification de la garniture
if (!isset($_POST['garniture']) || 
    (count($_POST['garniture']) === 0) || 
    !in_array('fruits', $_POST['garniture']) && 
    !in_array('chantilly', $_POST['garniture']) && 
    !in_array('caramel', $_POST['garniture'])
) {
    $ChampsIncorrects = $ChampsIncorrects.'<li>garniture</li>';
    $Classgarniture = 'error';
}

// verification evenement
if ((!isset($_POST['evenement']))
    ||(trim($_POST['evenement'])!='anniversaire')
    &&(trim($_POST['evenement'])!='mariage')
)
{ $ChampsIncorrects=$ChampsIncorrects.'<li>evenement</li>';
$Classevenement='error';
}
    
  // Vérification de la demande
  if (empty($_POST["demande"])) 
  
    { $ChampsIncorrects=$ChampsIncorrects.'<li>demande</li>';
      $Classdemande='error';
    }
  else 
  {
    $_POST["demande"] = test_input($_POST["demande"]);
    if (strlen($_POST["demande"]) > 5) 
      { $ChampsIncorrects=$ChampsIncorrects.'<li>demande</li>';
        $Classdemande='error';
      }
  }

// verification numero de telephone
if(  (!isset($_POST['telephone'])) 
|| !preg_match ('/^[ ]*[0-9]{10}[ ]*$/',$_POST['telephone'] )
)

{ $ChampsIncorrects=$ChampsIncorrects.'<li>telephone</li>';
  $Classtelephone='error';
}
 // verification mdp
 if ((strlen($_POST['mdp']) < 4) 
    || (!preg_match('/^[ ]*[0-9]{4}[ ]*$/', $_POST['mdp'])) )
 
{
   $ChampsIncorrects=$ChampsIncorrects.'<li>Mot de Passe</li>';
    $Classmdp='error';
  
}

if(  (!isset($_POST['mdp_repeat'])) 
||  (($_POST['mdp'] ) != ($_POST['mdp_repeat'] ))
)

{ $ChampsIncorrects=$ChampsIncorrects.'<li>mdp</li>';
  $Classmdp_repeat='error';
}


  

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $demande = $_POST["demande"];
    $telephone = $_POST["telephone"];
    $ville = $_POST["ville"];
    $gateau = $_POST["gateau"];

    // Construction de la chaîne à écrire dans le fichier
    $contenu = "Demande du client: $demande\nNumero du client: $telephone\nville de livraison: $ville\nChoix du gateau:$gateau\n\n";

    // Écriture des données dans le fichier 'values.txt'
    if ($ChampsIncorrects == '') {
      echo file_put_contents('.txt', $contenu);
  } else {
      echo "Le formulaire n'a pas été soumis ou n'est pas complet.";
  }
 
  
  }
 

}
?>




<!DOCTYPE html>
<html>

<head>
      <title>formulaire</title>
	  <meta charset="utf-8" />
	  <style type="text/css"> 
.ok {
    }
.error
    {  background-color: red;
	}
	  </style>
</head>
<body>

<h2>CONTACT</h2>




<p>YLOLYS
    2 avenue d'Atlanta 
    31200 Toulouse
    06 34 56 02 25</p>
    <p>Ouvert de <time>10:00</time> a <time>21:00</time> chaque jour.</p>
   

<p>Le délai de réalisation d'un gâteau s’étend de 1 à 3 
    semaines selon la période de l’année.

    Livraison 1h autour de Toulouse.
    </p>

<h2>Vous souhaitez plus de renseignements ?
    Obtenir un tarif pour votre gâteau ?
    </h2>

<p>Pour nous contacter, merci de bien vouloir remplir le 
    formulaire suivant.
    Notre équipe s'engage à vous répondre dans les plus brefs
     délais.
     
    Si vous ne recevez pas de réponse dans votre boîte de
     réception dans un délai de 48 heures, n'hésitez pas à 
     vérifier vos courriers indésirables (spams).
    </p>

<form method="POST" action="#">
   
       
    <fieldset>
        <legend>Payement</legend>
    <label>Accepted Cards</label>
    
      <i class="fa fa-cc-visa" style="color:navy;"></i>
      <i class="fa fa-cc-amex" style="color:blue;"></i>
      <i class="fa fa-cc-mastercard" style="color:red;"></i>
      <i class="fa fa-cc-discover" style="color:orange;"></i>
    

    <label for="numcd">numero de card</label>
    <input id="numcd" class="<?php echo $Classnumcd; ?>" type="text"   name="numcd" placeholder="1111-2222-3333-4444"
    value="<?php if(isset($_POST['numcd']))  echo $_POST['numcd']; ?>" >
        
   
    </fieldset>
    <FIeldset>
        <legend>Votre Gateau</legend>
             

    <label for="ville"> Dans quelle ville aimez-vous déguster votre gateau ?</label>
    <span class="<?php echo $Classville; ?>">
      <select id="ville" name="ville"> 
        <optgroup label="villes eloignes">
            <option value="lyon" <?php if((isset($_POST['ville']))&&($_POST['ville'])=='lyon') echo 'selected="selected"'; ?>>lyon</option>
            <option value="nancy" <?php if((isset($_POST['ville']))&&($_POST['ville'])=='nancy') echo 'selected="selected"'; ?>>nancy</option>
            <option value="bordeau" <?php if((isset($_POST['ville']))&&($_POST['ville'])=='bordeau') echo 'selected="selected"'; ?>>bordeau</option>
          </optgroup>	
          <optgroup label="villes proches">
            <option value="metz" <?php if((isset($_POST['ville']))&&($_POST['ville'])=='metz') echo 'selected="selected"'; ?>>metz</option>
            <option value="thionville" disabled="disabled" <?php if((isset($_POST['ville']))&&($_POST['ville'])=='thionville') echo 'selected="selected"'; ?>>thionville</option>
            <option value="luxembourg" <?php if((isset($_POST['ville']))&&($_POST['ville'])=='luxembourg') echo 'selected="selected"'; ?>>luxembourg</option>
          </optgroup>		
      </select>
      </span>

        <label for="gateau_prefere">Gâteau préféré :</label>
        <span class="<?php echo $Classgateau; ?>">
          <select id="gateau_prefere" name="gateau">
              <option value="cheesecake" <?php if((isset($_POST['gateau']))&&($_POST['gateau']) == "Cheesecake") echo 'selected="selected"'; ?>>Cheesecake</option>
              <option value="tiramisu" <?php if((isset($_POST['gateau']))&&($_POST['gateau']) == "Tiramisu") echo 'selected="selected"'; ?>>Tiramisu</option>
              <option value="brownie" <?php if((isset($_POST['gateau']))&&($_POST['gateau']) == "Brownie") echo 'selected="selected"'; ?>>Brownie</option>
              <option value="macaron" <?php if((isset($_POST['gateau']))&&($_POST['gateau']) == "Macaron") echo 'selected="selected"'; ?>>Macaron</option>
          </select>
        </span>


      <label>Choix de garnitures :</label>
        <span class="<?php echo $Classgarniture; ?>">

        <input type="checkbox" id="fruits" name="garniture[]" value="fruits" 
        <?php if((isset($_POST['garniture'])) && in_array('fruits', $_POST['garniture'])) echo 'checked="checked"'; ?>>
        <label for="fruits">fruits</label>

        <input type="checkbox" id="chantilly" name="garniture[]" value="chantilly"
        <?php if((isset($_POST['garniture'])) && in_array('chantilly', $_POST['garniture'])) echo 'checked="checked"'; ?> >
        <label for="chantilly">Chantilly</label>

        <input type="checkbox" id="caramel" name="garniture[]" value="caramel"
        <?php if((isset($_POST['garniture'])) && in_array('caramel', $_POST['garniture'])) echo 'checked="checked"'; ?> >
        <label for="caramel">Caramel</label>
      </span>


      <label>Quel est le type de votre Evenement?</label>
      <span class="<?php echo $Classevenement; ?>">
        <input type="radio" name="evenement" id="anniversaire" value="anniversaire" 
        <?php if((isset($_POST['evenement'])) && (($_POST['evenement'])== 'anniversaire')) echo 'checked="checked"'; ?>>
        <label for="anniversaire">anniversaire</label>
        <input type="radio" name="evenement" id="mariage" value="mariage" 
        <?php if((isset($_POST['evenement'])) && (($_POST['evenement'])== 'mariage')) echo 'checked="checked"'; ?>>
        <label for="mariage">mariage</label>
      </span>
      


    <label for="Demande">Votre Demande&nbsp;<sup>*</sup> :</label>
<textarea id="Demande" name="demande" cols="75" rows="10" class="<?php echo $Classdemande; ?>"  style="position: static; width:75%;">
<?php if(isset($_POST['demande']))  echo $_POST['demande']; ?>
</textarea>


    </fieldset>

    <h1>Sign Up</h1>
<p>Please fill in this form to create an account.</p>
<hr>


<label for="telephone">Numéro de téléphone :</label>
<input id="telephone" class="<?php echo $Classtelephone; ?>" type="number" name="telephone" 
placeholder="Entrez un numero" required="required"
value="<?php if(isset($_POST['telephone']))  echo $_POST['telephone']; ?>">


<label for="mdp">Entrez un Mot de Passe</label>
<input id="mdp" class="<?php echo $Classmdp; ?>" type="password" 
placeholder="Entrez un Mot de Passe" name="mdp" required="required"
value="<?php if(isset($_POST['mdp']))  echo $_POST['mdp']; ?>">

<label for="mdp_repeat">Entrez a nouveau le Mot de Passe</label>
<input id="mdp_repeat" class="<?php echo $Classmdp_repeat; ?>" type="password" 
placeholder="Entrez a nouveau le Mot de Passe" name="mdp_repeat" required="required"
value="<?php if(isset($_POST['mdp_repeat'])) echo $_POST['mdp_repeat']; ?>">


<label for="souvenir">
  <input id="souvenir" class="<?php echo $Classsouvenir; ?>" type="checkbox" 
  checked="checked" name="remember" style="margin-bottom:15px"
  <?php if(isset($_POST['souvenir']) && ($_POST['souvenir'])== 'Se souvenir de moi') echo 'checked="checked"'; ?>> Se souvenir de moi
</label>

<p>En creant votre compte vous acceptez nos conditions d'utilisation <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>


<input type="submit" name="submit" value="submit" id="button" class="button">



<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2611.479542616526!2d6.171767276670363!3d49.11552707136812!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4794ddaf27a12e2b%3A0x9c30ba77f99280f9!2sR%C3%A9publique!5e0!3m2!1sfr!2sfr!4v1700481840655!5m2!1sfr!2sfr" 
 class="responsive-iframe" height="450" ></iframe>

<hr >
</form>

