<html>
<head>
    <title>Result DB</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="index.css"/>
    <style>
        *{
            font-family: 'Open Sans', sans-serif;
        }
        .good{
            color:green;
        }
        .bad{
            color:red;
        }
        p{
            position:absolute;
            font-weight:bold;
            font-size:1.5em;
            top:50%;
            left:50%;
            text-align:center;
            transform:translate(-50%,-50%);
        }
    </style>
</head>
<body>
<?php

$bdd = new PDO('mysql:host=localhost;dbname=id10988661_dossards;charset=utf8', 'YOUR ID', 'YOUR PASS');

$numDoss = $_GET['d'];
$bool = $_GET['f'];
// check si le dossard est deja dans la base
$empty = $bdd->query('SELECT 1 FROM dossard WHERE NumDoss='.$numDoss);
// ajout numero dossard
if($bool==1){
    // si le dossard nest pas present
    if($empty->fetch()==false){
        // on fait une requete prepare pour linsertion de notre num
        $req = $bdd->prepare('INSERT INTO dossard(NumDoss) VALUES(:numDoss)');
        $req->execute(array(
        	'numDoss' => $numDoss,
        ));
        ?>
        <!-- message de reussite -->
        <p class="good">Le numero de dossard a bien ete ajoute</p>
        <!-- on propose un bouton retour -->
        <a href="javascript:history.go(-1)" class="backButton">Back</a>
        <?php   
    // si le dossard est present
    }else{
        // message derreur on va pas reecrire un meme dossard dans la base
        ?>
        <p class="bad">Le numero de dossard est deja present dans la base de donnees desole</p>
        <a href="javascript:history.go(-1)" class="backButton">Back</a>
        <?php
    }
// suppression dun dossard
}else{
    // si le dossard nest pas present
    if($empty->fetch()==false){
        // message derreur on va pas supprimer qqch qui nexiste pas
        ?>
        <p class="bad">Le numero de dossard n'est pas present dans la base de donnees desole</p>
        <a href="javascript:history.go(-1)" class="backButton">Back</a>
        <?php
    // si le dossard est present
    }else{
        // requete de suppression
        $req = $bdd->query('DELETE FROM dossard WHERE NumDoss='.$numDoss);
        // message de reussite
        ?>
        <p class="good">Le numero de dossard a bien ete supprime</p>
        <a href="javascript:history.go(-1)" class="backButton">Back</a>
        <?php   
    }
}
?>
<script src="jquery.js"></script>
<script src="index.js"></script>
</body>
</html>
