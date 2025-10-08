<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/de6359c2dd.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css" />
    <title>Ajouter un produit</title>
</head>
    <body>
        <div id="wrapper">
        <header>
            <nav> 
                <a href="http://localhost/Quentin_MAIA/appli/recap.php">Récap</a>
            </nav>
        </header>
        <main>
            <h1>Ajouter un produit</h1>
<?php
    $panier = 0;
     if (isset($_SESSION['products'])) {
        foreach ($_SESSION['products'] as $product) {
                $panier += $product['qtt'];
        }
    }
        echo "<p class='panier'> Articles dans le panier : <strong>$panier</strong> </p>";
?>
            <form action = "traitement.php" method = "post"> 
                    <label>Nom du produit :
                        <input type="text" name="name">
                    </label>
                <p>
                    <label>Prix du produit :
                        <input type="number" step="any" name="price">
                    </label>
                </p>
                <p>
                    <label>Quantité désirée :
                        <input type="number" name="qtt" value="1">
                    </label>
                </p>
                <p class=submit>
                    <input type="submit" name="submit" value="Ajouter le produit">
                </p>      
            </form>
<?php

    if(isset($_SESSION['message'])){
        echo "<p>".$_SESSION['message']."</p>";
    }  
?>
        </main>
        </div>
    </body>
</html>