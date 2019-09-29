<html>
<head>
    <title>Result DB</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
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
        a:hover{
            background-color:rgba(0,0,0,0.1);
            transition-duration:0.5s;
        }
        a{
            transition-duration:0.5s;
            text-decoration:none;
            color:black;
            padding:10px;
            border-radius:5px;
            font-size:2em;
            position:absolute;
            top:1em;
            left:1em;
            border : 1px solid black;
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

$bdd = new PDO('mysql:host=localhost;dbname=id10988661_dossards;charset=utf8', 'id10988661_leroy', 'leroy');

$numDoss = $_GET['d'];
$bool = $_GET['f'];
if($bool==1){
    $empty = $bdd->query('SELECT 1 FROM dossard WHERE NumDoss='.$numDoss);
    if($empty->fetch()==false){
        $req = $bdd->prepare('INSERT INTO dossard(NumDoss) VALUES(:numDoss)');
        $req->execute(array(
        	'numDoss' => $numDoss,
        ));
        ?>
        <p class="good">Le numero de dossard a bien ete ajoute</p>
        <a href="javascript:history.go(-1)">Back</a>
        <?php   
    }else{
        ?>
        <p class="bad">Le numero de dossard est deja present dans la base de donnees desole</p>
        <a href="javascript:history.go(-1)">Back</a>
        <?php
    }
}else{
    $empty = $bdd->query('SELECT 1 FROM dossard WHERE NumDoss='.$numDoss);
    if($empty->fetch()==false){
        ?>
        <p class="bad">Le numero de dossard n'est pas present dans la base de donnees desole</p>
        <a href="javascript:history.go(-1)">Back</a>
        <?php
    }else{
        $req = $bdd->query('DELETE FROM dossard WHERE NumDoss='.$numDoss);
        ?>
        <p class="good">Le numero de dossard a bien ete supprime</p>
        <a href="javascript:history.go(-1)">Back</a>
        <?php   
    }
}
?>
</body>
</html>