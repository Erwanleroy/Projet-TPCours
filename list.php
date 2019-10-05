<html>
<head>
    <title>Result DB</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="index.css"/>
    <style>
        *{
            font-family: 'Open Sans', sans-serif;
            user-select:none;
        }
        table{
            margin:auto;
            margin-top:20vh;
            width:90vw;
        }
        tr{
            height:40px;
        }
        td{
            text-align:center;
            border:1px solid black;
        }
        .active{
            background-color:black;
            color:white;
        }
    </style>
</head>
<body>
    <table>
        <tr>
        <?php
        $nbrDoss = 0;
        $there = false;
        $used = [];
        $lastAdded=0;
        // connection a la bdd
        $bdd = new PDO('mysql:host=localhost;dbname=id10988661_dossards;charset=utf8', 'YOUR USERNAME', 'YOUR PASS');
        // la on requete tout les num de dossard
        $allNumbers = $bdd->query('SELECT NumDoss FROM dossard');
        // donnee prend les valeur des nums
        while($donnees = $allNumbers->fetch())
        {
            // $used sincremente de "donnee" qui contient donc le numero de dossard
            $used[] = $donnees[0];
            // jaurai pu faire un count a ma requete mais vu que jai decide de faire ca 
            // apres cest plus facile et rapide de directement compter le nombre de boucle dans mon while
            $nbrDoss+=1;
        }
        // le moyen le plus facile davoir le premier element sans se casser la tete a cause du fetch
        $lastAdded = end($used);
        // on met ca dans lordre
        asort($used);
        // on extraie le premier item
        $firstItem = array_shift($used);
        for($i=1;$i<1001;$i++){
            // si i == le premier item on le met en couleur
            if($i==$firstItem){
            ?>
                <td class="active" id="<?php echo $i?>">
                    <?php
                        echo $i;
                    ?>
                </td>
                <?php
                // le firstItem a ete utilise du coup on fait quoi ? on re extraie le premier element hihi
            $firstItem = array_shift($used);
            // et si i est pas egal au premier item de larray bah on laffiche classique
            }else{
            ?>
                <td id="<?php echo $i?>">
                    <?php
                        echo $i;
                    ?>
                </td>
                <?php
            }
            // ca cest pour passer a la ligne tout les 20 chiffres
            if($i%20==0){
                ?>
                </tr>
                <tr>
                
                <?php
            }
        }
        ?>
        </tr>
    </table>
    <div class="listHeader">
        <a class="titouleStatistouque">LITTOULE STATISTOUQUE</a>
        <p>Nombre de dossards assigne 
            <?php
                echo $nbrDoss;
            ?>
        </p>
        <p>Dernier ajout 
            <?php
                echo $lastAdded;
            ?>
        </p>
    </div>
    <a class="backButton" href="javascript:history.go(-1)">Back</a>
    <script src="jquery.js"></script>
    <script src="index.js"></script>
</body>
</html>
