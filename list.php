<html>
<head>
    <title>Result DB</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        *{
            font-family: 'Open Sans', sans-serif;
        }
        table{
            margin:auto;
            width:90vw;
        }
        tr{
            height:40px;
        }
    </style>
</head>
<body>
    <table>
        <tr>
        <?php
        $there = false;
        $used = [];
        // connection a la bdd
        $bdd = new PDO('mysql:host=localhost;dbname=id10988661_dossards;charset=utf8', 'id10988661_leroy', 'leroy');
        // la on requete tout les num de dossard
        $allNumbers = $bdd->query('SELECT NumDoss FROM dossard');
        // donnee prend les valeur des nums
        while($donnees = $allNumbers->fetch())
        {
            // $used sincremente de "donnee" qui contient donc le numero de dossard
            $used[] = $donnees[0];
        }
        // on met ca dans lordre
        asort($used);
        // on extraie le premier item
        $firstItem = array_shift($used);
        for($i=1;$i<1001;$i++){
            // si i == le premier item on le met en couleur
            if($i==$firstItem){
            ?>
                <td style="background-color:red">
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
                <td>
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
</body>
</html>